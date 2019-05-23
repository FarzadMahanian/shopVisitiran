<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
require_once __DIR__ . '/SCMerchantClient/SCMerchantClient.php';
/**
 * WC_Gateway_Spectrocoin Class.
 */
class WC_Gateway_Spectrocoin extends WC_Payment_Gateway {
	/** @var bool Whether or not logging is enabled */
	public static $log_enabled = true;
	/** @var WC_Logger Logger instance */
	public static $log = false;
	/** @var String pay currency */
	private static $pay_currency = 'BTC';
	/** @var String */
	private static $private_key_path = '/keys/private_key';
	/** @var String */
	private static $callback_name = 'spectrocoin_callback';
	/** @var SCMerchantClient */
	private $scClient;
	/**
	 * Constructor for the gateway.
	 */
	public function __construct() {
		$this->id                 = 'spectrocoin';
		$this->has_fields         = false;
		$this->order_button_text  = __( 'Pay with SpectroCoin', 'woocommerce' );
		$this->method_title       = __( 'SpectroCoin', 'woocommerce' );
		$this->supports           = array( 'products' );
		// Load the settings.
		$this->init_form_fields();
		$this->init_settings();
		// Define user set variables.
		$this->title			= $this->get_option( 'title' );
		$this->description		= $this->get_option( 'description' );
		$this->merchant_id 		= $this->get_option( 'merchant_id' );
		$this->project_id 	= $this->get_option( 'project_id' );
		//$this->private_key 		= $this->get_option( 'private_key' );
		$this->order_status     = $this->get_option( 'order_status' );
		
		$this->private_key      = $this->read_private_key();

		if ( !$this->private_key ) {
			self::log( "Please generate and put your private_key into spectrocoin/keys folder!" );
			$this->enabled = 'no';
		} else if ( !$this->merchant_id ) {
			self::log( "Please enter merchant id!" );
		} else if ( !$this->project_id ) {
			self::log( "Please enter application id!" );
		} else {
			$this->scClient = NEW SCMerchantClient(
				'https://spectrocoin.com/api/merchant/1',
				$this->merchant_id,
				$this->project_id,
				$this->private_key
			);
			add_action( 'woocommerce_api_' . self::$callback_name, array( &$this, 'callback' ) );
		}
		add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( &$this, 'process_admin_options' ) );
	}
	/**
	 * Logging method.
	 * @param string $message
	 */
	public static function log( $message ) {
		if ( self::$log_enabled ) {
			if ( empty( self::$log ) ) {
				self::$log = new WC_Logger();
			}
			self::$log->add( 'spectrocoin', $message );
		}
	}
	/**
	 * Get gateway icon.
	 * @return string
	 */
	public function get_icon() {
		$icon      = plugins_url( 'assets/images/spectrocoin.png', __FILE__ );
		$icon_html = '<img src="' . esc_attr( $icon ) . '" alt="' . esc_attr__( 'SpectroCoin logo', 'woocommerce' ) . '" />';
		return apply_filters( 'woocommerce_gateway_icon', $icon_html, $this->id );
	}
	/**
	 * Initialise Gateway Settings Form Fields.
	 */
	public function init_form_fields() {
		$this->form_fields = include( 'includes/settings-spectrocoin.php' );
	}
	/**
	 * Process the payment and return the result.
	 * @param  int $order_id
	 * @return array
	 */
	public function process_payment( $order_id ) {
		global $woocommerce;
		$order = wc_get_order( $order_id );
		$total = $order->get_total();
		$currency = $order->get_order_currency();
		$request = $this->new_request( $order, $total, $currency);
		$response = $this->scClient->createOrder( $request );
		if ($response instanceof ApiError) {
			self::log("Failed to create SpectroCoin payment for order {$order_id}. Response message {$response->getMessage()}. Response code: {$response->getCode()}");
			return array(
				'result' => 'failure',
				'messages' => $response->getMessage()
			);
		}
		$order->update_status( 'on-hold', __( 'Waiting for SpectroCoin payment', 'woocommerce' ) );
		$order->reduce_order_stock();
		$woocommerce->cart->empty_cart();
		return array(
			'result'   => 'success',
			'redirect' => $response->getRedirectUrl()
		);
	}
	/**
	 * Used to process callbacks from SpectroCoin
	 */
	public function callback() {
		if ( $this->enabled != 'yes' ) {
			return;
		}
		$callback = $this->scClient->parseCreateOrderCallback( $_POST );
		if ( $callback ) {
			$valid = $this->scClient->validateCreateOrderCallback( $callback );
			if ($valid == true) {
				$order_id = $this->parse_order_id($callback->getOrderId());
				$status = $callback->getStatus();
				$order = wc_get_order( $order_id );
				if ($order) {
					switch ($status) {
						case (1): // new
						case (2): // pending
							$order->update_status( 'pending' );
							break;
						case (3): // paid
							$order->update_status( $this->order_status );
							break;
						case (4): // failed
						case (5): // expired
							$order->update_status( 'failed' );
							break;
						case (6): // test
							// $order->update_status( $this->order_status );
							break;
					}
					echo "*ok*";
					exit;
				} else self::log( "Order '{$order_id}' not found!" );
			} else self::log( "Sent callback is invalid" );
		} else self::log( "Sent callback is invalid" );
	}
	private function new_request( $order, $total, $receive_currency ) {
		$callback = get_site_url( null, '?wc-api=' . self::$callback_name );
		$successCallback = $this->get_return_url( $order );
		$failureCallback = $this->get_return_url( $order );
		return new CreateOrderRequest(
			$order->id . '-' . $this->random_str( 5 ),
			self::$pay_currency,
			null,
			$receive_currency,
			$total,
			"Order #{$order->id}",
			"en",
			$callback,
			$successCallback,
			$failureCallback
		);
	}
	private function read_private_key() {
		$file = __DIR__ . self::$private_key_path;
		if ( !file_exists( $file ) ) {
			return false;
		}
		return file_get_contents( $file );
	}
	private function parse_order_id($order_id) {
		return explode('-', $order_id)[0];
	}
	private function random_str($length) {
		return substr(md5(rand(1, pow(2, 16))), 0, $length);
	}
}

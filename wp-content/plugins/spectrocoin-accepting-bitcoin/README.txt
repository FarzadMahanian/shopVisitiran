=== Bitcoin Payment Extension for WP WooCommerce ===
Contributors: SpectroCoin, spectrocoin.com
Donate link: https://spectrocoin.com/en/
Tags: bitcoin, bitcoin wordpress plugin, bitcoin plugin, bitcoin payments, accept bitcoin, bitcoins, spectrocoin, payment gateway
Requires at least: 3.0.1
Tested up to: 4.7.4
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


Bitcoin Payments for WooCommerce is a Wordpress plugin that allows to accept bitcoins at WooCommerce-powered online stores.

== Description ==

[youtube https://www.youtube.com/watch?v=q__DdVhD5RQ&t=166s]

Your online store must use WooCommerce platform (free wordpress plugin).
Once you installed and activated WooCommerce, you may install and activate SpectroCoin Bitcoin Payments for WooCommerce.

==Benefits==

1. Accept Bitcoin payments.
2. Fully automatic operation.
3. Automatic conversion to bitcoin via realtime exchange rate feed and calculations.
4. Lookup SpecroCoin transaction details.

== Installation ==

1. Install WooCommerce plugin and configure your store (if you haven't done so already - http://wordpress.org/plugins/woocommerce/).

2. Upload SpectroCoin plugin directory to the `/wp-content/plugins/` directory.

3. Generate private and public keys [Manually]
    1. Private key:
    ```shell
    # generate a 2048-bit RSA private key
    openssl genrsa -out "C:\private" 2048
    ```
    2. Public key:
    ```shell
    # output public key portion in PEM format
    openssl rsa -in "C:\private" -pubout -outform PEM -out "C:\public"
    ```
4. Generate private and public keys [Automatically]
	1. Private key/Public key:
	Go to SpectroCoin (https://spectrocoin.com/) -> Project list (https://spectrocoin.com/en/merchant/api/list.html)
	Click on your project  -> Edit Project -> Click on Public key (You will get Automatically generated private key, you can download it. After that and Public key will be generated Automatically.)

5. Save private key to wp-content\plugins\spectrocoin\keys as "private_key"

6. Activate the plugin through the WooCommerce -> Settings -> Checkout -> SpectroCoin

7. Enter your Merchant Id, Project Id

== Screenshots ==

1. Bitcoin Settings with all settings.
2. Checkout with option for bitcoin payment.
3. Order received screen, including QR code of bitcoin address and payment amount.
4. Bitcoin Order List in SpectroCoin.com 

== Remove plugin ==

1. Deactivate plugin through the 'Plugins' menu in WordPress.


== Changelog ==

No.

== Upgrade Notice ==

Soon.

== Frequently Asked Questions ==

Can I use this plug-in on more than one sites?
<br>Absolutely.

If you have any questions please e-mail us at info@spectrocoin.com or skype us spectrocoin_merchant and We'll be happy to answer them.

<?php
/**
 * Handles CSS output for multicolor fields.
 *
 * @package     Kirki
 * @subpackage  Controls
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       2.2.0
 */

if ( ! class_exists( 'Kirki_Output_Field_Multicolor' ) ) {

	/**
	 * Output overrides.
	 */
	class Kirki_Output_Field_Multicolor extends Kirki_Output {

		/**
		 * Processes a single item from the `output` array.
		 *
		 * @access protected
		 * @param array $output The `output` item.
		 * @param array $value  The field's value.
		 */
		protected function process_output( $output, $value ) {

			foreach ( $value as $key => $sub_value ) {

				// If "choice" is not defined, there's no reason to continue.
				if ( ! isset( $output['choice'] ) ) {
					continue;
				}

				// If "element" is not defined, there's no reason to continue.
				if ( ! isset( $output['element'] ) ) {
					continue;
				}

				// If the "choice" is not the same as the $key in our loop, there's no reason to proceed.
				if ( $key != $output['choice'] ) {
					continue;
				}

				// If "property" is not defined, fallback to "color".
				if ( ! isset( $output['property'] ) || empty( $output['property'] ) ) {
					$output['property'] = 'color';
				}

				// If "media_query" is not defined, use "global".
				if ( ! isset( $output['media_query'] ) || empty( $output['media_query'] ) ) {
					$output['media_query'] = 'global';
				}

				// Create the styles.
				$this->styles[ $output['media_query'] ][ $output['element'] ][ $output['property'] ] = $sub_value;

			}
		}
	}
}

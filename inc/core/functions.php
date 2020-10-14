<?php

if ( ! function_exists( 'fathom_get_option' ) ) {

	function fathom_get_option( $option ) {

		$theme_options = Fathom_Theme_Options::get_options();

		$value = ( isset( $theme_options[ $option ] ) && '' !== $theme_options[ $option ] ) ? $theme_options[ $option ] : $default;

		return $value;
	}

}

if ( ! function_exists( 'fathom_parse_css' ) ) {
	/**
	 * Parse the CSS array.
	 *
	 * @since  1.1.0
	 * @access public
	 * @return string
	 */
	function fathom_parse_css( $css_data ) {
		$parsed_css = '';

		if ( is_array( $css_data ) && count( $css_data ) > 0 ) {

			foreach ( $css_data as $selector => $properties ) {

				if ( null === $properties ) {
					break;
				}

				if ( ! count( $properties ) ) {
					continue; }

				$temp_parse_css = $selector . '{';
				$properties_added = 0;

				foreach ( $properties as $property => $value ) {

					if ( '' === $value ) {
						continue; }

					$properties_added++;
					$temp_parse_css .= $property . ':' . $value . ';';
				}

				$temp_parse_css .= '}';

				if ( $properties_added > 0 ) {
					$parsed_css .= $temp_parse_css;
				}
			}
		}
		return $parsed_css;
	}
}
<?php

if ( ! function_exists( 'fathom_get_option' ) ) {

	function fathom_get_option( $option ) {

		$theme_options = Fathom_Theme_Options::get_options();

		$value = ( isset( $theme_options[ $option ] ) && '' !== $theme_options[ $option ] ) ? $theme_options[ $option ] : $default;

		return $value;
	}

}
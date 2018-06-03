<?php

if ( ! function_exists( 'evoke_get_option' ) ) {

	function evoke_get_option( $option ) {

		$theme_options = Evoke_Theme_Options::get_options();

		$value = ( isset( $theme_options[ $option ] ) && '' !== $theme_options[ $option ] ) ? $theme_options[ $option ] : $default;

		return $value;
	}

}
<?php
/**
 * Color Options.
 *
 * @package     Fathom
 * @since       1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$wp_customize->add_setting(
	'color_primary',
	array(
		'default' => fathom_get_option( 'color_primary' ),
		'sanitize_callback' => 'fathom_sanitize_hex_color',
		'transport' => 'postMessage'
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'color_primary',
		array(
			'label'    => esc_html__( 'Primary Color', 'fathom' ),
			'section'  => 'colors',
			'settings' => 'color_primary',
			'priority' => 10,
		)
	)
);

$wp_customize->add_setting(
	'color_secondary',
	array(
		'default' => fathom_get_option( 'color_secondary' ),
		'sanitize_callback' => 'fathom_sanitize_hex_color',
		'transport' => 'postMessage'
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'color_secondary',
		array(
			'label'    => esc_html__( 'Secondary Color', 'fathom' ),
			'section'  => 'colors',
			'settings' => 'color_secondary',
			'priority' => 10,
		)
	)
);
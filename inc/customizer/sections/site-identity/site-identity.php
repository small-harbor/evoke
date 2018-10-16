<?php
/**
 * Additional Site Identity Options.
 *
 * @package     Fathom
 * @since       1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$wp_customize->add_setting(
	'custom_logo_height',
	array(
		'default' => fathom_get_option( 'custom_logo_height' ),
		'transport' => 'postMessage',
		'sanitize_callback' => 'fathom_sanitize_integer'
	)
);

$wp_customize->add_control(
	'custom_logo_height',
	array(
		'type'           => 'number',
		'section'        => 'title_tagline',
		'priority'       => 8,
		'label'          => __( 'Logo Height', 'fathom' ),
		'description' => __( 'Set the height (in pixels) for the logo.', 'fathom' ),
	)
);

/*
 * Setting: Divider
 */
$wp_customize->add_setting(
	'site_identity_divider',
	array(
		'sanitize_callback' => 'esc_attr'
	)
);

$wp_customize->add_control(
	new Fathom_Divider(
		$wp_customize,
		'site_identity_divider',
		array(
			'type' => 'hf-divider',
			'section' => 'title_tagline',
			'priority' => 9,
		)
	)
);
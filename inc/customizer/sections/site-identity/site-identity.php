<?php
/**
 * Additional Site Identity Options.
 *
 * @package     Evoke
 * @since       1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$wp_customize->add_setting(
	'custom_logo_height',
	array(
		'default' => evoke_get_option( 'custom_logo_height' ),
		'transport' => 'postMessage'
	)
);

$wp_customize->add_control(
	'custom_logo_height',
	array(
		'type'           => 'number',
		'section'        => 'title_tagline',
		'priority'       => 8,
		'label'          => __( 'Logo Height', 'evoke' ),
		'description' => __( 'Set the height (in pixels) for the logo.', 'evoke' ),
	)
);

/*
 * Setting: Divider
 */
$wp_customize->add_setting(
	'site_identity_divider',
	array()
);

$wp_customize->add_control(
	new Evoke_Divider(
		$wp_customize,
		'site_identity_divider',
		array(
			'type' => 'hf-divider',
			'section' => 'title_tagline',
			'priority' => 9,
		)
	)
);
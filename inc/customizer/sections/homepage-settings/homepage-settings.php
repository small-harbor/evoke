<?php
/**
 * Additional Homepage Settings Options.
 *
 * @package     Fathom
 * @since       1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$wp_customize->add_setting(
	'front_page_hide_title',
	array(
		'default' => fathom_get_option( 'front_page_hide_title' ),
		'transport' => 'postMessage',
		'sanitize_callback' => 'fathom_sanitize_checkbox'
	)
);

$wp_customize->add_control(
	'front_page_hide_title',
	array(
		'type'           => 'checkbox',
		'section'        => 'static_front_page',
		'priority'       => 20,
		'label'          => __( 'Hide Title on Homepage', 'fathom' ),
	)
);
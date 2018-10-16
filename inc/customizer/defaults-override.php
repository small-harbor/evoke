<?php
/**
 * Override default customizer panels, sections, settings or controls.
 *
 * @package     Fathom
 * @since       1.0.0
 */

/**
 * Override Sections
 */

// Remove the layout section from Hybrid. We'll add it back as a panel
$wp_customize->remove_section( 'layout' );
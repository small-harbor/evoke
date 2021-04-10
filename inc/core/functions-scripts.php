<?php
/**
 * Scripts and styles.
 *
 * @package    Fathom
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

# Add custom scripts and styles
add_action( 'wp_enqueue_scripts', 'fathom_enqueue_scripts', 5 );
add_action( 'wp_enqueue_scripts', 'fathom_enqueue_styles', 5 );

/**
 * Load scripts for the front end.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function fathom_enqueue_scripts() {
	// ===== Foundation
	wp_enqueue_script( 'foundation', get_stylesheet_directory_uri() . '/assets/dist/foundation.min.js', '', FOUNDATION_VERSION, true );

	// ===== Initialize Foundation
	wp_enqueue_script( 'foundation-init', get_stylesheet_directory_uri() . '/assets/dist/app.min.js', array( 'jquery' ), FOUNDATION_VERSION, true );
}

/**
 * Load stylesheets for the front end.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function fathom_enqueue_styles() {
	/* Load font. */
	wp_enqueue_style( 'fathom-font', '//fonts.googleapis.com/css?family=Merriweather:300,300i,400|Open+Sans:300,300i,400,400i"' );

	/* Load active theme stylesheet. */
	wp_enqueue_style( 'fathom-style', trailingslashit( get_stylesheet_directory_uri() ) . 'assets/dist/style.min.css', array(), filemtime( get_stylesheet_directory() . '/assets/dist/style.min.css' ) );

	wp_add_inline_style( 'fathom-style', Fathom_Custom_CSS::get_custom_styles() );
}
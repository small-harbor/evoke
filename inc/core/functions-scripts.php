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
add_action( 'wp_head', 'fathom_google_preload', 5 );

/**
 * Load scripts for the front end.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function fathom_enqueue_scripts() {
	wp_enqueue_script( 'fathom-script', get_stylesheet_directory_uri() . '/assets/js/script.js', array( 'jquery' ), FOUNDATION_VERSION, true );
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
	wp_enqueue_style( 'fathom-font', '//fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,700;0,900;1,300;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;1,300;1,400&display=swap"' );

	/* Load active theme stylesheet. */
	wp_enqueue_style( 'fathom-style', get_stylesheet_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );

	wp_add_inline_style( 'fathom-style', Fathom_Custom_CSS::get_custom_styles() );
}

function fathom_google_preload() { ?>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<?php
}
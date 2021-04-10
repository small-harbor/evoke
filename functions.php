<?php
/**
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License as published by the Free Software Foundation; either version 2 of the License,
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 *
 * @package    Fathom
 * @subpackage Functions
 * @version    1.1.0
 * @author     David Sutoyo <david@smallharbor.com>
 * @copyright  Copyright (c) 2013 - 2015, David Sutoyo
 * @link       https://themeharbor.com/themes/fathom
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */


/**
 * Singleton class for launching the theme and setup configuration.
 *
 * @since  1.0.0
 * @access public
 */
final class Fathom_Theme {

	/**
	 * Directory path to the theme folder.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $dir = '';

	/**
	 * Directory URI to the theme folder.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $uri = '';

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup();
			$instance->includes();
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Initial theme setup.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup() {

		$this->dir = trailingslashit( get_template_directory()     );
		$this->uri = trailingslashit( get_template_directory_uri() );

		/* Define Constants. */
		// Theme Version
		define( 'FATHOM_THEME_VERSION', '1.1.0' );

		// Settings
		define( 'FATHOM_THEME_SETTINGS', 'fathom-settings' );

		// Theme Directory
		define( 'FATHOM_THEME_DIR', trailingslashit( get_template_directory() ) );

		// Theme Directory URI
		define( 'FATHOM_THEME_URI', trailingslashit( get_template_directory_uri() ) );

		// Specify our Foundation version
		define( 'FOUNDATION_VERSION', '6.6.3');
	}

	/**
	 * Loads include and admin files for the plugin.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function includes() {
		// Load theme includes.
		require_once( $this->dir . 'inc/core/class-color-functions.php' );
		require_once( $this->dir . 'inc/core/class-theme-options.php' );
		require_once( $this->dir . 'inc/core/functions-scripts.php' );
		require_once( $this->dir . 'inc/core/functions-filters.php' );
		require_once( $this->dir . 'inc/core/functions-template.php' );
		require_once( $this->dir . 'inc/core/functions.php' );
		require_once( $this->dir . 'inc/customizer/class-customizer.php' );
		require_once( $this->dir . 'inc/customizer/class-custom-css.php' );
	}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Theme setup.
		add_action( 'after_setup_theme', array( $this, 'theme_setup' ),  5 );

		// Register menus.
		add_action( 'init', array( $this, 'register_menus' ) );

		// Register image sizes.
		add_action( 'init', array( $this, 'register_image_sizes' ) );

		// Register sidebars.
		add_action( 'widgets_init', array( $this, 'register_sidebars' ), 5 );

		// Register layouts.
		add_action( 'hybrid_register_layouts', array( $this, 'register_layouts' ) );
	}

	/**
	 * The theme setup function.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function theme_setup() {
		// Set content-width.
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1280;
		}

		// Custom logo
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 400,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		// Automatically add feed links to <head>.
		add_theme_support( 'automatic-feed-links' );

		// Title tag.
		add_theme_support( 'title-tag' );

		// HTML5 semantic markup.
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		// Alignwide and alignfull classes in the block editor.
		add_theme_support( 'align-wide' );

		add_theme_support( 'editor-styles' );
		add_editor_style( 'assets/dist/editor-style.css' );
	}

	/**
	 * Registers nav menus.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function register_menus() {

		register_nav_menu( 'primary',   _x( 'Primary',   'nav menu location', 'fathom' ) );
		register_nav_menu( 'mobile',    _x( 'Mobile', 'nav menu location', 'fathom' ) );
		register_nav_menu( 'social',    _x( 'Social',    'nav menu location', 'fathom' ) );
	}

	/**
	 * Registers image sizes.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function register_image_sizes() {

		// Adds the 'fathom-full' image size.
		add_image_size( 'fathom-full', 1200, 500, false );

		// Adds the 'fathom-archive' image size.
		add_image_size( 'fathom-archive', 1024, 682, true );
	}

	/**
	 * Registers sidebars.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	function register_sidebars() {

		register_sidebar(
			array(
				'id'          => 'primary',
				'name'        => _x( 'Page Sidebar', 'sidebar', 'fathom' ),
				'description' => __( 'The main sidebar for pages. It is displayed on either the left or right side of the page based on the chosen layout.', 'fathom' )
			)
		);

		register_sidebar(
			array(
				'id'          => 'secondary',
				'name'        => _x( 'Blog Sidebar', 'sidebar', 'fathom' ),
				'description' => __( 'The main sidebar for single blog posts and blog archives. It is displayed on either the left or right side of the page based on the chosen layout.', 'fathom' )
			)
		);
	}
}

/**
 * Gets the instance of the `Stargazer_Theme` class.  This function is useful for quickly grabbing data
 * used throughout the theme.
 *
 * @since  1.0.0
 * @access public
 * @return object
 */
function fathom_theme() {
	return Fathom_Theme::get_instance();
}

fathom_theme();

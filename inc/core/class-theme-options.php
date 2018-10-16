<?php
/**
 * Handles the theme options.
 *
 * @package    Fathom
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( ! class_exists( 'Fathom_Theme_Options' ) ) {

	/**
	 * Theme Options.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	class Fathom_Theme_Options {
		/**
		 * Holds the instance of this class.
		 *
		 * @since  1.0.0
		 * @access private
		 * @var    object
		 */
		private static $instance;

		/**
		 * A static option variable.
		 *
		 * @since 1.0.0
		 * @access private
		 * @var mixed $db_options
		 */
		private static $db_options;

		/**
		 * Returns the instance.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return object
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor method.
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void
		 */
		private function __construct() {
			// Refresh options variables after customizer save.
			add_action( 'after_setup_theme', array( $this, 'refresh' ) );
		}

		/**
		 * Get the theme defaults.
		 *
		 * @since  1.0.0
		 * @access private
		 * @return array
		 */
		public static function get_defaults() {
			return apply_filters(
				'fathom_defaults',
				array(
					'custom_logo_height' => 60,
					'color_primary' => '#ff780b',
					'color_secondary' => '#0d95db',
					'layout_container' => 'contained',
					'layout_container_header' => 'contained',
					'layout_container_footer' => 'contained',
					'layout_container_page' => 'default',
					'layout_container_post' => 'boxed',
					'layout_container_archive' => 'default',
					'layout_content_page' => '1c',
					'layout_content_post' => '1c',
					'layout_content_archive' => '2c-l',
					'layout_featured_image' => 'theme',
					'layout_post_title' => 'featured-image',
					'front_page_hide_title' => true
				)
			);
		}

		/**
		 * Get the theme options.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return array
		 */
		public static function get_options() {
			return self::$db_options;
		}

		/**
		 * Update the theme options.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public static function refresh() {
			self::$db_options = wp_parse_args(
				get_option( 'theme_mods_' . get_stylesheet() ),
				self::get_defaults()
			);
		}
	}
}

$fathom_theme_options = Fathom_Theme_Options::get_instance();
<?php
/**
 * Fathom Customizer
 *
 * @package     Fathom
 * @since       1.0.0
 */

/**
 * Customizer Loader
 */
if ( ! class_exists( 'Fathom_Customizer' ) ) {

	/**
	 * Customizer Loader
	 *
	 * @since 1.0.0
	 */
	class Fathom_Customizer {
		
		/**
		 * Holds the instance of this class.
		 *
		 * @since  1.0.0
		 * @access private
		 * @var    object
		 */
		private static $instance;

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
			add_action( 'customize_preview_init', array( $this, 'preview_init' ) );
			add_action( 'customize_register', array( $this, 'customize_register' ) );
			add_action( 'customize_save_after', array( $this, 'customize_save' ) );
		}

		/**
		 * Register our customizer options.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		public function customize_register( $wp_customize ) {
			require FATHOM_THEME_DIR . 'inc/customizer/functions-sanitize.php';
			require FATHOM_THEME_DIR . 'inc/customizer/defaults-override.php';
			require FATHOM_THEME_DIR . 'inc/customizer/controls/divider.php';
			require FATHOM_THEME_DIR . 'inc/customizer/sections/homepage-settings/homepage-settings.php';
			require FATHOM_THEME_DIR . 'inc/customizer/sections/site-identity/site-identity.php';
			require FATHOM_THEME_DIR . 'inc/customizer/sections/layout/layout.php';
			require FATHOM_THEME_DIR . 'inc/customizer/sections/colors/colors.php';
		}

		/**
		 * Customizer preview init.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		public function preview_init() {
			Fathom_Theme_Options::refresh();

			wp_enqueue_script( 'fathom-customizer-preview', FATHOM_THEME_URI . 'assets/dist/customizer-preview.js', array( 'jquery' ), null, FATHOM_THEME_VERSION );
		}

		/**
		 * Refresh the options on save.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		public function customize_save() {
			// Update variables.
			Fathom_Theme_Options::refresh();
		}
	}
}

$fathom_customizer = Fathom_Customizer::get_instance();
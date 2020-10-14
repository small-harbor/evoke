<?php
/**
 * Output the custom CSS.
 *
 * @package    Fathom
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( ! class_exists( 'Fathom_Custom_CSS' ) ) {

	/**
	 * Theme Custom CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	class Fathom_Custom_CSS {
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
		private function __construct() {}

		/**
		 * Formats the custom styles for output.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return array
		 */
		public static function get_custom_styles() {
			$theme_options = get_option( 'theme_mods_' . get_stylesheet() );
			$theme_defaults = Fathom_Theme_Options::get_defaults();
			$color_functions = Fathom_Color_Functions::get_instance();

			$options = wp_parse_args( $theme_options, $theme_defaults );

			$css = array();

			if ( ! get_theme_mod( 'header_text', true ) ) {
				$logo_size = Fathom_Custom_CSS::get_custom_logo_ratio( get_theme_mod( 'custom_logo' ), $options['custom_logo_height'] );

				$css['.site-title a'] = array(
					'background' => 'url(' . Fathom_Custom_CSS::get_custom_logo_src() . ') center center no-repeat',
					'width' => esc_attr( $logo_size['width'] ) . 'px',
					'height' => esc_attr( $logo_size['height'] ) . 'px'
				);
			}

			if ( $options['color_primary'] ) {
				$primary_color = esc_attr( $options['color_primary'] );

				$css['a'] = array(
					'color' => $primary_color
				);
				
				$css['a:focus, a:hover'] = array(
					'color' => $color_functions->adjust( $primary_color, -0.1 )
				);

				$css['.dropdown.menu > li.is-dropdown-submenu-parent > a::after'] = array(
					'border-top-color' => $primary_color
				);

				$css['.dropdown.menu .is-active > a'] = array(
					'color' => $primary_color
				);

				$css['.is-dropdown-submenu .is-dropdown-submenu-parent.opens-left > a::after'] = array(
					'border-right-color' => $primary_color
				);

				$css['.is-dropdown-submenu .is-dropdown-submenu-parent.opens-right > a::after'] = array(
					'border-left-color' => $primary_color
				);

				$css['.pagination .current'] = array(
					'background' => $primary_color
				);

				$css['input[type="submit"]'] = array(
					'background' => $primary_color
				);
			}

			if ( $options['color_secondary'] ) {
				$css['.sidebar-secondary a'] = array(
					'color' => esc_attr( $options['color_secondary'] )
				);
			}

			return fathom_parse_css( $css );
		}

		/**
		 * Gets the custom logo source.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return string
		 */
		public function get_custom_logo_src() {
			$id = get_theme_mod( 'custom_logo' );
			$src = wp_get_attachment_image_src( $id , 'full' );
			return $src[0];
		}

		/**
		 * Gets the custom logo size ratio.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return array
		 */
		public function get_custom_logo_ratio( $attachment_id, $custom_logo_height ) {
			$size = array(
				'width' => 0,
				'height' => 0
			);

			if ( has_custom_logo() & $image = wp_get_attachment_metadata( $attachment_id ) ) {
				$size['height'] = $custom_logo_height;
				$size['width'] = $image['width'] / $image['height'] * $custom_logo_height;
			}

			return $size;
		}
	}
}

$fathom_custom_css = Fathom_Custom_CSS::get_instance();
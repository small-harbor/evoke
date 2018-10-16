<?php
/**
 * Color functions.
 *
 * @package    Fathom
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( ! class_exists( 'Fathom_Color_Functions' ) ) {

	/**
	 * Theme Options.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	class Fathom_Color_Functions {
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

		public function validate_hex( $hex ) {
			$hex = str_replace( '#', '', $hex );

			if ( 3 == strlen( $hex ) ) {
				return substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) . substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) . substr( $hex, 2, 1 ) . substr( $hex, 2, 1 );
			}

			else if ( 6 == strlen( $hex ) ) {
				return $hex;
			}
			
			else {
				return '000000';
			}
		}

		public function hex2rgb( $hex ) {
			$hex = $this->validate_hex( $hex );

			$rgb = array(
				'r' => hexdec( substr( $hex, 0, 2 ) ),
				'g' => hexdec( substr( $hex, 2, 2 ) ),
				'b' => hexdec( substr( $hex, 4, 2 ) ),
			);

			return $rgb;
		}

		// https://gist.github.com/brandonheyer/5254516
		public function rgb2hsl( $rgb ) {
			$old_rgb = $rgb;

			$r = $rgb['r']/255;
			$g = $rgb['g']/255;
			$b = $rgb['b']/255;

			$max = max( $r, $g, $b );
			$min = min( $r, $g, $b );

			$h;
			$s;
			$l = ( $max + $min ) / 2;
			$d = $max - $min;

			if( $d == 0 ) {
				$h = $s = 0; // achromatic
			}

			else {
				$s = $d / ( 1 - abs( 2 * $l - 1 ) );

				switch( $max ) {
					case $r:
						$h = 60 * fmod( ( ( $g - $b ) / $d ), 6 ); 
							if ($b > $g) {
							$h += 360;
						}
						break;

					case $g: 
						$h = 60 * ( ( $b - $r ) / $d + 2 ); 
						break;

					case $b: 
						$h = 60 * ( ( $r - $g ) / $d + 4 ); 
						break;
				}			        	        
			}

			return array( 'h' => round( $h, 2 ), 's' => round( $s, 2 ), 'l' => round( $l, 2 ) );
		}

		public function hex2hsl( $hex ) {
			$hex = $this->validate_hex( $hex );

			$rgb = $this->hex2rgb( $hex );

			return $this->rgb2hsl( $rgb );
		}

		public function hsl2rgb( $hsl ) {
			$h = $hsl['h'];
			$s = $hsl['s'];
			$l = $hsl['l'];

			$r; 
			$g; 
			$b;

			$c = ( 1 - abs( 2 * $l - 1 ) ) * $s;
			$x = $c * ( 1 - abs( fmod( ( $h / 60 ), 2 ) - 1 ) );
			$m = $l - ( $c / 2 );

			if ( $h < 60 ) {
				$r = $c;
				$g = $x;
				$b = 0;
			}

			else if ( $h < 120 ) {
				$r = $x;
				$g = $c;
				$b = 0;			
			}

			else if ( $h < 180 ) {
				$r = 0;
				$g = $c;
				$b = $x;					
			}

			else if ( $h < 240 ) {
				$r = 0;
				$g = $x;
				$b = $c;
			}

			else if ( $h < 300 ) {
				$r = $x;
				$g = 0;
				$b = $c;
			}

			else {
				$r = $c;
				$g = 0;
				$b = $x;
			}

			$r = ( $r + $m ) * 255;
			$g = ( $g + $m ) * 255;
			$b = ( $b + $m ) * 255;

			return array( 'r' => floor( $r ), 'g' => floor( $g ), 'b' => floor( $b ) );
		}

		public function rgb2hex( $rgb ) {
			return str_pad( dechex( $rgb['r'] ), 2, '0', STR_PAD_LEFT ) . str_pad( dechex( $rgb['g'] ), 2, '0', STR_PAD_LEFT ) . str_pad( dechex( $rgb['b'] ), 2, '0', STR_PAD_LEFT );
		}

		public function hsl2hex( $hsl ) {
			$rgb = $this->hsl2rgb( $hsl );

			return $this->rgb2hex( $rgb );
		}

		public function adjust( $hex, $percentage ) {
			$hsl = $this->hex2hsl( $hex );

			$hsl['l'] += $percentage;

			if ( $hsl['l'] > 1 ) {
				$hsl['l'] = 1;
			}

			elseif ( $hsl['l'] < 0 ) {
				$hsl['l'] = 0;
			}

			return '#' . $this->hsl2hex( $hsl );
		}
	}
}

$fathom_color_functions = Fathom_Color_Functions::get_instance();
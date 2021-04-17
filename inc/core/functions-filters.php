<?php
/**
 * Custom Filters.
 *
 * @package    Fathom
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

# Add a class to the body
add_filter( 'body_class', 'fathom_attr_body', 6 );

add_filter( 'excerpt_more', 'fathom_excerpt_more' );

add_filter( 'excerpt_length', 'fathom_excerpt_length', 999 );

/**
 * Filter the body attributes.
 *
 * @since  1.1.0
 * @access public
 * @return array
 */
function fathom_attr_body( $classes ) {
	global $post;

	$attr[] = 'no-js';

	if ( current_theme_supports( 'fixed-width-header' ) ) {
		$attr[] = 'fixed-width-header';
	}

	if ( current_theme_supports( 'fixed-width-footer' ) ) {
		$attr[] = 'fixed-width-footer';
	}

	if ( fathom_get_option( 'layout_container' ) ) {
		$attr[] = 'container-body-' . fathom_get_option( 'layout_container' );
	}

	if ( $singular_layout = get_post_meta( $post->ID, 'fathom-container-post-layout', true ) ) {
		$attr[] = 'container-singular-' . $singular_layout;
	}

	else if ( is_page() && fathom_get_option( 'layout_container_page' ) ) {
		$attr[] = 'container-page-' . fathom_get_option( 'layout_container_page' );
	}

	else if ( is_single() && fathom_get_option( 'layout_container_post' ) ) {
		$attr[] = 'container-post-' . fathom_get_option( 'layout_container_post' );
	}

	else if ( is_archive() && fathom_get_option( 'layout_container_archive' ) ) {
		$attr[] = 'container-archive-' . fathom_get_option( 'layout_container_archive' );
	}

	if ( fathom_get_option( 'layout_container_header' ) ) {
		$attr[] = 'container-header-' . fathom_get_option( 'layout_container_header' );
	}

	if ( fathom_get_option( 'layout_container_footer' ) ) {
		$attr[] = 'container-footer-' . fathom_get_option( 'layout_container_footer' );
	}

	if ( is_singular() && has_post_thumbnail() ) {
		$attr[] = 'has-post-thumbnail';
	}

	return array_merge( $classes, $attr );
}

/**
 * Filter the ellipses for the excerpt
 *
 * @since  1.0.0
 * @access public
 * @return array
 */
function fathom_excerpt_more( $more ) {
	return '<p class="read-more"><a class="button" href="' . esc_url( get_permalink() ) . '">' . __( 'Read More', 'fathom' ) . '</a></p>';
}

/**
 * Filter the excerpt length
 *
 * @since  1.0.0
 * @access public
 * @return array
 */
function fathom_excerpt_length( $length ) {
	return 20;
}
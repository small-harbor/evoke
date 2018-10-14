<?php
/**
 * Custom Filters.
 *
 * @package    Evoke
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

# Add a class to the body
add_filter( 'hybrid_attr_body', 'evoke_attr_body', 6 );

# Add a class to the branding
add_filter( 'hybrid_attr_branding', 'evoke_attr_branding', 6 );

# Filter the theme layout class
add_filter( 'hybrid_get_theme_layout', 'evoke_theme_layout', 5 );

# Customize our parent theme stylesheet uri
add_filter( 'hybrid_get_parent_stylesheet_uri', 'evoke_parent_stylesheet_uri', 5 );

# Filter the default form options
add_filter( 'comment_form_defaults', 'evoke_comment_form_defaults' );

# Add support for breadcrumbs
add_filter( 'breadcrumb_trail_args', 'evoke_breadcrumb_trail_args' );
add_filter( 'breadcrumb_trail', 'evoke_breadcrumb_trail', 5, 2 );

add_filter( 'hybrid_sidebar_args', 'evoke_sidebar_defaults' );

add_filter( 'excerpt_more', 'evoke_excerpt_more' );

add_filter( 'excerpt_length', 'evoke_excerpt_length', 999 );

/**
 * Filter the body attributes.
 *
 * @since  1.1.0
 * @access public
 * @return array
 */
function evoke_attr_body( $attr ) {
	global $post;

	$attr['class'] .= ' no-js';

	if ( current_theme_supports( 'fixed-width-header' ) ) {
		$attr['class'] .= ' fixed-width-header';
	}

	if ( current_theme_supports( 'fixed-width-footer' ) ) {
		$attr['class'] .= ' fixed-width-footer';
	}

	if ( evoke_get_option( 'layout_container' ) ) {
		$attr['class'] .= ' container-body-' . evoke_get_option( 'layout_container' );
	}

	if ( $singular_layout = get_post_meta( $post->ID, 'evoke-container-post-layout', true ) ) {
		$attr['class'] .= ' container-singular-' . $singular_layout;
	}

	else if ( is_page() && evoke_get_option( 'layout_container_page' ) ) {
		$attr['class'] .= ' container-page-' . evoke_get_option( 'layout_container_page' );
	}

	else if ( is_single() && evoke_get_option( 'layout_container_post' ) ) {
		$attr['class'] .= ' container-post-' . evoke_get_option( 'layout_container_post' );
	}

	else if ( is_archive() && evoke_get_option( 'layout_container_archive' ) ) {
		$attr['class'] .= ' container-archive-' . evoke_get_option( 'layout_container_archive' );
	}

	if ( evoke_get_option( 'layout_container_header' ) ) {
		$attr['class'] .= ' container-header-' . evoke_get_option( 'layout_container_header' );
	}

	if ( evoke_get_option( 'layout_container_footer' ) ) {
		$attr['class'] .= ' container-footer-' . evoke_get_option( 'layout_container_footer' );
	}

	if ( is_singular() && has_post_thumbnail() ) {
		$attr['class'] .= ' has-post-thumbnail';
	}

	return $attr;
}

/**
 * Filter the branding attributes.
 *
 * @since  1.0.0
 * @access public
 * @return array
 */
function evoke_attr_branding( $attr ) {
	$attr['class'] = 'title-area menu';
	return $attr;
}

/**
 * Filters the default theme layout. Metaboxes options should still be able
 * to override these.
 *
 * @since  1.0.0
 * @access public
 * @return array
 */
function evoke_theme_layout( $theme_layout ) {

	/* If viewing a singular post, get the post layout. */
	if ( is_singular() )
		$layout = hybrid_get_post_layout( get_queried_object_id() );

	/* If viewing an author archive, get the user layout. */
	elseif ( is_author() )
		$layout = hybrid_get_user_layout( get_queried_object_id() );

	/* If a layout was found, set it. */
	if ( !empty( $layout ) && 'default' !== $layout ) {
		$theme_layout = $layout;
	}

	else {
		if ( is_page() ) {
			$layout = evoke_get_option( 'layout_content_page' );
		}

		elseif ( is_single() ) {
			$layout = evoke_get_option( 'layout_content_post' );
		}

		elseif ( is_archive() ) {
			$layout = evoke_get_option( 'layout_content_archive' );
		}

		if ( ! empty( $layout ) ) $theme_layout = $layout;
	}

	return $theme_layout;
}

/**
 * Filters the parent theme stylesheet uri.
 *
 * @since  1.0.0
 * @access public
 * @return array
 */
function evoke_parent_stylesheet_uri( $stylesheet_uri ) {
	$stylesheet_uri = hybrid()->parent_uri . 'assets/dist/style.min.css';

	return $stylesheet_uri;
}

/**
 * Filters the default comment form options.
 *
 * @since  1.0.0
 * @access public
 * @return array
 */
function evoke_comment_form_defaults( $defaults ) {

	/* Change the defaults depending on your requirements */
	//$defaults['title_reply'] = __( 'Submit a Comment', 'evoke' );

	return $defaults;
}

/**
 * Adjust the args for breadcrumbs
 *
 * @since  2.0.0
 * @access public
 * @return array
 */
function evoke_breadcrumb_trail_args( $args ) {
	$args['show_browse'] = false;
	return $args;
}

/**
 * Filter the class names for the breadcrumbs
 *
 * @since  2.0.0
 * @access public
 * @return array
 */
function evoke_breadcrumb_trail( $breadcrumb, $args ) {
	$breadcrumb = str_replace( 'breadcrumb-trail breadcrumbs', 'breadcrumb-trail', $breadcrumb );
	$breadcrumb = str_replace( 'ul class="trail-items"', 'ul class="breadcrumbs trail-items', $breadcrumb );
	return $breadcrumb;
}

/**
 * Filter the arguments for the sidebar
 *
 * @since  2.0.0
 * @access public
 * @return array
 */
function evoke_sidebar_defaults( $defaults ) {
	$defaults['before_title'] = '<h3 class="widget-title"><span>';
	$defaults['after_title'] = '</span></h3>';

	return $defaults;
}

/**
 * Filter the ellipses for the excerpt
 *
 * @since  2.0.0
 * @access public
 * @return array
 */
function evoke_excerpt_more( $more ) {
	return '<p class="read-more"><a class="button small" href="' . get_permalink() . '">' . __( 'Read More', 'evoke' ) . '</a></p>';
}

/**
 * Filter the excerpt length
 *
 * @since  2.0.0
 * @access public
 * @return array
 */
function evoke_excerpt_length( $length ) {
	return 20;
}
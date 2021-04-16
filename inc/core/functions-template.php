<?php
/**
 * Returns a link back to the site.
 *
 * @since  2.0.0
 * @access public
 * @return string
 */
function fathom_get_site_link() {

	return sprintf( '<a class="site-link" href="%s" rel="home">%s</a>', esc_url( home_url() ), get_bloginfo( 'name' ) );
}

/**
 * Returns a link to WordPress.org.
 *
 * @since  2.0.0
 * @access public
 * @return string
 */
function fathom_get_wp_link() {

	return sprintf( '<a class="wp-link" href="%s">%s</a>', esc_url( __( 'https://wordpress.org', 'fathom' ) ), esc_html__( 'WordPress', 'fathom' ) );
}

/**
 * Returns a link to the parent theme URI.
 *
 * @since  2.0.0
 * @access public
 * @return string
 */
function fathom_get_theme_link() {
	$theme   = wp_get_theme( get_template() );
	$allowed = array( 'abbr' => array( 'title' => true ), 'acronym' => array( 'title' => true ), 'code' => true, 'em' => true, 'strong' => true );

	// Note: URI is escaped via `WP_Theme::markup_header()`.
	return sprintf( '<a class="theme-link" href="%s">%s</a>', $theme->display( 'ThemeURI' ), wp_kses( $theme->display( 'Name' ), $allowed ) );
}

/**
 * Returns a list of terms
 *
 * @since  2.0.0
 * @access public
 * @param  array   $args
 * @return string
 */
function fathom_get_post_terms( $args = array() ) {

	$html = '';

	$defaults = array(
		'post_id'    => get_the_ID(),
		'taxonomy'   => 'category',
		'text'       => '%s',
		'before'     => '',
		'after'      => '',
		'wrap'       => '<span class="%s">%s</span>',
		// Translators: Separates tags, categories, etc. when displaying a post.
		'sep'        => _x( ', ', 'taxonomy terms separator', 'hybrid-core' )
	);

	$args = wp_parse_args( $args, $defaults );

	$terms = get_the_term_list( $args['post_id'], $args['taxonomy'], '', $args['sep'], '' );

	if ( $terms ) {
		$html .= $args['before'];
		$html .= sprintf( $args['wrap'], __( 'entry-terms', 'fathom' ), sprintf( $args['text'], $terms ) );
		$html .= $args['after'];
	}

	return $html;
}

/**
 * Add markup for dropdown arrows
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function fathom_nav_menu_arrow( $item_output, $item, $depth, $args ) {
	if ( in_array( 'menu-item-has-children', $item->classes ) ){
		$item_output .= '<a href="#" class="fathom-dropdown-arrow"></a>';
	}

	return $item_output;
}

add_filter( 'walker_nav_menu_start_el', 'fathom_nav_menu_arrow', 10, 4 );

/**
 * Checks if the specified comment is written by the author of the post commented on.
 *
 * @param object $comment Comment data.
 * @return bool
 */
function fathom_is_comment_by_post_author( $comment = null ) {

	if ( is_object( $comment ) && $comment->user_id > 0 ) {

		$user = get_userdata( $comment->user_id );
		$post = get_post( $comment->comment_post_ID );

		if ( ! empty( $user ) && ! empty( $post ) ) {

			return $comment->user_id === $post->post_author;

		}
	}
	return false;

}
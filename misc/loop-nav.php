<?php if ( is_singular( 'post' ) ) : // If viewing a single post page. ?>

	<div class="loop-nav">
		<?php previous_post_link( '<div class="prev"><h5>' . __( 'Previous Post', 'fathom' ) . '</h5>' . esc_html__( '%link', 'fathom' ) . '</div>', '%title' ); ?>
		<?php next_post_link(     '<div class="next"><h5>' . __( 'Next Post', 'fathom' ) . '</h5>' . esc_html__( '%link', 'fathom' ) . '</div>', '%title' ); ?>
	</div><!-- .loop-nav -->

<?php elseif ( is_home() || is_archive() || is_search() ) : // If viewing the blog, an archive, or search results. ?>

	<?php the_posts_pagination(
		array(
			'type' => 'list',
			'prev_text' => esc_html_x( '&larr; Previous', 'posts navigation', 'fathom' ), 
			'next_text' => esc_html_x( 'Next &rarr;',     'posts navigation', 'fathom' )
		) 
	); ?>

<?php endif; // End check for type of page being viewed. ?>
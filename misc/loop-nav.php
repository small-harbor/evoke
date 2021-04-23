<?php if ( is_singular( 'post' ) ) : // If viewing a single post page. ?>

	<nav class="post-navigation">
		<div class="nav-links">
			<?php previous_post_link( '<div class="nav-prev">' . esc_html__( 'Previous Post %link', 'fathom' ) . '</div>', '%title' ); ?>
			<?php next_post_link(     '<div class="nav-next">' . esc_html__( 'Next Post %link',     'fathom' ) . '</div>', '%title' ); ?>
		</div>
	</nav><!-- .post-navigation -->

<?php elseif ( is_home() || is_archive() || is_search() ) : // If viewing the blog, an archive, or search results. ?>

	<?php the_posts_pagination(
		array(
			'type' => 'list',
			'prev_text' => esc_html_x( '&larr; Previous', 'posts navigation', 'fathom' ), 
			'next_text' => esc_html_x( 'Next &rarr;',     'posts navigation', 'fathom' )
		) 
	); ?>

<?php endif; // End check for type of page being viewed. ?>
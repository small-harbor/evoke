<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php if ( is_singular( get_post_type() ) ) : // If viewing a single post. ?>

		<header class="entry-header">

			<?php if ( 'post' == fathom_get_option( 'layout_post_title' ) || ! has_post_thumbnail() ) : ?>
				<h1 class="entry-title"><?php single_post_title(); ?></h1>
			<?php endif; ?>

			<div class="entry-byline">
				<span class="entry-author"><?php the_author_posts_link(); ?></span>
				<time class="entry-published"><?php echo get_the_date(); ?></time>
				<?php comments_popup_link( number_format_i18n( 0 ) . ' comments', number_format_i18n( 1 ) . ' comment', '% comments', 'comments-link', 'Comments Off' ); ?>
			</div><!-- .entry-byline -->

		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php echo fathom_get_post_terms( array( 'taxonomy' => 'category', 'text' => esc_html__( 'Posted in %s', 'fathom' ) ) ); ?>
			<?php echo fathom_get_post_terms( array( 'taxonomy' => 'post_tag', 'text' => esc_html__( 'Tagged %s', 'fathom' ), 'before' => '&nbsp;' ) ); ?>
		</footer><!-- .entry-footer -->

	<?php else : // If not viewing a single post. ?>

		<div class="entry-thumbnail">
			<?php the_post_thumbnail( 'archive' ); ?>
		</div>

		<header class="entry-header">

			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>

			<div class="entry-byline">
				<span class="entry-author"><?php the_author_posts_link(); ?></span>
				<time class="entry-published"><?php echo get_the_date(); ?></time>
				<?php comments_popup_link( number_format_i18n( 0 ) . ' comments', number_format_i18n( 1 ) . ' comment', '% comments', 'comments-link', 'Comments Off' ); ?>
			</div><!-- .entry-byline -->

		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

	<?php endif; // End single post check. ?>

</article><!-- .entry -->
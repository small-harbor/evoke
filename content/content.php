<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php if ( is_singular( get_post_type() ) ) : // If viewing a single post. ?>

		<header class="entry-header">

			<time class="entry-published"><?php echo get_the_date(); ?></time>

			<?php if ( 'post' == fathom_get_option( 'layout_post_title' ) || ! has_post_thumbnail() ) : ?>
				<h1 class="entry-title"><?php single_post_title(); ?></h1>
			<?php endif; ?>

		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<ul class="entry-metadata">
				<li class="entry-byline">
					<span class="entry-meta-prep entry-author-by"><?php _e( 'by', 'fathom' ); ?></span> <span class="entry-author"><?php the_author_posts_link(); ?></span>
				</li>

				<?php if ( $cats = fathom_get_post_terms( array( 'taxonomy' => 'category' ) ) ) : ?>
					<li>
						<span class="entry-meta-prep entry-categorized"><?php _e( 'posted in', 'fathom' ); ?></span> <?php echo $cats; ?>
					</li>
				<?php endif; ?>
				<?php if ( $tags = fathom_get_post_terms( array( 'taxonomy' => 'post_tag' ) ) ) : ?>
					<li>
						<span class="entry-meta-prep entry-tagged"><?php _e( 'tagged', 'fathom' ); ?></span> <?php echo $tags; ?>
					</li>
				<?php endif; ?>
			</ul>
		</footer><!-- .entry-footer -->

	<?php else : // If not viewing a single post. ?>

		<div class="entry-thumbnail">
			<?php the_post_thumbnail( 'archive' ); ?>
		</div>

		<header class="entry-header">

			<time class="entry-published"><?php echo get_the_date(); ?></time>

			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>

		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

	<?php endif; // End single post check. ?>

</article><!-- .entry -->
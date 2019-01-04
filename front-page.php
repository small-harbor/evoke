<?php get_header(); // Loads the header.php template. ?>

<main <?php hybrid_attr( 'content' ); ?>>

	<?php if ( have_posts() ) : // Checks if any posts were found. ?>

		<?php while ( have_posts() ) : // Begins the loop through found posts. ?>

			<?php the_post(); // Loads the post data. ?>

			<?php if ( get_the_content() ) : ?>
				<?php hybrid_get_content_template(); // Loads the content/*.php template. ?>
			<?php endif; ?>

		<?php endwhile; // End found posts loop. ?>

	<?php endif; // End check for posts. ?>

	<h3 class="section-title latest">
		<span></span>
		<span class="text">
			<?php _e( 'Latest', 'fathom' ); ?>
		</span>
		<span></span>
	</h3>

	<div class="latest-articles">

	<?php

	$sticky_posts = get_option( 'sticky_posts' );
	$sticky_count = count( $sticky_posts );
	$posts_per_page = 3 - $sticky_count;

	$args = array(
		'posts_per_page' => $posts_per_page
	);

	?>

	<?php $the_query = new WP_Query( $args ); ?>

	<?php if ( $the_query->have_posts() ) : ?>

		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<article>

				<div class="entry-thumbnail">
					<?php the_post_thumbnail( 'fathom-archive' ); ?>
				</div>

				<header class="entry-header">

					<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>

					<div class="entry-byline">
						<span <?php hybrid_attr( 'entry-author' ); ?>><?php the_author_posts_link(); ?></span>
						<time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
						<?php comments_popup_link( number_format_i18n( 0 ) . ' comments', number_format_i18n( 1 ) . ' comment', '% comments', 'comments-link', 'Comments Off' ); ?>
					</div><!-- .entry-byline -->

				</header><!-- .entry-header -->

				<div <?php hybrid_attr( 'entry-summary' ); ?>>
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->

			</article>

		<?php endwhile; ?>

		<?php wp_reset_postdata(); ?>

	<?php endif; ?>

	</div>

	<h3 class="section-title">
		<span></span>
		<span class="text">
			<?php _e( 'Articles', 'fathom' ); ?>
		</span>
		<span></span>
	</h3>

	<div class="article-list">

	<?php $args = array(
		'posts_per_page' => get_option( 'posts_per_page' ),
		'offset' => 3
	); ?>

	<?php $the_query = new WP_Query( $args ); ?>

	<?php if ( $the_query->have_posts() ) : ?>

		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<article>

				<div class="entry-thumbnail">
					<?php the_post_thumbnail( 'fathom-archive' ); ?>
				</div>

				<div class="entry-body">
					<header class="entry-header">

						<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>

						<div class="entry-byline">
							<span <?php hybrid_attr( 'entry-author' ); ?>><?php the_author_posts_link(); ?></span>
							<time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
							<?php comments_popup_link( number_format_i18n( 0 ) . ' comments', number_format_i18n( 1 ) . ' comment', '% comments', 'comments-link', 'Comments Off' ); ?>
						</div><!-- .entry-byline -->

					</header><!-- .entry-header -->

					<div <?php hybrid_attr( 'entry-summary' ); ?>>
						<?php the_excerpt(); ?>
					</div><!-- .entry-summary -->
				</div>

			</article>

		<?php endwhile; ?>

		<?php wp_reset_postdata(); ?>

	<?php endif; ?>

	</div>

</main><!-- #content -->

<?php get_footer(); // Loads the footer.php template. ?>
<?php get_header(); ?>

<main id="main" class="main" role="main">

	<div class="wrap">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : ?>

				<?php the_post(); ?>

				<?php get_template_part( 'content/content', get_post_type() ); ?>

				<?php comments_template( '', true ); // Loads the comments.php template. ?>

			<?php endwhile; ?>

			<?php locate_template( array( 'misc/loop-nav.php' ), true ); ?>

		<?php endif; ?>

	</div>

</main><!-- #site-content -->

<?php get_footer(); ?>
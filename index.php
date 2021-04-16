<?php get_header(); ?>

<main id="main" class="main" role="main">

	<div class="content-wrap">

		<?php if ( ! is_front_page() && is_archive() ) : ?>

			<?php locate_template( array( 'misc/archive-header.php' ), true ); ?>

		<?php endif; // End check for multi-post page. ?>

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : ?>

				<?php the_post(); ?>

				<?php get_template_part( 'content/content', get_post_type() ); ?>

			<?php endwhile; ?>

			<?php locate_template( array( 'misc/loop-nav.php' ), true ); ?>

		<?php endif; ?>

	</div>

	<?php locate_template( array( 'sidebar/blog.php' ), true ); ?>

</main><!-- #content -->

<?php get_footer(); ?>
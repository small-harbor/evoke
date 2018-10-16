<?php
/**
 * Template Name: Beaver Builder
 *
 * @package WordPress
 * @subpackage Fathom
 * @since Fathom 1.0
 */

get_header(); // Loads the header.php template. ?>

<main <?php hybrid_attr( 'content' ); ?>>

	<?php if ( have_posts() ) : // Checks if any posts were found. ?>

		<?php while ( have_posts() ) : // Begins the loop through found posts. ?>

			<?php the_post(); // Loads the post data. ?>

			<article <?php hybrid_attr( 'post' ); ?>>

				<div <?php hybrid_attr( 'entry-content' ); ?>>
					<?php the_content(); ?>
				</div><!-- .entry-content -->

			</article><!-- .entry -->

		<?php endwhile; // End found posts loop. ?>

	<?php endif; // End check for posts. ?>

</main><!-- #content -->

<?php get_footer(); // Loads the footer.php template. ?>
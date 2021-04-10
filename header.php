<!DOCTYPE html>
<html <?php language_attributes( 'html' ); ?>>

<head class="head">
<?php wp_head(); // Hook required for scripts, styles, and other <head> items. ?>
</head>

<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
} ?>
<div id="container" class="off-canvas-wrapper">

	<div class="off-canvas position-left" id="offCanvas" data-off-canvas data-transition="<?php echo current_theme_supports( 'offcanvas-overlap' ) ? 'overlap' : 'push' ?>">
		<?php get_template_part( 'menu/mobile' ); ?>
	</div>

	<div class="off-canvas-content" data-off-canvas-content>

		<div class="skip-link">
			<a href="#content" class="screen-reader-text"><?php esc_html_e( 'Skip to content', 'fathom' ); ?></a>
		</div><!-- .skip-link -->

		<header class="header">

			<nav class="title-bar" data-responsive-toggle="responsive-menu" data-hide-for="medium">
				<button type="button" class="menu-icon" data-toggle="offCanvas"></button>
				<div class="title-bar-title">
					<?php bloginfo( 'name' ); ?>
				</div>
			</nav>

			<div class="top-bar show-for-medium" data-topbar>

				<div class="top-bar-title <?php echo get_theme_mod( 'header_text', true ) ? 'has-text' : 'has-image'; ?>">
					<ul class="branding">
						<li class="name"><?php printf( '<h1 class="site-title"><a href="%s" rel="home">%s</a></h1>', esc_url( home_url() ), get_bloginfo( 'name' ) ); ?></li>
						<li class="description"><?php get_bloginfo( 'description' ); ?></li>
					</ul><!-- #branding -->
				</div>

				<?php get_template_part( 'menu/primary' ); // Loads the menu/primary.php template. ?>

			</div>

		</header><!-- #header -->

		<?php locate_template( array( 'misc/hero.php' ), true ); // Loads the misc/hero.php template. ?>

<!DOCTYPE html>
<html <?php language_attributes( 'html' ); ?>>

<head class="head">
<?php wp_head(); // Hook required for scripts, styles, and other <head> items. ?>
</head>

<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
} ?>
<div id="container">

	<div class="skip-link">
		<ul>
			<li><a href="#content" class="screen-reader-text"><?php esc_html_e( 'Skip to content', 'fathom' ); ?></a></li>
		</ul>
	</div><!-- .skip-link -->

	<header class="header site-header">

		<div class="header-wrap">

			<div class="site-branding <?php echo get_theme_mod( 'header_text', true ) ? 'has-text' : 'has-image'; ?>">
				<?php if ( ( is_front_page() || is_home() ) && ! is_paged() ) : ?>
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url() ); ?>" rel="home"><?php echo get_bloginfo( 'name' ); ?></a>
					</h1>
				<?php else : ?>
					<div class="site-title">
						<a href="<?php echo esc_url( home_url() ); ?>" rel="home"><?php echo get_bloginfo( 'name' ); ?></a>
					</div>
				<?php endif; ?>
				<p class="site-description">
					<?php echo get_bloginfo( 'description' ); ?>
				</p>
			</div>

			<?php get_template_part( 'menu/primary' ); ?>

		</div>

	</header><!-- #header -->
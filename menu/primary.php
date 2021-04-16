<?php if ( has_nav_menu( 'primary' ) ) : // Check if there's a menu assigned to the 'primary' location. ?>

	<nav id="site-navigation" class="site-navigation main-navigation">

		<button id="menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
			<span><?php esc_html_e( 'Primary Menu', 'wuqi' ); ?></span>
		</button>

		<?php wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container_id'    => 'menu-primary-container',
				'menu_id'         => 'menu-primary'
			)
		); ?>

	</nav><!-- #menu-primary -->

<?php endif; // End check for menu. ?>
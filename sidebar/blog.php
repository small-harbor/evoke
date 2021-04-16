<?php if ( is_home() || is_archive() ) : ?>

	<aside class="sidebar sidebar-blog">

		<?php if ( is_active_sidebar( 'blog' ) ) : ?>

			<?php dynamic_sidebar( 'blog' ); ?>

		<?php endif; ?>

	</aside>

<?php endif; ?>
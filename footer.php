<?php
/**
 * The footer
 */
?>
	<footer class="footer">

		<div class="footer-wrap">

			<div class="colophon">

				<p class="credit">
					<?php printf(
						// Translators: 1 is current year, 2 is site name/link, 3 is WordPress name/link, and 4 is theme name/link.
						esc_html__( 'Copyright &#169; %1$s %2$s. Powered by %3$s and %4$s.', 'fathom' ),
						date_i18n( 'Y' ), fathom_get_site_link(), fathom_get_wp_link(), fathom_get_theme_link()
					); ?>
				</p><!-- .credit -->

			</div>

		</div>

	</footer><!-- #footer -->

</div><!-- #container.off-canvas-wrapper -->

<?php wp_footer(); ?>

</body>
</html>

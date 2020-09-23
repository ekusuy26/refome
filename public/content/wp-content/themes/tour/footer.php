<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "body-content-wrapper" div and all content after.
 *
 * @subpackage Tour
 * @author ayatemplates
 * @since Tour 1.0.0
 *
 */
?>
			<a href="#" class="scrollup"></a>

			<footer id="footer-main">

				<div id="footer-content-wrapper">

					<?php get_sidebar('footer'); ?>

					<div class="clear">
					</div>

					<nav id="footer-menu">
						<?php wp_nav_menu( array( 'theme_location' => 'footer', ) ); ?>
					</nav>

					<div class="clear">
						<div id="fsocial">
							<ul class="footer-social-widget">
								<?php tour_display_social_sites(); ?>
							</ul>
						</div>
					</div>

				</div><!-- #footer-content-wrapper -->

			</footer>
			<div id="footer-bottom-area">
				<div id="footer-bottom-content-wrapper">
					<div id="copyright">

						<p>
						 <?php tour_show_copyright_text(); ?> <a href="<?php echo esc_url( 'https://ayatemplates.com/product/tour' ); ?>" title="<?php esc_attr_e( 'tour Theme', 'tour' ); ?>">
							<?php esc_html_e('Tour Theme', 'tour'); ?></a> <?php esc_attr_e( 'powered by', 'tour' ); ?> <a href="<?php echo esc_url( 'http://wordpress.org/' ); ?>" title="<?php esc_attr_e( 'WordPress', 'tour' ); ?>">
							<?php esc_html_e('WordPress', 'tour'); ?></a>
						</p>
						
					</div><!-- #copyright -->
				</div>
			</div><!-- #footer-main -->

		</div><!-- #body-content-wrapper -->
		<?php wp_footer(); ?>
	</body>
</html>
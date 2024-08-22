<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FWD_Starter_Theme
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-contact">
			
		</div><!-- .footer-contact -->
		<div class="footer-menus">
				<nav class="footer-navigation">
					
					<?php 
					if (!is_page(6)) {
						echo "<p>";
						the_field('address_field', 6); 
						echo "</p>";
					}
					?>
					<?php wp_nav_menu( array( 'theme_location' => 'footer-left' )); ?>
				</nav>
				<nav class="footer-navigation">
				<?php 
					if (!is_page(6)) {
						echo "<p>";
						the_field('email_field', 6); 
						echo "</p>";
					}
					?>
				<?php wp_nav_menu( array( 'theme_location' => 'footer-right' )); ?>
				</nav>
		</div><!-- .footer-menus -->
		<div class="site-info">
			<p><?php the_privacy_policy_link(); ?></p>
			<?php esc_html_e( 'Created by ', 'fwd' ); ?><a href="<?php echo esc_url( __( 'https://wp.bcitwebdeveloper.ca/', 'fwd' ) ); ?>"><?php esc_html_e( 'Jonathon Leathers', 'fwd' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

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
				<nav class="footer-nav-left">
					<?php 
					if (!is_page(6)) {
						
						echo "<div class='footer-address'>";
						echo "<p>";
						get_template_part( 'images/location' );
						echo "</p>";
						echo "<p>";
						the_field('address_field', 6); 
						echo "</p>";
						echo "</div>";
					}
					?>
					<?php wp_nav_menu( array( 'theme_location' => 'footer-left' )); ?>
				</nav>
				<nav class="footer-nav-right">
				<?php 
					if (!is_page(6)) {
						echo "<p>";
						the_field('email_field', 6); 
						echo "</p>";
					}
					?>
				<div class="footer-social-link">
					<a href="instagram.com"><?php get_template_part( 'images/instagram' ); ?></a> 
					<a href="facebook.com"><?php get_template_part( 'images/facebook' ); ?></a> 
				</div>
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

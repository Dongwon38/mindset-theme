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
					<?php wp_nav_menu( array( 'theme_location' => 'footer-left' )); ?>
				</nav>
				<nav class="footer-navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'footer-right' )); ?>
				</nav>
		</div><!-- .footer-menus -->
		<div class="site-info">
			<?php
				if(function_exists('get_privacy_policy_url')):
			?>
<p>
<a href="<?php echo esc_attr( esc_url( get_privacy_policy_url() ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'fwd' ) ?></a>
		</p>
			<?php endif;?>
			<?php esc_html_e( 'Created by ', 'fwd' ); ?><a href="<?php echo esc_url( __( 'https://wp.bcitwebdeveloper.ca/', 'fwd' ) ); ?>"><?php esc_html_e( 'Jonathon Leathers', 'fwd' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

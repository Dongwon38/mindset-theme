<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php fwd_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		if(function_exists('get_field')) {
			if(get_field('address_field')) {
				echo '<p>';
				the_field('address_field');
				echo '</p>';						
			}
			
			if(get_field('email_field')) {
				echo '<p>';
				the_field('email_field');
				echo '</p>';
			}

			// $email = get_field('email_field');
			// $mailto = 'mailto: $email';
			// <a href = echo esc_url ($mailto)> esc_html($email)


		}
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fwd' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php fwd_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			// 아티클이 들어가는 자리


			get_template_part( 'template-parts/content', 'page' );

			$args = array ( 
				'post_type'		 => 'fwd-service',
				'posts_per_page' => -1,
				'order'		=> 'ASC',
				'orderby'		=> 'title',
			);
			$query = new WP_Query( $args );
			if ($query -> have_posts()) {
				while ($query -> have_posts()) {
					$query -> the_post();
					echo "<a href='#".get_the_ID()."'>";
					the_title();
					echo "</a>";
				}
				wp_reset_postdata();
			}

			$query = new WP_Query( $args );
			if ($query -> have_posts()) {
				while ($query -> have_posts()) {
					$query -> the_post();
					echo '<h3 id='.esc_attr(get_the_ID()).'>';
					the_title();
					echo "</h3>";
					echo "<p>";
					esc_html(the_content());
					echo "</p>";
				}
				wp_reset_postdata();
			}
		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php
get_sidebar();
get_footer();

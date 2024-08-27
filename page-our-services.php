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

			// article id post php the id(); php post_class()

			// header class entry-header, php the title h1 class entry0itle h1 header

			//  div class entry-content 
			//  php the content
			// nav
			// type 1
			// type 2
			//
			// </div>
			// </article>
			get_template_part( 'template-parts/content', 'page' );
			

			// Navigation
			$args = array(
				'post_type'      => 'fwd-service',
				'posts_per_page' => -1,
				'order'          => 'ASC',
				'orderby'        => 'title'
			);
			
			$query = new WP_Query( $args );
			
			if ( $query -> have_posts() ) {
				echo '<nav>';
				while ( $query -> have_posts() ) {
					$query -> the_post();
					echo '<a href="#'. esc_attr( get_the_ID() ) .'">'. esc_html( get_the_title() ) .'</a>';
				}
				wp_reset_postdata();
				echo '</nav>';
			}

			$taxonomy = 'fwd-service-type';
			$terms = get_terms (
				array (
					'taxonomy' => $taxonomy
				)
				);
			if ($terms && ! is_wp_error($terms)) {
				foreach($terms as $term) {
					$args = array(
						'post_type'	=> 'fwd-service',
						'posts_per_page' => -1,
						'order' => 'ASC',
						'orderby' => 'title',
						'tax_query' => array (
							array (
								'taxonomy' => $taxonomy,
								'field' => 'slug',
								'terms' => $term ->slug,
							)
							),
					);

					
					$query = new WP_Query ($args);
					if ($query -> have_posts()) {
						echo '<h2>' . esc_html( $term -> name ) . '</h2>';

						// Output Content
						while ( $query -> have_posts()) {
							$query -> the_post();

							echo '<h3 id='.esc_attr(get_the_ID()).'>';
							the_title();
							echo "</h3>";
							echo "<p>";
							esc_html(the_content());
							echo "</p>";
		
							// if (function_exists('get_field')) {
							// 	if (get_field('service_text')) {
							// 		echo '<h3 id="'. esc_attr(get_the_ID()) . '">' . esc_html(get_the_title()) . '</h3>';
							// 		the_field( 'service_text' );
							// 	}
							// }
						}
					}
				wp_reset_postdata();					
				}
			}



		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php
get_sidebar();
get_footer();



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
			the_post();?>

			<!-- post start  -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<!-- title -->
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>'); ?>
				</header>


				<!-- entry content start -->
				<div class="entry-content">
					<?php the_content(); ?>

					<!-- Navigation -->
					 <?php
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

					// Taxonomy
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

							if ( function_exists( 'get_field' ) ) {
								if ( get_field( 'service_text' ) ) {
									echo '<h2>'. esc_html( get_the_title() ) .'</h2>';
									the_field( 'service_text' );
								}
							}
						}
					}
					wp_reset_postdata();					
					}
				}
				?>
				</div>

				</article>

			<?php
			get_template_part( 'template-parts/content', 'page' );
			
		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php
get_sidebar();
get_footer();



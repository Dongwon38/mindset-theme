<?php
/**
 * The template for displaying the Home page
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
			?>

			<section class="home-intro">
				<h1><?php the_title(); ?></h1>
				<?php the_post_thumbnail( 'large' ); ?>
				<?php 
				if (function_exists( 'get_field')) {
					if (get_field('top_section')) {
						the_field('top_section');
					}
				}
				?>
			</section>

			<section class="home-work">
				<h2><?php esc_html_e( 'Featured Works', 'fwd' ); ?></h2>
				<div class="featured-works-container">
			<?php
			$args = array(
				'post_type' 	 => 'fwd-work',
				'posts_per_page' => 4,
				'tax_query'		 => array(
					array(
						'taxonomy'	=> 'fwd-featured',
						'field'		=> 'slug',
						'terms'		=> 'front-page'
					),
				)
			);
			$query = new WP_Query ( $args );
			if ( $query -> have_posts() ){
				while ( $query -> have_posts() ) {
					$query -> the_post();
					?>
					<article class="front-portfolio">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'medium' ); ?>							
							<h3><?php the_title(); ?></h3>
						</a>
					</article>
					<?php
					wp_reset_postdata();
					}
				}
				?>
					</div>
				<h2><?php esc_html_e( 'Featured Works with Relationship field', 'fwd' ); ?></h2>
				<div class="featured-works-rel-container">
				<?php
				if (function_exists('get_field')) :
						$featured_works = get_field('featured_works');
						if($featured_works) : 
							foreach($featured_works as $post) :
								setup_postdata($post);
					?>
					<!-- contents here -->
					<article class="front-portfolio">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'medium' ); ?>							
							<h3><?php the_title(); ?></h3>
						</a>
					</article>

					<?php
					endforeach; ?>
												</div> <?php
				wp_reset_postdata();
				endif;
		endif;
			?>

			</section>


			<section class="home-left">
				<?php 
				if(function_exists('get_field')) {
					if(get_field('left_section_heading')) {
						echo '<h2>';
						the_field('left_section_heading');
						echo '</h2>';						
					}
					
					if(get_field('left_section_content')) {
						echo '<p>';
						the_field('left_section_content');
						echo '</p>';
					}
				}
				?>
			</section>

			<section class="home-right">
				<?php 	
					if(function_exists('get_field')) {
						if(get_field('right_section_heading')) {
							echo '<h2>';
							the_field('right_section_heading');
							echo '</h2>';						
						}
						
						if(get_field('right_section_content')) {
							echo '<p>';
							the_field('right_section_content');
							echo '</p>';
						}
					}
				?>
			</section>

			<section class="home-slider">
				<?php 
				$args = array (
					'post_type' => 'fwd-testimonial',
					'posts_per_page' => -1
				);
				$query = new WP_Query($args);
				if ($query -> have_posts()) : ?>
					<div class="swiper">
						<div class="swiper-wrapper">
							<?php while( $query -> have_posts()) :
								$query -> the_post(); ?>
								<div class="swiper-slide">
									<?php the_content(); ?>
								</div>
							<?php
							endwhile;
							wp_reset_postdata(); 
							?>
						</div>
						<!-- If we need pagination -->
						<div class="swiper-pagination"></div>

						<!-- If we need navigation buttons -->
						<button class="swiper-button-prev"></button>
						<button class="swiper-button-next"></button>
					</div>
				<?php endif ?>
			</section>

			<section class="home-blog">
				<h2><?php esc_html_e( 'Latest Blog Posts', 'fwd' ); ?></h2>
				<?php
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 4,
				);
				$blog_query = new WP_Query( $args );
				if ( $blog_query -> have_posts() ) {
					echo "<div class='blog-wrapper'>";
					
					while ( $blog_query -> have_posts() ) {
						$blog_query -> the_post();
						?>
						<article>
							<a href="<?php the_permalink(); ?>">
								<?php echo the_post_thumbnail( '400x200' ); ?>
								<h3><?php echo the_title(); ?></h3>
								<time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo esc_html (get_the_date()); ?></time>
							</a>
						</article>
						<?php
					}
					wp_reset_postdata();
					echo "</div>";
				}
				?>
			</section>
			
			<?php 
		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php 
get_footer();
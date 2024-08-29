<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FWD_Starter_Theme
 */
?>

<aside id="secondary" class="widget-area">
	<?php 
	if ( is_page() ) {
		dynamic_sidebar( 'sidebar-2' ); 
		?>
		<h2><?php esc_html_e( 'Latest Blog Post', 'fwd' ); ?></h2>
		<?php
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 1,
		);
		$blog_query = new WP_Query( $args );
		if ( $blog_query -> have_posts() ) {
			
			
			while ( $blog_query -> have_posts() ) {
				$blog_query -> the_post();
				?>
				<article class="sidebar-latest-blog-post">
					<a href="<?php the_permalink(); ?>">
						<h3><?php echo the_title(); ?></h3></a>
						<time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo esc_html (get_the_date()); ?></time>
						<?php the_excerpt(); ?>
					
				</article>
				<?php
			}
			wp_reset_postdata();
		}
		?>
		<?php
	} else {
		dynamic_sidebar( 'sidebar-1' ); 
	}
	?>

	<?php

	get_template_part('template-parts/work-categories'); 
	get_template_part( 'template-parts/testimonial', 'random' );
	?>

</aside><!-- #secondary -->

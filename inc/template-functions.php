<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package FWD_Starter_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function fwd_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'fwd_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function fwd_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'fwd_pingback_header' );

// Remove Archive Title Prefix
function fwd_archive_title_prefix( $prefix ){
    if ( get_post_type() === 'fwd-work' || 'job-posting' ) {
        return false;
    } else {
        return $prefix;
    }
}
add_filter( 'get_the_archive_title_prefix', 'fwd_archive_title_prefix' );


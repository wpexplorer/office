<?php
/**
 * This file filters the default WP pagination where needed
 *
 * @package WordPress
 * @subpackage Office
 * @since Office 1.0
*/

$wpex_option_posts_per_page = get_option( 'posts_per_page' );
add_action( 'init', 'wpex_modify_posts_per_page', 0);

if ( ! function_exists( 'wpex_modify_posts_per_page' ) ) {
	
	function wpex_modify_posts_per_page() {
		add_filter( 'option_posts_per_page', 'wpex_option_posts_per_page' );
	}

}

if ( ! function_exists ( 'wpex_option_posts_per_page' ) ) {
	
	function wpex_option_posts_per_page( $value ) {
		global $wpex_option_posts_per_page;
		
		// Portfolio
		if ( is_tax('portfolio_cats') || is_post_type_archive('portfolio') ) {
			return wpex_get_data('portfolio_cat_pagination', '12');
		}
		
		// Staff
		if ( is_tax( 'staff_departments') || is_post_type_archive('staff') ) {
			return wpex_get_data('staff_cat_pagination', '-1');
		}
		
		// Everything else
		else {
			return $wpex_option_posts_per_page;
		}
	}

}
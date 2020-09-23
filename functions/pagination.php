<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 */

if ( ! function_exists('wpex_pagination') ) {
	
	function wpex_pagination() {
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			 if( !$current_page = get_query_var('paged') )
				 $current_page = 1;
			 if( get_option('permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			echo paginate_links(array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => $format,
				'current' => max( 1, get_query_var('paged') ),
				'total' => $total,
				'mid_size' => 3,
				'type' => 'list',
				'prev_next' => false,
				'next_text' => '&raquo;',
				'prev_text' => '&laquo;',
			 ));
		}
	}
	
}



/**
 * Custom page entry pagination function
 * @package Foxy Portfolio WordPress Theme
 * @since 1.0
 *
 */
  
  
if ( !function_exists('wpex_pagejump') ) {
	
	function wpex_pagejump($pages = '', $range = 4) {
		
		 $showitems = ($range * 2)+1; 
		 global $paged;
		 if ( empty($paged) ) $paged = 1;
		 
		 if ( $pages == '' ) {
			 global $wp_query;
			 $pages = $wp_query->max_num_pages;
			 if(!$pages) {
				 $pages = 1;
			 }
		 }  
	 
		 if ( 1 != $pages ) {
			echo '<div class="post-navigation clr"><div class="alignleft">';
			previous_posts_link( '&larr; ' . __('Newer Posts', 'office' ) );
			echo '</div><div class="alignright">';
			next_posts_link( __('Older Posts', 'office' ) .' &rarr;' );
			echo '</div></div>';
		 }
		 
	}

}
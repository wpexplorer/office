<?php
/**
 * Useful excerpt functions
 *
 * @package WordPress
 * @subpackage Office
 * @since Office 1.0
 */
 

// Limit Post Word Count
add_filter('excerpt_length', 'wpex_excerpt_length');
if ( !function_exists('wpex_excerpt_length') ) {
	function wpex_excerpt_length($length) {
		return wpex_get_data('blog_excerpt','60');
	}
}


// Replace Excerpt Link
add_filter('excerpt_more', 'wpex_excerpt_more');
if ( !function_exists('wpex_excerpt_more') ) {
	function wpex_excerpt_more($more) {
		global $post;
		return '...<a href="'. get_permalink($post->ID) . '">'.__('read more','office').' &rarr;</a>';
	}
}


// Custom excerpts function
function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt).'...';
	} else {
	$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
	}
	 
	function content($limit) {
	$content = explode(' ', get_the_content(), $limit);
	if (count($content)>=$limit) {
	array_pop($content);
	$content = implode(" ",$content).'...';
	} else {
	$content = implode(" ",$content);
	}
	$content = preg_replace('/[.+]/','', $content);
	$content = apply_filters('the_content', $content);
	$content = str_replace(')]>', ')]&gt;', $content);
	return $content;
}
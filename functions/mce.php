<?php
/**
 * Useful MCE editor functions
 *
 * @package WordPress
 * @subpackage Office
 * @since Office 1.0
 */
 
// Enable more post editor buttons
if ( !function_exists('wpex_enable_more_buttons') ) {
	add_filter("mce_buttons_2", "wpex_enable_more_buttons");
	function wpex_enable_more_buttons($buttons) {
	  $buttons[] = 'fontselect';
	  $buttons[] = 'fontsizeselect';
	  return $buttons;
	}
}
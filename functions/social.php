<?php
/**
 * Array of social sites and HTML output
 *
 * @package WordPress
 * @subpackage Office
 * @since Office 1.0
 */
 
 
// Create Social Array
if ( !function_exists('wpex_social_links') ) {
	
	function wpex_social_links() {
				
		$social_icons = array('twitter','dribbble','forrst','flickr','google','googleplus','pinterest','facebook','linkedin','youtube','vimeo','rss','support','mail');		
			
		return apply_filters('wpex_social_links', $social_icons);
				
	}
	
}
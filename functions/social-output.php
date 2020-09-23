<?php
/**
 * Outputs your social links
 *
 * @package WordPress
 * @subpackage Office
 * @since Office 1.0
 */


if ( !function_exists('wpex_display_social') ) {
	
	function wpex_display_social() {
		
		$wpex_social_links = wpex_social_links();
		$social_style = ( wpex_get_data('social_style') !== 'one' ) ? wpex_get_data('social_style') : NULL;
		
		if ( !$wpex_social_links ) return;
		
		$output = '<ul id="social" class="clearfix">';
			
				foreach ( $wpex_social_links as $social_link ) {
					
					if ( $link = esc_url( wpex_get_data($social_link) ) ) {
					
						$output .= '<li class="'. $social_link .'"><a href="'. $link .'" title="'. esc_attr( $social_link ) .'" target="_blank" class="office-tooltip"><img src="'. get_template_directory_uri() .'/images/social'. $social_style .'/'.$social_link.'.png" alt="'. $social_link .'" /></a></li>';
					
					}
					
				}
				
		$output .= '</ul><!-- #social -->';
		
		echo apply_filters('wpex_display_social', $output);
	}
	
}
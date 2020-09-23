<?php
/**
 * Displays a custom login logo for WP
 *
 * @package WordPress
 * @subpackage Office
 * @since Office 1.0
 */

add_action('login_head', 'wpex_custom_login_logo');
 
if ( ! function_exists('wpex_custom_login_logo') ) :

	function wpex_custom_login_logo() {

		if( wpex_get_data('custom_login_logo') !== '' ) {
			$custom_login_logo_css = '';
			$custom_login_logo_css .= '<style type="text/css">';
			$custom_login_logo_css .= 'h1 a {';
			$custom_login_logo_css .= 'background-image:url('. wpex_get_data('custom_login_logo') .') !important;width: auto !important;background-size: auto !important;';
			if(wpex_get_data('custom_login_logo_height')) {
				$custom_login_logo_css .= 'height: '.wpex_get_data('custom_login_logo_height').' !important;';
			}
			$custom_login_logo_css .= '}</style>';
	
			echo $custom_login_logo_css;
		}
	}

endif;
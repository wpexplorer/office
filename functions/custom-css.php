<?php
/**
 * Adds custom CSS to the wp_head() hook.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Office
 * @since Office 1.0
 */

if ( !function_exists( 'wpex_custom_css' ) ) {
	
	add_action('wp_head', 'wpex_custom_css');
	function wpex_custom_css() {
			
			$custom_css ='';
			
			/**custom css field**/
			if(wpex_get_data('custom_css')) {
				$custom_css .= wpex_get_data('custom_css');
			}
			
			//background image
			$custom_background = wpex_get_data('custom_bg');
			if( $custom_background == '' || $custom_background == get_template_directory_uri().'/images/bg/bg0.png' ) {
			} elseif( $custom_background !== '' && $custom_background !== get_template_directory_uri().'/images/bg/bg_20.png') {
				$custom_css .= 'body{background-image: url('. $custom_background .');}';
			} else {
				$custom_css .= 'body{background-image: none;}';
			}
			
			//background color
			if( wpex_get_data('background_color', '#d9d9d9') !== '#d9d9d9') {
				$custom_css .= 'body{background-color: '.wpex_get_data('background_color').';}';
			}
			
			//header padding
			if(wpex_get_data('header_padding') && wpex_get_data('header_padding') !==  '25px'){
				$custom_css .= '#header{padding-top: '.wpex_get_data('header_padding').'; padding-bottom: '.wpex_get_data('header_padding').';}';
			}
			
			//logo margin
			if(wpex_get_data('logo_top_margin') && wpex_get_data('logo_top_margin') !==  '0px'){
				$custom_css .= '#logo{margin-top: '.wpex_get_data('logo_top_margin').';}';
			}
			
			//header-aside
			if(wpex_get_data('header_aside_margin') && wpex_get_data('header_aside_margin') !==  '0px'){
				$custom_css .= '#header-aside{margin-top: '.wpex_get_data('header_aside_margin').';}';
			}
			
			//highlight color
			if(wpex_get_data('highlight_color') !== '#fc6440') {
				$custom_css .= '.sf-menu a:hover,
								#navigation .sf-menu > .current-menu-item > a,
								#navigation .sf-menu > .current-menu-parent > a,
								a#top-bar-callout,
								#service-tabs li.active a,
								.heading a:hover span, .post-date,
								#carousel-pagination a.selected,
								#faqs-cats a:hover,
								#faqs-cats .active,
								#full-slides .flex-prev:hover,
								#full-slides .flex-next:hover,
								#footer .tagcloud a:hover { background-color: '.wpex_get_data('highlight_color').'; }';
							
				$custom_css .= '
								.office-flickr-widget a:hover,
								.widget-recent-portfolio a:hover,
								.home-entry a:hover img,
								.loop-entry-thumbnail a:hover img,
								ul.filter a.active,
								.gallery-photo a:hover img{ border-color: '.wpex_get_data('highlight_color').' !important;}';
				
				$custom_css .= '#faqs-cats .active:after{ border-top-color: '.wpex_get_data('highlight_color').' !important;}';
			}	
			
			//top bar
			if(wpex_get_data('top_bar_background') !== '#444') {
				$custom_css .= '#top-bar { background: '.wpex_get_data('top_bar_background').';}';
			}
			if(wpex_get_data('top_bar_color') !== '#bbb') {
				$custom_css .= '#top-bar, #top-bar-inner ul.top-menu a { color: '.wpex_get_data('top_bar_color').';}';
				$custom_css .= '#top-bar-inner ul.top-menu a:hover { opacity: 0.7; }';
			}
			
			//callout button
			if(wpex_get_data('callout_background') !== '#fc6440') {
				$custom_css .= 'a#top-bar-callout { background: '.wpex_get_data('callout_background').';}';
			}
			if(wpex_get_data('callout_background_hover') !== '#fc6440') {
				$custom_css .= 'a#top-bar-callout:hover { background: '.wpex_get_data('callout_background_hover').';}';
			}
			if(wpex_get_data('callout_color') !== '#fff') {
				$custom_css .= 'a#top-bar-callout { color: '.wpex_get_data('callout_color').';}';
			}
			if(wpex_get_data('callout_font_size') !== '13px') {
				$custom_css .= 'a#top-bar-callout { font-size: '.wpex_get_data('callout_font_size').'; }';
			}
			if(wpex_get_data('callout_font_style') == 'normal') {
				$custom_css .= 'a#top-bar-callout { font-weight: normal; }';
			}
			if(wpex_get_data('callout_font_style') == 'italic') {
				$custom_css .= 'a#top-bar-callout { font-style: italic; font-weight: normal; }';
			}
			if(wpex_get_data('callout_font_style') == 'bold italic') {
				$custom_css .= 'a#top-bar-callout { font-style: italic; }';
			}
			
			//header
			if(wpex_get_data('header_background') !== '#FFF') {
				$custom_css .= '#header { background: '.wpex_get_data('header_background').';}';
			}
			if(wpex_get_data('header_color') !== '#444') {
				$custom_css .= '#header, #logo a { color: '.wpex_get_data('header_color').';}';
			}
			
			//tagline link color
			if(wpex_get_data('home_tagline_link_color') !== '#fc6440') {
				$custom_css .= '
						#home-tagline a{color: '.wpex_get_data('home_tagline_link_color').';
						border-color: '.wpex_get_data('home_tagline_link_color').';}';
			}
			
			//body link color
			if(wpex_get_data('main_link_color') !== '#ec651b') {
				$custom_css .= 'h2 a:hover,
								h3 a:hover,
								h4 a:hover,
								body p a,
								a h2:hover,
								a h3:hover,
								a h4:hover,
								#breadcrumbs a,
								#sidebar a,
								.post-tags a,
								.comment-author .url,
								.comment-reply-link { color: '.wpex_get_data('main_link_color').';}';
				$custom_css .='.tagcloud a{ color: inherit !important; }';
			}
			
			//navigation color
			if(wpex_get_data('nav_bg_color') !== '#2b2b2b') {
				$custom_css .= '#navigation,
								.sf-menu, #navigation a,
								#navigation .selector option {background-color: '.wpex_get_data('nav_bg_color').' !important;}';
			}
			if(wpex_get_data('nav_hover_color') !== '#fc6440') {
				$custom_css .= '#navigation a:hover{background-color: '.wpex_get_data('nav_hover_color').' !important;}';
			}
			if(wpex_get_data('nav_link_hover_color') !== '#FFF') {
				$custom_css .= '#navigation a:hover{color: '.wpex_get_data('nav_link_hover_color').' !important;}';
			}
			if(wpex_get_data('nav_link_color') !== '#FFF') {
				$custom_css .= '#navigation a{color: '.wpex_get_data('nav_link_color').' !important;}';
			}
			if(wpex_get_data('nav_current_background_color') !== '#fc6440') {
				$custom_css .= '#navigation .sf-menu > .current-menu-item > a,
								#navigation .sf-menu > .current-menu-parent > a { background-color: '.wpex_get_data('nav_current_background_color').' !important;}';
			}
			if(wpex_get_data('nav_current_link_color') !== '#FFF') {
				$custom_css .= '#navigation .sf-menu > .current-menu-item > a,
								#navigation .sf-menu > .current-menu-parent > a { color: '.wpex_get_data('nav_current_link_color').' !important;}';
			}
			if(wpex_get_data('nav_light_border_color')!== '#3c3c3c') {
				$custom_css .= '.sf-menu { border-color: '.wpex_get_data('nav_light_border_color').' !important;} .sf-menu a { border-left-color: '.wpex_get_data('nav_light_border_color').' !important;}.sf-menu ul a{ border-top-color: '.wpex_get_data('nav_light_border_color').' !important;}';
			}
			if(wpex_get_data('nav_dark_border_color') !== '#111') {
				$custom_css .= '.sf-menu a { border-right-color: '.wpex_get_data('nav_dark_border_color').' !important;}.sf-menu ul a{ border-bottom-color: '.wpex_get_data('nav_dark_border_color').' !important;}.sf-menu ul, .sf-menu ul ul{border-top-color: '.wpex_get_data('nav_dark_border_color').' !important;}';
			}
			
			//navigation typography
			if(wpex_get_data('navigation_font_size') !== '13px') {
				$custom_css .= '#navigation, #navigation a { font-size: '.wpex_get_data('navigation_font_size').'; }';
			}
			if(wpex_get_data('navigation_font_style') == 'normal') {
				$custom_css .= '#navigation, #navigation a { font-weight: normal; }';
			}
			if(wpex_get_data('navigation_font_style') == 'italic') {
				$custom_css .= '#navigation, #navigation a { font-style: italic; font-weight: normal; }';
			}
			if(wpex_get_data('navigation_font_style') == 'bold italic') {
				$custom_css .= '#navigation, #navigation a { font-style: italic; }';
			}
			
			//slider caption color
			if(wpex_get_data('slider_caption_background_color') !== '#000') {
				$custom_css .= '#full-slides .caption{ background: '.wpex_get_data('slider_caption_background_color').';}';
			}
			if(wpex_get_data('slider_caption_color') !== '#FFF') {
				$custom_css .= '#full-slides .caption, #full-slides .caption h2, #full-slides .caption h3{ color: '.wpex_get_data('slider_caption_color').';}';
			}
			
			//menu border
			if( wpex_get_data('disable_menu_last_border' ) !== '1') {
				$custom_css .= '.sf-menu li:last-child a, .sf-menu{ border-right: none; }';
			}
			
			//tagline
			if(wpex_get_data('tagline_font_size') !== '28px') {
				$custom_css .= '#home-tagline { font-size: '.wpex_get_data('tagline_font_size').'; }';
			}
			if(wpex_get_data('tagline_font_style') == 'bold') {
				$custom_css .= '#home-tagline { font-weight: bold; }';
			}
			if(wpex_get_data('tagline_font_style') == 'italic') {
				$custom_css .= '#home-tagline { font-style: italic; font-weight: normal; }';
			}
			if(wpex_get_data('tagline_font_style') == 'bold italic') {
				$custom_css .= '#home-tagline { font-style: italic; font-weight: bold; }';
			}
				
			//footer
			if( wpex_get_data('footer_background') !== '#2b2b2b') {
				$custom_css .= '#footer { background: '. wpex_get_data('footer_background') .' }';
			}
			if( wpex_get_data('footer_color') !== '#cccccc') {
				$custom_css .= '#footer, #footer h3, #footer h4, #footer p, .footer-widget { color: '. wpex_get_data('footer_color') .' }';
			}
			if( wpex_get_data('footer_border') !== '#444444') {
				$custom_css .= '#footer li, #footer .widget_recent_entries li, .footer-widget h4 { border-color: '. wpex_get_data('footer_border') .' }';
			}
					
			
			//trim white space for faster page loading
			$custom_css_trimmed =  preg_replace( '/\s+/', ' ', $custom_css );
		
			//echo css
			$css_output = "<!-- Custom CSS -->\n<style type=\"text/css\">\n" . $custom_css_trimmed . "\n</style>";
			
			if(!empty($custom_css)) {
				echo $css_output;
			}
	}
	
}
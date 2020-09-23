<?php
/**
 * Creates a function for your featured image sizes which can be altered via your child theme
 *
 * @package WordPress
 * @subpackage Office
 * @since Office 1.0
*/
 
if ( ! function_exists( 'wpex_img' ) ) :

	function wpex_img($args){
		
		// Home Flexslider
		if( $args == 'home_slider_width' ) return '970';
		if( $args == 'home_slider_height' ) {
			if ( wpex_get_data('slider_height') !== '9999' ) {
				return wpex_get_data('slider_height');
			} else {
				return '9999';
			}
		}
		if( $args == 'home_slider_crop' ) {
			if ( wpex_get_data('slider_height') == '9999' ) {
				return false;
			} else {
				return true;
			}
		}
		
		// Page Flexslider
		if( $args == 'page_slider_width' ) return '970';
		if( $args == 'page_slider_height' ) return '9999';
		if( $args == 'page_slider_crop' ) return false;
		
		// Portfolio Carousel
		if( $args == 'portfolio_carousel_entry_width' ) return '215';
		if( $args == 'portfolio_carousel_entry_height' ) return '140';
		if( $args == 'portfolio_carousel_entry_crop' ) return true;
			
		// Portfolio Entries
		if( $args == 'portfolio_entry_width' ) return '215';
		if( $args == 'portfolio_entry_height' ) {
			if ( wpex_get_data('portfolio_entry_thumb_height') !== '' ) {
				return wpex_get_data('portfolio_entry_thumb_height');
			} else {
				return '140';
			}
		}
		if( $args == 'portfolio_entry_crop' ) return true;
		
		// Portfolio Post - Default
		if( $args == 'portfolio_post_width' ) return '500';
		if( $args == 'portfolio_post_height' ) {
			if ( wpex_get_data('portfolio_post_thumb_height') !== '' & wpex_get_data('portfolio_post_thumb_height') !== '9999' ) {
				return wpex_get_data('portfolio_post_thumb_height');
			} else {
				return '9999';
			}
		}
		if( $args == 'portfolio_post_crop' ) {
			if ( wpex_get_data('portfolio_post_thumb_height') !== '' & wpex_get_data('portfolio_post_thumb_height') !== '9999' ) {
				return true;
			} else {
				return false;
			}
		}
		
		// Portfolio Post - Full-Width
		if( $args == 'portfolio_post_full_width' ) return '970';
		if( $args == 'portfolio_post_full_height' ) {
			if ( wpex_get_data('portfolio_post_full_thumb_height') !== '' & wpex_get_data('portfolio_post_full_thumb_height') !== '9999' ) {
				return wpex_get_data('portfolio_post_full_thumb_height');
			} else {
				return '9999';
			}
		}
		if( $args == 'portfolio_post_full_crop' ) {
			if ( wpex_get_data('portfolio_post_full_thumb_height') !== '' & wpex_get_data('portfolio_post_full_thumb_height') !== '9999' ) {
				return true;
			} else {
				return false;
			}
		}
		
		// Search Entry
		if( $args == 'search_entry_width' ) return '215';
		if( $args == 'search_entry_height' ) return '140';
		if( $args == 'search_entry_crop' ) return true;
		
		// Staff
		if( $args == 'staff_entry_width' ) return '100';
		if( $args == 'staff_entry_height' ) return '100';
		if( $args == 'staff_entry_crop' ) return true;
	
		// Blog
		if( $args == 'home_blog_entry_width' ) return '430';	
		if( $args == 'home_blog_entry_height' ) return '138';
		if( $args == 'home_blog_entry_crop' ) return true;	
		
		if( $args == 'blog_entry_width' ) return '660';
		if( $args == 'blog_entry_height' ) {
			if ( wpex_get_data('blog_entry_thumb_height') !== '' ) {
				return wpex_get_data('blog_entry_thumb_height');
			} else {
				return '220';
			}
		}
		if( $args == 'blog_entry_crop' ) {
			if ( wpex_get_data('blog_entry_thumb_height') == '9999' ) {
				return false;
			} else {
				return true;
			}
		}
		
		if( $args == 'blog_entry_two_width' ) return '215';	
		if( $args == 'blog_entry_two_height' ) return '140';
		if( $args == 'blog_entry_two_crop' ) return true;
		
		if( $args == 'blog_post_width' ) return '660';
		if( $args == 'blog_post_height' ) {
			if ( wpex_get_data('blog_post_thumb_height') !== '' ) {
				return wpex_get_data('blog_post_thumb_height');
			} else {
				return '220';
			}
		}
		if( $args == 'blog_post_crop' ) {
			if ( wpex_get_data('blog_post_thumb_height') == '9999' ) {
				return false;
			} else {
				return true;
			}
		}
		
		// Gallery Template
		if( $args == 'gallery_template_width' ) return '205';
		if( $args == 'gallery_template_height' ) return '140';
		if( $args == 'gallery_template_crop' ) return true;
		
		// Gallery Template
		if( $args == 'grid_width' ) return '205';
		if( $args == 'grid_height' ) return '140';
		if( $args == 'grid_crop' ) return true;
		
	}

endif;
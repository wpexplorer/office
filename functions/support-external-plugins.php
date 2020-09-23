<?php
/**
 * Adds support for various external plugins
 *
 * @package WordPress
 * @subpackage Office
 * @since Office 1.0
 */
 
 
// Custom metabox plugin
if ( !function_exists( 'wpex_custom_be_gallery_metabox_post_types' ) ) :
	function wpex_custom_be_gallery_metabox_post_types( $classes ) {
			return array('portfolio','page');
	}
	add_filter( 'be_gallery_metabox_post_types', 'wpex_custom_be_gallery_metabox_post_types' );
endif;
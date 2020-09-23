<?php
/**
 * Registers custom post types for use with this theme
 *
 * @package WordPress
 * @subpackage Office
 * @since Office 1.0
*/

add_action( 'init', 'office_create_post_types' );

if ( !function_exists('office_create_post_types') ) {
	
	function office_create_post_types() {
		
		/******* Slider Post Type *******/
		register_post_type( 'Slides',
			array(
				'labels' => array(
					'name' => __( 'HP Slides', 'office' ),
					'singular_name' => __( 'Slide', 'office' ),
					'add_new' => _x( 'Add New', 'Slide', 'office' ),
					'add_new_item' => __( 'Add New Slide', 'office' ),
					'edit_item' => __( 'Edit Slide', 'office' ),
					'new_item' => __( 'New Slide', 'office' ),
					'view_item' => __( 'View Slide', 'office' ),
					'search_items' => __( 'Search Slides', 'office' ),
					'not_found' =>  __( 'No Slides found', 'office' ),
					'not_found_in_trash' => __( 'No Slides found in Trash', 'office' ),
					'parent_item_colon' => ''
					
				),
				'public' => true,
				'supports' => array('title','thumbnail','revisions','custom-fields'),
				'query_var' => true,
				'rewrite' => array( 'slug' => 'slides' ),
				'has_archive' => false,
				'show_in_nav_menus' => false,
				'menu_icon' => 'dashicons-images-alt2',
			)
		);

		/******* Home Highlights Post Type *******/
		register_post_type( 'hp_highlights',
			array(
				'labels' => array(
					'name' => __( 'HP Highlights', 'office' ),
					'singular_name' => __( 'Highlight', 'office' ),
					'add_new' => _x( 'Add New', 'Highlight', 'office' ),
					'add_new_item' => __( 'Add New Highlight', 'office' ),
					'edit_item' => __( 'Edit Highlight', 'office' ),
					'new_item' => __( 'New Highlight', 'office' ),
					'view_item' => __( 'View Highlight', 'office' ),
					'search_items' => __( 'Search Highlights', 'office' ),
					'not_found' =>  __( 'No Highlights found', 'office' ),
					'not_found_in_trash' => __( 'No Highlights found in Trash', 'office' ),
					'parent_item_colon' => ''
					
				),
				'public' => true,
				'supports' => array('title','editor','thumbnail','revisions','custom-fields'),
				'query_var' => true,
				'rewrite' => array( 'slug' => 'hp-highlights' ),
				'has_archive' => false,
				'show_in_nav_menus' => false,
				'menu_icon' => 'dashicons-star-filled',
			)
		);

		/******* Portfolio Post Type *******/
		$portfolio_slug = ( wpex_get_data('portfolio_post_type_slug') ) ? wpex_get_data('portfolio_post_type_slug') : 'portfolio';
		$portfolio_post_type_name = ( wpex_get_data('portfolio_post_type_name') ) ? wpex_get_data('portfolio_post_type_name') : __('Portfolio','office');
		$portfolio_labels = array( 'name' => $portfolio_post_type_name );
		
		register_post_type( 'Portfolio',
			array(
				'labels' => apply_filters('office_portfolio_labels', $portfolio_labels),
				'public' => true,
				'has_archive' => false,
				'supports' => array('title','editor','thumbnail','revisions','comments','custom-fields'),
				'query_var' => true,
				'rewrite' => array( 'slug' => $portfolio_slug ),
				'menu_icon' => 'dashicons-portfolio',
			)
		);

		/******* Staff Post Type *******/
		$staff_slug = ( wpex_get_data('staff_post_type_slug') ) ? wpex_get_data('staff_post_type_slug') : 'staff';
		$staff_post_type_name = ( wpex_get_data('staff_post_type_name') ) ? wpex_get_data('staff_post_type_name') : __('Staff','office');
		$staff_labels = array( 'name' => $staff_post_type_name );
		
		register_post_type( 'staff',
			array(
				'labels' => apply_filters('office_staff_labels', $staff_labels),
				'public' => true,
				'has_archive' => false,
				'supports' => array('title','thumbnail','editor','revisions','custom-fields','comments'),
				'menu_icon' => 'dashicons-groups',
				'query_var' => true,
				'rewrite' => array( 'slug' => $staff_slug ),
			)
		);

		/******* Services Post Type *******/
		$services_slug = ( wpex_get_data('services_post_type_slug') ) ? wpex_get_data('services_post_type_slug') : 'services';
		$services_post_type_name = ( wpex_get_data('services_post_type_name') ) ? wpex_get_data('services_post_type_name') : __('Services','office');
		$services_labels = array( 'name' => $services_post_type_name );
		
		register_post_type( 'services',
			array(
				'labels' => apply_filters('office_service_labels', $services_labels),
				'public' => true,
				'has_archive' => false,
				'supports' => array('title','editor','revisions','thumbnail','custom-fields','comments'),
				'menu_icon' => 'dashicons-hammer',
				'query_var' => true,
				'rewrite' => array( 'slug' => $services_slug ),
			)
		);
		
		/******* Testimonials Post Type *******/
		$testimonials_slug = ( wpex_get_data('testimonials_post_type_slug') ) ? wpex_get_data('testimonials_post_type_slug') : 'testimonials';
		$testimonials_post_type_name = ( wpex_get_data('testimonials_post_type_name') ) ? wpex_get_data('testimonials_post_type_name') : __('Testimonials','office');
		$testimonials_labels = array( 'name' => $testimonials_post_type_name );
		
		register_post_type( 'testimonials',
			array(
				'labels' => apply_filters('office_testimonials_labels', $testimonials_labels),
				'public' => true,
				'has_archive' => false,
				'supports' => array('title','editor', 'revisions','comments'),
				'menu_icon' => 'dashicons-format-quote',
				'query_var' => true,
				'rewrite' => array( 'slug' => $testimonials_slug ),
			)
		);

		/******* FAQ Post Type *******/
		$faqs_slug = ( wpex_get_data('faqs_post_type_slug') ) ? wpex_get_data('faqs_post_type_slug') : 'faqs';
		$faqs_post_type_name = ( wpex_get_data('faqs_post_type_name') ) ? wpex_get_data('faqs_post_type_name') : __('FAQs','office');
		$faqs_labels = array( 'name' => $faqs_post_type_name );
		
		register_post_type( 'faqs',
			array(
				'labels' => apply_filters('office_faqs_labels', $faqs_labels),
				'public' => true,
				'has_archive' => false,
				'supports' => array('title','editor', 'revisions','custom-fields','comments'),
				'menu_icon' => 'dashicons-editor-help',
				'query_var' => true,
				'rewrite' => array( 'slug' => $faqs_slug ),
			)
		);
	
	}
}
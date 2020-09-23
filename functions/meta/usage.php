<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'wpex_metaboxes' );

function wpex_metaboxes( array $meta_boxes ) {

	$prefix = 'office_';

	// Slides
	$meta_boxes[] = array(
		'id'         => 'slides_metabox',
		'title'      => 'Slide Options',
		'pages'      => array( 'slides', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name' => __('Caption Title','office'),
				'desc' => __('Select to enable or disable your slide caption.','office'),
				'id' => $prefix . 'enable_caption',
				'type' => 'select',
				'options' => array(
					array( 'name' => 'disable', 'value' => 'disable', ),
					array( 'name' => 'enable', 'value' => 'enable', ),
				),
				'multiple' => false,
				'std' => 'default'
			),
			array(
				'name' => __('Slide Link URL','office'),
				'desc' => __('Enter a URL to link this slide to - perfect for linking slides to pages on your site or other sites. Do not forget the http:// in the url. (Optional)','office'),
				'id' => $prefix . 'slides_url',
				'type' => 'text',
				'std' => ''
			),
			array(
				'name' => __('Link Target','office'),
				'desc' => __('Select the target for the slide link.','office'),
				'id' => $prefix . 'slides_url_target',
				'type' => 'select',
				'options' => array(
					array( 'name' => 'disable', 'value' => 'disable', ),
					array( 'name' => 'enable', 'value' => 'enable', ),
				),
				'multiple' => false,
				'std' => 'default'
			),
			array(
				'name' => __('oEmbed URL (video)','office'),
				'desc' =>  __('Enter the video URL that is compatible with WP\'s built-in oEmbed feature.', 'office') .' <a href="http://codex.wordpress.org/Embeds" target="_blank">'. __('Learn More', 'office') .' &rarr;</a>',
				'id' => $prefix . 'slides_video_oembed',
				'type' => 'oembed',
				'std' => ''
			),
			array(
				'name' => __('Description','office'),
				'desc' => __('Enter a description for your slide.','office'),
				'id' => $prefix . 'slides_description',
				'type' => 'wysiwyg',
				'options' => array(	'textarea_rows' => 3 ),
				'std' => ''
			),
		),
	);
	
	
	
	
	// Highlights
	$meta_boxes[] = array(
		'id'         => 'hp_highlights_metabox',
		'title'      => 'Highlight Options',
		'pages'      => array( 'hp_highlights', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name' => __('Link URL','office'),
				'desc' => __('Enter a URL to link the title of this highlight to. Optional.','office'),
				'id' => $prefix . 'hp_highlights_url',
				'type' => 'text',
				'std' => ''
			),
			array(
				'name' => __('Link Target','office'),
				'desc' => __('Select the target for the highlight link. Do not forget the http:// in the url. (Optional)','office'),
				'id' => $prefix . 'hp_highlights_url_target',
				'type' => 'select',
				'options' => array(
					array( 'name' => 'self', 'value' => 'self', ),
					array( 'name' => 'blank', 'value' => 'blank', ),
				),
				'multiple' => false,
				'std' => 'default'
			),
		),
	);
	
	
	
	/**
		Portfolio
	**/
	$portfolio_meta_array = array (
		array(
			'name' => __('Slider Shortcode', 'office'),
			'id' => 'wpex_page_slider_shortcode',
			'type' => 'text',
			'std' => '',
			'desc' => __('Here you can enter your slider shortcode to display at the top of the page, such as that of a revolution slider.', 'office')
		),
		array(
			'name' => __('Post Style', 'office'),
			'id' => $prefix . 'portfolio_style',
			'type' => 'select',
			'options' => array(
				array( 'name' => 'Default', 'value' => 'default' ),
				array( 'name' => 'Full', 'value' => 'full' ),
				array( 'name' => 'Grid', 'value' => 'grid' )
			),
			'std' => 'default',
			'desc' => __('Select your post style.', 'office')
		),
		array(
			'name' => __('Image Slider', 'office'),
			'id' => 'wpex_portfolio_post_slider',
			'desc' => __('If enabled please add your images via the gallery metabox below.', 'office'),
			'stf' => 'enabled',
			'type'    => 'select',
			'options' => array(
				array( 'name' => 'Enabled', 'value' => 'enabled', ),
				array( 'name' => 'Disabled', 'value' => 'disabled', ),
			),
		),
		array(
			'name' => __('Post Details', 'office'),
			'id' => 'wpex_portfolio_post_details',
			'desc' => __('Display the portfolio post details section? The global option in the theme admin panel will override this.', 'office'),
			'stf' => 'enabled',
			'type'    => 'select',
			'options' => array(
				array( 'name' => 'Enabled', 'value' => 'enabled', ),
				array( 'name' => 'Disabled', 'value' => 'disabled', ),
			),
		),
		array(
			'name' => __('Disable Featured Image', 'office'),
			'id' => 'wpex_post_thumb',
			'type' => 'checkbox',
			'std' => '',
			'desc' => __('Check this box to disable the featured image on this post when the slider is disabled.', 'office')
		),
		array(
			'name' => __('oEmbed URL (video)','office'),
			'desc' =>  __('Enter the video URL that is compatible with WP\'s built-in oEmbed feature.', 'office') .' <a href="http://codex.wordpress.org/Embeds" target="_blank">'. __('Learn More', 'office') .' &rarr;</a>',
			'id' => 'wpex_portfolio_post_video',
			'type' => 'oembed',
			'std' => ''
		),
	);
	$portfolio_details_meta = wpex_portfolio_details_meta_array();
	$portfolio_meta_array = array_merge( $portfolio_meta_array, $portfolio_details_meta );

	$meta_boxes[] = array(
		'id'         => 'portfolio_metabox',
		'title'      => 'Post Options',
		'pages'      => array( 'portfolio', ),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => $portfolio_meta_array,
		);
		
		
		
	
	/**
		Staff
	**/
	$meta_boxes[] = array(
		'id'         => 'staff_metabox',
		'title'      => 'Post Options',
		'pages'      => array( 'staff', ),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name' => __('Position','office'),
				'desc' => __('Enter a position for your staff member.','office'),
				'id' => $prefix . 'staff_position',
				'type' => 'text',
				'std' => ''
			),
		),
	);
	
	
	// Post Type names
	$portfolio_post_type_name = ( wpex_get_data('portfolio_post_type_name') ) ? wpex_get_data('portfolio_post_type_name') : __('Portfolio','office');
	$staff_post_type_name = ( wpex_get_data('staff_post_type_name') ) ? wpex_get_data('staff_post_type_name') : __('Staff','office');
	$services_post_type_name = ( wpex_get_data('services_post_type_name') ) ? wpex_get_data('services_post_type_name') : __('Services','office');
	$testimonials_post_type_name = ( wpex_get_data('testimonials_post_type_name') ) ? wpex_get_data('testimonials_post_type_name') : __('Testimonials','office');
	$faqs_post_type_name = ( wpex_get_data('faqs_post_type_name') ) ? wpex_get_data('faqs_post_type_name') : __('FAQs','office');	
	
	// Pages
	$meta_boxes[] = array(
		'id'         => 'pages_metabox',
		'title'      => 'Page Options',
		'pages'      => array( 'page', ),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name' => __('Image Slider', 'office'),
				'id' => $prefix . 'page_slider',
				'type' => 'select',
				'options' => array(
					array( 'name' => 'disable', 'value' => 'disable', ),
					array( 'name' => 'enable', 'value' => 'enable', ),
				),
				'multiple' => false,
				'std' => 'disable',
				'desc' => __('Choose to enable or disable the page slider based on image', 'office') . ' <a href="http://www.youtube.com/watch?v=RIcRKzzlsVY" target="_blank">attachments &rarr;</a>'
			),
			array(
				'name' => __('Slider Shortcode', 'office'),
				'id' => 'wpex_page_slider_shortcode',
				'type' => 'text',
				'std' => '',
				'desc' => __('Here you can enter your slider shortcode to display at the top of the page, such as that of a revolution slider.', 'office')
			),
			array(
				'name' => __('Blog Category', 'office'),
				'id' => $prefix . 'blog_parent',
				'type' => 'select',
				'options' => wpex_meta_term_array('category'),
				'desc' => __('Select a category for your blog page.', 'office')
			),
			array(
				'name' => $portfolio_post_type_name . ' ' . __('Category', 'office'),
				'id' => $prefix . 'portfolio_parent',
				'type' => 'select',
				'options' => wpex_meta_term_array('portfolio_cats'),
				'desc' => __('Select a category for your portfolio page.<br />For the filterable portfolio and portfolio by category it must be a parent category.', 'office')
			),
			array(
				'name' => $services_post_type_name . ' ' . __('Category', 'office'),
				'id' => $prefix . 'service_parent',
				'type' => 'select',
				'options' => wpex_meta_term_array('service_cats'),
				'desc' => __('Select a category for your services page.', 'office')
			),
			array(
				'name' => $faqs_post_type_name . ' ' . __('Category', 'office'),
				'id' => $prefix . 'faqs_parent',
				'type' => 'select',
				'options' => wpex_meta_term_array('faqs_cats'),
				'desc' => __('Select a category for your FAQs page.<br />Must choose a parent category.', 'office')
			),
			array(
				'name' => $staff_post_type_name . ' ' . __('Category', 'office'),
				'id' => $prefix . 'staff_parent',
				'type' => 'select',
				'options' => wpex_meta_term_array('staff_departments'),
				'desc' => __('Select a category for your staff page.<br />Must choose a parent category for the staff by category page template.', 'office')
			),
		),
	);
	
	

	return $meta_boxes;
}

add_action( 'init', 'cmb_initializewpexmeta_boxes', 9999 );

function cmb_initializewpexmeta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once( get_template_directory() .'/functions/meta/init.php');

}
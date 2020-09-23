<?php
/**
 * This file loads custom css and js for our theme
 *
 * @package WordPress
 * @subpackage Office
 * @since Office 1.0
*/

function wpex_load_scripts() {
	
	
	/*******
	*** CSS
	*******************/
	
	//main
	wp_enqueue_style( 'wpex-style', get_stylesheet_uri() );
	
	//responsive
	if ( wpex_get_data( 'disable_responsive','1' ) == '1' ) {
		wp_enqueue_style( 'office-responsive', WPEX_CSS_DIR_URI . 'responsive.css', 'style' );
	}
	

	/*******
	*** jQuery
	*******************/
	
	//enqueue jQuery
	wp_enqueue_script( 'jquery' );
	
	// Site wide js+
	// wp_enqueue_script( 'hoverIntent', WPEX_JS_DIR_URI .'hoverintent.js', array( 'jquery' ), 'r6', true); /*enable if wanted, I don't like it personally*/
	wp_enqueue_script( 'superfish', WPEX_JS_DIR_URI .'superfish.js', array( 'jquery' ), '1.4.8', true);
	wp_enqueue_script( 'tipsy', WPEX_JS_DIR_URI .'tipsy.js', array( 'jquery' ), '1.0', true);
	wp_enqueue_script( 'fitvids', WPEX_JS_DIR_URI .'fitvids.js', array( 'jquery' ), 1.0, true);
	
	//responsive
	if ( wpex_get_data( 'disable_responsive','1' ) == '1' ) {
		wp_enqueue_script( 'uniform', WPEX_JS_DIR_URI .'uniform.js', array( 'jquery' ), '1.7.5', true);
		wp_enqueue_script( 'office-responsive', WPEX_JS_DIR_URI .'responsive.js', array( 'jquery' ), '', true);
		$nav_params = array( 'text' => wpex_get_data( 'responsive_menu_text', __( 'Go to...','office' ) ) );
		wp_localize_script( 'office-responsive', 'responsiveLocalize', $nav_params );
	}
	
	// Retina
	if ( wpex_get_data( 'enable_retina', '0' ) == '1' ) {
		wp_enqueue_script( 'retina', WPEX_JS_DIR_URI .'retina.js', array( 'jquery' ), '0.0.2', true);
	}
	
	//services
	if (is_page_template( 'template-services.php' ) || is_tax( 'service_cats' )) {
		wp_enqueue_script( 'office-services', WPEX_JS_DIR_URI .'services.js', array( 'jquery' ), '2.0', true);
	}
	
	//staff
	if (is_page_template( 'template-staff.php' || is_page_template( 'template-staff-by-department' )) || is_tax( 'staff_departments' )) {
		wp_enqueue_script( 'office-services', WPEX_JS_DIR_URI .'staff.js', array( 'jquery' ), '', true);
	}

	//portfolio main
	if (is_page_template( 'template-portfolio-with-filter.php' )) {
		wp_enqueue_script( 'isotope',  WPEX_JS_DIR_URI .'isotope.js', array( 'jquery' ), '2.0.1', true);
		wp_enqueue_script( 'office-isotope-portfolio',  WPEX_JS_DIR_URI .'isotope-portfolio.js', array( 'jquery','isotope' ), '1.0', true);
	}
	
	//faqs
	if ( is_page_template( 'template-faqs.php' ) ) {
		wp_enqueue_script( 'isotope',  WPEX_JS_DIR_URI .'isotope.js', array( 'jquery' ), '2.0.1', true);
		wp_enqueue_script( 'office-faqs', WPEX_JS_DIR_URI .'faqs.js', array( 'jquery', 'isotope' ), '1.0', true );
	}
	
	//load comment reply js
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	//Lightbox
	wp_enqueue_script( 'prettyphoto', WPEX_JS_DIR_URI .'prettyphoto.js', array( 'jquery' ), '3.1', true);
	if ( wpex_get_data( 'wp_gallery_lightbox' ) == '1' ) {
		wp_enqueue_script( 'wp-gallery-prettyphoto', WPEX_JS_DIR_URI .'wp-gallery-prettyphoto.js', array( 'jquery','prettyphoto' ), '1.0', true);
	}

	//js init
	wp_enqueue_script( 'office-global', WPEX_JS_DIR_URI .'global.js', array( 'jquery','prettyphoto' ), '1.0', true);
	
}
add_action( 'wp_enqueue_scripts','wpex_load_scripts' );

/**
* Site Tracking
* @Since 1.0
*/
if ( !function_exists( 'wpex_header_tracking' ) ) {
	function wpex_header_tracking() {
		if ( wpex_get_data( 'tracking_header' ) ) {
			echo wpex_get_data( 'tracking_header' );
		}
	}
}
add_action( 'wp_head', 'wpex_header_tracking' );

if ( !function_exists( 'wpex_footer_tracking' ) ) {
	function wpex_footer_tracking() {
		if ( wpex_get_data( 'tracking_footer' ) ) {
			echo wpex_get_data( 'tracking_footer' );
		}
	}
}
add_action( 'wp_footer', 'wpex_footer_tracking' );

/**
* Browser Specific CSS
* @Since 1.0
*/
if ( !function_exists( 'wpex_ie_css' ) ) {
	function wpex_ie_css() {
		echo ' <!--[if IE]><script src="'. WPEX_JS_DIR_URI .'html5.js"></script><![endif]-->';
		echo '<!--[if IE 8]><link rel="stylesheet" type="text/css" href="'. WPEX_CSS_DIR_URI .'ie8.css" media="screen"><link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie8.css" media="screen"><![endif]-->';
		echo '<!--[if IE 7]><link rel="stylesheet" type="text/css" href="'. WPEX_CSS_DIR_URI .'ie7.css" media="screen"><![endif]-->';
		echo '<!--[if lt IE 9]>';
		echo '<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>';
		echo '<![endif]-->';
	}
}
add_action( 'wp_head', 'wpex_ie_css' );


/**
* Retina Logo Support
* @Since 1.0
*/
if ( wpex_get_data( 'retina_logo' )
	&& wpex_get_data( 'retina_logo_height' )
	&& wpex_get_data( 'retina_logo_width' )
) {	
	function wpex_retina_logo() {
		
		// Get retina options from theme panel and set vars
		$logo_url    = wpex_get_data( 'retina_logo' );
		$logo_width  = wpex_get_data( 'retina_logo_height' );
		$logo_height = wpex_get_data( 'retina_logo_width' );
				
		$wpex_retina_logo_js = '<!-- Retina Logo -->
		<script type="text/javascript">
		jQuery(function($){
			if (window.devicePixelRatio == 2) {
				$("#logo img").attr("src", "'. $logo_url .'");
				$("#logo img").attr("width", "'. $logo_width .'");
				$("#logo img").attr("height", "'. $logo_height .'");
			 }
		});
		</script>';	
		
		// Remove spacing from js for speed
		$wpex_retina_logo_js =  preg_replace( '/\s+/', ' ', $wpex_retina_logo_js );
		
		// Output the custom retina logo js
		echo $wpex_retina_logo_js;	
	}
	add_action( 'wp_head', 'wpex_retina_logo' );
}
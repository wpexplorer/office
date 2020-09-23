<?php
/**
 * @package WordPress
 * @subpackage Office WordPress Theme
 * This file registers the theme's widget regions
 */

register_sidebar(array(
		'name' => __('Sidebar','office'),
		'id' => 'sidebar',
		'description' => __('Widgets in this area will be shown in the sidebar.','office'),
		'before_widget' => '<div class="sidebar-box %2$s clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h4><span>',
		'after_title' => '</span></h4>'
));

if( wpex_get_data('disable_widgetized_footer','1') == '1' ) {
	
	register_sidebar(array(
		'name' => __('Footer Left','office'),
		'id' => 'footer-left',
		'description' => __('Widgets in this area will be shown in the footer left area.','office'),
		'before_widget' => '<div class="footer-widget %2$s clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
	
	register_sidebar(array(
		'name' => __('Footer Middle','office'),
		'id' => 'footer-middle',
		'description' => __('Widgets in this area will be shown in the footer middle area.','office'),
		'before_widget' => '<div class="footer-widget %2$s clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
	
	register_sidebar(array(
		'name' => __('Footer Right','office'),
		'id' => 'footer-right',
		'description' => __('Widgets in this area will be shown in the footer right area.','office'),
		'before_widget' => '<div class="footer-widget %2$s clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
	
}
<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />   
	<?php if( wpex_get_data('disable_responsive','1') == '1' ) : ?>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php endif; ?>
	<?php if( wpex_get_data('custom_favicon') !== '' ) : ?>
		<link rel="icon" type="image/png" href="<?php echo wpex_get_data('custom_favicon'); ?>" />
	<?php endif; ?>
	<?php wp_head(); // Header Hook - never remove me! ?>

</head>

<!-- Begin Body -->
<?php $body_font_smoothing_class = ( wpex_get_data('no-font-smoothing','1') == '1' )  ? 'no-font-smoothing' : NULL; ?>
<body <?php body_class($body_font_smoothing_class); ?>>

<?php if( wpex_get_data('disable_top_bar','1') == '1' ) : ?>
	<div id="top-bar" <?php if( wpex_get_data('top_bar_position','fixed') == 'fixed') echo 'class="top-bar-fixed"'; ?>>
	
		<div id="top-bar-inner">
		
			<?php
			// Top bar callout link
			if( wpex_get_data('callout_link') !== '' ) : ?>
				<a href="<?php echo wpex_get_data('callout_link'); ?>" id="top-bar-callout" title="<?php echo wpex_get_data('callout_text'); ?>" target="_<?php echo wpex_get_data('callout_target'); ?>"><?php echo wpex_get_data('callout_text'); ?></a>
			<?php endif; ?>
		
			<?php
			// Top bar menu
			wp_nav_menu( array(
				'theme_location' => 'top_menu',
				'menu_class' => 'top-menu',
				'sort_column' => 'menu_order',
				'fallback_cb' => ''
			)); ?> 
			
		</div><!-- /top-bar-inner -->
		
	</div><!-- /top-bar -->
<?php endif; //disable_top_bar check ?>

<header id="header" class="clearfix <?php echo 'header-style-'.wpex_get_data('header_style').''; ?> <?php if ( wpex_get_data('disable_background_pattern','1') == '1') echo 'pattern-bg'; ?> <?php if(wpex_get_data('disable_main_shadow') == '1') echo 'shadow-container'; ?>">

	<div id="logo" class="site-logo <?php if ( wpex_get_data('header_right_small_screens') !== '1' ) echo 'no-margin-on-small-screens'; ?>">
		<?php
		// Custom Logo
		if( wpex_get_data('custom_logo') !== '' ) { ?>
			<a href="<?php echo home_url(); ?>/" title="<?php bloginfo( 'name' ); ?>" rel="home"><img src="<?php echo wpex_get_data('custom_logo'); ?>" alt="<?php bloginfo( 'name' ) ?>" /></a>
		<?php } else { ?>
			<?php
			// Homepage text logo
			if ( is_front_page() ) { ?>
				<h1><a href="<?php echo home_url(); ?>/" title="<?php bloginfo( 'name' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php } else {
				// All other pages text logo ?>
				<h2><a href="<?php echo home_url(); ?>/" title="<?php bloginfo( 'name' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
			<?php }
		} ?>
	</div><!-- /logo -->
	
	<div id="header-aside" class="clearfix <?php if ( wpex_get_data('header_right_small_screens') !== '1' ) echo 'hide-on-small-screens'; ?>">
	
		<?php
		//header right content/phone
		if ( wpex_get_data('header_phone') ) : ?>
			<div id="header-phone"><?php echo wpex_get_data('header_phone'); ?></div>
		<?php endif; ?>
		
		<?php
		//social output - see functions/social-output.php
		if( wpex_get_data('disable_social','1') == '1') wpex_display_social(); ?>

		<?php
		// Search form - see searchform.php
		if ( wpex_get_data('enable_disable_search','1') == '1') get_search_form(); ?>
		
	</div><!--/header-aside -->
			  
</header><!-- /header -->

<div id="wrap" class="clearfix <?php if(wpex_get_data('disable_main_shadow') == '1') echo 'shadow-container'; ?>">

	<nav id="navigation" class="clearfix">
		<?php wp_nav_menu( array(
			'theme_location'	=> 'main_menu',
			'sort_column'		=> 'menu_order',
			'menu_class'		=> 'sf-menu',
			'fallback_cb'		=> 'default_menu'
		)); ?>
	</nav><!-- /navigation -->  
		
	<?php
	// Show featured images and page sliders on pages, but not attachment pages
	// Added in header.php so that it's before the .container class
	if( is_singular() && !is_attachment() ) { ?>   
		<?php global $post; ?>	
		<?php if ( get_post_meta( $post->ID, 'wpex_page_slider_shortcode', true ) !== '' ) { ?>
			<div class="page-slider-shortcode <?php if ( wpex_get_data('disable_background_pattern','1') == '1') echo 'pattern-bg'; ?>">
				<?php echo do_shortcode(get_post_meta( $post->ID, 'wpex_page_slider_shortcode', true ) ); ?>
			</div><!-- /page-slider-shortcode -->
		<?php } ?>
		<?php if( is_singular('page') && has_post_thumbnail($post->ID) && 'on' != get_post_meta( get_the_ID(), 'wpex_disable_featured_image', true ) ) { ?>
			<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" alt="<?php get_the_title(); ?>" class="page-featured-img" />
		<?php }
	} ?>
	
	<div class="container clearfix fitvids <?php if ( wpex_get_data('disable_background_pattern','1') == '1') echo 'pattern-bg'; ?> sidebar-<?php echo wpex_get_data('sidebar_position','right'); ?>">
	
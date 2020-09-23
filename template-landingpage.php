<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 * Template Name: Landing Page
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

<div id="wrap" class="clearfix <?php if(wpex_get_data('disable_main_shadow') == '1') echo 'shadow-container'; ?>" style="margin-top: 30px;">

	<?php
	// Show featured images and page sliders on pages, but not attachment pages
	// Added in header.php so that it's before the .container class
	if( is_page() && !is_attachment() ) { ?>   
		<?php global $post; ?>	
		<?php if ( get_post_meta( $post->ID, 'wpex_page_slider_shortcode', true ) !== '' ) { ?>
        	<div class="page-slider-shortcode <?php if ( wpex_get_data('disable_background_pattern','1') == '1') echo 'pattern-bg'; ?>">
				<?php echo do_shortcode(get_post_meta( $post->ID, 'wpex_page_slider_shortcode', true ) ); ?>
			</div><!-- /page-slider-shortcode -->
        <?php } ?>
        <?php if( has_post_thumbnail($post->ID) ) { ?>
			<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" alt="<?php wpex_esc_title(); ?>" class="page-featured-img" />
		<?php }
	} ?>
    
	<div class="container clearfix fitvids <?php if ( wpex_get_data('disable_background_pattern','1') == '1') echo 'pattern-bg'; ?>">

		<?php
		//start page loop
		while (have_posts()) : the_post();
		
			//show slider if enabled
			if ( get_post_meta( get_the_ID(), 'office_page_slider', true) == 'enable' ) get_template_part( 'includes/page-slides'); ?>
			
			<article class="post full-width clearfix">
			
				<div class="entry clearfix">
					<?php the_content(); ?>
				</div><!-- /entry -->
				
			</article><!-- /post -->
        
        <?php endwhile; ?>
        
	</div><!-- /container -->
</div><!-- /wrap -->

<?php wp_footer(); ?>
</body>
</html>
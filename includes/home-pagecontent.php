<?php
/**
 * File used for homepage static page content module
 *
 * @package WordPress
 * @subpackage Office Theme
 */
?>

<div id="home-static-page" class="clearfix">

	<?php $home_static_page_title = wpex_get_data('home_static_page_title') ? wpex_get_data('home_static_page_title') : __('What We Do','office'); ?>
        
	<?php if ( wpex_get_data('home_static_page_title') !== 'disable') { ?>
        <div class="heading">
            <h2>
            <?php if( wpex_get_data('home_static_page_title_url') ) { ?>
                <a href="<?php echo wpex_get_data('home_static_page_title_url'); ?>" title="<?php echo esc_attr( $home_static_page_title ); ?>">
            <?php } ?>
            <span><?php echo $home_static_page_title; ?></span>
            <?php if( wpex_get_data('home_static_page_title_url') ) echo '</a>'; ?>
            </h2>
        </div><!-- /heading -->
    <?php } ?>
        
	<?php while( have_posts() ) : the_post(); ?>
    	<div class="entry clearfix homepage-content">
    		<?php the_content(); ?>
        </div><!-- /entry -->
    <?php endwhile; ?>
    
</div><!-- /home-static-page -->

<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 */
?>

<?php get_header(); ?>

	<?php
    //show slider if enabled
    if ( get_post_meta( get_the_ID(), 'office_page_slider', true) == 'enable' ) get_template_part( 'includes/page-slides'); ?>

    <div id="page-heading">
        <h1><?php _e('Shop','office'); ?></h1>	
        <?php if( wpex_get_data('disable_breadcrumbs','1') == '1') office_breadcrumbs(); ?>	
    </div><!-- /page-heading -->

    <article class="post clearfix">
    
        <div class="entry clearfix">	
            <?php woocommerce_content(); ?>
        </div><!-- /entry -->
        
    </article><!-- /post -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
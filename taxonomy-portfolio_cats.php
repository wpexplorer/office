<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 */
?>

<?php get_header(); ?>
<?php if (have_posts()) : ?>

<header id="page-heading">
	<h1><?php echo single_term_title(); ?></h1>
    <?php if( wpex_get_data('disable_breadcrumbs','1') == '1') office_breadcrumbs(); ?>
</header><!-- /page-heading -->

<?php if(category_description()) { ?>
<div id="portfolio-description">
	 <?php echo category_description( ); ?>
</div><!-- /portfolio-description -->
<?php } ?>
    
<div class="post full-width clearfix">
    
    <div id="portfolio-wrap" class="clearfix">
    
    	<?php $count=0; ?>
        <?php while (have_posts()) : the_post(); ?>
        <?php $count++; ?>
        
        	<article class="portfolio-item count-<?php echo $count; ?>">
                <a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>">
                    <?php if ( has_post_thumbnail() ) { ?>
                        <img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('portfolio_entry_width'),  wpex_img('portfolio_entry_height'),  wpex_img('portfolio_entry_crop') ); ?>" alt="<?php echo wpex_esc_title(); ?>" />
                    <?php } ?> 
                    <h3><?php the_title(); ?></h3>
                </a>
            </article><!-- /portfolio-item -->
            <?php if( $count == '4' ) { echo '<div class="clear"></div>'; $count=0; } ?>
        
        <?php endwhile; ?>
          
    </div><!-- /portfolio-wrap -->
    
	<?php wpex_pagination(); wp_reset_query(); ?>

</div><!-- /post --->


<?php endif; ?>
<?php get_footer(); ?>
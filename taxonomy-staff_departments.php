<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 */
?>
<?php get_header(); ?>

<header id="page-heading">
	<h1><?php echo single_term_title(); ?></h1>
    <?php if( wpex_get_data('disable_breadcrumbs','1') == '1') office_breadcrumbs(); ?>  
</header><!-- /page-heading -->

<?php
$category_description = category_description();
if(!empty($category_description )) {
	echo apply_filters('category_archive_meta','<div id="staff-description">' . $category_description . '</div>');
} ?>

<?php if ( have_posts() ) : ?>

    <div id="staff-wrap" class="clearfix">
        
        <?php while ( have_posts()) : the_post(); ?>
        
            <?php if ( has_post_thumbnail() ) { ?>
                <div class="staff-member clearfix">
                    <div class="staff-img">
                        <a href="<?php the_permalink();?>" title="<?php wpex_esc_title(); ?>"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('staff_entry_width'),  wpex_img('staff_entry_height'),  wpex_img('staff_entry_crop') ); ?>" alt="<?php echo wpex_esc_title(); ?>" /></a>
                    </div><!-- /staff-img -->
                    <div class="staff-meta">
                        <h3><?php the_title(); ?></h3>
                        <?php if ( get_post_meta( get_the_ID(), 'office_staff_position', TRUE) ) : ?>
                            <?php echo get_post_meta( get_the_ID(), 'office_staff_position', TRUE); ?>
                        <?php endif; ?>
                    </div><!-- /staff-meta -->
                </div><!-- /staff-member -->
            <?php } ?>
            
        <?php endwhile; ?>
    
    </div><!-- /staff-wrap -->

<?php endif; ?>
<?php get_footer(); ?>
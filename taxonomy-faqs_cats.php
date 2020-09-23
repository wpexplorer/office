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
	echo apply_filters('category_archive_meta','<div id="faqs-description">' . $category_description . '</div>');
}
?>

<?php if( have_posts() ) : ?>

    <div class="post full-width clearfix">
        
        <div id="faqs-wrap" class="clearfix">
            
            <?php while (have_posts()) : the_post(); ?>
            <?php wp_enqueue_script('office-faqs', WPEX_JS_DIR_URI .'faqs.js', array('jquery'), '1.0', true); ?>
            
             <div class="faq-item">
                <h2 class="faq-title"><span><?php the_title(); ?></span></h2>
                <div class="faq-content entry">
                    <?php the_content(); ?>
                </div><!-- /faq -->
            </div><!-- /faq-item -->
            
            <?php endwhile; ?>
        
        </div><!-- /faqs-wrap -->
    
    </div><!-- .post -->

<?php endif; ?>
<?php get_footer(); ?>
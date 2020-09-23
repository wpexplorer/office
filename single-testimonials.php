<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 */
?>
<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

    <header id="page-heading">
        <h1><?php _e('Testimonial by', 'office'); ?>: <?php the_title(); ?></h1>	
        <?php if( wpex_get_data('disable_breadcrumbs','1') == '1') office_breadcrumbs(); ?>  
    </header><!-- /post-heading -->
    
    <article class="post clearfix">
    
        <div class="entry clearfix">
            <?php the_content(); ?>
        </div><!-- /entry --> 
        <?php if( wpex_get_data('enable_disable_faqs_comments') == '1') comments_template(); ?>  
    </article><!-- /post -->

<?php endwhile; ?>
             
<?php get_sidebar(); ?>
<?php get_footer(); ?>
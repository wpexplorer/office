<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 */ ?>
 
<?php
/*
HOMEPAGE EDITING!!!
Index.php is used as the fallback file in WordPress and should always revert to the default query.
Looking for your homepage content to edit? Please have a look at template-homepage.php as well as includes/home-[file].php */ ?>
 
<?php get_header(); ?>

	<div class="post clearfix">
    	
		<?php if ( have_posts() ) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part( 'content', get_post_format() ); ?>
            <?php endwhile; ?>    	
        <?php endif; ?>
        
        <?php wpex_pagination(); ?>
        <?php wp_reset_query(); ?>
    
    </div><!-- /post -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
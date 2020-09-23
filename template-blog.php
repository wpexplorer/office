<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 * Template Name: Blog
 */
?>

<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

	<?php
    //show slider if enabled
    if ( get_post_meta( get_the_ID(), 'office_page_slider', true) == 'enable' ) get_template_part( 'includes/page-slides'); ?>
    
    <?php
    //get meta to set parent category
    $blog_filter_parent = ( get_post_meta(get_the_ID(), 'office_blog_parent', true) !== 'all') ? get_post_meta(get_the_ID(), 'office_blog_parent', true) : NULL; ?>
    
    <header id="page-heading">
        <h1><?php the_title(); ?></h1>	
        <?php if( wpex_get_data('disable_breadcrumbs','1') == '1') office_breadcrumbs(); ?> 
    </header><!-- /page-heading -->

    <div class="post clearfix">
    
    	<?php
        //tax query
        if($blog_filter_parent) {
            $tax_query = array(
                array(
                      'taxonomy' => 'category',
                      'field' => 'id',
                      'terms' => $blog_filter_parent,
                      )
                );
        } else { $tax_query = NULL; }
        
        //query posts
		query_posts(
			array(
				'post_type'=> 'post',
				'paged'=>$paged,
				'tax_query' => $tax_query
			)
		); ?>
    	
		<?php if ( have_posts() ) : ?>
        	<?php while (have_posts()) : the_post(); ?>
            	<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>    	
        <?php endif; ?>
        
        <?php wpex_pagination(); ?>
        <?php wp_reset_query(); ?>
    
    </div><!-- /post -->

<?php endwhile; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 * Template Name: Testimonials
 */
?>
<?php get_header(); ?>

<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

	<?php
    //show slider if enabled
    if ( get_post_meta( get_the_ID(), 'office_page_slider', true) == 'enable' ) get_template_part( 'includes/page-slides'); ?>

    <header id="page-heading">
        <h1><?php the_title(); ?></h1>	
        <?php if( wpex_get_data('disable_breadcrumbs','1') == '1') office_breadcrumbs(); ?> 
    </header><!-- /page-heading -->

	<?php
    $content = $post->post_content;
    if(!empty($content)) { ?>
        <div id="testimonials-description">
            <?php the_content(); ?>
        </div><!-- /testimonials-description -->
    <?php }?>
    
    <?php
	$testimonials = new WP_Query(
		array(
			'post_type' => 'testimonials',
			'showposts' =>  '-1',
			'no_found_rows' => true
		)
	);
		
	if( $testimonials->posts ) : ?>
    
    	<article class="post full-width clearfix">
    
        	<div id="testimonials-wrap clearfix">
    
				<?php
                $count=0;
                while ( $testimonials->have_posts() ) : $testimonials->the_post();
                	$count++; ?>
                
                    <article class="testimonial-item one-third <?php if($count == '3') { echo 'column-last'; } ?>">
                        <div class="testimonial">
                            <?php the_content(); ?>
                        </div><!-- /testimonial -->
                        <div class="testimonial-author"><?php the_title(); ?></div>
                    </article><!-- /testimonial-item -->
                
                	<?php if( $count == '3' ) { echo '<div class="clear"></div>'; $count=0; } ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            
            </div><!-- /testimonials-wrap -->
            
        </article><!-- /post -->
    
    <?php endif; ?>

<?php endwhile; ?>	  

<?php get_footer(); ?>
<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 */
?>
<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

    <div id="page-heading">
        <h1><?php the_title(); ?></h1>	
        <?php if( wpex_get_data('disable_breadcrumbs','1') == '1') office_breadcrumbs(); ?>  
    </div><!-- /post-meta -->
    
    <div class="post clearfix">
    
        	<div class="entry clearfix">
            
				<?php if ( !post_password_required() ) : ?>
                
                    <?php if ( wpex_get_data('enable_disable_post_image') == '1' && has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                        <?php if ( wpex_get_data('blog_post_image_lightbox') == '1' ) { ?>
                        <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" title="<?php the_title(); ?>" class="prettyphoto-link">
                        <?php } ?>
                            <img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('blog_post_width'),  wpex_img('blog_post_height'),  wpex_img('blog_post_crop') ); ?>" alt="<?php echo the_title(); ?>" />
                        <?php if ( wpex_get_data('blog_post_image_lightbox') == '1' ) { ?></a><?php } ?>
                    </div><!-- /post-thumbnail -->
                    <?php endif; ?>
                        
                    <?php wpex_blog_meta(); ?>
                    
                <?php endif; ?>
                
                <?php the_content(); ?>
                
                <div class="clear"></div>
                
                <?php if ( !post_password_required() ) : ?>
                
                	<?php wp_link_pages(' '); ?>
                    
                    <?php if ( wpex_get_data('blog_post_tags','1' ) == '1' ) : ?>
                        <div class="post-bottom">
                            <?php the_tags('<div class="post-tags"><h4>'. __('Tags','office') .'</h4>','','</div>'); ?>
                        </div><!-- /post-bottom -->
                    <?php endif; ?>
            
					<?php if ( wpex_get_data('blog_bio','1') == '1' && get_the_author_meta( 'description' ) ) : ?>
                        <?php get_template_part('author-bio'); ?>
                    <?php endif; ?>
                      
				<?php endif; ?> 
                 
            </div><!-- /entry -->
        
            <?php if( wpex_get_data('enable_disable_blog_comments' ) == '1') comments_template(); ?>
       
            
    </div><!-- /post -->

<?php endwhile; ?>
             
<?php get_sidebar(); ?>
<?php get_footer(); ?>
<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 * Template Name: Sitemap
 */
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php
    //show slider if enabled
    if ( get_post_meta( get_the_ID(), 'office_page_slider', true) == 'enable' ) get_template_part( 'includes/page-slides'); ?>

    
    <header id="page-heading">
        <h1><?php the_title(); ?></h1>		
        <?php if( wpex_get_data('disable_breadcrumbs','1') == '1') office_breadcrumbs(); ?>
    </header><!-- END page-heading -->
                
    <div class="post full-width clearfix">
           
        <?php the_content(); ?>
        
        <div id="sitemap-wrap" class="clearfix">
        
            <div class="sitemap-container one-third">
    
                <?php
                /*-----------------------------------------------------------------------------------*/
                // Feeds
                /*-----------------------------------------------------------------------------------*/
                ?>
                <h2><?php _e('Feeds','office'); ?></h2>
                    <ul>  
                        <li><a title="Full content" href="feed:<?php bloginfo('rss2_url'); ?>">Main RSS</a></li>  
                        <li><a title="Comment Feed" href="feed:<?php bloginfo('comments_rss2_url'); ?>">Comment Feed</a></li>  
                    </ul>
                    
                    
                <?php
                /*-----------------------------------------------------------------------------------*/
                // Tags
                /*-----------------------------------------------------------------------------------*/
                ?>
                <h2><?php _e('Tags','office'); ?></h2>
                <?php wp_tag_cloud(array(
                    'format' => 'list',
                    'smallest' => 12,
                    'largest' => 12,
                    'unit' => 'px',
                    'number' => 20,
                    'orderby'  => 'name',
                    'order' => 'ASC',
                    'taxonomy' => 'post_tag'
                    ));
                ?>
                
                
                <?php
                /*-----------------------------------------------------------------------------------*/
                // Archives
                /*-----------------------------------------------------------------------------------*/
                ?>
                <h2><?php _e('Archives by Month','office'); ?></h2>
                <ul>
                    <?php wp_get_archives('type=monthly&limit=10'); ?>
                </ul>
                
            </div><!-- /sitemap-container one-third -->
            
            <div class="sitemap-container one-third">
    
                <?php
                /*-----------------------------------------------------------------------------------*/
                // Blog Categories
                /*-----------------------------------------------------------------------------------*/
                ?>
                <h2><?php _e('Blog Categories','office'); ?></h2>    	
                <?php $args = array(
                          'orderby' => 'name',
                          'order' => 'ASC',
                          'style' => 'list',
                          'show_count' => 0,
                          'hide_empty' => 1,
                          'use_desc_for_title' => 1,
                          'child_of' => 0,
                          'hierarchical' => true,
                          'title_li' => '',
                          'number' => NULL
                        );
                    ?> 
                    <ul>
                    <?php wp_list_categories( $args ); ?>
                    </ul>
                
                
                <?php
                /*-----------------------------------------------------------------------------------*/
                // Portfolio Categories
                /*-----------------------------------------------------------------------------------*/
                ?>
                <h2><?php _e('Portfolio Categories','office'); ?></h2>
                <?php $port_args = array(
                    'taxonomy' => 'portfolio_cats',
                    'orderby' => 'name',
                    'order' => 'ASC',
                    'style' => 'list',
                    'show_count' => 0,
                    'hide_empty' => 1,
                    'use_desc_for_title' => 1,
                    'child_of' => 0,
                    'hierarchical' => true,
                    'title_li' => '',
                    'number' => NULL
                  );
                ?> 
                <ul>
                    <?php wp_list_categories( $port_args ); ?>
                </ul>
          
            </div><!-- /sitemap-container one-third -->
            
            
            
            
            <?php
            /*-----------------------------------------------------------------------------------*/
            // Pages
            /*-----------------------------------------------------------------------------------*/
            ?>
            <div class="sitemap-container one-third column-last">
            <h2><?php _e('Pages','office'); ?></h2>
            <ul><?php wp_list_pages("title_li=" ); ?></ul> 
            </div><!-- /sitemap-container one-third -->
               
        </div><!-- /sitemap-wrap -->
      
      </div><!-- /post -->
  
<?php wp_reset_query(); endwhile; ?>
 
<?php get_footer(); ?>
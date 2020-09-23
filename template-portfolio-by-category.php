<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 * Template Name: Portfolio by Category
*/
?>

<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

	<?php
    //show slider if enabled
    if ( get_post_meta( get_the_ID(), 'office_page_slider', true) == 'enable' ) get_template_part( 'includes/page-slides'); ?>
    
     <?php
    //get meta to set parent category
    if ( get_post_meta(get_the_ID(), 'office_portfolio_parent', true) !== 'all' && get_post_meta(get_the_ID(), 'office_portfolio_parent', true) !== '') {
		$portfolio_filter_parent = get_post_meta(get_the_ID(), 'office_portfolio_parent', true);
	} else {
		$portfolio_filter_parent = '';
	} ?>

    <header id="page-heading">
        <h1><?php the_title(); ?></h1>
        <?php if( wpex_get_data('disable_breadcrumbs','1') == '1') office_breadcrumbs(); ?>
    </header><!-- /page-header -->
     
     
    <div id="portfolio-by-category-wrap" class="clearfix">
    
        <?php
        $content = $post->post_content;
        if(!empty($content)) { ?>
            <div id="portfolio-bycat-description" class="clearfix">
                <?php the_content(); ?>
            </div><!-- portfolio-description -->
        <?php } ?>
    
        <?php $terms = get_terms('portfolio_cats','orderby=custom_sort&hide_empty=1&child_of='.$portfolio_filter_parent.''); ?>
        
        <?php foreach($terms as $term) : ?>
        
            <div class="heading">
                <h2><a href="<?php echo get_term_link($term->slug, 'portfolio_cats'); ?>" class="all-port-cat-items"><span><?php echo $term->name; ?></span></a></h2>
            </div>
        
            <div class="portfolio-category clearfix">
            
                <?php
                //tax query
                $tax_query = array(
                array(
                    'taxonomy' => 'portfolio_cats',
                    'terms' => $term->slug,
                    'field' => 'slug'
                    )
                );
                $term_post_args = array(
                    'post_type' => 'portfolio',
                    'numberposts' => '-1',
                    'tax_query' => $tax_query
                );
                $term_posts = get_posts($term_post_args);
                
                //start loop
				$count=0;
                foreach ($term_posts as $post) : setup_postdata($post);
				$count++; ?>               
                  
                    <article class="portfolio-item count-<?php echo $count; ?>">
                        <a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>">
                            <?php if ( has_post_thumbnail() ) { ?>
                                <img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('portfolio_entry_width'),  wpex_img('portfolio_entry_height'),  wpex_img('portfolio_entry_crop') ); ?>" alt="<?php echo wpex_esc_title(); ?>" />
                            <?php } ?> 
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </article><!-- /portfolio-item -->
         			<?php if( $count == '4' ) { echo '<div class="clear"></div>'; $count=0; } ?>
                
            	<?php endforeach; ?>
                
            </div><!-- /portfolio-category -->
    
		<?php endforeach; //end terms loop ?>
        <?php wp_reset_postdata(); ?>
    
    </div><!-- /portfolio-by-category-wrap -->

<?php endwhile; ?>
 
<?php get_footer(); ?>
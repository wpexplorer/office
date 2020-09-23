<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 * Template Name: Portfolio
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
    </header><!-- /page-heading -->
    
    <?php
    //display page content
	if( !empty($post->post_content) ) { ?>
        <div id="portfolio-description" class="entry clearfix">
            <?php the_content(); ?>
        </div><!-- portfolio-description -->
    <?php } ?>
    
    <div class="post full-width clearfix">
    
    	<?php
		//tax query
		if( $portfolio_filter_parent ) {
		$tax_query = array(
			array(
				  'taxonomy' => 'portfolio_cats',
				  'field' => 'id',
				  'terms' => $portfolio_filter_parent
				  )
			);
		} else { $tax_query = NULL; }
		
		$portfolio_query = new WP_Query(
			array(
				'post_type'		=>'portfolio',
				'showposts'		=> wpex_get_data('portfolio_pagination','12'),
				'paged'			=>$paged,
				'tax_query'		=> $tax_query,
				'no_found_rows'	=> true
			)
		);
		
		if ( $portfolio_query->posts ) : ?>
            <div id="portfolio-wrap" class="clearfix">
                <div class="portfolio-content">	
					<?php
                    $count=0;
                    $count_two=0;
                    while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
                    	$count++; ?>
                        <article class="portfolio-item count-<?php echo $count; ?>">
                            <a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>">
                                <?php if ( has_post_thumbnail() ) { ?>
                                    <img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('portfolio_entry_width'),  wpex_img('portfolio_entry_height'),  wpex_img('portfolio_entry_crop') ); ?>" alt="<?php wpex_esc_title(); ?>" />
                                <?php } ?> 
                                <h3><?php the_title(); ?></h3>
                            </a>
                        </article><!-- /portfolio-item -->
                        <?php if( $count == '4' ) { echo '<div class="clear"></div>'; $count=0; } ?>
                        
                    <?php endwhile; ?>
                    
                </div><!-- /portfolio-content -->
            </div><!-- /portfolio-wrap -->
            
            <?php wpex_pagination(); wp_reset_postdata(); ?>
            
        <?php endif; ?>
    
    </div><!-- /post -->

<?php endwhile; ?>
<?php get_footer(); ?>
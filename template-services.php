<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 * Template Name: Services
 */
?>

<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

	<?php
    //show slider if enabled
    if ( get_post_meta( get_the_ID(), 'office_page_slider', true) == 'enable' ) get_template_part( 'includes/page-slides'); ?>
    
	<?php
    //get meta to set parent category
    if ( get_post_meta(get_the_ID(), 'office_service_parent', true) !== 'all' && get_post_meta(get_the_ID(), 'office_service_parent', true) !== '') {
		$service_filter_parent = get_post_meta(get_the_ID(), 'office_service_parent', true);
	} else {
		$service_filter_parent = '';
	} ?>
    
    <header id="page-heading">
        <h1><?php the_title(); ?></h1>	
        <?php if( wpex_get_data('disable_breadcrumbs','1') == '1') office_breadcrumbs(); ?> 
    </header><!-- /page-heading -->
    
	<?php
    //show page content if not empty
    $content = $post->post_content;
    if(!empty($content)) { ?>
        <div id="services-description" class="clearfix">
            <?php the_content(); ?>
        </div><!--/services description -->
    <?php } ?>
     
	<?php		
	//tax query
	if($service_filter_parent) {
		$tax_query = array(
			array(
				  'taxonomy' => 'service_cats',
				  'field' => 'id',
				  'terms' => $service_filter_parent
				  )
			);
	} else { $tax_query = NULL; }
	
	//query posts
	$services_posts = new WP_Query(
		array(
			'post_type' => 'services',
			'showposts' =>  '-1',
			'tax_query' => $tax_query,
			'no_found_rows' => true
		)
	);
	
	if ( $services_posts->posts ) : ?>
    
        <div id="services-wrap" class="clearfix">
            
            <ul id="service-tabs">
                <?php while ( $services_posts->have_posts() ) : $services_posts->the_post(); ?>
                <li>
                    <a href="#tab-<?php echo( basename(get_permalink() ) ); ?>" title="<?php wpex_esc_title(); ?>">
						<?php if( has_post_thumbnail() ) { ?>
                            <span><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" alt="<?php wpex_esc_title(); ?>" /></span>
                        <?php } ?>
                        <?php the_title(); ?>
                    </a>
                </li>
                <?php endwhile; ?>
            </ul><!-- /service tabs -->
            
            <div id="service-content" class="entry">
            	<?php $count=0; ?>
                <?php while ( $services_posts->have_posts() ) : $services_posts->the_post(); ?>
                <?php $count++; ?>
                <article id="tab-<?php echo( basename(get_permalink() ) ); ?>" class="service-tab-content <?php if ( $count == 1 ) echo 'first-tab'; ?>">
                    <h2><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                </article><!-- /service-tab-content -->
                <?php endwhile; ?>
            </div><!-- /service-content -->
            
        </div><!-- /services-wrap -->
    
    <?php endif; ?>

<?php wp_reset_postdata(); ?>
<?php endwhile; ?>	
<?php get_footer(); ?>
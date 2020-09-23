<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 * Template Name: Staff
 */
?>

<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

	<?php
    //show slider if enabled
    if ( get_post_meta( get_the_ID(), 'office_page_slider', true) == 'enable' ) get_template_part( 'includes/page-slides'); ?>
    
    <?php
    //get meta to set parent category
    if ( get_post_meta(get_the_ID(), 'office_staff_parent', true) !== 'all' && get_post_meta(get_the_ID(), 'office_staff_parent', true) !== '') {
		$staff_filter_parent = get_post_meta(get_the_ID(), 'office_staff_parent', true);
	} else {
		$staff_filter_parent = NULL;
	} ?>
    
    <header id="page-heading">
        <h1><?php the_title(); ?></h1>	
        <?php if( wpex_get_data('disable_breadcrumbs','1') == '1') office_breadcrumbs(); ?> 
    </header><!-- /page-heading -->

	<?php if(!empty($post->post_content)) { ?>
        <div id="staff-description">
            <?php the_content(); ?>
        </div><!-- /staff-description -->
    <?php }?>
    
    
    <?php
	//tax query
	if($staff_filter_parent) {
	$tax_query = array(
		array(
			  'taxonomy' => 'staff_departments',
			  'field' => 'id',
			  'terms' => $staff_filter_parent
			  )
		);
	} else { $tax_query = NULL; }

	$staff_query = new WP_Query(
		array(
			'post_type'=>'staff',
			'showposts' =>  wpex_get_data('staff_pagination','28'),
			'paged'=>$paged,
			'tax_query' => $tax_query,
			'no_found_rows' => true
		)
	);
	
	if ( $staff_query->posts ) : ?>
    
    	<div id="staff-wrap" class="clearfix">
    
       		<?php while ( $staff_query->have_posts() ) : $staff_query->the_post(); ?>
        
				<?php if( has_post_thumbnail() ) { ?>
                    <div class="staff-member clearfix">
                        <div class="staff-img">
                            <a href="<?php the_permalink();?>" title="<?php wpex_esc_title(); ?>"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('staff_entry_width'),  wpex_img('staff_entry_height'),  wpex_img('staff_entry_crop') ); ?>" alt="<?php echo wpex_esc_title(); ?>" /></a>
                        </div><!-- /staff-img -->
                        <div class="staff-meta">
                            <h3><?php the_title(); ?></h3>
                            <?php if ( get_post_meta( get_the_ID(), 'office_staff_position', TRUE) ) : ?>
                                <?php echo get_post_meta( get_the_ID(), 'office_staff_position', TRUE); ?>
                            <?php endif; ?>
                        </div><!-- /staff-meta -->
                    </div><!-- /staff-member -->
                <?php } ?>
     
    		<?php endwhile; ?>
			<?php wpex_pagination(); ?>
			<?php wp_reset_postdata(); ?>
    	</div><!-- /staff-wrap -->
    <?php endif; ?>

<?php endwhile; ?>	

<?php get_footer(); ?>
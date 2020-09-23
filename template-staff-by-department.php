<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 * Template Name: Staff By Department
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
		$staff_filter_parent = '';
	} ?>
    
    <header id="page-heading">
        <h1><?php the_title(); ?></h1>
        <?php if( wpex_get_data('disable_breadcrumbs','1') == '1') office_breadcrumbs(); ?>
    </header><!-- /page-heading -->
 
    <div id="staff-by-department" class="clearfix">
    
        <?php
        //show page content if not empty
        $content = $post->post_content;
        if(!empty($content)) { ?>
            <div id="staff-bycat-description" class="clearfix">
                <?php the_content(); ?>
            </div><!-- staff-description -->
        <?php } ?>
    
        <?php
        //get terms
        $terms = get_terms('staff_departments','orderby=custom_sort&hide_empty=1&child_of='.$staff_filter_parent.'');
        foreach($terms as $term) : ?>
        
        <div class="heading">
            <h2><a href="<?php echo get_term_link($term->slug, 'staff_departments'); ?>" class="all-port-cat-items"><span><?php echo $term->name; ?></span></a></h2>
        </div><!-- /heading -->
    
        <div class="staff-category clearfix">
        
            <?php
            //tax query
            $tax_query = array(
            array(
                'taxonomy' => 'staff_departments',
                'terms' => $term->slug,
                'field' => 'slug'
                )
            );
            
            //get posts ==> staff
            $term_post_args = array(
                'post_type' => 'staff',
                'numberposts' => '-1',
                'tax_query' => $tax_query
            );
            $term_posts = get_posts($term_post_args);
            
            //start loop
            foreach ($term_posts as $post) : setup_postdata($post); ?> 
            
				<?php if( has_post_thumbnail() ) : ?>
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
        		<?php endif; // thumb check ?>
                
        <?php endforeach; // post loop ?>
        
        </div><!-- /staff-category -->
    
    <?php endforeach; //term loop ?>
    
    </div><!-- /staff-by-category-wrap -->

<?php endwhile; ?>
<?php get_footer(); ?>
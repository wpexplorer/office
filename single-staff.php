<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 */
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <header id="page-heading">
        <h1><?php the_title(); ?></h1>	
        <?php if( wpex_get_data('disable_breadcrumbs','1') == '1') office_breadcrumbs(); ?>  
    </header><!-- /page-heading -->
    
    <article class="post staff-post clearfix">
    
        <div class="entry clearfix">
        	<?php if ( has_post_thumbnail() && wpex_get_data( 'staff_post_featured_iimg', '1' ) ) : ?>
            <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" alt="<?php echo the_title(); ?>" class="staff-post-featured-thumbnail" />
            <?php endif; ?>
            <?php the_content(); ?>
        </div><!-- /entry -->
        
        <?php
		// Related posts if not disabled  
        if( wpex_get_data('disable_related_staff','1') == '1') :
            $wpex_port_cats = wp_get_post_terms(get_the_ID(), 'staff_departments');
            if ( $wpex_port_cats[0] ) :
				$args = array(
					'post__not_in' 		=> array( get_the_ID() ),
					'orderby'			=> 'post_date',
					'order' 			=> 'rand',
					'post_type' 		=> 'staff',
					'posts_per_page'	=> 6,
					'tax_query'			=> array(
						'relation'		=> 'OR',
						array(
							'taxonomy'	=> 'staff_departments',
							'terms'		=> $wpex_port_cats[0]->term_id
						),
					)
				);
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) : ?>
                	<div id="single-staff-related" class="clearfix">            
                        <h2><?php _e( 'Related Staff', 'office' ); ?></h2>                   
                        <?php
                        $count=0;
                        while ( $my_query->have_posts()) : $my_query->the_post();
                            $count++; ?>
                            <?php if( has_post_thumbnail() ) :  ?>
                                <article class="related-staff-item <?php if($count == '1') { echo 'no-left-margin'; } ?>">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('staff_entry_width'),  wpex_img('staff_entry_height'),  wpex_img('staff_entry_crop') ); ?>" alt="<?php echo the_title(); ?>" /></a>
                                </article><!-- /related-staff-item -->
                            <?php endif; ?>                    
                        <?php endwhile; wp_reset_postdata(); ?>
					</div><!-- /single-staff-related -->
                <?php endif; //have_posts check ?>
            <?php endif; //wpex_port_cats check ?>
        <?php endif; // related section enabled check ?>
        
        <?php if( wpex_get_data( 'enable_disable_staff_comments' ) == '1') { ?>
			<?php comments_template(); ?>
		<?php } ?>
            
    </article><!-- /post -->

<?php endwhile; ?>
             
<?php get_sidebar(); ?>
<?php get_footer(); ?>
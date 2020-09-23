<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 */
?>

<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

	<?php
	// Hide post details when necessary
    if ( wpex_get_data('disable_portfolio_meta','1') !== '1' || get_post_meta( get_the_ID(), 'wpex_portfolio_post_details', true ) == 'disabled' ) {
        $wpex_disable_post_details = 'disable';
    } else {
        $wpex_disable_post_details = 'enable';
    } ?>

    <?php
	// Get attachments
	$attachments = wpex_get_gallery_ids(); ?>
    
	<?php
    /*-----------------------------------------------------------------------------------*/
    // Full-Width Portfolio Style 
    /*-----------------------------------------------------------------------------------*/
    if( get_post_meta(get_the_ID(), 'office_portfolio_style', TRUE ) == 'full' ) { ?>
    
        <?php
		// Full-Width Video
		if ( get_post_meta(get_the_ID(), 'office_portfolio_video', TRUE) !== '' || get_post_meta(get_the_ID(), 'wpex_portfolio_post_video', TRUE) !== '') { ?>
        
            <div id="full-portfolio-video" class="portfolio-video fitvids">
            	<?php if ( get_post_meta(get_the_ID(), 'wpex_portfolio_post_video', TRUE) !== '' ) : ?>
                    <?php echo wp_oembed_get( get_post_meta( get_the_ID(), 'wpex_portfolio_post_video', true ) ); ?>
                <?php else : ?>
                	<?php echo do_shortcode( get_post_meta(get_the_ID(), 'office_portfolio_video', TRUE) ); ?>
                <?php endif; ?>
            </div><!-- /portfolio-video -->
            
		<?php
		// Full-Width Slider
		} elseif ( get_post_meta( get_the_ID(), 'wpex_portfolio_post_slider', TRUE) == 'enabled' ) { ?>
        	       
			<?php if ( $attachments ) : ?>
            	<?php
				// Fire js scripts for pagepage slider
				wp_enqueue_script('flexslider', WPEX_JS_DIR_URI .'flexslider.js', array('jquery'), '2.1', true);
				wp_enqueue_script('office-portfolio-slides', WPEX_JS_DIR_URI .'portfolio-slider.js', array('jquery','flexslider'), '1.0', true); ?>
            	<div id="slider-wrap" class="single-portfolio-full-slider">
                    <div id="full-slides" class="flexslider clearfix">
                        <ul class="slides">
                            <?php
                            foreach ($attachments as $attachment) :
                 			$attachment_meta = wpex_get_attachment( $attachment ); ?>
                                <li class="slide">
                                    <img src="<?php echo aq_resize( wp_get_attachment_url( $attachment ), wpex_img('portfolio_post_full_width'),  wpex_img('portfolio_post_full_height'),  wpex_img('portfolio_post_full_crop') ); ?>" alt="<?php echo $attachment_meta['alt']; ?>" />
                                </li><!--/slide --> 
                            <?php endforeach; ?>
                        </ul><!-- /slides -->
                    </div><!--/full-slides -->
                </div><!-- /slider-wrap -->
            <?php endif; ?>
            
		<?php }
		// Featured Image
		elseif ( get_post_meta( get_the_ID(), 'wpex_post_thumb', TRUE ) !== 'on' ) { ?>
			<div class="single-portfolio-full-feat-img">
				<img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('portfolio_post_full_width'),  wpex_img('portfolio_post_full_height'),  wpex_img('portfolio_post_full_crop') ); ?>" alt="<?php the_title(); ?>" />
			</div><!-- /single-portfolio-full-feat-img -->
		
		<?php } ?>
    
    <header id="page-heading">
        <h1><?php the_title(); ?></h1>
        <?php if( wpex_get_data('disable_breadcrumbs','1') == '1') office_breadcrumbs(); ?>
    </header><!-- /page-heading -->
    
    <div id="single-portfolio" class="full-portfolio clearfix meta-<?php echo $wpex_disable_post_details; ?>">
    
    	<?php get_template_part('includes/portfolio','meta'); ?>
            
		<div id="full-portfolio-content" class="entry clearfix">
			<?php the_content(); ?>
		</div><!-- /full-portfolio-content -->
        
        <?php if( wpex_get_data('enable_disable_portfolio_comments' ) == '1') comments_template(); ?>

	</div><!-- /single-portfolio -->
    
    
    
    <?php
    /*-----------------------------------------------------------------------------------*/
    // Grid Portfolio Style 
    /*-----------------------------------------------------------------------------------*/
	} elseif ( get_post_meta(get_the_ID(), 'office_portfolio_style', TRUE) == 'grid' ) { ?>
    
    <div id="single-portfolio" class="full-portfolio clearfix meta-<?php echo $wpex_disable_post_details; ?>">
    
    		<header id="page-heading">
                <h1><?php the_title(); ?></h1>
                <?php if( wpex_get_data('disable_breadcrumbs','1') == '1') office_breadcrumbs(); ?>
            </header><!-- /page-heading -->
    
    		<?php if($attachments) : ?>
            	<div id="portfolio-grid" class="gallery-wrap clearfix">
                	<?php
					foreach ($attachments as $attachment) :
					$attachment_meta = wpex_get_attachment( $attachment ); ?>
                        <div class="gallery-photo">
                            <a href="<?php echo wp_get_attachment_url( $attachment ); ?>" class="single-gallery-thumb" rel="prettyPhoto[gallery]" title="<?php echo $attachment_meta['title']; ?>"> <img src="<?php echo aq_resize( wp_get_attachment_url( $attachment ), wpex_img('grid_width'),  wpex_img('grid_height'),  wpex_img('grid_crop') ); ?>" alt="<?php echo $attachment_meta['alt']; ?>" class="attachment-post-thumbnail" /></a>
                        </div><!-- /gallery-photo -->
                	<?php endforeach; ?>
            	</div><!-- /portfolio-grid -->
                <span id="portfolio-grid-divider"></span>
            <?php endif; ?>
               
			<?php get_template_part('includes/portfolio','meta'); ?>
            
            <div id="full-portfolio-content" class="entry clearfix">
                <?php the_content(); ?>
            </div><!-- /full-portfolio-content -->

            <?php if(wpex_get_data('enable_disable_portfolio_comments') == '1') comments_template(); ?>
      
    </div><!-- /single-portfolio -->
    
    <?php
    /*-----------------------------------------------------------------------------------*/
    // Default Portfolio Style 
    /*-----------------------------------------------------------------------------------*/
    } else { ?>
    
    <?php
	// Fire js scripts for pagepage slider
    wp_enqueue_script('flexslider', WPEX_JS_DIR_URI .'flexslider.js', array('jquery'), '2.1', true);
	wp_enqueue_script('office-portfolio-slides', WPEX_JS_DIR_URI .'portfolio-slider.js', array('jquery','flexslider'), '1.0', true); ?>
    
    <header id="page-heading">
        <h1><?php the_title(); ?></h1>
        <?php if( wpex_get_data('disable_breadcrumbs','1') == '1') office_breadcrumbs(); ?>
    </header><!-- /page-heading -->
    
    <div id="single-portfolio" class="clearfix">
            <div id="single-portfolio-right">
				<?php
                // Display post video
                if( get_post_meta(get_the_ID(), 'office_portfolio_video', TRUE) !== '' || get_post_meta(get_the_ID(), 'wpex_portfolio_post_video', TRUE) !== '') { ?>
                
                    <div class="portfolio-video fitvids">
                        <?php if ( get_post_meta(get_the_ID(), 'wpex_portfolio_post_video', TRUE) !== '' ) : ?>
                            <?php echo wp_oembed_get( get_post_meta( get_the_ID(), 'wpex_portfolio_post_video', true ) ); ?>
                        <?php else : ?>
                            <?php echo do_shortcode( get_post_meta(get_the_ID(), 'office_portfolio_video', TRUE) ); ?>
                        <?php endif; ?>
                    </div><!-- /portfolio-video -->
					
				<?php
				// Post Slider
                } elseif ( get_post_meta( get_the_ID(), 'wpex_portfolio_post_slider', TRUE) == 'enabled' ) { ?>
            
					<?php
                    // Display post slider if attachments exist
                    if ( $attachments ) : ?>
                        <div  id="portfolio-slides-wrap">
                        <div id="portfolio-slides" class="flexslider clearfix">
                            <ul class="slides">
                                    <?php
                           			foreach ($attachments as $attachment) :
                 					$attachment_meta = wpex_get_attachment( $attachment ); ?>
                                        <li class="slide">
                                            <a href="<?php echo wp_get_attachment_url( $attachment ); ?>" title="<?php echo $attachment_meta['title']; ?>" rel="prettyPhoto[gallery]">
                                            	<img src="<?php echo aq_resize( wp_get_attachment_url( $attachment ), wpex_img('portfolio_post_width'),  wpex_img('portfolio_post_height'), wpex_img('portfolio_post_crop') ); ?>" alt="<?php echo $attachment_meta['alt']; ?>" />
                                            </a>
                                        </li><!-- /slide -->
                                    <?php endforeach; ?>
                                    </ul><!-- /slides -->
                                </div><!-- /portfolio-slides -->
                            </div><!-- /portfolio-slides-wrap -->
                    <?php endif; ?>
                <?php }
				// Featured image
				elseif ( get_post_meta( get_the_ID(), 'wpex_post_thumb', TRUE ) !== 'on' ) { ?>
                
                <div class="single-portfolio-feat-img">
                    <img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('portfolio_post_width'),  wpex_img('portfolio_post_height'),  wpex_img('portfolio_post_crop') ); ?>" alt="<?php the_title(); ?>" />
                </div><!-- /single-portfolio-full-feat-img -->
				<?php } ?>
				
            </div><!-- /single-portfolio-right -->
            
            <div id="single-portfolio-left" class="clearfix">
            	<div class="entry clearfix">
                	<?php the_content(); ?>
                </div><!-- /entry -->
               <?php get_template_part('includes/portfolio','meta'); ?>
            </div><!-- /single-portfolio-left -->
            <?php if( wpex_get_data('enable_disable_portfolio_comments','1') == '1') comments_template(); ?>
        </div><!-- /single-portfolio -->
        
        <?php } ?>
        
	<div class="clear"></div><!-- /clear floats -->
        
    <?php
    /*-----------------------------------------------------------------------------------*/
    // Related posts if not disabled 
    /*-----------------------------------------------------------------------------------*/
    
        if( wpex_get_data('disable_related_port','1') == '1') :
            $wpex_port_cats = wp_get_post_terms(get_the_ID(), 'portfolio_cats');
            if ( $wpex_port_cats ) :  ?>
                <div id="single-portfolio-related" class="clearfix">
            
                    <div class="heading">
                        <h2><span><?php _e('Related Items','office'); ?></span></h2>
                    </div><!-- /heading -->
                    
                    <?php
                    $args = array(
                        'post__not_in' => array( get_the_ID() ),
                        'orderby'=> 'post_date',
                        'order' => 'rand',
                        'post_type' => 'portfolio',
                        'posts_per_page' => 4,
                        'tax_query' => array(
                            'relation' => 'OR',
                            array(
                                'taxonomy' => 'portfolio_cats',
                                'terms' => $wpex_port_cats[0]->term_id
                            ),
                        )
                    );
                    $related_query = new WP_Query($args);
                    if( $related_query->have_posts() ) {
                    $count=0;
                    while ( $related_query->have_posts()) : $related_query->the_post();
                        $count++; ?>
                    
                        <?php if( has_post_thumbnail() ) :  ?>
                            <article class="portfolio-item <?php if($count == '4') { echo 'no-margin'; } ?>">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('portfolio_entry_width'),  wpex_img('portfolio_entry_height'), wpex_img('portfolio_entry_crop') ); ?>" alt="<?php echo the_title(); ?>" /></a>
                                <h3><?php the_title(); ?></h3>
                            </article><!-- /portfolio-item -->
                        <?php endif; ?>
                        <?php if( $count == '4') { echo '<div class="clear"></div>'; $count=0; } ?>
                        
                    <?php endwhile; wp_reset_postdata(); } ?>
                </div><!-- /single-portfolio-related -->
            <?php endif; //wpex_port_cats check ?>
        <?php endif; // related section enabled check ?>
        
    </article><!-- /post -->
    
    <nav id="single-portfolio-nav" class="clearfix"> 
        <div class="one-half"><?php next_post_link('%link', '&larr; %title', false); ?></div>
        <div class="one-half column-last"><?php previous_post_link('%link', '%title &rarr;', false); ?></div>
    </nav><!-- /single-portfolio-nav -->
  
<?php endwhile; ?>
<?php get_footer(); ?>
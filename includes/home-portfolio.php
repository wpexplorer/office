<?php
/**
 * File used for homepage recent portfolio carousel
 *
 * @package WordPress
 * @subpackage Office Theme
 */

//get and set portfolio category
$home_portfolio_cat = ( wpex_get_data('home_portfolio_cat') != 'Select' ) ? wpex_get_data('home_portfolio_cat') : NULL;

//tax query
if( $home_portfolio_cat ) {
	$portfolio_tax_query = array(
		array(
			  'taxonomy'	=> 'portfolio_cats',
			  'field'		=> 'slug',
			  'terms'		=> $home_portfolio_cat
			  )
		);
} else { $portfolio_tax_query = NULL; }

//query post types
$home_portfolio_query = new WP_Query(
	array(
		'post_type'		=> wpex_get_data('home_carousel_post_type','portfolio'),
		'showposts'		=>  wpex_get_data('home_portfolio_count','6'),
		'tax_query'		=> $portfolio_tax_query,
		'no_found_rows'	=> true
	)
);

if ( $home_portfolio_query->posts ) :
	
	// Load scripts for the carousel
	wp_enqueue_script('carouFredSel', WPEX_JS_DIR_URI .'caroufredsel.js', array('jquery'), '6.2.1', true);
	wp_enqueue_script('office-home-portfolio-carousel', WPEX_JS_DIR_URI .'home-carousel.js', array('jquery','carouFredSel'), '1.0', true); ?>        
    
    <div id="home-projects" class="home-projects-carousel clearfix">
    
        <?php $home_portfolio_title = wpex_get_data('home_portfolio_title') ? wpex_get_data('home_portfolio_title') : __('Recent Work','office'); ?>
        
		<?php if ( wpex_get_data('home_portfolio_title') !== 'disable') { ?>
            <div class="heading">
                <h2>
                <?php if( wpex_get_data('home_portfolio_title_url') ) { ?>
                    <a href="<?php echo wpex_get_data('home_portfolio_title_url'); ?>" title="<?php echo esc_attr( $wpex_portfolio_title ); ?>">
                <?php } ?>
                <span><?php echo $home_portfolio_title; ?></span>
                <?php if( wpex_get_data('home_portfolio_title_url') ) echo '</a>'; ?>
                </h2>
            </div><!-- /heading -->
		<?php } ?>
    
        <div id="home-portfolio-carousel-wrp" class="clearfix">
            <div id="home-portfolio-carousel" class="fredcarousel">
            
				<?php
                $count=0;
                while ( $home_portfolio_query->have_posts() ) : $home_portfolio_query->the_post();
                $count++;
               
                //show entry only if post has featured image
                if( has_post_thumbnail() ) :  ?>
                    <div class="portfolio-item count-<?php echo $count; ?>">
                        <a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('portfolio_carousel_entry_width'),  wpex_img('portfolio_carousel_entry_height'),  wpex_img('portfolio_carousel_entry_crop') ); ?>" alt="<?php wpex_esc_title(); ?>" /></a>
                        <h3><?php the_title(); ?></h3>
                    </div><!-- /portfolio-item -->
                <?php endif; ?>
                <?php if ( $count == '2' ) $count=0; ?>
                <?php endwhile; ?>
            
            </div><!-- /home-portfolio-carousel -->
            <div id="carousel-prev"></div>
            <div id="carousel-next"></div>
            <div id="carousel-pagination" class="pagination"></div>
        </div><!-- /home-portfolio-carousel-wrp -->        
    </div><!-- /home-projects -->
    
<?php endif; wp_reset_postdata(); ?>
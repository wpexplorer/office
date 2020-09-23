<?php
/**
 * File used for homepage FlexSlider slider
 *
 * @package WordPress
 * @subpackage Office Theme
 */ ?>

<?php
$home_flexslides_query = new WP_Query(
	array(
		'post_type' => 'slides',
		'showposts' =>'-1',
		'order' => 'ASC',
		'no_found_rows' => true
	)
);

if( $home_flexslides_query->posts ) : ?>

	<?php
	// Fire js scripts for homepage slider
    wp_enqueue_script('flexslider', WPEX_JS_DIR_URI .'flexslider.js', array('jquery'), '2.1', true);
	wp_enqueue_script('office-home-slides', WPEX_JS_DIR_URI .'home-slider.js', array('jquery','flexslider'), '1.0', true);
	
	//Vars
	$wpex_slideshow = ( wpex_get_data('slider_slideshow', '1') == 1 ) ? 'true' : 'false';
	$wpex_slider_randomize = ( wpex_get_data('slider_randomize', '1') == 1 ) ? 'true' : 'false';
	
	// Set slider options
	$flex_params = array(
		'slideshow' => $wpex_slideshow,
		'randomize' => $wpex_slider_randomize ,		
		'animation' => wpex_get_data('slider_animation','slide'),
		'direction' => wpex_get_data('slider_direction','horizontal'),
		'slideshowSpeed' => wpex_get_data('slider_slideshow_speed','7000')
	);
	
	// Localize slider script
	wp_localize_script( 'office-home-slides', 'flexLocalize', $flex_params ); ?>
    
    <div id="slider-wrap">
        <div id="full-slides" class="flexslider clearfix">
            <ul class="slides">
                <?php while ( $home_flexslides_query->have_posts() ) : $home_flexslides_query->the_post(); ?>    
                    <?php if( get_post_meta(get_the_ID(), 'office_slides_video', TRUE) !== '' || get_post_meta(get_the_ID(), 'office_slides_video_oembed', TRUE) !== '') : ?>
                        <li class="home-video-slide">
                        	<?php if ( get_post_meta(get_the_ID(), 'office_slides_video_oembed', TRUE) !== '' ) { ?>
                            <?php echo wp_oembed_get( get_post_meta(get_the_ID(), 'office_slides_video_oembed', TRUE) ) ?>
                            <?php } else { ?>
                            <?php echo do_shortcode( get_post_meta(get_the_ID(), 'office_slides_video', TRUE) ) ?>
                            <?php } ?>
                        </li><!--home-video-slide -->
                    <?php else : ?>
						<?php if( has_post_thumbnail() ) : ?>
                            <li class="slide">
                                <?php if( get_post_meta(get_the_ID(), 'office_slides_url', TRUE) !== '' ) { ?><a href="<?php echo get_post_meta(get_the_ID(), 'office_slides_url', TRUE); ?>" title="<?php wpex_esc_title(); ?>" target="_<?php echo get_post_meta(get_the_ID(), 'office_slides_url_target', TRUE); ?>"><?php } ?> 
                                	<img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('home_slider_width'),  wpex_img('home_slider_height'),  wpex_img('home_slider_crop') ); ?>" alt="<?php echo wpex_esc_title(); ?>" />
                                 <?php if( get_post_meta(get_the_ID(), 'office_slides_url', TRUE) !== '' ) echo '</a>'; ?>
                            <?php if( get_post_meta(get_the_ID(), 'office_slides_description', TRUE) || get_post_meta( get_the_ID(), 'office_enable_caption', TRUE) == 'enable') : ?>
                            <div class="caption">
                                <?php if( get_post_meta(get_the_ID(), 'office_enable_caption', TRUE) == 'enable') : ?>
                                    <h3><?php the_title(); ?></h3>
                               <?php endif; ?>
                               <?php echo do_shortcode( get_post_meta(get_the_ID(), 'office_slides_description', TRUE) ); ?>
                            </div><!-- /caption -->
                        <?php endif; // caption check ?>
                	</li><!--/slide -->
                <?php endif; // thumbnail check ?>
				<?php endif; // video check ?>
                <?php endwhile; ?>
            </ul><!-- /slides -->
        </div><!--/full-slides -->
    </div><!-- /slider-wrap -->
    
<?php endif; // end query check ?>
<?php wp_reset_postdata(); //reset query ?>

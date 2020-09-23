<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 */

// Get all images attached to the post
$args = array(
	'orderby'			=> 'menu_order',
	'order'				=> 'ASC',
	'post_type'			=> 'attachment',
	'post_parent'		=> get_the_ID(),
	'post_mime_type'	=> 'image',
	'post_status'		=> null,
	'posts_per_page'	=> -1
);
$attachments = get_posts($args); 

if( $attachments ) { ?>

	<?php
	// Fire js scripts for pagepage slider
	wp_enqueue_script('flexslider', WPEX_JS_DIR_URI .'flexslider.js', array('jquery'), '2.1', true);
	wp_enqueue_script('office-page-slides', WPEX_JS_DIR_URI .'page-slider.js', array('jquery','flexslider'), '1.0', true); ?>
	
	<div id="slider-wrap">
		<div id="full-slides" class="flexslider clearfix">
			<ul class="slides">
				<?php foreach ($attachments as $attachment) :
					$slides_description = $attachment->post_content; ?>
					<li class="slide">
						<img src="<?php echo aq_resize( wp_get_attachment_url( $attachment->ID ), wpex_img('page_slider_width'),  wpex_img('page_slider_height'),  wpex_img('page_slider_crop') ); ?>" alt="<?php echo esc_attr( apply_filters('the_title', $attachment->post_title ) ); ?>" />
						<?php if(!empty($slides_description)) { ?>
						<div class="caption">
							<p><?php echo $slides_description; ?></p>
						</div><!-- /caption -->
						<?php } ?>
					</li><!--/slide --> 
				<?php endforeach; ?>
			</ul><!-- /slides -->
		</div><!--/full-slides -->
	</div><!-- /slider-wrap -->
	
<?php } ?>
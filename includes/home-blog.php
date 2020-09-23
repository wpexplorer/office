<?php
/**
 * File used for homepage recent blog posts
 *
 * @package WordPress
 * @subpackage Office Theme
 */
?>

<?php
//get and set blog category
$home_blog_cat = (wpex_get_data('home_blog_cat') != 'Select') ? wpex_get_data('home_blog_cat') : $home_blog_cat = NULL;

//tax query
if( $home_blog_cat ) {
	$blog_tax_query = array(
		array(
			  'taxonomy' => 'category',
			  'field' => 'slug',
			  'terms' => $home_blog_cat
			  )
		);
} else { $blog_tax_query = NULL; }


//query post types
$home_blog_query = new WP_Query(
	array(
		'post_type' => 'post',
		'showposts' =>  wpex_get_data('home_blog_count'),
		'tax_query' => $blog_tax_query,
		'no_found_rows' => true
	)
);

if ( $home_blog_query->posts ) : ?>

<div id="home-blog" class="clearfix">

	<?php $home_blog_title = wpex_get_data('home_blog_title') ? wpex_get_data('home_blog_title') : __('Recent Posts','office'); ?>
        
		<?php if ( wpex_get_data('home_blog_title') !== 'disable') { ?>
            <div class="heading">
                <h2>
                <?php if( wpex_get_data('home_blog_title_url') ) { ?>
                    <a href="<?php echo wpex_get_data('home_blog_title_url'); ?>" title="<?php echo esc_attr( $wpex_blog_title ); ?>">
                <?php } ?>
                <span><?php echo $home_blog_title; ?></span>
                <?php if( wpex_get_data('home_blog_title_url') ) echo '</a>'; ?>
                </h2>
            </div><!-- /heading -->
	<?php } ?>
	
	<?php $count=0; ?>
	<?php while ( $home_blog_query->have_posts() ) : $home_blog_query->the_post(); ?>
    <?php $count++; ?>
	
        <div class="home-entry count-<?php echo $count; ?>">
            <?php if( has_post_thumbnail() ) { ?>
                <a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('home_blog_entry_width'),  wpex_img('home_blog_entry_height'),  wpex_img('home_blog_entry_crop') ); ?>" alt="<?php echo wpex_esc_title(); ?>" /></a>
            <?php } ?>
            <h3><a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>"><?php the_title(); ?></a></h3>
            <?php echo excerpt(wpex_get_data('home_blog_excerpt_length')); ?>
        </div>
		<?php if ( $count == '3' ) $count = '0'; ?>
        
	<?php endwhile; ?>

</div>
<!-- END #home-blog -->      	
<?php endif; wp_reset_postdata(); ?>
<?php
/**
 * File used for homepage higlights
 *
 * @package WordPress
 * @subpackage Office Theme
 */


$home_highlights_query = new WP_Query(
	array(
		'post_type' => 'hp_highlights',
		'showposts' =>'-1',
		'no_found_rows' => true
	)
);

if( $home_highlights_query->posts ) : ?>

    <div id="home-highlights" class="clearfix">
        
        <?php $home_highlights_title = wpex_get_data('home_highlights_title') ? wpex_get_data('home_highlights_title') : __('What We Do','office'); ?>
        
		<?php if ( wpex_get_data('home_highlights_title') !== 'disable') { ?>
            <div class="heading">
                <h2>
                <?php if( wpex_get_data('home_highlights_title_url') ) { ?>
                    <a href="<?php echo wpex_get_data('home_highlights_title_url'); ?>" title="<?php echo esc_attr( $wpex_highlights_title ); ?>">
                <?php } ?>
                <span><?php echo $home_highlights_title; ?></span>
                <?php if( wpex_get_data('home_highlights_title_url') ) echo '</a>'; ?>
                </h2>
            </div><!-- /heading -->
        <?php } ?>
        
        <?php
        //start loop
        $count=0;
       	while ( $home_highlights_query->have_posts() ) : $home_highlights_query->the_post();
		$count++;
    
        //meta
        $hp_highlights_url_target = ( get_post_meta(get_the_ID(), 'office_hp_highlights_url_target', TRUE) !== 'self') ? get_post_meta(get_the_ID(), 'office_hp_highlights_url_target', TRUE) : 'self'; ?>
        
        <div class="hp-highlight count-<?php echo $count; ?>">
        	<?php if( get_post_meta(get_the_ID(), 'office_hp_highlights_url', TRUE) !== '' ) { ?>
            	<a href="<?php echo get_post_meta(get_the_ID(), 'office_hp_highlights_url', TRUE); ?>" title="<?php wpex_esc_title(); ?>" target="_<?php echo $hp_highlights_url_target; ?>" class="hp-highlight-link">
            <?php } ?>
				<?php if( has_post_thumbnail() ) { ?>
                    <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" title="<?php wpex_esc_title(); ?>" class="hp-highlight-img" alt="<?php wpex_esc_title(); ?>" />
                <?php } ?>
                <h3><?php the_title(); ?></h3>
            <?php if( get_post_meta(get_the_ID(), 'office_hp_highlights_url', TRUE) !== '' ) echo '</a>'; ?>
            <?php the_content(); ?>
        </div><!-- .hp-highlight -->
        <?php if( $count == '4') { $count = '0'; } endwhile; ?>
    
    </div><!-- #home-highlights -->
    
<?php endif; wp_reset_postdata(); ?>
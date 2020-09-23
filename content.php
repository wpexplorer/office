<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 */
?>


<?php
/**
    Entry Style 1
**/
if ( wpex_get_data('blog_style','one') == 'one' ) : ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('loop-entry clearfix') ?>>
    
        <?php
        // Entry Thumbnail
        if( has_post_thumbnail() ) {  ?>
            <div class="loop-entry-thumbnail">
                <a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('blog_entry_width'),  wpex_img('blog_entry_height'),  wpex_img('blog_entry_crop') ); ?>" alt="<?php wpex_esc_title(); ?>" /></a>
            </div><!-- /loop-entry-thumbnail -->
        <?php } ?>
      
        <div class="loop-entry-right <?php if ( wpex_get_data('enable_disable_entry_meta') !== '1' ) echo 'full-width'; ?>">
            <h2><a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>"><?php the_title(); ?></a></h2>
            <?php if( wpex_get_data('enable_full_blog','1') == '1') { the_content(); } else { the_excerpt(); } ?>
        </div><!-- /loop-entry-right -->
        
        <?php
        // Post Meta
        wpex_blog_meta(); ?>
              
    </article><!-- /loop-entry -->
    
<?php endif; ?>

<?php
/**
    Entry Style 2
**/
if ( wpex_get_data('blog_style','one') == 'two' ) : ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('loop-entry-two clearfix') ?>>  
        <?php if( has_post_thumbnail() ) {  ?>
            <div class="loop-entry-two-thumbnail">
                <a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('blog_entry_two_width'),  wpex_img('blog_entry_two_height'),  wpex_img('blog_entry_two_crop') ); ?>" alt="<?php wpex_esc_title(); ?>" /></a>
            </div><!-- /loop-entry-two-thumbnail -->
        <?php } ?>      
        <div class="loop-entry-two-right">
            <h2><a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>"><?php the_title(); ?></a></h2>
            <?php if( wpex_get_data('enable_full_blog','1') == '1') { ?>
				<?php the_content(); ?>
			<?php } else { ?>
            	<?php echo excerpt( wpex_get_data('blog_excerpt','30') ); ?> <a href="<?php the_permalink(); ?>" title="<?php _e('continue reading','office'); ?>"><?php _e('continue reading','office'); ?> &rarr;</a>
            <?php } ?>
        </div><!-- /loop-entry-two-right -->         
    </article><!-- /loop-entry-two -->
    
<?php endif; ?>
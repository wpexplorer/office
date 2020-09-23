<?php
/**
 * File used for homepage tagline module
 *
 * @package WordPress
 * @subpackage Office Theme
 */
?>

<?php
if ( wpex_get_data('home_tagline') ) : ?>
			
	<?php $wpex_tagline_title = wpex_get_data('home_tagline_title') ? wpex_get_data('home_tagline_title') : __('Welcome','office'); ?>
    
    <?php if ( wpex_get_data('home_tagline_title') !== 'disable') { ?>
        <div class="heading">
            <h2>
            <?php if( wpex_get_data('home_tagline_title_url') ) { ?>
                <a href="<?php echo wpex_get_data('home_tagline_title_url'); ?>" title="<?php echo esc_title( $wpex_tagline_title ); ?>">
            <?php } ?>
            <span><?php echo $wpex_tagline_title; ?></span>
            <?php if( wpex_get_data('home_tagline_title_url') ) echo '</a>'; ?>
            </h2>
        </div><!-- /heading -->
    <?php } ?>
    
    <div id="home-tagline" class="clearfix">
        <?php echo stripslashes(do_shortcode(wpex_get_data('home_tagline'))); ?>
    </div><!-- /home-tagline -->
				
<?php endif; ?>
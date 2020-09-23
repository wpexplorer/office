<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 */ ?>

<div class="clear"></div>
</div><!-- /container -->

    <footer id="footer">
    
    	<?php if( wpex_get_data('disable_widgetized_footer','1') == '1' ) : ?>
        
        <div id="footer-widget-wrap" class="clearfix <?php if ( wpex_get_data('full_width_footer_widgets') == '1' ) echo 'full-widgets'; ?>">
    
            <div id="footer-left" class="clearfix">
            	<?php dynamic_sidebar('footer-left'); ?>
            </div><!-- /footer-left -->
            
            <div id="footer-middle" class="clearfix">
            	<?php dynamic_sidebar('footer-middle'); ?>
            </div><!-- /footer-middle -->
            
            <div id="footer-right" class="clearfix">
            	<?php dynamic_sidebar('footer-right'); ?>
            </div><!-- /footer-right -->
        
        </div><!-- /footer-widget-wrap -->
        
        <?php endif; ?>
        
        <a href="#toplink" id="toplink"><?php _e('back up', 'office'); ?></a>
    
    </footer><!-- /footer -->
    
</div><!-- /wrap -->

    <div id="footer-bottom" class="clearfix">
    
        <div id="copyright">
            <?php if( wpex_get_data('custom_copyright') ) : ?>
				<?php echo wpex_get_data('custom_copyright'); ?>
			<?php else : ?>
            	&copy; <?php _e('Copyright', 'office'); ?> <?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>/" title="<?php bloginfo('name'); ?>" rel="home"><?php bloginfo('name'); ?></a>
            <?php endif; ?>
        </div><!-- /copyright -->
        
        <div id="footer-menu">
            <?php wp_nav_menu( array(
                'theme_location' => 'footer_menu',
                'sort_column' => 'menu_order',
                'fallback_cb' => ''
            )); ?>
        </div><!-- /footer-menu -->
    
    </div><!-- /footer-bottom -->

<?php wp_footer(); ?>
</body>
</html>
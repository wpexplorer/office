<?php
/**
 * Output the blog meta
 *
 * @package WordPress
 * @subpackage Office
 * @since Office 1.0
 */

if ( ! function_exists('wpex_blog_meta') ) {
	
	function wpex_blog_meta() {

		/** Entries **/
		if ( ! is_singular() ) {

			if ( wpex_get_data('enable_disable_entry_meta') !== '1' ) return; ?>

			 <div class="loop-entry-left">
				<div class="post-meta">
	            <div class="post-date">
					<?php echo get_the_date(); ?>
	            </div><!-- /post-date -->
	            <div class="post-cat">
	               <?php the_category(); ?>
	            </div><!-- /post-cat -->
	        	</div><!-- /post-meta -->
	        </div><!-- /loop-entry-left -->

		<?php
		}
		/** Posts **/
		if ( is_singular() ) {

			if ( wpex_get_data('enable_disable_post_meta') !== '1' ) return; ?>
		
			<div class="post-meta">
	            <div class="post-date">
					<?php echo get_the_date(); ?>
	            </div><!-- /post-date -->
	            <div class="post-cat">
	               <?php the_category(); ?>
	            </div><!-- /post-cat -->
	        </div><!-- /post-meta -->

    	<?php }

	}
	
}
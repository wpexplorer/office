<?php
/**
 * Used for single portfolio posts meta
 *
 * @package WordPress
 * @subpackage Office Theme
 * @since Office 2.0
 */


if( wpex_get_data('disable_portfolio_meta','1' ) == '1' && get_post_meta( get_the_ID(), 'wpex_portfolio_post_details', true ) !== 'disabled' ) : ?>
	<?php if( get_post_meta(get_the_ID(), 'office_portfolio_style', TRUE) == 'full' || get_post_meta(get_the_ID(), 'office_portfolio_style', TRUE) == 'grid' ) { ?>
	<div id="single-portfolio-left" class="clearfix">
	<?php } ?>
		<div id="single-portfolio-meta" class="clearfix">
			<ul>
			<?php
				// Get and loop through all meta options
				$opd = wpex_portfolio_details_array();
				foreach ( $opd as $opd_key => $opd_val ) {
					/** Date **/
					if ( 'date' == $opd_key ) {
						if( get_post_meta(get_the_ID(), $opd_val['meta_id'], TRUE) && 'disabled' != get_post_meta(get_the_ID(), $opd_val['meta_id'], TRUE) ) { ?>
							<li><span><?php echo $opd_val['label'] ?></span><?php echo get_post_meta(get_the_ID(), $opd_val['meta_id'], TRUE); ?></li>
						<?php } elseif( 'disabled' == get_post_meta(get_the_ID(), $opd_val['meta_id'], TRUE)  ) {
							//display nothing if disabled
							} else { ?>
							<li><span><?php echo $opd_val['label']; ?>:</span><?php echo get_the_date(); ?></li>
						<?php } ?>
					<?php }
					/** URL **/
					elseif( 'url' == $opd_val['type'] ) {
						// URL
						if ( get_post_meta(get_the_ID(), $opd_val['url']['meta_id'], TRUE) &&  !get_post_meta(get_the_ID(), $opd_val['title']['meta_id'], TRUE) ) { ?>
							<li><span><?php echo $opd_val['url']['label']; ?>:</span><a href="<?php echo get_post_meta(get_the_ID(), $opd_val['url']['meta_id'], TRUE); ?>" title=""><?php echo esc_url( get_post_meta(get_the_ID(), $opd_val['url']['meta_id'], TRUE) ); ?></a></li>
						<?php }
						// URL with Name
						if( get_post_meta(get_the_ID(), $opd_val['url']['meta_id'], TRUE) !=='' && get_post_meta(get_the_ID(), $opd_val['url']['meta_id'], TRUE) !== '') { ?>
							<li><span><?php echo $opd_val['url']['label']; ?>:</span><a href="<?php echo get_post_meta(get_the_ID(), $opd_val['url']['meta_id'], TRUE); ?>" title="<?php echo esc_attr( $opd_val['title']['meta_id'] ); ?>"><?php echo get_post_meta(get_the_ID(), $opd_val['title']['meta_id'], TRUE); ?></a></li>
						<?php }
					}
					/** Categories **/
					elseif( 'categories' == $opd_val['type'] ) {
						$terms = get_the_term_list( get_the_ID(), 'portfolio_cats' );
						if( !empty($terms) ) { ?>
							<li><span><?php echo $opd_val['label']; ?>:</span><?php echo get_the_term_list( get_the_ID(), 'portfolio_cats', '',', ',' ') ?></li>
						<?php }
					}
					/** Standard Types **/
					else {
						if( get_post_meta(get_the_ID(), $opd_val['meta_id'], TRUE) !=='' ) { ?>
							<li><span><?php echo $opd_val['label']; ?>:</span><?php echo get_post_meta(get_the_ID(), $opd_val['meta_id'], TRUE); ?></li>
						<?php }
					} ?>
				<?php } ?>
			</ul>
		</div><!-- /single-portfolio-meta -->
	<?php if( get_post_meta(get_the_ID(), 'office_portfolio_style', TRUE) == 'full' || get_post_meta(get_the_ID(), 'office_portfolio_style', TRUE) == 'grid' ) { ?>
	</div>
	<?php } ?>
<?php endif; ?>
<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 * Template Name: FAQs
 */
?>

<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

	<?php
	//show slider if enabled
	if ( 'enable' == get_post_meta( get_the_ID(), 'office_page_slider', true ) ) {
		get_template_part( 'includes/page-slides');
	} ?>
	
	<?php
	//get meta to set parent category
	$faqs_filter_parent = ( 'all' != get_post_meta(get_the_ID(), 'office_faqs_parent', true ) ) ? get_post_meta( get_the_ID(), 'office_faqs_parent', true ) : NULL; ?>
	
	<header id="page-heading">
		<h1><?php the_title(); ?></h1>	
		<?php if( wpex_get_data('disable_breadcrumbs','1') == '1') office_breadcrumbs(); ?> 
	</header><!-- /page-heading -->

	<?php if( ! empty( $post->post_content ) ) { ?>
		<div id="faqs-description">
			<?php the_content(); ?>
		</div><!-- /faqs-description -->
	<?php }?>
	
	<?php
	//tax query
	if( $faqs_filter_parent ) {
		$tax_query = array(
			array(
				  'taxonomy'	=> 'faqs_cats',
				  'field'		=> 'id',
				  'terms'		=> $faqs_filter_parent
				  )
			);
	} else {
		$tax_query = NULL;
	}
	$faqs_posts = new WP_Query(
		array(
			'post_type'		=> 'faqs',
			'showposts'		=>  '-1',
			'tax_query'		=> $tax_query,
			'no_found_rows'	=> true
		)
	);
	
	if ( $faqs_posts->posts ) : ?>
		<div class="post full-width clearfix">
			<?php
			//get faq categories
			$cats_args = array(
				'hide_empty' => '1',
				'child_of' => $faqs_filter_parent
			);
			$cats = get_terms( 'faqs_cats', $cats_args );
			//show filter if categories exist
			if( $cats ) { ?>
				<ul id="faqs-cats" class="clearfix">
					<li><a class="active" href="#all" rel="all" title="<?php esc_attr( _e( 'All FAQs', 'office' ) ); ?>"><?php _e( 'All', 'office' ); ?></a></li>
					<?php foreach ( $cats as $cat ) { ?>
						<li><a href="#" data-filter=".cat-<?php echo $cat->term_id; ?>" title="<?php echo esc_attr( $cat->name ); ?>"><span><?php echo $cat->name; ?></span></a></li>
					<?php } ?>
				</ul><!-- /faqs-cats -->
			<?php } //cats check ?>
		
			<div id="faqs-wrap" class="clearfix">
				<div class="faqs-content">
					<?php
					$count=0;
					while ( $faqs_posts->have_posts() ) : $faqs_posts->the_post();
					$count++;
					//get terms
					$terms = get_the_terms( get_the_ID(), 'faqs_cats' );
					$data = array();
					foreach( $terms as $term ) {
						$data[] = 'cat-'. $term->term_id;
					} ?> 
					<div class="faq-item <?php echo implode( ' ', $data ); ?>">
						<h2 class="faq-title"><span><?php the_title(); ?></span></h2>
						<div class="faq-content entry">
							<?php the_content(); ?>
						</div><!-- /faq -->
					</div><!-- /faq-item -->
					<?php endwhile; wp_reset_postdata(); ?>
				</div><!-- /faqs-content -->
			</div><!-- /faqs-wrap -->
		</div><!-- /post -->
	
	<?php endif; ?>

<?php endwhile; ?>	  

<?php get_footer(); ?>
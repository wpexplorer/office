<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 * Template Name: Portfolio With Filter
 */
?>

<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

	<?php
	//show slider if enabled
	if ( get_post_meta( get_the_ID(), 'office_page_slider', true) == 'enable' ) get_template_part( 'includes/page-slides'); ?>
	
	 <?php
	//get meta to set parent category
	if ( get_post_meta(get_the_ID(), 'office_portfolio_parent', true) !== 'all' && get_post_meta(get_the_ID(), 'office_portfolio_parent', true) !== '') {
		$portfolio_filter_parent = get_post_meta(get_the_ID(), 'office_portfolio_parent', true);
	} else {
		$portfolio_filter_parent = '';
	} ?>
	
	<header id="page-heading">
		<h1><?php the_title(); ?></h1>	
		<?php if( wpex_get_data('disable_breadcrumbs','1') == '1') office_breadcrumbs(); ?>
		<?php 
		//get portfolio categories
		$cats_args = array(
			'hide_empty'	=> '1',
			'child_of'		=> $portfolio_filter_parent
		);
		$cats = get_terms('portfolio_cats', $cats_args);
		
		//show filter if categories exist
		if($cats) { ?>
		<!-- Portfolio Filter -->
			<ul id="portfolio-cats" class="filter clearfix">
				<li><a href="#all" rel="all" class="active" data-filter="*"><span><?php _e('All', 'office'); ?></span></a></li>
				<?php
				foreach ($cats as $cat ) : ?>
				<li><a href="#<?php echo $cat->slug; ?>" data-filter=".<?php echo $cat->slug; ?>"><span><?php echo $cat->name; ?></span></a></li>
				<?php endforeach; ?>
			</ul><!-- /portfolio-cats -->
		<?php } ?>
		
	</header><!-- /page-heading -->
	
	<?php
	$content = $post->post_content;
	if(!empty($content)) { ?>
		<div id="portfolio-description" class="clearfix">
			<?php the_content(); ?>
		</div><!-- portfolio-description -->
	<?php } ?>
	
		
	<div class="post full-width clearfix">
	
		<div id="portfolio-wrap" class="clearfix">
			<div class="portfolio-content">
				<?php
				//tax query
				if($portfolio_filter_parent) {
				$tax_query = array(
					array(
						'taxonomy' => 'portfolio_cats',
						'field' => 'id',
						'terms' => $portfolio_filter_parent
						)
					);
				} else { $tax_query = NULL; }
				
				//get post type ==> portfolio
				query_posts(array(
					'post_type'=>'portfolio',
					'posts_per_page' => -1,
					'paged'=>$paged,
					'tax_query' => $tax_query
				)); ?>
			
				<?php
				$count=0;
				while (have_posts()) : the_post();
				$count++;
				
				//get terms
				$terms = get_the_terms( get_the_ID(), 'portfolio_cats' ); ?>
				
				<?php if ( has_post_thumbnail() ) :  ?>
					<article class="portfolio-item <?php if($terms) { foreach ($terms as $term) { echo $term->slug .' '; } } ?>">
						<a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>">
							<img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('portfolio_entry_width'),  wpex_img('portfolio_entry_height'),  wpex_img('portfolio_entry_crop') ); ?>" alt="<?php wpex_esc_title(); ?>" />
							<h3><?php the_title(); ?></h3>
						</a>
					</article><!-- /portfolio-item -->
				<?php endif; ?>          
				<?php endwhile; ?>
				
			</div><!-- /portfolio-content -->
		</div><!-- /portfolio-wrap -->
		<?php wpex_pagination(); wp_reset_query(); ?>
	
	</div><!-- /post -->

<?php endwhile; ?>
<?php get_footer(); ?>
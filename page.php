<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 */
?>

<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

	<?php
	//show slider if enabled
	if ( get_post_meta( get_the_ID(), 'office_page_slider', true) == 'enable' ) get_template_part( 'includes/page-slides'); ?>

	<div id="page-heading">
		<h1><?php the_title(); ?></h1>
		<?php if( wpex_get_data('disable_breadcrumbs','1') == '1') office_breadcrumbs(); ?>	
	</div><!-- /page-heading -->


<article class="post clearfix">

	<div class="entry clearfix">
			<?php the_content(); ?>
	</div><!-- /entry -->

	<?php if( wpex_get_data('enable_disable_page_comments') == '1') comments_template(); ?>
	
</article><!-- /post -->

<?php endwhile; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
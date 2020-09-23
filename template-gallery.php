<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 * Template Name: Photo Gallery
 */
?>

<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

	<?php
    //show slider if enabled
    if ( get_post_meta( get_the_ID(), 'office_page_slider', true) == 'enable' ) get_template_part( 'includes/page-slides'); ?>

    <header id="page-heading">
        <h1><?php the_title(); ?></h1>		
        <?php if( wpex_get_data('disable_breadcrumbs','1') == '1') office_breadcrumbs(); ?>
    </header><!-- /page-heading -->

	<?php $wp_query = new WP_Query(array(
				'paged' => $paged,
				'showposts' => '16',
				'post_parent' => get_the_ID(),
                'post_status' => 'null',
                'post_type'=> 'attachment',
                'post_mime_type' => 'image/jpeg,image/gif,image/jpg,image/png'
				) ); ?>
                
	<?php if ( $wp_query->posts ) : ?>
    
        <article class="gallery-wrap clearfix">
    
                <?php foreach( $wp_query->posts as $post ) : setup_postdata( $post ); ?>
                    <div class="gallery-photo">
                        <a href="<?php echo wp_get_attachment_url( get_the_ID() ); ?>" class="single-gallery-thumb" rel="prettyPhoto[gallery]" title="<?php wpex_esc_title(); ?>">
                            <img src="<?php echo aq_resize( wp_get_attachment_url( get_the_ID() ),  wpex_img( 'gallery_template_width' ), wpex_img( 'gallery_template_height' ), wpex_img( 'gallery_template_crop' ) ); ?>" alt="<?php wpex_esc_title(); ?>" class="attachment-post-thumbnail" height="" />
                        </a>
                    </div><!-- /gallery-photo -->
                <?php endforeach; ?>
        
        </article><!-- /gallery-wrap -->
    
    <?php endif; ?>
    <?php wpex_pagination(); ?>
    <?php wp_reset_query(); ?>

	<div class="gallery-post-content entry clearfix">
		<?php the_content(); ?>
	</div><!-- /entry -->
    
	<?php if( wpex_get_data('enable_disable_page_comments') == '1' ) comments_template(); ?>

<?php endwhile; ?>
<?php get_footer(); ?>
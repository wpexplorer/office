<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 */
?>
<?php get_header(); ?>

<div id="page-heading">
	<h1><?php the_title(); ?></h1>	
</div>
<!-- /post-meta -->

<div class="post full-width clearfix">

    <div class="entry clearfix">

	<div id="img-attch-page">
		<a href="<?php echo wp_get_attachment_url($post->ID, 'full-size'); ?>" class="prettyphoto-link">
        <?php
		$portimg = wp_get_attachment_image( $post->ID, 'full' );
		echo preg_replace('#(width|height)="\d+"#','',$portimg);
		?>
		</a>
        </div>  
        <!-- /img-attch-page -->
        
        <div id="img-attach-page-content">
        <?php the_content(); ?>
        </div>
        <!-- /img-attach-page-content -->
        
	</div>
	<!-- /entry -->
        
</div>
<!-- /post -->
             
<?php get_footer(); ?>
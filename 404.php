<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 */
?>
<?php get_header(); ?>

<div id="error-page">	
	<h1 id="error-page-title">404</h1>			
	<p id="error-page-text"><?php _e( 'Unfortunately, the page you tried accessing could not be retrieved. Please visit the', 'office' ); ?> <a href="<?php echo home_url() ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php _e('homepage','office'); ?></a>.</p>
</div>
<!-- END error-page -->

<?php get_footer(); ?>
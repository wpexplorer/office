<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 */
?>
<?php get_header(); ?>

<div id="page-heading">
	<h1 class="page-header-title archive-title">
		<?php
        if ( is_day() ) :
            printf( __( 'Daily Archives: %s', 'office' ), get_the_date() );
        elseif ( is_month() ) :
            printf( __( 'Monthly Archives: %s', 'office' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'office' ) ) );
        elseif ( is_year() ) :
            printf( __( 'Yearly Archives: %s', 'office' ), get_the_date( _x( 'Y', 'yearly archives date format', 'office' ) ) );
        else :
            echo single_term_title();
        endif; ?>
    </h1>
    <?php if( wpex_get_data('disable_breadcrumbs','1') == '1') office_breadcrumbs(); ?>
</div><!-- /page-heading -->

<?php if (have_posts()) : ?>
    <div id="post" class="post clearfix">
     	<?php if ( term_description() ) { ?><div class="archive-description"><?php echo term_description(); ?></div><?php } ?>
        <?php if ( have_posts() ) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part( 'content', get_post_format() ); ?>
            <?php endwhile; ?>    	
        <?php endif; ?>
        <?php wpex_pagination(); ?>
    </div><!-- /post -->
<?php endif; ?>

<?php get_sidebar(); ?>	  
<?php get_footer(); ?>
<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

	<?php the_post(); ?>

    <header id="page-heading">
            <h1><?php _e('Posts by','office'); ?>: <?php printf( __( 'All posts by %s', 'office' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
            <?php if( wpex_get_data('disable_breadcrumbs','1') == '1') office_breadcrumbs(); ?>	
    </header><!-- /page-heading -->
    
    <?php rewind_posts(); ?>

    <div id="post" class="post clearfix">  
    	<?php while ( have_posts() ) : the_post(); ?>
        	<?php get_template_part('content', get_post_format() ); ?>    
        <?php endwhile; ?>
        <?php wpex_pagination(); ?>
    </div><!--/post -->

<?php endif; ?>     
<?php get_sidebar(); ?>	   
<?php get_footer(); ?>
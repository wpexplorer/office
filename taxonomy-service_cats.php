<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 */
?>
<?php get_header(); ?>

<header id="page-heading">
	<h1><?php echo single_term_title(); ?></h1>
    <?php if( wpex_get_data('disable_breadcrumbs','1') == '1') office_breadcrumbs(); ?> 
</header><!-- /page-heading -->

<?php
$category_description = category_description();
if(!empty($category_description )) {
	echo apply_filters('category_archive_meta','<div id="services-description" class="clearfix">' . $category_description . '</div>');
} ?>

<?php if( have_posts()) : ?>

    <div class="post full-width clearfix">
        
        <div id="services-wrap" class="clearfix">
            
            <ul id="service-tabs">
                <?php while (have_posts()) : the_post(); ?>
                    <li>
                    <a href="#tab-<?php echo( basename(get_permalink() ) ); ?>" title="<?php wpex_esc_title(); ?>">
						<?php if( has_post_thumbnail() ) { ?>
                            <span><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" alt="<?php wpex_esc_title(); ?>" /></span>
                        <?php } ?>
                        <?php the_title(); ?>
                    </a>
                    </li>
                <?php endwhile; ?>
            </ul><!-- /service tabs -->
            
            <div id="service-content" class="entry">
                <?php
                $count=0;
                while (have_posts()) : the_post();   
                $count++; ?>
                    <article id="tab-<?php echo( basename(get_permalink() ) ); ?>" class="service-tab-content <?php if ( $count == 1 ) echo 'first-tab'; ?>">
                        <h2><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                    </article><!-- /service-tab-content -->
                <?php endwhile; ?>
            </div><!-- /service-content -->
        
        </div><!-- /services-wrap -->
    
    </div><!-- .post -->

<?php endif; ?>
<?php get_footer(); ?>
<?php
/**
 * @package WordPress
 * @subpackage Office Theme
 */
?>
<?php get_header(); ?>

	<?php
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	query_posts($query_string .'&posts_per_page=10&paged=' . $paged);
    if ( have_posts() ) : ?>
    
        <header id="page-heading">
            <h1 id="archive-title">Search Results For: <?php the_search_query(); ?></h1>
            <?php if( wpex_get_data('disable_breadcrumbs','1') == '1') office_breadcrumbs(); ?>
        </header><!-- /page-heading -->
        
        <div class="post clearfix">
        
			<?php while (have_posts()) : the_post(); ?>
        
                <article class="search-entry clearfix">
                    <?php if( has_post_thumbnail() ) { ?>
                    	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="search-portfolio-thumb"> <img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), wpex_img('search_entry_width'),  wpex_img('search_entry_height'),  wpex_img('search_entry_crop') ); ?>" alt="<?php echo the_title(); ?>" /></a>
                    <?php } ?>
                    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    <?php echo excerpt('50'); ?>
                </article><!-- /search-entry -->
                
            <?php endwhile; ?>
            
            <?php wpex_pagination(); ?>
    
        </div><!-- /post  -->
    
    <?php else : ?>
    
        <header id="page-heading">
            <h1 id="archive-title">Search Results For "<?php the_search_query(); ?>"</h1>
        </header><!-- END page-heading -->
        
        <div id="post" class="post clearfix">
        	<?php _e('No results found for that query.', 'office'); ?>
        </div><!-- /post  -->
        
	<?php endif; ?>

<?php get_sidebar(); ?>		  
<?php get_footer(); ?>
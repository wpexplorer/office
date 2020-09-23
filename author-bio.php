<?php
/**
 * The template for displaying Author bios.
 *
 * @package WordPress
 * @subpackage Office WordPress Theme
 * @since Office 2.0
 */
?>

<div class="author-info row">	
	<h4><?php printf( __( 'About %s', 'office' ), get_the_author() ); ?></h4>
	<div class="author-info-inner boxed clr">
        <div class="author-avatar">
        	<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'wpex_author_bio_avatar_size', 74 ) ); ?></a>
        </div><!-- .author-avatar -->
        <div class="author-description">
            <p><?php the_author_meta( 'description' ); ?></p>
        </div><!-- .author-description -->
	</div><!-- .author-info-inner -->
</div><!-- .author-info -->
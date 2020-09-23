 <?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments and the comment
 * form. The actual display of comments is handled by a callback to
 * wpex_comment() which is located at functions/comments-callback.php
 *
 * @package WordPress
 * @subpackage Office WordPress Theme
 * @since Office 2.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return; ?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<i class="icon-comments-alt"></i>
			<span>
				<?php
				// Display Comments Title
				$comments_number = number_format_i18n( get_comments_number() );
				if ( '1' == $comments_number ) {
					$comments_title = __( 'One Comment', 'office' );
				} else {
					$comments_title = sprintf( __( '%s Comments', 'office' ), $comments_number );
				}
				$comments_title = apply_filters( 'wpex_comments_title', $comments_title );
				echo $comments_title; ?>
			</span>
		</h2>

		<ol class="comment-list">
			<?php wp_list_comments( array( 'callback' => 'wpex_comment', 'style' => 'ol' ) ); ?>
		</ol><!-- .comment-list -->

		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav class="navigation comment-navigation row clr" role="navigation">
			<h4 class="assistive-text section-heading heading"><span><?php _e( 'Comment navigation', 'office' ); ?></span></h4>
			<div class="nav-previous span_12 col clr-margin"><?php previous_comments_link( __( '&larr; Older Comments', 'office' ) ); ?></div>
			<div class="nav-next span_12 col"><?php next_comments_link( __( 'Newer Comments &rarr;', 'office' ) ); ?></div>
		</nav>
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , 'office' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php comment_form(
		$fields =  array(
			'title_reply' => '<span>'. __( 'Leave a Reply', 'office') .'</span>'
		) ); ?>

</div><!-- #comments -->
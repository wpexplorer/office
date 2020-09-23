<?php
/**
 * File used for homepage video module
 *
 * @package WordPress
 * @subpackage Office Theme
 */
?>

<?php
if( wpex_get_data('home_video') ) {
	echo '<div class="home-video fitvids">'. do_shortcode(stripslashes(wpex_get_data('home_video'))) .'</div>';
} ?>

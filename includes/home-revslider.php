<?php
/**
 * File used for your homepage revolution Slider
 *
 * @package WordPress
 * @subpackage Office Theme
 */
?>

<?php
if( wpex_get_data('home_revslider') ) {
	echo '<div class="home-revslider clearfix">'. do_shortcode(stripslashes(wpex_get_data('home_revslider'))) .'</div>';
} ?>

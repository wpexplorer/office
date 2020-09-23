<?php
/**
 * Cleans up your site's <head> from auto added WP code
 *
 * @package WordPress
 * @subpackage Office
 * @since Office 1.0
 */


remove_action( 'wp_head', 'wp_generator' ); // Remove the XHTML generator that is generated on the wp_head hook
<?php
/**
 * Function that returns your smof option value based on a given ID.
 * Also provides SMOF with a fallback.
 *
 * @package WordPress
 * @subpackage Office
 * @since Office 1.0
*/

if ( ! function_exists('wpex_get_data') ) {
	function wpex_get_data($id, $fallback = false) {
		global $smof_data;
		if ( $fallback == false ) $fallback = '';
		$output = ( isset($smof_data[$id]) && $smof_data[$id] !== '' ) ? $smof_data[$id] : $fallback;
		return $output;
	}
}
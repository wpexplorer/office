<?php
/**
 * Adds taxonomy filters to the admin pages
 *
 * @package WordPress
 * @subpackage Office
 * @since Office 1.0
*/

if ( ! function_exists('office_add_taxonomy_filters') ) :

	function office_add_taxonomy_filters() {
		global $typenow;
	
		if( $typenow == 'services' || $typenow == 'portfolio' || $typenow == 'staff' || $typenow == 'faqs' ){
			
			if( $typenow == 'portfolio') { $taxonomies = array('portfolio_cats'); }
			if( $typenow == 'services') { $taxonomies = array('service_cats'); }
			if( $typenow == 'staff') { $taxonomies = array('staff_departments'); }
			if( $typenow == 'faqs') { $taxonomies = array('faqs_cats'); }
			
	 
			foreach ($taxonomies as $tax_slug) {
				$tax_obj = get_taxonomy($tax_slug);
				$tax_name = $tax_obj->labels->name;
				$terms = get_terms($tax_slug);
				if(count($terms) > 0) {
					echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
					echo "<option value=''>All Categories</option>";
					foreach ($terms as $term) { 
						echo '<option value='. $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>'; 
					}
					echo "</select>";
				}
			}
		}
	}
	add_action( 'restrict_manage_posts', 'office_add_taxonomy_filters' );

endif;
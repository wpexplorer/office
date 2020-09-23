<?php
/* custom slides columns */
add_filter("manage_edit-slides_columns", "edit_slides_columns" );
add_action("manage_posts_custom_column", "custom_slides_columns");

function edit_slides_columns($slides_columns)
{
        $slides_columns = array(
                "cb" => "<input type ='checkbox' />",
                "title" => "Title",
				"slides_url" => "URL",
				"slides_image" => "Featured Image"
        );
        return $slides_columns;
}

function custom_slides_columns($slides_column)
{
        global $post;
        switch ($slides_column)
        {
			case "slides_url":
					if(get_post_meta($post->ID, 'office_slides_url', true) !='') {
						echo get_post_meta($post->ID, 'office_slides_url', true);
					} else { echo '-'; }
			break;
			case "slides_image":
					if(has_post_thumbnail()) {
						echo '<img src="'. aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), '54', '54',  true ) .'" />';
					} else { echo '-'; }
			break;
        }

}


// homepage highlights
add_filter("manage_edit-hp_highlights_columns", "edit_hp_highlights_columns" );
add_action("manage_posts_custom_column", "custom_hp_highlights_columns");

function edit_hp_highlights_columns($slides_columns)
{
        $hp_highlight_columns = array(
                "cb" => "<input type ='checkbox' />",
                "title" => "Title",
				"hp_highlight_url" => "URL",
				"hp_highlight_image" => "Featured Image"
        );
        return $hp_highlight_columns;
}

function custom_hp_highlights_columns($hp_highlight_column)
{
        global $post;
        switch ($hp_highlight_column)
        {
			case "hp_highlight_url":
					if(get_post_meta($post->ID, 'office_hp_highlights_url', true) !='') {
						echo get_post_meta($post->ID, 'office_hp_highlights_url', true);
					} else { echo '-'; }
			break;
			case "hp_highlight_image":
					if(has_post_thumbnail()) {
						echo '<img src="'. aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), '54',  '54',  true ) .'" />';
					} else { echo '-'; }
			break;
        }

}



/* Staff columns */
add_filter("manage_edit-staff_columns", "edit_staff_columns" );
add_action("manage_posts_custom_column", "custom_staff_columns");

function edit_staff_columns($staff_columns)
{
        $staff_columns = array(
                "cb" => "<input type ='checkbox' />",
                "title" => "Title",
				"staff_position" => "Position",
				"staff_department" => "Department",
				"staff_image" => "Profile Picture"
        );
        return $staff_columns;
}

function custom_staff_columns($staff_column)
{
        global $post;
        switch ($staff_column)
        {
			case "staff_position":
					if(get_post_meta($post->ID, 'office_staff_position', true) !='') {
						echo get_post_meta($post->ID, 'office_staff_position', true);
					} else { echo '-'; }
			break;
			case "staff_department":
					echo get_the_term_list( get_the_ID(), 'staff_departments', ' ', ' , ', ' ');
			break;
			case "staff_image":
					if(has_post_thumbnail()) {
						echo '<img src="'. aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), '54',  '54',  true ) .'" />';
					} else { echo '-'; }
			break;
        }

}

/* FAQs columns */
add_filter("manage_edit-faqs_columns", "edit_faqs_columns" );
add_action("manage_posts_custom_column", "custom_faqs_columns");

function edit_faqs_columns($faqs_columns)
{
        $faqs_columns = array(
                "cb" => "<input type ='checkbox' />",
                "title" => "Title",
				"faqs_category" => "Category"
        );
        return $faqs_columns;
}

function custom_faqs_columns($faqs_column)
{
        global $post;
        switch ($faqs_column)
        {
			case "faqs_category":
					echo get_the_term_list( get_the_ID(), 'faqs_cats', ' ', ' , ', ' ');
			break;
        }

}

/* Services columns */
add_filter("manage_edit-services_columns", "edit_services_columns" );
add_action("manage_posts_custom_column", "custom_services_columns");

function edit_services_columns($services_columns)
{
        $services_columns = array(
                "cb" => "<input type ='checkbox' />",
                "title" => "Title",
				"services_category" => "Category",
				"services_image" => "Featured Icon"
        );
        return $services_columns;
}

function custom_services_columns($services_column)
{
        global $post;
        switch ($services_column)
        {
			case "services_category":
					echo get_the_term_list( get_the_ID(), 'service_cats', ' ', ' , ', ' ');
			break;
			case "services_image":
					if(has_post_thumbnail()) {
						echo '<img src="'. aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), '54',  '54',  true ) .'" />';
					} else { echo '-'; }
			break;
        }

}


/* custom portfolio columns */
add_filter("manage_edit-portfolio_columns", "edit_portfolio_columns" );
add_action("manage_posts_custom_column", "custom_portfolio_columns");

function edit_portfolio_columns($portfolio_columns)
{
        $portfolio_columns = array(
                "cb" => "<input type ='checkbox' />",
                "title" => "Title",
				"portfolio_category" => "Category",
                "portfolio_image" => "Featured Image"
        );
        return $portfolio_columns;
}

function custom_portfolio_columns($portfolio_column)
{
        global $post;
        switch ($portfolio_column)
        {
				case "portfolio_category":
					echo get_the_term_list( get_the_ID(), 'portfolio_cats', ' ', ' , ', ' ');
				break;
				
                case "portfolio_image":
						if(has_post_thumbnail()) {
                        	echo '<img src="'. aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ), '54',  '54',  true ) .'" />';
						} else { echo '-'; }
				break;
        }

}
?>
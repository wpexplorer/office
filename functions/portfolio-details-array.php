<?php
/**
 * Creates an array for the portfolio meta details.
 *
 * @package WordPress
 * @subpackage Office
 * @since Office 2.4
 */


if ( !function_exists('wpex_portfolio_details_array') ) {
	function wpex_portfolio_details_array() {
		$array = array(
			'date'	=> array(
				'type'				=> 'text',
				'meta_id'			=> 'wpex_portfolio_post_date',
				'meta_name'			=> __( 'Custom Date', 'office' ),
				'meta_description'	=> __( 'Enter a custom date for the project details. Enter "disabled" to completely disable the date.', 'office' ),
				'label'				=> __( 'Date', 'office' ),
			),
			'categories'	=> array(
				'type'				=> 'categories',
				'label'				=> __( 'Labeled', 'office' ),
			),
			'cost'	=> array(
				'type'				=> 'text',
				'meta_id'			=> 'office_portfolio_cost',
				'meta_name'			=> __( 'Cost', 'office' ),
				'meta_description'	=> __( 'Enter your cost for the project details.', 'office' ),
				'label'				=> __( 'Cost', 'office' ),
			),
			'client'	=> array(
				'type'				=> 'text',
				'meta_id'			=> 'office_portfolio_client',
				'meta_name'			=> __( 'Client', 'office' ),
				'meta_description'	=> __( 'Enter a client name the project details.', 'office' ),
				'label'				=> __( 'Client', 'office' ),
			),
			'link_url'	=> array(
				'type'	=> 'url',
				'url'	=> array (
					'meta_id'			=> 'office_portfolio_url',
					'meta_name'			=> __( 'Link URL', 'office' ),
					'meta_description'	=> __( 'Enter a URL for the project details.', 'office' ),
					'label'				=> __( 'Website', 'office' ),
				),
				'title'	=> array (
					'meta_id'			=> 'wpex_portfolio_post_url_name',
					'meta_name'			=> __( 'Link Name', 'office' ),
					'meta_description'	=> __( 'Enter a name for the project details link. If left blank it will just show the URL linking to itself.', 'office' ),
				),
			),
		);
		$array = apply_filters( 'wpex_portfolio_details_array', $array );
		return $array;
	}
}

if ( !function_exists('wpex_portfolio_details_meta_array') ) {
	function wpex_portfolio_details_meta_array() {
		$meta_array = array();
		$arrays = wpex_portfolio_details_array();
		foreach ( $arrays as $array ) {
			if ( 'categories' == $array['type'] ) {
				// Do nothing for categories item
			} elseif ( 'text' == $array['type'] ) {
				$meta_array[] = array(
					'id'	=> $array['meta_id'],
					'name'	=> $array['meta_name'],
					'desc'	=> $array['meta_description'],
					'type'	=> 'text',
					'std'	=> ''
				);
			} elseif ( 'url' == $array['type'] ) {
				$meta_array[] = array(
					'id'	=> $array['url']['meta_id'],
					'name'	=> $array['url']['meta_name'],
					'desc'	=> $array['url']['meta_description'],
					'type'	=> 'text',
					'std'	=> ''
				);
				$meta_array[] = array(
					'id'	=> $array['title']['meta_id'],
					'name'	=> $array['title']['meta_name'],
					'desc'	=> $array['title']['meta_description'],
					'type'	=> 'text',
					'std'	=> ''
				);
			}
		}
		return $meta_array;
	}
}
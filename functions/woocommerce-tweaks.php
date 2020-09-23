<?php
/* This theme doesn't officially support Woocommerce...yet. But here are some tweaks to get you started! */
function office_woo_loop_shop_per_page() {
	return 12;
}
add_action( 'loop_shop_per_page', 'office_woo_loop_shop_per_page' );

// Redefine woocommerce_output_related_products()
function woocommerce_output_related_products() {
	woocommerce_related_products( 4, 4 ); // Display 3 products in rows of 3
}
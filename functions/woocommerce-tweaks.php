<?php
/* This theme doesn't officially support Woocommerce...yet. But here are some tweaks to get you started! */


// Display 24 products per page. Goes in functions.php
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );

// Redefine woocommerce_output_related_products()
function woocommerce_output_related_products() {
	woocommerce_related_products(4,4); // Display 3 products in rows of 3
}
<?php

/*************************************************
## Scripts
*************************************************/
function partdo_product_box_variable_scripts() {
	wp_enqueue_script( 'klb-product-box-variable',  plugins_url( 'js/product-box-variable.js', __FILE__ ), false, '1.0');
	wp_enqueue_style( 'klb-product-box-variable',   plugins_url( 'css/product-box-variable.css', __FILE__ ), false, '1.0');
	wp_enqueue_script( 'wc-cart-fragments' );
}
add_action( 'wp_enqueue_scripts', 'partdo_product_box_variable_scripts' );

/*************************************************
## Single Add to Cart on Archive
*************************************************/
if ( !function_exists( 'partdo_product_variable_archive' ) ) {
	function partdo_product_variable_archive(){
		global $product;
		
		if($product->is_type( 'variable' )){
			$output = '';
			if($product->is_type( 'variable' )){
				ob_start();
				woocommerce_template_single_add_to_cart();
				$output .= ob_get_clean();
			}
			echo $output;
		}
	}
	add_action('partdo_after_shop_loop_item_image', 'partdo_product_variable_archive', 10);
}

/*************************************************
## Change Select Options Text
*************************************************/
if ( !function_exists( 'partdo_add_to_cart_text_variable' ) ) {
	add_filter('woocommerce_product_add_to_cart_text','partdo_add_to_cart_text_variable',10, 2);
	function partdo_add_to_cart_text_variable ($label, $product){
	   if ( $product->is_type( 'variable' ) ) {
		  return esc_html__('Add to Cart', 'partdo-core');
	   }
	   return $label;
	}
}

/*************************************************
## AJax Handler Function
*************************************************/
if ( !function_exists( 'partdo_ajax_add_to_cart_variable_archive_handler' ) ) {
    /**
    * Add to cart handler.
    */
    function partdo_ajax_add_to_cart_variable_archive_handler() {
        WC_AJAX::get_refreshed_fragments();
    }
    add_action( 'wc_ajax_partdo_add_to_cart_variable_archive', 'partdo_ajax_add_to_cart_variable_archive_handler' );
    add_action( 'wc_ajax_nopriv_partdo_add_to_cart_variable_archive', 'partdo_ajax_add_to_cart_variable_archive_handler' );
    
    /**
    * Add fragments for notices.
    */
	if ( !function_exists( 'partdo_ajax_add_to_cart_add_fragments' ) ) {
	    function partdo_ajax_add_to_cart_add_fragments( $fragments ) {
	        $all_notices  = WC()->session->get( 'wc_notices', array() );
	        $notice_types = apply_filters( 'woocommerce_notice_types', array( 'error', 'success', 'notice' ) );
	        
	        ob_start();
	        foreach ( $notice_types as $notice_type ) {
	            if ( wc_notice_count( $notice_type ) > 0 ) {
	                wc_get_template( "notices/{$notice_type}.php", array(
	                    'notices' => array_filter( $all_notices[ $notice_type ] ),
	                ) );
	            }
	        }
	        $fragments['notices_html'] = ob_get_clean();
	        
	        wc_clear_notices();
	        
	        return $fragments;
	    }
	    add_filter( 'woocommerce_add_to_cart_fragments', 'partdo_ajax_add_to_cart_add_fragments' );
	}
}

<?php
/*************************************************
## Scripts
*************************************************/
function partdo_single_shipping_class_scripts() {
	wp_register_style( 'klb-single-shipping-class',   plugins_url( 'css/single-shipping-class.css', __FILE__ ), false, '1.0');
}
add_action( 'wp_enqueue_scripts', 'partdo_single_shipping_class_scripts' );

/*************************************************
## Shipping Class Name
*************************************************/
if( ! function_exists( 'partdo_single_shipping_class' ) ) {
	function partdo_single_shipping_class(){
		global $product;
		
		if($product){
			$class_id = $product->get_shipping_class_id();
			if ( $class_id ) {
				$term = get_term_by( 'id', $class_id, 'product_shipping_class' );
				
				if ( $term && ! is_wp_error( $term ) ) {
					
					wp_enqueue_style( 'klb-single-shipping-class');
					
					echo '<div class="single-shipping-message">';
					echo '<div class="info-message"><i class="klb-icon-box"></i> <strong>'.esc_html($term->name).'</strong></div>';
					echo '<div class="info-message">'.esc_html($term->description).'</div>';
					echo '</div>';
					
				}
			}
		}
	}
}

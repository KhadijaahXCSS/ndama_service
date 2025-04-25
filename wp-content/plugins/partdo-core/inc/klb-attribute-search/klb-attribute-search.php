<?php

/*************************************************
## Scripts
*************************************************/
function partdo_attribute_filter() {
	wp_register_script( 'partdo-attribute-filter',   plugins_url( 'js/attribute-search.js', __FILE__ ), false, '1.0');
}
add_action( 'wp_enqueue_scripts', 'partdo_attribute_filter' );

/*************************************************
## Models Output Callback
*************************************************/ 
add_action( 'wp_ajax_nopriv_klb_models_output', 'partdo_klb_models_output_callback' );
add_action( 'wp_ajax_klb_models_output', 'partdo_klb_models_output_callback' );
function partdo_klb_models_output_callback() {

	global $wpdb;

	$term_id = $_POST['selected_id'];
	$attribute_name = $_POST['attribute_name'];
	$tax = $_POST['tax'];

	
	$term_children = get_term_children( $term_id, $tax );
	$children = array();	
	
	if($term_children){

		echo '<select class="theme-select" name="'.esc_attr($attribute_name).'" id="filter_'.esc_attr($attribute_name).'" data-placeholder="'.esc_attr__('Select Model','partdo-core').'" data-search="true" data-searchplaceholder="'.esc_attr__('Search item...', 'partdo-core').'">';
		
		echo '<option value="">'.sprintf('Select Model', $attribute_name).'</option>';
		foreach ($term_children as $child) {
			$childterm = get_term_by( 'id', $child, $tax);
			$ancestors = get_ancestors($childterm->term_id, $tax);
			
			if(count($ancestors)+1 != 3){
			$children[$childterm->name] = $childterm;
			}
		}
		ksort($children);
		foreach ($children as $c) {
			$cterm = get_term_by( 'id', $c->term_id, $tax);

			echo '<option id="'.esc_attr($c->term_id).'" value="'.esc_attr($cterm->slug).'">'.esc_html($cterm->name).'</option>';

		}
		echo '</select>';

	} else {

		echo '<select class="theme-select" name="'.esc_attr($attribute_name).'" id="filter_'.esc_attr($attribute_name).'" >';
		echo '<option value="'.esc_attr($childterm->slug).'">'.sprintf('No model for %s ', $attribute_name).'</option>';
		echo '</select>';

	}

	
	
	wp_die();
}

/*************************************************
## Enable Parent-Child for the Attributes
*************************************************/ 
if( function_exists( 'WC' ) ){
    add_action( 'init', 'partdo_woocommerce_register_taxonomies_hack', 4 );

    if( ! function_exists( 'partdo_woocommerce_register_taxonomies_hack' ) ){
        function partdo_woocommerce_register_taxonomies_hack(){
            if( $attribute_taxonomies = wc_get_attribute_taxonomies() ) {
                foreach ($attribute_taxonomies as $tax) {
                    if ($name = wc_attribute_taxonomy_name($tax->attribute_name)) {
                        add_filter( "woocommerce_taxonomy_args_{$name}", 'partdo_woocommerce_taxonomy_product_attribute_args' );
                    }
                }
            }
        }
    }

    if( ! function_exists( 'partdo_woocommerce_taxonomy_product_attribute_args' ) ){
        function partdo_woocommerce_taxonomy_product_attribute_args( $taxonomy_data ){
            $taxonomy_data['hierarchical'] = true;
            return $taxonomy_data;
        }
    }
}
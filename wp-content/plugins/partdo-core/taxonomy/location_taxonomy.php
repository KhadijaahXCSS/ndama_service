<?php

/*************************************************
## Register Location Taxonomy
*************************************************/ 

function custom_taxonomy_location()  {
$labels = array(
    'name'                       => 'Locations',
    'singular_name'              => 'Location',
    'menu_name'                  => 'Locations',
    'all_items'                  => 'All Locations',
    'parent_item'                => 'Parent Item',
    'parent_item_colon'          => 'Parent Item:',
    'new_item_name'              => 'New Item Name',
    'add_new_item'               => 'Add New Location',
    'edit_item'                  => 'Edit Item',
    'update_item'                => 'Update Item',
    'separate_items_with_commas' => 'Separate Item with commas',
    'search_items'               => 'Search Items',
    'add_or_remove_items'        => 'Add or remove Items',
    'choose_from_most_used'      => 'Choose from the most used Items',
);
$args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
);
register_taxonomy( 'location', array( 'product','shop_coupon' ), $args );
register_taxonomy_for_object_type( 'location', array( 'product','shop_coupon' ) );
}
add_action( 'init', 'custom_taxonomy_location' );



/*************************************************
## Partdo Query Vars
*************************************************/ 
function partdo_query_vars( $query_vars ){
    $query_vars[] = 'klb_special_query';
    return $query_vars;
}
add_filter( 'query_vars', 'partdo_query_vars' );

/*************************************************
## Partdo Product Query for Klb Shortcodes
*************************************************/ 
function partdo_location_product_query( $query ){
    if( isset( $query->query_vars['klb_special_query'] ) && partdo_location() != 'all'){
		$tax_query[] = array(
			'taxonomy' => 'location',
			'field'    => 'slug',
			'terms'    => partdo_location(),
		);

		$query->set( 'tax_query', $tax_query );
	}
}
add_action( 'pre_get_posts', 'partdo_location_product_query' );

/*************************************************
## Partdo Location
*************************************************/ 
function partdo_location(){	
	$location  = isset( $_COOKIE['location'] ) ? $_COOKIE['location'] : 'all';
	if($location){
		return $location;
	}
}

/*************************************************
## Partdo Location Output
*************************************************/
add_action('wp_footer', 'partdo_location_output'); 
function partdo_location_output(){
	
	wp_enqueue_script( 'jquery-cookie');
	wp_enqueue_script( 'klb-location-filter');
	wp_localize_script( 'klb-location-filter', 'locationfilter', array(
		'popup' => partdo_ft() == 'location' ? '1' : get_theme_mod('partdo_location_filter_popup',0),
		
	));

	$terms = get_terms( array(
		'taxonomy' => 'location',
		'hide_empty' => false,
		'parent'    => 0,
	) );

	$output = '';
	
	$output .= '<div class="select-location">';
	$output .= '<div class="select-location-wrapper">';
	$output .= '<h6 class="entry-title">'.esc_html__('Choose your Delivery Location','partdo-core').'</h6>';
	$output .= '<div class="entry-description">'.esc_html__('Enter your address and we will specify the offer for your area.','partdo-core').'</div>';
	$output .= '<div class="close-popup">';
	$output .= '<i class="klbth-icon-x"></i>';
	$output .= '</div><!-- close-popup -->';
	$output .= '<div class="search-location">';
	$output .= '<select size="8" name="site-area" class="site-area" id="site-area" data-placeholder="'.esc_attr__('Search your area','partdo-core').'">';
	$output .= '<option value="all" data-min="'.esc_attr__('Clear All','partdo-core').'">'.esc_html__('Select a Location','partdo-core').'</option>';

	foreach ( $terms as $term ) {
		if($term->slug == partdo_location()){
			$select = 'selected';
		} else {
			$select = '';
		}
	$output .= '<option value="'.esc_attr($term->slug).'" data-min="'.esc_attr($term->description).'" '.esc_attr($select).'>'.esc_html($term->name).'</option>';
	}
	$output .= '</select>';
	$output .= '</div><!-- search-location -->';
	$output .= '</div><!-- select-location-wrapper -->';
	$output .= '<div class="location-overlay"></div>';
	$output .= '</div><!-- select-location -->';
	
	echo $output;
}
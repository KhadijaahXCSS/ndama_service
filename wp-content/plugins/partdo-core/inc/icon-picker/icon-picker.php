<?php

/*************************************************
## Admin style and scripts  
*************************************************/ 
function partdo_iconpicker_admin_scripts() {
    wp_register_script('klb-iconpicker', plugins_url( 'js/icon-picker.js', __FILE__ ), false, '1.0');
    wp_register_style('klb-iconpicker', plugins_url( 'css/icon-picker.css', __FILE__ ), false, '1.0');
}
add_action( 'admin_enqueue_scripts', 'partdo_iconpicker_admin_scripts' );

/*************************************************
## partdo Menu Custom Fields
*************************************************/
function partdo_menu_custom_icon_fields( $item_id, $item ) {
	$theme_locations = get_nav_menu_locations();
	$menuid = absint( get_user_option( 'nav_menu_recently_edited' ) );
	
	wp_enqueue_style( 'klb-iconpicker');
	wp_enqueue_script('klb-iconpicker');
	wp_enqueue_style( 'partdo-klbicon');

    $menu_item_iconfield = get_post_meta( $item_id, '_menu_item_iconfield', true );
	
    ?>
    <div class="et_menu_options">
        <div class="partdo-field-iconfield description description-wide">
            <label for="menu_item_iconfield-<?php echo esc_attr($item_id); ?>">
                <?php esc_html_e( 'Icon Field', 'partdo-core'  ); ?><br />
				<input type="text" class="widefat code edit-menu-item-custom klbicon-picker" id="menu_item_iconfield-<?php echo esc_attr( $item_id ); ?>" name="menu_item_iconfield[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $menu_item_iconfield ); ?>"/>

            </label>
				<div class="klb-iconsholder-wrapper"><div class="klb-iconsholder"><input type="text" class="iconsearch" placeholder="<?php esc_attr_e('Search icon...','partdo-core'); ?>"></div></div>
        </div>
    </div>

    <?php

}
add_action( 'wp_nav_menu_item_custom_fields', 'partdo_menu_custom_icon_fields', 10, 2 );

/*************************************************
## partdo Save menu item meta
*************************************************/
function partdo_nav_icon_update( $menu_id, $menu_item_db_id ) {

    if (!empty($_REQUEST['menu_item_iconfield'])) {
        $iconfield_enabled_value = $_REQUEST['menu_item_iconfield'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_menu_item_iconfield', $iconfield_enabled_value );
    }
}

add_action( 'wp_update_nav_menu_item', 'partdo_nav_icon_update', 10, 2 );

/*************************************************
## Output menu icon field
*************************************************/
add_filter( 'wp_nav_menu_objects', 'partdo_icon_wp_nav_menu_objects', 10, 2 );
function partdo_icon_wp_nav_menu_objects( $sorted_menu_items, $args  ) {
    foreach ( $sorted_menu_items as $item ) {
		$menu_item_iconfield = get_post_meta( $item->ID, '_menu_item_iconfield', true );	
		if($menu_item_iconfield){
			$item->title = '<span class="menu-icon"><i class="'.$menu_item_iconfield.'"></i></span>' . $item->title;
		}
    }

    return $sorted_menu_items;
}
<?php 
/*************************************************
## Partdo Nav Menu Endpoints
*************************************************/ 

function partdo_add_nav_menu_meta_boxes() {
	add_meta_box( 'partdo_endpoints_nav_link', esc_html__( 'Partdo endpoints', 'partdo-core' ), 'partdo_nav_menu_links' , 'nav-menus', 'side', 'low' );
}
add_action( 'admin_head-nav-menus.php', 'partdo_add_nav_menu_meta_boxes');

function partdo_nav_menu_links() {
	?>
	<div id="posttype-partdo-endpoints" class="posttypediv">
		<div id="tabs-panel-partdo-endpoints" class="tabs-panel tabs-panel-active">
			<ul id="partdo-endpoints-checklist" class="categorychecklist form-no-clear">

				<li>
					<label class="menu-item-title">
						<input type="checkbox" class="menu-item-checkbox" name="menu-item[-1][menu-item-object-id]" value="0" /> <?php esc_html_e('Elementor Template', 'partdo-core'); ?>
					</label>
					<input type="hidden" class="menu-item-type" name="menu-item[-1][menu-item-type]" value="custom" />
					<input type="hidden" class="menu-item-title" name="menu-item[-1][menu-item-title]" value="Elementor Template" />
					<input type="hidden" class="menu-item-url" name="menu-item[-1][menu-item-url]" value="#" />
					<input type="hidden" class="menu-item-classes" name="menu-item[-1][menu-item-classes]" value="klb-elementor-template" />
				</li>

			</ul>
		</div>
		<p class="button-controls">
			<span class="list-controls">
				<a href="<?php echo esc_url( admin_url( 'nav-menus.php?page-tab=all&selectall=1#posttype-partdo-endpoints' ) ); ?>" class="select-all"><?php esc_html_e( 'Select all', 'partdo-core' ); ?></a>
			</span>
			<span class="add-to-menu">
				<button type="submit" class="button-secondary submit-add-to-menu right" value="<?php esc_attr_e( 'Add to menu', 'partdo-core' ); ?>" name="add-post-type-menu-item" id="submit-posttype-partdo-endpoints"><?php esc_html_e( 'Add to menu', 'partdo-core' ); ?></button>
				<span class="spinner"></span>
			</span>
		</p>
	</div>
	<?php
}


/*************************************************
## Mega Menu
*************************************************/ 
require_once( __DIR__ . '/mega-menu/mega-menu.php' );
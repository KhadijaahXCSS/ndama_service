<?php
/*======
*
* Kirki Settings
*
======*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_config(
	'partdo_customizer', array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	)
);

/*======
*
* Sections
*
======*/
$sections = array(
	'shop_settings' => array (
		esc_attr__( 'Shop Settings', 'partdo-core' ),
		esc_attr__( 'You can customize the shop settings.', 'partdo-core' ),
	),
	
	'blog_settings' => array (
		esc_attr__( 'Blog Settings', 'partdo-core' ),
		esc_attr__( 'You can customize the blog settings.', 'partdo-core' ),
	),

	'header_settings' => array (
		esc_attr__( 'Header Settings', 'partdo-core' ),
		esc_attr__( 'You can customize the header settings.', 'partdo-core' ),
	),

	'main_color' => array (
		esc_attr__( 'Main Color', 'partdo-core' ),
		esc_attr__( 'You can customize the main color.', 'partdo-core' ),
	),

	'elementor_templates' => array (
		esc_attr__( 'Elementor Templates', 'partdo-core' ),
		esc_attr__( 'You can customize the elementor templates.', 'partdo-core' ),
	),
	
	'map_settings' => array (
		esc_attr__( 'Map Settings', 'partdo-core' ),
		esc_attr__( 'You can customize the map settings.', 'partdo-core' ),
	),

	'footer_settings' => array (
		esc_attr__( 'Footer Settings', 'partdo-core' ),
		esc_attr__( 'You can customize the footer settings.', 'partdo-core' ),
	),
	
	'partdo_widgets' => array (
		esc_attr__( 'Partdo Widgets', 'partdo-core' ),
		esc_attr__( 'You can customize the partdo widgets.', 'partdo-core' ),
	),

	'gdpr_settings' => array (
		esc_attr__( 'GDPR Settings', 'partdo-core' ),
		esc_attr__( 'You can customize the GDPR settings.', 'partdo-core' ),
	),

	'newsletter_settings' => array (
		esc_attr__( 'Newsletter Settings', 'partdo-core' ),
		esc_attr__( 'You can customize the Newsletter Popup settings.', 'partdo-core' ),
	),
	
	'maintenance_settings' => array (
		esc_attr__( 'Maintenance Settings', 'partdo-core' ),
		esc_attr__( 'You can customize the Maintenance settings.', 'partdo-core' ),
	),
	'other_settings' => array (
		esc_attr__( 'Other', 'partdo-core' ),
		esc_attr__( 'You can customize the other settings.', 'partdo-core' ),
	),
);

foreach ( $sections as $section_id => $section ) {
	$section_args = array(
		'title' => $section[0],
		'description' => $section[1],
	);

	if ( isset( $section[2] ) ) {
		$section_args['type'] = $section[2];
	}

	if( $section_id == "colors" ) {
		Kirki::add_section( str_replace( '-', '_', $section_id ), $section_args );
	} else {
		Kirki::add_section( 'partdo_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
	}
}


/*======
*
* Fields
*
======*/
function partdo_customizer_add_field ( $args ) {
	Kirki::add_field(
		'partdo_customizer',
		$args
	);
}

	/*====== Header ==================================================================================*/
		/*====== Header Panels ======*/
		Kirki::add_panel (
			'partdo_header_panel',
			array(
				'title' => esc_html__( 'Header Settings', 'partdo-core' ),
				'description' => esc_html__( 'You can customize the header from this panel.', 'partdo-core' ),
			)
		);

		$sections = array (
			'header_logo' => array(
				esc_attr__( 'Logo', 'partdo-core' ),
				esc_attr__( 'You can customize the logo which is on header..', 'partdo-core' )
			),
		
			'header_general' => array(
				esc_attr__( 'Header General', 'partdo-core' ),
				esc_attr__( 'You can customize the header.', 'partdo-core' )
			),
			
			'header_product_tab' => array(
				esc_attr__( 'Header Products Tab', 'partdo' ),
				esc_attr__( 'You can customize the header products tab.', 'partdo' )
			),
			
			'header_notification' => array(
				esc_attr__( 'Header Notification', 'partdo-core' ),
				esc_attr__( 'You can customize the header notification.', 'partdo-core' )
			),

			'header_attribute_search' => array(
				esc_attr__( 'Attribute Search', 'partdo-core' ),
				esc_attr__( 'You can customize the header attribute search filter.', 'partdo-core' )
			),

			'header_preloader' => array(
				esc_attr__( 'Preloader', 'partdo-core' ),
				esc_attr__( 'You can customize the loader.', 'partdo-core' )
			),
			
			'header1_style' => array(
				esc_attr__( 'Header 1 Style', 'partdo' ),
				esc_attr__( 'You can customize the style.', 'partdo' )
			),
			
			'header2_style' => array(
				esc_attr__( 'Header 2 Style', 'partdo' ),
				esc_attr__( 'You can customize the style.', 'partdo' )
			),
			
			'header3_style' => array(
				esc_attr__( 'Header 3 Style', 'partdo' ),
				esc_attr__( 'You can customize the style.', 'partdo' )
			),
			
			'header4_style' => array(
				esc_attr__( 'Header 4 Style', 'partdo' ),
				esc_attr__( 'You can customize the style.', 'partdo' )
			),
			
			'sidebar_menu_style' => array(
				esc_attr__( 'Sidebar Menu Style', 'partdo' ),
				esc_attr__( 'You can customize the style.', 'partdo' )
			),
			
			'mobile_menu_style' => array(
				esc_attr__( 'Mobile Menu Style', 'partdo' ),
				esc_attr__( 'You can customize the style.', 'partdo' )
			),
			
			'mobile_bottom_menu_style' => array(
				esc_attr__( 'Mobile Bottom Menu Style', 'partdo' ),
				esc_attr__( 'You can customize the style.', 'partdo' )
			),
		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'partdo_header_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'partdo_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}
		
		/*====== Logo ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'partdo_logo',
				'label' => esc_attr__( 'Logo', 'partdo-core' ),
				'description' => esc_attr__( 'You can upload a logo.', 'partdo-core' ),
				'section' => 'partdo_header_logo_section',
				'choices' => array(
					'save_as' => 'id',
				),
			)
		);
		
		/*====== Logo ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'partdo_mobile_logo',
				'label' => esc_attr__( 'Mobile Logo', 'partdo-core' ),
				'description' => esc_attr__( 'You can upload a logo for the mobile.', 'partdo-core' ),
				'section' => 'partdo_header_logo_section',
				'choices' => array(
					'save_as' => 'id',
				),
			)
		);
		
		/*====== Logo Text ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_logo_text',
				'label' => esc_attr__( 'Set Logo Text', 'partdo-core' ),
				'description' => esc_attr__( 'You can set logo as text.', 'partdo-core' ),
				'section' => 'partdo_header_logo_section',
				'default' => 'Partdo',
			)
		);

		/*====== Logo Size ======*/
		partdo_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'partdo_logo_size',
				'label'       => esc_html__( 'Logo Size', 'partdo-core' ),
				'description' => esc_attr__( 'You can set size of the logo.', 'partdo-core' ),
				'section'     => 'partdo_header_logo_section',
				'default'     => 164,
				'transport'   => 'auto',
				'choices'     => [
					'min'  => 20,
					'max'  => 400,
					'step' => 1,
				],
				'output' => [
				[
					'element' => '.site-header .header-main .site-brand img',
					'property'    => 'width',
					'units' => 'px',
				], ],
			)
		);
		
		/*====== Mobil Logo Size ======*/
		partdo_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'partdo_mobil_logo_size',
				'label'       => esc_html__( 'Mobile Logo Size', 'partdo-core' ),
				'description' => esc_attr__( 'You can set size of the mobil logo.', 'partdo-core' ),
				'section'     => 'partdo_header_logo_section',
				'default'     => 147,
				'transport'   => 'auto',
				'choices'     => [
					'min'  => 20,
					'max'  => 300,
					'step' => 1,
				],
				'output' => [
				[
					'element' => '.site-header .header-mobile .site-brand img',
					'property'    => 'width',
					'units' => 'px',
				], ],
			)
		);
		
		/*====== Sidebar Logo Size ======*/
		partdo_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'partdo_sidebar_logo_size',
				'label'       => esc_html__( 'Sidebar Logo Size', 'partdo-core' ),
				'description' => esc_attr__( 'You can set size of the sidebar logo.', 'partdo-core' ),
				'section'     => 'partdo_header_logo_section',
				'default'     => 147,
				'transport'   => 'auto',
				'choices'     => [
					'min'  => 20,
					'max'  => 300,
					'step' => 1,
				],
				'output' => [
				[
					'element' => '.site-drawer .site-brand img',
					'property'    => 'width',
					'units' => 'px',
				], ],
			)
		);
		
		/*====== Header Type ======*/
		partdo_customizer_add_field(
			array (
			'type'        => 'select',
			'settings'    => 'partdo_header_type',
			'label'       => esc_html__( 'Header Type', 'partdo-core' ),
			'section'     => 'partdo_header_general_section',
			'default'     => 'type1',
			'priority'    => 10,
			'choices'     => array(
				'type1' => esc_attr__( 'Type 1', 'partdo-core' ),
				'type2' => esc_attr__( 'Type 2', 'partdo-core' ),
				'type3' => esc_attr__( 'Type 3', 'partdo-core' ),
				'type4' => esc_attr__( 'Type 4', 'partdo-core' ),
			),
			) 
		);

		/*====== Middle Sticky Header Toggle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_sticky_header',
				'label' => esc_attr__( 'Sticky Header', 'partdo-core' ),
				'description' => esc_attr__( 'You can choose status of the header.', 'partdo-core' ),
				'section' => 'partdo_header_general_section',
				'default' => '0',
			)
		);

		/*====== Mobile Sticky Header Toggle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_mobile_sticky_header',
				'label' => esc_attr__( 'Mobile Sticky Header', 'partdo-core' ),
				'description' => esc_attr__( 'You can choose status of the header on the mobile.', 'partdo-core' ),
				'section' => 'partdo_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Toggle Menu Button Toggle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_toggle_menu_button',
				'label' => esc_attr__( 'Toggle Menu Button', 'partdo-core' ),
				'description' => esc_attr__( 'You can choose status of the toggle menu button.', 'partdo-core' ),
				'section' => 'partdo_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Search Toggle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_header_search',
				'label' => esc_attr__( 'Header Search', 'partdo-core' ),
				'description' => esc_attr__( 'You can choose status of the search on the header.', 'partdo-core' ),
				'section' => 'partdo_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Ajax Search Form ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_ajax_search_form',
				'label' => esc_attr__( 'Ajax Search Form', 'partdo-core' ),
				'description' => esc_attr__( 'Enable ajax search form for the header search.', 'partdo-core' ),
				'section' => 'partdo_header_general_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'partdo_header_search',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Mobile Search Toggle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_mobile_header_search',
				'label' => esc_attr__( 'Mobile Search', 'partdo-core' ),
				'description' => esc_attr__( 'You can choose status of the mobile search on the header.', 'partdo-core' ),
				'section' => 'partdo_header_general_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'partdo_header_search',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Account Icon ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_header_account',
				'label' => esc_attr__( 'Account Icon / Login', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable User Login/Signup on the header.', 'partdo-core' ),
				'section' => 'partdo_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Popup Login ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_header_popup_login',
				'label' => esc_attr__( 'Popup Login?', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable the popup login on the header.', 'partdo-core' ),
				'section' => 'partdo_header_general_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'partdo_header_account',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Popup Login Image======*/
		partdo_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'partdo_header_popup_login_image',
				'label' => esc_attr__( 'Popup Login Image', 'partdo-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'partdo-core' ),
				'section' => 'partdo_header_general_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'required' => array(
					array(
					  'setting'  => 'partdo_header_popup_login',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Wishlist  ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_header_wishlist',
				'label' => esc_attr__( 'Wishlist', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable wishlist on the header.', 'partdo-core' ),
				'section' => 'partdo_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Cart Toggle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_header_cart',
				'label' => esc_attr__( 'Header Cart', 'partdo-core' ),
				'description' => esc_attr__( 'You can choose status of the mini cart on the header.', 'partdo-core' ),
				'section' => 'partdo_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Mini Cart Type ======*/
		partdo_customizer_add_field(
			array (
			'type'        => 'radio-buttonset',
			'settings'    => 'partdo_header_mini_cart_type',
			'label'       => esc_html__( 'Mini Cart Type', 'partdo-core' ),
			'section'     => 'partdo_header_general_section',
			'default'     => 'default',
			'choices'     => array(
				'sidecart' => esc_attr__( 'Side Cart', 'partdo-core' ),
				'default' => esc_attr__( 'Default', 'partdo-core' ),
			),
			'required' => array(
				array(
				  'setting'  => 'partdo_header_cart',
				  'operator' => '==',
				  'value'    => '1',
				),
			),
			) 
		);
		
		/*====== Header Help Center Toggle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_help_center_button',
				'label' => esc_attr__( 'Help Center', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable Help Center on the header.', 'partdo-core' ),
				'section' => 'partdo_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Help Center URL ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_help_center_url',
				'label' => esc_attr__( 'Help Center URL', 'partdo-core' ),
				'description' => esc_attr__( 'Set an url for the help center', 'partdo-core' ),
				'section' => 'partdo_header_general_section',
				'default' => '#',
				'required' => array(
					array(
					  'setting'  => 'partdo_help_center_button',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Sidebar ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_header_sidebar',
				'label' => esc_attr__( 'Sidebar Menu', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable Sidebar Menu', 'partdo-core' ),
				'section' => 'partdo_header_general_section',
				'default' => '0',
			)
		);

		/*====== Header Sidebar Collapse ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_header_sidebar_collapse',
				'label' => esc_attr__( 'Disable Collapse on Frontpage', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable Sidebar Collapse on Home Page.', 'partdo-core' ),
				'section' => 'partdo_header_general_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'partdo_header_sidebar',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Top Left Menu Toggle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_top_left_menu',
				'label' => esc_attr__( 'Top Left Menu', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable the top left menu.', 'partdo-core' ),
				'section' => 'partdo_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Top Right Menu Toggle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_top_right_menu',
				'label' => esc_attr__( 'Top Right Menu', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable the top right menu.', 'partdo-core' ),
				'section' => 'partdo_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Products Tab Toggle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_header_products_tab',
				'label' => esc_attr__( 'Products Tab', 'partdo' ),
				'description' => esc_attr__( 'Disable or Enable Products Tab', 'partdo' ),
				'section' => 'partdo_header_product_tab_section',
				'default' => '0',
			)
		);
		
		/*====== Header Products Tab Button Title ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_header_products_button_title',
				'label' => esc_attr__( 'Button Title', 'partdo' ),
				'description' => esc_attr__( 'You can add a text for the button.', 'partdo' ),
				'section' => 'partdo_header_product_tab_section',
				'default' => 'Top Offers',
				'required' => array(
					array(
					  'setting'  => 'partdo_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Products Tab Title ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_header_products_tab_title',
				'label' => esc_attr__( 'Tab Title', 'partdo' ),
				'description' => esc_attr__( 'You can add a title for the tab.', 'partdo' ),
				'section' => 'partdo_header_product_tab_section',
				'default' => 'Items on sale this week',
				'required' => array(
					array(
					  'setting'  => 'partdo_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Products Tab Subtitle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_header_products_tab_subtitle',
				'label' => esc_attr__( 'Tab Subtitle', 'partdo' ),
				'description' => esc_attr__( 'You can add a subtitle for the tab.', 'partdo' ),
				'section' => 'partdo_header_product_tab_section',
				'default' => 'Top picks this week. Up to 50% off the best selling products.',
				'required' => array(
					array(
					  'setting'  => 'partdo_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Products Tab On Sale ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_header_products_tab_on_sale',
				'label' => esc_attr__( 'On Sale Products?', 'partdo' ),
				'section' => 'partdo_header_product_tab_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'partdo_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Products Tab Featured ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_header_products_tab_featured',
				'label' => esc_attr__( 'Featured Products?', 'partdo' ),
				'section' => 'partdo_header_product_tab_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'partdo_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Products Tab Best Selling ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_header_products_tab_best_selling',
				'label' => esc_attr__( 'Best Selling Products?', 'partdo' ),
				'section' => 'partdo_header_product_tab_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'partdo_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Products Tab Post count ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_header_products_tab_post_count',
				'label' => esc_attr__( 'Posts Count', 'partdo' ),
				'section' => 'partdo_header_product_tab_section',
				'default' => '5',
				'required' => array(
					array(
					  'setting'  => 'partdo_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Products Tab Title Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_header_products_tab_title_color',
				'label' => esc_attr__( 'Tab Title Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_header_product_tab_section',
				'required' => array(
					array(
					  'setting'  => 'partdo_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Products Tab Subtitle Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#B8BDC1',
				'settings' => 'partdo_header_products_tab_subtitle_color',
				'label' => esc_attr__( 'Tab Subtitle Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_header_product_tab_section',
				'required' => array(
					array(
					  'setting'  => 'partdo_header_products_tab',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Top Notification Text2 Toggle======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_top_notification2_toggle',
				'label' => esc_attr__( 'Top Notification 2', 'partdo-core' ),
				'description' => esc_attr__( 'You can choose status of the notification 2 on the header.', 'partdo-core' ),
				'section' => 'partdo_header_notification_section',
				'default' => '0',
			)
		);
		
		/*====== Top Notification 2 Content ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'partdo_top_notification2_content',
				'label' => esc_attr__( 'Top Notification 2 Content', 'partdo-core' ),
				'description' => esc_attr__( 'You can add a text for the notification 2 content.', 'partdo-core' ),
				'section' => 'partdo_header_notification_section',
				'default' => 'Need help? <span>Call us:</span> <a href="tel:(+800) 1234 5678 90">(+800) 1234 5678 90</a> <span>or</span> <a href="mailto:info@company.com">info@company.com</a>',
				'required' => array(
					array(
					  'setting'  => 'partdo_top_notification2_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Top Notification Text1 Toggle======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_top_notification1_toggle',
				'label' => esc_attr__( 'Top Notification 1', 'partdo-core' ),
				'description' => esc_attr__( 'You can choose status of the notification 1 on the header.', 'partdo-core' ),
				'section' => 'partdo_header_notification_section',
				'default' => '0',
			)
		);
		
		/*====== Top Notification 1 Content ======*/
		new \Kirki\Field\Repeater(
			array(
				'settings' => 'partdo_top_notification1_content',
				'label' => esc_attr__( 'Top Notification 1 Content', 'partdo' ),
				'description' => esc_attr__( 'You can add a text for the notification content.', 'partdo' ),
				'section' => 'partdo_header_notification_section',
				'fields' => array(
					'top_notification1_text' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Text', 'partdo' ),
					),
				),
				'required' => array(
					array(
					  'setting'  => 'partdo_top_notification1_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),	
			)
		);

		/*====== Top Notification 1 Count Text ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_top_notification_count_text',
				'label' => esc_attr__( 'Top Notification Count Text', 'partdo-core' ),
				'description' => esc_attr__( 'You can add a text for the notification count.', 'partdo-core' ),
				'section' => 'partdo_header_notification_section',
				'default' => 'End of Time:',
				'required' => array(
					array(
					  'setting'  => 'partdo_top_notification1_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Top Notification 1 Count Date ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'date',
				'settings' => 'partdo_top_notification_count_date',
				'label' => esc_attr__( 'Top Notification Count Date', 'partdo-core' ),
				'description' => esc_attr__( 'You can add a date for the notification count.', 'partdo-core' ),
				'section' => 'partdo_header_notification_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'partdo_top_notification1_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== Attribute Search Toggle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_header_attribute_search_toggle',
				'label' => esc_attr__( 'Attribute Search', 'partdo-core' ),
				'description' => esc_attr__( 'You can choose status of the attribute search on the header.', 'partdo-core' ),
				'section' => 'partdo_header_attribute_search_section',
				'default' => '0',
			)
		);
		
		/*====== Attribute Search Image ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'partdo_header_attribute_search_image',
				'label' => esc_attr__( 'Image', 'partdo-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'partdo-core' ),
				'section' => 'partdo_header_attribute_search_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'required' => array(
					array(
					  'setting'  => 'partdo_header_attribute_search_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
				
			)
		);
		
		/*====== Attribute Search Title ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_header_attribute_search_title',
				'label' => esc_attr__( 'Title', 'partdo-core' ),
				'description' => esc_attr__( 'You can add a title for the modal.', 'partdo-core' ),
				'section' => 'partdo_header_attribute_search_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'partdo_header_attribute_search_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Attribute Search Subtitle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'partdo_header_attribute_search_subtitle',
				'label' => esc_attr__( 'Subtitle', 'partdo-core' ),
				'description' => esc_attr__( 'You can add a subtitle for the modal.', 'partdo-core' ),
				'section' => 'partdo_header_attribute_search_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'partdo_header_attribute_search_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Attribute Search attribute name ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_header_attribute_search_attribute_name',
				'label' => esc_attr__( 'Attribute Name', 'partdo-core' ),
				'description' => esc_attr__( 'You can separate the attributes with comma.', 'partdo-core' ),
				'section' => 'partdo_header_attribute_search_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'partdo_header_attribute_search_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Attribute Search Second Subtitle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_header_attribute_search_second_subtitle',
				'label' => esc_attr__( 'Second Subtitle', 'partdo-core' ),
				'description' => esc_attr__( 'You can add a subtitle.', 'partdo-core' ),
				'section' => 'partdo_header_attribute_search_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'partdo_header_attribute_search_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Attribute Search Title Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_header_attribute_search_title_color',
				'label' => esc_attr__( 'Title Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_header_attribute_search_section',
				'required' => array(
					array(
					  'setting'  => 'partdo_header_attribute_search_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Attribute Search Subtitle Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_header_attribute_search_subtitle_color',
				'label' => esc_attr__( 'Subtitle Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_header_attribute_search_section',
				'required' => array(
					array(
					  'setting'  => 'partdo_header_attribute_search_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Attribute Search Second Subtitle Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#868E96',
				'settings' => 'partdo_header_attribute_search_second_subtitle_color',
				'label' => esc_attr__( 'Second Subtitle Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_header_attribute_search_section',
				'required' => array(
					array(
					  'setting'  => 'partdo_header_attribute_search_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== PreLoader Toggle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_preloader',
				'label' => esc_attr__( 'Enable Loader', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable the loader.', 'partdo-core' ),
				'section' => 'partdo_header_preloader_section',
				'default' => '0',
			)
		);
		
	/*====== Header 1 Style ================*/	
		
		/*====== Header 1 Top Border Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#EF233C',
				'settings' => 'partdo_header1_top_border_color',
				'label' => esc_attr__( 'Header Top Border Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  border color.', 'partdo-core' ),
				'section' => 'partdo_header1_style_section',
			)
		);	
		
		/*====== Header 1 Top Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_header1_top_bg_color',
				'label' => esc_attr__( 'Header Top Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'partdo-core' ),
				'section' => 'partdo_header1_style_section',
			)
		);	
		
		/*====== Header1 Top Font Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_header1_top_font_color',
				'label' => esc_attr__( 'Header Top Font Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_header1_style_section',
			)
		);
		
		/*====== Header1 Top Font Hover Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#EF233C',
				'settings' => 'partdo_header1_top_font_hvrcolor',
				'label' => esc_attr__( 'Header Top Font Hover Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for hover color.', 'partdo-core' ),
				'section' => 'partdo_header1_style_section',
			)
		);
		
		/*====== Header 1 Main Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_header1_main_bg_color',
				'label' => esc_attr__( 'Header Main Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'partdo-core' ),
				'section' => 'partdo_header1_style_section',
			)
		);
		
		/*====== Header 1 Main Border Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#E9ECEF',
				'settings' => 'partdo_header1_main_border_color',
				'label' => esc_attr__( 'Header Main Border Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  border.', 'partdo-core' ),
				'section' => 'partdo_header1_style_section',
			)
		);
		
		/*====== Header 1 Main Help Center Font Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#EF233C',
				'settings' => 'partdo_header1_main_help_center_font_color',
				'label' => esc_attr__( 'Header Main Help Center Font Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_header1_style_section',
			)
		);
		
		/*====== Header1 Main Font Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_header1_main_font_color',
				'label' => esc_attr__( 'Header Main Font Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_header1_style_section',
			)
		);
		
		/*====== Header1 Main Font Hover Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#EF233C',
				'settings' => 'partdo_header1_main_font_hvrcolor',
				'label' => esc_attr__( 'Header Main Font Hover Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_header1_style_section',
			)
		);
		
		/*====== Header1 Main Submenu Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#FFF4F6',
				'settings' => 'partdo_header1_main_submenu_bg_color',
				'label' => esc_attr__( 'Header Main Submenu Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for background color.', 'partdo-core' ),
				'section' => 'partdo_header1_style_section',
			)
		);
		
		/*====== Header1 Main Submenu Font Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_header1_main_submenu_font_color',
				'label' => esc_attr__( 'Header Main Submenu Font Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_header1_style_section',
			)
		);
		
		/*====== Header1 Main Submenu Font Hover Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#EF233C',
				'settings' => 'partdo_header1_main_submenu_font_hvrcolor',
				'label' => esc_attr__( 'Header Main Submenu Font Hover Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_header1_style_section',
			)
		);
		
		/*====== Header1 Main Icon Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_header1_main_icon_color',
				'label' => esc_attr__( 'Header Main Icon Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_header1_style_section',
			)
		);
		
	/*====== Header 2 Style ================*/	
		
		/*====== Header 2 Top 1 Notification Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_header2_top1_notification_color',
				'label' => esc_attr__( 'Header Top 1 Notification Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_header2_style_section',
			)
		);	
		
		/*====== Header 2 Top 2 Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_header2_top2_bg_color',
				'label' => esc_attr__( 'Header Top 2 Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'partdo-core' ),
				'section' => 'partdo_header2_style_section',
			)
		);	
		
		/*====== Header 2 Top 2 Font Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_header2_top2_font_color',
				'label' => esc_attr__( 'Header Top 2 Font Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_header2_style_section',
			)
		);
		
		/*====== Header 2 Top 2 Font Hover Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#EF233C',
				'settings' => 'partdo_header2_top2_font_hvrcolor',
				'label' => esc_attr__( 'Header Top 2 Font Hover Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for hover color.', 'partdo-core' ),
				'section' => 'partdo_header2_style_section',
			)
		);
		
		/*====== Header 2 Main Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_header2_main_bg_color',
				'label' => esc_attr__( 'Header Main Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'partdo-core' ),
				'section' => 'partdo_header2_style_section',
			)
		);
		
		/*====== Header 2 Main Border Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#E9ECEF',
				'settings' => 'partdo_header2_main_border_color',
				'label' => esc_attr__( 'Header Main Border Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  border.', 'partdo-core' ),
				'section' => 'partdo_header2_style_section',
			)
		);
		
		/*====== Header2 Main Font Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_header2_main_font_color',
				'label' => esc_attr__( 'Header Main Font Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_header2_style_section',
			)
		);
		
		/*====== Header2 Main Font Hover Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#EF233C',
				'settings' => 'partdo_header2_main_font_hvrcolor',
				'label' => esc_attr__( 'Header Main Font Hover Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_header2_style_section',
			)
		);
		
		/*====== Header2 Main Submenu Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#FFF4F6',
				'settings' => 'partdo_header2_main_submenu_bg_color',
				'label' => esc_attr__( 'Header Main Submenu Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for background color.', 'partdo-core' ),
				'section' => 'partdo_header2_style_section',
			)
		);
		
		/*====== Header2 Main Submenu Font Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_header2_main_submenu_font_color',
				'label' => esc_attr__( 'Header Main Submenu Font Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_header2_style_section',
			)
		);
		
		/*====== Header2 Main Submenu Font Hover Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#EF233C',
				'settings' => 'partdo_header2_main_submenu_font_hvrcolor',
				'label' => esc_attr__( 'Header Main Submenu Font Hover Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_header2_style_section',
			)
		);
		
		/*====== Header2 Main Icon Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_header2_main_icon_color',
				'label' => esc_attr__( 'Header Main Icon Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_header2_style_section',
			)
		);
		
	/*====== Header 3 Style ================*/	
		
		/*====== Header 3 Top Border Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#EF233C',
				'settings' => 'partdo_header3_top_border_color',
				'label' => esc_attr__( 'Header Top Border Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  border color.', 'partdo-core' ),
				'section' => 'partdo_header3_style_section',
			)
		);	
		
		/*====== Header 3 Top Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_header3_top_bg_color',
				'label' => esc_attr__( 'Header Top Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'partdo-core' ),
				'section' => 'partdo_header3_style_section',
			)
		);	
		
		/*====== Header3 Top Font Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_header3_top_font_color',
				'label' => esc_attr__( 'Header Top Font Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_header3_style_section',
			)
		);
		
		/*====== Header3 Top Font Hover Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#EF233C',
				'settings' => 'partdo_header3_top_font_hvrcolor',
				'label' => esc_attr__( 'Header Top Font Hover Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for hover color.', 'partdo-core' ),
				'section' => 'partdo_header3_style_section',
			)
		);
		
		/*====== Header 3 Main Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_header3_main_bg_color',
				'label' => esc_attr__( 'Header Main Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'partdo-core' ),
				'section' => 'partdo_header3_style_section',
			)
		);
		
		/*====== Header 3 Main Border Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#E9ECEF',
				'settings' => 'partdo_header3_main_border_color',
				'label' => esc_attr__( 'Header Main Border Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  border.', 'partdo-core' ),
				'section' => 'partdo_header3_style_section',
			)
		);	
		
		/*====== Header3 Main Icon Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_header3_main_icon_color',
				'label' => esc_attr__( 'Header Main Icon Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_header3_style_section',
			)
		);
		
	/*====== Header 4 Style ================*/	
		
		/*====== Header 4 Top 1 Notification Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_header4_top1_notification_color',
				'label' => esc_attr__( 'Header Top 1 Notification Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_header4_style_section',
			)
		);	
		
		/*====== Header 4 Top 2 Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_header4_top2_bg_color',
				'label' => esc_attr__( 'Header Top 2 Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'partdo-core' ),
				'section' => 'partdo_header4_style_section',
			)
		);	
		
		/*====== Header 4 Top 2 Font Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_header4_top2_font_color',
				'label' => esc_attr__( 'Header Top 2 Font Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_header4_style_section',
			)
		);
		
		/*====== Header 4 Top 2 Font Hover Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#EF233C',
				'settings' => 'partdo_header4_top2_font_hvrcolor',
				'label' => esc_attr__( 'Header Top 2 Font Hover Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for hover color.', 'partdo-core' ),
				'section' => 'partdo_header4_style_section',
			)
		);
		
		/*====== Header 4 Main Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_header4_main_bg_color',
				'label' => esc_attr__( 'Header Main Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'partdo-core' ),
				'section' => 'partdo_header4_style_section',
			)
		);
		
		/*====== Header 4 Main Border Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#E9ECEF',
				'settings' => 'partdo_header4_main_border_color',
				'label' => esc_attr__( 'Header Main Border Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  border.', 'partdo-core' ),
				'section' => 'partdo_header4_style_section',
			)
		);
		
		/*====== Header 4 Main Icon Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_header4_main_icon_color',
				'label' => esc_attr__( 'Header Main Icon Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_header4_style_section',
			)
		);	
	
	/*====== Sidebar Menu Style ================*/	
	
		/*====== Sidebar Title Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ef233c',
				'settings' => 'partdo_sidebar_menu_title_bg_color',
				'label' => esc_attr__( 'Sidebar Title Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for background color.', 'partdo-core' ),
				'section' => 'partdo_sidebar_menu_style_section',
			)
		);
		
		/*====== Sidebar Title Font Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_sidebar_menu_title_font_color',
				'label' => esc_attr__( 'Sidebar Title Font Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_sidebar_menu_style_section',
			)
		);	
		
		/*====== Sidebar Menu Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_sidebar_menu_bg_color',
				'label' => esc_attr__( 'Sidebar Menu Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for background color.', 'partdo-core' ),
				'section' => 'partdo_sidebar_menu_style_section',
			)
		);
		
		/*====== Sidebar Menu Border Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#E9ECEF',
				'settings' => 'partdo_sidebar_menu_border_color',
				'label' => esc_attr__( 'Sidebar Menu Border Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for border color.', 'partdo-core' ),
				'section' => 'partdo_sidebar_menu_style_section',
			)
		);
		
		/*====== Sidebar Menu Font Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_sidebar_menu_font_color',
				'label' => esc_attr__( 'Sidebar Menu Font Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_sidebar_menu_style_section',
			)
		);	
		
		/*====== Sidebar Menu Font Hover Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ef233c',
				'settings' => 'partdo_sidebar_menu_font_hvrcolor',
				'label' => esc_attr__( 'Sidebar Menu Font Hover Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_sidebar_menu_style_section',
			)
		);
		
		/*====== Sidebar Menu Font Hover Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#FFF4F6',
				'settings' => 'partdo_sidebar_menu_font_hvr_bgcolor',
				'label' => esc_attr__( 'Sidebar Menu Font Hover Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for background color.', 'partdo-core' ),
				'section' => 'partdo_sidebar_menu_style_section',
			)
		);
		
		/*====== Sidebar Menu Subtitle Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_sidebar_menu_subtitle_font_color',
				'label' => esc_attr__( 'Sidebar Menu Subtitle Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_sidebar_menu_style_section',
			)
		);
		
	/*====== Mobile Menu Style ========*/
		
		/*====== Mobile Menu Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_mobile_menu_bg_color',
				'label' => esc_attr__( 'Mobile Menu Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'partdo-core' ),
				'section' => 'partdo_mobile_menu_style_section',
			)
		);
		
		/*====== Mobile Menu Border Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#E9ECEF',
				'settings' => 'partdo_mobile_menu_border_color',
				'label' => esc_attr__( 'Mobile Menu Border Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  border.', 'partdo-core' ),
				'section' => 'partdo_mobile_menu_style_section',
			)
		);
		
		/*====== Mobile Menu Title Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_mobile_menu_title_color',
				'label' => esc_attr__( 'Mobile Menu Title Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_mobile_menu_style_section',
			)
		);
		
		/*====== Mobile Menu Subtitle Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_mobile_menu_subtitle_color',
				'label' => esc_attr__( 'Mobile Menu Subtitle Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_mobile_menu_style_section',
			)
		);
		
		/*====== Mobile Menu Contact Details Icon Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_mobile_menu_contact_icon_color',
				'label' => esc_attr__( 'Contact Details Icon Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_mobile_menu_style_section',
			)
		);
		
		/*====== Mobile Menu Contact Details Title Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_mobile_menu_contact_title_color',
				'label' => esc_attr__( 'Contact Details Title Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_mobile_menu_style_section',
			)
		);
		
		/*====== Mobile Menu Contact Details Subtitle Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_mobile_menu_contact_subtitle_color',
				'label' => esc_attr__( 'Contact Details Subtitle Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_mobile_menu_style_section',
			)
		);
		
		/*====== Mobile Menu Copyright Font Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_mobile_menu_copyright_font_color',
				'label' => esc_attr__( 'Mobile Menu Copyright Font Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_mobile_menu_style_section',
			)
		);	
		
	/*====== Mobile Bottom Menu Style ========*/	
		
		/*====== Mobile Bottom Menu Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_mobile_bottom_menu_bg_color',
				'label' => esc_attr__( 'Mobile Bottom Menu Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'partdo-core' ),
				'section' => 'partdo_mobile_bottom_menu_style_section',
			)
		);
		
		/*====== Mobile Bottom Menu Icon Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#868E96',
				'settings' => 'partdo_mobile_bottom_menu_icon_color',
				'label' => esc_attr__( 'Mobile Bottom Menu Icon Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_mobile_bottom_menu_style_section',
			)
		);
		
		/*====== Mobile Bottom Menu Font Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#868E96',
				'settings' => 'partdo_mobile_bottom_menu_font_color',
				'label' => esc_attr__( 'Mobile Bottom Menu Font Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_mobile_bottom_menu_style_section',
			)
		);		
		
	/*====== SHOP ====================================================================================*/
		/*====== Shop Panels ======*/
		Kirki::add_panel (
			'partdo_shop_panel',
			array(
				'title' => esc_html__( 'Shop Settings', 'partdo-core' ),
				'description' => esc_html__( 'You can customize the shop from this panel.', 'partdo-core' ),
			)
		);

		$sections = array (
			'shop_general' => array(
				esc_attr__( 'General', 'partdo-core' ),
				esc_attr__( 'You can customize shop settings.', 'partdo-core' )
			),
			
			'shop_product_box' => array(
				esc_attr__( 'Product Box', 'partdo-core' ),
				esc_attr__( 'You can customize the product box settings.', 'partdo-core' )
			),
			
			'shop_single' => array(
				esc_attr__( 'Product Detail', 'partdo-core' ),
				esc_attr__( 'You can customize the product single settings.', 'partdo-core' )
			),
			
			'shop_banner' => array(
				esc_attr__( 'Banner', 'partdo-core' ),
				esc_attr__( 'You can customize the banner.', 'partdo-core' )
			),
			
			'my_account' => array(
				esc_attr__( 'My Account', 'partdo-core' ),
				esc_attr__( 'You can customize the my account page.', 'partdo-core' )
			),

			'free_shipping_bar' => array(
				esc_attr__( 'Free Shipping Bar ', 'partdo-core' ),
				esc_attr__( 'You can customize the free shipping bar settings.', 'partdo-core' )
			),
			
			'shop_single_style' => array(
				esc_attr__( 'Product Detail Style', 'partdo-core' ),
				esc_attr__( 'You can customize the product single style settings.', 'partdo-core' )
			),
			
			'mini_cart_style' => array(
				esc_attr__( 'Mini Cart Style', 'partdo-core' ),
				esc_attr__( 'You can customize the mini cart style settings.', 'partdo-core' )
			),
			
		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'partdo_shop_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'partdo_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}
		
		/*====== Shop Layouts ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'partdo_shop_layout',
				'label' => esc_attr__( 'Layout', 'partdo-core' ),
				'description' => esc_attr__( 'You can choose a layout for the shop.', 'partdo-core' ),
				'section' => 'partdo_shop_general_section',
				'default' => 'left-sidebar',
				'choices' => array(
					'left-sidebar' => esc_attr__( 'Left Sidebar', 'partdo-core' ),
					'full-width' => esc_attr__( 'Full Width', 'partdo-core' ),
					'right-sidebar' => esc_attr__( 'Right Sidebar', 'partdo-core' ),
				),
			)
		);

		/*====== Shop Width ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'partdo_shop_width',
				'label' => esc_attr__( 'Shop Page Width', 'partdo-core' ),
				'description' => esc_attr__( 'You can choose a layout for the shop page.', 'partdo-core' ),
				'section' => 'partdo_shop_general_section',
				'default' => 'boxed',
				'choices' => array(
					'boxed' => esc_attr__( 'Boxed', 'partdo-core' ),
					'wide' => esc_attr__( 'Wide', 'partdo-core' ),
				),
			)
		);

		partdo_customizer_add_field(
			array (
			'type'        => 'radio-buttonset',
			'settings'    => 'partdo_paginate_type',
			'label'       => esc_html__( 'Pagination Type', 'partdo-core' ),
			'section'     => 'partdo_shop_general_section',
			'default'     => 'default',
			'priority'    => 10,
			'choices'     => array(
				'default' => esc_attr__( 'Default', 'partdo-core' ),
				'loadmore' => esc_attr__( 'Load More', 'partdo-core' ),
				'infinite' => esc_attr__( 'Infinite', 'partdo-core' ),
			),
			) 
		);

		/*====== Ajax on Shop Page ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_ajax_on_shop',
				'label' => esc_attr__( 'Ajax on Shop Page', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable Ajax for the shop page.', 'partdo-core' ),
				'section' => 'partdo_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Grid-List Toggle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_grid_list_view',
				'label' => esc_attr__( 'Grid List View', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable grid list view on shop page.', 'partdo-core' ),
				'section' => 'partdo_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Atrribute Swatches ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_attribute_swatches',
				'label' => esc_attr__( 'Attribute Swatches', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable the attribute types (Color - Button - Images).', 'partdo-core' ),
				'section' => 'partdo_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Perpage Toggle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_perpage_view',
				'label' => esc_attr__( 'Perpage View', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable perpage view on shop page.', 'partdo-core' ),
				'section' => 'partdo_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Atrribute Swatches ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_attribute_swatches',
				'label' => esc_attr__( 'Attribute Swatches', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable the attribute types (Color - Button - Images).', 'partdo-core' ),
				'section' => 'partdo_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Ajax Notice Shop ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_shop_notice_ajax_addtocart',
				'label' => esc_attr__( 'Added to Cart Ajax Notice', 'partdo' ),
				'description' => esc_attr__( 'You can choose status of the ajax notice feature.', 'partdo' ),
				'section' => 'partdo_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Product Badge Tab ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_product_badge_tab',
				'label' => esc_attr__( 'Product Badge Tab', 'partdo-core' ),
				'description' => esc_attr__( 'You can choose status of the product badge tab.', 'partdo-core' ),
				'section' => 'partdo_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Remove All Button ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_remove_all_button',
				'label' => esc_attr__( 'Remove All Button in cart page', 'partdo-core' ),
				'description' => esc_attr__( 'You can choose status of the remove all button.', 'partdo-core' ),
				'section' => 'partdo_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Mobile Bottom Menu======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_mobile_bottom_menu',
				'label' => esc_attr__( 'Mobile Bottom Menu', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable the bottom menu on mobile.', 'partdo-core' ),
				'section' => 'partdo_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Mobile Bottom Menu Edit Toggle======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_mobile_bottom_menu_edit_toggle',
				'label' => esc_attr__( 'Mobile Bottom Menu Edit', 'partdo-core' ),
				'description' => esc_attr__( 'Edit the mobile bottom menu.', 'partdo-core' ),
				'section' => 'partdo_shop_general_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'partdo_mobile_bottom_menu',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
				
			)
			
		);
		
		/*====== Mobile Menu Repeater ======*/
		new \Kirki\Field\Repeater(
			array(
				'settings' => 'partdo_mobile_bottom_menu_edit',
				'label' => esc_attr__( 'Mobile Bottom Menu Edit', 'partdo-core' ),
				'description' => esc_attr__( 'Edit the mobile bottom menu.', 'partdo-core' ),
				'section' => 'partdo_shop_general_section',
				'required' => array(
					array(
					  'setting'  => 'partdo_mobile_bottom_menu_edit_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
				'fields' => array(
					'mobile_menu_type' => array(
						'type' => 'select',
						'label' => esc_attr__( 'Select Type', 'partdo-core' ),
						'description' => esc_attr__( 'You can select a type', 'partdo-core' ),
						'default' => 'default',
						'choices' => array(
							'default' => esc_attr__( 'Default', 'partdo-core' ),
							'search' => esc_attr__( 'Search', 'partdo-core' ),
							'filter' => esc_attr__( 'Filter', 'partdo-core' ),
							'category' => esc_attr__( 'category', 'partdo-core' ),
						),
					),
				
					'mobile_menu_icon' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Icon', 'partdo-core' ),
						'description' => esc_attr__( 'You can set an icon. for example; "store"', 'partdo-core' ),
					),
					'mobile_menu_text' => array(
						'type' => 'text',
						'label' => esc_attr__( ' Text', 'partdo-core' ),
						'description' => esc_attr__( 'You can enter a text.', 'partdo-core' ),
					),
					'mobile_menu_url' => array(
						'type' => 'text',
						'label' => esc_attr__( 'URL', 'partdo-core' ),
						'description' => esc_attr__( 'You can set url for the item.', 'partdo-core' ),
					),
				),
				
			)
		);

		/*====== Product Stock Quantity ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_stock_quantity',
				'label' => esc_attr__( 'Stock Quantity', 'partdo-core' ),
				'description' => esc_attr__( 'Show stock quantity on the label.', 'partdo-core' ),
				'section' => 'partdo_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Product Min/Max Quantity ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_min_max_quantity',
				'label' => esc_attr__( 'Min/Max Quantity', 'partdo-core' ),
				'description' => esc_attr__( 'Enable the additional quantity setting fields in product detail page.', 'partdo-core' ),
				'section' => 'partdo_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Category Description ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_category_description_after_content',
				'label' => esc_attr__( 'Category Desc After Content', 'partdo-core' ),
				'description' => esc_attr__( 'Add the category description after the products.', 'partdo-core' ),
				'section' => 'partdo_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Catalog Mode - Disable Add to Cart ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_catalog_mode',
				'label' => esc_attr__( 'Catalog Mode', 'partdo-core' ),
				'description' => esc_attr__( 'Disable Add to Cart button on the shop page.', 'partdo-core' ),
				'section' => 'partdo_shop_general_section',
				'default' => '0',
			)
		);	

		/*====== Recently Viewed Products ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_recently_viewed_products',
				'label' => esc_attr__( 'Recently Viewed Products', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable Recently Viewed Products.', 'partdo-core' ),
				'section' => 'partdo_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Recently Viewed Products Coulmn ======*/
		partdo_customizer_add_field(
			array (
				'type'        => 'radio-buttonset',
				'settings'    => 'partdo_recently_viewed_products_column',
				'label'       => esc_html__( 'Recently Viewed Products Column', 'partdo-core' ),
				'section'     => 'partdo_shop_general_section',
				'default'     => '4',
				'priority'    => 10,
				'choices'     => array(
					'5' => esc_attr__( '5', 'partdo-core' ),
					'4' => esc_attr__( '4', 'partdo-core' ),
					'3' => esc_attr__( '3', 'partdo-core' ),
					'2' => esc_attr__( '2', 'partdo-core' ),
				),
				'required' => array(
					array(
					  'setting'  => 'partdo_recently_viewed_products',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			) 
		);

		/*====== Min Order Amount ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_min_order_amount_toggle',
				'label' => esc_attr__( 'Min Order Amount', 'partdo-core' ),
				'description' => esc_attr__( 'Enable Min Order Amount.', 'partdo-core' ),
				'section' => 'partdo_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Min Order Amount Value ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_min_order_amount_value',
				'label' => esc_attr__( 'Min Order Value', 'partdo-core' ),
				'description' => esc_attr__( 'Set amount to specify a minimum order value.', 'partdo-core' ),
				'section' => 'partdo_shop_general_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'partdo_min_order_amount_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== Product Image Size ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'dimensions',
				'settings' => 'partdo_product_image_size',
				'label' => esc_attr__( 'Product Image Size', 'partdo-core' ),
				'description' => esc_attr__( 'You can set size of the product image for the shop page.', 'partdo-core' ),
				'section' => 'partdo_shop_general_section',
				'default' => array(
					'width' => '',
					'height' => '',
				),
			)
		);
		
		/*====== Product Box Type ======*/
		partdo_customizer_add_field(
			array (
			'type'        => 'radio-buttonset',
			'settings'    => 'partdo_product_box_type',
			'label'       => esc_html__( 'Shop Product Box Type', 'partdo-core' ),
			'section'     => 'partdo_shop_product_box_section',
			'default'     => 'type1',
			'priority'    => 10,
			'choices'     => array(
				'type1' => esc_attr__( 'Type 1', 'partdo-core' ),
				'type2' => esc_attr__( 'Type 2', 'partdo-core' ),
				'type3' => esc_attr__( 'Type 3', 'partdo-core' ),
			),
			) 
		);
		
		/*====== Product Box Gallery Toggle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_product_box_gallery',
				'label' => esc_attr__( 'Product Gallery', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable gallery on the product box.', 'partdo-core' ),
				'section' => 'partdo_shop_product_box_section',
				'default' => '0',
			)
		);
		
		/*====== Quick View Toggle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_quick_view_button',
				'label' => esc_attr__( 'Quick View Button', 'partdo-core' ),
				'description' => esc_attr__( 'You can choose status of the quick view button.', 'partdo-core' ),
				'section' => 'partdo_shop_product_box_section',
				'default' => '0',
			)
		);
		
		/*====== Wishlist Toggle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_wishlist_button',
				'label' => esc_attr__( 'Custom Wishlist Button', 'partdo-core' ),
				'description' => esc_attr__( 'You can choose status of the wishlist button.', 'partdo-core' ),
				'section' => 'partdo_shop_product_box_section',
				'default' => '0',
			)
		);
		
		/*====== Wishlist Page ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'partdo_wishlist_page',
				'label' => esc_attr__( 'Select a Wishlist Page', 'partdo-core' ),
				'description' => esc_attr__( 'You can select a wishlist page. [klbwl_list]', 'partdo-core' ),
				'section' => 'partdo_shop_product_box_section',
				'default' => '',
				'choices'     => Kirki\Util\Helper::get_posts(
					array(
						'posts_per_page' => 30,
						'post_type'      => 'page'
					) ,
				),
				'required' => array(
					array(
					  'setting'  => 'partdo_wishlist_button',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Shop Compare  ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_compare_button',
				'label' => esc_attr__( 'Compare', 'partdo-core' ),
				'description' => esc_attr__( 'You can choose status of the compare button.', 'partdo-core' ),
				'section' => 'partdo_shop_product_box_section',
				'default' => '0',
			)
		);
		
		/*====== Compare Page ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'partdo_compare_page',
				'label' => esc_attr__( 'Select a Compare Page', 'partdo-core' ),
				'description' => esc_attr__( 'You can select a compare page. [klbcp_list]', 'partdo-core' ),
				'section' => 'partdo_shop_product_box_section',
				'default' => '',
				'choices'     => Kirki\Util\Helper::get_posts(
					array(
						'posts_per_page' => 30,
						'post_type'      => 'page'
					) ,
				),
				'required' => array(
					array(
					  'setting'  => 'partdo_compare_button',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Product SKU  ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_product_box_sku',
				'label' => esc_attr__( 'Product SKU', 'partdo-core' ),
				'description' => esc_attr__( 'Enable or Disable the sku on the product box', 'partdo-core' ),
				'section' => 'partdo_shop_product_box_section',
				'default' => '0',
			)
		);

		/*====== Product Attributes  ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_product_box_attributes',
				'label' => esc_attr__( 'Product Attributes', 'partdo-core' ),
				'description' => esc_attr__( 'Enable or Disable the attributes on the product box', 'partdo-core' ),
				'section' => 'partdo_shop_product_box_section',
				'default' => '0',
			)
		);

		/*====== Product Variable  ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_product_box_variable',
				'label' => esc_attr__( 'Product Variable', 'partdo-core' ),
				'description' => esc_attr__( 'Enable or Disable the variable on the product box', 'partdo-core' ),
				'section' => 'partdo_shop_product_box_section',
				'default' => '0',
			)
		);
		
		
		/*====== Shop Single Image Column ======*/
		partdo_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'partdo_shop_single_image_column',
				'label'       => esc_html__( 'Image Column', 'partdo-core' ),
				'section'     => 'partdo_shop_single_section',
				'default'     => 7,
				'transport'   => 'auto',
				'choices'     => [
					'min'  => 3,
					'max'  => 12,
					'step' => 1,
				],
			)
		);
		
		/*====== Shop Single Gallery Type ======*/
		partdo_customizer_add_field(
			array (
				'type'        => 'radio-buttonset',
				'settings'    => 'partdo_single_gallery_type',
				'label'       => esc_html__( 'Gallery Type (Product Detail)', 'partdo-core' ),
				'section'     => 'partdo_shop_single_section',
				'default'     => 'horizontal',
				'priority'    => 10,
				'choices'     => array(
					'horizontal' => esc_attr__( 'Horizontal', 'partdo-core' ),
					'vertical' => esc_attr__( 'Vertical', 'partdo-core' ),
					'1column'  => esc_attr__( '1column', 'partdo-core' ),
					'2columns' => esc_attr__( '2columns', 'partdo-core' ),
					'carousel2columns' => esc_attr__( 'Carousel 2columns', 'partdo-core' ),
				),
			) 
		);
		
		/*====== Shop Single Product Tab Type ======*/
		partdo_customizer_add_field(
			array (
				'type'        => 'radio-buttonset',
				'settings'    => 'partdo_single_product_tab_type',
				'label'       => esc_html__( 'Product Tab Type', 'partdo-core' ),
				'section'     => 'partdo_shop_single_section',
				'default'     => 'horizontal_tab',
				'priority'    => 10,
				'choices'     => array(
					'horizontal_tab' 		  => esc_attr__( 'Horizontal Tab', 'partdo-core' ),
					'vertical_tab' 		      => esc_attr__( 'Vertical Tab', 'partdo-core' ),
					'accordion_tab' 		  => esc_attr__( 'Accordion Tab', 'partdo-core' ),
					'accordion_tab_content'   => esc_attr__( 'Accordion Tab Content', 'partdo-core' ),
				),
			) 
		);
		
		/*====== Shop Single Full width ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_single_full_width',
				'label' => esc_attr__( 'Full Width', 'partdo-core' ),
				'description' => esc_attr__( 'Stretch the single product page content.', 'partdo-core' ),
				'section' => 'partdo_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Shop Single Image Zoom  ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_single_image_zoom',
				'label' => esc_attr__( 'Image Zoom', 'partdo-core' ),
				'description' => esc_attr__( 'You can choose status of the zoom feature.', 'partdo-core' ),
				'section' => 'partdo_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Product360 View ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_shop_single_product360',
				'label' => esc_attr__( 'Product360 View', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable Product 360 View.', 'partdo-core' ),
				'section' => 'partdo_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Shop Single Ajax Add To Cart ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_shop_single_ajax_addtocart',
				'label' => esc_attr__( 'Ajax Add to Cart', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable ajax add to cart button.', 'partdo-core' ),
				'section' => 'partdo_shop_single_section',
				'default' => '0',
			)
		);
		
		/*======  Sticky Single Cart ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_single_sticky_cart',
				'label' => esc_attr__( 'Sticky Add to Cart', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable sticky cart button.', 'partdo-core' ),
				'section' => 'partdo_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Single Sticky Titles ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_single_sticky_titles',
				'label' => esc_attr__( 'Sticky Titles', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable the sticky titles for desktop.', 'partdo-core' ),
				'section' => 'partdo_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Mobile Sticky Single Cart ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_mobile_single_sticky_cart',
				'label' => esc_attr__( 'Mobile Sticky Add to Cart', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable sticky cart button on mobile.', 'partdo-core' ),
				'section' => 'partdo_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Buy Now Single ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_shop_single_buy_now',
				'label' => esc_attr__( 'Buy Now Button', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable Buy Now button.', 'partdo-core' ),
				'section' => 'partdo_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Shop Products Navigation  ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_products_navigation',
				'label' => esc_attr__( 'Products Navigation', 'partdo-core' ),
				'section' => 'partdo_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Related By Tags ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_related_by_tags',
				'label' => esc_attr__( 'Related Products with Tags', 'partdo-core' ),
				'description' => esc_attr__( 'Display the related products by tags.', 'partdo-core' ),
				'section' => 'partdo_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Order on WhatsApp ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_shop_single_orderonwhatsapp',
				'label' => esc_attr__( 'Order on WhatsApp', 'partdo-core' ),
				'description' => esc_attr__( 'Enable the button on the product detail page.', 'partdo-core' ),
				'section' => 'partdo_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Order on WhatsApp Number======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_shop_single_whatsapp_number',
				'label' => esc_attr__( 'WhatsApp Number', 'partdo-core' ),
				'description' => esc_attr__( 'You can add a phone number for order on WhatsApp.', 'partdo-core' ),
				'section' => 'partdo_shop_single_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'partdo_shop_single_orderonwhatsapp',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== Move Review Tab ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_shop_single_review_tab_move',
				'label' => esc_attr__( 'Move Review Tab', 'partdo-core' ),
				'description' => esc_attr__( 'Move the review tab out of tabs', 'partdo-core' ),
				'section' => 'partdo_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Shop Single Social Share ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_shop_social_share',
				'label' => esc_attr__( 'Social Share (Product Detail)', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable social share buttons.', 'partdo-core' ),
				'section' => 'partdo_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Shop Single Social Share ======*/
		partdo_customizer_add_field (
			array(
				'type'        => 'multicheck',
				'settings'    => 'partdo_shop_single_share',
				'section'     => 'partdo_shop_single_section',
				'default'     => array('facebook','twitter', 'pinterest', 'linkedin', 'reddit', 'whatsapp'  ),
				'priority'    => 10,
				'choices'     => [
					'facebook'  => esc_html__( 'Facebook', 	'partdo-core' ),
					'twitter' 	=> esc_html__( 'Twitter', 	'partdo-core' ),
					'pinterest' => esc_html__( 'Pinterest', 'partdo-core' ),
					'linkedin'  => esc_html__( 'Linkedin', 	'partdo-core' ),
					'reddit'    => esc_html__( 'Reddit', 	'partdo-core' ),
					'whatsapp'  => esc_html__( 'WhatsApp', 	'partdo-core' ),
				],
				'required' => array(
					array(
					  'setting'  => 'partdo_shop_social_share',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== Product Related Post Column ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'partdo_shop_related_post_column',
				'label' => esc_attr__( 'Related Post Column', 'partdo-core' ),
				'description' => esc_attr__( 'You can control related post column with this option.', 'partdo-core' ),
				'section' => 'partdo_shop_single_section',
				'default' => '4',
				'choices' => array(
					'5' => esc_attr__( '5 Columns', 'partdo-core' ),
					'4' => esc_attr__( '4 Columns', 'partdo-core' ),
					'3' => esc_attr__( '3 Columns', 'partdo-core' ),
					'2' => esc_attr__( '2 Columns', 'partdo-core' ),
				),
			)
		);
		
		/*====== Product Cross Sells Column ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'partdo_cross_sells_column',
				'label' => esc_attr__( 'Cross Sells Column', 'partdo-core' ),
				'description' => esc_attr__( 'You can control cross sells post column with this option.', 'partdo-core' ),
				'section' => 'partdo_shop_single_section',
				'default' => '4',
				'choices' => array(
					'6' => esc_attr__( '6 Columns', 'partdo-core' ),
					'5' => esc_attr__( '5 Columns', 'partdo-core' ),
					'4' => esc_attr__( '4 Columns', 'partdo-core' ),
					'3' => esc_attr__( '3 Columns', 'partdo-core' ),
					'2' => esc_attr__( '2 Columns', 'partdo-core' ),
				),
			)
		);
		
		/*====== Product Upsell Column ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'partdo_upsell_column',
				'label' => esc_attr__( 'Upsell Column', 'partdo-core' ),
				'description' => esc_attr__( 'You can control upsell post column with this option.', 'partdo-core' ),
				'section' => 'partdo_shop_single_section',
				'default' => '4',
				'choices' => array(
					'6' => esc_attr__( '6 Columns', 'partdo-core' ),
					'5' => esc_attr__( '5 Columns', 'partdo-core' ),
					'4' => esc_attr__( '4 Columns', 'partdo-core' ),
					'3' => esc_attr__( '3 Columns', 'partdo-core' ),
					'2' => esc_attr__( '2 Columns', 'partdo-core' ),
				),
			)
		);
		
		/*====== Re-Order Product Detail ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'sortable',
				'settings' => 'partdo_shop_single_reorder',
				'label' => esc_attr__( 'Re-order Product Summary', 'partdo-core' ),
				'description' => esc_attr__( 'Please save the changes and refresh the page once. Live preview is not available for the option.', 'partdo-core' ),
				'section' => 'partdo_shop_single_section',
				'default'     => [
					'woocommerce_template_single_title',
					'woocommerce_template_single_rating',
					'woocommerce_template_single_price',
					'woocommerce_template_single_excerpt',
					'woocommerce_template_single_add_to_cart',
					'partdo_wishlist_shortcode_output',
					'partdo_single_product_assistant',
					'partdo_single_product_iconboxes',
					'woocommerce_template_single_meta',
					'partdo_social_share',
					'partdo_people_added_in_cart',
					'partdo_single_shipping_class',
					
				],
				'choices'     => [
					'woocommerce_template_single_title' => esc_html__( 'Title', 'partdo-core' ),
					'woocommerce_template_single_rating' => esc_html__( 'Rating', 'partdo-core' ),
					'woocommerce_template_single_price' => esc_html__( 'Price', 'partdo-core' ),
					'woocommerce_template_single_excerpt' => esc_html__( 'Excerpt', 'partdo-core' ),
					'woocommerce_template_single_add_to_cart' => esc_html__( 'Add to Cart', 'partdo-core' ),
					'partdo_wishlist_shortcode_output' => esc_html__( 'Wishlist', 'partdo-core' ),
					'partdo_single_product_assistant' => esc_html__( 'Product Assistant', 'partdo-core' ),
					'partdo_single_product_iconboxes' => esc_html__( 'Product Iconboxes', 'partdo-core' ),
					'woocommerce_template_single_meta' => esc_html__( 'Meta', 'partdo-core' ),
					'partdo_social_share' => esc_html__( 'Share', 'partdo-core' ),
					'partdo_product_stock_progress_bar' => esc_html__( 'Progress Bar', 'partdo-core' ),
					'partdo_product_time_countdown' => esc_html__( 'Time Countdown', 'partdo-core' ),
					'partdo_people_added_in_cart' 				=> esc_html__( 'People Have this in their carts', 	'partdo-core' ),
					'partdo_single_shipping_class' 				=> esc_html__( 'Shipping Class Name', 	'partdo-core' ),
				],
			)
		);
		
		/*====== Shop Single Product Assistant ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_single_assistant',
				'label' => esc_attr__( 'Product Assistant', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable product assistant buttons.', 'partdo-core' ),
				'section' => 'partdo_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Shop Single Product Assistant Image ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'partdo_single_assistant_image',
				'label' => esc_attr__( 'Product Assistant Image', 'partdo-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'partdo-core' ),
				'section' => 'partdo_shop_single_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'required' => array(
					array(
					  'setting'  => 'partdo_single_assistant',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
				
			)
		);
		
		/*====== Shop Single Product Assistant Title ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_single_assistant_title',
				'label' => esc_attr__( 'Product Assistant Title', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a title.', 'partdo-core' ),
				'section' => 'partdo_shop_single_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'partdo_single_assistant',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Product Single Assistant Subtitle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'partdo_single_assistant_subtitle',
				'label' => esc_attr__( 'Product Assistant Subtitle', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a subtitle.', 'partdo-core' ),
				'section' => 'partdo_shop_single_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'partdo_single_assistant',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Shop Single Iconboxes ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_single_iconboxes',
				'label' => esc_attr__( 'Iconboxes', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable the featured list.', 'partdo-core' ),
				'section' => 'partdo_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Shop Single Iconboxes List ======*/
		new \Kirki\Field\Repeater(
			array(
				'settings' => 'partdo_single_iconboxes_list',
				'label' => esc_attr__( 'Iconboxes List', 'partdo-core' ),
				'description' => esc_attr__( 'You can create the iconboxes list.', 'partdo-core' ),
				'section' => 'partdo_shop_single_section',
				'row_label' => array (
					'type' => 'field',
					'field' => 'link_text',
				),
				'required' => array(
					array(
					  'setting'  => 'partdo_single_iconboxes',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
				'fields' => array(
					'iconboxes_icon' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Icon', 'partdo-core' ),
						'description' => esc_attr__( 'Icon example; klbth-icon-ecommerce-dollar-symbol.', 'partdo-core' ),
					),
					'iconboxes_title' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Title', 'partdo-core' ),
						'description' => esc_attr__( 'You can enter a title.', 'partdo-core' ),
					),
					'iconboxes_subtitle' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Subtitle', 'partdo-core' ),
						'description' => esc_attr__( 'You can enter a subtitle.', 'partdo-core' ),
					),
				),
			)
		);
		
		/*====== Shop Banner Image======*/
		partdo_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'partdo_shop_banner_image',
				'label' => esc_attr__( 'Image', 'partdo-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'partdo-core' ),
				'section' => 'partdo_shop_banner_section',
				'choices' => array(
					'save_as' => 'id',
				),
			)
		);
		
		/*====== Shop Banner Title ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'partdo_shop_banner_title',
				'label' => esc_attr__( 'Set Title', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a title.', 'partdo-core' ),
				'section' => 'partdo_shop_banner_section',
				'default' => '',
			)
		);
		
		/*====== Shop Banner Subtitle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_shop_banner_subtitle',
				'label' => esc_attr__( 'Set Subtitle', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a subtitle.', 'partdo-core' ),
				'section' => 'partdo_shop_banner_section',
				'default' => '',
			)
		);
		
		/*====== Shop Banner Description ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'partdo_shop_banner_desc',
				'label' => esc_attr__( 'Set Description', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a description.', 'partdo-core' ),
				'section' => 'partdo_shop_banner_section',
				'default' => '',
			)
		);
		
		/*====== Shop Banner Button Text======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_shop_banner_button_text',
				'label' => esc_attr__( 'Set Button Text', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a button text.', 'partdo-core' ),
				'section' => 'partdo_shop_banner_section',
				'default' => '',
			)
		);

		/*====== Shop Banner URL ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_shop_banner_button_url',
				'label' => esc_attr__( 'Set URL', 'partdo-core' ),
				'description' => esc_attr__( 'Set an url for the button', 'partdo-core' ),
				'section' => 'partdo_shop_banner_section',
				'default' => '#',
			)
		);

		/*====== Banner Repeater For each category ======*/
		add_action( 'init', function() {
			new \Kirki\Field\Repeater(
				array(
					'settings' => 'partdo_shop_banner_each_category',
					'label' => esc_attr__( 'Banner For Categories', 'partdo-core' ),
					'description' => esc_attr__( 'You can set banner for each category.', 'partdo-core' ),
					'section' => 'partdo_shop_banner_section',
					'fields' => array(
						
						'category_id' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Select Category', 'partdo-core' ),
							'description' => esc_html__( 'Set a category', 'partdo-core' ),
							'priority'    => 10,
							'choices'     => Kirki_Helper::get_terms( array('taxonomy' => 'product_cat') )
						),
						
						'category_image' =>  array(
							'type' => 'image',
							'label' => esc_attr__( 'Image', 'partdo-core' ),
							'description' => esc_attr__( 'You can upload an image.', 'partdo-core' ),
						),
						
						'category_title' => array(
							'type' => 'text',
							'label' => esc_attr__( 'Set Title', 'partdo-core' ),
							'description' => esc_attr__( 'You can set a title.', 'partdo-core' ),
						),
						
						'category_subtitle' => array(
							'type' => 'text',
							'label' => esc_attr__( 'Set Subtitle', 'partdo-core' ),
							'description' => esc_attr__( 'You can set a subtitle.', 'partdo-core' ),
						),
						
						'category_desc' => array(
							'type' => 'text',
							'label' => esc_attr__( 'Set Description', 'partdo-core' ),
							'description' => esc_attr__( 'You can set a description.', 'partdo-core' ),
						),
						
						'category_button_text' => array(
							'type' => 'text',
							'label' => esc_attr__( 'Set Button Text', 'partdo-core' ),
							'description' => esc_attr__( 'You can set a button text.', 'partdo-core' ),
						),
						
						'category_button_url' => array(
							'type' => 'text',
							'label' => esc_attr__( 'Set URL', 'partdo-core' ),
							'description' => esc_attr__( 'Set an url for the button', 'partdo-core' ),
						),
					),
				)
			);
		} );
		
		/*====== Shop Banner Title Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_shop_banner_title_color',
				'label' => esc_attr__( 'Title Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_shop_banner_section',
			)
		);
		
		/*====== Shop Banner Subtitle Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#EF233C',
				'settings' => 'partdo_shop_banner_subtitle_bg_color',
				'label' => esc_attr__( 'Subtitle Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'partdo-core' ),
				'section' => 'partdo_shop_banner_section',
			)
		);
		
		/*====== Shop Banner Subtitle Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_shop_banner_subtitle_color',
				'label' => esc_attr__( 'Subtitle Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_shop_banner_section',
			)
		);
		
		/*====== Shop Banner Description Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_shop_banner_description_color',
				'label' => esc_attr__( 'Description Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_shop_banner_section',
			)
		);
		
		/*====== Shop Banner Button Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_shop_banner_button_color',
				'label' => esc_attr__( 'Button Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_shop_banner_section',
			)
		);
		
		/*====== My Account Layouts ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'partdo_my_account_layout',
				'label' => esc_attr__( 'Layout', 'partdo-core' ),
				'description' => esc_attr__( 'You can choose a layout for the login form.', 'partdo-core' ),
				'section' => 'partdo_my_account_section',
				'default' => 'default',
				'choices' => array(
					'default' => esc_attr__( 'Default', 'partdo-core' ),
					'logintab' => esc_attr__( 'Login Tab', 'partdo-core' ),
				),
			)
		);

		/*====== Registration Form First Name ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'partdo_registration_first_name',
				'label' => esc_attr__( 'Register - First Name', 'partdo-core' ),
				'section' => 'partdo_my_account_section',
				'default' => 'hidden',
				'choices' => array(
					'hidden' => esc_attr__( 'Hidden', 'partdo-core' ),
					'visible' => esc_attr__( 'Visible', 'partdo-core' ),
				),
			)
		);
		
		/*====== Registration Form Last Name ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'partdo_registration_last_name',
				'label' => esc_attr__( 'Register - Last Name', 'partdo-core' ),
				'section' => 'partdo_my_account_section',
				'default' => 'hidden',
				'choices' => array(
					'hidden' => esc_attr__( 'Hidden', 'partdo-core' ),
					'visible' => esc_attr__( 'Visible', 'partdo-core' ),
				),
			)
		);
		
		/*====== Registration Form Billing Company ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'partdo_registration_billing_company',
				'label' => esc_attr__( 'Register - Billing Company', 'partdo-core' ),
				'section' => 'partdo_my_account_section',
				'default' => 'hidden',
				'choices' => array(
					'hidden' => esc_attr__( 'Hidden', 'partdo-core' ),
					'visible' => esc_attr__( 'Visible', 'partdo-core' ),
				),
			)
		);
		
		/*====== Registration Form Billing Phone ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'partdo_registration_billing_phone',
				'label' => esc_attr__( 'Register - Billing Phone', 'partdo-core' ),
				'section' => 'partdo_my_account_section',
				'default' => 'hidden',
				'choices' => array(
					'hidden' => esc_attr__( 'Hidden', 'partdo-core' ),
					'visible' => esc_attr__( 'Visible', 'partdo-core' ),
				),
			)
		);
		
		/*====== Ajax Login-Register ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_ajax_login_form',
				'label' => esc_attr__( 'Activate Ajax for Login Form', 'partdo-core' ),
				'section' => 'partdo_my_account_section',
				'default' => '0',
			)
		);

		/*====== Redirect URL After Login ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'url',
				'settings' => 'partdo_redirect_url_after_login',
				'label' => esc_attr__( 'Redirect URL After Login', 'partdo-core' ),
				'section' => 'partdo_my_account_section',
				'default' => '',
			)
		);
		
	/*====== Free Shipping Settings =======================================================*/
	
		/*====== Free Shipping ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_free_shipping',
				'label' => esc_attr__( 'Free shipping bar', 'partdo-core' ),
				'section' => 'partdo_free_shipping_bar_section',
				'default' => '0',
			)
		);
		
		/*====== Free Shipping Goal Amount ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'shipping_progress_bar_amount',
				'label' => esc_attr__( 'Goal Amount', 'partdo-core' ),
				'description' => esc_attr__( 'Amount to reach 100% defined in your currency absolute value. For example: 300', 'partdo-core' ),
				'section' => 'partdo_free_shipping_bar_section',
				'default' => '100',
				'required' => array(
					array(
					  'setting'  => 'partdo_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Free Shipping Location Cart Page ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shipping_progress_bar_location_card_page',
				'label' => esc_attr__( 'Cart page', 'partdo-core' ),
				'section' => 'partdo_free_shipping_bar_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'partdo_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Free Shipping Location Mini cart ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shipping_progress_bar_location_mini_cart',
				'label' => esc_attr__( 'Mini cart', 'partdo-core' ),
				'section' => 'partdo_free_shipping_bar_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'partdo_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Free Shipping Location Checkout page ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shipping_progress_bar_location_checkout',
				'label' => esc_attr__( 'Checkout page', 'partdo-core' ),
				'section' => 'partdo_free_shipping_bar_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'partdo_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Free Shipping Message Initial ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'shipping_progress_bar_message_initial',
				'label' => esc_attr__( 'Initial Message', 'partdo-core' ),
				'description' => esc_attr__( 'Message to show before reaching the goal. Use shortcode [remainder] to display the amount left to reach the minimum.', 'partdo-core' ),
				'section' => 'partdo_free_shipping_bar_section',
				'default' => 'Add [remainder] to cart and get free shipping!',
				'required' => array(
					array(
					  'setting'  => 'partdo_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Free Shipping Message Success ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'shipping_progress_bar_message_success',
				'label' => esc_attr__( 'Success message', 'partdo-core' ),
				'description' => esc_attr__( 'Message to show after reaching 100%.', 'partdo-core' ),
				'section' => 'partdo_free_shipping_bar_section',
				'default' => 'Your order qualifies for free shipping!',
				'required' => array(
					array(
					  'setting'  => 'partdo_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
	/*====== Shop Single Style Settings =======================================================*/
		
		/*====== Shop Single Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_shop_single_bg_color',
				'label' => esc_attr__( 'Shop Single Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Image Border Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_shop_single_image_border_color',
				'label' => esc_attr__( 'Shop Single Image Border Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);	
		
		/*====== Shop Single Title Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_shop_single_title_color',
				'label' => esc_attr__( 'Shop Single Title Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Stock Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#E6FCF5',
				'settings' => 'partdo_shop_single_stock_bg_color',
				'label' => esc_attr__( 'Shop Single Stock Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Stock Text Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#099268',
				'settings' => 'partdo_shop_single_stock_text_color',
				'label' => esc_attr__( 'Shop Single Stock Text Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Out Of Stock Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#FFF5F5',
				'settings' => 'partdo_shop_single_out_of_stock_bg_color',
				'label' => esc_attr__( 'Shop Single Out Of Stock Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Out Of Stock Text Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#C92A2A',
				'settings' => 'partdo_shop_single_out_of_stock_text_color',
				'label' => esc_attr__( 'Shop Single Out Of Stock Text Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Regular Price Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#868E96',
				'settings' => 'partdo_shop_single_regular_price_color',
				'label' => esc_attr__( 'Shop Single Regular Price Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Sale Price Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#f03e3e',
				'settings' => 'partdo_shop_single_sale_price_color',
				'label' => esc_attr__( 'Shop Single Sale Price Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Description Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#868E96',
				'settings' => 'partdo_shop_single_desc_color',
				'label' => esc_attr__( 'Shop Single Description Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Button Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#12B886',
				'settings' => 'partdo_shop_single_button_bg_color',
				'label' => esc_attr__( 'Shop Single Button Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Button Background Hover Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#099268',
				'settings' => 'partdo_shop_single_button_bg_hvrcolor',
				'label' => esc_attr__( 'Shop Single Button Background Hover Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Button Border Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#12B886',
				'settings' => 'partdo_shop_single_button_border_color',
				'label' => esc_attr__( 'Shop Single Button border Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for border.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Button Border Hover Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#099268',
				'settings' => 'partdo_shop_single_button_border_hvrcolor',
				'label' => esc_attr__( 'Shop Single Button border Hover Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for border.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Button Text Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_shop_single_button_text_color',
				'label' => esc_attr__( 'Shop Single Button Text Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Button Text Hover Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_shop_single_button_text_hvrcolor',
				'label' => esc_attr__( 'Shop Single Button Text Hover Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Wishlist Title Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_shop_single_wishlist_title_color',
				'label' => esc_attr__( 'Shop Single Wishlist Title Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Wishlist Icon Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_shop_single_wishlist_title_icon_bg_color',
				'label' => esc_attr__( 'Shop Single Wishlist Icon Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Wishlist Icon Background Hover Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#FFF5F5',
				'settings' => 'partdo_shop_single_wishlist_title_icon_bg_hvrcolor',
				'label' => esc_attr__( 'Shop Single Wishlist Icon Background Hover Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Wishlist Icon Border Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#DEE2E6',
				'settings' => 'partdo_shop_single_wishlist_title_icon_border_color',
				'label' => esc_attr__( 'Shop Single Wishlist Icon Border Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for border.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Wishlist Icon Border Hover Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#00000000',
				'settings' => 'partdo_shop_single_wishlist_title_icon_border_hvrcolor',
				'label' => esc_attr__( 'Shop Single Wishlist Icon Border Hover Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for border.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Wishlist Icon Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_shop_single_wishlist_title_icon_color',
				'label' => esc_attr__( 'Shop Single Wishlist Icon Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Wishlist Icon Hover Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#f03e3e',
				'settings' => 'partdo_shop_single_wishlist_title_icon_hvrcolor',
				'label' => esc_attr__( 'Shop Single Wishlist Icon Hover Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Meta Title Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#868E96',
				'settings' => 'partdo_shop_single_meta_title_color',
				'label' => esc_attr__( 'Shop Single Meta Title Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Meta Subtitle Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_shop_single_meta_subtitle_color',
				'label' => esc_attr__( 'Shop Single Meta Subtitle Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Module Title Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_shop_single_module_title_color',
				'label' => esc_attr__( 'Shop Single Module Title Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_shop_single_style_section',
			)
		);
	
	/*====== Mini Cart Style Settings =======================================================*/
		
		/*====== View cart Button Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#e9ecef',
				'settings' => 'partdo_mini_cart_view_cart_button_bg_color',
				'label' => esc_attr__( 'View cart Button Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'partdo-core' ),
				'section' => 'partdo_mini_cart_style_section',
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
		/*====== View cart Button Background Hover Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#dee2e6',
				'settings' => 'partdo_mini_cart_view_cart_button_bg_hvrcolor',
				'label' => esc_attr__( 'View cart Button Background Hover Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'partdo-core' ),
				'section' => 'partdo_mini_cart_style_section',
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
		/*====== View cart Button Text Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_mini_cart_view_cart_button_text_color',
				'label' => esc_attr__( 'View cart Button Text Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_mini_cart_style_section',
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
		/*====== View cart Button Text Hover Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_mini_cart_view_cart_button_text_hvrcolor',
				'label' => esc_attr__( 'View cart Button Text Hover Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_mini_cart_style_section',
				'choices'     => [
					'alpha' => true,
				],
			)
		);	
		
		/*====== Checkout Button Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ef233c',
				'settings' => 'partdo_mini_cart_checkout_button_bg_color',
				'label' => esc_attr__( 'Checkout Button Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'partdo-core' ),
				'section' => 'partdo_mini_cart_style_section',
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
		/*====== Checkout Button Background Hover Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#d81d33',
				'settings' => 'partdo_mini_cart_checkout_button_bg_hvrcolor',
				'label' => esc_attr__( 'Checkout Button Background Hover Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'partdo-core' ),
				'section' => 'partdo_mini_cart_style_section',
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
		/*====== Checkout Button Border Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ef233c',
				'settings' => 'partdo_mini_cart_checkout_button_border_color',
				'label' => esc_attr__( 'Checkout Button Border Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for border.', 'partdo-core' ),
				'section' => 'partdo_mini_cart_style_section',
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
		/*====== Checkout Button Border Hover Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#d81d33',
				'settings' => 'partdo_mini_cart_checkout_button_border_hvrcolor',
				'label' => esc_attr__( 'Checkout Button Border Hover Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for border.', 'partdo-core' ),
				'section' => 'partdo_mini_cart_style_section',
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
		/*====== Checkout Button Text Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_mini_cart_checkout_button_text_color',
				'label' => esc_attr__( 'Checkout Button Text Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_mini_cart_style_section',
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
		/*====== Checkout Button Text Hover Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_mini_cart_checkout_button_text_hvrcolor',
				'label' => esc_attr__( 'Checkout Button Text Hover Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_mini_cart_style_section',
				'choices'     => [
					'alpha' => true,
				],
			)
		);

	/*====== Blog Settings =======================================================*/
		/*====== Layouts ======*/
		
		partdo_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'partdo_blog_layout',
				'label' => esc_attr__( 'Layout', 'partdo-core' ),
				'description' => esc_attr__( 'You can choose a layout.', 'partdo-core' ),
				'section' => 'partdo_blog_settings_section',
				'default' => 'right-sidebar',
				'choices' => array(
					'left-sidebar' => esc_attr__( 'Left Sidebar', 'partdo-core' ),
					'full-width' => esc_attr__( 'Full Width', 'partdo-core' ),
					'right-sidebar' => esc_attr__( 'Right Sidebar', 'partdo-core' ),
					'grid' => esc_attr__( 'Grid', 'partdo-core' ),
				),
			)
		);
		
		/*====== Blog Column ======*/
		partdo_customizer_add_field(
			array (
				'type'        => 'radio-buttonset',
				'settings'    => 'partdo_blog_grid_layout_column',
				'label'       => esc_html__( 'Blog Column', 'partdo-core' ),
				'section'     => 'partdo_blog_settings_section',
				'default'     => '2',
				'choices'     => array(
					'4' => esc_attr__( '4', 'partdo-core' ),
					'3' => esc_attr__( '3', 'partdo-core' ),
					'2' => esc_attr__( '2', 'partdo-core' ),
				),
				'required' => array(
					array(
					  'setting'  => 'partdo_blog_layout',
					  'operator' => '==',
					  'value'    => 'grid',
					),
				),
			) 
		);
		
		/*====== Main color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#EF233C',
				'settings' => 'partdo_main_color',
				'label' => esc_attr__( 'Main Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can customize the main color.', 'partdo-core' ),
				'section' => 'partdo_main_color_section',
			)
		);
		
		/*====== Main Dark color======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#D81D33',
				'settings' => 'partdo_main_dark_color',
				'label' => esc_attr__( 'Main Dark Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can customize the color dark.', 'partdo-core' ),
				'section' => 'partdo_main_color_section',
			)
		);

		/*====== Color Danger ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#F03E3E',
				'settings' => 'partdo_color_danger',
				'label' => esc_attr__( 'Color Danger', 'partdo-core' ),
				'description' => esc_attr__( 'You can customize the color danger.', 'partdo-core' ),
				'section' => 'partdo_main_color_section',
			)
		);
		
		/*====== Color Danger Dark======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#F03E3E',
				'settings' => 'partdo_color_danger_dark',
				'label' => esc_attr__( 'Color Danger Dark', 'partdo-core' ),
				'description' => esc_attr__( 'You can customize the color danger dark.', 'partdo-core' ),
				'section' => 'partdo_main_color_section',
			)
		);
		
		/*====== Color Danger Light======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#FFF5F5',
				'settings' => 'partdo_color_danger_light',
				'label' => esc_attr__( 'Color Danger Light', 'partdo-core' ),
				'description' => esc_attr__( 'You can customize the color danger light.', 'partdo-core' ),
				'section' => 'partdo_main_color_section',
			)
		);
		
		/*====== Color Success======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#12B886',
				'settings' => 'partdo_color_success',
				'label' => esc_attr__( 'Color Success', 'partdo-core' ),
				'description' => esc_attr__( 'You can customize the color success.', 'partdo-core' ),
				'section' => 'partdo_main_color_section',
			)
		);
		
		/*====== Color Success Dark======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#099268',
				'settings' => 'partdo_color_success_dark',
				'label' => esc_attr__( 'Color Success Dark', 'partdo-core' ),
				'description' => esc_attr__( 'You can customize the color success dark.', 'partdo-core' ),
				'section' => 'partdo_main_color_section',
			)
		);
		
		/*====== Color Success Lighter======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#E6FCF5',
				'settings' => 'partdo_color_success_light',
				'label' => esc_attr__( 'Color Success Light', 'partdo-core' ),
				'description' => esc_attr__( 'You can customize the color success light.', 'partdo-core' ),
				'section' => 'partdo_main_color_section',
			)
		);
		
		/*====== Color Warning======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#FD7E14',
				'settings' => 'partdo_color_warning',
				'label' => esc_attr__( 'Color Warning', 'partdo-core' ),
				'description' => esc_attr__( 'You can customize the color warning.', 'partdo-core' ),
				'section' => 'partdo_main_color_section',
			)
		);

	/*====== Elementor Templates =======================================================*/
		/*====== Before Shop Elementor Templates ======*/
		partdo_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'partdo_before_main_shop_elementor_template',
				'label'       => esc_html__( 'Before Shop Elementor Template', 'partdo' ),
				'section'     => 'partdo_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates ', 'partdo' ),
				'choices'     => partdo_get_elementorTemplates('section'),
				
			)
		);
		
		/*====== After Shop Elementor Templates ======*/
		partdo_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'partdo_after_main_shop_elementor_template',
				'label'       => esc_html__( 'After Shop Elementor Template', 'partdo' ),
				'section'     => 'partdo_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates ', 'partdo' ),
				'choices'     => partdo_get_elementorTemplates('section'),
				
			)
		);
		
		/*====== Before Header Elementor Templates ======*/
		partdo_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'partdo_before_main_header_elementor_template',
				'label'       => esc_html__( 'Before Header Elementor Template', 'partdo' ),
				'section'     => 'partdo_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'partdo' ),
				'choices'     => partdo_get_elementorTemplates('section'),
				
			)
		);
	
		/*====== After Header Elementor Templates ======*/
		partdo_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'partdo_after_main_header_elementor_template',
				'label'       => esc_html__( 'After Header Elementor Template', 'partdo' ),
				'section'     => 'partdo_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates ', 'partdo' ),
				'choices'     => partdo_get_elementorTemplates('section'),
				
			)
		);
		
		/*====== Before Footer Elementor Template ======*/
		partdo_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'partdo_before_main_footer_elementor_template',
				'label'       => esc_html__( 'Before Footer Elementor Template', 'partdo' ),
				'section'     => 'partdo_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'partdo' ),
				'choices'     => partdo_get_elementorTemplates('section'),
				
			)
		);
		
		/*====== After Footer Elementor  Template ======*/
		partdo_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'partdo_after_main_footer_elementor_template',
				'label'       => esc_html__( 'After Footer Elementor Templates', 'partdo' ),
				'section'     => 'partdo_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'partdo' ),
				'choices'     => partdo_get_elementorTemplates('section'),
				
			)
		);

		/*====== Templates Repeater For each category ======*/
		add_action( 'init', function() {
			new \Kirki\Field\Repeater(
				array(
					'settings' => 'partdo_elementor_template_each_shop_category',
					'label' => esc_attr__( 'Template For Categories', 'partdo-core' ),
					'description' => esc_attr__( 'You can set template for each category.', 'partdo-core' ),
					'section' => 'partdo_elementor_templates_section',
					'fields' => array(
						
						'category_id' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Select Category', 'partdo-core' ),
							'description' => esc_html__( 'Set a category', 'partdo-core' ),
							'priority'    => 10,
							'default'     => '',
							'choices'     => Kirki_Helper::get_terms( array('taxonomy' => 'product_cat') )
						),
						
						'partdo_before_main_shop_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Before Shop Elementor Template', 'partdo-core' ),
							'choices'     => partdo_get_elementorTemplates('section'),
							'default'     => '',
							'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'partdo-core' ),
						),
						
						'partdo_after_main_shop_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'After Shop Elementor Template', 'partdo-core' ),
							'choices'     => partdo_get_elementorTemplates('section'),
						),
						
						'partdo_before_main_header_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Before Header Elementor Template', 'partdo-core' ),
							'choices'     => partdo_get_elementorTemplates('section'),
						),
						
						'partdo_after_main_header_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'After Header Elementor Template', 'partdo-core' ),
							'choices'     => partdo_get_elementorTemplates('section'),
						),
						
						'partdo_before_main_footer_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Before Footer Elementor Template', 'partdo-core' ),
							'choices'     => partdo_get_elementorTemplates('section'),
						),
						
						'partdo_after_main_footer_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'After Footer Elementor Template', 'partdo-core' ),
							'choices'     => partdo_get_elementorTemplates('section'),
						),
						

					),
				)
			);
		} );


		/*====== Map Settings ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_mapapi',
				'label' => esc_attr__( 'Google Map Api key', 'partdo-core' ),
				'description' => esc_attr__( 'Add your google map api key', 'partdo-core' ),
				'section' => 'partdo_map_settings_section',
				'default' => '',
			)
		);
		
	/*====== Partdo Widgets ======*/
		/*====== Widgets Panels ======*/
		Kirki::add_panel (
			'partdo_widgets_panel',
			array(
				'title' => esc_html__( 'Partdo Widgets', 'partdo-core' ),
				'description' => esc_html__( 'You can customize the partdo widgets.', 'partdo-core' ),
			)
		);

		$sections = array (
			
			'social_media' => array(
				esc_attr__( 'Social Media', 'partdo-core' ),
				esc_attr__( 'You can customize the social media widget.', 'partdo-core' )
			),
			
			'widget_banner' => array(
				esc_attr__( 'Banner', 'partdo-core' ),
				esc_attr__( 'You can customize the social media widget.', 'partdo-core' )
			),
		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'partdo_widgets_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'partdo_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}

		/*====== Social Media Widget ======*/
		new \Kirki\Field\Repeater(
			array(
				'settings' => 'partdo_social_media_widget',
				'label' => esc_attr__( 'Social Media Widget', 'partdo-core' ),
				'description' => esc_attr__( 'You can set social icons.', 'partdo-core' ),
				'section' => 'partdo_social_media_section',
				'fields' => array(
					'social_icon' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Icon', 'partdo-core' ),
						'description' => esc_attr__( 'You can set an icon. for example; "facebook"', 'partdo-core' ),
					),

					'social_url' => array(
						'type' => 'text',
						'label' => esc_attr__( 'URL', 'partdo-core' ),
						'description' => esc_attr__( 'You can set url for the item.', 'partdo-core' ),
					),

				),
			)
		);
		
	/*====== Widget Banner ======*/
	
		/*====== Widget Banner Image======*/
		partdo_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'partdo_widget_banner_image',
				'label' => esc_attr__( 'Image', 'partdo-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'partdo-core' ),
				'section' => 'partdo_widget_banner_section',
				'choices' => array(
					'save_as' => 'id',
				),
			)
		);
		
		/*====== Widget Banner Title ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'partdo_widget_banner_title',
				'label' => esc_attr__( 'Title', 'partdo-core' ),
				'description' => esc_attr__( 'You can set text for widget banner section.', 'partdo-core' ),
				'section' => 'partdo_widget_banner_section',
				'default' => '',
			)
		);
		
		/*====== Widget Banner Subtitle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_widget_banner_subtitle',
				'label' => esc_attr__( 'Subtitle', 'partdo-core' ),
				'description' => esc_attr__( 'You can set text for widget banner section.', 'partdo-core' ),
				'section' => 'partdo_widget_banner_section',
				'default' => '',
			)
		);
		
		/*====== Widget Banner Button URL ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_widget_banner_buttonurl',
				'label' => esc_attr__( 'Button URL', 'partdo-core' ),
				'description' => esc_attr__( 'Set an url for the button', 'partdo-core' ),
				'section' => 'partdo_widget_banner_section',
				'default' => '#',
			)
		);
		
		/*====== Widget Banner Button ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_widget_banner_buttontext',
				'label' => esc_attr__( 'Button Text', 'partdo-core' ),
				'description' => esc_attr__( 'You can set text for widget banner section.', 'partdo-core' ),
				'section' => 'partdo_widget_banner_section',
				'default' => '',
			)
		);
		
		/*====== Widget Banner Title Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_widget_banner_title_color',
				'label' => esc_attr__( 'Title Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_widget_banner_section',
			)
		);
		
		/*====== Widget Banner Subtitle Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#EF233C',
				'settings' => 'partdo_widget_banner_subtitle_bg_color',
				'label' => esc_attr__( 'Subtitle Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'partdo-core' ),
				'section' => 'partdo_widget_banner_section',
			)
		);
		
		/*====== Widget Banner Subtitle Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_widget_banner_subtitle_color',
				'label' => esc_attr__( 'Subtitle Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_widget_banner_section',
			)
		);
		
		/*====== Widget Banner Button Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_widget_banner_button_color',
				'label' => esc_attr__( 'Button Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_widget_banner_section',
			)
		);
		
	/*====== Footer ======*/
		/*====== Footer Panels ======*/
		Kirki::add_panel (
			'partdo_footer_panel',
			array(
				'title' => esc_html__( 'Footer Settings', 'partdo-core' ),
				'description' => esc_html__( 'You can customize the footer from this panel.', 'partdo-core' ),
			)
		);

		$sections = array (
			'footer_subscribe' => array(
				esc_attr__( 'Subscribe', 'partdo-core' ),
				esc_attr__( 'You can customize the subscribe area.', 'partdo-core' )
			),
			
			'footer_extra' => array(
				esc_attr__( 'Footer Extra', 'partdo' ),
				esc_attr__( 'You can customize the footer extra section.', 'partdo' )
			),
			
			'footer_general' => array(
				esc_attr__( 'Footer General', 'partdo-core' ),
				esc_attr__( 'You can customize the footer settings.', 'partdo-core' )
			),
			
			'footer1_style' => array(
				esc_attr__( 'Footer 1 Style', 'partdo' ),
				esc_attr__( 'You can customize the footer settings.', 'partdo-core' )
			),
			
			'footer2_style' => array(
				esc_attr__( 'Footer 2 Style', 'partdo' ),
				esc_attr__( 'You can customize the footer settings.', 'partdo-core' )
			),
			
		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'partdo_footer_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'partdo_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}

		
		/*====== Subcribe Toggle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_footer_subscribe_area',
				'label' => esc_attr__( 'Subcribe', 'partdo-core' ),
				'description' => esc_attr__( 'Disable or Enable subscribe section.', 'partdo-core' ),
				'section' => 'partdo_footer_subscribe_section',
				'default' => '0',
			)
		);
		
		/*====== Subcribe FORM ID======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_footer_subscribe_formid',
				'label' => esc_attr__( 'Subscribe Form Id.', 'partdo-core' ),
				'description' => esc_attr__( 'You can find the form id in Dashboard > Mailchimp For Wp > Form.', 'partdo-core' ),
				'section' => 'partdo_footer_subscribe_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'partdo_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subscribe Icon ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_footer_subscribe_icon',
				'label' => esc_attr__( 'Subscribe Icon', 'partdo-core' ),
				'description' => esc_attr__( 'You can upload an icon. for example: klbth-icon-message-sending', 'partdo-core' ),
				'section' => 'partdo_footer_subscribe_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'partdo_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subscribe Title ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'partdo_footer_subscribe_title',
				'label' => esc_attr__( 'Title', 'partdo-core' ),
				'description' => esc_attr__( 'You can set text for subscribe section.', 'partdo-core' ),
				'section' => 'partdo_footer_subscribe_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'partdo_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subscribe Subtitle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'partdo_footer_subscribe_subtitle',
				'label' => esc_attr__( 'Subtitle', 'partdo-core' ),
				'description' => esc_attr__( 'You can set text for subscribe section.', 'partdo-core' ),
				'section' => 'partdo_footer_subscribe_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'partdo_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subscribe Desc ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'partdo_footer_subscribe_desc',
				'label' => esc_attr__( 'Description', 'partdo-core' ),
				'description' => esc_attr__( 'You can set text for subscribe section.', 'partdo-core' ),
				'section' => 'partdo_footer_subscribe_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'partdo_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subscribe Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_subscribe_bg_color',
				'label' => esc_attr__( 'Subscribe Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'partdo-core' ),
				'section' => 'partdo_footer_subscribe_section',
				'required' => array(
					array(
					  'setting'  => 'partdo_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subscribe Border Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => 'rgba(0, 0, 0, 0.1)',
				'settings' => 'partdo_subscribe_border_color',
				'label' => esc_attr__( 'Subscribe Border Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for border.', 'partdo-core' ),
				'section' => 'partdo_footer_subscribe_section',
			)
		);
		
		/*====== Subscribe Icon Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#B8BDC1',
				'settings' => 'partdo_subscribe_icon_color',
				'label' => esc_attr__( 'Subscribe Icon Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_footer_subscribe_section',
				'required' => array(
					array(
					  'setting'  => 'partdo_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subscribe Title Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_subscribe_title_color',
				'label' => esc_attr__( 'Subscribe Title Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_footer_subscribe_section',
				'required' => array(
					array(
					  'setting'  => 'partdo_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subscribe Subtitle Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#EF233C',
				'settings' => 'partdo_subscribe_subtitle_color',
				'label' => esc_attr__( 'Subscribe Subtitle Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_footer_subscribe_section',
				'required' => array(
					array(
					  'setting'  => 'partdo_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subscribe Description Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#868E96',
				'settings' => 'partdo_subscribe_desc_color',
				'label' => esc_attr__( 'Subscribe Description Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_footer_subscribe_section',
				'required' => array(
					array(
					  'setting'  => 'partdo_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Footer Extra ======*/
		new \Kirki\Field\Repeater(
			array(
				'settings' => 'partdo_footer_extra_box',
				'label' => esc_attr__( 'Footer Extra', 'partdo-core' ),
				'description' => esc_attr__( 'You can create footer extra.', 'partdo-core' ),
				'section' => 'partdo_footer_extra_section',
				'fields' => array(
					'extra_box_content' => array(
						'type' => 'textarea',
						'label' => esc_attr__( 'Extra Box Content', 'partdo-core' ),
						'description' => esc_attr__( 'You can enter a text.', 'partdo-core' ),
					),
				),
			)
		);
		
		/*====== Footer Type ======*/
		partdo_customizer_add_field(
			array (
			'type'        => 'select',
			'settings'    => 'partdo_footer_type',
			'label'       => esc_html__( 'Footer Type', 'partdo-core' ),
			'section'     => 'partdo_footer_general_section',
			'default'     => 'type2',
			'priority'    => 10,
			'choices'     => array(
				'type1' => esc_attr__( 'Type 1', 'partdo-core' ),
				'type2' => esc_attr__( 'Type 2', 'partdo-core' ),
			),
			) 
		);
		
		/*====== Copyright ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_copyright',
				'label' => esc_attr__( 'Copyright', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a copyright text for the footer.', 'partdo-core' ),
				'section' => 'partdo_footer_general_section',
				'default' => '',
			)
		);
		
		/*====== Subscribe Image ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'partdo_footer_payment_image',
				'label' => esc_attr__( 'Image', 'partdo-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'partdo-core' ),
				'section' => 'partdo_footer_general_section',
				'choices' => array(
					'save_as' => 'id',
				),
			)
		);

		/*====== Payment Image URL ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_footer_payment_image_url',
				'label' => esc_attr__( 'Set Payment URL', 'partdo-core' ),
				'description' => esc_attr__( 'Set an url for the payment image', 'partdo-core' ),
				'section' => 'partdo_footer_general_section',
				'default' => '#',
			)
		);

		/*====== Footer Column ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'partdo_footer_column',
				'label' => esc_attr__( 'Footer Column', 'partdo-core' ),
				'description' => esc_attr__( 'You can set footer column.', 'partdo-core' ),
				'section' => 'partdo_footer_general_section',
				'default' => '4columns',
				'choices' => array(
					'5columns' => esc_attr__( '5 Columns', 'partdo-core' ),
					'4columns' => esc_attr__( '4 Columns', 'partdo-core' ),
					'3columns' => esc_attr__( '3 Columns', 'partdo-core' ),
				),
			)
		);
		
		/*======Footer Menu Toggle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_footer_menu',
				'label' => esc_attr__( 'Footer Menu', 'partdo-core' ),
				'description' => esc_attr__( 'You can choose status of the footer menu on the footer.', 'partdo-core' ),
				'section' => 'partdo_footer_general_section',
				'default' => '0',
			)
		);
		
		/*====== Back to top  ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_scroll_to_top',
				'label' => esc_attr__( 'Back To Top Button', 'partdo' ),
				'section' => 'partdo_footer_general_section',
				'default' => '0',
			)
		);
		
		/*====== APP Title======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_footer_app_title',
				'label' => esc_attr__( 'APP Title', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a title.', 'partdo-core' ),
				'section' => 'partdo_footer_general_section',
				'default' => '',
			)
		);
		
		/*====== APP Image ======*/
		new \Kirki\Field\Repeater(
			array(
				'settings' => 'partdo_footer_app_image',
				'label' => esc_attr__( 'APP IMAGE', 'partdo-core' ),
				'description' => esc_attr__( 'You can set the app images.', 'partdo-core' ),
				'section' => 'partdo_footer_general_section',
				'fields' => array(
					'app_image' => array(
						'type' => 'image',
						'label' => esc_attr__( 'Image', 'partdo-core' ),
						'description' => esc_attr__( 'You can upload an image.', 'partdo-core' ),
					),
					
					'app_url' => array(
						'type' => 'text',
						'label' => esc_attr__( 'URL', 'partdo-core' ),
						'description' => esc_attr__( 'set an url for the image.', 'partdo-core' ),
					),
				),
			)
		);
		
		/*====== Contact Box Title ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_menu_contact_title',
				'label' => esc_attr__( 'Contact Title', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a title.', 'partdo-core' ),
				'section' => 'partdo_footer_general_section',
				'default' => '',
				'priority' => 14,
			)
		);
		
		/*====== Contact Box ======*/
		new \Kirki\Field\Repeater(
			array(
				'settings' => 'partdo_menu_contact_box',
				'label' => esc_attr__( 'Contact Box', 'partdo-core' ),
				'description' => esc_attr__( 'You can set the contact box.', 'partdo-core' ),
				'section' => 'partdo_footer_general_section',
				'priority' => 15,
				'fields' => array(
					'menu_contact_box_icon' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Icon', 'partdo-core' ),
						'description' => esc_attr__( 'You can set an icon. for example; "klbth-icon-phone-squared"', 'partdo-core' ),
					),
					'menu_contact_box_title' => array(
						'type' => 'textarea',
						'label' => esc_attr__( ' Title', 'partdo-core' ),
						'description' => esc_attr__( 'You can enter a text.', 'partdo-core' ),
					),
					'menu_contact_box_subtitle' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Subtitle', 'partdo-core' ),
						'description' => esc_attr__( 'You can enter a text.', 'partdo-core' ),
					),
				),
			)
		);
		
	/*====== Footer 1 Style =============================*/	
		
		/*====== Footer 1 Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#F6F7F9',
				'settings' => 'partdo_footer1_bg_color',
				'label' => esc_attr__( 'Footer Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'partdo-core' ),
				'section' => 'partdo_footer1_style_section',
			)
		);
		
		/*====== Footer 1 Border Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => 'rgba(0, 0, 0, 0.1)',
				'settings' => 'partdo_footer1_border_color',
				'label' => esc_attr__( 'Footer Border Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for border.', 'partdo-core' ),
				'section' => 'partdo_footer1_style_section',
			)
		);
		
		/*====== Footer 1 Title Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_footer1_title_color',
				'label' => esc_attr__( 'Footer Title Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_footer1_style_section',
			)
		);
		
		/*====== Footer 1 Subtitle Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_footer1_subtitle_color',
				'label' => esc_attr__( 'Footer Subtitle Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_footer1_style_section',
			)
		);
		
		/*====== Footer 1 Extra Title Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_footer1_extra_title_color',
				'label' => esc_attr__( 'Footer Extra Title Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_footer1_style_section',
			)
		);
		
		/*====== Footer 1 Bottom Menu Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_footer1_bottom_menu_color',
				'label' => esc_attr__( 'Footer Menu Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_footer1_style_section',
			)
		);	
		
		/*====== Footer 1 Copyright Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_footer1_copyright_color',
				'label' => esc_attr__( 'Footer Copyright Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_footer1_style_section',
			)
		);
		
	/*====== Footer 2 Style =============================*/	
		
		/*====== Footer 2 Background Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'partdo_footer2_bg_color',
				'label' => esc_attr__( 'Footer Background Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'partdo-core' ),
				'section' => 'partdo_footer2_style_section',
			)
		);
		
		/*====== Footer 2 Border Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => 'rgba(255, 255, 255, 0.15)',
				'settings' => 'partdo_footer2_border_color',
				'label' => esc_attr__( 'Footer Border Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for border.', 'partdo-core' ),
				'section' => 'partdo_footer2_style_section',
			)
		);
		
		/*====== Footer 2 Title Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_footer2_title_color',
				'label' => esc_attr__( 'Footer Title Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_footer2_style_section',
			)
		);
		
		/*====== Footer 2 Subtitle Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_footer2_subtitle_color',
				'label' => esc_attr__( 'Footer Subtitle Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_footer2_style_section',
			)
		);
		
		/*====== Footer 2 Extra Title Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_footer2_extra_title_color',
				'label' => esc_attr__( 'Footer Extra Title Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_footer2_style_section',
			)
		);
		
		/*====== Footer 2 Bottom Menu Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_footer2_bottom_menu_color',
				'label' => esc_attr__( 'Footer Menu Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_footer2_style_section',
			)
		);		
		
		/*====== Footer 2 Copyright Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'partdo_footer2_copyright_color',
				'label' => esc_attr__( 'Footer Copyright Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_footer2_style_section',
			)
		);

		/*====== GDPR Toggle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_gdpr_toggle',
				'label' => esc_attr__( 'Enable GDPR', 'partdo-core' ),
				'description' => esc_attr__( 'You can choose status of GDPR.', 'partdo-core' ),
				'section' => 'partdo_gdpr_settings_section',
				'default' => '0',
			)
		);
		
		/*====== GDPR Type ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'partdo_gdpr_type',
				'label' => esc_attr__( 'GDPR Type', 'partdo-core' ),
				'section' => 'partdo_gdpr_settings_section',
				'default' => 'type1',
				'choices' => array(
					'type1' => esc_attr__( 'Type 1', 'partdo-core' ),
					'type2' => esc_attr__( 'Type 2', 'partdo-core' ),
				),
				'required' => array(
					array(
					  'setting'  => 'partdo_gdpr_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== GDPR Image======*/
		partdo_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'partdo_gdpr_image',
				'label' => esc_attr__( 'Image', 'partdo-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'partdo-core' ),
				'section' => 'partdo_gdpr_settings_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'active_callback' => [
					[
					  'setting'  => 'partdo_gdpr_toggle',
					  'operator' => '==',
					  'value'    => '1',
					],
					[
					  'setting'  => 'partdo_gdpr_type',
					  'operator' => '!=',
					  'value'    => 'type2',
					]
				],
			)
		);
		
		/*====== GDPR Text ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'partdo_gdpr_text',
				'label' => esc_attr__( 'GDPR Text', 'partdo-core' ),
				'section' => 'partdo_gdpr_settings_section',
				'default' => 'In order to provide you a personalized shopping experience, our site uses cookies. <br><a href="#">cookie policy</a>.',
				'required' => array(
					array(
					  'setting'  => 'partdo_gdpr_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== GDPR Expire Date ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_gdpr_expire_date',
				'label' => esc_attr__( 'GDPR Expire Date', 'partdo-core' ),
				'section' => 'partdo_gdpr_settings_section',
				'default' => '15',
				'required' => array(
					array(
					  'setting'  => 'partdo_gdpr_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== GDPR Button Text ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_gdpr_button_text',
				'label' => esc_attr__( 'GDPR Button Text', 'partdo-core' ),
				'section' => 'partdo_gdpr_settings_section',
				'default' => 'Accept Cookies',
				'required' => array(
					array(
					  'setting'  => 'partdo_gdpr_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== Newsletter Toggle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_newsletter_popup_toggle',
				'label' => esc_attr__( 'Enable Newsletter', 'partdo-core' ),
				'description' => esc_attr__( 'You can choose status of Newsletter Popup.', 'partdo-core' ),
				'section' => 'partdo_newsletter_settings_section',
				'default' => '0',
			)
		);
		
		/*====== Newsletter Type ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'partdo_newsletter_type',
				'label' => esc_attr__( 'Newsletter Type', 'partdo-core' ),
				'section' => 'partdo_newsletter_settings_section',
				'default' => 'type1',
				'choices' => array(
					'type1' => esc_attr__( 'Type 1', 'partdo-core' ),
					'type2' => esc_attr__( 'Type 2', 'partdo-core' ),
					'type3' => esc_attr__( 'Type 3', 'partdo-core' ),
				),
				'required' => array(
					array(
					  'setting'  => 'partdo_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Newsletter Image ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'partdo_newsletter_image',
				'label' => esc_attr__( 'Image', 'partdo-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'partdo-core' ),
				'section' => 'partdo_newsletter_settings_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'input_attrs' => array( 'class' => 'my_custom_class' ),

				'active_callback' => [
					[
					  'setting'  => 'partdo_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					],
					[
					  'setting'  => 'partdo_newsletter_type',
					  'operator' => '!=',
					  'value'    => 'type1',
					]
				],

			)
		);
		
		
		/*====== Newsletter Title ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_newsletter_popup_title',
				'label' => esc_attr__( 'Newsletter Title', 'partdo-core' ),
				'section' => 'partdo_newsletter_settings_section',
				'default' => 'Subscribe To Newsletter',
				'required' => array(
					array(
					  'setting'  => 'partdo_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Newsletter Subtitle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'partdo_newsletter_popup_subtitle',
				'label' => esc_attr__( 'Newsletter Subtitle', 'partdo-core' ),
				'section' => 'partdo_newsletter_settings_section',
				'default' => 'Subscribe to the Partdo mailing list to receive updates on new arrivals, special offers and our promotions.',
				'required' => array(
					array(
					  'setting'  => 'partdo_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subcribe Popup FORM ID======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_newsletter_popup_formid',
				'label' => esc_attr__( 'Newsletter Form Id.', 'partdo-core' ),
				'description' => esc_attr__( 'You can find the form id in Dashboard > Mailchimp For Wp > Form.', 'partdo-core' ),
				'section' => 'partdo_newsletter_settings_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'partdo_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subcribe Popup Expire Date ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_newsletter_popup_expire_date',
				'label' => esc_attr__( 'Newsletter Expire Date', 'partdo-core' ),
				'section' => 'partdo_newsletter_settings_section',
				'default' => '15',
				'required' => array(
					array(
					  'setting'  => 'partdo_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Maintenance Toggle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'partdo_maintenance_toggle',
				'label' => esc_attr__( 'Enable Maintenance Mode', 'partdo-core' ),
				'description' => esc_attr__( 'You can choose status of Maintenance.', 'partdo-core' ),
				'section' => 'partdo_maintenance_settings_section',
				'default' => '0',
			)
		);
		
		/*====== Maintenance Title ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_maintenance_title',
				'label' => esc_attr__( 'Title', 'partdo-core' ),
				'section' => 'partdo_maintenance_settings_section',
				'default' => 'Coming',
				'active_callback' => [
					[
					  'setting'  => 'partdo_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);

		/*====== Maintenance Second Title ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_maintenance_second_title',
				'label' => esc_attr__( 'Second Title', 'partdo-core' ),
				'section' => 'partdo_maintenance_settings_section',
				'default' => 'Soon',
				'active_callback' => [
					[
					  'setting'  => 'partdo_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);
		
		/*====== Maintenance Subtitle ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'partdo_maintenance_subtitle',
				'label' => esc_attr__( 'Subtitle', 'partdo-core' ),
				'section' => 'partdo_maintenance_settings_section',
				'default' => 'Get ready! Something really cool is coming!',
				'active_callback' => [
					[
					  'setting'  => 'partdo_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);
		
		/*====== Maintenance Mailchimp FORM ID======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_maintenance_mailchimp_formid',
				'label' => esc_attr__( 'Mailchimp Form Id.', 'partdo-core' ),
				'description' => esc_attr__( 'You can find the form id in Dashboard > Mailchimp For Wp > Form.', 'partdo-core' ),
				'section' => 'partdo_maintenance_settings_section',
				'default' => '',
				'active_callback' => [
					[
					  'setting'  => 'partdo_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);
		
		/*====== Maintenance Image ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'partdo_maintenance_image',
				'label' => esc_attr__( 'Background Image', 'partdo-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'partdo-core' ),
				'section' => 'partdo_maintenance_settings_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'input_attrs' => array( 'class' => 'my_custom_class' ),
				'active_callback' => [
					[
					  'setting'  => 'partdo_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);
		
		/*====== Maintenance Title Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#a0463a',
				'settings' => 'partdo_maintenance_title_color',
				'label' => esc_attr__( 'Maintenance Title Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_maintenance_settings_section',
				'required' => array(
					array(
					  'setting'  => 'partdo_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Maintenance Second Title Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#f28c2f',
				'settings' => 'partdo_maintenance_second_title_color',
				'label' => esc_attr__( 'Maintenance Second Title Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_maintenance_settings_section',
				'required' => array(
					array(
					  'setting'  => 'partdo_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Maintenance Subtitle Color ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#8b8396',
				'settings' => 'partdo_maintenance_subtitle_color',
				'label' => esc_attr__( 'Maintenance Subtitle Color', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'partdo-core' ),
				'section' => 'partdo_maintenance_settings_section',
				'required' => array(
					array(
					  'setting'  => 'partdo_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Maintenance Title Typography ======*/
		partdo_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'partdo_maintenance_title_size',
				'label'       => esc_attr__( 'Maintenance Title Typography', 'partdo-core' ),
				'section'     => 'partdo_maintenance_settings_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '76px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.maintenance-mode-wrapper h2.entry-title ',
					],
				],
				'required' => array(
					array(
					  'setting'  => 'partdo_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Maintenance Second Title Typography ======*/
		partdo_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'partdo_maintenance_second_title_size',
				'label'       => esc_attr__( 'Maintenance Second Title Typography', 'partdo-core' ),
				'section'     => 'partdo_maintenance_settings_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '109px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => '.maintenance-mode-wrapper h1.entry-sub',
					],
				],
				'required' => array(
					array(
					  'setting'  => 'partdo_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Maintenance Subtitle Typography ======*/
		partdo_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'partdo_maintenance_subtitle_size',
				'label'       => esc_attr__( 'Maintenance Subtitle Typography', 'partdo-core' ),
				'section'     => 'partdo_maintenance_settings_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '25px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => 'body#error-page .maintenance-content .entry-description ',
					],
				],
				'required' => array(
					array(
					  'setting'  => 'partdo_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

	/*====== Other Settings =============================*/	
	
		/*====== 404 Page ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'Dropdown_Pages',
				'settings' => 'partdo_404_page',
				'label' => esc_attr__( 'Select a 404 Page', 'partdo-core' ),
				'description' => esc_attr__( 'Select a page that will be shown as your default 404 error page.', 'partdo-core' ),
				'section' => 'partdo_other_settings_section',
				'default' => '',
				'placeholder' => __( 'Select a page', 'partdo-core' ),
				'choices' => array(
					'default' => esc_attr__( 'Select a Page', 'partdo-core' ),
				),
			)
		);

		/*====== Product Search Limit on Elementor ======*/
		partdo_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'partdo_elementor_product_search_limit',
				'label' => esc_attr__( 'Elementor Product Search Limit', 'partdo-core' ),
				'description' => esc_attr__( 'You can set a product search limit for Elementor.', 'partdo-core' ),
				'section' => 'partdo_other_settings_section',
				'default' => '100',
			)
		);
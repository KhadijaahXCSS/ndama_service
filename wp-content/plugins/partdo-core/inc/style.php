<?php 
/*************************************************
## Partdo Typography
*************************************************/

function partdo_custom_styling() { ?>

<style type="text/css">

<?php if (get_theme_mod( 'partdo_mobile_sticky_header',0 ) == 1) { ?>
@media(max-width:64rem){
	header.sticky-header .header-mobile {
		position: fixed;
		top: 0;
		left: 0;
		right: 0;
		z-index: 9;
		border-bottom: 1px solid #e3e4e6;
	}	
}
<?php } ?>

<?php if (get_theme_mod( 'partdo_sticky_header',0 ) == 1) { ?>
.sticky-header .header-main {
    position: fixed;
    left: 0;
    right: 0;
    top: 0;
    z-index: 9;
    border-bottom: 1px solid #e3e4e6;
    padding-top: 15px;
    padding-bottom: 15px;
}
<?php } ?>

<?php if (get_theme_mod( 'partdo_mobile_single_sticky_cart',0 ) == 1) { ?>
@media(max-width:64rem){
	.single .product-type-simple form.cart {
	    position: fixed;
	    bottom: 0;
	    right: 0;
	    z-index: 9999;
	    background: #fff;
	    margin-bottom: 0;
	    padding: 15px;
	    -webkit-box-shadow: 0 -2px 5px rgb(0 0 0 / 7%);
	    box-shadow: 0 -2px 5px rgb(0 0 0 / 7%);
	    justify-content: space-between;
		width: 100%;
	}

	.single .woocommerce-variation-add-to-cart {
	    display: -webkit-box;
	    display: -ms-flexbox;
	    display: flex;
	    position: fixed;
	    bottom: 0;
	    right: 0;
	    z-index: 9999;
	    background: #fff;
	    margin-bottom: 0;
	    padding: 15px;
	    -webkit-box-shadow: 0 -2px 5px rgb(0 0 0 / 7%);
	    box-shadow: 0 -2px 5px rgb(0 0 0 / 7%);
	    justify-content: space-between;
    	width: 100%;
		flex-wrap: wrap;
		width: 100%; 
	}

	.single .site-footer .footer-row.footer-copyright {
	    margin-bottom: 79px;
	}

}
<?php } ?>

<?php if (get_theme_mod( 'partdo_main_color' )) { ?>
:root {
    --color-primary: <?php echo esc_attr(get_theme_mod( 'partdo_main_color' ) ); ?>;
}

.site-header .dropdown-cats > a,
.site-header .header-border,
.site-header .quick-button .count{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_main_color' ) ); ?> ;
}
<?php } ?>

<?php if (get_theme_mod( 'partdo_main_dark_color' )) { ?>
:root {
	--color-primary-dark: <?php echo esc_attr(get_theme_mod( 'partdo_main_dark_color' ) ); ?>;
}
<?php } ?>

<?php if (get_theme_mod( 'partdo_color_danger' )) { ?>
:root {
	--color-danger: <?php echo esc_attr(get_theme_mod( 'partdo_color_danger' ) ); ?>;
}
<?php } ?>

<?php if (get_theme_mod( 'partdo_color_danger_dark' )) { ?>
:root {
	--color-danger-dark: <?php echo esc_attr(get_theme_mod( 'partdo_color_danger_dark' ) ); ?>;
}
<?php } ?>

<?php if (get_theme_mod( 'partdo_color_danger_light' )) { ?>
:root {
	--color-danger-light: <?php echo esc_attr(get_theme_mod( 'partdo_color_danger_light' ) ); ?>;
}
<?php } ?>

<?php if (get_theme_mod( 'partdo_color_success' )) { ?>
:root {
	--color-success: <?php echo esc_attr(get_theme_mod( 'partdo_color_success' ) ); ?>;
}
<?php } ?>

<?php if (get_theme_mod( 'partdo_color_success_dark' )) { ?>
:root {
	--color-success-dark: <?php echo esc_attr(get_theme_mod( 'partdo_color_success_dark' ) ); ?>;
}
<?php } ?>

<?php if (get_theme_mod( 'partdo_color_success_light' )) { ?>
:root {
	--color-success-lighter: <?php echo esc_attr(get_theme_mod( 'partdo_color_success_light' ) ); ?>;
}
<?php } ?>

<?php if (get_theme_mod( 'partdo_color_warning' )) { ?>
:root {
	--color-warning: <?php echo esc_attr(get_theme_mod( 'partdo_color_warning' ) ); ?>;
}
<?php } ?>


<?php if(function_exists('dokan')){ ?>

	input[type='submit'].dokan-btn-theme,
	a.dokan-btn-theme,
	.dokan-btn-theme {
		background-color: <?php echo esc_attr(get_theme_mod( 'partdo_main_color' ) ); ?>;
		border-color: <?php echo esc_attr(get_theme_mod( 'partdo_main_color' ) ); ?>;
	}
	input[type='submit'].dokan-btn-theme .badge,
	a.dokan-btn-theme .badge,
	.dokan-btn-theme .badge {
		color: <?php echo esc_attr(get_theme_mod( 'partdo_main_color' ) ); ?>;
	}
	.dokan-announcement-uread {
		border: 1px solid <?php echo esc_attr(get_theme_mod( 'partdo_main_color' ) ); ?> !important;
	}
	.dokan-announcement-uread .dokan-annnouncement-date {
		background-color: <?php echo esc_attr(get_theme_mod( 'partdo_main_color' ) ); ?> !important;
	}
	.dokan-announcement-bg-uread {
		background-color: <?php echo esc_attr(get_theme_mod( 'partdo_main_color' ) ); ?>;
	}
	.dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li:hover {
		background: <?php echo esc_attr(get_theme_mod( 'partdo_main_color' ) ); ?>;
	}
	.dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li.dokan-common-links a:hover {
		background: <?php echo esc_attr(get_theme_mod( 'partdo_main_color' ) ); ?>;
	}
	.dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li.active {
		background: <?php echo esc_attr(get_theme_mod( 'partdo_main_color' ) ); ?>;
	}
	.dokan-product-listing .dokan-product-listing-area table.product-listing-table td.post-status label.pending {
		background: <?php echo esc_attr(get_theme_mod( 'partdo_main_color' ) ); ?>;
	}
	.product-edit-container .dokan-product-title-alert,
	.product-edit-container .dokan-product-cat-alert {
		color: <?php echo esc_attr(get_theme_mod( 'partdo_main_color' ) ); ?>;
	}
	.product-edit-container .dokan-product-less-price-alert {
		color: <?php echo esc_attr(get_theme_mod( 'partdo_main_color' ) ); ?>;
	}
	.dokan-store-wrap {
	    margin-top: 3.5rem;
	}
	.dokan-widget-area ul {
	    list-style: none;
	    padding-left: 0;
	    font-size: .875rem;
	    font-weight: 400;
	}
	.dokan-widget-area ul li a {
	    text-decoration: none;
	    color: var(--color-text-lighter);
	    margin-bottom: .625rem;
	    display: inline-block;
	}
	form.dokan-store-products-ordeby:before, 
	form.dokan-store-products-ordeby:after {
		content: '';
		display: table;
		clear: both;
	}
	.dokan-store-products-filter-area .orderby-search {
	    width: auto;
	}
	input.search-store-products.dokan-btn-theme {
	    border-top-left-radius: 0;
	    border-bottom-left-radius: 0;
	}
	.dokan-pagination-container .dokan-pagination li a {
	    display: -webkit-inline-box;
	    display: -ms-inline-flexbox;
	    display: inline-flex;
	    -webkit-box-align: center;
	    -ms-flex-align: center;
	    align-items: center;
	    -webkit-box-pack: center;
	    -ms-flex-pack: center;
	    justify-content: center;
	    font-size: .875rem;
	    font-weight: 600;
	    width: 2.25rem;
	    height: 2.25rem;
	    border-radius: 50%;
	    color: currentColor;
	    text-decoration: none;
	    border: none;
	}
	.dokan-pagination-container .dokan-pagination li.active a {
	    color: #fff;
	    background-color: var(--color-secondary) !important;
	}
	.dokan-pagination-container .dokan-pagination li:last-child a, 
	.dokan-pagination-container .dokan-pagination li:first-child a {
	    width: auto;
	}

	.vendor-customer-registration label {
	    margin-right: 10px;
	}

	.woocommerce-mini-cart dl.variation {
	    display: none;
	}

	.product-name dl.variation {
	    display: none;
	}

	.seller-rating .star-rating span.width + span {
	    display: none;
	}
	
	.seller-rating .star-rating {width: 70px;display: block;}

<?php } ?>

<?php if (function_exists('get_wcmp_vendor_settings') && is_user_logged_in()) {
	if(is_vendor_dashboard()){	
} ?>

.woosc-popup, div#woosc-area {
    display: none;
}
	
.select-location {
    display: none;
}
	
<?php } ?>

.site-header.header-type-1 .header-border{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_header1_top_border_color' ) ); ?>;
}

.site-header.header-type-1 .header-topbar  {
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_header1_top_bg_color' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header1_top_font_color' ) ); ?>;
}

.site-header.header-type-1 .klbth-menu-wrapper.topbar .klbth-menu > li:hover > a,
.site-header.header-type-1 .header-topbar .header-notice p a:hover,
.site-header.header-type-1 .klbth-menu-wrapper.topbar .klbth-menu .sub-menu li a:hover{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header1_top_font_hvrcolor' ) ); ?>;
}

.site-header.header-type-1 .header-main,
.site-header.header-type-1 .header-nav,
.site-header.header-type-1 .header-mobile{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_header1_main_bg_color' ) ); ?>;
}

.site-header.header-type-1 .header-topbar{
	border-color: <?php echo esc_attr(get_theme_mod( 'partdo_header1_main_border_color' ) ); ?>;
}

.site-header.header-type-1 .klbth-menu-wrapper.primary .klbth-menu > .menu-item > a,
.site-header.header-type-1 .mega-items .mega-item > a{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header1_main_font_color' ) ); ?>;
}

.site-header.header-type-1 .klbth-menu-wrapper.primary .klbth-menu > .menu-item:hover > a,
.site-header.header-type-1 .mega-items .mega-item:hover > a{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header1_main_font_hvrcolor' ) ); ?>;
}

.site-header.header-type-1 .klbth-menu-wrapper.primary .menu-item-has-children .sub-menu .menu-item:hover > a{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_header1_main_submenu_bg_color' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header1_main_submenu_font_hvrcolor' ) ); ?>;
}

.site-header.header-type-1 .klbth-menu-wrapper.primary .menu-item-has-children .sub-menu .menu-item a{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header1_main_submenu_font_color' ) ); ?>;
}

.site-header.header-type-1 .quick-button .quick-icon,
.site-header.header-type-1 .quick-button .quick-text,
.site-header.header-type-1 .quick-button .arrow{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header1_main_icon_color' ) ); ?>;
}

.site-header.header-type-1 .notice-button .notice-link{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header1_main_help_center_font_color' ) ); ?>;
}

.site-header.header-type-2 .header-notify{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header2_top1_notification_color' ) ); ?>;
}

.site-header.header-type-2 .header-topbar,
.site-header.header-type-2 .klbth-menu-wrapper.topbar .klbth-menu > li:hover > a{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_header2_top2_bg_color' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header2_top2_font_color' ) ); ?>;
}

.site-header.header-type-2 .klbth-menu-wrapper.topbar .klbth-menu > li > a:hover,
.site-header.header-type-2 .header-topbar .header-notice p a:hover,
.site-header.header-type-2 .klbth-menu-wrapper.topbar .klbth-menu .sub-menu li a:hover,
.site-header.header-type-2 .klbth-menu-wrapper.topbar .klbth-menu > li:hover > a{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header2_top2_font_hvrcolor' ) ); ?>;
}

.site-header.header-type-2 .header-main,
.site-header.header-type-2 .header-nav,
.site-header.header-type-2 .header-mobile{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_header2_main_bg_color' ) ); ?>;
}

.site-header.header-type-2 .header-topbar{
	border-color: <?php echo esc_attr(get_theme_mod( 'partdo_header2_main_border_color' ) ); ?>;
}

.site-header.header-type-2 .klbth-menu-wrapper.primary .klbth-menu > .menu-item > a,
.site-header.header-type-2 .mega-items .mega-item > a{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header2_main_font_color' ) ); ?>;
}

.site-header.header-type-2 .klbth-menu-wrapper.primary .klbth-menu > .menu-item:hover > a,
.site-header.header-type-2 .mega-items .mega-item:hover > a{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header2_main_font_hvrcolor' ) ); ?>;
}

.site-header.header-type-2 .klbth-menu-wrapper.primary .menu-item-has-children .sub-menu .menu-item a{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header2_main_submenu_font_color' ) ); ?>;
}

.site-header.header-type-2 .klbth-menu-wrapper.primary .menu-item-has-children .sub-menu .menu-item:hover > a{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_header2_main_submenu_bg_color' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header2_main_submenu_font_hvrcolor' ) ); ?>;
}

.site-header.header-type-2 .quick-button .quick-icon{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header2_main_icon_color' ) ); ?>;
}

.site-header.klb-type-3 .header-border{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_header3_top_border_color' ) ); ?>;
}

.site-header.klb-type-3 .header-sub{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_header3_top_bg_color' ) ); ?>;
}

.site-header.klb-type-3 .klbth-menu-wrapper.horizontal .klbth-menu li a{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header3_top_font_color' ) ); ?>;
}

.site-header.klb-type-3 .klbth-menu-wrapper.primary .klbth-menu > .menu-item > a:hover,
.site-header.klb-type-3 .klbth-menu-wrapper.topbar .klbth-menu .sub-menu li a:hover,
.site-header.klb-type-3 .klbth-menu-wrapper.topbar .klbth-menu > li:hover > a{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header3_top_font_hvrcolor' ) ); ?>;
}

.site-header.klb-type-3 .header-main,
.site-header.klb-type-3 .header-mobile{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_header3_main_bg_color' ) ); ?>;
}

.site-header.klb-type-3 .header-sub{
	border-color: <?php echo esc_attr(get_theme_mod( 'partdo_header3_main_border_color' ) ); ?>;
}

.site-header.klb-type-3 .quick-button .quick-icon,
.site-header.klb-type-3 .quick-button .quick-text,
.site-header.klb-type-3 .quick-button .arrow{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header3_main_icon_color' ) ); ?>;
}

.site-header.klb-type-4 .header-notify{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header4_top1_notification_color' ) ); ?>;
}

.site-header.klb-type-4 .header-sub{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_header4_top2_bg_color' ) ); ?>;
}

.site-header.klb-type-4 .klbth-menu-wrapper.horizontal .klbth-menu li a{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header4_top2_font_color' ) ); ?>;
}

.site-header.klb-type-4 .klbth-menu-wrapper.primary .klbth-menu > .menu-item > a:hover,
.site-header.klb-type-4 .klbth-menu-wrapper.topbar .klbth-menu .sub-menu li a:hover,
.site-header.klb-type-4  .klbth-menu-wrapper.topbar .klbth-menu > li:hover > a{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header4_top2_font_hvrcolor' ) ); ?>;
}

.site-header.klb-type-4 .header-main,
.site-header.klb-type-4 .header-mobile{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_header4_main_bg_color' ) ); ?>;
}

.site-header.klb-type-4 .header-sub{
	border-color: <?php echo esc_attr(get_theme_mod( 'partdo_header4_main_border_color' ) ); ?>;
}

.site-header.klb-type-4 .quick-button .quick-icon,
.site-header.klb-type-4 .quick-button .quick-text,
.site-header.klb-type-4 .quick-button .arrow{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header4_main_icon_color' ) ); ?>;
}

.klbth-modal-holder .klbth-modal-header .entry-title{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header_attribute_search_title_color' ) ); ?>;
}

.service-search-modal .entry-description{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header_attribute_search_subtitle_color' ) ); ?>;
}

.service-search-modal .service-description p{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header_attribute_search_second_subtitle_color' ) ); ?>;
}

.site-header .discount-products-header .entry-title{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header_products_tab_title_color' ) ); ?>;
}

.site-header .discount-products-header p{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_header_products_tab_subtitle_color' ) ); ?>;
}

.widget_banner .klbth-banner .entry-heading .entry-title{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_widget_banner_title_color' ) ); ?>;
}

.widget_banner .klbth-banner .badge{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_widget_banner_subtitle_bg_color' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'partdo_widget_banner_subtitle_color' ) ); ?>;
}

.widget_banner .klbth-banner .entry-footer .btn.link{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_widget_banner_button_color' ) ); ?>;
}

.klbth-banner.shop-banner .entry-heading .entry-title{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_banner_title_color' ) ); ?>;
}

.klbth-banner.shop-banner .badge{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_banner_subtitle_bg_color' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_banner_subtitle_color' ) ); ?>;
}

.klbth-banner.shop-banner .entry-excerpt{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_banner_description_color' ) ); ?>;
}

.klbth-banner.shop-banner .entry-footer .btn.link{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_banner_button_color' ) ); ?>;
}

.site-drawer .site-scroll{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_mobile_menu_bg_color' ) ); ?>;
}

.site-drawer .drawer-heading{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_mobile_menu_title_color' ) ); ?>;
}

.site-drawer .klbth-menu-wrapper .klbth-menu .menu-item{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_mobile_menu_subtitle_color' ) ); ?>;
	border-color: <?php echo esc_attr(get_theme_mod( 'partdo_mobile_menu_border_color' ) ); ?> !important;
}

.site-drawer .drawer-contacts ul li .contact-icon{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_mobile_menu_contact_icon_color' ) ); ?>;
}

.site-drawer .drawer-contacts ul li .contact-detail{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_mobile_menu_contact_title_color' ) ); ?>;
}

.site-drawer .drawer-contacts ul li .contact-description{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_mobile_menu_contact_subtitle_color' ) ); ?>;
}

.site-drawer .site-copyright{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_mobile_menu_copyright_font_color' ) ); ?>;	
}

.mobile-bottom-menu{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_mobile_bottom_menu_bg_color' ) ); ?>;
}

.mobile-bottom-menu ul li a i,
.mobile-bottom-menu ul li a svg{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_mobile_bottom_menu_icon_color' ) ); ?>;
}

.mobile-bottom-menu ul li a span{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_mobile_bottom_menu_font_color' ) ); ?>;
}

.site-footer .klbth-newsletter .klbth-newsletter-text .text-icon{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_subscribe_icon_color' ) ); ?>;
}

.site-footer .footer-row.footer-newsletter{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_subscribe_bg_color' ) ); ?>;
}

.site-footer .footer-newsletter.dark .footer-inner{
	border-color: <?php echo esc_attr(get_theme_mod( 'partdo_subscribe_border_color' ) ); ?> !important;
}

.site-footer .klbth-newsletter .klbth-newsletter-text .text-body .entry-title{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_subscribe_title_color' ) ); ?>;
}

.site-footer .klbth-newsletter .klbth-newsletter-text .text-body .entry-subtitle{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_subscribe_subtitle_color' ) ); ?>;
}

.site-footer .klbth-newsletter .klbth-newsletter-text .text-body .entry-description{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_subscribe_desc_color' ) ); ?>;
}

.site-footer .footer-row.custom-background-light.dark{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_footer1_bg_color' ) ); ?>;
}

.footer-row.dark .klbfooterwidget.widget .widget-title,
.footer-row.dark .widget_about_company .company-content .entry-title,
.footer-row.dark .widget_contact .company-phone,
.site-footer .footer-copyright.dark .mobile-app-content span{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_footer1_title_color' ) ); ?>;
}

.site-footer .subfooter.dark .footer-inner,
.site-footer .footer-row.dark .custom-column,
.site-footer .footer-row.dark .sub-banners ul li + li,
.site-footer .footer-copyright.dark .footer-inner{
	border-color: <?php echo esc_attr(get_theme_mod( 'partdo_footer1_border_color' ) ); ?> !important;
}

.footer-row.dark .widget_nav_menu ul li a,
.footer-row.dark .widget_contact .company-works p,
.footer-row.dark .widget_about_company .company-content .entry-description p{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_footer1_subtitle_color' ) ); ?>;
}

.site-footer .subfooter.dark .sub-banners ul li{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_footer1_extra_title_color' ) ); ?>;
}

.site-footer .footer-copyright.dark .footer-menu ul li a{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_footer1_bottom_menu_color' ) ); ?>;
}

.site-footer .footer-copyright.dark .site-copyright p{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_footer1_copyright_color' ) ); ?>;
}

.site-footer .footer-row.custom-background-dark{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_footer2_bg_color' ) ); ?>;
}

.site-footer .subfooter.light .footer-inner,
.site-footer .footer-row.light .custom-column,
.site-footer .footer-row.light .sub-banners ul li + li,
.site-footer .footer-copyright.light .footer-inner{
	border-color: <?php echo esc_attr(get_theme_mod( 'partdo_footer2_border_color' ) ); ?> !important;
}

.footer-row.light .klbfooterwidget.widget .widget-title,
.footer-row.light .widget_about_company .company-content .entry-title,
.footer-row.light .widget_contact .company-phone,
.site-footer .footer-copyright.light .mobile-app-content span{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_footer2_title_color' ) ); ?>;
}

.footer-row.light .widget_nav_menu ul li a,
.footer-row.light .widget_contact .company-works p,
.footer-row.light .widget_about_company .company-content .entry-description p{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_footer2_subtitle_color' ) ); ?>;
}

.site-footer .subfooter.light .sub-banners ul li{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_footer2_extra_title_color' ) ); ?>;
}

.site-footer .footer-copyright.light .footer-menu ul li a{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_footer2_bottom_menu_color' ) ); ?>;
}

.site-footer .footer-copyright.light .site-copyright p{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_footer2_copyright_color' ) ); ?>;
}

.site-footer .footer-copyright.light .site-copyright p{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_footer2_copyright_color' ) ); ?>;
}

.maintenance-mode-wrapper h2.entry-title{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_maintenance_title_color' ) ); ?>;
}

.maintenance-mode-wrapper h1.entry-sub{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_maintenance_second_title_color' ) ); ?>;
}

body#error-page .maintenance-content .entry-description{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_maintenance_subtitle_color' ) ); ?>;
}

.site-header.header-type-1 .dropdown-cats > a{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_sidebar_menu_title_bg_color' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'partdo_sidebar_menu_title_font_color' ) ); ?>;
}

.site-header .dropdown-cats .dropdown-menu,
.site-header .dropdown-cats .dropdown-menu .klbth-menu .sub-menu{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_sidebar_menu_bg_color' ) ); ?>;	
	border-color: <?php echo esc_attr(get_theme_mod( 'partdo_sidebar_menu_border_color' ) ); ?>;	
}

.site-header .dropdown-cats .dropdown-menu .klbth-menu a{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_sidebar_menu_font_color' ) ); ?>;
}

.site-header .dropdown-cats .dropdown-menu .klbth-menu a:hover,
.site-header .dropdown-cats .dropdown-menu .klbth-menu > .menu-item.menu-item-has-children:hover > a{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_sidebar_menu_font_hvrcolor' ) ); ?>;
}

.site-header .dropdown-cats .dropdown-menu .klbth-menu > .menu-item > a:hover,
.site-header .dropdown-cats .dropdown-menu .klbth-menu > .menu-item.menu-item-has-children:hover > a{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_sidebar_menu_font_hvr_bgcolor' ) ); ?>;	
}

.site-header .dropdown-cats .dropdown-menu .klbth-menu > li > ul.sub-menu > li.menu-item-has-children > a{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_sidebar_menu_subtitle_font_color' ) ); ?>;
}

.single-product .site-content{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_bg_color' ) ); ?>;
}

.single-product-wrapper .product-detail .product_title{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_title_color' ) ); ?>;
}

.single-product-wrapper .product-gallery .flex-control-thumbs li.slick-slide img.flex-active{
	border-color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_image_border_color' ) ); ?>;
}

.single-product-wrapper .product-detail .product-meta .product-stock.in-stock{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_stock_bg_color' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_stock_text_color' ) ); ?>;
}

.single-product-wrapper .product-detail .product-meta .product-stock.out-of-stock{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_out_of_stock_bg_color' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_out_of_stock_text_color' ) ); ?>;
}

.single-product-wrapper .cell.product-detail .price ins{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_sale_price_color' ) ); ?>;
}

.single-product-wrapper .cell.product-detail .price del{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_regular_price_color' ) ); ?>;
}

.single-product-wrapper .single-product .woocommerce-product-details__short-description{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_desc_color' ) ); ?>;
}

.single-product-wrapper .product-detail .single_add_to_cart_button{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_button_bg_color' ) ); ?>;
	border-color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_button_border_color' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_button_text_color' ) ); ?>;
}

.single-product-wrapper .product-detail .single_add_to_cart_button:hover{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_button_bg_hvrcolor' ) ); ?>;
	border-color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_button_border_hvrcolor' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_button_text_hvrcolor' ) ); ?>;
}

.single-product-wrapper .product-detail .product-wishlist p{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_wishlist_title_color' ) ); ?>;
}

.single-product-wrapper .product-detail .product-wishlist a{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_wishlist_title_icon_bg_color' ) ); ?>;
	border-color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_wishlist_title_icon_border_color' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_wishlist_title_icon_color' ) ); ?>;
}

.single-product-wrapper .product-detail .product-wishlist a:hover{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_wishlist_title_icon_bg_hvrcolor' ) ); ?>;
	border-color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_wishlist_title_icon_border_hvrcolor' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_wishlist_title_icon_hvrcolor' ) ); ?>;
}

.single-product-wrapper .product-detail .product-meta.bottom > * > span{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_meta_title_color' ) ); ?>;
}

.single-product-wrapper .product-detail .product-meta.bottom > * a{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_meta_subtitle_color' ) ); ?>;
}

.single-product .woocommerce-tabs ul.wc-tabs li.active > a,
.single-product .related.products .klb-title h2.entry-title,
.single-product .recently-viewed .klb-title h2.entry-title{
	color: <?php echo esc_attr(get_theme_mod( 'partdo_shop_single_module_title_color' ) ); ?>;
}

p.woocommerce-mini-cart__buttons.buttons a:not(.checkout){
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_mini_cart_view_cart_button_bg_color' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'partdo_mini_cart_view_cart_button_text_color' ) ); ?>;
}

p.woocommerce-mini-cart__buttons.buttons a:not(.checkout):hover{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_mini_cart_view_cart_button_bg_hvrcolor' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'partdo_mini_cart_view_cart_button_text_hvrcolor' ) ); ?>;
}


p.woocommerce-mini-cart__buttons.buttons a.checkout{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_mini_cart_checkout_button_bg_color' ) ); ?>;
	border-color: <?php echo esc_attr(get_theme_mod( 'partdo_mini_cart_checkout_button_border_color' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'partdo_mini_cart_checkout_button_text_color' ) ); ?>;
}

p.woocommerce-mini-cart__buttons.buttons a.checkout:hover{
	background-color: <?php echo esc_attr(get_theme_mod( 'partdo_mini_cart_checkout_button_bg_hvrcolor' ) ); ?>;
	border-color: <?php echo esc_attr(get_theme_mod( 'partdo_mini_cart_checkout_button_border_hvrcolor' ) ); ?>;
	color: <?php echo esc_attr(get_theme_mod( 'partdo_mini_cart_checkout_button_text_hvrcolor' ) ); ?>;
}

</style>
<?php }
add_action('wp_head','partdo_custom_styling');

?>
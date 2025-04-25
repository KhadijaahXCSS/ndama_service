<?php

$affiliate_store_first_color = get_theme_mod('affiliate_store_first_color');
$affiliate_store_color_scheme_css = '';

/*------------------ Global First Color -----------*/

if ($affiliate_store_first_color) {
  $affiliate_store_color_scheme_css .= ':root {';
  $affiliate_store_color_scheme_css .= '--first-theme-color: ' . esc_attr($affiliate_store_first_color) . ' !important;';
  $affiliate_store_color_scheme_css .= '} ';
}

//---------------------------------Logo-Max-height--------- 
  $affiliate_store_logo_width = get_theme_mod('affiliate_store_logo_width');

  if($affiliate_store_logo_width != false){

    $affiliate_store_color_scheme_css .='.logo img{';

      $affiliate_store_color_scheme_css .='width: '.esc_html($affiliate_store_logo_width).'px;';

    $affiliate_store_color_scheme_css .='}';
  }

  // by default header
  $affiliate_store_slider = get_theme_mod('affiliate_store_slider', false);

  if($affiliate_store_slider != true){

  $affiliate_store_color_scheme_css .='.page-template-template-home-page .mainhead{';

    $affiliate_store_color_scheme_css .='position: static;';

  $affiliate_store_color_scheme_css .='}';

  }

  $affiliate_store_slider_nav_img = get_theme_mod('affiliate_store_slider_nav_img');
  if($affiliate_store_slider_nav_img != false){
    $affiliate_store_color_scheme_css .='#slider-cat .owl-nav .owl-next:after{';
      $affiliate_store_color_scheme_css .='background: url('.esc_attr($affiliate_store_slider_nav_img).'); background-size: cover;';
    $affiliate_store_color_scheme_css .='}';
  }


/*--------------------------- Scroll to top positions -------------------*/

$affiliate_store_scroll_position = get_theme_mod( 'affiliate_store_scroll_position','Right');
if($affiliate_store_scroll_position == 'Right'){
    $affiliate_store_color_scheme_css .='#button{';
        $affiliate_store_color_scheme_css .='right: 20px;';
    $affiliate_store_color_scheme_css .='}';
}else if($affiliate_store_scroll_position == 'Left'){
    $affiliate_store_color_scheme_css .='#button{';
        $affiliate_store_color_scheme_css .='left: 20px;';
    $affiliate_store_color_scheme_css .='}';
}else if($affiliate_store_scroll_position == 'Center'){
    $affiliate_store_color_scheme_css .='#button{';
        $affiliate_store_color_scheme_css .='right: 50%;left: 50%;';
    $affiliate_store_color_scheme_css .='}';
}

/*--------------------------- Footer background image -------------------*/

$affiliate_store_footer_bg_image = get_theme_mod('affiliate_store_footer_bg_image');
if($affiliate_store_footer_bg_image != false){
    $affiliate_store_color_scheme_css .='#footer{';
        $affiliate_store_color_scheme_css .='background: url('.esc_attr($affiliate_store_footer_bg_image).')!important;';
        $affiliate_store_color_scheme_css .= 'background-size: cover!important;';  
    $affiliate_store_color_scheme_css .='}';
}

/*--------------------------- Blog Post Page Image Box Shadow -------------------*/

$affiliate_store_blog_post_page_image_box_shadow = get_theme_mod('affiliate_store_blog_post_page_image_box_shadow',0);
if($affiliate_store_blog_post_page_image_box_shadow != false){
    $affiliate_store_color_scheme_css .='.post-thumb img{';
        $affiliate_store_color_scheme_css .='box-shadow: '.esc_attr($affiliate_store_blog_post_page_image_box_shadow).'px '.esc_attr($affiliate_store_blog_post_page_image_box_shadow).'px '.esc_attr($affiliate_store_blog_post_page_image_box_shadow).'px #cccccc;';
    $affiliate_store_color_scheme_css .='}';
}  

/*--------------------------- Woocommerce Product Image Border Radius -------------------*/

$affiliate_store_woo_product_img_border_radius = get_theme_mod('affiliate_store_woo_product_img_border_radius');
  if($affiliate_store_woo_product_img_border_radius != false){
    $affiliate_store_color_scheme_css .='.woocommerce ul.products li.product a img{';
    $affiliate_store_color_scheme_css .='border-radius: '.esc_attr($affiliate_store_woo_product_img_border_radius).'px;';
    $affiliate_store_color_scheme_css .='}';
}  

/*--------------------------- Woocommerce Product Sale Position -------------------*/    

$affiliate_store_product_sale_position = get_theme_mod( 'affiliate_store_product_sale_position','Left');
if($affiliate_store_product_sale_position == 'Right'){
    $affiliate_store_color_scheme_css .='.woocommerce ul.products li.product .onsale{';
        $affiliate_store_color_scheme_css .='left:auto !important; right:.5em !important;';
    $affiliate_store_color_scheme_css .='}';
}else if($affiliate_store_product_sale_position == 'Left'){
    $affiliate_store_color_scheme_css .='.woocommerce ul.products li.product .onsale {';
        $affiliate_store_color_scheme_css .='right:auto !important; left:.5em !important;';
    $affiliate_store_color_scheme_css .='}';
}        

/*--------------------------- Shop page pagination -------------------*/

$affiliate_store_wooproducts_nav = get_theme_mod('affiliate_store_wooproducts_nav', 'Yes');
if($affiliate_store_wooproducts_nav == 'No'){
  $affiliate_store_color_scheme_css .='.woocommerce nav.woocommerce-pagination{';
    $affiliate_store_color_scheme_css .='display: none;';
  $affiliate_store_color_scheme_css .='}';
}

/*--------------------------- Related Product -------------------*/

$affiliate_store_related_product_enable = get_theme_mod('affiliate_store_related_product_enable',true);
if($affiliate_store_related_product_enable == false){
  $affiliate_store_color_scheme_css .='.related.products{';
    $affiliate_store_color_scheme_css .='display: none;';
  $affiliate_store_color_scheme_css .='}';
}

/*--------------------------- Preloader Background Image ------------*/

$affiliate_store_preloader_bg_image = get_theme_mod('affiliate_store_preloader_bg_image');
if($affiliate_store_preloader_bg_image != false){
  $affiliate_store_color_scheme_css .='#preloader{';
    $affiliate_store_color_scheme_css .='background: url('.esc_attr($affiliate_store_preloader_bg_image).'); background-size: cover;';
  $affiliate_store_color_scheme_css .='}';
}

/*--------------------------- Scroll to Top Button Shape -------------------*/

$affiliate_store_scroll_top_shape = get_theme_mod('affiliate_store_scroll_top_shape', 'circle');
if($affiliate_store_scroll_top_shape == 'box' ){
  $affiliate_store_color_scheme_css .='#button{';
    $affiliate_store_color_scheme_css .=' border-radius: 0%';
  $affiliate_store_color_scheme_css .='}';
}elseif($affiliate_store_scroll_top_shape == 'curved' ){
  $affiliate_store_color_scheme_css .='#button{';
    $affiliate_store_color_scheme_css .=' border-radius: 20%';
  $affiliate_store_color_scheme_css .='}';
}elseif($affiliate_store_scroll_top_shape == 'circle' ){
  $affiliate_store_color_scheme_css .='#button{';
    $affiliate_store_color_scheme_css .=' border-radius: 50%;';
  $affiliate_store_color_scheme_css .='}';
}
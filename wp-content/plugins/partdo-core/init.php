<?php

/*************************************************
## Styles and Scripts
*************************************************/ 
define('KLB_INDEX_JS', plugin_dir_url( __FILE__ )  . '/js');
define('KLB_INDEX_CSS', plugin_dir_url( __FILE__ )  . '/css');

function klb_scripts() {
	wp_register_script( 'klb-location-filter', 	 plugins_url(   '/taxonomy/js/location-filter.js', __FILE__ ), true );
	wp_register_script( 'jquery-socialshare',    KLB_INDEX_JS . '/jquery-socialshare.js', array('jquery'), '1.0', true);
	wp_register_script( 'klb-social-share', 	 KLB_INDEX_JS . '/custom/social_share.js', array('jquery'), '1.0', true);
	wp_register_script( 'klb-gdpr', 	  		 KLB_INDEX_JS . '/custom/gdpr.js', array('jquery'), '1.0', true);

	if (function_exists('get_wcmp_vendor_settings') && is_user_logged_in()) {
		if(is_vendor_dashboard()){
			wp_deregister_script( 'bootstrap');
			wp_deregister_script( 'jquery-nice-select');
		}
	}
}
add_action( 'wp_enqueue_scripts', 'klb_scripts' );

/*----------------------------
  Elementor Get Templates
 ----------------------------*/
if ( ! function_exists( 'partdo_get_elementorTemplates' ) ) {
    function partdo_get_elementorTemplates( $type = null )
    {
        if ( class_exists( '\Elementor\Plugin' ) ) {

            $args = [
                'post_type' => 'elementor_library',
                'posts_per_page' => -1,
            ];

            $templates = get_posts( $args );
            $options = array();

            if ( !empty( $templates ) && !is_wp_error( $templates ) ) {

				$options['0'] = esc_html__('Set a Template','partdo-core');

                foreach ( $templates as $post ) {
                    $options[ $post->ID ] = $post->post_title;
                }
            } else {
                $options = array(
                    '' => esc_html__( 'No template exist.', 'partdo-core' )
                );
            }

            return $options;
        }
    }
}

/*----------------------------
  Single Share
 ----------------------------*/
add_action( 'woocommerce_single_product_summary', 'partdo_social_share', 70);
function partdo_social_share(){
	$socialshare = get_theme_mod( 'partdo_shop_social_share', '0' );

	if($socialshare == '1'){
		wp_enqueue_script('jquery-socialshare');
		wp_enqueue_script('klb-social-share');
	
	   $single_share_multicheck = get_theme_mod('partdo_shop_single_share',array( 'facebook', 'twitter', 'pinterest', 'linkedin', 'youtube', 'whatsapp'));
	   
	   echo '<div class="product-share entry-social">';
			echo '<ul class="social-media social-container social-share colored ">';
				if(in_array('facebook', $single_share_multicheck)){
					echo '<li><a href="#" class="facebook"><i class="klbth-icon-facebook"></i></a></li>';
				}
				if(in_array('twitter', $single_share_multicheck)){
					echo '<li><a href="#" class="twitter"><i class="klbth-icon-twitter"></i></a></li>';
				}
				if(in_array('pinterest', $single_share_multicheck)){
					echo '<li><a href="#" class="pinterest"><i class="klbth-icon-pinterest"></i></a></li>';
				}
				if(in_array('linkedin', $single_share_multicheck)){
					echo '<li><a href="#" class="linkedin"><i class="klbth-icon-linkedin"></i></a></li>';
				}
				if(in_array('reddit', $single_share_multicheck)){
					echo '<li><a href="#" class="reddit"><i class="klbth-icon-reddit"></i></a></li>';
				}

				if(in_array('whatsapp', $single_share_multicheck)){
					echo '<li><a href="#" class="whatsapp"><i class="klbth-icon-whatsapp"></i></a></li>';
				}
				
			echo '</ul>';
		echo '</div>';

	}

}

/*----------------------------
  Single Wishlist
 ----------------------------*/
add_action( 'woocommerce_single_product_summary', 'partdo_wishlist_shortcode_output',32);
function partdo_wishlist_shortcode_output(){
	$wishlist = get_theme_mod( 'partdo_wishlist_button', '0' );
	
	if($wishlist == '1' && function_exists('run_tinv_wishlist')){
		echo '<div class="product-wishlist"> ';
			echo '<p>'.esc_html__('Did you like this product? Add to favorites now and follow the product.', 'partdo-core').'</p>';
			echo do_shortcode('[ti_wishlists_addtowishlist]');
		echo '</div>';
					
	} elseif($wishlist == '1'){
		echo '<div class="product-wishlist"> ';
			echo '<p>'.esc_html__('Did you like this product? Add to favorites now and follow the product.', 'partdo-core').'</p>';
			echo do_action('partdo_wishlist_action');
		echo '</div>';
	}

}


/*-------------------------------------------
  Product Assistant
 --------------------------------------------*/
add_action( 'woocommerce_single_product_summary', 'partdo_single_product_assistant', 35);
function partdo_single_product_assistant(){
	$assistant 			= get_theme_mod( 'partdo_single_assistant', '0' );
	$assistantimage		= get_theme_mod('partdo_single_assistant_image'); 
	$assistanttitle 	= get_theme_mod('partdo_single_assistant_title'); 
	$assistantsubtitle 	= get_theme_mod('partdo_single_assistant_subtitle'); 
	
	if($assistant == '1'){
		echo '<div class="product-assistant">';
			echo '<div class="assistant-avatar"> <img src="'.esc_url(wp_get_attachment_url($assistantimage)).'"></div>';
			echo '<div class="assistant-content"> <span> '.esc_html($assistanttitle).'</span>';
				echo '<p> '.partdo_sanitize_data($assistantsubtitle).'</p>';
			echo '</div>';
		echo '</div>';
	}
}

/*-------------------------------------------
  Product Iconboxes
 --------------------------------------------*/
add_action( 'woocommerce_single_product_summary', 'partdo_single_product_iconboxes', 38);
function partdo_single_product_iconboxes(){
	$singleiconboxes = get_theme_mod( 'partdo_single_iconboxes', '0' );
 
	
	if($singleiconboxes == '1'){
		echo '<div class="product-iconboxes">';
		
		$iconboxes = get_theme_mod('partdo_single_iconboxes_list'); 
		 foreach($iconboxes as $f){ 
		 
			echo '<div class="iconbox">'; 
				echo '<div class="icon"> <i class="'.esc_attr($f['iconboxes_icon']).'"></i></div>';
				echo '<div class="detail"> ';
					echo '<h5 class="entry-title">'.esc_html($f['iconboxes_title']).'</h5>';
					echo ' <p>'.esc_html($f['iconboxes_subtitle']).'</p>';
				echo '</div>';
			echo '</div>';
		}	
		echo '</div>';
	}
}

/*----------------------------
  Update Cart When Quantity changed on CART PAGE.
 ----------------------------*/
add_action( 'woocommerce_after_cart', 'partdo_update_cart' );
function partdo_update_cart() {
    echo '<script>
	
	var timeout;
	
    jQuery(document).ready(function($) {

		var timeout;

		$(\'.woocommerce\').on(\'change\', \'input.qty\', function(){

			if ( timeout !== undefined ) {
				clearTimeout( timeout );
			}

			timeout = setTimeout(function() {
				$("[name=\'update_cart\']").trigger("click");
			}, 1000 ); // 1 second delay, half a second (500) seems comfortable too

		});

    });
    </script>';
}

/*----------------------------
  Disable Crop Image WCMP
 ----------------------------*/
add_filter('wcmp_frontend_dash_upload_script_params', 'partdo_crop_function');
function partdo_crop_function( $image_script_params ) {
	$image_script_params['canSkipCrop'] = true;
	return $image_script_params;
}

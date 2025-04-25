<?php

/*************************************************
## Scripts
*************************************************/
function partdo_gdpr_scripts() {
	wp_register_style( 'klb-gdpr',   plugins_url( 'css/gdpr.css', __FILE__ ), false, '1.0');
	wp_register_script( 'klb-gdpr',  plugins_url( 'js/gdpr.js', __FILE__ ), true );

}
add_action( 'wp_enqueue_scripts', 'partdo_gdpr_scripts' );

/*************************************************
## GDPR COOKIE
*************************************************/ 
function partdo_gdpr_cookie(){	
	$gdpr  = isset( $_COOKIE['cookie-popup-visible'] ) ? $_COOKIE['cookie-popup-visible'] : 'enable';
	if($gdpr){
		return $gdpr;
	}
}

/*************************************************
## GDPR WP_Footer
*************************************************/ 

add_action('wp_footer', 'partdo_gdpr_filter'); 
function partdo_gdpr_filter() { 

	if ( ! apply_filters( 'partdo_gdpr_filter', true ) ) {
		return;
	}

	if(get_theme_mod('partdo_gdpr_toggle',0) == 1 && partdo_gdpr_cookie() == 'enable'){
		wp_enqueue_script('jquery-cookie');
		wp_enqueue_script('klb-gdpr');
		wp_enqueue_style('klb-gdpr');
		?>
		
		<div class="site-gdpr mobile-menu-active" data-expires="<?php echo esc_attr(get_theme_mod('partdo_gdpr_expire_date')); ?>">
			<div class="gdpr-inner">
				<div class="gdpr-text"><?php echo partdo_sanitize_data(get_theme_mod('partdo_gdpr_text')); ?></div>
				<div class="gdpr-button">
					<a href="#" class="btn primary "><?php echo esc_html(get_theme_mod('partdo_gdpr_button_text')); ?></a>
				</div><!-- gdpr-button -->
			</div><!-- gdpr-inner -->
		</div><!-- site-gdpr -->
		<?php
	}
}
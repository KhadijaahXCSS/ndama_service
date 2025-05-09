<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
	<div class="row content-wrapper">
		<div class="col col-12 col-lg-12 primary-column">
			<div class="cart-wrapper">
			
				<div class="cart-empty-page">
					
					<div class="empty-icon">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 231.523 231.523" style="enable-background:new 0 0 231.523 231.523" xml:space="preserve">
						<path d="M107.415 145.798a7.502 7.502 0 0 0 8.231 6.69 7.5 7.5 0 0 0 6.689-8.231l-3.459-33.468a7.5 7.5 0 0 0-14.92 1.542l3.459 33.467zM154.351 152.488a7.501 7.501 0 0 0 8.231-6.69l3.458-33.468a7.499 7.499 0 0 0-6.689-8.231c-4.123-.421-7.806 2.57-8.232 6.689l-3.458 33.468a7.5 7.5 0 0 0 6.69 8.232zM96.278 185.088c-12.801 0-23.215 10.414-23.215 23.215 0 12.804 10.414 23.221 23.215 23.221s23.216-10.417 23.216-23.221c0-12.801-10.415-23.215-23.216-23.215zm0 31.435c-4.53 0-8.215-3.688-8.215-8.221 0-4.53 3.685-8.215 8.215-8.215 4.53 0 8.216 3.685 8.216 8.215 0 4.533-3.686 8.221-8.216 8.221zM173.719 185.088c-12.801 0-23.216 10.414-23.216 23.215 0 12.804 10.414 23.221 23.216 23.221 12.802 0 23.218-10.417 23.218-23.221 0-12.801-10.416-23.215-23.218-23.215zm0 31.435c-4.53 0-8.216-3.688-8.216-8.221 0-4.53 3.686-8.215 8.216-8.215 4.531 0 8.218 3.685 8.218 8.215 0 4.533-3.686 8.221-8.218 8.221z"/>
						<path d="M218.58 79.08a7.5 7.5 0 0 0-5.933-2.913H63.152l-6.278-24.141a7.5 7.5 0 0 0-7.259-5.612H18.876a7.5 7.5 0 0 0 0 15h24.94l6.227 23.946c.031.134.066.267.104.398l23.157 89.046a7.5 7.5 0 0 0 7.259 5.612h108.874a7.5 7.5 0 0 0 7.259-5.612l23.21-89.25a7.502 7.502 0 0 0-1.326-6.474zm-34.942 86.338H86.362l-19.309-74.25h135.895l-19.31 74.25zM105.556 52.851a7.478 7.478 0 0 0 5.302 2.195 7.5 7.5 0 0 0 5.302-12.805L92.573 18.665a7.501 7.501 0 0 0-10.605 10.609l23.588 23.577zM159.174 55.045c1.92 0 3.841-.733 5.306-2.199l23.552-23.573a7.5 7.5 0 0 0-.005-10.606 7.5 7.5 0 0 0-10.606.005l-23.552 23.573a7.5 7.5 0 0 0 5.305 12.8zM135.006 48.311h.002a7.5 7.5 0 0 0 7.5-7.498l.008-33.311A7.5 7.5 0 0 0 135.018 0h-.001a7.5 7.5 0 0 0-7.501 7.498l-.008 33.311a7.5 7.5 0 0 0 7.498 7.502z"/>
						</svg>
					</div>					
					
					<?php 
						/*
						 * @hooked wc_empty_cart_message - 10
						 */
						do_action( 'woocommerce_cart_is_empty' );
					?>

					<p class="return-to-shop">
						<a class="button wc-backward<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
							<?php
								/**
								 * Filter "Return To Shop" text.
								 *
								 * @since 4.6.0
								 * @param string $default_text Default text.
								 */
								echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', esc_html__( 'Return to shop', 'partdo' ) ) );
							?>
						</a>
					</p>
				
				</div>
				
			</div>
		</div>
	</div>	
<?php endif; ?>

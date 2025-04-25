<?php

namespace Elementor;

class Partdo_Product_List_Widget extends Widget_Base {
    use Partdo_Helper;

    public function get_name() {
        return 'partdo-product-list';
    }
    public function get_title() {
        return 'Product List (K)';
    }
    public function get_icon() {
        return 'eicon-slider-push';
    }
    public function get_categories() {
        return [ 'partdo' ];
    }

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'partdo' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control( 'product_list_type',
			[
				'label' => esc_html__( 'Product List Type', 'partdo' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'partdo' ),
					'type1'	  => esc_html__( 'Type 1', 'partdo' ),
					'type2'	  => esc_html__( 'Type 2', 'partdo' ),
				],
			]
		);
		
		$this->add_control( 'countdown_title',
            [
                'label' => esc_html__( 'Countdown Title', 'partdo' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Remains until the end of the offer',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
        // Posts Per Page
        $this->add_control( 'post_count',
            [
                'label' => esc_html__( 'Posts Per Page', 'partdo' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => count( get_posts( array('post_type' => 'product', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default' => 3
            ]
        );
		
        $this->add_control( 'cat_filter',
            [
                'label' => esc_html__( 'Filter Category', 'partdo' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->partdo_cpt_taxonomies('product_cat'),
                'description' => 'Select Category(s)',
                'default' => '',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'post_include_filter',
            [
                'label' => esc_html__( 'Include Post', 'partdo' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->partdo_cpt_get_post_title('product'),
                'description' => 'Select Post(s) to Include',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'order',
            [
                'label' => esc_html__( 'Select Order', 'partdo' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'ASC' => esc_html__( 'Ascending', 'partdo' ),
                    'DESC' => esc_html__( 'Descending', 'partdo' )
                ],
                'default' => 'DESC'
            ]
        );
		
        $this->add_control( 'orderby',
            [
                'label' => esc_html__( 'Order By', 'partdo' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'id' => esc_html__( 'Post ID', 'partdo' ),
                    'menu_order' => esc_html__( 'Menu Order', 'partdo' ),
                    'rand' => esc_html__( 'Random', 'partdo' ),
                    'date' => esc_html__( 'Date', 'partdo' ),
                    'title' => esc_html__( 'Title', 'partdo' ),
                ],
                'default' => 'date',
            ]
        );

		$this->add_control( 'on_sale',
			[
				'label' => esc_html__( 'On Sale Products?', 'partdo' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'partdo' ),
				'label_off' => esc_html__( 'False', 'partdo' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control( 'featured',
			[
				'label' => esc_html__( 'Featured Products?', 'partdo' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'partdo' ),
				'label_off' => esc_html__( 'False', 'partdo' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control( 'best_selling',
			[
				'label' => esc_html__( 'Best Selling Products?', 'partdo' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'partdo' ),
				'label_off' => esc_html__( 'False', 'partdo' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
			
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/	
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$output = '';

		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}
	
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => $settings['post_count'],
			'order'          => 'DESC',
			'post_status'    => 'publish',
			'paged' 			=> $paged,
            'post__in'       => $settings['post_include_filter'],
            'order'          => $settings['order'],
			'orderby'        => $settings['orderby']
		);
	
		if($settings['cat_filter']){
			$args['tax_query'][] = array(
				'taxonomy' 	=> 'product_cat',
				'field' 	=> 'term_id',
				'terms' 	=> $settings['cat_filter']
			);
		}

		if($settings['best_selling']== 'true'){
			$args['meta_key'] = 'total_sales';
			$args['orderby'] = 'meta_value_num';
		}

		if($settings['featured'] == 'true'){
			$args['tax_query'] = array( array(
				'taxonomy' => 'product_visibility',
				'field'    => 'name',
				'terms'    => array( 'featured' ),
					'operator' => 'IN',
			) );
		}
		
		if($settings['on_sale'] == 'true'){
			$args['meta_key'] = '_sale_price';
			$args['meta_value'] = array('');
			$args['meta_compare'] = 'NOT IN';
		}
		
		$imagetype= '';
		$spacetype= '';
		if($settings['product_list_type'] == 'type2'){
			$imagetype .= 'medium-image';
			$spacetype .= 'large-space';
		}
	
		$output .= '<div class="products list-style small-list bordered '.esc_attr($imagetype).' '.esc_attr($spacetype).'">';

		$loop = new \WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				global $product;
				global $post;
				global $woocommerce;
			
				$id = get_the_ID();
				$allproduct = wc_get_product( get_the_ID() );

				$cart_url = wc_get_cart_url();
				$price = $allproduct->get_price_html();
				$weight = $product->get_weight();
				$stock_status = $product->get_stock_status();
				$stock_text = $product->get_availability();
				$rating = wc_get_rating_html($product->get_average_rating());
				$ratingcount = $product->get_review_count();
				$wishlist = get_theme_mod( 'partdo_wishlist_button', '0' );
				$compare = get_theme_mod( 'partdo_compare_button', '0' );
				$quickview = get_theme_mod( 'partdo_quick_view_button', '0' );
				$managestock = $product->managing_stock();
				$total_sales = $product->get_total_sales();
				$stock_quantity = $product->get_stock_quantity();
				$sale_price_dates_to    = ( $date = get_post_meta( $id, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
			
				if($managestock && $stock_quantity > 0) {
				$progress_percentage = floor($total_sales / (($total_sales + $stock_quantity) / 100)); // yuvarlama
				}
				
				$att=get_post_thumbnail_id();
				$image_src = wp_get_attachment_image_src( $att, 'full' );
				$image_src = $image_src[0];
				
				
				$output .= '<div class="'.esc_attr( implode( ' ', wc_get_product_class( '', $product->get_id()))).'">';
				$output .= '<div class="product-wrapper">';
				$output .= '<div class="product-content">';
				$output .= '<div class="thumbnail-wrapper entry-media"> ';
				$output .= '<a href="'.get_permalink().'"><img src="'.partdo_product_image().'" alt="'.the_title_attribute( 'echo=0' ).'"/></a>';
				$output .= '</div>';
				$output .= '<div class="content-wrapper">';
				if($ratingcount){	
					$output .= '<div class="product-rating">';
					$output .= $rating;
					$output .= '<div class="rating-count"> <span class="count-text">'.sprintf(_n('%d review', '%d reviews', $ratingcount, 'partdo'), $ratingcount).'</span></div>';
					$output .= '</div>';
				}
				$output .= '<h3 class="product-title"> <a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
				$output .= '<span class="price">'; 
				$output .= $price;
				$output .= '</span>';
				if($settings['product_list_type'] == 'type2'){
					$output .= '<div class="product-details">'.partdo_limit_words(get_the_excerpt(), '20').'</div>';
				}
				$output .= '</div>';
				$output .= '</div><!-- product-content -->';
				if($sale_price_dates_to){
					$output .= '<div class="klbth-countdown-wrapper">';	
					$output .= '<div class="kblth-countdown" data-date="'.esc_attr($sale_price_dates_to).'">';
					$output .= '<div class="count-item days"></div><span class="separator">:</span>';
					$output .= '<div class="count-item hours"></div><span class="separator">:</span>';
					$output .= '<div class="count-item minutes"></div><span class="separator">:</span>';
					$output .= '<div class="count-item second"></div>';
					$output .= '</div>';
					$output .= '<p class="countdown-description">'.esc_html($settings['countdown_title']).'</p>';
					$output .= '</div><!-- product-countdown -->';
				}	
				$output .= '</div><!-- product-wrapper -->';
				$output .= '</div>';

			endwhile;
		}
		wp_reset_postdata();

		$output .= '</div>';
			
		echo $output;
	}

}

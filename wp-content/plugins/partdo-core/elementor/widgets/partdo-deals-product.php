<?php

namespace Elementor;

class Partdo_Deals_Product_Widget extends Widget_Base {
    use Partdo_Helper;

    public function get_name() {
        return 'partdo-deals-product';
    }
    public function get_title() {
        return 'Deals Product (K)';
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
				'label' => esc_html__( 'Content', 'partdo-core' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'partdo-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Latest Deals for This Week',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
		$this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'partdo-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Dont miss out on this weeks deals',
                'description'=> 'Add a description.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'partdo-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'View All',
                'pleaceholder' => esc_html__( 'Enter button title here', 'partdo-core' )
            ]
        );
		
        $this->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'partdo-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'partdo-core' )
            ]
        );
		
        // Posts Per Page
        $this->add_control( 'post_count',
            [
                'label' => esc_html__( 'Posts Per Page', 'partdo' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => count( get_posts( array('post_type' => 'product', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default' => 2
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
		
		$this->end_controls_section();
		
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
		
		$this->start_controls_section('partdo_styling',
            [
                'label' => esc_html__( ' Style', 'partdo' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_control( 'title_heading',
            [
                'label' => esc_html__( 'TITLE', 'partdo-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'title_color',
			[
               'label' => esc_html__( 'Title Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-title' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'title_hvrcolor',
			[
               'label' => esc_html__( 'Title Hover Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .entry-title:hover' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'title_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'partdo-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .entry-title ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .entry-title',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .entry-title',
				
            ]
        );
		
		$this->add_control( 'description_heading',
            [
                'label' => esc_html__( 'DESCRIPTION', 'partdo-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'description_color',
			[
               'label' => esc_html__( 'Description Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-description' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'description_hvrcolor',
			[
               'label' => esc_html__( 'Description Hover Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-description:hover' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'description_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'partdo-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .entry-description ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'description_text_shadow',
				'selector' => '{{WRAPPER}} .entry-description ',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .entry-description',
				
            ]
        );
		
		$this->add_control( 'button_heading',
            [
                'label' => esc_html__( 'BUTTON', 'partdo-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'button_color',
			[
               'label' => esc_html__( 'Button Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .klbth-module-header .btn' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'button_hvrcolor',
			[
               'label' => esc_html__( 'Button Hover Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .klbth-module-header .btn:hover' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'button_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'partdo-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .klbth-module-header .btn' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'button_text_shadow',
				'selector' => '{{WRAPPER}} .klbth-module-header .btn',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .klbth-module-header .btn',
				
            ]
        );

		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/	

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
		
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

		
		$output .= '<div class="klbth-module klbth-module-deals">';
		$output .= '<div class="klbth-module-header with-border color-default counter-deactive align-default">';
		$output .= '<h3 class="entry-title">'.partdo_sanitize_data($settings['title']).'</h3>';
		$output .= '<div class="entry-description">';
		$output .= '<p>'.esc_html($settings['desc']).'</p>';
		$output .= '</div><a class="btn link" '.esc_attr($target.$nofollow).' href="'.esc_url($settings['btn_link']['url']).'"> '.esc_html($settings['btn_title']).' <i class="klbth-icon-arrow-right-long"></i></a>';
		$output .= '</div>';
		$output .= '<div class="klbth-module-body">';
		$output .= '<div class="row">';  
		
		$loop = new \WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				global $product;
				global $post;
				global $woocommerce;
			
				$id = get_the_ID();
				$allproduct = wc_get_product( get_the_ID() );
				
				$att=get_post_thumbnail_id();
				$image_src = wp_get_attachment_image_src( $att, 'full' );
				$image_src = $image_src[0];
				$imageresize = partdo_resize( $image_src, 304, 173, true, true, true );

				$cart_url = wc_get_cart_url();
				$price = $allproduct->get_price_html();
				$weight = $product->get_weight();
				$stock_status = $product->get_stock_status();
				$managestock = $product->managing_stock();
				$stock_text = $product->get_availability();
				$short_desc = $product->get_short_description();
				$rating = wc_get_rating_html($product->get_average_rating());
				$ratingcount = $product->get_review_count();
				$wishlist = get_theme_mod( 'partdo_wishlist_button', '0' );
				$compare = get_theme_mod( 'partdo_compare_button', '0' );
				$quickview = get_theme_mod( 'partdo_quick_view_button', '0' );

				if( $product->is_type('variable') ) {
					$variation_ids = $product->get_visible_children();
					$variation = wc_get_product( $variation_ids[0] );
			
					$sale_price_dates_to = ( $date = get_post_meta( $variation_ids[0], '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
				} else {
					$sale_price_dates_to = ( $date = get_post_meta( $id, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
				}

				$managestock = $product->managing_stock();
				$stock_quantity = $product->get_stock_quantity();
				$stock_format = esc_html__('Only %s left in stock','partdo');
				$stock_poor = '';
				if($managestock && $stock_quantity < 10) {
					$stock_poor .= '<div class="product-message color-danger">'.sprintf($stock_format, $stock_quantity).'</div>';
				}
				
				$total_sales = $product->get_total_sales();
				$total_stock = $total_sales + $stock_quantity;
				
				if($managestock && $stock_quantity > 0) {
				$progress_percentage = floor($total_sales / (($total_sales + $stock_quantity) / 100)); // yuvarlama
				}
				
				
				$output .= '<div class="col col-12 col-md-6">';  
				$output .= '<div class="deal-item">';  
				$output .= partdo_sale_percentage();
				$output .= '<div class="'.esc_attr( implode( ' ', wc_get_product_class( '', $product->get_id()))).'"> ';  
				$output .= '<div class="product-wrapper">';   
				$output .= '<div class="product-content">';   						
				$output .= '<div class="thumbnail-wrapper entry-media">';   
				$output .= '<a href="'.get_permalink().'"><img src="'.partdo_product_image().'" alt="'.the_title_attribute( 'echo=0' ).'"></a>';  
				$output .= '<div class="product-buttons">';  
				
					ob_start();
					do_action('partdo_wishlist_action');
					$output .= ob_get_clean();
					
					ob_start();
					$output .= do_action('partdo_compare_action');
					$output .= ob_get_clean();
					
					if($quickview == '1'){
						$output .= '<a class="detail-bnt quickview" data-product_id="'.$product->get_id().'"><i class="klbth-icon-eye-empty"></i></a>';
					}
					
				$output .= '</div>';  
				$output .= '</div>';  					
				$output .= '<div class="content-wrapper">';  
				
				if(partdo_vendor_name()){		
					$output .= partdo_vendor_name();
				}
				
				$output .= '<h3 class="product-title"> <a href="'.get_permalink().'">'.get_the_title().'</a></h3>';  
										
				if($ratingcount){	
					$output .= '<div class="product-rating">';
					$output .= $rating;
					$output .= '<div class="rating-count"> <span class="count-text">'.sprintf(_n('%d review', '%d reviews', $ratingcount, 'partdo'), $ratingcount).'</span></div>';
					$output .= '</div>';
				}
										
				$output .= '<span class="price"> ';  
					$output .= $price;
				$output .= '</span>';
				if($managestock && $stock_quantity > 0) {
					$output .= '<div class="product-progress-wrapper">';
					$output .= '<div class="product-progress"> <span class="progress" style="width:'.esc_attr($progress_percentage).'%"> </span><span class="not-progress"></span></div>';
					$output .= '<div class="product-progress-count"> ';
					$output .= '<div class="available">'.esc_html__('Available:','partdo').'<strong>'.esc_html($total_stock).'</strong>';
					$output .= '</div>';
					$output .= '<div class="sold">'.esc_html__('Sold:','partdo').' <strong>'.esc_html($total_sales).'</strong>';
					$output .= '</div>';
					$output .= '</div>';
					$output .= '</div>';
				}
				$output .= '</div>';  				
				$output .= '</div>';  
				$output .= '</div>';  
				$output .= '</div>';  
				$output .= '</div>';  
				$output .= '</div>';  
			endwhile;
		}
		wp_reset_postdata();		
					
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		
		echo $output;
	}

}

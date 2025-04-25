<?php

namespace Elementor;

class Partdo_Home_Slider_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'partdo-home-slider';
    }
    public function get_title() {
        return 'Home Slider (K)';
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
		
		$this->add_control( 'slider_type',
			[
				'label' => esc_html__( 'Slider Type', 'partdo-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'partdo-core' ),
					'type1'	  => esc_html__( 'Type 1', 'partdo-core' ),
					'type2'	  => esc_html__( 'Type 2', 'partdo-core' ),
					'type3'	  => esc_html__( 'Type 3', 'partdo-core' ),
					'type4'	  => esc_html__( 'Type 4', 'partdo-core' ),
				],
			]
		);
		
		$this->add_control( 'auto_play',
			[
				'label' => esc_html__( 'Auto Play', 'partdo-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'partdo-core' ),
				'label_off' => esc_html__( 'False', 'partdo-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);

        $this->add_control( 'auto_speed',
            [
                'label' => esc_html__( 'Auto Speed', 'chakta' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '1600',
                'pleaceholder' => esc_html__( 'Set auto speed.', 'chakta' ),
				'condition' => ['auto_play' => 'true']
            ]
        );
		
		$this->add_control( 'dots',
			[
				'label' => esc_html__( 'Dots', 'partdo-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'partdo-core' ),
				'label_off' => esc_html__( 'False', 'partdo-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		
		$this->add_control( 'arrows',
			[
				'label' => esc_html__( 'Arrows', 'partdo-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'partdo-core' ),
				'label_off' => esc_html__( 'False', 'partdo-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

        $this->add_control( 'slide_speed',
            [
                'label' => esc_html__( 'Slide Speed', 'partdo-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '600',
                'pleaceholder' => esc_html__( 'Set slide speed.', 'partdo-core' ),
            ]
        );
		
		$defaultbg = plugins_url( 'images/slider-01.jpg', __DIR__ );
		
		$repeater = new Repeater();
        $repeater->add_control( 'slider_image',
            [
                'label' => esc_html__( 'Image', 'partdo-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control( 'slider_title',
            [
                'label' => esc_html__( 'Item Title', 'chakta' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'When Buying Parts With Installation',
                'pleaceholder' => esc_html__( 'Enter item title here.', 'chakta' )
            ]
        );
		
        $repeater->add_control( 'slider_subtitle',
            [
                'label' => esc_html__( 'Item Subtitle', 'chakta' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'This Week Only for World Premier',
                'pleaceholder' => esc_html__( 'Enter item subtitle here.', 'chakta' )
            ]
        );
		
        $repeater->add_control( 'slider_desc',
            [
                'label' => esc_html__( 'Item Description', 'chakta' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Installation of parts in the services of, our partners. Limited time offer for only new customer, also get free shipping on orders. ',
                'pleaceholder' => esc_html__( 'Enter item desc here.', 'chakta' )
            ]
        );
		
		$repeater->add_control( 'slider_regular_price',
            [
                'label' => esc_html__( 'Item Regular Price', 'chakta' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '139.00',
                'pleaceholder' => esc_html__( 'Add a price.', 'chakta' )
            ]
        );
		
		$repeater->add_control( 'slider_sale_price',
            [
                'label' => esc_html__( 'Item Sale Price', 'chakta' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '109.00',
                'pleaceholder' => esc_html__( 'Add a price.', 'chakta' )
            ]
        );

        $repeater->add_control( 'slider_btn_title',
            [
                'label' => esc_html__( 'Button Title', 'chakta' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Shop Now',
                'pleaceholder' => esc_html__( 'Enter button title here', 'chakta' )
            ]
        );
		
        $repeater->add_control( 'slider_btn_link',
            [
                'label' => esc_html__( 'Button Link', 'chakta' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'chakta' )
            ]
        );
		
		$this->add_control( 'slider_items',
            [
                'label' => esc_html__( 'Slide Items', 'partdo-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'slider_image' => ['url' => $defaultbg],
                        'slider_title' => 'When Buying Parts With Installation',
                        'slider_subtitle' => 'This Week Only for World Premier',
                        'slider_desc' => 'Installation of parts in the services of, our partners. Limited time offer for only new customer, also get free shipping on orders. ',
						'slider_regular_price' => '139.00',
						'slider_sale_price' => '109.00',
                        'slider_btn_title' => ' Buy Now ',
                        'slider_btn_link' => '#',
                    ],
                    [
                        'slider_image' => ['url' => $defaultbg],
                        'slider_title' => 'When Buying Parts With Installation',
                        'slider_subtitle' => 'This Week Only for World Premier',
						'slider_desc' => 'Installation of parts in the services of, our partners. Limited time offer for only new customer, also get free shipping on orders. ',
						'slider_regular_price' => '139.00',
						'slider_sale_price' => '109.00',
                        'slider_btn_title' => ' Buy Now ',
                        'slider_btn_link' => '#',
                    ],
                    [
                        'slider_image' => ['url' => $defaultbg],
                        'slider_title' => 'When Buying Parts With Installation',
                        'slider_subtitle' => 'This Week Only for World Premier',
						'slider_desc' => 'Installation of parts in the services of, our partners. Limited time offer for only new customer, also get free shipping on orders. ',
						'slider_regular_price' => '139.00',
						'slider_sale_price' => '109.00',
                        'slider_btn_title' => ' Buy Now ',
                        'slider_btn_link' => '#',
                    ],
                ]
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
		
		$this->add_responsive_control( 'home_slider_alignment',
            [
                'label' => esc_html__( 'Alignment', 'partdo' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .klbth-module-slider .klbth-banner' => 'text-align: {{VALUE}};'],
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'partdo' ),
                        'icon' => 'eicon-text-align-left'
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'partdo' ),
                        'icon' => 'eicon-text-align-center'
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'partdo' ),
                        'icon' => 'eicon-text-align-right'
                    ]
                ],
                'toggle' => true,
                
            ]
        );
		
		$this->add_control( 'image_heading',
            [
                'label' => esc_html__( 'IMAGE', 'partdo-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters',
				'selector' => '{{WRAPPER}} .klbth-banner.style-inner .entry-media img',
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
		
		$this->add_control( 'subtitle_heading',
            [
                'label' => esc_html__( 'SUBTITLE', 'partdo-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'subtitle_color',
           [
               'label' => esc_html__( 'Subtitle Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => [
				   '{{WRAPPER}} .entry-subtitle' => 'color: {{VALUE}};',
					'{{WRAPPER}} .entry-heading .badge' => 'color: {{VALUE}};'  
			   ]
           ]
        );
		
		$this->add_control( 'subtitle_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'partdo-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .entry-subtitle ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .entry-subtitle',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .entry-subtitle',
				
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
               'selectors' => ['{{WRAPPER}} .entry-excerpt p' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .entry-excerpt p ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'description_text_shadow',
				'selector' => '{{WRAPPER}} .entry-excerpt p ',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .entry-excerpt p',
				
            ]
        );
		
		$this->add_control( 'price_text_heading',
            [
                'label' => esc_html__( 'PRICE TEXT', 'partdo-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'price_text_color',
           [
               'label' => esc_html__( 'Price Text Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-footer .price ' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'price_text_shadow',
				'selector' => '{{WRAPPER}} .entry-footer .price ',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .entry-footer .price',
				
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('btn_styling',
            [
                'label' => esc_html__( ' Button Style', 'partdo' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} button.btn  '
            ]
        );
		
		$this->add_control( 'btn_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'partdo-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} button.btn' => 'opacity: {{VALUE}} ;'],
            ]
        );
		
		$this->add_control( 'btn_color',
            [
                'label' => esc_html__( 'Color', 'partdo-core' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => ['{{WRAPPER}} button.btn' => 'color: {{VALUE}};']
            ]
        );
       
	    $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_border',
                'label' => esc_html__( 'Border', 'partdo-core' ),
                'selector' => '{{WRAPPER}} button.btn ',
            ]
        );
        
		$this->add_responsive_control( 'btn_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'partdo-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} button.btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
		
		$this->add_responsive_control( 'btn_padding',
            [
                'label' => esc_html__( 'Padding', 'partdo-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} button.btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],              
            ]
        );
       
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_background',
                'label' => esc_html__( 'Background', 'partdo-core' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} button.btn',
            ]
        );
		

		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		if($settings['slider_type'] == 'type4'){
			
			if ( $settings['slider_items'] ) {	
				echo '<div class="klbth-module klbth-module-slider">';
				echo '<div class="klbth-module-body">';
				echo '<div class="klbth-slider-wrapper"> ';
				echo '<div class="klbth-slider-loader">';
				echo '<div class="klbth-loader size-md color-primary border-sm"></div>';
				echo '</div>';
				echo '<div class="klbth-slider arrows-center arrow-size-lg arrows-light arrows-animate dots-style-filled dots-align-center slider-overflow slider-radius width-default" data-items="1" data-mobileitems="1" data-tabletitems="1" data-speed="'.esc_attr($settings['slide_speed']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-css="cubic-bezier(.48,0,.12,1)" data-margin="0" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-autostop="true">';
				
				foreach ( $settings['slider_items'] as $item ) {
					$target = $item['slider_btn_link']['is_external'] ? ' target="_blank"' : '';
					$nofollow = $item['slider_btn_link']['nofollow'] ? ' rel="nofollow"' : '';
					
					echo '<div class="slider-item"> ';
					echo '<div class="klbth-banner style-inner color-scheme-light space-xlg align-center justify-center hover-no-hover">';
					echo '<div class="entry-wrapper overlay-25-dark-max768 dump">';
					echo '<div class="entry-inner w-60">';
					echo '<div class="entry-heading slider-heading"><span class="badge">'.esc_html($item['slider_subtitle']).'</span>';
					echo '<h2 class="entry-title font-large-xlg">'.esc_html($item['slider_title']).'</h2>';
					echo '</div>';
					echo '<div class="entry-excerpt font-2xlg weight-300">';
					echo '<p>'.esc_html($item['slider_desc']).' </p>';
					echo '</div>';
					echo '<div class="entry-footer vertical slider-footer"><span class="price"> ';
					echo '<del aria-hidden="true"><span class="woocommerce-Price-amount amount">';
                    echo '<bdi> '.esc_html($item['slider_regular_price']).'</bdi></span></del><ins><span class="woocommerce-Price-amount amount">';
					echo '<bdi> '.esc_html($item['slider_sale_price']).'</bdi></span></ins></span>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '<div class="entry-media overlay-15-dark-min768"><img src="'.esc_url($item['slider_image']['url']).'" alt="slider image"/></div><a class="link-mask" href="'.esc_url($item['slider_btn_link']['url']).'"> </a>';
					echo '</div>';
					echo '</div>';
							
				}            
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
			}
			
		} elseif($settings['slider_type'] == 'type3'){
			
			if ( $settings['slider_items'] ) {	
				echo '<div class="klbth-module klbth-module-slider">';
				echo '<div class="klbth-module-body">';
				echo '<div class="klbth-slider-wrapper"> ';
				echo '<div class="klbth-slider-loader">';
				echo '<div class="klbth-loader size-md color-primary border-sm"></div>';
				echo '</div>';
				echo '<div class="klbth-slider arrows-center arrow-size-xlg arrows-light arrows-animate dots-style-filled dots-align-center slider-overflow slider-no-radius width-full" data-items="1" data-mobileitems="1" data-tabletitems="1" data-speed="'.esc_attr($settings['slide_speed']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-css="cubic-bezier(.48,0,.12,1)" data-margin="0" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-autostop="true">';
				
				foreach ( $settings['slider_items'] as $item ) {
					$target = $item['slider_btn_link']['is_external'] ? ' target="_blank"' : '';
					$nofollow = $item['slider_btn_link']['nofollow'] ? ' rel="nofollow"' : '';
					
					echo '<div class="slider-item"> ';
					echo '<div class="klbth-banner style-inner color-scheme-light space-xlg align-center justify-center hover-no-hover">';
					echo '<div class="entry-wrapper overlay-30-dark-max768 dump">';
					echo '<div class="entry-inner w-60">';
					echo '<div class="entry-heading slider-heading"><span class="badge">'.esc_html($item['slider_subtitle']).'</span>';
					echo '<h2 class="entry-title font-large-xlg">'.esc_html($item['slider_title']).'</h2>';
					echo '</div>';
					echo '<div class="entry-excerpt font-2xlg weight-300">';
					echo '<p>'.esc_html($item['slider_desc']).' </p>';
					echo '</div>';
					echo '<div class="entry-footer vertical slider-footer"><span class="price"> ';
					echo '<del aria-hidden="true"><span class="woocommerce-Price-amount amount">';
                    echo '<bdi> '.esc_html($item['slider_regular_price']).'</bdi></span></del><ins><span class="woocommerce-Price-amount amount">';
					echo '<bdi> '.esc_html($item['slider_sale_price']).'</bdi></span></ins></span>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '<div class="entry-media overlay-30-dark-min768"><img src="'.esc_url($item['slider_image']['url']).'" alt="slider image"/></div><a class="link-mask" href="'.esc_url($item['slider_btn_link']['url']).'"> </a>';
					echo '</div>';
					echo '</div>';
							
				}            
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';	
			}
			
		} elseif($settings['slider_type'] == 'type2'){
			
			if ( $settings['slider_items'] ) {	
				echo '<div class="klbth-module klbth-module-slider">';
				echo '<div class="klbth-module-body">';
				echo '<div class="klbth-slider-wrapper"> ';
				echo '<div class="klbth-slider-loader">';
				echo '<div class="klbth-loader size-md color-primary border-sm"></div>';
				echo '</div>';
				echo '<div class="klbth-slider arrows-center arrow-size-xlg arrows-light arrows-animate dots-style-filled dots-align-center slider-overflow slider-radius width-default" data-items="1" data-mobileitems="1" data-tabletitems="1" data-speed="'.esc_attr($settings['slide_speed']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-css="cubic-bezier(.48,0,.12,1)" data-margin="0" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-autostop="true">';
				
				foreach ( $settings['slider_items'] as $item ) {
					$target = $item['slider_btn_link']['is_external'] ? ' target="_blank"' : '';
					$nofollow = $item['slider_btn_link']['nofollow'] ? ' rel="nofollow"' : '';
					
					echo '<div class="slider-item"> ';
					echo '<div class="klbth-banner style-inner color-scheme-dark space-xlg align-center justify-start hover-no-hover">';
					echo '<div class="entry-wrapper overlay-30-dark-max768 container">';
					echo '<div class="entry-inner w-60">';
					echo '<div class="entry-heading slider-heading"><span class="badge">'.esc_html($item['slider_subtitle']).'</span>';
					echo '<h2 class="entry-title font-large-xlg">'.esc_html($item['slider_title']).'</h2>';
					echo '</div>';
					echo '<div class="entry-excerpt font-2xlg weight-300">';
					echo '<p>'.esc_html($item['slider_desc']).'</p>';
					echo '</div>';
					echo '<div class="entry-footer vertical slider-footer"><span class="price"> ';
					echo '<del aria-hidden="true"><span class="woocommerce-Price-amount amount">';
					echo '<bdi> '.esc_html($item['slider_regular_price']).'</bdi></span></del><ins><span class="woocommerce-Price-amount amount">';
					echo '<bdi> '.esc_html($item['slider_sale_price']).'</bdi></span></ins></span>';             
				if($item['slider_btn_title']){	
					echo '<div class="banner-button">';
					echo '<button href="'.esc_url($item['slider_btn_link']['url']).'" class="btn primary" '.esc_attr($target.$nofollow).'> '.esc_html($item['slider_btn_title']).' <i class="klbth-icon-arrow-right-long"></i>';
					echo '</button>';	
					echo '</div>';
				}			  
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '<div class="entry-media"><img src="'.esc_url($item['slider_image']['url']).'" alt="slider image"/></div><a class="link-mask"  href="'.esc_url($item['slider_btn_link']['url']).'" '.esc_attr($target.$nofollow).'> </a>';
					echo '</div>';
					echo '</div>';
					
				}            
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';	
			}
			
		} else {
			
			if ( $settings['slider_items'] ) {			
				echo '<div class="klbth-module klbth-module-slider">';
				echo '<div class="klbth-module-body">';
				echo '<div class="klbth-slider-wrapper"> ';
				echo '<div class="klbth-slider-loader">';
				echo '<div class="klbth-loader size-md color-primary border-sm"></div>';
				echo '</div>';
				echo '<div class="klbth-slider arrows-center arrow-size-lg arrows-light arrows-animate dots-style-filled dots-align-right slider-overflow slider-radius width-default" data-items="1" data-mobileitems="1" data-tabletitems="1" data-speed="'.esc_attr($settings['slide_speed']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-css="cubic-bezier(.48,0,.12,1)" data-margin="0" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-autostop="true">';
				
				foreach ( $settings['slider_items'] as $item ) {
					$target = $item['slider_btn_link']['is_external'] ? ' target="_blank"' : '';
					$nofollow = $item['slider_btn_link']['nofollow'] ? ' rel="nofollow"' : '';
					
					echo '<div class="slider-item"> ';
					echo '<div class="klbth-banner style-inner color-scheme-light space-xlg align-center justify-start hover-no-hover">';
					echo '<div class="entry-wrapper overlay-25-dark-max768 dump">';
					echo '<div class="entry-inner w-60">';
					echo '<div class="entry-heading slider-heading">';
					echo '<h4 class="entry-subtitle">'.esc_html($item['slider_subtitle']).'</h4>';
					echo '<h2 class="entry-title font-large-md">'.esc_html($item['slider_title']).'</h2>';
					echo '</div>';
					echo '<div class="entry-excerpt font-xlg weight-300">';
					echo '<p>'.partdo_sanitize_data($item['slider_desc']).' </p>';
					echo '</div>';
					echo '<div class="entry-footer vertical slider-footer"><span class="price">';
					echo '<del aria-hidden="true"><span class="woocommerce-Price-amount amount">';
					echo '<bdi> '.esc_html($item['slider_regular_price']).'</bdi></span></del><ins><span class="woocommerce-Price-amount amount">';
					echo '<bdi> '.esc_html($item['slider_sale_price']).'</bdi></span></ins></span>';
				if($item['slider_btn_title']){	
					echo '<div class="banner-button">';
					echo '<button href="'.esc_url($item['slider_btn_link']['url']).'" class="btn primary" '.esc_attr($target.$nofollow).'> '.esc_html($item['slider_btn_title']).' <i class="klbth-icon-arrow-right-long"></i>';
					echo '</button>';	
					echo '</div>';
				} 	
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '<div class="entry-media overlay-15-dark-min768"><img src="'.esc_url($item['slider_image']['url']).'" alt="slider image"/></div><a class="link-mask" href="'.esc_url($item['slider_btn_link']['url']).'"> </a>';
					echo '</div>';
					echo '</div>';
							
				}            
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';		
			}
		}
	}

}
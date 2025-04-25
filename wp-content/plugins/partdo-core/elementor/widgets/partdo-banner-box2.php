<?php

namespace Elementor;

class Partdo_Banner_Box2_Widget extends Widget_Base {

    public function get_name() {
        return 'partdo-banner-box2';
    }
    public function get_title() {
        return 'Banner Box 2(K)';
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
				'label' => esc_html__( 'Content', 'plugin-name' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$defaultimage = plugins_url( 'images/banner-16.jpg', __DIR__ );
		
		$repeater = new Repeater();
        $repeater->add_control( 'banner_image',
            [
                'label' => esc_html__( 'Image', 'partdo' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
            ]
        );
		
		$repeater->add_control( 'banner_width',
            [
                'label' => esc_html__( 'Width', 'partdo' ),
                'type' => Controls_Manager::SELECT,
				'default' => '80',
				'options' => [
					'30'  =>  esc_html__( '30',  'partdo' ),
					'40'  =>  esc_html__( '40',  'partdo' ),
					'50'  =>  esc_html__( '50',  'partdo' ),
					'60'  =>  esc_html__( '60',  'partdo' ),
					'70'  =>  esc_html__( '70',  'partdo' ),
					'80'  =>  esc_html__( '80',  'partdo' ),
					'90'  =>  esc_html__( '90',  'partdo' ),
					'100' =>  esc_html__( '100', 'partdo' ),
				],
            ]
        );
		
        $repeater->add_control( 'banner_title',
            [
                'label' => esc_html__( 'Title', 'partdo' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Reasade stenogt, Foppatoffel. Desäning epiktiga tipp.',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
        $repeater->add_control( 'banner_btn_title',
            [
                'label' => esc_html__( 'Button Title', 'partdo-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Shop Now',
                'pleaceholder' => esc_html__( 'Enter button title here', 'partdo-core' ),
            ]
        );
		
        $repeater->add_control( 'banner_btn_link',
            [
                'label' => esc_html__( 'Button Link', 'partdo-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'partdo-core' )
            ]
        );
		
		$this->add_control( 'banner_items',
            [
                'label' => esc_html__( 'Banner Items', 'partdo-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'banner_image' => ['url' => $defaultimage],
                        'banner_title' => 'Reasade stenogt, Foppatoffel. Desäning epiktiga tipp.',
                        'banner_width' => '80',
                        'banner_btn_title' => ' Shop Now ',
                        'banner_btn_link' => '#',
                    ],
                    [
                        'banner_image' => ['url' => $defaultimage],
                        'banner_title' => 'Reasade stenogt, Foppatoffel. Desäning epiktiga tipp.',
                        'banner_width' => '80',
                        'banner_btn_title' => ' Shop Now ',
                        'banner_btn_link' => '#',
                    ],
                    [
                        'banner_image' => ['url' => $defaultimage],
                        'banner_title' => 'Reasade stenogt, Foppatoffel. Desäning epiktiga tipp.',
                        'banner_width' => '80',
                        'banner_btn_title' => ' Shop Now ',
                        'banner_btn_link' => '#',
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
                'selectors' => ['{{WRAPPER}} .klbth-banner' => 'text-align: {{VALUE}};'],
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
				'selector' => '{{WRAPPER}} .entry-media img',
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
		
		$output = '';	
		
		if ( $settings['banner_items'] ) {
		
			echo '<div class="banner-group no-gutter">';
			foreach ( $settings['banner_items'] as $item ) {
				$target = $item['banner_btn_link']['is_external'] ? ' target="_blank"' : '';
				$nofollow = $item['banner_btn_link']['nofollow'] ? ' rel="nofollow"' : '';
					
				echo '<div class="klbth-banner style-inner color-scheme-dark space-sm align-center justify-start hover-zoom">';
				echo '<div class="entry-wrapper overlay-10-dark-max768 dump">';
				echo '<div class="entry-inner w-'.esc_attr($item['banner_width']).'">';
				echo '<div class="entry-heading banner-heading">';
				echo '<h2 class="entry-title font-2xlg">'.esc_html($item['banner_title']).'</h2>';
				echo '</div>';
				echo '<div class="entry-footer vertical banner-footer">';
				echo '<div class="banner-button">';
				echo '<button href="'.esc_url($item['banner_btn_link']['url']).'" class="btn link" '.esc_attr($target.$nofollow).'> '.esc_html($item['banner_btn_title']).' <i class="klbth-icon-arrow-right-long"></i>';
				echo '</button>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '<div class="entry-media"><img src="'.esc_url($item['banner_image']['url']).'" alt="slider image"/></div><a class="link-mask" href="'.esc_url($item['banner_btn_link']['url']).'" '.esc_attr($target.$nofollow).'> </a>';
				echo '</div>';
			}	
			echo '</div>';
		}
	}

}	
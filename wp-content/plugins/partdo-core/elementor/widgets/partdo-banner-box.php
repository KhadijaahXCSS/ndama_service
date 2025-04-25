<?php

namespace Elementor;

class Partdo_Banner_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'partdo-banner-box';
    }
    public function get_title() {
        return 'Banner Box (K)';
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
		
		$this->add_control( 'banner_type',
			[
				'label' => esc_html__( 'Banner Type', 'partdo' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'select-type',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'partdo' ),
					'type1'	  => esc_html__( 'Type 1', 'partdo' ),
					'type2'	  => esc_html__( 'Type 2', 'partdo' ),
					'type3'	  => esc_html__( 'Type 3', 'partdo' ),
					'type4'	  => esc_html__( 'Type 4', 'partdo' ),
					'type5'	  => esc_html__( 'Type 5', 'partdo' ),
					'type6'	  => esc_html__( 'Type 6', 'partdo' ),
					'type7'	  => esc_html__( 'Type 7', 'partdo' ),
					'type8'	  => esc_html__( 'Type 8', 'partdo' ),
					'type9'	  => esc_html__( 'Type 9', 'partdo' ),
				],
			]
		);
		
		$this->add_control( 'width',
            [
                'label' => esc_html__( 'Width', 'partdo' ),
                'type' => Controls_Manager::SELECT,
				'default' => '50',
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
		
		$this->add_control( 'text_color',
			[
				'label' => esc_html__( 'Text Color', 'partdo-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'select-type',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'partdo-core' ),
					'dark' 	  	  => esc_html__( 'Dark ', 'partdo-core' ),
					'light'	 	  => esc_html__( 'Light ', 'partdo-core' ),
				],
			]
		);
		
		$defaultimage = plugins_url( 'images/banner-01.jpg', __DIR__ );
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'partdo' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
            ]
        );
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'partdo' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Reasade stenogt, Foppatoffel. Desäning epiktiga tipp.',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'partdo' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'On Sale This Week',
                'description'=> 'Add a subtitle.',
				'label_block' => true,
				'condition' => ['banner_type' => ['type1','select-type','type2','type3','type4','type5','type6','type7','type9']]
            ]
        );
		
		$this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'partdo' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Plakrore maheten. Astronens ultranirad. Dod.',
                'description'=> 'Add a description.',
				'label_block' => true,
				'condition' => ['banner_type' => ['type2','type3','type4','type5','type9']]
            ]
        );
		
        $this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'partdo-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Shop Now',
                'pleaceholder' => esc_html__( 'Enter button title here', 'partdo-core' ),
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
		
		$this->add_control( 'subtitle_heading',
            [
                'label' => esc_html__( 'SUBTITLE', 'partdo-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'subtitle_bg_color',
           [
               'label' => esc_html__( 'Background Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => [
					'{{WRAPPER}} .klbth-banner .badge' => 'background-color: {{value}};',
               ]
           ]
        );
		
		$this->add_control( 'subtitle_color',
           [
               'label' => esc_html__( 'Subtitle Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .klbth-banner .badge' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .klbth-banner .badge' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .klbth-banner .badge',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .klbth-banner .badge',
				
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
		$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
		
		$output = '';	
		
		$colortype= '';
		if($settings['text_color'] == 'light'){
			$colortype .= 'light';
		} else {
			$colortype .= 'dark';
		}
		
		if($settings['banner_type'] == 'type9'){
			echo '<div class="klbth-banner style-inner color-scheme-'.esc_attr($colortype).' space-sm align-start justify-center hover-zoom">';
			echo '<div class="entry-wrapper overlay-10-dark-max768 dump">';
			echo '<div class="entry-inner w-'.esc_attr($settings['width']).'">';
			echo '<div class="entry-heading banner-heading">'; 
			if($settings['subtitle']){
			echo '<span class="badge">'.esc_html($settings['subtitle']).'</span>';
			}
			echo '<h2 class="entry-title font-banner-xlg">'.esc_html($settings['title']).' </h2>';
			echo '</div>';
			echo '<div class="entry-excerpt font-sm weight-300">';
			echo '<p>'.esc_html($settings['desc']).'  </p>';
			echo '</div>';
			echo '<div class="entry-footer vertical banner-footer">';
			if($settings['btn_title']){
			echo '<div class="banner-button">';
			echo '<button href="'.esc_url($settings['btn_link']['url']).'" class="btn link" '.esc_attr($target.$nofollow).'> '.esc_html($settings['btn_title']).' <i class="klbth-icon-arrow-right-long"></i>';
			echo '</button>';
			echo '</div>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media"><img src="'.esc_url($settings['image']['url']).'" alt="slider image"/></div><a class="link-mask" href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).'> </a>';
			echo '</div>';
		} elseif($settings['banner_type'] == 'type8'){
			echo '<div class="klbth-banner style-inner color-scheme-'.esc_attr($colortype).' space-md align-start justify-start hover-zoom">';
			echo '<div class="entry-wrapper overlay-25-dark-max768 dump">';
			echo '<div class="entry-inner w-'.esc_attr($settings['width']).'">';
			echo '<div class="entry-heading banner-heading">';
			echo '<h2 class="entry-title font-2xlg">'.esc_html($settings['title']).' </h2>';
			echo '</div>';
			echo '<div class="entry-footer vertical banner-footer">';
			if($settings['btn_title']){
			echo '<div class="banner-button">';
			echo '<button href="'.esc_url($settings['btn_link']['url']).'" class="btn link" '.esc_attr($target.$nofollow).'> '.esc_html($settings['btn_title']).' <i class="klbth-icon-arrow-right-long"></i>';
			echo '</button>';
			echo '</div>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media"><img src="'.esc_url($settings['image']['url']).'" alt="slider image"/></div><a class="link-mask" href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).'> </a>';
			echo '</div>';
		} elseif($settings['banner_type'] == 'type7'){
			echo '<div class="klbth-banner style-inner color-scheme-'.esc_attr($colortype).' space-sm align-start justify-start hover-zoom">';
			echo '<div class="entry-wrapper overlay-10-dark-max768 dump">';
			echo '<div class="entry-inner w-'.esc_attr($settings['width']).'">';
			echo '<div class="entry-heading banner-heading">';
			if($settings['subtitle']){
			echo '<span class="badge">'.esc_html($settings['subtitle']).'</span>';
			}
			echo '<h2 class="entry-title font-banner-xs">'.esc_html($settings['title']).'</h2>';
			echo '</div>';
			echo '<div class="entry-footer vertical banner-footer">';
			if($settings['btn_title']){
			echo '<div class="banner-button">';
			echo '<button href="'.esc_url($settings['btn_link']['url']).'" class="btn link" '.esc_attr($target.$nofollow).'> '.esc_html($settings['btn_title']).' <i class="klbth-icon-arrow-right-long"></i>';
			echo '</button>';
			echo '</div>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media"><img src="'.esc_url($settings['image']['url']).'" alt="slider image"/></div><a class="link-mask" href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).'> </a>';
			echo '</div>';
		} elseif($settings['banner_type'] == 'type6'){
			echo '<div class="klbth-banner style-inner color-scheme-'.esc_attr($colortype).' space-sm align-start justify-center hover-zoom">';
			echo '<div class="entry-wrapper overlay-10-dark-max768 dump">';
			echo '<div class="entry-inner w-'.esc_attr($settings['width']).'">';
			echo '<div class="entry-heading banner-heading">'; 
			if($settings['subtitle']){
			echo '<span class="badge">'.esc_html($settings['subtitle']).'</span>';
			}
			echo '<h2 class="entry-title font-banner-xs">'.esc_html($settings['title']).' </h2>';
			echo '</div>';
			echo '<div class="entry-footer vertical banner-footer">';
			if($settings['btn_title']){
			echo '<div class="banner-button">';
			echo '<button href="'.esc_url($settings['btn_link']['url']).'" class="btn link" '.esc_attr($target.$nofollow).'> '.esc_html($settings['btn_title']).' <i class="klbth-icon-arrow-right-long"></i>';
			echo '</button>';
			echo '</div>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media"><img src="'.esc_url($settings['image']['url']).'" alt="slider image"/></div><a class="link-mask" href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).'> </a>';
			echo '</div>';
		} elseif($settings['banner_type'] == 'type5'){
			echo '<div class="klbth-banner style-inner color-scheme-'.esc_attr($colortype).' space-md align-start justify-start hover-zoom">';
			echo '<div class="entry-wrapper overlay-10-dark-max768 dump">';
			echo '<div class="entry-inner w-'.esc_attr($settings['width']).'">';
			echo '<div class="entry-heading banner-heading">';
			if($settings['subtitle']){
			echo '<span class="badge">'.esc_html($settings['subtitle']).'</span>';
			}
			echo '<h2 class="entry-title font-banner-xlg">'.esc_html($settings['title']).'</h2>';
			echo '</div>';
			echo '<div class="entry-excerpt font-sm weight-300">';
			echo '<p>'.esc_html($settings['desc']).' </p>';
			echo '</div>';
			echo '<div class="entry-footer vertical banner-footer">';
			if($settings['btn_title']){
			echo '<div class="banner-button">';
			echo '<button href="'.esc_url($settings['btn_link']['url']).'" class="btn link" '.esc_attr($target.$nofollow).'> '.esc_html($settings['btn_title']).' <i class="klbth-icon-arrow-right-long"></i>';
			echo '</button>';
			echo '</div>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media"><img src="'.esc_url($settings['image']['url']).'" alt="slider image"/></div><a class="link-mask" href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).'> </a>';
			echo '</div>';
		} elseif($settings['banner_type'] == 'type4'){
			echo '<div class="klbth-banner style-inner color-scheme-'.esc_attr($colortype).' space-md align-center justify-start hover-zoom">';
			echo '<div class="entry-wrapper overlay-25-dark-max768 dump">';
			echo '<div class="entry-inner w-'.esc_attr($settings['width']).'">';
			echo '<div class="entry-heading banner-heading">';
			if($settings['subtitle']){
			echo '<span class="badge">'.esc_html($settings['subtitle']).'</span>';
			}
			echo '<h2 class="entry-title font-banner-xlg">'.esc_html($settings['title']).'</h2>';
			echo '</div>';
			echo '<div class="entry-excerpt font-sm weight-300">';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div>';
			echo '<div class="entry-footer vertical banner-footer">';
			if($settings['btn_title']){
			echo '<div class="banner-button">';
			echo '<button href="'.esc_url($settings['btn_link']['url']).'" class="btn link" '.esc_attr($target.$nofollow).'> '.esc_html($settings['btn_title']).' <i class="klbth-icon-arrow-right-long"></i>';
			echo '</button>';
			echo '</div>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media overlay-15-dark-min768"><img src="'.esc_url($settings['image']['url']).'" alt="slider image"/></div><a class="link-mask" href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).'> </a>';
			echo '</div>';
		} elseif($settings['banner_type'] == 'type3'){	
			echo '<div class="klbth-banner style-inner color-scheme-'.esc_attr($colortype).' space-sm align-center justify-start hover-zoom">';
			echo '<div class="entry-wrapper overlay-15-dark-max768 dump">';
			echo '<div class="entry-inner w-'.esc_attr($settings['width']).'">';
			echo '<div class="entry-heading banner-heading">';
			if($settings['subtitle']){
			echo '<span class="badge">'.esc_html($settings['subtitle']).'</span>';
			}
			echo '<h2 class="entry-title font-banner-sm">'.esc_html($settings['title']).' </h2>';
			echo '</div>';
			echo '<div class="entry-excerpt font-sm weight-300">';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div>';
			echo '<div class="entry-footer vertical banner-footer">';
			if($settings['btn_title']){
			echo '<div class="banner-button">';
			echo '<button href="'.esc_url($settings['btn_link']['url']).'" class="btn link" '.esc_attr($target.$nofollow).'> '.esc_html($settings['btn_title']).'<i class="klbth-icon-arrow-right-long"></i>';
			echo '</button>';
			echo '</div>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media"><img src="'.esc_url($settings['image']['url']).'" alt="slider image"/></div><a class="link-mask" href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).'> </a>';
			echo '</div>';
		} elseif($settings['banner_type'] == 'type2'){
			echo '<div class="klbth-banner style-inner color-scheme-'.esc_attr($colortype).' space-sm align-center justify-start hover-zoom">';
			echo '<div class="entry-wrapper overlay-25-dark-max768 dump">';
			echo '<div class="entry-inner w-'.esc_attr($settings['width']).'">';
			echo '<div class="entry-heading banner-heading">';
			if($settings['subtitle']){
			echo '<span class="badge">'.esc_html($settings['subtitle']).'</span>';
			}
			echo '<h2 class="entry-title font-banner-xlg">'.esc_html($settings['title']).'</h2>';
			echo '</div>';
			echo '<div class="entry-excerpt font-sm weight-300">';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div>';
			echo '<div class="entry-footer vertical banner-footer">';
			if($settings['btn_title']){
			echo '<div class="banner-button">';
			echo '<button href="'.esc_url($settings['btn_link']['url']).'" class="btn link" '.esc_attr($target.$nofollow).'>'.esc_html($settings['btn_title']).'<i class="klbth-icon-arrow-right-long"></i>';
			echo '</button>';
			echo '</div>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media overlay-15-dark-min768"><img src="'.esc_url($settings['image']['url']).'" alt="slider image"/></div><a class="link-mask" href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).'> </a>';
			echo '</div>';
		} else {
			echo '<div class="klbth-banner style-inner color-scheme-'.esc_attr($colortype).' space-sm align-center justify-start hover-zoom">';
			echo '<div class="entry-wrapper overlay-25-dark-max768 dump">';
			echo '<div class="entry-inner w-'.esc_attr($settings['width']).'">';
			echo '<div class="entry-heading banner-heading">'; 
			if($settings['subtitle']){
			echo '<span class="badge">'.esc_html($settings['subtitle']).'</span>';
			}
			echo '<h2 class="entry-title font-banner-sm">'.esc_html($settings['title']).'</h2>';
			echo '</div>';
			echo '<div class="entry-footer vertical banner-footer">';
			if($settings['btn_title']){
			echo '<div class="banner-button">';
			echo '<button href="'.esc_url($settings['btn_link']['url']).'" class="btn link" '.esc_attr($target.$nofollow).'> '.esc_html($settings['btn_title']).' <i class="klbth-icon-arrow-right-long"></i>';
			echo '</button>';
			echo '</div>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '<div class="entry-media overlay-15-dark-min768"><img src="'.esc_url($settings['image']['url']).'" alt="slider image"/></div><a class="link-mask" href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).'> </a>';
			echo '</div>';	
		}
	}

}	
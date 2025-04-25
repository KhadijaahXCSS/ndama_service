<?php

namespace Elementor;

class Partdo_Category_Banner2_Widget extends Widget_Base {
    use Partdo_Helper;
	
    public function get_name() {
        return 'partdo-category-banner2';
    }
    public function get_title() {
        return 'Category Banner 2 (K)';
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
		
		$this->add_control( 'banner_type',
			[
				'label' => esc_html__( 'Banner Type', 'partdo-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'partdo-core' ),
					'type1' 	  => esc_html__( 'Style 1', 'partdo-core' ),
					'type2'	 	  => esc_html__( 'Style 2', 'partdo-core' ),
				],
			]
		);
		
		$this->add_control( 'text_color',
			[
				'label' => esc_html__( 'Text Color', 'partdo-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'light',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'partdo-core' ),
					'dark' 	  	  => esc_html__( 'Dark ', 'partdo-core' ),
					'light'	 	  => esc_html__( 'Light ', 'partdo-core' ),
				],
			]
		);
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/	
		
		/***** START QUERY CONTROLS SECTION *****/
		$this->partdo_query_elementor_controls($post_count = 4, $column = 4);
		/***** END QUERY CONTROLS SECTION *****/
		
		/*****   START CONTROLS SECTION   ******/
		$this->start_controls_section(
			'banner_section',
			[
				'label' => esc_html__( 'Banner', 'partdo' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$defaultimage = plugins_url( 'images/banner-19.jpg', __DIR__ );
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'partdo' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
            ]
        );
		
        $this->add_control( 'banner_title',
            [
                'label' => esc_html__( 'Banner Title', 'partdo-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Reasade stenogt, Foppatoffel. Desäning epiktiga tipp.',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'banner_subtitle',
            [
                'label' => esc_html__( 'Banner Subtitle', 'partdo-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'On Sale This Week',
                'description'=> 'Add a subtitle.',
				'label_block' => true,
            ]
        );
		
		$this->add_control( 'banner_desc',
            [
                'label' => esc_html__( 'Banner Description', 'partdo-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Plakrore maheten. Astronens ultranirad. Dod. Mms pal. Fysisk cd megade vägisk. ',
                'description'=> 'Add a description.',
				'label_block' => true,
				'condition' => ['banner_type' => ['type2']]
            ]
        );	
		
        $this->add_control( 'banner_btn_title',
            [
                'label' => esc_html__( 'Button Title', 'partdo-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Shop Now',
                'pleaceholder' => esc_html__( 'Enter button title here', 'partdo-core' )
            ]
        );
		
        $this->add_control( 'banner_btn_link',
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
				'selector' => '{{WRAPPER}} .banner-column .entry-media img',
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
				'separator' => 'before',
				'condition' => ['banner_type' => ['type1','select-type']]
            ]
        );
		
		$this->add_control( 'subtitle_color',
           [
               'label' => esc_html__( 'Subtitle Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-small' => 'color: {{VALUE}};'],
			   'condition' => ['banner_type' => ['type1','select-type']]
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
                'selectors' => ['{{WRAPPER}} .entry-small' => 'opacity: {{VALUE}} ;'],
				'condition' => ['banner_type' => ['type1','select-type']]
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .entry-small',
				'condition' => ['banner_type' => ['type1','select-type']]
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .entry-small',
				'condition' => ['banner_type' => ['type1','select-type']]
				
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
		$target = $settings['banner_btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['banner_btn_link']['nofollow'] ? ' rel="nofollow"' : '';
		
		$output = '';
		
		$terms = get_terms( array(
			'taxonomy' => 'product_cat',
			'hide_empty' => true,
			'parent'    => 0,
			'include'   => $settings['cat_filter'],
			'order'          => $settings['order'],
			'orderby'        => $settings['orderby']
		) );
		
		$bannertype= '';
		$bordertype= '';
		if($settings['banner_type'] == 'type2'){
			$bannertype .= 'style-4';
			$bordertype .= 'image-right';
			
		}else {
			$bannertype .= 'style-2';
			$bordertype .= 'image-dump';
		}
		
		$colortype= '';
		if($settings['text_color'] == 'light'){
			$colortype .= 'light';
		} else {
			$colortype .= 'dark';
		}
		

		$output .= '<div class="klbth-module klbth-module-category-products '.esc_attr($bannertype).'">';	
		$output .= '<div class="klbth-module-body">';
		$output .= '<div class="klbth-module-wrapper '.esc_attr($bordertype).'">';
		
		$output .= '<div class="block-column products-column">';
		$output .= '<div class="products gutter-0 column-'.esc_attr($settings['column']).' mobile-'.esc_attr($settings['mobile_column']).'">';


		$output .= $this->partdo_elementor_product_loop($settings);


		$output .= '</div>';
		$output .= '</div><!-- column -->';
		
		if($settings['banner_type'] == 'type2'){
			$output .= '<div class="block-column banner-column">';
			$output .= '<div class="klbth-banner style-inner color-scheme-'.esc_attr($colortype).' space-md align-start justify-start hover-zoom">';
			$output .= '<div class="entry-wrapper overlay-25-dark-max768 dump">';
			$output .= '<div class="entry-inner w-70">';
			$output .= '<div class="entry-heading banner-heading"><span class="badge">'.esc_html($settings['banner_subtitle']).'</span>';
			$output .= '<h2 class="entry-title font-banner-xlg">'.esc_html($settings['banner_title']).'</h2>';
			$output .= '</div>';
			$output .= '<div class="entry-excerpt font-sm weight-300">';
			$output .= '<p>'.esc_html($settings['banner_desc']).' </p>';
			$output .= '</div>';
			$output .= '<div class="entry-footer vertical banner-footer">';
			$output .= '<div class="banner-button">';
			$output .= '<button href="'.esc_url($settings['banner_btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="btn link"> '.esc_html($settings['banner_btn_title']).' <i class="klbth-icon-arrow-right-long"></i>';
			$output .= '</button>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '<div class="entry-media"><img src="'.esc_url($settings['image']['url']).'" alt="slider image"/></div><a class="link-mask" href="'.esc_url($settings['banner_btn_link']['url']).'" '.esc_attr($target.$nofollow).'> </a>';
			$output .= '</div>';
			$output .= '</div>';
		} else {
			$output .= '<div class="block-column banner-column">';
			$output .= '<div class="klbth-banner style-inner color-scheme-'.esc_attr($colortype).' space-sm align-start justify-start hover-zoom">';
			$output .= '<div class="entry-wrapper overlay-25-dark-max768 dump">';
			$output .= '<div class="entry-inner w-90">';
			$output .= '<div class="entry-heading banner-heading">';
			$output .= '<div class="entry-small">'.esc_html($settings['banner_subtitle']).'</div>';
			$output .= '<h2 class="entry-title font-3xlg">'.esc_html($settings['banner_title']).' </h2>';
			$output .= '</div>';
			$output .= '<div class="entry-footer vertical banner-footer">';
			$output .= '<div class="banner-button">';
			$output .= '<button href="'.esc_url($settings['banner_btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="btn link"> '.esc_html($settings['banner_btn_title']).' <i class="klbth-icon-arrow-right-long"></i>';
			$output .= '</button>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '<div class="entry-media"><img src="'.esc_url($settings['image']['url']).'" alt="slider image"/></div><a class="link-mask" href="'.esc_url($settings['banner_btn_link']['url']).'" '.esc_attr($target.$nofollow).'> </a>';
			$output .= '</div>';
			$output .= '</div>';
		}

		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';

		echo $output;

		
	}

}

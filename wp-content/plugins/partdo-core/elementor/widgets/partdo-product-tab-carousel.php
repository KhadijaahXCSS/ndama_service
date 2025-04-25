<?php

namespace Elementor;

class Partdo_Product_Tab_Carousel_Widget extends \Elementor\Widget_Base {
    use Partdo_Helper;
    public function get_name() {
        return 'partdo-product-tab-carousel';
    }
    public function get_title() {
        return 'Product Tab Carousel (K)';
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
				'label' => esc_html__( 'Products', 'partdo' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control( 'header_type',
			[
				'label' => esc_html__( 'Header Type', 'partdo-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'partdo-core' ),
					'type1' 	  => esc_html__( 'Style 1', 'partdo-core' ),
					'type2'	 	  => esc_html__( 'Style 2', 'partdo-core' ),
				],
			]
		);
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'partdo' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Featured Products',				
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
                'label' => esc_html__( 'Auto Speed', 'partdo' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '1600',
                'pleaceholder' => esc_html__( 'Set auto speed.', 'partdo' ),
				'condition' => ['auto_play' => 'true']
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
		
        $this->add_control( 'slide_speed',
            [
                'label' => esc_html__( 'Slide Speed', 'partdo-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '600',
                'pleaceholder' => esc_html__( 'Set slide speed.', 'partdo-core' ),
            ]
        );
		
		$this->end_controls_section();
		
		/*****   END CONTROLS SECTION   ******/
		
		/***** START QUERY CONTROLS SECTION *****/
		$this->partdo_query_elementor_controls($post_count = 8, $column = 5, $carousel = 'yes');
		/***** END QUERY CONTROLS SECTION *****/
		
        /*****   START CONTROLS SECTION   ******/
		
		$this->start_controls_section('partdo_styling',
            [
                'label' => esc_html__( ' Style', 'partdo' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_control( 'category_heading',
            [
                'label' => esc_html__( 'CATEGORY', 'partdo-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'category_color',
			[
               'label' => esc_html__( 'Category Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .klbth-module-header .klbt-module-tab-links li a' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'category_hvrcolor',
			[
               'label' => esc_html__( 'Category Hover Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .klbth-module-header .klbt-module-tab-links li.active a' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'category_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'partdo-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .klbth-module-header .klbt-module-tab-links li a ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'category_text_shadow',
				'selector' => '{{WRAPPER}} .klbth-module-header .klbt-module-tab-links li a',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'category_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .klbth-module-header .klbt-module-tab-links li a',
				
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
		$cat_filter = '';

		
		$include = array();
		$exclude = array();
		
		$portfolio_filters = get_terms(array(
			'taxonomy' => 'product_cat',
			'include' => $settings['cat_filter'],
		));
		
		if($settings['header_type'] == 'type2'){
			$headertype = 'style-2';
			
		} else{
			$headertype = 'style-1';
			
		}
		
		if($portfolio_filters){
			$cat_filter .= '<h3 class="entry-title">'.esc_html($settings['title']).'</h3>';
			$cat_filter .= '<nav class="klbt-module-tab-links '.esc_attr($headertype).'">'; 
			$cat_filter .= '<ul>'; 
		  
			foreach($portfolio_filters as $portfolio_filter){
		
				$active_class = '';
				if($settings['cat_filter'] && reset($settings['cat_filter']) == $portfolio_filter->term_id){
					$active_class .= 'active';
				}
				
				$cat_filter .= '<li class="tab-item '.esc_attr($active_class).'"><a class="tab-link" href="#'.esc_attr($portfolio_filter->slug).'" id="'.esc_attr($portfolio_filter->term_id).'">'.esc_html($portfolio_filter->name).'</a></li>';
			}
	
			$cat_filter .= '</ul>';
			$cat_filter .= '</nav>';
			$cat_filter .= '<a class="btn link" href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).'> '.esc_html($settings['btn_title']).'<i class="klbth-icon-arrow-right-long"></i></a>';	
		}
		
		$output .= '<div class="klb-products-tab  klbth-slider-wrapper"> ';
		$output .= '<div class="klbth-slider-loader">';
		$output .= '<div class="klbth-loader size-md color-primary border-sm"></div>';
		$output .= '</div>';
		$output .= '<div class="klbth-slider klbth-carousel arrows-center arrow-size-def arrows-light arrows-animate dots-style-def dots-align-def slider-noflow slider-no-radius products" data-items="'.esc_attr($settings['column']).'" data-mobileitems="'.esc_attr($settings['mobile_column']).'" data-tabletitems="3" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-speed="'.esc_attr($settings['slide_speed']).'" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-autostop="true" data-css="cubic-bezier(.48,0,.12,1)" data-margin="30">';
		
		$output .= $this->partdo_elementor_product_loop($settings, $producttype = 'yes', $widget = 'tabcarousel'); 
		
		$output .= '</div>';
		$output .= '</div>';
		
		echo  '<div class="klbth-module klbth-module-carousel">
				  <div class="klbth-module-header with-border color-default counter-deactive align-default">
					'.$cat_filter.'
				  </div>
				  <div class="tab-view klbth-module-body">
					'.$output.'
				  </div>
				</div>';
		
		
	}

}

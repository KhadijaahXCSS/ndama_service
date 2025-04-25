<?php

namespace Elementor;

class Partdo_Product_Search_Widget extends Widget_Base {
	use Partdo_Helper;
	
    public function get_name() {
        return 'partdo-product-search';
    }
    public function get_title() {
        return 'Product Search (K)';
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
                'default' => 'Find your autopart',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'partdo-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s.',
				'label_block' => true,
            ]
        );
		
		$repeater = new Repeater();
        $repeater->add_control( 'attribute_name',
            [
                'label' => esc_html__( 'Filter Attributes', 'partdo-core' ),
                'type' => Controls_Manager::SELECT,
                'multiple' => true,
                'options' => $this->partdo_woo_attributes(),
                'description' => 'Select Attribute',
                'default' => '',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'attribute_items',
            [
                'label' => esc_html__( 'Attributes', 'partdo-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
						'attributes' => '',
                    ],
                    [
						'attributes' => '',
                    ],

                ]
            ]
        );
		
        $this->add_control( 'button_text',
            [
                'label' => esc_html__( 'Button text', 'partdo-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Find Auto Parts',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Button Subtitle', 'partdo-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Please fill in the criteria you are looking for',
				'label_block' => true,
            ]
        );


        $this->add_control( 'order',
            [
                'label' => esc_html__( 'Select Order', 'partdo-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'ASC' => esc_html__( 'Ascending', 'partdo-core' ),
                    'DESC' => esc_html__( 'Descending', 'partdo-core' )
                ],
                'default' => 'ASC'
            ]
        );
		
        $this->add_control( 'orderby',
            [
                'label' => esc_html__( 'Order By', 'partdo-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'id' => esc_html__( 'Post ID', 'partdo-core' ),
                    'menu_order' => esc_html__( 'Menu Order', 'partdo-core' ),
                    'rand' => esc_html__( 'Random', 'partdo-core' ),
                    'date' => esc_html__( 'Date', 'partdo-core' ),
                    'title' => esc_html__( 'Title', 'partdo-core' ),
                ],
                'default' => 'menu_order',
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
		
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'bg_color',
                'label' => esc_html__( 'Background Color', 'partdo-core' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .klbth-module-search',
            ]
        );
		
		$this->add_control( 'border_color',
           [
               'label' => esc_html__( '	Border Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => [
					'{{WRAPPER}} .klbth-module-search' => 'border-color: {{value}};',
               ]
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
		
		$this->add_control( 'desc_heading',
            [
                'label' => esc_html__( 'DESCRIPTION', 'partdo-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'desc_border_color',
           [
               'label' => esc_html__( 'Border Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => [
					'{{WRAPPER}} .klbth-module-search .module-search-header' => 'border-bottom-color: {{value}};',
               ]
           ]
        );
		
		$this->add_control( 'desc_color',
			[
               'label' => esc_html__( 'Description Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-description' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'desc_hvrcolor',
			[
               'label' => esc_html__( 'Description Hover Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-description:hover' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'desc_opacity_important_style',
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
				'name' => 'desc_text_shadow',
				'selector' => '{{WRAPPER}} .entry-description ',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .entry-description',
				
            ]
        );
		
		$this->add_control( 'button_subtitle_heading',
            [
                'label' => esc_html__( 'BUTTON SUBTITLE', 'partdo-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'button_subtitle_color',
			[
               'label' => esc_html__( 'Button Subtitle Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .service-description' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'button_subtitle_hvrcolor',
			[
               'label' => esc_html__( 'Button Subtitle Hover Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .service-description:hover' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'button_subtitle_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'partdo-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .service-description ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'button_subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .service-description',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_subtitle_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .service-description',
				
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
		
		echo '<div class="klbth-module klbth-module-search">';
		echo '<div class="module-body"> ';
		echo '<div class="module-search-header"> ';
		echo '<h3 class="entry-title">'.esc_html($settings['title']).'</h3>';
		echo '<div class="entry-description"> ';
		echo '<p>'.esc_html($settings['desc']).'</p>';
		echo '</div>';
		echo '</div>';
		echo '<div class="module-search-form"> ';
		
		
		if($settings['attribute_items']){
			wp_enqueue_script('partdo-attribute-filter');
			
			echo '<form class="service-search-form" id="klb-attribute-filter" action="' . wc_get_page_permalink( 'shop' ) . '" method="get">';
			
			
				foreach($settings['attribute_items'] as $item){
					$terms = get_terms( 'pa_'.$item['attribute_name'], array(
			            'order'          => $settings['order'],
						'orderby'        => $settings['orderby'],
						'hide_empty' => true,
						'parent' => 0,
					));
					
					$label_name = wc_attribute_label( 'pa_'.$item['attribute_name'] );

					echo '<div class="form-column"> ';
					echo '<select class="theme-select" name="filter_'.esc_attr($item['attribute_name']).'" id="filter_'.esc_attr($item['attribute_name']).'" tax="pa_'.$item['attribute_name'].'" data-placeholder="'.esc_attr__('Select','partdo-core').' '.esc_attr($label_name).'" data-search="true" data-searchplaceholder="'.esc_attr__('Search item...', 'partdo-core').'">';
					echo '<option value="">'.sprintf(esc_html__('Select %s','partdo-core'), $label_name).'</option>';
					foreach ($terms as $term) {
						echo '<option id="'.esc_attr($term->term_id).'" value="'.esc_attr($term->slug).'">'.esc_html($term->name).'</option>';
					}
					echo '</select>';
					echo '</div>';
					
					$childcount = 1;
					foreach ($terms as $term) {
						$term_children = get_term_children( $term->term_id, 'pa_'.$item['attribute_name'] );
						
						if($term_children && $childcount == 1){
							echo '<div class="form-column"> ';
							echo '<select class="child-attr theme-select" id="child_filter_'.esc_attr($item['attribute_name']).'" name="filter_'.esc_attr($item['attribute_name']).'" data-placeholder="'.esc_attr__('Select','partdo-core').' '.esc_attr__('Model','partdo-core').'" data-search="true" data-searchplaceholder="'.esc_attr__('Search item...', 'partdo-core').'" disabled>';
							echo '<option value="0">'.sprintf(esc_html__('Select %s First','partdo-core'), $item['attribute_name']).'</option>';
							echo '</select>';
							echo '</div>';
						}
						$childcount++;
					}
					
					echo '<input type="text" id="klb_filter_'.esc_attr($item['attribute_name']).'" name="filter_'.esc_attr($item['attribute_name']).'" value="" hidden/>';
				}
			
				echo '<div class="form-column button-column"> ';
				echo '<button class="btn primary">'.esc_html($settings['button_text']).'</button>';
				echo '</div>';
			
			echo '</form>';
		}
		
		echo '<div class="service-description"> ';
		echo '<p>'.esc_html($settings['subtitle']).'</p>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		
	}

}

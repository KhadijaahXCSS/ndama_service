<?php

namespace Elementor;

class Partdo_Product_Grid_Widget extends Widget_Base {
    use Partdo_Helper;

    public function get_name() {
        return 'partdo-product-grid';
    }
    public function get_title() {
        return 'Product Grid (K)';
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
		
		$this->add_control( 'grid_type',
			[
				'label' => esc_html__( 'Product Grid Type', 'partdo-core' ),
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
                'label' => esc_html__( 'Title', 'partdo-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Latest Deals for This Week',
                'description'=> 'Add a title.',
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
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
		/***** START QUERY CONTROLS SECTION *****/
		$this->partdo_query_elementor_controls($post_count = 5, $column = 5);
		/***** END QUERY CONTROLS SECTION *****/
		
		/* Countdown Start*/
		$this->start_controls_section(
			'countdown_section',
			[
				'label' => esc_html__( 'Countdown', 'partdo' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control( 'countdown',
			[
				'label' => esc_html__( 'Countdown', 'partdo-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'partdo-core' ),
				'label_off' => esc_html__( 'False', 'partdo-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control('due_date',
			[
				'label' => esc_html__( 'Due Date', 'partdo-core' ),
				'type' => Controls_Manager::DATE_TIME,
				'default' => '2022/12/15',
				'picker_options' => ['enableTime' => false],
				'condition' => ['countdown' => 'true']
			]
		);
		
        $this->add_control( 'countdown_title',
            [
                'label' => esc_html__( 'Countdown Title', 'partdo-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Remains until the end of the offer',
                'description'=> 'Remains until the end of the offer',
				'label_block' => true,
				'condition' => ['countdown' => 'true']
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
		
		$this->add_control( 'border_color',
           [
               'label' => esc_html__( 'Border Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => [
					'{{WRAPPER}} .klbth-module-header.color-danger' => 'border-bottom-color: {{value}};',
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
		
		$this->add_control( 'countdown_heading',
            [
                'label' => esc_html__( 'COUNTDOWN', 'partdo-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'countdown_bg_color',
           [
               'label' => esc_html__( 'Background Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => [
					'{{WRAPPER}} .klbth-countdown-wrapper .kblth-countdown' => 'background: {{value}};',
               ]
           ]
        );
		
		$this->add_control( 'countdown_color',
			[
               'label' => esc_html__( 'Countdown Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .klbth-countdown-wrapper .kblth-countdown' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'countdown_title_heading',
            [
                'label' => esc_html__( 'COUNTDOWN TITLE', 'partdo-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'countdown_subtitle_color',
			[
               'label' => esc_html__( 'Countdown Title Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .countdown-description' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'countdown_title_hvrcolor',
			[
               'label' => esc_html__( 'Countdown Title Hover Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .countdown-description:hover' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'countdown_title_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'partdo-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .countdown-description ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'countdown_title_text_shadow',
				'selector' => '{{WRAPPER}} .countdown-description ',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'countdown_title_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .countdown-description',
				
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
		
		$bordertype= '';
		$guttertype= '';
		
		if($settings['grid_type'] == 'type2'){
			$bordertype .= 'boxed';
			$guttertype .= 'gutter-0';
		} else {
			$bordertype .= 'dumps';
			$guttertype .= 'gutter-30';
		}
		

		$output .= '<div class="klbth-module klbth-module-product-grid '.esc_attr($bordertype).'">';
		
		if($settings['title']){
			$output .= '<div class="klbth-module-header with-border color-danger counter-active align-default">';
			$output .= '<h3 class="entry-title">'.esc_html($settings['title']).'</h3>';
			
			if($settings['countdown'] == 'true'){
				$date = date_create($settings['due_date']);
				$output .= '<div class="klbth-countdown-wrapper">';
				$output .= '<div class="kblth-countdown" data-date="'.esc_attr(date_format($date,"Y/m/d")).'">';
				$output .= '<div class="count-item days"></div><span class="separator">:</span>';
				$output .= '<div class="count-item hours"></div><span class="separator">:</span>';
				$output .= '<div class="count-item minutes"></div><span class="separator">:</span>';
				$output .= '<div class="count-item second"></div>';
				$output .= '</div>';
				$output .= '<p class="countdown-description">'.esc_html($settings['countdown_title']).'</p>';
				$output .= '</div>';
			}
			
			$output .= '<a class="btn link" href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).'> '.esc_html($settings['btn_title']).' <i class="klbth-icon-arrow-right-long"></i></a>';
			$output .= '</div>';
		}
		
		$output .= '<div class="module-wrapper">';
		$output .= '<div class="products '.esc_attr($guttertype).' column-'.esc_attr($settings['column']).' mobile-'.esc_attr($settings['mobile_column']).' total-'.esc_attr($settings['post_count']).'">';
		
		$output .= $this->partdo_elementor_product_loop($settings);
		
		
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';



		echo $output;
	}

}

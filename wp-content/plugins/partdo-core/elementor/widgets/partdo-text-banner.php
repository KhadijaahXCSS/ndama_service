<?php

namespace Elementor;

class Partdo_Text_Banner_Widget extends Widget_Base {

    public function get_name() {
        return 'partdo-text-banner';
    }
    public function get_title() {
        return 'Text Banner (K)';
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
				'label' => esc_html__( 'Banner Type', 'partdo-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'partdo-core' ),
					'type1'	  => esc_html__( 'Type 1', 'partdo-core' ),
					'type2'	  => esc_html__( 'Type 2', 'partdo-core' ),
				],
			]
		);
		
		$this->add_control( 'coupon_sale',
            [
                'label' => esc_html__( 'Coupon Sale', 'partdo-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => '-39',
                'description'=> 'Add a coupon sale.',
				'label_block' => true,
				'condition' => ['banner_type' => ['type1','select-type']]
            ]
        );

        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'partdo-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Super discount for your first purchase',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'coupon_code',
            [
                'label' => esc_html__( 'Coupon Code', 'partdo-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'FREE15FIRST',
                'description'=> 'Add a coupon code.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'partdo-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Use discount code in checkout page.',
                'description'=> 'Add a subtitle.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'partdo-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'partdo-core' ),
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
		
		$this->add_control( 'bg_color',
           [
               'label' => esc_html__( 'Background Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '#FFF5F5',
               'selectors' => [
					'{{WRAPPER}} .klbth-coupon-banner a' => 'background-color: {{value}};',
               ]
           ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cpn_border',
                'label' => esc_html__( 'Border', 'partdo-core' ),
                'selector' => '{{WRAPPER}} .klbth-coupon-banner a',
            ]
        );
		
		$this->add_responsive_control( 'cpn_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'partdo-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .klbth-coupon-banner a ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
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
               'selectors' => ['{{WRAPPER}} .coupon-title' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .coupon-title ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .coupon-title',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .coupon-title',
				
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
               'selectors' => ['{{WRAPPER}} .coupon-description' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .coupon-description ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .coupon-description',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .coupon-description',
            ]
        );
		
		$this->add_control( 'coupon_sale_heading',
            [
                'label' => esc_html__( 'COUPON SALE', 'partdo-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => ['banner_type' => ['type1','select-type']]
            ]
        );
		
		$this->add_control( 'coupon_sale_color',
			[
               'label' => esc_html__( 'Coupon Sale Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .coupon-sale' => 'color: {{VALUE}};'],
			   'condition' => ['banner_type' => ['type1','select-type']]
			]
        );
		
		$this->add_control( 'coupon_sale_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'partdo-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .coupon-sale ' => 'opacity: {{VALUE}} ;'],
				'condition' => ['banner_type' => ['type1','select-type']]
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'coupon_sale_text_shadow',
				'selector' => '{{WRAPPER}} .coupon-sale ',
				'condition' => ['banner_type' => ['type1','select-type']]
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'coupon_sale_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .coupon-sale',
				'condition' => ['banner_type' => ['type1','select-type']]
				
            ]
        );
		
		$this->add_control( 'coupon_heading',
            [
                'label' => esc_html__( 'COUPON', 'partdo-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'coupon_bg_color',
           [
               'label' => esc_html__( 'Background Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => [
					'{{WRAPPER}} .coupon-code' => 'background-color: {{value}};',
               ],
			   'condition' => ['banner_type' => ['type2']]
           ]
        );
		
		$this->add_control( 'coupon_color',
			[
               'label' => esc_html__( 'Coupon Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .coupon-code' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'coupon_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'partdo-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .coupon-code ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'coupon_text_shadow',
				'selector' => '{{WRAPPER}} .coupon-code ',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'coupon_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .coupon-code',
				
            ]
        );
		
		
		$this->end_controls_section();
		
		/*****   END CONTROLS SECTION   ******/
		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';

		if($settings['banner_type'] == 'type2'){
			echo '<div class="klbth-coupon-banner style-2">';
			echo '<a class="coupon-wrapper" href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).'>';
			echo '<div class="coupon-title">'.partdo_sanitize_data($settings['title']).'</div>';
			echo '<div class="coupon-code">'.esc_html($settings['coupon_code']).'</div>';
			echo '<div class="coupon-description">'.esc_html($settings['subtitle']).'</div>';
			echo '</a>';
			echo '</div>';
		} else {	
			echo '<div class="klbth-coupon-banner style-1">';
			echo '<a class="coupon-wrapper" href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).'>';
			echo '<div class="coupon-sale">'.esc_html($settings['coupon_sale']).'<span>%</span></div>';
			echo '<div class="text-wrap">';
			echo '<div class="coupon-title">'.partdo_sanitize_data($settings['title']).'</div>';
			echo '<div class="coupon-description">'.esc_html($settings['subtitle']).'</div>';
			echo '</div>';
			echo '<div class="sale-overflow">'.esc_html($settings['coupon_sale']).'<span>%</span></div>';
			echo '<div class="coupon-code">'.esc_html($settings['coupon_code']).'</div>';
			echo '</a>';
			echo '</div>';
		}

	}

}

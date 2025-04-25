<?php

namespace Elementor;

class Partdo_Address_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'partdo-address-box';
    }
    public function get_title() {
        return 'Address Box (K)';
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
                'default' => 'Opening Hours',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'partdo-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => ' Monday - Friday : 9am - 5pm<br>Weekend Closed',
				'label_block' => true,
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
               'selectors' => ['{{WRAPPER}} .address-item > span' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'title_hvrcolor',
			[
               'label' => esc_html__( 'Title Hover Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .address-item > span:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .address-item > span ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .address-item > span',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .address-item > span',
				
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
               'selectors' => ['{{WRAPPER}} .address-detail' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'subtitle_hvrcolor',
			[
               'label' => esc_html__( 'Subtitle Hover Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .address-detail:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .address-detail ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .address-detail ',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .address-detail',
				
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		echo '<div class="contact-addresses">';
		echo '<div class="address-item"> <span>'.esc_html($settings['title']).'</span>';
		echo '<div class="address-detail"> '.partdo_sanitize_data($settings['subtitle']).'</div>';
		echo '</div>';
		echo '</div>';
		
	}

}

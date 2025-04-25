<?php

namespace Elementor;

class Partdo_Contact_Icon_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'partdo-contact-icon-box';
    }
    public function get_title() {
        return 'Contact Icon Box (K)';
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
		
		$this->add_control(
			'switcher_icon',
			[
				'label' => esc_html__( 'Use Custom Icon', 'partdo-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'partdo-core' ),
				'label_off' => esc_html__( 'No', 'partdo-core' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		
		$this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'partdo-core' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook-f',
					'library' => 'fa-brands',
				],
                'label_block' => true,
				'condition' => ['switcher_icon' => '']
			]
		);
		
        $this->add_control( 'custom_icon',
            [
                'label' => esc_html__( 'Custom Icon', 'partdo-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'klbth-icon-phone-squared',
                'description'=> 'You can add icon code. for example: klbth-icon-phone-squared',
				'condition' => ['switcher_icon' => 'yes']
            ]
        );

       $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'partdo-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'pleaceholder' => esc_html__( 'Enter title here', 'partdo-core' ),
                'default' => 'Phone Number',
            ]
        );
       $this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'partdo-core' ),
                'type' => Controls_Manager::WYSIWYG,
                'pleaceholder' => esc_html__( 'Enter desc here', 'partdo-core' ),
                'default' => '+1 1234 567 88',
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
		
		$this->add_control( 'icon_heading',
            [
                'label' => esc_html__( 'ICON', 'partdo-core' ),
                'type' => Controls_Manager::HEADING,
            ]
        );
		
		$this->add_control( 'border_color',
			[
               'label' => esc_html__( 'Border Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .iconbox .icon' => 'border-color: {{VALUE}};']
			]
        );
		
		$this->add_responsive_control( 'icon_right',
            [
                'label' => esc_html__( 'Icon Right', 'partdo-core' ),
                'type' => Controls_Manager::SLIDER,
                'min' => 0,
                'max' => 100,
                'selectors' => [ '{{WRAPPER}} .iconbox .icon' => 'margin-right: {{SIZE}}px;' ],
            ]
        );
		
		$this->add_responsive_control( 'icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'partdo-core' ),
                'type' => Controls_Manager::SLIDER,
                'min' => 0,
                'max' => 100,
                'selectors' => [ '{{WRAPPER}} .iconbox .icon' => 'font-size: {{SIZE}}px;' ],
            ]
        );
		
		$this->add_responsive_control( 'icon_padding',
            [
                'label' => esc_html__( 'Icon Padding', 'partdo-core' ),
                'type' => Controls_Manager::SLIDER,
                'min' => 0,
                'max' => 100,
                'selectors' => [ '{{WRAPPER}} .iconbox .icon' => 'padding: {{SIZE}}px;' ],
            ]
        );
		
		$this->add_control( 'icon_color',
           [
               'label' => esc_html__( 'Icon Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .iconbox .icon' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'icon_hvrcolor',
           [
               'label' => esc_html__( 'Icon Hover Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .iconbox .icon:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'icon_text_shadow',
				'selector' => '{{WRAPPER}} .iconbox-icon',
			]
		);
		
		$this->add_control( 'icon_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'partdo-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}}  .iconbox .icon' => 'opacity: {{VALUE}};'],
				
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
               'selectors' => ['{{WRAPPER}} .iconbox .detail > span' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'title_hvrcolor',
           [
               'label' => esc_html__( 'Title Hover Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .iconbox .detail > span:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .iconbox .detail > span ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .iconbox .detail > span',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .iconbox .detail > span',
				
            ]
        );
		
		$this->add_control( 'desc_heading',
            [
                'label' => esc_html__( 'DESCRIPTION', 'partdo-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'desc_color',
           [
               'label' => esc_html__( 'Description Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .iconbox .detail > p' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'desc_hvrcolor',
           [
               'label' => esc_html__( 'Description Hover Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .iconbox .detail > p:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .iconbox .detail > p' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_text_shadow',
				'selector' => '{{WRAPPER}} .iconbox .detail > p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .iconbox .detail > p',
				
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$output = '';
		
		
		echo '<div class="contact-iconboxes">';
		echo '<div class="iconbox">'; 
		echo '<div class="icon"> ';
		
		if($settings['switcher_icon'] == 'yes'){
			echo '<i class="'.esc_attr($settings['custom_icon']).'"></i>';
		} else {
			Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'false' ] );						
		}
		
		echo '</div>';
		echo '<div class="detail"> <span>'.esc_html($settings['title']).'</span>';
		echo '<p>'.partdo_sanitize_data($settings['desc']).'</p>';                    
		echo '</div>';
		echo '</div>';
		echo '</div>';
		
	}

}

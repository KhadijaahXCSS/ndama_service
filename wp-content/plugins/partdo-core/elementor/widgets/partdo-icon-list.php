<?php

namespace Elementor;

class Partdo_Icon_List_Widget extends Widget_Base {

    public function get_name() {
        return 'partdo-icon-list';
    }
    public function get_title() {
        return 'Icon List (K)';
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
		
		$repeater = new Repeater();
		
		$repeater->add_control(
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
		
		$repeater->add_control(
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
		
        $repeater->add_control( 'custom_icon',
            [
                'label' => esc_html__( 'Custom Icon', 'partdo-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'klbth-icon-ecommerce-package-ready',
                'description'=> 'You can add icon code. for example: klbth-icon-ecommerce-package-ready',
				'condition' => ['switcher_icon' => 'yes']
            ]
        );
		
		$repeater->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'partdo-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'pleaceholder' => esc_html__( 'Enter desc here', 'partdo-core' ),
                'default' => 'International Shipment',
            ]
        );

       $repeater->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'partdo-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'pleaceholder' => esc_html__( 'Enter desc here', 'partdo-core' ),
                'default' => 'Your payments are secure with our private security network.',
            ]
        );
		
        $this->add_control( 'icon_items',
            [
                'label' => esc_html__( 'Icon Items', 'partdo-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
						'custom_icon' => 'klbth-icon-ecommerce-package-ready',
                        'title' => 'International Shipment',
                        'desc' => 'Your payments are secure with our private security network.',
                    ],
                    [
						'custom_icon' => 'klbth-icon-ecommerce-percentage-return',
                        'title' => 'Extended 45 day returns',
                        'desc' => 'Your payments are secure with our private security network.',
                    ],
                    [
						'custom_icon' => 'klbth-icon-delivery-ship',
                        'title' => 'Secure Payment',
                        'desc' => 'Your payments are secure with our private security network.',
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
		
		$this->add_control( 'border_color',
			[
               'label' => esc_html__( 'Border Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .widget_iconbox ul , {{WRAPPER}} .widget_iconbox ul li + li' => 'border-color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'icon_heading',
            [
                'label' => esc_html__( 'ICON', 'partdo-core' ),
                'type' => Controls_Manager::HEADING,
            ]
        );
		
		$this->add_responsive_control( 'icon_right',
            [
                'label' => esc_html__( 'Icon Right', 'partdo-core' ),
                'type' => Controls_Manager::SLIDER,
                'min' => 0,
                'max' => 100,
                'selectors' => [ '{{WRAPPER}} .iconbox-icon' => 'margin-right: {{SIZE}}px;' ],
            ]
        );
		
		$this->add_responsive_control( 'icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'partdo-core' ),
                'type' => Controls_Manager::SLIDER,
                'min' => 0,
                'max' => 100,
                'selectors' => [ '{{WRAPPER}} .iconbox-icon' => 'font-size: {{SIZE}}px;' ],
            ]
        );
		
		$this->add_control( 'icon_color',
			[
               'label' => esc_html__( 'Icon Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .iconbox-icon' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'icon_hvrcolor',
			[
               'label' => esc_html__( 'Icon Hover Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .iconbox-icon:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}}  .iconbox-icon' => 'opacity: {{VALUE}};'],
				
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
		
		$this->add_control( 'desc_color',
			[
               'label' => esc_html__( 'Description Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-description p' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'desc_hvrcolor',
			[
               'label' => esc_html__( 'Description Hover Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .entry-description p:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .entry-description p' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_text_shadow',
				'selector' => '{{WRAPPER}} .entry-description',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .entry-description p',
				
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$output = '';
		
		if ( $settings['icon_items'] ) {
			echo '<div class="widget widget_iconbox">';
			echo '<div class="widget-body">';
			echo '<ul class="iconboxes">';

			foreach($settings['icon_items'] as $item){
				echo '<li class="iconbox">';
				echo '<div class="iconbox-icon">';
				if($item['switcher_icon'] == 'yes'){
					echo '<i class="'.esc_attr($item['custom_icon']).'"></i>';
				} else {
					Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'false' ] );						
				}  
				echo '</div>';
				echo '<div class="iconbox-detail">';
				echo '<h3 class="entry-title">'.esc_html($item['title']).'</h3>';
				echo '<div class="entry-description"> ';
				echo '<p>'.partdo_sanitize_data($item['desc']).'</p>';
				echo '</div>';
				echo '</div>';
				echo '</li>';
			}

			echo '</ul><!-- iconboxes -->';
			echo '</div><!-- widget-body -->';
			echo '</div>';
		}
		
	}

}

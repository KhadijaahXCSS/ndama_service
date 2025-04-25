<?php

namespace Elementor;

class Partdo_Testimonial_Carousel_Widget extends Widget_Base {

    public function get_name() {
        return 'partdo-testimonial-carousel';
    }
    public function get_title() {
        return 'Testimonial Carousel (K)';
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
		
		$this->add_control( 'testimonial_type',
			[
				'label' => esc_html__( 'Testimonial Type', 'partdo' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'partdo' ),
					'type1'	  	  => esc_html__( 'Type 1', 'partdo' ),
					'type2'	  	  => esc_html__( 'Type 2', 'partdo' ),
				],
			]
		);
		
		$this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'partdo' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Testimonial Widget',
                'description'=> 'Add a title.',
				'label_block' => true,
				'condition' => ['testimonial_type' => ['type2']]
            ]
        );
		
		$this->add_control( 'column',
			[
				'label' => esc_html__( 'Column', 'partdo-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'0'		  => esc_html__( 'Select Column', 'partdo-core' ),
					'1'    	  => esc_html__( '1 Columns', 'partdo-core' ),
					'2' 	  => esc_html__( '2 Columns', 'partdo-core' ),
					'3'		  => esc_html__( '3 Columns', 'partdo-core' ),
					'4'		  => esc_html__( '4 Columns', 'partdo-core' ),
					'5'		  => esc_html__( '5 Columns', 'partdo-core' ),
					'6'		  => esc_html__( '6 Columns', 'partdo-core' ),
				],
			]
		);
		
		$this->add_control( 'mobile_column',
			[
				'label' => esc_html__( 'Mobile Column', 'partdo-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'0' => esc_html__( 'Select Column', 'partdo-core' ),
					'1' 	  => esc_html__( '1 Column', 'partdo-core' ),
					'2'		  => esc_html__( '2 Columns', 'partdo-core' ),
					'3'		  => esc_html__( '3 Columns', 'partdo-core' ),
				],
			]
		);
		
		$this->add_control( 'tablet_column',
			[
				'label' => esc_html__( 'Tablet Column', 'partdo-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'0' => esc_html__( 'Select Column', 'partdo-core' ),
					'1' 	  => esc_html__( '1 Column', 'partdo-core' ),
					'2'		  => esc_html__( '2 Columns', 'partdo-core' ),
					'3'		  => esc_html__( '3 Columns', 'partdo-core' ),
				],
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
                'label' => esc_html__( 'Auto Speed', 'partdo-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '5000',
                'pleaceholder' => esc_html__( 'Set auto speed.', 'partdo-core' ),
				'condition' => ['auto_play' => 'true']
            ]
        );
		
		$this->add_control( 'dots',
			[
				'label' => esc_html__( 'Dots', 'partdo-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'partdo-core' ),
				'label_off' => esc_html__( 'False', 'partdo-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control( 'arrows',
			[
				'label' => esc_html__( 'Arrows', 'partdo-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'partdo-core' ),
				'label_off' => esc_html__( 'False', 'partdo-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		
		$defaultbg = plugins_url( 'images/avatar-01.jpg', __DIR__ );
		
		$repeater = new Repeater();
        $repeater->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'partdo-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultbg],
            ]
        );
	
        $repeater->add_control( 'name',
            [
                'label' => esc_html__( 'Name', 'partdo' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Tina Mcdonnell',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
		$repeater->add_control( 'position',
            [
                'label' => esc_html__( 'Position', 'partdo-core' ),
                'type' => Controls_Manager::TEXT,
				'label_block' => true,
                'pleaceholder' => esc_html__( 'Enter the customer job.', 'partdo-core' ),
                'default' => 'Sales Manager',
            ]
        );
		
        $repeater->add_control( 'comment',
            [
                'label' => esc_html__( 'Comment', 'partdo' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Astropons intimitetskoordinator podiktigt. Egons nytons. Intrapomiheten krofyl. Lalanade bedade i vatreng e-krona.',
                'description'=> 'Add a subtitle.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'testimonial_items',
            [
                'label' => esc_html__( 'Testimonial Items', 'partdo-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
						'image' => ['url' => $defaultbg],
						'name' => 'Tina Mcdonnell',
						'position' => 'Bounverse Co-Founder',
						'comment' => 'Astropons intimitetskoordinator podiktigt. Egons nytons. Intrapomiheten krofyl. Lalanade bedade i vatreng e-krona.',

                    ],
                    [
						'image' => ['url' => $defaultbg],
						'name' => 'Jessica Lindström',
						'position' => 'Sales Manager',
						'comment' => 'Astropons intimitetskoordinator podiktigt. Egons nytons. Intrapomiheten krofyl. Lalanade bedade i vatreng e-krona.',

                    ],
                    [
						'image' => ['url' => $defaultbg],	
						'name' => 'Teresa Holland',
						'position' => 'Business Manager',
						'comment' => 'Astropons intimitetskoordinator podiktigt. Egons nytons. Intrapomiheten krofyl. Lalanade bedade i vatreng e-krona.',

                    ],
                    [
						'image' => ['url' => $defaultbg],
						'name' => 'Scarlett Edwards',
						'position' => 'Computer Engineer',
						'comment' => 'Astropons intimitetskoordinator podiktigt. Egons nytons. Intrapomiheten krofyl. Lalanade bedade i vatreng e-krona.',

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
				'selector' => '{{WRAPPER}} .customer-avatar img',
			]
		);
		
		$this->add_control( 'name_heading',
            [
                'label' => esc_html__( 'NAME', 'partdo-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'name_color',
			[
               'label' => esc_html__( 'Name Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .customer-name' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'name_hvrcolor',
			[
               'label' => esc_html__( 'Name Hover Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .customer-name:hover' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'name_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'partdo-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .customer-name ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'name_text_shadow',
				'selector' => '{{WRAPPER}} .customer-name',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .customer-name',
				
            ]
        );
		
		$this->add_control( 'position_heading',
            [
                'label' => esc_html__( 'POSITION', 'partdo-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'position_color',
			[
               'label' => esc_html__( 'Position Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .customer-mission' => 'color: {{VALUE}} !important;']
			]
        );
		
		$this->add_control( 'position_hvrcolor',
			[
               'label' => esc_html__( 'Position Hover Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .customer-mission:hover' => 'color: {{VALUE}} !important;']
			]
        );
		
		$this->add_control( 'position_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'partdo-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .customer-mission ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'position_text_shadow',
				'selector' => '{{WRAPPER}} .customer-mission ',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'position_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .customer-mission',
				
            ]
        );
		
		$this->add_control( 'comment_heading',
            [
                'label' => esc_html__( 'COMMENT', 'partdo-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'comment_color',
			[
               'label' => esc_html__( 'Comment Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .customer-description' => 'color: {{VALUE}} !important;']
			]
        );
		
		$this->add_control( 'comment_hvrcolor',
			[
               'label' => esc_html__( 'Comment Hover Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .customer-description:hover' => 'color: {{VALUE}} !important;']
			]
        );
		
		$this->add_control( 'comment_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'partdo-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .customer-description ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'comment_text_shadow',
				'selector' => '{{WRAPPER}} .customer-description',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'comment_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .customer-description',
				
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$output = '';
		
		if($settings['testimonial_type'] == 'type2'){
			
			if ( $settings['testimonial_items'] ) {
				
				echo '<div class="widget widget_testimonial">';
				echo ' <h4 class="widget-title">'.esc_html($settings['title']).'</h4>';
				echo '<div class="widget-body">';
				echo '<div class="klbth-slider-wrapper"> ';
				echo '<div class="klbth-slider-loader">';
				echo '<div class="klbth-loader size-md color-primary border-sm"></div>';
				echo '</div>';
				echo '<div class="klbth-slider" data-items="'.esc_attr($settings['column']).'" data-mobileitems="'.esc_attr($settings['mobile_column']).'" data-tabletitems="'.esc_attr($settings['tablet_column']).'" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'">';

				foreach($settings['testimonial_items'] as $item){
					echo '<div class="slider-item testimonial">';
					echo '<div class="testimonial-inner">'; 
					echo '<div class="customer-avatar"> <img src="'.esc_url($item['image']['url']).'" alt="Testimonial"/></div>';
					echo '<div class="customer-detail"> ';
					echo '<div class="stars"> ';
					echo '<i class="klbth-icon-star"></i>';
					echo '<i class="klbth-icon-star"></i>';
					echo '<i class="klbth-icon-star"></i>';
					echo '<i class="klbth-icon-star"></i>';
					echo '<i class="klbth-icon-star"></i>';
					echo '</div>';
					echo '<div class="customer-name">'.esc_html($item['name']).'</div>';
					echo '<div class="customer-mission">'.esc_html($item['position']).'</div>';
					echo '<div class="customer-description"> ';
					echo '<p>'.esc_html($item['comment']).' </p>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
				}

				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
			}
			
		} else {
			
			if ( $settings['testimonial_items'] ) {
				
				echo '<div class="klbth-module klbth-module-testimonial style-1">';
				echo '<div class="klbth-module-body">';
				echo '<div class="klbth-slider-wrapper"> ';
				echo '<div class="klbth-slider-loader">';
				echo '<div class="klbth-loader size-md color-primary border-sm"></div>';
				echo '</div>';
				echo '<div class="klbth-slider" data-items="'.esc_attr($settings['column']).'" data-mobileitems="'.esc_attr($settings['mobile_column']).'" data-tabletitems="2" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'">';

				foreach($settings['testimonial_items'] as $item){
					echo '<div class="slider-item testimonial">';
					echo '<div class="testimonial-inner">'; 
					echo '<div class="customer-avatar"> <img src="'.esc_url($item['image']['url']).'" alt="Testimonial"/></div>';
					echo '<div class="customer-detail"> ';
					echo '<div class="stars"> ';
					echo '<i class="klbth-icon-star"></i>';
					echo '<i class="klbth-icon-star"></i>';
					echo '<i class="klbth-icon-star"></i>';
					echo '<i class="klbth-icon-star"></i>';
					echo '<i class="klbth-icon-star"></i>';
					echo '</div>';
					echo '<div class="customer-name">'.esc_html($item['name']).'</div>';
					echo '<div class="customer-mission">'.esc_html($item['position']).'</div>';
					echo '<div class="customer-description"> ';
					echo '<p>'.esc_html($item['comment']).' </p>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
				}

				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
			}
		}
	}

}

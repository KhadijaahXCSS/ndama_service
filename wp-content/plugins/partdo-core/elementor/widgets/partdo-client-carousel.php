<?php

namespace Elementor;

class Partdo_Client_Carousel_Widget extends Widget_Base {

    public function get_name() {
        return 'partdo-client-carousel';
    }
    public function get_title() {
        return 'Client Carousel (K)';
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
		
		$this->add_control( 'column',
			[
				'label' => esc_html__( 'Column', 'partdo-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '6',
				'options' => [
					'0' => esc_html__( 'Select Column', 'partdo-core' ),
					'2' 	  => esc_html__( '2 Columns', 'partdo-core' ),
					'3'		  => esc_html__( '3 Columns', 'partdo-core' ),
					'4'		  => esc_html__( '4 Columns', 'partdo-core' ),
					'5'		  => esc_html__( '5 Columns', 'partdo-core' ),
					'6'		  => esc_html__( '6 Columns', 'partdo-core' ),
					'7'		  => esc_html__( '7 Columns', 'partdo-core' ),
					'8'		  => esc_html__( '8 Columns', 'partdo-core' ),
				],
			]
		);
		
		$this->add_control( 'mobile_column',
			[
				'label' => esc_html__( 'Mobile Column', 'partdo-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '2',
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
		
		$defaultbg = plugins_url( 'images/logo-1.png', __DIR__ );
		
		$repeater = new Repeater();
        $repeater->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'partdo' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Image Link', 'partdo-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'partdo-core' )
            ]
        );
		
        $this->add_control( 'client_items',
            [
                'label' => esc_html__( 'Icon Items', 'partdo-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
						'image' => ['url' => $defaultbg],
						'btn_link' => '#',
                    ],
                    [
						'image' => ['url' => $defaultbg],
						'btn_link' => '#',
                    ],
                    [
						'image' => ['url' => $defaultbg],
						'btn_link' => '#',
                    ],
                    [
						'image' => ['url' => $defaultbg],
						'btn_link' => '#',
                    ],
                    [
						'image' => ['url' => $defaultbg],
						'btn_link' => '#',
                    ],
                    [
						'image' => ['url' => $defaultbg],
						'btn_link' => '#',
                    ],
					[
						'image' => ['url' => $defaultbg],
						'btn_link' => '#',
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
				'selector' => '{{WRAPPER}} .logo-item img',
			]
		);
		
		$this->add_control( 'image_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'partdo-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .logo-item img ' => 'opacity: {{VALUE}} ;'],
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$output = '';
		
		if ( $settings['client_items'] ) {
			echo '<div class="klbth-module klbth-module-logos grayscale-enable">';
			echo '<div class="klbth-module-body">';
			echo '<div class="logos-wrapper">';
			echo '<div class="klbth-slider-wrapper"> ';
			echo '<div class="klbth-slider-loader">';
			echo '<div class="klbth-loader size-md color-primary border-sm"></div>';
			echo '</div>';
			echo '<div class="klbth-slider" data-items="'.esc_attr($settings['column']).'" data-mobileitems="'.esc_attr($settings['mobile_column']).'" data-tabletitems="2" data-arrows="'.esc_attr($settings['arrows']).'" data-dots="'.esc_attr($settings['dots']).'" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'">';

			foreach($settings['client_items'] as $item){
				$target = $item['btn_link']['is_external'] ? ' target="_blank"' : '';
				$nofollow = $item['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
				
				echo '<div class="logo-item"> ';
				echo '<a href="'.esc_url($item['btn_link']['url']).'" '.esc_attr($target.$nofollow).'><img src="'.esc_url($item['image']['url']).'"/></a>';
				echo '</div>';
		
			}

			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}
		
	}

}

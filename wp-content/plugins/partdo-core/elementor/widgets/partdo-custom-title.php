<?php

namespace Elementor;

class Partdo_Custom_Title_Widget extends Widget_Base {

    public function get_name() {
        return 'partdo-custom-title';
    }
    public function get_title() {
        return 'Custom Title (K)';
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
		
		$this->add_control( 'title_type',
			[
				'label' => esc_html__( 'Title Type', 'partdo' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'partdo' ),
					'type1'	  => esc_html__( 'Type 1', 'partdo' ),
					'type2'	  => esc_html__( 'Type 2', 'partdo' ),
				],
			]
		);	
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'partdo-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Our Business Partners',
                'pleaceholder' => esc_html__( 'Set a title.', 'partdo-core' ),
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'partdo-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Sagt väsade. Nun. Sms-anställning muna. Nihuktiga fande. El. Bett tegisk. Speplangen åde. Gigara megadesade gevis. Sulig klimatsmart. Besam gosening.',
                'pleaceholder' => esc_html__( 'Set a subtitle.', 'partdo-core' ),
            ]
        );
		
		 $this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'partdo-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'View All',
                'pleaceholder' => esc_html__( 'Enter button title here', 'partdo-core' ),
				'condition' => ['title_type' => ['type2']],
            ]
        );
		
        $this->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'partdo-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'partdo-core' ),
				'condition' => ['title_type' => ['type2']],
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
					'{{WRAPPER}} .klbth-module-header.with-border' => 'border-bottom-color: {{value}};',
               ],
			   'condition' => ['title_type' => ['type2']]
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
               'selectors' => ['{{WRAPPER}} .entry-description' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'subtitle_hvrcolor',
			[
               'label' => esc_html__( 'Subtitle Hover Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-description:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .entry-description ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .entry-description ',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .entry-description',
				
            ]
        );
		
		$this->add_control( 'button_heading',
            [
                'label' => esc_html__( 'BUTTON', 'partdo-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => ['title_type' => ['type2']]
            ]
        );
		
		$this->add_control( 'button_color',
			[
               'label' => esc_html__( 'Button Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .klbth-module-header .btn' => 'color: {{VALUE}};'],
			   'condition' => ['title_type' => ['type2']]
			]
        );
		
		$this->add_control( 'button_hvrcolor',
			[
               'label' => esc_html__( 'Button Hover Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .klbth-module-header .btn:hover' => 'color: {{VALUE}};'],
			   'condition' => ['title_type' => ['type2']]
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
                'selectors' => ['{{WRAPPER}} .klbth-module-header .btn' => 'opacity: {{VALUE}} ;'],
				'condition' => ['title_type' => ['type2']]
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'button_text_shadow',
				'selector' => '{{WRAPPER}} .klbth-module-header .btn',
				'condition' => ['title_type' => ['type2']]
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .klbth-module-header .btn',
				'condition' => ['title_type' => ['type2']]
				
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
			
		$output = '';
		
	
		if($settings['title_type'] == 'type2'){
			$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
		
			echo '<div class="klbth-module-header with-border color-default counter-deactive align-default">';
			echo '<h3 class="entry-title">'.esc_html($settings['title']).'</h3>';
			echo '<div class="entry-description">';
			echo '<p>'.esc_html($settings['subtitle']).'</p>';
			echo '</div><a class="btn link" href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).'> '.esc_html($settings['btn_title']).' <i class="klbth-icon-arrow-right-long"></i></a>';
			echo '</div>';
		} else {
			echo '<div class="klb-custom-title klbth-module-header without-border color-default counter-deactive align-center">';
			echo '<h3 class="entry-title">'.esc_html($settings['title']).'</h3>';
			echo '<div class="entry-description">';
			echo '<p>'.esc_html($settings['subtitle']).'</p>';
			echo '</div>';
			echo '</div>';
		}	  
	}

}

<?php

function partdo_add_elementor_page_settings_controls( $page ) {

	$page->add_control( 'partdo_elementor_enable_sidebar_collapse',
		[
			'label'          => esc_html__( 'Sidebar Collapse', 'partdo-core' ),
            'type'           => \Elementor\Controls_Manager::SWITCHER,
			'label_on'       => esc_html__( 'Yes', 'partdo' ),
			'label_off'      => esc_html__( 'No', 'partdo' ),
			'return_value'   => 'yes',
			'default'        => 'no',
		]
	);

	$page->add_control( 'partdo_elementor_hide_page_header',
		[
			'label'          => esc_html__( 'Hide Header', 'partdo-core' ),
            'type'           => \Elementor\Controls_Manager::SWITCHER,
			'label_on'       => esc_html__( 'Yes', 'partdo-core' ),
			'label_off'      => esc_html__( 'No', 'partdo-core' ),
			'return_value'   => 'yes',
			'default'        => 'no',
		]
	);
	
	$page->add_control( 'partdo_elementor_page_header_type',
		[
			'label' => esc_html__( 'Header Type', 'partdo-core' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => '',
			'options' => [
				'' => esc_html__( 'Select a type', 'partdo' ),
				'type1' 	  => esc_html__( 'Type 1', 'partdo' ),
				'type2'		  => esc_html__( 'Type 2', 'partdo' ),
				'type3'		  => esc_html__( 'Type 3', 'partdo' ),
				'type4'		  => esc_html__( 'Type 4', 'partdo' ),
			],
		]
	);
	
	$page->add_control( 'partdo_elementor_hide_page_footer',
		[
			'label'          => esc_html__( 'Hide Footer', 'partdo-core' ),
			'type'           => \Elementor\Controls_Manager::SWITCHER,
			'label_on'       => esc_html__( 'Yes', 'partdo-core' ),
			'label_off'      => esc_html__( 'No', 'partdo-core' ),
			'return_value'   => 'yes',
			'default'        => 'no',
		]
	);
	
	$page->add_control( 'partdo_elementor_page_footer_type',
		[
			'label' => esc_html__( 'Footer Type', 'partdo-core' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => '',
			'options' => [
				'' => esc_html__( 'Select a type', 'partdo' ),
				'type1' 	  => esc_html__( 'Type 1', 'partdo' ),
				'type2'		  => esc_html__( 'Type 2', 'partdo' ),
			],
		]
	);
	
	$page->add_control( 'partdo_elementor_logo',
		[
			'label'          => esc_html__( 'Set Logo', 'partdo-core' ),
            'type' 			 => \Elementor\Controls_Manager::MEDIA,
		]
	);

	$page->add_control(
		'page_width',
		[
			'label' => __( 'Width', 'partdo-core' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'devices' => [ 'desktop' ],
			'size_units' => [ 'px'],
			'range' => [
				'px' => [
					'min' => 1100,
					'max' => 1650,
					'step' => 5,
				],
			],
			'default' => [
				'unit' => 'px',
				'size' => 1290,
			],
			'selectors' => [
				'{{WRAPPER}} .container' => 'max-width: {{SIZE}}{{UNIT}};',
				'{{WRAPPER}} .elementor-section.elementor-section-boxed>.elementor-container' => 'max-width: {{SIZE}}{{UNIT}};',
			],
		]
	);

}

add_action( 'elementor/element/wp-page/document_settings/before_section_end', 'partdo_add_elementor_page_settings_controls' );
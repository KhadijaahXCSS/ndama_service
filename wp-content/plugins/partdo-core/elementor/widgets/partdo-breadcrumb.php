<?php

namespace Elementor;

class Partdo_Breadcrumb_Widget extends Widget_Base {

    public function get_name() {
        return 'partdo-breadcrumb';
    }
    public function get_title() {
        return 'Breadcrumb (K)';
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
        
        $this->add_control( 'bread_color',
            [
                'label' => esc_html__( 'Page/Post Color', 'partdo' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .site-breadcrumb ul li a ' => 'color:{{VALUE}} !important ;' ]
            ]
        );
		
        $this->add_control( 'bread_sepcolor',
            [
                'label' => esc_html__( 'Separator Color', 'partdo' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .site-breadcrumb ul li::after' => 'color:{{VALUE}} !important;' ]
            ]
        );
        $this->add_control( 'bread_actvcolor',
            [
                'label' => esc_html__( 'Current Page/Post Color', 'partdo' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [ '{{WRAPPER}}  .site-breadcrumb ul li span' => 'color:{{VALUE}} !important ;' ],
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$output = '';
		
	
		echo '<nav class="site-breadcrumb">';
		echo partdo_breadcrubms();
		echo '</nav>';
		
	}

}

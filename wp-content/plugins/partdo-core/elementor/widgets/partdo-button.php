<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Partdo_Button_Widget extends Widget_Base {
    use Partdo_Helper;
    public function get_name() {
        return 'partdo-button';
    }
    public function get_title() {
        return 'Button (K)';
    }
    public function get_icon() {
        return 'eicon-button';
    }
    public function get_categories() {
        return [ 'partdo' ];
    }
    public function get_style_depends() {
        return [ 'jquery-ui','magnific' ];
    }
    public function get_script_depends() {
        return [ 'jquery-ui', 'magnific' ];
    }
    // Registering Controls
    protected function register_controls() {

        /*****   Button Options   ******/
        $this->start_controls_section('partdo_btn_settings',
            [
                'label' => esc_html__( 'Button', 'partdo' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'btn_action',
            [
                'label' => esc_html__( 'Action Type', 'partdo' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'link',
                'options' => [
                    'link' => esc_html__( 'Link', 'partdo' ),
                    'image' => esc_html__( 'Single Image', 'partdo' ),
                    'youtube' => esc_html__( 'Youtube', 'partdo' ),
                    'vimeo' => esc_html__( 'Vimeo', 'partdo' ),
                    'map' => esc_html__( 'Google Map', 'partdo' ),
                    'html5' => esc_html__( 'HTML5 Video', 'partdo' ),
                    'modal' => esc_html__( 'Modal Content', 'partdo' ),
                ]
            ]
        );
        $this->add_control( 'link_type',
            [
                'label' => esc_html__( 'Link Type', 'partdo' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'external',
                'options' => [
                    'external' => esc_html__( 'External', 'partdo' ),
                    'internal' => esc_html__( 'Internal', 'partdo' ),
                ],
                'condition' => ['btn_action' => 'link']
            ]
        );
        $this->add_control( 'text',
            [
                'label' => esc_html__( 'Button Text', 'partdo' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Button Text', 'partdo' )
            ]
        );
        $this->add_control( 'link',
            [
                'label' => esc_html__( 'Button Link', 'partdo' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => ''
                ],
                'show_external' => true,
                'condition' => ['btn_action' => 'link']
            ]
        );
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'partdo' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => Utils::get_placeholder_image_src()],
                'condition' => ['btn_action' => 'image']
            ]
        );
        $this->add_control( 'ltitle',
            [
                'label' => esc_html__( 'Lightbox Title', 'partdo' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Phone Name',
                'condition' => ['btn_action' => 'image']
            ]
        );
        $this->add_control( 'youtube',
            [
                'label' => esc_html__( 'Youtube Video URL', 'partdo' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'http://www.youtube.com/watch?v=AeeE6PyU-dQ',
                'condition' => ['btn_action' => 'youtube']
            ]
        );
        $this->add_control( 'vimeo',
            [
                'label' => esc_html__( 'Vimeo Video URL', 'partdo' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'https://vimeo.com/39493181',
                'condition' => ['btn_action' => 'vimeo']
            ]
        );
        $this->add_control( 'map',
            [
                'label' => esc_html__( 'Iframe Map URL', 'partdo' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom',
                'condition' => ['btn_action' => 'map']
            ]
        );
        $this->add_control( 'html5',
            [
                'label' => esc_html__( 'HTML5 Video URL', 'partdo' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => '',
                'pleaceholder' => esc_html__( 'Add your local video here', 'partdo' ),
                'condition' => ['btn_action' => 'html5']
            ]
        );
        $this->add_control( 'modal_content',
            [
                'label' => esc_html__( 'Modal Content', 'partdo' ),
                'type' => Controls_Manager::WYSIWYG,
                'label_block' => true,
                'default' => '<h3>Modal</h3><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla rhoncus pharetra dui, nec tempus tellus maximus et. Sed sed elementum ligula, id cursus leo. Duis imperdiet tortor id condimentum hendrerit.</p>',
                'pleaceholder' => esc_html__( 'Add html content here', 'partdo' ),
                'condition' => ['btn_action' => 'modal']
            ]
        );
        $this->add_control( 'modal_width',
            [
                'label' => esc_html__( 'Modal Content Width', 'partdo' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 2000
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 600,
                ],
                'condition' => ['btn_action' => 'modal']
            ]
        );
        $this->add_responsive_control( 'alignment',
            [
                'label' => esc_html__( 'Alignment', 'partdo' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .partdo-button:not(.btn-justify)' => 'text-align: {{VALUE}};'],
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'partdo' ),
                        'icon' => 'fa fa-align-left'
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'partdo' ),
                        'icon' => 'fa fa-align-center'
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'partdo' ),
                        'icon' => 'fa fa-align-right'
                    ]
                ],
                'toggle' => true,
                'default' => 'left'
            ]
        );
        $this->add_control( 'use_icon',
            [
                'label' => esc_html__( 'Use Icon', 'partdo' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
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
        $this->add_control( 'icon',
            [
                'label' => esc_html__( 'Button Icon', 'partdo' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => '',
                    'library' => 'solid'
                ],
                'condition' => ['use_icon' => 'yes', 'switcher_icon' => '']
            ]
        );
        $this->add_control( 'custom_icon',
            [
                'label' => esc_html__( 'Custom Icon', 'partdo-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'klbth-icon-arrow-right-long',
                'description'=> 'You can add icon code. for example: klbth-icon-arrow-right-long',
				'condition' => ['switcher_icon' => 'yes']
            ]
        );
        $this->add_control( 'icon_pos',
            [
                'label' => esc_html__( 'Icon Position', 'partdo' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'btn-icon-right',
                'options' => [
                    'btn-icon-left' => esc_html__( 'Before', 'partdo' ),
                    'btn-icon-right' => esc_html__( 'After', 'partdo' )
                ],
                'condition' => ['use_icon' => 'yes']
            ]
        );
        $this->add_control( 'icon_spacing',
            [
                'label' => esc_html__( 'Icon Spacing', 'partdo' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 60
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .partdo-button .btn-icon-left i' => 'margin-right: {{SIZE}}px;',
                    '{{WRAPPER}} .partdo-button .btn-icon-right i' => 'margin-left: {{SIZE}}px;'
                ],
                'condition' => ['use_icon' => 'yes']
            ]
        );
        $this->add_control( 'full',
            [
                'label' => esc_html__( 'Full width', 'partdo' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'separator' => 'before'
            ]
        );
        $this->add_control( 'tooltips',
            [
                'label' => esc_html__( 'Tooltips', 'partdo' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'separator' => 'before'
            ]
        );
        $this->add_control( 'tooltip_pos',
            [
                'label' => esc_html__( 'Tooltip Position', 'partdo' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'top',
                'options' => [
                    'top' => esc_html__( 'Top', 'partdo' ),
                    'right' => esc_html__( 'Right', 'partdo' ),
                    'bottom' => esc_html__( 'Bottom', 'partdo' ),
                    'left' => esc_html__( 'Left', 'partdo' ),
                ],
                'condition' => ['tooltips' => 'yes']
            ]
        );
        $this->add_control( 'tooltiptext',
            [
                'label' => esc_html__( 'Tooltip Text', 'partdo' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => esc_html__( 'Button Text', 'partdo' ),
                'condition' => ['tooltips' => 'yes']
            ]
        );
        $this->end_controls_section();
        /*****   End Button Options   ******/

        /***** Button Style ******/
        $this->start_controls_section('partdo_btn_styling',
            [
                'label' => esc_html__( 'Button Style', 'partdo' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
        $this->start_controls_tabs('partdo_btn_tabs');
        $this->start_controls_tab( 'partdo_btn_normal_tab',
            [ 'label' => esc_html__( 'Normal', 'partdo' ) ]
        );

            $this->add_control( 'btn_color',
                [
                    'label' => esc_html__( 'Color', 'partdo' ),
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors' => ['{{WRAPPER}} .partdo-btn' => 'color: {{VALUE}};']
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'btn_typo',
                    'label' => esc_html__( 'Typography', 'partdo' ),
                    'selector' => '{{WRAPPER}} .partdo-button .partdo-btn'
                ]
            );
            $this->add_responsive_control( 'btn_padding',
                [
                    'label' => esc_html__( 'Padding', 'partdo' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px' ],
                    'selectors' => ['{{WRAPPER}} .partdo-btn' => 'padding-top: {{TOP}}{{UNIT}};padding-right: {{RIGHT}}{{UNIT}};padding-bottom: {{BOTTOM}}{{UNIT}};padding-left: {{LEFT}}{{UNIT}};'],
                    'default' => [
                        'top' => '',
                        'right' => '',
                        'bottom' => '',
                        'left' => '',
                    ],
                    'separator' => 'before'
                ]
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'btn_border',
                    'label' => esc_html__( 'Border', 'partdo' ),
                    'selector' => '{{WRAPPER}} .partdo-btn',
                    'separator' => 'before'
                ]
            );
            $this->add_responsive_control( 'btn_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'partdo' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px' ],
                    'selectors' => ['{{WRAPPER}} .partdo-btn' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-left-radius: {{BOTTOM}}{{UNIT}};border-bottom-right-radius: {{LEFT}}{{UNIT}};'],
                    'default' => [
                        'top' => '',
                        'right' => '',
                        'bottom' => '',
                        'left' => '',
                    ],
                    'separator' => 'before'
                ]
            );
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'btn_background',
                    'label' => esc_html__( 'Background', 'partdo' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .partdo-btn',
                    'separator' => 'before'
                ]
            );
        $this->end_controls_tab();

        $this->start_controls_tab('partdo_btn_hover_tab',
            [ 'label' => esc_html__( 'Hover', 'partdo' ) ]
        );
         $this->add_control( 'btn_hvr_color',
            [
                'label' => esc_html__( 'Color', 'partdo' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .partdo-btn:hover' => 'color: {{VALUE}};']
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_hvr_border',
                'label' => esc_html__( 'Border', 'partdo' ),
                'selector' => '{{WRAPPER}} .partdo-btn:hover',
                'separator' => 'before'
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_hvr_background',
                'label' => esc_html__( 'Background', 'partdo' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .partdo-btn:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        /***** End Button Styling *****/
    }

    protected function render() {
        $settings   = $this->get_settings_for_display();
        $settingsid = $this->get_id();
        $iconpos    = isset( $settings['icon']['value'] ) != '' ? ' '.$settings['icon_pos'] : '';
        $btnicon    = $settings['use_icon'] == 'yes' ? ' has-icon' : '';
        $full       = $settings['full'] == 'yes' ? ' is-block' : '';
        $target     = !empty( $settings['link']['is_external'] ) ? ' target="_blank"' : '';
        $nofollow   = !empty( $settings['link']['nofollow'] ) ? ' rel="nofollow"' : '';
        $href       = !empty( $settings['link']['url'] ) ? $settings['link']['url'] : '';
        $tooltips   = $settings['tooltips'] == 'yes' ? ' data-partdo-ui-tooltip=\'{"position":"'.$settings['tooltip_pos'].'","content":"'.$settings['tooltiptext'].'"}\'' : '';
        $data       = $target.$nofollow;
        switch ($settings['btn_action']) {
            case 'image':
                $title = $settings['ltitle'] ? ' title="'.$settings['ltitle'].'"' : '';
                $data = ' data-partdo-lightbox=\'{"type":"image"}\'';
                $href = $settings['image']['url'];
                break;
            case 'youtube':
                $data = ' data-partdo-lightbox=\'{"type":"iframe"}\'';
                $href = $settings['youtube'] ? $settings['youtube'] : 'http://www.youtube.com/watch?v=AeeE6PyU-dQ';
                break;
            case 'vimeo':
                $data = ' data-partdo-lightbox=\'{"type":"iframe"}\'';
                $href = $settings['vimeo'] ? $settings['vimeo'] : 'https://vimeo.com/39493181';
                break;
            case 'map':
                $data = ' data-partdo-lightbox=\'{"type":"iframe"}\'';
                $href = $settings['map'] ? $settings['map'] : 'https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom';
                break;
            case 'html5':
                $data = ' data-partdo-lightbox=\'{"type":"iframe"}\'';
                $href = $settings['html5'] ? $settings['html5'] : '';
                break;
            case 'modal':
                $data = ' data-partdo-lightbox=\'{"type":"modal"}\'';
                $href = '#modal_'.$settingsid;
                break;
            default:
                $data = $target.$nofollow;
                $href = $settings['link']['url'];
                break;
        }
        $link_type = 'link' == $settings['btn_action'] && 'internal' == $settings['link_type'] ? ' data-scroll-to' : '';
        echo '<div class="partdo-button'.$btnicon.'">';
            if ( $settings['icon_pos'] == 'btn-icon-left' ) {
                echo '<a'.$link_type.' class="btn link button light medium wide partdo-btn '.$color.$size.$iconpos.$full.'" href="'.$href.'"'.$data.$tooltips.'>'; 
				if ( !empty( $settings['icon']['value'] || $settings['switcher_icon'] == 'yes'  ) ) { 
					if($settings['switcher_icon'] == 'yes'){
						echo '<i class="'.esc_attr($settings['custom_icon']).'"></i>';
					} else {
						Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'false' ] );						
					}
				} 
				echo $settings['text'].'</a>';
            } else {
                echo '<a'.$link_type.' class="btn partdo-btn '.$iconpos.$full.'" href="'.$href.'"'.$data.$tooltips.'>'.$settings['text'].' ';
                if ( !empty( $settings['icon']['value'] ) || $settings['switcher_icon'] == 'yes' ) { 
					if($settings['switcher_icon'] == 'yes'){
						echo '<i class="'.esc_attr($settings['custom_icon']).'"></i>';
					} else {
						Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'false' ] );						
					}
				} echo '</a>';
            }
            if ( $settings['btn_action'] == 'modal' && $settings['modal_content'] ) {
                echo '<div id="modal_'.$settingsid.'" class="mfp-hide" style="position:relative; max-width:'.$settings['modal_width']['size'].'px; margin:auto; padding:30px; background-color:#ffffff;">';
                    echo $settings['modal_content'];
                echo '</div>';
            }
        echo '</div>';
        // Not in edit mode
        if ( \Elementor\Plugin::$instance->editor->is_edit_mode() && $settings['btn_action'] != 'link' ) {
            if ( $settings['btn_action'] != 'link' ) { ?>
                <script>jQuery(document).ready(function($){function partdoLightbox(){var myLightboxes=$('[data-partdo-lightbox]'); if(myLightboxes.length){myLightboxes.each(function(i, el){var myLightbox=$(el);var myData=myLightbox.data('partdoLightbox');var myOptions={};if(!myData||!myData.type){return true;}if(myData.type==='gallery'){if(!myData.selector){return true;}myOptions={ delegate:myData.selector,type: 'image',gallery:{enabled:true}};}if(myData.type==='image'){myOptions={type:'image'};}if(myData.type==='iframe'){myOptions={type:'iframe'};}if(myData.type==='inline'){myOptions={type:'inline'};}if (myData.type==='modal'){myOptions={type:'inline',modal:false};}if(myData.type==='ajax'){myOptions={type:'ajax',overflowY:'scroll'};}myLightbox.magnificPopup(myOptions);});}}partdoLightbox();})
                </script>
            <?php }
            if ( $settings['tooltips'] == 'yes' ) { ?>
                <script>jQuery(document).ready(function ($) { function partdoUITooltip(){var e=$("[data-partdo-lightbox]");e.length&&e.each(function(e,t){var a=$(t),i=a.data("partdoLightbox"),l={};if(!i||!i.type)return!0;if("gallery"===i.type){if(!i.selector)return!0;l={delegate:i.selector,type:"image",gallery:{enabled:!0}}}"image"===i.type&&(l={type:"image"}),"iframe"===i.type&&(l={type:"iframe"}),"inline"===i.type&&(l={type:"inline"}),"modal"===i.type&&(l={type:"inline",modal:!1}),"ajax"===i.type&&(l={type:"ajax",overflowY:"scroll"}),a.magnificPopup(l)})}partdoUITooltip();})</script>
                <?php
            }
        }
    }
}

<?php

namespace Elementor;

class Partdo_Product_Categories_Widget extends Widget_Base {
    use Partdo_Helper;
	
    public function get_name() {
        return 'partdo-product-categories';
    }
    public function get_title() {
        return 'Product Categories (K)';
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
				'label' => esc_html__( 'Content', 'partdo' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control( 'category_type',
			[
				'label' => esc_html__( 'Category Type', 'partdo-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'partdo-core' ),
					'type1'	      => esc_html__( 'type 1', 'partdo-core' ),
					'type2'	  => esc_html__( 'type 2', 'partdo-core' ),
				],
			]
		);
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'partdo-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Our Good Categories',
                'pleaceholder' => esc_html__( 'Add a title.', 'partdo-core' ),
				'condition' => ['category_type' => ['type1','select-type']],
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'partdo-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Dont miss out on this weeks deals',
                'pleaceholder' => esc_html__( 'Add a subtitle.', 'partdo-core' ),
				'condition' => ['category_type' => ['type1','select-type']],
            ]
        );
		
		$this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'partdo-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'View All ',
                'pleaceholder' => esc_html__( 'Enter button title here', 'partdo-core' ),
				'condition' => ['category_type' => ['type1','select-type']],
            ]
        );
		
        $this->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'partdo-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'partdo-core' ),
				'condition' => ['category_type' => ['type1','select-type']],
            ]
        );
		
		$this->start_controls_tabs('cat_exclude_include_tabs');
        $this->start_controls_tab('cat_include_tab',
            [ 'label' => esc_html__( 'Include Category', 'partdo-core' ) ]
        );
       
        $this->add_control( 'cat_filter',
            [
                'label' => esc_html__( 'Include Category', 'partdo-core' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->partdo_cpt_taxonomies('product_cat'),
                'description' => 'Select Category(s)',
                'default' => '',
                'label_block' => true,
            ]
        );
		
		$this->end_controls_tab(); // cat_include_tab 
		
        $this->start_controls_tab( 'cat_exclude_tab',
            [ 'label' => esc_html__( 'Exclude Category', 'partdo-core' ) ]
        );
		
        $this->add_control( 'exclude_category',
            [
                'label' => esc_html__( 'Exclude Category', 'partdo-core' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->partdo_cpt_taxonomies('product_cat'),
                'description' => 'Select Category(s)',
                'default' => '',
                'label_block' => true,
            ]
        );
       
		$this->end_controls_tab(); // cat_exclude_tab

		$this->end_controls_tabs(); // cat_exclude_include_tabs
		
		$this->add_control( 'type1_column',
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
				],
				'condition' => ['category_type' => ['type1','select-type']],
			]
		);
		
		$this->add_control( 'type2_column',
			[
				'label' => esc_html__( 'Column', 'shopwise' ),
				'type' => Controls_Manager::SELECT,
				'default' => '4',
				'options' => [
					'0' => esc_html__( 'Select Column', 'shopwise' ),
					'6' 	  => esc_html__( '2 Columns', 'shopwise' ),
					'4'		  => esc_html__( '3 Columns', 'shopwise' ),
				],
				'condition' => ['category_type' => ['type2']]
			]
		);
		
        $this->add_control( 'order',
            [
                'label' => esc_html__( 'Select Order', 'partdo' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'ASC' => esc_html__( 'Ascending', 'partdo' ),
                    'DESC' => esc_html__( 'Descending', 'partdo' )
                ],
                'default' => 'ASC'
            ]
        );
		
        $this->add_control( 'orderby',
            [
                'label' => esc_html__( 'Order By', 'partdo' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'id' => esc_html__( 'Post ID', 'partdo' ),
                    'menu_order' => esc_html__( 'Menu Order', 'partdo' ),
                    'rand' => esc_html__( 'Random', 'partdo' ),
                    'date' => esc_html__( 'Date', 'partdo' ),
                    'title' => esc_html__( 'Title', 'partdo' ),
                ],
                'default' => 'menu_order',
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
               ]
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
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'button_color',
			[
               'label' => esc_html__( 'Button Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .klbth-module-header .btn' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'button_hvrcolor',
			[
               'label' => esc_html__( 'Button Hover Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .klbth-module-header .btn:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .klbth-module-header .btn' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'button_text_shadow',
				'selector' => '{{WRAPPER}} .klbth-module-header .btn',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .klbth-module-header .btn',
				
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		

		if($settings['cat_filter'] || $settings['exclude_category']){
			$terms = get_terms( array(
				'taxonomy' => 'product_cat',
				'hide_empty' => 1,
				'parent'    => 0,
				'include'   => $settings['cat_filter'],
				'exclude'   => $settings['exclude_category'],
				'order'          => $settings['order'],
				'orderby'        => $settings['orderby']
			) );
		} else {
			$terms = get_terms( array(
				'taxonomy' => 'product_cat',
				'hide_empty' => 1,
				'parent'    => 0,
				'order'          => $settings['order'],
				'orderby'        => $settings['orderby']
			) );
		}
		
		if($settings['category_type'] == 'type2'){
			
			echo '<div class="row"> ';
			foreach ( $terms as $term ) {
				$term_data = get_option('taxonomy_'.$term->term_id);
				$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
				$image = wp_get_attachment_url( $thumbnail_id );
				$term_children = get_term_children( $term->term_id, 'product_cat' );
				
				
				echo '<div class="klb-product-category col col-12 col-md-6 col-lg-'.esc_attr($settings['type2_column']).'">'; 
				echo '<div class="klbth-module klbth-module-categories style-2">';
				echo '<div class="klbth-module-body">';
				echo '<div class="categories list-style"> ';
				echo '<div class="category">'; 
				if($image){
				echo '<div class="entry-media"><a href="'.esc_url(get_term_link( $term )).'"> <img src="'.esc_url($image).'" alt="'.esc_attr($term->name).'"/></a></div>';
				}
				echo '<div class="entry-detail"> ';
				echo '<h4 class="category-name">'.esc_html($term->name).'</h4>';
				echo '<div class="sub-categories"> ';
				if($term_children){
					$count = 0;
					echo '<ul>';
					foreach($term_children as $child){
						if($count < 4){
						$childterm = get_term_by( 'id', $child, 'product_cat' );
						
						echo '<li><a href="'.esc_url(get_term_link( $child )).'">'.esc_html($childterm->name).'</a></li>';
						}
						
						$count++;
					}
					echo '</ul>';
				}
				echo '</div><a class="btn link" href="'.esc_url(get_term_link( $term )).'"> '.esc_html__('All','partdo-core').' '.esc_html($term->name).' <i class="klbth-icon-arrow-right-long"></i></a>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
			 
			}
			echo '</div>';
			
		} else {
			$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
			
			echo '<div class="klbth-module klbth-module-categories style-1">';			
			if($settings['title'] || $settings['subtitle']){
				echo '<div class="klbth-module-header with-border color-default counter-deactive align-default">';
				echo '<h3 class="entry-title">'.esc_html($settings['title']).'</h3>';
				echo '<div class="entry-description">';
				echo '<p>'.partdo_sanitize_data($settings['subtitle']).'</p>';
				echo '</div><a class="btn link" href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).'> '.esc_html($settings['btn_title']).' <i class="klbth-icon-arrow-right-long"></i></a>';		
				echo '</div><!-- module-header -->';
			}
			
			
			echo '<div class="klbth-module-body">';
			echo '<div class="categories grid-style column-'.esc_attr($settings['type1_column']).'">';

			foreach ( $terms as $term ) {
				$term_data = get_option('taxonomy_'.$term->term_id);
				$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
				$image = wp_get_attachment_url( $thumbnail_id );
				$term_children = get_term_children( $term->term_id, 'product_cat' );
			
				echo '<div class="category-item"><a class="category-inner" href="'.esc_url(get_term_link( $term )).'">';
				if($image){
				echo '<div class="entry-media"><img src="'.esc_url($image).'" alt="'.esc_attr($term->name).'"/></div>';
				}
				echo '<div class="entry-content"> ';
				echo '<h3 class="category-name">'.esc_html($term->name).'</h3><span class="counter">'.sprintf(_n('%d item', '%d items', $term->count, 'partdo'), $term->count).'</span>';
				echo '</div></a>';
				echo '</div>';
			
			}

			echo '</div>';
			echo '</div>';
			echo '</div><!-- module -->';
			
		}
	}

}

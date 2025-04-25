<?php

namespace Elementor;

class Partdo_Latest_Blog_Widget extends Widget_Base {
    use Partdo_Helper;

    public function get_name() {
        return 'partdo-latest-blog';
    }
    public function get_title() {
        return 'Lateste Posts (K)';
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
                'label_block' => true,
                'default' => 'Our Latest News',
                'pleaceholder' => esc_html__( 'Add a title.', 'partdo-core' ),
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'partdo-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Dont miss out on this weeks deals',
                'pleaceholder' => esc_html__( 'Add a subtitle.', 'partdo-core' ),
            ]
        );
		
		$this->add_control( 'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'partdo-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'View All ',
                'pleaceholder' => esc_html__( 'Enter button title here', 'partdo-core' ),
            ]
        );
		
        $this->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'partdo-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'partdo-core' )
            ]
        );
		
				
		$this->add_control( 'column',
			[
				'label' => esc_html__( 'Column', 'partdo-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '4',
				'options' => [
					'select-column' => esc_html__( 'Select Column', 'partdo-core' ),
					'5'	  => esc_html__( '5 Columns', 'partdo-core' ),
					'4'   => esc_html__( '4 Columns', 'partdo-core' ),
					'3'	  => esc_html__( '3 Columns', 'partdo-core' ),
				],
			]
		);
		
        $this->add_control( 'post_count',
            [
                'label' => esc_html__( 'Posts Per Page', 'partdo-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => count( get_posts( array('post_type' => 'post', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default' => 4
            ]
        );
		
       $this->add_control( 'excerpt_size',
            [
                'label' => esc_html__( 'Excerpt Size', 'partdo-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'default' => 15
            ]
        );
		
        $this->add_control( 'category_filter',
            [
                'label' => esc_html__( 'Category', 'naturally' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->partdo_get_categories(),
                'description' => 'Select Category(s)',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'post_filter',
            [
                'label' => esc_html__( 'Specific Post(s)', 'naturally' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->partdo_get_posts(),
                'description' => 'Select Specific Post(s)',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'order',
            [
                'label' => esc_html__( 'Select Order', 'partdo-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'ASC' => esc_html__( 'Ascending', 'partdo-core' ),
                    'DESC' => esc_html__( 'Descending', 'partdo-core' )
                ],
                'default' => 'DESC'
            ]
        );
		
        $this->add_control( 'orderby',
            [
                'label' => esc_html__( 'Order By', 'partdo-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'id' => esc_html__( 'Post ID', 'partdo-core' ),
                    'menu_order' => esc_html__( 'Menu Order', 'partdo-core' ),
                    'rand' => esc_html__( 'Random', 'partdo-core' ),
                    'date' => esc_html__( 'Date', 'partdo-core' ),
                    'title' => esc_html__( 'Title', 'partdo-core' ),
                ],
                'default' => 'date',
            ]
        );
		
		$this->add_control(
			'disable_pagination',
			[
				'label' => esc_html__('Disable Pagination', 'partdo-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'partdo-core' ),
				'label_off' => esc_html__( 'No', 'partdo-core' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		
        $this->add_control( 'image_width',
            [
                'label' => esc_html__( 'Image Width', 'partdo-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '290',
                'pleaceholder' => esc_html__( 'Set the product image width.', 'partdo-core' )
            ]
        );
		
        $this->add_control( 'image_height',
            [
                'label' => esc_html__( 'Image Height', 'partdo-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '217',
                'pleaceholder' => esc_html__( 'Set the product image height.', 'partdo-core' )
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
               'selectors' => ['{{WRAPPER}} .klbth-module-header .entry-title' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'title_hvrcolor',
			[
               'label' => esc_html__( 'Title Hover Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .klbth-module-header .entry-title:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .klbth-module-header .entry-title ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .klbth-module-header .entry-title',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .klbth-module-header .entry-title',
				
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
               'selectors' => ['{{WRAPPER}} .klbth-module-header .entry-description' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'subtitle_hvrcolor',
			[
               'label' => esc_html__( 'Subtitle Hover Color', 'partdo-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .klbth-module-header .entry-description:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .klbth-module-header .entry-description ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .klbth-module-header .entry-description ',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'partdo-core' ),

                'selector' => '{{WRAPPER}} .klbth-module-header .entry-description',
				
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
		$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
		
		$output = '';
		
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}
	
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => $settings['post_count'],
			'order'          => 'DESC',
			'post_status'    => 'publish',
			'paged' 			=> $paged,
            'post__in'       => $settings['post_filter'],
            'order'          => $settings['order'],
			'orderby'        => $settings['orderby'],
            'category__in'     => $settings['category_filter'],
		);
		
		$output .= '<div class="klbth-module klbth-module-grid grid-'.esc_attr($settings['column']).'">';
		$output .= '<div class="klbth-module-header with-border color-default counter-deactive align-default">';
		$output .= '<h3 class="entry-title">'.esc_html($settings['title']).'</h3>';
		$output .= '<div class="entry-description">';
		$output .= '<p>'.esc_html($settings['subtitle']).'</p>';
		$output .= '</div><a class="btn link" href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).'> '.esc_html($settings['btn_title']).' <i class="klbth-icon-arrow-right-long"></i></a>';
		$output .= '</div>';
		$output .= '<div class="klbth-module-body">';
		$output .= '<div class="blog-posts">';

		
		$count = 1;
		$loop = new \WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				global $product;
				global $post;
				global $woocommerce;
			
				$id = get_the_ID();
				
				$att=get_post_thumbnail_id();
				$image_src = wp_get_attachment_image_src( $att, 'full' );
				if($image_src){
				$image_src = $image_src[0];
				}
				if($settings['image_width'] && $settings['image_height']){
					$imageresize = partdo_resize( $image_src, $settings['image_width'], $settings['image_height'], true, true, true );  
				} else {
					$imageresize = $image_src;
				}

				$taxonomy = strip_tags( get_the_term_list($post->ID, 'category', '', ', ', '') );
				
				$output .= '<div class="post">';
				$output .= '<div class="entry-media">';
				$output .= '<div class="entry-categories">';
				$output .= '<a href="'.get_permalink().'">'.esc_html($taxonomy).'</a>';
				$output .= '</div>';
				
				if($image_src){
					$output .= '<a href="'.get_permalink().'"><img src="'.esc_url($imageresize).'" alt="'.the_title_attribute( 'echo=0' ).'"/></a>';
				}
				 
				$output .= '</div>';
				$output .= '<div class="entry-wrapper"> ';
				$output .= '<div class="entry-published"> <a href="'.get_permalink().'">'.get_the_date('j M Y').'</a></div>';
				$output .= '<div class="entry-title"> <a href="'.get_permalink().'">'.get_the_title().'</a></div>';
				$output .= '<div class="entry-excerpt">';
				$output .= '<p>'.partdo_limit_words(get_the_excerpt(), $settings['excerpt_size']).'</p>';
				$output .= '</div>';
				$output .= '<div class="entry-meta">'; 
				$output .= '<div class="meta-item"> <span>'.esc_html__('author','partdo-core').' </span><a class="author" href="'.get_permalink().'"> <span>'.esc_html__('by','partdo-core').' </span>'.get_the_author().'</a></div>';
				
				if(get_comments_number() > 1) {
					$output .= '<div class="meta-item"> <span>'.esc_html__('comment','partdo-core').' </span><a href="'.get_permalink().'">'.get_comments_number().' '.esc_html__('comments','partdo-core').'</a></div>';
				} else {
					$output .= '<div class="meta-item"> <span>'.esc_html__('comment','partdo-core').' </span><a href="'.get_permalink().'">'.get_comments_number().' '.esc_html__('comment','partdo-core').'</a></div>';
				}
				
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';					
				
				
			endwhile;
		
			if($settings['disable_pagination'] != 'yes'){
				ob_start();
				get_template_part( 'post-format/pagination' );
				$output .= '<div class="col-12">'. ob_get_clean().'</div>';
			}
		
		}
		wp_reset_postdata();
		

		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';

		
		echo $output;
	}

}

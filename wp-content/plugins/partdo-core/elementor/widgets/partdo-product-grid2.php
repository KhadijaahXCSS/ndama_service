<?php

namespace Elementor;

class Partdo_Product_Grid2_Widget extends Widget_Base {
    use Partdo_Helper;

    public function get_name() {
        return 'partdo-product-grid2';
    }
    public function get_title() {
        return 'Product Grid 2 (K)';
    }
    public function get_icon() {
        return 'eicon-slider-push';
    }
    public function get_categories() {
        return [ 'partdo' ];
    }

	protected function register_controls() {
		
		/***** START QUERY CONTROLS SECTION *****/
		$this->partdo_query_elementor_controls($post_count = 4, $column = 2);
		/***** END QUERY CONTROLS SECTION *****/

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$output = '';
			
		$output .= '<div class="klbth-module klbth-module-product-grid dumps">';	
		$output .= '<div class="klbth-module-body">';
		$output .= '<div class="products-grid-wrapper">';
		$output .= '<div class="products gutter-30  strech hover-opacity column-'.esc_attr($settings['column']).' mobile-'.esc_attr($settings['mobile_column']).' total-'.esc_attr($settings['post_count']).'">';
		
		$output .= $this->partdo_elementor_product_loop($settings);
		
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';



		echo $output;
	}

}

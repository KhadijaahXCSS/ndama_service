<?php

class widget_banner extends WP_Widget { 
	
	// Widget Settings
	function __construct() {
		$widget_ops = array('description' => esc_html__('Banner','partdo-core') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'banner' );
		 parent::__construct( 'banner', esc_html__('Partdo Banner','partdo-core'), $widget_ops, $control_ops );
	}


	
	// Widget Output
	function widget($args, $instance) {

		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
		
		$image				= get_theme_mod('partdo_widget_banner_image'); 
		$bannertitle 		= get_theme_mod('partdo_widget_banner_title'); 
		$bannersubtitle 	= get_theme_mod('partdo_widget_banner_subtitle');
		$bannerbuttontext 	= get_theme_mod('partdo_widget_banner_buttontext');
		$bannerbuttonurl 	= get_theme_mod('partdo_widget_banner_buttonurl');
		
		echo $before_widget;

		if($title) {
			echo $before_title . $title . $after_title;
		}
		?>
		
			<div class="widget-body"> 
				<div class="klbth-banner style-inner color-scheme-dark space-sm align-start justify-start hover-zoom">
					<div class="entry-wrapper overlay-10-dark-max768 dump">
						<div class="entry-inner w-100">
							<div class="entry-heading banner-heading"><span class="badge"><?php echo esc_html($bannersubtitle); ?></span>
								<h2 class="entry-title font-banner-xs"><?php echo esc_html($bannertitle); ?></h2>
							</div>
							<div class="entry-footer vertical banner-footer">
								<div class="banner-button">
									<button href="<?php echo esc_url($bannerbuttonurl); ?>" class="btn link"> <?php echo esc_html($bannerbuttontext); ?> <i class="klbth-icon-arrow-right-long"></i></button>
								</div>
							</div>
						</div>
					</div>
					<div class="entry-media">
						<img src="<?php echo esc_url(wp_get_attachment_url($image)); ?>" alt="slider image">
					</div>
					<a class="link-mask" href="<?php echo esc_url($bannerbuttonurl); ?>"> </a>
				</div>
			</div>
	     
		<?php echo $after_widget;
		
	}
	
	function update( $new_instance, $old_instance ) {  
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);

		
		return $instance;
	}
	
	
	// Backend Form
	function form($instance) {
		
		$defaults = array('title' => '');
		$instance = wp_parse_args((array) $instance, $defaults); ?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:','partdo-core'); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
		  <?php esc_html_e('You can customize the banner from Dashboard > Appearance > Customize > partdo Widgets > Banner','partdo-core'); ?>

		</p>
	<?php
	}
}

// Add Widget
function widget_banner_init() {
	register_widget('widget_banner');
}
add_action('widgets_init', 'widget_banner_init');

?>
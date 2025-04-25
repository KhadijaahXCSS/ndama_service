<?php
/**
* Plugin Name: Partdo Core
* Description: Premium & Advanced Essential Elements for Elementor
* Plugin URI:  http://themeforest.net/user/KlbTheme
* Version:     1.3.1
* Author:      KlbTheme
* Author URI:  http://themeforest.net/user/KlbTheme
*/


/*
* Exit if accessed directly.
*/

if ( ! defined( 'ABSPATH' ) ) exit;

final class Partdo_Elementor_Addons
{
    /**
    * Plugin Version
    *
    * @since 1.0
    *
    * @var string The plugin version.
    */
    const VERSION = '1.0.0';

    /**
    * Minimum Elementor Version
    *
    * @since 1.0
    *
    * @var string Minimum Elementor version required to run the plugin.
    */
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

    /**
    * Minimum PHP Version
    *
    * @since 1.0
    *
    * @var string Minimum PHP version required to run the plugin.
    */
    const MINIMUM_PHP_VERSION = '7.0';

    /**
    * Instance
    *
    * @since 1.0
    *
    * @access private
    * @static
    *
    * @var Partdo_Elementor_Addons The single instance of the class.
    */
    private static $_instance = null;

    /**
    * Instance
    *
    * Ensures only one instance of the class is loaded or can be loaded.
    *
    * @since 1.0
    *
    * @access public
    * @static
    *
    * @return Partdo_Elementor_Addons An instance of the class.
    */
    public static function instance()
    {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
    * Constructor
    *
    * @since 1.0
    *
    * @access public
    */
    public function __construct()
    {
        add_action( 'init', [ $this, 'i18n' ] );
        add_action( 'plugins_loaded', [ $this, 'init' ] );
    }

    /**
    * Load Textdomain
    *
    * Load plugin localization files.
    *
    * Fired by `init` action hook.
    *
    * @since 1.0
    *
    * @access public
    */
    public function i18n()
    {
        load_plugin_textdomain( 'partdo-core' );
    }
	
   /**
    * Initialize the plugin
    *
    * Load the plugin only after Elementor (and other plugins) are loaded.
    * Checks for basic plugin requirements, if one check fail don't continue,
    * if all check have passed load the files required to run the plugin.
    *
    * Fired by `plugins_loaded` action hook.
    *
    * @since 1.0
    *
    * @access public
    */
    public function init()
    {
        // Check if Elementor is installed and activated
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'partdo_admin_notice_missing_main_plugin' ] );
            return;
        }
        // Check for required Elementor version
        if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'partdo_admin_notice_minimum_elementor_version' ] );
            return;
        }
        // Check for required PHP version
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [ $this, 'partdo_admin_notice_minimum_php_version' ] );
            return;
        }
		
		// Categories registered
        add_action( 'elementor/elements/categories_registered', [ $this, 'partdo_add_widget_category' ] );

		/* Init Include */
        require_once( __DIR__ . '/init.php' );

        /* Customizer Kirki */
        require_once( __DIR__ . '/inc/customizer.php' );

        /* Style php */
        require_once( __DIR__ . '/inc/style.php' );
		
		/* Aq Resizer Image Resize */
        require_once( __DIR__ . '/inc/aq_resizer.php' );
		
		/* Breadcrumb */
        require_once( __DIR__ . '/inc/breadcrumb.php' );

		/* Newsletter */
		if(get_theme_mod('partdo_newsletter_popup_toggle',0) == 1){
			require_once( __DIR__ . '/inc/newsletter-popup/newsletter-main.php' );
		}

		/* GDPR */
		if(get_theme_mod('partdo_gdpr_toggle',0) == 1){
			require_once( __DIR__ . '/inc/gdpr/gdpr-main.php' );
		}
		
		/* KLB Attribute Search Filter */
		require_once( __DIR__ . '/inc/klb-attribute-search/klb-attribute-search.php' );
		
		/* Post view for popular posts widget */
        require_once( __DIR__ . '/inc/post_view.php' );

        /* Popular Posts Widget */
        require_once( __DIR__ . '/widgets/widget-popular-posts.php' );

		/* Search Filter */
        require_once( __DIR__ . '/widgets/widget-search-filter.php' );
		
		/* Social Media */
        require_once( __DIR__ . '/widgets/widget-social-media.php' );
		
		/* Banner */
        require_once( __DIR__ . '/widgets/widget-banner.php' );
		
		/* WooCommerce Filter */
        require_once( __DIR__ . '/woocommerce-filter/woocommerce-filter.php' );
		
		/* Location Taxonomy */
		if(get_theme_mod('partdo_location_filter',0) == 1){
			require_once( __DIR__ . '/taxonomy/location_taxonomy.php' );
		}
		
		/* Maintenance */
		if(get_theme_mod('partdo_maintenance_toggle', 0) == 1 || partdo_ft() == 'maintenance'){
			require_once( __DIR__ . '/inc/maintenance/maintenance.php' );
		}
		
		/* Icon Picker */
		require_once( __DIR__ . '/inc/icon-picker/icon-picker.php' );

		/* Menu Endpoints - Mega Menu*/
		require_once( __DIR__ . '/inc/menu-endpoints/menu-endpoints.php' );

        /* Custom plugin helper functions */
        require_once( __DIR__ . '/elementor/classes/class-helpers-functions.php' );
		
        /* Custom plugin helper functions */
        require_once( __DIR__ . '/elementor/classes/class-customizing-page-settings.php' );

        // Register Widget Styles
        add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );
		
        // Register Widget Scripts
        add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ] );
		
		// Register Widget Editor Style
		add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'widget_editor_style' ] );

        // Register Widget Editor Scripts
        add_action( 'elementor/editor/after_enqueue_scripts', [ $this, 'widget_editor_scripts' ] );
		
        // Widgets registered
        add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );
    }
	
    /**
    * Register Widgets Category
    *
    */
    public function partdo_add_widget_category( $elements_manager )
    {
        $elements_manager->add_category( 'partdo', ['title' => esc_html__( 'Partdo Core', 'partdo-core' )]);
    }	
	
    /**
    * Init Widgets
    *
    * Include widgets files and register them
    *
    * @since 1.0
    *
    * @access public
    */
    public function init_widgets()
    {

		// Home Slider
		require_once( __DIR__ . '/elementor/widgets/partdo-home-slider.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Home_Slider_Widget() );
		
		// Partdo Banner Box
		require_once( __DIR__ . '/elementor/widgets/partdo-banner-box.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Banner_Box_Widget() );
		
		// Partdo Banner Box 2
		require_once( __DIR__ . '/elementor/widgets/partdo-banner-box2.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Banner_Box2_Widget() );
		
		// Partdo Text Banner
		require_once( __DIR__ . '/elementor/widgets/partdo-text-banner.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Text_Banner_Widget() );
		
		// Partdo Product Tab Carousel
		require_once( __DIR__ . '/elementor/widgets/partdo-product-tab-carousel.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Product_Tab_Carousel_Widget() );
		
		// Partdo Deals Product
		require_once( __DIR__ . '/elementor/widgets/partdo-deals-product.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Deals_Product_Widget() );
		
		// Partdo Deals Product 2
		require_once( __DIR__ . '/elementor/widgets/partdo-deals-product2.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Deals_Product2_Widget() );
		
		// Partdo Category Banner
		require_once( __DIR__ . '/elementor/widgets/partdo-category-banner.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Category_Banner_Widget() );
		
		// Partdo Category Banner 2
		require_once( __DIR__ . '/elementor/widgets/partdo-category-banner2.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Category_Banner2_Widget() );
		
		// Partdo Product Grid
		require_once( __DIR__ . '/elementor/widgets/partdo-product-grid.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Product_Grid_Widget() );
		
		// Partdo Product Grid 2
		require_once( __DIR__ . '/elementor/widgets/partdo-product-grid2.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Product_Grid2_Widget() );
		
		// Partdo Product Categories
		require_once( __DIR__ . '/elementor/widgets/partdo-product-categories.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Product_Categories_Widget() );
		
		// Partdo Product Search 
		require_once( __DIR__ . '/elementor/widgets/partdo-product-search.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Product_Search_Widget() );
		
		// Partdo Custom Title
		require_once( __DIR__ . '/elementor/widgets/partdo-custom-title.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Custom_Title_Widget() );
		
		// Partdo Testimonial Carousel
		require_once( __DIR__ . '/elementor/widgets/partdo-testimonial-carousel.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Testimonial_Carousel_Widget() );
		
		// Partdo Latest Blog
		require_once( __DIR__ . '/elementor/widgets/partdo-latest-blog.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Latest_Blog_Widget() );
		
		// Partdo Client Carousel 
		require_once( __DIR__ . '/elementor/widgets/partdo-client-carousel.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Client_Carousel_Widget() );
		
		// Partdo Product List
		require_once( __DIR__ . '/elementor/widgets/partdo-product-list.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Product_List_Widget() );
		
		// Partdo Special Product 
		require_once( __DIR__ . '/elementor/widgets/partdo-special-product.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Special_Product_Widget() );
		
		// Partdo Special Product 2
		require_once( __DIR__ . '/elementor/widgets/partdo-special-product2.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Special_Product2_Widget() );
		
		// Partdo Icon List Widget
		require_once( __DIR__ . '/elementor/widgets/partdo-icon-list.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Icon_List_Widget() );
		
		// Partdo Icon Box 
		require_once( __DIR__ . '/elementor/widgets/partdo-icon-box.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Icon_Box_Widget() );
		
		// Partdo Button 
		require_once( __DIR__ . '/elementor/widgets/partdo-button.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Button_Widget() );

		// Partdo Breadcrumb 
		require_once( __DIR__ . '/elementor/widgets/partdo-breadcrumb.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Breadcrumb_Widget() );
		
		// Partdo Address Box 
		require_once( __DIR__ . '/elementor/widgets/partdo-address-box.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Address_Box_Widget() );
		
		// Partdo Contact Icon Box 
		require_once( __DIR__ . '/elementor/widgets/partdo-contact-icon-box.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Contact_Icon_Box_Widget() );
		
		// Partdo Page Banner 
		require_once( __DIR__ . '/elementor/widgets/partdo-page-banner.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Page_Banner_Widget() );
		
		// Partdo Contact_Form 7 
		require_once( __DIR__ . '/elementor/widgets/partdo-contact-form-7.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Partdo_Contact_Form_7_Widget() );
		
		
		


	}
	
	
    /**
    * Admin notice
    *
    * Warning when the site doesn't have Elementor installed or activated.
    *
    * @since 1.0
    *
    * @access public
    */
    public function partdo_admin_notice_missing_main_plugin()
    {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__( '%1$s requires %2$s to be installed and activated.', 'partdo-core' ),
            '<strong>' . esc_html__( 'Partdo Core', 'partdo-core' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'partdo-core' ) . '</strong>'
        );
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    /**
    * Admin notice
    *
    * Warning when the site doesn't have a minimum required Elementor version.
    *
    * @since 1.0
    *
    * @access public
    */
    public function partdo_admin_notice_minimum_elementor_version()
    {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__( '%1$s requires %2$s version %3$s or greater.', 'partdo-core' ),
            '<strong>' . esc_html__( 'Partdo Core', 'partdo-core' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'partdo-core' ) . '</strong>',
             self::MINIMUM_ELEMENTOR_VERSION
        );
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    /**
    * Admin notice
    *
    * Warning when the site doesn't have a minimum required PHP version.
    *
    * @since 1.0
    *
    * @access public
    */
    public function partdo_admin_notice_minimum_php_version()
    {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__( '%1$s requires %2$s version %3$s or greater.', 'partdo-core' ),
            '<strong>' . esc_html__( 'Partdo Core', 'partdo-core' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'partdo-core' ) . '</strong>',
             self::MINIMUM_PHP_VERSION
        );
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }
	
    public function widget_styles()
    {
    }

    public function widget_scripts()
    {


		if (is_admin ()){
			wp_enqueue_media ();
			wp_enqueue_script( 'widget-image', plugins_url( 'js/widget-image.js', __FILE__ ));
		}

        // custom-scripts
		if ( is_rtl() ) {
			wp_enqueue_script( 'partdo-core-custom-scripts-rtl', plugins_url( 'elementor/custom-scripts-rtl.js', __FILE__ ), true );
		} else {
			wp_enqueue_script( 'partdo-core-custom-scripts', plugins_url( 'elementor/custom-scripts.js', __FILE__ ), true );
		}
    }
	
    public function widget_editor_style(){
		wp_enqueue_style( 'klb-editor-style', plugins_url( 'elementor/editor-style.css', __FILE__ ), true );
    }

    public function widget_editor_scripts(){
		
		wp_enqueue_script( 'klb-editor-scripts', plugins_url( 'elementor/editor-scripts.js', __FILE__ ), true );

    }


} 
Partdo_Elementor_Addons::instance();
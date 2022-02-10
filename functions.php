<?php 

// WooCommerce Hook 

add_filter( 'wp_calculate_image_sizes', '__return_empty_array');
add_filter( 'wp_calculate_image_srcset', '__return_empty_array');

add_filter( 'woocommerce_product_add_to_cart_text', 'simpleshop_product_add_to_cart');
function simpleshop_product_add_to_cart( $text ) {
    return '<i class="fa fa-shopping-basket"></i>';
}

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
//remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 10);
add_action( 'woocommerce_before_shop_loop_item', 'ss_woocommerce_before_shop_loop_item' );
function ss_woocommerce_before_shop_loop_item() {
    echo '<div class="product-wrap">';
}
add_action( 'woocommerce_before_shop_loop_item_title', 'ss_woocommerce_before_shop_loop_item_title' );
function ss_woocommerce_before_shop_loop_item_title() {
    echo '</div><div class="woocommerce-product-title-wrap">';
}

// WooCommerce Hook


require_once("inc/customizer/customizer-main.php");

add_filter( 'woocommerce_subcategory_count_html', 'simpleshop_subcategory_count' );
function simpleshop_subcategory_count( $html ) {
    if( !get_theme_mod( 'simpleshop_display_homepage_category_count' ) ) {
        return;
    }
    return $html;
}

// Registter a navmenu
add_action('init', 'simpleshop_register_menu');
if( ! function_exists( 'simpleshop_register_menu' ) ) {
    function simpleshop_register_menu() {
        register_nav_menus(array(
            'header-menu'   =>  __('Header Menu', 'shibbir'),
            'footer-menu'   =>  __('Footer menu', 'shibbir'),
        ));
    }
}

// Register a side
add_action( 'widgets_init', 'simpleshop_register_widget' );
if( !function_exists( 'simpleshop_register_widget' ) ) {
    function simpleshop_register_widget() {
        register_sidebar( array(
            'id'    =>  'right-sidebare',
            'name'  =>  __('Right Sidebar', 'shibbir' ),
            'desciption'    =>  __('Right sidebar content', 'shibbir'), 
            'before_widget' =>  '<div id="%1$s" class="widget %2$s">',
            'after_widget'  =>  '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
    }
}

add_action( 'after_setup_theme', 'simpleshop_after_setup_theme' );
if( ! function_exists( 'simpleshop_after_setup_theme' ) ) {
    function simpleshop_after_setup_theme() {
        $args = array(
            'default-image'      => get_template_directory_uri() . '/assets/images/default-banner.png',
            'default-text-color' => '#000',
            'header-text'        => true,
            'width'              => 1000,
            'height'             => 250,
            'flex-width'         => true,
            'flex-height'        => true,
        );
        add_theme_support( 'custom-header', $args );
    
        $defaults = array(
            'height'    =>  100, 
            'width' =>  100,
            'flex-width'    =>  true, 
            'flex-height'   =>  true,
            'header_text'   =>  array( 'Site title', 'Site Description' )
        );
        add_theme_support( 'custom-logo', $defaults );
        
        add_theme_support( 'post-formats', array(
            'aside', 'gallery'
        ));
    
        add_theme_support( 'title-tag' );
        // Add feature image support
        add_theme_support( 'post-thumbnails' );
    
        add_theme_support( 'html5', array(
            'comment-form',
            'comment-list',
            'caption'
        ) );
    
        load_theme_textdomain('shibbir', get_template_directory_uri() . '/languages');
    
        add_theme_support( 'woocommerce', array(
            'thumbnail_image_width' =>  150,
            'single_image_width'    =>  150,
            'product_grid'  =>  array(
                'default_rows'  =>  2,
                'min_rows'  => 2,
                'max_rows'  =>  4,
                'default_columns' => 1,
                'min_columns'     => 4,
                'max_columns'     => 4,
            )
        ) );
    
        add_theme_support( 'custom-background', apply_filters( 'simpleshop_custom_background_args', array(
            'default-color' =>  '#fff',
            'default-image' =>  '',
        ) ) );
    
        add_theme_support( 'customize-selective-refresh-widgets' );
    } 
}

// Register editor stylesheet
add_action( 'admin_init', 'simpleshop_add_editor_styles' );
if( ! function_exists( 'simpleshop_add_editor_styles' ) ) {
    function simpleshop_add_editor_styles() {
        add_editor_style( 'custom-editor-style.css' );
    }
}

// Hook theme setup
add_action( 'after_theme_setup', 'simpleshop_theme_setup' );
if( ! function_exists( 'simpleshop_theme_setup') ) {
    function simpleshop_theme_setup () {

        add_theme_support( 'automatic-feed-links' );

        add_theme_support( 'post-formates', array(
            'aside', 'gallery', 'quote', 'image', 'video'
        ) );

        add_theme_support( 'custom-header', array( 
            'default-text-color'    =>  '#000',
            'width' =>  1000,
            'height'    =>  250, 
        ) );

        // Register menu
        register_nav_menus(array(
            'primary'   =>  __( 'Prmary Menu', 'Shibbir' ),
            'secondary'   =>  __( 'Secondary Menu', 'Shibbir' )
        ));

        // load textdomain
        load_theme_textdomain( 'shibbir', get_template_directory() . '/languages');
    }
}

// Register theme styles and scripts
add_action( 'wp_enqueue_scripts', 'simpleshop_styles_scripts' );
if( ! function_exists( 'simpleshop_styles_scripts' ) ) {
    function simpleshop_styles_scripts () {

        wp_enqueue_style( 'web-font-css', '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900' );
        wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css' );
        wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/assets/vendor/font-awesome/css/font-awesome.min.css' );
        wp_enqueue_style( 'bicon-css', get_template_directory_uri() . '/assets/vendor/bicon/css/bicon.css' );

        // wp_enqueue_style( 'woocommerce-layout-css', get_template_directory_uri() . '/assets/css/woocommerce-layouts.css' );
        // wp_enqueue_style( 'woocommerce-small-screen-css', get_template_directory_uri() . '/assets/css/woocommerce-small-screen.css' );
        // wp_enqueue_style( 'woocommerce-css', get_template_directory_uri() . '/assets/css/woocommerce.css' );

        wp_enqueue_style( 'main-css', get_template_directory_uri() . '/assets/css/main.css' );
        wp_enqueue_style( 'simple-shop-css', get_stylesheet_uri() );
    
        wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.min.js', array( 'jquery'), null, true );
        wp_enqueue_script( 'popper-js', get_template_directory_uri() . '/assets/vendor/popper.min.js', array( 'jquery'), null, true );
        wp_enqueue_script( 'script-js', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery'), time(), true );
    
        if( is_singular() && comments_open() && get_option('thread_comments') ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }    
}

if ( ! isset ( $content_width) ) {
    $content_width = 800;
}

// remove_all_actions('the_content');

// echo '<pre>'; 
//     print_r( did_action( 'the_content' ) ); 
// echo '</pre>';

// add_action( 'all', 'shibbir_debug' );
// function shibbir_debug() {
//     echo '<div class="all-action">';
//     echo current_action();
//     echo '</div>';
// }
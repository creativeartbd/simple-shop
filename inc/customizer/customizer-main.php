<?php 
define( 'SIMPLESHOP_CUSTOMIZER_CONFIG_ID', 'simpleshop_customizer_settings' );
define( 'SIMPLESHOP_CUSTOMIZER_PANEL_ID', 'simpleshop_customizer_panel' );

if( class_exists( 'Kirki' ) ) {
    
    Kirki::add_config( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, array(
        'capability'    => 'edit_theme_options',
        'option_type'   => 'theme_mod',
    ) );

    Kirki::add_panel( SIMPLESHOP_CUSTOMIZER_PANEL_ID, array(
        'priority'    => 10,
        'title'       => esc_html__( 'Simple Shop', 'simpleshop' ),
        'description' => esc_html__( 'Simpleshop Settings', 'simpleshop' ),
    ) );

    Kirki::add_section( 'simpleshop_homepage', array(
        'title'          => esc_html__( 'Homepage Settings', 'kirki' ),
        'panel'          => SIMPLESHOP_CUSTOMIZER_PANEL_ID,
        'priority'       => 160,
        'active_callback'   =>  function() {
            return is_page_template('page-templates/homepage.php');
        }
    ) );

    Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
        'type'        => 'switch',
        'settings'    => 'simpleshop_display_homepage_shop_category',
        'label'       => esc_html__( 'Display Category Section', 'simpleshop' ),
        'section'     => 'simpleshop_homepage',
        'default'     => 'on',
        'priority'    => 10,
        'choices'     => [
            'on'  => esc_html__( 'Show', 'simpleshop' ),
            'off' => esc_html__( 'Hide', 'simpleshop' ),
        ],
    ] );

    Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
        'type'     => 'text',
        'settings' => 'simpleshop_homepage_category_title',
        'label'    => esc_html__( 'Category Title', 'kirki' ),
        'section'  => 'simpleshop_homepage',
        'default'  => esc_html__( 'Shop by Category', 'kirki' ),
        'priority' => 10,
        'active_callback'   =>  [
            [
                'setting'  =>  'simpleshop_display_homepage_shop_category',
                'operator'  =>  '==',
                'value' =>  true,
            ]
        ]
    ] );

    Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
        'type'     => 'number',
        'settings' => 'simpleshop_homepage_noof_category',
        'label'    => esc_html__( 'Number of Category', 'kirki' ),
        'section'  => 'simpleshop_homepage',
        'default'  => 3,
        'priority' => 10,
        'active_callback'   =>  [
            [
                'setting'  =>  'simpleshop_display_homepage_shop_category',
                'operator'  =>  '==',
                'value' =>  true,
            ]
        ]
    ] );

    Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
        'type'        => 'switch',
        'settings'    => 'simpleshop_display_homepage_category_count',
        'label'       => esc_html__( 'Display category count', 'simpleshop' ),
        'section'     => 'simpleshop_homepage',
        'default'     => 'on',
        'priority'    => 10,
        'choices'     => [
            'on'  => esc_html__( 'Show', 'simpleshop' ),
            'off' => esc_html__( 'Hide', 'simpleshop' ),
        ],
        'active_callback'   =>  [
            [
                'setting'  =>  'simpleshop_display_homepage_shop_category',
                'operator'  =>  '==',
                'value' =>  true,
            ]
        ]
    ] );

    // ===============
    // New Arrival 
    // ===============

    Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
        'type'        => 'switch',
        'settings'    => 'simpleshop_display_homepage_new_arrival',
        'label'       => esc_html__( 'Display New Arrival', 'simpleshop' ),
        'section'     => 'simpleshop_homepage',
        'default'     => 'on',
        'priority'    => 10,
        'choices'     => [
            'on'  => esc_html__( 'Show', 'simpleshop' ),
            'off' => esc_html__( 'Hide', 'simpleshop' ),
        ],
    ] );

    Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
        'type'     => 'text',
        'settings' => 'simpleshop_homepage_new_arrival_title',
        'label'    => esc_html__( 'New Arrival Title', 'kirki' ),
        'section'  => 'simpleshop_homepage',
        'default'  => esc_html__( 'New Arrival', 'kirki' ),
        'priority' => 10,
        'active_callback'   =>  [
            [
                'setting'  =>  'simpleshop_display_homepage_new_arrival',
                'operator'  =>  '==',
                'value' =>  true,
            ]
        ]
    ] );

    Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
        'type'     => 'textarea',
        'settings' => 'simpleshop_homepage_new_arrival_sub_title',
        'label'    => esc_html__( 'New Arrival Sub Title', 'kirki' ),
        'section'  => 'simpleshop_homepage',
        'default'  => esc_html__( 'Shop by Category', 'kirki' ),
        'priority' => 10,
        'active_callback'   =>  [
            [
                'setting'  =>  'simpleshop_display_homepage_new_arrival',
                'operator'  =>  '==',
                'value' =>  true,
            ]
        ]
    ] );

    // ===============
    // End New Arrival 
    // ===============

    // ===============
    // New Promo 
    // ===============

    Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
        'type'        => 'switch',
        'settings'    => 'simpleshop_display_homepage_promo',
        'label'       => esc_html__( 'Display Promo Section', 'simpleshop' ),
        'section'     => 'simpleshop_homepage',
        'default'     => 'on',
        'priority'    => 10,
        'choices'     => [
            'on'  => esc_html__( 'Show', 'simpleshop' ),
            'off' => esc_html__( 'Hide', 'simpleshop' ),
        ],
    ] );

    // ===============
    // End Promo 
    // ===============

    // ===============
    // Popular Product 
    // ===============

    Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
        'type'        => 'switch',
        'settings'    => 'simpleshop_display_homepage_popular_product',
        'label'       => esc_html__( 'Display Popular Product', 'simpleshop' ),
        'section'     => 'simpleshop_homepage',
        'default'     => 'on',
        'priority'    => 10,
        'choices'     => [
            'on'  => esc_html__( 'Show', 'simpleshop' ),
            'off' => esc_html__( 'Hide', 'simpleshop' ),
        ],
    ] );

    Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
        'type'     => 'text',
        'settings' => 'simpleshop_display_homepage_popular_product_title',
        'label'    => esc_html__( 'Popular Product Title', 'kirki' ),
        'section'  => 'simpleshop_homepage',
        'default'  => esc_html__( 'Popular Product', 'kirki' ),
        'priority' => 10,
        'active_callback'   =>  [
            [
                'setting'  =>  'simpleshop_display_homepage_popular_product',
                'operator'  =>  '==',
                'value' =>  true,
            ]
        ]
    ] );

    // ===============
    // End Popular Product 
    // ===============

    // ===============
    // Offer 
    // ===============

    Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
        'type'        => 'switch',
        'settings'    => 'simpleshop_display_homepage_offer',
        'label'       => esc_html__( 'Display Offer', 'simpleshop' ),
        'section'     => 'simpleshop_homepage',
        'default'     => 'on',
        'priority'    => 10,
        'choices'     => [
            'on'  => esc_html__( 'Show', 'simpleshop' ),
            'off' => esc_html__( 'Hide', 'simpleshop' ),
        ],
    ] );

    // =================
    // End offer section 
    // =================

    // ===============
    // Flicker 
    // ===============

    Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
        'type'        => 'switch',
        'settings'    => 'simpleshop_display_homepage_flicker',
        'label'       => esc_html__( 'Display Flicker', 'simpleshop' ),
        'section'     => 'simpleshop_homepage',
        'default'     => 'on',
        'priority'    => 10,
        'choices'     => [
            'on'  => esc_html__( 'Show', 'simpleshop' ),
            'off' => esc_html__( 'Hide', 'simpleshop' ),
        ],
    ] );

    Kirki::add_field( SIMPLESHOP_CUSTOMIZER_CONFIG_ID, [
        'type'     => 'text',
        'settings' => 'simpleshop_display_homepage_flicker_title',
        'label'    => esc_html__( 'Simple shop on Flicker', 'kirki' ),
        'section'  => 'simpleshop_homepage',
        'default'  => esc_html__( 'Simple Shop on Flicker Product', 'kirki' ),
        'priority' => 10,
        'active_callback'   =>  [
            [
                'setting'  =>  'simpleshop_display_homepage_flicker',
                'operator'  =>  '==',
                'value' =>  true,
            ]
        ]
    ] );

    // =================
    // End Flicker section 
    // =================
    
}
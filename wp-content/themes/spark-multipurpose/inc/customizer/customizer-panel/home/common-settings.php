<?php
$section_array = get_spark_multipurpose_common_customizer_section();
$super_title_exclude_array = [ 'calltoaction' ];

$exculde_section_array = $section_array;
foreach ($section_array as $id) {
    $wp_customize->add_setting("spark_multipurpose_{$id}_bg_type", array(
        'default' => 'none',
        'sanitize_callback' => 'spark_multipurpose_sanitize_select',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control("spark_multipurpose_{$id}_bg_type", array(
        'section' => "spark_multipurpose_{$id}_section",
        'type' => 'select',
        'label' => esc_html__('Background Type', 'spark-multipurpose'),
        'choices' => array(
            'none' => esc_html__('Default', 'spark-multipurpose'),
            'color-bg' => esc_html__('Color Background', 'spark-multipurpose'),
            'gradient-bg' => esc_html__('Gradient Background', 'spark-multipurpose'),
            'image-bg' => esc_html__('Image Background', 'spark-multipurpose'),
            'video-bg' => esc_html__('Video Background', 'spark-multipurpose')
        ),
        'priority' => 15
    ));
    $wp_customize->add_setting("spark_multipurpose_{$id}_bg_color", array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "spark_multipurpose_{$id}_bg_color", array(
        'section' => "spark_multipurpose_{$id}_section",
        'label' => esc_html__('Background Color', 'spark-multipurpose'),
        'priority' => 20
    )));
    $wp_customize->add_setting("spark_multipurpose_{$id}_bg_gradient", array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Gradient_Control($wp_customize, "spark_multipurpose_{$id}_bg_gradient", array(
        'section' => "spark_multipurpose_{$id}_section",
        'label' => esc_html__('Gradient Background', 'spark-multipurpose'),
        'priority' => 25
    )));
    // Registers example_background settings
    $wp_customize->add_setting("spark_multipurpose_{$id}_bg_image_url", array(
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting("spark_multipurpose_{$id}_bg_image_id", array(
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting("spark_multipurpose_{$id}_bg_image_repeat", array(
        'default' => 'no-repeat',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting("spark_multipurpose_{$id}_bg_image_size", array(
        'default' => 'cover',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting("spark_multipurpose_{$id}_bg_position", array(
        'default' => 'center center',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting("spark_multipurpose_{$id}_bg_image_attach", array(
        'default' => 'fixed',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));
    // Registers example_background control
    $wp_customize->add_control(new Spark_Multipurpose_Background_Control($wp_customize, "spark_multipurpose_{$id}_bg_image", array(
        'label' => esc_html__('Background Image', 'spark-multipurpose'),
        'section' => "spark_multipurpose_{$id}_section",
        'settings' => array(
            'image_url' => "spark_multipurpose_{$id}_bg_image_url",
            'image_id' => "spark_multipurpose_{$id}_bg_image_id",
            'repeat' => "spark_multipurpose_{$id}_bg_image_repeat", // Use false to hide the field
            'size' => "spark_multipurpose_{$id}_bg_image_size",
            'position' => "spark_multipurpose_{$id}_bg_position",
            'attach' => "spark_multipurpose_{$id}_bg_image_attach"
        ),
        'priority' => 30
    )));
    
    $wp_customize->add_setting("spark_multipurpose_{$id}_bg_video", array(
        'default' => '1IaZy0sDLu0',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control("spark_multipurpose_{$id}_bg_video", array(
        'section' => "spark_multipurpose_{$id}_section",
        'type' => 'text',
        'label' => esc_html__('Youtube Video ID', 'spark-multipurpose'),
        'description' => esc_html__('https://www.youtube.com/watch?v=1IaZy0sDLu0. Add only 1IaZy0sDLu0', 'spark-multipurpose'),
        'priority' => 40
    ));
    $wp_customize->add_setting("spark_multipurpose_{$id}_overlay_color", array(
        'default' => 'rgba(255,255,255,0)',
        'sanitize_callback' => 'spark_multipurpose_sanitize_color_alpha',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Alpha_Color_Control($wp_customize, "spark_multipurpose_{$id}_overlay_color", array(
        'label' => esc_html__('Background Overlay Color', 'spark-multipurpose'),
        'section' => "spark_multipurpose_{$id}_section",
        'palette' => array(
            'rgb(255, 255, 255, 0.3)', // RGB, RGBa, and hex values supported
            'rgba(0, 0, 0, 0.3)',
            'rgba( 255, 255, 255, 0.2 )', // Different spacing = no problem
            '#00CC99', // Mix of color types = no problem
            '#00C439',
            '#00C569',
            'rgba( 255, 234, 255, 0.2 )', // Different spacing = no problem
            '#AACC99', // Mix of color types = no problem
            '#33C439',
        ),
        'priority' => 45
    )));
    $wp_customize->add_setting("spark_multipurpose_{$id}_cs_heading", array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, "spark_multipurpose_{$id}_cs_heading", array(
        'section' => "spark_multipurpose_{$id}_section",
        'label' => esc_html__('Color Settings', 'spark-multipurpose'),
        'priority' => 50
    )));

    if( !in_array( $id, $super_title_exclude_array ) ){
        $wp_customize->add_setting("spark_multipurpose_{$id}_super_title_color", array(
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "spark_multipurpose_{$id}_super_title_color", array(
            'section' => "spark_multipurpose_{$id}_section",
            'label' => esc_html__('Super Title Color', 'spark-multipurpose'),
            'priority' => 55
        )));
    }

    $wp_customize->add_setting("spark_multipurpose_{$id}_title_color", array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "spark_multipurpose_{$id}_title_color", array(
        'section' => "spark_multipurpose_{$id}_section",
        'label' => esc_html__('Title Color', 'spark-multipurpose'),
        'priority' => 55
    )));

    $wp_customize->add_setting("spark_multipurpose_{$id}_text_color", array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "spark_multipurpose_{$id}_text_color", array(
        'section' => "spark_multipurpose_{$id}_section",
        'label' => esc_html__('Section Text Color', 'spark-multipurpose'),
        'priority' => 55
    )));


    $wp_customize->add_setting("spark_multipurpose_{$id}_link_color", array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "spark_multipurpose_{$id}_link_color", array(
        'section' => "spark_multipurpose_{$id}_section",
        'label' => esc_html__('Link Color', 'spark-multipurpose'),
        'priority' => 56
    )));

    $wp_customize->add_setting("spark_multipurpose_{$id}_link_hover_color", array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "spark_multipurpose_{$id}_link_hover_color", array(
        'section' => "spark_multipurpose_{$id}_section",
        'label' => esc_html__('Link Hover Color', 'spark-multipurpose'),
        'priority' => 58
    )));


    if (!in_array($id, $exculde_section_array)) {
        $wp_customize->add_setting("spark_multipurpose_{$id}_mb_seperator", array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control(new Spark_Multipurpose_Separator_Control($wp_customize, "spark_multipurpose_{$id}_mb_seperator", array(
            'section' => "spark_multipurpose_{$id}_section",
            'priority' => 60
        )));
        
        $wp_customize->add_setting("spark_multipurpose_{$id}_mb_bg_color", array(
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_setting("spark_multipurpose_{$id}_mb_text_color", array(
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_setting("spark_multipurpose_{$id}_mb_hov_bg_color", array(
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_setting("spark_multipurpose_{$id}_mb_hov_text_color", array(
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control(new Spark_Multipurpose_Color_Tab_Control($wp_customize, "spark_multipurpose_{$id}_mb_color_group", array(
            'label' => esc_html__('More Button Colors', 'spark-multipurpose'),
            'section' => "spark_multipurpose_{$id}_section",
            'show_opacity' => false,
            'priority' => 60,
            'settings' => array(
                "normal_spark_multipurpose_{$id}_mb_bg_color" => "spark_multipurpose_{$id}_mb_bg_color",
                "normal_spark_multipurpose_{$id}_mb_text_color" => "spark_multipurpose_{$id}_mb_text_color",
                "hover_spark_multipurpose_{$id}_mb_hov_bg_color" => "spark_multipurpose_{$id}_mb_hov_bg_color",
                "hover_spark_multipurpose_{$id}_mb_hov_text_color" => "spark_multipurpose_{$id}_mb_hov_text_color",
            ),
            'group' => array(
                "normal_spark_multipurpose_{$id}_mb_bg_color" => esc_html__('Button Background Color', 'spark-multipurpose'),
                "normal_spark_multipurpose_{$id}_mb_text_color" => esc_html__('Button Text Color', 'spark-multipurpose'),
                "hover_spark_multipurpose_{$id}_mb_hov_bg_color" => esc_html__('Button Background Color', 'spark-multipurpose'),
                "hover_spark_multipurpose_{$id}_mb_hov_text_color" => esc_html__('Button Text Color', 'spark-multipurpose')
            )
        )));
    }
    $wp_customize->add_setting("spark_multipurpose_{$id}_cs_seperator", array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Separator_Control($wp_customize, "spark_multipurpose_{$id}_cs_seperator", array(
        'section' => "spark_multipurpose_{$id}_section",
        'priority' => 80
    )));
    /** padding */
    $wp_customize->add_setting(
        "spark_multipurpose_{$id}_padding",
        array(
            'transport' => 'postMessage',
            'sanitize_callback' => 'spark_multipurpose_sanitize_field_default_css_box'
        )
    );
    $wp_customize->add_control(
        new Spark_Multipurpose_Custom_Control_Cssbox(
            $wp_customize,
            "spark_multipurpose_{$id}_padding",
            array(
                'label'    => esc_html__( 'Padding (px)', 'spark-multipurpose' ),
                'section' => "spark_multipurpose_{$id}_section",
                'settings' => "spark_multipurpose_{$id}_padding",
                'priority' => 80
            ),
            array(),
            array()
        )
    );

    
    /*******
     *  Section Container Background 
    */
    $wp_customize->add_setting("spark_multipurpose_{$id}_content_heading", array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, "spark_multipurpose_{$id}_content_heading", array(
        'section' => "spark_multipurpose_{$id}_section",
        'label' => esc_html__('Content Area', 'spark-multipurpose'),
        'priority' => 152
    )));

    $wp_customize->add_setting("spark_multipurpose_{$id}_content_bg_type", array(
        'default' => 'none',
        'sanitize_callback' => 'spark_multipurpose_sanitize_select',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control("spark_multipurpose_{$id}_content_bg_type", array(
        'section' => "spark_multipurpose_{$id}_section",
        'type' => 'select',
        'label' => esc_html__('Background Type', 'spark-multipurpose'),
        'choices' => array(
            'none' => esc_html__('None', 'spark-multipurpose'),
            'color-bg' => esc_html__('Color Background', 'spark-multipurpose'),
            'gradient-bg' => esc_html__('Gradient Background', 'spark-multipurpose')
        ),
        'priority' => 152
    ));
    $wp_customize->add_setting("spark_multipurpose_{$id}_content_bg_color", array(
        'default' => '#FFFFFF',
        'sanitize_callback' => 'spark_multipurpose_sanitize_color_alpha',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Alpha_Color_Control($wp_customize, "spark_multipurpose_{$id}_content_bg_color", array(
        'section' => "spark_multipurpose_{$id}_section",
        'label' => esc_html__('Background Color', 'spark-multipurpose'),
        'priority' => 152
    )));
    $wp_customize->add_setting("spark_multipurpose_{$id}_content_bg_gradient", array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Gradient_Control($wp_customize, "spark_multipurpose_{$id}_content_bg_gradient", array(
        'section' => "spark_multipurpose_{$id}_section",
        'label' => esc_html__('Gradient Background', 'spark-multipurpose'),
        'priority' => 152
    )));

    $wp_customize->add_setting(
        "spark_multipurpose_{$id}_content_padding",
        array(
            'transport' => 'postMessage',
            'sanitize_callback' => 'spark_multipurpose_sanitize_field_default_css_box'
        )
    );
    $wp_customize->add_control(
        new Spark_Multipurpose_Custom_Control_Cssbox(
            $wp_customize,
            "spark_multipurpose_{$id}_content_padding",
            array(
                'label'    => esc_html__( 'Padding (px)', 'spark-multipurpose' ),
                'section' => "spark_multipurpose_{$id}_section",
                'settings' => "spark_multipurpose_{$id}_content_padding",
                'priority' => 152
            ),
            array(),
            array()
        )
    );

    $wp_customize->add_setting(
        "spark_multipurpose_{$id}_content_margin",
        array(
            'transport' => 'postMessage',
            'sanitize_callback' => 'spark_multipurpose_sanitize_field_default_css_box'
        )
    );
    $wp_customize->add_control(
        new Spark_Multipurpose_Custom_Control_Cssbox(
            $wp_customize,
            "spark_multipurpose_{$id}_content_margin",
            array(
                'label'    => esc_html__( 'Margin (px)', 'spark-multipurpose' ),
                'section' => "spark_multipurpose_{$id}_section",
                'settings' => "spark_multipurpose_{$id}_content_margin",
                'priority' => 152
            ),
            array(),
            array()
        )
    );

    $wp_customize->add_setting(
        "spark_multipurpose_{$id}_content_radius",
        array(
            'transport' => 'postMessage',
            'sanitize_callback' => 'spark_multipurpose_sanitize_field_default_css_box'
        )
    );
    $wp_customize->add_control(
        new Spark_Multipurpose_Custom_Control_Cssbox(
            $wp_customize,
            "spark_multipurpose_{$id}_content_radius",
            array(
                'label'    => esc_html__( 'Radius(px)', 'spark-multipurpose' ),
                'section' => "spark_multipurpose_{$id}_section",
                'settings' => "spark_multipurpose_{$id}_content_radius",
                'priority' => 152
            ),
            array(),
            array()
        )
    );



    $wp_customize->add_setting("spark_multipurpose_{$id}_seperator0", array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Separator_Control($wp_customize, "spark_multipurpose_{$id}_seperator0", array(
        'section' => "spark_multipurpose_{$id}_section",
        'priority' => 90
    )));
    $wp_customize->add_setting("spark_multipurpose_{$id}_section_seperator", array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'no',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control("spark_multipurpose_{$id}_section_seperator", array(
        'section' => "spark_multipurpose_{$id}_section",
        'type' => 'select',
        'label' => esc_html__('Enable Separator', 'spark-multipurpose'),
        'choices' => array(
            'no' => esc_html__('Disable', 'spark-multipurpose'),
            'top' => esc_html__('Enable Top Separator', 'spark-multipurpose'),
            'bottom' => esc_html__('Enable Bottom Separator', 'spark-multipurpose'),
            'top-bottom' => esc_html__('Enable Top & Bottom Separator', 'spark-multipurpose')
        ),
        'priority' => 95
    ));
    $wp_customize->add_setting("spark_multipurpose_{$id}_seperator1", array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Separator_Control($wp_customize, "spark_multipurpose_{$id}_seperator1", array(
        'section' => "spark_multipurpose_{$id}_section",
        'priority' => 100
    )));
    $wp_customize->add_setting("spark_multipurpose_{$id}_top_seperator", array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'big-triangle-center',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control("spark_multipurpose_{$id}_top_seperator", array(
        'section' => "spark_multipurpose_{$id}_section",
        'type' => 'select',
        'label' => esc_html__('Top Separator', 'spark-multipurpose'),
        'choices' => spark_multipurpose_svg_seperator(),
        'priority' => 105
    ));
    $wp_customize->add_setting("spark_multipurpose_{$id}_ts_color", array(
        'default' => '#FF0000',
        'sanitize_callback' => 'spark_multipurpose_sanitize_color_alpha',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Alpha_Color_Control($wp_customize, "spark_multipurpose_{$id}_ts_color", array(
        'section' => "spark_multipurpose_{$id}_section",
        'label' => esc_html__('Top Separator Color', 'spark-multipurpose'),
        'priority' => 115
    )));
    $wp_customize->add_setting("spark_multipurpose_{$id}_ts_height_desktop", array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 60,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting("spark_multipurpose_{$id}_ts_height_tablet", array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting("spark_multipurpose_{$id}_ts_height_mobile", array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Range_Slider_Control($wp_customize, "spark_multipurpose_{$id}_ts_height", array(
        'section' => "spark_multipurpose_{$id}_section",
        'label' => esc_html__('Top Separator Height (px)', 'spark-multipurpose'),
        'settings' => array(
            'desktop' => "spark_multipurpose_{$id}_ts_height_desktop",
            'tablet' => "spark_multipurpose_{$id}_ts_height_tablet",
            'mobile' => "spark_multipurpose_{$id}_ts_height_mobile",
        ),
        'input_attrs' => array(
            'min' => 20,
            'max' => 200,
            'step' => 1,
        ),
        'priority' => 120
    )));
    $wp_customize->add_setting("spark_multipurpose_{$id}_seperator2", array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Separator_Control($wp_customize, "spark_multipurpose_{$id}_seperator2", array(
        'section' => "spark_multipurpose_{$id}_section",
        'priority' => 125
    )));
    $wp_customize->add_setting("spark_multipurpose_{$id}_bottom_seperator", array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'big-triangle-center',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control("spark_multipurpose_{$id}_bottom_seperator", array(
        'section' => "spark_multipurpose_{$id}_section",
        'type' => 'select',
        'label' => esc_html__('Bottom Separator', 'spark-multipurpose'),
        'choices' => spark_multipurpose_svg_seperator(),
        'priority' => 130
    ));
    $wp_customize->add_setting("spark_multipurpose_{$id}_bs_color", array(
        'default' => '#FF0000',
        'sanitize_callback' => 'spark_multipurpose_sanitize_color_alpha',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Alpha_Color_Control($wp_customize, "spark_multipurpose_{$id}_bs_color", array(
        'section' => "spark_multipurpose_{$id}_section",
        'label' => esc_html__('Bottom Separator Color', 'spark-multipurpose'),
        'priority' => 135,
    )));
    $wp_customize->add_setting("spark_multipurpose_{$id}_bs_height_desktop", array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 60,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting("spark_multipurpose_{$id}_bs_height_tablet", array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 60,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting("spark_multipurpose_{$id}_bs_height_mobile", array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 60,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Range_Slider_Control($wp_customize, "spark_multipurpose_{$id}_bs_height", array(
        'section' => "spark_multipurpose_{$id}_section",
        'label' => esc_html__('Bottom Separator Height (px)', 'spark-multipurpose'),
        'input_attrs' => array(
            'min' => 20,
            'max' => 200,
            'step' => 1,
        ),
        'settings' => array(
            'desktop' => "spark_multipurpose_{$id}_bs_height_desktop",
            'tablet' => "spark_multipurpose_{$id}_bs_height_tablet",
            'mobile' => "spark_multipurpose_{$id}_bs_height_mobile",
        ),
        'priority' => 140
    )));


    $wp_customize->add_setting("spark_multipurpose_{$id}_shortcode", array(
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new Spark_Multipurpose_Customize_ShortCode($wp_customize, "spark_multipurpose_{$id}_shortcode", array(
        'section' => "spark_multipurpose_{$id}_section",
        'label' => esc_html__('Shortcode(PRO)', 'spark-multipurpose'),
        'description' => "[smc_{$id}]",

        'priority' => 400
    )));

}
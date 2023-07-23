<?php
/**
 * Footer Settings
*/
$wp_customize->add_section('spark_multipurpose_footer_section', array(
    'title'		  => esc_html__('Footer Setting','spark-multipurpose'),
    'priority'	  => 300,
));

$wp_customize->add_setting('spark_multipurpose_footer_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
    'priority' => -1,
));
$wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Tab($wp_customize, 'spark_multipurpose_footer_nav', array(
    'type' => 'tab',
    'section' => 'spark_multipurpose_footer_section',
    'buttons' => array(
        array(
            'name' => esc_html__('Settings', 'spark-multipurpose'),
            'fields' => array(
                'spark_multipurpose_footer_content',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'spark-multipurpose'),
            'fields' => array(
                'spark_multipurpose_footer_bg_heading',
                'spark_multipurpose_footer_bg_type',
                'spark_multipurpose_footer_bg_color',
                'spark_multipurpose_footer_bg_gradient',
                'spark_multipurpose_footer_background_image',
                'spark_multipurpose_footer_bg_image',
                'spark_multipurpose_footer_overlay_color',
                'spark_multipurpose_footer_margin',
                'spark_multipurpose_footer_padding',

                'spark_multipurpose_footer_bottom_seperator',
                'spark_multipurpose_footer_seperator0',
                'spark_multipurpose_footer_section_seperator',
                'spark_multipurpose_footer_top_seperator',
                'spark_multipurpose_footer_ts_color',
                'spark_multipurpose_footer_ts_height',
                
            )
        )
    )
)));


$id = "footer";
$wp_customize->add_setting("spark_multipurpose_{$id}_content", array(
    'default' => '',
    'sanitize_callback' => 'absint',
    // 'transport' => 'postMessage'
));
$wp_customize->add_control("spark_multipurpose_{$id}_content", array(
    'section' => "spark_multipurpose_{$id}_section",
    'type'     => 'dropdown-pages',
    'label' => esc_html__('Page Content', 'spark-multipurpose'),
));

$wp_customize->add_setting("spark_multipurpose_{$id}_bg_type", array(
    'default' => 'color-bg',
    'sanitize_callback' => 'spark_multipurpose_sanitize_select',
    'transport' => 'postMessage'
));
$wp_customize->add_control("spark_multipurpose_{$id}_bg_type", array(
    'section' => "spark_multipurpose_{$id}_section",
    'type' => 'select',
    'label' => esc_html__('Background Type', 'spark-multipurpose'),
    'choices' => array(
        'none'      => esc_html__('Default', 'spark-multipurpose'),
        'color-bg'  => esc_html__('Color Background', 'spark-multipurpose'),
        'gradient-bg' => esc_html__('Gradient Background', 'spark-multipurpose'),
        'image-bg' => esc_html__('Image Background', 'spark-multipurpose'),
        'video-bg' => esc_html__('Video Background', 'spark-multipurpose')
    )
));

$wp_customize->add_setting("spark_multipurpose_{$id}_bg_color", array(
    'default' => '#15171b',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "spark_multipurpose_{$id}_bg_color", array(
    'section' => "spark_multipurpose_{$id}_section",
    'label' => esc_html__('Background Color', 'spark-multipurpose'),
)));

$wp_customize->add_setting("spark_multipurpose_{$id}_bg_gradient", array(
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));
$wp_customize->add_control(new Spark_Multipurpose_Gradient_Control($wp_customize, "spark_multipurpose_{$id}_bg_gradient", array(
    'section' => "spark_multipurpose_{$id}_section",
    'label' => esc_html__('Gradient Background', 'spark-multipurpose'),
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
    )
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
));


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
        ),
        array(),
        array()
    )
);

$wp_customize->add_setting(
    "spark_multipurpose_{$id}_margin",
    array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'spark_multipurpose_sanitize_field_default_css_box'
    )
);
$wp_customize->add_control(
    new Spark_Multipurpose_Custom_Control_Cssbox(
        $wp_customize,
        "spark_multipurpose_{$id}_margin",
        array(
            'label'    => esc_html__( 'Margin (px)', 'spark-multipurpose' ),
            'section' => "spark_multipurpose_{$id}_section",
            'settings' => "spark_multipurpose_{$id}_margin",
        ),
        array(),
        array()
    )
);

/** seprator */
$wp_customize->add_setting("spark_multipurpose_{$id}_seperator0", array(
    'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control(new Spark_Multipurpose_Separator_Control($wp_customize, "spark_multipurpose_{$id}_seperator0", array(
    'section' => "spark_multipurpose_{$id}_section",
)));

$wp_customize->add_setting("spark_multipurpose_{$id}_section_seperator", array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'no',
    //'transport' => 'postMessage'
));
$wp_customize->add_control("spark_multipurpose_{$id}_section_seperator", array(
    'section' => "spark_multipurpose_{$id}_section",
    'type' => 'select',
    'label' => esc_html__('Enable Separator', 'spark-multipurpose'),
    'choices' => array(
        'no' => esc_html__('Disable', 'spark-multipurpose'),
        'top' => esc_html__('Enable Top Separator', 'spark-multipurpose'),
    )
));

$wp_customize->add_setting("spark_multipurpose_{$id}_top_seperator", array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'big-triangle-center',
    //'transport' => 'postMessage'
));
$wp_customize->add_control("spark_multipurpose_{$id}_top_seperator", array(
    'section' => "spark_multipurpose_{$id}_section",
    'type' => 'select',
    'label' => esc_html__('Top Separator', 'spark-multipurpose'),
    'choices' => spark_multipurpose_svg_seperator(),
));

$wp_customize->add_setting("spark_multipurpose_{$id}_ts_color", array(
    'default' => '#15171b',
    'sanitize_callback' => 'spark_multipurpose_sanitize_color_alpha',
    //'transport' => 'postMessage'
));
$wp_customize->add_control(new Spark_Multipurpose_Alpha_Color_Control($wp_customize, "spark_multipurpose_{$id}_ts_color", array(
    'section' => "spark_multipurpose_{$id}_section",
    'label' => esc_html__('Top Separator Color', 'spark-multipurpose'),
)));

$wp_customize->add_setting("spark_multipurpose_{$id}_ts_height_desktop", array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 80,
    //'transport' => 'postMessage'
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
    )
)));
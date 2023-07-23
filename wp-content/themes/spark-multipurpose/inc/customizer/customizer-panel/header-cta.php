<?php

$wp_customize->add_section('spark_multipurpose_header_button_section', array(
    'title' => esc_html__('Header CTA Button', 'spark-multipurpose'),
    'panel' => 'spark_multipurpose_header_settings',
    'description' => esc_html__('The CTA button will show on menu', 'spark-multipurpose')
));

$wp_customize->add_setting('spark_multipurpose_header_button_enable', array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_text',
    'default' => 'disable',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_header_button_enable', array(
    'section' => 'spark_multipurpose_header_button_section',
    'label' => esc_html__('Enable Button', 'spark-multipurpose'),
    'switch_label' => array(
        'enable' => esc_html__('Yes', 'spark-multipurpose'),
        'disable' => esc_html__('No', 'spark-multipurpose')
    ),
    'class' => 'switch-section'
)));

$wp_customize->add_setting('spark_multipurpose_header_button_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
    'priority' => -1,
));
$wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Tab($wp_customize, 'spark_multipurpose_header_button_nav', array(
    'type' => 'tab',
    'section' => 'spark_multipurpose_header_button_section',
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'spark-multipurpose'),
            'fields' => array(
                'spark_multipurpose_hb_icon',
                'spark_multipurpose_hb_title',
                'spark_multipurpose_hb_text',
                'spark_multipurpose_hb_link',
                'spark_multipurpose_header_button_disable_mobile'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'spark-multipurpose'),
            'fields' => array(
                'spark_multipurpose_header_button_color',
                'spark_multipurpose_header_button_hover_color',
                'spark_multipurpose_header_button_border_radius',
                'spark_multipurpose_header_button_border_margin',
                'spark_multipurpose_header_button_border_padding',
                'spark_multipurpose_header_button_size',
                'spark_multipurpose_header_button_width',
            ),
        )
    ),
)));


$wp_customize->add_setting('spark_multipurpose_hb_icon', array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_text',
    'default' => 'fa fa-phone-volume',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Spark_Multipurpose_Fontawesome_Icon_Chooser($wp_customize, 'spark_multipurpose_hb_icon', array(
    'section' => 'spark_multipurpose_header_button_section',
    'label' => esc_html__('Icon', 'spark-multipurpose')
)));


$wp_customize->add_setting('spark_multipurpose_hb_title', array(
    'default' => esc_html__('Free Call', 'spark-multipurpose'),
    'sanitize_callback' => 'spark_multipurpose_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('spark_multipurpose_hb_title', array(
    'section' => 'spark_multipurpose_header_button_section',
    'type' => 'text',
    'label' => esc_html__('Button Title', 'spark-multipurpose')
));

$wp_customize->add_setting('spark_multipurpose_hb_text', array(
    'default' => esc_html__('+01-559-236-8009', 'spark-multipurpose'),
    'sanitize_callback' => 'spark_multipurpose_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('spark_multipurpose_hb_text', array(
    'section' => 'spark_multipurpose_header_button_section',
    'type' => 'text',
    'label' => esc_html__('Button Text', 'spark-multipurpose')
));

$wp_customize->add_setting('spark_multipurpose_hb_link', array(
    'default' => esc_html__('tel:5592368009', 'spark-multipurpose'),
    'sanitize_callback' => 'spark_multipurpose_sanitize_text',
    'transport' => 'postMessage'
));

$wp_customize->add_control('spark_multipurpose_hb_link', array(
    'section' => 'spark_multipurpose_header_button_section',
    'type' => 'text',
    'label' => esc_html__('Button Link', 'spark-multipurpose')
));

$wp_customize->add_setting( 'spark_multipurpose_header_button_color', array(
        'sanitize_callback' => 'spark_multipurpose_sanitize_field_background',
        'transport' => 'postMessage',
        'default'           => json_encode(array(
            'background'   => '',
            'color' => '',
        )),
    )
);
$wp_customize->add_control( new Spark_Multipurpose_Custom_Control_Group( $wp_customize, 'spark_multipurpose_header_button_color',
        array(
            'label'    => esc_html__( 'Button', 'spark-multipurpose' ),
            'section'  => 'spark_multipurpose_header_button_section',
            'settings' => 'spark_multipurpose_header_button_color',
            'priority' => 100,
        ),
        array(
            'background'      => array(
                'type'  => 'color',
                'label' => esc_html__( 'Background', 'spark-multipurpose' ),
            ),
            'text' => array(
                'type'  => 'color',
                'label' => esc_html__( 'Color', 'spark-multipurpose' ),
            ),
            'margin' => array(
                'type'  => 'cssbox',
                'label' => esc_html__( 'Margin', 'spark-multipurpose' ),
            ),

            'padding' => array(
                'type'  => 'cssbox',
                'label' => esc_html__( 'Padding', 'spark-multipurpose' ),
            ),

            'radius' => array(
                'type'  => 'cssbox',
                'label' => esc_html__( 'Radius', 'spark-multipurpose' ),
            ),

            'font-size' => array(
                'type'  => 'text',
                'label' => esc_html__( 'Font Size(px)', 'spark-multipurpose' ),
            ),
            
            'width' => array(
                'type'  => 'text',
                'label' => esc_html__( 'Width(px)', 'spark-multipurpose' ),
            ),
        )
    )
);

$wp_customize->add_setting('spark_multipurpose_header_button_hover_color',
    array(
        'sanitize_callback' => 'spark_multipurpose_sanitize_field_background',
        'transport' => 'postMessage',
        'default'           => json_encode(array(
            'background'   => '',
            'color' => '',
        )),
    )
);
$wp_customize->add_control( new Spark_Multipurpose_Custom_Control_Group( $wp_customize, 'spark_multipurpose_header_button_hover_color',
        array(
            'label'    => esc_html__( 'Button Hover', 'spark-multipurpose' ),
            'section'  => 'spark_multipurpose_header_button_section',
            'settings' => 'spark_multipurpose_header_button_hover_color',
            'priority' => 100,
        ),
        array(
            'background'      => array(
                'type'  => 'color',
                'label' => esc_html__( 'Background', 'spark-multipurpose' ),
            ),
            'text' => array(
                'type'  => 'color',
                'label' => esc_html__( 'Color', 'spark-multipurpose' ),
            )
        )
    )
);



$wp_customize->add_setting('spark_multipurpose_header_button_disable_mobile', array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_text',
    'default' => true,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Spark_Multipurpose_Checkbox_Control($wp_customize, 'spark_multipurpose_header_button_disable_mobile', array(
    'section' => 'spark_multipurpose_header_button_section',
    'label' => esc_html__('Disable in Mobile', 'spark-multipurpose')
)));


$wp_customize->selective_refresh->add_partial( 'spark_multipurpose_header_button_refresh', array (
    'settings' => array( 
        'spark_multipurpose_header_button_enable',
        'spark_multipurpose_hb_icon',
        'spark_multipurpose_header_button_disable_mobile'
     ),
     'selector' => '#masthead',
     'container_inclusive' => true,
     'render_callback' => function () {
         $layout = get_theme_mod('spark_multipurpose_header_layout','layout_one');
         return get_template_part('header/header', str_replace("layout_","", $layout));
     }
));
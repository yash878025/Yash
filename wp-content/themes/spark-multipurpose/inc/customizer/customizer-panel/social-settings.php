<?php
/**
 * Theme Customizer
 */
//SOCIAL SETTINGS
$wp_customize->add_section('spark_multipurpose_social_section', array(
    'title' => esc_html__('Social Links', 'spark-multipurpose'),
    'panel' => 'spark_multipurpose_header_settings',
    'priority' => 201,
));
$wp_customize->add_setting('spark_multipurpose_social_section_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
    
));
$wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Tab($wp_customize, 'spark_multipurpose_social_section_nav', array(
    'type' => 'tab',
    'section' => 'spark_multipurpose_social_section',
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'spark-multipurpose'),
            'fields' => array(
                'spark_multipurpose_topheader_social',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'spark-multipurpose'),
            'fields' => array(
               'spark_multipurpose_social_icon_color',
               'spark_multipurpose_social_icon_bg_color',
               'spark_multipurpose_social_icon_hover_color',
               'spark_multipurpose_social_icon_hover_bg_color'
            ),
        ),
    ),
)));
$wp_customize->add_setting('spark_multipurpose_topheader_social', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'spark_multipurpose_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'icon' => 'fab fa-facebook',
            'link' => '#',
        ),
        array(
            'icon' => 'fab fa-twitter',
            'link' => '#',
        ),
        array(
            'icon' => 'fab fa-linkedin',
            'link' => '#',
        ),
        array(
            'icon' => 'fab fa-pinterest',
            'link' => '#',
        ),
        array(
            'icon' => 'fab fa-instagram',
            'link' => '#',
        ),
        array(
            'icon' => 'fab fa-youtube',
            'link' => '#',
        )
    ))
));
$wp_customize->add_control(new Spark_Multipurpose_Repeater_Control($wp_customize, 'spark_multipurpose_topheader_social', array(
        'label' => esc_html__('Social Links', 'spark-multipurpose'),
        'section' => 'spark_multipurpose_social_section',
        'box_label' => esc_html__('Social Link', 'spark-multipurpose'),
        'add_label' => esc_html__('Add New', 'spark-multipurpose'),
    ), 
    array(
        'icon' => array(
            'type' => 'social-icon',
            'label' => esc_html__('Select Icon', 'spark-multipurpose'),
            'default' => 'icofont-facebook'
        ),
        'link' => array(
            'type' => 'url',
            'label' => esc_html__('Add Link', 'spark-multipurpose'),
            'default' => ''
        ),
        'enable' => array(
            'type' => 'switch',
            'label' => esc_html__('Enable', 'spark-multipurpose'),
            'switch' => array(
                'on' => 'Yes',
                'off' => 'No'
            ),
            'default' => 'on'
        )
    )
));

$wp_customize->selective_refresh->add_partial( 'spark_multipurpose_topheader_social', array (
    'settings' => array( 'spark_multipurpose_topheader_social' ),
    'selector' => '.sp_socialicon',
    'container_inclusive' => true,
    'render_callback' => function () {
        return spark_multipurpose_topheader_social();
    }
));

$wp_customize->add_setting('spark_multipurpose_social_icon_color', array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_color_alpha',
    'default' => '',
));
$wp_customize->add_control(new Spark_Multipurpose_Alpha_Color_Control($wp_customize, 'spark_multipurpose_social_icon_color', array(
    'section' => 'spark_multipurpose_social_section',
    'label' => esc_html__('Color', 'spark-multipurpose')
)));
$wp_customize->add_setting('spark_multipurpose_social_icon_bg_color', array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_color_alpha',
    'default' => ''
));
$wp_customize->add_control(new Spark_Multipurpose_Alpha_Color_Control($wp_customize, 'spark_multipurpose_social_icon_bg_color', array(
    'section' => 'spark_multipurpose_social_section',
    'label' => esc_html__('Background Color', 'spark-multipurpose')
)));
$wp_customize->add_setting('spark_multipurpose_social_icon_hover_color', array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_color_alpha',
    'default' => '',
));
$wp_customize->add_control(new Spark_Multipurpose_Alpha_Color_Control($wp_customize, 'spark_multipurpose_social_icon_hover_color', array(
    'section' => 'spark_multipurpose_social_section',
    'label' => esc_html__('Hover Color', 'spark-multipurpose')
)));
$wp_customize->add_setting('spark_multipurpose_social_icon_hover_bg_color', array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_color_alpha',
    'default' => ''
));
$wp_customize->add_control(new Spark_Multipurpose_Alpha_Color_Control($wp_customize, 'spark_multipurpose_social_icon_hover_bg_color', array(
    'section' => 'spark_multipurpose_social_section',
    'label' => esc_html__('Hover Background Color', 'spark-multipurpose')
)));
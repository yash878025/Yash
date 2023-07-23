<?php
$wp_customize->add_section('spark_multipurpose_titlebar_section', array(
    'title' => esc_html__('Breadcrumb Setting', 'spark-multipurpose'),
    'priority' => 60,
    'description' => esc_html__('This setting will apply in all Posts, Pages, Archive and Search Page', 'spark-multipurpose'),
    'hiding_control' => 'spark_multipurpose_enable_breadcrumbs'
));
$wp_customize->add_setting('spark_multipurpose_enable_breadcrumbs_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Tab($wp_customize, 'spark_multipurpose_enable_breadcrumbs_nav', array(
    'type' => 'tab',
    'section' => 'spark_multipurpose_titlebar_section',
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'spark-multipurpose'),
            'fields' => array(
                'spark_multipurpose_enable_breadcrumbs',
                'spark_multipurpose_show_title',
                'spark_multipurpose_breadcrumb',
                'spark_multipurpose_titlebar_title_align'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'spark-multipurpose'),
            'fields' => array(
                'spark_multipurpose_titlebar_cs_heading',
                'spark_multipurpose_titlebar_title_color',
                'spark_multipurpose_titlebar_text_color',
                'spark_multipurpose_titlebar_link_color',
                'spark_multipurpose_titlebar_link_hover_color'
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'spark-multipurpose'),
            'fields' => array(
                'spark_multipurpose_titlebar_bg_type',
                'spark_multipurpose_titlebar_bg_color',
                'spark_multipurpose_titlebar_bg_gradient',
                'spark_multipurpose_titlebar_bg_image',
                'spark_multipurpose_titlebar_bg_video',
                'spark_multipurpose_titlebar_overlay_color',
                'spark_multipurpose_titlebar_padding',
                'spark_multipurpose_titlebar_content_margin',
                'spark_multipurpose_titlebar_section_seperator',
                'spark_multipurpose_titlebar_seperator2',
                'spark_multipurpose_titlebar_bottom_seperator',
                'spark_multipurpose_titlebar_bs_color',
                'spark_multipurpose_titlebar_bs_height',
               
            ),
        ),
        array(
            'name' => esc_html__('Hidden', 'spark-multipurpose'),
            'class' => 'customizer-hidden',
            'fields' => array(
                'spark_multipurpose_titlebar_super_title_color',
                'spark_multipurpose_titlebar_cs_seperator',
                'spark_multipurpose_titlebar_seperator0',
                'spark_multipurpose_titlebar_seperator1',
                'spark_multipurpose_titlebar_top_seperator',
                'spark_multipurpose_titlebar_ts_color',
                'spark_multipurpose_titlebar_ts_height',
                'spark_multipurpose_titlebar_content_heading',
                'spark_multipurpose_titlebar_content_bg_type',
                'spark_multipurpose_titlebar_content_bg_color',
                'spark_multipurpose_titlebar_content_bg_gradient',
                'spark_multipurpose_titlebar_content_padding',
                'spark_multipurpose_titlebar_content_radius',
            ),
        ),
    ),
)));

// Enable or Disable Breadcrumb.
$wp_customize->add_setting('spark_multipurpose_enable_breadcrumbs', array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_switch',
    'transport' => 'postMessage',
    'default' => 'enable'
));
$wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_enable_breadcrumbs', array(
    'section' => 'spark_multipurpose_titlebar_section',
    'label' => esc_html__('Enable', 'spark-multipurpose'),
    'switch_label' => array(
        'enable' => esc_html__('Yes', 'spark-multipurpose'),
        'disable' => esc_html__('No', 'spark-multipurpose')
    )
)));


$wp_customize->add_setting('spark_multipurpose_show_title', array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_checkbox',
    'transport' => 'postMessage',
    'default' => true
));
$wp_customize->add_control(new Spark_Multipurpose_Checkbox_Control($wp_customize, 'spark_multipurpose_show_title', array(
    'section' => 'spark_multipurpose_titlebar_section',
    'label' => esc_html__('Page Title', 'spark-multipurpose')
)));


$wp_customize->add_setting('spark_multipurpose_breadcrumb', array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_checkbox',
    'transport' => 'postMessage',
    'default' => true
));
$wp_customize->add_control(new Spark_Multipurpose_Checkbox_Control($wp_customize, 'spark_multipurpose_breadcrumb', array(
    'section' => 'spark_multipurpose_titlebar_section',
    'label' => esc_html__('Breadcrumb Menu', 'spark-multipurpose'),
)));

$wp_customize->add_setting( 'spark_multipurpose_titlebar_title_align',
    array(
        'default'           => 'text-left',
        'sanitize_callback' => 'spark_multipurpose_sanitize_select',
        'transport'         => 'postMessage',
    )
);
$wp_customize->add_control( new Spark_Multipurpose_Custom_Control_Buttonset( $wp_customize,'spark_multipurpose_titlebar_title_align',
    array(
        'choices'  => array(
            'text-left' => esc_html__('Left', 'spark-multipurpose'),
            'text-right' => esc_html__('Right', 'spark-multipurpose'),
            'text-center' => esc_html__('Center', 'spark-multipurpose'),
        ),
        'label'    => esc_html__( 'Breadcrumb Alignment', 'spark-multipurpose' ),
        'section'  => 'spark_multipurpose_titlebar_section',
    ))
);

$wp_customize->selective_refresh->add_partial( 'spark_multipurpose_breadcrumbs_settings', array (
    'settings' => array( 
        'spark_multipurpose_enable_breadcrumbs', 
        'spark_multipurpose_show_title',
        'spark_multipurpose_breadcrumb',
        'spark_multipurpose_titlebar_section_seperator', 
        'spark_multipurpose_titlebar_bottom_seperator'
    ),
    'selector' => '#titlebar-section',
    'container_inclusive' => true,
    'render_callback' => function () {
        if( get_theme_mod( 'spark_multipurpose_enable_breadcrumbs', 'enable' ) == 'enable' ) {
            return do_action('spark_multipurpose_breadcrumbs');
        }
    }
));
<?php

/* GENERAL SETTINGS PANEL */
$wp_customize->add_panel('spark_multipurpose_general_settings_panel', array(
    'title' => esc_html__('General Setting', 'spark-multipurpose'),
    'priority' => 2
));

/* GENERAL SETTINGS SECTION */
$wp_customize->add_section('spark_multipurpose_container_section', array(
    'title' => esc_html__('Container', 'spark-multipurpose'),
    'panel' => 'spark_multipurpose_general_settings_panel'
));


//MOVE BACKGROUND AND COLOR SETTING INTO GENERAL SETTING PANEL
$wp_customize->get_control('background_color')->section = 'colors';
$wp_customize->get_control('background_image')->section = 'spark_multipurpose_container_section';
$wp_customize->get_control('background_preset')->section = 'spark_multipurpose_container_section';
$wp_customize->get_control('background_position')->section = 'spark_multipurpose_container_section';
$wp_customize->get_control('background_size')->section = 'spark_multipurpose_container_section';
$wp_customize->get_control('background_repeat')->section = 'spark_multipurpose_container_section';
$wp_customize->get_control('background_attachment')->section = 'spark_multipurpose_container_section';

$wp_customize->get_control('background_image')->priority = 20;
$wp_customize->get_control('background_preset')->priority = 20;
$wp_customize->get_control('background_position')->priority = 20;
$wp_customize->get_control('background_size')->priority = 20;
$wp_customize->get_control('background_repeat')->priority = 20;
$wp_customize->get_control('background_attachment')->priority = 20;


$wp_customize->add_setting('spark_multipurpose_container_width', array(
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Spark_Multipurpose_Range_Control($wp_customize, 'spark_multipurpose_container_width', array(
    'section' => 'spark_multipurpose_container_section',
    'label' => esc_html__('Container Width (%)', 'spark-multipurpose'),
    'input_attrs' => array(
        'min' => '',
        'max' => 100,
        'step' => 1
    )
)));


$wp_customize->add_setting('spark_multipurpose_sidebar_width', array(
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage'
));


$wp_customize->add_control(new Spark_Multipurpose_Range_Control($wp_customize, 'spark_multipurpose_sidebar_width', array(
    'section' => 'spark_multipurpose_container_section',
    'label' => esc_html__('Sidebar Width (%)', 'spark-multipurpose'),
    'input_attrs' => array(
        'min' => 20,
        'max' => 50,
        'step' => 1
    )
)));

$wp_customize->add_setting('spark_multipurpose_background_heading', array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_text',
));

$wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'spark_multipurpose_background_heading', array(
    'section' => 'spark_multipurpose_container_section',
    'label' => esc_html__('Background', 'spark-multipurpose'),
)));


/*********
 * Back To Top Button
*/
$wp_customize->add_section('spark_multipurpose_backtotop_section', array(
    'title' => esc_html__('Scroll to Top', 'spark-multipurpose'),
    'panel' => 'spark_multipurpose_general_settings_panel'
));

$wp_customize->add_setting('spark_multipurpose_backtotop', array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_text',
    'default' => true,
    //'transport' => 'postMessage'
));

$wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_backtotop', array(
    'section' => 'spark_multipurpose_backtotop_section',
    'label' => esc_html__('Back To Up (Enable/Disable)', 'spark-multipurpose'),
    'switch_label' => array(
        'enable' => esc_html__('Yes', 'spark-multipurpose'),
        'disable' => esc_html__('No', 'spark-multipurpose'),
    ),
)));

$wp_customize->add_setting("spark_multipurpose_backtotop_bg_color", array(
    'default' => '',
    'sanitize_callback' => 'spark_multipurpose_sanitize_color_alpha',
    'transport' => 'postMessage'
));
$wp_customize->add_control(new Spark_Multipurpose_Alpha_Color_Control($wp_customize, "spark_multipurpose_backtotop_bg_color", array(
    'section' => 'spark_multipurpose_backtotop_section',
    'label' => esc_html__('Back To Top Background Color', 'spark-multipurpose'),
)));

$wp_customize->add_setting("spark_multipurpose_backtotop_text_color", array(
    'default' => '',
    'sanitize_callback' => 'spark_multipurpose_sanitize_color_alpha',
    'transport' => 'postMessage'
));
$wp_customize->add_control(new Spark_Multipurpose_Alpha_Color_Control($wp_customize, "spark_multipurpose_backtotop_text_color", array(
    'section' => 'spark_multipurpose_backtotop_section',
    'label' => esc_html__('Back To Top Text Color', 'spark-multipurpose'),
)));

<?php
$wp_customize->get_section( 'colors' )->title = esc_html__('Theme Colors Setting', 'spark-multipurpose');
$wp_customize->get_section( 'colors' )->priority = 70;
// Primary Color.
$wp_customize->add_setting('spark_multipurpose_primary_color', array(
    'default' => '#796eff',
    'sanitize_callback' => 'sanitize_hex_color',
));
$wp_customize->add_control('spark_multipurpose_primary_color', array(
    'type' => 'color',
    'label' => esc_html__('Primary Color', 'spark-multipurpose'),
    'section' => 'colors',
));


//COLOR SETTINGS
$wp_customize->add_setting('color_section_seperator1', array(
    'sanitize_callback' => 'sanitize_text'
));

$wp_customize->add_control(new Spark_Multipurpose_Separator_Control($wp_customize, 'color_section_seperator1', array(
    'section' => 'colors'
)));

$wp_customize->add_setting('color_content_info', array(
    'sanitize_callback' => 'sanitize_text'
));

$wp_customize->add_control(new Spark_Multipurpose_Info_Text($wp_customize, 'color_content_info', array(
    'section' => 'colors',
    'label' => esc_html__('Content Colors', 'spark-multipurpose'),
    'description' => esc_html__('This settings apply only in the single pages likes page and post detail pages only.', 'spark-multipurpose')
)));

$wp_customize->add_setting('content_header_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    // 'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'content_header_color', array(
    'section' => 'colors',
    'label' => esc_html__('Content Header Color(H1, H2, H3, H4, H5, H6)', 'spark-multipurpose')
)));


$wp_customize->add_setting('content_link_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    // 'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'content_link_color', array(
    'section' => 'colors',
    'label' => esc_html__('Content Link Color', 'spark-multipurpose')
)));

$wp_customize->add_setting('content_link_hov_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    // 'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'content_link_hov_color', array(
    'section' => 'colors',
    'label' => esc_html__('Content Link Hover Color', 'spark-multipurpose'),
)));

$wp_customize->add_setting('color_section_seperator2', array(
    'sanitize_callback' => 'sanitize_text'
));

$wp_customize->add_control(new Spark_Multipurpose_Separator_Control($wp_customize, 'color_section_seperator2', array(
    'section' => 'colors'
)));

$wp_customize->add_setting('content_widget_background', array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_color_alpha',
    // 'transport' => 'postMessage'
));

$wp_customize->add_control(new Spark_Multipurpose_Alpha_Color_Control($wp_customize, "content_widget_background", array(
    'section' => "colors",
    'label' => esc_html__('Sidebar Widget Background', 'spark-multipurpose')
)));
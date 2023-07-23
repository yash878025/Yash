<?php
$customizer_maintenance_mode = 1; 
if(!$customizer_maintenance_mode){
    return;
}
/**
 * Spark Multipurpose Theme Customizer
 *
 * @package Spark Multipurpose
 */
$wp_customize->add_section('spark_multipurpose_maintenance_section', array(
    'title' => esc_html__('Maintenance Mode', 'spark-multipurpose'),
    'priority' => -1,
    'description' => '<strong style="color:red">' . esc_html__('Note: Maintenance Screen only appears for non logged in user. Please open the website in another browser as a non logged in user inorder to check.', 'spark-multipurpose') . '</strong>'
));
$wp_customize->add_setting('spark_multipurpose_maintenance_sec_nav', array(
    // 'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Tab($wp_customize, 'spark_multipurpose_maintenance_sec_nav', array(
    'type' => 'tab',
    'section' => 'spark_multipurpose_maintenance_section',
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'spark-multipurpose'),
            'fields' => array(
                'spark_multipurpose_maintenance_logo',
                'spark_multipurpose_maintenance_title',
                'spark_multipurpose_maintenance_text',
                'spark_multipurpose_maintenance_date',
                'spark_multipurpose_maintenance_social',
                'spark_multipurpose_maintenance_banner_image',
                'spark_multipurpose_maintenance_preview'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'spark-multipurpose'),
            'fields' => array(
                'spark_multipurpose_maintenance_bg_overlay_color',
                'spark_multipurpose_maintenance_title_color',
                'spark_multipurpose_maintenance_text_color',
                'spark_multipurpose_maintenance_counter_color',
                'spark_multipurpose_maintenance_social_icon_color'
            ),
        ),
    ),
)));
$wp_customize->add_setting('spark_multipurpose_maintenance', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'disable',
    // 'transport' => 'postMessage',
));
$wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_maintenance', array(
    'section' => 'spark_multipurpose_maintenance_section',
    'label' => esc_html__('Enable Maintenance Screen', 'spark-multipurpose'),
    'switch_label' => array(
        'enable' => esc_html__('Yes', 'spark-multipurpose'),
        'disable' => esc_html__('No', 'spark-multipurpose')
    )
)));
$wp_customize->add_setting('spark_multipurpose_maintenance_logo', array(
    'sanitize_callback' => 'esc_url_raw'
));
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'spark_multipurpose_maintenance_logo', array(
    'section' => 'spark_multipurpose_maintenance_section',
    'label' => esc_html__('Upload Logo', 'spark-multipurpose'),
)));
$wp_customize->add_setting('spark_multipurpose_maintenance_title', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => esc_html__('WEBSITE UNDER MAINTENANCE', 'spark-multipurpose'),
    // 'transport' => 'postMessage'
));
$wp_customize->add_control('spark_multipurpose_maintenance_title', array(
    'section' => 'spark_multipurpose_maintenance_section',
    'type' => 'text',
    'label' => esc_html__('Maintenance Title', 'spark-multipurpose'),
));
$wp_customize->add_setting('spark_multipurpose_maintenance_text', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => esc_html__('We are coming soon with new changes. Stay Tuned!', 'spark-multipurpose'),
    // 'transport' => 'postMessage'
));
$wp_customize->add_control('spark_multipurpose_maintenance_text', array(
    'type' => 'text',
    'section' => 'spark_multipurpose_maintenance_section',
    'label' => esc_html__('Maintenance Text', 'spark-multipurpose')
));
$wp_customize->add_setting('spark_multipurpose_maintenance_date', array(
    'sanitize_callback' => 'sanitize_text_field',
    // 'transport' => 'postMessage'
));
$wp_customize->add_control(new Spark_Multipurpose_Custom_Date_Control($wp_customize, 'spark_multipurpose_maintenance_date', array(
    'section' => 'spark_multipurpose_maintenance_section',
    'label' => esc_html__('Maintenance Date', 'spark-multipurpose'),
    'description' => esc_html__('Choose the Date when you plan to make your website live.', 'spark-multipurpose'),
)));

$wp_customize->add_setting('spark_multipurpose_maintenance_social', array(
    'sanitize_callback' => 'sanitize_text_field'
));
$wp_customize->add_control(new Spark_Multipurpose_Info_Text($wp_customize, 'spark_multipurpose_maintenance_social', array(
    'label' => esc_html__('Social Icons', 'spark-multipurpose'),
    'section' => 'spark_multipurpose_maintenance_section',
    'description' => sprintf(esc_html__('Add your %s here', 'spark-multipurpose'), '<a href="#" target="_blank">Social Icons</a>')
)));

$wp_customize->add_setting('spark_multipurpose_maintenance_banner_image', array(
    'sanitize_callback' => 'esc_url_raw',
    'default' => get_template_directory_uri() . '/assets/images/bg.jpg',
    // 'transport' => 'postMessage'
));
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'spark_multipurpose_maintenance_banner_image', array(
    'section' => 'spark_multipurpose_maintenance_section',
    'label' => esc_html__('Upload Banner Image', 'spark-multipurpose'),
)));

$wp_customize->add_setting('spark_multipurpose_maintenance_bg_overlay_color', array(
    'default' => 'rgba(255,255,255,0.35)',
    'sanitize_callback' => 'spark_multipurpose_sanitize_color_alpha',
    // 'transport' => 'postMessage'
));
$wp_customize->add_control(new Spark_Multipurpose_Alpha_Color_Control($wp_customize, 'spark_multipurpose_maintenance_bg_overlay_color', array(
    'label' => esc_html__('Background Overlay Color', 'spark-multipurpose'),
    'section' => 'spark_multipurpose_maintenance_section',
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
    )
)));
$wp_customize->add_setting('spark_multipurpose_maintenance_title_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    // 'transport' => 'postMessage'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'spark_multipurpose_maintenance_title_color', array(
    'section' => 'spark_multipurpose_maintenance_section',
    'label' => esc_html__('Title Color', 'spark-multipurpose')
)));
$wp_customize->add_setting('spark_multipurpose_maintenance_text_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    // 'transport' => 'postMessage'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'spark_multipurpose_maintenance_text_color', array(
    'section' => 'spark_multipurpose_maintenance_section',
    'label' => esc_html__('Text Color', 'spark-multipurpose')
)));
$wp_customize->add_setting('spark_multipurpose_maintenance_counter_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    // 'transport' => 'postMessage'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'spark_multipurpose_maintenance_counter_color', array(
    'section' => 'spark_multipurpose_maintenance_section',
    'label' => esc_html__('Counter Color', 'spark-multipurpose')
)));
$wp_customize->add_setting('spark_multipurpose_maintenance_social_icon_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    // 'transport' => 'postMessage'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'spark_multipurpose_maintenance_social_icon_color', array(
    'section' => 'spark_multipurpose_maintenance_section',
    'label' => esc_html__('Social Icon Color', 'spark-multipurpose')
)));
$wp_customize->add_setting('spark_multipurpose_maintenance_preview', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'disable',
    // 'transport' => 'postMessage',
));
$wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_maintenance_preview', array(
    'section' => 'spark_multipurpose_maintenance_section',
    'label' => esc_html__('Preivew Maintaince Page', 'spark-multipurpose'),
    'description' => esc_html__('Preview for login(admin) user.', 'spark-multipurpose'),
    'switch_label' => array(
        'enable' => esc_html__('Yes', 'spark-multipurpose'),
        'disable' => esc_html__('No', 'spark-multipurpose')
    )
)));
<?php
/************
 * Contact Us 
*/
$wp_customize->add_section(new Spark_Multipurpose_Toggle_Section($wp_customize, 'spark_multipurpose_contact_section', array(
    'title' => esc_html__('Contact Section', 'spark-multipurpose'),
    'panel' => 'spark_multipurpose_frontpage_settings',
    'priority' => spark_multipurpose_get_section_position('spark_multipurpose_contact_section'),
    'hiding_control' => 'spark_multipurpose_contact_section_disable'
)));

$wp_customize->add_setting('spark_multipurpose_contact_section_disable', array(
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
    'default' => 'disable'
));
$wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_contact_section_disable', array(
    'section' => 'spark_multipurpose_contact_section',
    'label' => esc_html__('Enable Section ', 'spark-multipurpose'),
    'switch_label' => array(
        'enable' => esc_html__('Yes', 'spark-multipurpose'),
        'disable' => esc_html__('No', 'spark-multipurpose'),
    ),
    'class' => 'switch-section',
)));

$wp_customize->add_setting('spark_multipurpose_contact_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post'
));
$wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Tab($wp_customize, 'spark_multipurpose_contact_nav', array(
    'type' => 'tab',
    'section' => 'spark_multipurpose_contact_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'spark-multipurpose'),
            'fields' => array(
                'spark_multipurpose_contact_section_disable',
                'spark_multipurpose_contact_title_heading',
                'spark_multipurpose_google_map_heading',
                'spark_multipurpose_longitude',
                'spark_multipurpose_latitude',
                'spark_multipurpose_map_style',
                'spark_multipurpose_google_map_api',
                'spark_multipurpose_contact_title', 
                'spark_multipurpose_contact_descripton',
                'spark_multipurpose_contact_details_heading',
                'spark_multipurpose_contact_details_heading_right',
                'spark_multipurpose_contact_details_right_heading',
                'spark_multipurpose_contact_details',
                'spark_multipurpose_contact_shortcode',
                'spark_multipurpose_contact_detail',
                'spark_multipurpose_contact_social_icons',
                'spark_multipurpose_contact_social_link',
                'spark_multipurpose_show_contact_detail',
                'google_api_key'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'spark-multipurpose'),
            'fields' => array(
                'spark_multipurpose_contact_cs_heading',
                'spark_multipurpose_contact_title_color',
                'spark_multipurpose_contact_text_color',
                'spark_multipurpose_contact_link_color',
                'spark_multipurpose_contact_link_hover_color',
                'spark_multipurpose_contact_block_seperator',
                'spark_multipurpose_contact_social_button_bg_color',
                'spark_multipurpose_contact_social_button_text_color',
                'spark_multipurpose_contact_info_bg_color',
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'spark-multipurpose'),
            'fields' => array(
                'spark_multipurpose_contact_bg_type',
                'spark_multipurpose_contact_bg_color',
                'spark_multipurpose_contact_bg_gradient',
                'spark_multipurpose_contact_bg_image',
                'spark_multipurpose_contact_bg_video',
                'spark_multipurpose_contact_overlay_color',
                'spark_multipurpose_contact_padding',
                'spark_multipurpose_contact_content_heading',
                'spark_multipurpose_contact_content_bg_type',
                'spark_multipurpose_contact_content_bg_color',
                'spark_multipurpose_contact_content_bg_gradient',
                'spark_multipurpose_contact_content_padding',
                'spark_multipurpose_contact_content_margin',
                'spark_multipurpose_contact_content_radius',
                'spark_multipurpose_contact_cs_seperator',
                'spark_multipurpose_contact_seperator0',
                'spark_multipurpose_contact_section_seperator',
                'spark_multipurpose_contact_seperator1',
                'spark_multipurpose_contact_top_seperator',
                'spark_multipurpose_contact_ts_color',
                'spark_multipurpose_contact_ts_height',
                'spark_multipurpose_contact_seperator2',
                'spark_multipurpose_contact_bottom_seperator',
                'spark_multipurpose_contact_bs_color',
                'spark_multipurpose_contact_bs_height'
            ),
        ),
        array(
            'name' => esc_html__('Hidden', 'spark-multipurpose'),
            'class' => 'customizer-hidden',
            'fields' => array(
                'spark_multipurpose_contact_super_title_color',
                'spark_multipurpose_contact_text_color',
            ),
        ),
    ),
)));

$wp_customize->add_setting('spark_multipurpose_contact_title_heading', array(
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
));
$wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'spark_multipurpose_contact_title_heading', array(
    'section' => 'spark_multipurpose_contact_section',
    'label' => esc_html__('Section Title & Sub Title', 'spark-multipurpose')
)));

$wp_customize->add_setting('spark_multipurpose_contact_title', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => __('Quick Get In Touch', 'spark-multipurpose'),
    'transport' => 'postMessage'
));
$wp_customize->add_control('spark_multipurpose_contact_title', array(
    'section' => 'spark_multipurpose_contact_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'spark-multipurpose')
));

$wp_customize->add_setting('spark_multipurpose_contact_descripton', array(
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));
$wp_customize->add_control('spark_multipurpose_contact_descripton', array(
    'section' => 'spark_multipurpose_contact_section',
    'type' => 'text',
    'label' => esc_html__('Sub Title', 'spark-multipurpose')
));


$wp_customize->add_setting('spark_multipurpose_contact_details_heading', array(
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
));
$wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'spark_multipurpose_contact_details_heading', array(
    'section' => 'spark_multipurpose_contact_section',
    'label' => esc_html__('Contact Details', 'spark-multipurpose')
)));


$wp_customize->add_setting('spark_multipurpose_show_contact_detail', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'enable',
    'transport' => 'postMessage'
));
$wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_show_contact_detail', array(
    'section' => 'spark_multipurpose_contact_section',
    'label' => esc_html__('Show Contact Detail', 'spark-multipurpose'),
    'switch_label' => array(
        'enable' => esc_html__('Yes', 'spark-multipurpose'),
        'disable' => esc_html__('No', 'spark-multipurpose'),
    ),
)));



$wp_customize->add_setting('spark_multipurpose_contact_shortcode', array(
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));
$wp_customize->add_control('spark_multipurpose_contact_shortcode', array(
    'section' => 'spark_multipurpose_contact_section',
    'type' => 'text',
    'label' => esc_html__('Contact Form Shortcode', 'spark-multipurpose'),
    'description' => sprintf(esc_html__('Install %s plugin to get the shortcode', 'spark-multipurpose'), '<a target="_blank" href="https://wordpress.org/plugins/contact-form-7/">Contact Form 7</a>')
));

$wp_customize->add_setting('spark_multipurpose_contact_details_heading_right', array(
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
));
$wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'spark_multipurpose_contact_details_heading_right', array(
    'section' => 'spark_multipurpose_contact_section',
    'label' => esc_html__('Contact Information Right Side', 'spark-multipurpose')
)));

$wp_customize->add_setting('spark_multipurpose_contact_details_right_heading', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => __('Quick Contact Information', 'spark-multipurpose'),
    'transport' => 'postMessage'
));
$wp_customize->add_control('spark_multipurpose_contact_details_right_heading', array(
    'section' => 'spark_multipurpose_contact_section',
    'type' => 'text',
    'label' => esc_html__('Heading', 'spark-multipurpose')
));

$wp_customize->add_setting('spark_multipurpose_contact_details', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'spark_multipurpose_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'icon' => '',
            'label' => '',
            'description' => '',
            'enable' => 'on'
        )
    ))
));
$wp_customize->add_control(new Spark_Multipurpose_Repeater_Control($wp_customize, 'spark_multipurpose_contact_details', array(
        'label' => esc_html__('Contact Info', 'spark-multipurpose'),
        'section' => 'spark_multipurpose_contact_section',
        'box_label' => esc_html__('Contact Info', 'spark-multipurpose'),
        'add_label' => esc_html__('Add New', 'spark-multipurpose'),
    ), 
    array(
        'icon' => array(
            'type' => 'icon',
            'label' => esc_html__('Icon', 'spark-multipurpose'),
            'default' => ''
        ),
        'label' => array(
            'type' => 'text',
            'label' => esc_html__('Label', 'spark-multipurpose'),
            'default' => ''
        ),
        'description' => array(
            'type' => 'text',
            'label' => esc_html__('Content', 'spark-multipurpose'),
            'default' => ''
        )
    )
));

$wp_customize->add_setting('spark_multipurpose_contact_social_icons', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'enable',
    'transport' => 'postMessage'
));
$wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_contact_social_icons', array(
    'section' => 'spark_multipurpose_contact_section',
    'label' => esc_html__('Show Social Icons', 'spark-multipurpose'),
    'switch_label' => array(
        'enable' => esc_html__('Yes', 'spark-multipurpose'),
        'disable' => esc_html__('No', 'spark-multipurpose'),
    ),
)));


$wp_customize->add_setting('spark_multipurpose_contact_social_link', array(
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
$wp_customize->add_control(new Spark_Multipurpose_Repeater_Control($wp_customize, 'spark_multipurpose_contact_social_link', array(
        'label' => esc_html__('Social Links', 'spark-multipurpose'),
        'section' => 'spark_multipurpose_contact_section',
        'box_label' => esc_html__('Social Link', 'spark-multipurpose'),
        'add_label' => esc_html__('Add New', 'spark-multipurpose'),
    ), 
    array(
        'icon' => array(
            'type' => 'social-icon',
            'label' => esc_html__('Select Icon', 'spark-multipurpose'),
            'default' => ''
        ),
        'link' => array(
            'type' => 'text',
            'label' => esc_html__('Add Link', 'spark-multipurpose'),
            'default' => ''
        )
    )
));


$wp_customize->add_setting('spark_multipurpose_google_map_heading', array(
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
));
$wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'spark_multipurpose_google_map_heading', array(
    'section' => 'spark_multipurpose_contact_section',
    'label' => esc_html__('Google Map', 'spark-multipurpose'),
    'description' => sprintf(esc_html__('Get the Longitude and Latitude value of the location from %s', 'spark-multipurpose'), '<a target="_blank" href="https://www.latlong.net/">here</a>')
)));

$wp_customize->add_setting('spark_multipurpose_latitude', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => '24.691943',
    'transport' => 'postMessage'
));
$wp_customize->add_control('spark_multipurpose_latitude', array(
    'section' => 'spark_multipurpose_contact_section',
    'type' => 'text',
    'label' => esc_html__('Latitude', 'spark-multipurpose')
));

$wp_customize->add_setting('spark_multipurpose_longitude', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => '78.403931',
    'transport' => 'postMessage'
));
$wp_customize->add_control('spark_multipurpose_longitude', array(
    'section' => 'spark_multipurpose_contact_section',
    'type' => 'text',
    'label' => esc_html__('Longitude', 'spark-multipurpose')
));


$wp_customize->add_setting('google_api_key', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => __('', 'spark-multipurpose'),
    'transport' => 'postMessage'
));
$wp_customize->add_control('google_api_key', array(
    'section' => 'spark_multipurpose_contact_section',
    'type' => 'text',
    'label' => esc_html__('Map API Key', 'spark-multipurpose')
));

$wp_customize->add_setting('spark_multipurpose_map_style', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'normal',
    'transport' => 'postMessage'
));
$wp_customize->add_control('spark_multipurpose_map_style', 
    array(
        'section' => 'spark_multipurpose_contact_section',
        'type' => 'select',
        'label' => esc_html__('Map Style', 'spark-multipurpose'),
        'choices' => array(
            'normal' => esc_html__('Normal', 'spark-multipurpose'),
            'light' => esc_html__('Light', 'spark-multipurpose'),
            'dark' => esc_html__('Dark', 'spark-multipurpose')
        )
    )
);


$wp_customize->add_setting('spark_multipurpose_contact_social_button_bg_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'spark_multipurpose_contact_social_button_bg_color', array(
    'section' => 'spark_multipurpose_contact_section',
    'priority' => 56,
    'label' => esc_html__('Social Icon Background', 'spark-multipurpose')
)));


$wp_customize->add_setting('spark_multipurpose_contact_social_button_text_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage',
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'spark_multipurpose_contact_social_button_text_color', array(
    'section' => 'spark_multipurpose_contact_section',
    'priority' => 56,
    'label' => esc_html__('Social Icon Color', 'spark-multipurpose')
)));

$wp_customize->add_setting('spark_multipurpose_contact_info_bg_color', array(
    'default' => '#e42032',
    'sanitize_callback' => 'spark_multipurpose_sanitize_color_alpha',
    'transport' => 'postMessage',
));
$wp_customize->add_control(new Spark_Multipurpose_Alpha_Color_Control($wp_customize, 'spark_multipurpose_contact_info_bg_color', array(
    'section' => 'spark_multipurpose_contact_section',
    'priority' => 56,
    'label' => esc_html__('Info Background Color', 'spark-multipurpose')
)));


$wp_customize->add_setting("spark_multipurpose_contact_shortcode2", array(
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control(new Spark_Multipurpose_Customize_ShortCode($wp_customize, "spark_multipurpose_contact_shortcode2", array(
    'section' => "spark_multipurpose_contact_section",
    'label' => esc_html__('Shortcode', 'spark-multipurpose'),
    'description' => '[smc_contact]'
)));


$wp_customize->selective_refresh->add_partial( 'spark_multipurpose_contact_refresh', array (
    'settings' => array( 
        'spark_multipurpose_latitude',
        'spark_multipurpose_longitude',
        'google_api_key',
        'spark_multipurpose_map_style',
        'spark_multipurpose_contact_descripton',
        'spark_multipurpose_contact_details',
        'spark_multipurpose_show_contact_detail',
        'spark_multipurpose_contact_shortcode',
        'spark_multipurpose_contact_social_icons',
        'spark_multipurpose_contact_social_link',
        'spark_multipurpose_contact_section_disable',
        'spark_multipurpose_contact_bottom_seperator',
        'spark_multipurpose_contact_top_seperator'
    ),
    'selector' => '#contact-section',
    'fallback_refresh' => true,
    'container_inclusive' => true,
    'render_callback' => function () {
        return get_template_part( 'section/section-contact' );
    }
));
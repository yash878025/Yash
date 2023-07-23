<?php
/**
 * How It Works Section
*/
$wp_customize->add_section(new Spark_Multipurpose_Toggle_Section($wp_customize, 'spark_multipurpose_how_it_works_section', array(
    'title' => esc_html__('How It Works Section', 'spark-multipurpose'),
    'panel' => 'spark_multipurpose_frontpage_settings',
    'priority' => spark_multipurpose_get_section_position('spark_multipurpose_how_it_works_section'),
    'hiding_control' => 'spark_multipurpose_how_it_works_section_disable'
)));

//Enable/Diable how_it_works Section
$wp_customize->add_setting('spark_multipurpose_how_it_works_section_disable', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'disable'
));
$wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_how_it_works_section_disable', array(
    'section' => 'spark_multipurpose_how_it_works_section',
    'label' => esc_html__('Enable Section', 'spark-multipurpose'),
    'switch_label' => array(
        'enable' => esc_html__('Yes', 'spark-multipurpose'),
        'disable' => esc_html__('No', 'spark-multipurpose'),
    ),
    'class' => 'switch-section',
    'priority' => 2
)));

$wp_customize->add_setting('spark_multipurpose_how_it_works_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Tab($wp_customize, 'spark_multipurpose_how_it_works_nav', array(
    'type' => 'tab',
    'section' => 'spark_multipurpose_how_it_works_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'spark-multipurpose'),
            'fields' => array(
                'spark_multipurpose_how_it_works_section_disable',
                'spark_multipurpose_how_it_works_title_subtitle_heading',
                'spark_multipurpose_how_it_works_super_title',
                'spark_multipurpose_how_it_works_title',
                'spark_multipurpose_how_it_works_title_align',
                'spark_multipurpose_how_it_works_page',
                'spark_multipurpose_how_it_works_type',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'spark-multipurpose'),
            'fields' => array(
                'spark_multipurpose_how_it_works_cs_heading',
                'spark_multipurpose_how_it_works_super_title_color',
                'spark_multipurpose_how_it_works_title_color',
                'spark_multipurpose_how_it_works_text_color',
                'spark_multipurpose_how_it_works_link_color',
                'spark_multipurpose_how_it_works_link_hover_color',
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'spark-multipurpose'),
            'fields' => array(
                'spark_multipurpose_how_it_works_bg_type',
                'spark_multipurpose_how_it_works_bg_color',
                'spark_multipurpose_how_it_works_bg_gradient',
                'spark_multipurpose_how_it_works_bg_image',
                'spark_multipurpose_how_it_works_bg_video',
                'spark_multipurpose_how_it_works_overlay_color',
                'spark_multipurpose_how_it_works_padding',
                'spark_multipurpose_how_it_works_content_heading',
                'spark_multipurpose_how_it_works_content_bg_type',
                'spark_multipurpose_how_it_works_content_bg_color',
                'spark_multipurpose_how_it_works_content_bg_gradient',
                'spark_multipurpose_how_it_works_content_padding',
                'spark_multipurpose_how_it_works_content_margin',
                'spark_multipurpose_how_it_works_content_radius',
                'spark_multipurpose_how_it_works_cs_seperator',
                'spark_multipurpose_how_it_works_seperator0',
                'spark_multipurpose_how_it_works_section_seperator',
                'spark_multipurpose_how_it_works_seperator1',
                'spark_multipurpose_how_it_works_top_seperator',
                'spark_multipurpose_how_it_works_ts_color',
                'spark_multipurpose_how_it_works_ts_height',
                'spark_multipurpose_how_it_works_seperator2',
                'spark_multipurpose_how_it_works_bottom_seperator',
                'spark_multipurpose_how_it_works_bs_color',
                'spark_multipurpose_how_it_works_bs_height'
            ),
        )
    ),
)));

$wp_customize->add_setting('spark_multipurpose_how_it_works_title_subtitle_heading', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field'
));
$wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'spark_multipurpose_how_it_works_title_subtitle_heading', array(
    'section' => 'spark_multipurpose_how_it_works_section',
    'label' => esc_html__('Section Title & Sub Title', 'spark-multipurpose')
)));

$wp_customize->add_setting('spark_multipurpose_how_it_works_super_title', array(
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));
$wp_customize->add_control('spark_multipurpose_how_it_works_super_title', array(
    'section' => 'spark_multipurpose_how_it_works_section',
    'type' => 'text',
    'label' => esc_html__('Super Title', 'spark-multipurpose')
));
$wp_customize->add_setting('spark_multipurpose_how_it_works_title', array(
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));
$wp_customize->add_control('spark_multipurpose_how_it_works_title', array(
    'section' => 'spark_multipurpose_how_it_works_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'spark-multipurpose')
));

$wp_customize->add_setting('spark_multipurpose_how_it_works_title_align', array(
    'default' => 'text-center',
    'sanitize_callback' => 'spark_multipurpose_sanitize_select',
    'transport' => 'postMessage'
));

$wp_customize->add_control(
    new Spark_Multipurpose_Custom_Control_Buttonset( $wp_customize, 'spark_multipurpose_how_it_works_title_align',
        array(
            'choices'  => array(
                'text-left' => esc_html__('Left', 'spark-multipurpose'),
                'text-center' => esc_html__('Center', 'spark-multipurpose'),
                'text-right' => esc_html__('Right', 'spark-multipurpose'),
            ),
            'label'    => esc_html__( 'Alignment', 'spark-multipurpose' ),
            'section'  => 'spark_multipurpose_how_it_works_section',
            'settings' => 'spark_multipurpose_how_it_works_title_align',
        )
    )
);

/*****
 * How It Wirks Type
 */
$wp_customize->add_setting('spark_multipurpose_how_it_works_type', array(
    'default' => 'default',
    'transport' => 'postMessage',
    'sanitize_callback' => 'spark_multipurpose_sanitize_select'
));
$wp_customize->add_control('spark_multipurpose_how_it_works_type', array(
    'section' => 'spark_multipurpose_how_it_works_section',
    'type' => 'radio',
    'label' => esc_html__('Select How It Works Type', 'spark-multipurpose'),
    'choices' => array(
        'default' => esc_html__('Default', 'spark-multipurpose')
    )
));

/****
 * Default How It Works Options
 */
$wp_customize->add_setting('spark_multipurpose_how_it_works_page', array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_repeater',
    'transport' => 'postMessage',
    'default' => json_encode(array(
        array(
            'block_page'  => '',
            'block_icon' => 'fas fa-address-card'
        )
    )),
));
$wp_customize->add_control(new Spark_Multipurpose_Repeater_Control($wp_customize, 'spark_multipurpose_how_it_works_page', array(
    'section' => 'spark_multipurpose_how_it_works_section',
    'label' => esc_html__('How it works', 'spark-multipurpose'),
    'box_label' => esc_html__('Block Item', 'spark-multipurpose'),
    'add_label' => esc_html__('Add New', 'spark-multipurpose'),
    ), 
    array(
        'block_icon' => array(
            'type' => 'icon',
            'label' => esc_html__('Choose Icon', 'spark-multipurpose'),
            'default' => 'fas fa-address-card'
        ),
        'block_page' => array(
            'type' => 'select',
            'label' => esc_html__('Page', 'spark-multipurpose'),
            'default' => '',
            'options' => $pages
        )
    )
));


$wp_customize->selective_refresh->add_partial( 'spark_multipurpose_how_it_works_settings', array (
    'settings' => array( 
        'spark_multipurpose_how_it_works_section_disable',
        'spark_multipurpose_how_it_works_page', 
        'spark_multipurpose_how_it_works_type',
        'spark_multipurpose_how_it_works_section_seperator', 
        'spark_multipurpose_how_it_works_top_seperator', 
        'spark_multipurpose_how_it_works_bottom_seperator'
    ),
    'selector' => '#how_it_works-section',
    'fallback_refresh' => true,
    'container_inclusive' => true,
    'render_callback' => function () {
        return get_template_part( 'section/section', 'how_it_works' );
    }
));


$wp_customize->add_setting('spark_multipurpose_how_it_works_upgrade_text', array(
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control(new Spark_Multipurpose_Upgrade_Text($wp_customize, 'spark_multipurpose_how_it_works_upgrade_text', array(
    'section' => 'spark_multipurpose_how_it_works_section',
    'label' => esc_html__('For more settings,', 'spark-multipurpose'),
    'choices' => array(
        esc_html__('Input from Customizer(Advance)', 'spark-multipurpose'),
        esc_html__('3 Layout', 'spark-multipurpose'),
        esc_html__('Section Shortcode', 'spark-multipurpose'),
        esc_html__('And more...', 'spark-multipurpose'),
    ),
    'priority' => 400
)));
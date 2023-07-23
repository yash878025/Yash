<?php
/* ============SERVICE SECTION PANEL============ */
$wp_customize->add_section(new Spark_Multipurpose_Toggle_Section($wp_customize, 'spark_multipurpose_promoservice_section', array(
    'title' => esc_html__('Features Service Section', 'spark-multipurpose'),
    'panel' => 'spark_multipurpose_frontpage_settings',
    'priority' => spark_multipurpose_get_section_position('spark_multipurpose_promoservice_section'),
    'hiding_control' => 'spark_multipurpose_promoservice_section_disable'
)));

/**
 * Enable/Disable Option
 *
 * @since 1.0.0
*/
    $wp_customize->add_setting('spark_multipurpose_promoservice_section_disable', array(
        'default' => 'disable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_promoservice_section_disable', array(
        'label' => esc_html__('Enable', 'spark-multipurpose'),
        'section' => 'spark_multipurpose_promoservice_section',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-multipurpose'),
            'disable' => esc_html__('No', 'spark-multipurpose'),
        ),
        'class' => 'switch-section',
        'priority' => 2
    )));

    $wp_customize->add_setting('spark_multipurpose_promoservice_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Tab($wp_customize, 'spark_multipurpose_promoservice_nav', array(
        'type' => 'tab',
        'section' => 'spark_multipurpose_promoservice_section',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_promoservice_title_heading',
                    'spark_multipurpose_promoservice_section',
                    'spark_multipurpose_promoservice_super_title',
                    'spark_multipurpose_promoservice_title',
                    'spark_multipurpose_promoservice_title_align',
                    'spark_multipurpose_promoservice_show_image',
                    'spark_multipurpose_promoservice_show_button',
                    'spark_multipurpose_promoservice_boxshadow',
                    'spark_multipurpose_promoservice_show_icon',
                    'spark_multipurpose_promoservice',
                    'spark_multipurpose_promo_service_col',
                    'spark_multipurpose_promoservice_type',
                    'spark_multipurpose_promoservice_advance_settings',
                    'spark_multipurpose_promoservice_style'
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_promo_service_block',
                    'spark_multipurpose_promoservice_icon_style',
                    'spark_multipurpose_promo_service_image_style',
                    'spark_multipurpose_promoservice_cs_heading',
                    'spark_multipurpose_promoservice_super_title_color',
                    'spark_multipurpose_promoservice_title_color',
                    'spark_multipurpose_promoservice_text_color',
                    'spark_multipurpose_promoservice_link_color',
                    'spark_multipurpose_promoservice_link_hover_color',
                ),
            ),
            array(
                'name' => esc_html__('Advanced', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_promoservice_bg_type',
                    'spark_multipurpose_promoservice_bg_color',
                    'spark_multipurpose_promoservice_bg_gradient',
                    'spark_multipurpose_promoservice_bg_image',
                    'spark_multipurpose_promoservice_bg_video',
                    'spark_multipurpose_promoservice_overlay_color',
                    'spark_multipurpose_promoservice_padding',
                    'spark_multipurpose_promoservice_content_heading',
                    'spark_multipurpose_promoservice_content_bg_type',
                    'spark_multipurpose_promoservice_content_bg_color',
                    'spark_multipurpose_promoservice_content_bg_gradient',
                    'spark_multipurpose_promoservice_content_padding',
                    'spark_multipurpose_promoservice_content_margin',
                    'spark_multipurpose_promoservice_content_radius',
                    'spark_multipurpose_promoservice_cs_seperator',
                    'spark_multipurpose_promoservice_seperator0',
                    'spark_multipurpose_promoservice_section_seperator',
                    'spark_multipurpose_promoservice_seperator1',
                    'spark_multipurpose_promoservice_top_seperator',
                    'spark_multipurpose_promoservice_ts_color',
                    'spark_multipurpose_promoservice_ts_height',
                    'spark_multipurpose_promoservice_seperator2',
                    'spark_multipurpose_promoservice_bottom_seperator',
                    'spark_multipurpose_promoservice_bs_color',
                    'spark_multipurpose_promoservice_bs_height'
                ),
            ),
        ),
    )));

    $wp_customize->add_setting('spark_multipurpose_promoservice_title_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'spark_multipurpose_promoservice_title_heading', array(
        'section' => 'spark_multipurpose_promoservice_section',
        'label' => esc_html__('Section Title & Sub Title', 'spark-multipurpose')
    )));

    $wp_customize->add_setting('spark_multipurpose_promoservice_super_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
        'default' => get_theme_mod('spark_multipurpose_service_title', '')
    ));
    $wp_customize->add_control('spark_multipurpose_promoservice_super_title', array(
        'section' => 'spark_multipurpose_promoservice_section',
        'type' => 'text',
        'label' => esc_html__('Super Title', 'spark-multipurpose')
    ));

    $wp_customize->add_setting('spark_multipurpose_promoservice_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => get_theme_mod('spark_multipurpose_service_subtitle', ''),
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control('spark_multipurpose_promoservice_title', array(
        'section' => 'spark_multipurpose_promoservice_section',
        'type' => 'text',
        'label' => esc_html__('Title', 'spark-multipurpose')
    ));

    $wp_customize->add_setting('spark_multipurpose_promoservice_title_align', array(
        'default' => 'text-center',
        'sanitize_callback' => 'spark_multipurpose_sanitize_select',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Buttonset($wp_customize,'spark_multipurpose_promoservice_title_align',
        array(
            'choices'  => array(
                'text-left' => esc_html__('Left', 'spark-multipurpose'),
                'text-right' => esc_html__('Right', 'spark-multipurpose'),
                'text-center' => esc_html__('Center', 'spark-multipurpose'),
            ),
            'label'    => esc_html__( 'Alignment', 'spark-multipurpose' ),
            'section'  => 'spark_multipurpose_promoservice_section',
            'settings' => 'spark_multipurpose_promoservice_title_align',
        ))
    );


    $wp_customize->add_setting('spark_multipurpose_promoservice_type', array(
        'default' => 'default',
        'transport' => 'postMessage',
        'sanitize_callback' => 'spark_multipurpose_sanitize_select'
    ));
    $wp_customize->add_control('spark_multipurpose_promoservice_type', array(
        'section' => 'spark_multipurpose_promoservice_section',
        'type' => 'radio',
        'label' => esc_html__('Select Promo Service Type', 'spark-multipurpose'),
        'choices' => array(
            'default' => esc_html__('Default Promo Service', 'spark-multipurpose'),
            'advance' => esc_html__('Advance Promo(Pro)', 'spark-multipurpose')
        )
    ));

    // Default Promo Features Service Page.
    $wp_customize->add_setting('spark_multipurpose_promoservice', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'spark_multipurpose_sanitize_repeater',		//done
        'default' => json_encode(array(
            array(
                'service_page' => '',
                'service_icon' =>'fas fa-address-card',
                'bg_color' => '',
                'color' => '',
                'alignment' => '',

            )
        ))
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Repeater_Control( $wp_customize, 
        'spark_multipurpose_promoservice', 
        array(
            'label' 	   => esc_html__('Features Service', 'spark-multipurpose'),
            'section' 	   => 'spark_multipurpose_promoservice_section',
            'settings' 	   => 'spark_multipurpose_promoservice',
            'box_label' => esc_html__('Service', 'spark-multipurpose'),
            'add_label' => esc_html__('Add New', 'spark-multipurpose'),
        ),
        array(
            'service_page' => array(
                'type' => 'select',
                'label' => esc_html__('Select Features Service Page', 'spark-multipurpose'),
                'options' => $pages
            ),
            'service_icon' => array(
                'type' => 'icon',
                'label' => esc_html__('Choose Icon', 'spark-multipurpose'),
                'default' => 'fas fa-address-card'
            ),
            'bg_color' => array(
                'type'  => 'colorpicker',
                'label' => esc_html__( 'Background', 'spark-multipurpose' ),
            ),
            'color' => array(
                'type'  => 'colorpicker',
                'label' => esc_html__( 'Color', 'spark-multipurpose' ),
            ),
            'alignment' => array(
                'type' => 'select',
                'label' => esc_html__("Alignment", 'spark-multipurpose'),
                'default' => 'text-center',
                'options' => array(
                    'text-left' => esc_html__('Left', 'spark-multipurpose'),
                    'text-center' => esc_html__('Center', 'spark-multipurpose'),
                    'text-right' => esc_html__('Right', 'spark-multipurpose')
                )
            )
            
        )
    ));



    $wp_customize->add_setting('spark_multipurpose_promo_service_col', array(
        'sanitize_callback' => 'absint',
        'default' => 3,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Range_Control($wp_customize, 'spark_multipurpose_promo_service_col', array(
        'section' => 'spark_multipurpose_promoservice_section',
        'label' => esc_html__('No of Columns', 'spark-multipurpose'),
        'input_attrs' => array(
            'min' => 1,
            'max' => 6,
            'step' => 1,
        )
    )));



    $wp_customize->add_setting('spark_multipurpose_promoservice_show_image', array(
        'default' => 'enable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_promoservice_show_image', array(
        'label' => esc_html__('Show Image', 'spark-multipurpose'),
        'section' => 'spark_multipurpose_promoservice_section',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-multipurpose'),
            'disable' => esc_html__('No', 'spark-multipurpose'),
        )
    )));

    $wp_customize->add_setting('spark_multipurpose_promoservice_show_button', array(
        'default' => 'enable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_promoservice_show_button', array(
        'label' => esc_html__('Read More Button', 'spark-multipurpose'),
        'section' => 'spark_multipurpose_promoservice_section',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-multipurpose'),
            'disable' => esc_html__('No', 'spark-multipurpose'),
        )
    )));

    $wp_customize->add_setting('spark_multipurpose_promoservice_boxshadow', array(
        'default' => 'enable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_promoservice_boxshadow', array(
        'label' => esc_html__('Box Shadow', 'spark-multipurpose'),
        'section' => 'spark_multipurpose_promoservice_section',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-multipurpose'),
            'disable' => esc_html__('No', 'spark-multipurpose'),
        )
    )));

    $wp_customize->add_setting('spark_multipurpose_promoservice_show_icon', array(
        'default' => 'enable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_promoservice_show_icon', array(
        'label' => esc_html__('Show Icon', 'spark-multipurpose'),
        'section' => 'spark_multipurpose_promoservice_section',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-multipurpose'),
            'disable' => esc_html__('No', 'spark-multipurpose'),
        )
    )));

    $wp_customize->add_setting('spark_multipurpose_promoservice_style', array(
        'sanitize_callback' => 'spark_multipurpose_sanitize_options',
        'default' => 'style1',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Selector($wp_customize, 'spark_multipurpose_promoservice_style', array(
        'section' => 'spark_multipurpose_promoservice_section',
        'label' => esc_html__('Service Layout', 'spark-multipurpose'),
        'options' => array(
            'style1' => get_template_directory_uri() . '/inc/customizer/images/f-service-style1.png',
            'style2' => get_template_directory_uri() . '/inc/customizer/images/f-service-style2.png'
        )
    )));

    /** Service Section Block Settings */
    $wp_customize->add_setting( 'spark_multipurpose_promo_service_block', array(
            'sanitize_callback' => 'spark_multipurpose_sanitize_field_background',
            'transport' => 'postMessage',
            'default'       => json_encode(array(
                'margin'    => '',
                'padding'   => '',
                'radius'    => '',
            )),
        )
    );
    $wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Group( $wp_customize, 'spark_multipurpose_promo_service_block',
        array(
            'label'    => esc_html__( 'Block Settings', 'spark-multipurpose' ),
            'section'  => 'spark_multipurpose_promoservice_section',
            'settings' => 'spark_multipurpose_promo_service_block',
        ),
        array(
            'margin'      => array(
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
            )
        ))
    );

    /** Service Section Block Items Icon Settings */
    $wp_customize->add_setting('spark_multipurpose_promoservice_icon_style',
        array(
            'sanitize_callback' => 'spark_multipurpose_sanitize_field_background',
            'transport'     => 'postMessage',
            'default'       => json_encode(array(
                'padding'   => '',
                'radius'    => '',
                'bg_color'  => '',
                'color'     => '',
                'bordercolor' => '',
                'borderwidth' => '',
            )),
        )
    );
    $wp_customize->add_control( new Spark_Multipurpose_Custom_Control_Group( $wp_customize, 'spark_multipurpose_promoservice_icon_style',
        array(
            'label'    => esc_html__( 'Block Icon Settings', 'spark-multipurpose' ),
            'section'  => 'spark_multipurpose_promoservice_section',
            'settings' => 'spark_multipurpose_promoservice_icon_style',
        ),
        array(
            'padding' => array(
                'type'  => 'cssbox',
                'label' => esc_html__( 'Padding', 'spark-multipurpose' ),
            ),
            'radius' => array(
                'type'  => 'cssbox',
                'label' => esc_html__( 'Radius', 'spark-multipurpose' ),
            ),
            'bg_color' => array(
                'type'  => 'color',
                'label' => esc_html__( 'Background', 'spark-multipurpose' ),
            ),
            'color' => array(
                'type'  => 'color',
                'label' => esc_html__( 'Color', 'spark-multipurpose' ),
            ),
            'borderwidth' => array(
                'type'  => 'number',
                'label' => esc_html__( 'Border Width', 'spark-multipurpose' ),
            ),
            'bordercolor' => array(
                'type'  => 'color',
                'label' => esc_html__( 'Border Color', 'spark-multipurpose' ),
            ),
        ))
    );


    /** Block Items Image Settings */
    $wp_customize->add_setting( 'spark_multipurpose_promo_service_image_style',
        array(
            'transport' => 'postMessage',
            'sanitize_callback' => 'spark_multipurpose_sanitize_field_background',
            'default'           => json_encode(array(
                'padding'   => '',
                'radius'    => '',
                'height'    => '',
            )),
        )
    );
    $wp_customize->add_control( new Spark_Multipurpose_Custom_Control_Group($wp_customize, 'spark_multipurpose_promo_service_image_style',
        array(
            'label'    => esc_html__( 'Block Items Image Settings', 'spark-multipurpose' ),
            'section'  => 'spark_multipurpose_promoservice_section',
            'settings' => 'spark_multipurpose_promo_service_image_style',
        ),
        array(
            'padding' => array(
                'type'  => 'cssbox',
                'label' => esc_html__( 'Padding', 'spark-multipurpose' ),
            ),
            'radius' => array(
                'type'  => 'cssbox',
                'label' => esc_html__( 'Radius', 'spark-multipurpose' ),
            ),
            'height' => array(
                'type'  => 'number',
                'label' => esc_html__( 'Height(px)', 'spark-multipurpose' ),
            ),
        ))
    );


$wp_customize->selective_refresh->add_partial( 'spark_multipurpose_promoservice_refresh', array (
    'settings' => array( 
        'spark_multipurpose_promoservice_section_disable',
        'spark_multipurpose_promoservice',
        'spark_multipurpose_promo_service_col',
        'spark_multipurpose_promoservice_type',
        'spark_multipurpose_promoservice_section_seperator',
        'spark_multipurpose_promoservice_top_seperator', 
        'spark_multipurpose_promoservice_bottom_seperator'
     ),
    'selector' => '#promoservice-section',
    'fallback_refresh' => true,
    'container_inclusive' => true,
    'render_callback' => function () {
        return get_template_part( 'section/section', 'promoservice' );
    }
));


$wp_customize->add_setting('spark_multipurpose_promoservice_upgrade_text', array(
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control(new Spark_Multipurpose_Upgrade_Text($wp_customize, 'spark_multipurpose_promoservice_upgrade_text', array(
    'section' => 'spark_multipurpose_promoservice_section',
    'label' => esc_html__('For more settings,', 'spark-multipurpose'),
    'choices' => array(
        esc_html__('Input from Customizer(Advance)', 'spark-multipurpose'),
        esc_html__('3 Layout', 'spark-multipurpose'),
        esc_html__('Section Shortcode', 'spark-multipurpose'),
        esc_html__('And more...', 'spark-multipurpose'),
    ),
    'priority' => 400
)));
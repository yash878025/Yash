<?php
/**
 * Our Service Section 
*/
$wp_customize->add_section(new Spark_Multipurpose_Toggle_Section($wp_customize, 'spark_multipurpose_service_section', array(
    'title'		=>	esc_html__('Service Section','spark-multipurpose'),
    'panel'		=> 'spark_multipurpose_frontpage_settings',
    'priority'  => spark_multipurpose_get_section_position('spark_multipurpose_service_section'),
    'hiding_control' => 'spark_multipurpose_service_section_disable'
)));
    /**
     * Enable/Disable Option
     *
     * @since 1.0.0
    */
    $wp_customize->add_setting('spark_multipurpose_service_section_disable', array(
        'default' => 'disable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_service_section_disable', array(
        'label' => esc_html__('Enable', 'spark-multipurpose'),
        'section' => 'spark_multipurpose_service_section',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-multipurpose'),
            'disable' => esc_html__('No', 'spark-multipurpose'),
        ),
    )));
    
    $wp_customize->add_setting('spark_multipurpose_service_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Tab($wp_customize, 'spark_multipurpose_service_nav', array(
        'type' => 'tab',
        'section' => 'spark_multipurpose_service_section',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_service_section_disable',
                    'spark_multipurpose_service_title_heading',
                    'spark_multipurpose_service_super_title',
                    'spark_multipurpose_service_title',
                    'spark_multipurpose_service_title_align',
                    'spark_multipurpose_service',
                    'spark_multipurpose_service_setting_heading',
                    'spark_multipurpose_service_bg_url',
                    'spark_multipurpose_service_layout',
                    'spark_multipurpose_service_button',
                    'spark_multipurpose_service_type',
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_service_cs_heading',
                    'spark_multipurpose_service_super_title_color',
                    'spark_multipurpose_service_title_color',
                    'spark_multipurpose_service_text_color',
                    'spark_multipurpose_service_link_color',
                    'spark_multipurpose_service_link_hover_color',
                ),
            ),
            array(
                'name' => esc_html__('Advanced', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_service_bg_type',
                    'spark_multipurpose_service_bg_color',
                    'spark_multipurpose_service_bg_gradient',
                    'spark_multipurpose_service_bg_image',
                    'spark_multipurpose_service_bg_video',
                    'spark_multipurpose_service_overlay_color',
                    'spark_multipurpose_service_padding',
                    'spark_multipurpose_service_content_heading',
					'spark_multipurpose_service_content_bg_type',
                    'spark_multipurpose_service_content_bg_color',
                    'spark_multipurpose_service_content_bg_gradient',
					'spark_multipurpose_service_content_padding',
					'spark_multipurpose_service_content_margin',
					'spark_multipurpose_service_content_radius',
                    'spark_multipurpose_service_cs_seperator',
                    'spark_multipurpose_service_seperator0',
                    'spark_multipurpose_service_section_seperator',
                    'spark_multipurpose_service_seperator1',
                    'spark_multipurpose_service_top_seperator',
                    'spark_multipurpose_service_ts_color',
                    'spark_multipurpose_service_ts_height',
                    'spark_multipurpose_service_seperator2',
                    'spark_multipurpose_service_bottom_seperator',
                    'spark_multipurpose_service_bs_color',
                    'spark_multipurpose_service_bs_height'
                ),
            ),
        ),
    )));


    $wp_customize->add_setting('spark_multipurpose_service_title_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'spark_multipurpose_service_title_heading', array(
        'section' => 'spark_multipurpose_service_section',
        'label' => esc_html__('Section Title & Sub Title', 'spark-multipurpose')
    )));

    
    $wp_customize->add_setting( 'spark_multipurpose_service_super_title', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'			//done
    ) );
    $wp_customize->add_control( 'spark_multipurpose_service_super_title', array(
        'label'    => esc_html__( 'Super Title', 'spark-multipurpose' ),
        'section'  => 'spark_multipurpose_service_section',
        'type'     => 'text',
    ));



    // Our Service Section Title.
    $wp_customize->add_setting( 'spark_multipurpose_service_title', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'			//done
    ) );
    $wp_customize->add_control( 'spark_multipurpose_service_title', array(
        'label'    => esc_html__( 'Title', 'spark-multipurpose' ),
        'section'  => 'spark_multipurpose_service_section',
        'type'     => 'text',
    ));
   
    
   
    $wp_customize->add_setting('spark_multipurpose_service_title_align', array(
        'default' => 'text-center',
        'sanitize_callback' => 'spark_multipurpose_sanitize_select',
        'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control(
        new Spark_Multipurpose_Custom_Control_Buttonset( $wp_customize, 'spark_multipurpose_service_title_align',
            array(
                'choices'  => array(
                    'text-left' => esc_html__('Left', 'spark-multipurpose'),
                    'text-center' => esc_html__('Center', 'spark-multipurpose'),
                    'text-right' => esc_html__('Right', 'spark-multipurpose'),
                ),
                'label'    => esc_html__( 'Title Alignment', 'spark-multipurpose' ),
                'section'  => 'spark_multipurpose_service_section',
                'settings' => 'spark_multipurpose_service_title_align',
            )
        )
    );

    /*****
     * Service Type
     */
    $wp_customize->add_setting('spark_multipurpose_service_type', array(
        'default' => 'default',
        'transport' => 'postMessage',
        'sanitize_callback' => 'spark_multipurpose_sanitize_select'
    ));
    $wp_customize->add_control('spark_multipurpose_service_type', array(
        'section' => 'spark_multipurpose_service_section',
        'type' => 'radio',
        'label' => esc_html__('Select Service Type', 'spark-multipurpose'),
        'choices' => array(
            'default' => esc_html__('Default', 'spark-multipurpose'),
        )
    ));

    //  Our Service Page.
    $wp_customize->add_setting('spark_multipurpose_service', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'spark_multipurpose_sanitize_repeater',		//done
        'default' => json_encode(array(
            array(
                'service_page' => '',
                'service_icon' =>'fa fa-cogs'
            )
        ))
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Repeater_Control( $wp_customize,'spark_multipurpose_service', 
        array(
            'label' 	   => esc_html__('Our Services', 'spark-multipurpose'),
            'section' 	   => 'spark_multipurpose_service_section',
            'settings' 	   => 'spark_multipurpose_service',
            'box_label' => esc_html__('Service', 'spark-multipurpose'),
            'add_label' => esc_html__('Add New', 'spark-multipurpose'),
        ),
        array(
            'service_page' => array(
                'type' => 'select',
                'label' => esc_html__('Select Service', 'spark-multipurpose'),
                'options' => $pages
            ),
            'icon' => array(
                'type' => 'icon',
                'label' => esc_html__('Icon', 'spark-multipurpose')
            )
        )
    ));

    // Our Service Section Button text.
    $wp_customize->add_setting( 'spark_multipurpose_service_button', array(
        'default'           => esc_html__( 'Read More','spark-multipurpose' ),
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'			//done
    ) );
    $wp_customize->add_control( 'spark_multipurpose_service_button', array(
        'label'    => esc_html__( 'Link Text', 'spark-multipurpose' ),
        'section'  => 'spark_multipurpose_service_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('spark_multipurpose_service_setting_heading', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'spark_multipurpose_service_setting_heading', array(
        'section' => 'spark_multipurpose_service_section',
        'label' => esc_html__('Layout Settings', 'spark-multipurpose')
    )));

    $wp_customize->add_setting('spark_multipurpose_service_layout', array(
        'sanitize_callback' => 'spark_multipurpose_sanitize_options',
        'default' => 'style1',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Selector($wp_customize, 'spark_multipurpose_service_layout', array(
        'section' => 'spark_multipurpose_service_section',
        'label' => esc_html__('Service Layout', 'spark-multipurpose'),
        'options' => array(
            'style1' => get_template_directory_uri() . '/inc/customizer/images/service-style.png',
            'style2' => get_template_directory_uri() . '/inc/customizer/images/service-style2.png',
        )
    )));

    // Service Layout One Feature Image
    $wp_customize->add_setting('spark_multipurpose_service_bg_url', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'spark_multipurpose_service_bg_url', array(
        'label'	   => esc_html__('Features Image','spark-multipurpose'),
        'section'  => 'spark_multipurpose_service_section',
    )));

    $wp_customize->selective_refresh->add_partial( 'spark_multipurpose_service_settings', array(
        'settings' => array( 
            'spark_multipurpose_service_section_disable', 
            'spark_multipurpose_service',
            'spark_multipurpose_service_type',
            'spark_multipurpose_service_bg_url',
            'spark_multipurpose_service_layout',
            'spark_multipurpose_service_section_seperator', 
            'spark_multipurpose_service_top_seperator', 
            'spark_multipurpose_service_bottom_seperator' 
        ),
        'selector' => '#service-section',
        'fallback_refresh' => true,
        'container_inclusive' => true,
        'render_callback' => function () {
            return get_template_part( 'section/section', 'service' );
        }
    ));

    $wp_customize->add_setting('spark_multipurpose_service_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new Spark_Multipurpose_Upgrade_Text($wp_customize, 'spark_multipurpose_service_upgrade_text', array(
        'section' => 'spark_multipurpose_service_section',
        'label' => esc_html__('For more settings,', 'spark-multipurpose'),
        'choices' => array(
            esc_html__('Input from Customizer(Advance)', 'spark-multipurpose'),
            esc_html__('3 Layout', 'spark-multipurpose'),
            esc_html__('Section Shortcode', 'spark-multipurpose'),
            esc_html__('And more...', 'spark-multipurpose'),
        ),
        'priority' => 400
    )));
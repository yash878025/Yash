<?php
/**
 * Clients Section. 
*/
$wp_customize->add_section(new Spark_Multipurpose_Toggle_Section($wp_customize, 'spark_multipurpose_client_section', array(
    'title'		=> 	esc_html__('Clients Section','spark-multipurpose'),
    'panel'		=> 'spark_multipurpose_frontpage_settings',
    'priority'  => spark_multipurpose_get_section_position('spark_multipurpose_client_section'),
    'hiding_control' => 'spark_multipurpose_client_section_disable'
)));
    /**
     * Enable/Disable Option
     *
     * @since 1.0.0
    */
    $wp_customize->add_setting('spark_multipurpose_client_section_disable', array(
        'default' => 'disable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_client_section_disable', array(
        'label' => esc_html__('Enable', 'spark-multipurpose'),
        'section' => 'spark_multipurpose_client_section',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-multipurpose'),
            'disable' => esc_html__('No', 'spark-multipurpose'),
        ),
    )));
    $wp_customize->add_setting('spark_multipurpose_client_section_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Tab($wp_customize, 'spark_multipurpose_client_section_nav', array(
        'type' => 'tab',
        'section' => 'spark_multipurpose_client_section',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_client_section_disable',
                    'spark_multipurpose_client_title_heading',
                    'spark_multipurpose_client_super_title',
                    'spark_multipurpose_client_title',
                    'spark_multipurpose_client_title_align',
                    'spark_multipurpose_client',
                    'spark_multipurpose_logo_style'
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_client_cs_heading',
                    'spark_multipurpose_client_super_title_color',
                    'spark_multipurpose_client_title_color',
                    'spark_multipurpose_client_block_group',
                    'spark_multipurpose_client_block_item_group'
                ),
            ),
            array(
                'name' => esc_html__('Advanced', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_client_bg_type',
                    'spark_multipurpose_client_bg_color',
                    'spark_multipurpose_client_bg_gradient',
                    'spark_multipurpose_client_bg_image',
                    'spark_multipurpose_client_bg_video',
                    'spark_multipurpose_client_overlay_color',
                    'spark_multipurpose_client_padding',
                    'spark_multipurpose_client_content_heading',
					'spark_multipurpose_client_content_bg_type',
                    'spark_multipurpose_client_content_bg_color',
                    'spark_multipurpose_client_content_bg_gradient',
					'spark_multipurpose_client_content_padding',
					'spark_multipurpose_client_content_margin',
					'spark_multipurpose_client_content_radius',
                    'spark_multipurpose_client_cs_seperator',
					'spark_multipurpose_client_seperator0',
					'spark_multipurpose_client_section_seperator',
					'spark_multipurpose_client_seperator1',
					'spark_multipurpose_client_top_seperator',
					'spark_multipurpose_client_ts_color',
					'spark_multipurpose_client_ts_height',
					'spark_multipurpose_client_seperator2',
					'spark_multipurpose_client_bottom_seperator',
					'spark_multipurpose_client_bs_color',
					'spark_multipurpose_client_bs_height'
                ),
            ),
            array(
                'name' => esc_html__('Hidden', 'spark-multipurpose'),
                'class' => 'customizer-hidden',
                'fields' => array(
                    'spark_multipurpose_client_text_color',
                    'spark_multipurpose_client_link_color',
                    'spark_multipurpose_client_link_hover_color',
                ),
            ),
        ),
    )));


    $wp_customize->add_setting('spark_multipurpose_client_title_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'spark_multipurpose_client_title_heading', array(
        'section' => 'spark_multipurpose_client_section',
        'label' => esc_html__('Section Title & Sub Title', 'spark-multipurpose')
    )));
    
    // Clients Section Title.
    $wp_customize->add_setting( 'spark_multipurpose_client_super_title', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'			//done
    ) );
    $wp_customize->add_control( 'spark_multipurpose_client_super_title', array(
        'label'    => esc_html__( 'Super Title', 'spark-multipurpose' ),
        'section'  => 'spark_multipurpose_client_section',
        'type'     => 'text',
    ));

    // Clients Section Title.
    $wp_customize->add_setting( 'spark_multipurpose_client_title', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'			//done
    ) );
    $wp_customize->add_control( 'spark_multipurpose_client_title', array(
        'label'    => esc_html__( 'Title', 'spark-multipurpose' ),
        'section'  => 'spark_multipurpose_client_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('spark_multipurpose_client_title_align', array(
        'default' => 'text-center',
        'sanitize_callback' => 'spark_multipurpose_sanitize_select',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new Spark_Multipurpose_Custom_Control_Buttonset(
            $wp_customize,
            'spark_multipurpose_client_title_align',
            array(
                'choices'  => array(
                    'text-left' => esc_html__('Left', 'spark-multipurpose'),
                    'text-center' => esc_html__('Center', 'spark-multipurpose'),
                    'text-right' => esc_html__('Right', 'spark-multipurpose'),
                ),
                'label'    => esc_html__( 'Alignment', 'spark-multipurpose' ),
                'section'  => 'spark_multipurpose_client_section',
                'settings' => 'spark_multipurpose_client_title_align',
            )
        )
    );

    //  Clients Page.
    $wp_customize->add_setting('spark_multipurpose_client', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'spark_multipurpose_sanitize_repeater',		//done
        'default' => json_encode(array(
            array(
                'client_image' => '',
                'client_link'  => '',
            )
        ))
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Repeater_Control( $wp_customize, 
        'spark_multipurpose_client',
        array(
            'label' 	   => esc_html__('Client Logos', 'spark-multipurpose'),
            'section' 	   => 'spark_multipurpose_client_section',
            'settings' 	   => 'spark_multipurpose_client',
            'box_label' => esc_html__('Logos', 'spark-multipurpose'),
            'add_label' => esc_html__('Add New', 'spark-multipurpose'),
        ),
        array(
            'client_image' => array(
                'type' => 'upload',
                'label' => esc_html__('Logo', 'spark-multipurpose'),
            ),
            'client_link' => array(
                'type'      => 'text',
                'label'     => esc_html__( 'Link', 'spark-multipurpose' ),
                'default'   => ''
            ), 
        )
    ));
    $wp_customize->add_setting('spark_multipurpose_logo_style', array(
        'sanitize_callback' => 'spark_multipurpose_sanitize_options',
        'default' => 'style1',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Selector($wp_customize, 'spark_multipurpose_logo_style', array(
        'section' => 'spark_multipurpose_client_section',
        'label' => esc_html__('Logo Style', 'spark-multipurpose'),
        'class' => 'one-second-width',
        'options' => array(
            'style1' => get_template_directory_uri() . '/inc/customizer/images/logo-style1.png',
            'style2' => get_template_directory_uri() . '/inc/customizer/images/logo-style2.png',
        )
    )));


    /*** Block & Block Item More Settings */
    $wp_customize->add_setting('spark_multipurpose_client_block_group',
        array(
            'transport' => 'postMessage',
            'sanitize_callback' => 'spark_multipurpose_sanitize_field_background',
            'default'           => json_encode(array(
                'padding'   => '',
                'margin'   => '',
                'radius'    => '',
                'bg_color'  => '',
                'borderwidth'  => '',
                'bordercolor'  => '',
            )),
        )
    );
    $wp_customize->add_control( new Spark_Multipurpose_Custom_Control_Group( $wp_customize, 'spark_multipurpose_client_block_group',
        array(
            'label'    => esc_html__( 'Block Settings', 'spark-multipurpose' ),
            'section'  => 'spark_multipurpose_client_section',
            'settings' => 'spark_multipurpose_client_block_group',
        ),
        array(
            'padding' => array(
                'type'  => 'cssbox',
                'label' => esc_html__( 'Padding', 'spark-multipurpose' ),
            ),
            'margin' => array(
                'type'  => 'cssbox',
                'label' => esc_html__( 'Margin', 'spark-multipurpose' ),
            ),
            'radius' => array(
                'type'  => 'cssbox',
                'label' => esc_html__( 'Radius', 'spark-multipurpose' ),
            ),
            'bg_color' => array(
                'type'  => 'color',
                'label' => esc_html__( 'Background', 'spark-multipurpose' ),
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

    $wp_customize->add_setting('spark_multipurpose_client_block_item_group',
        array(
            'transport' => 'postMessage',
            'sanitize_callback' => 'spark_multipurpose_sanitize_field_background',
            'default'           => json_encode(array(
                'padding'   => '',
                'radius'    => '',
                'bg_color'  => '',
                'borderwidth'  => '',
                'bordercolor'  => '',
            )),
        )
    );
    $wp_customize->add_control( new Spark_Multipurpose_Custom_Control_Group( $wp_customize, 'spark_multipurpose_client_block_item_group',
        array(
            'label'    => esc_html__( 'Block Items Settings', 'spark-multipurpose' ),
            'section'  => 'spark_multipurpose_client_section',
            'settings' => 'spark_multipurpose_client_block_item_group',
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


    

$wp_customize->selective_refresh->add_partial( "spark_multipurpose_client_refresh", array (
    'settings' => array( 
        'spark_multipurpose_client_section_disable',
        'spark_multipurpose_client',
        'spark_multipurpose_logo_style',
        'spark_multipurpose_client_block_group',
        'spark_multipurpose_client_block_item_group',
        'spark_multipurpose_client_section_seperator',
        'spark_multipurpose_client_top_seperator',
        'spark_multipurpose_client_bottom_seperator',		
    ),
    'selector' => "#client-section",
    'fallback_refresh' => true,
    'container_inclusive' => true,
    'render_callback' => function () {
        return get_template_part( 'section/section-client' );
    }
));
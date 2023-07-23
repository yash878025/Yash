<?php
/**
 * Counter Section. 
*/
$wp_customize->add_section(new Spark_Multipurpose_Toggle_Section($wp_customize, 'spark_multipurpose_counter_section', array(
    'title'		=> 	esc_html__('Counter Section','spark-multipurpose'),
    'panel'		=> 'spark_multipurpose_frontpage_settings',
    'priority'  => spark_multipurpose_get_section_position('spark_multipurpose_counter_section'),
    'hiding_control' => 'spark_multipurpose_counter_section_disable'
)));
    $wp_customize->add_setting('spark_multipurpose_counter_section_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Tab($wp_customize, 'spark_multipurpose_counter_section_nav', array(
        'type' => 'tab',
        'section' => 'spark_multipurpose_counter_section',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_counter_section_disable',
                    'spark_multipurpose_counter_title_heading',
                    'spark_multipurpose_counter_super_title',
                    'spark_multipurpose_counter_title',
                    'spark_multipurpose_counter_title_align',
                    'spark_multipurpose_counter',
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_counter_group_style',
                    'spark_multipurpose_counter_icon_style',
                    'spark_multipurpose_counter_cs_heading',
                    'spark_multipurpose_counter_super_title_color',
                    'spark_multipurpose_counter_title_color',
                    'spark_multipurpose_counter_text_color',
                    'spark_multipurpose_counter_link_color',
                    'spark_multipurpose_counter_link_hover_color',
                ),
            ),
            array(
                'name' => esc_html__('Advanced', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_counter_bg_type',
                    'spark_multipurpose_counter_bg_color',
                    'spark_multipurpose_counter_bg_gradient',
                    'spark_multipurpose_counter_bg_image',
                    'spark_multipurpose_counter_bg_video',
                    'spark_multipurpose_counter_overlay_color',
                    'spark_multipurpose_counter_padding',
                    'spark_multipurpose_counter_content_heading',
					'spark_multipurpose_counter_content_bg_type',
                    'spark_multipurpose_counter_content_bg_color',
                    'spark_multipurpose_counter_content_bg_gradient',
					'spark_multipurpose_counter_content_padding',
					'spark_multipurpose_counter_content_margin',
					'spark_multipurpose_counter_content_radius',
                	'spark_multipurpose_counter_cs_seperator',
					'spark_multipurpose_counter_seperator0',
					'spark_multipurpose_counter_section_seperator',
					'spark_multipurpose_counter_seperator1',
					'spark_multipurpose_counter_top_seperator',
					'spark_multipurpose_counter_ts_color',
					'spark_multipurpose_counter_ts_height',
					'spark_multipurpose_counter_seperator2',
					'spark_multipurpose_counter_bottom_seperator',
					'spark_multipurpose_counter_bs_color',
					'spark_multipurpose_counter_bs_height',
                    
                ),
            ),
        ),
    )));
    /**
     * Enable/Disable Option
     *
     * @since 1.0.0
    */
    $wp_customize->add_setting('spark_multipurpose_counter_section_disable', array(
        'default' => 'disable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_counter_section_disable', array(
        'label' => esc_html__('Enable', 'spark-multipurpose'),
        'section' => 'spark_multipurpose_counter_section',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-multipurpose'),
            'disable' => esc_html__('No', 'spark-multipurpose'),
        ),
    )));
    
    $wp_customize->add_setting('spark_multipurpose_counter_title_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'spark_multipurpose_counter_title_heading', array(
        'section' => 'spark_multipurpose_counter_section',
        'label' => esc_html__('Section Title & Sub Title', 'spark-multipurpose')
    )));

    // Counter Section Title.
    $wp_customize->add_setting('spark_multipurpose_counter_super_title', array(
        'transport' => 'postMessage',
        'sanitize_callback'	=> 'sanitize_text_field'		//done
    ));
    $wp_customize->add_control('spark_multipurpose_counter_super_title', array(
        'label'	   => esc_html__('Super Title','spark-multipurpose'),
        'section'  => 'spark_multipurpose_counter_section',
        'type'	   => 'text',
    ));
    // Counter Section Title.
    $wp_customize->add_setting('spark_multipurpose_counter_title', array(
        'transport' => 'postMessage',
        'sanitize_callback'	=> 'sanitize_text_field'		//done
    ));
    $wp_customize->add_control('spark_multipurpose_counter_title', array(
        'label'	   => esc_html__('Title','spark-multipurpose'),
        'section'  => 'spark_multipurpose_counter_section',
        'type'	   => 'text',
    ));
    
    $wp_customize->add_setting('spark_multipurpose_counter_title_align', array(
        'default' => 'text-center',
        'sanitize_callback' => 'spark_multipurpose_sanitize_select',
        'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control(
        new Spark_Multipurpose_Custom_Control_Buttonset( $wp_customize, 'spark_multipurpose_counter_title_align',
            array(
                'choices'  => array(
                    'text-left' => esc_html__('Left', 'spark-multipurpose'),
                    'text-center' => esc_html__('Center', 'spark-multipurpose'),
                    'text-right' => esc_html__('Right', 'spark-multipurpose'),
                ),
                'label'    => esc_html__( 'Alignment', 'spark-multipurpose' ),
                'section'  => 'spark_multipurpose_counter_section',
                'settings' => 'spark_multipurpose_counter_title_align',
            )
        )
    );

    
    // Counter Section.
    $wp_customize->add_setting('spark_multipurpose_counter', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'spark_multipurpose_sanitize_repeater',		//done
        'default' => json_encode(array(
            array(
                'counter_icon'  =>'',
                'counter_title'  =>'',
                'counter_number'  =>'',	            
                'counter_suffix' => ''
            )
        ))
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Repeater_Control( $wp_customize, 
        'spark_multipurpose_counter', 
        array(
            'label' 	   => esc_html__('Counter Items', 'spark-multipurpose'),
            'section' 	   => 'spark_multipurpose_counter_section',
            'settings' 	   => 'spark_multipurpose_counter',
            'box_label' => esc_html__('Counter Settings Options', 'spark-multipurpose'),
            'add_label' => esc_html__('Add New', 'spark-multipurpose'),
        ),
        array(
            'counter_icon' => array(
                'type' => 'icon',
                'label' => esc_html__('Choose Counter Icon', 'spark-multipurpose'),
                'default' => 'fa fa-cogs'
            ),
            'counter_title' => array(
                'type' => 'text',
                'label' => esc_html__('Enter Title', 'spark-multipurpose'),
                'default' => ''
            ),
            'counter_number' => array(
                'type' => 'text',
                'label' => esc_html__('Enter Number', 'spark-multipurpose'),
                'default' => ''
            ),
            'counter_suffix' => array(
                'type' => 'text',
                'label' => esc_html__('Suffix', 'spark-multipurpose'),
                'default' => ''
            ),
        )
    ));


    $wp_customize->add_setting('spark_multipurpose_counter_col', array(
        'sanitize_callback' => 'absint',
        'default' => 4,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Range_Control($wp_customize, 'spark_multipurpose_counter_col', array(
        'section' => 'spark_multipurpose_counter_section',
        'label' => esc_html__('No of Columns', 'spark-multipurpose'),
        'input_attrs' => array(
            'min' => 1,
            'max' => 6,
            'step' => 1,
        )
    )));
    
    /**** Counter Block Settings */
    $wp_customize->add_setting('spark_multipurpose_counter_group_style',
        array(
            'transport' => 'postMessage',
            'sanitize_callback' => 'spark_multipurpose_sanitize_field_background',
            'default'           => json_encode(array(
                'padding'   => '',
                'radius'    => '',
                'bg_color'  => '',
                'color'     => '',
                'borderwidth' => '',
                'bordercolor' => '',
            )),
        )
    );
    $wp_customize->add_control( new Spark_Multipurpose_Custom_Control_Group( $wp_customize, 'spark_multipurpose_counter_group_style',
        array(
            'label'    => esc_html__( 'Block Settings', 'spark-multipurpose' ),
            'section'  => 'spark_multipurpose_counter_section',
            'settings' => 'spark_multipurpose_counter_group_style',
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
                'type'  => 'text',
                'label' => esc_html__( 'Border Width', 'spark-multipurpose' ),
            ),
            'bordercolor' => array(
                'type'  => 'color',
                'label' => esc_html__( 'Border Color', 'spark-multipurpose' ),
            ),
        ))
    );

    /*** Counter Block Items Icon Settings */
    $wp_customize->add_setting( 'spark_multipurpose_counter_icon_style',
        array(
            'transport' => 'postMessage',
            'sanitize_callback' => 'spark_multipurpose_sanitize_field_background',
            'default'           => json_encode(array(
                'padding'   => '',
                'radius'    => '',
                'bg_color'  => '',
                'color'     => '',
                'bordercolor'  => '',
                'borderwidth'  => '',
            )),
        )
    );
    $wp_customize->add_control( new Spark_Multipurpose_Custom_Control_Group( $wp_customize, 'spark_multipurpose_counter_icon_style',
        array(
            'label'    => esc_html__( 'Block Icon Settings', 'spark-multipurpose' ),
            'section'  => 'spark_multipurpose_counter_section',
            'settings' => 'spark_multipurpose_counter_icon_style',
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
                'type'  => 'text',
                'label' => esc_html__( 'Border Width', 'spark-multipurpose' ),
            ),
            'bordercolor' => array(
                'type'  => 'color',
                'label' => esc_html__( 'Border Color', 'spark-multipurpose' ),
            ),
        ))
    );


    $wp_customize->selective_refresh->add_partial( "spark_multipurpose_counter_section_refresh", array (
        'settings' => array(
            'spark_multipurpose_counter_section_disable',
            'spark_multipurpose_counter',
            'spark_multipurpose_counter_col',
            'spark_multipurpose_counter_section_seperator',
            'spark_multipurpose_counter_top_seperator',
            'spark_multipurpose_counter_bottom_seperator',		
        ),
        'selector' => "#counter-section",
        'fallback_refresh' => true,
        'container_inclusive' => true,
        'render_callback' => function () {
            return get_template_part( 'section/section-counter' );
        }
    ));
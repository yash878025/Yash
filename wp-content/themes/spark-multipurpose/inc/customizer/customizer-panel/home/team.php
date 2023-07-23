<?php
/* Team Section. */
$wp_customize->add_section(new Spark_Multipurpose_Toggle_Section($wp_customize, 'spark_multipurpose_team_section', array(
    'title'		=> 	esc_html__('Our Team Section','spark-multipurpose'),
    'panel'		=> 'spark_multipurpose_frontpage_settings',
    'priority'  => spark_multipurpose_get_section_position('spark_multipurpose_team_section'),
    'hiding_control' => 'spark_multipurpose_team_section_disable'
)));
    /**
     * Enable/Disable Option
     *
     * @since 1.0.0
    */
    $wp_customize->add_setting('spark_multipurpose_team_section_disable', array(
        'default' => 'disable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_team_section_disable', array(
        'label' => esc_html__('Enable', 'spark-multipurpose'),
        'section' => 'spark_multipurpose_team_section',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-multipurpose'),
            'disable' => esc_html__('No', 'spark-multipurpose'),
        ),
    )));

    $wp_customize->add_setting('spark_multipurpose_team_section_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Tab($wp_customize, 'spark_multipurpose_team_section_nav', array(
        'type' => 'tab',
        'section' => 'spark_multipurpose_team_section',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_team_section_disable',
                    'spark_multipurpose_team_section',
                    'spark_multipurpose_team_super_title_heading',
                    'spark_multipurpose_team_super_title',
                    'spark_multipurpose_team_title',
                    'spark_multipurpose_team_title_align',
                    'spark_multipurpose_team',
                    'spark_multipurpose_team_style',
                    'spark_multipurpose_team_col',
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_team_grid_style',
                    'spark_multipurpose_team_image_style',
                    'spark_multipurpose_team_cs_heading',
                    'spark_multipurpose_team_super_title_color',
                    'spark_multipurpose_team_title_color',
                    'spark_multipurpose_team_text_color',
                    'spark_multipurpose_team_link_color',
                    'spark_multipurpose_team_link_hover_color',
                ),
            ),
            array(
                'name' => esc_html__('Advanced', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_team_bg_type',
                    'spark_multipurpose_team_bg_color',
                    'spark_multipurpose_team_bg_gradient',
                    'spark_multipurpose_team_bg_image',
                    'spark_multipurpose_team_bg_video',
                    'spark_multipurpose_team_overlay_color',
                    'spark_multipurpose_team_padding',
                    'spark_multipurpose_team_content_heading',
					'spark_multipurpose_team_content_bg_type',
                    'spark_multipurpose_team_content_bg_color',
                    'spark_multipurpose_team_content_bg_gradient',
					'spark_multipurpose_team_content_padding',
					'spark_multipurpose_team_content_margin',
					'spark_multipurpose_team_content_radius',
                    'spark_multipurpose_team_cs_seperator',
					'spark_multipurpose_team_seperator0',
					'spark_multipurpose_team_section_seperator',
					'spark_multipurpose_team_seperator1',
					'spark_multipurpose_team_top_seperator',
					'spark_multipurpose_team_ts_color',
					'spark_multipurpose_team_ts_height',
					'spark_multipurpose_team_seperator2',
					'spark_multipurpose_team_bottom_seperator',
					'spark_multipurpose_team_bs_color',
					'spark_multipurpose_team_bs_height'
                ),
            ),
        ),
    )));
    

    $wp_customize->add_setting('spark_multipurpose_team_super_title_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'spark_multipurpose_team_super_title_heading', array(
        'section' => 'spark_multipurpose_team_section',
        'label' => esc_html__('Section Title & Sub Title', 'spark-multipurpose')
    )));


    // Team Section Title.
    $wp_customize->add_setting( 'spark_multipurpose_team_super_title', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'			//done
    ) );
    $wp_customize->add_control( 'spark_multipurpose_team_super_title', array(
        'label'    => esc_html__( 'Super Title', 'spark-multipurpose' ),
        'section'  => 'spark_multipurpose_team_section',
        'type'     => 'text',
    ));
    // Team Section Title.
    $wp_customize->add_setting( 'spark_multipurpose_team_title', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'			//done
    ) );
    $wp_customize->add_control( 'spark_multipurpose_team_title', array(
        'label'    => esc_html__( 'Title', 'spark-multipurpose' ),
        'section'  => 'spark_multipurpose_team_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('spark_multipurpose_team_title_align', array(
        'default' => 'text-center',
        'sanitize_callback' => 'spark_multipurpose_sanitize_select',
        'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control(
        new Spark_Multipurpose_Custom_Control_Buttonset( $wp_customize, 'spark_multipurpose_team_title_align',
            array(
                'choices'  => array(
                    'text-left' => esc_html__('Left', 'spark-multipurpose'),
                    'text-center' => esc_html__('Center', 'spark-multipurpose'),
                    'text-right' => esc_html__('Right', 'spark-multipurpose'),
                ),
                'label'    => esc_html__( 'Alignment', 'spark-multipurpose' ),
                'section'  => 'spark_multipurpose_team_section',
            )
        )
    );
    
  
    // Our Team Page.
    $wp_customize->add_setting('spark_multipurpose_team', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'spark_multipurpose_sanitize_repeater',		//done
        'default' => json_encode(array(
            array(
                'team_page'   => '',
                'designation' =>'',
                'facebook'    =>'',
                'twitter'     =>'',
                'linkedin'    =>'',
                'instagram'   => '',
                'alignment'   => 'text-center',
            )
        ))
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Repeater_Control( $wp_customize, 
        'spark_multipurpose_team', 
        array(
            'label' 	   => esc_html__('Team Blocks', 'spark-multipurpose'),
            'section' 	   => 'spark_multipurpose_team_section',
            'settings' 	   => 'spark_multipurpose_team',
            'box_label' => esc_html__('Team Block', 'spark-multipurpose'),
            'add_label' => esc_html__('Add New', 'spark-multipurpose'),
        ),
        array(
            'team_page' => array(
                'type'    => 'select',
                'label'   => esc_html__('Team Page', 'spark-multipurpose'),
                'options' => $pages
            ),
            'designation' => array(
                'type'    => 'text',
                'label'   => esc_html__('Designation', 'spark-multipurpose'),
                'default' => ''
            ),
            'facebook'  => array(
                'type'   => 'url',
                'label'  => esc_html__('Facebook Link', 'spark-multipurpose'),
                'default' => ''
            ),
            'twitter' 	=> array(
                'type'    => 'url',
                'label'   => esc_html__('Twitter Link', 'spark-multipurpose'),
                'default' => ''
            ),
            'linkedin'   => array(
                'type'    => 'url',
                'label'   => esc_html__('Linkedin Link', 'spark-multipurpose'),
                'default' => ''
            ),
            'instagram' => array(
                'type'    => 'url',
                'label'   => esc_html__('Instagram Link', 'spark-multipurpose'),
                'default' => ''
            ),
            'alignment' => array(
                'type' => 'select',
                'label' => esc_html__('Alignment', 'spark-multipurpose'),
                'options' => array(
                    'text-left' => esc_html__('Left', 'spark-multipurpose'),
                    'text-center' => esc_html__('Center', 'spark-multipurpose'),
                    'text-right' => esc_html__('Right', 'spark-multipurpose')
                )
            ),
        )
    ));
    
   
    $wp_customize->add_setting('spark_multipurpose_team_style', array(
        'sanitize_callback' => 'spark_multipurpose_sanitize_options',
        'default' => 'style1',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Selector($wp_customize, 'spark_multipurpose_team_style', array(
        'section' => 'spark_multipurpose_team_section',
        'label' => esc_html__('Team Block Style', 'spark-multipurpose'),
        'options' => array(
            'style1' => get_template_directory_uri() . '/inc/customizer/images/team-style1.png',
            'style2' => get_template_directory_uri() . '/inc/customizer/images/team-style2.png',
        )
    )));

    $wp_customize->add_setting('spark_multipurpose_team_col', array(
        'sanitize_callback' => 'absint',
        'default' => 3,
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Range_Control($wp_customize, 'spark_multipurpose_team_col', array(
        'section' => 'spark_multipurpose_team_section',
        'label' => esc_html__('No of Columns', 'spark-multipurpose'),
        'input_attrs' => array(
            'min' => 2,
            'max' => 4,
            'step' => 1,
        )
    )));

    $wp_customize->add_setting('spark_multipurpose_team_item_image', array(
        'default' => 'enable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'spark_multipurpose_sanitize_switch',
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_team_item_image', array(
        'label' => esc_html__('Team Items Image', 'spark-multipurpose'),
        'section' => 'spark_multipurpose_team_section',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-multipurpose'),
            'disable' => esc_html__('No', 'spark-multipurpose'),
        ),
    )));

    
    /** Service Section Block Settings */
    $wp_customize->add_setting('spark_multipurpose_team_grid_style',
        array(
            'transport' => 'postMessage',
            'sanitize_callback' => 'spark_multipurpose_sanitize_field_background',
            'default'           => json_encode(array(
                'margin'    => '',
                'padding'   => '',
                'radius'    => '',
                'bg_color'  => '',
                'borderwidth' => '',
                'bordercolor' => '',
            )),
        )
    );
    $wp_customize->add_control( new Spark_Multipurpose_Custom_Control_Group( $wp_customize, 'spark_multipurpose_team_grid_style',
        array(
            'label'    => esc_html__( 'Block Settings', 'spark-multipurpose' ),
            'section'  => 'spark_multipurpose_team_section',
            'settings' => 'spark_multipurpose_team_grid_style',
        ),
        array(
            'margin' => array(
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

    /** Block Items Image Settings */
    $wp_customize->add_setting( 'spark_multipurpose_team_image_style',
        array(
            'transport' => 'postMessage',
            'sanitize_callback' => 'spark_multipurpose_sanitize_field_background',
            'default'           => json_encode(array(
                'padding'   => '',
                'radius'    => '',
                'bg_color'  => '',
                'height'    => '',
                'width'     => '',
                'margintop' => '',
                'align'     => '',
            )),
        )
    );
    $wp_customize->add_control( new Spark_Multipurpose_Custom_Control_Group($wp_customize, 'spark_multipurpose_team_image_style',
        array(
            'label'    => esc_html__( 'Block Items Image Settings', 'spark-multipurpose' ),
            'section'  => 'spark_multipurpose_team_section',
            'settings' => 'spark_multipurpose_team_image_style',
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
            'height' => array(
                'type'  => 'number',
                'label' => esc_html__( 'Height(px)', 'spark-multipurpose' ),
            ),
            'width' => array(
                'type'  => 'number',
                'label' => esc_html__( 'Width(px)', 'spark-multipurpose' ),
            ),
            'margintop' => array(
                'type'  => 'number',
                'label' => esc_html__( 'Margin Top (px)', 'spark-multipurpose' ),
            )
        ))
    );


    $wp_customize->selective_refresh->add_partial( "spark_multipurpose_team_section_disable_refresh", array (
        'settings' => array(
            'spark_multipurpose_team_section_disable',
            'spark_multipurpose_team',
            'spark_multipurpose_team_col',
            'spark_multipurpose_team_item_image',
            'spark_multipurpose_team_section_seperator',
            'spark_multipurpose_team_top_seperator',
            'spark_multipurpose_team_bottom_seperator',
        ),
        'selector' => "#team-section",
        'fallback_refresh' => true,
        'container_inclusive' => true,
        'render_callback' => function () {
            return get_template_part( 'section/section-team' );
        }
    ));

    $wp_customize->add_setting('spark_multipurpose_team_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new Spark_Multipurpose_Upgrade_Text($wp_customize, 'spark_multipurpose_team_upgrade_text', array(
        'section' => 'spark_multipurpose_team_section',
        'label' => esc_html__('For more settings,', 'spark-multipurpose'),
        'choices' => array(
            esc_html__('Input from Customizer(Advance)', 'spark-multipurpose'),
            esc_html__('3 Layout', 'spark-multipurpose'),
            esc_html__('Section Shortcode', 'spark-multipurpose'),
            esc_html__('And more...', 'spark-multipurpose'),
        ),
        'priority' => 400
    )));
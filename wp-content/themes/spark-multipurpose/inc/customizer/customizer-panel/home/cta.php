<?php
	/******
	 * Call To Action Section
	*/
	$wp_customize->add_section(new Spark_Multipurpose_Toggle_Section($wp_customize, 'spark_multipurpose_calltoaction_section', array(
		'title'		=> 	esc_html__('Call To Action Section','spark-multipurpose'),
		'panel'		=> 'spark_multipurpose_frontpage_settings',
		'priority'  => spark_multipurpose_get_section_position('spark_multipurpose_calltoaction_section'),
		'hiding_control' => 'spark_multipurpose_calltoaction_section_disable'
    )));
    $wp_customize->add_setting('spark_multipurpose_calltoaction_section_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Tab($wp_customize, 'spark_multipurpose_calltoaction_section_nav', array(
        'type' => 'tab',
        'section' => 'spark_multipurpose_calltoaction_section',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'spark-multipurpose'),
                'fields' => array(
					'spark_multipurpose_calltoaction_section_disable',
                    'spark_multipurpose_call_to_action_title',
					'spark_multipurpose_call_to_action_subtitle',
                    'spark_multipurpose_call_to_action_button',
                    'spark_multipurpose_call_to_action_link',
                    'spark_multipurpose_call_to_action_button_one',
                    'spark_multipurpose_call_to_action_link_one',
                    'spark_multipurpose_calltoaction_image',
					'spark_multipurpose_cta_alignment',
					"spark_multipurpose_cta_layout"
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'spark-multipurpose'),
                'fields' => array(
					'spark_multipurpose_cta_title_font_size',
					'spark_multipurpose_cta_desc_font_size',
					'spark_multipurpose_calltoaction_image_style',
                    'spark_multipurpose_calltoaction_cs_heading',
                    'spark_multipurpose_calltoaction_super_title_color',
                    'spark_multipurpose_calltoaction_title_color',
                    'spark_multipurpose_calltoaction_text_color',
					'spark_multipurpose_calltoaction_link_color',
					'spark_multipurpose_calltoaction_link_hover_color',
				)
            ),
            array(
                'name' => esc_html__('Advanced', 'spark-multipurpose'),
                'fields' => array(
					'spark_multipurpose_calltoaction_padding',
                    'spark_multipurpose_calltoaction_bg_type',
                    'spark_multipurpose_calltoaction_bg_color',
                    'spark_multipurpose_calltoaction_bg_gradient',
                    'spark_multipurpose_calltoaction_bg_image',
                    'spark_multipurpose_calltoaction_bg_video',
                    'spark_multipurpose_calltoaction_overlay_color',
					'spark_multipurpose_calltoaction_content_heading',
					'spark_multipurpose_calltoaction_content_bg_type',
                    'spark_multipurpose_calltoaction_content_bg_color',
                    'spark_multipurpose_calltoaction_content_bg_gradient',
					'spark_multipurpose_calltoaction_content_padding',
					'spark_multipurpose_calltoaction_content_margin',
					'spark_multipurpose_calltoaction_content_radius',
                    'spark_multipurpose_calltoaction_cs_seperator',
					'spark_multipurpose_calltoaction_seperator0',
					'spark_multipurpose_calltoaction_section_seperator',
					'spark_multipurpose_calltoaction_seperator1',
					'spark_multipurpose_calltoaction_top_seperator',
					'spark_multipurpose_calltoaction_ts_color',
					'spark_multipurpose_calltoaction_ts_height',
					'spark_multipurpose_calltoaction_seperator2',
					'spark_multipurpose_calltoaction_bottom_seperator',
					'spark_multipurpose_calltoaction_bs_color',
					'spark_multipurpose_calltoaction_bs_height'
                ),
            ),
        ),
    )));
	
		/**
         * Enable/Disable Option
         *
         * @since 1.0.0
        */
        $wp_customize->add_setting('spark_multipurpose_calltoaction_section_disable', array(
		    'default' => 'disable',
			'transport' => 'postMessage',
		    'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
		));
		$wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_calltoaction_section_disable', array(
		    'label' => esc_html__('Enable', 'spark-multipurpose'),
		    'section' => 'spark_multipurpose_calltoaction_section',
		    'switch_label' => array(
		        'enable' => esc_html__('Yes', 'spark-multipurpose'),
		        'disable' => esc_html__('No', 'spark-multipurpose'),
		    ),
		)));
		
		// title
		$wp_customize->add_setting('spark_multipurpose_call_to_action_title', array(
			'transport' => 'postMessage',
			'sanitize_callback'	=> 'sanitize_text_field'		//done
		));
		$wp_customize->add_control('spark_multipurpose_call_to_action_title', array(
			'label'	   => esc_html__('Title','spark-multipurpose'),
			'section'  => 'spark_multipurpose_calltoaction_section',
			'type'	   => 'text',
		));

		// title
		$wp_customize->add_setting('spark_multipurpose_call_to_action_subtitle', array(
			'transport' => 'postMessage',
			'sanitize_callback'	=> 'spark_multipurpose_sanitize_text'		//done
		));
		$wp_customize->add_control('spark_multipurpose_call_to_action_subtitle', array(
			'label'	   => esc_html__('Sub Title','spark-multipurpose'),
			'section'  => 'spark_multipurpose_calltoaction_section',
			'type'	   => 'text',
		));
		
		// Call To Action Button.
		$wp_customize->add_setting('spark_multipurpose_call_to_action_button', array(
			'transport' => 'postMessage',
			'sanitize_callback'	=> 'sanitize_text_field'		//done
		));
		$wp_customize->add_control('spark_multipurpose_call_to_action_button', array(
			'label'	   => esc_html__('Button One Text','spark-multipurpose'),
			'section'  => 'spark_multipurpose_calltoaction_section',
			'type'	   => 'text',
		));
		
		// Call To Action Button Link.
		$wp_customize->add_setting('spark_multipurpose_call_to_action_link', array(
			'transport' => 'postMessage',
			'sanitize_callback'	=> 'esc_url_raw'		//done
		));
		$wp_customize->add_control('spark_multipurpose_call_to_action_link', array(
			'label'	   => esc_html__('Button One Link','spark-multipurpose'),
			'section'  => 'spark_multipurpose_calltoaction_section',
			'type'	   => 'url',
		));

		// Call To Action Button.
		$wp_customize->add_setting('spark_multipurpose_call_to_action_button_one', array(
			'transport' => 'postMessage',
			'sanitize_callback'	=> 'sanitize_text_field'		//done
		));
		$wp_customize->add_control('spark_multipurpose_call_to_action_button_one', array(
			'label'	   => esc_html__('Button Two Text','spark-multipurpose'),
			'section'  => 'spark_multipurpose_calltoaction_section',
			'type'	   => 'text',
		));

		// Call To Action Button Link.
		$wp_customize->add_setting('spark_multipurpose_call_to_action_link_one', array(
			'transport' => 'postMessage',
			'sanitize_callback'	=> 'esc_url_raw'		//done
		));
		$wp_customize->add_control('spark_multipurpose_call_to_action_link_one', array(
			'label'	   => esc_html__('Button Two Link','spark-multipurpose'),
			'section'  => 'spark_multipurpose_calltoaction_section',
			'type'	   => 'url',
		));

		$wp_customize->add_setting('spark_multipurpose_calltoaction_image', array(
			'transport' => 'postMessage',
			'sanitize_callback'	=> 'esc_url_raw'		//done
		));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'spark_multipurpose_calltoaction_image', array(
			'label'	   => esc_html__('Image','spark-multipurpose'),
			'section'  => 'spark_multipurpose_calltoaction_section'
		)));
		

		/** alignment */
        $wp_customize->add_setting(
            'spark_multipurpose_cta_alignment',
            array(
                'default'           => 'text-center',
                'sanitize_callback' => 'spark_multipurpose_sanitize_select',
                'transport'         => 'postMessage',
            )
        );
        $wp_customize->add_control(
            new Spark_Multipurpose_Custom_Control_Buttonset(
                $wp_customize,
                'spark_multipurpose_cta_alignment',
                array(
                    'choices'  => array(
                        'text-left' => esc_html__('Left', 'spark-multipurpose'),
                        'text-right' => esc_html__('Right', 'spark-multipurpose'),
                        'text-center' => esc_html__('Center', 'spark-multipurpose'),
                    ),
                    'label'    => esc_html__( 'Alignment', 'spark-multipurpose' ),
                    'section'  => 'spark_multipurpose_calltoaction_section',
                    'settings' => 'spark_multipurpose_cta_alignment',
                )
            )
        );
		
		$wp_customize->add_setting('spark_multipurpose_cta_layout', array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'postMessage',
			'default' => 'cta-left'
		));

		$wp_customize->add_control(new Spark_Multipurpose_Selector($wp_customize, 'spark_multipurpose_cta_layout', array(
            'section' => 'spark_multipurpose_calltoaction_section',
            'label' => esc_html__('Layout', 'spark-multipurpose'),
            'options' => array(
                'cta-left' => get_template_directory_uri() . '/inc/customizer/images/cover-image-left.png',
                'cta-right' => get_template_directory_uri() . '/inc/customizer/images/cover-image-right.png',
                'cta-center' => get_template_directory_uri() . '/inc/customizer/images/cover-image-center.png',
            )
        )));

		/**** Title Font Size */
		$wp_customize->add_setting("spark_multipurpose_cta_title_font_size", array(
			'transport' => 'postMessage',
			'sanitize_callback' => 'spark_multipurpose_sanitize_number_blank',
			'default' => 40
		));
		$wp_customize->add_control(new Spark_Multipurpose_Range_Control($wp_customize, "spark_multipurpose_cta_title_font_size", array(
			'section' => "spark_multipurpose_calltoaction_section",
			'label' => esc_html__('Title Font Size(px)', 'spark-multipurpose'),
			'settings' => 'spark_multipurpose_cta_title_font_size',
			'input_attrs' => array(
				'min' => 10,
				'max' => 200,
				'step' => 1,
			)
		)));

		$wp_customize->add_setting("spark_multipurpose_cta_desc_font_size", array(
			'transport' => 'postMessage',
			'sanitize_callback' => 'spark_multipurpose_sanitize_number_blank',
			'default' => 18,
		));
		$wp_customize->add_control(new Spark_Multipurpose_Range_Control($wp_customize, "spark_multipurpose_cta_desc_font_size", array(
			'section' => "spark_multipurpose_calltoaction_section",
			'label' => esc_html__('Description Font Size(px)', 'spark-multipurpose'),
			'settings' => 'spark_multipurpose_cta_desc_font_size',
			'input_attrs' => array(
				'min' => 10,
				'max' => 200,
				'step' => 1,
			)
		)));

		/** Block Items Images Settings */
		$wp_customize->add_setting( 'spark_multipurpose_calltoaction_image_style',
			array(
				'transport' => 'postMessage',
				'sanitize_callback' => 'spark_multipurpose_sanitize_field_background',
				'default'           => json_encode(array(
					'margin'   	=> '',
					'padding'   => '',
					'radius'    => '',
					'bg_color'  => '',
					'height'    => '',
				)),
			)
		);
		$wp_customize->add_control( new Spark_Multipurpose_Custom_Control_Group($wp_customize, 'spark_multipurpose_calltoaction_image_style',
			array(
				'label'    => esc_html__( 'Image Settings', 'spark-multipurpose' ),
				'section'  => 'spark_multipurpose_calltoaction_section',
				'settings' => 'spark_multipurpose_calltoaction_image_style',
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
				'height' => array(
					'type'  => 'number',
					'label' => esc_html__( 'Height(px)', 'spark-multipurpose' ),
				),
			))
		);

		$wp_customize->selective_refresh->add_partial( "spark_multipurpose_calltoaction_refresh", array (
			'settings' => array(
				'spark_multipurpose_calltoaction_section_disable',
				'spark_multipurpose_call_to_action_button',
				'spark_multipurpose_call_to_action_button_one',
				'spark_multipurpose_calltoaction_image',
				'spark_multipurpose_calltoaction_section_seperator',
				'spark_multipurpose_calltoaction_top_seperator',
				'spark_multipurpose_calltoaction_bottom_seperator'
			),
			'selector' => "#calltoaction-section",
			'fallback_refresh' => true,
			'container_inclusive' => true,
			'render_callback' => function () {
				return get_template_part( 'section/section-calltoaction' );
			}
		));
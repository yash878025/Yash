<?php
	/**
	 * About Us Section 
	*/
	$wp_customize->add_section(new Spark_Multipurpose_Toggle_Section($wp_customize, 'spark_multipurpose_aboutus_section', array(
		'title'		=>	esc_html__('About Us Section','spark-multipurpose'),
		'panel'		=> 'spark_multipurpose_frontpage_settings',
		'priority'  => spark_multipurpose_get_section_position('spark_multipurpose_aboutus_section'),
		'hiding_control' => 'spark_multipurpose_aboutus_section_disable'
	)));
	
    $wp_customize->add_setting('spark_multipurpose_about_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Tab($wp_customize, 'spark_multipurpose_about_nav', array(
        'type' => 'tab',
        'section' => 'spark_multipurpose_aboutus_section',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'spark-multipurpose'),
                'fields' => array(
					'spark_multipurpose_aboutus_section_disable',
					'spark_multipurpose_aboutus_layout_design',
					'spark_multipurpose_aboutus_super_title',
                    'spark_multipurpose_about',
					'spark_multipurpose_about_image',
					'aboutus-alignment',
					'spark_multipurpose_aboutus_button_text',
                    'spark_multipurpose_progressbar',
					'spark_multipurpose_aboutus_progressbar_heading',
                    'spark_multipurpose_aboutus_progressbar',
                    'spark_multipurpose_aboutus_content_length',
                    'spark_multipurpose_aboutus_profile_name',
					'spark_multipurpose_aboutus_profile_role',
					'spark_multipurpose_aboutus_profile_image',
					'spark_multipurpose_aboutus_signature',
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'spark-multipurpose'),
                'fields' => array(
					'spark_multipurpose_aboutus_cs_heading',
                    'spark_multipurpose_aboutus_super_title_color',
                    'spark_multipurpose_aboutus_title_color',
					'spark_multipurpose_aboutus_text_color',
					'spark_multipurpose_aboutus_link_color',
					'spark_multipurpose_aboutus_link_hover_color',
                ),
            ),
            array(
                'name' => esc_html__('Advanced', 'spark-multipurpose'),
                'fields' => array(
					'spark_multipurpose_aboutus_bg_type',
                    'spark_multipurpose_aboutus_bg_color',
                    'spark_multipurpose_aboutus_bg_gradient',
                    'spark_multipurpose_aboutus_bg_image',
                    'spark_multipurpose_aboutus_bg_video',
                    'spark_multipurpose_aboutus_overlay_color',

                    'spark_multipurpose_aboutus_content_heading',
					'spark_multipurpose_aboutus_content_bg_type',
                    'spark_multipurpose_aboutus_content_bg_color',
                    'spark_multipurpose_aboutus_content_bg_gradient',
					'spark_multipurpose_aboutus_content_padding',
					'spark_multipurpose_aboutus_content_margin',
					'spark_multipurpose_aboutus_content_radius',

                    'spark_multipurpose_aboutus_padding',
					'spark_multipurpose_aboutus_cs_seperator',
                    'spark_multipurpose_aboutus_seperator0',
                    'spark_multipurpose_aboutus_section_seperator',
                    'spark_multipurpose_aboutus_seperator1',
                    'spark_multipurpose_aboutus_top_seperator',
                    'spark_multipurpose_aboutus_ts_color',
                    'spark_multipurpose_aboutus_ts_height',
                    'spark_multipurpose_aboutus_seperator2',
                    'spark_multipurpose_aboutus_bottom_seperator',
                    'spark_multipurpose_aboutus_bs_color',
                    'spark_multipurpose_aboutus_bs_height'
                ),
            ),
        ),
    )));
    	/**
         * Enable/Disable Option
         *
         * @since 1.0.0
        */
        $wp_customize->add_setting('spark_multipurpose_aboutus_section_disable', array(
		    'default' => 'disable',
			'transport' => 'postMessage',
		    'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
		));
		$wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_aboutus_section_disable', array(
		    'label' => esc_html__('Enable', 'spark-multipurpose'),
		    'section' => 'spark_multipurpose_aboutus_section',
		    'switch_label' => array(
		        'enable' => esc_html__('Yes', 'spark-multipurpose'),
		        'disable' => esc_html__('No', 'spark-multipurpose'),
		    ),
        )));

        $wp_customize->add_setting('spark_multipurpose_aboutus_layout_design', array(
            'default' => 'layouttwo',
			'transport' => 'postMessage',
            'sanitize_callback' => 'spark_multipurpose_sanitize_options'
        ));
        $wp_customize->add_control(new Spark_Multipurpose_Selector($wp_customize, 'spark_multipurpose_aboutus_layout_design', array(
            'section' => 'spark_multipurpose_aboutus_section',
            'label' => esc_html__('Layout', 'spark-multipurpose'),
            'options' => array(
                'layoutone' => get_template_directory_uri() . '/inc/customizer/images/cover-image-left.png',
                'layouttwo' => get_template_directory_uri() . '/inc/customizer/images/cover-image-right.png',
                'layoutthree' => get_template_directory_uri() . '/inc/customizer/images/cover-image-center.png',
            )
        )));

		$wp_customize->add_setting( 'spark_multipurpose_aboutus_super_title', array(
			'sanitize_callback' => 'sanitize_text_field', 	 //done	
			'transport' => 'postMessage'
		));

		$wp_customize->add_control('spark_multipurpose_aboutus_super_title', array(
			'label'		=> esc_html__( 'Super Title', 'spark-multipurpose' ),
			'section'	=> 'spark_multipurpose_aboutus_section',
			'type'      => 'text',
		));

		// About Us Page.
		$wp_customize->add_setting( 'spark_multipurpose_about', array(
			'transport' => 'postMessage',
			'sanitize_callback' => 'absint'			//done
		) );
		$wp_customize->add_control( 'spark_multipurpose_about', array(
			'label'    => esc_html__( 'Select Page ', 'spark-multipurpose' ),
			'section'  => 'spark_multipurpose_aboutus_section',
			'type'     => 'dropdown-pages'
		));
		
		// About Us Image.
		$wp_customize->add_setting('spark_multipurpose_about_image', array(
			'transport' => 'postMessage',
			'sanitize_callback'	=> 'esc_url_raw'		//done
		));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'spark_multipurpose_about_image', array(
			'label'	   => esc_html__('Upload About Features Image','spark-multipurpose'),
			'section'  => 'spark_multipurpose_aboutus_section',
		)));

		/** alignment */
        $wp_customize->add_setting(
            'aboutus-alignment',
            array(
                'default'           => 'text-left',
                'sanitize_callback' => 'spark_multipurpose_sanitize_select',
                'transport'         => 'postMessage',
            )
        );
        $wp_customize->add_control(
            new Spark_Multipurpose_Custom_Control_Buttonset(
                $wp_customize,
                'aboutus-alignment',
                array(
                    'choices'  => array(
                        'text-left' => esc_html__('Left', 'spark-multipurpose'),
                        'text-right' => esc_html__('Right', 'spark-multipurpose'),
                        'text-center' => esc_html__('Center', 'spark-multipurpose'),
                    ),
                    'label'    => esc_html__( 'Alignment', 'spark-multipurpose' ),
                    'section'  => 'spark_multipurpose_aboutus_section',
                    'settings' => 'aboutus-alignment',
                )
            )
        );

		// About Us Button Text.
		$wp_customize->add_setting( 'spark_multipurpose_aboutus_button_text', array(
			'default'           => esc_html__( 'More About Us','spark-multipurpose' ),
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field'			//done
		) );
		$wp_customize->add_control( 'spark_multipurpose_aboutus_button_text', array(
			'label'    => esc_html__( 'Button Text', 'spark-multipurpose' ),
			'section'  => 'spark_multipurpose_aboutus_section',
			'type'     => 'text',
		));

		$wp_customize->add_setting('spark_multipurpose_aboutus_progressbar_heading', array(
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'spark_multipurpose_aboutus_progressbar_heading', array(
			'section' => 'spark_multipurpose_aboutus_section',
			'label' => esc_html__('Achivement Awards', 'spark-multipurpose')
		)));

		$wp_customize->add_setting('spark_multipurpose_aboutus_progressbar', array(
		    'default' => 'enable',
			'transport' => 'postMessage',
		    'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
		));
		$wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_aboutus_progressbar', array(
		    'label' => esc_html__('Achivement Items', 'spark-multipurpose'),
		    'section' => 'spark_multipurpose_aboutus_section',
		    'switch_label' => array(
		        'enable' => esc_html__('Show', 'spark-multipurpose'),
		        'disable' => esc_html__('Hide', 'spark-multipurpose'),
		    ),
        )));

		// About Us Progress Bar.
		$wp_customize->add_setting('spark_multipurpose_progressbar', array(
		    'sanitize_callback' => 'spark_multipurpose_sanitize_repeater',		//done
			'transport' => 'postMessage',
		    'default' => json_encode(array(
		        array(
					'icon' => '',
		            'progressbar_title'  =>'',
		            'progressbar_number'  =>''          
		        )
		    ))
		));

		$wp_customize->add_control(new Spark_Multipurpose_Repeater_Control($wp_customize, 'spark_multipurpose_progressbar', 
			array(
			    'label' 	   => esc_html__('Counter Settings', 'spark-multipurpose'),
			    'section' 	   => 'spark_multipurpose_aboutus_section',
			    'settings' 	   => 'spark_multipurpose_progressbar',
			    'box_label' => esc_html__('Counter Setting', 'spark-multipurpose'),
			    'add_label' => esc_html__('Add New', 'spark-multipurpose'),
			    'active_callback' => 'spark_multipurpose_active_progressbar'
			),
		    array(
				'icon' => array(
		            'type' => 'icon',
		            'label' => esc_html__('Icon', 'spark-multipurpose'),
		            'default' => ''
		        ),
		        'progressbar_title' => array(
		            'type' => 'text',
		            'label' => esc_html__('Title', 'spark-multipurpose'),
		            'default' => ''
		        ),
		        'progressbar_number' => array(
		            'type' => 'text',
		            'label' => esc_html__('Number', 'spark-multipurpose'),
		            'default' => ''
		        )
			)
		));
        

		$wp_customize->add_setting( 'spark_multipurpose_aboutus_profile_image', array(
			'sanitize_callback' => 'sanitize_text_field', 	 //done	
			'transport' => 'postMessage'
		));

		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'spark_multipurpose_aboutus_profile_image', array(
			'label'	   => esc_html__('Profile Image','spark-multipurpose'),
			'section'  => 'spark_multipurpose_aboutus_section',
		)));

		$wp_customize->add_setting( 'spark_multipurpose_aboutus_profile_name', array(
			'sanitize_callback' => 'sanitize_text_field', 	 //done	
			'transport' => 'postMessage'
		));

		$wp_customize->add_control('spark_multipurpose_aboutus_profile_name', array(
			'label'		=> esc_html__( 'Profile Name', 'spark-multipurpose' ),
			'section'	=> 'spark_multipurpose_aboutus_section',
			'type'      => 'text',
			'priority' => 10
		));
		
		$wp_customize->add_setting( 'spark_multipurpose_aboutus_profile_role', array(
			'sanitize_callback' => 'sanitize_text_field', 	 //done	
			'transport' => 'postMessage'
		));

		$wp_customize->add_control('spark_multipurpose_aboutus_profile_role', array(
			'label'		=> esc_html__( 'Designadtion', 'spark-multipurpose' ),
			'section'	=> 'spark_multipurpose_aboutus_section',
			'type'      => 'text',
			'priority' => 10
		));
		$wp_customize->add_setting('spark_multipurpose_aboutus_signature', array(
			'transport' => 'postMessage',
			'priority' => 10,
			'sanitize_callback'	=> 'esc_url_raw'		//done
		));

		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'spark_multipurpose_aboutus_signature', array(
			'label'	   => esc_html__('Signature Image','spark-multipurpose'),
			'section'  => 'spark_multipurpose_aboutus_section',
		)));

		$wp_customize->selective_refresh->add_partial( "spark_multipurpose_aboutus_settings", array (
			'settings' => array( 
				'spark_multipurpose_aboutus_section_disable',
				'spark_multipurpose_about',
				'spark_multipurpose_aboutus_super_title',
				'spark_multipurpose_aboutus_super_title_color',
				'spark_multipurpose_progressbar',
				'spark_multipurpose_aboutus_progressbar',
				'spark_multipurpose_aboutus_profile_image',
				'spark_multipurpose_aboutus_profile_name',
				'spark_multipurpose_aboutus_profile_role',
				'spark_multipurpose_aboutus_signature',
				'spark_multipurpose_aboutus_section_seperator',
				'spark_multipurpose_aboutus_top_seperator',
				'spark_multipurpose_aboutus_bottom_seperator'
			),
			'selector' => "#aboutus-section",
			'fallback_refresh' => true,
			'container_inclusive' => true,
			'render_callback' => function () {
				return get_template_part( 'section/section-aboutus' );
			}
		));

		$wp_customize->add_setting('spark_multipurpose_aboutus_upgrade_text', array(
			'sanitize_callback' => 'sanitize_text_field'
		));

		$wp_customize->add_control(new Spark_Multipurpose_Upgrade_Text($wp_customize, 'spark_multipurpose_aboutus_upgrade_text', array(
			'section' => 'spark_multipurpose_aboutus_section',
			'label' => esc_html__('For more settings,', 'spark-multipurpose'),
			'choices' => array(
				esc_html__('Advance Input Option', 'spark-multipurpose'),
				esc_html__('Multiple Layout', 'spark-multipurpose'),
				esc_html__('And more...', 'spark-multipurpose'),
			),
			'priority' => 400
		)));
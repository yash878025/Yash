<?php
	/**
	 * Video Call To Action Section
	*/
	$wp_customize->add_section(new Spark_Multipurpose_Toggle_Section($wp_customize, 'spark_multipurpose_video_calltoaction_section', array(
		'title'		=> 	esc_html__('Video Call To Action','spark-multipurpose'),
		'panel'		=> 'spark_multipurpose_frontpage_settings',
		'priority'  => spark_multipurpose_get_section_position('spark_multipurpose_video_calltoaction_section'),
		'hiding_control' => 'spark_multipurpose_video_calltoaction_section_disable'
	)));
    $wp_customize->add_setting('spark_multipurpose_video_calltoaction_section_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Tab($wp_customize, 'spark_multipurpose_video_calltoaction_section_nav', array(
        'type' => 'tab',
        'section' => 'spark_multipurpose_video_calltoaction_section',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'spark-multipurpose'),
                'fields' => array(
					'spark_multipurpose_video_calltoaction_section_disable',
                    'spark_multipurpose_video_button_url',
                    'spark_multipurpose_appointment_title',
                    'spark_multipurpose_appointment_subtitle',
					'spark_multipurpose_appointment_shortcode',
                    'spark_multipurpose_video_calltoaction_alignment',
					'spark_multipurpose_video_calltoaction_video_bg',
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'spark-multipurpose'),
                'fields' => array(
					'spark_multipurpose_video_calltoaction_cs_heading',
                    'spark_multipurpose_video_calltoaction_title_color',
                    'spark_multipurpose_video_calltoaction_text_color',
					'spark_multipurpose_video_calltoaction_link_color',
					'spark_multipurpose_video_calltoaction_link_hover_color',
                ),
            ),
            array(
                'name' => esc_html__('Advanced', 'spark-multipurpose'),
                'fields' => array(
					'spark_multipurpose_video_calltoaction_bg_type',
                    'spark_multipurpose_video_calltoaction_bg_color',
                    'spark_multipurpose_video_calltoaction_bg_gradient',
                    'spark_multipurpose_video_calltoaction_bg_image',
                    'spark_multipurpose_video_calltoaction_bg_video',
                    'spark_multipurpose_video_calltoaction_overlay_color',

					'spark_multipurpose_video_calltoaction_padding',
					'spark_multipurpose_video_calltoaction_cs_seperator',
					'spark_multipurpose_video_calltoaction_content_heading',
					'spark_multipurpose_video_calltoaction_content_bg_type',
                    'spark_multipurpose_video_calltoaction_content_bg_color',
                    'spark_multipurpose_video_calltoaction_content_bg_gradient',
					'spark_multipurpose_video_calltoaction_content_padding',
					'spark_multipurpose_video_calltoaction_content_margin',
					'spark_multipurpose_video_calltoaction_content_radius',
                    'spark_multipurpose_video_calltoaction_seperator0',
					'spark_multipurpose_video_calltoaction_section_seperator',
					'spark_multipurpose_video_calltoaction_seperator1',
					'spark_multipurpose_video_calltoaction_top_seperator',
					'spark_multipurpose_video_calltoaction_ts_color',
					'spark_multipurpose_video_calltoaction_ts_height',
					'spark_multipurpose_video_calltoaction_seperator2',
					'spark_multipurpose_video_calltoaction_bottom_seperator',
					'spark_multipurpose_video_calltoaction_bs_color',
					'spark_multipurpose_video_calltoaction_bs_height'
                ),
            ),
			array(
				'name' => esc_html__('Hidden', 'spark-multipurpose'),
				'class' => 'customizer-hidden',
				'fields' => array(
					'spark_multipurpose_video_calltoaction_super_title_color'
				),
			),
        ),
    )));
		/**
         * Enable/Disable Option
         *
         * @since 1.0.0
        */
        $wp_customize->add_setting('spark_multipurpose_video_calltoaction_section_disable', array(
		    'default' => 'disable',
			'transport' => 'postMessage',
		    'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
		));
		$wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_video_calltoaction_section_disable', array(
		    'label' => esc_html__('Enable', 'spark-multipurpose'),
		    'section' => 'spark_multipurpose_video_calltoaction_section',
		    'switch_label' => array(
		        'enable' => esc_html__('Yes', 'spark-multipurpose'),
		        'disable' => esc_html__('No', 'spark-multipurpose'),
		    ),
		)));
		// Call To Action Video Button URL.
		$wp_customize->add_setting('spark_multipurpose_video_button_url', array(
			'transport' => 'postMessage',
			'sanitize_callback'	=> 'esc_url_raw'		//done
		));
		$wp_customize->add_control('spark_multipurpose_video_button_url', array(
			'label'	   => esc_html__('Youtube Video URL','spark-multipurpose'),
			'section'  => 'spark_multipurpose_video_calltoaction_section',
			'type'	   => 'url'
		));
		
		// Video Call To Action Title.
		$wp_customize->add_setting('spark_multipurpose_appointment_title', array(
			'transport' => 'postMessage',
			'sanitize_callback'	=> 'sanitize_text_field'		//done
		));
		$wp_customize->add_control( 'spark_multipurpose_appointment_title', array(
			'label'	   => esc_html__('Section Title','spark-multipurpose'),
			'section'  => 'spark_multipurpose_video_calltoaction_section',
			'type'	   => 'text',
		));
		
		// Video Call To Action Subtitle.
		$wp_customize->add_setting('spark_multipurpose_appointment_subtitle', array(
			'transport' => 'postMessage',
			'sanitize_callback'	=> 'sanitize_text_field'		//done
		));
		$wp_customize->add_control('spark_multipurpose_appointment_subtitle', array(
			'label'	   => esc_html__('Section Subtitle','spark-multipurpose'),
			'section'  => 'spark_multipurpose_video_calltoaction_section',
			'type'	   => 'text',
		));

		/** alignment */
        $wp_customize->add_setting('spark_multipurpose_video_calltoaction_alignment',
            array(
                'default'           => 'text-center',
                'sanitize_callback' => 'spark_multipurpose_sanitize_select',
                'transport'         => 'postMessage',
            )
        );
        $wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Buttonset( $wp_customize, 'spark_multipurpose_video_calltoaction_alignment',
			array(
				'choices'  => array(
					'text-left' => esc_html__('Left', 'spark-multipurpose'),
					'text-right' => esc_html__('Right', 'spark-multipurpose'),
					'text-center' => esc_html__('Center', 'spark-multipurpose'),
				),
				'label'    => esc_html__( 'Alignment', 'spark-multipurpose' ),
				'section'  => 'spark_multipurpose_video_calltoaction_section',
				'settings' => 'spark_multipurpose_video_calltoaction_alignment',
			)
		));

		// Video Call To Action Subtitle.
		$wp_customize->add_setting('spark_multipurpose_appointment_shortcode', array(
			'transport' => 'postMessage',
			'sanitize_callback'	=> 'sanitize_text_field'		//done
		));
		$wp_customize->add_control('spark_multipurpose_appointment_shortcode', array(
			'label'	   => esc_html__('Shortcode','spark-multipurpose'),
			'description' => sprintf(esc_html__('Install %s plugin to get the shortcode or you can use any shortcode', 'spark-multipurpose'), '<a target="_blank" href="https://wordpress.org/plugins/contact-form-7/">Contact Form 7</a>'),
			'section'  => 'spark_multipurpose_video_calltoaction_section',
			'type'	   => 'text',
		));


		$wp_customize->add_setting( 'spark_multipurpose_video_calltoaction_video_bg', array(
			'sanitize_callback' => 'sanitize_text_field', 	 //done	
			'transport' => 'postMessage'
		));

		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'spark_multipurpose_video_calltoaction_video_bg', array(
			'label'	   => esc_html__('Video Background','spark-multipurpose'),
			'section'  => 'spark_multipurpose_video_calltoaction_section',
		)));
		

		$wp_customize->selective_refresh->add_partial( "spark_multipurpose_video_cta_refresh", array (
			'settings' => array(
				'spark_multipurpose_video_calltoaction_section_disable',
				'spark_multipurpose_video_button_url',
				'spark_multipurpose_video_calltoaction_video_bg',
				'spark_multipurpose_appointment_shortcode',
				'spark_multipurpose_video_calltoaction_section_seperator',
				'spark_multipurpose_video_calltoaction_top_seperator',
				'spark_multipurpose_video_calltoaction_bottom_seperator',
			),
			'selector' => "#video_calltoaction-section",
			'fallback_refresh' => true,
			'container_inclusive' => true,
			'render_callback' => function () {
				return get_template_part( 'section/section-video_calltoaction' );
			}
		));
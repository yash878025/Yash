<?php
    /**
	 * Portfolio Work Section. 
	*/
	$wp_customize->add_section(new Spark_Multipurpose_Toggle_Section($wp_customize, 'spark_multipurpose_recentwork_section', array(
		'title'		=> 	esc_html__('Portfolio(Gallery)','spark-multipurpose'),
		'panel'		=> 'spark_multipurpose_frontpage_settings',
		'priority'  => spark_multipurpose_get_section_position('spark_multipurpose_recentwork_section'),
		'hiding_control' => 'spark_multipurpose_recentwork_section_disable'
	)));
		/**
         * Enable/Disable Option
         *
         * @since 1.0.0
        */
        $wp_customize->add_setting('spark_multipurpose_recentwork_section_disable', array(
		    'default' => 'disable',
			'transport' => 'postMessage',
		    'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
		));
		$wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_recentwork_section_disable', array(
		    'label' => esc_html__('Enable', 'spark-multipurpose'),
		    'section' => 'spark_multipurpose_recentwork_section',
		    'switch_label' => array(
		        'enable' => esc_html__('Yes', 'spark-multipurpose'),
		        'disable' => esc_html__('No', 'spark-multipurpose'),
		    ),
		)));
		$wp_customize->add_setting('spark_multipurpose_recentwork_nav', array(
			'transport' => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		));
		$wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Tab($wp_customize, 'spark_multipurpose_recentwork_nav', array(
			'type' => 'tab',
			'section' => 'spark_multipurpose_recentwork_section',
			'priority' => 1,
			'buttons' => array(
				array(
					'name' => esc_html__('Content', 'spark-multipurpose'),
					'fields' => array(
						'spark_multipurpose_recentwork_section_disable',
						'spark_multipurpose_recentwork_title_align',
						'spark_multipurpose_gallery_subtitle',
						'spark_multipurpose_gallery_title',
						'spark_multipurpose_image_gallery',
						'spark_multipurpose_recentwork_layout_heading',
						'spark_multipurpose_recentwork_layout',
						'spark_multipurpose_recentwork_heading',
					),
					'active' => true,
				),
				array(
					'name' => esc_html__('Style', 'spark-multipurpose'),
					'fields' => array(
						'spark_multipurpose_recentwork_cs_heading',
						'spark_multipurpose_recentwork_super_title_color',
						'spark_multipurpose_recentwork_title_color',
						'spark_multipurpose_recentwork_text_color',
						'spark_multipurpose_recentwork_link_color',
						'spark_multipurpose_recentwork_link_hover_color'
					),
				),
				array(
					'name' => esc_html__('Advanced', 'spark-multipurpose'),
					'fields' => array(
						'spark_multipurpose_recentwork_bg_type',
						'spark_multipurpose_recentwork_bg_color',
						'spark_multipurpose_recentwork_bg_gradient',
						'spark_multipurpose_recentwork_bg_image',
						'spark_multipurpose_recentwork_bg_video',
						'spark_multipurpose_recentwork_overlay_color',
						'spark_multipurpose_recentwork_cs_seperator',
						'spark_multipurpose_recentwork_padding',
						'spark_multipurpose_recentwork_content_heading',
						'spark_multipurpose_recentwork_content_bg_type',
						'spark_multipurpose_recentwork_content_bg_color',
						'spark_multipurpose_recentwork_content_bg_gradient',
						'spark_multipurpose_recentwork_content_padding',
						'spark_multipurpose_recentwork_content_margin',
						'spark_multipurpose_recentwork_content_radius',
						'spark_multipurpose_recentwork_seperator0',
						'spark_multipurpose_recentwork_section_seperator',
						'spark_multipurpose_recentwork_seperator1',
						'spark_multipurpose_recentwork_top_seperator',
						'spark_multipurpose_recentwork_ts_color',
						'spark_multipurpose_recentwork_ts_height',
						'spark_multipurpose_recentwork_seperator2',
						'spark_multipurpose_recentwork_bottom_seperator',
						'spark_multipurpose_recentwork_bs_color',
						'spark_multipurpose_recentwork_bs_height'
					),
				),
			),
		)));

		$wp_customize->add_setting('spark_multipurpose_recentwork_heading', array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'postMessage',
		));
		$wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'spark_multipurpose_recentwork_heading', array(
			'section' => 'spark_multipurpose_recentwork_section',
			'label' => esc_html__('Section Title & Sub Title', 'spark-multipurpose')
		)));
		
		// Portfolio Work Section Title.
		$wp_customize->add_setting( 'spark_multipurpose_gallery_subtitle', array(
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field', 	 //done	
		));
		$wp_customize->add_control('spark_multipurpose_gallery_subtitle', array(
			'label'		=> esc_html__( 'Super Title', 'spark-multipurpose' ),
			'section'	=> 'spark_multipurpose_recentwork_section',
			'type'      => 'text'
		));

		// Portfolio Work Section Title.
		$wp_customize->add_setting( 'spark_multipurpose_gallery_title', array(
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field', 	 //done	
		));
		$wp_customize->add_control('spark_multipurpose_gallery_title', array(
			'label'		=> esc_html__( 'Title', 'spark-multipurpose' ),
			'section'	=> 'spark_multipurpose_recentwork_section',
			'type'      => 'text'
		));
		
		$wp_customize->add_setting('spark_multipurpose_recentwork_title_align', array(
			'default' => 'text-center',
			'sanitize_callback' => 'spark_multipurpose_sanitize_select',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control(
			new Spark_Multipurpose_Custom_Control_Buttonset(
				$wp_customize,
				'spark_multipurpose_recentwork_title_align',
				array(
					'choices'  => array(
						'text-left' => esc_html__('Left', 'spark-multipurpose'),
						'text-right' => esc_html__('Right', 'spark-multipurpose'),
						'text-center' => esc_html__('Center', 'spark-multipurpose'),
					),
					'label'    => esc_html__( 'Alignment', 'spark-multipurpose' ),
					'section'  => 'spark_multipurpose_recentwork_section',
					'settings' => 'spark_multipurpose_recentwork_title_align',
				)
			)
		);
		

		$wp_customize->add_setting('spark_multipurpose_image_gallery', array(
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',         //done
		));
		$wp_customize->add_control(new Spark_Multipurpose_Gallery_Control($wp_customize, 'spark_multipurpose_image_gallery', array(
			'label' => esc_html__('Upload Gallery Images', 'spark-multipurpose'),
			'settings' => 'spark_multipurpose_image_gallery',
			'section' => 'spark_multipurpose_recentwork_section',
		)));

		$wp_customize->add_setting("spark_multipurpose_recentwork_layout_heading", array(
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, "spark_multipurpose_recentwork_layout_heading", array(
			'section' => "spark_multipurpose_recentwork_section",
			'label' => esc_html__('Portfolio(Gallery) Layout', 'spark-multipurpose'),
		)));
		
		$wp_customize->add_setting('spark_multipurpose_recentwork_layout', array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'postMessage',
			'default' => 'layout-two'
		));
		$wp_customize->add_control(new Spark_Multipurpose_Selector($wp_customize, 'spark_multipurpose_recentwork_layout', array(
            'section' => 'spark_multipurpose_recentwork_section',
            //'label' => esc_html__('Layout', 'spark-multipurpose'),
            'options' => array(
                'layout-one' => get_template_directory_uri() . '/inc/customizer/images/gallery-slider.png',
                'layout-two' => get_template_directory_uri() . '/inc/customizer/images/gallery-grid.png',
            )
        )));

		
		$wp_customize->selective_refresh->add_partial( "spark_multipurpose_recentwork_section_disable_refresh", array (
			'settings' => array( 
				'spark_multipurpose_recentwork_section_disable',
				'spark_multipurpose_gallery_subtitle',
				'spark_multipurpose_gallery_title',
				'spark_multipurpose_image_gallery',
				'spark_multipurpose_recentwork_layout',
				'spark_multipurpose_recentwork_section_seperator',
				'spark_multipurpose_recentwork_top_seperator',
				'spark_multipurpose_recentwork_bottom_seperator'		
			),
			'selector' => "#recentwork-section",
			'fallback_refresh' => true,
			'container_inclusive' => true,
			'render_callback' => function () {
				return get_template_part( 'section/section-recentwork' );
			}
		));

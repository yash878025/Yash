<?php
    /**
	 * Top Header 
	*/
    $wp_customize->add_section(new Spark_Multipurpose_Toggle_Section($wp_customize, 'spark_multipurpose_top_header', array(
        'title' =>	esc_html__('Top Header Settings','spark-multipurpose'),
        'panel' => 'spark_multipurpose_header_settings',
        'hiding_control' => 'spark_multipurpose_top_header_enable'
    )));
    $wp_customize->add_setting('spark_multipurpose_top_header_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Tab($wp_customize, 'spark_multipurpose_top_header_nav', array(
        'type' => 'tab',
        'section' => 'spark_multipurpose_top_header',
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_top_header_enable',
                    'spark_multipurpose_top_header_hide_show',
                    'spark_multipurpose_topheader_left',
                    'spark_multipurpose_topheader_right',
                    'spark_multipurpose_topheader_heading',
                    'spark_multipurpose_topheader_social_link',
                    'spark_multipurpose_topheader_quick_link',
                    'spark_multipurpose_topheader_free_hand'
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_th_bg_color',
                    'spark_multipurpose_th_text_color',
                    'spark_multipurpose_th_anchor_color',
                ),
            ),
            array(
                'name' => esc_html__("Advance", 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_th_content_heading',
                    'spark_multipurpose_th_content_padding',
                    'spark_multipurpose_th_content_margin',
                    'spark_multipurpose_th_content_radius',
                )
            )
        ),
    )));

    /*****
     * Top Header Setting
    */
    $wp_customize->add_setting('spark_multipurpose_top_header_enable', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'enable',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_top_header_enable', array(
        'section' => 'spark_multipurpose_top_header',
        'label' => esc_html__('Enable Top Header', 'spark-multipurpose'),
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-multipurpose'),
            'disable' => esc_html__('No', 'spark-multipurpose')
        )
    )));

    // hide show 
    $wp_customize->add_setting( 'spark_multipurpose_top_header_hide_show',
        array(
            'default' => json_encode(array(
                'desktop' => 'show',
                'tablet' => 'hide',
                'mobile' => 'hide'
            )),
            'sanitize_callback' => 'spark_multipurpose_sanitize_field_responsive_buttonset',
            'transport'         => 'postMessage',
        )
    );
    $wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Responsive_Buttonset( $wp_customize, 'spark_multipurpose_top_header_hide_show',
            array(
                'choices'  => array(
                    'show' => esc_html__( 'Show', 'spark-multipurpose' ),
                    'hide' => esc_html__( 'Hide', 'spark-multipurpose' ),
                ),
                'label'    => esc_html__( 'Hide/Show', 'spark-multipurpose' ),
                'section' => 'spark_multipurpose_top_header',
            )
        )
    );



	$topheader_options = array(
        'none' => esc_html__('None', 'spark-multipurpose'),
        'quick_contact' => esc_html__('Quick Contact Information', 'spark-multipurpose'),
        'social_media'  => esc_html__('Social Media Links', 'spark-multipurpose'),
        'top_menu'  => esc_html__('Top Menu Nav', 'spark-multipurpose'),
        'free_hand'  => esc_html__('Free Hand', 'spark-multipurpose'),
    );
		// Top Header Left Side Options.
		$wp_customize->add_setting('spark_multipurpose_topheader_left', array(
		    'default' => 'free_hand',
            'transport' => 'postMessage',
		    'sanitize_callback' => 'spark_multipurpose_sanitize_select'        //done
		));
		$wp_customize->add_control('spark_multipurpose_topheader_left', array(
		    'label' => esc_html__('Top Header Left Side', 'spark-multipurpose'),
		    'section' => 'spark_multipurpose_top_header',
		    'type' => 'select',
		    'choices' => $topheader_options
		));

		// Top Header Right Side Options.
		$wp_customize->add_setting('spark_multipurpose_topheader_right', array(
		    'default' => 'social_media',
            'transport' => 'postMessage',
		    'sanitize_callback' => 'spark_multipurpose_sanitize_select'        //done
		));
		$wp_customize->add_control('spark_multipurpose_topheader_right', array(
		    'label' => esc_html__('Top Header Right Side', 'spark-multipurpose'),
		    'section' => 'spark_multipurpose_top_header',
		    'type' => 'select',
		    'choices' => $topheader_options
		));
        
        
        $wp_customize->selective_refresh->add_partial( 'spark_multipurpose_topheader_right', array (
            'settings' => array( 
                'spark_multipurpose_topheader_right',
                'spark_multipurpose_topheader_left',
                'spark_multipurpose_topheader_free_hand',
            ),
            'selector' => '#masthead',
            'fallback_refresh' => true,
            'render_callback' => function () {
                $layout = get_theme_mod('spark_multipurpose_header_layout','layout_one');
                return get_template_part('header/header', str_replace("layout_","", $layout));
            }
        ));

		$wp_customize->add_setting('spark_multipurpose_topheader_heading', array(
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'spark_multipurpose_topheader_heading', array(
			'section' => 'spark_multipurpose_top_header',
			'label' => esc_html__('Links', 'spark-multipurpose')
		)));
		$wp_customize->add_setting('spark_multipurpose_topheader_social_link', array(
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control(new Spark_Multipurpose_Info_Text($wp_customize, 'spark_multipurpose_topheader_social_link', array(
			'label' => esc_html__('Social Icons', 'spark-multipurpose'),
			'section' => 'spark_multipurpose_top_header',
			'description' => sprintf(esc_html__('Add your %s here', 'spark-multipurpose'), '<a href="#" target="_blank">Social Icons</a>')
		)));
        
		$wp_customize->add_setting('spark_multipurpose_topheader_quick_link', array(
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control(new Spark_Multipurpose_Info_Text($wp_customize, 'spark_multipurpose_topheader_quick_link', array(
			'label' => esc_html__('Quick Info', 'spark-multipurpose'),
			'section' => 'spark_multipurpose_top_header',
			'description' => sprintf(esc_html__('Add your %s here', 'spark-multipurpose'), '<a href="#" target="_blank">Quick Info</a>')
		)));

        $wp_customize->add_setting('spark_multipurpose_topheader_free_hand', array(
			'sanitize_callback' => 'spark_multipurpose_sanitize_text',
			'default' => esc_html__('Need Any Help: +1-559-236-8009 or help@example.com', 'spark-multipurpose'),
			'transport' => 'postMessage'
		));
        $wp_customize->add_control('spark_multipurpose_topheader_free_hand', array(
		    'label' => esc_html__('Free hand', 'spark-multipurpose'),
		    'section' => 'spark_multipurpose_top_header',
		    'type' => 'textarea'
		));

        /*******
         *  Top Header Style 
        */
        $wp_customize->add_setting('spark_multipurpose_th_bg_color', array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'spark_multipurpose_sanitize_color_alpha',
        ));
        $wp_customize->add_control(new Spark_Multipurpose_Alpha_Color_Control($wp_customize, 'spark_multipurpose_th_bg_color', array(
            'label' => esc_html__('Background', 'spark-multipurpose'),
            'section' => 'spark_multipurpose_top_header',
            'palette' => array(
                '#FFFFFF',
                '#000000',
                '#f5245f',
                '#1267b3',
                '#feb600',
                '#00C569',
                'rgba( 255, 255, 255, 0.2 )',
                'rgba( 0, 0, 0, 0.2 )'
            )
        )));
        $wp_customize->add_setting('spark_multipurpose_th_text_color', array(
            'default' => '#FFFFFF',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'spark_multipurpose_th_text_color', array(
            'section' => 'spark_multipurpose_top_header',
            'label' => esc_html__('Color', 'spark-multipurpose')
        )));
        $wp_customize->add_setting('spark_multipurpose_th_anchor_color', array(
            'default' => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'spark_multipurpose_th_anchor_color', array(
            'section' => 'spark_multipurpose_top_header',
            'label' => esc_html__('Anchor(Link)', 'spark-multipurpose')
        )));
        
        /********
         *  Container Settings 
        */
        $wp_customize->add_setting("spark_multipurpose_th_content_heading", array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, "spark_multipurpose_th_content_heading", array(
            'section' => "spark_multipurpose_top_header",
            'label' => esc_html__('Content Area', 'spark-multipurpose'),
            'priority' => 152
        )));

        $wp_customize->add_setting(
            "spark_multipurpose_th_content_padding",
            array(
                'transport' => 'postMessage',
                'sanitize_callback' => 'spark_multipurpose_sanitize_field_default_css_box'
            )
        );
        $wp_customize->add_control(
            new Spark_Multipurpose_Custom_Control_Cssbox(
                $wp_customize,
                "spark_multipurpose_th_content_padding",
                array(
                    'label'    => esc_html__( 'Padding (px)', 'spark-multipurpose' ),
                    'section' => "spark_multipurpose_top_header",
                    'settings' => "spark_multipurpose_th_content_padding",
                    'priority' => 152
                ),
                array(),
                array()
            )
        );

        $wp_customize->add_setting(
            "spark_multipurpose_th_content_margin",
            array(
                'transport' => 'postMessage',
                'sanitize_callback' => 'spark_multipurpose_sanitize_field_default_css_box'
            )
        );
        $wp_customize->add_control(
            new Spark_Multipurpose_Custom_Control_Cssbox(
                $wp_customize,
                "spark_multipurpose_th_content_margin",
                array(
                    'label'    => esc_html__( 'Margin (px)', 'spark-multipurpose' ),
                    'section' => "spark_multipurpose_top_header",
                    'settings' => "spark_multipurpose_th_content_margin",
                    'priority' => 152
                ),
                array(),
                array()
            )
        );

        $wp_customize->add_setting(
            "spark_multipurpose_th_content_radius",
            array(
                'transport' => 'postMessage',
                'sanitize_callback' => 'spark_multipurpose_sanitize_field_default_css_box'
            )
        );
        $wp_customize->add_control(
            new Spark_Multipurpose_Custom_Control_Cssbox(
                $wp_customize,
                "spark_multipurpose_th_content_radius",
                array(
                    'label'    => esc_html__( 'Radius(px)', 'spark-multipurpose' ),
                    'section' => "spark_multipurpose_top_header",
                    'settings' => "spark_multipurpose_th_content_radius",
                    'priority' => 152
                ),
                array(),
                array()
            )
        );
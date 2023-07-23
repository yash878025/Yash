<?php
    $wp_customize->remove_control('header_image');
    /**
	 * Header Layout Settings
	*/
	$wp_customize->add_section('spark_multipurpose_header', array(
		'title'		=>	esc_html__('Header Settings','spark-multipurpose'),
		'panel'		=> 'spark_multipurpose_header_settings',
	));
    $wp_customize->add_setting('spark_multipurpose_header_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
        'priority' => -1,
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Tab($wp_customize, 'spark_multipurpose_header_nav', array(
        'type' => 'tab',
        'section' => 'spark_multipurpose_header',
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_header_layout',
                    'spark_multipurpose_menu_sticky',
                    'spark_multipurpose_menu_absolute',
                    'spark_multipurpose_search_layout',
                    'spark_multipurpose_menu_sidebar',
                    'spark_multipurpose_enable_search',
                    
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_header_bg_heading',
                    'spark_multipurpose_hamburger_color',
                    'spark_multipurpose_header_bg_type',
                    'spark_multipurpose_header_bg_color',
                    'spark_multipurpose_header_bg_gradient',
                    'spark_multipurpose_header_background_image',
                    'spark_multipurpose_header_bg_image',
                    'spark_multipurpose_header_margin_padding',
                ),
            ),
            array(
                'name' => esc_html__('Menu Style', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_menu',
                    'spark_multipurpose_header_nav_color_heading',
                    'spark_multipurpose_header_nav_wrap_bg_color',
                    'spark_multipurpose_header_nav_container_bg_color',
                    'spark_multipurpose_header_nav_hover_group',
                    'spark_multipurpose_header_item_group',
                    'spark_multipurpose_header_sub_item_group',
                    'spark_multipurpose_header_container_nav_radius',
                    'spark_multipurpose_header_nav_item_radius'
                )
            )
        ),
    )));
		//  Header Left Side Options.
		$wp_customize->add_setting('spark_multipurpose_header_layout', array(
		    'default' => 'layout_two',
            'transport' => 'postMessage',
		    'sanitize_callback' => 'spark_multipurpose_sanitize_select'        //done
		));
		$wp_customize->add_control('spark_multipurpose_header_layout', array(
		    'label' => esc_html__('Header Layout', 'spark-multipurpose'),
		    'section' => 'spark_multipurpose_header',
		    'type' => 'select',
		    'choices' => array(
		    	'layout_one' => esc_html__('Layout One' , 'spark-multipurpose'),
				'layout_two' => esc_html__('Layout Two' ,'spark-multipurpose'),
		    )
		));
        $wp_customize->add_setting('spark_multipurpose_enable_search', array(
		    'default' => 'enable',
			'transport' => 'postMessage',
		    'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
		));
		$wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_enable_search', array(
		    'label' => esc_html__('Enable Search', 'spark-multipurpose'),
		    'section' => 'spark_multipurpose_header',
		    'switch_label' => array(
		        'enable' => esc_html__('Yes', 'spark-multipurpose'),
		        'disable' => esc_html__('No', 'spark-multipurpose'),
		    ),
		)));

        $wp_customize->add_setting('spark_multipurpose_search_layout', array(
		    'default' => 'layout_one',
			'transport' => 'postMessage',
		    'sanitize_callback' => 'spark_multipurpose_sanitize_select'        //done
		));

		$wp_customize->add_control('spark_multipurpose_search_layout', array(
		    'label' => esc_html__('Search Layout', 'spark-multipurpose'),
		    'section' => 'spark_multipurpose_header',
		    'type' => 'select',
		    'choices' => array(
		    	'layout_one' => esc_html__('Layout One' , 'spark-multipurpose'),
		    	'layout_two' => esc_html__('Layout Two' ,'spark-multipurpose'),
		    )
		));

        $wp_customize->add_setting('spark_multipurpose_menu_sidebar', array(
		    'default' => 'disable',
			'transport' => 'postMessage',
		    'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
		));
		$wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_menu_sidebar', array(
		    'label' => esc_html__('Sidebar', 'spark-multipurpose'),
		    'section' => 'spark_multipurpose_header',
		    'switch_label' => array(
		        'enable' => esc_html__('Yes', 'spark-multipurpose'),
		        'disable' => esc_html__('No', 'spark-multipurpose'),
		    ),
		)));

        $wp_customize->add_setting('spark_multipurpose_menu_sticky', array(
		    'default' => 'disable',
			'transport' => 'postMessage',
		    'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
		));
		$wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_menu_sticky', array(
		    'label' => esc_html__('Sticky Menu', 'spark-multipurpose'),
		    'section' => 'spark_multipurpose_header',
		    'switch_label' => array(
		        'enable' => esc_html__('Yes', 'spark-multipurpose'),
		        'disable' => esc_html__('No', 'spark-multipurpose'),
		    ),
		)));

        $wp_customize->add_setting('spark_multipurpose_menu_absolute', array(
		    'default' => 'disable',
			'transport' => 'postMessage',
		    'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
		));

		$wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_menu_absolute', array(
		    'label' => esc_html__('Over Nav', 'spark-multipurpose'),
		    'section' => 'spark_multipurpose_header',
		    'switch_label' => array(
		        'enable' => esc_html__('Yes', 'spark-multipurpose'),
		        'disable' => esc_html__('No', 'spark-multipurpose'),
		    ),
		)));

         //heading
        $wp_customize->add_setting('spark_multipurpose_header_bg_heading', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'spark_multipurpose_header_bg_heading', array(
            'section' => 'spark_multipurpose_header',
            'label' => esc_html__('Header Background', 'spark-multipurpose')
        )));

        $wp_customize->add_setting("spark_multipurpose_hamburger_color", array(
            'default' => '#ffc107',
            'sanitize_callback' => 'spark_multipurpose_sanitize_color_alpha',
            'transport' => 'postMessage'
        ));
        
        $wp_customize->add_control(new Spark_Multipurpose_Alpha_Color_Control($wp_customize, "spark_multipurpose_hamburger_color", array(
            'section' => 'spark_multipurpose_header',
            'label' => esc_html__('Hamburger Color(Mobile)', 'spark-multipurpose'),
        )));

        // background 
        $wp_customize->add_setting("spark_multipurpose_header_bg_type", array(
            'default' => 'none',
            'sanitize_callback' => 'spark_multipurpose_sanitize_select',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control("spark_multipurpose_header_bg_type", array(
            'section' => 'spark_multipurpose_header',
            'type' => 'select',
            'label' => esc_html__('Background Type', 'spark-multipurpose'),
            'choices' => array(
                'none'     => esc_html__('Default', 'spark-multipurpose'),
                'color-bg' => esc_html__('Color Background', 'spark-multipurpose'),
                'gradient-bg' => esc_html__('Gradient Background', 'spark-multipurpose'),
                'image-bg' => esc_html__('Image Background', 'spark-multipurpose'),
            ),
        ));

        $wp_customize->add_setting("spark_multipurpose_header_bg_color", array(
            'default' => '#f2f4f6',
            'sanitize_callback' => 'spark_multipurpose_sanitize_color_alpha',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control(new Spark_Multipurpose_Alpha_Color_Control($wp_customize, "spark_multipurpose_header_bg_color", array(
            'section' => 'spark_multipurpose_header',
            'label' => esc_html__('Background Color', 'spark-multipurpose'),
        )));

        $wp_customize->add_setting("spark_multipurpose_header_bg_gradient", array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control(new Spark_Multipurpose_Gradient_Control($wp_customize, "spark_multipurpose_header_bg_gradient", array(
            'section' => 'spark_multipurpose_header',
            'label' => esc_html__('Gradient Background', 'spark-multipurpose'),
        )));

        // Registers example_background settings
        $wp_customize->add_setting("spark_multipurpose_header_background_image", array(
            'sanitize_callback' => 'esc_url_raw',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_setting("spark_multipurpose_header_background_image_id", array(
            'sanitize_callback' => 'absint',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_setting("spark_multipurpose_header_background_image_repeat", array(
            'default' => 'no-repeat',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_setting("spark_multipurpose_header_background_image_size", array(
            'default' => 'cover',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_setting("spark_multipurpose_header_background_image_position", array(
            'default' => 'center center',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_setting("spark_multipurpose_header_background_image_attach", array(
            'default' => 'fixed',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage'
        ));
        // Registers example_background control
        $wp_customize->add_control(new Spark_Multipurpose_Background_Control($wp_customize, "spark_multipurpose_header_bg_image", array(
            'label' => esc_html__('Background Image', 'spark-multipurpose'),
            'transport' => 'postMessage',
            'section' => 'spark_multipurpose_header',
            'settings' => array(
                'image_url' => "spark_multipurpose_header_background_image",
                'image_id' => "spark_multipurpose_header_background_image_id",
                'repeat' => "spark_multipurpose_header_background_image_repeat", // Use false to hide the field
                'size' => "spark_multipurpose_header_background_image_size",
                'position' => "spark_multipurpose_header_background_image_position",
                'attach' => "spark_multipurpose_header_background_image_attach"
            ),
        )));


        $wp_customize->add_setting("spark_multipurpose_header_overlay_color", array(
            'default' => 'rgba(255,255,255,0)',
            'sanitize_callback' => 'spark_multipurpose_sanitize_color_alpha',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control(new Spark_Multipurpose_Alpha_Color_Control($wp_customize, "spark_multipurpose_header_overlay_color", array(
            'label' => esc_html__('Background Overlay Color', 'spark-multipurpose'),
            'section' => "spark_multipurpose_header",
            'palette' => array(
                'rgb(255, 255, 255, 0.3)', // RGB, RGBa, and hex values supported
                'rgba(0, 0, 0, 0.3)',
                'rgba( 255, 255, 255, 0.2 )', // Different spacing = no problem
                '#00CC99', // Mix of color types = no problem
                '#00C439',
                '#00C569',
                'rgba( 255, 234, 255, 0.2 )', // Different spacing = no problem
                '#AACC99', // Mix of color types = no problem
                '#33C439',
            )
        )));

        $wp_customize->add_setting( 'spark_multipurpose_header_margin_padding',
            array(
                'sanitize_callback' => 'spark_multipurpose_sanitize_field_background',
                'transport' => 'postMessage',
                'default'           => json_encode(array(
                    'padding'   => '',
                    'margin' => '',
                    'radius' => '',
                )),
            )
        );
        $wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Group($wp_customize,'spark_multipurpose_header_margin_padding',
                array(
                    'label'    => esc_html__( 'Margin/Padding', 'spark-multipurpose' ),
                    'section'  => 'spark_multipurpose_header',
                    'settings' => 'spark_multipurpose_header_margin_padding',
                    'priority' => 100,
                ),
                array(
                    'margin'      => array(
                        'type'  => 'cssbox',
                        'label' => esc_html__( 'Margin(px)', 'spark-multipurpose' ),
                    ),
                    'padding' => array(
                        'type'  => 'cssbox',
                        'label' => esc_html__( 'Padding(px)', 'spark-multipurpose' ),
                    ),
                    'radius' => array(
                        'type'  => 'cssbox',
                        'label' => esc_html__( 'Radius(px)', 'spark-multipurpose' ),
                    )
                )
            )
        );

        /******
         *  Menu Style Settings 
        */
        $wp_customize->add_setting('spark_multipurpose_header_nav_color_heading', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));
        $wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'spark_multipurpose_header_nav_color_heading', array(
            'section' => 'spark_multipurpose_header',
            'label' => esc_html__('Menu Color', 'spark-multipurpose')
        )));


        $wp_customize->add_setting("spark_multipurpose_header_nav_wrap_bg_color", array(
            'sanitize_callback' => 'spark_multipurpose_sanitize_color_alpha',
            'transport' => 'postMessage'
        ));
        $wp_customize->add_control(new Spark_Multipurpose_Alpha_Color_Control($wp_customize, "spark_multipurpose_header_nav_wrap_bg_color", 
            array(
                'section' => 'spark_multipurpose_header',
                'label' => esc_html__('Menu Background', 'spark-multipurpose')
            )
        ));


        $wp_customize->add_setting( 'spark_multipurpose_header_item_group',
            array(
                'sanitize_callback' => 'spark_multipurpose_sanitize_field_background',
                'transport' => 'postMessage',
                'default'           => json_encode(array(
                    'bg_color'   => '',
                    'color' => '',
                    'radius' => '',
                    'margin' => '',
                    'padding' => ''
                )),
            )
        );
        $wp_customize->add_control( new Spark_Multipurpose_Custom_Control_Group( $wp_customize, 'spark_multipurpose_header_item_group',
            array(
                'label'    => esc_html__( 'Menu Item', 'spark-multipurpose' ),
                'section'  => 'spark_multipurpose_header',
                'settings' => 'spark_multipurpose_header_item_group',
            ),
                array(
                    'bg_color'      => array(
                        'type'  => 'color',
                        'label' => esc_html__( 'Background', 'spark-multipurpose' ),
                    ),
                    'color' => array(
                        'type'  => 'color',
                        'label' => esc_html__( 'Color', 'spark-multipurpose' ),
                    ),
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
                    )
                )
            )
        );

        $wp_customize->add_setting( 'spark_multipurpose_header_sub_item_group',
            array(
                'sanitize_callback' => 'spark_multipurpose_sanitize_field_background',
                'transport' => 'postMessage',
                'default'           => json_encode(array(
                    'bg_color'   => '',
                    'color' => '',
                    'padding' => '',
                    'margin' => '',
                    'radius' => '' 
                )),
            )
        );
        $wp_customize->add_control( new Spark_Multipurpose_Custom_Control_Group( $wp_customize, 'spark_multipurpose_header_sub_item_group',
            array(
                'label'    => esc_html__( 'Child Menu Sub Item ( Sub Menu )', 'spark-multipurpose' ),
                'section'  => 'spark_multipurpose_header',
                'settings' => 'spark_multipurpose_header_sub_item_group',
            ),
                array(
                    'bg_color'      => array(
                        'type'  => 'color',
                        'label' => esc_html__( 'Background', 'spark-multipurpose' ),
                    ),
                    'color' => array(
                        'type'  => 'color',
                        'label' => esc_html__( 'Color', 'spark-multipurpose' ),
                    ),
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
                    )
                )
            )
        );

        $wp_customize->add_setting( 'spark_multipurpose_header_nav_hover_group',
            array(
                'sanitize_callback' => 'spark_multipurpose_sanitize_field_background',
                'transport' => 'postMessage',
                'default'           => json_encode(array(
                    'nav_bg_color'   => '',
                    'nav_color' => ''
                )),
            )
        );
        $wp_customize->add_control( new Spark_Multipurpose_Custom_Control_Group( $wp_customize, 'spark_multipurpose_header_nav_hover_group',
                array(
                    'label'    => esc_html__( 'Menu Item - Hover / Active', 'spark-multipurpose' ),
                    'section'  => 'spark_multipurpose_header',
                    'settings' => 'spark_multipurpose_header_nav_hover_group',
                    'priority' => 100,
                ),
                array(
                    'nav_bg_color'      => array(
                        'type'  => 'color',
                        'label' => esc_html__( 'Background', 'spark-multipurpose' ),
                    ),
                    'nav_color' => array(
                        'type'  => 'color',
                        'label' => esc_html__( 'Color', 'spark-multipurpose' ),
                    )
                )
            )
        );

    $wp_customize->selective_refresh->add_partial( 'spark_multipurpose_enable_search', array (
        'settings' => array( 
            'spark_multipurpose_header_layout',
            'spark_multipurpose_search_layout',
            'spark_multipurpose_menu_sidebar',
            'spark_multipurpose_menu_absolute',
            'spark_multipurpose_menu_sticky'
        ),
        'selector' => '#masthead',
        'container_inclusive' => true,
        'render_callback' => function () {
            $layout = get_theme_mod('spark_multipurpose_header_layout','layout_one');
            return get_template_part('header/header', str_replace("layout_","", $layout));
        }
    ));
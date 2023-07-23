<?php
/* Testimonial Section. */
$wp_customize->add_section(new Spark_Multipurpose_Toggle_Section($wp_customize, 'spark_multipurpose_testimonial_section', array(
    'title'		=> 	esc_html__('Testimonial Section','spark-multipurpose'),
    'panel'		=> 'spark_multipurpose_frontpage_settings',
    'priority'  => spark_multipurpose_get_section_position('spark_multipurpose_testimonial_section'),
    'hiding_control' => 'spark_multipurpose_testimonial_section_disable'
)));
    /**
     * Enable/Disable Option
     *
     * @since 1.0.0
    */
    $wp_customize->add_setting('spark_multipurpose_testimonial_section_disable', array(
        'default' => 'disable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_testimonial_section_disable', array(
        'label' => esc_html__('Enable', 'spark-multipurpose'),
        'section' => 'spark_multipurpose_testimonial_section',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-multipurpose'),
            'disable' => esc_html__('No', 'spark-multipurpose'),
        ),
    )));
    
    $wp_customize->add_setting('spark_multipurpose_testimonial_section_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Tab($wp_customize, 'spark_multipurpose_testimonial_section_nav', array(
        'type' => 'tab',
        'section' => 'spark_multipurpose_testimonial_section',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_testimonial_section_disable',
                    'spark_multipurpose_testimonials_title_headding',
                    'spark_multipurpose_testimonial_title',
                    'spark_multipurpose_testimonial_subtitle',
                    'spark_multipurpose_testimonial_title_align',
                    'spark_multipurpose_testimonial_page',
                    'spark_multipurpose_testimonial_review_link',
                    'spark_multipurpose_testimonial_cover_image'
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_testimonial_cs_heading',
                    'spark_multipurpose_testimonial_super_title_color',
                    'spark_multipurpose_testimonial_title_color',
                    'spark_multipurpose_testimonial_text_color',
                    'spark_multipurpose_testimonial_link_color',
                    'spark_multipurpose_testimonial_link_hover_color',
                ),
            ),
            array(
                'name' => esc_html__('Advanced', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_testimonial_bg_type',
                    'spark_multipurpose_testimonial_bg_color',
                    'spark_multipurpose_testimonial_bg_gradient',
                    'spark_multipurpose_testimonial_bg_image',
                    'spark_multipurpose_testimonial_bg_video',
                    'spark_multipurpose_testimonial_overlay_color',
                    'spark_multipurpose_testimonial_padding',
					'spark_multipurpose_testimonial_content_heading',
					'spark_multipurpose_testimonial_content_bg_type',
                    'spark_multipurpose_testimonial_content_bg_color',
                    'spark_multipurpose_testimonial_content_bg_gradient',
					'spark_multipurpose_testimonial_content_padding',
					'spark_multipurpose_testimonial_content_margin',
					'spark_multipurpose_testimonial_content_radius',
                    'spark_multipurpose_testimonial_cs_seperator',
					'spark_multipurpose_testimonial_seperator0',
					'spark_multipurpose_testimonial_section_seperator',
					'spark_multipurpose_testimonial_seperator1',
					'spark_multipurpose_testimonial_top_seperator',
					'spark_multipurpose_testimonial_ts_color',
					'spark_multipurpose_testimonial_ts_height',
					'spark_multipurpose_testimonial_seperator2',
					'spark_multipurpose_testimonial_bottom_seperator',
					'spark_multipurpose_testimonial_bs_color',
					'spark_multipurpose_testimonial_bs_height'
                ),
            ),
        ),
    )));
    
    $wp_customize->add_setting('spark_multipurpose_testimonials_title_headding', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'spark_multipurpose_testimonials_title_headding', array(
        'section' => 'spark_multipurpose_testimonial_section',
        'label' => esc_html__('Section Title & Sub Title', 'spark-multipurpose')
    )));

    // Blog Title.
    $wp_customize->add_setting('spark_multipurpose_testimonial_subtitle', array(
        'transport' => 'postMessage',
        'sanitize_callback'	=> 'sanitize_text_field'		//done
    ));
    $wp_customize->add_control('spark_multipurpose_testimonial_subtitle', array(
        'label'	   => esc_html__('Super Title','spark-multipurpose'),
        'section'  => 'spark_multipurpose_testimonial_section',
        'type'	   => 'text',
    ));
    // Blog Title.
    $wp_customize->add_setting('spark_multipurpose_testimonial_title', array(
        'transport' => 'postMessage',
        'sanitize_callback'	=> 'sanitize_text_field'		//done
    ));
    $wp_customize->add_control('spark_multipurpose_testimonial_title', array(
        'label'	   => esc_html__('Title','spark-multipurpose'),
        'section'  => 'spark_multipurpose_testimonial_section',
        'type'	   => 'text',
    ));

    $wp_customize->add_setting('spark_multipurpose_testimonial_title_align', array(
        'default' => 'text-center',
        'sanitize_callback' => 'spark_multipurpose_sanitize_select',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new Spark_Multipurpose_Custom_Control_Buttonset( $wp_customize, 'spark_multipurpose_testimonial_title_align',
            array(
                'choices'  => array(
                    'text-left' => esc_html__('Left', 'spark-multipurpose'),
                    'text-center' => esc_html__('Center', 'spark-multipurpose'),
                    'text-right' => esc_html__('Right', 'spark-multipurpose'),
                ),
                'label'    => esc_html__( 'Alignment', 'spark-multipurpose' ),
                'section'  => 'spark_multipurpose_testimonial_section',
            )
        )
    );
    //  Testimonial Page.
    $wp_customize->add_setting('spark_multipurpose_testimonial_page', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'spark_multipurpose_sanitize_repeater',		//done
        'default' => json_encode(array(
            array(
                'testimonial_page' => '',
                'designation'=>'',
                'rating'    => '',
                'facebook_url' => '',
                'twitter_url' => '',
                'youtube_url' => '',
                'instagram_url' => '',
                'linkedin_url' => '',
            )
        ))
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Repeater_Control( $wp_customize, 'spark_multipurpose_testimonial_page', 
        array(
            'label' 	   => esc_html__('Testimonial Blocks', 'spark-multipurpose'),
            'section' 	   => 'spark_multipurpose_testimonial_section',
            'box_label' => esc_html__('Testimonial Block', 'spark-multipurpose'),
            'add_label' => esc_html__('Add New', 'spark-multipurpose'),
        ),
        array(
            'testimonial_page' => array(
                'type' => 'select',
                'label' => esc_html__('Testimonial Page', 'spark-multipurpose'),
                'options' => $pages
            ),
            'designation' => array(
                'type' => 'text',
                'label' => esc_html__('Designation', 'spark-multipurpose'),
                'default' => ''
            ),
            'rating' => array(
                'type' => 'number',
                'label' => esc_html__('Rating', 'spark-multipurpose'),
                'default' => '5'
            ),
            'facebook_url' => array(
                'type' => 'text',
                'label' => esc_html__('Facebook URL', 'spark-multipurpose'),
                'default' => ''
            ),
            'twitter_url' => array(
                'type' => 'text',
                'label' => esc_html__('Twitter URL', 'spark-multipurpose'),
                'default' => ''
            ),
            'youtube_url' => array(
                'type' => 'text',
                'label' => esc_html__('Youtube Url', 'spark-multipurpose'),
                'default' => ''
            ),
            'instagram_url' => array(
                'type' => 'text',
                'label' => esc_html__('Instagram Url', 'spark-multipurpose'),
                'default' => ''
            ),
            'linkedin_url' => array(
                'type' => 'text',
                'label' => esc_html__('Linkedin Url', 'spark-multipurpose'),
                'default' => ''
            )
        )
    ));

    $wp_customize->add_setting('spark_multipurpose_testimonial_review_link', array(
        'transport' => 'postMessage',
        'sanitize_callback'	=> 'sanitize_text_field'		//done
    ));
    $wp_customize->add_control('spark_multipurpose_testimonial_review_link', array(
        'label'	   => esc_html__('All Review Link','spark-multipurpose'),
        'section'  => 'spark_multipurpose_testimonial_section',
        'type'	   => 'text',
    ));

    $wp_customize->add_setting('spark_multipurpose_testimonial_cover_image', array(
        'transport' => 'postMessage',
        'sanitize_callback'	=> 'esc_url_raw'		//done
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'spark_multipurpose_testimonial_cover_image', 
        array(
            'label'	   => esc_html__('Testimonial Cover Image','spark-multipurpose'),
            'section'  => 'spark_multipurpose_testimonial_section'
        )
    ));
    
    $wp_customize->selective_refresh->add_partial( "spark_multipurpose_testimonial_refresh", array (
        'settings' => array( 
            'spark_multipurpose_testimonial_section_disable',
            'spark_multipurpose_testimonial_subtitle',
            'spark_multipurpose_testimonial_page',
            'spark_multipurpose_testimonial_cover_image',
            'spark_multipurpose_testimonial_review_link',
            'spark_multipurpose_testimonial_section_seperator',
            'spark_multipurpose_testimonial_top_seperator',
            'spark_multipurpose_testimonial_bottom_seperator',
        ),
        'selector' => "#testimonial-section",
        'fallback_refresh' => true,
        'container_inclusive' => true,
        'render_callback' => function () {
            return get_template_part( 'section/section-testimonial' );
        }
    ));

    $wp_customize->add_setting('spark_multipurpose_testimonial_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new Spark_Multipurpose_Upgrade_Text($wp_customize, 'spark_multipurpose_testimonial_upgrade_text', array(
        'section' => 'spark_multipurpose_testimonial_section',
        'label' => esc_html__('For more settings,', 'spark-multipurpose'),
        'choices' => array(
            esc_html__('Input from Customizer(Advance)', 'spark-multipurpose'),
            esc_html__('3 Layout', 'spark-multipurpose'),
            esc_html__('Section Shortcode', 'spark-multipurpose'),
            esc_html__('And more...', 'spark-multipurpose'),
        ),
        'priority' => 400
    )));
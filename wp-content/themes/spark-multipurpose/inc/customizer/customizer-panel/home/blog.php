<?php
/*************
 * Blog Section
*/
$wp_customize->add_section(new Spark_Multipurpose_Toggle_Section($wp_customize, 'spark_multipurpose_blog_section', array(
    'title'		=> 	esc_html__('Blog Section','spark-multipurpose'),
    'panel'		=> 'spark_multipurpose_frontpage_settings',
    'priority'  => spark_multipurpose_get_section_position('spark_multipurpose_blog_section'),
    'hiding_control' => 'spark_multipurpose_blog_section_disable'
)));
    $wp_customize->add_setting('spark_multipurpose_blog_section_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Tab($wp_customize, 'spark_multipurpose_blog_section_nav', array(
        'type' => 'tab',
        'section' => 'spark_multipurpose_blog_section',
        'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('Content', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_blog_section_disable',
                    'spark_multipurpose_blog_subtitle',
                    'spark_multipurpose_blog_title',
                    'spark_multipurpose_blog_title_align',
                    'spark_multipurpose_posts_num',
                    'spark_multipurpose_blog_categories',
                    'spark_multipurpose_post_date_options',
                    'spark_multipurpose_post_reading_time',
                    'spark_multipurpose_post_comments_options',
                    'spark_multipurpose_post_author_options',
                    'spark_multipurpose_blog_home_btn',
                    'spark_multipurpose_home_blog_alignment',
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Style', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_blog_cs_heading',
                    'spark_multipurpose_blog_super_title_color',
                    'spark_multipurpose_blog_title_color',
                    'spark_multipurpose_blog_text_color',
                    'spark_multipurpose_blog_link_color',
                    'spark_multipurpose_blog_link_hover_color',
                ),
            ),
            array(
                'name' => esc_html__('Advanced', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_blog_bg_type',
                    'spark_multipurpose_blog_bg_color',
                    'spark_multipurpose_blog_bg_gradient',
                    'spark_multipurpose_blog_bg_image',
                    'spark_multipurpose_blog_bg_video',
                    'spark_multipurpose_blog_overlay_color',
                    'spark_multipurpose_blog_padding',
                    'spark_multipurpose_blog_content_heading',
					'spark_multipurpose_blog_content_bg_type',
                    'spark_multipurpose_blog_content_bg_color',
                    'spark_multipurpose_blog_content_bg_gradient',
					'spark_multipurpose_blog_content_padding',
					'spark_multipurpose_blog_content_margin',
					'spark_multipurpose_blog_content_radius',
                    'spark_multipurpose_blog_cs_seperator',
					'spark_multipurpose_blog_seperator0',
					'spark_multipurpose_blog_section_seperator',
					'spark_multipurpose_blog_seperator1',
					'spark_multipurpose_blog_top_seperator',
					'spark_multipurpose_blog_ts_color',
					'spark_multipurpose_blog_ts_height',
					'spark_multipurpose_blog_seperator2',
					'spark_multipurpose_blog_bottom_seperator',
					'spark_multipurpose_blog_bs_color',
					'spark_multipurpose_blog_bs_height'
                ),
            ),
        ),
    )));
    /**
     * Enable/Disable Option
     *
     * @since 1.0.0
    */
    $wp_customize->add_setting('spark_multipurpose_blog_section_disable', array(
        'default' => 'disable',
        'transport' => 'postMessage',
        'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_blog_section_disable', array(
        'label' => esc_html__('Enable', 'spark-multipurpose'),
        'section' => 'spark_multipurpose_blog_section',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-multipurpose'),
            'disable' => esc_html__('No', 'spark-multipurpose'),
        ),
    )));
    
    // Blog Title.
    $wp_customize->add_setting('spark_multipurpose_blog_subtitle', array(
        'transport' => 'postMessage',
        'sanitize_callback'	=> 'sanitize_text_field'		//done
    ));
    $wp_customize->add_control('spark_multipurpose_blog_subtitle', array(
        'label'	   => esc_html__('Super Title','spark-multipurpose'),
        'section'  => 'spark_multipurpose_blog_section',
        'type'	   => 'text',
    ));

    // Blog Title.
    $wp_customize->add_setting('spark_multipurpose_blog_title', array(
        'transport' => 'postMessage',
        'sanitize_callback'	=> 'sanitize_text_field'		//done
    ));
    $wp_customize->add_control('spark_multipurpose_blog_title', array(
        'label'	   => esc_html__('Title','spark-multipurpose'),
        'section'  => 'spark_multipurpose_blog_section',
        'type'	   => 'text',
    ));
    
    $wp_customize->add_setting('spark_multipurpose_blog_title_align', array(
        'default' => 'text-center',
        'sanitize_callback' => 'spark_multipurpose_sanitize_select',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_control(
        new Spark_Multipurpose_Custom_Control_Buttonset( $wp_customize, 'spark_multipurpose_blog_title_align',
            array(
                'choices'  => array(
                    'text-left' => esc_html__('Left', 'spark-multipurpose'),
                    'text-center' => esc_html__('Center', 'spark-multipurpose'),
                    'text-right' => esc_html__('Right', 'spark-multipurpose'),
                ),
                'label'    => esc_html__( 'Alignment', 'spark-multipurpose' ),
                'section'  => 'spark_multipurpose_blog_section',
                'settings' => 'spark_multipurpose_blog_title_align',
            )
        )
    );
    
    // Blog Posts.
    $wp_customize->add_setting('spark_multipurpose_blog_categories', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',     //done
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Multiple_Check_Control($wp_customize, 'spark_multipurpose_blog_categories', array(
        'label'    => esc_html__('Select Category', 'spark-multipurpose'),
        'settings' => 'spark_multipurpose_blog_categories',
        'section'  => 'spark_multipurpose_blog_section',
        'choices'  => $blog_cat,
    )));
    
    // Select Blog Post Layout.
    $wp_customize->add_setting('spark_multipurpose_posts_num', array(
        'transport' => 'postMessage',
        'default'			 =>	'three',
        'sanitize_callback'	 =>	'spark_multipurpose_sanitize_select'		//done	
    ));
    $wp_customize->add_control( 'spark_multipurpose_posts_num', array(
        'label'	  =>	esc_html__('Number of Blog Posts','spark-multipurpose'),
        'section' =>	'spark_multipurpose_blog_section',
        'type'	  =>	'select',
        'choices' => array(
            'three' => esc_html__('3 Blog Layout','spark-multipurpose'),
            'six'   => esc_html__( '6 Blog Layout','spark-multipurpose' ),
        )
    ));


    /**
     * Enable/Disable Option for Post Elements Date
     *
     * @since 1.0.0
    */
    $wp_customize->add_setting('spark_multipurpose_post_date_options', array(
        'transport' => 'postMessage',
        'default' => 'enable',
        'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_post_date_options', array(
        'label' => esc_html__('Post Meta Date', 'spark-multipurpose'),
        'settings' => 'spark_multipurpose_post_date_options',
        'section' => 'spark_multipurpose_blog_section',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-multipurpose'),
            'disable' => esc_html__('No', 'spark-multipurpose'),
        ),
    )));
    /**
     * Enable/Disable Option for Post Elements Comments
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting('spark_multipurpose_post_comments_options', array(
        'transport' => 'postMessage',
        'default' => 'enable',
        'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_post_comments_options', array(
        'label' => esc_html__('Post Meta Comments', 'spark-multipurpose'),
        'settings' => 'spark_multipurpose_post_comments_options',
        'section' => 'spark_multipurpose_blog_section',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-multipurpose'),
            'disable' => esc_html__('No', 'spark-multipurpose'),
        ),
    )));
    /**
     * Enable/Disable Option for Post Elements Tags
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting('spark_multipurpose_post_author_options', array(
        'transport' => 'postMessage',
        'default' => 'enable',
        'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_post_author_options', array(
        'label' => esc_html__('Post Meta Author', 'spark-multipurpose'),
        'settings' => 'spark_multipurpose_post_author_options',
        'section' => 'spark_multipurpose_blog_section',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-multipurpose'),
            'disable' => esc_html__('No', 'spark-multipurpose'),
        ),
    )));

    $wp_customize->add_setting('spark_multipurpose_post_reading_time', array(
        'transport' => 'postMessage',
        'default' => 'enable',
        'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_post_reading_time', array(
        'label' => esc_html__('Reading Time', 'spark-multipurpose'),
        'settings' => 'spark_multipurpose_post_reading_time',
        'section' => 'spark_multipurpose_blog_section',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-multipurpose'),
            'disable' => esc_html__('No', 'spark-multipurpose'),
        ),
    )));


     // Blog Template Read More Button.
     $wp_customize->add_setting( 'spark_multipurpose_blog_home_btn', array(
        'transport' => 'postMessage',
        'default'           => esc_html__( 'Continue Reading','spark-multipurpose' ),
        'sanitize_callback' => 'sanitize_text_field',		//done
    ));
    $wp_customize->add_control('spark_multipurpose_blog_home_btn', array(
        'label'		  => esc_html__( 'Enter Button Text', 'spark-multipurpose' ),
        'section'	  => 'spark_multipurpose_blog_section',
        'type' 		  => 'text',
    ));


    $wp_customize->add_setting('spark_multipurpose_home_blog_alignment',
        array(
            'default'           => 'text-center',
            'transport' => 'postMessage',
            'sanitize_callback' => 'spark_multipurpose_sanitize_select',
        )
    );
    $wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Buttonset($wp_customize,'spark_multipurpose_home_blog_alignment',
        array(
            'choices'  => array(
                'text-left' => esc_html__('Left', 'spark-multipurpose'),
                'text-right' => esc_html__('Right', 'spark-multipurpose'),
                'text-center' => esc_html__('Center', 'spark-multipurpose'),
            ),
            'label'    => esc_html__( 'Blog Content Alignment', 'spark-multipurpose' ),
            'section'  => 'spark_multipurpose_blog_section',
            'settings' => 'spark_multipurpose_home_blog_alignment',
        )
    ));


    $wp_customize->selective_refresh->add_partial( "spark_multipurpose_blog_section_disable_refresh", array (
        'settings' => array( 
            'spark_multipurpose_blog_section_disable',
            'spark_multipurpose_blog_subtitle',
            'spark_multipurpose_blog_title',
            'spark_multipurpose_posts_num',
            'spark_multipurpose_blog_categories',
            'spark_multipurpose_post_date_options',
            'spark_multipurpose_post_reading_time',
            'spark_multipurpose_post_comments_options',
            'spark_multipurpose_post_author_options',
            'spark_multipurpose_blog_home_btn',
            'spark_multipurpose_home_blog_alignment',
            "spark_multipurpose_blog_section_seperator",
            "spark_multipurpose_blog_top_seperator",
            "spark_multipurpose_blog_bottom_seperator"		
        ),
        'selector' => "#blog-section",
        'fallback_refresh' => true,
        'container_inclusive' => true,
        'render_callback' => function () {
            return get_template_part( 'section/section-blog' );
        }
    ));
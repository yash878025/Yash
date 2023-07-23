<?php
/**
 * Blog Template.
*/
$wp_customize->add_section('spark_multipurpose_blog_template', array(
    'title'		  => esc_html__('Blog Setting','spark-multipurpose'),
    'priority'	  => 65,
));

    $wp_customize->add_setting('spark_multipurpose_blog_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
        'priority' => -1,
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Tab($wp_customize, 'spark_multipurpose_blog_nav', array(
        'type' => 'tab',
        'section' => 'spark_multipurpose_blog_template',
        'buttons' => array(
            array(
                'name' => esc_html__('Blog List', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_blogtemplate_postcat',
                    'spark_multipurpose_blog_template_sidebar',
                    'spark_multipurpose_blogtemplate_layout',
                    'spark_multipurpose_blog_heading',
                    'spark_multipurpose_post_heading',
                    'spark_multipurpose_post_description_options',
                    'spark_multipurpose_post_column',
                    'spark_multipurpose_blogtemplate_btn',
                    'spark_multipurpose_post_excerpt_length',
                    'spark_multipurpose_post_date_options',
                    'spark_multipurpose_post_comments_options',
                    'spark_multipurpose_post_author_options',
                    'spark_multipurpose_post_reading_time',
                    'spark_multipurpose_blog_alignment'
                ),
                'active' => true,
            ),
            array(
                'name' => esc_html__('Single Blog', 'spark-multipurpose'),
                'fields' => array(
                    'spark_multipurpose_blog_single_heading',
                    'spark_multipurpose_blog_single_template_sidebar',
                    'spark_multipurpose_blog_single_alignment',
                    'spark_multipurpose_single_blog_title',
                    'spark_multipurpose_single_post_top_elements',
                    'spark_multipurpose_single_post_bottom_elements'
                )
            )
        )
    )));

    $wp_customize->add_setting("spark_multipurpose_blog_heading", array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, "spark_multipurpose_blog_heading", array(
        'section' => "spark_multipurpose_blog_template",
        'label' => esc_html__('Blog Page Sidebar', 'spark-multipurpose'),
    )));
	$wp_customize->add_setting('spark_multipurpose_blog_template_sidebar', array(
		'default' => 'right',
		'sanitize_callback' => 'spark_multipurpose_sanitize_options'
	));
	$wp_customize->add_control(new Spark_Multipurpose_Selector($wp_customize, 'spark_multipurpose_blog_template_sidebar', array(
		'section' => 'spark_multipurpose_blog_template',
		//'label' => esc_html__('Blog Page Sidebar', 'spark-multipurpose'),
		'options' => array(
			'left' => get_template_directory_uri() . '/inc/customizer/images/left-sidebar.png',
			'right' => get_template_directory_uri() . '/inc/customizer/images/right-sidebar.png',
			'no' => get_template_directory_uri() . '/inc/customizer/images/no-sidebar.png',
		)
	)));
    


    $wp_customize->add_setting("spark_multipurpose_post_heading", array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, "spark_multipurpose_post_heading", array(
        'section' => "spark_multipurpose_blog_template",
        'label' => esc_html__('Post Layout', 'spark-multipurpose'),
    )));

    $post_layout = array(
        'default'  => esc_html__( 'Normal', 'spark-multipurpose' ),
        'masonry'  => esc_html__( 'Masonry', 'spark-multipurpose' )
    );
    
    $wp_customize->add_setting('spark_multipurpose_blogtemplate_layout', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'default'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Image_Select($wp_customize, 'spark_multipurpose_blogtemplate_layout', array(
        'section' => 'spark_multipurpose_blog_template',
        //'label' => esc_html__('Blog Post Layout', 'spark-multipurpose'),
        'image_path' => get_template_directory_uri() . '/inc/customizer/images/blog/',
        'choices' => $post_layout
    )));


    $wp_customize->add_setting( 'spark_multipurpose_post_column', 
        array(
            'default'           => '1',
            'sanitize_callback' => 'spark_multipurpose_sanitize_select'
        ) 
    );
    $wp_customize->add_control( 'spark_multipurpose_post_column', 
        array(
            'type' => 'select',
            'label' => esc_html__( 'Column', 'spark-multipurpose' ),
            'section' => 'spark_multipurpose_blog_template',
            'choices' => array(
                '1' => __("1 Column", 'spark-multipurpose'),
                '2' => __("2 Column", 'spark-multipurpose'),
                '3' => __("3 Column", 'spark-multipurpose'),
            )
        )
    );

    $wp_customize->add_setting(
        'spark_multipurpose_blog_alignment',
        array(
            'default'           => 'text-center',
            'sanitize_callback' => 'spark_multipurpose_sanitize_select',
        )
    );
    $wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Buttonset($wp_customize,'spark_multipurpose_blog_alignment',
        array(
            'choices'  => array(
                'text-left' => esc_html__('Left', 'spark-multipurpose'),
                'text-right' => esc_html__('Right', 'spark-multipurpose'),
                'text-center' => esc_html__('Center', 'spark-multipurpose'),
            ),
            'label'    => esc_html__( 'Alignment', 'spark-multipurpose' ),
            'section'  => 'spark_multipurpose_blog_template',
            'settings' => 'spark_multipurpose_blog_alignment',
        )
    ));


    // Blog Template Read More Button.
    $wp_customize->add_setting( 'spark_multipurpose_blogtemplate_btn', array(
        'default'           => esc_html__( 'Continue Reading','spark-multipurpose' ),
        'sanitize_callback' => 'sanitize_text_field',		//done
    ));
    $wp_customize->add_control('spark_multipurpose_blogtemplate_btn', array(
        'label'		  => esc_html__( 'Read More Text', 'spark-multipurpose' ),
        'section'	  => 'spark_multipurpose_blog_template',
        'type' 		  => 'text',
    ));
    /**
     * Number field for Excerpt Length section
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'spark_multipurpose_post_excerpt_length',
        array(
            'default'    => 20,
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control(new Spark_Multipurpose_Range_Control($wp_customize, 'spark_multipurpose_post_excerpt_length', array(
        'section' => 'spark_multipurpose_blog_template',
        'label' => esc_html__('Excerpt Length (Words)', 'spark-multipurpose'),
        'input_attrs' => array(
            'min' => 10,
            'max' => 1000,
            'step' => 5
        )
    )));
    /**
     * Enable/Disable Option for Post Elements Date
     *
     * @since 1.0.0
    */
    $wp_customize->add_setting('spark_multipurpose_post_date_options', array(
        'default' => 'enable',
        'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_post_date_options', array(
        'label' => esc_html__('Post Meta Date', 'spark-multipurpose'),
        'settings' => 'spark_multipurpose_post_date_options',
        'section' => 'spark_multipurpose_blog_template',
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
        'default' => 'enable',
        'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_post_comments_options', array(
        'label' => esc_html__('Post Meta Comments', 'spark-multipurpose'),
        'settings' => 'spark_multipurpose_post_comments_options',
        'section' => 'spark_multipurpose_blog_template',
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
        'default' => 'enable',
        'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_post_author_options', array(
        'label' => esc_html__('Post Meta Author', 'spark-multipurpose'),
        'settings' => 'spark_multipurpose_post_author_options',
        'section' => 'spark_multipurpose_blog_template',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-multipurpose'),
            'disable' => esc_html__('No', 'spark-multipurpose'),
        ),
    )));

    $wp_customize->add_setting('spark_multipurpose_post_reading_time', array(
        'default' => 'enable',
        'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_post_reading_time', array(
        'label' => esc_html__('Reading Time', 'spark-multipurpose'),
        'settings' => 'spark_multipurpose_post_reading_time',
        'section' => 'spark_multipurpose_blog_template',
        'switch_label' => array(
            'enable' => esc_html__('Yes', 'spark-multipurpose'),
            'disable' => esc_html__('No', 'spark-multipurpose'),
        ),
    )));




    /** single page  */ 
    
    $wp_customize->add_setting("spark_multipurpose_blog_single_heading", array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, "spark_multipurpose_blog_single_heading", array(
        'section' => "spark_multipurpose_blog_template",
        'label' => esc_html__('Blog Single Post', 'spark-multipurpose'),
    )));
	$wp_customize->add_setting('spark_multipurpose_blog_single_template_sidebar', array(
		'default' => 'no-center-content',
		'sanitize_callback' => 'spark_multipurpose_sanitize_options'
	));
	$wp_customize->add_control(new Spark_Multipurpose_Selector($wp_customize, 'spark_multipurpose_blog_single_template_sidebar', array(
		'section' => 'spark_multipurpose_blog_template',
		//'label' => esc_html__('Single Post Sidebar', 'spark-multipurpose'),
		'options' => array(
			'left' => get_template_directory_uri() . '/inc/customizer/images/left-sidebar.png',
			'right' => get_template_directory_uri() . '/inc/customizer/images/right-sidebar.png',
			'no' => get_template_directory_uri() . '/inc/customizer/images/no-sidebar.png',
			'no-center-content' => get_template_directory_uri() . '/inc/customizer/images/no-sidebar.png',
		)
	)));


    $wp_customize->add_setting('spark_multipurpose_blog_single_alignment',
        array(
            'default'           => 'text-left',
            'sanitize_callback' => 'spark_multipurpose_sanitize_select',
        )
    );
    $wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Buttonset($wp_customize,'spark_multipurpose_blog_single_alignment',
         array(
            'label'    => esc_html__( 'Alignment', 'spark-multipurpose' ),
            'section'  => 'spark_multipurpose_blog_template',
            'choices'  => array(
                'text-left' => esc_html__('Left', 'spark-multipurpose'),
                'text-right' => esc_html__('Right', 'spark-multipurpose'),
                'text-center' => esc_html__('Center', 'spark-multipurpose'),
            )
        )
    ));

    $wp_customize->add_setting('spark_multipurpose_single_post_top_elements', array(
        'default' => array('featured_image', 'title', 'post_meta', 'content'),
        'sanitize_callback' => 'spark_multipurpose_sanitize_multi_choices',
    ));
    
    $wp_customize->add_control(new Spark_Multipurpose_Sortable_Control($wp_customize, 'spark_multipurpose_single_post_top_elements', array(
        'label' => esc_html__('Content Display & Order', 'spark-multipurpose'),
        'section' => 'spark_multipurpose_blog_template',
        'settings' => 'spark_multipurpose_single_post_top_elements',
        'choices' => array(
            'featured_image' => esc_html__('Featured Image', 'spark-multipurpose'),
            'title' => esc_html__('Title', 'spark-multipurpose'),
            'post_meta' => esc_html__('Post Meta', 'spark-multipurpose'),
            'content' => esc_html__('Content', 'spark-multipurpose'),
        )
    )));
    

    $wp_customize->add_setting('spark_multipurpose_single_post_bottom_elements', array(
        'default' => array('author_box', 'pagination', 'comment', 'related_posts'),
        'sanitize_callback' => 'spark_multipurpose_sanitize_multi_choices',
    ));
    
    $wp_customize->add_control(new Spark_Multipurpose_Sortable_Control($wp_customize, 'spark_multipurpose_single_post_bottom_elements', array(
        'label' => esc_html__('Content Display & Order', 'spark-multipurpose'),
        'section' => 'spark_multipurpose_blog_template',
        'settings' => 'spark_multipurpose_single_post_bottom_elements',
        'choices' => array(
            'author_box' => esc_html__('Author Box', 'spark-multipurpose'),
            'pagination' => esc_html__('Prev/Next Navigation', 'spark-multipurpose'),
            'comment' => esc_html__('Comment', 'spark-multipurpose'),
            'related_posts' => esc_html__('Related Posts', 'spark-multipurpose')
        )
    )));
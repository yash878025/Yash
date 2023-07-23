<?php        
/**
 *	Main Banner Slider.
*/
$wp_customize->add_section('spark_multipurpose_slider_section', array(
    'title'		=>	esc_html__('Home Slider Settings','spark-multipurpose'),
    'panel'		=> 'spark_multipurpose_frontpage_settings',
    'priority'  => -1
));
$wp_customize->add_setting('spark_multipurpose_slider_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Tab($wp_customize, 'spark_multipurpose_slider_nav', array(
    'type' => 'tab',
    'section' => 'spark_multipurpose_slider_section',
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'spark-multipurpose'),
            'fields' => array(
                'spark_multipurpose_banner_slider_section',
                'spark_multipurpose_slider_type',
                'spark_multipurpose_slider_advance_settings',
                'spark_multipurpose_banner_sliders',
                'spark_multipurpose_video_banner_url',
                'slider-controls'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'spark-multipurpose'),
            'fields' => array(
                'spark_multipurpose_banner_overlay_color',
                'spark_multipurpose_slider_supertitle_color',
                'spark_multipurpose_slider_title_color',
                'spark_multipurpose_slider_desc_color',
                'spark_multipurpose_caption_title_font_size_group',
                'spark_multipurpose_caption_desc_font_size_group',
                'spark_multipurpose_slider_caption_msg',
                'spark_multipurpose_banner_caption_overlay_color',
                'spark_multipurpose_slider_padding',
                'spark_multipurpose_slider_margin',
                'spark_multipurpose_slider_caption_radius',
                'spark_multipurpose_slider_caption_alignment'
            ),
        ),
        array(
            'name' => esc_html__('Advanced', 'spark-multipurpose'),
            'fields' => array(
                'spark_multipurpose_slider_height_msg',
                'spark_multipurpose_slider_height_group',
                'spark_multipurpose_slider_seperator0',
                'spark_multipurpose_slider_section_seperator',
                'spark_multipurpose_slider_bottom_seperator',
                'spark_multipurpose_slider_bs_color',
                'spark_multipurpose_slider_bs_height'
                
            )
        )
    ),
)));
/**
 * Enable/Disable Option
 *
 * @since 1.0.0
*/
$wp_customize->add_setting('spark_multipurpose_banner_slider_section', array(
    'default' => 'enable',
    'transport' => 'postMessage',
    'sanitize_callback' => 'spark_multipurpose_sanitize_switch',     //done
));
$wp_customize->add_control(new Spark_Multipurpose_Switch_Control($wp_customize, 'spark_multipurpose_banner_slider_section', array(
    'label' => esc_html__('Enable', 'spark-multipurpose'),
    'section' => 'spark_multipurpose_slider_section',
    'switch_label' => array(
        'enable' => esc_html__('Yes', 'spark-multipurpose'),
        'disable' => esc_html__('No', 'spark-multipurpose'),
    ),
)));

$wp_customize->add_setting('spark_multipurpose_slider_type', array(
    'default' => 'default',
    'transport' => 'postMessage',
    'sanitize_callback' => 'spark_multipurpose_sanitize_select'
));
$wp_customize->add_control('spark_multipurpose_slider_type', array(
    'section' => 'spark_multipurpose_slider_section',
    'type' => 'radio',
    'label' => esc_html__('Select Slider Type', 'spark-multipurpose'),
    'choices' => array(
        'default' => esc_html__('Default Slider', 'spark-multipurpose'),
        'video' => esc_html__('Video Banner', 'spark-multipurpose')
    )
));

// Normal Page Slider Type
$wp_customize->add_setting('spark_multipurpose_banner_sliders', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'spark_multipurpose_sanitize_repeater',		//done
    'default' => json_encode(array(
        array(
            'subtitile'  => '',
            'slider_page' => '',
            'button_text' => '',
            'button_url' => '',
            'button_one_text' => '',
            'button_one_url' => '',
        )
    ))
));
$wp_customize->add_control(new Spark_Multipurpose_Repeater_Control( $wp_customize, 'spark_multipurpose_banner_sliders', 
    array(
        'label' 	   => esc_html__('Banner Slider Page Settings', 'spark-multipurpose'),
        'section' 	   => 'spark_multipurpose_slider_section',
        'settings' 	   => 'spark_multipurpose_banner_sliders',
        'box_label' => esc_html__('Slider Settings Options', 'spark-multipurpose'),
        'add_label' => esc_html__('Add New Slider', 'spark-multipurpose'),
    ),
    array(
        'subtitile' => array(
            'type' => 'text',
            'label' => __("Super Title", 'spark-multipurpose'),
        ),
        'slider_page' => array(
            'type' => 'select',
            'label' => esc_html__('Select Slider Page', 'spark-multipurpose'),
            'options' => $pages
        ),
        'button_wrapper_start' => array(
            'type' => 'wrapper-start',
            'label' => esc_html__('First Button Settings','spark-multipurpose'),
        ),
        'button_text' => array(
            'type' => 'text',
            'label' => esc_html__('Enter First Button Text', 'spark-multipurpose'),
            'default' => ''
        ),
        'button_url' => array(
            'type' => 'url',
            'label' => esc_html__('Enter First Button Url', 'spark-multipurpose'),
            'default' => ''
        ),
        'button_wrapper_end' => array(
            'type' => 'wrapper-end',
        ),
        'button_wrapper_start2' => array(
            'type' => 'wrapper-start',
            'label' => esc_html__('Second Button Settings','spark-multipurpose'),
        ),
        'button_one_text' => array(
            'type' => 'text',
            'label' => esc_html__('Enter Second Button Text', 'spark-multipurpose'),
            'default' => ''
        ),
        'button_one_url' => array(
            'type' => 'url',
            'label' => esc_html__('Enter Second Button Url', 'spark-multipurpose'),
            'default' => ''
        ),
        'button_wrapper_end2' => array(
            'type' => 'wrapper-end',
        )
    )
));

/** video banner */
$wp_customize->add_setting('spark_multipurpose_video_banner_url', array(
    'default' => 'DJlmVOSEvGA',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));
$wp_customize->add_control('spark_multipurpose_video_banner_url', array(
    'section' => 'spark_multipurpose_slider_section',
    'type' => 'text',
    'label' => esc_html__('Video Id', 'spark-multipurpose'),
    'description' => 'https://www.youtube.com/watch?v=<strong>DJlmVOSEvGA</strong>. ' . esc_html__('Add only DJlmVOSEvGA', 'spark-multipurpose')
));


/** slider config controls */
$wp_customize->add_setting('slider-controls',
    array(
        'sanitize_callback' => 'spark_multipurpose_sanitize_field_background',
        'transport' => 'postMessage',
        'default'           => json_encode(array(
            'loop'          => 1,
            'autoplay'      => 1,
            'pager'         => 1,
            'controls'      => 1,
            'usecss'        => 1,
            'easing'        => 'fadeOut',
            'slideendanimation'   => 1,
            'drag'          => 1,
            'speed'         => 5000,
            'pause'         => 4000
        )),
    )
);
$wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Group( $wp_customize, 'slider-controls',
        array(
            'label'    => esc_html__( 'Slider Controls', 'spark-multipurpose' ),
            'section'  => 'spark_multipurpose_slider_section',
            'settings' => 'slider-controls',
        ),
        array(
            'loop'      => array(
                'type'  => 'checkbox',
                'label' => esc_html__( 'Loop', 'spark-multipurpose' ),
            ),
            'autoplay' => array(
                'type'  => 'checkbox',
                'label' => esc_html__( 'Auto Play', 'spark-multipurpose' ),
            ),
            'pager' => array(
                'type'  => 'checkbox',
                'label' => esc_html__( 'Pager', 'spark-multipurpose' ),
            ),
            'controls' => array(
                'type'  => 'checkbox',
                'label' => esc_html__( 'Controls', 'spark-multipurpose' ),
            ),
            'drag' => array(
                'type'  => 'checkbox',
                'label' => esc_html__( 'Drag', 'spark-multipurpose' ),
            ),
            'easing'      => array(
                'type'  => 'select',
                'label' => esc_html__( 'Easing', 'spark-multipurpose' ),
                'options' => array(
                    'fadeOut' => __("fadeOut", 'spark-multipurpose'),
                    'fadeIn' => __("fadeIn", 'spark-multipurpose'),
                    'slide' => __("Slide", 'spark-multipurpose'),
                )
            ),
            'speed'      => array(
                'type'  => 'text',
                'label' => esc_html__( 'Speed', 'spark-multipurpose' ),
            ),
            'pause'      => array(
                'type'  => 'text',
                'label' => esc_html__( 'Pause', 'spark-multipurpose' ),
            )
        )
    )
);

/**
 * style
*/
$wp_customize->add_setting('spark_multipurpose_banner_overlay_color', array(
    'default' => 'rgba(0, 0, 0, 0.45)',
    'transport' => 'postMessage',
    'sanitize_callback' => 'spark_multipurpose_sanitize_color_alpha',
));
$wp_customize->add_control(new Spark_Multipurpose_Alpha_Color_Control($wp_customize, 'spark_multipurpose_banner_overlay_color', array(
    'label' => esc_html__('Background Overlay Color', 'spark-multipurpose'),
    'section' => 'spark_multipurpose_slider_section'
)));

$wp_customize->add_setting("spark_multipurpose_slider_supertitle_color", array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "spark_multipurpose_slider_supertitle_color", array(
    'section' => "spark_multipurpose_slider_section",
    'label' => esc_html__('Super Title Color', 'spark-multipurpose'),
)));

$wp_customize->add_setting("spark_multipurpose_slider_title_color", array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "spark_multipurpose_slider_title_color", array(
    'section' => "spark_multipurpose_slider_section",
    'label' => esc_html__('Title Color', 'spark-multipurpose'),
)));

$wp_customize->add_setting("spark_multipurpose_slider_desc_color", array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "spark_multipurpose_slider_desc_color", array(
    'section' => "spark_multipurpose_slider_section",
    'label' => esc_html__('Description Color', 'spark-multipurpose'),
)));


$wp_customize->add_setting("spark_multipurpose_caption_title_font_size", array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_number_blank',
    'default' => '50',
    'transport' => 'postMessage'
));
$wp_customize->add_setting("spark_multipurpose_caption_title_font_size_tablet", array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_number_blank',
    'default' => '50',
    'transport' => 'postMessage'
));

$wp_customize->add_setting("spark_multipurpose_caption_title_font_size_mobile", array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_number_blank',
    'default' => '50',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Spark_Multipurpose_Range_Slider_Control($wp_customize, "spark_multipurpose_caption_title_font_size_group", array(
    'section' => "spark_multipurpose_slider_section",
    'transport' => 'postMessage',
    'label' => esc_html__('Title Font Size(px)', 'spark-multipurpose'),
    'input_attrs' => array(
        'min' => 20,
        'max' => 200,
        'step' => 1,
    ),
    'settings' => array(
        'desktop' => "spark_multipurpose_caption_title_font_size",
        'tablet' => "spark_multipurpose_caption_title_font_size_tablet",
        'mobile' => "spark_multipurpose_caption_title_font_size_mobile",
    ),
)));


$wp_customize->add_setting("spark_multipurpose_caption_desc_font_size", array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_number_blank',
    'default' => '20',
    'transport' => 'postMessage'
));
$wp_customize->add_setting("spark_multipurpose_caption_desc_font_size_tablet", array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_number_blank',
    'default' => '20',
    'transport' => 'postMessage'
));

$wp_customize->add_setting("spark_multipurpose_caption_desc_font_size_mobile", array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_number_blank',
    'default' => '20',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new Spark_Multipurpose_Range_Slider_Control($wp_customize, "spark_multipurpose_caption_desc_font_size_group", array(
    'section' => "spark_multipurpose_slider_section",
    'transport' => 'postMessage',
    'label' => esc_html__('Description Font Size(px)', 'spark-multipurpose'),
    'input_attrs' => array(
        'min' => 10,
        'max' => 200,
        'step' => 1,
    ),
    'settings' => array(
        'desktop' => "spark_multipurpose_caption_desc_font_size",
        'tablet' => "spark_multipurpose_caption_desc_font_size_tablet",
        'mobile' => "spark_multipurpose_caption_desc_font_size_mobile",
    ),
)));



/****
 * Slider Caption Settings
*/
$wp_customize->add_setting('spark_multipurpose_slider_caption_msg', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field'
));
$wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'spark_multipurpose_slider_caption_msg', array(
    'section' => 'spark_multipurpose_slider_section',
    'label' => esc_html__('Slider Caption Settings', 'spark-multipurpose')
)));

$wp_customize->add_setting('spark_multipurpose_banner_caption_overlay_color', array(
    'default' => '',
    'transport' => 'postMessage',
    'sanitize_callback' => 'spark_multipurpose_sanitize_color_alpha',
));
$wp_customize->add_control(new Spark_Multipurpose_Alpha_Color_Control($wp_customize, 'spark_multipurpose_banner_caption_overlay_color', array(
    'label' => esc_html__('Caption Overlay Color', 'spark-multipurpose'),
    'section' => 'spark_multipurpose_slider_section'
)));

$wp_customize->add_setting('spark_multipurpose_slider_caption_alignment', array(
    'default' => 'text-left',
    'sanitize_callback' => 'spark_multipurpose_sanitize_select',
    'transport' => 'postMessage'
));
$wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Buttonset($wp_customize,'spark_multipurpose_slider_caption_alignment',
    array(
        'choices'  => array(
            'text-left' => esc_html__('Left', 'spark-multipurpose'),
            'text-right' => esc_html__('Right', 'spark-multipurpose'),
            'text-center' => esc_html__('Center', 'spark-multipurpose'),
        ),
        'label'    => esc_html__( 'Text Alignment', 'spark-multipurpose' ),
        'section'  => 'spark_multipurpose_slider_section',
        'settings' => 'spark_multipurpose_slider_caption_alignment',
    ))
);

/* Padding*/
$wp_customize->add_setting( 'spark_multipurpose_slider_padding',
	array(
		'sanitize_callback' => 'spark_multipurpose_sanitize_field_default_css_box',
		'default'           => '',
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( new Spark_Multipurpose_Custom_Control_Cssbox( $wp_customize,'spark_multipurpose_slider_padding',
		array(
			'label'    => esc_html__( 'Padding (px)', 'spark-multipurpose' ),
			'section'  => 'spark_multipurpose_slider_section',
			'settings' => 'spark_multipurpose_slider_padding',
		),
		array(),
		array()
	)
);

/* Margin*/
$wp_customize->add_setting( 'spark_multipurpose_slider_margin',
	array(
		'sanitize_callback' => 'spark_multipurpose_sanitize_field_default_css_box',
		'default'           => '',
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( new Spark_Multipurpose_Custom_Control_Cssbox( $wp_customize,'spark_multipurpose_slider_margin',
		array(
			'label'    => esc_html__( 'Margin (px)', 'spark-multipurpose' ),
			'section'  => 'spark_multipurpose_slider_section',
			'settings' => 'spark_multipurpose_slider_margin',
		),
		array(),
		array()
	)
);

$wp_customize->add_setting( 'spark_multipurpose_slider_caption_radius',
	array(
		'sanitize_callback' => 'spark_multipurpose_sanitize_field_default_css_box',
		'default'           => '',
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( new Spark_Multipurpose_Custom_Control_Cssbox( $wp_customize, 'spark_multipurpose_slider_caption_radius',
		array(
			'label'    => esc_html__( 'Radius (px)', 'spark-multipurpose' ),
			'section'  => 'spark_multipurpose_slider_section',
			'settings' => 'spark_multipurpose_slider_caption_radius',
		),
		array(),
		array()
	)
);

// height heading 
$wp_customize->add_setting('spark_multipurpose_slider_height_msg', array(
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));
$wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'spark_multipurpose_slider_height_msg', array(
    'section' => 'spark_multipurpose_slider_section',
    'label' => esc_html__('Slider Height', 'spark-multipurpose')
)));

$wp_customize->add_setting("spark_multipurpose_slider_height", array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_number_blank',
    'default' => 90,
    'transport' => 'postMessage'
));
$wp_customize->add_setting("spark_multipurpose_slider_height_tablet", array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_number_blank',
    'default' => 50,
    'transport' => 'postMessage'
));
$wp_customize->add_setting("spark_multipurpose_slider_height_mobile", array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_number_blank',
    'default' => 50,
    'transport' => 'postMessage'
));
$wp_customize->add_control(new Spark_Multipurpose_Range_Slider_Control($wp_customize, "spark_multipurpose_slider_height_group", array(
    'section' => "spark_multipurpose_slider_section",
    'transport' => 'postMessage',
    'label' => esc_html__('Height(vh)', 'spark-multipurpose'),
    'input_attrs' => array(
        'min' => 20,
        'max' => 100,
        'step' => 1,
    ),
    'settings' => array(
        'desktop' => "spark_multipurpose_slider_height",
        'tablet' => "spark_multipurpose_slider_height_tablet",
        'mobile' => "spark_multipurpose_slider_height_mobile",
    ),
)));


/**
 * seprator
 */
$wp_customize->add_setting("spark_multipurpose_slider_seperator0", array(
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));
$wp_customize->add_control(new Spark_Multipurpose_Separator_Control($wp_customize, "spark_multipurpose_slider_seperator0", array(
    'section' => "spark_multipurpose_slider_section",
)));

$wp_customize->add_setting("spark_multipurpose_slider_section_seperator", array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'no',
));
$wp_customize->add_control("spark_multipurpose_slider_section_seperator", array(
    'section' => "spark_multipurpose_slider_section",
    'type' => 'select',
    'label' => esc_html__('Enable Separator', 'spark-multipurpose'),
    'choices' => array(
        'no' => esc_html__('Disable', 'spark-multipurpose'),
        'bottom' => esc_html__('Enable Bottom Separator', 'spark-multipurpose'),
    )
));

$wp_customize->add_setting("spark_multipurpose_slider_bottom_seperator", array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => 'water-waves',
    'transport' => 'postMessage'
));
$wp_customize->add_control("spark_multipurpose_slider_bottom_seperator", array(
    'section' => "spark_multipurpose_slider_section",
    'type' => 'select',
    'label' => esc_html__('Bottom Separator', 'spark-multipurpose'),
    'choices' => spark_multipurpose_svg_seperator(),
));

$wp_customize->add_setting("spark_multipurpose_slider_bs_color", array(
    'default' => '#e42032',
    'sanitize_callback' => 'spark_multipurpose_sanitize_color_alpha',
    'transport' => 'postMessage'
));
$wp_customize->add_control(new Spark_Multipurpose_Alpha_Color_Control($wp_customize, "spark_multipurpose_slider_bs_color", array(
    'section' => "spark_multipurpose_slider_section",
    'label' => esc_html__('Bottom Separator Color', 'spark-multipurpose'),
)));

$wp_customize->add_setting("spark_multipurpose_slider_bs_height", array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_number_blank',
    'default' => 60,
    'transport' => 'postMessage'
));
$wp_customize->add_setting("spark_multipurpose_slider_bs_height_tablet", array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_number_blank',
    'default' => 40,
    'transport' => 'postMessage'
));
$wp_customize->add_setting("spark_multipurpose_slider_bs_height_mobile", array(
    'sanitize_callback' => 'spark_multipurpose_sanitize_number_blank',
    'default' => 20,
    'transport' => 'postMessage'
));
$wp_customize->add_control(new Spark_Multipurpose_Range_Slider_Control($wp_customize, "spark_multipurpose_slider_bs_height", array(
    'section' => "spark_multipurpose_slider_section",
    'transport' => 'postMessage',
    'label' => esc_html__('Bottom Separator Height (px)', 'spark-multipurpose'),
    'input_attrs' => array(
        'min' => 20,
        'max' => 200,
        'step' => 1,
    ),
    'settings' => array(
        'desktop' => "spark_multipurpose_slider_bs_height",
        'tablet' => "spark_multipurpose_slider_bs_height_tablet",
        'mobile' => "spark_multipurpose_slider_bs_height_mobile",
    )
)));


$wp_customize->selective_refresh->add_partial( 'spark_multipurpose_slider_refresh', array (
    'settings' => array(
        'spark_multipurpose_banner_slider_section',
        'spark_multipurpose_slider_type',
        'spark_multipurpose_banner_sliders',
        'spark_multipurpose_video_banner_url',
        'slider-controls',
        'spark_multipurpose_slider_section_seperator',
        'spark_multipurpose_slider_bottom_seperator'
    ),
    'selector' => '.banner-wrapper',
    'fallback_refresh' => true,
	'container_inclusive' => true,
    'render_callback' => function () {
        return get_template_part( 'section/section', 'slider' );
    }
));

$wp_customize->add_setting('spark_multipurpose_slider_upgrade_text', array(
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control(new Spark_Multipurpose_Upgrade_Text($wp_customize, 'spark_multipurpose_slider_upgrade_text', array(
    'section' => 'spark_multipurpose_slider_section',
    'label' => esc_html__('For more settings,', 'spark-multipurpose'),
    'choices' => array(
        esc_html__('Banner Section', 'spark-multipurpose'),
        esc_html__('Video Caption', 'spark-multipurpose'),
        esc_html__('Multiple Layout', 'spark-multipurpose'),
        esc_html__('Typography', 'spark-multipurpose'),
        esc_html__('And more...', 'spark-multipurpose'),
    ),
    'priority' => 400
)));
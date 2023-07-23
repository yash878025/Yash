<?php
/**
 * Theme Customizer
 *
 */
$wp_customize->add_section('spark_multipurpose_quick_info', array(
    'title' => esc_html__('Quick Information', 'spark-multipurpose'),
	'panel' => 'spark_multipurpose_header_settings',
	'priority' => 200
));

	$wp_customize->add_setting('spark_multipurpose_quick_nav', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
		'priority' => -1,
	));
	$wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Tab($wp_customize, 'spark_multipurpose_quick_nav', array(
		'type' => 'tab',
		'section' => 'spark_multipurpose_quick_info',
		'buttons' => array(
			array(
				'name' => esc_html__('Settings', 'spark-multipurpose'),
				'fields' => array(
					'spark_multipurpose_quick_content',
				),
				'active' => true,
			),
			array(
				'name' => esc_html__('Style', 'spark-multipurpose'),
				'fields' => array(
					'spark_multipurpose_quick_info_icon_color',
					'spark_multipurpose_quick_info_color',
				)
			)
		)
	)));

	$wp_customize->add_setting('spark_multipurpose_quick_content', array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'spark_multipurpose_sanitize_repeater',
		'default' => json_encode(array(
			array(
				'icon' => 'fas fa-phone-volume',
				'label' => esc_html('Call Anytime 24/7','spark-multipurpose'),
				'val' => '+01-559-236-8009',
				'link' => '',
				'enable' => 'on'
			),
			array(
				'icon' => 'fas fa-map-marker-alt',
				'label' => esc_html('Office Address','spark-multipurpose'),
				'val' => '28 Street, New York City',
				'link' => '',
				'enable' => 'on'
			),
			array(
				'icon' => 'far fa-envelope',
				'label' => esc_html('Mail Us For Support','spark-multipurpose'),
				'val' => 'info@sptheme.com',
				'link' => '',
				'enable' => 'on'
			)
		))
	));
	$wp_customize->add_control(new Spark_Multipurpose_Repeater_Control($wp_customize, 'spark_multipurpose_quick_content', array(
			'label' => esc_html__('Information', 'spark-multipurpose'),
			'section' => 'spark_multipurpose_quick_info',
			'box_label' => esc_html__('Information Item', 'spark-multipurpose'),
			'add_label' => esc_html__('Add New', 'spark-multipurpose'),
		), 
		array(
			'icon' => array(
				'type' => 'icon',
				'label' => esc_html__('Icon', 'spark-multipurpose'),
				'default' => ''
			),
			'label' => array(
				'type' => 'text',
				'label' => esc_html__('Label', 'spark-multipurpose'),
				'default' => ''
			),
			'val' => array(
				'type' => 'text',
				'label' => esc_html__('Value', 'spark-multipurpose'),
				'default' => ''
			),
			'link' => array(
				'type' => 'text',
				'label' => esc_html__('Link', 'spark-multipurpose'),
				'default' => ''
			),
			

			'enable' => array(
				'type' => 'switch',
				'label' => esc_html__('Enable', 'spark-multipurpose'),
				'switch' => array(
					'on' => __('Yes', 'spark-multipurpose'),
					'off' => __('No', 'spark-multipurpose')
				),
				'default' => 'on'
			)
		)
	));

	/******
	 * Style ( Color )
	*/
	$wp_customize->add_setting("spark_multipurpose_quick_info_icon_color", array(
		'default' => '',
		'sanitize_callback' => 'spark_multipurpose_sanitize_color_alpha',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(new Spark_Multipurpose_Alpha_Color_Control($wp_customize, "spark_multipurpose_quick_info_icon_color", array(
		'section' => 'spark_multipurpose_quick_info',
		'label' => esc_html__('Icon Color', 'spark-multipurpose'),
	)));

	$wp_customize->add_setting("spark_multipurpose_quick_info_color", array(
		'default' => '',
		'sanitize_callback' => 'spark_multipurpose_sanitize_color_alpha',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(new Spark_Multipurpose_Alpha_Color_Control($wp_customize, "spark_multipurpose_quick_info_color", array(
		'section' => 'spark_multipurpose_quick_info',
		'label' => esc_html__('Text Color', 'spark-multipurpose'),
	)));

	$wp_customize->selective_refresh->add_partial( 'spark_multipurpose_quick_content', array (
		'settings' => array( 
			'spark_multipurpose_quick_content' 
		),
		'selector' => '.contact-info',
		'container_inclusive' => true,
		'render_callback' => function () {
			if( get_theme_mod('spark_multipurpose_header_layout', 'layout_one') == 'layout_one'){
				return do_action('spark_multipurpose_quick_contact_info_header');
			}	
		}
	));
<?php
/**
 * Typography Section
 */
require get_template_directory() .'/inc/custom-controller/typography/typography-control-class.php';
function spark_multipurpose_customize_register_for_typography( $wp_customize ) {

    $wp_customize->register_control_type('Spark_Multipurpose_Typography_Control');
    // Add the typography panel.
    $wp_customize->add_panel('typography', array(
        'priority' => 1,
        'title' => esc_html__('Typography Setting', 'spark-multipurpose')
    ));

    // Add the body typography section.
    $wp_customize->add_section('body_typography', array(
        'panel' => 'typography',
        'title' => esc_html__('Body', 'spark-multipurpose')
    ));

    $wp_customize->add_setting('body_font_family', array(
        'default' => 'Pontano Sans',
        'sanitize_callback' => 'sanitize_text_field',
        // 'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('body_font_style', array(
        'default' => '400',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('body_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('body_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('body_font_size', array(
        'default' => '16',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('body_line_height', array(
        'default' => '1.6',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('body_color', array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Spark_Multipurpose_Typography_Control($wp_customize, 'body_typography', array(
        'label' => esc_html__('Body Typography', 'spark-multipurpose'),
        'description' => __('Select how you want your body to appear.', 'spark-multipurpose'),
        'section' => 'body_typography',
        'settings' => array(
            'family' => 'body_font_family',
            'style' => 'body_font_style',
            'text_decoration' => 'body_text_decoration',
            'text_transform' => 'body_text_transform',
            'size' => 'body_font_size',
            'line_height' => 'body_line_height',
            'typocolor' => 'body_color'
        ),
        'input_attrs' => array(
            'min' => 10,
            'max' => 40,
            'step' => 1
        )
    )));

    // Add H1 typography section.
    $wp_customize->add_section('header_typography', array(
        'panel' => 'typography',
        'title' => esc_html__('Headers(H1, H2, H3, H4, H5, H6)', 'spark-multipurpose')
    ));

    $wp_customize->add_setting('common_header_typography', array(
        'sanitize_callback' => 'spark_multipurpose_sanitize_text',
        'default' => false
    ));

    $wp_customize->add_control(new Spark_Multipurpose_Checkbox_Control($wp_customize, 'common_header_typography', array(
        'section' => 'header_typography',
        'label' => esc_html__('Use Common Typography for all Headers', 'spark-multipurpose')
    )));

    // Add H typography section.
    $wp_customize->add_setting('h_font_family', array(
        'default' => 'Poppins',
        'sanitize_callback' => 'sanitize_text_field',
        // 'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h_font_style', array(
        'default' => '400',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h_font_size', array(
        'default' => '42',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h_line_height', array(
        'default' => '1.3',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h_letter_spacing', array(
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Spark_Multipurpose_Typography_Control($wp_customize, 'h_typography', array(
        'label' => esc_html__('Header Typography', 'spark-multipurpose'),
        'description' => __('Select how you want your Header to appear.', 'spark-multipurpose'),
        'section' => 'header_typography',
        'settings' => array(
            'family' => 'h_font_family',
            'style' => 'h_font_style',
            'text_decoration' => 'h_text_decoration',
            'text_transform' => 'h_text_transform',
            'size' => 'h_font_size',
            'line_height' => 'h_line_height',
            'letter_spacing' => 'h_letter_spacing'
        ),
        'input_attrs' => array(
            'min' => 20,
            'max' => 100,
            'step' => 1
        )
    )));

    
    $wp_customize->add_setting('header_typography_nav', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control(new Spark_Multipurpose_Custom_Control_Tab($wp_customize, 'header_typography_nav', array(
        'type' => 'tab',
        'section' => 'header_typography',
        //'priority' => 1,
        'buttons' => array(
            array(
                'name' => esc_html__('H1', 'spark-multipurpose'),
                'fields' => array(
                    'h1_typography_heading',
                    'h1_typography',
                ),
                'active' => true
            ),
            array(
                'name' => esc_html__('H2', 'spark-multipurpose'),
                'fields' => array(
                    'h2_typography_heading',
                    'h2_typography',
                )
            ),
            array(
                'name' => esc_html__('H3', 'spark-multipurpose'),
                'fields' => array(
                    'h3_typography_heading',
                    'h3_typography',
                )
            ),
            array(
                'name' => esc_html__('H4', 'spark-multipurpose'),
                'fields' => array(
                    'h4_typography_heading',
                    'h4_typography',
                )
            ),
            array(
                'name' => esc_html__('H5', 'spark-multipurpose'),
                'fields' => array(
                    'h5_typography_heading',
                    'h5_typography',
                )
            ),
            array(
                'name' => esc_html__('H6', 'spark-multipurpose'),
                'fields' => array(
                    'h6_typography_heading',
                    'h6_typography',
                )
            )
        ),
    )));

    // Add H1 typography section.
    $wp_customize->add_setting('h1_typography_heading', array(
        'sanitize_callback' => 'spark_multipurpose_sanitize_text'
    ));

    $wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'h1_typography_heading', array(
        'section' => 'header_typography',
        'label' => esc_html__('Header H1', 'spark-multipurpose')
    )));

    $wp_customize->add_setting('h1_font_family', array(
        'default' => 'Poppins',
        'sanitize_callback' => 'sanitize_text_field',
        // 'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h1_font_style', array(
        'default' => '900',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h1_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h1_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h1_font_size', array(
        'default' => '38',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h1_line_height', array(
        'default' => '1.7',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h1_letter_spacing', array(
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Spark_Multipurpose_Typography_Control($wp_customize, 'h1_typography', array(
        'label' => esc_html__('Header H1 Typography', 'spark-multipurpose'),
        'description' => __('Select how you want your H1 to appear.', 'spark-multipurpose'),
        'section' => 'header_typography',
        'settings' => array(
            'family' => 'h1_font_family',
            'style' => 'h1_font_style',
            'text_decoration' => 'h1_text_decoration',
            'text_transform' => 'h1_text_transform',
            'size' => 'h1_font_size',
            'line_height' => 'h1_line_height',
            'letter_spacing' => 'h1_letter_spacing'
        ),
        'input_attrs' => array(
            'min' => 20,
            'max' => 100,
            'step' => 1
        )
    )));

    // Add H2 typography section.
    $wp_customize->add_setting('h2_typography_heading', array(
        'sanitize_callback' => 'spark_multipurpose_sanitize_text'
    ));

    $wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'h2_typography_heading', array(
        'section' => 'header_typography',
        'label' => esc_html__('Header H2', 'spark-multipurpose')
    )));

    $wp_customize->add_setting('h2_font_family', array(
        'default' => 'Poppins',
        'sanitize_callback' => 'sanitize_text_field',
        // 'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h2_font_style', array(
        'default' => '800',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h2_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h2_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h2_font_size', array(
        'default' => '34',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h2_line_height', array(
        'default' => '1.3',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h2_letter_spacing', array(
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Spark_Multipurpose_Typography_Control($wp_customize, 'h2_typography', array(
        'label' => esc_html__('Header H2 Typography', 'spark-multipurpose'),
        'description' => __('Select how you want your H2 to appear.', 'spark-multipurpose'),
        'section' => 'header_typography',
        'settings' => array(
            'family' => 'h2_font_family',
            'style' => 'h2_font_style',
            'text_decoration' => 'h2_text_decoration',
            'text_transform' => 'h2_text_transform',
            'size' => 'h2_font_size',
            'line_height' => 'h2_line_height',
            'letter_spacing' => 'h2_letter_spacing'
        ),
        'input_attrs' => array(
            'min' => 20,
            'max' => 100,
            'step' => 1
        )
    )));

    // Add H3 typography section.
    $wp_customize->add_setting('h3_typography_heading', array(
        'sanitize_callback' => 'spark_multipurpose_sanitize_text'
    ));

    $wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'h3_typography_heading', array(
        'section' => 'header_typography',
        'label' => esc_html__('Header H3', 'spark-multipurpose')
    )));

    $wp_customize->add_setting('h3_font_family', array(
        'default' => 'Poppins',
        'sanitize_callback' => 'sanitize_text_field',
        // 'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h3_font_style', array(
        'default' => '700',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h3_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h3_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h3_font_size', array(
        'default' => '30',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h3_line_height', array(
        'default' => '1.3',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h3_letter_spacing', array(
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Spark_Multipurpose_Typography_Control($wp_customize, 'h3_typography', array(
        'label' => esc_html__('Header H3 Typography', 'spark-multipurpose'),
        'description' => __('Select how you want your H3 to appear.', 'spark-multipurpose'),
        'section' => 'header_typography',
        'settings' => array(
            'family' => 'h3_font_family',
            'style' => 'h3_font_style',
            'text_decoration' => 'h3_text_decoration',
            'text_transform' => 'h3_text_transform',
            'size' => 'h3_font_size',
            'line_height' => 'h3_line_height',
            'letter_spacing' => 'h3_letter_spacing'
        ),
        'input_attrs' => array(
            'min' => 20,
            'max' => 100,
            'step' => 1
        )
    )));

    // Add H4 typography section.
    $wp_customize->add_setting('h4_typography_heading', array(
        'sanitize_callback' => 'spark_multipurpose_sanitize_text'
    ));

    $wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'h4_typography_heading', array(
        'section' => 'header_typography',
        'label' => esc_html__('Header H4', 'spark-multipurpose')
    )));

    $wp_customize->add_setting('h4_font_family', array(
        'default' => 'Poppins',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h4_font_style', array(
        'default' => '600',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h4_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h4_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h4_font_size', array(
        'default' => '26',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h4_line_height', array(
        'default' => '1.3',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h4_letter_spacing', array(
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Spark_Multipurpose_Typography_Control($wp_customize, 'h4_typography', array(
        'label' => esc_html__('Header H4 Typography', 'spark-multipurpose'),
        'description' => __('Select how you want your H4 to appear.', 'spark-multipurpose'),
        'section' => 'header_typography',
        'settings' => array(
            'family' => 'h4_font_family',
            'style' => 'h4_font_style',
            'text_decoration' => 'h4_text_decoration',
            'text_transform' => 'h4_text_transform',
            'size' => 'h4_font_size',
            'line_height' => 'h4_line_height',
            'letter_spacing' => 'h4_letter_spacing'
        ),
        'input_attrs' => array(
            'min' => 20,
            'max' => 100,
            'step' => 1
        )
    )));

    // Add H5 typography section.
    $wp_customize->add_setting('h5_typography_heading', array(
        'sanitize_callback' => 'spark_multipurpose_sanitize_text'
    ));

    $wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'h5_typography_heading', array(
        'section' => 'header_typography',
        'label' => esc_html__('Header H5', 'spark-multipurpose')
    )));

    $wp_customize->add_setting('h5_font_family', array(
        'default' => 'Poppins',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h5_font_style', array(
        'default' => '500',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h5_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h5_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h5_font_size', array(
        'default' => '22',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h5_line_height', array(
        'default' => '1.3',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h5_letter_spacing', array(
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Spark_Multipurpose_Typography_Control($wp_customize, 'h5_typography', array(
        'label' => esc_html__('Header H5 Typography', 'spark-multipurpose'),
        'description' => __('Select how you want your H6 to appear.', 'spark-multipurpose'),
        'section' => 'header_typography',
        'settings' => array(
            'family' => 'h5_font_family',
            'style' => 'h5_font_style',
            'text_decoration' => 'h5_text_decoration',
            'text_transform' => 'h5_text_transform',
            'size' => 'h5_font_size',
            'line_height' => 'h5_line_height',
            'letter_spacing' => 'h5_letter_spacing'
        ),
        'input_attrs' => array(
            'min' => 20,
            'max' => 100,
            'step' => 1
        )
    )));

    // Add H6 typography section.
    $wp_customize->add_setting('h6_typography_heading', array(
        'sanitize_callback' => 'spark_multipurpose_sanitize_text'
    ));

    $wp_customize->add_control(new Spark_Multipurpose_Customize_Heading($wp_customize, 'h6_typography_heading', array(
        'section' => 'header_typography',
        'label' => esc_html__('Header H6', 'spark-multipurpose')
    )));

    $wp_customize->add_setting('h6_font_family', array(
        'default' => 'Poppins',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h6_font_style', array(
        'default' => '400',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h6_text_decoration', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h6_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h6_font_size', array(
        'default' => '20',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h6_line_height', array(
        'default' => '1.3',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('h6_letter_spacing', array(
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Spark_Multipurpose_Typography_Control($wp_customize, 'h6_typography', array(
        'label' => esc_html__('Header H6 Typography', 'spark-multipurpose'),
        'description' => __('Select how you want your H6 to appear.', 'spark-multipurpose'),
        'section' => 'header_typography',
        'settings' => array(
            'family' => 'h6_font_family',
            'style' => 'h6_font_style',
            'text_decoration' => 'h6_text_decoration',
            'text_transform' => 'h6_text_transform',
            'size' => 'h6_font_size',
            'line_height' => 'h6_line_height',
            'letter_spacing' => 'h6_letter_spacing'
        ),
        'input_attrs' => array(
            'min' => 20,
            'max' => 100,
            'step' => 1
        )
    )));
}
add_action( 'customize_register', 'spark_multipurpose_customize_register_for_typography' );

/**
 * Load preview scripts/styles.
 *
 */
add_action('customize_preview_init', 'spark_multipurpose_typography_customize_preview_script');

function spark_multipurpose_typography_customize_preview_script() {
    wp_enqueue_script('webfont', 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js', array('jquery'));
}

function spark_multipurpose_get_google_font_variants() {

    $font_list = array_merge(spark_multipurpose_standard_font_array(), spark_multipurpose_google_font_array());

    $font_family = $_REQUEST['font_family'];
    $font_array = spark_multipurpose_search_key($font_list, 'family', $font_family);

    $variants_array = $font_array['0']['variants'];
    $options_array = "";
    foreach ($variants_array as $key => $variants) {
        $selected = $key == '400' ? 'selected="selected"' : '';
        $options_array .= '<option ' . $selected . ' value="' . $key . '">' . $variants . '</option>';
    }

    if (!empty($options_array)) {
        echo $options_array;
    } else {
        echo $options_array = '';
    }
    die();
}

add_action("wp_ajax_get_google_font_variants", "spark_multipurpose_get_google_font_variants");

function spark_multipurpose_search_key($array, $key, $value) {
    $results = array();
    if (is_array($array)) {
        if (isset($array[$key]) && $array[$key] == $value) {
            $results[] = $array;
        }
        foreach ($array as $subarray) {
            $results = array_merge($results, spark_multipurpose_search_key($subarray, $key, $value));
        }
    }
    return $results;
}

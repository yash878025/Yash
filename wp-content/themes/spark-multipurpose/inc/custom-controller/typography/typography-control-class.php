<?php

/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Spark_Multipurpose_Typography_Control' ) ) :
    class Spark_Multipurpose_Typography_Control extends WP_Customize_Control {

        /**
         * The type of customize control being rendered.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $type = 'spark-multipurpose-typography';

        /**
         * Array 
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $lables = array();

        public $fontUtil = null;
        /**
         * Set up our control.
         *
         * @since  1.0.0
         * @access public
         */
        public function __construct($manager, $id, $args = array()) {
            
            parent::__construct($manager, $id, $args);
            // Make sure we have labels.
            $this->lables = wp_parse_args(
                $this->lables, array(
                    'family' => esc_html__('Font Family', 'spark-multipurpose'),
                    'style' => esc_html__('Font Weight', 'spark-multipurpose'),
                    'text_transform' => esc_html__('Text Transform', 'spark-multipurpose'),
                    'text_decoration' => esc_html__('Text Decoration', 'spark-multipurpose'),
                    'size' => esc_html__('Font Size', 'spark-multipurpose'),
                    'line_height' => esc_html__('Line Height', 'spark-multipurpose'),
                    'letter_spacing' => esc_html__('Letter Spacing', 'spark-multipurpose'),
                    'color' => esc_html__('Font Color', 'spark-multipurpose')
                )
            );

            $this->fontUtil = new Spark_Multipurpose_Typography_Utils();
        }

        /**
         * Enqueue scripts/styles.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function enqueue() {
            wp_enqueue_script('spark-multipurpose-customize-typograhpy-controls', get_template_directory_uri() . '/inc/custom-controller/typography/js/customize-controls.js', array('jquery'), null, true);
            wp_enqueue_style('spark-multipurpose-customize-typograhpy-controls', get_template_directory_uri() . '/inc/custom-controller/typography/css/customize-controls.css', array(), null);
        }

        /**
         * Add custom parameters to pass to the JS via JSON.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function to_json() {
            parent::to_json();
            // Loop through each of the settings and set up the data for it.
            $this->json['inputAttrs'] = '';
            foreach ($this->input_attrs as $attr => $value) {
                $this->json['inputAttrs'] .= esc_attr($attr) . '="' . esc_attr($value) . '" ';
            }

            foreach ($this->settings as $setting_key => $setting_id) {
                $this->json[$setting_key] = array(
                    'link' => $this->get_link($setting_key),
                    'value' => $this->value($setting_key),
                    'label' => isset($this->lables[$setting_key]) ? $this->lables[$setting_key] : ''
                );

                if ('family' === $setting_key) {
                    $this->json[$setting_key]['default_choices'] = $this->get_default_font_families();
                    $this->json[$setting_key]['google_choices'] = $this->get_google_font_families();
                    $this->json[$setting_key]['standard_choices'] = $this->get_standard_font_families();
                } elseif ('style' === $setting_key) {
                    $this->json[$setting_key]['choices'] = $this->get_font_weight_choices();
                } elseif ('text_transform' === $setting_key) {
                    $this->json[$setting_key]['choices'] = $this->get_text_transform_choices();
                } elseif ('text_decoration' === $setting_key) {
                    $this->json[$setting_key]['choices'] = $this->get_text_decoration_choices();
                }
            }
        }

        /**
         * Returns the available Default font families.
         *
         * @todo Pull families from `get_default_font_families()`.
         *
         * @since  1.0.0
         * @access public
         * @return array
         */
        function get_default_font_families() {

            $default_font = $this->fontUtil->default_font_array();

            foreach ($default_font as $key => $value) {
                $font_family[$value['family']] = $value['family'];
            }
            return $font_family;
        }


        /**
         * Underscore JS template to handle the control's output.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function content_template() {
            ?>
            <# if ( data.label ) { #>
            <span class="customize-control-title">{{ data.label }}</span>
            <# } #>

            <# if ( data.description ) { #>
            <span class="description customize-control-description">{{{ data.description }}}</span>
            <# } #>

            <ul>
                <# if ( data.family && (data.family.standard_choices || data.family.google_choices) ) { #>
                <li class="spark-multipurpose-typography-font-family">
                    <# if ( data.family.label ) { #>
                    <span class="spark-multipurpose-typography-customize-control-title">{{ data.family.label }}</span>
                    <# } #>

                    <select {{{ data.family.link }}} data-default="{{data.family.default}}">

                        <# if ( data.family.default_choices ) { #>
                        <# _.each( data.family.default_choices, function( label, choice ) { #>
                        <option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
                        <# } ) #>
                        <# } #> 

                        <# if ( data.family.standard_choices ) { #>
                        <optgroup label="Standard Fonts">
                            <# _.each( data.family.standard_choices, function( label, choice ) { #>
                            <option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
                            <# } ) #>
                        </optgroup>
                        <# } #>

                        <# if ( data.family.google_choices ) { #>
                        <optgroup label="Google Fonts">
                            <# _.each( data.family.google_choices, function( label, choice ) { #>
                            <option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
                            <# } ) #>
                        </optgroup>
                        <# } #>

                    </select>
                </li>
                <# } #>

                <# if ( data.style && data.style.choices ) { #>
                <li class="spark-multipurpose-typography-font-style">
                    <# if ( data.style.label ) { #>
                    <span class="spark-multipurpose-typography-customize-control-title">{{ data.style.label }}</span>
                    <# } #>
                    <select {{{ data.style.link }}}>
                        <# _.each( data.style.choices, function( label, choice ) { #>
                        <option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>
                        <# } ) #>
                    </select>
                </li>
                <# } #>

                <# if ( data.text_transform && data.text_transform.choices ) { #>
                <li class="spark-multipurpose-typography-text-transform">
                    <# if ( data.text_transform.label ) { #>
                    <span class="spark-multipurpose-typography-customize-control-title">{{ data.text_transform.label }}</span>
                    <# } #>

                    <select {{{ data.text_transform.link }}}>

                        <# _.each( data.text_transform.choices, function( label, choice ) { #>

                        <option value="{{ choice }}" <# if ( choice === data.text_transform.value ) { #> selected="selected" <# } #>>{{ label }}</option>

                        <# } ) #>
                    </select>
                </li>
                <# } #>

                <# if ( data.text_decoration && data.text_decoration.choices ) { #>
                <li class="spark-multipurpose-typography-text-decoration">
                    <# if ( data.text_decoration.label ) { #>
                    <span class="spark-multipurpose-typography-customize-control-title">{{ data.text_decoration.label }}</span>
                    <# } #>

                    <select {{{ data.text_decoration.link }}}>

                        <# _.each( data.text_decoration.choices, function( label, choice ) { #>

                        <option value="{{ choice }}" <# if ( choice === data.text_decoration.value ) { #> selected="selected" <# } #>>{{ label }}</option>

                        <# } ) #>
                    </select>
                </li>
                <# } #>

                <# if ( data.size ) { #>

                <li class="spark-multipurpose-typography-font-size">
                    <# if ( data.size.label ) { #>
                    <span class="spark-multipurpose-typography-customize-control-title">{{ data.size.label }} </span>
                    <# } #>
                    <div class="spark-multipurpose-typography-slider">
                        <div class="spark-multipurpose-typography-slider-range spark-multipurpose-slider-range-font-size" {{{ data.inputAttrs }}} ></div>
                        <div class="spark-multipurpose-slider-value-font-size"><span {{{ data.size.link }}} value="{{ data.size.value }}"></span> px</div>
                    </div>
                </li>
                <# } #>

                <# if ( data.letter_spacing ) { #>

                <li class="spark-multipurpose-typography-letter-spacing">
                    <# if ( data.letter_spacing.label ) { #>
                    <span class="spark-multipurpose-typography-customize-control-title">{{ data.letter_spacing.label }}</span>
                    <# } #>

                    <div class="spark-multipurpose-typography-slider">
                        <div class="spark-multipurpose-typography-slider-range spark-multipurpose-slider-range-letter-spacing"></div>  
                        <div class="spark-multipurpose-slider-value-letter-spacing"><span {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}"></span> px</div>
                    </div>
                </li>
                <# } #>

                <# if ( data.line_height ) { #>

                <li class="spark-multipurpose-typography-line-height">
                    <# if ( data.line_height.label ) { #>
                    <span class="spark-multipurpose-typography-customize-control-title">{{ data.line_height.label }}</span>
                    <# } #>

                    <div class="spark-multipurpose-typography-slider">
                        <div class="spark-multipurpose-typography-slider-range spark-multipurpose-slider-range-line-height" ></div> 
                        <div class="spark-multipurpose-slider-value-line-height"><span {{{ data.line_height.link }}} value="{{ data.line_height.value }}"></span></div>
                    </div>
                </li>
                <# } #>

                <# if ( data.color ) { #>
                <li class="spark-multipurpose-typography-color">
                    <# if ( data.color.label ) { #>
                    <span class="spark-multipurpose-typography-customize-control-title">{{{ data.color.label }}}</span>
                    <# } #>

                    <div class="customize-control-content">
                        <input class="spark-multipurpose-color-picker-hex" type="text" maxlength="7" placeholder="<?php esc_attr_e('Hex Value', 'spark-multipurpose'); ?>" {{{ data.color.link }}} value="{{ data.color.value }}"  />
                    </div>
                </li>
                <# } #>

            </ul>
            <?php
        }

        
        /**
         * Returns the available Google font families.
         *
         * @todo Pull families from `get_google_font_families()`.
         *
         * @since  1.0.0
         * @access public
         * @return array
         */
        function get_google_font_families() {

            $google_font = $this->fontUtil->google_font_array();

            foreach ($google_font as $key => $value) {
                $font_family[$value['family']] = $value['family'];
            }
            return $font_family;
        }

        

        /**
         * Returns the available font weights.
         *
         * @since  1.0.0
         * @access public
         * @return array
         */
        public function get_font_weight_choices() {
            $variants_array = array();
            $all_font = $this->fontUtil->font_array();

            if ($this->settings['family']->id) {
                $font_family_id = $this->settings['family']->id;
                $default_font_family = $this->settings['family']->default;
                $font_family = get_theme_mod($font_family_id, $default_font_family);

                if (isset($all_font[$font_family]['variants'])) {
                    $variants_array = $all_font[$font_family]['variants'];
                }
                return $variants_array;
            } else {
                return array(
                    '400' => esc_html__('Normal', 'spark-multipurpose'),
                    '400italic' => esc_html__('Normal Italic', 'spark-multipurpose'),
                    '700' => esc_html__('Bold', 'spark-multipurpose'),
                    '700italic' => esc_html__('Bold Italic', 'spark-multipurpose')
                );
            }
        }

        /**
         * Returns the available standard font families.
         *
         * @todo Pull families from `get_standard_font_families()`.
         *
         * @since  1.0.0
         * @access public
         * @return array
         */
        function get_standard_font_families() {

            $standard_font = $this->fontUtil->standard_font_array();

            foreach ($standard_font as $key => $value) {
                $font_family[$value['family']] = $value['family'];
            }
            return $font_family;
        }

        /**
         * Returns the available font text transform.
         *
         * @since  1.0.0
         * @access public
         * @return array
         */
        public function get_text_transform_choices() {
            return array(
                'none' => esc_html__('None', 'spark-multipurpose'),
                'uppercase' => esc_html__('Uppercase', 'spark-multipurpose'),
                'lowercase' => esc_html__('Lowercase', 'spark-multipurpose'),
                'capitalize' => esc_html__('Capitalize', 'spark-multipurpose')
            );
        }


        /**
         * Returns the available font text decoration.
         *
         * @since  1.0.0
         * @access public
         * @return array
         */
        public function get_text_decoration_choices() {
            return array(
                'none' => esc_html__('None', 'spark-multipurpose'),
                'underline' => esc_html__('Underline', 'spark-multipurpose'),
                'line-through' => esc_html__('Line-through', 'spark-multipurpose'),
                'overline' => esc_html__('Overline', 'spark-multipurpose')
            );
        }
    }
endif;

<?php
/**
 * Customizer Control: spark-multipurpose-switch
 *
 * @subpackage  Controls
 * @since       1.0
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Spark_Multipurpose_Range_Control' ) ) :
    /**
     * Range Control
     */
    class Spark_Multipurpose_Range_Control extends WP_Customize_Control {
        /**
         * The type of control being rendered
         */
        public $type = 'range';
        /**
		 * enqueue css and scrpts
		 *
		 * @since  1.0.0
		 */
		public function enqueue() {
            wp_enqueue_style('spark-multipurpose-range-control', get_template_directory_uri() . '/inc/custom-controller/range/range.css', array(), '1.0.0');
			wp_enqueue_script('spark-multipurpose-range-control', get_template_directory_uri().'/inc/custom-controller/range/range.js', array( 'jquery', 'jquery-ui-slider' ), '1.0.0', true);
        }
        /**
         * Render the control in the customizer
         */
        public function render_content() {
            ?>
            <span class="customize-control-title">
                <?php echo esc_html($this->label); ?>
                <span class="slider-reset dashicons dashicons-image-rotate" slider-reset-value="<?php echo esc_attr($this->value()); ?>"></span>
            </span>
            <div class="control-wrap"> 
                <div class="spark-multipurpose-slider" slider-min-value="<?php echo esc_attr($this->input_attrs['min']); ?>" slider-max-value="<?php echo esc_attr($this->input_attrs['max']); ?>" slider-step-value="<?php echo esc_attr($this->input_attrs['step']); ?>"></div>
                <div class="spark-multipurpose-slider-input">
                    <input type="number" value="<?php echo esc_attr($this->value()); ?>" class="slider-input" <?php $this->link(); ?> />
                </div>
            </div>
            <?php
            if ($this->description) {
                ?>
                <span class="description customize-control-description">
                    <?php echo wp_kses_post($this->description); ?>
                </span>
                <?php
            }
        }
    }
endif;
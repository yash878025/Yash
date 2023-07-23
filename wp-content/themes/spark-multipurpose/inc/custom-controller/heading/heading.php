<?php
/**
 * Customizer Control: spark-multipurpose-checkbox
 *
 * @subpackage  Controls
 * @since       1.0
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Spark_Multipurpose_Customize_Heading' ) ) :
    /**
     * Custom Heading Control
     */
    class Spark_Multipurpose_Customize_Heading extends WP_Customize_Control {
        public $type = 'heading';
        /**
		 * enqueue css and scrpts
		 *
		 * @since  1.0.0
		 */
		public function enqueue() {
            wp_enqueue_style('spark-multipurpose-heading-control', get_template_directory_uri() . '/inc/custom-controller/heading/heading.css', array(), '1.0.0');
        }
        public function render_content() {
            if (!empty($this->label)) :
                ?>
                <h3 class="spark-multipurpose-accordion-section-title"><?php echo esc_html($this->label); ?></h3>
                <?php
            endif;
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


if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Spark_Multipurpose_Customize_ShortCode' ) ) :
    /**
     * Custom Heading Control
     */
    class Spark_Multipurpose_Customize_ShortCode extends WP_Customize_Control {
        public $type = 'shortcode';
        /**
		 * enqueue css and scrpts
		 *
		 * @since  1.0.0
		 */
		public function enqueue() {
            // wp_enqueue_style('spark-multipurpose-heading-control', get_template_directory_uri() . '/inc/custom-controller/heading/heading.css', array(), '1.0.0');
        }
        public function render_content() {
            if (!empty($this->label)) :
                ?>
                <h3 class="spark-multipurpose-accordion-section-title"><?php echo esc_html($this->label); ?></h3>
                <?php
            endif;
            if ($this->description) {
                ?>
                <p class="description customize-control-description">
                    <?php echo __("Use this shortcode anywhere to get same content and design.", "spark-multipurpose"); ?>
                </p>
                <code class="code customize-control-code">
                    <?php echo wp_kses_post($this->description); ?>
                </code>
                <?php
            }
        }
    }
endif;
<?php
/**
 * Customizer Control: Spark_Multipurpose_Fontawesome_Icon_Chooser
 *
 * @subpackage  Controls
 * @since       1.0
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Spark_Multipurpose_Fontawesome_Icon_Chooser' ) ) :
    /**
     * Fontawesome Icon Select
     */
    class Spark_Multipurpose_Fontawesome_Icon_Chooser extends WP_Customize_Control {
        public $type = 'icon';
        public $icon_array = array();
        public function __construct($manager, $id, $args = array()) {
            if (isset($args['icon_array'])) {
                $this->icon_array = $args['icon_array'];
            }
            parent::__construct($manager, $id, $args);
        }
        /**
		 * enqueue css and scrpts
		 *
		 * @since  1.0.0
		 */
		public function enqueue() {
            wp_enqueue_style('font-awesome-icon-control', get_template_directory_uri() . '/inc/custom-controller/font-awesome-icon/font-awesome-icon.css', array(), '1.0.0');
			wp_enqueue_script('font-awesome-icon-control', get_template_directory_uri().'/inc/custom-controller/font-awesome-icon/font-awesome-icon.js', array( 'jquery', 'jquery-ui-slider' ), '1.0.0', true);
        }
        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title">
                    <?php echo esc_html($this->label); ?>
                </span>
                <?php if ($this->description) { ?>
                    <span class="description customize-control-description">
                        <?php echo wp_kses_post($this->description); ?>
                    </span>
                <?php } ?>
                <div class="spark-multipurpose-customizer-icon-box">
                    <div class="spark-multipurpose-selected-icon">
                        <i class="<?php echo esc_attr($this->value()); ?>"></i>
                        <span><i class="dashicons dashicons-arrow-down-alt2"></i></span>
                    </div>
                    <div class="spark-multipurpose-icon-box">
                        <div class="spark-multipurpose-icon-search">
                            <input type="text" class="spark-multipurpose-icon-search-input" placeholder="<?php echo esc_attr__('Type to filter', 'spark-multipurpose'); ?>" />
                        </div>
                        <ul class="spark-multipurpose-icon-list fontawesome-list clearfix active">
                            <?php
                            if (isset($this->icon_array) && !empty($this->icon_array)) {
                                $spark_multipurpose_font_awesome_icon_array = $this->icon_array;
                            } else {
                                $spark_multipurpose_font_awesome_icon_array = spark_multipurpose_font_awesome_icon_array();
                            }
                            foreach ($spark_multipurpose_font_awesome_icon_array as $spark_multipurpose_font_awesome_icon) {
                                $icon_class = $this->value() == $spark_multipurpose_font_awesome_icon ? 'icon-active' : '';
                                echo '<li class=' . esc_attr($icon_class) . '><i class="' . esc_attr($spark_multipurpose_font_awesome_icon) . '"></i></li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <input type="hidden" value="<?php esc_attr($this->value()); ?>" <?php $this->link(); ?> />
                </div>
            </label>
            <?php
        }
    }
endif;
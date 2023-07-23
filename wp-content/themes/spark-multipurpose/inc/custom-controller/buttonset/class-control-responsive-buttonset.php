<?php
/**
 * Customizer Control: spark-multipurpose-buttonset.
 *
 * @subpackage  Controls
 * @see         https://github.com/aristath/kirki
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Spark_Multipurpose_Custom_Control_Responsive_Buttonset' ) ) :
	/**
	* Buttonset control
	*/
	class Spark_Multipurpose_Custom_Control_Responsive_Buttonset extends WP_Customize_Control {
		/**
		* The control type.
		*
		* @access public
		* @var string
		*/
		public $type = 'spark-multipurpose-responsive-buttonset';
		/**
		* Repeater drag and drop controler
		*
		* @since  1.0.0
		*/
		public function __construct( $manager, $id, $args = array(), $attr = array() ) {
			$this->attr  = $attr;
			$this->label = $args['label'];
			parent::__construct( $manager, $id, $args );
		}
		/**
		* Renders the control wrapper and calls $this->render_content() for the internals.
		*
		* @see WP_Customize_Control::render()
		*/
		protected function render() {
			$id    = 'customize-control-' . str_replace( array( '[', ']' ), array( '-', '' ), $this->id );
			$class = 'customize-control has-switchers customize-control-' . $this->type;
			?><li id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
			<?php $this->render_content(); ?>
			</li>
			<?php
		}
		/**
		 * enqueue css and scrpts
		 *
		 * @since  1.0
		 */
		public function enqueue() {
			wp_enqueue_style('spark-multipurpose-buttonset-control', get_template_directory_uri() . '/inc/custom-controller/buttonset/css/buttonset.css', array());
			wp_enqueue_script('spark-multipurpose-buttonset-control', get_template_directory_uri().'/inc/custom-controller/buttonset/js/buttonset.js', array( 'jquery', 'customize-controls' ),'', true);
		}
		public function render_content() {
			if ( is_array( $this->value() ) && ! empty( $this->value() ) ) {
				$values = json_encode( $this->value() );
			} else {
				$values = $this->value();
			}
			?>
			<ul class="spark-multipurpose-responsive-buttonset-field-control-wrap">
				<?php
				$this->get_fields();
				?>
			</ul>
			<input type="hidden" <?php $this->link(); ?> class="spark-multipurpose-responsive-buttonset-collection-value" value="<?php echo esc_attr( $values ); ?>"/>
			<?php
		}
		public function get_fields() {
			$devices = array(
				'desktop' => array(
					'icon' => 'dashicons-desktop',
				),
				'tablet'  => array(
					'icon' => 'dashicons-tablet',
				),
				'mobile'  => array(
					'icon' => 'dashicons-smartphone ',
				),
			);
			$attr = $this->attr;
			if ( is_array( $this->value() ) && ! empty( $this->value() ) ) {
				$values = $this->value();
			} else {
				$values = json_decode( $this->value(), true );
			}
			?>
			<li class="spark-multipurpose-responsive-buttonset-field-control">
			<div class="spark-multipurpose-responsive-buttonset-fields">
				<div class="spark-multipurpose-responsive-buttonset-title-wrap">
				<h3 class="spark-multipurpose-responsive-buttonset-field-label">
					<?php
					echo "<span class='spark-multipurpose-responsive-buttonset-field-title'>" . esc_html( $this->label ) . '</span>';
					?>
				</h3>
			<?php
			if ( count( $devices ) > 1 ) {
				?>
				<ul class="responsive-switchers">
					<?php
					$i = 1;
					foreach ( $devices as $device_id => $device_details ) {
						if ( $i == 1 ) {
							$active = ' active';
						} else {
							$active = '';
						}
						?>
						<li class="<?php echo esc_attr( $device_id ); ?>">
							<button type="button" class="preview-<?php echo esc_attr( $device_id ) . ' ' . $active; ?>" data-device="<?php echo esc_attr( $device_id ); ?>">
								<i class="dashicons <?php echo esc_attr( $device_details['icon'] ); ?>"></i>
							</button>
						</li>
						<?php
						$i ++;
					}
					?>
				</ul>
				<?php
			}
			?>
				</div>
				<?php
				if ( $this->description ) {
					?>
					<span class="description customize-control-description">
						<?php echo wp_kses_post( $this->description ); ?>
					</span>
					<?php
				}
				?>
			<div class="responsive-switchers-fields">
			<?php
			$i = 1;
			foreach ( $devices as $device_id => $device_details ) {
				if ( $i == 1 ) {
					$active = ' active';
				} else {
					$active = '';
				}
				echo '<ul class="spark-multipurpose-responsive-buttonset-device-wrap control-wrap ' . $device_id . ' ' . $active . '" data-device="' . esc_attr( $device_id ) . '" data-inputname="' . esc_attr( $this->id . $device_id ) . '">';
				$value = isset( $values[ $device_id ] ) ? $values[ $device_id ] : '';
				echo '<li>';
				foreach ( $this->choices as $val => $label ) {
					?>
					<input name="<?php echo esc_attr( $this->id . $device_id ); ?>" id="<?php echo esc_attr( $this->id . '-' . $device_id . '-' . $val ); ?>" class="switch-input" type="radio" <?php checked( $value, $val, true ); ?> value="<?php echo esc_attr( $val ); ?>">
					<label for="<?php echo esc_attr( $this->id . '-' . $device_id . '-' . $val ); ?>" class="switch-label switch-label-<?php $value == $val ? 'on' : 'off'; ?>">
						<?php echo esc_html( $label ); ?>
					</label>
					</input>
					<?php
				}
				echo '</li>';
				echo '</ul>';
				$i ++;
			}
			?>
			</div>
			</div>
			</li>
			<?php
		}
	}
endif;

if ( ! function_exists( 'spark_multipurpose_sanitize_field_responsive_buttonset' ) ) :
	/**
	 * Check if Json
	 *
	 * @since 1.0.0
	 * @param  $input, $setting
	 * @return boolean
	 */
	function spark_multipurpose_sanitize_field_responsive_buttonset( $input ) {
		$range_value            = json_decode( $input, true );
		$range_value['desktop'] = ! empty( $range_value['desktop'] ) ? sanitize_text_field( $range_value['desktop'] ) : '';
		$range_value['tablet']  = ! empty( $range_value['tablet'] ) ? sanitize_text_field( $range_value['tablet'] ) : '';
		$range_value['mobile']  = ! empty( $range_value['mobile'] ) ? sanitize_text_field( $range_value['mobile'] ) : '';
		return json_encode( $range_value );
	}
endif;
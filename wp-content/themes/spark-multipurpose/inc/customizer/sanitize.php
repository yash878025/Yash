<?php
/**
 * Sanitize checkbox.
 * @param  $input Whether the checkbox is input.
 */
function spark_multipurpose_sanitize_checkbox( $input ) {
  return ( ( isset( $input ) && true === $input ) ? true : false );
}
function spark_multipurpose_sanitize_text($input) {
  return wp_kses_post(force_balance_tags($input));
}
/**
* Sanitization Select.
*/
function spark_multipurpose_sanitize_select( $input, $setting ){
  //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
  $input = sanitize_key($input);
  //get the list of possible select options 
  $choices = $setting->manager->get_control( $setting->id )->choices;
  //return input if valid or return default option
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );  
}
/**
* Sanitization Optoins.
*/
if(!function_exists('spark_multipurpose_sanitize_options')){
  function spark_multipurpose_sanitize_options( $input, $setting ){
    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);
    //get the list of possible select options 
    $options = $setting->manager->get_control( $setting->id )->options;
    //return input if valid or return default option
    return ( array_key_exists( $input, $options ) ? $input : $setting->default );  
  }
}
/**
 * Switch Sanitization Function.
 *
 * @since 1.1
 */
function spark_multipurpose_sanitize_switch($input) {
    $valid_keys = array(
      'enable'  => esc_html__( 'Enable', 'spark-multipurpose' ),
      'disable' => esc_html__( 'Disable', 'spark-multipurpose' )
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
      return $input;
    } else {
      return '';
    }
}
/**
 * Number with blank value sanitization callback
 *
 */
if(!function_exists('spark_multipurpose_sanitize_number_blank')){
  function spark_multipurpose_sanitize_number_blank($val) {
    return is_numeric($val) ? $val : '';
  }
}
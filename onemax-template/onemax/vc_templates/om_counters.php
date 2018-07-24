<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/**
 * Shortcode attributes
 * @var $counter_name
 * @var $number
 * @var $el_class
 * @var $css
 */
$el_class=$css=$counter_name=$number=$name_color=$num_color=$alignment=$output=$output_el_class='';
$ani=$aos_once=$aos_delay=$aos='';
$atts = vc_map_get_attributes( 'om_counters', $atts );
extract( $atts );

if($ani != 'none'){
    $aos="data-aos='$ani' data-aos-once='$aos_once' data-aos-delay='$aos_delay'";
}
if ( '' !== $el_class ) {
        $output_el_class = ' ' . str_replace( '.', '', $el_class );
}
$wrapper_classes = array(
        $output_el_class,
);
$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, 'om_counters', $atts );

$output.='<div '.$aos.' class="counters om-width '.trim( esc_attr( $css_class ) ).'"><dl class="mt100">';
$output.='<dt></dt><dd class="bb1" style="border:none;"><ul class="row_w" style="text-align:'.$alignment.';">';
$output.='<li class="counterBox counterWithAnimation" data-animation="fade-in-left"  data-countnmber="'.esc_attr($number).'">';
$output.='<span class="counter-number-font row_x counterBoxNumber" style="color:'.esc_attr($num_color).';">'.esc_html($number).'</span><br/><span class="counter-name-font" style="color:'.esc_attr($name_color).';">'.esc_html($counter_name).'</span></li></ul></dd></dl></div>';

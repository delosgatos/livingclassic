<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/**
 * Shortcode attributes
 * @var $due_date
 * @var $el_class
 * @var $css
 */
$el_class=$css=$due_date=$alignment=$output=$output_el_class='';
$atts = vc_map_get_attributes( 'om_countdown', $atts );
extract( $atts );
if ( '' !== $el_class ) {
        $output_el_class = ' ' . str_replace( '.', '', $el_class );
}
$wrapper_classes = array(
	$output_el_class,
);
$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, 'om_title', $atts );


$time=strtotime($due_date);
//date("m/d/Y H:i:s",  strtotime($due_date))


$output.='<div class="om-width '.trim( esc_attr( $css_class ) ).'">';
$output.='<ul class="counter-down-font row_w2 countdown countdown_'.esc_html($time).'" style="text-align:'.$alignment.';">';
$output.='<li class="row_x2 fl"><span class="fpr fl days">00</span><span class="fl">'.esc_html__('days','onemax').'</span></li>';
$output.='<li class="row_x2 fl"><span class="fpr fl hours">00</span><span class="fl">'.esc_html__('h','onemax').'</span></li>';
$output.='<li class="row_x2 fl"><span class="fpr fl minutes">00</span><span class="fl">'.esc_html__('m','onemax').'</span></li>';
$output.='<li class="row_x2 fl"><span class="fpr fl seconds">00</span><span class="fl">'.esc_html__('s','onemax').'</span></li>';
$output.='</ul></div>';

$om_countdown_js='jQuery(".countdown_'.esc_html($time).'").downCount({
                date: "'.esc_html($due_date).'",
                offset: +10
            },
            function($) {
                alert("It is the end!");
            });';
wp_add_inline_script( 'onemax-header-init',$om_countdown_js );
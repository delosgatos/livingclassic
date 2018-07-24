<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $css_animation
 * @var $css
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column_text
 */
$ani=$aos_once=$aos_delay=$html_ani=$html=$el_class = $css = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = 'wpb_text_column wpb_content_element ';
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

$html= wpb_js_remove_wpautop( $content, true );
if($ani!='none'){
    $html_ani='data-aos="'.$ani.'" data-aos-once="'.$aos_once.'" data-aos-delay="'.$aos_delay.'"';
}

$output = '
	<div '.$html_ani.' class="' . esc_attr( $css_class ) . '">
		<div class="txt-block wpb_wrapper">
			' .$html. '
		</div>
	</div>
';

echo $output;

<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $css
 * @var $el_id
 * @var $equal_height
 * @var $content_placement
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row_Inner
 */
$inner_bg_img=$inner_row_background_style=$inner_row_background_repeat=$bg_style=$inner_row_background_color=$inner_padding_top=$inner_padding_bottom=$el_class = $equal_height = $content_placement = $css = $el_id = '';
$disable_element = '';
$output = $after_output = '';
$inner_row_type = $inner_gap = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$inner_bg_img = wp_get_attachment_image_src( $inner_bg_img, 'full' );
$inner_bg_img_src=$inner_bg_img[0];
if($inner_bg_img_src){
	if($inner_row_background_style=='default'){
		$bg_style='background-repeat:'.$inner_row_background_repeat.';';
	}else{
		$bg_style='background-size:cover;';
	}
}

$inner_padding_top=  empty($inner_padding_top)? '0':intval($inner_padding_top);
$inner_padding_bottom=  empty($inner_padding_bottom)? '0':intval($inner_padding_bottom);

$el_class = $this->getExtraClass( $el_class );

if($inner_row_type=='grid'){
    $outer_css_inner_row='grid-outer';
    $inner_css_inner_row='grid-inner';
}elseif ($inner_row_type=='full_width_content') {
    $outer_css_inner_row='full-width-content-outer';
    $inner_css_inner_row='full-width-content-inner';
}else{
    $outer_css_inner_row='full-width-bg-outer';
    $inner_css_inner_row='full-width-bg-inner';
}

$css_classes = array(
	'vc_row',
	'wpb_row', //deprecated
	'vc_inner',
	'vc_row-fluid',
	$outer_css_inner_row,
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);
if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

if (vc_shortcode_custom_css_has_property( $css, array('border', 'background') )) {
	$css_classes[]='vc_row-has-fill';
}

if (!empty($atts['gap'])) {
	$css_classes[] = 'vc_column-gap-'.$atts['gap'];
}

if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_row-flex';
}

$content=str_replace("[vc_column_inner ", "[vc_column_inner column_inner_padding='$inner_gap' ", $content,$i);

$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<div data-rjs="2" ' . implode( ' ', $wrapper_attributes ) . ' style="background-image:url('.$inner_bg_img_src.');background-color: '.$inner_row_background_color.';'.$bg_style.'padding-top:'.$inner_padding_top.'px;padding-bottom:'.$inner_padding_bottom.'px;">';
$output .= '<div class="'.$inner_css_inner_row.'">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '</div>';
$output .= $after_output;

echo $output;

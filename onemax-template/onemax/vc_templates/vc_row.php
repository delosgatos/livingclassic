<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$el_class = $parallax_speed_bg = $parallax_speed_video = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = '';
$row_type = $gap = $bg_img = $row_background_style = $row_background_repeat = $bg_style = $row_background_color = $txt_align = $padding_top = $padding_bottom = $outer_css=$inner_css='';
$disable_element = '';
$output  = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$bg_img = wp_get_attachment_image_src( $bg_img, 'full' );
$bg_img_src=$bg_img[0];
if($bg_img_src){
	if($row_background_style=='default'){
		$bg_style='background-repeat:'.$row_background_repeat.';';
	}else{
		$bg_style='background-size:cover;';
	}
}

$padding_top=  empty($padding_top)? '0':intval($padding_top);
$padding_bottom=  empty($padding_bottom)? '0':intval($padding_bottom);

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class );

if($row_type=='grid'){
    $outer_css='grid-outer';
    $inner_css='grid-inner';
}elseif ($row_type=='full_width_content') {
    $outer_css='full-width-content-outer';
    $inner_css='full-width-content-inner';
}else{
    $outer_css='full-width-bg-outer';
    $inner_css='full-width-bg-inner';
}

$css_classes = array(
	'vc_row',
	'wpb_row', //deprecated
	'vc_row-fluid',
	$el_class,
	vc_shortcode_custom_css_class( $css ),
                      $outer_css
);

if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

if (vc_shortcode_custom_css_has_property( $css, array('border', 'background') ) || $video_bg || $parallax) {
	$css_classes[]='vc_row-has-fill';
}

$content=str_replace("[vc_column ", "[vc_column column_padding='$gap' ", $content);

$wrapper_attributes = array();

// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[] = 'vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( false !== strpos( $parallax, 'fade' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}

if ( ! empty( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<div data-rjs="2" ' . implode( ' ', $wrapper_attributes ) . ' style="background-image:url('.$bg_img_src.');background-color: '.$row_background_color.';'.$bg_style.' padding-top:'.$padding_top.'px;padding-bottom:'.$padding_bottom.'px;">';
$output .='<div class="'.$inner_css.'" style="text-align: '.$txt_align.';">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '</div>';

echo $output;

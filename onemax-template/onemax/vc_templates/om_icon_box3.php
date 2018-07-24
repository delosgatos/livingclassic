<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/**
 * Shortcode attributes
 * @var $title
 * @var $link
 * @var $text
 * @var $icon_type
 * @var $el_class
 * @var $css
 * @var $output
 */
$om_icon_box3_obj=new WPBakeryShortCode_Om_Icon_Box3(array( 'base' => 'om_icon_box3' ));

$ani=$aos_once=$aos_delay=$aos=$title=$title_color=$text=$content_color=$link=$icon=$bg_color=$bg_shape=$i_css=$output='';
$a_href = $a_title = $a_target = $a_rel = '';
$attributes = array();

$atts = vc_map_get_attributes( $om_icon_box3_obj->getShortcode(), $atts );
extract( $atts );

if($ani != 'none')
    $aos="data-aos='$ani' data-aos-once='$aos_once' data-aos-delay='$aos_delay'";

if ( '' === trim( $title ) ) {
    $html = '<h4><i style="margin:0 ;color:'.esc_attr($title_color).';">&nbsp;</i></h4>';
}else{
    $html='<h4><i style="margin:0 ;color:'.esc_attr($title_color).';">'.esc_html($title).'</i></h4>';
}

//parse link
$link = ( '||' === $link ) ? '' : $link;
$link = vc_build_link( $link );
$use_link = false;
if ( strlen( $link['url'] ) > 0 ) {
	$use_link = true;
	$a_href = $link['url'];
	$a_title = $link['title'];
	$a_target = $link['target'];
	$a_rel = $link['rel'];
}
if ( $use_link ) {
	$attributes[] = 'href="' . trim( $a_href ) . '"';
	$attributes[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
	if ( ! empty( $a_target ) ) {
		$attributes[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
	}
	if ( ! empty( $a_rel ) ) {
		$attributes[] = 'rel="' . esc_attr( trim( $a_rel ) ) . '"';
	}
}
$attributes = implode( ' ', $attributes );

vc_icon_element_fonts_enqueue( $i_type );
$icon = $om_icon_box3_obj->getVcIcon( $atts );


if($use_link){
    $html="<a $attributes style='color:$title_color;'>".$html."</a>";
    $text="<a $attributes style='color:$content_color;'>".esc_html($text)."</a>";
}else{
    $text=esc_html($text);
}

if($bg_shape=='circle'){
    $i_css='background-color:'.$bg_color.';border-radius:50%;';
}elseif ($bg_shape=='square') {
    $i_css='background-color:'.$bg_color.';';
}elseif ($bg_shape=='rounded') {
    $i_css='background-color:'.$bg_color.';border-radius:5px;';
}elseif ($bg_shape=='ocircle') {
    $i_css='outline:2px solid '.$bg_color.';border-radius:50%;';
}elseif ($bg_shape=='osquare') {
    $i_css='outline:2px solid '.$bg_color.';';
}elseif ($bg_shape=='orounded') {
    $i_css='outline:2px solid '.$bg_color.';border-radius:5px;';
}else{
    $i_css='background-color:'.$bg_color.';';
}

$icon=  '<div style="text-align:center;margin-bottom:6%"'.substr($icon, 4);
$output.='<div class="om-width om-box-width" '.$aos.' style="word-wrap:break-word; text-align: -webkit-center; text-align: -moz-center;">';
$output.='<div class="box-dl3">';
$output.='<div class="dl1">';
$output.='<div class="dt3" style="'.$i_css.';padding:40px 15px;">'.$icon.$html;
$output.='<span style="padding: 25px 0;color:'.esc_attr($content_color).';">'.$text.'</span>';
$output.='</div></div></div></div>';

<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/**
 * Shortcode attributes
 * @var $title
 * @var $link
 * @var $add_icon
 * @var $icon_type
 * @var $el_class
 * @var $css
 * @var $output
 */
//echo '<link rel="stylesheet" type="text/css" href="'.get_template_directory_uri() .'/css/coporment/list/list.css" >';
$title=$html=$link=$css_style=$css_color=$el_class=$css=$output=$output_el_class=$sample=$uid='';
$ani=$aos_once=$aos_delay=$aos=$a_href = $a_title = $a_target = $a_rel = '';
$attributes = array();

$atts = vc_map_get_attributes( 'om_list', $atts );
extract( $atts );

if($ani != 'none')
    $aos="data-aos='$ani' data-aos-once='$aos_once' data-aos-delay='$aos_delay'";

if ( '' === trim( $title ) ) {
    $html = '';
}else{
    $html=$title;
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


if($css_color!=''){
    $uid=  substr($css_color, 1);
}

if ($css_style=='1') {
    $sample='sample02';
    echo '<style>.om-list .sample02 .li-'.$uid.'::before{border-right-color:'.$css_color.';border-bottom-color:'.$css_color.';}</style>';
}elseif ($css_style=='2') {
    $sample='sample03';
    echo '<style>.om-list .sample03 .li-'.$uid.'::before{border-right-color:'.$css_color.';border-bottom-color:'.$css_color.';}'
            . '.om-list .sample03 .li-'.$uid.'::before{background-color:'.$css_color.';}</style>';
}elseif ($css_style=='3') {
    $sample='sample04';
    echo '<style>.om-list .sample04 .li-'.$uid.'::before{background-color:'.$css_color.';}</style>';
}elseif ($css_style=='4') {
    $sample='sample07';
    echo '<style>.om-list .sample07 .li-'.$uid.'::before{background-color:'.$css_color.';}</style>';
}elseif ($css_style=='5') {
    $sample='sample08';
    echo '<style>.om-list .sample08 .li-'.$uid.'::before{border-left-color:'.$css_color.';border-bottom-color:'.$css_color.';}</style>';
}elseif ($css_style=='6') {
    $sample='sample09 music';
    echo '<style>.om-list .sample09.music .li-'.$uid.'::before{content: "\00266b";color: '.$css_color.';}</style>';
}elseif ($css_style=='7') {
    $sample='sample09 snow';
    echo '<style>.om-list .sample09.snow .li-'.$uid.'::before{content: "\002731";color: '.$css_color.';}</style>';
}

$output.='<div class="om-list" '.$aos.'>';
$output.='<ul class="'.$sample.' om-width" style="padding-left:0">';
if($use_link){
    $output.='<li class="li-'.$uid.'" style="list-style:none;"><a '.$attributes.' onmouseover="this.style.textDecoration=\'none\';">'.esc_html($html).'</a></li>';
}else{
    $output.='<li class="li-'.$uid.'" style="list-style:none;">'.esc_html($html).'</li>';
}
$output.='</ul>';
$output.='</div>';

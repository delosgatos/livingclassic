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
$om_icon_box1_obj=new WPBakeryShortCode_Om_Icon_Box1(array( 'base' => 'om_icon_box1' ));

$ani=$aos_once=$aos_delay=$aos=$title=$title_color=$content_color=$text=$link=$icon=$output='';
$a_href = $a_title = $a_target = $a_rel = '';
$attributes = array();

$atts = vc_map_get_attributes( $om_icon_box1_obj->getShortcode(), $atts );
extract( $atts );

if($ani != 'none')
    $aos="data-aos='$ani' data-aos-once='$aos_once' data-aos-delay='$aos_delay'";

if ( '' === trim( $title ) ) {
    $html = '<span>&nbsp;</span>';
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

vc_icon_element_fonts_enqueue( $i_type );
$icon = $om_icon_box1_obj->getVcIcon( $atts );


if($use_link){
    $html="<a $attributes style='color:".esc_attr($title_color).";'>".esc_html($html)."</a>";
    $text="<a $attributes style='color:".esc_attr($content_color).";'>".esc_html($text)."</a>";
}else{
	$html=esc_html($html);
    $text=esc_html($text);
}

$icon=  '<div style="float:left;"'.substr($icon, 4);
$output.='<div style="justify-content: center;" '.$aos.'><div class="om-width"><div class="box-dl"><div class="dl1">';
$output.='<div class="vc_separator">'.$icon.'<h4 style="color:'.esc_attr($title_color).';">'.$html.'</h4>';
$output.='</div><div style="color:'.esc_attr($content_color).';" class="box1-content">'.$text.' </div></div></div></div></div>';

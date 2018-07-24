<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/**
 * Shortcode attributes
 * @var $link
 * @var $text
 * @var $icon_type
 * @var $el_class
 * @var $css
 * @var $output
 */
$om_icon_box2_obj=new WPBakeryShortCode_Om_Icon_Box2(array( 'base' => 'om_icon_box2' ));

$ani=$aos_once=$aos_delay=$aos=$text=$content_color=$link=$icon=$el_class=$output_el_class=$css=$output='';
$a_href = $a_title = $a_target = $a_rel = '';
$attributes = array();

$atts = vc_map_get_attributes( $om_icon_box2_obj->getShortcode(), $atts );
extract( $atts );

if($ani != 'none')
    $aos="data-aos='$ani' data-aos-once='$aos_once' data-aos-delay='$aos_delay'";

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
$icon = $om_icon_box2_obj->getVcIcon( $atts );

if ( '' !== $el_class ) {
        $output_el_class = ' ' . str_replace( '.', '', $el_class );
}
$wrapper_classes = array(
	$output_el_class,
);
$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, 'om_icon_box2', $atts );

if($use_link){
    $text="<a onmouseover='this.style.textDecoration=\"none\";' ".esc_html($attributes)." style='color:".esc_html($content_color).";'>".esc_html($text)."</a>";
}else{
	$text=esc_html($text);
}

$output.='<div '.$aos.' class="icon-box2 om-width '.trim( esc_attr( $css_class ) ).'" style="word-wrap:break-word; text-align: -webkit-center;text-align: -moz-center;">';
$output.='<dl class="dl1">';
$output.='<dt class="vc_separator">'.$icon.'<span  style="font-weight:400;font-style:normal;font-size:15px;line-height:25px;margin-left:10px;color:'.esc_attr($content_color).';">'.$text.'</span>';
$output.='</dt></dl></div>';

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
$om_list_obj=new WPBakeryShortCode_Om_Icon_Iist(array( 'base' => 'om_icon_list' ));
$ani=$aos_once=$aos_delay=$aos=$title=$html=$link=$add_icon=$icon_type=$el_class=$css=$output=$output_el_class='';
$a_href = $a_title = $a_target = $a_rel = '';
$attributes = array();
$atts = vc_map_get_attributes( 'om_icon_list', $atts );
extract( $atts );

if($ani != 'none')
    $aos="data-aos='$ani' data-aos-once='$aos_once' data-aos-delay='$aos_delay'";

if ( '' === trim( $title ) ) {
    $html = '<span>&nbsp;</span>';
}else{
    $html=esc_html($title);
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

//if($add_icon){
//    $iconClass=${'icon_' . $icon_type};
//    $icon='<i class="'.esc_attr( $iconClass ).'" style="margin-right:5px;display:inline;"></i>';
//    if ( 'pixelicons' !== $icon_type ) {
//        vc_icon_element_fonts_enqueue( $icon_type );
//    }
//}

$icon = '';
if ( 'true' === $add_icon ) {
	vc_icon_element_fonts_enqueue( $i_type );
	$icon = $om_list_obj->getVcIcon( $atts );
}

if ( '' !== $el_class ) {
        $output_el_class = ' ' . str_replace( '.', '', $el_class );
}
$wrapper_classes = array(
	$output_el_class,
);
$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, 'om_icon_list', $atts );

$output.='<div '.$aos.' class="icon_list '.trim( esc_attr( $css_class ) ).'" style="word-wrap:break-word;">';
$output.='<ul style="list-style:none;">';
$output.='<li class="vc_separator">';
if($add_icon){
     $output.=$icon;
}
if($use_link){
    $output.='<span><a '.$attributes.' onmouseover="this.style.textDecoration=\'none\';">'.$html.'</a></span>';
}  else {
    $output.='<span style="width:100%;">'.$html.'</span>';
}
$output.='</li>';
$output.='</ul>';
$output.='</div>';
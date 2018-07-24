<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/**
 * Shortcode attributes
 * @var $title
 * @var $content_text
 * @var $color
 * @var $el_class
 * @var $css
 * @var $output
 */

$title1=$content_text1=$title2=$content_text2=$title3=$content_text3=$title4=$content_text4=$title5=$content_text5=$title6=$content_text6='';
$ani=$aos_once=$aos_delay=$aos=$color=$font_color=$el_class=$css=$output=$output_el_class=$rows='';
$atts = vc_map_get_attributes( 'om_timeline_horizontal', $atts );
extract( $atts );

$delay_diff=floor($aos_delay/$rows);

if ( '' !== $el_class ) {
        $output_el_class = ' ' . str_replace( '.', '', $el_class );
}
$wrapper_classes = array(
	$output_el_class,
);
$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, 'om_timeline_horizontal', $atts );

$bd_style= 'style="'.vc_get_css_color( 'border-color', $color ).'"';
$color_style= 'style="'.vc_get_css_color( 'color', $font_color ).'"';

$output.='<div class="om-timeline-h '.trim( esc_attr( $css_class ) ).'" '.$bd_style.'>';
for($i=1;$i<=$rows;$i++){
    if($ani != 'none')
        $aos="data-aos='$ani' data-aos-once='$aos_once' data-aos-delay='".($i*$delay_diff)."'";
    $title='title'.$i;
    $content_text='content_text'.$i;
    $output.='<div class=" timeline-data" style="width:'.(100/$rows).'%;" '.$aos.'"><span '.$bd_style.'></span><div class="om-timeline-text"><data value="" '.$color_style.'>'.esc_html($$title).'</data>';
    $output.='<p class="om-description" '.$color_style.'>'.esc_html($$content_text).'</p></div></div>';
}
$output.='</div>';

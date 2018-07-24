<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/**
 * Shortcode attributes
 * @var $rows
 * @var $title1
 * @var $content_text1
 * @var $color
 * @var $el_class
 * @var $css
 * @var $output
 */

$title1=$content_text1=$title2=$content_text2=$title3=$content_text3=$title4=$content_text4=$title5=$content_text5=$title6=$content_text6='';
$ani=$aos_once=$aos_delay=$aos=$color=$font_color=$el_class=$css=$output=$output_el_class=$rows='';
$atts = vc_map_get_attributes( 'om_timeline_vertical', $atts );
extract( $atts );

$delay_diff=floor($aos_delay/$rows);

$uni_no=  substr($color, 1);
echo '<style>.timeline-box-'.$uni_no.':before {
    background: '.$color.';
}</style>';

if ( '' !== $el_class ) {
        $output_el_class = ' ' . str_replace( '.', '', $el_class );
}
$wrapper_classes = array(
	$output_el_class,
);
$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, 'om_timeline_vertical', $atts );

$bg_style= 'style="'.vc_get_css_color( 'background-color', $color ).'"';
$color_style= 'style="'.vc_get_css_color( 'color', $font_color ).'"';

$output.='<div class="om-width timeline-box timeline-box-'.$uni_no.' chat-box" '.$aos.' >';
for($i=1;$i<=$rows;$i++){
    if($ani != 'none')
        $aos="data-aos='$ani' data-aos-once='$aos_once' data-aos-delay='".($i*$delay_diff)."'";
    $title='title'.$i;
    $content_text='content_text'.$i;
    if($i%2=='1'){
        $output.='<div class="tl-row" '.$aos.'>
        <div class="tl-bullet bg-azure" '.$bg_style.'></div>
        <div class="popover left no-shadow" '.$bg_style.'>
            <div class="popover-content" '.$color_style.'>'.esc_html($$content_text).'</div>
        </div>
        <div class="tl-panel" '.$color_style.'>'.esc_html($$title).'</div>
    </div>';
    }else{
        $output.='<div class="tl-row float-right" '.$aos.'>
        <div class="tl-bullet bg-azure" '.$bg_style.'></div>
        <div class="popover right no-shadow" '.$bg_style.'>
            <div class="popover-content" '.$color_style.'>'.esc_html($$content_text).'</div>
        </div>
        <div class="tl-panel" '.$color_style.'>'.esc_html($$title).'</div>
    </div>';
    }
}
$output.='</div>';
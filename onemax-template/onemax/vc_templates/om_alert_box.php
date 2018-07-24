<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$message_box_color = $message_box_style = $style = $color =  $icon_type =$output=$styles='';
$ani=$aos_once=$aos_delay=$aos=$icon_fontawesome = $icon_linecons = $icon_openiconic = $icon_typicons = $icon_entypo = '';
$defaultIconClass = 'fa fa-adjust';
if ( isset( $atts['style'] ) ) {
        if ( '3d' === $atts['style'] ) {
                $atts['message_box_style'] = '3d';
                $atts['style'] = 'rounded';
        } elseif ( 'outlined' === $atts['style'] ) {
                $atts['message_box_style'] = 'outline';
                $atts['style'] = 'rounded';
        } elseif ( 'square_outlined' === $atts['style'] ) {
                $atts['message_box_style'] = 'outline';
                $atts['style'] = 'square';
        }
}
//$atts = $this->convertAttributesToMessageBox2( $atts );
$atts = vc_map_get_attributes( 'om_alert_box', $atts );
extract( $atts );
$styles='';
if ( $message_box_color==='custom' ) {
    $styles= 'style="'.vc_get_css_color( 'background-color', $custom_color ).'"';
}

$elementClass = array(
	'base' => apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_message_box', 'om_alert_box', $atts ),
	'style' => 'vc_message_box-' . $message_box_style,
	'shape' => 'vc_message_box-' . $style,
	'color' => ( strlen( $color ) > 0 && false === strpos( 'alert', $color ) ) ? 'vc_color-' . $color : 'vc_color-' . $message_box_color,
);

$class_to_filter = preg_replace( array( '/\s+/', '/^\s|\s$/' ), array( ' ', '' ), implode( ' ', $elementClass ) );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, 'om_alert_box', $atts );

// Pick up icons
$iconClass = isset( ${'icon_' . $icon_type} ) ? ${'icon_' . $icon_type} : $defaultIconClass;
switch ( $color ) {
	case 'info':
		$icon_type = 'fontawesome';
		$iconClass = 'fa fa-info-circle';
		break;
	case 'alert-info':
		$icon_type = 'pixelicons';
		$iconClass = 'vc_pixel_icon vc_pixel_icon-info';
		break;
	case 'success':
		$icon_type = 'fontawesome';
		$iconClass = 'fa fa-check';
		break;
	case 'alert-success':
		$icon_type = 'pixelicons';
		$iconClass = 'vc_pixel_icon vc_pixel_icon-tick';
		break;
	case 'warning':
		$icon_type = 'fontawesome';
		$iconClass = 'fa fa-exclamation-triangle';
		break;
	case 'alert-warning':
		$icon_type = 'pixelicons';
		$iconClass = 'vc_pixel_icon vc_pixel_icon-alert';
		break;
	case 'danger':
		$icon_type = 'fontawesome';
		$iconClass = 'fa fa-times';
		break;
	case 'alert-danger':
		$icon_type = 'pixelicons';
		$iconClass = 'vc_pixel_icon vc_pixel_icon-explanation';
		break;
	case 'alert-custom':
	default:
		break;
}

// Enqueue needed font for icon element
if ( 'pixelicons' !== $icon_type ) {
	vc_icon_element_fonts_enqueue( $icon_type );
}
if($ani != 'none')
    $aos="data-aos='$ani' data-aos-once='$aos_once' data-aos-delay='$aos_delay'";

$output.='<div class="alter1"><div '.$aos.' class="'.esc_attr( $css_class ).'" '.$styles.'>'
        . '<div class="vc_message_box-icon"><i class="'.esc_attr( $iconClass ).'"></i></div><p style="line-height:30px;">'.$content.'</p><a href="javascript:;" class="alter-a"></a></div></div>';
wp_enqueue_script( 'onemax-alert-js', ONEMAX_URI . '/js/component/alert/alert.js','','',true);

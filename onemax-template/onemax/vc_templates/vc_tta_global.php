<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $content - shortcode content
 * @var $this WPBakeryShortCode_VC_Tta_Accordion|WPBakeryShortCode_VC_Tta_Tabs|WPBakeryShortCode_VC_Tta_Tour|WPBakeryShortCode_VC_Tta_Pageable
 */

$el_class = $css =$sec_bg =$color=$custom_color='';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );


$this->resetVariables( $atts, $content );
extract( $atts );


$this->setGlobalTtaInfo();

$this->enqueueTtaStyles();
$this->enqueueTtaScript();

// It is required to be before tabs-list-top/left/bottom/right for tabs/tours
$prepareContent = $this->getTemplateVariable( 'content' );

$class_to_filter = $this->getTtaGeneralClasses();
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );
//new code
$sec_bg_no=  substr($sec_bg, 1);
$cus_bg_no=  substr($custom_color, 1);
$color_no=$sec_bg_no.$cus_bg_no;
if($sec_bg){
    if(strpos($css_class,'vc_tta-tabs-position-left')===false){
        echo "<style>.color-$color_no .vc_tta-container .vc_general  .vc_tta-panels-container .vc_tta-panels .vc_tta-panel.vc_active .vc_tta-panel-body{background-color:$sec_bg;}</style>";
    }else{
        echo "<style>.color-$color_no .vc_tta-container .vc_general  .vc_tta-panels-container .vc_tta-panels {background-color:$sec_bg;}</style>";
    }
}else{
    $sec_bg='#f8f8f8';
}

if($color==='custom'){
    if(strpos($css_class,'vc_tta-accordion')===false){
        echo "<style>.color-$color_no .vc_tta-container .vc_general .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab a{background-color:$custom_color;}"
                . ".color-$color_no .vc_tta-container .vc_general .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab.vc_active a{background-color:#f8f8f8;}</style>";
    }else{
        echo  "<style>.color-$color_no .vc_tta-container .vc_general  .vc_tta-panels-container .vc_tta-panels .vc_tta-panel.vc_active .vc_tta-panel-heading {background-color:#f8f8f8;}"
                . ".color-$color_no .vc_tta-container .vc_general  .vc_tta-panels-container .vc_tta-panels .vc_tta-panel .vc_tta-panel-heading {background-color:$custom_color;}</style>";
    }
}
$output .='<div class="om-width color-'.$color_no.'">';
$output .= '<div ' . $this->getWrapperAttributes() . ' style="border:none;">';
$output .= $this->getTemplateVariable( 'title' );
$output .= '<div class="' . esc_attr( $css_class ) . '" style="border:none;">';
$output .= $this->getTemplateVariable( 'tabs-list-top' );
$output .= $this->getTemplateVariable( 'tabs-list-left' );
$output .= '<div class="vc_tta-panels-container" style="border:none;">';
$output .= $this->getTemplateVariable( 'pagination-top' );
$output .= '<div class="vc_tta-panels" style="border:none;">';
$output .= $prepareContent;
$output .= '</div>';
$output .= $this->getTemplateVariable( 'pagination-bottom' );
$output .= '</div>';
$output .= $this->getTemplateVariable( 'tabs-list-bottom' );
$output .= $this->getTemplateVariable( 'tabs-list-right' );
$output .= '</div></div></div>';
echo $output;
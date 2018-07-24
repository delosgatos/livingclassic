<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/**
 * Shortcode attributes
 * @var $title
 * @var $link
 * @var $custom_background
 * @var $custom_text
 * @var $shape
 * @var $size
 * @var $align
 * @var $css_animation
 * @var $hover_color
 * @var $hover_text
 * @var $add_border
 * @var $border_color
 * @var $hover_border
 * @var $el_class
 * @var $css
 * @var $output
* Shortcode class
 * @var $this WPBakeryShortCode_VC_Btn
 */
$title=$link=$custom_background=$custom_text=$shape=$stretch=$size=$align=$css_animation=$hover_color=$hover_text=$add_border=$border_color=$hover_border=$el_class=$css=$ani_css=
$ani=$aos_once=$aos_delay=$aos=$btn_html=$text=$a_href=$a_title=$a_target =$output='';
$attributes = array();
$styles = array();
//get the params value
$atts = vc_map_get_attributes( 'om_btn', $atts );
extract( $atts );
//parse link
$link = ( '||' === $link ) ? '' : $link;
$link = vc_build_link( $link );
$use_link = false;
if ( strlen( $link['url'] ) > 0 ) {
	$use_link = true;
	$a_href = $link['url'];
	$a_title = $link['title'];
	$a_target = $link['target'];
}
if($stretch=='enable'){
    $size='stretch';
}
$button_classes = array(
    'om-button-font',
	//'vc_btn3',
    'button',
	'button--'.$size,
	'button--'.$shape,
	'vc_btn3-style-custom',
);
if($stretch!='enable'){
    $button_classes[]='button--disstretch';
}
if ( 'true' === $add_border ){
    $button_classes[]='border--'.$shape;
}
if($shape=='retangle')
    $shape='0px';
elseif($shape=='round')
    $shape='15px';
elseif($shape=='default')
    $shape='5px';
else
    $shape='50px';

if($size=='huge')
    $size='80px';
elseif($size=='large')
    $size='60px';
elseif($size=='standard')
    $size='50px';
elseif($size=='small')
    $size='35px';

$wrapper_classes = array(
	'vc_btn3-container',
);
$text=$button_html = $title;
if ( '' === trim( $title ) ) {
	$button_classes[] = 'vc_btn3-o-empty';
	$button_html = '<span class="vc_btn3-placeholder">&nbsp;</span>';
}

$js_over="this.style.backgroundColor='{$hover_color}';";
$js_out="this.style.backgroundColor='{$custom_background}';";
$hover_color_no=  substr($hover_color, 1);
$hover_text_no=  substr($hover_text, 1);
//the button css_animation
if($css_animation=='winona'){
     $css_animation='button--winona';
     $button_html='<span>'.$button_html.'</span>';
     $ani_css="<style>.button--winona--$hover_text_no::after {color:$hover_text;}
                        .button--winona--$size::after,.button--winona--$size > span {
                        line-height:$size;}</style>";
     $button_classes[]="button--winona--$hover_text_no";
     $button_classes[]="button--winona--$size";
}elseif ($css_animation=='ujarak') {
    $js_over="this.style.color='{$hover_text}';";
    $js_out="this.style.color='{$custom_text}';";
    $css_animation='button--ujarak';
    $button_html='<span>'.$button_html.'</span>';
    $ani_css="<style>.button--ujarak--$hover_color_no--$shape::before {
	content:'';
	position:absolute;
	top:0;
	left:0;
	width:100%;
	height:100%;
	background:$hover_color;border-radius:$shape;
	z-index:-1;
	opacity:0;
	-webkit-transform:scale3d(0.7,1,1);
	transform:scale3d(0.7,1,1);
	-webkit-transition:-webkit-transform 0.4s,opacity 0.4s;
	transition:transform 0.4s,opacity 0.4s;
	-webkit-transition-timing-function:cubic-bezier(0.2,1,0.3,1);
	transition-timing-function:cubic-bezier(0.2,1,0.3,1);}</style>";
    $button_classes[]="button--ujarak--$hover_color_no--$shape";
}elseif ($css_animation=='wayra') {
    $js_over="this.style.color='{$hover_text}';";
    $js_out="this.style.color='{$custom_text}';";
    $css_animation='button--wayra';
    $button_html='<span>'.$button_html.'</span>';
    $ani_css="<style>.button--wayra--$hover_color_no:hover::before {
	opacity:1;
	background-color:$hover_color;
	-webkit-transform:rotate3d(0,0,1,0deg);
	transform:rotate3d(0,0,1,0deg);
	-webkit-transition-timing-function:cubic-bezier(0.2,1,0.3,1);
	transition-timing-function:cubic-bezier(0.2,1,0.3,1);</style>";
    $button_classes[]="button--wayra--$hover_color_no";
}elseif ($css_animation=='rayen') {
    $js_over=$js_out='';
    $css_animation='button--rayen button--rayen--'.$size;
    $button_html='<span>'.$button_html.'</span>';
    $ani_css="<style>.button--rayen--$hover_color_no--$hover_text_no::before {
	content:attr(data-text);
	position:absolute;
	top:0;
	left:0;
	width:100%;

	background:$hover_color;color:$hover_text;
	-webkit-transform:translate3d(-100%,0,0);
	transform:translate3d(-100%,0,0);}</style>";
    $button_classes[]="button--rayen--$hover_color_no--$hover_text_no";
}elseif ($css_animation=='nina') {
    $ani_css="<style>.button--nina--$hover_text_no:hover > span {color:$hover_text;}</style>";
    $css_animation='button--nina button--nina--'.$size;
    for($i=0;$i<strlen($button_html);$i++){
        $char = mb_substr($button_html,$i,1);
        if($char==' ')
            $btn_html.=' ';
         else
            $btn_html.='<span>'.$char.'</span>';
    }
    $button_html=$btn_html;
    $button_classes[]="button--nina--$hover_text_no";
}else {
    $js_over=$js_out='';
    $css_animation='';
    $hover_color='';
}
if('true' ===$add_border){
    $js_over.="this.style.borderColor='{$hover_border}';";
    $js_out.="this.style.borderColor='{$border_color}';";
}

$js_css='onmouseover="'.$js_over.'" onmouseout="'.$js_out.'"';

$button_classes[] =$css_animation;

if ( $custom_background ) {
        $styles[] = vc_get_css_color( 'background-color', $custom_background );
}

if ( $custom_text ) {
        $styles[] = vc_get_css_color( 'color', $custom_text );
}
if ( $border_color ) {
        $styles[] = vc_get_css_color( 'border-color', $border_color );
}
if ( ! $custom_background && ! $custom_text ) {
        $button_classes[] = 'vc_btn3-color-grey';
}
$styles[]=$align;

if ( $styles ) {
	$attributes[] = 'style="' . implode( ' ', $styles ) . '"';
}

$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter,'om_btn',  $atts );

if ( $button_classes ) {
	$button_classes = esc_attr( apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $button_classes ) ),  'om_btn', $atts ) );
	$attributes[] = 'class="' . trim( $button_classes ) . '"';
}

//the link info
$link_arr=array();
if ( $use_link ) {
	$link_arr[] = 'href="' . esc_url( trim( $a_href ) ) . '"';
	$link_arr[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
	if ( ! empty( $a_target ) ) {
		$link_arr[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
	}
}
$link_arr = implode( ' ', $link_arr );
$attributes = implode( ' ', $attributes );

if($ani != 'none')
    $aos="data-aos='$ani' data-aos-once='$aos_once' data-aos-delay='$aos_delay'";

$output.=$ani_css;
$output.='<div '.$aos.' class="'.trim( esc_attr( $css_class ) ).'">';
if($use_link){
    $output.="<a style='text-decoration:none;' ".$link_arr."><button ".$attributes." data-text='".esc_attr($text)."' ".$js_css.">".$button_html."</button></a>";
}else{
    $output.="<button ".$attributes." data-text='".esc_attr($text)."' ".$js_css.">".$button_html."</button>";
}
$output.='</div>';
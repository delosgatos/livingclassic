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
$no=$output=$bg_color=$hover_color=$link1=$link2=$link3=$link4='';
$a_href1 = $a_title1 = $a_target1 = $a_rel1 = '';$a_href2 = $a_title2 = $a_target2 = $a_rel2 = '';
$a_href3 = $a_title3 = $a_target3 = $a_rel3 = '';$a_href4 = $a_title4 = $a_target4 = $a_rel4 = '';
$attributes1 =$attributes2 =$attributes3 =$attributes4 = array();

$atts = vc_map_get_attributes( 'om_pricing_table1', $atts );
extract( $atts );

//$bg_styles= 'style="'.vc_get_css_color( 'background-color', $line_color ).'"';

$no_arr=  explode('x', $no);
$rows=$no_arr[1];
$lines=$no_arr[0];

//parse link
for($i=1;$i<=4;$i++){
    ${'link'.$i} = ( '||' === ${'link'.$i} ) ? '' : ${'link'.$i};
    ${'link'.$i} = vc_build_link( ${'link'.$i} );
    ${'use_link'.$i} = false;
    if ( strlen( ${'link'.$i}['url'] ) > 0 ) {
            ${'use_link'.$i} = true;
            ${'a_href'.$i} = ${'link'.$i}['url'];
            ${'a_title'.$i} = ${'link'.$i}['title'];
            ${'a_target'.$i} = ${'link'.$i}['target'];
            ${'a_rel'.$i} = ${'link'.$i}['rel'];
    }
    if ( ${'use_link'.$i} ) {
            ${'attributes'.$i}['href'] =trim( ${'a_href'.$i} );
            ${'attributes'.$i}['title'] = esc_attr( trim( ${'a_title'.$i} ) );
            if ( ! empty( ${'a_target'.$i} ) ) {
                    ${'attributes'.$i}['target'] =esc_attr( trim( ${'a_target'.$i} ) );
            }else{
                ${'attributes'.$i}['target'] ='';
            }
            if ( ! empty( ${'a_rel'.$i} ) ) {
                    ${'attributes'.$i}['rel'] =esc_attr( trim( ${'a_rel'.$i} ) );
            }
    }
}
$uid=  uniqid();
echo '<style>
.navbox-'.$uid.' ul li a h2{background-color:'.$bg_color.';}
.navbox-'.$uid.' ul li.on a h2{background-color:'.$hover_color.';}
.navbox-'.$uid.' ul li .price{color:'.$bg_color.';}
.navbox-'.$uid.' ul li.on .price{color:'.$hover_color.';}
.navbox-'.$uid.' ul li button{background-color:'.$bg_color.';}
.navbox-'.$uid.' ul li.on button{background-color:'.$hover_color.';}
</style>';

$output.='<div class="navbox-'.$uid.' navbox tbbb1" style="border-bottom:none;"><ul>';
for($i=1;$i<=$lines;$i++){
    if($i==1){
        $output.='<li class="on">';
    }else{
        $output.='<li>';
    }
    $output.='<a href="javascript:;" class="first">';
    $output.='<h2>'.esc_html(${'title'.$i}).'</h2></a>';
    $output.='<div class="second">';
    $output.='<dl>';  
    for($j=1;$j<=$rows;$j++){
        if($i==$lines){
            $output.='<dd class="bl2 bb1 brr2 h60" style="border-right:2px solid #d2d3d5;"><h5>'.esc_html(${'sec'.$i.'_'.$j}).'</h5></dd>';
        }else{
            $output.='<dd class="bl2 bb1 brr2 h60"><h5>'.esc_html(${'sec'.$i.'_'.$j}).'</h5></dd>';
        }
    }
    if($i==$lines){
        $output.='<dd class="bl2 bb2 brr2 h298" style="border-right:2px solid #d2d3d5;">';
    }else{
        $output.='<dd class="bl2 bb2 brr2 h298">';
    }
    $output.='<div class="price">';
    $output.='<span class="fs40">$</span>'.esc_html(${'price'.$i}).'</div>';         
    $output.='<div class="cp666">';             
    $output.='<h5>Per '.esc_html(${'per'.$i}).'</h5></div>';
    $output.='<div>';     
    if(${'use_link'.$i}){
        if(${'attributes'.$i}['target']=='_blank'){
            $output.='<button title="'.${'attributes'.$i}['title'].'" onclick="window.open(\''.esc_url(${'attributes'.$i}['href']).'\');">'.esc_html(${'b_text'.$i}).'</button></div>'; 
        }else{
            $output.='<button title="'.${'attributes'.$i}['title'].'" onclick="location.href=\''.esc_url(${'attributes'.$i}['href']).'\';">'.esc_html(${'b_text'.$i}).'</button></div>'; 
        }
    }else{
        $output.='<button>'.esc_html(${'b_text'.$i}).'</button></div>'; 
    }
    $output.='</dd>';                  
    $output.='</dl>';          
    $output.='</div>';                   
    $output.='</li>';
}
$output.='</ul></div>';

$om_price1_js='jQuery(function($) {
                var liWidth = $(".navbox ul li").width();
                $(".navbox ul li").hover(function() {
                    var index = $(this).index();
                    $(".navbox .dot span").stop().animate({
                        left: liWidth * index + "px"
                    },
                    200);
                    $(".navbox .dot_a span").stop().animate({
                        left: liWidth * index + "px"
                    },
                    200);
                    $(this).addClass("on").siblings().removeClass("on");
                    $(this).find("").fadeIn(600);
                },
                function() {
                    $(this).find("").fadeOut(600);
                });
            });';
wp_add_inline_script( 'onemax-header-init',$om_price1_js);
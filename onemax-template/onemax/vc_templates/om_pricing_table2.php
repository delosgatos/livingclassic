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

$atts = vc_map_get_attributes( 'om_pricing_table2', $atts );//p($atts);
extract( $atts );

//parse link
for($i=1;$i<=3;$i++){
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
.navtwo-'.$uid.' ul li.on a{background-color:'.$hover_color.';}
.navtwo-'.$uid.' ul li button{background-color:'.$bg_color.';}
.navtwo-'.$uid.' ul li.on button{background-color:'.$hover_color.';}
.navtwo-'.$uid.' ul li a h3{color:'.$hover_color.';}
.navtwo-'.$uid.' ul li.on a h3{color:'.$bg_color.';}
</style>';

$output.='<div class="navtwo-'.$uid.' navtwo" style="border-bottom:none;margin-bottom:60px;"><ul>';
for($i=1;$i<=3;$i++){
    if($i==1){
        $output.='<li class="on">';
    }else{
        $output.='<li class="ml50">';
    }
    $output.='<a href="javascript:;" class="first">';
    $output.='<h3>'.esc_html(${'title'.$i}).'<br/><span class="price">$'.esc_html(${'price'.$i}).'/'.esc_html(${'per'.$i}).'<span></h3></a>';
    $output.='<div class="second"><dl>';
    for($j=1;$j<=$no;$j++){
        if($j==1){
            $output.='<dd class="bt1 h20 pt30"><h5>'.esc_html(${'sec'.$i.'_1'}).'</h5></dd>';
        }else{
            $output.='<dd class="h20"><h5>'.esc_html(${'sec'.$i.'_'.$j}).'</h5></dd>';
        }
    }
    $output.='<dd><div class="price">';
    if(${'use_link'.$i}){
        if(${'attributes'.$i}['target']=='_blank'){
            $output.='<button title="'.${'attributes'.$i}['title'].'" onclick="window.open(\''.esc_url(${'attributes'.$i}['href']).'\');">'.esc_html(${'b_text'.$i}).'</button>'; 
        }else{
            $output.='<button title="'.${'attributes'.$i}['title'].'" onclick="location.href=\''.esc_url(${'attributes'.$i}['href']).'\';">'.esc_html(${'b_text'.$i}).'</button>'; 
        }
    }else{
        $output.='<button>'.esc_html(${'b_text'.$i}).'</button>'; 
    }
    $output.='</div></dd>';
    $output.='<dd class="h20 pt25 pb25"><span style="background-color:#d2dae0; color:#9aa5a9; border-radius:20px; padding:5px 10px 5px 10px; font-size:12px;">'.esc_html(${'tip'.$i}).'</span></dd>';
    $output.='</dl></div></li>';
}
$output.='</ul></div>';

$om_price2_js='jQuery(function($) {
                var liWidth = $(".navtwo ul li").width();
                $(".navtwo ul li").hover(function() {
                    var index = $(this).index();
                    $(".navtwo .dot span").stop().animate({
                        left: liWidth * index + "px"
                    },
                    200);
                    $(".navtwo .dot_a span").stop().animate({
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
wp_add_inline_script( 'onemax-header-init',$om_price2_js );
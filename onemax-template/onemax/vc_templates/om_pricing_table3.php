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
$no=$output=$footer_color=$hover_color=$link1=$link2=$link3=$link4=$link5='';
$a_href1 = $a_title1 = $a_target1 = $a_rel1 = '';$a_href2 = $a_title2 = $a_target2 = $a_rel2 = '';
$a_href3 = $a_title3 = $a_target3 = $a_rel3 = '';$a_href4 = $a_title4 = $a_target4 = $a_rel4 = '';
$a_href5 = $a_title5 = $a_target5 = $a_rel5 = '';
$attributes1 =$attributes2 =$attributes3 =$attributes4 = $attributes5=array();

$atts = vc_map_get_attributes( 'om_pricing_table3', $atts );
extract( $atts );

$no_arr=  explode('x', $no);
$rows=$no_arr[1];
$lines=$no_arr[0];

$bg_styles= 'style="'.vc_get_css_color( 'background-color', $bg_color ).'"';
$color_styles='style="'.vc_get_css_color( 'color', $bg_color ).'"';
$footer_styles= 'style="'.vc_get_css_color( 'background-color', $footer_color ).'"';

//parse link
for($i=1;$i<=$lines;$i++){
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
            ${'attributes'.$i}[] ='href="' . trim( ${'a_href'.$i} ) . '"';
            ${'attributes'.$i}[] = 'title="' . esc_attr( trim( ${'a_title'.$i} ) ) . '"';
            if ( ! empty( ${'a_target'.$i} ) ) {
                    ${'attributes'.$i}[] ='target="' . esc_attr( trim( ${'a_target'.$i} ) ). '"';
            }else{
                ${'attributes'.$i}[] ='';
            }
            if ( ! empty( ${'a_rel'.$i} ) ) {
                    ${'attributes'.$i}[] ='rel="' .esc_attr( trim( ${'a_rel'.$i} ) ) . '"';
            }
    }
    ${'attributes'.$i} = implode( ' ', ${'attributes'.$i} );
}

echo '<style>@media screen and (min-width:1200px) {.navbthree{ width:'.(($lines+1)*200).'px;}}</style>';

$output.='<div class="navbthree tbbt1" style="border:none;margin-bottom:'.(14*$rows).'px;"><ul>';
$output.='<li class="on"><a href="javascript:;" class="first"><h3></h3></a><div class="second"><dl>';
for($i=1;$i<=$rows;$i++){
    if($i==1){
        $output.='<dd class="bl1 bb1 bcec brr1 bt1 h60">';
    }else{
        if($i%2==0){
            $output.='<dd class="bl1 bb1 bce0 brr1 h60">';
        }else{
            $output.='<dd class="bl1 bb1 bcec brr1 h60">';
        }
    }
    $output.='<h5>'.esc_html(${'title1_'.$i}).'</h5></dd>';
}
if($rows%2==0){
    $output.='<dd class="bl1 bb1 bcec brr1 h90"><span>Price</span></dd>';
}else{
    $output.='<dd class="bl1 bb1 bce0 brr1 h90"><span>Price</span></dd>';
}
$output.='<dd class="h60" style=""><h5></h5></dd></dl></div></li>';
for($i=1;$i<=$lines;$i++){
    $output.='<li><a href="javascript:;" class="first" '.$bg_styles.'><h3>'.esc_html(${'title'.$i}).'</h3></a>';
    $output.='<div class="second"><dl>';
    for($j=1;$j<=$rows;$j++){
        if($j==1){
            $output.='<dd class="bl1 bb1 bcec brr1 bt1 h60">';
        }else{
            if($j%2==0){
                $output.='<dd class="bl1 bb1 bce0 brr1 h60">';
            }else{
                $output.='<dd class="bl1 bb1 bcec brr1 h60">';
            }
        }
        $output.='<h5>'.esc_html(${'sec'.$i.'_'.$j}).'</h5></dd>';
    }
    if($rows%2==0){
        $output.='<dd class="bl1 bb1 bcec brr1 h90">';
    }else{
        $output.='<dd class="bl1 bb1 bce0 brr1 h90">';
    }
    $output.='<div class="price" '.$color_styles.'>$'.esc_html(${'price'.$i}).'/'.esc_html(${'per'.$i}).'</div></dd>';
    $output.='<dd class="table" '.$footer_styles.'><a style="cursor:pointer;" '.${'attributes'.$i}.'>'.esc_html(${'b_text'.$i}).'</a></dd></dl></div></li>';
}
    $output.='</ul></div>';


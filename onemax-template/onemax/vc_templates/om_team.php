<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/**
 * Shortcode attributes
 * @var $style
 * @var $image
 * @var $name
 * @var $title
 * @var $instruction
 * @var $output
 */
$ani=$aos_once=$aos_delay=$aos=$style=$team_bg_color=$image=$name=$title=$instruction=$name_color=$title_color=$instruction_color=$alignment=$output='';
$h_ani=$gradient1=$gradient2=$gradient3=$gradient1_style=$gradient2_style=$gradient3_style='';
$default_src = vc_asset_url( 'vc/no_image.png' );

$atts = vc_map_get_attributes( 'om_team', $atts );
extract( $atts );

if(empty($gradient1)&&empty($gradient2)){
    $gradient1_style=", $gradient3 0";
    $gradient2_style=", $gradient3 40%";
}elseif (empty($gradient1)&&empty($gradient3)) {
    $gradient1_style=", $gradient2 0";
    $gradient3_style=", $gradient2 100%";
}elseif (empty($gradient2)&&empty($gradient3)) {
    $gradient2_style=", $gradient1 40%";
    $gradient3_style=", $gradient1 100%";
}else{
    $gradient1_style=empty($gradient1)?'':", $gradient1 0";
    $gradient2_style=empty($gradient2)?'':", $gradient2 40%";
    $gradient3_style=empty($gradient3)?'':", $gradient3 100%";
}

if($ani != 'none')
    $aos="data-aos='$ani' data-aos-once='$aos_once' data-aos-delay='$aos_delay'";

$img_id = preg_replace( '/[^\d]/', '', $image );
$img = wpb_getImageBySize( array(
			'attach_id' => $img_id,
			'thumb_size' => '380x380',
            'class'=>'img'
		) );
if ( ! $img ) {
    $img['thumbnail'] = '<img alt="thumbnail" class="vc_img-placeholder vc_single_image-img img" src="' . $default_src . '"/>';
}

if($style=='style1'){
    $output.='<div '.$aos.' class="teamfour om-width" style="display: table;margin:'.$alignment.';"><dl class="text-center team_x2">';
    $output.='<dt></dt><dd class="pt65"><ul class="w380">';
    $output.='<li class="fl w33 pr"><figure class="'.$h_ani.' wpb_wrapper vc_figure" style="position:relative;background:linear-gradient(-45deg'.$gradient1_style.$gradient2_style.$gradient3_style.');">'.$img['thumbnail'].'<figcaption></figcaption></figure><p class="img_tel" style="background-color:'.esc_attr($team_bg_color).';">';
    $output.='<span class="img_title team-name-font" style="color:'.esc_attr($name_color).';">'.esc_html($name).'</span>';
    $output.='<span class="img_box team-title-font" style="color:'.esc_attr($title_color).';">'.esc_html($title).'</span></p></li></ul></dd></dl></div>';
}elseif ($style=='style2') {
    $output.='<div '.$aos.' class="teamtwo team_x om-width" style="display: table;margin:'.$alignment.';"><dl class="text-center">';
    $output.='<dt></dt><dd><ul><li class="fl pl56 tow65 pt65"><figure class="'.$h_ani.' wpb_wrapper vc_figure" style="border-radius:100px;position:relative;background:linear-gradient(-45deg'.$gradient1_style.$gradient2_style.$gradient3_style.');">'.$img['thumbnail'].'<figcaption></figcaption></figure>';
    $output.='<span class="img_title team-name-font" style="color:'.esc_attr($name_color).';">'.esc_html($name).'</span>';
    $output.='<h4 class="img_box team-title-font" style="color:'.esc_attr($title_color).';">'.esc_html($title).'</h4></li>';
    $output.='</ul></dd></dl></div>';
}else{
    $output.='<div '.$aos.' class="team team_x om-width" style="display: table;margin:'.$alignment.';"><dl class="text-center">';
    $output.='<dt></dt><dd class="pt65"><ul class="w380"><li class="fl w33" style="display:inline-table;"><figure class="'.$h_ani.' wpb_wrapper vc_figure" style="position:relative;background:linear-gradient(-45deg'.$gradient1_style.$gradient2_style.$gradient3_style.');">'.$img['thumbnail'].'<figcaption></figcaption></figure>';
    $output.='<span class="img_title team-name-font" style="color:'.esc_attr($name_color).';">'.esc_html($name).'</span>';
    $output.='<h4 class="img_box team-title-font" style="color:'.esc_attr($title_color).';">'.esc_html($title).'</h4>';
    $output.='<span class="color35 team-instruction team-instruction-font" style="color:'.esc_attr($instruction_color).';">'.$instruction.'</span>';
    $output.='</li></ul></dd></dl></div>';
}

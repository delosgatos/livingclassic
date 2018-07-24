<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/**
 * Shortcode attributes
 * @var $image1
 * @var $name1
 * @var $title1
 * @var $instruction1
 * @var $image2
 * @var $name2
 * @var $title2
 * @var $instruction2
 * @var $output
 */
$ani=$aos_once=$aos_delay=$aos=$image1=$name1=$title1=$instruction1=$image2=$name2=$title2=$instruction2=$alignment=$output='';
$name_color1=$title_color1=$instruction_color1=$name_color2=$title_color2=$instruction_color2='';
$default_src = vc_asset_url( 'vc/no_image.png' );

$atts = vc_map_get_attributes( 'om_team_list', $atts );
extract( $atts );

if($ani != 'none')
    $aos="data-aos='$ani' data-aos-once='$aos_once' data-aos-delay='$aos_delay'";

$img_id1 = preg_replace( '/[^\d]/', '', $image1 );
$img1 = wpb_getImageBySize( array(
			'attach_id' => $img_id1,
			'thumb_size' => '120x120',
		) );
if ( ! $img1 ) {
    $img1['thumbnail'] = '<img alt="thumbnail" width="120" height="120" class="vc_img-placeholder vc_single_image-img" src="' . $default_src . '"/>';
}

$img_id2 = preg_replace( '/[^\d]/', '', $image2);
$img2 = wpb_getImageBySize( array(
			'attach_id' => $img_id2,
			'thumb_size' => '120x120',
		) );
if ( ! $img2) {
    $img2['thumbnail'] = '<img alt="thumbnail" width="120" height="120" class="vc_img-placeholder vc_single_image-img" src="' . $default_src . '"/>';
}
$output.='<div '.$aos.' class="teamsix"><dl><dd><ul class="con om-width" style="justify-content:'.$alignment.';"><li class="fl w49"><div class="team-list-div ">';

$output.='<div class=" title"><span class="colorcf" style="color:'.esc_attr($name_color1).';">'.esc_html($name1).'&nbsp;<span style="color:'.esc_attr($title_color1).';">'.esc_html($title1).'</span></span><p style="color:'.esc_attr($instruction_color1).';">'.esc_html($instruction1).'</p></div>';
$output.='<div class=" team-img">'.$img1['thumbnail'].'</div></div></li>';

$output.='<li class="fl w49"><div class="team-list-div"><div class=" team-img2">'.$img2['thumbnail'].'</div>';
$output.='<div class=" title_box"><span class="colorcf" style="color:'.esc_attr($name_color2).';">'.esc_html($name2).'&nbsp;<span style="color:'.esc_attr($title_color2).';">'.esc_html($title2).'<span></span><p style="color:'.esc_attr($instruction_color2).';">'.$instruction2.'</p></div></div></li>';
$output.='</ul></dd></dl></div>';

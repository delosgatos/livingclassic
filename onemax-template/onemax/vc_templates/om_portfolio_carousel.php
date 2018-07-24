<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$ani=$aos_delay=$animate=$t_num=$spacing=$h_ani=$order_by=$order_style=$cat=$onclick=$title=$arrows_color=$indicators_color=$html=$output='';
$gradient1=$gradient2=$gradient3=$gradient1_style=$gradient2_style=$gradient3_style='';
$i=1;$cat_id_arr=array();
$atts = vc_map_get_attributes( 'om_portfolio_carousel', $atts );//p($atts);
extract( $atts );

if($t_num==''){
    return '';
}

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

if($ani != 'none'){
    wp_register_style('onemax-portfolio-new-css', ONEMAX_URI.'/css/portfolio_new/theme.css');
    wp_enqueue_style('onemax-portfolio-new-css');
    $animate='animate';
}
$uid=uniqid();
$space=$spacing/2;

echo '<style>.portfolio-carousel-'.$uid.' .owl-theme .owl-item{margin-left:'.$space.'px;margin-rifht:'.$space.'px;}.portfolio-carousel-'.$uid.' .owl-theme .owl-controls .owl-page span{background-color:'.$indicators_color.';}.portfolio-carousel-'.$uid.' .owl-prev,.portfolio-carousel-'.$uid.' .owl-next{color:'.$arrows_color.' !important;}</style>';

$args = array(
                'post_type'=> 'portfolio,',
                'posts_per_page'=> $t_num,
                'orderby' =>$order_by,
                'order' =>$order_style,
        );

if(!empty($cat)){
    $categories_arr=explode(',',$cat);
    foreach($categories_arr as $v){
        $cat_id_arr[]=get_cat_ID( $v );
    }
    $args['category__in']=$cat_id_arr;
}

$query = new WP_Query($args);
while ($query->have_posts()) : $query->the_post();
    $video_html=onemax_get_portfolio_video(get_the_ID());
    if (has_post_thumbnail() || !empty($video_html)) {
        $html.='<div class="item '.$animate.'" data-anim-type="'.$ani.'" data-anim-delay="'.($aos_delay*$i++).'">';
        if(has_post_thumbnail()){
            $img_info=onemax_get_img_info(get_post_thumbnail_id());
            $html.='<div class="item_wrapper grid">
                <div class="img_block wrapped_img">';
            if($onclick=='yes'){
                $html.='<a href="'.esc_url($img_info['img_src']).'" class="photozoom">';
            }elseif($onclick=='no'){
                $external_portfolio_link=get_post_meta(get_the_ID(), "om-portfolio-link", true);
                if(empty($external_portfolio_link)){
                    $external_portfolio_link=get_the_permalink();
                }
                $html.='<a href="'.esc_url($external_portfolio_link).'" target="_blank">';
            }
            $html.='<figure class=" '.$h_ani.' carousel-fg" style="width:100%; background:linear-gradient(-45deg'.$gradient1_style.$gradient2_style.$gradient3_style.');"><img src="'.esc_url($img_info['img_src']).'" class="vc_single_image-img attachment-full " ><figcaption>';
            if(trim($img_info['img_caption'])!=''){
                $html.='<h2>'.esc_html($img_info['img_caption']).'</h2>';
            }
            $html.='<p>'.esc_html($img_info['img_describe']).'</p></figcaption></figure>';
            if(!empty($onclick)){
                $html.='</a>';
            }
            $html.='</div>';
            if($title=='yes')
                $html.='<p class="portfolio-carousel-title">'.esc_html($img_info['img_title']).'</p>';
            $html.='</div>';
        }else{
            $html.='<div class="iframe-embed-wrapper">';
            $html.=$video_html;
            $html.='</div>';  
        }
        $html.='</div>';
    }
endwhile;
unset($query);
wp_reset_query();

$output.='<div class="om-width portfolio-owl-container portfolio-carousel-'.$uid.'"><div class="portfolio-owl-conter owl-carousel">'.$html.'</div></div>';

$om_portfolio_car_js='jQuery(document).ready(function($) {
                $(".portfolio-owl-conter").owlCarousel({
                    items: '.$dis_num.',
                    lazyLoad: true,
                    navigation: true
                });
            });';
wp_add_inline_script( 'onemax-header-init',$om_portfolio_car_js,'before' );
<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$dis_num=$content=$cat=$font_color=$navigation_color=$pagination_color=$output='';
$ani=$aos_once=$aos_delay=$aos='';
$atts = vc_map_get_attributes( 'om_testimonials', $atts );
extract( $atts );

if($ani != 'none'){
    $aos="data-aos='$ani' data-aos-once='$aos_once' data-aos-delay='$aos_delay'";
}
$uid=uniqid();
echo '<style>.testimonials-'.$uid.' .swiper-container-horizontal .swiper-pagination-bullet-active{background-color:'.$pagination_color.';}</style>';

$default_src = vc_asset_url( 'vc/no_image.png' );
$cat_id=get_cat_ID( $cat );
$args = array(
                'post_type'=> 'testimonials,',
                'posts_per_page'=> $dis_num,
                'orderby' =>'date',
                'order' => 'DESC',
                'cat'=>$cat_id
        );
$query = new WP_Query($args);
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
        if (has_post_thumbnail()) {
            $retina  = wp_get_attachment_image_src( get_post_thumbnail_id(  ), 'homepage-thumb-retina' );
        }else{
            $retina=array($default_src);
        }
        $content.='<div class="swiper-slide"><div class="img"><img data-rjs="2" src="'.esc_url($retina[0]).'" height="100" width="100" alt="testimonials image"><br /><p class="testimonials-p testimonials-content-font" style="color:'.esc_attr($font_color).';">' . get_the_content() . '</p></div></div>';
	}
	/* Restore original Post Data */
	wp_reset_postdata();
} else {
	$content='<li><span class="testimonials-content-font">'.esc_html__('no posts found','onemax').'</span></li>';
}

$output.='<div '.$aos.' class="testimonials testimonials-'.$uid.'"><div class="swiper-container"><div class="swiper-wrapper">'.$content.'</div><div class="swiper-pagination"></div><div style="font-size: 30px; color: '.esc_attr($navigation_color).';" class="swiper-button-next fa fa-angle-right"></div><div style="font-size: 30px; color: '.esc_attr($navigation_color).';" class="swiper-button-prev fa fa-angle-left"></div></div></div>';
wp_register_script( 'onemax-swiper',ONEMAX_URI.'/js/library/swiper.js');
wp_enqueue_script('onemax-swiper');

$om_testimoials_img_js='var swiper=new Swiper(".swiper-container",{pagination:".swiper-pagination",paginationClickable:".swiper-pagination",nextButton:".swiper-button-next",prevButton:".swiper-button-prev",loop:!0,autoplay:3e3});';
wp_add_inline_script( 'onemax-swiper',$om_testimoials_img_js );
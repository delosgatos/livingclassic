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
echo '<style>.testimonials2-'.$uid.' .swiper-container-horizontal .swiper-pagination-bullet-active{background-color:'.$pagination_color.';}</style>';

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
        $content.='<div class="swiper-slide"><p class="testimonials-p testimonials-content-font" style="color:'.$font_color.';">' . get_the_content() . '</p></div>';
	}
	/* Restore original Post Data */
	wp_reset_postdata();
} else {
	$content='<li>'.esc_html__('no posts found','onemax').'</li>';
}

$output.='<div '.$aos.' class="testimonials2 testimonials2-'.$uid.'"><div class="swiper-container2"><div class="swiper-wrapper">'.$content.'</div><div class="swiper-pagination"></div><div style="font-size: 30px; color: '.esc_attr($navigation_color).';" class="swiper-button-next fa fa-angle-right"></div><div style="font-size: 30px; color: '.esc_attr($navigation_color).';" class="swiper-button-prev fa fa-angle-left"></div></div></div>';
wp_register_script( 'onemax-swiper',ONEMAX_URI.'/js/library/swiper.js');
wp_enqueue_script('onemax-swiper');
$om_testimoials_js='var swiper=new Swiper(".swiper-container2",{pagination:".swiper-pagination",paginationClickable:".swiper-pagination",nextButton:".swiper-button-next",prevButton:".swiper-button-prev",loop:!0,autoplay:6e3});';
wp_add_inline_script( 'onemax-swiper',$om_testimoials_js );
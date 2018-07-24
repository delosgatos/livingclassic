<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
global $onemax_options;
$output=$total=$cat=$cat_id=$order_by=$order_style=$ani=$aos_delay='';
$h_ani=$gradient1=$gradient2=$gradient3=$gradient1_style=$gradient2_style=$gradient3_style='';
$i=1;
$atts = vc_map_get_attributes( 'om_blog', $atts );
extract( $atts );

if($total==''){
    return '';
}
//ani
$animate='';
if($ani != 'none'){
      $animate='animate';
		wp_register_script( 'onemax-portfolio-js',ONEMAX_URI.'/js/component/portfolios/portfolio.js');
		wp_enqueue_script( 'onemax-portfolio-js');
        add_action( 'wp_footer', 'onemax_init_portfolios',96 );
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

$cat_id=get_cat_ID( $cat );
$args = array(
    'post_type'=> 'post,',
    'posts_per_page'=> intval($total),
    'orderby' =>$order_by,
    'order' => $order_style,
    'cat'=>$cat_id
);
$query=new WP_Query($args);
if ( $query->have_posts() ) {
    if($onemax_options['blog-layout']=='1'){
            $output.='<div class="vc-blog"><ul class="blog blog-one">';
        while ( $query->have_posts() ) {
            $query->the_post();
            $output.='<li class="blog1layout post '.$animate.'" data-anim-type="'.$ani.'" data-anim-delay="'.($aos_delay*$i++).'">';
            $output.='<div class="block-side blog1img">';
            $output.='<a href="'.  get_permalink().'">';
            if(has_post_thumbnail()&&$fe_img=wp_get_attachment_image_src(get_post_thumbnail_id(), array(390, 275))) {
                $output.='<figure class="'.$h_ani.' wpb_wrapper vc_figure" style="position:relative;background:linear-gradient(-45deg'.$gradient1_style.$gradient2_style.$gradient3_style.');"><img width="390" height="275" alt="blog thumbnail" src="'.esc_url($fe_img[0]).'" /><figcaption></figcaption></figure>';
                //$output.=get_the_post_thumbnail(get_the_ID(),array('300','170'));
            }
            $output.='</a>';
            $output.='</div>';
            $output.='<div class="blog1cont">';
            $output.='<h4><a href="'.get_permalink().'"><strong>'.get_the_title().'</strong></a></h4>';
            $output.='<div class="vc-blog1-content">'.get_the_excerpt().'</div>';
            $output.='<div class="om-author-time">';
            $output.='<span>'.get_avatar( get_the_author_meta( 'ID' ), 18, '', 'Authors gravatar' ).'&nbsp;&nbsp;'.get_the_author(). '&nbsp;&nbsp;|&nbsp;&nbsp;' .get_the_time('F j, Y').'</span>';
            $output.='</div>';
            $output.='</div>';
            $output.='</li>';
          }
            $output.='</ul></div>';
    }elseif($onemax_options['blog-layout']=='2'){
            $output.='<div class="vc-blog"><ul class="blog blog-two" >';
        while ( $query->have_posts() ) {
            $query->the_post();
            $output.='<li class="post_width '.$animate.'" data-anim-type="'.$ani.'" data-anim-delay="'.($aos_delay*$i++).'">';
            $output.='<div class="block-side blog2img">';
            $output.='<a href="'.  get_permalink().'">';
            if(has_post_thumbnail()&&$fe_img=wp_get_attachment_image_src(get_post_thumbnail_id(), array(1201, 676))) {
                $output.='<figure class="'.$h_ani.' wpb_wrapper vc_figure" style="position:relative;background:linear-gradient(-45deg'.$gradient1_style.$gradient2_style.$gradient3_style.');"><img width="1201" height="676" alt="blog thumbnail" src="'.esc_url($fe_img[0]).'" /><figcaption></figcaption></figure>';
            }
            $output.='</a>';
            $output.='</div>';
            $output.='<div class="blog2cont">';
            $output.='<div class="heading-section">';
            $output.='<h1><a href="'.get_permalink().'"><strong>'.get_the_title().'</strong></a></h1></div>';
            $output.='<div class="vc-blog2-content">'.get_the_excerpt().'</div>';
            $output.='<div class="om-author-time2">';
            $output.='<span>'.get_avatar( get_the_author_meta( 'ID' ), 32, '', 'Authors gravatar' ).'&nbsp;&nbsp;'.get_the_author(). '&nbsp;&nbsp;|&nbsp;&nbsp;' .get_the_time('F j, Y').'</span>';
            $output.='</div>';
            $output.='</div>';
            $output.='</li>';
        }
            $output.='</ul></div>';
    }  else {
            $output.='<div class="vc-blog"><ul class="blog blog-three">';
        while ( $query->have_posts() ) {
            $query->the_post();
            $output.='<li class="w32 '.$animate.'" data-anim-type="'.$ani.'" data-anim-delay="'.($aos_delay*$i++).'" style="padding:6px 0;"><div class="blog3-li">';
            $output.='<div class="block-side blog3img">';
            $output.='<a href="'.  get_permalink().'">';
            if(has_post_thumbnail()&&$fe_img=wp_get_attachment_image_src(get_post_thumbnail_id(), array(381, 217))) {
                $output.='<figure class="'.$h_ani.' wpb_wrapper vc_figure" style="position:relative;background:linear-gradient(-45deg'.$gradient1_style.$gradient2_style.$gradient3_style.');"><img width="381" height="217" alt="blog thumbnail" src="'.esc_url($fe_img[0]).'" /><figcaption></figcaption></figure>';
            }
            $output.='</a>';
            $output.='</div>';
            $output.='<div class="block_width3 blog3cont">';
            $output.='<h4><a href="'.get_permalink().'"><strong>'.get_the_title().'</strong></a></h4>';
            $output.='<div class="vc-blog3-content">'.get_the_excerpt().'</div>';
            $output.='<div class="om-author-time">';
            $output.='<span>'.get_avatar( get_the_author_meta( 'ID' ), 18, '', 'Authors gravatar' ).'&nbsp;&nbsp;'.get_the_author(). '&nbsp;&nbsp;|&nbsp;&nbsp;' .get_the_time('F j, Y').'</span>';
            $output.='</div>';
            $output.='</div>';
            $output.='</div></li>';
        }
            $output.='</ul></div>';
    }

    wp_reset_postdata();
}else{
    $output.='<p class="no-post">'.esc_html__('Sorry, there are no posts!','onemax').'</p>';
}

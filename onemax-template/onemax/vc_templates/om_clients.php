<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$ani=$aos_delay=$dis_num=$t_num=$sel=$sel_color=$output='';
$i=1;
$src_arr=$client_link_arr=array();
$atts = vc_map_get_attributes( 'om_clients', $atts );
extract( $atts );

$animate='';
if($ani != 'none'){
    $animate='animate';
    wp_register_script( 'onemax-portfolio-js',ONEMAX_URI.'/js/component/portfolios/portfolio.js');
    wp_enqueue_script( 'onemax-portfolio-js');
    add_action( 'wp_footer', 'onemax_init_portfolios',96 );
}
wp_register_script('onemax-clients1', ONEMAX_URI.'/js/component/carousel/jquery.carouFredSel.combined.js', '', '', true);
wp_enqueue_script('onemax-clients1');


$total=$t_num<$dis_num?$dis_num:$t_num;

$args = array(
                'post_type'=> 'clients',
                'posts_per_page'=> $total,
                'orderby' =>'date',
                'order' => 'DESC',
        );
$query = new WP_Query($args);
while ($query->have_posts()) : $query->the_post();
    if (has_post_thumbnail()) {
        //320*320
        $img = wpb_getImageBySize( array(
			'attach_id' => get_post_thumbnail_id(),
			'thumb_size' => '320x320',
		) );
        preg_match('/<img.+src=\"?(.+\.(jpg|gif|bmp|bnp|png|jpeg))\"?.+>/i',$img['thumbnail'],$match);
        $src_arr[]=$match[1];
        $client_link_arr[]=get_post_meta(get_the_ID(), "om-client-link", true);
        //$img_info  = onemax_get_img_info( get_post_thumbnail_id(  ) );
        //$src_arr[]=$img_info['img_src'];
    };
endwhile;
unset($query);
wp_reset_query();
$output.='<div class="om-client-slide">';
$output.='<div class="om-client-logo">';
$output.='<div class="om-client-carousel">';
foreach($src_arr as $k=>$v){
    $output.='<div class="item '.$animate.'" style="width:180px" data-anim-type="'.$ani.'" data-anim-delay="'.($aos_delay*$i++).'">';
    if(empty($client_link_arr[$k])){
        $output.='<img alt="client logo" src="'.esc_url($v).'" />';
    }else{
        $output.='<a href="'.esc_url($client_link_arr[$k]).'" target="_blank"><img alt="client logo" src="'.esc_url($v).'" /></a>';
    }
    $output.='</div>';
}
$output.='</div>';
if($sel=='yes'){
    $output.='<a href="#" class="client-prev fa fa-angle-left" style="color:'.esc_attr($sel_color).';"></a>';
    $output.='<a href="#" class="client-next fa fa-angle-right" style="color:'.esc_attr($sel_color).';"></a>';
}
//$output.='<div class="pager"></div>';pagination: ".pager",
$output.='</div>';
$output.='</div>';

$om_clients_js='jQuery(function($) {
                $(".om-client-carousel").carouFredSel({
                    width:"100%",
                    auto:true,
                    prev: ".client-prev",
                    next: ".client-next",
                    scroll: 1,
                    items: {
                        visible: {
                            min: 2,
                            max: '.$dis_num.'
                        }
                    },
                    swipe: {
                        onMouse: true,
                        onTouch: true
                    }
                });
            });';
wp_add_inline_script( 'onemax-header-init',$om_clients_js );
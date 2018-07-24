<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$ani=$animate=$aos_delay=$t_num=$columns=$style_height=$spacing=$h_ani=$order_by=$order_style=$cat=$onclick=$title=$title_below=$filter=$filter_align=$html=$output='';
$gradient1=$gradient2=$gradient3=$gradient1_style=$gradient2_style=$gradient3_style='';
$i=1;
$cat_arr=$cat_id_arr=array();
$atts = vc_map_get_attributes( 'om_portfolio', $atts );//p($atts);
extract( $atts );

if($t_num==''){
    return '';
}
wp_register_script('onemax-portfolio-js', ONEMAX_URI.'/js/component/portfolios/portfolio.js', '', '', true);
wp_enqueue_script('onemax-portfolio-js');
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

new WPBakeryShortCode_Om_Portfolio(array( 'base' => 'om_portfolio' ));
if($ani != 'none')
    $animate='animate';

if($columns=='3'){
    $columns_no='4';
    // $style_height='23.7555';
}elseif ($columns=='4') {
    $columns_no='3';
    // $style_height='21';
}  else {
    $columns_no='6';
    // $style_height='14.1255';
}

$space=$spacing/2;

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
        $cats=get_the_category();
        $li_cat='';
        foreach($cats as $v){
            $cat_name=str_replace(' ', '_', $v->name);
            $cat_arr[]=$cat_name;
            $li_cat=$li_cat.$cat_name.' ';
        }
        $html.='<div class="col-sm-'.$columns_no.' '.$li_cat.' element" >';
        $html.='<div class="item '.$animate.'" data-anim-type="'.$ani.'" data-anim-delay="'.($aos_delay*$i++).'" style="padding:'.$space.'px;">';
        if(has_post_thumbnail()){
            $img_info=onemax_get_img_info(get_post_thumbnail_id());
            $html.='<div class="item_wrapper grid">';
            if($title=='yes' && $title_below=='no')
                $html.='<p>'.esc_html($img_info['img_title']).'</p>';
            $html.='<div class="img_block wrapped_img">';
            if($onclick=='yes'){
                $html.='<a href="'.esc_url($img_info['img_src']).'" class="photozoom">';
            }elseif($onclick=='no'){
                $external_portfolio_link=get_post_meta(get_the_ID(), "om-portfolio-link", true);
                if(empty($external_portfolio_link)){
                    $external_portfolio_link=get_the_permalink();
                }
                $html.='<a href="'.esc_url($external_portfolio_link).'" target="_blank">';
            }
            $html.='<figure class="gaidbox '.$h_ani.' vc_single_image-img attachment-full om-ed" style="width:100%;vertical-align:bottom;background:linear-gradient(-45deg'.$gradient1_style.$gradient2_style.$gradient3_style.');"><img src="'.esc_url($img_info['img_src']).'" class="vc_single_image-img attachment-full " ><figcaption>';
             if(trim($img_info['img_caption'])!=''){
                $html.='<h2>'.esc_html($img_info['img_caption']).'</h2>';
            }
            $html.='<p>'.esc_html($img_info['img_describe']).'</p></figcaption></figure>';
            if(!empty($onclick)){
                $html.='</a>';
            }
            $html.='</div>';
            if($title=='yes' && $title_below=='yes')
                $html.='<div style="overflow:hidden; font-size:16px; height:35px; padding:1em; word-wrap: break-word;">'.esc_html($img_info['img_title']).'</div>';
            $html.='</div>';
        }else{
            if($title=='yes' && $title_below=='no'){
                $html.='<div class="null-witer"><span style="padding-bottom:36px;">';
                $html.='</span></div>';
            }
            $html.='<div class="iframe-embed-wrapper">';
            $html.=$video_html;
            $html.='</div>';
            if($title=='yes' && $title_below=='yes'){
                $html.='<div class="null-witer"><span>';
                $html.='</span></div>';
            }
        }
        $html.='</div></div>';
    }
endwhile;
unset($query);
wp_reset_query();

$cat_arr=array_unique($cat_arr);
asort($cat_arr);

$output.='<div class="portfolio">';
if($filter=='yes'){
    $output.='<div class="row">
                <div class="col-sm-12 module_cont">
                    <div class="bg_title">
                        <div class="filter_block" style="text-align:'.$filter_align.';">
                            <div class="filter_navigation">
                                <ul class="splitter">
                                    <li>
                                        <ul data-option-key="filter" class="optionset">
                                            <li class="selected">
                                                <a data-option-value="*" data-catname="all" href="#filter">All</a></li>';
                                           foreach($cat_arr as $v){
                                            $output.='<li><a data-option-value=".'.esc_attr($v).'" data-catname="'.esc_attr($v).'" href="#filter">'.esc_attr($v).'</a></li>';
                                           }
                                        $output.='</ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>';
}
$output.='<div class="row">
                <div class="sorting_block image-grid featured_items photo_gallery">'.$html.'</div>
        </div>
        </div><div class="clear"></div>';

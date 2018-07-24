<?php
global $onemax_slider_location;
global $onemax_options;
$slider_size='fullscreen';
$slider_container_style='';
$slider_grid_height='868';
$slider_font_arr=array(  'slider_title_style'=>'slider-title-font',
                         'slider_subtitle_style'=>'slider-subtitle-font',
                         'slider_desc_style'=>'slider-description-font',
                         'slider_btn_style'=>'slider-button-font');
$slider_title_style=$slider_subtitle_style=$slider_desc_style=$slider_btn_style='';
$aimg=array();
foreach($slider_font_arr as $k=>$v){
    if(!empty($onemax_options[$v]['font-style'])){
        $$k.='font-style:'.$onemax_options[$v]['font-style'].';';
    }
    if(!empty($onemax_options[$v]['font-weight'])){
        $$k.='font-weight:'.$onemax_options[$v]['font-weight'].';';
    }
    if(!empty($onemax_options[$v]['font-size'])){
        $$k.='font-size:'.$onemax_options[$v]['font-size'].';';
    }
    if(!empty($onemax_options[$v]['font-family'])){
        $$k.='font-family:'.$onemax_options[$v]['font-family'].';';
    }
    if(!empty($onemax_options[$v]['text-align'])){
        $$k.='text-align:'.$onemax_options[$v]['text-align'].';';
    }
}
$slider_title_color=$slider_subtitle_color=$slider_desc_color=$slider_btn1_color=$slider_btn1_hover=$slider_btn1_bg=$slider_btn1_bg_hover=$slider_btn2_color=$slider_btn2_hover=$slider_btn2_bg=$slider_btn2_bg_hover='';
$slider_title_color=empty($onemax_options['opt-color-scheme']['slider-title-color']['rgba'])?'':'color:'.$onemax_options['opt-color-scheme']['slider-title-color']['rgba'].';';
$slider_subtitle_color=empty($onemax_options['opt-color-scheme']['slider-subtitle-color']['rgba'])?'':'color:'.$onemax_options['opt-color-scheme']['slider-subtitle-color']['rgba'].';';
$slider_desc_color=empty($onemax_options['opt-color-scheme']['slider-description-color']['rgba'])?'':'color:'.$onemax_options['opt-color-scheme']['slider-description-color']['rgba'].';';
$slider_btn1_color=empty($onemax_options['opt-color-scheme']['slider-button1-color']['rgba'])?'':'color:'.$onemax_options['opt-color-scheme']['slider-button1-color']['rgba'].';';
$slider_btn1_bg=empty($onemax_options['opt-color-scheme']['slider-button1-bg-color']['rgba'])?'':'background-color:'.$onemax_options['opt-color-scheme']['slider-button1-bg-color']['rgba'].';';
$slider_btn2_color=empty($onemax_options['opt-color-scheme']['slider-button2-color']['rgba'])?'':'color:'.$onemax_options['opt-color-scheme']['slider-button2-color']['rgba'].';';
$slider_btn2_bg=empty($onemax_options['opt-color-scheme']['slider-button2-bg-color']['rgba'])?'':'background-color:'.$onemax_options['opt-color-scheme']['slider-button2-bg-color']['rgba'].';';
$slider_btn1_hover=empty($onemax_options['opt-color-scheme']['slider-button1-hover-color']['rgba'])?'':$onemax_options['opt-color-scheme']['slider-button1-hover-color']['rgba'];
$slider_btn1_bg_hover=empty($onemax_options['opt-color-scheme']['slider-button1-bg-hover-color']['rgba'])?'':$onemax_options['opt-color-scheme']['slider-button1-bg-hover-color']['rgba'];
$slider_btn2_hover=empty($onemax_options['opt-color-scheme']['slider-button2-hover-color']['rgba'])?'':$onemax_options['opt-color-scheme']['slider-button2-hover-color']['rgba'];
$slider_btn2_bg_hover=empty($onemax_options['opt-color-scheme']['slider-button2-bg-hover-color']['rgba'])?'':$onemax_options['opt-color-scheme']['slider-button2-bg-hover-color']['rgba'];
$slider_autoplay=$onemax_options['slider-autoplay'];
$slider_default_delay=$onemax_options['slider-default-delay'];
$slider_progress_bar=$onemax_options['slider-progress-bar'];
$slider_arrows=$onemax_options['slider-arrows'];
$slider_bullets=$onemax_options['slider-bullets'];
$slider_parallax=empty($onemax_options['slider-parallax'])?'none':$onemax_options['slider-parallax'];
$slider_arrow_style=empty($onemax_options['slider-arrow-style'])?'none':$onemax_options['slider-arrow-style'];
$slider_bullet_style=empty($onemax_options['slider-bullet-style'])?'none':$onemax_options['slider-bullet-style'];
$slider_parallax_speed=$onemax_options['slider-parallax-speed'];
$slider_mobile_visibility=$onemax_options['slider-mobile-visibility'];
$progress_status=$slider_progress_bar=='1'?'off':'on';
if($onemax_options['slider-size']=='0'){
  $slider_size='auto';
  $slider_container_style='max-width:'.intval($onemax_options['slider-width']).'px;margin: 0 auto;padding-top:'.intval($onemax_options['slider-padding']).'px;';
  $slider_grid_height=intval($onemax_options['slider-height']);
}
$li='';
//start the loop
$args = array(
                'post_type'=> 'onemax_slider,',
                'posts_per_page'=> -1,
                'orderby' =>'date',
                'order' =>'ASC',
                'location'=>$onemax_slider_location
        );
$query = new WP_Query($args);
if ( $query->have_posts() ) {
        $layer_ani_arr=array(
            '[{"delay":0,"speed":300,"frame":"0","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":300,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":300,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":300,"frame":"0","from":"x:right;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":300,"frame":"0","from":"x:left;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":300,"frame":"0","from":"y:top;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":300,"frame":"0","from":"y:bottom;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":300,"frame":"0","from":"x:left;skX:45px;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":300,"frame":"0","from":"x:right;skX:-85px;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":300,"frame":"0","from":"x:-200px;skX:85px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":300,"frame":"0","from":"x:200px;skX:-85px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":300,"frame":"0","from":"x:{-250,250};y:{-150,150};rX:{-90,90};rY:{-90,90};rZ:{-360,360};sX:0;sY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"split":"chars","splitdelay":0.05,"speed":2000,"frame":"0","from":"y:[100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"split":"chars","splitdelay":0.1,"speed":2000,"frame":"0","from":"x:[-105%];z:0;rX:0deg;rY:0deg;rZ:-90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"split":"chars","splitdelay":0.05,"speed":2000,"frame":"0","from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"split":"chars","splitdelay":0.05,"speed":2000,"frame":"0","from":"y:[-100%];z:0;rZ:35deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":1000,"frame":"0","from":"z:0;rX:0deg;rY:0;rZ:0;sX:2;sY:2;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":1500,"frame":"0","from":"y:bottom;rZ:90deg;sX:2;sY:2;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":1500,"frame":"0","from":"y:bottom;rX:-20deg;rY:-20deg;rZ:0deg;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":1500,"frame":"0","from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":1500,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":1500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":1000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":1500,"frame":"0","from":"x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":1500,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]',
            '[{"delay":0,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
            );
        //load js css
        wp_register_style( 'onemax-slider-settings', ONEMAX_URI.'/css/slider/settings.css' );
        wp_register_script( 'onemax-slider-js',ONEMAX_URI.'/js/slider/jquery.themepunch.plugins.combined.js');
        function slider_style(){
                    wp_enqueue_style( 'onemax-slider-settings');
                    wp_enqueue_script( 'onemax-slider-js');
                }
      add_action('wp_footer', 'slider_style');
      if($slider_arrows=='1'){
        switch ($slider_arrow_style)
        {
          case 'hesperiden':
            $om_arrow_style='enable: true,style: "hesperiden",tmp:"",';
            break;  
          case 'gyges':
            $om_arrow_style='enable: true,style: "gyges",tmp:"",';
            break;
          case 'hades':
            $om_arrow_style='enable: true,style: "hades",tmp:"<div class=\'tp-arr-allwrapper\'><div class=\'tp-arr-imgholder\'></div></div>",';
            break;
          case 'ares':
            $om_arrow_style='enable: true,style: "ares",tmp:"<div class=\'tp-title-wrap\'><span class=\'tp-arr-titleholder\'>{{title}}</span></div>",';
            break;
          case 'hebe':
            $om_arrow_style='enable: true,style: "hebe",tmp:"<div class=\'tp-title-wrap\'> <span class=\'tp-arr-titleholder\'>{{title}}</span><span class=\'tp-arr-imgholder\'></span></div>",';
            break;
          case 'hermes':
            $om_arrow_style='enable: true,style: "hermes",tmp:"<div class=\'tp-arr-allwrapper\'><div class=\'tp-arr-imgholder\'></div><div class=\'tp-arr-titleholder\'>{{title}}</div></div>",';
            break;
          case 'persephone':
            $om_arrow_style='enable: true,style: "persephone",tmp:"",';
            break;
          case 'erinyen':
            $om_arrow_style='enable: true,style: "erinyen",tmp:"<div class=\'tp-title-wrap\'><div class=\'tp-arr-imgholder\'></div><div class=\'tp-arr-img-over\'></div><span class=\'tp-arr-titleholder\'>{{title}}</span></div>",';
            break;
          case 'zeus':
            $om_arrow_style='enable: true,style: "zeus",tmp:"<div class=\'tp-title-wrap\'><div class=\'tp-arr-imgholder\'></div></div>",';
            break;
          case 'metis':
            $om_arrow_style='enable: true,style: "metis",tmp:"",';
            break;
          case 'dione':
            $om_arrow_style='enable: true,style: "dione",tmp:"<div class=\'tp-arr-imgwrapper\'><div class=\'tp-arr-imgholder\'></div></div>",';
            break;
          case 'uranus':
            $om_arrow_style='enable: true,style: "uranus",tmp:"",';
            break;
          default:
            $om_arrow_style='enable: false,style: "",tmp:"",';
        }
      }else{
        $om_arrow_style='enable: false,style: "",tmp:"",';
      }
      if($slider_bullets=='1'){
        switch ($slider_bullet_style)
        {
          case 'hesperiden':
            $om_bullet_style='enable: true,style: "hesperiden",tmp:"",';
            break;  
          case 'gyges':
            $om_bullet_style='enable: true,style: "gyges",tmp:"",';
            break;
          case 'hades':
            $om_bullet_style='enable: true,style: "hades",tmp:"<span class=\'tp-bullet-image\'></span>",';
            break;
          case 'ares':
            $om_bullet_style='enable: true,style: "ares",tmp:"<span class=\'tp-bullet-title\'>{{title}}</span>",';
            break;
          case 'hebe':
            $om_bullet_style='enable: true,style: "hebe",tmp:"<span class=\'tp-bullet-image\'></span>",';
            break;
          case 'hermes':
            $om_bullet_style='enable: true,style: "hermes",tmp:"",';
            break;
          case 'hephaistos':
            $om_bullet_style='enable: true,style: "hephaistos",tmp:"",';
            break;
          case 'persephone':
            $om_bullet_style='enable: true,style: "persephone",tmp:"",';
            break;
          case 'erinyen':
            $om_bullet_style='enable: true,style: "erinyen",tmp:"",';
            break;
          case 'zeus':
            $om_bullet_style='enable: true,style: "zeus",tmp:"<span class=\'tp-bullet-image\'></span><span class=\'tp-bullet-imageoverlay\'></span><span class=\'tp-bullet-title\'>{{title}}</span>",';
            break;
          case 'metis':
            $om_bullet_style='enable: true,style: "metis",tmp:"<span class=\'tp-bullet-img-wrap\'><span class=\'tp-bullet-image\'></span></span><span class=\'tp-bullet-title\'>{{title}}</span>",';
            break;
          case 'dione':
            $om_bullet_style='enable: true,style: "dione",tmp:"<span class=\'tp-bullet-img-wrap\'><span class=\'tp-bullet-image\'></span></span><span class=\'tp-bullet-title\'>{{title}}</span>",';
            break;
          case 'uranus':
            $om_bullet_style='enable: true,style: "uranus",tmp:"<span class=\'tp-bullet-inner\'></span>",';
            break;
          default:
            $om_bullet_style='enable: false,style: "",tmp:"",';
        }
      }else{
        $om_bullet_style='enable: false,style: "",tmp:"",';
      }
      $om_slider_js='var tpj=jQuery;
                     var revapi1014;
                     tpj(document).ready(function() {
                        if(tpj("#rev_slider_1014_1").revolution == undefined){
                          revslider_showDoubleJqueryError("#rev_slider_1014_1");
                        }else{
                          revapi1014 = tpj("#rev_slider_1014_1").show().revolution({
                            sliderType:"standard",
                            jsFileLocation:"//server.local/revslider/wp-content/plugins/revslider/public/assets/js/",
                            sliderLayout:"'.$slider_size.'",
                            dottedOverlay:"none",
                            delay:'.$slider_default_delay.',';
        if($slider_parallax=='parallax'){
            $om_slider_js.='parallax: {
                                type: "mouse+scroll",
                                origo: "slidercenter",
                                speed: '.$slider_parallax_speed.',
                                levels: [5,10,15,20,25,30,35,40,
                                         45,46,47,48,49,50,51,55],
                                disable_onmobile: "on"
                            },';
        }elseif($slider_parallax=='3d'){
            $om_slider_js.='parallax: {
                                type: "3D",
                                origo: "slidercenter",
                                speed: '.$slider_parallax_speed.',
                                levels: [5,10,15,20,25,30,35,40,
                                         45,46,47,48,49,50,51,55],
                                ddd_shadow: "on",
                                ddd_bgfreeze: "off",
                                ddd_overflow: "visible",
                                ddd_layer_overflow: "visible",
                                ddd_z_correction: 65,
                                disable_onmobile: "on"
                            },';
        }
            $om_slider_js.='navigation: {
                              keyboardNavigation:"on",
                              keyboard_direction: "horizontal",
                              mouseScrollNavigation:"off",
                              mouseScrollReverse:"default",
                              onHoverStop:"off",
                              touch:{
                                touchenabled:"off",
                                swipe_threshold: 75,
                                swipe_min_touches: 1,
                                swipe_direction: "horizontal",
                                drag_block_vertical: false
                              },
                              bullets: {'.$om_bullet_style.'
                                hide_onleave: true,
                                h_align: "center",
                                v_align: "bottom",
                                h_offset: 0,
                                v_offset: 20,
                                space: 10,
                              },
                              arrows: {'.$om_arrow_style.'
                                hide_onmobile:true,
                                hide_under:798,
                                hide_onleave:true,
                                left: {
                                  h_align:"left",
                                  v_align:"center",
                                  h_offset:20,
                                  v_offset:0
                                },
                                right: {
                                  h_align:"right",
                                  v_align:"center",
                                  h_offset:20,
                                  v_offset:0
                                }
                              }
                            },
                            responsiveLevels:[1240,1024,778,320],
                            visibilityLevels:[1240,1024,778,320],
                            gridwidth:[1240,1024,778,320],
                            gridheight:['.$slider_grid_height.',768,960,600],
                            lazyType:"none",
                            shadow:0,
                            spinner:"off",';
        if($slider_autoplay=='1'){
            $om_slider_js.='stopLoop:"off",
                            stopAfterLoops:-1,
                            stopAtSlide:-1,';
        }else{
            $om_slider_js.='stopLoop: "on",
                            stopAfterLoops: 0,
                            stopAtSlide: 1,';
        }
            $om_slider_js.='shuffle:"off",
                            disableProgressBar:"'.$progress_status.'",
                            autoHeight:"off",
                            fullScreenAutoWidth:"off",
                            fullScreenAlignForce:"off",
                            fullScreenOffsetContainer: "",
                            fullScreenOffset: "",
                            hideThumbsOnMobile:"off",
                            hideSliderAtLimit:0,
                            hideCaptionAtLimit:0,
                            hideAllCaptionAtLilmit:0,
                            debugMode:false,
                            fallbacks: {
                              simplifyAll:"off",
                              nextSlideOnWindowFocus:"off",
                              disableFocusListener:false
                            }
                          });
                        }
                      });';
    wp_add_inline_script( 'onemax-slider-js',$om_slider_js );
    while ( $query->have_posts() ) : $query->the_post();
        //get the slider info
        $om_slider_delay=get_post_meta(get_the_ID(), "om-slider-delay", true);
        $om_slider_title_delay=get_post_meta(get_the_ID(), "om-slider-title-delay", true);
        $om_slider_subtitle_delay=get_post_meta(get_the_ID(), "om-slider-subtitle-delay", true);
        $om_slider_description_delay=get_post_meta(get_the_ID(), "om-slider-description-delay", true);
        $om_slider_title_delay=empty($om_slider_title_delay)?'0':$om_slider_title_delay;
        $om_slider_subtitle_delay=empty($om_slider_subtitle_delay)?'0':$om_slider_subtitle_delay;
        $om_slider_description_delay=empty($om_slider_description_delay)?'0':$om_slider_description_delay;
        $om_slider_link=get_post_meta(get_the_ID(), "om-slider-link", true);
        $om_slider_transitions=get_post_meta(get_the_ID(), "om-slider-transitions", true);
        $om_slider_type=get_post_meta(get_the_ID(), "slider-pic-video-switch", true);
        $om_slider_bg_image=get_post_meta(get_the_ID(), "om-slider-bg-image", true);
        $om_slider_filter=get_post_meta(get_the_ID(), "om-slider-bg-filter", true);
        $om_slider_bg_size=get_post_meta(get_the_ID(), "om-slider-bg-size", true);
        $om_slider_bg_repeat=get_post_meta(get_the_ID(), "om-slider-bg-repeat", true);
        $om_slide_video_cover=get_post_meta(get_the_ID(), "om-slider-video-cover", true);
        $om_slider_external_video=get_post_meta(get_the_ID(), "om-slider-external-video", true);
        $om_slider_mp4_video=get_post_meta(get_the_ID(), "local-mp4-video", true);
        $om_slider_forcerewind=get_post_meta(get_the_ID(), "data-forcerewind", true);
        $om_slider_nextslideatend=get_post_meta(get_the_ID(), "data-nextslideatend", true);
        $om_slider_videoloop=get_post_meta(get_the_ID(), "data-videoloop", true);
        $om_slider_title=get_post_meta(get_the_ID(), "om-slider-title", true);
        $om_slider_title_position=get_post_meta(get_the_ID(), "om-slider-ele-position-title", true);
        $om_slider_title_hoffset=get_post_meta(get_the_ID(), "om-slider-ele-position-hoffset-title", true);
        $om_slider_title_voffset=get_post_meta(get_the_ID(), "om-slider-ele-position-voffset-title", true);
        $om_slider_title_ani=get_post_meta(get_the_ID(), "om-slider-ele-animation-title", true);
        $om_slider_sub_title=get_post_meta(get_the_ID(), "om-slider-sub-title", true);
        $om_slider_sub_title_position=get_post_meta(get_the_ID(), "om-slider-ele-position-subtitle", true);
        $om_slider_sub_title_hoffset=get_post_meta(get_the_ID(), "om-slider-ele-position-hoffset-subtitle", true);
        $om_slider_sub_title_voffset=get_post_meta(get_the_ID(), "om-slider-ele-position-voffset-subtitle", true);
        $om_slider_sub_title_ani=get_post_meta(get_the_ID(), "om-slider-ele-animation-subtitle", true);
        $om_slider_desc=get_post_meta(get_the_ID(), "om-slider-description", true);
        $om_slider_desc_position=get_post_meta(get_the_ID(), "om-slider-ele-position-description", true);
        $om_slider_desc_hoffset=get_post_meta(get_the_ID(), "om-slider-ele-position-hoffset-description", true);
        $om_slider_desc_voffset=get_post_meta(get_the_ID(), "om-slider-ele-position-voffset-description", true);
        $om_slider_desc_ani=get_post_meta(get_the_ID(), "om-slider-ele-animation-description", true);
        $om_slider_btn=get_post_meta(get_the_ID(), "slider-button-switch", true);
        $om_slider_btn1_text=get_post_meta(get_the_ID(), "om-slider-button1-text", true);
        $om_slider_btn1_link=get_post_meta(get_the_ID(), "om-slider-button1-link", true);
        $om_slider_btn2_text=get_post_meta(get_the_ID(), "om-slider-button2-text", true);
        $om_slider_btn2_link=get_post_meta(get_the_ID(), "om-slider-button2-link", true);
        $om_slider_title_style=get_post_meta(get_the_ID(), "om-slider-title-style", true);
        $om_slider_bg_color=get_post_meta(get_the_ID(), "om-slider-bg-color", true);
        $om_slider_title_link=get_post_meta(get_the_ID(), "om-slider-title-link", true);
        $om_slider_subtitle_link=get_post_meta(get_the_ID(), "om-slider-subtitle-link", true);
        $om_slider_description_link=get_post_meta(get_the_ID(), "om-slider-description-link", true);
        $aimg[]=esc_url($om_slider_bg_image['url']);
        //slider title style
        $slider_title_border_style='';
        if($om_slider_title_style=='1'){
          $slider_title_border_style='background-color:'.$onemax_options['opt-color-scheme']['slider-title-style-color']['rgba'].';border: 5px solid '.$onemax_options['opt-color-scheme']['slider-title-border-color']['rgba'].';box-shadow:0px 0px 0px 5px '.$onemax_options['opt-color-scheme']['slider-title-style-color']['rgba'].';display:inline-block;line-height:1;padding:10px 50px;vertical-align: middle;';
        }
        //slider li begin
        $om_slider_transitions=empty($om_slider_transitions)?'fade':$om_slider_transitions;
        if(empty($om_slider_delay)){
          $om_slider_title_delay=$om_slider_title_delay<=$slider_default_delay?$om_slider_title_delay:'0';
          $om_slider_subtitle_delay=$om_slider_subtitle_delay<=$slider_default_delay?$om_slider_subtitle_delay:'0';
          $om_slider_description_delay=$om_slider_description_delay<=$slider_default_delay?$om_slider_description_delay:'0';
        }else{
          $om_slider_title_delay=$om_slider_title_delay<=intval($om_slider_delay)?$om_slider_title_delay:'0';
          $om_slider_subtitle_delay=$om_slider_subtitle_delay<=intval($om_slider_delay)?$om_slider_subtitle_delay:'0';
          $om_slider_description_delay=$om_slider_description_delay<=intval($om_slider_delay)?$om_slider_description_delay:'0';
        }
        $om_slider_delay=empty($om_slider_delay)?'':'data-delay="'.intval($om_slider_delay).'"';
        $om_slider_filter=empty($om_slider_filter)?'':"data-mediafilter='$om_slider_filter'";
        $om_slider_bg_size=empty($om_slider_bg_size)?'cover':$om_slider_bg_size;
        $om_slider_bg_repeat=empty($om_slider_bg_repeat)?'no-repeat':$om_slider_bg_repeat;
        $om_slider_forcerewind=empty($om_slider_forcerewind)?'on':$om_slider_forcerewind;
        $om_slider_nextslideatend=empty($om_slider_nextslideatend)?'true':$om_slider_nextslideatend;
        $om_slider_videoloop=empty($om_slider_videoloop)?'loop':$om_slider_videoloop;
        $om_slider_link=empty($om_slider_link)?'':'data-link="'.esc_url($om_slider_link).'"';
        $li.='<li data-index="rs-'.get_the_ID().'" data-transition="'.$om_slider_transitions.'" '.$om_slider_delay.' '.$om_slider_filter.' data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-thumb="'.esc_url($om_slider_bg_image['url']).'" '.$om_slider_link.' data-target="_blank" data-slideindex="back" data-rotate="0"  data-saveperformance="off"  data-title="'.get_the_title().'" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">';
        //bg
        if($om_slider_type=='0'){
            $cover_img=empty($om_slide_video_cover)?'':$om_slide_video_cover['url'];
            $li.='<img src="'.$cover_img.'"  alt="slider background image" data-bgparallax="15" data-bgposition="center center" data-bgfit="cover" class="rev-slidebg" data-no-retina>';
             if(!empty($om_slider_external_video)){
                if(strpos($om_slider_external_video,'youtube')!==false){
                    parse_str( parse_url( $om_slider_external_video, PHP_URL_QUERY ), $vars );
                    $li.='<div class="rs-background-video-layer"
                              data-forcerewind="'.$om_slider_forcerewind.'" 
                              data-nextslideatend="'.$om_slider_nextslideatend.'" 
                              data-volume="mute"
                              data-ytid="'.$vars['v'].'"
                              data-videoattributes="version=3&amp;enablejsapi=1&amp;html5=1&amp;hd=1&amp;wmode=opaque&amp;showinfo=0&amp;rel=0;;origin='.home_url().';"
                              data-videorate="1"
                              data-videowidth="100%"
                              data-videoheight="100%"
                              data-videocontrols="none"
                              data-videostartat="00:06"
                              data-videoendat="01:40"
                              data-videoloop="'.$om_slider_videoloop.'"
                              data-forceCover="1"
                              data-aspectratio="4:3"
                              data-autoplay="true"
                              data-autoplayonlyfirsttime="false"
                        ></div>';
                }elseif(strpos($om_slider_external_video,'vimeo')!==false){
                    $vimeo_info=parse_url( $om_slider_external_video);
                    $vimeo_id=substr($vimeo_info['path'], 1);
                    $li.='<div class="rs-background-video-layer"
                              data-forcerewind="'.$om_slider_forcerewind.'" 
                              data-nextslideatend="'.$om_slider_nextslideatend.'" 
                              data-volume="mute"
                              data-vimeoid="'.$vimeo_id.'"
                              data-videoattributes="background=1&title=0&amp;byline=0&amp;portrait=0&amp;api=1"
                              data-videowidth="100%"
                              data-videoheight="100%"
                              data-videocontrols="none"
                              data-videostartat="00:00"
                              data-videoendat="00:48"
                              data-videoloop="'.$om_slider_videoloop.'"
                              data-forceCover="1"
                              data-aspectratio="4:3"
                              data-autoplay="true"
                              data-autoplayonlyfirsttime="false"
                        ></div>';
                }
             } else{
                if(!empty($om_slider_mp4_video['url'])){
                    $html_video=$om_slider_mp4_video['url'];
                }else{
                    $html_video='';
                }
                $li.='<div class="rs-background-video-layer"
                        data-forcerewind="'.$om_slider_forcerewind.'" 
                        data-nextslideatend="'.$om_slider_nextslideatend.'" 
                        data-volume="mute"
                        data-videowidth="100%"
                        data-videoheight="100%"
                        data-videomp4="'.$html_video.'"
                        data-videopreload="auto"
                        data-videoloop="'.$om_slider_videoloop.'"
                        data-forceCover="1"
                        data-aspectratio="16:9"
                        data-autoplay="true"
                        data-autoplayonlyfirsttime="false"
                  ></div>';
             }
        }
        else{
            $li.='<img style="background:'.$om_slider_bg_color.';" src="'.esc_url($om_slider_bg_image['url']).'"  alt="slider background image" data-bgparallax="15" data-bgposition="center center" data-bgfit="'.$om_slider_bg_size.'" data-bgrepeat="'.$om_slider_bg_repeat.'" class="rev-slidebg">';
        }
        //title
        $om_slider_title_position_arr=empty($om_slider_title_position)?array('center','center'):explode('-',$om_slider_title_position);
        $om_slider_title_hoffset=!empty($om_slider_title_hoffset)||$om_slider_title_hoffset=='0'?intval($om_slider_title_hoffset):'0';
        $om_slider_title_voffset=!empty($om_slider_title_voffset)||$om_slider_title_voffset=='0'?intval($om_slider_title_voffset):'0';
        $om_slider_title_ani=empty($om_slider_title_ani)?'0':$om_slider_title_ani;
        $li.='<div class="tp-caption tp-resizeme"
                   data-x="'.$om_slider_title_position_arr[0].'" data-hoffset="'.$om_slider_title_hoffset.'"
                   data-y="'.$om_slider_title_position_arr[1].'" data-voffset="'.$om_slider_title_voffset.'"
                   data-width="auto"
                   data-height="auto"
                   data-whitespace="nowrap" ';
                   if(!empty($om_slider_title_link)){
                    $li.='data-actions=\'[{"event": "click", "action": "simplelink", "target": "_blank", "url": "'.esc_url($om_slider_title_link).'"}]\' ';
                   }
                   $li.='data-type="text"
                   data-responsive_offset="on"
                   data-frames=\''.str_replace('"delay":0', '"delay":'.$om_slider_title_delay, $layer_ani_arr[$om_slider_title_ani]).'\'
                   data-textAlign="[\'center\',\'center\',\'center\',\'center\']"
                   data-paddingtop="[10,10,10,10]"
                   data-paddingright="[50,50,30,10]"
                   data-paddingbottom="[10,10,10,10]"
                   data-paddingleft="[50,50,30,10]"
                   style="'.$slider_title_style.$slider_title_color.$slider_title_border_style.' line-height:1!important;z-index: 6; white-space: nowrap;">'.$om_slider_title.'</div>';
        //subtitle
        $om_slider_sub_title_position_arr=empty($om_slider_sub_title_position)?array('center','center'):explode('-',$om_slider_sub_title_position);
        $om_slider_sub_title_hoffset=!empty($om_slider_sub_title_hoffset)||$om_slider_sub_title_hoffset=='0'?intval($om_slider_sub_title_hoffset):'0';
        $om_slider_sub_title_voffset=!empty($om_slider_sub_title_voffset)||$om_slider_sub_title_voffset=='0'?intval($om_slider_sub_title_voffset):'0';
        $om_slider_sub_title_ani=empty($om_slider_sub_title_ani)?'0':$om_slider_sub_title_ani;
        $li.='<div class="tp-caption tp-resizeme"
                   data-x="'.$om_slider_sub_title_position_arr[0].'" data-hoffset="'.$om_slider_sub_title_hoffset.'"
                   data-y="'.$om_slider_sub_title_position_arr[1].'" data-voffset="'.$om_slider_sub_title_voffset.'"
                   data-width="auto"
                   data-height="auto"
                   data-whitespace="nowrap" ';
                   if(!empty($om_slider_subtitle_link)){
                    $li.='data-actions=\'[{"event": "click", "action": "simplelink", "target": "_blank", "url": "'.esc_url($om_slider_subtitle_link).'"}]\' ';
                   }
                   $li.='data-type="text"
                   data-responsive_offset="on"
                   data-frames=\''.str_replace('"delay":0', '"delay":'.$om_slider_subtitle_delay, $layer_ani_arr[$om_slider_sub_title_ani]).'\'
                   data-textAlign="[\'center\',\'center\',\'center\',\'center\']"
                   data-paddingtop="[0,0,0,0]"
                   data-paddingright="[0,0,0,30]"
                   data-paddingbottom="[0,0,0,0]"
                   data-paddingleft="[0,0,0,30]"
                   style="'.$slider_subtitle_style.$slider_subtitle_color.'z-index: 6; white-space: nowrap;line-height:1;">'.$om_slider_sub_title.'</div>';
        //description
        $om_slider_desc_position_arr=empty($om_slider_desc_position)?array('center','center'):explode('-',$om_slider_desc_position);
        $om_slider_desc_hoffset=!empty($om_slider_desc_hoffset)||$om_slider_desc_hoffset=='0'?intval($om_slider_desc_hoffset):'0';
        $om_slider_desc_voffset=!empty($om_slider_desc_voffset)||$om_slider_desc_voffset=='0'?intval($om_slider_desc_voffset):'0';
        $om_slider_desc_ani=empty($om_slider_desc_ani)?'0':$om_slider_desc_ani;
        $li.='<div class="tp-caption tp-resizeme"
                   data-x="'.$om_slider_desc_position_arr[0].'" data-hoffset="'.$om_slider_desc_hoffset.'"
                   data-y="'.$om_slider_desc_position_arr[1].'" data-voffset="'.$om_slider_desc_voffset.'"
                   data-width="none"
                   data-height="none"
                   data-whitespace="nowrap "';
                   if(!empty($om_slider_description_link)){
                    $li.='data-actions=\'[{"event": "click", "action": "simplelink", "target": "_blank", "url": "'.esc_url($om_slider_description_link).'"}]\' ';
                   }
                   $li.='data-type="text"
                   data-responsive_offset="on"
                   data-frames=\''.str_replace('"delay":0', '"delay":'.$om_slider_description_delay, $layer_ani_arr[$om_slider_desc_ani]).'\'
                   data-textAlign="[\'center\',\'center\',\'center\',\'center\']"
                   data-paddingtop="[0,0,0,0]"
                   data-paddingright="[0,0,0,0]"
                   data-paddingbottom="[0,0,0,0]"
                   data-paddingleft="[0,0,0,0]"
                   style="'.$slider_desc_style.$slider_desc_color.'z-index: 6; white-space: nowrap; line-height: 1; border-width:0px;">'.$om_slider_desc.'</div>';
        //btn
        if($om_slider_btn != '0'){
            if(!empty($om_slider_btn1_text)){
                $om_slider_btn1_hoffset=get_post_meta(get_the_ID(), "om-slider-hoffset-btn1", true);
                $om_slider_btn1_voffset=get_post_meta(get_the_ID(), "om-slider-voffset-btn1", true);
                $om_slider_btn1_hoffset=!empty($om_slider_btn1_hoffset)||$om_slider_btn1_hoffset=='0'?intval($om_slider_btn1_hoffset):'630';
                $om_slider_btn1_voffset=!empty($om_slider_btn1_voffset)||$om_slider_btn1_voffset=='0'?intval($om_slider_btn1_voffset):'120';
                $li.='<div class="tp-caption rev-btn tp-resizeme"
                           data-x="[\'right\',\'right\',\'center\',\'center\']" data-hoffset="[\''.$om_slider_btn1_hoffset.'\',\'520\',\'-110\',\'-110\']"
                           data-y="[\'middle\',\'middle\',\'middle\',\'middle\']" data-voffset="[\''.$om_slider_btn1_voffset.'\',\'120\',\'120\',\'120\']"
                           data-width="none"
                           data-height="none"
                           data-whitespace="nowrap"
                           data-type="button" ';
                           if(!empty($om_slider_btn1_link)){
                            $li.='data-actions=\'[{"event": "click", "action": "simplelink", "target": "_blank", "url": "'.esc_url($om_slider_btn1_link).'"}]\' ';
                           }
                           $li.='data-responsive_offset="on"
                           data-frames=\'[{"from":"x:-50px;opacity:0;","speed":2500,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"},{"frame":"hover","speed":"150","ease":"Power2.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:'.$slider_btn1_hover.';bg:'.$slider_btn1_bg_hover.';bc:rgba(255, 255, 255, 0);bw:2px 2px 2px 2px;"}]\'
                           data-textAlign="[\'left\',\'left\',\'left\',\'left\']"
                           data-paddingtop="[0,0,0,0]"
                           data-paddingright="[50,50,50,50]"
                           data-paddingbottom="[0,0,0,0]"
                           data-paddingleft="[50,50,50,50]"
                           style="'.$slider_btn_style.$slider_btn1_color.$slider_btn1_bg.'z-index: 9; white-space: nowrap; line-height: 46px; border-color:rgba(255, 255, 255, 0.25);border-style:solid;border-width:2px;border-radius:4px 4px 4px 4px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">'.$om_slider_btn1_text.'</div>';
            }
            if(!empty($om_slider_btn2_text)){
                $om_slider_btn2_hoffset=get_post_meta(get_the_ID(), "om-slider-hoffset-btn2", true);
                $om_slider_btn2_voffset=get_post_meta(get_the_ID(), "om-slider-voffset-btn2", true);
                $om_slider_btn2_hoffset=!empty($om_slider_btn2_hoffset)||$om_slider_btn2_hoffset=='0'?intval($om_slider_btn2_hoffset):'630';
                $om_slider_btn2_voffset=!empty($om_slider_btn2_voffset)||$om_slider_btn2_voffset=='0'?intval($om_slider_btn2_voffset):'120';
                $li.='<div class="tp-caption rev-btn tp-resizeme"
                           data-x="[\'left\',\'left\',\'center\',\'center\']" data-hoffset="[\''.$om_slider_btn2_hoffset.'\',\'520\',\'110\',\'110\']"
                           data-y="[\'middle\',\'middle\',\'middle\',\'middle\']" data-voffset="[\''.$om_slider_btn2_voffset.'\',\'120\',\'120\',\'120\']"
                           data-width="none"
                           data-height="none"
                           data-whitespace="nowrap"
                           data-type="button" ';
                           if(!empty($om_slider_btn2_link)){
                            $li.='data-actions=\'[{"event": "click", "action": "simplelink", "target": "_blank", "url": "'.esc_url($om_slider_btn2_link).'"}]\' ';
                           }
                           $li.='data-responsive_offset="on"
                           data-frames=\'[{"from":"x:50px;opacity:0;","speed":2500,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"},{"frame":"hover","speed":"150","ease":"Power2.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:'.$slider_btn2_hover.';bg:'.$slider_btn2_bg_hover.';bc:rgba(255, 255, 255, 0);bw:2px 2px 2px 2px;"}]\'
                           data-textAlign="[\'left\',\'left\',\'left\',\'left\']"
                           data-paddingtop="[0,0,0,0]"
                           data-paddingright="[50,50,50,50]"
                           data-paddingbottom="[0,0,0,0]"
                           data-paddingleft="[50,50,50,50]"
                           style="'.$slider_btn_style.$slider_btn2_color.$slider_btn2_bg.'z-index: 11; white-space: nowrap; line-height: 46px; border-color:rgba(255, 255, 255, 0.25);border-style:solid;border-width:2px;border-radius:4px 4px 4px 4px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">'.$om_slider_btn2_text.'</div>';
            }
        }
        $li.='</li>';
    endwhile;
    wp_reset_postdata();
?>
<!--slider start-->
<div id="om-slide" style="<?php echo $slider_container_style;?>">
    <div class="rev_slider_wrapper fullscreen-container" data-aimg="<?php echo $aimg[0];?>" data-amobile="<?php echo $slider_mobile_visibility=='1'?'disabled':'enabled'; ?>" data-alias="typewriter-effect" data-source="gallery" style="background-color:transparent;padding:0px;">
        <div id="rev_slider_1014_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.3.0.2">
            <ul>
                <?php echo $li; ?>
            </ul>
            <?php if($slider_progress_bar=='1'){ ?>
            <div class="tp-bannertimer tp-bottom" style="height: 7px; background-color: rgba(255, 255, 255, 0.25);"></div>
            <?php } ?>
        </div>
    </div>
</div>
<!--slider end-->
<?php }else{ ?>
<!--there is no slider-->
<?php } ?>

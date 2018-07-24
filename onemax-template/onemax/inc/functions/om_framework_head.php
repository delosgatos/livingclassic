<?php

/*
  * OneMaxTheme Functions
  * Author：OneMax creative design
  * Official Site: www.onemax.site
*/


//load head styles and scripts
if(!function_exists('onemax_load_theme_styles_scripts')){
    function onemax_load_theme_styles_scripts(){
        global $onemax_options;
        wp_register_style( 'onemax-header-nomal', ONEMAX_URI.'/css/header/nomal.css' );
        wp_register_style( 'onemax-header-nomal-right', ONEMAX_URI.'/css/header/nomal-right.css' );
        wp_register_style( 'onemax-header-nomal-transparent', ONEMAX_URI.'/css/header/nomal-transparent.css' );
        wp_register_style( 'onemax-header-nomal-right-transparent', ONEMAX_URI.'/css/header/nomal-right-transparent.css' );
        wp_register_style( 'onemax-header-float', ONEMAX_URI.'/css/header/float.css' );
        wp_register_style( 'onemax-header-float-separate', ONEMAX_URI.'/css/header/float-separate.css' );
        wp_register_style( 'onemax-header-separate', ONEMAX_URI.'/css/header/separate.css' );
        wp_register_style( 'onemax-header-separate-right', ONEMAX_URI.'/css/header/separate-right.css' );
        wp_register_style( 'onemax-header-left-main', ONEMAX_URI.'/css/header/left-main.css' );
        wp_register_style( 'onemax-header-right-main', ONEMAX_URI.'/css/header/right-main.css' );
        wp_register_style( 'onemax-header-center', ONEMAX_URI.'/css/header/center.css' );
        wp_register_style( 'onemax-header-center-transparent', ONEMAX_URI.'/css/header/center-transparent.css' );
        wp_register_style( 'onemax-header-center-stack', ONEMAX_URI.'/css/header/center-stack.css' );
        wp_register_style( 'onemax-header-center-stack-transparent', ONEMAX_URI.'/css/header/center-stack-transparent.css' );
        wp_register_style( 'onemax-header-float-bottom', ONEMAX_URI.'/css/header/float-bottom.css' );
        wp_register_style( 'onemax-header-slider-below', ONEMAX_URI.'/css/header/slider-below.css' );
        wp_register_style( 'onemax-header-slider-below-right', ONEMAX_URI.'/css/header/slider-below-right.css' );
        wp_register_style( 'onemax-header-slider-below-centre', ONEMAX_URI.'/css/header/slider-below-centre.css' );
        wp_register_style( 'onemax-header-float-bottom-separate', ONEMAX_URI.'/css/header/float-bottom-separate.css' );
        wp_register_style( 'onemax-header-full', ONEMAX_URI.'/css/header/full.css' );
        wp_register_script( 'onemax-header-modernizr',ONEMAX_URI.'/js/header/modernizr.js','','',true);
        wp_register_script( 'onemax-header-superfish',ONEMAX_URI.'/js/header/superfish.js','','',true);
        wp_register_script( 'onemax-header-init',ONEMAX_URI.'/js/header/init.js','','',true);
        wp_register_script( 'onemax-header-skel-min',ONEMAX_URI.'/js/header/skel.min.js','','',true);
        wp_register_script( 'onemax-header-util',ONEMAX_URI.'/js/header/util.js','','',true);
        wp_register_script( 'onemax-header-main2',ONEMAX_URI.'/js/header/main2.js','','',true);
        wp_register_script( 'onemax-header-right-main',ONEMAX_URI.'/js/header/right-main.js','','',true);
        wp_register_script( 'onemax-header-jquery-velocity-min',ONEMAX_URI.'/js/header/jquery.velocity.min.js','','',true);
        wp_register_script( 'onemax-header-invokingVelocity',ONEMAX_URI.'/js/header/invokingVelocity.js','','',true);
        wp_register_script( 'onemax-header-full',ONEMAX_URI.'/js/header/full.js','','',true);
        wp_register_script( 'onemax-header-classie',ONEMAX_URI.'/js/header/classie.js','','',true);
        wp_register_script( 'onemax-header-slider-below',ONEMAX_URI.'/js/header/slider-below.js','','',true);
        if($onemax_options['back-to-top'] == '1'){
            wp_enqueue_script( 'onemax-jquery-scrolltop', ONEMAX_URI . '/js/component/scrolltop/jquery.scrolltop.combined.js','','',true);
        }
        if($onemax_options['head-menu-layout-img'] == 'nomal'){
            wp_enqueue_style( 'onemax-header-nomal');
            wp_enqueue_script( 'onemax-header-modernizr');
            wp_enqueue_script( 'onemax-header-superfish');
            wp_enqueue_script( 'onemax-header-init');
        }elseif ($onemax_options['head-menu-layout-img'] == 'separate') {
            wp_enqueue_style( 'onemax-header-separate');
            wp_enqueue_script( 'onemax-header-modernizr');
            wp_enqueue_script( 'onemax-header-superfish');
            wp_enqueue_script( 'onemax-header-init');
        }elseif ($onemax_options['head-menu-layout-img'] == 'Float') {
            wp_enqueue_style( 'onemax-header-float');
            wp_enqueue_script( 'onemax-header-modernizr');
            wp_enqueue_script( 'onemax-header-superfish');
            wp_enqueue_script( 'onemax-header-init');
        }elseif ($onemax_options['head-menu-layout-img'] == 'float-separate') {
            wp_enqueue_style( 'onemax-header-float-separate');
            wp_enqueue_script( 'onemax-header-modernizr');
            wp_enqueue_script( 'onemax-header-superfish');
            wp_enqueue_script( 'onemax-header-init');
        }elseif ($onemax_options['head-menu-layout-img'] == 'nomal-transparent') {
            wp_enqueue_style( 'onemax-header-nomal-transparent');
            wp_enqueue_script( 'onemax-header-modernizr');
            wp_enqueue_script( 'onemax-header-superfish');
            wp_enqueue_script( 'onemax-header-init');
        }elseif ($onemax_options['head-menu-layout-img'] == 'nomal-right') {
            wp_enqueue_style( 'onemax-header-nomal-right');
            wp_enqueue_script( 'onemax-header-modernizr');
            wp_enqueue_script( 'onemax-header-superfish');
            wp_enqueue_script( 'onemax-header-init');
        }elseif ($onemax_options['head-menu-layout-img'] == 'separate-right') {
            wp_enqueue_style( 'onemax-header-separate-right');
            wp_enqueue_script( 'onemax-header-modernizr');
            wp_enqueue_script( 'onemax-header-superfish');
            wp_enqueue_script( 'onemax-header-init');
        }elseif ($onemax_options['head-menu-layout-img'] == 'Nomal-right-transparent') {
            wp_enqueue_style( 'onemax-header-nomal-right-transparent');
            wp_enqueue_script( 'onemax-header-modernizr');
            wp_enqueue_script( 'onemax-header-superfish');
            wp_enqueue_script( 'onemax-header-init');
        }elseif ($onemax_options['head-menu-layout-img'] == 'centre') {
            wp_enqueue_style( 'onemax-header-center');
            wp_enqueue_script( 'onemax-header-modernizr');
            wp_enqueue_script( 'onemax-header-superfish');
            wp_enqueue_script( 'onemax-header-init');
        }elseif ($onemax_options['head-menu-layout-img'] == 'centre-transparent') {
            wp_enqueue_style( 'onemax-header-center-transparent');
            wp_enqueue_script( 'onemax-header-modernizr');
            wp_enqueue_script( 'onemax-header-superfish');
            wp_enqueue_script( 'onemax-header-init');
        }elseif ($onemax_options['head-menu-layout-img'] == 'centre-stack') {
            wp_enqueue_style( 'onemax-header-center-stack');
            wp_enqueue_script( 'onemax-header-modernizr');
            wp_enqueue_script( 'onemax-header-superfish');
            wp_enqueue_script( 'onemax-header-init');
        }elseif ($onemax_options['head-menu-layout-img'] == 'centre-stack-transparent') {
            wp_enqueue_style( 'onemax-header-center-stack-transparent');
            wp_enqueue_script( 'onemax-header-modernizr');
            wp_enqueue_script( 'onemax-header-superfish');
            wp_enqueue_script( 'onemax-header-init');
        }elseif ($onemax_options['head-menu-layout-img'] == 'float-bottom') {
            wp_enqueue_style( 'onemax-header-float-bottom');
            wp_enqueue_script( 'onemax-header-modernizr');
            wp_enqueue_script( 'onemax-header-superfish');
            wp_enqueue_script( 'onemax-header-init');
        }elseif ($onemax_options['head-menu-layout-img'] == 'slider-below') {
            if(is_page()){
                wp_enqueue_style( 'onemax-header-slider-below');
                wp_enqueue_script( 'onemax-header-classie');
                wp_enqueue_script( 'onemax-header-superfish');
                wp_enqueue_script( 'onemax-header-init');
                wp_enqueue_script( 'onemax-header-slider-below');
            }else{
                wp_enqueue_style( 'onemax-header-nomal');
                wp_enqueue_script( 'onemax-header-modernizr');
                wp_enqueue_script( 'onemax-header-superfish');
                wp_enqueue_script( 'onemax-header-init');
            }
        }elseif ($onemax_options['head-menu-layout-img'] == 'slider-below-right') {
            if(is_page()){
                wp_enqueue_style( 'onemax-header-slider-below');
                wp_enqueue_script( 'onemax-header-classie');
                wp_enqueue_script( 'onemax-header-superfish');
                wp_enqueue_script( 'onemax-header-init');
                wp_enqueue_script( 'onemax-header-slider-below');
            }else{
                wp_enqueue_style( 'onemax-header-nomal-right');
                wp_enqueue_script( 'onemax-header-modernizr');
                wp_enqueue_script( 'onemax-header-superfish');
                wp_enqueue_script( 'onemax-header-init');
            }
        }elseif ($onemax_options['head-menu-layout-img'] == 'slider-below-centre') {
            wp_enqueue_style( 'onemax-header-slider-below-centre');
            wp_enqueue_script( 'onemax-header-classie');
            wp_enqueue_script( 'onemax-header-superfish');
            wp_enqueue_script( 'onemax-header-init');
            wp_enqueue_script( 'onemax-header-slider-below');
        }elseif ($onemax_options['head-menu-layout-img'] == 'float-bottom-separate') {
            wp_enqueue_style( 'onemax-header-float-bottom-separate');
            wp_enqueue_script( 'onemax-header-modernizr');
            wp_enqueue_script( 'onemax-header-superfish');
            wp_enqueue_script( 'onemax-header-init');
        }elseif ($onemax_options['head-menu-layout-img'] == 'simple-left-menu') {
            wp_enqueue_style( 'onemax-header-left-main');
            wp_enqueue_script( 'onemax-header-modernizr');
            wp_enqueue_script( 'onemax-header-superfish');
            wp_enqueue_script( 'onemax-header-init');
            wp_enqueue_script( 'onemax-header-skel-min');
            wp_enqueue_script( 'onemax-header-util');
            wp_enqueue_script( 'onemax-header-main2');
            wp_enqueue_script( 'onemax-header-jquery-velocity-min');
            wp_enqueue_script( 'onemax-header-invokingVelocity');
        }elseif ($onemax_options['head-menu-layout-img'] == 'simple-right-menu') {
            wp_enqueue_style( 'onemax-header-right-main');
            wp_enqueue_script( 'onemax-header-modernizr');
            wp_enqueue_script( 'onemax-header-superfish');
            wp_enqueue_script( 'onemax-header-init');
            wp_enqueue_script( 'onemax-header-skel-min');
            wp_enqueue_script( 'onemax-header-util');
            wp_enqueue_script( 'onemax-header-main2');
            wp_enqueue_script( 'onemax-header-jquery-velocity-min');
            wp_enqueue_script( 'onemax-header-invokingVelocity');
        }else{
            wp_enqueue_style( 'onemax-header-full');
            wp_enqueue_script( 'onemax-header-superfish');
            wp_enqueue_script( 'onemax-header-init');
            wp_enqueue_script( 'onemax-header-full');
        }
    }
}
add_action( 'wp_enqueue_scripts', 'onemax_load_theme_styles_scripts' );

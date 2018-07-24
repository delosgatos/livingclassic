<?php

/*
  * OneMaxTheme Functions
  * Author：OneMax creative design
  * Official Site: www.onemax.site
*/

//load theme options
if(!function_exists('onemax_load_theme_options')){
    function onemax_load_theme_options(){
        echo '<style type="text/css">'."\n";
        include_once ONEMAX_DIR.'/style.php';
        echo "\n".'</style>'."\n";
    }
}
add_action( 'wp_head', 'onemax_load_theme_options' );

//load retina.js and preload
if(!function_exists('onemax_load_retina_init')){
    function onemax_load_retina_init(){
        global $onemax_options;
        echo '<script src="'.ONEMAX_URI.'/js/library/retina.min.js"></script>'."\n";
        echo '<script>'."\n";
        echo 'retinajs();'."\n";
        if(!empty($onemax_options['preload_style'])){
            echo 'jQuery(window).load(function($) {jQuery(".se-pre-con").fadeOut("slow");});';
        }
        echo "\n".'</script>'."\n";
    }
}
add_action( 'wp_footer', 'onemax_load_retina_init',100 );

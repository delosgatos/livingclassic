<?php
/**
 * The Header for our theme.
 *
 * @package OneMax
 * @author OneMax Creative Design Team
 * @link http://onemaxwpdemo.onemax.site
 */
global $onemax_options; ?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
       <meta charset="<?php bloginfo('charset'); ?>">
       <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=1">
       <link rel="shortcut icon" href="<?php if(!empty($onemax_options['favicon']['url'])) echo $onemax_options['favicon']['url']; ?>" />
       <!--google analytics-->
       <?php if(!empty($om_options['google-analytics'])) echo $om_options['google-analytics']; ?>
       <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?> data-dropdown-style="minimal" data-rjs="2">
    <?php if(!empty($onemax_options['preload_style'])){ ?>
    <div class="se-pre-con"></div>
    <?php } ?>
        <!--load header-->
   
        <!-- left menu
        <aside class="creative-left-menu">
        	
        </aside>* 
        -->
        <div class="om-content">
        <?php
            $header_layout=$onemax_options['head-menu-layout-img'];
            if(in_array($header_layout,array('nomal','nomal-right','nomal-transparent','Nomal-right-transparent','Float','float-separate','separate','separate-right','centre-stack','centre-stack-transparent','float-bottom','float-bottom-separate'))){
                get_template_part('inc/template/om-header-nomal');
            }
            elseif(in_array($header_layout,array('simple-left-menu','simple-right-menu'))){
                get_template_part('inc/template/om-header-simple');
            }
            elseif(in_array($header_layout,array('centre','centre-transparent'))){
                get_template_part('inc/template/om-header-center');
            }
            elseif(in_array($header_layout,array('simple-full-screen-menu'))){
                get_template_part('inc/template/om-header-full');
            }
            if(($header_layout=='slider-below' || $header_layout=='slider-below-right') && !is_page() ){
              get_template_part('inc/template/om-header-nomal');
            }
            elseif($header_layout=='slider-below-centre' && !is_page()){
              get_template_part('inc/template/om-header-center');
            }
        ?>
        <!--header end-->

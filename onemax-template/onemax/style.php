<?php
/**
 * @package OneMax
 * @author OneMax Creative Design Team
 * @link http://onemaxwpdemo.onemax.site
 */
global $onemax_options;
?>
/********************grid width********************/
@media only screen and (min-width: 1200px){
.grid-outer {
    max-width: <?php echo esc_html($onemax_options['grid-width']); ?>px;
    margin: 0 auto;
}
.full-width-bg-outer{
    width:100%;
    margin: 0 auto;
}
.full-width-content-outer{
    max-width:100%;
    margin: 0 auto;
}
.grid-inner{
    width: 100%;
    margin: 0 auto;

}
.full-width-bg-inner{
    max-width:<?php echo esc_html($onemax_options['grid-width']); ?>px;
    margin: 0 auto;
}
.full-width-content-inner{
    width: 100%;
    margin: 0 auto;
}
}
.content-area{ max-width:<?php echo esc_html($onemax_options['grid-width']); ?>px; margin:0 auto;}
#footer .container{max-width:<?php echo esc_html($onemax_options['grid-width']); ?>px;}
/********************background image***********/
<?php if(!empty($onemax_options['background-image']['url'])): ?>
body{
    background-image: url("<?php echo esc_url($onemax_options['background-image']['url']);?>");
    <?php if($onemax_options['background-image-type']=='cover'): ?>
        background-size:cover;
    <?php else: ?>
        background-position: <?php echo esc_html($onemax_options['background-image-position']);?>;
        background-repeat: <?php echo esc_html($onemax_options['background-image-repeat'])=='1'?esc_html('repeat'):esc_html('no-repeat');?>;
    <?php endif; ?>
}
<?php endif; ?>
<?php if(!empty($onemax_options['preload_style'])){ ?>
/***************preload********************/
.se-pre-con{
    background: url(<?php echo ONEMAX_URI.'/';?>img/<?php echo esc_html($onemax_options['preload_style']); ?>.gif) center no-repeat <?php if(isset($onemax_options['opt-color-scheme']['preload-bg']['rgba'])){echo esc_html($onemax_options['opt-color-scheme']['preload-bg']['rgba']);}else{echo esc_html('#ffffff');} ?>;
}
<?php } ?>
/********************transparency******************/
#header-outer{opacity:<?php echo esc_html($onemax_options['head-henu-transparency']/100);?>;}
/********************sub header******************/
body #header-outer #top nav .sub-menu{
    width:<?php if(isset($onemax_options['width'])){echo !empty($onemax_options['width'])||$onemax_options['width']=='0'?esc_html($onemax_options['width']):'';} ?>px;
    height:<?php if(isset($onemax_options['height'])){echo !empty($onemax_options['height'])||$onemax_options['height']=='0'?esc_html($onemax_options['height']):'';} ?>px;
    padding:<?php if(isset($onemax_options['sub-padding'])){echo !empty($onemax_options['sub-padding'])||$onemax_options['sub-padding']=='0'?esc_html($onemax_options['sub-padding']):'20';}else{echo esc_html('20');} ?>px;
}
body[data-dropdown-style="minimal"] .sf-menu li.sfHover > ul{
    opacity:<?php echo esc_html($onemax_options['Sub-Head-Menu-Transparency']/100);?>!important;
}
/********************logo******************/
#logo img,#logo .text-logo{
    max-width:280px;
    max-height:80px;
    padding:<?php if(isset($onemax_options['logo-padding'])){echo !empty($onemax_options['logo-padding'])||$onemax_options['logo-padding']=='0'?esc_html($onemax_options['logo-padding']):'';} ?>px;
}
body #header-outer #top #logo img.normal-logo {
    display:block ! important;
}
body #header-outer #top #logo img.sticky-logo {
    display:none ! important;
}
body #header-outer #top #simpleLogo img.sticky-logo {
    display:none ! important;
}
<?php if(!empty($onemax_options['sticky-logo']['url'])) { ?>
    <?php if($onemax_options['head-menu-layout-img']!='slider-below-centre') { ?>
    body #header-outer.small-nav #top #logo img.normal-logo,body #header-outer.smaller #top #logo img.normal-logo {
        display:none ! important;
    }
    body #header-outer.small-nav #top #logo img.sticky-logo,body #header-outer.smaller #top #logo img.sticky-logo {
        display:block ! important;
    }
    <?php }else{ ?>
    body #header-outer.smaller #top #logo img.normal-logo {
        display:none ! important;
    }
    body #header-outer.smaller #top #logo img.sticky-logo {
        display:block ! important;
    }
    <?php } ?>
<?php } ?>
/********************font******************/
<?php
    $global_font_arr=array(''=>'body','31px'=>'h1','26px'=>'h2','22px'=>'h3','18px'=>'h4','15px'=>'h5','13px'=>'h6');
    foreach($global_font_arr as $k=>$v){
?>
<?php echo $v;?>{
    font-style:<?php echo empty($onemax_options[$v.'-font']['font-style'])?'':esc_html($onemax_options[$v.'-font']['font-style']); ?>;
    font-weight:<?php echo empty($onemax_options[$v.'-font']['font-weight'])?'':esc_html($onemax_options[$v.'-font']['font-weight']); ?>;
    font-size:<?php echo empty($onemax_options[$v.'-font']['font-size'])?esc_html($k):esc_html($onemax_options[$v.'-font']['font-size']); ?>;
    font-family:<?php echo empty($onemax_options[$v.'-font']['font-family'])?'':esc_html($onemax_options[$v.'-font']['font-family']); ?>;
    text-align:<?php echo empty($onemax_options[$v.'-font']['text-align'])?'':esc_html($onemax_options[$v.'-font']['text-align']); ?>;
}
<?php } ?>
#footer .foot-content .row .om-col .widget_text .textwidget,#footer .foot-content .row .om-col .widget_recent_entries li{
    font-style:<?php echo empty($onemax_options['foot-font']['font-style'])?'':esc_html($onemax_options['foot-font']['font-style']); ?>;
    font-weight:<?php echo empty($onemax_options['foot-font']['font-weight'])?'':esc_html($onemax_options['foot-font']['font-weight']); ?>;
    font-size:<?php echo empty($onemax_options['foot-font']['font-size'])?esc_html('13px'):esc_html($onemax_options['foot-font']['font-size']); ?>;
    font-family:<?php echo empty($onemax_options['foot-font']['font-family'])?'':esc_html($onemax_options['foot-font']['font-family']); ?>;
    text-align:<?php echo empty($onemax_options['foot-font']['text-align'])?'':esc_html($onemax_options['foot-font']['text-align']); ?>;
}
.vc_separator h4{
    font-size:<?php echo empty($onemax_options['h4-font']['font-size'])?esc_html('18px'):esc_html($onemax_options['h4-font']['font-size']); ?> !important;
}
body #header-outer #top nav .sf-menu a,body #header-outer #top .row #sidebar #menu-home a,#header-outer #top .nav #menu-home a{
    font-style:<?php echo empty($onemax_options['head-menu-font']['font-style'])?'':esc_html($onemax_options['head-menu-font']['font-style']); ?>;
    font-weight:<?php echo empty($onemax_options['head-menu-font']['font-weight'])?'':esc_html($onemax_options['head-menu-font']['font-weight']); ?>;
    font-size:<?php echo empty($onemax_options['head-menu-font']['font-size'])?'':esc_html($onemax_options['head-menu-font']['font-size']); ?>;
    font-family:<?php echo empty($onemax_options['head-menu-font']['font-family'])?'':esc_html($onemax_options['head-menu-font']['font-family']); ?>;
    text-align:<?php echo empty($onemax_options['head-menu-font']['text-align'])?'':esc_html($onemax_options['head-menu-font']['text-align']); ?>;
}
body #header-outer #top nav .sf-menu .sub-menu a,body #header-outer #top .row #sidebar #menu-home .sub-menu a,#header-outer #top .nav #menu-home .sub-menu a{
    font-style:<?php echo empty($onemax_options['head-submenu-font']['font-style'])?'':esc_html($onemax_options['head-submenu-font']['font-style']); ?>;
    font-weight:<?php echo empty($onemax_options['head-submenu-font']['font-weight'])?'':esc_html($onemax_options['head-submenu-font']['font-weight']); ?>;
    font-size:<?php echo empty($onemax_options['head-submenu-font']['font-size'])?'':esc_html($onemax_options['head-submenu-font']['font-size']); ?>;
    font-family:<?php echo empty($onemax_options['head-submenu-font']['font-family'])?'':esc_html($onemax_options['head-submenu-font']['font-family']); ?>;
    text-align:<?php echo empty($onemax_options['head-submenu-font']['text-align'])?'':esc_html($onemax_options['head-submenu-font']['text-align']); ?>;
}
body #header-outer #search-outer #search form input[type=text],#mobile-menu #mobile-search form input[type=text],body #header-outer #top .row #sidebar #sectionSearch form input[type=text]{
    font-style:<?php echo empty($onemax_options['search-bar-font']['font-style'])?'':esc_html($onemax_options['search-bar-font']['font-style']); ?>;
    font-weight:<?php echo empty($onemax_options['search-bar-font']['font-weight'])?'':esc_html($onemax_options['search-bar-font']['font-weight']); ?>;
    font-size:<?php echo empty($onemax_options['search-bar-font']['font-size'])?'':esc_html($onemax_options['search-bar-font']['font-size']); ?>;
    font-family:<?php echo empty($onemax_options['search-bar-font']['font-family'])?'':esc_html($onemax_options['search-bar-font']['font-family']); ?>;
    text-align:<?php echo empty($onemax_options['search-bar-font']['text-align'])?'':esc_html($onemax_options['search-bar-font']['text-align']); ?>;
}
body #header-outer #top #logo .text-logo{
    font-style:<?php echo empty($onemax_options['text-logo-font']['font-style'])?'':esc_html($onemax_options['text-logo-font']['font-style']); ?>;
    font-weight:<?php echo empty($onemax_options['text-logo-font']['font-weight'])?'':esc_html($onemax_options['text-logo-font']['font-weight']); ?>;
    font-size:<?php echo empty($onemax_options['text-logo-font']['font-size'])?'':esc_html($onemax_options['text-logo-font']['font-size']); ?>;
    font-family:<?php echo empty($onemax_options['text-logo-font']['font-family'])?'':esc_html($onemax_options['text-logo-font']['font-family']); ?>;
    text-align:<?php echo empty($onemax_options['text-logo-font']['text-align'])?'':esc_html($onemax_options['text-logo-font']['text-align']); ?>;
}
<?php
    $coporment_font_arr=array(
        'om-button-font',
        'counter-name-font',
        'counter-number-font',
        'counter-down-font',
        'section-title-font',
        'team-name-font',
        'team-title-font',
        'team-instruction-font',
        'testimonials-content-font');
    foreach($coporment_font_arr as $v){
?>
body .vc_row .<?php echo $v;?>{
    font-style:<?php echo empty($onemax_options[$v]['font-style'])?'':esc_html($onemax_options[$v]['font-style']); ?>;
    font-weight:<?php echo empty($onemax_options[$v]['font-weight'])?'':esc_html($onemax_options[$v]['font-weight']); ?>;
    font-size:<?php echo empty($onemax_options[$v]['font-size'])?'':esc_html($onemax_options[$v]['font-size']); ?>;
    font-family:<?php echo empty($onemax_options[$v]['font-family'])?'':esc_html($onemax_options[$v]['font-family']); ?>;
    text-align:<?php echo empty($onemax_options[$v]['text-align'])?'':esc_html($onemax_options[$v]['text-align']); ?>;
}
<?php } ?>
/********************color******************/
body{
    color:<?php echo empty($onemax_options['opt-color-scheme']['body-text-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['body-text-color']['rgba']); ?>;
    background-color:<?php echo empty($onemax_options['opt-color-scheme']['body-bg-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['body-bg-color']['rgba']); ?>;
}
.search-box #searchform #s{
    border-color:<?php echo empty($onemax_options['opt-color-scheme']['body-bg-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['body-bg-color']['rgba']); ?>;
}
.search-box #searchform #searchsubmit{
    background-color:<?php echo empty($onemax_options['opt-color-scheme']['footer-tag-cat-hover-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['footer-tag-cat-hover-color']['rgba']); ?>;
}
body ::selection{
    color:<?php echo empty($onemax_options['opt-color-scheme']['body-text-sel-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['body-text-sel-color']['rgba']); ?>;
    background-color:<?php echo empty($onemax_options['opt-color-scheme']['body-bg-sel-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['body-bg-sel-color']['rgba']); ?>;
}
#single .form-submit #submit{
    background-color:<?php echo empty($onemax_options['opt-color-scheme']['body-link-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['body-link-color']['rgba']); ?>;
}
body a{
    color:<?php echo empty($onemax_options['opt-color-scheme']['body-link-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['body-link-color']['rgba']); ?>;
}
body a:hover{
    color:<?php echo empty($onemax_options['opt-color-scheme']['body-link-hover-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['body-link-hover-color']['rgba']); ?>;
}
#om-single .comment-form-comment textarea:focus{
    border-color:<?php echo empty($onemax_options['opt-color-scheme']['body-link-hover-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['body-link-hover-color']['rgba']); ?>;
}
#om-single .comment-form P input:focus{
    border-color:<?php echo empty($onemax_options['opt-color-scheme']['body-link-hover-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['body-link-hover-color']['rgba']); ?>;
}
.filter_navigation ul li ul li a{
    color:<?php echo empty($onemax_options['opt-color-scheme']['body-link-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['body-link-color']['rgba']); ?>;
}
.filter_navigation ul li ul li.selected a, .filter_navigation ul li ul li a:hover{
    color:<?php echo empty($onemax_options['opt-color-scheme']['body-link-hover-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['body-link-hover-color']['rgba']); ?>;
}
figure.effect-jazz,figure.effect-bubba,figure.effect-oscar,figure.effect-ming,figure.effect-goliath,figure.effect-duke,figure.effect-steve,figure.effect-apollo,figure.effect-sadie,figure.effect-honey{background:linear-gradient(-45deg,<?php echo empty($onemax_options['opt-color-scheme']['body-link-hover-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['body-link-hover-color']['rgba']);?> 0,<?php echo empty($onemax_options['opt-color-scheme']['body-link-hover-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['body-link-hover-color']['rgba']); ?> 0,<?php echo empty($onemax_options['opt-color-scheme']['body-link-hover-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['body-link-hover-color']['rgba']); ?> 100%)}
header#top nav ul li a{
    color:<?php echo empty($onemax_options['opt-color-scheme']['head-menu-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['head-menu-color']['rgba']); ?>;
}
<?php if($onemax_options['head-menu-layout-img']=='slider-below' || $onemax_options['head-menu-layout-img']=='slider-below-right' || $onemax_options['head-menu-layout-img']=='slider-below-centre'){ ?>
.smaller header#top nav ul li a{
    color:<?php echo empty($onemax_options['opt-color-scheme']['head-menu-sticky-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['head-menu-sticky-color']['rgba']); ?>;
}
.smaller header#top nav ul li a:hover{
    color:<?php echo empty($onemax_options['opt-color-scheme']['head-menu-font-hover-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['head-menu-font-hover-color']['rgba']); ?>;
}
<?php }else{ ?>
.small-nav header#top nav ul li a{
    color:<?php echo empty($onemax_options['opt-color-scheme']['head-menu-sticky-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['head-menu-sticky-color']['rgba']); ?>;
}
.small-nav header#top nav ul li a:hover{
    color:<?php echo empty($onemax_options['opt-color-scheme']['head-menu-font-hover-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['head-menu-font-hover-color']['rgba']); ?>;
}
<?php } ?>
#header-outer nav ul li a:hover{
    color:<?php echo empty($onemax_options['opt-color-scheme']['head-menu-font-hover-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['head-menu-font-hover-color']['rgba']); ?>;
}
<?php if($onemax_options['head-menu-layout-img']=='simple-full-screen-menu'){?>
#header-outer #top .nav{
    background-color:<?php echo empty($onemax_options['opt-color-scheme']['simple-full-screen-bg']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['simple-full-screen-bg']['rgba']); ?>;
}
<?php } ?>

<?php if(!in_array($onemax_options['head-menu-layout-img'],array('simple-left-menu','simple-right-menu','simple-full-screen-menu','nomal-transparent','Nomal-right-transparent','centre-transparent','centre-stack-transparent'))){ ?>

body #header-outer{
    background-color:<?php echo empty($onemax_options['opt-color-scheme']['head-menu-bg-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['head-menu-bg-color']['rgba']); ?>;
}
<?php } ?>
#sidebar .toggle{
    color:<?php echo empty($onemax_options['opt-color-scheme']['head-menu-bg-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['head-menu-bg-color']['rgba']); ?>;
}
<?php if(!in_array($onemax_options['head-menu-layout-img'],array('simple-left-menu','simple-right-menu','simple-full-screen-menu'))){ ?>
body #header-outer.small-nav,body #header-outer.smaller{
    background-color:<?php echo empty($onemax_options['opt-color-scheme']['sticky-head-menu-bg-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['sticky-head-menu-bg-color']['rgba']); ?>;
}
<?php }else{ ?>
.slide-out-widget-area-toggle.mobile-icon .lines-button.x2 .lines:before, .slide-out-widget-area-toggle.mobile-icon  .lines-button.x2 .lines:after, .slide-out-widget-area-toggle[data-icon-animation="simple-transform"].mobile-icon .lines-button:after, header#top .slide-out-widget-area-toggle[data-icon-animation="spin-and-transform"].mobile-icon .lines-button.x2 .lines{
    background-color:<?php echo empty($onemax_options['opt-color-scheme']['head-menu-bg-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['head-menu-bg-color']['rgba']); ?>;
}
<?php } ?>
body[data-dropdown-style="minimal"] header#top .sf-menu li ul li a{
    color:<?php echo empty($onemax_options['opt-color-scheme']['head-menu-sb-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['head-menu-sb-color']['rgba']); ?>;
}
body[data-dropdown-style="minimal"] header#top .sf-menu li ul li a:hover{
    color:<?php echo empty($onemax_options['opt-color-scheme']['head-menu-sb-font-hover-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['head-menu-sb-font-hover-color']['rgba']); ?>;
}
body[data-dropdown-style="minimal"] header#top .sf-menu li ul{
    background-color:<?php echo empty($onemax_options['opt-color-scheme']['head-menu-sb-bg-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['head-menu-sb-bg-color']['rgba']); ?>;
}
<?php if($onemax_options['head-menu-layout-img']=='simple-left-menu'||$onemax_options['head-menu-layout-img']=='simple-right-menu'){ ?>
#header-outer #sidebar{
    background-color:<?php echo empty($onemax_options['opt-color-scheme']['head-menu-sb-bg-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['head-menu-sb-bg-color']['rgba']); ?>;
}
#sidebar >.inner .om-primary-menu a{
    color:<?php echo empty($onemax_options['opt-color-scheme']['head-menu-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['head-menu-color']['rgba']); ?>;
}#sidebar >.inner .om-primary-menu a:hover{
    color:<?php echo empty($onemax_options['opt-color-scheme']['head-menu-font-hover-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['head-menu-font-hover-color']['rgba']); ?>;
}
#sidebar >.inner .om-primary-menu li .sub-menu a{
    color:<?php echo empty($onemax_options['opt-color-scheme']['head-menu-sb-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['head-menu-sb-color']['rgba']); ?>;
}#sidebar >.inner .om-primary-menu li .sub-menu a:hover{
    color:<?php echo empty($onemax_options['opt-color-scheme']['head-menu-sb-font-hover-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['head-menu-sb-font-hover-color']['rgba']); ?>;
}
#header-outer #sidebar #simpleLogo .text-logo{
    color:<?php echo empty($onemax_options['opt-color-scheme']['text-logo-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['text-logo-color']['rgba']); ?>;
}
<?php } ?>
<?php if($onemax_options['head-menu-layout-img']=='simple-full-screen-menu'){ ?>
#header-outer #top .nav .om-nav-item a{
    color:<?php echo empty($onemax_options['opt-color-scheme']['head-menu-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['head-menu-color']['rgba']); ?>;
}#header-outer #top .nav .om-nav-item a:hover{
    color:<?php echo empty($onemax_options['opt-color-scheme']['head-menu-font-hover-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['head-menu-font-hover-color']['rgba']); ?>;
}
#header-outer #top .nav .om-nav-item li .sub-menu a{
    color:<?php echo empty($onemax_options['opt-color-scheme']['head-menu-sb-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['head-menu-sb-color']['rgba']); ?>;
}#header-outer #top .nav .om-nav-item li .sub-menu a:hover{
    color:<?php echo empty($onemax_options['opt-color-scheme']['head-menu-sb-font-hover-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['head-menu-sb-font-hover-color']['rgba']); ?>;
}
<?php } ?>
header#top nav ul #search-btn a span,header#top #sectionSearch .iconSearch span,header#top  ul #search-btn a span{
    color:<?php echo empty($onemax_options['opt-color-scheme']['search-icon-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['search-icon-color']['rgba']); ?>;
}
body #header-outer #top #logo .text-logo{
    color:<?php echo empty($onemax_options['opt-color-scheme']['text-logo-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['text-logo-color']['rgba']); ?>;
}
/*contact form*/
.wpcf7 input[type="submit"]{
    background-color:<?php echo empty($onemax_options['opt-color-scheme']['contact-form-btn-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['contact-form-btn-color']['rgba']); ?>;
    color:<?php echo empty($onemax_options['opt-color-scheme']['contact-form-font-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['contact-form-font-color']['rgba']); ?>;
}
body footer#footer{
    color:<?php echo empty($onemax_options['opt-color-scheme']['footer-text-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['footer-text-color']['rgba']); ?>;
    background-color:<?php echo empty($onemax_options['opt-color-scheme']['footer-bg-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['footer-bg-color']['rgba']); ?>;
}
body footer#footer .om-col h4{
    color:<?php echo empty($onemax_options['opt-color-scheme']['footer-title-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['footer-title-color']['rgba']); ?>;
}
body footer#footer a{
    color:<?php echo empty($onemax_options['opt-color-scheme']['footer-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['footer-color']['rgba']); ?>;
}
.widget_categories li a:hover,.tagcloud a:hover{
    background-color:<?php echo empty($onemax_options['opt-color-scheme']['footer-tag-cat-hover-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['footer-tag-cat-hover-color']['rgba']); ?>;
    border-color:<?php echo empty($onemax_options['opt-color-scheme']['footer-tag-cat-hover-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['footer-tag-cat-hover-color']['rgba']); ?>;
}
#footer a:hover{
    color:<?php echo empty($onemax_options['opt-color-scheme']['footer-hover-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['footer-hover-color']['rgba']); ?>;
}
#footer #wp-calendar #today{
background-color:<?php echo empty($onemax_options['opt-color-scheme']['footer-tag-cat-hover-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['footer-tag-cat-hover-color']['rgba']); ?>;
}

.search-box #searchform #s{
  border-color:<?php echo empty($onemax_options['opt-color-scheme']['footer-hover-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['footer-hover-color']['rgba']); ?>;
}
body footer#footer .foot_nav .contact-info{
    color:<?php echo empty($onemax_options['opt-color-scheme']['contact-info-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['contact-info-color']['rgba']); ?>;
}
body footer#footer .foot_nav .copyright{
    color:<?php echo empty($onemax_options['opt-color-scheme']['copyright-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['copyright-color']['rgba']); ?>;
}
body footer#footer .foot_nav {
    background-color:<?php echo empty($onemax_options['opt-color-scheme']['copyright-bg-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['copyright-bg-color']['rgba']); ?>;
}
#om-index ul.blog .blog2cont, .vc-blog ul.blog .blog2cont,#om-index ul.blog .blog1cont, .vc-blog ul.blog .blog1cont,#om-index ul.blog .blog3cont, #om-index ul.blog .blog2cont, .vc-blog ul.blog .blog3cont, .vc-blog ul.blog .blog2cont{
    background-color:<?php echo empty($onemax_options['opt-color-scheme']['blog-bg-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['blog-bg-color']['rgba']); ?>;
}
/********************footer******************/
body #footer .foot-content{
    padding-top:<?php if(isset($onemax_options['padding-top'])){echo !empty($onemax_options['padding-top'])||$onemax_options['padding-top']==esc_html('0')?esc_html($onemax_options['padding-top']):esc_html('20');}else{echo esc_html('20');} ?>px;
    padding-bottom:<?php if(isset($onemax_options['padding-bottom'])){echo !empty($onemax_options['padding-bottom'])||$onemax_options['padding-bottom']=='0'?esc_html($onemax_options['padding-bottom']):esc_html('20');}else{echo esc_html('20');} ?>px;
    <?php if(!empty($onemax_options['foot-background-image']['url'])) : ?>
    background-image: url("<?php echo esc_url($onemax_options['foot-background-image']['url']);?>");
    background-position: <?php echo esc_html($onemax_options['foot_background-image-position']);?>;
    background-repeat: <?php echo esc_html($onemax_options['footer-background-image-repeat'])=='1'?esc_html('repeat'):esc_html('no-repeat');?>;
    <?php endif; ?>
}
/**************blog post padding***************/
#om-index .blog .post,#om-index .blog .post_width,#om-index .blog .post_grid,.vc-blog .blog .post,.vc-blog .blog .post_width,.vc-blog .blog .post_grid{
    padding:<?php if(isset($onemax_options['post-padding'])){echo empty($onemax_options['post-padding'])&&$onemax_options['post-padding']!='0'?esc_html('5'):esc_html($onemax_options['post-padding']);}else{echo '5';} ?>px;
}
/**********slider below************/
<?php
if($onemax_options['head-menu-layout-img']=='slider-below-right'){
?>
#header-outer .row .col.span_9{
    float:left;
}
.col{
    float:right;
}
<?php }elseif($onemax_options['head-menu-layout-img']=='slider-below'){ ?>
#header-outer .row .col.span_9{
    float:right;
}
.col{
    float:left;
}
<?php } ?>
/**************current page style***************/
<?php
global $onemax_page_bg_url;
global $onemax_page_bg_type;
global $onemax_page_bg_pos;
global $onemax_page_bg_repeat;
do_action('onemax_page_option',$onemax_page_bg_url,$onemax_page_bg_type,$onemax_page_bg_pos,$onemax_page_bg_repeat);

if ( is_user_logged_in() ) {
    echo '#header-outer.smaller{ margin-top:32px;}';
}
?>
/**************woocommerce*****************/
#om-general-woo-tempt{
    max-width:<?php echo esc_html($onemax_options['grid-width']); ?>px;
    margin: 0 auto;
}
.woocommerce span.onsale{
    background-color:<?php echo empty($onemax_options['opt-color-scheme']['woo-sale-bg-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['woo-sale-bg-color']['rgba']); ?>;
}
.star-rating{
    color:<?php echo empty($onemax_options['opt-color-scheme']['woo-rate-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['woo-rate-color']['rgba']); ?>;
}
.star-rating:hover{
    color:<?php echo empty($onemax_options['opt-color-scheme']['woo-rate-hover-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['woo-rate-hover-color']['rgba']); ?>;
}
.woocommerce ul.products li.product .price{
    color:<?php echo empty($onemax_options['opt-color-scheme']['woo-price-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['woo-price-color']['rgba']); ?>;
}
.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{
    background-color:<?php echo empty($onemax_options['opt-color-scheme']['woo-button-bg']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['woo-button-bg']['rgba']); ?>;
    color:<?php echo empty($onemax_options['opt-color-scheme']['woo-button-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['woo-button-color']['rgba']); ?>;
}
.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover{
    background-color:<?php echo empty($onemax_options['opt-color-scheme']['woo-button-hover-bg']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['woo-button-hover-bg']['rgba']); ?>;
    color:<?php echo empty($onemax_options['opt-color-scheme']['woo-button-hover-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['woo-button-hover-color']['rgba']); ?>;
}
#om-page .page-n-vc-row .page-content a{
    color:<?php echo empty($onemax_options['opt-color-scheme']['body-link-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['body-link-color']['rgba']); ?>;
}
#om-page .page-n-vc-row .page-content a:hover{
    color:<?php echo empty($onemax_options['opt-color-scheme']['body-link-hover-color']['rgba'])?'':esc_html($onemax_options['opt-color-scheme']['body-link-hover-color']['rgba']); ?>;
}
<?php
/**
 * Theme Functions
 *
 * @package OneMax
 * @author OneMax Creative Design Team
 * @link http://onemaxwpdemo.onemax.site
 */

define('ONEMAX_DIR',  get_template_directory());
define('ONEMAX_URI',  get_template_directory_uri());

if ( ! isset( $content_width ) ) $content_width = 1200;
function onemax_theme_slug_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support('automatic-feed-links');
}
add_action( 'after_setup_theme', 'onemax_theme_slug_setup' );


//load text domain
add_action('after_setup_theme', 'onemax_language_setup');
function onemax_language_setup(){
	load_theme_textdomain('onemax', ONEMAX_DIR . '/languages');
}

//get options
$onemax_options=  get_option('OneMax');

require_once ONEMAX_DIR . '/inc/framework/admin/admin_init.php';
require_once ONEMAX_DIR . '/inc/onemax-vc/vc_onemax.php';
require_once ONEMAX_DIR . '/inc/functions/om_head_functions.php';
require_once ONEMAX_DIR . '/inc/functions/om_admin_plugin.php';
require_once ONEMAX_DIR . '/inc/functions/om_admin_functions.php';
require_once ONEMAX_DIR . '/inc/functions/om_framework_int.php';
require_once ONEMAX_DIR . '/inc/functions/om_framework_head.php';
require_once ONEMAX_DIR . '/inc/functions/om_custom_menu_class.php';

if(!function_exists('onemax_add_onemax_option_panel_css')){
    function onemax_add_onemax_option_panel_css() {
      wp_dequeue_style( 'redux-admin-css' );
      wp_register_style(
        'redux-custom-css',
        ONEMAX_URI . '/inc/framework/css/onemax-admin.css',
        array( 'farbtastic' ), // Notice redux-admin-css is removed and the wordpress standard farbtastic is included instead
        time(),
        'all'
      );
      wp_enqueue_style('redux-custom-css');
    }
    // This example assumes your opt_name is set to redux_demo, replace with your opt_name value
    add_action( 'redux/page/OneMax/enqueue', 'onemax_add_onemax_option_panel_css' );
}

// include the VC script
function onemax_vc_js_css()
{
    if (!is_admin()) {
        wp_enqueue_style('onemax-interactive', ONEMAX_URI.'/css/interactive.css');
        wp_enqueue_script('onemax-aos', ONEMAX_URI.'/js/library/aos.js');
        wp_enqueue_script('onemax-owl-carousel', ONEMAX_URI.'/js/component/portfolio_carousel/owl.carousel.js');
        wp_enqueue_script('onemax-image-setting', ONEMAX_URI.'/js/component/image/image.js');
        wp_enqueue_script('onemax-conter', ONEMAX_URI.'/js/component/counters/conter.js', '', '', true);
    }
}
add_action('wp_enqueue_scripts', 'onemax_vc_js_css');

// init aos
if(!function_exists('onemax_init_aos')){
    function onemax_init_aos(){
        echo '<script>AOS.init({easing: "ease-in-sine",duration: 550});</script>'."\n";
    }
}
add_action( 'wp_footer', 'onemax_init_aos', 100 );


// init countdown
if(!function_exists('onemax_init_countdown')){
    function onemax_init_countdown(){
    echo '<script>!function(a){a.fn.downCount=function(b,c){function g(){var a=new Date(d.date),b=f(),g=a-b;if(g<0)return clearInterval(h),void(c&&"function"==typeof c&&c());var i=1e3,j=60*i,k=60*j,l=24*k,m=Math.floor(g/l),n=Math.floor(g%l/k),o=Math.floor(g%k/j),p=Math.floor(g%j/i);m=String(m).length>=2?m:"0"+m,n=String(n).length>=2?n:"0"+n,o=String(o).length>=2?o:"0"+o,p=String(p).length>=2?p:"0"+p;var q=1===m?"day":"days",r=1===n?"hour":"hours",s=1===o?"minute":"minutes",t=1===p?"second":"seconds";e.find(".days").text(m),e.find(".hours").text(n),e.find(".minutes").text(o),e.find(".seconds").text(p),e.find(".days_ref").text(q),e.find(".hours_ref").text(r),e.find(".minutes_ref").text(s),e.find(".seconds_ref").text(t)}var d=a.extend({date:null,offset:null},b);d.date||a.error("Date is not defined."),Date.parse(d.date)||a.error("Incorrect date format, it should look like this, 12/24/2012 12:00:00.");var e=this,f=function(){var a=new Date,b=a.getTime()+6e4*a.getTimezoneOffset(),c=new Date(b+36e5*d.offset);return c},h=setInterval(g,1e3)}}(jQuery);
</script>'."\n";
    }
}
add_action( 'wp_head', 'onemax_init_countdown', 101 );

// include the script
function onemax_js_css(){
            wp_register_style( 'onemax-main-css', ONEMAX_URI . '/css/main.css','','','all');
            wp_register_style('font-awesome', ONEMAX_URI.'/css/plugin/font-awesome.min.css','','','all');


//loading jquery
wp_enqueue_script("jquery");
    wp_register_script( 'bootstrap',ONEMAX_URI.'/js/library/bootstrap.min.js');
        if ( !is_admin() ) {
            wp_enqueue_style('onemax-main-css');
            wp_enqueue_style('font-awesome');
            wp_enqueue_script( 'bootstrap');
    }
}
add_action( 'init', 'onemax_js_css' );

//enqueue scripts and styles
if(!function_exists('onemax_scripts')){
    function onemax_scripts(){
        wp_enqueue_style( 'onemax-style', get_stylesheet_uri() );
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
}
add_action( 'wp_enqueue_scripts', 'onemax_scripts' );

//load social css
if(!function_exists('onemax_social_css')){
    function onemax_social_css(){
        wp_enqueue_style( 'onemax-social', ONEMAX_URI . '/css/social.css');
    }
}
if(!empty($onemax_options['facebook']) || !empty($onemax_options['twitter']) || !empty($onemax_options['youtube']) || !empty($onemax_options['vimeo']) || !empty($onemax_options['linkedin'])
        || !empty($onemax_options['pinterest']) || !empty($onemax_options['instagram']) || !empty($onemax_options['flickr']) || !empty($onemax_options['google_plus'])){
    add_action( 'wp_enqueue_scripts', 'onemax_social_css' );
}

//remove plugin js&css
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

//get image information
if(!function_exists('onemax_get_img_info')){
    function onemax_get_img_info($img_id){
        $post_id = str_replace( 'attachment_', '', $img_id );
        $img= get_post( (int) $post_id );
        if ( is_a( $img, 'WP_Post' ) )
            return array(
                'img_caption'=>$img->post_excerpt ,
                'img_describe'=>$img->post_content ,
                'img_title'=>$img->post_title ,
                'img_src'=>$img->guid ,);
        return '';
    }
}

if(!function_exists('onemax_get_half_primary_menu_count')){
    function onemax_get_half_primary_menu_count(){
        $count=0;
        if (($locations = get_nav_menu_locations()) && isset($locations['primary_head_menu'])) {
            $menu_items = wp_get_nav_menu_items($locations['primary_head_menu']);
            foreach($menu_items as $menu_item){
                if($menu_item->menu_item_parent==0){
                    $count++;
                }
            }
        }
        return ceil($count/2);
    }
}

//get primary_head_menu info
if(!function_exists('onemax_get_menu_info')){
    function onemax_get_menu_info($header_name='nomal',$not_mobile=true){
        if(has_nav_menu( 'primary_head_menu' )){
            if($header_name=='nomal'){
                if($not_mobile){
                    $menu_args=array(
                        'theme_location' => 'primary_head_menu',
                        'container' => 'div',
                        'container_id'=>'cssmenu',
                        'menu_class' => 'sf-menu om-menu',
                        'walker'=>new Onemax_Nomal_Nav_Menu,
                        'depth' => 3,
                        'echo'=>false
                    );
                }  else {
                    $menu_args=array(
                        'theme_location' => 'primary_head_menu',
                        'container' => '',
                        'menu_class' => 'om-mobile-menu',
                        'depth' => 3,
                        'echo'=>false
                    );
                }
            }elseif($header_name=='simple'){
                 $menu_args=array(
                        'theme_location' => 'primary_head_menu',
                        'container' => '',
                        'menu_class' => 'simpleFull om-primary-menu',
                        'walker'=>new Onemax_Simple_Nav_Menu,
                        'depth' => 3,
                        'echo'=>false
                    );
            }elseif ($header_name=='center') {
                $menu_args=array(
                        'theme_location' => 'primary_head_menu',
                        'container' => 'div',
                        'container_id'=>'cssmenu',
                        'menu_class' => 'sf-menu om-menu',
                        'walker'=>new Onemax_Center_Nav_Menu,
                        'depth' => 3,
                        'echo'=>false
                    );
            }
            return wp_nav_menu($menu_args);
        }
    }
}
//get logo image
if(!function_exists('onemax_get_logo_image')){
    function onemax_get_logo_image($echo=true){
        global $onemax_options;
        $normal_src=empty($onemax_options['normal-logo']['url'])?'':$onemax_options['normal-logo']['url'];
        $retina_src=empty($onemax_options['retina-logo']['url'])?'':$onemax_options['retina-logo']['url'];
        $sticky_src=empty($onemax_options['sticky-logo']['url'])?'':$onemax_options['sticky-logo']['url'];
        if(empty($normal_src) && empty($retina_src) && empty($sticky_src)){
            if($echo)
                echo '<span class="text-logo">'.$onemax_options['text-logo'].'</span>';
            else
                return '<span class="text-logo">'.$onemax_options['text-logo'].'</span>';
        }else{
            if($echo)
                echo "<img alt='normal logo' data-rjs='2' class='normal-logo' src='$normal_src'>\n<img alt='sticky logo' class='sticky-logo' src='$sticky_src'>";
            else
                return "<img alt='normal logo' data-rjs='2' class='normal-logo' src='$normal_src'>\n<img alt='sticky logo' class='sticky-logo' src='$sticky_src'>";
        }
    }
}

function onemax_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'onemax_woocommerce_support' );


// Register your custom function to override some LayerSlider data
add_action('layerslider_ready', 'onemax_my_layerslider_overrides');
function onemax_my_layerslider_overrides() {

// Disable auto-updates
    $GLOBALS['lsAutoUpdateBox'] = false;
}
//the excerpt length
if(!function_exists('onemax_new_excerpt_length')){
    function onemax_new_excerpt_length($length) {
        global $onemax_options;
        if(is_search()){
            return 40;
        }else{
            if($onemax_options['blog-layout']=='1'){
                return 40;
            }elseif ($onemax_options['blog-layout']=='2') {
                return 60;
            }else{
                return 13;
            }
        }
    }
}
add_filter('excerpt_length', 'onemax_new_excerpt_length');

//the excerpt more
function onemax_new_excerpt_more($excerpt) {
    return str_replace('[&hellip;]', '&hellip;', $excerpt);
}
add_filter('wp_trim_excerpt', 'onemax_new_excerpt_more');

function onemax_custom_posts_per_page($query) {
    if (is_home()) {
        global $onemax_options;
        $per_page_posts=isset($onemax_options['per-page'])?$onemax_options['per-page']:'';
        $per_page_posts=  empty($per_page_posts)?get_option('posts_per_page'):$per_page_posts;
        $query->set('posts_per_page', $per_page_posts);
    }
}
add_action('pre_get_posts', 'onemax_custom_posts_per_page');

//ls_slider_content
if(!function_exists('onemax_the_content_ls_slider_filter')){
    function onemax_the_content_ls_slider_filter($content){
        global $onemax_ls_slider_code;
        return $onemax_ls_slider_code.$content;
    }
}

//sr_slider_content
if(!function_exists('onemax_the_content_sr_slider_filter')){
    function onemax_the_content_sr_slider_filter($content){
        global $onemax_sr_slider_code;
        return $onemax_sr_slider_code.$content;
    }
}

//page back to top
if(!function_exists('onemax_page_btt')){
    function onemax_page_btt(){
        echo '.scrolltop{display: none;}'."\n";
    }
}

//page bg
if(!function_exists('onemax_page_bg')){
    function onemax_page_bg($onemax_page_bg_url,$onemax_page_bg_type,$onemax_page_bg_pos,$onemax_page_bg_repeat){
        if($onemax_page_bg_type!='cover'){
            echo 'body{
                background-image: none;
            }
            body #om-page{
                background-image: url("'.esc_url($onemax_page_bg_url).'");
                background-position: '.esc_html($onemax_page_bg_pos).';
                background-repeat: '.esc_html($onemax_page_bg_repeat).';
            }';
        }else{
            echo 'body{
                background-image: none;
            }
            body #om-page{
                background-image: url("'.esc_url($onemax_page_bg_url).'");
                background-size:cover;
            }';
        }
    }
}

//search type
if(!function_exists('onemax_searchAll')){
    function onemax_searchAll( $query ) {
        if ( $query->is_search() ) {
            $query->set( 'post_type', array( 'post'));
        }
        return $query;
    }
}
add_action( 'pre_get_posts', 'onemax_searchAll' );//pre_get_posts or the_search_query or another method

//add google fonts
if(!function_exists('onemax_add_fonts_func')){
    function onemax_add_fonts_func($fonts_list){
        $add_fonts_arr=array(
                array('font_family'=>'Inconsolata','font_types'=>'400 regular:400:normal,700 bold regular:700:normal','font_styles'=>'regular,bold'),
                array('font_family'=>'Indie Flower','font_types'=>'400 regular:400:normal','font_styles'=>'regular'),
                array('font_family'=>'PT Sans Narrow','font_types'=>'400 regular:400:normal,700 bold regular:700:normal','font_styles'=>'regular,bold'),
                array('font_family'=>'Slabo 27px','font_types'=>'400 regular:400:normal','font_styles'=>'regular'),
                array('font_family'=>'Source Sans Pro','font_types'=>'200 extra-light:200:normal,200 extra-light italic:200:italic,300 light:300:normal,300 light italic:300:italic,400 regular:400:normal,400 regular italic:400:italic,600 semi-bold:600:normal,600 semi-bold italic:600:italic,700 bold:700:normal,700 bold italic:700:italic,900 black:900:normal,900 black italic:900:italic','font_styles'=>'extra-light,extra-light italic,light,light italic,regular,regular italic,semi-bold,semi-bold italic,bold,bold italic,black,black italic'),
                array('font_family'=>'Titillium Web','font_types'=>'200 extra-light:200:normal,200 extra-light italic:200:italic,300 light:300:normal,300 light italic:300:italic,400 regular:400:normal,400 regular italic:400:italic,600 semi-bold:600:normal,600 semi-bold italic:600:italic,700 bold:700:normal,700 bold italic:700:italic,900 black:900:normal','font_styles'=>'extra-light,extra-light italic,light,light italic,regular,regular italic,semi-bold,semi-bold italic,bold,bold italic,black'),
            );
        foreach($add_fonts_arr as $v){
            $josefin=(object)array();
            foreach($v as $k1=>$v1){
                $josefin->$k1=$v1;
            }
            $fonts_list[] = $josefin;
        }
        return $fonts_list;
    }
}
add_filter('vc_google_fonts_get_fonts_filter', 'onemax_add_fonts_func');

//page padding top
if(!function_exists('onemax_page_pt_80')){
    function onemax_page_pt_80(){
        echo '<style type="text/css">#om-page{padding-top:80px;}</style>';
    }
}
if(!function_exists('onemax_page_pt_60')){
    function onemax_page_pt_60(){
        echo '<style type="text/css">#om-page{padding-top:60px;}</style>';
    }
}

if(!function_exists('onemax_do_shortcode_video')){
    function onemax_do_shortcode_video($video_link){
        return do_shortcode('[video width="" height="" mp4="'.$video_link.'"][/video]');
    }
}

if(!function_exists('onemax_get_portfolio_video')){
    function onemax_get_portfolio_video($post_id){
        $portfolio_youtube_link=get_post_meta($post_id, "om-portfolio-youtube-link", true);
        $portfolio_vimeo_link=get_post_meta($post_id, "om-portfolio-vimeo-link", true);
        $portfolio_mp4_link=get_post_meta($post_id, "om-portfolio-mp4-link", true);
        if(!empty($portfolio_youtube_link) && strpos($portfolio_youtube_link,'youtube')!==false){
            parse_str( parse_url( $portfolio_youtube_link, PHP_URL_QUERY ), $vars );
            $video_html='<iframe class="" src="http://www.youtube.com/embed/'.$vars['v'].'?wmode=opaque" allowfullscreen="0"></iframe>';
        }elseif(!empty($portfolio_vimeo_link) && strpos($portfolio_vimeo_link,'vimeo')!==false){
            $vimeo_info=parse_url( $portfolio_vimeo_link);
            $vimeo_id=substr($vimeo_info['path'], 1);
            $video_html='<iframe class="scale-with-grid" src="http://player.vimeo.com/video/'.$vimeo_id.'" allowfullscreen=""></iframe>';
        }elseif(!empty($portfolio_mp4_link)){
            $video_html=onemax_do_shortcode_video($portfolio_mp4_link['url']);
        }else{
            $video_html='';
        }
        return $video_html;
    }
}
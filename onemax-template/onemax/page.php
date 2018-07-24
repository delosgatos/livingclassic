<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 *
 * @package OneMax
 * @author OneMax Creative Design Team
 * @link http://onemaxwpdemo.onemax.site
 */
global $onemax_options;
$page_back_to_top=get_post_meta(get_the_ID(), "back-to-top", true);
$page_bg=get_post_meta(get_the_ID(), "background-image", true);
if(!empty($page_bg['url']))
	$onemax_page_bg_url=$page_bg['url'];
$onemax_page_bg_type=get_post_meta(get_the_ID(), "background-image-type", true);
$onemax_page_bg_pos=get_post_meta(get_the_ID(), "background-image-position", true);
$onemax_page_bg_repeat=get_post_meta(get_the_ID(), "background-image-repeat", true);
$onemax_page_bg_repeat=$onemax_page_bg_repeat=='1'?'repeat':'no-repeat';
if($page_back_to_top=='1'){
	add_action('onemax_page_option','onemax_page_btt');
}
if(!empty($page_bg['url'])){
	add_action('onemax_page_option','onemax_page_bg',10,4);
}
$onemax_slider_location=get_post_meta(get_the_ID(), "om-slider-code", true);
if(empty($onemax_slider_location)){
	add_action( 'wp_head', 'onemax_page_pt_80' );
}else{
	if($onemax_options['head-menu-layout-img']=='slider-below' || $onemax_options['head-menu-layout-img']=='slider-below-right' || $onemax_options['head-menu-layout-img']=='slider-below-centre'){
		add_action( 'wp_head', 'onemax_page_pt_60' );
	}
}

get_header();

$onemax_ls_slider_code=get_post_meta(get_the_ID(), "ls-slider-code", true);
$onemax_sr_slider_code=get_post_meta(get_the_ID(), "sr-slider-code", true);
if(!empty($onemax_slider_location)){
	get_template_part('inc/template/om-slider');
}elseif(!empty($onemax_ls_slider_code)){
	add_filter( 'the_content', 'onemax_the_content_ls_slider_filter');
}elseif(!empty($onemax_sr_slider_code)){
	add_filter( 'the_content', 'onemax_the_content_sr_slider_filter');
}
if($onemax_options['head-menu-layout-img']=='slider-below' || $onemax_options['head-menu-layout-img']=='slider-below-right'){
	get_template_part('inc/template/om-header-below');
}elseif ($onemax_options['head-menu-layout-img']=='slider-below-centre') {
	echo '<div id="header">';
	get_template_part('inc/template/om-header-center');
	echo '</div>';
}
?>

<div  id="om-page">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
		$page_content=get_the_content();
		if(!has_shortcode($page_content,'vc_row')){
        ?>
 	<div class="page-n-vc-row">
		<div class="single-title"><h1><?php the_title();?></h1></div>
 	<?php } ?>
    	<div class="page-content"><?php the_content();?></div>
    <?php if(!has_shortcode($page_content,'vc_row')){ ?>
			<?php	// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			?>


    </div>
    <?php } ?>

		<?php	// If comments are open or we have at least one comment, load up the comment template.
		endwhile;
		?>
    </div><!-- .content-area -->

<?php get_footer(); ?>

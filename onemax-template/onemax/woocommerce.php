<?php
/**
 * Woocommerce template
 * 
 * @package OneMax
 * @author OneMax Creative Design Team
 * @link http://onemaxwpdemo.onemax.site
 */
global $onemax_options;
add_action( 'wp_head', 'onemax_page_pt_80' );
get_header();
if($onemax_options['head-menu-layout-img']=='slider-below' || $onemax_options['head-menu-layout-img']=='slider-below-right'){
	get_template_part('inc/template/om-header-below');
}elseif ($onemax_options['head-menu-layout-img']=='slider-below-centre') {
	echo '<div id="header">';
	get_template_part('inc/template/om-header-center');
	echo '</div>';
}
?>

<div  id="om-page">
	<div id="om-general-woo-tempt" class="no-vc-row">
		<?php woocommerce_content(); ?>
	</div>
</div><!-- .content-area -->

<?php get_footer(); ?>

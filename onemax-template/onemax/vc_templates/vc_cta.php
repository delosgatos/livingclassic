<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/**
 * Shortcode attributes
 * @var $atts
 * @var $content - shortcode content
 * Shortcode class
 * @var $obj WPBakeryShortCode_VC_Cta_new
 */
$obj=new WPBakeryShortCode_VC_Cta_new(array( 'base' => 'vc_cta' ));
$atts = vc_map_get_attributes( $obj->getShortcode(), $atts );
$obj->buildTemplate( $atts, $content );
$containerClass = trim( 'vc_cta3-container ' . esc_attr( implode( ' ', $obj->getTemplateVariable( 'container-class' ) ) ) );
$cssClass = trim( 'vc_general ' . esc_attr( implode( ' ', $obj->getTemplateVariable( 'css-class' ) ) ) );
extract( $atts );

$default_src = vc_asset_url( 'vc/no_image.png' );
$img = false;
$img = wpb_getImageBySize( array(
			'attach_id' => $bg_pic,
			'thumb_size' => '1200x120',
			'class' => 'vc_single_image-img',
		) );
if ( ! $img ) {
	$img['thumbnail'] = '<img alt="thumbnail" class="vc_img-placeholder vc_single_image-img" src="' . $default_src . '" />';
}
preg_match('/<img.+src=\"?(.+\.(jpg|gif|bmp|bnp|png))\"?.+>/i',$img['thumbnail'],$match);
$img_src=$match[1];

?>
<section class="<?php echo esc_attr( $containerClass ); ?>">
	<div <?php if($ani != 'none')echo "data-aos='$ani' data-aos-once='$aos_once' data-aos-delay='$aos_delay'";?> <?php if(in_array($style, array('classic','flat','outline','3d')) && $color==='custom'){
                                                echo 'style="background:'.$custom_color.'";';}
                                            elseif ($style=='pic') {
                                                echo 'style="background:url('.$img_src.');"';
                                            }?> class="<?php echo esc_attr( $cssClass ); ?>"<?php
	if ( $obj->getTemplateVariable( 'inline-css' ) ) {
		echo ' style="' . esc_attr( implode( ' ', $obj->getTemplateVariable( 'inline-css' ) ) ) . '"';
	}
	?>>
		<?php echo $obj->getTemplateVariable( 'icons-top' ); ?>
		<?php echo $obj->getTemplateVariable( 'icons-left' ); ?>
		<div class="vc_cta3_content-container">
                                                                    <?php if($add_button==='om_btn'){
                                                                       echo '';
                                                                   }else{
                                                                       echo $obj->getTemplateVariable( 'actions-top' );
                                                                       echo $obj->getTemplateVariable( 'actions-left' );
                                                                   }
                                                                   ?>
			<div class="vc_cta3-content">
				<header class="vc_cta3-content-header">
					<?php echo $obj->getTemplateVariable( 'heading1' ); ?>
					<?php echo $obj->getTemplateVariable( 'heading2' ); ?>
				</header>
				<?php echo $obj->getTemplateVariable( 'content' ); ?>
			</div>
                                                                   <?php if($add_button==='om_btn'){
                                                                       echo $obj->getTemplateVariable( 'actions-om_btn' );
                                                                   }else{
                                                                       echo $obj->getTemplateVariable( 'actions-bottom' );
                                                                       echo $obj->getTemplateVariable( 'actions-right' );
                                                                   }
                                                                   ?>
		</div>
		<?php echo $obj->getTemplateVariable( 'icons-bottom' ); ?>
		<?php echo $obj->getTemplateVariable( 'icons-right' ); ?>
	</div>
</section>

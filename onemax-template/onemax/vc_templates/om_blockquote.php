<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$output=$txt='';

$atts = vc_map_get_attributes( 'om_blockquote', $atts );
extract( $atts );

if($txt=='')
    $txt=esc_html__('Please Enter Something.','onemax');
$output.='<div class="om-width"><div class="om-blockquote"><p><i class="fa fa-quote-right" aria-hidden="true"></i>'.esc_html($txt).'</p></div></div>';
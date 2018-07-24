<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


$rows=$title1=$title2=$title3=$title4=$content1=$content2=$content3=$content4=$icon_background=$output=$el_class = $css = '';
$atts = vc_map_get_attributes( 'om_faq_accordion', $atts );//p($atts);
extract( $atts );

// Pick up icons
$defaultIconClass = 'fa fa-adjust';
$iconClass = isset( ${'icon_' . $icon_type} ) ? ${'icon_' . $icon_type} : $defaultIconClass;
// Enqueue needed font for icon element
if ( 'pixelicons' !== $icon_type ) {
	vc_icon_element_fonts_enqueue( $icon_type );
}

$uid=  uniqid();

$output='<div class="faq"><div class="bb50" style="border:none;"><ul class="accordion accordion_'. $uid.'">';
for($i=1;$i<=$rows;$i++){
    $title='title'.$i;
    $content='content'.$i;
    if($i==1){
        $class='class="open"';$dis='block';
    }else{
        $class='';$dis='none';
    }
    $output.='<li '.$class.' style="background:url('.  ONEMAX_URI.'/img/faq/faq_img_'.$icon_background.'.png);">
                        <div class="link">
                            <i class="'.esc_attr( $iconClass ).'"></i>'.esc_html($$title).'</div>
                        <div class="submenu" style="display:'.$dis.';">'.esc_html($$content).'</div></li>';
}
$output.= '</ul></div></div>';

$om_faq_accordion_js='jQuery(function($) {
	var Accordion = function(el, multiple) {
		this.el = el || {};
		this.multiple = multiple || false;

		var links = this.el.find(".link");
		
		links.on("click", {el: this.el, multiple: this.multiple}, this.dropdown)
	}

	Accordion.prototype.dropdown = function(e) {
		var $el = e.data.el;
			$this = $(this),
			$next = $this.next();

		$next.slideToggle();
		$this.parent().toggleClass("open");

		if (!e.data.multiple) {
			$el.find(".submenu").not($next).slideUp().parent().removeClass("open");
		};
	}	

	var accordion_'.$uid.' = new Accordion($(".accordion_'.$uid.'"), false);
});';
wp_add_inline_script( 'onemax-header-init',$om_faq_accordion_js );
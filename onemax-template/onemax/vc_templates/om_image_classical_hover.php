<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$om_image_classical_hover_obj=new WPBakeryShortCode_Om_Image_Classical_Hover(array( 'base' => 'om_image_classical_hover' ));

$ani=$aos_once=$aos_delay=$aos=$title = $source = $image = $custom_src = $onclick = $img_size = $external_img_size =$h_color=$h_ani=$instruction=
$img_link_large = $link = $img_link_target = $css_animation = $style = $external_style = $border_color = $alignment = $output= '';
$atts = vc_map_get_attributes( $om_image_classical_hover_obj->getShortcode(), $atts );//p($atts);
extract( $atts );

if($ani != 'none')
    $aos="data-aos='$ani' data-aos-once='$aos_once' data-aos-delay='$aos_delay'";

$default_src = vc_asset_url( 'vc/no_image.png' );

$bg_styles= vc_get_css_color( 'background-color', $h_color );

// backward compatibility. since 4.6
if ( empty( $onclick ) && isset( $img_link_large ) && 'yes' === $img_link_large ) {
	$onclick = 'img_link_large';
} elseif ( empty( $atts['onclick'] ) && ( ! isset( $atts['img_link_large'] ) || 'yes' !== $atts['img_link_large'] ) ) {
	$onclick = 'custom_link';
}

if ( 'external_link' === $source ) {
	$style = $external_style;
	$border_color = $external_border_color;
}

$border_color = ( '' !== $border_color ) ? ' vc_box_border_' . $border_color : '';

$img = false;

switch ( $source ) {
	case 'media_library':
	case 'featured_image':

		if ( 'featured_image' === $source ) {
			$post_id = get_the_ID();
			if ( $post_id && has_post_thumbnail( $post_id ) ) {
				$img_id = get_post_thumbnail_id( $post_id );
			} else {
				$img_id = 0;
			}
		} else {
			$img_id = preg_replace( '/[^\d]/', '', $image );
		}

		// set rectangular
		if ( preg_match( '/_circle_2$/', $style ) ) {
			$style = preg_replace( '/_circle_2$/', '_circle', $style );
			$img_size = $om_image_classical_hover_obj->getImageSquareSize( $img_id, $img_size );
		}

		if ( ! $img_size ) {
			$img_size = 'medium';
		}

                                            if($img_size=='full'){
                                                $full_src=wp_get_attachment_image_src($img_id, 'full');
                                                $img = array(
                                                    'thumbnail' => '<img alt="thumbnail" class="vc_single_image-img attachment-full" src="' . $full_src[0] . '" />',
                                                );
                                            }else{
                                                $img = wpb_getImageBySize( array(
                                                        'attach_id' => $img_id,
                                                        'thumb_size' => $img_size,
                                                        'class' => 'vc_single_image-img',
                                                ) );
                                            }
                                            $img['thumbnail'] = str_replace( '<img ', '<img data-rjs="2" ', $img['thumbnail'] );
		// don't show placeholder in public version if post doesn't have featured image
		if ( 'featured_image' === $source ) {
			if ( ! $img && 'page' === vc_manager()->mode() ) {
				return;
			}
		}

		break;

	case 'external_link':
		$dimensions = vcExtractDimensions( $external_img_size );
		$hwstring = $dimensions ? image_hwstring( $dimensions[0], $dimensions[1] ) : '';

		$custom_src = $custom_src ? esc_attr( $custom_src ) : $default_src;

		$img = array(
			'thumbnail' => '<img alt="thumbnail" data-rjs="2" class="vc_single_image-img" ' . $hwstring . ' src="' . $custom_src . '" />',
		);
		break;

	default:
		$img = false;
}

if ( ! $img ) {
	$img['thumbnail'] = '<img alt="thumbnail" class="vc_img-placeholder vc_single_image-img" src="' . $default_src . '" />';
}





// backward compatibility. will be removed in 4.7+
if ( ! empty( $atts['img_link'] ) ) {
	$link = $atts['img_link'];
	if ( ! preg_match( '/^(https?\:\/\/|\/\/)/', $link ) ) {
		$link = 'http://' . $link;
	}
}

// backward compatibility
if ( in_array( $link, array( 'none', 'link_no' ) ) ) {
	$link = '';
}

$a_attrs = array();

switch ( $onclick ) {
	case 'img_link_large':

		if ( 'external_link' === $source ) {
			$link = $custom_src;
		} else {
			$link = wp_get_attachment_image_src( $img_id, 'large' );
			$link = $link[0];
		}

		break;

	case 'link_image':
		wp_enqueue_script( 'prettyphoto' );
		wp_enqueue_style( 'prettyphoto' );

		$a_attrs['class'] = 'prettyphoto';
		$a_attrs['data-rel'] = 'prettyPhoto[rel-' . get_the_ID() . '-' . rand() . ']';

		// backward compatibility
		if ( 'external_link' === $source ) {
			$link = $custom_src;
		} else {
			$link = wp_get_attachment_image_src( $img_id, 'large' );
			$link = $link[0];
		}

		break;

	case 'custom_link':
		// $link is already defined
		break;

	case 'zoom':
		wp_enqueue_script( 'vc_image_zoom' );

		if ( 'external_link' === $source ) {
			$large_img_src = $custom_src;
		} else {
			$large_img_src = wp_get_attachment_image_src( $img_id, 'large' );
			if ( $large_img_src ) {
				$large_img_src = $large_img_src[0];
			}
		}

		$img['thumbnail'] = str_replace( '<img ', '<img data-vc-zoom="' . $large_img_src . '" ', $img['thumbnail'] );

		break;
}
$wrapperClass = 'vc_single_image-wrapper ' . $style . ' ' . $border_color;

$class_to_filter = 'wpb_single_image wpb_content_element ' . $om_image_classical_hover_obj->getCSSAnimation( $css_animation );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, 'om_image_classical_hover', $atts );

if ( $link ) {
	$a_attrs['href'] = $link;
	$a_attrs['target'] = $img_link_target;
	if ( ! empty( $a_attrs['class'] ) ) {
		$wrapperClass .= ' ' . $a_attrs['class'];
		unset( $a_attrs['class'] );
	}
                        $output.='<div '.$aos.' class="portfolio"><div class="rowcontrol om-width om-por-width"><div class="small-12 columns small-centered"><div class="pic">';
                        $output.='<div class="small-12 columns small-centered"><div class="' . esc_attr( trim( $css_class ) ) . '">';
                        $output.='<ul class="pic-grid-1"><li class="mix" data-bound="" style="text-align:'.$alignment.';"><figure class="imghvr-'.$h_ani.' figure wpb_wrapper vc_figure">'.$img['thumbnail'].'<figcaption style="'.$bg_styles.'">';
                        $output.='<div class="om-figcaption"><h3>'.esc_html($title).'</h3><p>'.esc_html($instruction).'</p></div></figcaption><a ' . vc_stringify_attributes( $a_attrs ) . ' class="' . esc_attr($wrapperClass) . '"></a>';
                        $output.='</figure></li></ul></div></div></div></div></div></div>';

} else {
	  $output.='<div '.$aos.' class="portfolio"><div class="rowcontrol om-width om-por-width"><div class="small-12 columns small-centered"><div class="pic">';
                        $output.='<div class="small-12 columns small-centered"><div class="' . esc_attr( trim( $css_class ) ) . '">';
                        $output.='<ul class="pic-grid-1"><li class="mix" data-bound="" style="text-align:'.$alignment.';"><figure class="imghvr-'.$h_ani.' figure wpb_wrapper vc_figure ' . esc_attr($wrapperClass) . '">'.$img['thumbnail'].'<figcaption style="'.$bg_styles.'">';
                        $output.='<div class="om-figcaption"><h3>'.esc_html($title).'</h3><p>'.esc_html($instruction).'</p></div></figcaption>';
                        $output.='</figure></li></ul></div></div></div></div></div></div>';
}

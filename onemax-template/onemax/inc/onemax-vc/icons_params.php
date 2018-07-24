<?php
if(!function_exists('onemax_get_icons_params')){
	function onemax_get_icons_params($depend_add=true){
	    $icon_params = array(
			'name' => esc_html__( 'Icon', 'onemax' ),
			'base' => 'vc_icon',
			'icon' => 'icon-wpb-vc_icon',
			'category' => esc_html__( 'Content', 'onemax' ),
			'description' => esc_html__( 'Eye catching icons from libraries', 'onemax' ),
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Icon library', 'onemax' ),
					'value' => array(
						esc_html__( 'Font Awesome', 'onemax' ) => 'fontawesome',
						esc_html__( 'Open Iconic', 'onemax' ) => 'openiconic',
						esc_html__( 'Typicons', 'onemax' ) => 'typicons',
						esc_html__( 'Entypo', 'onemax' ) => 'entypo',
						esc_html__( 'Linecons', 'onemax' ) => 'linecons',
						esc_html__( 'Mono Social', 'onemax' ) => 'monosocial',
					),
					'admin_label' => true,
					'param_name' => 'type',
					'description' => esc_html__( 'Select icon library.', 'onemax' ),
				),
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'onemax' ),
					'param_name' => 'icon_fontawesome',
					'value' => 'fa fa-adjust', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false,
						// default true, display an "EMPTY" icon?
						'iconsPerPage' => 4000,
						// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'fontawesome',
					),
					'description' => esc_html__( 'Select icon from library.', 'onemax' ),
				),
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'onemax' ),
					'param_name' => 'icon_openiconic',
					'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'openiconic',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'openiconic',
					),
					'description' => esc_html__( 'Select icon from library.', 'onemax' ),
				),
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'onemax' ),
					'param_name' => 'icon_typicons',
					'value' => 'typcn typcn-adjust-brightness', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'typicons',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'typicons',
					),
					'description' => esc_html__( 'Select icon from library.', 'onemax' ),
				),
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'onemax' ),
					'param_name' => 'icon_entypo',
					'value' => 'entypo-icon entypo-icon-note', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'entypo',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'entypo',
					),
				),
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'onemax' ),
					'param_name' => 'icon_linecons',
					'value' => 'vc_li vc_li-heart', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'linecons',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'linecons',
					),
					'description' => esc_html__( 'Select icon from library.', 'onemax' ),
				),
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'onemax' ),
					'param_name' => 'icon_monosocial',
					'value' => 'vc-mono vc-mono-fivehundredpx', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'monosocial',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'monosocial',
					),
					'description' => esc_html__( 'Select icon from library.', 'onemax' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Icon color', 'onemax' ),
					'param_name' => 'color',
					'value' => array_merge( getVcShared( 'colors' ), array( esc_html__( 'Custom color', 'onemax' ) => 'custom' ) ),
					'description' => esc_html__( 'Select icon color.', 'onemax' ),
					'param_holder_class' => 'vc_colored-dropdown',
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Custom color', 'onemax' ),
					'param_name' => 'custom_color',
					'description' => esc_html__( 'Select custom icon color.', 'onemax' ),
					'dependency' => array(
						'element' => 'color',
						'value' => 'custom',
					),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Background shape', 'onemax' ),
					'param_name' => 'background_style',
					'value' => array(
						esc_html__( 'None', 'onemax' ) => '',
						esc_html__( 'Circle', 'onemax' ) => 'rounded',
						esc_html__( 'Square', 'onemax' ) => 'boxed',
						esc_html__( 'Rounded', 'onemax' ) => 'rounded-less',
						esc_html__( 'Outline Circle', 'onemax' ) => 'rounded-outline',
						esc_html__( 'Outline Square', 'onemax' ) => 'boxed-outline',
						esc_html__( 'Outline Rounded', 'onemax' ) => 'rounded-less-outline',
					),
					'description' => esc_html__( 'Select background shape and style for icon.', 'onemax' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Background color', 'onemax' ),
					'param_name' => 'background_color',
					'value' => array_merge( getVcShared( 'colors' ), array( esc_html__( 'Custom color', 'onemax' ) => 'custom' ) ),
					'std' => 'grey',
					'description' => esc_html__( 'Select background color for icon.', 'onemax' ),
					'param_holder_class' => 'vc_colored-dropdown',
					'dependency' => array(
						'element' => 'background_style',
						'not_empty' => true,
					),
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Custom background color', 'onemax' ),
					'param_name' => 'custom_background_color',
					'description' => esc_html__( 'Select custom icon background color.', 'onemax' ),
					'dependency' => array(
						'element' => 'background_color',
						'value' => 'custom',
					),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Size', 'onemax' ),
					'param_name' => 'size',
					'value' => array_merge( getVcShared( 'sizes' ), array( 'Extra Large' => 'xl' ) ),
					'std' => 'md',
					'description' => esc_html__( 'Icon size.', 'onemax' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Icon alignment', 'onemax' ),
					'param_name' => 'align',
					'value' => array(
						esc_html__( 'Left', 'onemax' ) => 'left',
						esc_html__( 'Right', 'onemax' ) => 'right',
						esc_html__( 'Center', 'onemax' ) => 'center',
					),
					'description' => esc_html__( 'Select icon alignment.', 'onemax' ),
				),
				array(
					'type' => 'vc_link',
					'heading' => esc_html__( 'URL (Link)', 'onemax' ),
					'param_name' => 'link',
					'description' => esc_html__( 'Add link to icon.', 'onemax' ),
				),
				vc_map_add_css_animation(),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'onemax' ),
					'param_name' => 'el_class',
					'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'onemax' ),
				),
				array(
					'type' => 'css_editor',
					'heading' => esc_html__( 'CSS box', 'onemax' ),
					'param_name' => 'css',
					'group' => esc_html__( 'Design Options', 'onemax' ),
				),
			),
			'js_view' => 'VcIconElementView_Backend',
		);

	    if($depend_add){
	        $icons_params = vc_map_integrate_shortcode( $icon_params, 'i_', '', array(
	                        'exclude' => array(
	                                'align',
	                                'css',
	                                'el_class',
	                                'link',
	                                'css_animation',
	                        ),
	                        // we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
	                ), array(
	                        'element' => 'add_icon',
	                        'value' => 'true',
	                ) );
	    }else{
	        $icons_params = vc_map_integrate_shortcode( $icon_params, 'i_', '', array(
	                        'exclude' => array(
	                                'align',
	                                'css',
	                                'el_class',
	                                'link',
	                                'css_animation',
	                        ),
	                        // we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
	                ) );
	    }

	    // populate integrated vc_icons params.
	    if ( is_array( $icons_params ) && ! empty( $icons_params ) ) {
	            foreach ( $icons_params as $key => $param ) {
	                    if ( is_array( $param ) && ! empty( $param ) ) {
	                            if ( isset( $param['admin_label'] ) ) {
	                                    // remove admin label
	                                    unset( $icons_params[ $key ]['admin_label'] );
	                            }
	                    }
	            }
	    }
	    return $icons_params;
	}
}

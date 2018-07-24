<?php

/*
  * OneMaxTheme Functions
  * Author：OneMax creative design
  * Official Site: www.onemax.site
*/

// include the vc icon
if(!function_exists('onemax_vc_icon')){
    function onemax_vc_icon() {
      wp_enqueue_style('onemax-vc-icons', ONEMAX_URI.'/inc/onemax-vc/css/om_vc_icons.css');
    }
    add_action('admin_enqueue_scripts', 'onemax_vc_icon');
}

/***************************extend vc*******************************/
if (class_exists('WPBakeryVisualComposerAbstract')) {
    //include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    require (dirname(__FILE__).'/icons_params.php');
    /********************modify accordion to onemax*********************/
    $accordion_params = array(
        array(
            'type' => 'textfield',
            'param_name' => 'title',
            'heading' => esc_html__('Widget title', 'onemax'),
            'description' => esc_html__('Enter text used as widget title (Note: located above content element).', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'style',
            'value' => array(
                esc_html__('Classic', 'onemax') => 'classic',
                esc_html__('Modern', 'onemax') => 'modern',
                esc_html__('Flat', 'onemax') => 'flat',
                esc_html__('Outline', 'onemax') => 'outline',
            ),
            'heading' => esc_html__('Style', 'onemax'),
            'description' => esc_html__('Select accordion display style.', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'shape',
            'value' => array(
                esc_html__('Rounded', 'onemax') => 'rounded',
                esc_html__('Square', 'onemax') => 'square',
                esc_html__('Round', 'onemax') => 'round',
            ),
            'heading' => esc_html__('Shape', 'onemax'),
            'description' => esc_html__('Select accordion shape.', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'color',
            'value' => array_merge(getVcShared('colors-dashed'), array(esc_html__('Custom', 'onemax') => 'custom')),
            'std' => 'grey',
            'heading' => esc_html__('Color', 'onemax'),
            'description' => esc_html__('Select accordion color.', 'onemax'),
            'param_holder_class' => 'vc_colored-dropdown',
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Custom Color', 'onemax'),
            'param_name' => 'custom_color',
            'description' => esc_html__('Select custom color for your accordion.', 'onemax'),
            'dependency' => array(
                    'element' => 'color',
                    'value' => 'custom',
            ),
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'std' => '#8646ab',
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Section Background','onemax'),
            'param_name' => 'sec_bg',
            'description' => esc_html__('Select section background color', 'onemax'),
            'std' => '#f8f8f8',
        ),
        array(
            'type' => 'checkbox',
            'param_name' => 'no_fill',
            'heading' => esc_html__('Do not fill content area?', 'onemax'),
            'description' => esc_html__('Do not fill content area with color.', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'spacing',
            'value' => array(
                esc_html__('None', 'onemax') => '',
                '1px' => '1',
                '2px' => '2',
                '3px' => '3',
                '4px' => '4',
                '5px' => '5',
                '10px' => '10',
                '15px' => '15',
                '20px' => '20',
                '25px' => '25',
                '30px' => '30',
                '35px' => '35',
            ),
            'heading' => esc_html__('Spacing', 'onemax'),
            'description' => esc_html__('Select accordion spacing.', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'gap',
            'value' => array(
                esc_html__('None', 'onemax') => '',
                '1px' => '1',
                '2px' => '2',
                '3px' => '3',
                '4px' => '4',
                '5px' => '5',
                '10px' => '10',
                '15px' => '15',
                '20px' => '20',
                '25px' => '25',
                '30px' => '30',
                '35px' => '35',
            ),
            'heading' => esc_html__('Gap', 'onemax'),
            'description' => esc_html__('Select accordion gap.', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'c_align',
            'value' => array(
                esc_html__('Left', 'onemax') => 'left',
                esc_html__('Right', 'onemax') => 'right',
                esc_html__('Center', 'onemax') => 'center',
            ),
            'heading' => esc_html__('Alignment', 'onemax'),
            'description' => esc_html__('Select accordion section title alignment.', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'autoplay',
            'value' => array(
                esc_html__('None', 'onemax') => 'none',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '10' => '10',
                '20' => '20',
                '30' => '30',
                '40' => '40',
                '50' => '50',
                '60' => '60',
            ),
            'std' => 'none',
            'heading' => esc_html__('Autoplay', 'onemax'),
            'description' => esc_html__('Select auto rotate for accordion in seconds (Note: disabled by default).', 'onemax'),
        ),
        array(
            'type' => 'checkbox',
            'param_name' => 'collapsible_all',
            'heading' => esc_html__('Allow collapse all?', 'onemax'),
            'description' => esc_html__('Allow collapse all accordion sections.', 'onemax'),
        ),
        // Control Icons
        array(
            'type' => 'dropdown',
            'param_name' => 'c_icon',
            'value' => array(
                esc_html__('None', 'onemax') => '',
                esc_html__('Chevron', 'onemax') => 'chevron',
                esc_html__('Plus', 'onemax') => 'plus',
                esc_html__('Triangle', 'onemax') => 'triangle',
            ),
            'std' => 'plus',
            'heading' => esc_html__('Icon', 'onemax'),
            'description' => esc_html__('Select accordion navigation icon.', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'c_position',
            'value' => array(
                esc_html__('Left', 'onemax') => 'left',
                esc_html__('Right', 'onemax') => 'right',
            ),
            'dependency' => array(
                'element' => 'c_icon',
                'not_empty' => true,
            ),
            'heading' => esc_html__('Position', 'onemax'),
            'description' => esc_html__('Select accordion navigation icon position.', 'onemax'),
        ),
        // Control Icons END
        array(
            'type' => 'textfield',
            'param_name' => 'active_section',
            'heading' => esc_html__('Active section', 'onemax'),
            'value' => 1,
            'description' => esc_html__('Enter active section number (Note: to have all sections closed on initial load enter non-existing number).', 'onemax'),
        ),
    );
    $accordion_setting = array(
        'category' => esc_html__('onemax', 'onemax'),
        'params' => $accordion_params,
        'icon' => 'om_vc_icon_accordion',
        'weight' => 43,
    );
    vc_map_update('vc_tta_accordion', $accordion_setting);

    /*******************************************add alert box into vc************************************************/
    add_shortcode('om_alert_box', 'onemax_alert_box_func');
    if(!function_exists('onemax_alert_box_func')){
        function onemax_alert_box_func($atts, $content)
        {
            //$content = wpb_js_remove_wpautop($content, true);
            require ONEMAX_DIR.'/vc_templates/om_alert_box.php';

            return $output;
        }
    }
    if(!function_exists('onemax_alert_box_to_vc')){
        add_action('vc_before_init', 'onemax_alert_box_to_vc');
        function onemax_alert_box_to_vc()
        {
            $pixel_icons = array(
                array('vc_pixel_icon vc_pixel_icon-alert' => esc_html__('Alert', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-info' => esc_html__('Info', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-tick' => esc_html__('Tick', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-explanation' => esc_html__('Explanation', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-address_book' => esc_html__('Address book', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-alarm_clock' => esc_html__('Alarm clock', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-anchor' => esc_html__('Anchor', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-application_image' => esc_html__('Application Image', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-arrow' => esc_html__('Arrow', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-asterisk' => esc_html__('Asterisk', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-hammer' => esc_html__('Hammer', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-balloon' => esc_html__('Balloon', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-balloon_buzz' => esc_html__('Balloon Buzz', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-balloon_facebook' => esc_html__('Balloon Facebook', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-balloon_twitter' => esc_html__('Balloon Twitter', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-battery' => esc_html__('Battery', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-binocular' => esc_html__('Binocular', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-document_excel' => esc_html__('Document Excel', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-document_image' => esc_html__('Document Image', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-document_music' => esc_html__('Document Music', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-document_office' => esc_html__('Document Office', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-document_pdf' => esc_html__('Document PDF', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-document_powerpoint' => esc_html__('Document Powerpoint', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-document_word' => esc_html__('Document Word', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-bookmark' => esc_html__('Bookmark', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-camcorder' => esc_html__('Camcorder', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-camera' => esc_html__('Camera', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-chart' => esc_html__('Chart', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-chart_pie' => esc_html__('Chart pie', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-clock' => esc_html__('Clock', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-fire' => esc_html__('Fire', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-heart' => esc_html__('Heart', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-mail' => esc_html__('Mail', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-play' => esc_html__('Play', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-shield' => esc_html__('Shield', 'onemax')),
                array('vc_pixel_icon vc_pixel_icon-video' => esc_html__('Video', 'onemax')),
            );
            $custom_colors = array(
                esc_html__('Informational', 'onemax') => 'info',
                esc_html__('Warning', 'onemax') => 'warning',
                esc_html__('Success', 'onemax') => 'success',
                esc_html__('Error', 'onemax') => 'danger',
                esc_html__('Informational Classic', 'onemax') => 'alert-info',
                esc_html__('Warning Classic', 'onemax') => 'alert-warning',
                esc_html__('Success Classic', 'onemax') => 'alert-success',
                esc_html__('Error Classic', 'onemax') => 'alert-danger',
            );
            $params = array(
                array(
                    'type' => 'params_preset',
                    'heading' => esc_html__('Message Box Presets', 'onemax'),
                    'param_name' => 'color',
                    // due to backward compatibility, really it is message_box_type
                    'value' => '',
                    'options' => array(
                        array(
                            'label' => esc_html__('Custom', 'onemax'),
                            'value' => '',
                            'params' => array(),
                        ),
                        array(
                            'label' => esc_html__('Informational', 'onemax'),
                            'value' => 'info',
                            'params' => array(
                                'message_box_color' => 'info',
                                'icon_type' => 'fontawesome',
                                'icon_fontawesome' => 'fa fa-info-circle',
                            ),
                        ),
                        array(
                            'label' => esc_html__('Warning', 'onemax'),
                            'value' => 'warning',
                            'params' => array(
                                'message_box_color' => 'warning',
                                'icon_type' => 'fontawesome',
                                'icon_fontawesome' => 'fa fa-exclamation-triangle',
                            ),
                        ),
                        array(
                            'label' => esc_html__('Success', 'onemax'),
                            'value' => 'success',
                            'params' => array(
                                'message_box_color' => 'success',
                                'icon_type' => 'fontawesome',
                                'icon_fontawesome' => 'fa fa-check',
                            ),
                        ),
                        array(
                            'label' => esc_html__('Error', 'onemax'),
                            'value' => 'danger',
                            'params' => array(
                                'message_box_color' => 'danger',
                                'icon_type' => 'fontawesome',
                                'icon_fontawesome' => 'fa fa-times',
                            ),
                        ),
                        array(
                            'label' => esc_html__('Informational Classic', 'onemax'),
                            'value' => 'alert-info',
                            // due to backward compatibility
                            'params' => array(
                                'message_box_color' => 'alert-info',
                                'icon_type' => 'pixelicons',
                                'icon_pixelicons' => 'vc_pixel_icon vc_pixel_icon-info',
                            ),
                        ),
                        array(
                            'label' => esc_html__('Warning Classic', 'onemax'),
                            'value' => 'alert-warning',
                            // due to backward compatibility
                            'params' => array(
                                'message_box_color' => 'alert-warning',
                                'icon_type' => 'pixelicons',
                                'icon_pixelicons' => 'vc_pixel_icon vc_pixel_icon-alert',
                            ),
                        ),
                        array(
                            'label' => esc_html__('Success Classic', 'onemax'),
                            'value' => 'alert-success',
                            // due to backward compatibility
                            'params' => array(
                                'message_box_color' => 'alert-success',
                                'icon_type' => 'pixelicons',
                                'icon_pixelicons' => 'vc_pixel_icon vc_pixel_icon-tick',
                            ),
                        ),
                        array(
                            'label' => esc_html__('Error Classic', 'onemax'),
                            'value' => 'alert-danger',
                            // due to backward compatibility
                            'params' => array(
                                'message_box_color' => 'alert-danger',
                                'icon_type' => 'pixelicons',
                                'icon_pixelicons' => 'vc_pixel_icon vc_pixel_icon-explanation',
                            ),
                        ),
                    ),
                    'description' => esc_html__('Select predefined message box design or choose "Custom" for custom styling.', 'onemax'),
                    'param_holder_class' => 'vc_message-type vc_colored-dropdown',
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Style', 'onemax'),
                    'param_name' => 'message_box_style',
                    'value' => getVcShared('message_box_styles'),
                    'description' => esc_html__('Select message box design style.', 'onemax'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Shape', 'onemax'),
                    'param_name' => 'style',
                    // due to backward compatibility message_box_shape
                    'std' => 'rounded',
                    'value' => array(
                        esc_html__('Square', 'onemax') => 'square',
                        esc_html__('Rounded', 'onemax') => 'rounded',
                        esc_html__('Round', 'onemax') => 'round',
                    ),
                    'description' => esc_html__('Select message box shape.', 'onemax'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Color', 'onemax'),
                    'param_name' => 'message_box_color',
                    'value' => array_merge(($custom_colors + getVcShared('colors')), array('Custom' => 'custom')),
                    'description' => esc_html__('Select message box color.', 'onemax'),
                    'param_holder_class' => 'vc_message-type vc_colored-dropdown',
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Custom Color', 'onemax'),
                    'param_name' => 'custom_color',
                    'description' => esc_html__('Select custom color for your alert box.', 'onemax'),
                    'dependency' => array(
                        'element' => 'message_box_color',
                        'value' => 'custom',
                    ),
                    'edit_field_class' => 'vc_col-sm-6 vc_column',
                    'std' => '#8646ab',
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Icon library', 'onemax'),
                    'value' => array(
                        esc_html__('Font Awesome', 'onemax') => 'fontawesome',
                        esc_html__('Open Iconic', 'onemax') => 'openiconic',
                        esc_html__('Typicons', 'onemax') => 'typicons',
                        esc_html__('Entypo', 'onemax') => 'entypo',
                        esc_html__('Linecons', 'onemax') => 'linecons',
                        esc_html__('Pixel', 'onemax') => 'pixelicons',
                        esc_html__('Mono Social', 'onemax') => 'monosocial',
                    ),
                    'param_name' => 'icon_type',
                    'description' => esc_html__('Select icon library.', 'onemax'),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'onemax'),
                    'param_name' => 'icon_fontawesome',
                    'value' => 'fa fa-info-circle',
                    'settings' => array(
                        'emptyIcon' => false,
                        // default true, display an "EMPTY" icon?
                        'iconsPerPage' => 4000,
                        // default 100, how many icons per/page to display
                    ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'fontawesome',
                    ),
                    'description' => esc_html__('Select icon from library.', 'onemax'),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'onemax'),
                    'param_name' => 'icon_openiconic',
                    'settings' => array(
                        'emptyIcon' => false,
                        // default true, display an "EMPTY" icon?
                        'type' => 'openiconic',
                        'iconsPerPage' => 4000,
                        // default 100, how many icons per/page to display
                    ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'openiconic',
                    ),
                    'description' => esc_html__('Select icon from library.', 'onemax'),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'onemax'),
                    'param_name' => 'icon_typicons',
                    'settings' => array(
                        'emptyIcon' => false,
                        // default true, display an "EMPTY" icon?
                        'type' => 'typicons',
                        'iconsPerPage' => 4000,
                        // default 100, how many icons per/page to display
                    ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'typicons',
                    ),
                    'description' => esc_html__('Select icon from library.', 'onemax'),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'onemax'),
                    'param_name' => 'icon_entypo',
                    'settings' => array(
                        'emptyIcon' => false,
                        // default true, display an "EMPTY" icon?
                        'type' => 'entypo',
                        'iconsPerPage' => 4000,
                        // default 100, how many icons per/page to display
                    ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'entypo',
                    ),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'onemax'),
                    'param_name' => 'icon_linecons',
                    'settings' => array(
                        'emptyIcon' => false,
                        // default true, display an "EMPTY" icon?
                        'type' => 'linecons',
                        'iconsPerPage' => 4000,
                        // default 100, how many icons per/page to display
                    ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'linecons',
                    ),
                    'description' => esc_html__('Select icon from library.', 'onemax'),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'onemax'),
                    'param_name' => 'icon_pixelicons',
                    'settings' => array(
                        'emptyIcon' => false,
                        // default true, display an "EMPTY" icon?
                        'type' => 'pixelicons',
                        'source' => $pixel_icons,
                    ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'pixelicons',
                    ),
                    'description' => esc_html__('Select icon from library.', 'onemax'),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__('Icon', 'onemax'),
                    'param_name' => 'icon_monosocial',
                    'value' => 'vc-mono vc-mono-fivehundredpx', // default value to backend editor admin_label
                    'settings' => array(
                        'emptyIcon' => false, // default true, display an "EMPTY" icon?
                        'type' => 'monosocial',
                        'iconsPerPage' => 4000, // default 100, how many icons per/page to display
                    ),
                    'dependency' => array(
                        'element' => 'icon_type',
                        'value' => 'monosocial',
                    ),
                    'description' => esc_html__('Select icon from library.', 'onemax'),
                ),
                array(
                    'type' => 'textarea_html',
                    'holder' => 'div',
                    'class' => 'messagebox_text',
                    'heading' => esc_html__('Message text', 'onemax'),
                    'param_name' => 'content',
                    'value' => __('<p>I am message box. Click edit button to change this text.</p>', 'onemax'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Loading Animation', 'onemax'),
                    'param_name' => 'ani',
                    'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                    'value' => array(
                        esc_html__('None','onemax') => 'none',
                        esc_html__('fade-up','onemax') => 'fade-up',
                        esc_html__('fade-down','onemax') => 'fade-down',
                        esc_html__('fade-left','onemax') => 'fade-left',
                        esc_html__('fade-right','onemax') => 'fade-right',
                        esc_html__('fade-up-right','onemax') => 'fade-up-right',
                        esc_html__('fade-up-left','onemax') => 'fade-up-left',
                        esc_html__('fade-down-right','onemax') => 'fade-down-right',
                        esc_html__('fade-down-left','onemax') => 'fade-down-left',
                        esc_html__('flip-up','onemax') => 'flip-up',
                        esc_html__('flip-down','onemax') => 'flip-down',
                        esc_html__('flip-left','onemax') => 'flip-left',
                        esc_html__('flip-right','onemax') => 'flip-right',
                        esc_html__('slide-up','onemax') => 'slide-up',
                        esc_html__('slide-down','onemax') => 'slide-down',
                        esc_html__('slide-left','onemax') => 'slide-left',
                        esc_html__('slide-right','onemax') => 'slide-right',
                        esc_html__('zoom-in','onemax') => 'zoom-in',
                        esc_html__('zoom-in-up','onemax') => 'zoom-in-up',
                        esc_html__('zoom-in-down','onemax') => 'zoom-in-down',
                        esc_html__('zoom-in-left','onemax') => 'zoom-in-left',
                         esc_html__('zoom-in-right','onemax') => 'zoom-in-right',
                        esc_html__('zoom-out','onemax') => 'zoom-out',
                         esc_html__('zoom-out-up','onemax') => 'zoom-out-up',
                        esc_html__('zoom-out-down','onemax') => 'zoom-out-down',
                         esc_html__('zoom-out-left','onemax') => 'zoom-out-left',
                        esc_html__('zoom-out-right','onemax') => 'zoom-out-right',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Animating Once', 'onemax'),
    'description' => esc_html__('If you choose false, no matter you scroll up or scroll down the element will keep on animating. The default value is ture which means the element will only animating once when it display.','onemax'),
                    'param_name' => 'aos_once',
                    'value' => array(
                        esc_html__('True','onemax') => 'true',
                        esc_html__('False','onemax') => 'false',
                    ),
                    'dependency' => array(
                       'element' => 'ani',
                       'value_not_equal_to' => array('none'),
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Delay', 'onemax'),
    'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                    'param_name' => 'aos_delay',
                    'value' => array(
                        '100' => '100',
                        '200' => '200',
                        '300' => '300',
                        '400' => '400',
                        '500' => '500',
                        '600' => '600',
                        '700' => '700',
                        '800' => '800',
                        '900' => '900',
                        '1000' => '1000',
                        '1100' => '1100',
                        '1200' => '1200',
                        '1300' => '1300',
                        '1400' => '1400',
                        '1500' => '1500',
                        '1600' => '1600',
                        '1700' => '1700',
                        '1800' => '1800',
                    ),
                    'dependency' => array(
                        'element' => 'ani',
                        'value_not_equal_to' => array('none'),
                    ),
                ),
            );
            $settings = array(
                'name' => esc_html__('Alert Box', 'onemax'),
                'base' => 'om_alert_box',
                'icon' => 'om_vc_icon_alert_box',
                'category' => esc_html__('onemax', 'onemax'),
                'description' => esc_html__('Notice box', 'onemax'),
                'params' => $params,
                'weight' => 42,
            );
            vc_map($settings);
        }
    }

    /**********************************add Blockquote to onemax*****************************************************************/
    add_shortcode('om_blockquote', 'onemax_blockquote_func');
    if(!function_exists('onemax_blockquote_func')){
        function onemax_blockquote_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_blockquote.php';

            return $output;
        }
    }
    if(!function_exists('onemax_blockquote_to_vc')){
        add_action('vc_before_init', 'onemax_blockquote_to_vc');
        function onemax_blockquote_to_vc()
        {
            $blockquote_params = array(
                array(
                    'type' => 'textarea',
                    'param_name' => 'txt',
                    'heading' => esc_html__('Content', 'onemax'),
                ),
            );
            $settings = array(
                'name' => esc_html__('Blockquote', 'onemax'),
                'base' => 'om_blockquote',
                'category' => esc_html__('onemax', 'onemax'),
                'description' => esc_html__('Blockquote Text.', 'onemax'),
                'params' => $blockquote_params,
                'icon' => 'om_vc_icon_blockquote',
                'weight' => 41,
            );
            vc_map($settings);
        }
    }
 /**********************************add Blog to onemax*****************************************************************/
    add_shortcode('om_blog', 'onemax_blog_func');
    if(!function_exists('onemax_blog_func')){
        function onemax_blog_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_blog.php';

            return $output;
        }
    }
    if(!function_exists('onemax_blog_to_vc')){
        add_action('vc_after_init', 'onemax_blog_to_vc');
        function onemax_blog_to_vc()
        {
            $blog_params = array(
                array(
                    'type' => 'textfield',
                    'param_name' => 'total',
                    'heading' => esc_html__('Total items', 'onemax'),
                ),
                array(
                    'type' => 'textfield',
                    'param_name' => 'cat',
                    'heading' => esc_html__('Category', 'onemax'),
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'order_by',
                    'value' => array(
                            'date' => 'date',
                            'title' => 'title',
                    ),
                    'heading' => esc_html__('Order By', 'onemax'),
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'order_style',
                    'value' => array(
                            'Ascending ' => 'ASC',
                            'Descending' => 'DESC',
                    ),
                    'heading' => esc_html__('Sort Order', 'onemax'),
                ),
                array(
                'type' => 'dropdown',
                'heading' => esc_html__('Image Hover Style', 'onemax'),
                'param_name' => 'h_ani',
                'value' => array(
                    esc_html__('None', 'onemax') => 'none',
                    esc_html__('effect-bubba', 'onemax') => 'effect-bubba',
                    esc_html__('effect-honey', 'onemax') => 'effect-honey',
                    esc_html__('effect-oscar', 'onemax') => 'effect-oscar',
                    esc_html__('effect-ming', 'onemax') => 'effect-ming',
                    esc_html__('effect-jazz', 'onemax') => 'effect-jazz',
                    esc_html__('effect-goliath', 'onemax') => 'effect-goliath',
                    esc_html__('effect-duke', 'onemax') => 'effect-duke',
                    esc_html__('effect-steve', 'onemax') => 'effect-steve',
                    esc_html__('effect-apollo', 'onemax') => 'effect-apollo',
                ),
                'description' => esc_html__('Select the hover style.', 'onemax'),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Gradient Color1', 'onemax'),
                'param_name' => 'gradient1',
                'edit_field_class' => 'vc_col-sm-4 vc_column',
                'std' => '',
                'dependency'=>array('element' => 'h_ani','value_not_equal_to' =>array('none')),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Gradient Color2', 'onemax'),
                'param_name' => 'gradient2',
                'edit_field_class' => 'vc_col-sm-4 vc_column',
                'std' => '',
                'dependency'=>array('element' => 'h_ani','value_not_equal_to' =>array('none')),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Gradient Color3', 'onemax'),
                'param_name' => 'gradient3',
                'edit_field_class' => 'vc_col-sm-4 vc_column',
                'std' => '',
                'dependency'=>array('element' => 'h_ani','value_not_equal_to' =>array('none')),
            ),
                array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Loading Animation', 'onemax'),
                            'param_name' => 'ani',
                            'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                            'value' => array(
                                esc_html__('None','onemax') => 'none',
                                esc_html__('pulse','onemax') => 'pulse',
                                esc_html__('flipInX','onemax') => 'flipInX',
                                esc_html__('fadeIn','onemax') => 'fadeIn',
                                esc_html__('fadeInUp','onemax') => 'fadeInUp',
                                esc_html__('fadeInDown','onemax') => 'fadeInDown',
                                esc_html__('fadeInLeft','onemax') => 'fadeInLeft',
                                esc_html__('fadeInRight','onemax') => 'fadeInRight',
                                esc_html__('fadeInUpBig','onemax') => 'fadeInUpBig',
                                esc_html__('fadeInDownBig','onemax') => 'fadeInDownBig',
                                esc_html__('fadeInLeftBig','onemax') => 'fadeInLeftBig',
                                esc_html__('fadeInRightBig','onemax') => 'fadeInRightBig',
                                esc_html__('bounceIn','onemax') => 'bounceIn',
                                esc_html__('bounceInUp','onemax') => 'bounceInUp',
                                esc_html__('bounceInDown','onemax') => 'bounceInDown',
                                esc_html__('bounceInLeft','onemax') => 'bounceInLeft',
                                esc_html__('bounceInRight','onemax') => 'bounceInRight',
                                esc_html__('rotateInUpLeft','onemax') => 'rotateInUpLeft',
                                esc_html__('rotateInDownLeft','onemax') => 'rotateInDownLeft',
                                esc_html__('rotateInUpRight','onemax') => 'rotateInUpRight',
                                esc_html__('rotateInDownRight','onemax') => 'rotateInDownRight',
                                esc_html__('lightSpeedRight','onemax') => 'lightSpeedRight',
                                esc_html__('lightSpeedLeft','onemax') => 'lightSpeedLeft',
                                 esc_html__('rollin','onemax') => 'rollin',
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Delay', 'onemax'),
    'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                            'param_name' => 'aos_delay',
                            'value' => array(
                        '100' => '100',
                        '200' => '200',
                        '300' => '300',
                        '400' => '400',
                        '500' => '500',
                        '600' => '600',
                        '700' => '700',
                        '800' => '800',
                        '900' => '900',
                        '1000' => '1000',
                        '1100' => '1100',
                        '1200' => '1200',
                        '1300' => '1300',
                        '1400' => '1400',
                        '1500' => '1500',
                        '1600' => '1600',
                        '1700' => '1700',
                        '1800' => '1800',
                            ),
                            'dependency' => array(
                                'element' => 'ani',
                                'value_not_equal_to' => array('none'),
                            ),
                        ),
            );
            $settings = array(
                'name' => esc_html__('Blog', 'onemax'),
                'base' => 'om_blog',
                'category' => esc_html__('onemax', 'onemax'),
                'description' => esc_html__('Blog.', 'onemax'),
                'params' => $blog_params,
                'icon' => 'om_vc_icon_blog',
                'weight' => 40,
            );
            vc_map($settings);
        }
    }
    /*************************    modify cta to onemax    *********************************************/
    require_once vc_path_dir('CONFIG_DIR', 'content/vc-custom-heading-element.php');
    if(!function_exists('onemax_modify_cta_to_vc')){
        add_action('vc_after_init', 'onemax_modify_cta_to_vc');
        function onemax_modify_cta_to_vc()
        {
            $h2_custom_heading = vc_map_integrate_shortcode(vc_custom_heading_element_params(), 'h2_', esc_html__('Heading', 'onemax'), array(
            'exclude' => array(
                'source',
                'text',
                'css',
            ),
        ), array(
            'element' => 'use_custom_fonts_h2',
            'value' => 'true',
        ));
                // This is needed to remove custom heading _tag and _align options.
            if (is_array($h2_custom_heading) && !empty($h2_custom_heading)) {
                foreach ($h2_custom_heading as $key => $param) {
                    if (is_array($param) && isset($param['type']) && 'font_container' === $param['type']) {
                        $h2_custom_heading[ $key ]['value'] = '';
                        if (isset($param['settings']) && is_array($param['settings']) && isset($param['settings']['fields'])) {
                            $sub_key = array_search('tag', $param['settings']['fields']);
                            if (false !== $sub_key) {
                                unset($h2_custom_heading[ $key ]['settings']['fields'][ $sub_key ]);
                            } elseif (isset($param['settings']['fields']['tag'])) {
                                unset($h2_custom_heading[ $key ]['settings']['fields']['tag']);
                            }
                            $sub_key = array_search('text_align', $param['settings']['fields']);
                            if (false !== $sub_key) {
                                unset($h2_custom_heading[ $key ]['settings']['fields'][ $sub_key ]);
                            } elseif (isset($param['settings']['fields']['text_align'])) {
                                unset($h2_custom_heading[ $key ]['settings']['fields']['text_align']);
                            }
                        }
                    }
                }
            }
            $h4_custom_heading = vc_map_integrate_shortcode(vc_custom_heading_element_params(), 'h4_', esc_html__('Subheading', 'onemax'), array(
            'exclude' => array(
                'source',
                'text',
                'css',
            ),
        ), array(
            'element' => 'use_custom_fonts_h4',
            'value' => 'true',
        ));

                // This is needed to remove custom heading _tag and _align options.
            if (is_array($h4_custom_heading) && !empty($h4_custom_heading)) {
                foreach ($h4_custom_heading as $key => $param) {
                    if (is_array($param) && isset($param['type']) && 'font_container' === $param['type']) {
                        $h4_custom_heading[ $key ]['value'] = '';
                        if (isset($param['settings']) && is_array($param['settings']) && isset($param['settings']['fields'])) {
                            $sub_key = array_search('tag', $param['settings']['fields']);
                            if (false !== $sub_key) {
                                unset($h4_custom_heading[ $key ]['settings']['fields'][ $sub_key ]);
                            } elseif (isset($param['settings']['fields']['tag'])) {
                                unset($h4_custom_heading[ $key ]['settings']['fields']['tag']);
                            }
                            $sub_key = array_search('text_align', $param['settings']['fields']);
                            if (false !== $sub_key) {
                                unset($h4_custom_heading[ $key ]['settings']['fields'][ $sub_key ]);
                            } elseif (isset($param['settings']['fields']['text_align'])) {
                                unset($h4_custom_heading[ $key ]['settings']['fields']['text_align']);
                            }
                        }
                    }
                }
            }
            $cta_setting = array(
            'category' => esc_html__('onemax', 'onemax'),
            'icon' => 'om_vc_icon_call_to_action',
            'description' => esc_html__('New version which supports bg image','onemax'),
            'weight' => 39,
            'params' => array_merge(array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Heading', 'onemax'),
            'admin_label' => true,
            'param_name' => 'h2',
            'value' => esc_html__('Hey! I am first heading line feel free to change me', 'onemax'),
            'description' => esc_html__('Enter text for heading line.', 'onemax'),
            'edit_field_class' => 'vc_col-sm-9',
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Use custom font?', 'onemax'),
            'param_name' => 'use_custom_fonts_h2',
            'description' => esc_html__('Enable Google fonts.', 'onemax'),
            'edit_field_class' => 'vc_col-sm-3',
        ),

    ), $h2_custom_heading, array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Subheading', 'onemax'),
                'param_name' => 'h4',
                'value' => '',
                'description' => esc_html__('Enter text for subheading line.', 'onemax'),
                'edit_field_class' => 'vc_col-sm-9',
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__('Use custom font?', 'onemax'),
                'param_name' => 'use_custom_fonts_h4',
                'description' => esc_html__('Enable custom font option.', 'onemax'),
                'edit_field_class' => 'vc_col-sm-3',
            ),
        ), $h4_custom_heading, array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Text alignment', 'onemax'),
                'param_name' => 'txt_align',
                'value' => getVcShared('text align'),
                // default left
                'description' => esc_html__('Select text alignment in "Call to Action" block.', 'onemax'),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Shape', 'onemax'),
                'param_name' => 'shape',
                'std' => 'rounded',
                'value' => array(
                    esc_html__('Square', 'onemax') => 'square',
                    esc_html__('Rounded', 'onemax') => 'rounded',
                    esc_html__('Round', 'onemax') => 'round',
                ),
                'description' => esc_html__('Select call to action shape.', 'onemax'),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Style', 'onemax'),
                'param_name' => 'style',
                'value' => array(
                    esc_html__('Classic', 'onemax') => 'classic',
                    esc_html__('Flat', 'onemax') => 'flat',
                    esc_html__('Outline', 'onemax') => 'outline',
                    esc_html__('3d', 'onemax') => '3d',
                    esc_html__('Background picture', 'onemax') => 'pic',
                    esc_html__('Custom', 'onemax') => 'custom',
                ),
                'std' => 'classic',
                'description' => esc_html__('Select call to action display style.', 'onemax'),
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Background picture', 'onemax'),
                'param_name' => 'bg_pic',
                'description' => esc_html__('Select custom background picture.', 'onemax'),
                'dependency' => array(
                    'element' => 'style',
                    'value' => array('pic'),
                ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background color', 'onemax'),
                'param_name' => 'custom_background',
                'description' => esc_html__('Select custom background color.', 'onemax'),
                'dependency' => array(
                    'element' => 'style',
                    'value' => array('custom'),
                ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Text color', 'onemax'),
                'param_name' => 'custom_text',
                'description' => esc_html__('Select custom text color.', 'onemax'),
                'dependency' => array(
                    'element' => 'style',
                    'value' => array('custom'),
                ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Color', 'onemax'),
                'param_name' => 'color',
                'value' => array(esc_html__('Classic', 'onemax') => 'classic') + getVcShared('colors-dashed') + array(esc_html__('Custom', 'onemax') => 'custom'),
                'std' => 'classic',
                'description' => esc_html__('Select color schema.', 'onemax'),
                'param_holder_class' => 'vc_colored-dropdown vc_cta3-colored-dropdown',
                'dependency' => array(
                    'element' => 'style',
                    'value_not_equal_to' => array('custom', 'pic'),
                ),
            ),
                                                array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Custom color', 'onemax'),
                'param_name' => 'custom_color',
                'description' => esc_html__('Select custom color.', 'onemax'),
                'dependency' => array(
                    'element' => 'color',
                    'value' => array('custom'),
                ),
            ),
            array(
                'type' => 'textarea_html',
                'heading' => esc_html__('Text', 'onemax'),
                'param_name' => 'content',
                'value' => esc_html__('I am promo text. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'onemax'),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Width', 'onemax'),
                'param_name' => 'el_width',
                'value' => array(
                    '100%' => '',
                    '90%' => 'xl',
                    '80%' => 'lg',
                    '70%' => 'md',
                    '60%' => 'sm',
                    '50%' => 'xs',
                ),
                'description' => esc_html__('Select call to action width (percentage).', 'onemax'),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Add button', 'onemax').'?',
                'description' => esc_html__('Add button for call to action.', 'onemax'),
                'param_name' => 'add_button',
                'value' => array(
                    esc_html__('No', 'onemax') => '',
                    esc_html__('Top', 'onemax') => 'top',
                    esc_html__('Bottom', 'onemax') => 'bottom',
                    esc_html__('Left', 'onemax') => 'left',
                    esc_html__('Right', 'onemax') => 'right',
                                                                                            esc_html__('OM button', 'onemax') => 'om_btn',
                ),
            ),
        ), vc_map_integrate_shortcode('vc_btn', 'btn_', esc_html__('Button', 'onemax'), array(
                'exclude' => array('css'),
            ), array(
                'element' => 'add_button',
                                                                        'value' => array('top', 'bottom', 'left', 'right'),
            )), vc_map_integrate_shortcode('om_btn', 'om_btn_', esc_html__('OM Button', 'onemax'), array(
                'exclude' => array('align', 'css', 'button_block', 'el_class'),
            ), array(
                'element' => 'add_button',
                                                                        'value' => array('om_btn'),
            )), array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Add icon?', 'onemax'),
                'description' => esc_html__('Add icon for call to action.', 'onemax'),
                'param_name' => 'add_icon',
                'value' => array(
                    esc_html__('No', 'onemax') => '',
                    esc_html__('Top', 'onemax') => 'top',
                    esc_html__('Bottom', 'onemax') => 'bottom',
                    esc_html__('Left', 'onemax') => 'left',
                    esc_html__('Right', 'onemax') => 'right',
                ),
            ),
            array(
                'type' => 'checkbox',
                'param_name' => 'i_on_border',
                'heading' => esc_html__('Place icon on border?', 'onemax'),
                'description' => esc_html__('Display icon on call to action element border.', 'onemax'),
                'group' => esc_html__('Icon', 'onemax'),
                'dependency' => array(
                    'element' => 'add_icon',
                    'not_empty' => true,
                ),
            ),
        ), vc_map_integrate_shortcode('vc_icon', 'i_', esc_html__('Icon', 'onemax'), array(
                'exclude' => array(
                    'align',
                    'css',
                ),
            ), array(
                'element' => 'add_icon',
                'not_empty' => true,
            )), array(
            /// cta3
            array(
                                                    'type' => 'dropdown',
                                                    'heading' => esc_html__('Loading Animation', 'onemax'),
                                                    'param_name' => 'ani',
                                                    'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                                                    'value' => array(
                                                        esc_html__('None','onemax') => 'none',
                                                        esc_html__('fade-up','onemax') => 'fade-up',
                                                        esc_html__('fade-down','onemax') => 'fade-down',
                                                        esc_html__('fade-left','onemax') => 'fade-left',
                                                        esc_html__('fade-right','onemax') => 'fade-right',
                                                        esc_html__('fade-up-right','onemax') => 'fade-up-right',
                                                        esc_html__('fade-up-left','onemax') => 'fade-up-left',
                                                        esc_html__('fade-down-right','onemax') => 'fade-down-right',
                                                        esc_html__('fade-down-left','onemax') => 'fade-down-left',
                                                        esc_html__('flip-up','onemax') => 'flip-up',
                                                        esc_html__('flip-down','onemax') => 'flip-down',
                                                        esc_html__('flip-left','onemax') => 'flip-left',
                                                        esc_html__('flip-right','onemax') => 'flip-right',
                                                        esc_html__('slide-up','onemax') => 'slide-up',
                                                        esc_html__('slide-down','onemax') => 'slide-down',
                                                        esc_html__('slide-left','onemax') => 'slide-left',
                                                        esc_html__('slide-right','onemax') => 'slide-right',
                                                        esc_html__('zoom-in','onemax') => 'zoom-in',
                                                        esc_html__('zoom-in-up','onemax') => 'zoom-in-up',
                                                        esc_html__('zoom-in-down','onemax') => 'zoom-in-down',
                                                        esc_html__('zoom-in-left','onemax') => 'zoom-in-left',
                                                         esc_html__('zoom-in-right','onemax') => 'zoom-in-right',
                                                        esc_html__('zoom-out','onemax') => 'zoom-out',
                                                         esc_html__('zoom-out-up','onemax') => 'zoom-out-up',
                                                        esc_html__('zoom-out-down','onemax') => 'zoom-out-down',
                                                         esc_html__('zoom-out-left','onemax') => 'zoom-out-left',
                                                        esc_html__('zoom-out-right','onemax') => 'zoom-out-right',
                                                    ),
                                                ),
                                        array(
                                                    'type' => 'dropdown',
                                                    'heading' => esc_html__('Animating Once', 'onemax'),
    'description' => esc_html__('If you choose false, no matter you scroll up or scroll down the element will keep on animating. The default value is ture which means the element will only animating once when it display.','onemax'),
                                                    'param_name' => 'aos_once',
                                                    'value' => array(
                                                        'True' => 'true',
                                                        'False' => 'false',
                                                    ),
                                            'dependency' => array(
                'element' => 'ani',
                'value_not_equal_to' => array(
                    'none',
                ),
            ),
                                                ),
                                        array(
                                                    'type' => 'dropdown',
                                                    'heading' => esc_html__('Delay', 'onemax'),
    'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                                                    'param_name' => 'aos_delay',
                                                    'value' => array(
                        '100' => '100',
                        '200' => '200',
                        '300' => '300',
                        '400' => '400',
                        '500' => '500',
                        '600' => '600',
                        '700' => '700',
                        '800' => '800',
                        '900' => '900',
                        '1000' => '1000',
                        '1100' => '1100',
                        '1200' => '1200',
                        '1300' => '1300',
                        '1400' => '1400',
                        '1500' => '1500',
                        '1600' => '1600',
                        '1700' => '1700',
                        '1800' => '1800',
                                                    ),
                                            'dependency' => array(
                'element' => 'ani',
                'value_not_equal_to' => array(
                    'none',
                ),
            ),
                                                ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra class name', 'onemax'),
                'param_name' => 'el_class',
                'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'onemax'),
            ),
            array(
                'type' => 'css_editor',
                'heading' => esc_html__('CSS box', 'onemax'),
                'param_name' => 'css',
                'group' => esc_html__('Design Options', 'onemax'),
            ),
        )), );
            vc_map_update('vc_cta', $cta_setting);
            class WPBakeryShortCode_VC_Cta_new extends WPBakeryShortCode
            {
                protected $template_vars = array();

                public function buildTemplate($atts, $content)
                {
                    $output = array();
                    $inline_css = array();

                    $main_wrapper_classes = array('vc_cta3');
                    $container_classes = array();
                    if (!empty($atts['el_class'])) {
                        $main_wrapper_classes[] = $atts['el_class'];
                    }
                    if (!empty($atts['style'])) {
                        $main_wrapper_classes[] = 'vc_cta3-style-'.$atts['style'];
                    }
                    if (!empty($atts['shape'])) {
                        $main_wrapper_classes[] = 'vc_cta3-shape-'.$atts['shape'];
                    }
                    if (!empty($atts['txt_align'])) {
                        $main_wrapper_classes[] = 'vc_cta3-align-'.$atts['txt_align'];
                    }
                    if (!empty($atts['color']) && !(isset($atts['style']) && 'custom' === $atts['style'])) {
                        $main_wrapper_classes[] = 'vc_cta3-color-'.$atts['color'];
                    }
                    if (isset($atts['style']) && 'custom' === $atts['style']) {
                        if (!empty($atts['custom_background'])) {
                            $inline_css[] = vc_get_css_color('background-color', $atts['custom_background']);
                        }
                    }
                    if (!empty($atts['i_on_border'])) {
                        $main_wrapper_classes[] = 'vc_cta3-icons-on-border';
                    }
                    if (!empty($atts['i_size'])) {
                        $main_wrapper_classes[] = 'vc_cta3-icon-size-'.$atts['i_size'];
                    }
                    if (!empty($atts['i_background_style'])) {
                        $main_wrapper_classes[] = 'vc_cta3-icons-in-box';
                    }

                    if (!empty($atts['el_width'])) {
                        $container_classes[] = 'vc_cta3-size-'.$atts['el_width'];
                    }

                    if (!empty($atts['add_icon'])) {
                        $output[ 'icons-'.$atts['add_icon'] ] = $this->getVcIcon($atts);
                        $main_wrapper_classes[] = 'vc_cta3-icons-'.$atts['add_icon'];
                    }

                    if (!empty($atts['add_button'])) {
                        if ($atts['add_button'] === 'om_btn') {
                            $output[ 'actions-'.$atts['add_button'] ] = $this->getOMButton($atts);
                            $main_wrapper_classes[] = 'vc_cta3-actions-bottom';
                        } else {
                            $output[ 'actions-'.$atts['add_button'] ] = $this->getButton($atts);
                            $main_wrapper_classes[] = 'vc_cta3-actions-'.$atts['add_button'];
                        }
                    }
    //
    //      if ( ! empty( $atts['css_animation'] ) ) {
    //          $main_wrapper_classes[] = $this->getCSSAnimation( $atts['css_animation'] );
    //      }

            if (!empty($atts['css'])) {
                $main_wrapper_classes[] = vc_shortcode_custom_css_class($atts['css']);
            }

                    $output['content'] = wpb_js_remove_wpautop($content, true);
                    $output['heading1'] = $this->getHeading('h2', $atts);
                    $output['heading2'] = $this->getHeading('h4', $atts);
                    $output['css-class'] = $main_wrapper_classes;
                    $output['container-class'] = $container_classes;
                    $output['inline-css'] = $inline_css;
                    $this->template_vars = $output;
                }

                public function getHeading($tag, $atts)
                {
                    $inline_css = '';
                    if (isset($atts[ $tag ]) && '' !== trim($atts[ $tag ])) {
                        if (isset($atts[ 'use_custom_fonts_'.$tag ]) && 'true' === $atts[ 'use_custom_fonts_'.$tag ]) {
                            $custom_heading = visual_composer()->getShortCode('vc_custom_heading');
                            $data = vc_map_integrate_parse_atts($this->shortcode, 'vc_custom_heading', $atts, $tag.'_');
                            $data['font_container'] = implode('|', array_filter(array(
                        'tag:'.$tag,
                        $data['font_container'],
                    )));
                            $data['text'] = $atts[ $tag ]; // provide text to shortcode

                    return $custom_heading->render(array_filter($data));
                        } else {
                            if (isset($atts['style']) && 'custom' === $atts['style']) {
                                if (!empty($atts['custom_text'])) {
                                    $inline_css[] = vc_get_css_color('color', $atts['custom_text']);
                                }
                            }
                            if (!empty($inline_css)) {
                                $inline_css = ' style="'.implode('', $inline_css).'"';
                            }

                            return '<'.$tag.$inline_css.'>'.$atts[ $tag ].'</'.$tag.'>';
                        }
                    }

                    return '';
                }

                public function getButton($atts)
                {
                    $data = vc_map_integrate_parse_atts($this->shortcode, 'vc_btn', $atts, 'btn_');
                    if ($data) {
                        $btn = visual_composer()->getShortCode('vc_btn');
                        if (is_object($btn)) {
                            return '<div class="vc_cta3-actions">'.$btn->render(array_filter($data)).'</div>';
                        }
                    }

                    return '';
                }

                public function getOMButton($atts)
                {
                    $data = vc_map_integrate_parse_atts($this->shortcode, 'om_btn', $atts, 'om_btn_');
                    $title = $link = $custom_background = $custom_text = $shape = $size = $align = $button_block = $css_animation = $hover_color = $hover_text = $add_border = $border_color = $hover_border = $el_class = $css = $ani_css =
    $btn_html = $text = $a_href = $a_title = $a_target = $output = '';
                    $attributes = array();
                    $styles = array();
                    extract($data);
    //parse link
    $link = ('||' === $link) ? '' : $link;
                    $link = vc_build_link($link);
                    $use_link = false;
                    if (strlen($link['url']) > 0) {
                        $use_link = true;
                        $a_href = $link['url'];
                        $a_title = $link['title'];
                        $a_target = $link['target'];
                    }

                    $button_classes = array(
        //'vc_btn3',
                          'button',
        'button--'.$size,
        'button--'.$shape,
        'vc_btn3-style-custom',
    );
                    if ('true' === $add_border) {
                        $button_classes[] = 'border--'.$shape;
                    }
                    if ($shape == 'retangle') {
                        $shape = '0px';
                    } elseif ($shape == 'round') {
                        $shape = '15px';
                    } elseif ($shape == 'default') {
                        $shape = '5px';
                    } else {
                        $shape = '50px';
                    }

                    if ($size == 'huge') {
                        $size = '80px';
                    } elseif ($size == 'large') {
                        $size = '60px';
                    } elseif ($size == 'standard') {
                        $size = '50px';
                    } else {
                        $size = '35px';
                    }

                    $wrapper_classes = array(
        'vc_btn3-container',
        'vc_btn3-'.$align,
    );
                    $text = $button_html = $title;
                    if ('' === trim($title)) {
                        $button_classes[] = 'vc_btn3-o-empty';
                        $button_html = '<span class="vc_btn3-placeholder">&nbsp;</span>';
                    }
                    if ('true' === $button_block && 'inline' !== $align) {
                        $button_classes[] = 'vc_btn3-block';
                    }

                    $js_over = "this.style.backgroundColor='{$hover_color}';";
                    $js_out = "this.style.backgroundColor='{$custom_background}';";
                    $hover_color_no = substr($hover_color, 1);
                    $hover_text_no = substr($hover_text, 1);
    //the button css_animation
    if ($css_animation == 'winona') {
        $css_animation = 'button--winona';
        $button_html = '<span>'.$button_html.'</span>';
        $ani_css = "<style>.button--winona--$hover_text_no::after {color:$hover_text;}
                            .button--winona--$size::after,.button--winona--$size > span {
                            line-height:$size;</style>";
        $button_classes[] = "button--winona--$hover_text_no";
        $button_classes[] = "button--winona--$size";
    } elseif ($css_animation == 'ujarak') {
        $js_over = "this.style.color='{$hover_text}';";
        $js_out = "this.style.color='{$custom_text}';";
        $css_animation = 'button--ujarak';
        $button_html = '<span>'.$button_html.'</span>';
        $ani_css = "<style>.button--ujarak--$hover_color_no--$shape::before {
        content:'';
        position:absolute;
        top:0;
        left:0;
        width:100%;
        height:100%;
        background:$hover_color;border-radius:$shape;
        z-index:-1;
        opacity:0;
        -webkit-transform:scale3d(0.7,1,1);
        transform:scale3d(0.7,1,1);
        -webkit-transition:-webkit-transform 0.4s,opacity 0.4s;
        transition:transform 0.4s,opacity 0.4s;
        -webkit-transition-timing-function:cubic-bezier(0.2,1,0.3,1);
        transition-timing-function:cubic-bezier(0.2,1,0.3,1);}</style>";
        $button_classes[] = "button--ujarak--$hover_color_no--$shape";
    } elseif ($css_animation == 'wayra') {
        $js_over = "this.style.color='{$hover_text}';";
        $js_out = "this.style.color='{$custom_text}';";
        $css_animation = 'button--wayra';
        $button_html = '<span>'.$button_html.'</span>';
        $ani_css = "<style>.button--wayra--$hover_color_no:hover::before {
        opacity:1;
        background-color:$hover_color;
        -webkit-transform:rotate3d(0,0,1,0deg);
        transform:rotate3d(0,0,1,0deg);
        -webkit-transition-timing-function:cubic-bezier(0.2,1,0.3,1);
        transition-timing-function:cubic-bezier(0.2,1,0.3,1);</style>";
        $button_classes[] = "button--wayra--$hover_color_no";
    } elseif ($css_animation == 'rayen') {
        $js_over = $js_out = '';
        $css_animation = 'button--rayen button--rayen--'.$size;
        $button_html = '<span>'.$button_html.'</span>';
        $ani_css = "<style>.button--rayen--$hover_color_no--$hover_text_no::before {
        content:attr(data-text);
        position:absolute;
        top:0;
        left:0;
        width:100%;
        height:100%;
        background:$hover_color;color:$hover_text;
        -webkit-transform:translate3d(-100%,0,0);
        transform:translate3d(-100%,0,0);}</style>";
        $button_classes[] = "button--rayen--$hover_color_no--$hover_text_no";
    } elseif ($css_animation == 'nina') {
        $ani_css = "<style>.button--nina--$hover_text_no:hover > span {color:$hover_text;}</style>";
        $css_animation = 'button--nina button--nina--'.$size;
        for ($i = 0;$i < strlen($button_html);++$i) {
            $char = mb_substr($button_html, $i, 1);
            if ($char == ' ') {
                $btn_html .= ' ';
            } else {
                $btn_html .= '<span>'.$char.'</span>';
            }
        }
        $button_html = $btn_html;
        $button_classes[] = "button--nina--$hover_text_no";
    } else {
        $js_over = $js_out = '';
        $css_animation = '';
        $hover_color = '';
    }
                    if ('true' === $add_border) {
                        $js_over .= "this.style.borderColor='{$hover_border}';";
                        $js_out .= "this.style.borderColor='{$border_color}';";
                    }

                    $js_css = "onmouseover=$js_over onmouseout=$js_out";

                    $button_classes[] = $css_animation;

                    if ($custom_background) {
                        $styles[] = vc_get_css_color('background-color', $custom_background);
                    }

                    if ($custom_text) {
                        $styles[] = vc_get_css_color('color', $custom_text);
                    }
                    if ($border_color) {
                        $styles[] = vc_get_css_color('border-color', $border_color);
                    }
                    if (!$custom_background && !$custom_text) {
                        $button_classes[] = 'vc_btn3-color-grey';
                    }

                    if ($styles) {
                        $attributes[] = 'style="'.implode(' ', $styles).'"';
                    }

                    $class_to_filter = implode(' ', array_filter($wrapper_classes));
                    $class_to_filter .= vc_shortcode_custom_css_class($css, ' ');
                    $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, 'om_btn',  $atts);

                    if ($button_classes) {
                        $button_classes = esc_attr(apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode(' ', array_filter($button_classes)),  'om_btn', $atts));
                        $attributes[] = 'class="'.trim($button_classes).'"';
                    }

    //the link info
    $link_arr = array();
                    if ($use_link) {
                        $link_arr[] = 'href="'.esc_url(trim($a_href)).'"';
                        $link_arr[] = 'title="'.esc_attr(trim($a_title)).'"';
                        if (!empty($a_target)) {
                            $link_arr[] = 'target="'.esc_attr(trim($a_target)).'"';
                        }
                    }
                    $link_arr = implode(' ', $link_arr);
                    $attributes = implode(' ', $attributes);
                    $output .= $ani_css;
                    $output .= '<div class='.trim(esc_attr($css_class)).'>';
                    if ($use_link) {
                        $output .= "<a style='text-decoration:none;' $link_arr><button $attributes data-text='$text' $js_css>$button_html </button></a>";
                    } else {
                        $output .= "<button $attributes data-text='$text' $js_css>$button_html </button>";
                    }
                    $output .= '</div>';

                    return '<div class="vc_cta3-actions" style="margin:auto;display:table;">'.$output.'</div>';
    //      if ( $data ) {
    //          $btn = visual_composer()->getShortCode( 'om_btn' );return  $data;
    //          if ( is_object( $btn ) ) {
    //              return '<div class="vc_cta3-actions">' . $btn->render( array_filter( $data ) ) . '</div>';
    //          }
    //      }

            return '';
                }

                public function getVcIcon($atts)
                {
                    if (empty($atts['i_type'])) {
                        $atts['i_type'] = 'fontawesome';
                    }
                    $data = vc_map_integrate_parse_atts($this->shortcode, 'vc_icon', $atts, 'i_');
                    if ($data) {
                        $icon = visual_composer()->getShortCode('vc_icon');
                        if (is_object($icon)) {
                            return '<div class="vc_cta3-icons">'.$icon->render(array_filter($data)).'</div>';
                        }
                    }

                    return '';
                }

                public function getTemplateVariable($string)
                {
                    if (is_array($this->template_vars) && isset($this->template_vars[ $string ])) {
                        return $this->template_vars[ $string ];
                    }

                    return '';
                }
            }
        }
    }
    /**********************************add Clients to onemax*****************************************************************/
    add_shortcode('om_clients', 'onemax_clients_func');
    if(!function_exists('onemax_clients_func')){
        function onemax_clients_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_clients.php';

            return $output;
        }
    }
    if(!function_exists('onemax_clients_to_vc')){
        add_action('vc_before_init', 'onemax_clients_to_vc');
        function onemax_clients_to_vc()
        {
            $clients_params = array(
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Display Number', 'onemax'),
                                'param_name' => 'dis_num',
                                'description' => esc_html__('Select how many client logo you want to display.', 'onemax'),
                                'value' => array(
                                    '2' => '2',
                                    '3' => '3',
                                    '4' => '4',
                                    '5' => '5',
                                    '6' => '6',
                                ),
                                'std' => '6',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 't_num',
                                'heading' => esc_html__('Total Number', 'onemax'),
                                'description' => esc_html__('If the total nuber equal dispaly number, the selector will not be displayer.', 'onemax'),
                                'std' => '6',
                            ),
                array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Need selector?', 'onemax'),
                                'param_name' => 'sel',
                                'description' => esc_html__('If you need a left to right selector please choose yes.', 'onemax'),
                                'value' => array(
                                    esc_html__('yes','onemax') => 'yes',
                                    esc_html__('no','onemax') => 'no',
                                ),
                                'std' => 'yes',
                            ),
                array(
                                'type' => 'colorpicker',
                                'param_name' => 'sel_color',
                                'heading' => esc_html__('Selector Color', 'onemax'),
                                'std' => '#009688',
                                'dependency' => array(
                                        'element' => 'sel',
                                        'value' => 'yes',
                                ),
                            ),
                array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Loading Animation', 'onemax'),
                            'param_name' => 'ani',
                            'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                            'value' => array(
                                esc_html__('None','onemax') => 'none',
                                esc_html__('pulse','onemax') => 'pulse',
                                esc_html__('flipInX','onemax') => 'flipInX',
                                esc_html__('fadeIn','onemax') => 'fadeIn',
                                esc_html__('fadeInUp','onemax') => 'fadeInUp',
                                esc_html__('fadeInDown','onemax') => 'fadeInDown',
                                esc_html__('fadeInLeft','onemax') => 'fadeInLeft',
                                esc_html__('fadeInRight','onemax') => 'fadeInRight',
                                esc_html__('fadeInUpBig','onemax') => 'fadeInUpBig',
                                esc_html__('fadeInDownBig','onemax') => 'fadeInDownBig',
                                esc_html__('fadeInLeftBig','onemax') => 'fadeInLeftBig',
                                esc_html__('fadeInRightBig','onemax') => 'fadeInRightBig',
                                esc_html__('bounceIn','onemax') => 'bounceIn',
                                esc_html__('bounceInUp','onemax') => 'bounceInUp',
                                esc_html__('bounceInDown','onemax') => 'bounceInDown',
                                esc_html__('bounceInLeft','onemax') => 'bounceInLeft',
                                esc_html__('bounceInRight','onemax') => 'bounceInRight',
                                esc_html__('rotateInUpLeft','onemax') => 'rotateInUpLeft',
                                esc_html__('rotateInDownLeft','onemax') => 'rotateInDownLeft',
                                esc_html__('rotateInUpRight','onemax') => 'rotateInUpRight',
                                esc_html__('rotateInDownRight','onemax') => 'rotateInDownRight',
                                esc_html__('lightSpeedRight','onemax') => 'lightSpeedRight',
                                esc_html__('lightSpeedLeft','onemax') => 'lightSpeedLeft',
                                 esc_html__('rollin','onemax') => 'rollin',
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Delay', 'onemax'),
    'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                            'param_name' => 'aos_delay',
                            'value' => array(
                        '100' => '100',
                        '200' => '200',
                        '300' => '300',
                        '400' => '400',
                        '500' => '500',
                        '600' => '600',
                        '700' => '700',
                        '800' => '800',
                        '900' => '900',
                        '1000' => '1000',
                        '1100' => '1100',
                        '1200' => '1200',
                        '1300' => '1300',
                        '1400' => '1400',
                        '1500' => '1500',
                        '1600' => '1600',
                        '1700' => '1700',
                        '1800' => '1800',
                            ),
                            'dependency' => array(
                                'element' => 'ani',
                                'value_not_equal_to' => array('none'),
                            ),
                        ),
                );
            $settings = array(
                    'name' => esc_html__('Clients', 'onemax'),
                    'base' => 'om_clients',
                    'category' => esc_html__('onemax', 'onemax'),
                    'description' => esc_html__('Show Clients logo', 'onemax'),
                    'params' => $clients_params,
                    'icon' => 'om_vc_icon_clients',
                    'weight' => 38,
                );
            vc_map($settings);
        }
    }
     /**********************************add counters to onemax*****************************************************************/
    add_shortcode('om_counters', 'onemax_counters_func');
    if(!function_exists('onemax_counters_func')){
        function onemax_counters_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_counters.php';

            return $output;
        }
    }
    if(!function_exists('onemax_counters_to_vc')){
        add_action('vc_before_init', 'onemax_counters_to_vc');
        function onemax_counters_to_vc()
        {
            $counters_params = array(
                        array(
                                'type' => 'textfield',
                                'param_name' => 'counter_name',
                                'heading' => esc_html__('Counter Name', 'onemax'),
                                'description' => esc_html__('The counter name, Upper-case characters is suggested.', 'onemax'),

                        ),
                        array(
                                'type' => 'textfield',
                                'param_name' => 'number',
                                'heading' => esc_html__('Counter Number', 'onemax'),
                                'description' => esc_html__('The counter value.', 'onemax'),
                        ),
                        array(
                                'type' => 'colorpicker',
                                'param_name' => 'name_color',
                                'heading' => esc_html__('Name Color', 'onemax'),
                                'edit_field_class' => 'vc_col-sm-6 vc_column',
                        ),
                        array(
                                'type' => 'colorpicker',
                                'param_name' => 'num_color',
                                'heading' => esc_html__('Number Color', 'onemax'),
                                'edit_field_class' => 'vc_col-sm-6 vc_column',
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Alignment', 'onemax'),
                            'param_name' => 'alignment',
                            'value' => array(
                                esc_html__('Center','onemax') => 'center',
                                esc_html__('Left','onemax') => 'left',
                                esc_html__('Right','onemax') => 'right',
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Loading Animation', 'onemax'),
                            'param_name' => 'ani',
                            'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                            'value' => array(
                                esc_html__('None','onemax') => 'none',
                                esc_html__('fade-up','onemax') => 'fade-up',
                                esc_html__('fade-down','onemax') => 'fade-down',
                                esc_html__('fade-left','onemax') => 'fade-left',
                                esc_html__('fade-right','onemax') => 'fade-right',
                                esc_html__('fade-up-right','onemax') => 'fade-up-right',
                                esc_html__('fade-up-left','onemax') => 'fade-up-left',
                                esc_html__('fade-down-right','onemax') => 'fade-down-right',
                                esc_html__('fade-down-left','onemax') => 'fade-down-left',
                                esc_html__('flip-up','onemax') => 'flip-up',
                                esc_html__('flip-down','onemax') => 'flip-down',
                                esc_html__('flip-left','onemax') => 'flip-left',
                                esc_html__('flip-right','onemax') => 'flip-right',
                                esc_html__('slide-up','onemax') => 'slide-up',
                                esc_html__('slide-down','onemax') => 'slide-down',
                                esc_html__('slide-left','onemax') => 'slide-left',
                                esc_html__('slide-right','onemax') => 'slide-right',
                                esc_html__('zoom-in','onemax') => 'zoom-in',
                                esc_html__('zoom-in-up','onemax') => 'zoom-in-up',
                                esc_html__('zoom-in-down','onemax') => 'zoom-in-down',
                                esc_html__('zoom-in-left','onemax') => 'zoom-in-left',
                                 esc_html__('zoom-in-right','onemax') => 'zoom-in-right',
                                esc_html__('zoom-out','onemax') => 'zoom-out',
                                 esc_html__('zoom-out-up','onemax') => 'zoom-out-up',
                                esc_html__('zoom-out-down','onemax') => 'zoom-out-down',
                                 esc_html__('zoom-out-left','onemax') => 'zoom-out-left',
                                esc_html__('zoom-out-right','onemax') => 'zoom-out-right',
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Animating Once', 'onemax'),
                            'description' => esc_html__('If you choose false, no matter you scroll up or scroll down the element will keep on animating. The default value is ture which means the element will only animating once when it display.','onemax'),
                            'param_name' => 'aos_once',
                            'value' => array(
                                esc_html__('True','onemax') => 'true',
                                esc_html__('False','onemax') => 'false',
                            ),
                            'dependency' => array(
                                'element' => 'ani',
                                'value_not_equal_to' => array('none',),
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Delay', 'onemax'),
                            'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                            'param_name' => 'aos_delay',
                            'value' => array(
                                '100' => '100',
                                '200' => '200',
                                '300' => '300',
                                '400' => '400',
                                '500' => '500',
                                '600' => '600',
                                '700' => '700',
                                '800' => '800',
                                '900' => '900',
                                '1000' => '1000',
                                '1100' => '1100',
                                '1200' => '1200',
                                '1300' => '1300',
                                '1400' => '1400',
                                '1500' => '1500',
                                '1600' => '1600',
                                '1700' => '1700',
                                '1800' => '1800',
                            ),
                            'dependency' => array(
                                'element' => 'ani',
                                'value_not_equal_to' => array('none',),
                            ),
                        ),
                        array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Extra class name', 'onemax'),
                                'param_name' => 'el_class',
                                'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'onemax'),
                        ),
                        array(
                                'type' => 'css_editor',
                                'heading' => esc_html__('CSS box', 'onemax'),
                                'param_name' => 'css',
                                'group' => esc_html__('Design Options', 'onemax'),
                        ),
                );
            $settings = array(
                    'name' => esc_html__('Counters', 'onemax'),
                    'base' => 'om_counters',
                    'category' => esc_html__('onemax', 'onemax'),
                    'description' => esc_html__('Create the counters', 'onemax'),
                    'params' => $counters_params,
                    'icon' => 'om_vc_icon_counters',
                    'weight' => 37,
                );
            vc_map($settings);
        }
    }
    /**********************************add countdown to onemax*****************************************************************/
    add_shortcode('om_countdown', 'onemax_countdown_func');
    if(!function_exists('onemax_countdown_func')){
        function onemax_countdown_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_countdown.php';

            return $output;
        }
    }
    if(!function_exists('onemax_countdown_to_vc')){
        add_action('vc_before_init', 'onemax_countdown_to_vc');
        function onemax_countdown_to_vc()
        {
            $countdown_params = array(
                        array(
                                'type' => 'textfield',
                                'param_name' => 'due_date',
                                'heading' => esc_html__('Due Date', 'onemax'),
                                'description' => esc_html__('The due date format is "month/day/year hour:minute:second".', 'onemax'),
                                'std' => '12/27/2018 00:00:00',
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Alignment', 'onemax'),
                            'param_name' => 'alignment',
                            'value' => array(
                                esc_html__('Center','onemax') => 'center',
                                esc_html__('Left','onemax') => 'left',
                                esc_html__('Right','onemax') => 'right',
                            ),
                        ),
                        array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Extra class name', 'onemax'),
                                'param_name' => 'el_class',
                                'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'onemax'),
                        ),
                        array(
                                'type' => 'css_editor',
                                'heading' => esc_html__('CSS box', 'onemax'),
                                'param_name' => 'css',
                                'group' => esc_html__('Design Options', 'onemax'),
                        ),
                );
            $settings = array(
                    'name' => esc_html__('Countdown', 'onemax'),
                    'base' => 'om_countdown',
                    'category' => esc_html__('onemax', 'onemax'),
                    'description' => esc_html__('Create the countdown', 'onemax'),
                    'params' => $countdown_params,
                    'icon' => 'om_vc_icon_count_down',
                    'weight' => 36,
                );
            vc_map($settings);
        }
    }
/************************************modify custom heading to onemax***********************************/
    $custom_heading_params = array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Text source', 'onemax' ),
            'param_name' => 'source',
            'value' => array(
                esc_html__( 'Custom text', 'onemax' ) => '',
                esc_html__( 'Post or Page Title', 'onemax' ) => 'post_title',
            ),
            'std' => '',
            'description' => esc_html__( 'Select text source.', 'onemax' ),
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__( 'Text', 'onemax' ),
            'param_name' => 'text',
            'admin_label' => true,
            'value' => esc_html__( 'This is custom heading element', 'onemax' ),
            'description' => esc_html__( 'Note: If you are using non-latin characters be sure to activate them under Settings/Visual Composer/General Settings.', 'onemax' ),
            'dependency' => array(
                'element' => 'source',
                'is_empty' => true,
            ),
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__( 'URL (Link)', 'onemax' ),
            'param_name' => 'link',
            'description' => esc_html__( 'Add link to custom heading.', 'onemax' ),
            // compatible with btn2 and converted from href{btn1}
        ),
        array(
            'type' => 'font_container',
            'param_name' => 'font_container',
            'value' => 'tag:h2|text_align:left',
            'settings' => array(
                'fields' => array(
                    'tag' => 'h2', // default value h2
                    'text_align',
                    'font_size',
                    'line_height',
                    'color',
                    'tag_description' => esc_html__( 'Select element tag.', 'onemax' ),
                    'text_align_description' => esc_html__( 'Select text alignment.', 'onemax' ),
                    'font_size_description' => esc_html__( 'Enter font size.', 'onemax' ),
                    'line_height_description' => esc_html__( 'Enter line height.', 'onemax' ),
                    'color_description' => esc_html__( 'Select heading color.', 'onemax' ),
                ),
            ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Use theme default font family?', 'onemax' ),
            'param_name' => 'use_theme_fonts',
            'value' => array( esc_html__( 'Yes', 'onemax' ) => 'yes' ),
            'description' => esc_html__( 'Use font family from the theme.', 'onemax' ),
        ),
        array(
            'type' => 'google_fonts',
            'param_name' => 'google_fonts',
            'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
            'settings' => array(
                'fields' => array(
                    'font_family_description' => esc_html__( 'Select font family.', 'onemax' ),
                    'font_style_description' => esc_html__( 'Select font styling.', 'onemax' ),
                ),
            ),
            'dependency' => array(
                'element' => 'use_theme_fonts',
                'value_not_equal_to' => 'yes',
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Loading Animation', 'onemax'),
            'param_name' => 'ani',
            'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
            'value' => array(
                esc_html__('None','onemax') => 'none',
                esc_html__('fade-up','onemax') => 'fade-up',
                esc_html__('fade-down','onemax') => 'fade-down',
                esc_html__('fade-left','onemax') => 'fade-left',
                esc_html__('fade-right','onemax') => 'fade-right',
                esc_html__('fade-up-right','onemax') => 'fade-up-right',
                esc_html__('fade-up-left','onemax') => 'fade-up-left',
                esc_html__('fade-down-right','onemax') => 'fade-down-right',
                esc_html__('fade-down-left','onemax') => 'fade-down-left',
                esc_html__('flip-up','onemax') => 'flip-up',
                esc_html__('flip-down','onemax') => 'flip-down',
                esc_html__('flip-left','onemax') => 'flip-left',
                esc_html__('flip-right','onemax') => 'flip-right',
                esc_html__('slide-up' ,'onemax')=> 'slide-up',
                esc_html__('slide-down','onemax') => 'slide-down',
                esc_html__('slide-left','onemax') => 'slide-left',
                esc_html__('slide-right','onemax') => 'slide-right',
                esc_html__('zoom-in','onemax') => 'zoom-in',
                esc_html__('zoom-in-up','onemax') => 'zoom-in-up',
                esc_html__('zoom-in-down','onemax') => 'zoom-in-down',
                esc_html__('zoom-in-left','onemax') => 'zoom-in-left',
                 esc_html__('zoom-in-right','onemax') => 'zoom-in-right',
                esc_html__('zoom-out','onemax') => 'zoom-out',
                 esc_html__('zoom-out-up','onemax') => 'zoom-out-up',
                esc_html__('zoom-out-down','onemax') => 'zoom-out-down',
                 esc_html__('zoom-out-left','onemax') => 'zoom-out-left',
                esc_html__('zoom-out-right','onemax') => 'zoom-out-right',
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Animating Once', 'onemax'),
            'description' => esc_html__('If you choose false, no matter you scroll up or scroll down the element will keep on animating. The default value is ture which means the element will only animating once when it display.','onemax'),
            'param_name' => 'aos_once',
            'value' => array(
                esc_html__('True' ,'onemax')=> 'true',
                esc_html__('False','onemax') => 'false',
            ),
            'dependency' => array(
                   'element' => 'ani',
                   'value_not_equal_to' => array('none'),
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Delay', 'onemax'),
            'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
            'param_name' => 'aos_delay',
            'value' => array(
                '100' => '100',
                '200' => '200',
                '300' => '300',
                '400' => '400',
                '500' => '500',
                '600' => '600',
                '700' => '700',
                '800' => '800',
                '900' => '900',
                '1000' => '1000',
                '1100' => '1100',
                '1200' => '1200',
                '1300' => '1300',
                '1400' => '1400',
                '1500' => '1500',
                '1600' => '1600',
                '1700' => '1700',
                '1800' => '1800',
            ),
            'dependency' => array(
                'element' => 'ani',
                'value_not_equal_to' => array('none'),
            ),
        ),
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
    );
    $custom_heading_setting = array(
        'category' => esc_html__('onemax', 'onemax'),
        'params' => $custom_heading_params,
        'weight' => 35,
        'icon'=>'om_vc_icon_custom_heading',
    );
    vc_map_update('vc_custom_heading', $custom_heading_setting);

  /***************************************modify FAQ to onemax*****************************************************************/
    $cta_custom_heading = vc_map_integrate_shortcode(vc_custom_heading_element_params(),
        'custom_',
        esc_html__('Heading', 'onemax'),
        array(
          'exclude' => array(
              'source',
              'text',
              'css',
              'link',
          ),
        ), array(
          'element' => 'use_custom_heading',
          'value' => 'true',
        ));
    $faq_params = array_merge(array(
        array(
            'type' => 'textfield',
            'holder' => 'h4',
            'class' => 'vc_toggle_title',
            'heading' => esc_html__('FAQ Title', 'onemax'),
            'param_name' => 'title',
            'description' => esc_html__('Enter the FAQ title.', 'onemax'),
            'edit_field_class' => 'vc_col-sm-9',
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Use custom font?', 'onemax'),
            'param_name' => 'use_custom_heading',
            'description' => esc_html__('Enable Google fonts.', 'onemax'),
            'edit_field_class' => 'vc_col-sm-3',
        ),
        array(
            'type' => 'textarea_html',
            'holder' => 'div',
            'class' => 'vc_toggle_content',
            'heading' => esc_html__('Toggle content', 'onemax'),
            'param_name' => 'content',
            'value' => __('<p>Toggle content goes here, click edit button to change this text.</p>', 'onemax'),
            'description' => esc_html__('Toggle block content.', 'onemax'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Background', 'onemax'),
            'param_name' => 'faq_bg',
            'description' => esc_html__('Select toggle content background .', 'onemax'),
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'std' => '#ffffff',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style', 'onemax'),
            'param_name' => 'style',
            'value' => getVcShared('toggle styles'),
            'description' => esc_html__('Select toggle design style.', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon color', 'onemax'),
            'param_name' => 'color',
            'value' => array(esc_html__('Default', 'onemax') => 'default') + getVcShared('colors'),
            'description' => esc_html__('Select icon color.', 'onemax'),
            'param_holder_class' => 'vc_colored-dropdown',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Size', 'onemax'),
            'param_name' => 'size',
            'value' => array_diff_key(getVcShared('sizes'), array('Mini' => '')),
            'std' => 'md',
            'description' => esc_html__('Select toggle size', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Default state', 'onemax'),
            'param_name' => 'open',
            'value' => array(
                esc_html__('Closed', 'onemax') => 'false',
                esc_html__('Open', 'onemax') => 'true',
            ),
            'description' => esc_html__('Select "Open" if you want toggle to be open by default.', 'onemax'),
        ),
        array(
                                                'type' => 'dropdown',
                                                'heading' => esc_html__('Loading Animation', 'onemax'),
                                                'param_name' => 'ani',
                                                'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                                                'value' => array(
                                                    esc_html__('None','onemax') => 'none',
                                                    esc_html__('fade-up','onemax') => 'fade-up',
                                                    esc_html__('fade-down','onemax') => 'fade-down',
                                                    esc_html__('fade-left','onemax') => 'fade-left',
                                                    esc_html__('fade-right','onemax') => 'fade-right',
                                                    esc_html__('fade-up-right','onemax') => 'fade-up-right',
                                                    esc_html__('fade-up-left','onemax') => 'fade-up-left',
                                                    esc_html__('fade-down-right','onemax') => 'fade-down-right',
                                                    esc_html__('fade-down-left','onemax') => 'fade-down-left',
                                                    esc_html__('flip-up','onemax') => 'flip-up',
                                                    esc_html__('flip-down','onemax') => 'flip-down',
                                                    esc_html__('flip-left','onemax') => 'flip-left',
                                                    esc_html__('flip-right','onemax') => 'flip-right',
                                                    esc_html__('slide-up','onemax') => 'slide-up',
                                                    esc_html__('slide-down','onemax') => 'slide-down',
                                                    esc_html__('slide-left','onemax') => 'slide-left',
                                                    esc_html__('slide-right','onemax') => 'slide-right',
                                                    esc_html__('zoom-in','onemax') => 'zoom-in',
                                                    esc_html__('zoom-in-up','onemax') => 'zoom-in-up',
                                                    esc_html__('zoom-in-down','onemax') => 'zoom-in-down',
                                                    esc_html__('zoom-in-left','onemax') => 'zoom-in-left',
                                                     esc_html__('zoom-in-right','onemax') => 'zoom-in-right',
                                                    esc_html__('zoom-out','onemax') => 'zoom-out',
                                                     esc_html__('zoom-out-up','onemax') => 'zoom-out-up',
                                                    esc_html__('zoom-out-down','onemax') => 'zoom-out-down',
                                                     esc_html__('zoom-out-left','onemax') => 'zoom-out-left',
                                                    esc_html__('zoom-out-right','onemax') => 'zoom-out-right',
                                                ),
                                            ),
                                    array(
                                                'type' => 'dropdown',
                                                'heading' => esc_html__('Animating Once', 'onemax'),
'description' => esc_html__('If you choose false, no matter you scroll up or scroll down the element will keep on animating. The default value is ture which means the element will only animating once when it display.','onemax'),
                                                'param_name' => 'aos_once',
                                                'value' => array(
                                                    esc_html__('True' ,'onemax')=> 'true',
                                                    esc_html__('False','onemax') => 'false',
                                                ),
                                        'dependency' => array(
            'element' => 'ani',
            'value_not_equal_to' => array(
                'none',
            ),
        ),
                                            ),
                                    array(
                                                'type' => 'dropdown',
                                                'heading' => esc_html__('Delay', 'onemax'),
'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                                                'param_name' => 'aos_delay',
                                                'value' => array(
                    '100' => '100',
                    '200' => '200',
                    '300' => '300',
                    '400' => '400',
                    '500' => '500',
                    '600' => '600',
                    '700' => '700',
                    '800' => '800',
                    '900' => '900',
                    '1000' => '1000',
                    '1100' => '1100',
                    '1200' => '1200',
                    '1300' => '1300',
                    '1400' => '1400',
                    '1500' => '1500',
                    '1600' => '1600',
                    '1700' => '1700',
                    '1800' => '1800',
                                                ),
                                        'dependency' => array(
            'element' => 'ani',
            'value_not_equal_to' => array(
                'none',
            ),
        ),
                                            ),
        array(
            'type' => 'el_id',
            'heading' => esc_html__('Element ID', 'onemax'),
            'param_name' => 'el_id',
            'description' => sprintf(esc_html__('Enter optional ID. Make sure it is unique, and it is valid as w3c specification: %s (Must not have spaces)', 'onemax'), '<a target="_blank" href="http://www.w3schools.com/tags/att_global_id.asp">'.esc_html__('link', 'onemax').'</a>'),
            'settings' => array(
                'auto_generate' => true,
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'onemax'),
            'param_name' => 'el_class',
            'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'onemax'),
        ),
    ), $cta_custom_heading, array(
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('CSS box', 'onemax'),
            'param_name' => 'css',
            'group' => esc_html__('Design Options', 'onemax'),
        ),
));
    $faq_setting = array(
        'category' => esc_html__('onemax', 'onemax'),
        'params' => $faq_params,
        'icon' => 'om_vc_icon_faq',
        'weight' => 34,
    );
    vc_map_update('vc_toggle', $faq_setting);

    /**********************************add faq accordion to onemax*****************************************************************/
    add_shortcode('om_faq_accordion', 'onemax_faq_accordion_func');
    if(!function_exists('onemax_faq_accordion_func')){
    function onemax_faq_accordion_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_faq_accordion.php';

            return $output;
        }
    }
    if(!function_exists('onemax_faq_accordion_to_vc')){
        add_action('vc_before_init', 'onemax_faq_accordion_to_vc');
        function onemax_faq_accordion_to_vc()
        {
            $pixel_icons = array(
            array('vc_pixel_icon vc_pixel_icon-alert' => esc_html__('Alert', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-info' => esc_html__('Info', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-tick' => esc_html__('Tick', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-explanation' => esc_html__('Explanation', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-address_book' => esc_html__('Address book', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-alarm_clock' => esc_html__('Alarm clock', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-anchor' => esc_html__('Anchor', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-application_image' => esc_html__('Application Image', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-arrow' => esc_html__('Arrow', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-asterisk' => esc_html__('Asterisk', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-hammer' => esc_html__('Hammer', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-balloon' => esc_html__('Balloon', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-balloon_buzz' => esc_html__('Balloon Buzz', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-balloon_facebook' => esc_html__('Balloon Facebook', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-balloon_twitter' => esc_html__('Balloon Twitter', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-battery' => esc_html__('Battery', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-binocular' => esc_html__('Binocular', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-document_excel' => esc_html__('Document Excel', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-document_image' => esc_html__('Document Image', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-document_music' => esc_html__('Document Music', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-document_office' => esc_html__('Document Office', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-document_pdf' => esc_html__('Document PDF', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-document_powerpoint' => esc_html__('Document Powerpoint', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-document_word' => esc_html__('Document Word', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-bookmark' => esc_html__('Bookmark', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-camcorder' => esc_html__('Camcorder', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-camera' => esc_html__('Camera', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-chart' => esc_html__('Chart', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-chart_pie' => esc_html__('Chart pie', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-clock' => esc_html__('Clock', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-fire' => esc_html__('Fire', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-heart' => esc_html__('Heart', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-mail' => esc_html__('Mail', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-play' => esc_html__('Play', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-shield' => esc_html__('Shield', 'onemax')),
            array('vc_pixel_icon vc_pixel_icon-video' => esc_html__('Video', 'onemax')),
        );
            $faq_accordion_params = array(
                    array(
                                'type' => 'dropdown',
                                'param_name' => 'rows',
                                'value' => array(
                                        esc_html__('1', 'onemax') => '1',
                                        esc_html__('2', 'onemax') => '2',
                                        esc_html__('3', 'onemax') => '3',
                                        esc_html__('4', 'onemax') => '4',
                                        esc_html__('5', 'onemax') => '5',
                                        esc_html__('6', 'onemax') => '6',
                                        esc_html__('7', 'onemax') => '7',
                                        esc_html__('8', 'onemax') => '8',
                                        esc_html__('9', 'onemax') => '9',
                                        esc_html__('10', 'onemax') => '10',
                                        esc_html__('11', 'onemax') => '11',
                                        esc_html__('12', 'onemax') => '12',
                                        esc_html__('13', 'onemax') => '13',
                                        esc_html__('14', 'onemax') => '14',
                                        esc_html__('15', 'onemax') => '15',
                                        esc_html__('16', 'onemax') => '16',
                                        esc_html__('17', 'onemax') => '17',
                                        esc_html__('18', 'onemax') => '18',
                                        esc_html__('19', 'onemax') => '19',
                                        esc_html__('20', 'onemax') => '20',
                                ),
                                'heading' => esc_html__('FAQ Rows', 'onemax'),
                                'description' => esc_html__('Choose how many FAQ rows you want.', 'onemax'),
                                'std' => '1',
                        ),
                    array(
                                'type' => 'textfield',
                                'param_name' => 'title1',
                                'heading' => esc_html__('Title', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textarea',
                                'param_name' => 'content1',
                                'heading' => esc_html__('Content', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title2',
                                'heading' => esc_html__('Title', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textarea',
                                'param_name' => 'content2',
                                'heading' => esc_html__('Content', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                 array(
                                'type' => 'textfield',
                                'param_name' => 'title3',
                                'heading' => esc_html__('Title', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textarea',
                                'param_name' => 'content3',
                                'heading' => esc_html__('Content', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title4',
                                'heading' => esc_html__('Title', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textarea',
                                'param_name' => 'content4',
                                'heading' => esc_html__('Content', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title5',
                                'heading' => esc_html__('Title', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textarea',
                                'param_name' => 'content5',
                                'heading' => esc_html__('Content', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title6',
                                'heading' => esc_html__('Title', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textarea',
                                'param_name' => 'content6',
                                'heading' => esc_html__('Content', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title7',
                                'heading' => esc_html__('Title', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textarea',
                                'param_name' => 'content7',
                                'heading' => esc_html__('Content', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title8',
                                'heading' => esc_html__('Title', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textarea',
                                'param_name' => 'content8',
                                'heading' => esc_html__('Content', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title9',
                                'heading' => esc_html__('Title', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textarea',
                                'param_name' => 'content9',
                                'heading' => esc_html__('Content', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title10',
                                'heading' => esc_html__('Title', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textarea',
                                'param_name' => 'content10',
                                'heading' => esc_html__('Content', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title11',
                                'heading' => esc_html__('Title', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textarea',
                                'param_name' => 'content11',
                                'heading' => esc_html__('Content', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title12',
                                'heading' => esc_html__('Title', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('12', '13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textarea',
                                'param_name' => 'content12',
                                'heading' => esc_html__('Content', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('12', '13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title13',
                                'heading' => esc_html__('Title', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textarea',
                                'param_name' => 'content13',
                                'heading' => esc_html__('Content', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('13', '14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title14',
                                'heading' => esc_html__('Title', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textarea',
                                'param_name' => 'content14',
                                'heading' => esc_html__('Content', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('14', '15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title15',
                                'heading' => esc_html__('Title', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textarea',
                                'param_name' => 'content15',
                                'heading' => esc_html__('Content', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('15', '16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title16',
                                'heading' => esc_html__('Title', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textarea',
                                'param_name' => 'content16',
                                'heading' => esc_html__('Content', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('16', '17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title17',
                                'heading' => esc_html__('Title', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textarea',
                                'param_name' => 'content17',
                                'heading' => esc_html__('Content', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('17', '18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title18',
                                'heading' => esc_html__('Title', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textarea',
                                'param_name' => 'content18',
                                'heading' => esc_html__('Content', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('18', '19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title19',
                                'heading' => esc_html__('Title', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textarea',
                                'param_name' => 'content19',
                                'heading' => esc_html__('Content', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('19', '20'),
                                ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title20',
                                'heading' => esc_html__('Title', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('20'),
                                ),
                        ),
                array(
                                'type' => 'textarea',
                                'param_name' => 'content20',
                                'heading' => esc_html__('Content', 'onemax'),
                                'dependency' => array(
                                'element' => 'rows',
                                'value' => array('20'),
                                ),
                        ),
                array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Icon library', 'onemax'),
                        'value' => array(
                                esc_html__('Font Awesome', 'onemax') => 'fontawesome',
                                esc_html__('Open Iconic', 'onemax') => 'openiconic',
                                esc_html__('Typicons', 'onemax') => 'typicons',
                                esc_html__('Entypo', 'onemax') => 'entypo',
                                esc_html__('Linecons', 'onemax') => 'linecons',
                                esc_html__('Pixel', 'onemax') => 'pixelicons',
                                esc_html__('Mono Social', 'onemax') => 'monosocial',
                        ),
                        'param_name' => 'icon_type',
                        'description' => esc_html__('Select icon library.', 'onemax'),
                ),
                array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__('Icon', 'onemax'),
                        'param_name' => 'icon_fontawesome',
                        'value' => 'fa fa-info-circle',
                        'settings' => array(
                                'emptyIcon' => false,
                                // default true, display an "EMPTY" icon?
                                'iconsPerPage' => 4000,
                                // default 100, how many icons per/page to display
                        ),
                        'dependency' => array(
                                'element' => 'icon_type',
                                'value' => 'fontawesome',
                        ),
                        'description' => esc_html__('Select icon from library.', 'onemax'),
                ),
                array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__('Icon', 'onemax'),
                        'param_name' => 'icon_openiconic',
                        'settings' => array(
                                'emptyIcon' => false,
                                // default true, display an "EMPTY" icon?
                                'type' => 'openiconic',
                                'iconsPerPage' => 4000,
                                // default 100, how many icons per/page to display
                        ),
                        'dependency' => array(
                                'element' => 'icon_type',
                                'value' => 'openiconic',
                        ),
                        'description' => esc_html__('Select icon from library.', 'onemax'),
                ),
                array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__('Icon', 'onemax'),
                        'param_name' => 'icon_typicons',
                        'settings' => array(
                                'emptyIcon' => false,
                                // default true, display an "EMPTY" icon?
                                'type' => 'typicons',
                                'iconsPerPage' => 4000,
                                // default 100, how many icons per/page to display
                        ),
                        'dependency' => array(
                                'element' => 'icon_type',
                                'value' => 'typicons',
                        ),
                        'description' => esc_html__('Select icon from library.', 'onemax'),
                ),
                array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__('Icon', 'onemax'),
                        'param_name' => 'icon_entypo',
                        'settings' => array(
                                'emptyIcon' => false,
                                // default true, display an "EMPTY" icon?
                                'type' => 'entypo',
                                'iconsPerPage' => 4000,
                                // default 100, how many icons per/page to display
                        ),
                        'dependency' => array(
                                'element' => 'icon_type',
                                'value' => 'entypo',
                        ),
                ),
                array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__('Icon', 'onemax'),
                        'param_name' => 'icon_linecons',
                        'settings' => array(
                                'emptyIcon' => false,
                                // default true, display an "EMPTY" icon?
                                'type' => 'linecons',
                                'iconsPerPage' => 4000,
                                // default 100, how many icons per/page to display
                        ),
                        'dependency' => array(
                                'element' => 'icon_type',
                                'value' => 'linecons',
                        ),
                        'description' => esc_html__('Select icon from library.', 'onemax'),
                ),
                array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__('Icon', 'onemax'),
                        'param_name' => 'icon_pixelicons',
                        'settings' => array(
                                'emptyIcon' => false,
                                // default true, display an "EMPTY" icon?
                                'type' => 'pixelicons',
                                'source' => $pixel_icons,
                        ),
                        'dependency' => array(
                                'element' => 'icon_type',
                                'value' => 'pixelicons',
                        ),
                        'description' => esc_html__('Select icon from library.', 'onemax'),
                ),
                array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__('Icon', 'onemax'),
                        'param_name' => 'icon_monosocial',
                        'value' => 'vc-mono vc-mono-fivehundredpx', // default value to backend editor admin_label
                        'settings' => array(
                                'emptyIcon' => false, // default true, display an "EMPTY" icon?
                                'type' => 'monosocial',
                                'iconsPerPage' => 4000, // default 100, how many icons per/page to display
                        ),
                        'dependency' => array(
                                'element' => 'icon_type',
                                'value' => 'monosocial',
                        ),
                        'description' => esc_html__('Select icon from library.', 'onemax'),
                ),
                        array(
                                'type' => 'dropdown',
                                'param_name' => 'icon_background',
                                'value' => array(
                esc_html__('Blue', 'onemax') => 'blue',
                esc_html__('Violet', 'onemax') => 'violet',
                esc_html__('Chino', 'onemax') => 'chino',
                esc_html__('Mulled Wine', 'onemax') => 'mulled-wine',
                esc_html__('Vista Blue', 'onemax') => 'vista-blue',
                esc_html__('Black', 'onemax') => 'black',
                esc_html__('Grey', 'onemax') => 'grey',
                esc_html__('Orange', 'onemax') => 'orange',
                esc_html__('Sky', 'onemax') => 'sky',
                esc_html__('Green', 'onemax') => 'green',
                esc_html__('Sandy brown', 'onemax') => 'sandy-brown',
                esc_html__('Purple', 'onemax') => 'purple',
            ),
                                'std' => 'grey',
                                'heading' => esc_html__('Icon background', 'onemax'),
                                'description' => esc_html__('Select accordion color.', 'onemax'),
                                //'param_holder_class' => 'vc_colored-dropdown',
                        ),
                        array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Extra class name', 'onemax'),
                                'param_name' => 'el_class',
                                'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'onemax'),
                        ),
                        array(
                                'type' => 'css_editor',
                                'heading' => esc_html__('CSS box', 'onemax'),
                                'param_name' => 'css',
                                'group' => esc_html__('Design Options', 'onemax'),
                        ),
                );
            $settings = array(
                    'name' => esc_html__('Faq Accordion', 'onemax'),
                    'base' => 'om_faq_accordion',
                    'icon' => 'om_vc_icon_faq_accordion',
                    'category' => esc_html__('onemax', 'onemax'),
                    'description' => esc_html__('faq accordion', 'onemax'),
                    'params' => $faq_accordion_params,
                    'weight' => 33,
    //                'js_view' => 'VcBackendTtaAccordionView',
    //               'custom_markup' => '
    //<div class="vc_tta-container" data-vc-action="collapseAll">
    //  <div class="vc_general vc_tta vc_tta-accordion vc_tta-color-backend-accordion-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-o-shape-group vc_tta-controls-align-left vc_tta-gap-2">
    //     <div class="vc_tta-panels vc_clearfix {{container-class}}">
    //        {{ content }}
    //        <div class="vc_tta-panel vc_tta-section-append">
    //           <div class="vc_tta-panel-heading">
    //              <h4 class="vc_tta-panel-title vc_tta-controls-icon-position-left">
    //                 <a href="javascript:;" aria-expanded="false" class="vc_tta-backend-add-control">
    //                     <span class="vc_tta-title-text">' . esc_html__( 'Add Faq', 'onemax' ) . '</span>
    //                      <i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i>
    //                  </a>
    //              </h4>
    //           </div>
    //        </div>
    //     </div>
    //  </div>
    //</div>',
                );
            vc_map($settings);
        }
    }
 /**********************************add icon box1 to onemax*****************************************************************/
    if(!class_exists('WPBakeryShortCode_Om_Icon_Box')){
        class WPBakeryShortCode_Om_Icon_Box extends WPBakeryShortCode
        {
            public function getVcIcon($atts)
            {
                if (empty($atts['i_type'])) {
                    $atts['i_type'] = 'fontawesome';
                }
                $data = vc_map_integrate_parse_atts($this->shortcode, 'vc_icon', $atts, 'i_');
                if ($data) {
                    $icon = visual_composer()->getShortCode('vc_icon');
                    if (is_object($icon)) {
                        return $icon->render(array_filter($data));
                    }
                }

                return '';
            }
        }
    }
    add_shortcode('om_icon_box1', 'onemax_icon_box1_func');
    if(!function_exists('onemax_icon_box1_func')){
        function onemax_icon_box1_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_icon_box1.php';

            return $output;
        }
    }
    if(!function_exists('onemax_icon_box1_to_vc')){
        add_action('vc_before_init', 'onemax_icon_box1_to_vc');
        function onemax_icon_box1_to_vc()
        {
            $icons_params = onemax_get_icons_params(false);
            $icon_box1_params = array_merge(array(
                        array(
                                'type' => 'textfield',
                                'param_name' => 'title',
                                'heading' => esc_html__('Title', 'onemax'),
                        ),
                        array(
                                'type' => 'textarea',
                                'param_name' => 'text',
                                'heading' => esc_html__('Content', 'onemax'),
                                'description' => esc_html__('The icon box Content.', 'onemax'),
                        ),
                        array(
                                'type' => 'colorpicker',
                                'param_name' => 'title_color',
                                'heading' => esc_html__('Title Color', 'onemax'),
                                'std' => '#000000',
                                'edit_field_class' => 'vc_col-sm-6 vc_column',
                            ),
                        array(
                                'type' => 'colorpicker',
                                'param_name' => 'content_color',
                                'heading' => esc_html__('Content Color', 'onemax'),
                                'std' => '#000000',
                                'edit_field_class' => 'vc_col-sm-6 vc_column',
                            ),
                        array(
                                'type' => 'vc_link',
                                'heading' => esc_html__('URL (Link)', 'onemax'),
                                'param_name' => 'link',
                                'description' => esc_html__('Add link to icon box.', 'onemax'),
        ), ), $icons_params,
                    array(array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Loading Animation', 'onemax'),
                            'param_name' => 'ani',
                            'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                            'value' => array(
                                esc_html__('None','onemax') => 'none',
                                esc_html__('fade-up','onemax') => 'fade-up',
                                esc_html__('fade-down','onemax') => 'fade-down',
                                esc_html__('fade-left','onemax') => 'fade-left',
                                esc_html__('fade-right','onemax') => 'fade-right',
                                esc_html__('fade-up-right','onemax') => 'fade-up-right',
                                esc_html__('fade-up-left','onemax') => 'fade-up-left',
                                esc_html__('fade-down-right','onemax') => 'fade-down-right',
                                esc_html__('fade-down-left','onemax') => 'fade-down-left',
                                esc_html__('flip-up','onemax') => 'flip-up',
                                esc_html__('flip-down','onemax') => 'flip-down',
                                esc_html__('flip-left','onemax') => 'flip-left',
                                esc_html__('flip-right','onemax') => 'flip-right',
                                esc_html__('slide-up','onemax') => 'slide-up',
                                esc_html__('slide-down','onemax') => 'slide-down',
                                esc_html__('slide-left','onemax') => 'slide-left',
                                esc_html__('slide-right','onemax') => 'slide-right',
                                esc_html__('zoom-in','onemax') => 'zoom-in',
                                esc_html__('zoom-in-up','onemax') => 'zoom-in-up',
                                esc_html__('zoom-in-down','onemax') => 'zoom-in-down',
                                esc_html__('zoom-in-left','onemax') => 'zoom-in-left',
                                 esc_html__('zoom-in-right','onemax') => 'zoom-in-right',
                                esc_html__('zoom-out','onemax') => 'zoom-out',
                                 esc_html__('zoom-out-up','onemax') => 'zoom-out-up',
                                esc_html__('zoom-out-down','onemax') => 'zoom-out-down',
                                 esc_html__('zoom-out-left','onemax') => 'zoom-out-left',
                                esc_html__('zoom-out-right','onemax') => 'zoom-out-right',
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Animating Once', 'onemax'),
    'description' => esc_html__('If you choose false, no matter you scroll up or scroll down the element will keep on animating. The default value is ture which means the element will only animating once when it display.','onemax'),
                            'param_name' => 'aos_once',
                            'value' => array(
                                esc_html__('True' ,'onemax')=> 'true',
                                esc_html__('False','onemax') => 'false',
                            ),
                            'dependency' => array(
                                   'element' => 'ani',
                                   'value_not_equal_to' => array('none'),
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Delay', 'onemax'),
    'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                            'param_name' => 'aos_delay',
                            'value' => array(
                        '100' => '100',
                        '200' => '200',
                        '300' => '300',
                        '400' => '400',
                        '500' => '500',
                        '600' => '600',
                        '700' => '700',
                        '800' => '800',
                        '900' => '900',
                        '1000' => '1000',
                        '1100' => '1100',
                        '1200' => '1200',
                        '1300' => '1300',
                        '1400' => '1400',
                        '1500' => '1500',
                        '1600' => '1600',
                        '1700' => '1700',
                        '1800' => '1800',
                            ),
                            'dependency' => array(
                                'element' => 'ani',
                                'value_not_equal_to' => array('none'),
                            ),
                        ), ));
            $settings = array(
                    'name' => esc_html__('Icon Box1', 'onemax'),
                    'base' => 'om_icon_box1',
                    'category' => esc_html__('onemax', 'onemax'),
                    'description' => esc_html__('Icon beside the title', 'onemax'),
                    'params' => $icon_box1_params,
                    'icon' => 'om_vc_icon_icon_box1',
                    'weight' => 32,
                );
            vc_map($settings);
        }
    }
    if(!class_exists('WPBakeryShortCode_Om_Icon_Box1')){
        class WPBakeryShortCode_Om_Icon_Box1 extends WPBakeryShortCode_Om_Icon_Box{}
    }
    /**********************************add icon box2 to onemax*****************************************************************/
    add_shortcode('om_icon_box2', 'onemax_icon_box2_func');
    if(!function_exists('onemax_icon_box2_func')){
        function onemax_icon_box2_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_icon_box2.php';

            return $output;
        }
    }
    if(!function_exists('onemax_icon_box2_to_vc')){
        add_action('vc_before_init', 'onemax_icon_box2_to_vc');
        function onemax_icon_box2_to_vc()
        {
            $icons_params = onemax_get_icons_params(false);
            $icon_box2_params = array_merge(array(
                        array(
                                'type' => 'textarea',
                                'param_name' => 'text',
                                'heading' => esc_html__('Content', 'onemax'),
                                'description' => esc_html__('The icon box Content.', 'onemax'),
                        ),
                        array(
                                'type' => 'colorpicker',
                                'param_name' => 'content_color',
                                'heading' => esc_html__('Content Color', 'onemax'),
                                'std' => '#000000',
                            ),
                        array(
                                'type' => 'vc_link',
                                'heading' => esc_html__('URL (Link)', 'onemax'),
                                'param_name' => 'link',
                                'description' => esc_html__('Add link to icon box.', 'onemax'),
        ), ), $icons_params, array(
                array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Loading Animation', 'onemax'),
                            'param_name' => 'ani',
                            'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                            'value' => array(
                                esc_html__('None','onemax') => 'none',
                                esc_html__('fade-up','onemax') => 'fade-up',
                                esc_html__('fade-down','onemax') => 'fade-down',
                                esc_html__('fade-left','onemax') => 'fade-left',
                                esc_html__('fade-right','onemax') => 'fade-right',
                                esc_html__('fade-up-right','onemax') => 'fade-up-right',
                                esc_html__('fade-up-left','onemax') => 'fade-up-left',
                                esc_html__('fade-down-right','onemax') => 'fade-down-right',
                                esc_html__('fade-down-left','onemax') => 'fade-down-left',
                                esc_html__('flip-up','onemax') => 'flip-up',
                                esc_html__('flip-down','onemax') => 'flip-down',
                                esc_html__('flip-left','onemax') => 'flip-left',
                                esc_html__('flip-right','onemax') => 'flip-right',
                                esc_html__('slide-up','onemax') => 'slide-up',
                                esc_html__('slide-down','onemax') => 'slide-down',
                                esc_html__('slide-left','onemax') => 'slide-left',
                                esc_html__('slide-right','onemax') => 'slide-right',
                                esc_html__('zoom-in','onemax') => 'zoom-in',
                                esc_html__('zoom-in-up','onemax') => 'zoom-in-up',
                                esc_html__('zoom-in-down','onemax') => 'zoom-in-down',
                                esc_html__('zoom-in-left','onemax') => 'zoom-in-left',
                                 esc_html__('zoom-in-right','onemax') => 'zoom-in-right',
                                esc_html__('zoom-out','onemax') => 'zoom-out',
                                 esc_html__('zoom-out-up','onemax') => 'zoom-out-up',
                                esc_html__('zoom-out-down','onemax') => 'zoom-out-down',
                                 esc_html__('zoom-out-left','onemax') => 'zoom-out-left',
                                esc_html__('zoom-out-right','onemax') => 'zoom-out-right',
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Animating Once', 'onemax'),
    'description' => esc_html__('If you choose false, no matter you scroll up or scroll down the element will keep on animating. The default value is ture which means the element will only animating once when it display.','onemax'),
                            'param_name' => 'aos_once',
                            'value' => array(
                                esc_html__('True' ,'onemax')=> 'true',
                                esc_html__('False','onemax') => 'false',
                            ),
                            'dependency' => array(
                                   'element' => 'ani',
                                   'value_not_equal_to' => array('none'),
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Delay', 'onemax'),
    'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                            'param_name' => 'aos_delay',
                            'value' => array(
                        '100' => '100',
                        '200' => '200',
                        '300' => '300',
                        '400' => '400',
                        '500' => '500',
                        '600' => '600',
                        '700' => '700',
                        '800' => '800',
                        '900' => '900',
                        '1000' => '1000',
                        '1100' => '1100',
                        '1200' => '1200',
                        '1300' => '1300',
                        '1400' => '1400',
                        '1500' => '1500',
                        '1600' => '1600',
                        '1700' => '1700',
                        '1800' => '1800',
                            ),
                            'dependency' => array(
                                'element' => 'ani',
                                'value_not_equal_to' => array('none'),
                            ),
                        ),
                        array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Extra class name', 'onemax'),
                                'param_name' => 'el_class',
                                'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'onemax'),
                        ),
                        array(
                                'type' => 'css_editor',
                                'heading' => esc_html__('CSS box', 'onemax'),
                                'param_name' => 'css',
                                'group' => esc_html__('Design Options', 'onemax'),
                        ),
                ));
            $settings = array(
                    'name' => esc_html__('Icon Box2', 'onemax'),
                    'base' => 'om_icon_box2',
                    'category' => esc_html__('onemax', 'onemax'),
                    'description' => esc_html__('Icon beside the content', 'onemax'),
                    'params' => $icon_box2_params,
                    'icon' => 'om_vc_icon_icon_box2',
                    'weight' => 31,
                );
            vc_map($settings);
        }
    }
    if(!class_exists('WPBakeryShortCode_Om_Icon_Box2')){
        class WPBakeryShortCode_Om_Icon_Box2 extends WPBakeryShortCode_Om_Icon_Box{}
    }
    /**********************************add icon box3 to onemax*****************************************************************/
    add_shortcode('om_icon_box3', 'onemax_icon_box3_func');
    if(!function_exists('onemax_icon_box3_func')){
        function onemax_icon_box3_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_icon_box3.php';

            return $output;
        }
    }
    if(!function_exists('onemax_icon_box3_to_vc')){
        add_action('vc_before_init', 'onemax_icon_box3_to_vc');
        function onemax_icon_box3_to_vc()
        {
            $icons_params = onemax_get_icons_params(false);
            $icon_box3_params = array_merge(array(
                        array(
                                'type' => 'textfield',
                                'param_name' => 'title',
                                'heading' => esc_html__('Title', 'onemax'),
                        ),
                        array(
                                'type' => 'textarea',
                                'param_name' => 'text',
                                'heading' => esc_html__('Content', 'onemax'),
                                'description' => esc_html__('The icon box Content.', 'onemax'),
                        ),
                        array(
                                'type' => 'colorpicker',
                                'param_name' => 'title_color',
                                'heading' => esc_html__('Title Color', 'onemax'),
                                'std' => '#000000',
                                'edit_field_class' => 'vc_col-sm-6 vc_column',
                            ),
                        array(
                                'type' => 'colorpicker',
                                'param_name' => 'content_color',
                                'heading' => esc_html__('Content Color', 'onemax'),
                                'std' => '#000000',
                                'edit_field_class' => 'vc_col-sm-6 vc_column',
                            ),
                        array(
                                'type' => 'vc_link',
                                'heading' => esc_html__('URL (Link)', 'onemax'),
                                'param_name' => 'link',
                                'description' => esc_html__('Add link to icon box.', 'onemax'),
        ), ), $icons_params, array(
                        array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Icon Box Background', 'onemax'),
                                'param_name' => 'bg_color',
                                'description' => esc_html__('Choose the default background color.', 'onemax'),
                                'edit_field_class' => 'vc_col-sm-6 vc_column',
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Icon Box Shape', 'onemax'),
                                'param_name' => 'bg_shape',
                                'description' => esc_html__('Select icon box shape.', 'onemax'),
                                'value' => array(
                                    esc_html__('None','onemax') => 'none',
                                    esc_html__('Circle','onemax') => 'circle',
                                    esc_html__('Square','onemax') => 'square',
                                    esc_html__('Rounded','onemax') => 'rounded',
                                    esc_html__('Outline Circle','onemax') => 'ocircle',
                                    esc_html__('Outline Square','onemax') => 'osquare',
                                    esc_html__('Outline Rounded','onemax') => 'orounded',
                                ),
                                'std' => 'None',
                            ),
                array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Loading Animation', 'onemax'),
                            'param_name' => 'ani',
                            'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                            'value' => array(
                                esc_html__('None','onemax') => 'none',
                                esc_html__('fade-up','onemax') => 'fade-up',
                                esc_html__('fade-down','onemax') => 'fade-down',
                                esc_html__('fade-left','onemax') => 'fade-left',
                                esc_html__('fade-right','onemax') => 'fade-right',
                                esc_html__('fade-up-right','onemax') => 'fade-up-right',
                                esc_html__('fade-up-left','onemax') => 'fade-up-left',
                                esc_html__('fade-down-right','onemax') => 'fade-down-right',
                                esc_html__('fade-down-left','onemax') => 'fade-down-left',
                                esc_html__('flip-up','onemax') => 'flip-up',
                                esc_html__('flip-down','onemax') => 'flip-down',
                                esc_html__('flip-left','onemax') => 'flip-left',
                                esc_html__('flip-right','onemax') => 'flip-right',
                                esc_html__('slide-up','onemax') => 'slide-up',
                                esc_html__('slide-down','onemax') => 'slide-down',
                                esc_html__('slide-left','onemax') => 'slide-left',
                                esc_html__('slide-right','onemax') => 'slide-right',
                                esc_html__('zoom-in','onemax') => 'zoom-in',
                                esc_html__('zoom-in-up','onemax') => 'zoom-in-up',
                                esc_html__('zoom-in-down','onemax') => 'zoom-in-down',
                                esc_html__('zoom-in-left','onemax') => 'zoom-in-left',
                                 esc_html__('zoom-in-right','onemax') => 'zoom-in-right',
                                esc_html__('zoom-out','onemax') => 'zoom-out',
                                 esc_html__('zoom-out-up','onemax') => 'zoom-out-up',
                                esc_html__('zoom-out-down','onemax') => 'zoom-out-down',
                                 esc_html__('zoom-out-left','onemax') => 'zoom-out-left',
                                esc_html__('zoom-out-right','onemax') => 'zoom-out-right',
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Animating Once', 'onemax'),
    'description' => esc_html__('If you choose false, no matter you scroll up or scroll down the element will keep on animating. The default value is ture which means the element will only animating once when it display.','onemax'),
                            'param_name' => 'aos_once',
                            'value' => array(
                                esc_html__('True' ,'onemax')=> 'true',
                                esc_html__('False','onemax') => 'false',
                            ),
                            'dependency' => array(
                                   'element' => 'ani',
                                   'value_not_equal_to' => array('none'),
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Delay', 'onemax'),
    'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                            'param_name' => 'aos_delay',
                            'value' => array(
                        '100' => '100',
                        '200' => '200',
                        '300' => '300',
                        '400' => '400',
                        '500' => '500',
                        '600' => '600',
                        '700' => '700',
                        '800' => '800',
                        '900' => '900',
                        '1000' => '1000',
                        '1100' => '1100',
                        '1200' => '1200',
                        '1300' => '1300',
                        '1400' => '1400',
                        '1500' => '1500',
                        '1600' => '1600',
                        '1700' => '1700',
                        '1800' => '1800',
                            ),
                            'dependency' => array(
                                'element' => 'ani',
                                'value_not_equal_to' => array('none'),
                            ),
                        ),
                ));
            $settings = array(
                    'name' => esc_html__('Icon Box3', 'onemax'),
                    'base' => 'om_icon_box3',
                    'category' => esc_html__('onemax', 'onemax'),
                    'description' => esc_html__('Make icon as a title', 'onemax'),
                    'params' => $icon_box3_params,
                    'icon' => 'om_vc_icon_icon_box3',
                    'weight' => 30,
                );
            vc_map($settings);
        }
    }
    if(!class_exists('WPBakeryShortCode_Om_Icon_Box3')){
        class WPBakeryShortCode_Om_Icon_Box3 extends WPBakeryShortCode_Om_Icon_Box{}
    }

     /**********************************add icon list to onemax*****************************************************************/
    add_shortcode('om_icon_list', 'onemax_icon_list_func');
    if(!function_exists('onemax_icon_list_func')){
        function onemax_icon_list_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_icon_list.php';

            return $output;
        }
    }
    if(!function_exists('onemax_icon_list_to_vc')){
        add_action('vc_before_init', 'onemax_icon_list_to_vc');
        function onemax_icon_list_to_vc()
        {
            $icons_params = onemax_get_icons_params();
            $icon_list_params = array_merge(array(
                        array(
                                'type' => 'textfield',
                                'param_name' => 'title',
                                'heading' => esc_html__('List Title', 'onemax'),
                        ),
                        array(
                                'type' => 'vc_link',
                                'heading' => esc_html__('URL (Link)', 'onemax'),
                                'param_name' => 'link',
                                'description' => esc_html__('Add link to list.', 'onemax'),
        ),
                        array(
                                'type' => 'checkbox',
                                'heading' => esc_html__('Add icon?', 'onemax'),
                                'param_name' => 'add_icon',
        ), ), $icons_params, array(
                array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Loading Animation', 'onemax'),
                            'param_name' => 'ani',
                            'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                            'value' => array(
                                esc_html__('None','onemax') => 'none',
                                esc_html__('fade-up','onemax') => 'fade-up',
                                esc_html__('fade-down','onemax') => 'fade-down',
                                esc_html__('fade-left','onemax') => 'fade-left',
                                esc_html__('fade-right','onemax') => 'fade-right',
                                esc_html__('fade-up-right','onemax') => 'fade-up-right',
                                esc_html__('fade-up-left','onemax') => 'fade-up-left',
                                esc_html__('fade-down-right','onemax') => 'fade-down-right',
                                esc_html__('fade-down-left','onemax') => 'fade-down-left',
                                esc_html__('flip-up','onemax') => 'flip-up',
                                esc_html__('flip-down','onemax') => 'flip-down',
                                esc_html__('flip-left','onemax') => 'flip-left',
                                esc_html__('flip-right','onemax') => 'flip-right',
                                esc_html__('slide-up','onemax') => 'slide-up',
                                esc_html__('slide-down','onemax') => 'slide-down',
                                esc_html__('slide-left','onemax') => 'slide-left',
                                esc_html__('slide-right','onemax') => 'slide-right',
                                esc_html__('zoom-in','onemax') => 'zoom-in',
                                esc_html__('zoom-in-up','onemax') => 'zoom-in-up',
                                esc_html__('zoom-in-down','onemax') => 'zoom-in-down',
                                esc_html__('zoom-in-left','onemax') => 'zoom-in-left',
                                 esc_html__('zoom-in-right','onemax') => 'zoom-in-right',
                                esc_html__('zoom-out','onemax') => 'zoom-out',
                                 esc_html__('zoom-out-up','onemax') => 'zoom-out-up',
                                esc_html__('zoom-out-down','onemax') => 'zoom-out-down',
                                 esc_html__('zoom-out-left','onemax') => 'zoom-out-left',
                                esc_html__('zoom-out-right','onemax') => 'zoom-out-right',
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Animating Once', 'onemax'),
    'description' => esc_html__('If you choose false, no matter you scroll up or scroll down the element will keep on animating. The default value is ture which means the element will only animating once when it display.','onemax'),
                            'param_name' => 'aos_once',
                            'value' => array(
                                esc_html__('True','onemax') => 'true',
                                esc_html__('False','onemax') => 'false',
                            ),
                            'dependency' => array(
                                   'element' => 'ani',
                                   'value_not_equal_to' => array('none'),
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Delay', 'onemax'),
    'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                            'param_name' => 'aos_delay',
                            'value' => array(
                        '100' => '100',
                        '200' => '200',
                        '300' => '300',
                        '400' => '400',
                        '500' => '500',
                        '600' => '600',
                        '700' => '700',
                        '800' => '800',
                        '900' => '900',
                        '1000' => '1000',
                        '1100' => '1100',
                        '1200' => '1200',
                        '1300' => '1300',
                        '1400' => '1400',
                        '1500' => '1500',
                        '1600' => '1600',
                        '1700' => '1700',
                        '1800' => '1800',
                            ),
                            'dependency' => array(
                                'element' => 'ani',
                                'value_not_equal_to' => array('none'),
                            ),
                        ),
                        array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Extra class name', 'onemax'),
                                'param_name' => 'el_class',
                                'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'onemax'),
                        ),
                        array(
                                'type' => 'css_editor',
                                'heading' => esc_html__('CSS box', 'onemax'),
                                'param_name' => 'css',
                                'group' => esc_html__('Design Options', 'onemax'),
                        ),
                ));
            $settings = array(
                    'name' => esc_html__('Icon List', 'onemax'),
                    'base' => 'om_icon_list',
                    'category' => esc_html__('onemax', 'onemax'),
                    'description' => esc_html__('List with icon', 'onemax'),
                    'params' => $icon_list_params,
                    'icon' => 'om_vc_icon_icon_list',
                    'weight' => 29,
                );
            vc_map($settings);
        }
    }
    if(!class_exists('WPBakeryShortCode_Om_Icon_Iist')){
        class WPBakeryShortCode_Om_Icon_Iist extends WPBakeryShortCode
        {
            public function getVcIcon($atts)
            {
                if (empty($atts['i_type'])) {
                    $atts['i_type'] = 'fontawesome';
                }
                $data = vc_map_integrate_parse_atts($this->shortcode, 'vc_icon', $atts, 'i_');
                if ($data) {
                    $icon = visual_composer()->getShortCode('vc_icon');
                    if (is_object($icon)) {
                        return $icon->render(array_filter($data));
                    }
                }

                return '';
            }
        }
    }

     /**********************************add image – with title to onemax*****************************/
    add_shortcode('om_image_with_title', 'onemax_image_with_title_func');
    if(!function_exists('onemax_image_with_title_func')){
        function onemax_image_with_title_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_image_with_title.php';

            return $output;
        }
    }
    if(!function_exists('onemax_image_with_title_to_vc')){
        add_action('vc_before_init', 'onemax_image_with_title_to_vc');
        function onemax_image_with_title_to_vc()
        {
            $image_with_title_params = array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title', 'onemax'),
                'param_name' => 'title',
                'description' => esc_html__('Enter the image title.', 'onemax'),
            ),
            array(
                'type' => 'colorpicker',
                'param_name' => 'font_color',
                'heading' => esc_html__('Font Color', 'onemax'),
                'description' => esc_html__('The title color.', 'onemax'),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Title Background', 'onemax'),
                'param_name' => 'background',
                'description' => esc_html__('Select the title background color.', 'onemax'),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Padding', 'onemax' ),
                'param_name' => 'padding',
                'description' => esc_html__('The title padding.', 'onemax'),
                ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Image source', 'onemax'),
                'param_name' => 'source',
                'value' => array(
                    esc_html__('Media library', 'onemax') => 'media_library',
                    esc_html__('External link', 'onemax') => 'external_link',
                    esc_html__('Featured Image', 'onemax') => 'featured_image',
                ),
                'std' => 'media_library',
                'description' => esc_html__('Select image source.', 'onemax'),
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Image', 'onemax'),
                'param_name' => 'image',
                'value' => '',
                'description' => esc_html__('Select image from media library.', 'onemax'),
                'dependency' => array(
                    'element' => 'source',
                    'value' => 'media_library',
                ),
                'admin_label' => true,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('External link', 'onemax'),
                'param_name' => 'custom_src',
                'description' => esc_html__('Select external link.', 'onemax'),
                'dependency' => array(
                    'element' => 'source',
                    'value' => 'external_link',
                ),
                'admin_label' => true,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Image size', 'onemax'),
                'param_name' => 'img_size',
                'value' => 'full',
                'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'onemax'),
                'dependency' => array(
                    'element' => 'source',
                    'value' => array('media_library', 'featured_image'),
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Image size', 'onemax'),
                'param_name' => 'external_img_size',
                'value' => '',
                'description' => esc_html__('Enter image size in pixels. Example: 200x100 (Width x Height).', 'onemax'),
                'dependency' => array(
                    'element' => 'source',
                    'value' => 'external_link',
                ),
            ),

            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Image style', 'onemax'),
                'param_name' => 'style',
                'value' => getVcShared('single image styles'),
                'description' => esc_html__('Select image display style.', 'onemax'),
                'dependency' => array(
                    'element' => 'source',
                    'value' => array('media_library', 'featured_image'),
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Image style', 'onemax'),
                'param_name' => 'external_style',
                'value' => getVcShared('single image external styles'),
                'description' => esc_html__('Select image display style.', 'onemax'),
                'dependency' => array(
                    'element' => 'source',
                    'value' => 'external_link',
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Border color', 'onemax'),
                'param_name' => 'border_color',
                'value' => getVcShared('colors'),
                'std' => 'grey',
                'dependency' => array(
                    'element' => 'style',
                    'value' => array(
                        'vc_box_border',
                        'vc_box_border_circle',
                        'vc_box_outline',
                        'vc_box_outline_circle',
                        'vc_box_border_circle_2',
                        'vc_box_outline_circle_2',
                    ),
                ),
                'description' => esc_html__('Border color.', 'onemax'),
                'param_holder_class' => 'vc_colored-dropdown',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Border color', 'onemax'),
                'param_name' => 'external_border_color',
                'value' => getVcShared('colors'),
                'std' => 'grey',
                'dependency' => array(
                    'element' => 'external_style',
                    'value' => array(
                        'vc_box_border',
                        'vc_box_border_circle',
                        'vc_box_outline',
                        'vc_box_outline_circle',
                    ),
                ),
                'description' => esc_html__('Border color.', 'onemax'),
                'param_holder_class' => 'vc_colored-dropdown',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('On click action', 'onemax'),
                'param_name' => 'onclick',
                'value' => array(
                    esc_html__('None', 'onemax') => '',
                    esc_html__('Link to large image', 'onemax') => 'img_link_large',
                    esc_html__('Open prettyPhoto', 'onemax') => 'link_image',
                    esc_html__('Open custom link', 'onemax') => 'custom_link',
                    esc_html__('Zoom', 'onemax') => 'zoom',
                ),
                'std' => '',
            ),
            array(
                'type' => 'href',
                'heading' => esc_html__('Image link', 'onemax'),
                'param_name' => 'link',
                'description' => esc_html__('Enter URL if you want this image to have a link (Note: parameters like "mailto:" are also accepted).', 'onemax'),
                'dependency' => array(
                    'element' => 'onclick',
                    'value' => 'custom_link',
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Link Target', 'onemax'),
                'param_name' => 'img_link_target',
                'value' => array(
                                esc_html__('Same window', 'onemax') => '_self',
                                esc_html__('New window', 'onemax') => '_blank',
                        ),
                'dependency' => array(
                    'element' => 'onclick',
                    'value' => array('custom_link', 'img_link_large'),
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Alignment', 'onemax'),
                'param_name' => 'alignment',
                'value' => array(
                    esc_html__('Center','onemax') => 'center',
                    esc_html__('Left','onemax') => 'left',
                    esc_html__('Right','onemax') => 'right',
                ),
            ),
            array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Loading Animation', 'onemax'),
                            'param_name' => 'ani',
                            'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                            'value' => array(
                                esc_html__('None','onemax') => 'none',
                                esc_html__('fade-up','onemax') => 'fade-up',
                                esc_html__('fade-down','onemax') => 'fade-down',
                                esc_html__('fade-left','onemax') => 'fade-left',
                                esc_html__('fade-right','onemax') => 'fade-right',
                                esc_html__('fade-up-right','onemax') => 'fade-up-right',
                                esc_html__('fade-up-left','onemax') => 'fade-up-left',
                                esc_html__('fade-down-right','onemax') => 'fade-down-right',
                                esc_html__('fade-down-left','onemax') => 'fade-down-left',
                                esc_html__('flip-up','onemax') => 'flip-up',
                                esc_html__('flip-down','onemax') => 'flip-down',
                                esc_html__('flip-left','onemax') => 'flip-left',
                                esc_html__('flip-right','onemax') => 'flip-right',
                                esc_html__('slide-up','onemax') => 'slide-up',
                                esc_html__('slide-down','onemax') => 'slide-down',
                                esc_html__('slide-left','onemax') => 'slide-left',
                                esc_html__('slide-right','onemax') => 'slide-right',
                                esc_html__('zoom-in','onemax') => 'zoom-in',
                                esc_html__('zoom-in-up','onemax') => 'zoom-in-up',
                                esc_html__('zoom-in-down','onemax') => 'zoom-in-down',
                                esc_html__('zoom-in-left','onemax') => 'zoom-in-left',
                                 esc_html__('zoom-in-right','onemax') => 'zoom-in-right',
                                esc_html__('zoom-out','onemax') => 'zoom-out',
                                 esc_html__('zoom-out-up','onemax') => 'zoom-out-up',
                                esc_html__('zoom-out-down','onemax') => 'zoom-out-down',
                                 esc_html__('zoom-out-left','onemax') => 'zoom-out-left',
                                esc_html__('zoom-out-right','onemax') => 'zoom-out-right',
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Animating Once', 'onemax'),
    'description' => esc_html__('If you choose false, no matter you scroll up or scroll down the element will keep on animating. The default value is ture which means the element will only animating once when it display.','onemax'),
                            'param_name' => 'aos_once',
                            'value' => array(
                                esc_html__('True','onemax') => 'true',
                                esc_html__('False','onemax') => 'false',
                            ),
                            'dependency' => array(
                                   'element' => 'ani',
                                   'value_not_equal_to' => array('none'),
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Delay', 'onemax'),
    'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                            'param_name' => 'aos_delay',
                            'value' => array(
                        '100' => '100',
                        '200' => '200',
                        '300' => '300',
                        '400' => '400',
                        '500' => '500',
                        '600' => '600',
                        '700' => '700',
                        '800' => '800',
                        '900' => '900',
                        '1000' => '1000',
                        '1100' => '1100',
                        '1200' => '1200',
                        '1300' => '1300',
                        '1400' => '1400',
                        '1500' => '1500',
                        '1600' => '1600',
                        '1700' => '1700',
                        '1800' => '1800',
                            ),
                            'dependency' => array(
                                'element' => 'ani',
                                'value_not_equal_to' => array('none'),
                            ),
                        ),
                                                // backward compatibility. since 4.6
            array(
                'type' => 'hidden',
                'param_name' => 'img_link_large',
            ),

        );
            $settings = array(
                    'name' => esc_html__('Image - with title', 'onemax'),
                    'base' => 'om_image_with_title',
                    'category' => esc_html__('onemax', 'onemax'),
                    'description' => esc_html__('simple image with title.', 'onemax'),
                    'params' => $image_with_title_params,
                'icon' => 'om_vc_icon_image_title',
                'weight' => 28,
                );
            vc_map($settings);
        }
    }
    if(!class_exists('WPBakeryShortCode_Om_Image_With_Title')){
        class WPBakeryShortCode_Om_Image_With_Title extends WPBakeryShortCode
        {
            public function getImageSquareSize($img_id, $img_size)
            {
                if (preg_match_all('/(\d+)x(\d+)/', $img_size, $sizes)) {
                    $exact_size = array(
                    'width' => isset($sizes[1][0]) ? $sizes[1][0] : '0',
                    'height' => isset($sizes[2][0]) ? $sizes[2][0] : '0',
                );
                } else {
                    $image_downsize = image_downsize($img_id, $img_size);
                    $exact_size = array(
                    'width' => $image_downsize[1],
                    'height' => $image_downsize[2],
                );
                }
                $exact_size_int_w = (int) $exact_size['width'];
                $exact_size_int_h = (int) $exact_size['height'];
                if (isset($exact_size['width']) && $exact_size_int_w !== $exact_size_int_h) {
                    $img_size = $exact_size_int_w > $exact_size_int_h
                    ? $exact_size['height'].'x'.$exact_size['height']
                    : $exact_size['width'].'x'.$exact_size['width'];
                }

                return $img_size;
            }
        }
    }

   /**********************************add image – classical hover to onemax*****************************************************************/
    add_shortcode('om_image_classical_hover', 'onemax_image_classical_hover_func');
    if(!function_exists('onemax_image_classical_hover_func')){
        function onemax_image_classical_hover_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_image_classical_hover.php';

            return $output;
        }
    }
    if(!function_exists('onemax_image_classical_hover_to_vc')){
        add_action('vc_before_init', 'onemax_image_classical_hover_to_vc');
        function onemax_image_classical_hover_to_vc()
        {
            $image_classical_hover_params = array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title', 'onemax'),
                'param_name' => 'title',
                'description' => esc_html__('Enter the image title.', 'onemax'),
            ),
          array(
                'type' => 'textfield',
                'heading' => esc_html__('Instruction', 'onemax'),
                'param_name' => 'instruction',
                'description' => esc_html__('Enter the image instruction.', 'onemax'),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Image source', 'onemax'),
                'param_name' => 'source',
                'value' => array(
                    esc_html__('Media library', 'onemax') => 'media_library',
                    esc_html__('External link', 'onemax') => 'external_link',
                    esc_html__('Featured Image', 'onemax') => 'featured_image',
                ),
                'std' => 'media_library',
                'description' => esc_html__('Select image source.', 'onemax'),
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Image', 'onemax'),
                'param_name' => 'image',
                'value' => '',
                'description' => esc_html__('Select image from media library.', 'onemax'),
                'dependency' => array(
                    'element' => 'source',
                    'value' => 'media_library',
                ),
                'admin_label' => true,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('External link', 'onemax'),
                'param_name' => 'custom_src',
                'description' => esc_html__('Select external link.', 'onemax'),
                'dependency' => array(
                    'element' => 'source',
                    'value' => 'external_link',
                ),
                'admin_label' => true,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Image size', 'onemax'),
                'param_name' => 'img_size',
                'value' => 'full',
                'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'onemax'),
                'dependency' => array(
                    'element' => 'source',
                    'value' => array('media_library', 'featured_image'),
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Image size', 'onemax'),
                'param_name' => 'external_img_size',
                'value' => '',
                'description' => esc_html__('Enter image size in pixels. Example: 200x100 (Width x Height).', 'onemax'),
                'dependency' => array(
                    'element' => 'source',
                    'value' => 'external_link',
                ),
            ),

            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Image style', 'onemax'),
                'param_name' => 'style',
                'value' => getVcShared('single image styles'),
                'description' => esc_html__('Select image display style.', 'onemax'),
                'dependency' => array(
                    'element' => 'source',
                    'value' => array('media_library', 'featured_image'),
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Image style', 'onemax'),
                'param_name' => 'external_style',
                'value' => getVcShared('single image external styles'),
                'description' => esc_html__('Select image display style.', 'onemax'),
                'dependency' => array(
                    'element' => 'source',
                    'value' => 'external_link',
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Border color', 'onemax'),
                'param_name' => 'border_color',
                'value' => getVcShared('colors'),
                'std' => 'grey',
                'dependency' => array(
                    'element' => 'style',
                    'value' => array(
                        'vc_box_border',
                        'vc_box_border_circle',
                        'vc_box_outline',
                        'vc_box_outline_circle',
                        'vc_box_border_circle_2',
                        'vc_box_outline_circle_2',
                    ),
                ),
                'description' => esc_html__('Border color.', 'onemax'),
                'param_holder_class' => 'vc_colored-dropdown',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Border color', 'onemax'),
                'param_name' => 'external_border_color',
                'value' => getVcShared('colors'),
                'std' => 'grey',
                'dependency' => array(
                    'element' => 'external_style',
                    'value' => array(
                        'vc_box_border',
                        'vc_box_border_circle',
                        'vc_box_outline',
                        'vc_box_outline_circle',
                    ),
                ),
                'description' => esc_html__('Border color.', 'onemax'),
                'param_holder_class' => 'vc_colored-dropdown',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('On click action', 'onemax'),
                'param_name' => 'onclick',
                'value' => array(
                    esc_html__('None', 'onemax') => '',
                    esc_html__('Link to large image', 'onemax') => 'img_link_large',
                    esc_html__('Open prettyPhoto', 'onemax') => 'link_image',
                    esc_html__('Open custom link', 'onemax') => 'custom_link',
                    esc_html__('Zoom', 'onemax') => 'zoom',
                ),
            ),
            array(
                'type' => 'href',
                'heading' => esc_html__('Image link', 'onemax'),
                'param_name' => 'link',
                'description' => esc_html__('Enter URL if you want this image to have a link (Note: parameters like "mailto:" are also accepted).', 'onemax'),
                'dependency' => array(
                    'element' => 'onclick',
                    'value' => 'custom_link',
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Link Target', 'onemax'),
                'param_name' => 'img_link_target',
                'value' => array(
                  esc_html__('Same window', 'onemax') => '_self',
                  esc_html__('New window', 'onemax') => '_blank',
          ),
                'dependency' => array(
                    'element' => 'onclick',
                    'value' => array('custom_link', 'img_link_large'),
                ),
            ),
        array(
                'type' => 'dropdown',
                'heading' => esc_html__('Hover Style', 'onemax'),
                'param_name' => 'h_ani',
                'value' => array(
                    esc_html__('flip-vert', 'onemax') => 'flip-vert',
                    esc_html__('push-up', 'onemax') => 'push-up',
                    esc_html__('push-down', 'onemax') => 'push-down',
                    esc_html__('push-left', 'onemax') => 'push-left',
                    esc_html__('push-right', 'onemax') => 'push-right',
                    esc_html__('slide-up', 'onemax') => 'slide-up',
                    esc_html__('slide-down', 'onemax') => 'slide-down',
                    esc_html__('slide-left', 'onemax') => 'slide-left',
                    esc_html__('slide-right', 'onemax') => 'slide-right',
                    esc_html__('hinge-up', 'onemax') => 'hinge-up',
                    esc_html__('hinge-right', 'onemax') => 'hinge-right',
                    esc_html__('zoom-out', 'onemax') => 'zoom-out',
                ),
                'std' => 'flip-vert',
                'description' => esc_html__('Select the hover style.', 'onemax'),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Hover background color', 'onemax'),
                'param_name' => 'h_color',
                'description' => esc_html__('Select hover color.', 'onemax'),
                'edit_field_class' => 'vc_col-sm-6 vc_column',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Alignment', 'onemax'),
                'param_name' => 'alignment',
                'value' => array(
                    esc_html__('Center','onemax') => 'center',
                    esc_html__('Left','onemax') => 'left',
                    esc_html__('Right','onemax') => 'right',
                ),
            ),
            array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Loading Animation', 'onemax'),
                            'param_name' => 'ani',
                            'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                            'value' => array(
                                esc_html__('None','onemax') => 'none',
                                esc_html__('fade-up','onemax') => 'fade-up',
                                esc_html__('fade-down','onemax') => 'fade-down',
                                esc_html__('fade-left','onemax') => 'fade-left',
                                esc_html__('fade-right','onemax') => 'fade-right',
                                esc_html__('fade-up-right','onemax') => 'fade-up-right',
                                esc_html__('fade-up-left','onemax') => 'fade-up-left',
                                esc_html__('fade-down-right','onemax') => 'fade-down-right',
                                esc_html__('fade-down-left','onemax') => 'fade-down-left',
                                esc_html__('flip-up','onemax') => 'flip-up',
                                esc_html__('flip-down','onemax') => 'flip-down',
                                esc_html__('flip-left','onemax') => 'flip-left',
                                esc_html__('flip-right','onemax') => 'flip-right',
                                esc_html__('slide-up','onemax') => 'slide-up',
                                esc_html__('slide-down','onemax') => 'slide-down',
                                esc_html__('slide-left','onemax') => 'slide-left',
                                esc_html__('slide-right','onemax') => 'slide-right',
                                esc_html__('zoom-in','onemax') => 'zoom-in',
                                esc_html__('zoom-in-up','onemax') => 'zoom-in-up',
                                esc_html__('zoom-in-down','onemax') => 'zoom-in-down',
                                esc_html__('zoom-in-left','onemax') => 'zoom-in-left',
                                 esc_html__('zoom-in-right','onemax') => 'zoom-in-right',
                                esc_html__('zoom-out','onemax') => 'zoom-out',
                                 esc_html__('zoom-out-up','onemax') => 'zoom-out-up',
                                esc_html__('zoom-out-down','onemax') => 'zoom-out-down',
                                 esc_html__('zoom-out-left','onemax') => 'zoom-out-left',
                                esc_html__('zoom-out-right','onemax') => 'zoom-out-right',
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Animating Once', 'onemax'),
    'description' => esc_html__('If you choose false, no matter you scroll up or scroll down the element will keep on animating. The default value is ture which means the element will only animating once when it display.','onemax'),
                            'param_name' => 'aos_once',
                            'value' => array(
                                esc_html__('True','onemax') => 'true',
                                esc_html__('False','onemax') => 'false',
                            ),
                            'dependency' => array(
                                   'element' => 'ani',
                                   'value_not_equal_to' => array('none'),
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Delay', 'onemax'),
    'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                            'param_name' => 'aos_delay',
                            'value' => array(
                        '100' => '100',
                        '200' => '200',
                        '300' => '300',
                        '400' => '400',
                        '500' => '500',
                        '600' => '600',
                        '700' => '700',
                        '800' => '800',
                        '900' => '900',
                        '1000' => '1000',
                        '1100' => '1100',
                        '1200' => '1200',
                        '1300' => '1300',
                        '1400' => '1400',
                        '1500' => '1500',
                        '1600' => '1600',
                        '1700' => '1700',
                        '1800' => '1800',
                            ),
                            'dependency' => array(
                                'element' => 'ani',
                                'value_not_equal_to' => array('none'),
                            ),
                        ),
                                                // backward compatibility. since 4.6
            array(
                'type' => 'hidden',
                'param_name' => 'img_link_large',
            ),

        );
            $settings = array(
                    'name' => esc_html__('Image - classical', 'onemax'),
                    'base' => 'om_image_classical_hover',
                    'category' => esc_html__('onemax', 'onemax'),
                    'description' => esc_html__('Image with classical hover', 'onemax'),
                    'params' => $image_classical_hover_params,
                    'icon' => 'om_vc_icon_image_classical',
                    'weight' => 27,
                );
            vc_map($settings);
        }
    }
    if(!class_exists('WPBakeryShortCode_Om_Image_Classical_Hover')){
        class WPBakeryShortCode_Om_Image_Classical_Hover extends WPBakeryShortCode
        {
            public function getImageSquareSize($img_id, $img_size)
            {
                if (preg_match_all('/(\d+)x(\d+)/', $img_size, $sizes)) {
                    $exact_size = array(
                    'width' => isset($sizes[1][0]) ? $sizes[1][0] : '0',
                    'height' => isset($sizes[2][0]) ? $sizes[2][0] : '0',
                );
                } else {
                    $image_downsize = image_downsize($img_id, $img_size);
                    $exact_size = array(
                    'width' => $image_downsize[1],
                    'height' => $image_downsize[2],
                );
                }
                $exact_size_int_w = (int) $exact_size['width'];
                $exact_size_int_h = (int) $exact_size['height'];
                if (isset($exact_size['width']) && $exact_size_int_w !== $exact_size_int_h) {
                    $img_size = $exact_size_int_w > $exact_size_int_h
                    ? $exact_size['height'].'x'.$exact_size['height']
                    : $exact_size['width'].'x'.$exact_size['width'];
                }

                return $img_size;
            }
        }
    }
   /**********************************add image – morden hover to onemax*****************************************************************/
    add_shortcode('om_image_morden_hover', 'onemax_image_morden_hover_func');
    if(!function_exists('onemax_image_morden_hover_func')){
        function onemax_image_morden_hover_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_image_morden_hover.php';

            return $output;
        }
    }
    if(!function_exists('onemax_image_morden_hover_to_vc')){
        add_action('vc_before_init', 'onemax_image_morden_hover_to_vc');
        function onemax_image_morden_hover_to_vc()
        {
            $image_morden_hover_params = array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title', 'onemax'),
                'param_name' => 'title',
                'description' => esc_html__('Enter the image title.', 'onemax'),
            ),
                                                array(
                'type' => 'textfield',
                'heading' => esc_html__('Instruction', 'onemax'),
                'param_name' => 'instruction',
                'description' => esc_html__('Enter the image instruction.', 'onemax'),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Image source', 'onemax'),
                'param_name' => 'source',
                'value' => array(
                    esc_html__('Media library', 'onemax') => 'media_library',
                    esc_html__('External link', 'onemax') => 'external_link',
                    esc_html__('Featured Image', 'onemax') => 'featured_image',
                ),
                'std' => 'media_library',
                'description' => esc_html__('Select image source.', 'onemax'),
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Image', 'onemax'),
                'param_name' => 'image',
                'value' => '',
                'description' => esc_html__('Select image from media library.', 'onemax'),
                'dependency' => array(
                    'element' => 'source',
                    'value' => 'media_library',
                ),
                'admin_label' => true,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('External link', 'onemax'),
                'param_name' => 'custom_src',
                'description' => esc_html__('Select external link.', 'onemax'),
                'dependency' => array(
                    'element' => 'source',
                    'value' => 'external_link',
                ),
                'admin_label' => true,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Image size', 'onemax'),
                'param_name' => 'img_size',
                'value' => 'full',
                'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'onemax'),
                'dependency' => array(
                    'element' => 'source',
                    'value' => array('media_library', 'featured_image'),
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Image size', 'onemax'),
                'param_name' => 'external_img_size',
                'value' => '',
                'description' => esc_html__('Enter image size in pixels. Example: 200x100 (Width x Height).', 'onemax'),
                'dependency' => array(
                    'element' => 'source',
                    'value' => 'external_link',
                ),
            ),

            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Image style', 'onemax'),
                'param_name' => 'style',
                'value' => getVcShared('single image styles'),
                'description' => esc_html__('Select image display style.', 'onemax'),
                'dependency' => array(
                    'element' => 'source',
                    'value' => array('media_library', 'featured_image'),
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Image style', 'onemax'),
                'param_name' => 'external_style',
                'value' => getVcShared('single image external styles'),
                'description' => esc_html__('Select image display style.', 'onemax'),
                'dependency' => array(
                    'element' => 'source',
                    'value' => 'external_link',
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Border color', 'onemax'),
                'param_name' => 'border_color',
                'value' => getVcShared('colors'),
                'std' => 'grey',
                'dependency' => array(
                    'element' => 'style',
                    'value' => array(
                        'vc_box_border',
                        'vc_box_border_circle',
                        'vc_box_outline',
                        'vc_box_outline_circle',
                        'vc_box_border_circle_2',
                        'vc_box_outline_circle_2',
                    ),
                ),
                'description' => esc_html__('Border color.', 'onemax'),
                'param_holder_class' => 'vc_colored-dropdown',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Border color', 'onemax'),
                'param_name' => 'external_border_color',
                'value' => getVcShared('colors'),
                'std' => 'grey',
                'dependency' => array(
                    'element' => 'external_style',
                    'value' => array(
                        'vc_box_border',
                        'vc_box_border_circle',
                        'vc_box_outline',
                        'vc_box_outline_circle',
                    ),
                ),
                'description' => esc_html__('Border color.', 'onemax'),
                'param_holder_class' => 'vc_colored-dropdown',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('On click action', 'onemax'),
                'param_name' => 'onclick',
                'value' => array(
                    esc_html__('None', 'onemax') => '',
                    esc_html__('Link to large image', 'onemax') => 'img_link_large',
                    esc_html__('Open prettyPhoto', 'onemax') => 'link_image',
                    esc_html__('Open custom link', 'onemax') => 'custom_link',
                    esc_html__('Zoom', 'onemax') => 'zoom',
                ),
            ),
            array(
                'type' => 'href',
                'heading' => esc_html__('Image link', 'onemax'),
                'param_name' => 'link',
                'description' => esc_html__('Enter URL if you want this image to have a link (Note: parameters like "mailto:" are also accepted).', 'onemax'),
                'dependency' => array(
                    'element' => 'onclick',
                    'value' => 'custom_link',
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Link Target', 'onemax'),
                'param_name' => 'img_link_target',
                'value' => array(
                                esc_html__('Same window', 'onemax') => '_self',
                                esc_html__('New window', 'onemax') => '_blank',
                        ),
                'dependency' => array(
                    'element' => 'onclick',
                    'value' => array('custom_link', 'img_link_large'),
                ),
            ),
                                                array(
                'type' => 'dropdown',
                'heading' => esc_html__('Hover Style', 'onemax'),
                'param_name' => 'h_ani',
                'value' => array(
                    esc_html__('effect-bubba', 'onemax') => 'effect-bubba',
                    esc_html__('effect-honey', 'onemax') => 'effect-honey',
                    esc_html__('effect-oscar', 'onemax') => 'effect-oscar',
                    esc_html__('effect-ming', 'onemax') => 'effect-ming',
                    esc_html__('effect-jazz', 'onemax') => 'effect-jazz',
                    esc_html__('effect-goliath', 'onemax') => 'effect-goliath',
                    esc_html__('effect-duke', 'onemax') => 'effect-duke',
                    esc_html__('effect-steve', 'onemax') => 'effect-steve',
                    esc_html__('effect-apollo', 'onemax') => 'effect-apollo',
                    esc_html__('effect-sadie', 'onemax') => 'effect-sadie',
                ),
                'description' => esc_html__('Select the hover style.', 'onemax'),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Gradient Color1', 'onemax'),
                'param_name' => 'gradient1',
                'edit_field_class' => 'vc_col-sm-4 vc_column',
                'std' => '',
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Gradient Color2', 'onemax'),
                'param_name' => 'gradient2',
                'edit_field_class' => 'vc_col-sm-4 vc_column',
                'std' => '',
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Gradient Color3', 'onemax'),
                'param_name' => 'gradient3',
                'edit_field_class' => 'vc_col-sm-4 vc_column',
                'std' => '',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Alignment', 'onemax'),
                'param_name' => 'alignment',
                'value' => array(
                    esc_html__('Center','onemax') => 'center',
                    esc_html__('Left','onemax') => 'left',
                    esc_html__('Right','onemax') => 'right',
                ),
            ),
            array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Loading Animation', 'onemax'),
                            'param_name' => 'ani',
                            'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                            'value' => array(
                                esc_html__('None','onemax') => 'none',
                                esc_html__('fade-up','onemax') => 'fade-up',
                                esc_html__('fade-down','onemax') => 'fade-down',
                                esc_html__('fade-left','onemax') => 'fade-left',
                                esc_html__('fade-right','onemax') => 'fade-right',
                                esc_html__('fade-up-right','onemax') => 'fade-up-right',
                                esc_html__('fade-up-left','onemax') => 'fade-up-left',
                                esc_html__('fade-down-right','onemax') => 'fade-down-right',
                                esc_html__('fade-down-left','onemax') => 'fade-down-left',
                                esc_html__('flip-up','onemax') => 'flip-up',
                                esc_html__('flip-down' ,'onemax')=> 'flip-down',
                                esc_html__('flip-left','onemax') => 'flip-left',
                                esc_html__('flip-right','onemax') => 'flip-right',
                                esc_html__('slide-up','onemax') => 'slide-up',
                                esc_html__('slide-down','onemax') => 'slide-down',
                                esc_html__('slide-left','onemax') => 'slide-left',
                                esc_html__('slide-right','onemax') => 'slide-right',
                                esc_html__('zoom-in','onemax') => 'zoom-in',
                                esc_html__('zoom-in-up','onemax') => 'zoom-in-up',
                                esc_html__('zoom-in-down','onemax') => 'zoom-in-down',
                                esc_html__('zoom-in-left','onemax') => 'zoom-in-left',
                                 esc_html__('zoom-in-right','onemax') => 'zoom-in-right',
                                esc_html__('zoom-out','onemax') => 'zoom-out',
                                 esc_html__('zoom-out-up','onemax') => 'zoom-out-up',
                                esc_html__('zoom-out-down','onemax') => 'zoom-out-down',
                                 esc_html__('zoom-out-left','onemax') => 'zoom-out-left',
                                esc_html__('zoom-out-right','onemax') => 'zoom-out-right',
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Animating Once', 'onemax'),
    'description' => esc_html__('If you choose false, no matter you scroll up or scroll down the element will keep on animating. The default value is ture which means the element will only animating once when it display.','onemax'),
                            'param_name' => 'aos_once',
                            'value' => array(
                                esc_html__('True','onemax') => 'true',
                                esc_html__('False','onemax') => 'false',
                            ),
                            'dependency' => array(
                                   'element' => 'ani',
                                   'value_not_equal_to' => array('none'),
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Delay', 'onemax'),
    'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                            'param_name' => 'aos_delay',
                            'value' => array(
                        '100' => '100',
                        '200' => '200',
                        '300' => '300',
                        '400' => '400',
                        '500' => '500',
                        '600' => '600',
                        '700' => '700',
                        '800' => '800',
                        '900' => '900',
                        '1000' => '1000',
                        '1100' => '1100',
                        '1200' => '1200',
                        '1300' => '1300',
                        '1400' => '1400',
                        '1500' => '1500',
                        '1600' => '1600',
                        '1700' => '1700',
                        '1800' => '1800',
                            ),
                            'dependency' => array(
                                'element' => 'ani',
                                'value_not_equal_to' => array('none'),
                            ),
                        ),
                                                // backward compatibility. since 4.6
            array(
                'type' => 'hidden',
                'param_name' => 'img_link_large',
            ),

        );
            $settings = array(
                    'name' => esc_html__('Image - modern', 'onemax'),
                    'base' => 'om_image_morden_hover',
                    'category' => esc_html__('onemax', 'onemax'),
                    'description' => esc_html__('Image with modern hover', 'onemax'),
                    'params' => $image_morden_hover_params,
                     'icon' => 'om_vc_icon_image_morden',
                     'weight' => 26,
                );
            vc_map($settings);
        }
    }
    if(!class_exists('WPBakeryShortCode_Om_Image_Morden_Hover')){
        class WPBakeryShortCode_Om_Image_Morden_Hover extends WPBakeryShortCode
        {
            public function getImageSquareSize($img_id, $img_size)
            {
                if (preg_match_all('/(\d+)x(\d+)/', $img_size, $sizes)) {
                    $exact_size = array(
                    'width' => isset($sizes[1][0]) ? $sizes[1][0] : '0',
                    'height' => isset($sizes[2][0]) ? $sizes[2][0] : '0',
                );
                } else {
                    $image_downsize = image_downsize($img_id, $img_size);
                    $exact_size = array(
                    'width' => $image_downsize[1],
                    'height' => $image_downsize[2],
                );
                }
                $exact_size_int_w = (int) $exact_size['width'];
                $exact_size_int_h = (int) $exact_size['height'];
                if (isset($exact_size['width']) && $exact_size_int_w !== $exact_size_int_h) {
                    $img_size = $exact_size_int_w > $exact_size_int_h
                    ? $exact_size['height'].'x'.$exact_size['height']
                    : $exact_size['width'].'x'.$exact_size['width'];
                }

                return $img_size;
            }
        }
    }
   /**********************************add image – 3D hover to onemax*****************************************************************/
    add_shortcode('om_image_3d_hover', 'onemax_image_3d_hover_func');
    if(!function_exists('onemax_image_3d_hover_func')){
        function onemax_image_3d_hover_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_image_3d_hover.php';

            return $output;
        }
    }
    if(!function_exists('onemax_image_3d_hover_to_vc')){
        add_action('vc_before_init', 'onemax_image_3d_hover_to_vc');
        function onemax_image_3d_hover_to_vc()
        {
            $image_3d_hover_params = array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title', 'onemax'),
                'param_name' => 'title',
                'description' => esc_html__('Enter the image title.', 'onemax'),
            ),
                                                array(
                'type' => 'textfield',
                'heading' => esc_html__('Instruction', 'onemax'),
                'param_name' => 'instruction',
                'description' => esc_html__('Enter the image instruction.', 'onemax'),
            ),
                                                array(
                                                    'type' => 'colorpicker',
                                                    'heading' => esc_html__('Hover border color', 'onemax'),
                                                    'param_name' => 'h_color',
                                                    'description' => esc_html__('Select hover border color.', 'onemax'),
                                                    'edit_field_class' => 'vc_col-sm-6 vc_column',
                                                    'std' => '#00BCD4',
                                                ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Image source', 'onemax'),
                'param_name' => 'source',
                'value' => array(
                    esc_html__('Media library', 'onemax') => 'media_library',
                    esc_html__('External link', 'onemax') => 'external_link',
                    esc_html__('Featured Image', 'onemax') => 'featured_image',
                ),
                'std' => 'media_library',
                'description' => esc_html__('Select image source.', 'onemax'),
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Image', 'onemax'),
                'param_name' => 'image',
                'value' => '',
                'description' => esc_html__('Select image from media library.', 'onemax'),
                'dependency' => array(
                    'element' => 'source',
                    'value' => 'media_library',
                ),
                'admin_label' => true,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('External link', 'onemax'),
                'param_name' => 'custom_src',
                'description' => esc_html__('Select external link.', 'onemax'),
                'dependency' => array(
                    'element' => 'source',
                    'value' => 'external_link',
                ),
                'admin_label' => true,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Image size', 'onemax'),
                'param_name' => 'img_size',
                'value' => 'full',
                'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'onemax'),
                'dependency' => array(
                    'element' => 'source',
                    'value' => array('media_library', 'featured_image'),
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Image size', 'onemax'),
                'param_name' => 'external_img_size',
                'value' => '',
                'description' => esc_html__('Enter image size in pixels. Example: 200x100 (Width x Height).', 'onemax'),
                'dependency' => array(
                    'element' => 'source',
                    'value' => 'external_link',
                ),
            ),

            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Image style', 'onemax'),
                'param_name' => 'style',
                'value' => getVcShared('single image styles'),
                'description' => esc_html__('Select image display style.', 'onemax'),
                'dependency' => array(
                    'element' => 'source',
                    'value' => array('media_library', 'featured_image'),
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Image style', 'onemax'),
                'param_name' => 'external_style',
                'value' => getVcShared('single image external styles'),
                'description' => esc_html__('Select image display style.', 'onemax'),
                'dependency' => array(
                    'element' => 'source',
                    'value' => 'external_link',
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Border color', 'onemax'),
                'param_name' => 'border_color',
                'value' => getVcShared('colors'),
                'std' => 'grey',
                'dependency' => array(
                    'element' => 'style',
                    'value' => array(
                        'vc_box_border',
                        'vc_box_border_circle',
                        'vc_box_outline',
                        'vc_box_outline_circle',
                        'vc_box_border_circle_2',
                        'vc_box_outline_circle_2',
                    ),
                ),
                'description' => esc_html__('Border color.', 'onemax'),
                'param_holder_class' => 'vc_colored-dropdown',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Border color', 'onemax'),
                'param_name' => 'external_border_color',
                'value' => getVcShared('colors'),
                'std' => 'grey',
                'dependency' => array(
                    'element' => 'external_style',
                    'value' => array(
                        'vc_box_border',
                        'vc_box_border_circle',
                        'vc_box_outline',
                        'vc_box_outline_circle',
                    ),
                ),
                'description' => esc_html__('Border color.', 'onemax'),
                'param_holder_class' => 'vc_colored-dropdown',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('On click action', 'onemax'),
                'param_name' => 'onclick',
                'value' => array(
                    esc_html__('None', 'onemax') => '',
                    esc_html__('Link to large image', 'onemax') => 'img_link_large',
                    esc_html__('Open prettyPhoto', 'onemax') => 'link_image',
                    esc_html__('Open custom link', 'onemax') => 'custom_link',
                    esc_html__('Zoom', 'onemax') => 'zoom',
                ),
            ),
            array(
                'type' => 'href',
                'heading' => esc_html__('Image link', 'onemax'),
                'param_name' => 'link',
                'description' => esc_html__('Enter URL if you want this image to have a link (Note: parameters like "mailto:" are also accepted).', 'onemax'),
                'dependency' => array(
                    'element' => 'onclick',
                    'value' => 'custom_link',
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Link Target', 'onemax'),
                'param_name' => 'img_link_target',
                'value' => array(
                                esc_html__('Same window', 'onemax') => '_self',
                                esc_html__('New window', 'onemax') => '_blank',
                        ),
                'dependency' => array(
                    'element' => 'onclick',
                    'value' => array('custom_link', 'img_link_large'),
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Alignment', 'onemax'),
                'param_name' => 'alignment',
                'value' => array(
                    esc_html__('Center','onemax') => 'center',
                    esc_html__('Left','onemax') => 'left',
                    esc_html__('Right','onemax') => 'right',
                ),
            ),
            array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Loading Animation', 'onemax'),
                            'param_name' => 'ani',
                            'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                            'value' => array(
                                esc_html__('None','onemax') => 'none',
                                esc_html__('fade-up','onemax') => 'fade-up',
                                esc_html__('fade-down','onemax') => 'fade-down',
                                esc_html__('fade-left','onemax') => 'fade-left',
                                esc_html__('fade-right','onemax') => 'fade-right',
                                esc_html__('fade-up-right','onemax') => 'fade-up-right',
                                esc_html__('fade-up-left','onemax') => 'fade-up-left',
                                esc_html__('fade-down-right','onemax') => 'fade-down-right',
                                esc_html__('fade-down-left','onemax') => 'fade-down-left',
                                esc_html__('flip-up','onemax') => 'flip-up',
                                esc_html__('flip-down','onemax') => 'flip-down',
                                esc_html__('flip-left','onemax') => 'flip-left',
                                esc_html__('flip-right','onemax') => 'flip-right',
                                esc_html__('slide-up','onemax') => 'slide-up',
                                esc_html__('slide-down','onemax') => 'slide-down',
                                esc_html__('slide-left','onemax') => 'slide-left',
                                esc_html__('slide-right','onemax') => 'slide-right',
                                esc_html__('zoom-in','onemax') => 'zoom-in',
                                esc_html__('zoom-in-up','onemax') => 'zoom-in-up',
                                esc_html__('zoom-in-down','onemax') => 'zoom-in-down',
                                esc_html__('zoom-in-left','onemax') => 'zoom-in-left',
                                 esc_html__('zoom-in-right','onemax') => 'zoom-in-right',
                                esc_html__('zoom-out','onemax') => 'zoom-out',
                                 esc_html__('zoom-out-up','onemax') => 'zoom-out-up',
                                esc_html__('zoom-out-down','onemax') => 'zoom-out-down',
                                 esc_html__('zoom-out-left','onemax') => 'zoom-out-left',
                                esc_html__('zoom-out-right','onemax') => 'zoom-out-right',
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Animating Once', 'onemax'),
    'description' => esc_html__('If you choose false, no matter you scroll up or scroll down the element will keep on animating. The default value is ture which means the element will only animating once when it display.','onemax'),
                            'param_name' => 'aos_once',
                            'value' => array(
                                esc_html__('True','onemax') => 'true',
                                esc_html__('False','onemax') => 'false',
                            ),
                            'dependency' => array(
                                   'element' => 'ani',
                                   'value_not_equal_to' => array('none'),
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Delay', 'onemax'),
    'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                            'param_name' => 'aos_delay',
                            'value' => array(
                        '100' => '100',
                        '200' => '200',
                        '300' => '300',
                        '400' => '400',
                        '500' => '500',
                        '600' => '600',
                        '700' => '700',
                        '800' => '800',
                        '900' => '900',
                        '1000' => '1000',
                        '1100' => '1100',
                        '1200' => '1200',
                        '1300' => '1300',
                        '1400' => '1400',
                        '1500' => '1500',
                        '1600' => '1600',
                        '1700' => '1700',
                        '1800' => '1800',
                            ),
                            'dependency' => array(
                                'element' => 'ani',
                                'value_not_equal_to' => array('none'),
                            ),
                        ),
                                                // backward compatibility. since 4.6
            array(
                'type' => 'hidden',
                'param_name' => 'img_link_large',
            ),

        );
            $settings = array(
                    'name' => esc_html__('Image - 3D', 'onemax'),
                    'base' => 'om_image_3d_hover',
                    'category' => esc_html__('onemax', 'onemax'),
                    'description' => esc_html__('Image with 3D hover', 'onemax'),
                    'params' => $image_3d_hover_params,
                    'icon' => 'om_vc_icon_image_3d',
                    'weight' => 25,
                );
            vc_map($settings);
        }
    }
    if(!class_exists('WPBakeryShortCode_Om_Image_3d_Hover')){
        class WPBakeryShortCode_Om_Image_3d_Hover extends WPBakeryShortCode
        {
            public function getImageSquareSize($img_id, $img_size)
            {
                if (preg_match_all('/(\d+)x(\d+)/', $img_size, $sizes)) {
                    $exact_size = array(
                    'width' => isset($sizes[1][0]) ? $sizes[1][0] : '0',
                    'height' => isset($sizes[2][0]) ? $sizes[2][0] : '0',
                );
                } else {
                    $image_downsize = image_downsize($img_id, $img_size);
                    $exact_size = array(
                    'width' => $image_downsize[1],
                    'height' => $image_downsize[2],
                );
                }
                $exact_size_int_w = (int) $exact_size['width'];
                $exact_size_int_h = (int) $exact_size['height'];
                if (isset($exact_size['width']) && $exact_size_int_w !== $exact_size_int_h) {
                    $img_size = $exact_size_int_w > $exact_size_int_h
                    ? $exact_size['height'].'x'.$exact_size['height']
                    : $exact_size['width'].'x'.$exact_size['width'];
                }

                return $img_size;
            }
        }
    }

   /*************************    modify line chart to onemax    *****************************/
    $line_chart_setting = array(
        'category' => esc_html__('onemax', 'onemax'),
        'icon' => 'om_vc_icon_line_chart',
        'weight' => 24,
    );
    vc_map_update('vc_line_chart', $line_chart_setting);
    add_action('vc_after_init', function () {
    $newParamData = array(
            'type' => 'param_group',
            'heading' => esc_html__('Values', 'onemax'),
            'param_name' => 'values',
            'value' => urlencode(json_encode(array(
                array(
                    'title' => esc_html__('One', 'onemax'),
                    'y_values' => '10; 15; 20; 25; 27; 25; 23; 25',
                    'color' => 'blue',
                ),
                array(
                    'title' => esc_html__('Two', 'onemax'),
                    'y_values' => '25; 18; 16; 17; 20; 25; 30; 35',
                    'color' => 'pink',
                ),
            ))),
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', 'onemax'),
                    'param_name' => 'title',
                    'description' => esc_html__('Enter title for chart dataset.', 'onemax'),
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Y-axis values', 'onemax'),
                    'param_name' => 'y_values',
                    'description' => esc_html__('Enter values for axis (Note: separate values with ";").', 'onemax'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Color', 'onemax'),
                    'param_name' => 'color',
                    'value' => getVcShared('colors-dashed') + array(
                                    esc_html__('Custom Color', 'onemax') => 'custom',
                            ),
                    'description' => esc_html__('Select background color.', 'onemax'),
                    'admin_label' => true,
                    'param_holder_class' => 'vc_colored-dropdown',
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Custom color', 'onemax'),
                    'param_name' => 'customcolor',
                    'description' => esc_html__('Select custom background color.', 'onemax'),
                    'dependency' => array(
                        'element' => 'color',
                        'value' => array('custom'),
                    ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Custom text color', 'onemax'),
                    'param_name' => 'customtxtcolor',
                    'description' => esc_html__('Select custom text color.', 'onemax'),
                    'dependency' => array(
                        'element' => 'color',
                        'value' => array('custom'),
                    ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Custom color', 'onemax'),
                    'param_name' => 'custom_color',
                    'description' => esc_html__('Select custom chart color.', 'onemax'),
                ),
            ),
            'callbacks' => array(
                'after_add' => 'vcChartParamAfterAddCallback',
            ),
        );
                $newParamData2 = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style', 'onemax'),
            'description' => esc_html__('Select chart color style.', 'onemax'),
            'param_name' => 'style',
            'value' => array(
                esc_html__('Flat', 'onemax') => 'flat',
                esc_html__('Modern', 'onemax') => 'modern',
            ),
            'dependency' => array(
                'callback' => 'vcChartCustomColorDependency',
            ),
        );

    vc_update_shortcode_param('vc_line_chart', $newParamData);
    vc_update_shortcode_param('vc_line_chart', $newParamData2);
});

 /**********************************add list to onemax*****************************************************************/
    add_shortcode('om_list', 'onemax_list_func');
    if(!function_exists('onemax_list_func')){
        function onemax_list_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_list.php';

            return $output;
        }
    }
    if(!function_exists('onemax_list_to_vc')){
        add_action('vc_before_init', 'onemax_list_to_vc');
        function onemax_list_to_vc()
        {
            $list_params = array(
                        array(
                                'type' => 'textfield',
                                'param_name' => 'title',
                                'heading' => esc_html__('Title', 'onemax'),
                        ),
                        array(
                                'type' => 'vc_link',
                                'heading' => esc_html__('URL (Link)', 'onemax'),
                                'param_name' => 'link',
                                'description' => esc_html__('Add link to list.', 'onemax'),
        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('CSS Style', 'onemax'),
                            'description' => esc_html__('Select the list style.', 'onemax'),
                            'param_name' => 'css_style',
                            // need to be converted
                            'value' => array(
                                esc_html__('style1', 'onemax') => '1',
                                esc_html__('style2', 'onemax') => '2',
                                esc_html__('style3', 'onemax') => '3',
                                esc_html__('style4', 'onemax') => '4',
                                esc_html__('style5', 'onemax') => '5',
                                esc_html__('style6', 'onemax') => '6',
                                esc_html__('style7', 'onemax') => '7',
                            ),
                            'std' => '2',
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('CSS Color', 'onemax'),
                            'param_name' => 'css_color',
                            'description' => esc_html__('Choose style color.', 'onemax'),
                            'edit_field_class' => 'vc_col-sm-6 vc_column',
                            'std' => '#000000',
                        ),
                array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Loading Animation', 'onemax'),
                            'param_name' => 'ani',
                            'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                            'value' => array(
                                esc_html__('None','onemax') => 'none',
                                esc_html__('fade-up','onemax') => 'fade-up',
                                esc_html__('fade-down','onemax') => 'fade-down',
                                esc_html__('fade-left','onemax') => 'fade-left',
                                esc_html__('fade-right','onemax') => 'fade-right',
                                esc_html__('fade-up-right','onemax') => 'fade-up-right',
                                esc_html__('fade-up-left','onemax') => 'fade-up-left',
                                esc_html__('fade-down-right','onemax') => 'fade-down-right',
                                esc_html__('fade-down-left','onemax') => 'fade-down-left',
                                esc_html__('flip-up','onemax') => 'flip-up',
                                esc_html__('flip-down','onemax') => 'flip-down',
                                esc_html__('flip-left','onemax') => 'flip-left',
                                esc_html__('flip-right','onemax') => 'flip-right',
                                esc_html__('slide-up','onemax') => 'slide-up',
                                esc_html__('slide-down','onemax') => 'slide-down',
                                esc_html__('slide-left','onemax') => 'slide-left',
                                esc_html__('slide-right','onemax') => 'slide-right',
                                esc_html__('zoom-in','onemax') => 'zoom-in',
                                esc_html__('zoom-in-up','onemax') => 'zoom-in-up',
                                esc_html__('zoom-in-down','onemax') => 'zoom-in-down',
                                esc_html__('zoom-in-left','onemax') => 'zoom-in-left',
                                 esc_html__('zoom-in-right','onemax') => 'zoom-in-right',
                                esc_html__('zoom-out','onemax') => 'zoom-out',
                                 esc_html__('zoom-out-up','onemax') => 'zoom-out-up',
                                esc_html__('zoom-out-down','onemax') => 'zoom-out-down',
                                 esc_html__('zoom-out-left','onemax') => 'zoom-out-left',
                                esc_html__('zoom-out-right','onemax') => 'zoom-out-right',
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Animating Once', 'onemax'),
    'description' => esc_html__('If you choose false, no matter you scroll up or scroll down the element will keep on animating. The default value is ture which means the element will only animating once when it display.','onemax'),
                            'param_name' => 'aos_once',
                            'value' => array(
                                esc_html__('True','onemax') => 'true',
                                esc_html__('False','onemax') => 'false',
                            ),
                            'dependency' => array(
                                   'element' => 'ani',
                                   'value_not_equal_to' => array('none'),
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Delay', 'onemax'),
    'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                            'param_name' => 'aos_delay',
                            'value' => array(
                        '100' => '100',
                        '200' => '200',
                        '300' => '300',
                        '400' => '400',
                        '500' => '500',
                        '600' => '600',
                        '700' => '700',
                        '800' => '800',
                        '900' => '900',
                        '1000' => '1000',
                        '1100' => '1100',
                        '1200' => '1200',
                        '1300' => '1300',
                        '1400' => '1400',
                        '1500' => '1500',
                        '1600' => '1600',
                        '1700' => '1700',
                        '1800' => '1800',
                            ),
                            'dependency' => array(
                                'element' => 'ani',
                                'value_not_equal_to' => array('none'),
                            ),
                        ),
                        array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Extra class name', 'onemax'),
                                'param_name' => 'el_class',
                                'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'onemax'),
                        ),
                        array(
                                'type' => 'css_editor',
                                'heading' => esc_html__('CSS box', 'onemax'),
                                'param_name' => 'css',
                                'group' => esc_html__('Design Options', 'onemax'),
                        ),
                );
            $settings = array(
                    'name' => esc_html__('List', 'onemax'),
                    'base' => 'om_list',
                    'category' => esc_html__('onemax', 'onemax'),
                    'description' => esc_html__('A simple list', 'onemax'),
                    'params' => $list_params,
                    'icon' => 'om_vc_icon_list',
                     'weight' => 23,
                );
            vc_map($settings);
        }
    }

    /*******************************************    add OM Button into vc    ********************************************************/
    //add om button shortcode
    add_shortcode('om_btn', 'onemax_button_func');
    if(!function_exists('onemax_button_func')){
        function onemax_button_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_btn.php';

            return $output;
        }
    }
    if(!function_exists('onemax_btn_to_vc')){
        add_action('vc_before_init', 'onemax_btn_to_vc');
        function onemax_btn_to_vc()
        {
            $params = array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Button Text', 'onemax'),
                    'param_name' => 'title',
                    'value' => esc_html__('Sample', 'onemax'),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__('URL (Link)', 'onemax'),
                    'param_name' => 'link',
                    'description' => esc_html__('Add link to button.', 'onemax'),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Background', 'onemax'),
                    'param_name' => 'custom_background',
                    'description' => esc_html__('Choose the default button background color.', 'onemax'),
                    'edit_field_class' => 'vc_col-sm-6 vc_column',
                    'std' => '#ededed',
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Text', 'onemax'),
                    'param_name' => 'custom_text',
                    'description' => esc_html__('Choose the default button text color.', 'onemax'),
                    'edit_field_class' => 'vc_col-sm-6 vc_column',
                    'std' => '#000000',
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Shape', 'onemax'),
                    'description' => esc_html__('Select the button shape.', 'onemax'),
                    'param_name' => 'shape',
                    // need to be converted
                    'value' => array(
                        esc_html__('Default', 'onemax') => 'default',
                        esc_html__('Retangle', 'onemax') => 'retangle',
                        esc_html__('Round', 'onemax') => 'round',
                        esc_html__('Circle', 'onemax') => 'circle',
                    ),
                    'std' => 'default',
                ),
                array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Stretch', 'onemax'),
                        'param_name' => 'stretch',
                        'value' => array(
                            esc_html__('Disable','onemax') => 'disable',
                            esc_html__('Enable','onemax') => 'enable',
                        ),
                    ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Size', 'onemax'),
                    'param_name' => 'size',
                    'description' => esc_html__('Select the button size.', 'onemax'),
                    'value' => array(
                        esc_html__('Standard','onemax') => 'standard',
                        esc_html__('Huge','onemax') => 'huge',
                        esc_html__('Large','onemax') => 'large',
                        esc_html__('Small','onemax') => 'small',
                    ),
                    'std' => 'standard',
                    'dependency' => array(
                        'element' => 'stretch',
                        'value_not_equal_to' => array('enable',),
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('CSS Animation', 'onemax'),
                    'param_name' => 'css_animation',
                    'admin_label' => true,
                    'value' => array(
                            esc_html__('No', 'onemax') => 'no',
                            esc_html__('Winona', 'onemax') => 'winona',
                            esc_html__('Ujarak', 'onemax') => 'ujarak',
                            esc_html__('Wayra', 'onemax') => 'wayra',
                            esc_html__('Rayen', 'onemax') => 'rayen',
                            esc_html__('Nina', 'onemax') => 'nina',
                    ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Hover Color', 'onemax'),
                    'param_name' => 'hover_color',
                    'description' => esc_html__('Choose the button hover color.', 'onemax'),
                    'dependency' => array(
                            'element' => 'css_animation',
                            'value' => array('winona', 'ujarak', 'wayra', 'rayen', 'nina'),
                    ),
                    'edit_field_class' => 'vc_col-sm-6 vc_column',
                    'std' => '#8646ab',
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Hover Text', 'onemax'),
                    'param_name' => 'hover_text',
                    'description' => esc_html__('Choose the hover text color.', 'onemax'),
                    'dependency' => array(
                            'element' => 'css_animation',
                            'value' => array('winona', 'ujarak', 'wayra', 'rayen', 'nina'),
                    ),
                    'edit_field_class' => 'vc_col-sm-6 vc_column',
                    'std' => '#000000',
                ),
                array(
                    'type' => 'checkbox',
                    'heading' => esc_html__('Add border?', 'onemax'),
                    'param_name' => 'add_border',
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Border Color', 'onemax'),
                    'param_name' => 'border_color',
                    'description' => esc_html__('Choose the border color.', 'onemax'),
                    'dependency' => array(
                            'element' => 'add_border',
                            'value' => 'true',
                    ),
                    'edit_field_class' => 'vc_col-sm-6 vc_column',
                    'std' => '#ededed',
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Hover Border', 'onemax'),
                    'param_name' => 'hover_border',
                    'description' => esc_html__('Choose the hover border color.', 'onemax'),
                   'dependency' => array(
                            'element' => 'add_border',
                            'value' => 'true',
                    ),
                    'edit_field_class' => 'vc_col-sm-6 vc_column',
                    'std' => '#8646ab',
                ), 
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Alignment', 'onemax'),
                    'param_name' => 'align',
                    'description' => esc_html__('Select button alignment.', 'onemax'),
                    'value' => array(
                            esc_html__('Center', 'onemax') => 'margin:20px auto auto auto;',
                            esc_html__('Left', 'onemax') => 'margin:20px auto auto 0;',
                            esc_html__('Right', 'onemax') => 'margin:20px 0 auto auto;',
                    ),
                ),
                array(
                                                    'type' => 'dropdown',
                                                    'heading' => esc_html__('Loading Animation', 'onemax'),
                                                    'param_name' => 'ani',
                                                    'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                                                    'value' => array(
                                                        esc_html__('None','onemax') => 'none',
                                                        esc_html__('fade-up','onemax') => 'fade-up',
                                                        esc_html__('fade-down','onemax') => 'fade-down',
                                                        esc_html__('fade-left','onemax') => 'fade-left',
                                                        esc_html__('fade-right','onemax') => 'fade-right',
                                                        esc_html__('fade-up-right','onemax') => 'fade-up-right',
                                                        esc_html__('fade-up-left','onemax') => 'fade-up-left',
                                                        esc_html__('fade-down-right','onemax') => 'fade-down-right',
                                                        esc_html__('fade-down-left','onemax') => 'fade-down-left',
                                                        esc_html__('flip-up','onemax') => 'flip-up',
                                                        esc_html__('flip-down','onemax') => 'flip-down',
                                                        esc_html__('flip-left','onemax') => 'flip-left',
                                                        esc_html__('flip-right','onemax') => 'flip-right',
                                                        esc_html__('slide-up','onemax') => 'slide-up',
                                                        esc_html__('slide-down','onemax') => 'slide-down',
                                                        esc_html__('slide-left','onemax') => 'slide-left',
                                                        esc_html__('slide-right','onemax') => 'slide-right',
                                                        esc_html__('zoom-in','onemax') => 'zoom-in',
                                                        esc_html__('zoom-in-up','onemax') => 'zoom-in-up',
                                                        esc_html__('zoom-in-down','onemax') => 'zoom-in-down',
                                                        esc_html__('zoom-in-left','onemax') => 'zoom-in-left',
                                                         esc_html__('zoom-in-right','onemax') => 'zoom-in-right',
                                                        esc_html__('zoom-out','onemax') => 'zoom-out',
                                                         esc_html__('zoom-out-up','onemax') => 'zoom-out-up',
                                                        esc_html__('zoom-out-down','onemax') => 'zoom-out-down',
                                                         esc_html__('zoom-out-left','onemax') => 'zoom-out-left',
                                                        esc_html__('zoom-out-right','onemax') => 'zoom-out-right',
                                                    ),
                                                ),
                                        array(
                                                    'type' => 'dropdown',
                                                    'heading' => esc_html__('Animating Once', 'onemax'),
    'description' => esc_html__('If you choose false, no matter you scroll up or scroll down the element will keep on animating. The default value is ture which means the element will only animating once when it display.','onemax'),
                                                    'param_name' => 'aos_once',
                                                    'value' => array(
                                                        esc_html__('True','onemax') => 'true',
                                                        esc_html__('False','onemax') => 'false',
                                                    ),
                                            'dependency' => array(
                'element' => 'ani',
                'value_not_equal_to' => array(
                    'none',
                ),
            ),
                                                ),
                                        array(
                                                    'type' => 'dropdown',
                                                    'heading' => esc_html__('Delay', 'onemax'),
    'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                                                    'param_name' => 'aos_delay',
                                                    'value' => array(
                        '100' => '100',
                        '200' => '200',
                        '300' => '300',
                        '400' => '400',
                        '500' => '500',
                        '600' => '600',
                        '700' => '700',
                        '800' => '800',
                        '900' => '900',
                        '1000' => '1000',
                        '1100' => '1100',
                        '1200' => '1200',
                        '1300' => '1300',
                        '1400' => '1400',
                        '1500' => '1500',
                        '1600' => '1600',
                        '1700' => '1700',
                        '1800' => '1800',
                                                    ),
                                            'dependency' => array(
                'element' => 'ani',
                'value_not_equal_to' => array(
                    'none',
                ),
            ),
                                                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Extra class name', 'onemax'),
                    'param_name' => 'el_class',
                    'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'onemax'),
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('CSS box', 'onemax'),
                    'param_name' => 'css',
                    'group' => esc_html__('Design Options', 'onemax'),
                ),
            );
            $settings = array(
                'name' => esc_html__('OM Button', 'onemax'),
                'base' => 'om_btn',
                'description' => 'Css3 animation button',
                'class' => '',
                'category' => esc_html__('onemax', 'onemax'),
                'params' => $params,
                'icon' => 'om_vc_icon_om_button',
                 'weight' => 22,
                'custom_markup' => '{{title}}<div class="vc_btn3-container"><button class="vc_general vc_btn3 vc_btn3-size-sm vc_btn3-style-custom" style="background:#ededed;color:black;">Text on the button</button></div>',
            );
            vc_map($settings); // Note: 'om_btn' was used as a base for "OM Button" element
        }
    }

    /*************************    modify pie chart to onemax    *****************************/
    $pie_chart_setting = array(
        'category' => esc_html__('onemax', 'onemax'),
        'icon' => 'om_vc_icon_pie_chart',
        'weight' => 21,
        'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Widget title', 'onemax'),
            'param_name' => 'title',
            'description' => esc_html__('Enter text used as widget title (Note: located above content element).', 'onemax'),
            'admin_label' => true,
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Value', 'onemax'),
            'param_name' => 'value',
            'description' => esc_html__('Enter value for graph (Note: choose range from 0 to 100).', 'onemax'),
            'value' => '50',
            'admin_label' => true,
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Label value', 'onemax'),
            'param_name' => 'label_value',
            'description' => esc_html__('Enter label for pie chart (Note: leaving empty will set value from "Value" field).', 'onemax'),
            'value' => '',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Units', 'onemax'),
            'param_name' => 'units',
            'description' => esc_html__('Enter measurement units (Example: %, px, points, etc. Note: graph value and units will be appended to graph title).', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Color', 'onemax'),
            'param_name' => 'color',
            'value' => getVcShared('colors-dashed') + array(esc_html__('Custom', 'onemax') => 'custom'),
            'description' => esc_html__('Select pie chart color.', 'onemax'),
            'admin_label' => true,
            'param_holder_class' => 'vc_colored-dropdown',
            'std' => 'grey',
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Custom color', 'onemax'),
            'param_name' => 'custom_color',
            'description' => esc_html__('Select custom color.', 'onemax'),
            'dependency' => array(
                'element' => 'color',
                'value' => array('custom'),
            ),
        ),
                                            array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Custom text color', 'onemax'),
            'param_name' => 'custom_text_color',
            'description' => esc_html__('Select custom text color.', 'onemax'),
            'dependency' => array(
                'element' => 'color',
                'value' => array('custom'),
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'onemax'),
            'param_name' => 'el_class',
            'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'onemax'),
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('CSS box', 'onemax'),
            'param_name' => 'css',
            'group' => esc_html__('Design Options', 'onemax'),
        ),
    ),
    );
    vc_map_update('vc_pie', $pie_chart_setting);

    /**********************************add portfolio to onemax*****************************************************************/
    add_shortcode('om_portfolio', 'onemax_portfolio_func');
    if(!function_exists('onemax_portfolio_func')){
        function onemax_portfolio_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_portfolio.php';

            return $output;
        }
    }
    if(!function_exists('onemax_portfolio_to_vc')){
        add_action('vc_before_init', 'onemax_portfolio_to_vc');
        function onemax_portfolio_to_vc()
        {
            $portfolio_params = array(
                        array(
                                'type' => 'textfield',
                                'param_name' => 't_num',
                                'heading' => esc_html__('Total Number', 'onemax'),
                                'description' => esc_html__('Be sure you already have portfolio items, otherwise it will not display anything.', 'onemax'),

                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Columns', 'onemax'),
                                'param_name' => 'columns',
                                'value' => array(
                                    '3' => '3',
                                    '4' => '4',
                                    '6' => '6',
                                ),
                            ),
                array(
                        'type' => 'dropdown',
                        'param_name' => 'spacing',
                        'value' => array(
                                esc_html__('None', 'onemax') => '',
                                '2px' => '2',
                                '4px' => '4',
                                '6px' => '6',
                                '8px' => '8',
                                '10px' => '10',
                                '12px' => '12',
                                '14px' => '14',
                                '16px' => '16',
                                '18px' => '18',
                                '20px' => '20',
                                '30px' => '30',
                        ),
                        'heading' => esc_html__('Spacing', 'onemax'),
                        ), array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Hover Style', 'onemax'),
                        'param_name' => 'h_ani',
                        'value' => array(
                                esc_html__('effect-bubba', 'onemax') => 'effect-bubba',
                                esc_html__('effect-honey', 'onemax') => 'effect-honey',
                                esc_html__('effect-oscar', 'onemax') => 'effect-oscar',
                                esc_html__('effect-ming', 'onemax') => 'effect-ming',
                                esc_html__('effect-jazz', 'onemax') => 'effect-jazz',
                                esc_html__('effect-goliath', 'onemax') => 'effect-goliath',
                                 esc_html__('effect-duke', 'onemax') => 'effect-duke',
                                esc_html__('effect-steve', 'onemax') => 'effect-steve',
                                esc_html__('effect-apollo', 'onemax') => 'effect-apollo',
                                esc_html__('effect-sadie', 'onemax') => 'effect-sadie',
                        ),
                        'description' => esc_html__('Select the hover style.', 'onemax'),
                ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Background Gradient Color1', 'onemax'),
                        'param_name' => 'gradient1',
                        'edit_field_class' => 'vc_col-sm-4 vc_column',
                        'std' => '',
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Background Gradient Color2', 'onemax'),
                        'param_name' => 'gradient2',
                        'edit_field_class' => 'vc_col-sm-4 vc_column',
                        'std' => '',
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Background Gradient Color3', 'onemax'),
                        'param_name' => 'gradient3',
                        'edit_field_class' => 'vc_col-sm-4 vc_column',
                        'std' => '',
                    ),
                array(
                        'type' => 'dropdown',
                        'param_name' => 'order_by',
                        'value' => array(
                                esc_html__('title','onemax') => 'title',
                                esc_html__('date','onemax') => 'date',
                        ),
                        'heading' => esc_html__('Order By', 'onemax'),
                        ),
                array(
                        'type' => 'dropdown',
                        'param_name' => 'order_style',
                        'value' => array(
                                esc_html__('ASC','onemax') => 'asc',
                                esc_html__('DESC','onemax') => 'desc',
                        ),
                        'heading' => esc_html__('Order Style', 'onemax'),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'cat',
                                'heading' => esc_html__('Category', 'onemax'),
                                'description' => esc_html__('If leave empty it will display all categories,Multiple categories are separated by a comma.', 'onemax'),
                            ),
                array(
                        'type' => 'dropdown',
                        'param_name' => 'onclick',
                        'value' => array(
                                esc_html__('None','onemax') => '',
                                esc_html__('Light Box','onemax') => 'yes',
                                esc_html__('Link To Page','onemax') => 'no',
                        ),
                        'heading' => esc_html__('On Click', 'onemax'),
                        ),
                array(
                        'type' => 'dropdown',
                        'param_name' => 'title',
                        'value' => array(
                                esc_html__('YES','onemax') => 'yes',
                                esc_html__('NO','onemax') => 'no',
                        ),
                        'heading' => esc_html__('Title', 'onemax'),
                        ),
                array(
                        'type' => 'dropdown',
                        'param_name' => 'title_below',
                        'value' => array(
                                esc_html__('YES','onemax') => 'yes',
                                esc_html__('NO','onemax') => 'no',
                        ),
                    'heading' => esc_html__('Title Below', 'onemax'),
                    'dependency' => array(
                            'element' => 'title',
                            'value' => array('yes'),
                    ),
                        ),
                array(
                        'type' => 'dropdown',
                        'param_name' => 'filter',
                        'description' => esc_html__('An amazing option :)', 'onemax'),
                        'value' => array(
                                esc_html__('YES','onemax') => 'yes',
                                esc_html__('NO','onemax') => 'no',
                        ),
                        'heading' => esc_html__('Filter', 'onemax'),
                        ),
                array(
                        'type' => 'dropdown',
                        'param_name' => 'filter_align',
                        'dependency' => array(
                            'element' => 'filter',
                            'value' => array('yes'),
                        ),
                        'value' => array(
                                esc_html__('Center','onemax') => 'center',
                                esc_html__('Left','onemax') => 'left',
                                esc_html__('Right','onemax') => 'right',
                        ),
                        'heading' => esc_html__('Filter Align', 'onemax'),
                        ),
                array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Loading Animation', 'onemax'),
                            'param_name' => 'ani',
                            'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                            'value' => array(
                                esc_html__('None','onemax') => 'none',
                                esc_html__('pulse','onemax') => 'pulse',
                                esc_html__('flipInX','onemax') => 'flipInX',
                                esc_html__('fadeIn','onemax') => 'fadeIn',
                                esc_html__('fadeInUp','onemax') => 'fadeInUp',
                                esc_html__('fadeInDown','onemax') => 'fadeInDown',
                                esc_html__('fadeInLeft','onemax') => 'fadeInLeft',
                                esc_html__('fadeInRight','onemax') => 'fadeInRight',
                                esc_html__('fadeInUpBig','onemax') => 'fadeInUpBig',
                                esc_html__('fadeInDownBig','onemax') => 'fadeInDownBig',
                                esc_html__('fadeInLeftBig','onemax') => 'fadeInLeftBig',
                                esc_html__('fadeInRightBig','onemax') => 'fadeInRightBig',
                                esc_html__('bounceIn','onemax') => 'bounceIn',
                                esc_html__('bounceInUp','onemax') => 'bounceInUp',
                                esc_html__('bounceInDown','onemax') => 'bounceInDown',
                                esc_html__('bounceInLeft','onemax') => 'bounceInLeft',
                                esc_html__('bounceInRight','onemax') => 'bounceInRight',
                                esc_html__('rotateInUpLeft','onemax') => 'rotateInUpLeft',
                                esc_html__('rotateInDownLeft','onemax') => 'rotateInDownLeft',
                                esc_html__('rotateInUpRight','onemax') => 'rotateInUpRight',
                                esc_html__('rotateInDownRight','onemax') => 'rotateInDownRight',
                                esc_html__('lightSpeedRight','onemax') => 'lightSpeedRight',
                                esc_html__('lightSpeedLeft','onemax') => 'lightSpeedLeft',
                                 esc_html__('rollin','onemax') => 'rollin',
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Delay', 'onemax'),
    'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                            'param_name' => 'aos_delay',
                            'value' => array(
                        '100' => '100',
                        '200' => '200',
                        '300' => '300',
                        '400' => '400',
                        '500' => '500',
                        '600' => '600',
                        '700' => '700',
                        '800' => '800',
                        '900' => '900',
                        '1000' => '1000',
                        '1100' => '1100',
                        '1200' => '1200',
                        '1300' => '1300',
                        '1400' => '1400',
                        '1500' => '1500',
                        '1600' => '1600',
                        '1700' => '1700',
                        '1800' => '1800',
                            ),
                            'dependency' => array(
                                'element' => 'ani',
                                'value_not_equal_to' => array('none'),
                            ),
                        ),
                );
            $settings = array(
                    'name' => esc_html__('Portfolio', 'onemax'),
                    'base' => 'om_portfolio',
                    'category' => esc_html__('onemax', 'onemax'),
                    'description' => esc_html__('Featured portfolio', 'onemax'),
                    'params' => $portfolio_params,
                    'icon' => 'om_vc_icon_portfolio',
                    'weight' => 20,
                );
            vc_map($settings);
        }
    }
    if(!class_exists('WPBakeryShortCode_Om_Portfolio')){
        class WPBakeryShortCode_Om_Portfolio extends WPBakeryShortCode
        {
            public function __construct($settings)
            {
                parent::__construct($settings);
                $this->jsCssScripts();
            }
            public function jsCssScripts()
            {
                add_action( 'wp_footer', 'onemax_init_portfolios',96 );
            }


        }
    }
    if(!function_exists('onemax_init_portfolios')){
        function onemax_init_portfolios(){
        echo '<script>items_set=[{src:"portfolio10.jpg",zoom:"portfolio10.jpg",url:"",columnclass:"col-sm-6",sortcategory:"webui",title:"Unde Sed ut",itemcategory:"Print Design"},{src:"portfolio1.jpg",zoom:"portfolio1.jpg",url:"",columnclass:"col-sm-6",sortcategory:"polygraphy",title:"Tempore Nam Libero",itemcategory:"Business"},{src:"portfolio12.jpg",zoom:"portfolio12.jpg",url:"",columnclass:"col-sm-6",sortcategory:"textstyle",title:"Dolores Magni",itemcategory:"People"}],jQuery("#list").portfolio_addon({type:2,load_count:3,items:items_set});</script>'."\n";
        }
    }

     /**********************************add portfolio carousel to onemax*****************************************************************/
    add_shortcode('om_portfolio_carousel', 'onemax_portfolio_carousel_func');
    if(!function_exists('onemax_portfolio_carousel_func')){
        function onemax_portfolio_carousel_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_portfolio_carousel.php';

            return $output;
        }
    }
    if(!function_exists('onemax_portfolio_carousel_to_vc')){
        add_action('vc_before_init', 'onemax_portfolio_carousel_to_vc');
        function onemax_portfolio_carousel_to_vc()
        {
            $portfolio_carousel_params = array(
                        array(
                                'type' => 'textfield',
                                'param_name' => 't_num',
                                'heading' => esc_html__('Total Number', 'onemax'),
                                'description' => esc_html__('Be sure you already have portfolio items, otherwise it will not display anything.', 'onemax'),

                            ),
                array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Display Number', 'onemax'),
                                'param_name' => 'dis_num',
                                'description' => esc_html__('Select how many portfolio itmes you want to display by default.', 'onemax'),
                                'value' => array(
                                    '2' => '2',
                                    '3' => '3',
                                    '4' => '4',
                                    '5' => '5',
                                    '6' => '6',
                                ),
                                'std' => '6',
                            ),
                array(
                                'type' => 'colorpicker',
                                'param_name' => 'arrows_color',
                                'heading' => esc_html__('Arrows Color', 'onemax'),
                                'std' => '#009688',
                            ),
                array(
                                'type' => 'colorpicker',
                                'param_name' => 'indicators_color',
                                'heading' => esc_html__('Indicators Color', 'onemax'),
                                'std' => '#009688',
                            ),
                array(
                        'type' => 'dropdown',
                        'param_name' => 'spacing',
                        'value' => array(
                                esc_html__('None', 'onemax') => '',
                                '2px' => '2',
                                '4px' => '4',
                                '6px' => '6',
                                '8px' => '8',
                                '10px' => '10',
                                '12px' => '12',
                                '14px' => '14',
                                '16px' => '16',
                                '18px' => '18',
                                '20px' => '20',
                                '30px' => '30',
                        ),
                        'heading' => esc_html__('Spacing', 'onemax'),
                        ),
                  array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Hover Style', 'onemax'),
                        'param_name' => 'h_ani',
                        'value' => array(
                                esc_html__('effect-bubba', 'onemax') => 'effect-bubba',
                                esc_html__('effect-honey', 'onemax') => 'effect-honey',
                                esc_html__('effect-oscar', 'onemax') => 'effect-oscar',
                                esc_html__('effect-ming', 'onemax') => 'effect-ming',
                                esc_html__('effect-jazz', 'onemax') => 'effect-jazz',
                                esc_html__('effect-goliath', 'onemax') => 'effect-goliath',
                                 esc_html__('effect-duke', 'onemax') => 'effect-duke',
                                esc_html__('effect-steve', 'onemax') => 'effect-steve',
                                esc_html__('effect-apollo', 'onemax') => 'effect-apollo',
                                esc_html__('effect-sadie', 'onemax') => 'effect-sadie',
                        ),
                        'description' => esc_html__('Select the hover style.', 'onemax'),
                ),
                  array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Background Gradient Color1', 'onemax'),
                        'param_name' => 'gradient1',
                        'edit_field_class' => 'vc_col-sm-4 vc_column',
                        'std' => '',
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Background Gradient Color2', 'onemax'),
                        'param_name' => 'gradient2',
                        'edit_field_class' => 'vc_col-sm-4 vc_column',
                        'std' => '',
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Background Gradient Color3', 'onemax'),
                        'param_name' => 'gradient3',
                        'edit_field_class' => 'vc_col-sm-4 vc_column',
                        'std' => '',
                    ),
                array(
                        'type' => 'dropdown',
                        'param_name' => 'order_by',
                        'value' => array(
                                esc_html__('title','onemax') => 'title',
                                esc_html__('date','onemax') => 'date',
                        ),
                        'heading' => esc_html__('Order By', 'onemax'),
                        ),
                array(
                        'type' => 'dropdown',
                        'param_name' => 'order_style',
                        'value' => array(
                                esc_html__('ASC','onemax') => 'asc',
                                esc_html__('DESC','onemax') => 'desc',
                        ),
                        'heading' => esc_html__('Order Style', 'onemax'),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'cat',
                                'heading' => esc_html__('Category', 'onemax'),
                                  'description' => esc_html__('If leave empty it will display all categories,,Multiple categories are separated by a comma..', 'onemax'),
                            ),
                array(
                        'type' => 'dropdown',
                        'param_name' => 'onclick',
                        'value' => array(
                                esc_html__('None','onemax') => '',
                                esc_html__('Light Box','onemax') => 'yes',
                                esc_html__('Link To Page','onemax') => 'no',
                        ),
                        'heading' => esc_html__('On Click', 'onemax'),
                        ),
                array(
                        'type' => 'dropdown',
                        'param_name' => 'title',
                        'value' => array(
                                esc_html__('YES','onemax') => 'yes',
                                esc_html__('NO','onemax') => 'no',
                        ),
                        'heading' => esc_html__('Title', 'onemax'),
                        ),
                array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Loading Animation', 'onemax'),
                            'param_name' => 'ani',
                            'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                            'value' => array(
                                esc_html__('None','onemax') => 'none',
                                esc_html__('pulse','onemax') => 'pulse',
                                esc_html__('flipInX','onemax') => 'flipInX',
                                esc_html__('fadeIn','onemax') => 'fadeIn',
                                esc_html__('fadeInUp','onemax') => 'fadeInUp',
                                esc_html__('fadeInDown','onemax') => 'fadeInDown',
                                esc_html__('fadeInLeft','onemax') => 'fadeInLeft',
                                esc_html__('fadeInRight','onemax') => 'fadeInRight',
                                esc_html__('fadeInUpBig','onemax') => 'fadeInUpBig',
                                esc_html__('fadeInDownBig','onemax') => 'fadeInDownBig',
                                esc_html__('fadeInLeftBig','onemax') => 'fadeInLeftBig',
                                esc_html__('fadeInRightBig','onemax') => 'fadeInRightBig',
                                esc_html__('bounceIn','onemax') => 'bounceIn',
                                esc_html__('bounceInUp','onemax') => 'bounceInUp',
                                esc_html__('bounceInDown','onemax') => 'bounceInDown',
                                esc_html__('bounceInLeft','onemax') => 'bounceInLeft',
                                esc_html__('bounceInRight','onemax') => 'bounceInRight',
                                esc_html__('rotateInUpLeft','onemax') => 'rotateInUpLeft',
                                esc_html__('rotateInDownLeft','onemax') => 'rotateInDownLeft',
                                esc_html__('rotateInUpRight','onemax') => 'rotateInUpRight',
                                esc_html__('rotateInDownRight','onemax') => 'rotateInDownRight',
                                esc_html__('lightSpeedRight','onemax') => 'lightSpeedRight',
                                esc_html__('lightSpeedLeft','onemax') => 'lightSpeedLeft',
                                 esc_html__('rollin','onemax') => 'rollin',
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Delay', 'onemax'),
    'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                            'param_name' => 'aos_delay',
                            'value' => array(
                        '100' => '100',
                        '200' => '200',
                        '300' => '300',
                        '400' => '400',
                        '500' => '500',
                        '600' => '600',
                        '700' => '700',
                        '800' => '800',
                        '900' => '900',
                        '1000' => '1000',
                        '1100' => '1100',
                        '1200' => '1200',
                        '1300' => '1300',
                        '1400' => '1400',
                        '1500' => '1500',
                        '1600' => '1600',
                        '1700' => '1700',
                        '1800' => '1800',
                            ),
                            'dependency' => array(
                                'element' => 'ani',
                                'value_not_equal_to' => array('none'),
                            ),
                        ),
                );
            $settings = array(
                    'name' => esc_html__('Portfolio Carousel', 'onemax'),
                    'base' => 'om_portfolio_carousel',
                    'category' => esc_html__('onemax', 'onemax'),
                    'description' => esc_html__('featured portfolio carousel', 'onemax'),
                    'params' => $portfolio_carousel_params,
                    'icon' => 'om_vc_icon_portfolio_carousel',
                    'weight' => 19,
                );
            vc_map($settings);
        }
    }
    /**********************************add pricing table1 to onemax*****************************************************************/
    add_shortcode('om_pricing_table1', 'onemax_pricing_table1_func');
    if(!function_exists('onemax_pricing_table1_func')){
        function onemax_pricing_table1_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_pricing_table1.php';

            return $output;
        }
    }
    if(!function_exists('onemax_pricing_table1_to_vc')){
        add_action('vc_before_init', 'onemax_pricing_table1_to_vc');
        function onemax_pricing_table1_to_vc()
        {
            $pricing_table1_params = array(
                //General--------------------------------------------------------------------------
                    array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Plans and Sections', 'onemax'),
                                'param_name' => 'no',
                                'description' => esc_html__('Select you need plans and sections.', 'onemax'),
                                'value' => array(
                                    '2x1' => '2x1', '2x2' => '2x2', '2x3' => '2x3', '2x4' => '2x4', '2x5' => '2x5',
                                    '2x6' => '2x6', '2x7' => '2x7', '2x8' => '2x8', '2x9' => '2x9', '2x10' => '2x10',
                                    '3x1' => '3x1', '3x2' => '3x2', '3x3' => '3x3', '3x4' => '3x4', '3x5' => '3x5',
                                    '3x6' => '3x6', '3x7' => '3x7', '3x8' => '3x8', '3x9' => '3x9', '3x10' => '3x10',
                                    '4x1' => '4x1', '4x2' => '4x2', '4x3' => '4x3', '4x4' => '4x4', '4x5' => '4x5',
                                    '4x6' => '4x6', '4x7' => '4x7', '4x8' => '4x8', '4x9' => '4x9', '4x10' => '4x10',
                                ),
                                'std' => '2x1',
                            ),
                        array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Main Color', 'onemax'),
                                'param_name' => 'bg_color',
                                'description' => esc_html__('Choose the default background color.', 'onemax'),
                                'edit_field_class' => 'vc_col-sm-6 vc_column',
                                'std' => '#333',
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Hover Color', 'onemax'),
                                'param_name' => 'hover_color',
                                'description' => esc_html__('Choose the hover background color.', 'onemax'),
                                'edit_field_class' => 'vc_col-sm-6 vc_column',
                                'std' => '#299061',
                            ),
                         //Plan1----------------------------------------------------------------------------------
                        array(
                                'type' => 'textfield',
                                'param_name' => 'title1',
                                'heading' => esc_html__('Plan Title', 'onemax'),
                                'group' => 'Plan1',
                        ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_1',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x1', '2x2', '2x3', '2x4', '2x5', '2x6', '2x7', '2x8', '2x9', '2x10',
                                                                  '3x1', '3x2', '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                                  '4x1', '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', ),
                                 ),
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_2',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x2', '2x3', '2x4', '2x5', '2x6', '2x7', '2x8', '2x9', '2x10',
                                                                  '3x2', '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                                  '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', ),
                                 ),
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_3',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x3', '2x4', '2x5', '2x6', '2x7', '2x8', '2x9', '2x10',
                                                                 '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                                 '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', ),
                                 ),
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_4',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x4', '2x5', '2x6', '2x7', '2x8', '2x9', '2x10',
                                                                  '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                                  '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', ),
                                 ),
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_5',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x5', '2x6', '2x7', '2x8', '2x9', '2x10', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                                  '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', ),
                                 ),
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_6',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x6', '2x7', '2x8', '2x9', '2x10', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                                  '4x6', '4x7', '4x8', '4x9', '4x10', ),
                                 ),
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_7',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x7', '2x8', '2x9', '2x10', '3x7', '3x8', '3x9', '3x10',
                                                                 '4x7', '4x8', '4x9', '4x10', ),
                                 ),
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_8',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x8', '2x9', '2x10', '3x8', '3x9', '3x10', '4x8', '4x9', '4x10'),
                                 ),
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_9',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x9', '2x10', '3x9', '3x10', '4x9', '4x10'),
                                 ),
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_10',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x10', '3x10', '4x10'),
                                 ),
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'price1',
                                'heading' => esc_html__('Price', 'onemax'),
                                'description' => esc_html__('e.g., 10', 'onemax'),
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'per1',
                                'heading' => esc_html__('Price Unit', 'onemax'),
                                'description' => esc_html__('e.g., day', 'onemax'),
                                'std' => 'month',
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'b_text1',
                                'heading' => esc_html__('Button Text', 'onemax'),
                                'group' => 'Plan1',
                            ),
                        array(
                                'type' => 'vc_link',
                                'heading' => esc_html__('Button Link', 'onemax'),
                                'param_name' => 'link1',
                                'group' => 'Plan1',
        ),
                //plan 2---------------------------------------------------------------------------------------------
                    array(
                            'type' => 'textfield',
                            'param_name' => 'title2',
                            'heading' => esc_html__('Plan Title', 'onemax'),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_1',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('2x1', '2x2', '2x3', '2x4', '2x5', '2x6', '2x7', '2x8', '2x9', '2x10',
                                                              '3x1', '3x2', '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                              '4x1', '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', ),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_2',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('2x2', '2x3', '2x4', '2x5', '2x6', '2x7', '2x8', '2x9', '2x10',
                                                              '3x2', '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                              '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', ),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_3',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('2x3', '2x4', '2x5', '2x6', '2x7', '2x8', '2x9', '2x10',
                                                             '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                             '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', ),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_4',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('2x4', '2x5', '2x6', '2x7', '2x8', '2x9', '2x10',
                                                              '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                              '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', ),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_5',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('2x5', '2x6', '2x7', '2x8', '2x9', '2x10', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                              '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', ),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_6',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('2x6', '2x7', '2x8', '2x9', '2x10', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                              '4x6', '4x7', '4x8', '4x9', '4x10', ),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_7',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('2x7', '2x8', '2x9', '2x10', '3x7', '3x8', '3x9', '3x10',
                                                             '4x7', '4x8', '4x9', '4x10', ),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_8',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('2x8', '2x9', '2x10', '3x8', '3x9', '3x10', '4x8', '4x9', '4x10'),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_9',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('2x9', '2x10', '3x9', '3x10', '4x9', '4x10'),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_10',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('2x10', '3x10', '4x10'),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'price2',
                            'heading' => esc_html__('Price', 'onemax'),
                            'description' => esc_html__('e.g., 10', 'onemax'),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'per2',
                            'heading' => esc_html__('Price Unit', 'onemax'),
                            'description' => esc_html__('e.g., day', 'onemax'),
                            'std' => 'month',
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'b_text2',
                            'heading' => esc_html__('Button Text', 'onemax'),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'vc_link',
                            'heading' => esc_html__('Button Link', 'onemax'),
                            'param_name' => 'link2',
                            'group' => 'Plan2',
                        ),
                //plan 3---------------------------------------------------------------------------------------------
                array(
                        'type' => 'textfield',
                        'param_name' => 'title3',
                        'heading' => esc_html__('Plan Title', 'onemax'),
                        'group' => 'Plan3',
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('3x1', '3x2', '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10', '4x1', '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10'),
                         ),
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_1',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('3x1', '3x2', '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                          '4x1', '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', ),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_2',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('3x2', '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                          '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', ),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_3',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                         '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', ),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_4',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                          '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', ),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_5',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                          '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', ),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_6',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('3x6', '3x7', '3x8', '3x9', '3x10',
                                                          '4x6', '4x7', '4x8', '4x9', '4x10', ),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_7',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('3x7', '3x8', '3x9', '3x10',
                                                         '4x7', '4x8', '4x9', '4x10', ),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_8',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('3x8', '3x9', '3x10', '4x8', '4x9', '4x10'),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_9',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('3x9', '3x10', '4x9', '4x10'),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_10',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('3x10', '4x10'),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'price3',
                        'heading' => esc_html__('Price', 'onemax'),
                        'description' => esc_html__('e.g., 10', 'onemax'),
                        'dependency' => array(
                                'element' => 'no',
                                'value' => array('3x1', '3x2', '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10', '4x1',
                                '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', ),
                             ),
                        'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'per3',
                        'heading' => esc_html__('Price Unit', 'onemax'),
                        'description' => esc_html__('e.g., day', 'onemax'),
                        'dependency' => array(
                                'element' => 'no',
                                'value' => array('3x1', '3x2', '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10', '4x1',
                                '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', ),
                             ),
                        'std' => 'month',
                        'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'b_text3',
                        'heading' => esc_html__('Button Text', 'onemax'),
                        'dependency' => array(
                                'element' => 'no',
                                'value' => array('3x1', '3x2', '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10', '4x1',
                                '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', ),
                             ),
                        'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__('Button Link', 'onemax'),
                        'param_name' => 'link3',
                        'dependency' => array(
                                'element' => 'no',
                                'value' => array('3x1', '3x2', '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10', '4x1',
                                '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', ),
                             ),
                        'group' => 'Plan3',
                    ),
                 //plan 4---------------------------------------------------------------------------------------------
                array(
                        'type' => 'textfield',
                        'param_name' => 'title4',
                        'heading' => esc_html__('Plan Title', 'onemax'),
                        'group' => 'Plan4',
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('4x1', '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10'),
                         ),
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec4_1',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('4x1', '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10'),
                         ),
                         'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec4_2',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10'),
                         ),
                         'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec4_3',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10'),
                         ),
                         'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec4_4',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10'),
                         ),
                         'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec4_5',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('4x5', '4x6', '4x7', '4x8', '4x9', '4x10'),
                         ),
                         'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec4_6',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('4x6', '4x7', '4x8', '4x9', '4x10'),
                         ),
                         'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec4_7',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('4x7', '4x8', '4x9', '4x10'),
                         ),
                         'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec4_8',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('4x8', '4x9', '4x10'),
                         ),
                         'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec4_9',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('4x9', '4x10'),
                         ),
                         'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec4_10',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('4x10'),
                         ),
                         'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'price4',
                        'heading' => esc_html__('Price', 'onemax'),
                        'description' => esc_html__('e.g., 10', 'onemax'),
                        'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('4x1', '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10'),
                                 ),
                        'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'per4',
                        'heading' => esc_html__('Price Unit', 'onemax'),
                        'description' => esc_html__('e.g., day', 'onemax'),
                        'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('4x1', '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10'),
                                 ),
                        'std' => 'month',
                        'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'b_text4',
                        'heading' => esc_html__('Button Text', 'onemax'),
                        'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('4x1', '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10'),
                                 ),
                        'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__('Button Link', 'onemax'),
                        'param_name' => 'link4',
                        'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('4x1', '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10'),
                                 ),
                        'group' => 'Plan4',
                    ),
                );
            $settings = array(
                    'name' => esc_html__('Pricing Table1', 'onemax'),
                    'base' => 'om_pricing_table1',
                    'category' => esc_html__('onemax', 'onemax'),
                    'params' => $pricing_table1_params,
                    'icon' => 'om_vc_icon_prcing_table1',
                    'weight' => 18,
                );
            vc_map($settings);
        }
    }
    /**********************************add pricing table2 to onemax*****************************************************************/
    add_shortcode('om_pricing_table2', 'onemax_pricing_table2_func');
    if(!function_exists('onemax_pricing_table2_func')){
        function onemax_pricing_table2_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_pricing_table2.php';

            return $output;
        }
    }
    if(!function_exists('onemax_pricing_table2_to_vc')){
        add_action('vc_before_init', 'onemax_pricing_table2_to_vc');
        function onemax_pricing_table2_to_vc()
        {
            $pricing_table2_params = array(
                //general---------------------------------------------------

                        array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Main Color', 'onemax'),
                                'param_name' => 'bg_color',
                                'description' => esc_html__('Choose the default background color.', 'onemax'),
                                'edit_field_class' => 'vc_col-sm-6 vc_column',
                                'std' => '#333',
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Hover Color', 'onemax'),
                                'param_name' => 'hover_color',
                                'description' => esc_html__('Choose the hover background color.', 'onemax'),
                                'edit_field_class' => 'vc_col-sm-6 vc_column',
                                'std' => '#299061',
                            ),

                    array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Sections', 'onemax'),
                                'param_name' => 'no',
                                'description' => esc_html__('Select you need sections.', 'onemax'),
                                'value' => array(
                                    '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5',
                                    '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10',
                                ),
                                'std' => '1',
                            ),
                    array(
                                'type' => 'textfield',
                                'param_name' => 'title1',
                                'heading' => esc_html__('Plan Title', 'onemax'),
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_1',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10'),
                                 ),
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_2',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2', '3', '4', '5', '6', '7', '8', '9', '10'),
                                 ),
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_3',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('3', '4', '5', '6', '7', '8', '9', '10'),
                                 ),
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_4',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('4', '5', '6', '7', '8', '9', '10'),
                                 ),
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_5',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('5', '6', '7', '8', '9', '10'),
                                 ),
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_6',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('6', '7', '8', '9', '10'),
                                 ),
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_7',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('7', '8', '9', '10'),
                                 ),
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_8',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('8', '9', '10'),
                                 ),
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_9',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('9', '10'),
                                 ),
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_10',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('10'),
                                 ),
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'price1',
                                'heading' => esc_html__('Price', 'onemax'),
                                'description' => esc_html__('e.g., 10', 'onemax'),
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'per1',
                                'heading' => esc_html__('Price Unit', 'onemax'),
                                'description' => esc_html__('e.g., day', 'onemax'),
                                'std' => 'month',
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'b_text1',
                                'heading' => esc_html__('Button Text', 'onemax'),
                                'group' => 'Plan1',
                            ),
                        array(
                                'type' => 'vc_link',
                                'heading' => esc_html__('Button Link', 'onemax'),
                                'param_name' => 'link1',
                                'group' => 'Plan1',
        ),
                        array(
                                'type' => 'textfield',
                                'param_name' => 'tip1',
                                'heading' => esc_html__('Tips', 'onemax'),
                                'std' => 'Free For 30Days',
                                'group' => 'Plan1',
                            ),
                //plan 2---------------------------------------------------------------------------------------------
                    array(
                            'type' => 'textfield',
                            'param_name' => 'title2',
                            'heading' => esc_html__('Plan Title', 'onemax'),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_1',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10'),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_2',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('2', '3', '4', '5', '6', '7', '8', '9', '10'),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_3',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('3', '4', '5', '6', '7', '8', '9', '10'),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_4',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('4', '5', '6', '7', '8', '9', '10'),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_5',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('5', '6', '7', '8', '9', '10'),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_6',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('6', '7', '8', '9', '10'),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_7',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('7', '8', '9', '10'),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_8',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('8', '9', '10'),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_9',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('9', '10'),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_10',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('10'),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'price2',
                            'heading' => esc_html__('Price', 'onemax'),
                            'description' => esc_html__('e.g., 10', 'onemax'),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'per2',
                            'heading' => esc_html__('Price Unit', 'onemax'),
                            'description' => esc_html__('e.g., day', 'onemax'),
                            'std' => 'month',
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'b_text2',
                            'heading' => esc_html__('Button Text', 'onemax'),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'vc_link',
                            'heading' => esc_html__('Button Link', 'onemax'),
                            'param_name' => 'link2',
                            'group' => 'Plan2',
                        ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'tip2',
                        'heading' => esc_html__('Tips', 'onemax'),
                        'std' => 'Free For 30Days',
                        'group' => 'Plan2',
                            ),
                //plan 3---------------------------------------------------------------------------------------------
                array(
                        'type' => 'textfield',
                        'param_name' => 'title3',
                        'heading' => esc_html__('Plan Title', 'onemax'),
                        'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_1',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10'),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_2',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('2', '3', '4', '5', '6', '7', '8', '9', '10'),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_3',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('3', '4', '5', '6', '7', '8', '9', '10'),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_4',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('4', '5', '6', '7', '8', '9', '10'),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_5',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('5', '6', '7', '8', '9', '10'),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_6',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('6', '7', '8', '9', '10'),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_7',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('7', '8', '9', '10'),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_8',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('8', '9', '10'),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_9',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('9', '10'),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_10',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('10'),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'price3',
                        'heading' => esc_html__('Price', 'onemax'),
                        'description' => esc_html__('e.g., 10', 'onemax'),
                        'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'per3',
                        'heading' => esc_html__('Price Unit', 'onemax'),
                        'description' => esc_html__('e.g., day', 'onemax'),
                        'std' => 'month',
                        'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'b_text3',
                        'heading' => esc_html__('Button Text', 'onemax'),
                        'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__('Button Link', 'onemax'),
                        'param_name' => 'link3',
                        'group' => 'Plan3',
                    ),
                array(
                        'type' => 'textfield',
                        'param_name' => 'tip3',
                        'heading' => esc_html__('Tips', 'onemax'),
                        'std' => 'Free For 30Days',
                        'group' => 'Plan3',
                    ),
                );
            $settings = array(
                    'name' => esc_html__('Pricing Table2', 'onemax'),
                    'base' => 'om_pricing_table2',
                    'category' => esc_html__('onemax', 'onemax'),
                    'params' => $pricing_table2_params,
                    'icon' => 'om_vc_icon_prcing_table2',
                    'weight' => 17,
                );
            vc_map($settings);
        }
    }
    /**********************************add pricing table3 to onemax*****************************************************************/
    add_shortcode('om_pricing_table3', 'onemax_pricing_table3_func');
    if(!function_exists('onemax_pricing_table3_func')){
        function onemax_pricing_table3_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_pricing_table3.php';

            return $output;
        }
    }
    if(!function_exists('onemax_pricing_table3_to_vc')){
        add_action('vc_before_init', 'onemax_pricing_table3_to_vc');
        function onemax_pricing_table3_to_vc()
        {
            $pricing_table3_params = array(
                //general----------------------------------------------------------------------------------------------------
                    array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Plans and Sections', 'onemax'),
                                'param_name' => 'no',
                                'description' => esc_html__('Select you need plans and sections.', 'onemax'),
                                'value' => array(
                                    '2x1' => '2x1', '2x2' => '2x2', '2x3' => '2x3', '2x4' => '2x4', '2x5' => '2x5',
                                    '2x6' => '2x6', '2x7' => '2x7', '2x8' => '2x8', '2x9' => '2x9', '2x10' => '2x10',
                                    '3x1' => '3x1', '3x2' => '3x2', '3x3' => '3x3', '3x4' => '3x4', '3x5' => '3x5',
                                    '3x6' => '3x6', '3x7' => '3x7', '3x8' => '3x8', '3x9' => '3x9', '3x10' => '3x10',
                                    '4x1' => '4x1', '4x2' => '4x2', '4x3' => '4x3', '4x4' => '4x4', '4x5' => '4x5',
                                    '4x6' => '4x6', '4x7' => '4x7', '4x8' => '4x8', '4x9' => '4x9', '4x10' => '4x10',
                                    '5x1' => '5x1', '5x2' => '5x2', '5x3' => '5x3', '5x4' => '5x4', '5x5' => '5x5',
                                    '5x6' => '5x6', '5x7' => '5x7', '5x8' => '5x8', '5x9' => '5x9', '5x10' => '5x10',
                                ),
                                'std' => '2x1',
                            ),
                        array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Main Color', 'onemax'),
                                'param_name' => 'bg_color',
                                'description' => esc_html__('Choose the default background color.', 'onemax'),
                                'edit_field_class' => 'vc_col-sm-6 vc_column',
                                'std' => '#299061',
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Footer Color', 'onemax'),
                                'param_name' => 'footer_color',
                                'description' => esc_html__('Choose the footer background color.', 'onemax'),
                                'edit_field_class' => 'vc_col-sm-6 vc_column',
                                'std' => '#299061',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'title1_1',
                                'heading' => esc_html__('Section Title', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x1', '2x2', '2x3', '2x4', '2x5', '2x6', '2x7', '2x8', '2x9', '2x10',
                                                                  '3x1', '3x2', '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                                  '4x1', '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10',
                                                                  '5x1', '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                                 ),
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'title1_2',
                                'heading' => esc_html__('Section Title', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x2', '2x3', '2x4', '2x5', '2x6', '2x7', '2x8', '2x9', '2x10',
                                                                  '3x2', '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                                  '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10',
                                                                  '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                                 ),
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'title1_3',
                                'heading' => esc_html__('Section Title', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x3', '2x4', '2x5', '2x6', '2x7', '2x8', '2x9', '2x10',
                                                                 '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                                 '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10',
                                                                 '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                                 ),
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'title1_4',
                                'heading' => esc_html__('Section Title', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x4', '2x5', '2x6', '2x7', '2x8', '2x9', '2x10',
                                                                  '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                                  '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10',
                                                                  '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                                 ),
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'title1_5',
                                'heading' => esc_html__('Section Title', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x5', '2x6', '2x7', '2x8', '2x9', '2x10', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                                  '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                                 ),
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'title1_6',
                                'heading' => esc_html__('Section Title', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x6', '2x7', '2x8', '2x9', '2x10', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                                  '4x6', '4x7', '4x8', '4x9', '4x10', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                                 ),
                            ),
                         array(
                                'type' => 'textfield',
                                'param_name' => 'title1_7',
                                'heading' => esc_html__('Section Title', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x7', '2x8', '2x9', '2x10', '3x7', '3x8', '3x9', '3x10',
                                                                 '4x7', '4x8', '4x9', '4x10', '5x7', '5x8', '5x9', '5x10', ),
                                 ),
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'title1_8',
                                'heading' => esc_html__('Section Title', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x8', '2x9', '2x10', '3x8', '3x9', '3x10', '4x8', '4x9', '4x10', '5x8', '5x9', '5x10'),
                                 ),
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'title1_9',
                                'heading' => esc_html__('Section Title', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x9', '2x10', '3x9', '3x10', '4x9', '4x10', '5x9', '5x10'),
                                 ),
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'title1_10',
                                'heading' => esc_html__('Section Title', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x10', '3x10', '4x10', '5x10'),
                                 ),
                            ),

                            array(
                                'type' => 'textfield',
                                'param_name' => 'title1',
                                'heading' => esc_html__('Plan Title', 'onemax'),
                                'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_1',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x1', '2x2', '2x3', '2x4', '2x5', '2x6', '2x7', '2x8', '2x9', '2x10', '3x1', '3x2', '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                                  '4x1', '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10',
                                                                  '5x1', '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                                 ),
                                 'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_2',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x2', '2x3', '2x4', '2x5', '2x6', '2x7', '2x8', '2x9', '2x10',
                                                                  '3x2', '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                                  '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10',
                                                                  '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                                 ),
                                 'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_3',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x3', '2x4', '2x5', '2x6', '2x7', '2x8', '2x9', '2x10',
                                                                 '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                                 '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10',
                                                                 '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                                 ),
                                 'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_4',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x4', '2x5', '2x6', '2x7', '2x8', '2x9', '2x10',
                                                                  '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                                  '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10',
                                                                  '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                                 ),
                                 'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_5',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x5', '2x6', '2x7', '2x8', '2x9', '2x10', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                                  '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                                 ),
                                 'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_6',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x6', '2x7', '2x8', '2x9', '2x10', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                                  '4x6', '4x7', '4x8', '4x9', '4x10', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                                 ),
                                 'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_7',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x7', '2x8', '2x9', '2x10', '3x7', '3x8', '3x9', '3x10',
                                                                 '4x7', '4x8', '4x9', '4x10', '5x7', '5x8', '5x9', '5x10', ),
                                 ),
                                 'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_8',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x8', '2x9', '2x10', '3x8', '3x9', '3x10', '4x8', '4x9', '4x10', '5x8', '5x9', '5x10'),
                                 ),
                                 'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_9',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x9', '2x10', '3x9', '3x10', '4x9', '4x10', '5x9', '5x10'),
                                 ),
                                 'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'sec1_10',
                                'heading' => esc_html__('Section Content', 'onemax'),
                                'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('2x10', '3x10', '4x10', '5x10'),
                                 ),
                                 'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'price1',
                                'heading' => esc_html__('Price', 'onemax'),
                                'description' => esc_html__('e.g., 10', 'onemax'),
                                 'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'per1',
                                'heading' => esc_html__('Price Unit', 'onemax'),
                                'description' => esc_html__('e.g., day', 'onemax'),
                                'std' => 'month',
                                 'group' => 'Plan1',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'b_text1',
                                'heading' => esc_html__('Button Text', 'onemax'),
                                 'group' => 'Plan1',
                            ),
                        array(
                                'type' => 'vc_link',
                                'heading' => esc_html__('Button Link', 'onemax'),
                                'param_name' => 'link1',
                                 'group' => 'Plan1',
        ),
                //plan 2---------------------------------------------------------------------------------------------
                    array(
                            'type' => 'textfield',
                            'param_name' => 'title2',
                            'heading' => esc_html__('Plan Title', 'onemax'),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_1',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('2x1', '2x2', '2x3', '2x4', '2x5', '2x6', '2x7', '2x8', '2x9', '2x10',
                                                              '3x1', '3x2', '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                              '4x1', '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10',
                                                              '5x1', '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_2',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('2x2', '2x3', '2x4', '2x5', '2x6', '2x7', '2x8', '2x9', '2x10',
                                                              '3x2', '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                              '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10',
                                                              '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_3',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('2x3', '2x4', '2x5', '2x6', '2x7', '2x8', '2x9', '2x10',
                                                             '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                             '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10',
                                                             '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_4',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('2x4', '2x5', '2x6', '2x7', '2x8', '2x9', '2x10',
                                                              '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                              '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10',
                                                              '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_5',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('2x5', '2x6', '2x7', '2x8', '2x9', '2x10', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                              '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_6',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('2x6', '2x7', '2x8', '2x9', '2x10', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                              '4x6', '4x7', '4x8', '4x9', '4x10', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_7',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('2x7', '2x8', '2x9', '2x10', '3x7', '3x8', '3x9', '3x10',
                                                             '4x7', '4x8', '4x9', '4x10', '5x7', '5x8', '5x9', '5x10', ),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_8',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('2x8', '2x9', '2x10', '3x8', '3x9', '3x10', '4x8', '4x9', '4x10', '5x8', '5x9', '5x10'),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_9',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('2x9', '2x10', '3x9', '3x10', '4x9', '4x10', '5x9', '5x10'),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'sec2_10',
                            'heading' => esc_html__('Section Content', 'onemax'),
                            'dependency' => array(
                                'element' => 'no',
                                'value' => array('2x10', '3x10', '4x10', '5x10'),
                             ),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'price2',
                            'heading' => esc_html__('Price', 'onemax'),
                            'description' => esc_html__('e.g., 10', 'onemax'),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'per2',
                            'heading' => esc_html__('Price Unit', 'onemax'),
                            'description' => esc_html__('e.g., day', 'onemax'),
                            'std' => 'month',
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'b_text2',
                            'heading' => esc_html__('Button Text', 'onemax'),
                            'group' => 'Plan2',
                        ),
                        array(
                            'type' => 'vc_link',
                            'heading' => esc_html__('Button Link', 'onemax'),
                            'param_name' => 'link2',
                            'group' => 'Plan2',
                        ),
                //plan 3---------------------------------------------------------------------------------------------
                array(
                        'type' => 'textfield',
                        'param_name' => 'title3',
                        'heading' => esc_html__('Plan Title', 'onemax'),
                        'group' => 'Plan3',
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('3x1', '3x2', '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10', '4x1', '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10',
                                                          '5x1', '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                         ),
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_1',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('3x1', '3x2', '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                          '4x1', '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10',
                                                          '5x1', '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_2',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('3x2', '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                          '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10',
                                                          '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_3',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                         '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10',
                                                          '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_4',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                          '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10',
                                                          '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_5',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('3x5', '3x6', '3x7', '3x8', '3x9', '3x10',
                                                          '4x5', '4x6', '4x7', '4x8', '4x9', '4x10',
                                                            '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_6',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('3x6', '3x7', '3x8', '3x9', '3x10',
                                                          '4x6', '4x7', '4x8', '4x9', '4x10',
                                                            '5x6', '5x7', '5x8', '5x9', '5x10', ),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_7',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('3x7', '3x8', '3x9', '3x10',
                                                         '4x7', '4x8', '4x9', '4x10',
                                                            '5x7', '5x8', '5x9', '5x10', ),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_8',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('3x8', '3x9', '3x10', '4x8', '4x9', '4x10', '5x8', '5x9', '5x10'),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_9',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('3x9', '3x10', '4x9', '4x10', '5x9', '5x10'),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec3_10',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('3x10', '4x10', '5x10'),
                         ),
                         'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'price3',
                        'heading' => esc_html__('Price', 'onemax'),
                        'description' => esc_html__('e.g., 10', 'onemax'),
                        'dependency' => array(
                                'element' => 'no',
                                'value' => array('3x1', '3x2', '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10', '4x1',
                                '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', '5x1',
                                '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                             ),
                        'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'per3',
                        'heading' => esc_html__('Price Unit', 'onemax'),
                        'description' => esc_html__('e.g., day', 'onemax'),
                        'dependency' => array(
                                'element' => 'no',
                                'value' => array('3x1', '3x2', '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10', '4x1',
                                '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', '5x1',
                                '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                             ),
                        'std' => 'month',
                        'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'b_text3',
                        'heading' => esc_html__('Button Text', 'onemax'),
                        'dependency' => array(
                                'element' => 'no',
                                'value' => array('3x1', '3x2', '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10', '4x1',
                                '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', '5x1',
                                '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                             ),
                        'group' => 'Plan3',
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__('Button Link', 'onemax'),
                        'param_name' => 'link3',
                        'dependency' => array(
                                'element' => 'no',
                                'value' => array('3x1', '3x2', '3x3', '3x4', '3x5', '3x6', '3x7', '3x8', '3x9', '3x10', '4x1',
                                '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', '5x1',
                                '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                             ),
                        'group' => 'Plan3',
                    ),
                 //plan 4---------------------------------------------------------------------------------------------
                array(
                        'type' => 'textfield',
                        'param_name' => 'title4',
                        'heading' => esc_html__('Plan Title', 'onemax'),
                        'group' => 'Plan4',
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('4x1', '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', '5x1',
                                '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                         ),
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec4_1',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('4x1', '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', '5x1',
                                '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                         ),
                         'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec4_2',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10',
                                '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                         ),
                         'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec4_3',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10'),
                         ),
                         'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec4_4',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10'),
                         ),
                         'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec4_5',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('4x5', '4x6', '4x7', '4x8', '4x9', '4x10', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10'),
                         ),
                         'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec4_6',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('4x6', '4x7', '4x8', '4x9', '4x10', '5x6', '5x7', '5x8', '5x9', '5x10'),
                         ),
                         'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec4_7',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('4x7', '4x8', '4x9', '4x10', '5x7', '5x8', '5x9', '5x10'),
                         ),
                         'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec4_8',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('4x8', '4x9', '4x10', '5x8', '5x9', '5x10'),
                         ),
                         'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec4_9',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('4x9', '4x10', '5x9', '5x10'),
                         ),
                         'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec4_10',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('4x10', '5x10'),
                         ),
                         'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'price4',
                        'heading' => esc_html__('Price', 'onemax'),
                        'description' => esc_html__('e.g., 10', 'onemax'),
                        'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('4x1', '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', '5x1',
                                '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                                 ),
                        'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'per4',
                        'heading' => esc_html__('Price Unit', 'onemax'),
                        'description' => esc_html__('e.g., day', 'onemax'),
                        'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('4x1', '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', '5x1',
                                '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                                 ),
                        'std' => 'month',
                        'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'b_text4',
                        'heading' => esc_html__('Button Text', 'onemax'),
                        'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('4x1', '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', '5x1',
                                '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                                 ),
                        'group' => 'Plan4',
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__('Button Link', 'onemax'),
                        'param_name' => 'link4',
                        'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('4x1', '4x2', '4x3', '4x4', '4x5', '4x6', '4x7', '4x8', '4x9', '4x10', '5x1',
                                '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10', ),
                                 ),
                        'group' => 'Plan4',
                    ),
                //plan 5---------------------------------------------------------------------------------------------
                array(
                        'type' => 'textfield',
                        'param_name' => 'title5',
                        'heading' => esc_html__('Plan Title', 'onemax'),
                        'group' => 'Plan5',
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('5x1', '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10'),
                         ),
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec5_1',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('5x1', '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10'),
                         ),
                         'group' => 'Plan5',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec5_2',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10'),
                         ),
                         'group' => 'Plan5',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec5_3',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10'),
                         ),
                         'group' => 'Plan5',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec5_4',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10'),
                         ),
                         'group' => 'Plan5',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec5_5',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('5x5', '5x6', '5x7', '5x8', '5x9', '5x10'),
                         ),
                         'group' => 'Plan5',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec5_6',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('5x6', '5x7', '5x8', '5x9', '5x10'),
                         ),
                         'group' => 'Plan5',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec5_7',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('5x7', '5x8', '5x9', '5x10'),
                         ),
                         'group' => 'Plan5',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec5_8',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('5x8', '5x9', '5x10'),
                         ),
                         'group' => 'Plan5',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec5_9',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('5x9', '5x10'),
                         ),
                         'group' => 'Plan5',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'sec5_10',
                        'heading' => esc_html__('Section Content', 'onemax'),
                        'dependency' => array(
                            'element' => 'no',
                            'value' => array('5x10'),
                         ),
                         'group' => 'Plan5',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'price5',
                        'heading' => esc_html__('Price', 'onemax'),
                        'description' => esc_html__('e.g., 10', 'onemax'),
                        'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('5x1', '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10'),
                                 ),
                        'group' => 'Plan5',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'per5',
                        'heading' => esc_html__('Price Unit', 'onemax'),
                        'description' => esc_html__('e.g., day', 'onemax'),
                        'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('5x1', '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10'),
                                 ),
                        'std' => 'month',
                        'group' => 'Plan5',
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'b_text5',
                        'heading' => esc_html__('Button Text', 'onemax'),
                        'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('5x1', '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10'),
                                 ),
                        'group' => 'Plan5',
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__('Button Link', 'onemax'),
                        'param_name' => 'link5',
                        'dependency' => array(
                                    'element' => 'no',
                                    'value' => array('5x1', '5x2', '5x3', '5x4', '5x5', '5x6', '5x7', '5x8', '5x9', '5x10'),
                                 ),
                        'group' => 'Plan5',
                    ),
                );
            $settings = array(
                    'name' => esc_html__('Pricing Table3', 'onemax'),
                    'base' => 'om_pricing_table3',
                    'category' => esc_html__('onemax', 'onemax'),
                    'params' => $pricing_table3_params,
                    'icon' => 'om_vc_icon_prcing_table3',
                    'weight' => 16,
                );
            vc_map($settings);
        }
    }

        /*************************    move progress bar to onemax    *****************************/
   $progress_bar_setting = array(
        'category' => esc_html__('onemax', 'onemax'),
       'icon' => 'om_vc_icon_process_bar',
       'weight' => 15,
    );
    vc_map_update('vc_progress_bar', $progress_bar_setting);

    /*************************    modify round chart to onemax    *****************************/
    $round_chart_setting = array(
        'category' => esc_html__('onemax', 'onemax'),
       'icon' => 'om_vc_icon_round_chart',
        'weight' => 14,
    );
    vc_map_update('vc_round_chart', $round_chart_setting);
    add_action('vc_after_init', function () {
    $newParamData = array(
            'type' => 'param_group',
            'heading' => esc_html__('Values', 'onemax'),
            'param_name' => 'values',
            'value' => urlencode(json_encode(array(
                array(
                    'title' => esc_html__('One', 'onemax'),
                    'value' => '60',
                    'color' => 'blue',
                ),
                array(
                    'title' => esc_html__('Two', 'onemax'),
                    'value' => '40',
                    'color' => 'pink',
                ),
            ))),
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', 'onemax'),
                    'param_name' => 'title',
                    'description' => esc_html__('Enter title for chart area.', 'onemax'),
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Value', 'onemax'),
                    'param_name' => 'value',
                    'description' => esc_html__('Enter value for area.', 'onemax'),
                ),
                array(
                                                                                                            'type' => 'dropdown',
                                                                                                            'heading' => esc_html__('Color', 'onemax'),
                                                                                                            'param_name' => 'color',
                                                                                                            'value' => getVcShared('colors-dashed') + array(
                                                                                                                            esc_html__('Custom Color', 'onemax') => 'custom',
                                                                                                                    ),
                                                                                                            'description' => esc_html__('Select background color.', 'onemax'),
                                                                                                            'admin_label' => true,
                                                                                                            'param_holder_class' => 'vc_colored-dropdown',
                                                                                                    ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Custom color', 'onemax'),
                    'param_name' => 'customcolor',
                    'description' => esc_html__('Select custom background color.', 'onemax'),
                    'dependency' => array(
                        'element' => 'color',
                        'value' => array('custom'),
                    ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Custom text color', 'onemax'),
                    'param_name' => 'customtxtcolor',
                    'description' => esc_html__('Select custom text color.', 'onemax'),
                    'dependency' => array(
                        'element' => 'color',
                        'value' => array('custom'),
                    ),
                ),
                                                                                        array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Custom color', 'onemax'),
                    'param_name' => 'custom_color',
                    'description' => esc_html__('Select custom area color.', 'onemax'),
                ),
            ),
            'callbacks' => array(
                'after_add' => 'vcChartParamAfterAddCallback',
            ),
        );
                $newParamData2 = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style', 'onemax'),
            'description' => esc_html__('Select chart color style.', 'onemax'),
            'param_name' => 'style',
            'value' => array(
                esc_html__('Flat', 'onemax') => 'flat',
                esc_html__('Modern', 'onemax') => 'modern',
            ),
            'dependency' => array(
                'callback' => 'vcChartCustomColorDependency',
            ),
        );

    vc_update_shortcode_param('vc_round_chart', $newParamData);
    vc_update_shortcode_param('vc_round_chart', $newParamData2);
});
    /********************************modify vc row************************************/
    $row_params=array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Row Type', 'onemax' ),
            'param_name' => 'row_type',
            'value' => array(
                            esc_html__( 'Grid ', 'onemax' ) => 'grid',
                            esc_html__( 'Full Width Content', 'onemax' ) => 'full_width_content',
                            esc_html__( 'Full Width Background', 'onemax' ) => 'full_width_background',
                        ),
            ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Columns gap', 'onemax' ),
            'param_name' => 'gap',
            'value' => array(
                '0px' => '0',
                '1px' => '1',
                '2px' => '2',
                '3px' => '3',
                '4px' => '4',
                '5px' => '5',
                '10px' => '10',
                '15px' => '15',
                '20px' => '20',
                '25px' => '25',
                '30px' => '30',
                '35px' => '35',
            ),
            'std' => '0',
            'description' => esc_html__( 'Select gap between columns in row.', 'onemax' ),
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__('Background pictrue', 'onemax'),
            'param_name' => 'bg_img',
            'description' => esc_html__('Select custom background pictrue.', 'onemax'),
            ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Background Image Style', 'onemax'),
            'param_name' => 'row_background_style',
            'description' => esc_html__('Select background style.', 'onemax'),
            'value' => array(
                    esc_html__('Default', 'onemax') => 'default',
                    esc_html__('Cover', 'onemax') => 'cover',
                ),
            ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Background Image Repeat', 'onemax'),
            'param_name' => 'row_background_repeat',
            'value' => array(
                    esc_html__('No', 'onemax') => 'no-repeat',
                    esc_html__('Yes', 'onemax') => 'repeat',
                ),
            'dependency' => array(
                        'element' => 'row_background_style',
                        'value' => 'default',
                ),
            ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Background Color', 'onemax'),
            'param_name' => 'row_background_color',
            'description' => esc_html__('Select custom background color.', 'onemax'),
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Use video background?', 'onemax' ),
            'param_name' => 'video_bg',
            'description' => esc_html__( 'If checked, video will be used as row background.', 'onemax' ),
            'value' => array( esc_html__( 'Yes', 'onemax' ) => 'yes' ),
            ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'YouTube link', 'onemax' ),
            'param_name' => 'video_bg_url',
            'value' => 'https://www.youtube.com/watch?v=lMJXxhRFO1k',
            // default video url
            'description' => esc_html__( 'Add YouTube link.', 'onemax' ),
            'dependency' => array(
                    'element' => 'video_bg',
                    'not_empty' => true,
                    ),
            ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Parallax', 'onemax' ),
            'param_name' => 'video_bg_parallax',
            'value' => array(
                    esc_html__( 'None', 'onemax' ) => '',
                    esc_html__( 'Simple', 'onemax' ) => 'content-moving',
                    esc_html__( 'With fade', 'onemax' ) => 'content-moving-fade',
            ),
            'description' => esc_html__( 'Add parallax type background for row.', 'onemax' ),
            'dependency' => array(
                    'element' => 'video_bg',
                    'not_empty' => true,
                    ),
            ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Parallax', 'onemax' ),
            'param_name' => 'parallax',
            'value' => array(
                    esc_html__( 'None', 'onemax' ) => '',
                    esc_html__( 'Simple', 'onemax' ) => 'content-moving',
                    esc_html__( 'With fade', 'onemax' ) => 'content-moving-fade',
            ),
            'description' => esc_html__( 'Add parallax type background for row (Note: If no image is specified, parallax will use background image from Design Options).', 'onemax' ),
            'dependency' => array(
                    'element' => 'video_bg',
                    'is_empty' => true,
                    ),
            ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Image', 'onemax' ),
            'param_name' => 'parallax_image',
            'value' => '',
            'description' => esc_html__( 'Select image from media library.', 'onemax' ),
            'dependency' => array(
                    'element' => 'parallax',
                    'not_empty' => true,
                    ),
            ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Parallax speed', 'onemax' ),
            'param_name' => 'parallax_speed_video',
            'value' => '1.5',
            'description' => esc_html__( 'Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)', 'onemax' ),
            'dependency' => array(
                    'element' => 'video_bg_parallax',
                    'not_empty' => true,
                    ),
            ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Parallax speed', 'onemax' ),
            'param_name' => 'parallax_speed_bg',
            'value' => '1.5',
            'description' => esc_html__( 'Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)', 'onemax' ),
            'dependency' => array(
                    'element' => 'parallax',
                    'not_empty' => true,
                    ),
            ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Text Align', 'onemax' ),
            'param_name' => 'txt_align',
            'value' => array(
                            esc_html__( 'Left', 'onemax' ) => 'left',
                            esc_html__( 'Center ', 'onemax' ) => 'center',
                            esc_html__( 'Right', 'onemax' ) => 'right',
                        ),
            ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Padding Top', 'onemax' ),
            'param_name' => 'padding_top',
            ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Padding Bottom', 'onemax' ),
            'param_name' => 'padding_bottom',
            ),
        array(
            'type' => 'el_id',
            'heading' => esc_html__( 'Row ID', 'onemax' ),
            'param_name' => 'el_id',
            'description' => sprintf( esc_html__( 'Enter row ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'onemax' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
            ),
    array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Disable row', 'onemax' ),
            'param_name' => 'disable_element', // Inner param name.
            'description' => esc_html__( 'If checked the row won\'t be visible on the public side of your website. You can switch it back any time.', 'onemax' ),
            'value' => array( esc_html__( 'Yes', 'onemax' ) => 'yes' ),
    ),
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
    );
    $row_setting=array(
        'category' => esc_html__('onemax', 'onemax'),
        'weight' => 13,
        'params' =>$row_params
    );
    vc_map_update('vc_row', $row_setting);
    /********************************modify vc inner row************************************/
    $inner_row_params=array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Row Type', 'onemax' ),
            'param_name' => 'inner_row_type',
            'value' => array(
                            esc_html__( 'Grid ', 'onemax' ) => 'grid',
                            esc_html__( 'Full Width Content', 'onemax' ) => 'full_width_content',
                            esc_html__( 'Full Width Background', 'onemax' ) => 'full_width_background',
                        ),
            ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Columns gap', 'onemax' ),
            'param_name' => 'inner_gap',
            'value' => array(
                '0px' => '0',
                '1px' => '1',
                '2px' => '2',
                '3px' => '3',
                '4px' => '4',
                '5px' => '5',
                '10px' => '10',
                '15px' => '15',
                '20px' => '20',
                '25px' => '25',
                '30px' => '30',
                '35px' => '35',
            ),
            'std' => '0',
            'description' => esc_html__( 'Select gap between columns in row.', 'onemax' ),
        ),
        array(
            'type' => 'el_id',
            'heading' => esc_html__( 'Row ID', 'onemax' ),
            'param_name' => 'el_id',
            'description' => sprintf( esc_html__( 'Enter optional row ID. Make sure it is unique, and it is valid as w3c specification: %s (Must not have spaces)', 'onemax' ), '<a target="_blank" href="http://www.w3schools.com/tags/att_global_id.asp">' . esc_html__( 'link', 'onemax' ) . '</a>' ),
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__('Background pictrue', 'onemax'),
            'param_name' => 'inner_bg_img',
            'description' => esc_html__('Select custom background pictrue.', 'onemax'),
            ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Background Style', 'onemax'),
            'param_name' => 'inner_row_background_style',
            'description' => esc_html__('Select background style.', 'onemax'),
            'value' => array(
                    esc_html__('Default', 'onemax') => 'default',
                    esc_html__('Cover', 'onemax') => 'cover',
                ),
            ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Background Repeat', 'onemax'),
            'param_name' => 'inner_row_background_repeat',
            'value' => array(
                    esc_html__('No', 'onemax') => 'no-repeat',
                    esc_html__('Yes', 'onemax') => 'repeat',
                ),
            'dependency' => array(
                        'element' => 'inner_row_background_style',
                        'value' => 'default',
                ),
            ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Background Color', 'onemax'),
            'param_name' => 'inner_row_background_color',
            'description' => esc_html__('Select custom background color.', 'onemax'),
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Equal height', 'onemax' ),
            'param_name' => 'equal_height',
            'description' => esc_html__( 'If checked columns will be set to equal height.', 'onemax' ),
            'value' => array( esc_html__( 'Yes', 'onemax' ) => 'yes' )
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Content position', 'onemax' ),
            'param_name' => 'content_placement',
            'value' => array(
                esc_html__( 'Default', 'onemax' ) => '',
                esc_html__( 'Top', 'onemax' ) => 'top',
                esc_html__( 'Middle', 'onemax' ) => 'middle',
                esc_html__( 'Bottom', 'onemax' ) => 'bottom',
            ),
            'description' => esc_html__( 'Select content position within columns.', 'onemax' ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Disable row', 'onemax' ),
            'param_name' => 'disable_element', // Inner param name.
            'description' => esc_html__( 'If checked the row won\'t be visible on the public side of your website. You can switch it back any time.', 'onemax' ),
            'value' => array( esc_html__( 'Yes', 'onemax' ) => 'yes' ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Padding Top', 'onemax' ),
            'param_name' => 'inner_padding_top',
            ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Padding Bottom', 'onemax' ),
            'param_name' => 'inner_padding_bottom',
            ),
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
    );
    $inner_row_setting=array(
        'category' => esc_html__('onemax', 'onemax'),
        'params' =>$inner_row_params
    );
    vc_map_update('vc_row_inner', $inner_row_setting);
    /*************************    move Separator,Separator With Text to onemax    *****************************/
    $separator_setting = array(
        'category' => esc_html__('onemax', 'onemax'),
        'icon' => 'om_vc_icon_separator',
        'weight' => 12,
    );
    vc_remove_param('vc_text_separator', 'title');
    $separator_icon_setting = array(
        'name' => esc_html__('Separator with Icon', 'onemax'),
        'category' => esc_html__('onemax', 'onemax'),
        'icon' => 'om_vc_icon_separator_with_icon',
        'weight' => 11,
    );
    vc_map_update('vc_separator', $separator_setting);
    vc_map_update('vc_text_separator', $separator_icon_setting);

    /**********************************modify Tabs to onemax*****************************************************************/
    $tabs_params = array(
        array(
            'type' => 'textfield',
            'param_name' => 'title',
            'heading' => esc_html__('Widget title', 'onemax'),
            'description' => esc_html__('Enter text used as widget title (Note: located above content element).', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'style',
            'value' => array(
                esc_html__('Classic', 'onemax') => 'classic',
                esc_html__('Modern', 'onemax') => 'modern',
                esc_html__('Flat', 'onemax') => 'flat',
                esc_html__('Outline', 'onemax') => 'outline',
            ),
            'heading' => esc_html__('Style', 'onemax'),
            'description' => esc_html__('Select tabs display style.', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'shape',
            'value' => array(
                esc_html__('Rounded', 'onemax') => 'rounded',
                esc_html__('Square', 'onemax') => 'square',
                esc_html__('Round', 'onemax') => 'round',
            ),
            'heading' => esc_html__('Shape', 'onemax'),
            'description' => esc_html__('Select tabs shape.', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'color',
            'heading' => esc_html__('Color', 'onemax'),
            'description' => esc_html__('Select tabs color.', 'onemax'),
            'value' => array_merge(getVcShared('colors-dashed'), array(esc_html__('Custom', 'onemax') => 'custom')),
            'std' => 'grey',
            'param_holder_class' => 'vc_colored-dropdown',
        ),
                                             array(
                                                    'type' => 'colorpicker',
                                                    'heading' => esc_html__('Custom Color', 'onemax'),
                                                    'param_name' => 'custom_color',
                                                    'description' => esc_html__('Select custom color for your tabs.', 'onemax'),
                                                   'dependency' => array(
                                                            'element' => 'color',
                                                            'value' => 'custom',
                                                    ),
                                                    'edit_field_class' => 'vc_col-sm-6 vc_column',
                                                    'std' => '#8646ab',
                                            ),
                                            array(
                                                    'type' => 'colorpicker',
                                                    'heading' => 'Section Background',
                                                    'param_name' => 'sec_bg',
                                                    'description' => esc_html__('Select section background color', 'onemax'),
                                                    //'edit_field_class' => 'vc_col-sm-6 vc_column',
                                                    'std' => '#f8f8f8',
                                            ),

        array(
            'type' => 'checkbox',
            'param_name' => 'no_fill_content_area',
            'heading' => esc_html__('Do not fill content area?', 'onemax'),
            'description' => esc_html__('Do not fill content area with color.', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'spacing',
            'value' => array(
                esc_html__('None', 'onemax') => '',
                '1px' => '1',
                '2px' => '2',
                '3px' => '3',
                '4px' => '4',
                '5px' => '5',
                '10px' => '10',
                '15px' => '15',
                '20px' => '20',
                '25px' => '25',
                '30px' => '30',
                '35px' => '35',
            ),
            'heading' => esc_html__('Spacing', 'onemax'),
            'description' => esc_html__('Select tabs spacing.', 'onemax'),
            'std' => '1',
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'gap',
            'value' => array(
                esc_html__('None', 'onemax') => '',
                '1px' => '1',
                '2px' => '2',
                '3px' => '3',
                '4px' => '4',
                '5px' => '5',
                '10px' => '10',
                '15px' => '15',
                '20px' => '20',
                '25px' => '25',
                '30px' => '30',
                '35px' => '35',
            ),
            'heading' => esc_html__('Gap', 'onemax'),
            'description' => esc_html__('Select tabs gap.', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'tab_position',
            'value' => array(
                esc_html__('Top', 'onemax') => 'top',
                esc_html__('Bottom', 'onemax') => 'bottom',
            ),
            'heading' => esc_html__('Position', 'onemax'),
            'description' => esc_html__('Select tabs navigation position.', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'alignment',
            'value' => array(
                esc_html__('Left', 'onemax') => 'left',
                esc_html__('Right', 'onemax') => 'right',
                esc_html__('Center', 'onemax') => 'center',
            ),
            'heading' => esc_html__('Alignment', 'onemax'),
            'description' => esc_html__('Select tabs section title alignment.', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'autoplay',
            'value' => array(
                esc_html__('None', 'onemax') => 'none',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '10' => '10',
                '20' => '20',
                '30' => '30',
                '40' => '40',
                '50' => '50',
                '60' => '60',
            ),
            'std' => 'none',
            'heading' => esc_html__('Autoplay', 'onemax'),
            'description' => esc_html__('Select auto rotate for tabs in seconds (Note: disabled by default).', 'onemax'),
        ),
        array(
            'type' => 'textfield',
            'param_name' => 'active_section',
            'heading' => esc_html__('Active section', 'onemax'),
            'value' => 1,
            'description' => esc_html__('Enter active section number (Note: to have all sections closed on initial load enter non-existing number).', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'pagination_style',
            'value' => array(
                esc_html__('None', 'onemax') => '',
                esc_html__('Square Dots', 'onemax') => 'outline-square',
                esc_html__('Radio Dots', 'onemax') => 'outline-round',
                esc_html__('Point Dots', 'onemax') => 'flat-round',
                esc_html__('Fill Square Dots', 'onemax') => 'flat-square',
                esc_html__('Rounded Fill Square Dots', 'onemax') => 'flat-rounded',
            ),
            'heading' => esc_html__('Pagination style', 'onemax'),
            'description' => esc_html__('Select pagination style.', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'pagination_color',
            'value' => getVcShared('colors-dashed'),
            'heading' => esc_html__('Pagination color', 'onemax'),
            'description' => esc_html__('Select pagination color.', 'onemax'),
            'param_holder_class' => 'vc_colored-dropdown',
            'std' => 'grey',
            'dependency' => array(
                'element' => 'pagination_style',
                'not_empty' => true,
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'onemax'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'onemax'),
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('CSS box', 'onemax'),
            'param_name' => 'css',
            'group' => esc_html__('Design Options', 'onemax'),
        ),
    );
    $tabs_setting = array(
        'category' => esc_html__('onemax', 'onemax'),
        'params' => $tabs_params,
        'icon' => 'om_vc_icon_tab',
        'weight' => 10,
    );
    vc_map_update('vc_tta_tabs', $tabs_setting);

      /**********************************add team to onemax*****************************************************************/
    add_shortcode('om_team', 'onemax_team_func');
    if(!function_exists('onemax_team_func')){
        function onemax_team_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_team.php';

            return $output;
        }
    }
    if(!function_exists('onemax_team_to_vc')){
        add_action('vc_before_init', 'onemax_team_to_vc');
        function onemax_team_to_vc()
        {
            $team_params = array(
                    array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Team Style', 'onemax'),
                                'param_name' => 'style',
                                'description' => esc_html__('Select team style.', 'onemax'),
                                'value' => array(
                                    'Style 1' => 'style1',
                                    'Style 2' => 'style2',
                                    'Style 3' => 'style3',
                                ),
                                'std' => 'style1',
                            ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Team background color', 'onemax'),
                        'param_name' => 'team_bg_color',
                        'dependency' => array(
                                'element' => 'style',
                                'value' => 'style1',
                        ),
                        'std' => '#d12f58',
                    ),
                     array(
                                'type' => 'attach_image',
                                'heading' => esc_html__('Image', 'onemax'),
                                'param_name' => 'image',
                                'value' => '',
                                'description' => esc_html__('Select images from media library.', 'onemax'),
                        ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'name',
                                'heading' => esc_html__('Name', 'onemax'),
                            ),
                            array(
                                    'type' => 'colorpicker',
                                    'heading' => esc_html__('Name color', 'onemax'),
                                    'param_name' => 'name_color',
                                    'std' => '#000000',
                                ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'title',
                                'heading' => esc_html__('Title', 'onemax'),
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Title color', 'onemax'),
                                'param_name' => 'title_color',
                                'std' => '#000000',
                            ),
                            array(
                                'type' => 'textarea',
                                'param_name' => 'instruction',
                                'heading' => esc_html__('Instruction', 'onemax'),
                                'dependency' => array(
                                    'element' => 'style',
                                    'value' => array('style3'),
                                 ),
                            ),
                            array(
                                'type' => 'colorpicker',
                                'param_name' => 'instruction_color',
                                'heading' => esc_html__('Instruction color', 'onemax'),
                                'dependency' => array(
                                    'element' => 'style',
                                    'value' => array('style3'),
                                 ),
                                'std' => '#000000',
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Hover Style', 'onemax'),
                                'param_name' => 'h_ani',
                                'value' => array(
                                    esc_html__('None', 'onemax') => 'none',
                                    esc_html__('effect-bubba', 'onemax') => 'effect-bubba',
                                    esc_html__('effect-honey', 'onemax') => 'effect-honey',
                                    esc_html__('effect-oscar', 'onemax') => 'effect-oscar',
                                    esc_html__('effect-ming', 'onemax') => 'effect-ming',
                                    esc_html__('effect-jazz', 'onemax') => 'effect-jazz',
                                    esc_html__('effect-goliath', 'onemax') => 'effect-goliath',
                                    esc_html__('effect-duke', 'onemax') => 'effect-duke',
                                    esc_html__('effect-steve', 'onemax') => 'effect-steve',
                                    esc_html__('effect-apollo', 'onemax') => 'effect-apollo',
                                ),
                                'description' => esc_html__('Select the hover style.', 'onemax'),
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Background Gradient Color1', 'onemax'),
                                'param_name' => 'gradient1',
                                'edit_field_class' => 'vc_col-sm-4 vc_column',
                                'std' => '',
                                'dependency'=>array('element' => 'h_ani','value_not_equal_to' =>array('none')),
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Background Gradient Color2', 'onemax'),
                                'param_name' => 'gradient2',
                                'edit_field_class' => 'vc_col-sm-4 vc_column',
                                'std' => '',
                                'dependency'=>array('element' => 'h_ani','value_not_equal_to' =>array('none')),
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Background Gradient Color3', 'onemax'),
                                'param_name' => 'gradient3',
                                'edit_field_class' => 'vc_col-sm-4 vc_column',
                                'std' => '',
                                'dependency'=>array('element' => 'h_ani','value_not_equal_to' =>array('none')),
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Alignment', 'onemax'),
                                'param_name' => 'alignment',
                                'value' => array(
                                    esc_html__('Center', 'onemax') => 'auto auto auto auto',
                                    esc_html__('Left', 'onemax') => 'auto auto auto 0',
                                    esc_html__('Right', 'onemax') => 'auto 0 auto auto',
                                ),
                            ),
                array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Loading Animation', 'onemax'),
                            'param_name' => 'ani',
                            'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                            'value' => array(
                                esc_html__('None','onemax') => 'none',
                                esc_html__('fade-up','onemax') => 'fade-up',
                                esc_html__('fade-down','onemax') => 'fade-down',
                                esc_html__('fade-left','onemax') => 'fade-left',
                                esc_html__('fade-right','onemax') => 'fade-right',
                                esc_html__('fade-up-right','onemax') => 'fade-up-right',
                                esc_html__('fade-up-left','onemax') => 'fade-up-left',
                                esc_html__('fade-down-right','onemax') => 'fade-down-right',
                                esc_html__('fade-down-left','onemax') => 'fade-down-left',
                                esc_html__('flip-up','onemax') => 'flip-up',
                                esc_html__('flip-down','onemax') => 'flip-down',
                                esc_html__('flip-left','onemax') => 'flip-left',
                                esc_html__('flip-right','onemax') => 'flip-right',
                                esc_html__('slide-up','onemax') => 'slide-up',
                                esc_html__('slide-down','onemax') => 'slide-down',
                                esc_html__('slide-left','onemax') => 'slide-left',
                                esc_html__('slide-right','onemax') => 'slide-right',
                                esc_html__('zoom-in','onemax') => 'zoom-in',
                                esc_html__('zoom-in-up','onemax') => 'zoom-in-up',
                                esc_html__('zoom-in-down','onemax') => 'zoom-in-down',
                                esc_html__('zoom-in-left','onemax') => 'zoom-in-left',
                                 esc_html__('zoom-in-right','onemax') => 'zoom-in-right',
                                esc_html__('zoom-out','onemax') => 'zoom-out',
                                 esc_html__('zoom-out-up','onemax') => 'zoom-out-up',
                                esc_html__('zoom-out-down','onemax') => 'zoom-out-down',
                                 esc_html__('zoom-out-left','onemax') => 'zoom-out-left',
                                esc_html__('zoom-out-right','onemax') => 'zoom-out-right',
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Animating Once', 'onemax'),
    'description' => esc_html__('If you choose false, no matter you scroll up or scroll down the element will keep on animating. The default value is ture which means the element will only animating once when it display.','onemax'),
                            'param_name' => 'aos_once',
                            'value' => array(
                                esc_html__('True','onemax') => 'true',
                                esc_html__('False','onemax') => 'false',
                            ),
                            'dependency' => array(
                                   'element' => 'ani',
                                   'value_not_equal_to' => array('none'),
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Delay', 'onemax'),
    'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                            'param_name' => 'aos_delay',
                            'value' => array(
                        '100' => '100',
                        '200' => '200',
                        '300' => '300',
                        '400' => '400',
                        '500' => '500',
                        '600' => '600',
                        '700' => '700',
                        '800' => '800',
                        '900' => '900',
                        '1000' => '1000',
                        '1100' => '1100',
                        '1200' => '1200',
                        '1300' => '1300',
                        '1400' => '1400',
                        '1500' => '1500',
                        '1600' => '1600',
                        '1700' => '1700',
                        '1800' => '1800',
                            ),
                            'dependency' => array(
                                'element' => 'ani',
                                'value_not_equal_to' => array('none'),
                            ),
                        ),
                );
            $settings = array(
                    'name' => esc_html__('Team', 'onemax'),
                    'base' => 'om_team',
                    'category' => esc_html__('onemax', 'onemax'),
                    'description' => esc_html__('Team with image and title', 'onemax'),
                    'params' => $team_params,
                    'icon' => 'om_vc_icon_team',
                    'weight' => 9,
                );
            vc_map($settings);
        }
    }
    /**********************************add team list to onemax*****************************************************************/
    add_shortcode('om_team_list', 'onemax_team_list_func');
    if(!function_exists('onemax_team_list_func')){
        function onemax_team_list_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_team_list.php';

            return $output;
        }
    }
    if(!function_exists('onemax_team_list_to_vc')){
        add_action('vc_before_init', 'onemax_team_list_to_vc');
        function onemax_team_list_to_vc()
        {
            $team_list_params = array(
                     array(
                                'type' => 'attach_image',
                                'heading' => esc_html__('Image 1', 'onemax'),
                                'param_name' => 'image1',
                                'value' => '',
                                'description' => esc_html__('Select images from media library.', 'onemax'),
                        ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'name1',
                                'heading' => esc_html__('Name 1', 'onemax'),
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Name 1 color', 'onemax'),
                                'param_name' => 'name_color1',
                                'std' => '#000000',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'title1',
                                'heading' => esc_html__('Title 1', 'onemax'),
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Title 1 color', 'onemax'),
                                'param_name' => 'title_color1',
                                'std' => '#000000',
                            ),
                            array(
                                'type' => 'textarea',
                                'param_name' => 'instruction1',
                                'heading' => esc_html__('Instruction 1', 'onemax'),
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Instruction 1 color', 'onemax'),
                                'param_name' => 'instruction_color1',
                                'std' => '#000000',
                            ),
                            array(
                                'type' => 'attach_image',
                                'heading' => esc_html__('Image 2', 'onemax'),
                                'param_name' => 'image2',
                                'value' => '',
                                'description' => esc_html__('Select images from media library.', 'onemax'),
                        ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'name2',
                                'heading' => esc_html__('Name 2', 'onemax'),
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Name 2 color', 'onemax'),
                                'param_name' => 'name_color2',
                                'std' => '#000000',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'title2',
                                'heading' => esc_html__('Title 2', 'onemax'),
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Title 2 color', 'onemax'),
                                'param_name' => 'title_color2',
                                'std' => '#000000',
                            ),
                            array(
                                'type' => 'textarea',
                                'param_name' => 'instruction2',
                                'heading' => esc_html__('Instruction 2', 'onemax'),
                            ),
                            array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Instruction 2 color', 'onemax'),
                                'param_name' => 'instruction_color2',
                                'std' => '#000000',
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Alignment', 'onemax'),
                                'param_name' => 'alignment',
                                'value' => array(
                                    esc_html__('Center', 'onemax') => 'center',
                                    esc_html__('Left', 'onemax') => 'flex-start',
                                    esc_html__('Right', 'onemax') => 'flex-end',
                                ),
                            ),
                array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Loading Animation', 'onemax'),
                            'param_name' => 'ani',
                            'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                            'value' => array(
                                esc_html__('None','onemax') => 'none',
                                esc_html__('fade-up','onemax') => 'fade-up',
                                esc_html__('fade-down','onemax') => 'fade-down',
                                esc_html__('fade-left','onemax') => 'fade-left',
                                esc_html__('fade-right','onemax') => 'fade-right',
                                esc_html__('fade-up-right','onemax') => 'fade-up-right',
                                esc_html__('fade-up-left','onemax') => 'fade-up-left',
                                esc_html__('fade-down-right','onemax') => 'fade-down-right',
                                esc_html__('fade-down-left','onemax') => 'fade-down-left',
                                esc_html__('flip-up','onemax') => 'flip-up',
                                esc_html__('flip-down','onemax') => 'flip-down',
                                esc_html__('flip-left','onemax') => 'flip-left',
                                esc_html__('flip-right','onemax') => 'flip-right',
                                esc_html__('slide-up','onemax') => 'slide-up',
                                esc_html__('slide-down','onemax') => 'slide-down',
                                esc_html__('slide-left','onemax') => 'slide-left',
                                esc_html__('slide-right','onemax') => 'slide-right',
                                esc_html__('zoom-in','onemax') => 'zoom-in',
                                esc_html__('zoom-in-up','onemax') => 'zoom-in-up',
                                esc_html__('zoom-in-down','onemax') => 'zoom-in-down',
                                esc_html__('zoom-in-left','onemax') => 'zoom-in-left',
                                 esc_html__('zoom-in-right','onemax') => 'zoom-in-right',
                                esc_html__('zoom-out','onemax') => 'zoom-out',
                                 esc_html__('zoom-out-up','onemax') => 'zoom-out-up',
                                esc_html__('zoom-out-down','onemax') => 'zoom-out-down',
                                 esc_html__('zoom-out-left','onemax') => 'zoom-out-left',
                                esc_html__('zoom-out-right','onemax') => 'zoom-out-right',
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Animating Once', 'onemax'),
    'description' => esc_html__('If you choose false, no matter you scroll up or scroll down the element will keep on animating. The default value is ture which means the element will only animating once when it display.','onemax'),
                            'param_name' => 'aos_once',
                            'value' => array(
                                esc_html__('True','onemax') => 'true',
                                esc_html__('False','onemax') => 'false',
                            ),
                            'dependency' => array(
                                   'element' => 'ani',
                                   'value_not_equal_to' => array('none'),
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Delay', 'onemax'),
    'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                            'param_name' => 'aos_delay',
                            'value' => array(
                        '100' => '100',
                        '200' => '200',
                        '300' => '300',
                        '400' => '400',
                        '500' => '500',
                        '600' => '600',
                        '700' => '700',
                        '800' => '800',
                        '900' => '900',
                        '1000' => '1000',
                        '1100' => '1100',
                        '1200' => '1200',
                        '1300' => '1300',
                        '1400' => '1400',
                        '1500' => '1500',
                        '1600' => '1600',
                        '1700' => '1700',
                        '1800' => '1800',
                            ),
                            'dependency' => array(
                                'element' => 'ani',
                                'value_not_equal_to' => array('none'),
                            ),
                        ),
                );
            $settings = array(
                    'name' => esc_html__('Team List', 'onemax'),
                    'base' => 'om_team_list',
                    'category' => esc_html__('onemax', 'onemax'),
                    'description' => esc_html__('Team with more instruction', 'onemax'),
                    'params' => $team_list_params,
                    'icon' => 'om_vc_icon_team_list',
                    'weight' => 8,
                );
            vc_map($settings);
        }
    }

    /**********************************add testimonials to onemax*****************************************************************/
    add_shortcode('om_testimonials', 'onemax_testimonials_func');
    if(!function_exists('onemax_testimonials_func')){
        function onemax_testimonials_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_testimonials.php';

            return $output;
        }
    }
    if(!function_exists('onemax_testimonials_to_vc')){
        add_action('vc_before_init', 'onemax_testimonials_to_vc');
        function onemax_testimonials_to_vc()
        {
            $testimonials_params = array(
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Testimonials number', 'onemax'),
                                'param_name' => 'dis_num',
                                'value' => array(
                                    '2' => '2',
                                    '3' => '3',
                                    '4' => '4',
                                    '5' => '5',
                                    '6' => '6',
                                ),
                                'std' => '3',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'cat',
                                'heading' => esc_html__('Category', 'onemax'),
                                'description' => esc_html__('If leave empty it will display all categories.', 'onemax'),
                            ),
                            array(
                                'type' => 'colorpicker',
                                'param_name' => 'font_color',
                                'heading' => esc_html__('Font Color', 'onemax'),
                            ),
                            array(
                                'type' => 'colorpicker',
                                'param_name' => 'navigation_color',
                                'heading' => esc_html__('Arrows Color', 'onemax'),
                                'std' => '#009688',
                            ),
                            array(
                                'type' => 'colorpicker',
                                'param_name' => 'pagination_color',
                                'heading' => esc_html__('Indicators Color', 'onemax'),
                                'std' => '#009688',
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Loading Animation', 'onemax'),
                                'param_name' => 'ani',
                                'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                                'value' => array(
                                    esc_html__('None','onemax') => 'none',
                                    esc_html__('fade-up','onemax') => 'fade-up',
                                    esc_html__('fade-down','onemax') => 'fade-down',
                                    esc_html__('fade-left','onemax') => 'fade-left',
                                    esc_html__('fade-right','onemax') => 'fade-right',
                                    esc_html__('fade-up-right','onemax') => 'fade-up-right',
                                    esc_html__('fade-up-left','onemax') => 'fade-up-left',
                                    esc_html__('fade-down-right','onemax') => 'fade-down-right',
                                    esc_html__('fade-down-left','onemax') => 'fade-down-left',
                                    esc_html__('flip-up','onemax') => 'flip-up',
                                    esc_html__('flip-down','onemax') => 'flip-down',
                                    esc_html__('flip-left','onemax') => 'flip-left',
                                    esc_html__('flip-right','onemax') => 'flip-right',
                                    esc_html__('slide-up','onemax') => 'slide-up',
                                    esc_html__('slide-down','onemax') => 'slide-down',
                                    esc_html__('slide-left','onemax') => 'slide-left',
                                    esc_html__('slide-right','onemax') => 'slide-right',
                                    esc_html__('zoom-in','onemax') => 'zoom-in',
                                    esc_html__('zoom-in-up','onemax') => 'zoom-in-up',
                                    esc_html__('zoom-in-down','onemax') => 'zoom-in-down',
                                    esc_html__('zoom-in-left','onemax') => 'zoom-in-left',
                                     esc_html__('zoom-in-right','onemax') => 'zoom-in-right',
                                    esc_html__('zoom-out','onemax') => 'zoom-out',
                                     esc_html__('zoom-out-up','onemax') => 'zoom-out-up',
                                    esc_html__('zoom-out-down','onemax') => 'zoom-out-down',
                                     esc_html__('zoom-out-left','onemax') => 'zoom-out-left',
                                    esc_html__('zoom-out-right','onemax') => 'zoom-out-right',
                                ),
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Animating Once', 'onemax'),
                                'description' => esc_html__('If you choose false, no matter you scroll up or scroll down the element will keep on animating. The default value is ture which means the element will only animating once when it display.','onemax'),
                                'param_name' => 'aos_once',
                                'value' => array(
                                    esc_html__('True','onemax') => 'true',
                                    esc_html__('False','onemax') => 'false',
                                ),
                                'dependency' => array(
                                    'element' => 'ani',
                                    'value_not_equal_to' => array('none',),
                                ),
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Delay', 'onemax'),
                                'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                                'param_name' => 'aos_delay',
                                'value' => array(
                                    '100' => '100',
                                    '200' => '200',
                                    '300' => '300',
                                    '400' => '400',
                                    '500' => '500',
                                    '600' => '600',
                                    '700' => '700',
                                    '800' => '800',
                                    '900' => '900',
                                    '1000' => '1000',
                                    '1100' => '1100',
                                    '1200' => '1200',
                                    '1300' => '1300',
                                    '1400' => '1400',
                                    '1500' => '1500',
                                    '1600' => '1600',
                                    '1700' => '1700',
                                    '1800' => '1800',
                                ),
                                'dependency' => array(
                                    'element' => 'ani',
                                    'value_not_equal_to' => array('none',),
                                ),
                            ),
                );
            $settings = array(
                    'name' => esc_html__('Testimonials', 'onemax'),
                    'base' => 'om_testimonials',
                    'category' => esc_html__('onemax', 'onemax'),
                    'description' => esc_html__('Testimonials from your friends', 'onemax'),
                    'params' => $testimonials_params,
                    'icon' => 'om_vc_icon_testimonials',
                    'weight' => 7,
                );
            vc_map($settings);
        }
    }
    /**********************************add testimonials with title image to onemax*****************************************************************/
    add_shortcode('om_testimonials_image', 'onemax_testimonials_image_func');
    if(!function_exists('onemax_testimonials_image_func')){
        function onemax_testimonials_image_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_testimonials_image.php';

            return $output;
        }
    }
    if(!function_exists('onemax_testimonials_image_to_vc')){
        add_action('vc_before_init', 'onemax_testimonials_image_to_vc');
        function onemax_testimonials_image_to_vc()
        {
            $testimonials_image_params = array(
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Testimonials number', 'onemax'),
                                'param_name' => 'dis_num',
                                'value' => array(
                                    '2' => '2',
                                    '3' => '3',
                                    '4' => '4',
                                    '5' => '5',
                                    '6' => '6',
                                ),
                                'std' => '3',
                            ),
                            array(
                                'type' => 'textfield',
                                'param_name' => 'cat',
                                'heading' => esc_html__('Category', 'onemax'),
                                'description' => esc_html__('If leave empty it will display all categories.', 'onemax'),
                            ),
                            array(
                                'type' => 'colorpicker',
                                'param_name' => 'font_color',
                                'heading' => esc_html__('Font Color', 'onemax'),
                            ),
                            array(
                                'type' => 'colorpicker',
                                'param_name' => 'navigation_color',
                                'heading' => esc_html__('Arrows Color', 'onemax'),
                                'std' => '#009688',
                            ),
                            array(
                                'type' => 'colorpicker',
                                'param_name' => 'pagination_color',
                                'heading' => esc_html__('Indicators Color', 'onemax'),
                                'std' => '#009688',
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Loading Animation', 'onemax'),
                                'param_name' => 'ani',
                                'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                                'value' => array(
                                    esc_html__('None','onemax') => 'none',
                                    esc_html__('fade-up','onemax') => 'fade-up',
                                    esc_html__('fade-down','onemax') => 'fade-down',
                                    esc_html__('fade-left','onemax') => 'fade-left',
                                    esc_html__('fade-right','onemax') => 'fade-right',
                                    esc_html__('fade-up-right','onemax') => 'fade-up-right',
                                    esc_html__('fade-up-left','onemax') => 'fade-up-left',
                                    esc_html__('fade-down-right','onemax') => 'fade-down-right',
                                    esc_html__('fade-down-left','onemax') => 'fade-down-left',
                                    esc_html__('flip-up','onemax') => 'flip-up',
                                    esc_html__('flip-down','onemax') => 'flip-down',
                                    esc_html__('flip-left','onemax') => 'flip-left',
                                    esc_html__('flip-right','onemax') => 'flip-right',
                                    esc_html__('slide-up','onemax') => 'slide-up',
                                    esc_html__('slide-down','onemax') => 'slide-down',
                                    esc_html__('slide-left','onemax') => 'slide-left',
                                    esc_html__('slide-right','onemax') => 'slide-right',
                                    esc_html__('zoom-in','onemax') => 'zoom-in',
                                    esc_html__('zoom-in-up','onemax') => 'zoom-in-up',
                                    esc_html__('zoom-in-down','onemax') => 'zoom-in-down',
                                    esc_html__('zoom-in-left','onemax') => 'zoom-in-left',
                                     esc_html__('zoom-in-right','onemax') => 'zoom-in-right',
                                    esc_html__('zoom-out','onemax') => 'zoom-out',
                                     esc_html__('zoom-out-up','onemax') => 'zoom-out-up',
                                    esc_html__('zoom-out-down','onemax') => 'zoom-out-down',
                                     esc_html__('zoom-out-left','onemax') => 'zoom-out-left',
                                    esc_html__('zoom-out-right','onemax') => 'zoom-out-right',
                                ),
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Animating Once', 'onemax'),
                                'description' => esc_html__('If you choose false, no matter you scroll up or scroll down the element will keep on animating. The default value is ture which means the element will only animating once when it display.','onemax'),
                                'param_name' => 'aos_once',
                                'value' => array(
                                    esc_html__('True','onemax') => 'true',
                                    esc_html__('False','onemax') => 'false',
                                ),
                                'dependency' => array(
                                    'element' => 'ani',
                                    'value_not_equal_to' => array('none',),
                                ),
                            ),
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Delay', 'onemax'),
                                'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                                'param_name' => 'aos_delay',
                                'value' => array(
                                    '100' => '100',
                                    '200' => '200',
                                    '300' => '300',
                                    '400' => '400',
                                    '500' => '500',
                                    '600' => '600',
                                    '700' => '700',
                                    '800' => '800',
                                    '900' => '900',
                                    '1000' => '1000',
                                    '1100' => '1100',
                                    '1200' => '1200',
                                    '1300' => '1300',
                                    '1400' => '1400',
                                    '1500' => '1500',
                                    '1600' => '1600',
                                    '1700' => '1700',
                                    '1800' => '1800',
                                ),
                                'dependency' => array(
                                    'element' => 'ani',
                                    'value_not_equal_to' => array('none',),
                                ),
                            ),
                );
            $settings = array(
                    'name' => esc_html__('Testimonials - title image', 'onemax'),
                    'base' => 'om_testimonials_image',
                    'category' => esc_html__('onemax', 'onemax'),
                    'description' => esc_html__('Testimonials with image or logo', 'onemax'),
                    'params' => $testimonials_image_params,
                    'icon' => 'om_vc_icon_testimonials_with_image',
                    'weight' => 6,
                );
            vc_map($settings);
        }
    }

      /**********************************add Timeline(horizontal) to onemax*****************************************************************/
    add_shortcode('om_timeline_horizontal', 'onemax_timeline_horizontal_func');
    if(!function_exists('onemax_timeline_horizontal_func')){
        function onemax_timeline_horizontal_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_timeline_horizontal.php';

            return $output;
        }
    }
    if(!function_exists('onemax_timeline_horizontal_to_vc')){
        add_action('vc_before_init', 'onemax_timeline_horizontal_to_vc');
        function onemax_timeline_horizontal_to_vc()
        {
            $timeline_horizontal_params = array(
                        array(
                                'type' => 'dropdown',
                                'param_name' => 'rows',
                                'value' => array(
                                        esc_html__('1', 'onemax') => '1',
                                        esc_html__('2', 'onemax') => '2',
                                        esc_html__('3', 'onemax') => '3',
                                        esc_html__('4', 'onemax') => '4',
                                        esc_html__('5', 'onemax') => '5',
                                        esc_html__('6', 'onemax') => '6',
                                ),
                                'heading' => esc_html__('Node Number', 'onemax'),
                                'description' => esc_html__('Select how many nodes you need.', 'onemax'),
                                'std' => '1',
                        ),
                        array(
                                'type' => 'textfield',
                                'param_name' => 'title1',
                                'heading' => esc_html__('Title', 'onemax'),
                                'description' => esc_html__('The time node title,e.g., 2013.03.23.', 'onemax'),
                                'dependency' => array(
                                    'element' => 'rows',
                                    'value' => array('1', '2', '3', '4', '5', '6'),
                                 ),
                        ),
                        array(
                                'type' => 'textarea',
                                'param_name' => 'content_text1',
                                'heading' => esc_html__('Content', 'onemax'),
                                'description' => esc_html__('The time node Content.', 'onemax'),
                                'dependency' => array(
                                    'element' => 'rows',
                                    'value' => array('1', '2', '3', '4', '5', '6'),
                                 ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title2',
                                'heading' => esc_html__('Title', 'onemax'),
                                'description' => esc_html__('The time node title,e.g., 2013.03.23.', 'onemax'),
                                'dependency' => array(
                                    'element' => 'rows',
                                    'value' => array('2', '3', '4', '5', '6'),
                                 ),
                        ),
                        array(
                                'type' => 'textarea',
                                'param_name' => 'content_text2',
                                'heading' => esc_html__('Content', 'onemax'),
                                'description' => esc_html__('The time node Content.', 'onemax'),
                                'dependency' => array(
                                    'element' => 'rows',
                                    'value' => array('2', '3', '4', '5', '6'),
                                 ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title3',
                                'heading' => esc_html__('Title', 'onemax'),
                                'description' => esc_html__('The time node title,e.g., 2013.03.23.', 'onemax'),
                                'dependency' => array(
                                    'element' => 'rows',
                                    'value' => array('3', '4', '5', '6'),
                                 ),
                        ),
                        array(
                                'type' => 'textarea',
                                'param_name' => 'content_text3',
                                'heading' => esc_html__('Content', 'onemax'),
                                'description' => esc_html__('The time node Content.', 'onemax'),
                                'dependency' => array(
                                    'element' => 'rows',
                                    'value' => array('3', '4', '5', '6'),
                                 ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title4',
                                'heading' => esc_html__('Title', 'onemax'),
                                'description' => esc_html__('The time node title,e.g., 2013.03.23.', 'onemax'),
                                'dependency' => array(
                                    'element' => 'rows',
                                    'value' => array('4', '5', '6'),
                                 ),
                        ),
                        array(
                                'type' => 'textarea',
                                'param_name' => 'content_text4',
                                'heading' => esc_html__('Content', 'onemax'),
                                'description' => esc_html__('The time node Content.', 'onemax'),
                                'dependency' => array(
                                    'element' => 'rows',
                                    'value' => array('4', '5', '6'),
                                 ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title5',
                                'heading' => esc_html__('Title', 'onemax'),
                                'description' => esc_html__('The time node title,e.g., 2013.03.23.', 'onemax'),
                                'dependency' => array(
                                    'element' => 'rows',
                                    'value' => array('5', '6'),
                                 ),
                        ),
                        array(
                                'type' => 'textarea',
                                'param_name' => 'content_text5',
                                'heading' => esc_html__('Content', 'onemax'),
                                'description' => esc_html__('The time node Content.', 'onemax'),
                                'dependency' => array(
                                    'element' => 'rows',
                                    'value' => array('5', '6'),
                                 ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title6',
                                'heading' => esc_html__('Title', 'onemax'),
                                'description' => esc_html__('The time node title,e.g., 2013.03.23.', 'onemax'),
                                'dependency' => array(
                                    'element' => 'rows',
                                    'value' => array('6'),
                                 ),
                        ),
                        array(
                                'type' => 'textarea',
                                'param_name' => 'content_text6',
                                'heading' => esc_html__('Content', 'onemax'),
                                'description' => esc_html__('The time node Content.', 'onemax'),
                                'dependency' => array(
                                    'element' => 'rows',
                                    'value' => array('6'),
                                 ),
                        ),
                        array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Color', 'onemax'),
                                'param_name' => 'color',
                                'description' => esc_html__('Timeline color', 'onemax'),
                                'edit_field_class' => 'vc_col-sm-6 vc_column',
                                'std' => '#1cbc9a',
                            ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Font Color', 'onemax'),
                            'param_name' => 'font_color',
                            'description' => esc_html__('Timeline font color', 'onemax'),
                            'edit_field_class' => 'vc_col-sm-6 vc_column',
                            'std' => '#1cbc9a',
                            ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Loading Animation', 'onemax'),
                            'param_name' => 'ani',
                            'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                            'value' => array(
                                esc_html__('None','onemax') => 'none',
                                esc_html__('fade-up','onemax') => 'fade-up',
                                esc_html__('fade-down','onemax') => 'fade-down',
                                esc_html__('fade-left','onemax') => 'fade-left',
                                esc_html__('fade-right','onemax') => 'fade-right',
                                esc_html__('fade-up-right','onemax') => 'fade-up-right',
                                esc_html__('fade-up-left','onemax') => 'fade-up-left',
                                esc_html__('fade-down-right','onemax') => 'fade-down-right',
                                esc_html__('fade-down-left','onemax') => 'fade-down-left',
                                esc_html__('flip-up','onemax') => 'flip-up',
                                esc_html__('flip-down','onemax') => 'flip-down',
                                esc_html__('flip-left','onemax') => 'flip-left',
                                esc_html__('flip-right','onemax') => 'flip-right',
                                esc_html__('slide-up','onemax') => 'slide-up',
                                esc_html__('slide-down','onemax') => 'slide-down',
                                esc_html__('slide-left','onemax') => 'slide-left',
                                esc_html__('slide-right','onemax') => 'slide-right',
                                esc_html__('zoom-in','onemax') => 'zoom-in',
                                esc_html__('zoom-in-up','onemax') => 'zoom-in-up',
                                esc_html__('zoom-in-down','onemax') => 'zoom-in-down',
                                esc_html__('zoom-in-left','onemax') => 'zoom-in-left',
                                 esc_html__('zoom-in-right','onemax') => 'zoom-in-right',
                                esc_html__('zoom-out','onemax') => 'zoom-out',
                                 esc_html__('zoom-out-up','onemax') => 'zoom-out-up',
                                esc_html__('zoom-out-down','onemax') => 'zoom-out-down',
                                 esc_html__('zoom-out-left','onemax') => 'zoom-out-left',
                                esc_html__('zoom-out-right','onemax') => 'zoom-out-right',
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Animating Once', 'onemax'),
    'description' => esc_html__('If you choose false, no matter you scroll up or scroll down the element will keep on animating. The default value is ture which means the element will only animating once when it display.','onemax'),
                            'param_name' => 'aos_once',
                            'value' => array(
                                esc_html__('True','onemax') => 'true',
                                esc_html__('False','onemax') => 'false',
                            ),
                            'dependency' => array(
                                   'element' => 'ani',
                                   'value_not_equal_to' => array('none'),
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Delay', 'onemax'),
    'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                            'param_name' => 'aos_delay',
                            'value' => array(
                        '100' => '100',
                        '200' => '200',
                        '300' => '300',
                        '400' => '400',
                        '500' => '500',
                        '600' => '600',
                        '700' => '700',
                        '800' => '800',
                        '900' => '900',
                        '1000' => '1000',
                        '1100' => '1100',
                        '1200' => '1200',
                        '1300' => '1300',
                        '1400' => '1400',
                        '1500' => '1500',
                        '1600' => '1600',
                        '1700' => '1700',
                        '1800' => '1800',
                            ),
                            'dependency' => array(
                                'element' => 'ani',
                                'value_not_equal_to' => array('none'),
                            ),
                        ),
                        array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Extra class name', 'onemax'),
                                'param_name' => 'el_class',
                                'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'onemax'),
                        ),
                        array(
                                'type' => 'css_editor',
                                'heading' => esc_html__('CSS box', 'onemax'),
                                'param_name' => 'css',
                                'group' => esc_html__('Design Options', 'onemax'),
                        ),
                );
            $settings = array(
                    'name' => esc_html__('Timeline - h', 'onemax'),
                    'base' => 'om_timeline_horizontal',
                    'category' => esc_html__('onemax', 'onemax'),
                    'description' => esc_html__('Horizontal timeline', 'onemax'),
                    'params' => $timeline_horizontal_params,
                    'icon' => 'om_vc_icon_timeline_h',
                    'weight' => 5,
                );
            vc_map($settings);
        }
    }

/**********************************add Timeline(vertical) to onemax*****************************************************************/
    add_shortcode('om_timeline_vertical', 'onemax_timeline_vertical_func');
    if(!function_exists('onemax_timeline_vertical_func')){
        function onemax_timeline_vertical_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_timeline_vertical.php';

            return $output;
        }
    }

    if(!function_exists('onemax_timeline_vertical_to_vc')){
        add_action('vc_before_init', 'onemax_timeline_vertical_to_vc');
        function onemax_timeline_vertical_to_vc()
        {
            $timeline_vertical_params = array(
                        array(
                                'type' => 'dropdown',
                                'param_name' => 'rows',
                                'value' => array(
                                        esc_html__('1', 'onemax') => '1',
                                        esc_html__('2', 'onemax') => '2',
                                        esc_html__('3', 'onemax') => '3',
                                        esc_html__('4', 'onemax') => '4',
                                        esc_html__('5', 'onemax') => '5',
                                        esc_html__('6', 'onemax') => '6',
                                ),
                                'heading' => esc_html__('Node Number', 'onemax'),
                                'description' => esc_html__('Select you need nodes.', 'onemax'),
                                'std' => '1',
                        ),
                        array(
                                'type' => 'textfield',
                                'param_name' => 'title1',
                                'heading' => esc_html__('Title', 'onemax'),
                                'description' => esc_html__('The time node title,e.g., 2013.03.23.', 'onemax'),
                                'dependency' => array(
                                    'element' => 'rows',
                                    'value' => array('1', '2', '3', '4', '5', '6'),
                                 ),
                        ),
                        array(
                                'type' => 'textarea',
                                'param_name' => 'content_text1',
                                'heading' => esc_html__('Content', 'onemax'),
                                'description' => esc_html__('The time node Content.', 'onemax'),
                                'dependency' => array(
                                    'element' => 'rows',
                                    'value' => array('1', '2', '3', '4', '5', '6'),
                                 ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title2',
                                'heading' => esc_html__('Title', 'onemax'),
                                'description' => esc_html__('The time node title,e.g., 2013.03.23.', 'onemax'),
                                'dependency' => array(
                                    'element' => 'rows',
                                    'value' => array('2', '3', '4', '5', '6'),
                                 ),
                        ),
                        array(
                                'type' => 'textarea',
                                'param_name' => 'content_text2',
                                'heading' => esc_html__('Content', 'onemax'),
                                'description' => esc_html__('The time node Content.', 'onemax'),
                                'dependency' => array(
                                    'element' => 'rows',
                                    'value' => array('2', '3', '4', '5', '6'),
                                 ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title3',
                                'heading' => esc_html__('Title', 'onemax'),
                                'description' => esc_html__('The time node title,e.g., 2013.03.23.', 'onemax'),
                                'dependency' => array(
                                    'element' => 'rows',
                                    'value' => array('3', '4', '5', '6'),
                                 ),
                        ),
                        array(
                                'type' => 'textarea',
                                'param_name' => 'content_text3',
                                'heading' => esc_html__('Content', 'onemax'),
                                'description' => esc_html__('The time node Content.', 'onemax'),
                                'dependency' => array(
                                    'element' => 'rows',
                                    'value' => array('3', '4', '5', '6'),
                                 ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title4',
                                'heading' => esc_html__('Title', 'onemax'),
                                'description' => esc_html__('The time node title,e.g., 2013.03.23.', 'onemax'),
                                'dependency' => array(
                                    'element' => 'rows',
                                    'value' => array('4', '5', '6'),
                                 ),
                        ),
                        array(
                                'type' => 'textarea',
                                'param_name' => 'content_text4',
                                'heading' => esc_html__('Content', 'onemax'),
                                'description' => esc_html__('The time node Content.', 'onemax'),
                                'dependency' => array(
                                    'element' => 'rows',
                                    'value' => array('4', '5', '6'),
                                 ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title5',
                                'heading' => esc_html__('Title', 'onemax'),
                                'description' => esc_html__('The time node title,e.g., 2013.03.23.', 'onemax'),
                                'dependency' => array(
                                    'element' => 'rows',
                                    'value' => array('5', '6'),
                                 ),
                        ),
                        array(
                                'type' => 'textarea',
                                'param_name' => 'content_text5',
                                'heading' => esc_html__('Content', 'onemax'),
                                'description' => esc_html__('The time node Content.', 'onemax'),
                                'dependency' => array(
                                    'element' => 'rows',
                                    'value' => array('5', '6'),
                                 ),
                        ),
                array(
                                'type' => 'textfield',
                                'param_name' => 'title6',
                                'heading' => esc_html__('Title', 'onemax'),
                                'description' => esc_html__('The time node title,e.g., 2013.03.23.', 'onemax'),
                                'dependency' => array(
                                    'element' => 'rows',
                                    'value' => array('6'),
                                 ),
                        ),
                        array(
                                'type' => 'textarea',
                                'param_name' => 'content_text6',
                                'heading' => esc_html__('Content', 'onemax'),
                                'description' => esc_html__('The time node Content.', 'onemax'),
                                'dependency' => array(
                                    'element' => 'rows',
                                    'value' => array('6'),
                                 ),
                        ),
                        array(
                                'type' => 'colorpicker',
                                'heading' => esc_html__('Color', 'onemax'),
                                'param_name' => 'color',
                                'description' => esc_html__('Timeline color', 'onemax'),
                                'edit_field_class' => 'vc_col-sm-6 vc_column',
                                'std' => '#1cbc9a',
                            ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Font Color', 'onemax'),
                            'param_name' => 'font_color',
                            'description' => esc_html__('Timeline font color', 'onemax'),
                            'edit_field_class' => 'vc_col-sm-6 vc_column',
                            'std' => '#1cbc9a',
                            ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Loading Animation', 'onemax'),
                            'param_name' => 'ani',
                            'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                            'value' => array(
                                esc_html__('None' ,'onemax')=> 'none',
                                esc_html__('fade-up','onemax') => 'fade-up',
                                esc_html__('fade-down','onemax') => 'fade-down',
                                esc_html__('fade-left','onemax') => 'fade-left',
                                esc_html__('fade-right','onemax') => 'fade-right',
                                esc_html__('fade-up-right','onemax') => 'fade-up-right',
                                esc_html__('fade-up-left','onemax') => 'fade-up-left',
                                esc_html__('fade-down-right','onemax') => 'fade-down-right',
                                esc_html__('fade-down-left','onemax') => 'fade-down-left',
                                esc_html__('flip-up','onemax') => 'flip-up',
                                esc_html__('flip-down','onemax') => 'flip-down',
                                esc_html__('flip-left','onemax') => 'flip-left',
                                esc_html__('flip-right','onemax') => 'flip-right',
                                esc_html__('slide-up','onemax') => 'slide-up',
                                esc_html__('slide-down','onemax') => 'slide-down',
                                esc_html__('slide-left','onemax') => 'slide-left',
                                esc_html__('slide-right','onemax') => 'slide-right',
                                esc_html__('zoom-in','onemax') => 'zoom-in',
                                esc_html__('zoom-in-up','onemax') => 'zoom-in-up',
                                esc_html__('zoom-in-down','onemax') => 'zoom-in-down',
                                esc_html__('zoom-in-left','onemax') => 'zoom-in-left',
                                 esc_html__('zoom-in-right','onemax') => 'zoom-in-right',
                                esc_html__('zoom-out','onemax') => 'zoom-out',
                                 esc_html__('zoom-out-up','onemax') => 'zoom-out-up',
                                esc_html__('zoom-out-down','onemax') => 'zoom-out-down',
                                 esc_html__('zoom-out-left','onemax') => 'zoom-out-left',
                                esc_html__('zoom-out-right','onemax') => 'zoom-out-right',
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Animating Once', 'onemax'),
    'description' => esc_html__('If you choose false, no matter you scroll up or scroll down the element will keep on animating. The default value is ture which means the element will only animating once when it display.','onemax'),
                            'param_name' => 'aos_once',
                            'value' => array(
                                esc_html__('True','onemax') => 'true',
                                esc_html__('False','onemax') => 'false',
                            ),
                            'dependency' => array(
                                   'element' => 'ani',
                                   'value_not_equal_to' => array('none'),
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Delay', 'onemax'),
    'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                            'param_name' => 'aos_delay',
                            'value' => array(
                        '100' => '100',
                        '200' => '200',
                        '300' => '300',
                        '400' => '400',
                        '500' => '500',
                        '600' => '600',
                        '700' => '700',
                        '800' => '800',
                        '900' => '900',
                        '1000' => '1000',
                        '1100' => '1100',
                        '1200' => '1200',
                        '1300' => '1300',
                        '1400' => '1400',
                        '1500' => '1500',
                        '1600' => '1600',
                        '1700' => '1700',
                        '1800' => '1800',
                            ),
                            'dependency' => array(
                                'element' => 'ani',
                                'value_not_equal_to' => array('none'),
                            ),
                        ),
                        array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Extra class name', 'onemax'),
                                'param_name' => 'el_class',
                                'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'onemax'),
                        ),
                        array(
                                'type' => 'css_editor',
                                'heading' => esc_html__('CSS box', 'onemax'),
                                'param_name' => 'css',
                                'group' => esc_html__('Design Options', 'onemax'),
                        ),
                );
            $settings = array(
                    'name' => esc_html__('Timeline - v', 'onemax'),
                    'base' => 'om_timeline_vertical',
                    'category' => esc_html__('onemax', 'onemax'),
                    'description' => esc_html__('Vertical timeline', 'onemax'),
                    'params' => $timeline_vertical_params,
                    'icon' => 'om_vc_icon_timeline_v',
                    'weight' => 4,
                );
            vc_map($settings);
        }
    }

    /**********************************add title to onemax*****************************************************************/
    add_shortcode('om_title', 'onemax_title_func');
    if(!function_exists('onemax_title_func')){
        function onemax_title_func($atts)
        {
            require ONEMAX_DIR.'/vc_templates/om_title.php';

            return $output;
        }
    }

    if(!function_exists('onemax_title_to_vc')){
        add_action('vc_before_init', 'onemax_title_to_vc');
        function onemax_title_to_vc()
        {
            $title_params = array(
                        array(
                                'type' => 'textfield',
                                'param_name' => 'title',
                                'heading' => esc_html__('Title', 'onemax'),
                                'description' => esc_html__('Section title', 'onemax'),
                                'std' => 'Sample Title',
                        ),
                        array(
                                        'type' => 'dropdown',
                                        'param_name' => 'style',
                                        'value' => array(
                                            esc_html__('Style A', 'onemax') => 'a',
                                            esc_html__('Style B', 'onemax') => 'b',
                                            esc_html__('Style C', 'onemax') => 'c',
                                            esc_html__('Style D', 'onemax') => 'd',
                                            esc_html__('Style E', 'onemax') => 'e',
                                        ),
                                        'heading' => esc_html__('Style', 'onemax'),
                                        'description' => esc_html__('Select a style for your title.', 'onemax'),
                                ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => 'Title Color',
                            'param_name' => 'title_color',
                            'description' => esc_html__('Choose the title color.', 'onemax'),
                            'edit_field_class' => 'vc_col-sm-6 vc_column',
                            'std' => '',
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => 'The Line Color',
                            'param_name' => 'line_color',
                            'description' => esc_html__('Choose the line color.', 'onemax'),
                            'edit_field_class' => 'vc_col-sm-6 vc_column',
                            'std' => '#c01735',
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Alignment', 'onemax'),
                            'param_name' => 'alignment',
                            'value' => array(
                                esc_html__('Center','onemax') => 'center',
                                esc_html__('Left','onemax') => 'left',
                                esc_html__('Right','onemax') => 'right',
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Loading Animation', 'onemax'),
                            'param_name' => 'ani',
                            'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                            'value' => array(
                                esc_html__('None','onemax') => 'none',
                                esc_html__('fade-up','onemax') => 'fade-up',
                                esc_html__('fade-down','onemax') => 'fade-down',
                                esc_html__('fade-left','onemax') => 'fade-left',
                                esc_html__('fade-right','onemax') => 'fade-right',
                                esc_html__('fade-up-right','onemax') => 'fade-up-right',
                                esc_html__('fade-up-left','onemax') => 'fade-up-left',
                                esc_html__('fade-down-right','onemax') => 'fade-down-right',
                                esc_html__('fade-down-left','onemax') => 'fade-down-left',
                                esc_html__('flip-up','onemax') => 'flip-up',
                                esc_html__('flip-down','onemax') => 'flip-down',
                                esc_html__('flip-left','onemax') => 'flip-left',
                                esc_html__('flip-right','onemax') => 'flip-right',
                                esc_html__('slide-up','onemax') => 'slide-up',
                                esc_html__('slide-down','onemax') => 'slide-down',
                                esc_html__('slide-left','onemax') => 'slide-left',
                                esc_html__('slide-right','onemax') => 'slide-right',
                                esc_html__('zoom-in','onemax') => 'zoom-in',
                                esc_html__('zoom-in-up','onemax') => 'zoom-in-up',
                                esc_html__('zoom-in-down','onemax') => 'zoom-in-down',
                                esc_html__('zoom-in-left','onemax') => 'zoom-in-left',
                                 esc_html__('zoom-in-right','onemax') => 'zoom-in-right',
                                esc_html__('zoom-out','onemax') => 'zoom-out',
                                 esc_html__('zoom-out-up','onemax') => 'zoom-out-up',
                                esc_html__('zoom-out-down','onemax') => 'zoom-out-down',
                                 esc_html__('zoom-out-left','onemax') => 'zoom-out-left',
                                esc_html__('zoom-out-right','onemax') => 'zoom-out-right',
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Animating Once', 'onemax'),
    'description' => esc_html__('If you choose false, no matter you scroll up or scroll down the element will keep on animating. The default value is ture which means the element will only animating once when it display.','onemax'),
                            'param_name' => 'aos_once',
                            'value' => array(
                                esc_html__('True','onemax') => 'true',
                                esc_html__('False','onemax') => 'false',
                            ),
                            'dependency' => array(
                                   'element' => 'ani',
                                   'value_not_equal_to' => array('none'),
                            ),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Delay', 'onemax'),
    'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                            'param_name' => 'aos_delay',
                            'value' => array(
                        '100' => '100',
                        '200' => '200',
                        '300' => '300',
                        '400' => '400',
                        '500' => '500',
                        '600' => '600',
                        '700' => '700',
                        '800' => '800',
                        '900' => '900',
                        '1000' => '1000',
                        '1100' => '1100',
                        '1200' => '1200',
                        '1300' => '1300',
                        '1400' => '1400',
                        '1500' => '1500',
                        '1600' => '1600',
                        '1700' => '1700',
                        '1800' => '1800',
                            ),
                            'dependency' => array(
                                'element' => 'ani',
                                'value_not_equal_to' => array('none'),
                            ),
                        ),
                        array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Extra class name', 'onemax'),
                                'param_name' => 'el_class',
                                'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'onemax'),
                        ),
                        array(
                                'type' => 'css_editor',
                                'heading' => esc_html__('CSS box', 'onemax'),
                                'param_name' => 'css',
                                'group' => esc_html__('Design Options', 'onemax'),
                        ),
                );
            $settings = array(
                    'name' => esc_html__('Title', 'onemax'),
                    'base' => 'om_title',
                    'category' => esc_html__('onemax', 'onemax'),
                    'description' => esc_html__('Section title', 'onemax'),
                    'params' => $title_params,
                    'icon' => 'om_vc_icon_title',
                    'weight' => 3,
                );
            vc_map($settings);
        }
    }

/**********************************modify tour to onemax*****************************************************************/
    $tour_params = array(
        array(
            'type' => 'textfield',
            'param_name' => 'title',
            'heading' => esc_html__('Widget title', 'onemax'),
            'description' => esc_html__('Enter text used as widget title (Note: located above content element).', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'style',
            'value' => array(
                esc_html__('Classic', 'onemax') => 'classic',
                esc_html__('Modern', 'onemax') => 'modern',
                esc_html__('Flat', 'onemax') => 'flat',
                esc_html__('Outline', 'onemax') => 'outline',
            ),
            'heading' => esc_html__('Style', 'onemax'),
            'description' => esc_html__('Select tour display style.', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'shape',
            'value' => array(
                esc_html__('Rounded', 'onemax') => 'rounded',
                esc_html__('Square', 'onemax') => 'square',
                esc_html__('Round', 'onemax') => 'round',
            ),
            'heading' => esc_html__('Shape', 'onemax'),
            'description' => esc_html__('Select tour shape.', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'color',
            'heading' => esc_html__('Color', 'onemax'),
            'description' => esc_html__('Select tour color.', 'onemax'),
            'value' => array_merge(getVcShared('colors-dashed'), array(esc_html__('Custom', 'onemax') => 'custom')),
            'std' => 'grey',
            'param_holder_class' => 'vc_colored-dropdown',
        ),
                                             array(
                                                'type' => 'colorpicker',
                                                'heading' => esc_html__('Custom Color', 'onemax'),
                                                'param_name' => 'custom_color',
                                                'description' => esc_html__('Select custom color for your tour.', 'onemax'),
                                               'dependency' => array(
                                                        'element' => 'color',
                                                        'value' => 'custom',
                                                ),
                                                'edit_field_class' => 'vc_col-sm-6 vc_column',
                                                'std' => '#8646ab',
                                            ),
                                            array(
                                                'type' => 'colorpicker',
                                                'heading' => 'Section Background',
                                                'param_name' => 'sec_bg',
                                                'description' => esc_html__('Select section background color', 'onemax'),
                                               // 'edit_field_class' => 'vc_col-sm-6 vc_column',
                                                'std' => '#f8f8f8',
                                            ),
        array(
            'type' => 'checkbox',
            'param_name' => 'no_fill_content_area',
            'heading' => esc_html__('Do not fill content area?', 'onemax'),
            'description' => esc_html__('Do not fill content area with color.', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'spacing',
            'value' => array(
                esc_html__('None', 'onemax') => '',
                '1px' => '1',
                '2px' => '2',
                '3px' => '3',
                '4px' => '4',
                '5px' => '5',
                '10px' => '10',
                '15px' => '15',
                '20px' => '20',
                '25px' => '25',
                '30px' => '30',
                '35px' => '35',
            ),
            'heading' => esc_html__('Spacing', 'onemax'),
            'description' => esc_html__('Select tour spacing.', 'onemax'),
            'std' => '1',
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'gap',
            'value' => array(
                esc_html__('None', 'onemax') => '',
                '1px' => '1',
                '2px' => '2',
                '3px' => '3',
                '4px' => '4',
                '5px' => '5',
                '10px' => '10',
                '15px' => '15',
                '20px' => '20',
                '25px' => '25',
                '30px' => '30',
                '35px' => '35',
            ),
            'heading' => esc_html__('Gap', 'onemax'),
            'description' => esc_html__('Select tour gap.', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'tab_position',
            'value' => array(
                esc_html__('Left', 'onemax') => 'left',
                esc_html__('Right', 'onemax') => 'right',
            ),
            'heading' => esc_html__('Position', 'onemax'),
            'description' => esc_html__('Select tour navigation position.', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'alignment',
            'value' => array(
                esc_html__('Left', 'onemax') => 'left',
                esc_html__('Right', 'onemax') => 'right',
                esc_html__('Center', 'onemax') => 'center',
            ),
            'heading' => esc_html__('Alignment', 'onemax'),
            'description' => esc_html__('Select tour section title alignment.', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'controls_size',
            'value' => array(
                esc_html__('Auto', 'onemax') => '',
                esc_html__('Extra large', 'onemax') => 'xl',
                esc_html__('Large', 'onemax') => 'lg',
                esc_html__('Medium', 'onemax') => 'md',
                esc_html__('Small', 'onemax') => 'sm',
                esc_html__('Extra small', 'onemax') => 'xs',
            ),
            'heading' => esc_html__('Navigation width', 'onemax'),
            'description' => esc_html__('Select tour navigation width.', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'autoplay',
            'value' => array(
                esc_html__('None', 'onemax') => 'none',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '10' => '10',
                '20' => '20',
                '30' => '30',
                '40' => '40',
                '50' => '50',
                '60' => '60',
            ),
            'std' => 'none',
            'heading' => esc_html__('Autoplay', 'onemax'),
            'description' => esc_html__('Select auto rotate for tour in seconds (Note: disabled by default).', 'onemax'),
        ),
        array(
            'type' => 'textfield',
            'param_name' => 'active_section',
            'heading' => esc_html__('Active section', 'onemax'),
            'value' => 1,
            'description' => esc_html__('Enter active section number (Note: to have all sections closed on initial load enter non-existing number).', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'pagination_style',
            'value' => array(
                esc_html__('None', 'onemax') => '',
                esc_html__('Square Dots', 'onemax') => 'outline-square',
                esc_html__('Radio Dots', 'onemax') => 'outline-round',
                esc_html__('Point Dots', 'onemax') => 'flat-round',
                esc_html__('Fill Square Dots', 'onemax') => 'flat-square',
                esc_html__('Rounded Fill Square Dots', 'onemax') => 'flat-rounded',
            ),
            'heading' => esc_html__('Pagination style', 'onemax'),
            'description' => esc_html__('Select pagination style.', 'onemax'),
        ),
        array(
            'type' => 'dropdown',
            'param_name' => 'pagination_color',
            'value' => getVcShared('colors-dashed'),
            'heading' => esc_html__('Pagination color', 'onemax'),
            'description' => esc_html__('Select pagination color.', 'onemax'),
            'param_holder_class' => 'vc_colored-dropdown',
            'std' => 'grey',
            'dependency' => array(
                'element' => 'pagination_style',
                'not_empty' => true,
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name', 'onemax'),
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'onemax'),
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('CSS box', 'onemax'),
            'param_name' => 'css',
            'group' => esc_html__('Design Options', 'onemax'),
        ),
    );
    $tour_setting = array(
        'category' => esc_html__('onemax', 'onemax'),
        'params' => $tour_params,
        'icon' => 'om_vc_icon_tour',
        'weight' => 2,
    );
    vc_map_update('vc_tta_tour', $tour_setting);
    /**********************************modify text block to onemax*****************************************************************/
    $text_block_params = array(
        array(
            'type' => 'textarea_html',
            'holder' => 'div',
            'heading' => esc_html__('Text', 'onemax'),
            'param_name' => 'content',
            'value' => __('<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'onemax'),
        ),
        array(
                                                'type' => 'dropdown',
                                                'heading' => esc_html__('Loading Animation', 'onemax'),
                                                'param_name' => 'ani',
                                                'description' => esc_html__('This amazing feature will make your elements lively, unique and fantastic!','onemax'),
                                                'value' => array(
                                                    esc_html__('None','onemax') => 'none',
                                                    esc_html__('fade-up','onemax') => 'fade-up',
                                                    esc_html__('fade-down','onemax') => 'fade-down',
                                                    esc_html__('fade-left','onemax') => 'fade-left',
                                                    esc_html__('fade-right','onemax') => 'fade-right',
                                                    esc_html__('fade-up-right','onemax') => 'fade-up-right',
                                                    esc_html__('fade-up-left','onemax') => 'fade-up-left',
                                                    esc_html__('fade-down-right','onemax') => 'fade-down-right',
                                                    esc_html__('fade-down-left','onemax') => 'fade-down-left',
                                                    esc_html__('flip-up','onemax') => 'flip-up',
                                                    esc_html__('flip-down','onemax') => 'flip-down',
                                                    esc_html__('flip-left','onemax') => 'flip-left',
                                                    esc_html__('flip-right','onemax') => 'flip-right',
                                                    esc_html__('slide-up','onemax') => 'slide-up',
                                                    esc_html__('slide-down','onemax') => 'slide-down',
                                                    esc_html__('slide-left','onemax') => 'slide-left',
                                                    esc_html__('slide-right','onemax') => 'slide-right',
                                                    esc_html__('zoom-in','onemax') => 'zoom-in',
                                                    esc_html__('zoom-in-up','onemax') => 'zoom-in-up',
                                                    esc_html__('zoom-in-down','onemax') => 'zoom-in-down',
                                                    esc_html__('zoom-in-left','onemax') => 'zoom-in-left',
                                                     esc_html__('zoom-in-right','onemax') => 'zoom-in-right',
                                                    esc_html__('zoom-out','onemax') => 'zoom-out',
                                                     esc_html__('zoom-out-up','onemax') => 'zoom-out-up',
                                                    esc_html__('zoom-out-down','onemax') => 'zoom-out-down',
                                                     esc_html__('zoom-out-left','onemax') => 'zoom-out-left',
                                                    esc_html__('zoom-out-right','onemax') => 'zoom-out-right',
                                                ),
                                            ),
                                    array(
                                                'type' => 'dropdown',
                                                'heading' => esc_html__('Animating Once', 'onemax'),
'description' => esc_html__('If you choose false, no matter you scroll up or scroll down the element will keep on animating. The default value is ture which means the element will only animating once when it display.','onemax'),
                                                'param_name' => 'aos_once',
                                                'value' => array(
                                                    esc_html__('True','onemax') => 'true',
                                                    esc_html__('False','onemax') => 'false',
                                                ),
                                        'dependency' => array(
            'element' => 'ani',
            'value_not_equal_to' => array(
                'none',
            ),
        ),
                                            ),
                                    array(
                                                'type' => 'dropdown',
                                                'heading' => esc_html__('Delay', 'onemax'),
'description' => esc_html__('If you want to load the elements one by one, please choose the different delay value, for example, there are four elements in a row, please setup the delay value to 100, 200, 300, 400.','onemax'),
                                                'param_name' => 'aos_delay',
                                                'value' => array(
                    '100' => '100',
                    '200' => '200',
                    '300' => '300',
                    '400' => '400',
                    '500' => '500',
                    '600' => '600',
                    '700' => '700',
                    '800' => '800',
                    '900' => '900',
                    '1000' => '1000',
                    '1100' => '1100',
                    '1200' => '1200',
                    '1300' => '1300',
                    '1400' => '1400',
                    '1500' => '1500',
                    '1600' => '1600',
                    '1700' => '1700',
                    '1800' => '1800',
                                                ),
                                        'dependency' => array(
            'element' => 'ani',
            'value_not_equal_to' => array(
                'none',
            ),
        ),
                                            ),
    );
    $text_block_setting = array(
        'category' => esc_html__('onemax', 'onemax'),
        'params' => $text_block_params,
        'icon' => 'om_vc_icon_text_block',
        'weight' => 1,
    );
    vc_map_update('vc_column_text', $text_block_setting);
    /***************modify vc column*********************/
    $column_params=array(
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
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Width', 'onemax' ),
            'param_name' => 'width',
            'value' => array(
                esc_html__( '1 column - 1/12', 'onemax' ) => '1/12',
                esc_html__( '2 columns - 1/6', 'onemax' ) => '1/6',
                esc_html__( '3 columns - 1/4', 'onemax' ) => '1/4',
                esc_html__( '4 columns - 1/3', 'onemax' ) => '1/3',
                esc_html__( '5 columns - 5/12', 'onemax' ) => '5/12',
                esc_html__( '6 columns - 1/2', 'onemax' ) => '1/2',
                esc_html__( '7 columns - 7/12', 'onemax' ) => '7/12',
                esc_html__( '8 columns - 2/3', 'onemax' ) => '2/3',
                esc_html__( '9 columns - 3/4', 'onemax' ) => '3/4',
                esc_html__( '10 columns - 5/6', 'onemax' ) => '5/6',
                esc_html__( '11 columns - 11/12', 'onemax' ) => '11/12',
                esc_html__( '12 columns - 1/1', 'onemax' ) => '1/1',
            ),
            'group' => esc_html__( 'Responsive Options', 'onemax' ),
            'description' => esc_html__( 'Select column width.', 'onemax' ),
            'std' => '1/1',
        ),
        array(
            'type' => 'column_offset',
            'heading' => esc_html__( 'Responsiveness', 'onemax' ),
            'param_name' => 'offset',
            'group' => esc_html__( 'Responsive Options', 'onemax' ),
            'description' => esc_html__( 'Adjust column for different screen sizes. Control width, offset and visibility settings.', 'onemax' ),
        ),
        array(
            'type' => 'hidden',
            'param_name' => 'column_padding',
            'value' => '0',
        ),
    );
    $column_setting=array(
        'category' => esc_html__('onemax', 'onemax'),
        'params' =>$column_params
    );
    vc_map_update('vc_column', $column_setting);
    /***************modify vc inner column*********************/
    $column_inner_params=array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'onemax' ),
            'param_name' => 'el_class',
            'value' => '',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'onemax' ),
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'CSS box', 'onemax' ),
            'param_name' => 'css',
            'group' => esc_html__( 'Design Options', 'onemax' ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Width', 'onemax' ),
            'param_name' => 'width',
            'value' => array(
                esc_html__( '1 column - 1/12', 'onemax' ) => '1/12',
                esc_html__( '2 columns - 1/6', 'onemax' ) => '1/6',
                esc_html__( '3 columns - 1/4', 'onemax' ) => '1/4',
                esc_html__( '4 columns - 1/3', 'onemax' ) => '1/3',
                esc_html__( '5 columns - 5/12', 'onemax' ) => '5/12',
                esc_html__( '6 columns - 1/2', 'onemax' ) => '1/2',
                esc_html__( '7 columns - 7/12', 'onemax' ) => '7/12',
                esc_html__( '8 columns - 2/3', 'onemax' ) => '2/3',
                esc_html__( '9 columns - 3/4', 'onemax' ) => '3/4',
                esc_html__( '10 columns - 5/6', 'onemax' ) => '5/6',
                esc_html__( '11 columns - 11/12', 'onemax' ) => '11/12',
                esc_html__( '12 columns - 1/1', 'onemax' ) => '1/1',
            ),
            'group' => esc_html__( 'Responsive Options', 'onemax' ),
            'description' => esc_html__( 'Select column width.', 'onemax' ),
            'std' => '1/1',
        ),
        array(
            'type' => 'column_offset',
            'heading' => esc_html__( 'Responsiveness', 'onemax' ),
            'param_name' => 'offset',
            'group' => esc_html__( 'Responsive Options', 'onemax' ),
            'description' => esc_html__( 'Adjust column for different screen sizes. Control width, offset and visibility settings.', 'onemax' ),
        ),
        array(
            'type' => 'hidden',
            'param_name' => 'column_inner_padding',
            'value' => '0',
        ),
    );
    $column_inner_setting=array(
        'category' => esc_html__('onemax', 'onemax'),
        'params' =>$column_inner_params
    );
    vc_map_update('vc_column_inner', $column_inner_setting);
}

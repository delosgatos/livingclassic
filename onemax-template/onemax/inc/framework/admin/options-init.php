<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/.
     */
    if (!class_exists('Redux')) {
        return;
    }
    add_action('after_setup_theme', 'onemax_redux_options_init',100);
    function onemax_redux_options_init(){
    // This is your option name where all the Redux data is stored.
    $opt_name = 'OneMax';

    /*
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'OneMax',
        'display_name' => 'ONEMAX',
        'display_version' => $theme->get('Version'),
        'google_api_key' => 'AIzaSyAqmnfMFET5uqnvAHg1L4Qkiv9eKTeHqg4',
        'google_update_weekly' => true,
        'page_title' => esc_html__('OneMax Option Panel','onemax'),
        'update_notice' => false,
        'admin_bar' => false,
        'menu_type' => 'menu',
        'menu_title' => esc_html__('OneMax Options','onemax'),
        'menu_icon' => ONEMAX_URI.'/inc/framework/img/onemax_option_icon.png',
        'allow_sub_menu' => true,
        'page_parent_post_type' => 'your_post_type',
        'page_priority' => '99',
        'customizer' => true,
        'default_show' => true,
        'default_mark' => '*',
        'hints' => array(
            'icon_position' => 'right',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
                'style' => 'bootstrap',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'effect' => 'slide',
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => true,
        'output_tag' => true,
        'settings_api' => true,
        'cdn_check_time' => '1440',
        'compiler' => true,
        'page_permissions' => 'manage_options',
        'save_defaults' => true,
        'show_import_export' => true,
        'show_options_object' => false,
        'transient_time' => '3600',
        'network_sites' => true,
        'dev_mode' => false,
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url' => 'http://www.onemax.site',
        'title' => esc_html__('Visit OneMax Official Site','onemax'),
        'icon' => 'el el-home',
    );
    $args['share_icons'][] = array(
        'url' => 'https://www.facebook.com/share4web',
        'title' => esc_html__('follow us on facebook','onemax'),
        'icon' => 'el el-facebook',
    );
    $args['share_icons'][] = array(
        'url' => 'https://twitter.com/OneMax_CD',
        'title' => esc_html__('follow us on twitter','onemax'),
        'icon' => 'el el-twitter',
    );
    Redux::setArgs($opt_name, $args);

    /*
     * ---> END ARGUMENTS
     */

    /*
     *
     * ---> START SECTIONS
     *
     */

    Redux::setSection($opt_name, array(
        'title' => esc_html__('General', 'onemax'),
        'id' => 'General',
        'icon' => 'el el-cog',
        'fields' => array(
          array(
            'id' => 'grid-width',
            'type' => 'slider',
            'title' => esc_html__('Grid width', 'onemax'),
            'subtitle' => esc_html__('To change the layout grid width, please do it here.', 'onemax'),
            'desc' => esc_html__('The default grid width is 1200px','onemax'),
            'default' => 1200,
            'min' => 960,
            'step' => 1,
            'max' => 1920,
            'display_value' => 'text',
        ),
          array(
            'id' => 'favicon',
            'type' => 'media',
            'title' => esc_html__('Favicon Upload', 'onemax'),
            'subtitle' => esc_html__('Please upload a 16x16 pixels png , gif or ico. ', 'onemax'),
            'desc' => '',
            'default'=>array('url'=> ONEMAX_URI . '/img/sample_fav_icon.png'),
        ),
        array(
            'id' => 'back-to-top',
            'type' => 'switch',
            'title' => esc_html__('Back To Top', 'onemax'),
            'subtitle' => esc_html__('If you want a back to top button please switch it on.', 'onemax'),
            'desc' => '',
            'default' => 'false',
        ),

          array(
              'id' => 'background-image',
              'type' => 'media',
              'title' => esc_html__('Background Image', 'onemax'),
              'subtitle' => esc_html__('Upload your background here.', 'onemax'),
              'desc' => '',
          ),
          array(
              'id' => 'background-image-type',
              'type' => 'select',
              'title' => esc_html__('Background Image Type', 'onemax'),
              'subtitle' => esc_html__('Please select the background image type.', 'onemax'),
              'options' => array(
                  'normal' => 'Normal',
                  'cover' => 'Cover',
              ),
              'default' => 'normal',
          ),

          array(
              'id' => 'background-image-position',
              'type' => 'select',
              'title' => esc_html__('Background Image Position', 'onemax'),
              'subtitle' => esc_html__('Please select how you want to align the background image.', 'onemax'),
              'options' => array(
                  'left top' => 'Left Top',
                   'left center' => 'Left Center',
                   'left bottom' => 'Left Bottom',
                   'right top' => 'Right Top',
                   'right center' => 'Right Center',
                   'right bottom' => 'Right Bottom',
                   'center top' => 'Center Top',
                   'center center' => 'Center Center',
                   'center bottom' => 'Center Bottom',
              ),
              'required' => array('background-image-type', '!=', 'cover'),
          ),
          array(
              'id' => 'background-image-repeat',
              'type' => 'switch',
              'title' => esc_html__('Background Image Repeat', 'onemax'),
              'subtitle' => esc_html__('If the image repeat is needed, please switch it on.', 'onemax'),
              'desc' => '',
              'default' => 'false',
              'required' => array('background-image-type', '!=', 'cover'),
          ),
          array(
              'id' => 'preload_style',
              'type' => 'select',
              'title' => esc_html__('Preload Style', 'onemax'),
              'subtitle' => esc_html__('There will be no preload effect if it is empty.', 'onemax'),
              'options' => array(
                  'preloader_1' => 'Preloader 1',
                  'preloader_2' => 'Preloader 2',
                  'preloader_3' => 'Preloader 3',
                  'preloader_4' => 'Preloader 4',
                  'preloader_5' => 'Preloader 5',
                  'preloader_6' => 'Preloader 6',
                  'preloader_7' => 'Preloader 7',
                  'preloader_8' => 'Preloader 8',
                  'preloader_9' => 'Preloader 9',
                  'preloader_10' => 'Preloader 10',
                  'preloader_11' => 'Preloader 11',
                  'preloader_12' => 'Preloader 12',
                  'preloader_13' => 'Preloader 13',
                  'preloader_14' => 'Preloader 14',
                  'preloader_15' => 'Preloader 15',
                  'preloader_16' => 'Preloader 16',
              ),
              'default' => 'preloader_1',
          ),
          array(
              'id' => 'google-analytics',
              'type' => 'textarea',
              'title' => esc_html__('Google Analytics', 'onemax'),
              'subtitle' => esc_html__('Please paste your google analytics tracking code here.', 'onemax'),
              'desc' => esc_html__('', 'onemax'),
          ),

        ),
    ));

    Redux::setSection($opt_name, array(
        'title' => esc_html__('Logo', 'onemax'),
        'id' => 'logo',
        'icon' => 'el el-heart',
        'fields' => array(
            array(
                'id' => 'normal-logo',
                'type' => 'media',
                'title' => esc_html__('Normal Logo', 'onemax'),
                'subtitle' => esc_html__('Please upload the nomal logo here.', 'onemax'),
                'desc' => '',
                'default'=>array('url'=> ONEMAX_URI . '/inc/framework/img/Logo_bw.png'),
             ),
            array(
                'id' => 'retina-logo',
                'type' => 'media',
                'title' => esc_html__('Retina Logo', 'onemax'),
                'subtitle' => esc_html__('Please upload the retina logo here.', 'onemax'),
                'desc' => '',
            ),
            array(
                'id' => 'sticky-logo',
                'type' => 'media',
                'title' => esc_html__('Sticky Logo', 'onemax'),
                'subtitle' => esc_html__('It will display on sticky menu.', 'onemax'),
                'desc' => '',
            ),
            array(
                'id' => 'text-logo',
                'type' => 'text',
                'title' => esc_html__('Text Logo', 'onemax'),
                'subtitle' => esc_html__('If you need a Text logo instead of a img logo, please define it here.', 'onemax'),
                'desc' => '',
            ),

            array(
                'id' => 'logo-padding',
                'type' => 'text',
                'title' => esc_html__('Logo Padding', 'onemax'),
                'subtitle' => esc_html__('Just type the padding number here, e.g., 20, it will output 20px.', 'onemax'),
                'desc' => '',
                'validate' => 'numeric',
            ),

            ),
        ));

    Redux::setSection($opt_name, array(
        'title' => esc_html__('Header', 'onemax'),
        'id' => 'header',
        'desc' => esc_html__('Basic field with no subsections.', 'onemax'),
        'icon' => 'el el-website',

    ));

    Redux::setSection($opt_name, array(
        'title' => esc_html__('Head Menu Layout', 'onemax'),
        'desc' => esc_html__('Basic field with no subsections.', 'onemax'),
        'id' => 'head-menu-layout',
        'subsection' => true,
        'fields' => array(
                array(
                'id' => 'head-menu-layout-img',
                'type' => 'image_select',
                'title' => esc_html__('Main Layout', 'onemax'),
                'subtitle' => esc_html__('Please Choose the head menu layout.', 'onemax'),
                'options' => array(
                                'nomal' => array('title' => 'Nomal', 'img' => ONEMAX_URI.'/inc/framework/img/menu_layout/normal.png'),
                                'separate' => array('title' => 'Separate', 'img' => ONEMAX_URI.'/inc/framework/img/menu_layout/Separate.png'),
                                'Float' => array('title' => 'Float', 'img' => ONEMAX_URI.'/inc/framework/img/menu_layout/Float.png'),
                                'float-separate' => array('title' => 'Float Separate', 'img' => ONEMAX_URI.'/inc/framework/img/menu_layout/Float-Separate.png'),
                                'nomal-transparent' => array('title' => 'Nomal Transparent', 'img' => ONEMAX_URI.'/inc/framework/img/menu_layout/Nomal-Transparent.png'),
                                'nomal-right' => array('title' => 'Nomal Right', 'img' => ONEMAX_URI.'/inc/framework/img/menu_layout/Nomal-right.png'),
                                'separate-right' => array('title' => 'Separate Right', 'img' => ONEMAX_URI.'/inc/framework/img/menu_layout/Separate-right.png'),
                                'Nomal-right-transparent' => array('title' => 'Nomal Right Transparent', 'img' => ONEMAX_URI.'/inc/framework/img/menu_layout/Nomal-right-Transparent.png'),
                                'centre' => array('title' => 'Centre', 'img' => ONEMAX_URI.'/inc/framework/img/menu_layout/Centre.png'),
                                'centre-transparent' => array('title' => 'Centre Transparent', 'img' => ONEMAX_URI.'/inc/framework/img/menu_layout/Centre-Transparent.png'),
                                'centre-stack' => array('title' => 'Centre Stack', 'img' => ONEMAX_URI.'/inc/framework/img/menu_layout/Centre-stack.png'),
                                'centre-stack-transparent' => array('title' => 'Centre Stack Transparent', 'img' => ONEMAX_URI.'/inc/framework/img/menu_layout/Centre-stack-Transparent.png'),
                                'float-bottom' => array('title' => 'Float Bottom', 'img' => ONEMAX_URI.'/inc/framework/img/menu_layout/Float-Bottom.png'),
                                'slider-below' => array('title' => 'Slider Below', 'img' => ONEMAX_URI.'/inc/framework/img/menu_layout/Slider-Below.png'),
                                'slider-below-right' => array('title' => 'Slider Below Right', 'img' => ONEMAX_URI.'/inc/framework/img/menu_layout/Slider-Below-right.png'),
                                'slider-below-centre' => array('title' => 'Slider Below Centre', 'img' => ONEMAX_URI.'/inc/framework/img/menu_layout/Slider-Below-Centre.png'),
                                'float-bottom-separate' => array('title' => 'Float Bottom Separate', 'img' => ONEMAX_URI.'/inc/framework/img/menu_layout/Float-Bottom-Separate.png'),
                                'simple-left-menu' => array('title' => 'Simple Left Menu', 'img' => ONEMAX_URI.'/inc/framework/img/menu_layout/Simple-left-menu.png'),
                                'simple-right-menu' => array('title' => 'Simple Right menu', 'img' => ONEMAX_URI.'/inc/framework/img/menu_layout/Simple-right-menu.png'),
                                'simple-full-screen-menu' => array('title' => 'Simple Full Screen Menu', 'img' => ONEMAX_URI.'/inc/framework/img/menu_layout/Simple-full-screen-menu.png'),

                            ),
                'default' => 'nomal',
            ),
            array(
              'id' => 'head-henu-transparency',
              'type' => 'slider',
              'title' => esc_html__('Transparency', 'onemax'),
              'subtitle' => esc_html__('To change the head menu transparency, please do it here.', 'onemax'),
              'desc' => 'The default transparency is 100',
              'default' => 100,
              'min' => 0,
              'step' => 1,
              'max' => 100,
              'display_value' => 'label',
          ),
          array(
              'id' => 'search-icon',
              'type' => 'switch',
              'title' => esc_html__('Search icon', 'onemax'),
              'subtitle' => esc_html__('If you want a search icon on menu please switch it on.', 'onemax'),
              'desc' => '',
              'default' => 'false',
          ),

            ),
        ));
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Sub Head Menu', 'onemax'),
        'desc' => esc_html__('Basic field with no subsections.', 'onemax'),
        'id' => 'Sub-Head-Menu',
        'subsection' => true,
        'fields' => array(
          array(
              'id' => 'height',
              'type' => 'text',
              'title' => esc_html__('Height', 'onemax'),
              'subtitle' => esc_html__('Adjust the height here, e.g., 200, it will output 200px.', 'onemax'),
              'validate' => 'numeric',
          ),
          array(
              'id' => 'width',
              'type' => 'text',
              'title' => esc_html__('Width', 'onemax'),
              'subtitle' => esc_html__('Adjust the width here, e.g., 400, it will output 400px.', 'onemax'),
              'validate' => 'numeric',
          ),
          array(
              'id' => 'sub-padding',
              'type' => 'text',
              'title' => esc_html__('Padding', 'onemax'),
              'subtitle' => esc_html__('Just type the padding number here, e.g., 30, it will output 30px.', 'onemax'),
              'desc' => 'default 20px',
              'validate' => 'numeric',
          ),

          array(
              'id' => 'Sub-Head-Menu-Transparency',
              'type' => 'slider',
              'title' => esc_html__('Transparency', 'onemax'),
              'subtitle' => esc_html__('To change the head menu transparency, please do it here.', 'onemax'),
              'desc' => esc_html__('The default transparency is 100','onemax'),
              'default' => 100,
              'min' => 0,
              'step' => 1,
              'max' => 100,
              'display_value' => 'label',
          ),

          ),
      ));
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Slider', 'onemax'),
        'desc' => esc_html__('The global slider configuration.', 'onemax'),
        'id' => 'glo-slider',
        'icon' => 'el el-screen',
        'fields' => array(
          array(
            'id' => 'slider-size',
            'type' => 'switch',
            'title' => esc_html__('Slider Size', 'onemax'),
            'subtitle' => esc_html__('Choose the slider size.','onemax'),
            'on'=>'Full Screen',
            'off'=>'Auto size',
            'default' => true,
        ),
          array(
            'id' => 'slider-width',
            'type' => 'text',
            'title' => esc_html__('Slider Width', 'onemax'),
            'default' => 1240,
             'required' => array('slider-size', '=', '0'),
        ),
          array(
            'id' => 'slider-height',
            'type' => 'text',
            'title' => esc_html__('Slider Height', 'onemax'),
            'default' => 876,
             'required' => array('slider-size', '=', '0'),
        ),
          array(
            'id' => 'slider-padding',
            'type' => 'text',
            'title' => esc_html__('Slider Padding', 'onemax'),
            'default' => 100,
             'required' => array('slider-size', '=', '0'),
        ),
          array(
            'id' => 'slider-autoplay',
            'type' => 'switch',
            'title' => esc_html__('Autoplay', 'onemax'),
            'subtitle' => esc_html__('Choose if you want the slider autoplay or not.','onemax'),
            'default' => false,
        ),
          array(
        'id' => 'slider-progress-bar',
        'type' => 'switch',
        'title' => esc_html__('Progress Bar', 'onemax'),
        'subtitle' => esc_html__('Choose if you want the slider progress bar or not.','onemax'),
        'default' => false,
        'required' => array('slider-autoplay', '=', '1'),
    ),
        array(
          'id' => 'slider-default-delay',
          'type' => 'slider',
          'title' => esc_html__('Slider Delay', 'onemax'),
          'subtitle' => esc_html__('Choose the slider delay.', 'onemax'),
          'default' => 7000,
          'min' => 1000,
          'step' => 1000,
          'max' => 20000,
          'display_value' => 'label',
      ),

        array(
          'id' => 'slider-arrows',
          'type' => 'switch',
          'title' => esc_html__('Arrows', 'onemax'),
          'subtitle' => esc_html__('Choose if you want the slider arrows or not.','onemax'),
          'default' => false,
      ),

      array(
        'id' => 'slider-arrow-style',
        'type' => 'select',
        'title' => esc_html__('Arrow Style', 'onemax'),
        'subtitle' => esc_html__('Select the slider arrow style.','onemax'),
        'options'=>array(
            'hesperiden'=>esc_html__('hesperiden','onemax'),
            'gyges'=>esc_html__('gyges','onemax'),
            'hades'=>esc_html__('hades','onemax'),
            'ares'=>esc_html__('ares','onemax'),
            'hebe'=>esc_html__('hebe','onemax'),
            'hermes'=>esc_html__('hermes','onemax'),
            'persephone'=>esc_html__('persephone','onemax'),
            'erinyen'=>esc_html__('erinyen','onemax'),
            'zeus'=>esc_html__('zeus','onemax'),
            'metis'=>esc_html__('metis','onemax'),
            'dione'=>esc_html__('dione','onemax'),
            'uranus'=>esc_html__('uranus','onemax'),
          ),
        'required' => array('slider-arrows', '=', '1'),
    ),

      array(
        'id' => 'slider-bullets',
        'type' => 'switch',
        'title' => esc_html__('Bullets', 'onemax'),
        'subtitle' => esc_html__('Choose if you want the slider bullets or not.','onemax'),
        'default' => false,
    ),

    array(
      'id' => 'slider-bullet-style',
      'type' => 'select',
      'title' => esc_html__('Bullet Style', 'onemax'),
      'subtitle' => esc_html__('Select the slider bullet style.','onemax'),
      'options'=>array(
          'hesperiden'=>esc_html__('hesperiden','onemax'),
          'gyges'=>esc_html__('gyges','onemax'),
          'hades'=>esc_html__('hades','onemax'),
          'ares'=>esc_html__('ares','onemax'),
          'hebe'=>esc_html__('hebe','onemax'),
          'hermes'=>esc_html__('hermes','onemax'),
          'hephaistos'=>esc_html__('hephaistos','onemax'),
          'persephone'=>esc_html__('persephone','onemax'),
          'erinyen'=>esc_html__('erinyen','onemax'),
          'zeus'=>esc_html__('zeus','onemax'),
          'metis'=>esc_html__('metis','onemax'),
          'dione'=>esc_html__('dione','onemax'),
          'uranus'=>esc_html__('uranus','onemax'),
        ),
      'required' => array('slider-bullets', '=', '1'),
  ),

  array(
    'id' => 'slider-mobile-visibility',
    'type' => 'switch',
    'title' => esc_html__('Mobile Visibility', 'onemax'),
    'subtitle' => esc_html__('Choose if the slider is visible on mobile or not.','onemax'),
    'default' => true,
),

          array(
            'id' => 'slider-parallax',
            'type' => 'select',
            'title' => esc_html__('Parallax', 'onemax'),
            'subtitle' => esc_html__('Select the slider parallax style.','onemax'),
            'options'=>array(
                'parallax'=>esc_html__('Normal parallax','onemax'),
                '3d'=>esc_html__('3D parallax','onemax'),
              ),

        ),
        array(
          'id' => 'slider-parallax-speed',
          'type' => 'slider',
          'title' => esc_html__('Parallax Speed', 'onemax'),
          'subtitle' => esc_html__('Choose the parallax speed.', 'onemax'),
          'default' => 400,
          'min' => 100,
          'step' => 100,
          'max' => 1000,
          'display_value' => 'label',
          'required' => array('slider-parallax', 'not', ''),
      ),

        ),
    ));
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Footer', 'onemax'),
        'id' => 'Footer',
        'desc' => esc_html__('Basic field with no subsections.', 'onemax'),
        'icon' => 'el el-th-list',
        'fields' => array(
                array(
                'id' => 'footer-layout',
                'type' => 'image_select',
                'title' => esc_html__('Main Layout', 'onemax'),
                'subtitle' => esc_html__('Please Choose the footer layout.', 'onemax'),
                'options' => array(
                                '9' => array('title' => '1/4+1/4+1/4+1/4', 'img' => ONEMAX_URI.'/inc/framework/img/footer_layout/9.png'),
                                '8' => array('title' => '1/4+1/4+2/4', 'img' => ONEMAX_URI.'/inc/framework/img/footer_layout/8.png'),
                                '7' => array('title' => '1/4+2/4+1/4', 'img' => ONEMAX_URI.'/inc/framework/img/footer_layout/7.png'),
                                '6' => array('title' => '2/4+1/4+1/4', 'img' => ONEMAX_URI.'/inc/framework/img/footer_layout/6.png'),
                                '5' => array('title' => '1/3+1/3+1/3', 'img' => ONEMAX_URI.'/inc/framework/img/footer_layout/5.png'),
                                '4' => array('title' => '1/3+2/3', 'img' => ONEMAX_URI.'/inc/framework/img/footer_layout/4.png'),
                                '3' => array('title' => '2/3+1/3', 'img' => ONEMAX_URI.'/inc/framework/img/footer_layout/3.png'),
                                '2' => array('title' => '1/2+1/2', 'img' => ONEMAX_URI.'/inc/framework/img/footer_layout/2.png'),
                                '1' => array('title' => '1/1', 'img' => ONEMAX_URI.'/inc/framework/img/footer_layout/1.png'),
                            ),
                'default' => '9',
            ),
            array(
                'id' => 'padding-top',
                'type' => 'text',
                'title' => esc_html__('Padding Top', 'onemax'),
                'subtitle' => esc_html__('Just type the padding number here, e.g., 30, it will output 30px.', 'onemax'),
                'desc' => 'default 20px',
                'validate' => 'numeric',
            ),
            array(
                'id' => 'padding-bottom',
                'type' => 'text',
                'title' => esc_html__('Padding Bottom', 'onemax'),
                'subtitle' => esc_html__('Just type the padding number here, e.g., 30, it will output 30px.', 'onemax'),
                'desc' => 'default 20px',
                'validate' => 'numeric',
            ),
            array(
                'id' => 'copyright',
                'type' => 'text',
                'title' => esc_html__('Copyright A^L^L^4^S^H^A^R^E^.^N^E^T', 'onemax'),
            ),
            array(
                'id' => 'copyright-align',
                'type' => 'select',
                'title' => esc_html__('Copyright Align', 'onemax'),
                'options' => array(
                     'left' => 'Left',
                     'center' => 'Center',
                     'right' => 'Right',
                ),
                'default' => 'center',
            ),
            array(
                'id' => 'foot-background-image',
                'type' => 'media',
                'title' => esc_html__('Background Image', 'onemax'),
                'subtitle' => esc_html__('Upload your background here.', 'onemax'),
                'desc' => '',
            ),
            array(
                'id' => 'foot_background-image-position',
                'type' => 'select',
                'title' => esc_html__('Background Image Position', 'onemax'),
                'subtitle' => esc_html__('Please select how you want to align the background image.', 'onemax'),
                'options' => array(
                    'left top' => 'Left Top',
                     'left center' => 'Left Center',
                     'left bottom' => 'Left Bottom',
                     'right top' => 'Right Top',
                     'right center' => 'Right Center',
                     'right bottom' => 'Right Bottom',
                     'center top' => 'Center Top',
                     'center center' => 'Center Center',
                     'center bottom' => 'Center Bottom',
                ),
            ),
            array(
                'id' => 'footer-background-image-repeat',
                'type' => 'switch',
                'title' => esc_html__('Background Image Repeat', 'onemax'),
                'subtitle' => esc_html__('If the image repeat is needed, please switch it on.', 'onemax'),
                'desc' => '',
                'default' => 'false',
            ),

            ),
        ));

        Redux::setSection($opt_name, array(
            'title' => esc_html__('Color', 'onemax'),
            'id' => 'Color',
            'icon' => 'el el-brush',
            'fields' => array(

              array(
                    'id' => 'opt-color-scheme',
                    'type' => 'color_scheme',
                    'title' => 'Color Schemes',
                    'subtitle' => 'All elements color setting is here, including the font color, hover color, background color, text color and link color.',
                    'output' => true,
                    'compiler' => false,
                    'simple' => false,
                    'groups' => array(
                      'Header Area Color' => array(
                              'desc' => 'Set header menu and text logo colors here.',
                              'hidden' => false,
                              'accordion_open' => true,
                          ),
                      'Slider Area Color' => array(
                              'desc' => 'Set slider colors here.',
                              'hidden' => false,
                              'accordion_open' => true,
                          ),

                      'Body' => array(
                                  'desc' => 'Set body and content colors here.',
                                  'hidden' => false,
                                  'accordion_open' => true,
                          ),
                      'Footer Area' => array(
                                  'desc' => 'Set footer colors here. ',
                                  'hidden' => false,
                                  'accordion_open' => true,
                          ),
                      'WooCommerce color' => array(
                                  'desc' => 'Set woocommerce colors here. ',
                                  'hidden' => false,
                                  'accordion_open' => true,
                          ),
                      'Other' => array(
                                  'desc' => 'Set other colors here. ',
                                  'hidden' => false,
                                  'accordion_open' => true,
                          ),


                          ),

                    'default' => array(
                      array(
                          'id' => 'head-menu-color',
                          'title' => 'Menu Link Color',
                          'color' => '#333333',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'important' => true,
                          'group' => 'Header Area Color',
                      ),
                      array(
                          'id' => 'head-menu-sticky-color',
                          'title' => 'Sticky Menu Link Color',
                          'color' => '#333333',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'important' => true,
                          'group' => 'Header Area Color',
                      ),
                      array(
                          'id' => 'head-menu-font-hover-color',
                          'title' => 'Menu Hover Color',
                          'color' => '#cc0033',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'important' => true,
                          'group' => 'Header Area Color',
                      ),
                      array(
                          'id' => 'head-menu-bg-color',
                          'title' => 'Menu Background',
                          'color' => '#ffffff',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'background-color',
                          'important' => true,
                          'group' => 'Header Area Color',
                      ),
                      array(
                          'id' => 'sticky-head-menu-bg-color',
                          'title' => 'Sticky Menu Background',
                          'color' => '#ffffff',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'background-color',
                          'important' => true,
                          'group' => 'Header Area Color',
                      ),
                      array(
                          'id' => 'head-menu-sb-color', // ID
                          'title' => 'Sub Menu Link Color', // Display text
                          'color' => '#999999',   // Default colour
                          'alpha' => 1,           // Default alpha
                          'selector' => '',      // CSS selector
                          'mode' => 'color',     // CSS mode
                          'important' => true,         // CSS important
                          'group' => 'Header Area Color',
                      ),
                      array(
                          'id' => 'head-menu-sb-font-hover-color', // ID
                          'title' => 'Sub Menu Hover Color', // Display text
                          'color' => '#999999',   // Default colour
                          'alpha' => 1,           // Default alpha
                          'selector' => '',      // CSS selector
                          'mode' => 'color',     // CSS mode
                          'important' => true,         // CSS important
                          'group' => 'Header Area Color',
                      ),
                      array(
                          'id' => 'head-menu-sb-bg-color',
                          'title' => 'Sub Menu Background',
                          'color' => '#ededed',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'background-color',
                          'important' => true,
                          'group' => 'Header Area Color',
                      ),
                      array(
                          'id' => 'text-logo-color',
                          'title' => 'Text Logo Color',
                          'color' => '#333333',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'group' => 'Header Area Color',
                      ),
                      array(
                          'id' => 'simple-full-screen-bg',
                          'title' => 'Simple Full Screen Bg',
                          'color' => '#cc0033',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'group' => 'Header Area Color',
                      ),
                      array(
                          'id' => 'search-icon-color',
                          'title' => 'Search Icon Color',
                          'color' => '#000000',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'group' => 'Header Area Color',
                      ),
                      array(
                          'id' => 'slider-title-color',
                          'title' => 'Slider Title Color',
                          'color' => '#FFFFFF',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'group' => 'Slider Area Color',
                      ),
                      array(
                          'id' => 'slider-title-style-color',
                          'title' => 'Slider Title Style Color',
                          'color' => '#cc0033',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'group' => 'Slider Area Color',
                      ),
                      array(
                          'id' => 'slider-title-border-color',
                          'title' => 'Slider Title Border Color',
                          'color' => '#ffffff',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'group' => 'Slider Area Color',
                      ),
                      array(
                          'id' => 'slider-subtitle-color',
                          'title' => 'Slider Subtitle Color',
                          'color' => '#FFFFFF',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'group' => 'Slider Area Color',
                      ),
                      array(
                          'id' => 'slider-description-color',
                          'title' => 'Slider Description Color',
                          'color' => '#FFFFFF',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'group' => 'Slider Area Color',
                      ),
                      array(
                          'id' => 'slider-button1-color',
                          'title' => 'Slider Button1 Font Color',
                          'color' => '#cccccc',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'group' => 'Slider Area Color',
                      ),
                      array(
                          'id' => 'slider-button1-hover-color',
                          'title' => 'Slider Button1 Hover Color',
                          'color' => '#333333',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'group' => 'Slider Area Color',
                      ),
                      array(
                          'id' => 'slider-button1-bg-color',
                          'title' => 'Slider Button1 bg Color',
                          'color' => '#FFFFFF',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'background-color',
                          'group' => 'Slider Area Color',
                      ),
                      array(
                          'id' => 'slider-button1-bg-hover-color',
                          'title' => 'Slider Button1 bg Hover Color',
                          'color' => '#FFFFFF',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'background-color',
                          'group' => 'Slider Area Color',
                      ),
                      array(
                          'id' => 'slider-button2-color',
                          'title' => 'Slider Button2 Font Color',
                          'color' => '#cccccc',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'group' => 'Slider Area Color',
                      ),
                      array(
                          'id' => 'slider-button2-hover-color',
                          'title' => 'Slider Button2 Hover Color',
                          'color' => '#333333',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'group' => 'Slider Area Color',
                      ),
                      array(
                          'id' => 'slider-button2-bg-color',
                          'title' => 'Slider Button2 bg Color',
                          'color' => '#FFFFFF',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'background-color',
                          'group' => 'Slider Area Color',
                      ),
                      array(
                          'id' => 'slider-button2-bg-hover-color',
                          'title' => 'Slider Button2 bg Hover Color',
                          'color' => '#FFFFFF',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'background-color',
                          'group' => 'Slider Area Color',
                      ),

                       array(
                          'id' => 'body-text-color',
                          'title' => 'Body Text Color',
                          'color' => '#000000',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'group' => 'Body',
                      ),
                      array(
                          'id' => 'body-bg-color',
                          'title' => 'Body Background Color',
                          'color' => '#ffffff',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'background-color',
                          'group' => 'Body',
                      ),
                      array(
                          'id' => 'body-text-sel-color',
                          'title' => 'Body Text Select Color',
                          'color' => '#ffffff',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'group' => 'Body',
                      ),
                      array(
                          'id' => 'body-bg-sel-color',
                          'title' => 'Body Select Background Color',
                          'color' => '#cc0033',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'background-color',
                          'group' => 'Body',
                      ),

                      array(
                          'id' => 'body-link-color',
                          'title' => 'Body Link Color',
                          'color' => '#333333',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'group' => 'Body',
                      ),
                      array(
                          'id' => 'body-link-hover-color',
                          'title' => 'Body Link Hover Color',
                          'color' => '#cc0033',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'group' => 'Body',
                      ),
                      array(
                          'id' => 'footer-title-color',
                          'title' => 'Footer Title Color',
                          'color' => '#181818',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'group' => 'Footer Area',
                      ),

                       array(
                          'id' => 'footer-text-color',
                          'title' => 'Footer Text Color',
                          'color' => '#181818',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'group' => 'Footer Area',
                      ),

                      array(
                          'id' => 'footer-color',
                          'title' => 'Footer Link Color',
                          'color' => '#181818',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'group' => 'Footer Area',
                      ),
                      array(
                          'id' => 'footer-hover-color',
                          'title' => 'Footer Hover Color',
                          'color' => '#cc0033',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'group' => 'Footer Area',
                      ),
                      array(
                          'id' => 'footer-tag-cat-hover-color',
                          'title' => 'Footer Tags&Catgories Hover Color',
                          'color' => '#cc0033',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'group' => 'Footer Area',
                      ),
                      array(
                          'id' => 'footer-bg-color',
                          'title' => 'Footer Background Color',
                          'color' => '#ffffff',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'background-color',
                          'group' => 'Footer Area',
                      ),
                      array(
                          'id' => 'copyright-color',
                          'title' => 'Copyright Color',
                          'color' => '#999999',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'background-color',
                          'group' => 'Footer Area',
                      ),
                      array(
                          'id' => 'copyright-bg-color',
                          'title' => 'Copyright Bg Color',
                          'color' => '',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'background-color',
                          'group' => 'Footer Area',
                      ),
                      array(
                          'id' => 'woo-sale-bg-color',
                          'title' => 'Sale Bg Color',
                          'color' => '',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'background-color',
                          'group' => 'WooCommerce color',
                      ),
                      array(
                          'id' => 'woo-rate-color',
                          'title' => 'Rate Color',
                          'color' => '',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'background-color',
                          'group' => 'WooCommerce color',
                      ),
                      array(
                          'id' => 'woo-rate-hover-color',
                          'title' => 'Rate Hover Color',
                          'color' => '',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'background-color',
                          'group' => 'WooCommerce color',
                      ),
                      array(
                          'id' => 'woo-price-color',
                          'title' => 'Price Color',
                          'color' => '',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'background-color',
                          'group' => 'WooCommerce color',
                      ),
                      array(
                          'id' => 'woo-button-color',
                          'title' => 'Button Color',
                          'color' => '',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'background-color',
                          'group' => 'WooCommerce color',
                      ),
                      array(
                          'id' => 'woo-button-hover-color',
                          'title' => 'Button Hover Color',
                          'color' => '',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'background-color',
                          'group' => 'WooCommerce color',
                      ),
                      array(
                          'id' => 'woo-button-bg',
                          'title' => 'Button Backgroundolor',
                          'color' => '',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'background-color',
                          'group' => 'WooCommerce color',
                      ),
                      array(
                          'id' => 'woo-button-hover-bg',
                          'title' => 'Button Hover Backgroundolor',
                          'color' => '',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'background-color',
                          'group' => 'WooCommerce color',
                      ),
                       array(
                          'id' => 'contact-form-font-color',
                          'title' => 'Contact Form Font Color',
                          'color' => '#cc0033',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'group' => 'Other',
                      ),
                        array(
                          'id' => 'contact-form-btn-color',
                          'title' => 'Contact Form Button',
                          'color' => '#cc0033',
                          'alpha' => 1,
                          'selector' => '',
                          'mode' => 'color',
                          'group' => 'Other',
                      ),
                      array(
                        'id' => 'preload-bg',
                        'title' => 'Preload Background',
                        'color' => '#ffffff',
                        'alpha' => 1,
                        'selector' => '',
                        'mode' => 'color',
                        'group' => 'Other',
                      ),
                      array(
                        'id' => 'blog-bg-color',
                        'title' => 'Blog Background',
                        'color' => '#ffffff',
                        'alpha' => 1,
                        'selector' => '',
                        'mode' => 'color',
                        'group' => 'Other',
                      ),



                        ),
                    ),

              ),
            )
           );

    Redux::setSection($opt_name, array(
        'title' => esc_html__('Font', 'onemax'),
        'id' => 'Font',
        'desc' => esc_html__('Basic field with no subsections.', 'onemax'),
        'icon' => 'el el-fontsize',

    ));

    Redux::setSection($opt_name, array(
        'title' => esc_html__('Global Font', 'onemax'),
        'id' => 'global-font',
        'subsection' => true,
        'fields' => array(
             array(
                'id' => 'body-font',
                'type' => 'typography',
                'title' => esc_html__('Body', 'onemax'),
                'subtitle' => esc_html__('Define the Body font.', 'onemax'),
                'google' => true,
                'color' => false,
                'line-height' => false,
                'all_styles' => false,
                'default' => array(
              			'font-family'=>'Roboto',
              			'font-size'=>'15px',
                ),

            ),
             array(
                'id' => 'foot-font',
                'type' => 'typography',
                'title' => esc_html__('Footer - gfxfull.net', 'onemax'),
                'subtitle' => esc_html__('Define the Footer font.', 'onemax'),
                'google' => true,
                'color' => false,
                'line-height' => false,
                'all_styles' => false,
                'default' => array(
              			'font-family'=>'Roboto',
              			'font-size'=>'13px',
                ),

            ),
             array(
                'id' => 'h1-font',
                'type' => 'typography',
                'title' => esc_html__('H1', 'onemax'),
                'subtitle' => esc_html__('Define the H1 heading.', 'onemax'),
                'google' => true,
                'color' => false,
                'line-height' => false,
                'all_styles' => false,
                'default' => array(

                ),

            ),

             array(
                'id' => 'h2-font',
                'type' => 'typography',
                'title' => esc_html__('H2', 'onemax'),
                'subtitle' => esc_html__('Define the H2 heading.', 'onemax'),
                'google' => true,
                'color' => false,
                'line-height' => false,
                'all_styles' => false,
                'default' => array(

                ),

            ),

              array(
                'id' => 'h3-font',
                'type' => 'typography',
                'title' => esc_html__('H3', 'onemax'),
                'subtitle' => esc_html__('Define the H3 heading.', 'onemax'),
                'google' => true,
                'color' => false,
                'line-height' => false,
                'all_styles' => false,
                'default' => array(

                ),

            ),

            array(
                'id' => 'h4-font',
                'type' => 'typography',
                'title' => esc_html__('H4', 'onemax'),
                'subtitle' => esc_html__('Define the H4 heading.', 'onemax'),
                'google' => true,
                'color' => false,
                'line-height' => false,
                'all_styles' => false,
                'default' => array(

                ),

            ),

             array(
                'id' => 'h5-font',
                'type' => 'typography',
                'title' => esc_html__('H5', 'onemax'),
                'subtitle' => esc_html__('Define the H5 heading.', 'onemax'),
                'google' => true,
                'color' => false,
                'line-height' => false,
                'all_styles' => false,
                'default' => array(

                ),

            ),

            array(
                'id' => 'h6-font',
                'type' => 'typography',
                'title' => esc_html__('H6', 'onemax'),
                'subtitle' => esc_html__('Define the H6 heading.', 'onemax'),
                'google' => true,
                'color' => false,
                'line-height' => false,
                'all_styles' => false,
                'default' => array(

                ),

            ),

            ),
        ));

    Redux::setSection($opt_name, array(
        'title' => esc_html__('Head Area Font', 'onemax'),
        'id' => 'head-area-font',
        'subsection' => true,
        'fields' => array(
             array(
                'id' => 'head-menu-font',
                'type' => 'typography',
                'title' => esc_html__('Head Menu', 'onemax'),
                'subtitle' => esc_html__('Define The Head Menu Font.', 'onemax'),
                'google' => true,
                'color' => false,
                'line-height' => false,
                'all_styles' => false,
                'default' => array(

                ),

            ),

            array(
               'id' => 'head-submenu-font',
               'type' => 'typography',
               'title' => esc_html__('Sub Head Menu', 'onemax'),
               'subtitle' => esc_html__('Define The Sub Head Menu Font.', 'onemax'),
               'google' => true,
               'color' => false,
               'line-height' => false,
               'all_styles' => false,
               'default' => array(

               ),

           ),

             array(
                'id' => 'search-bar-font',
                'type' => 'typography',
                'title' => esc_html__('Search Bar Font', 'onemax'),
                'subtitle' => esc_html__('Define The Search Bar Font.', 'onemax'),
                'google' => true,
                'color' => false,
                'line-height' => false,
                'all_styles' => false,
                'default' => array(

                ),

            ),

             array(
                'id' => 'slider-title-font',
                'type' => 'typography',
                'title' => esc_html__('Slider Title Font', 'onemax'),
                'subtitle' => esc_html__('Define the Slider Title Font.', 'onemax'),
                'google' => true,
                'color' => false,
                'line-height' => false,
                'all_styles' => false,
                'default' => array(

                ),

            ),

              array(
                'id' => 'slider-subtitle-font',
                'type' => 'typography',
                'title' => esc_html__('Slider Subtitle Font', 'onemax'),
                'subtitle' => esc_html__('Define the Slider Subtitle Font.', 'onemax'),
                'google' => true,
                'color' => false,
                'line-height' => false,
                'all_styles' => false,
                'default' => array(

                ),

            ),
              array(
                'id' => 'slider-description-font',
                'type' => 'typography',
                'title' => esc_html__('Slider Description Font', 'onemax'),
                'subtitle' => esc_html__('Define the Slider Description Font.', 'onemax'),
                'google' => true,
                'color' => false,
                'line-height' => false,
                'all_styles' => false,
                'default' => array(

                ),

            ),

            array(
                'id' => 'slider-button-font',
                'type' => 'typography',
                'title' => esc_html__('Slider Button Font', 'onemax'),
                'subtitle' => esc_html__('Define the Slider Button Font.', 'onemax'),
                'google' => true,
                'color' => false,
                'line-height' => false,
                'all_styles' => false,
                'default' => array(

                ),

            ),

             array(
                'id' => 'text-logo-font',
                'type' => 'typography',
                'title' => esc_html__('Text Logo Font', 'onemax'),
                'subtitle' => esc_html__('Define the Text Logo Font.', 'onemax'),
                'google' => true,
                'color' => false,
                'line-height' => false,
                'all_styles' => false,
                'default' => array(

                ),

            ),

            ),
    ));

    Redux::setSection($opt_name, array(
        'title' => esc_html__('Component Font', 'onemax'),
        'id' => 'Coporment-Font',
        'subsection' => true,
        'fields' => array(

             array(
                'id' => 'om-button-font',
                'type' => 'typography',
                'title' => esc_html__('OM Button Font', 'onemax'),
                'subtitle' => esc_html__('Define The OM Button Font.', 'onemax'),
                'google' => true,
                'color' => false,
                'line-height' => false,
                'all_styles' => false,
                'default' => array(

                ),

            ),

             array(
                'id' => 'counter-name-font',
                'type' => 'typography',
                'title' => esc_html__('Counter Name Font', 'onemax'),
                'subtitle' => esc_html__('Define The Counter Name Font.', 'onemax'),
                'google' => true,
                'color' => false,
                'line-height' => false,
                'all_styles' => false,
                'default' => array(

                ),

            ),

             array(
                'id' => 'counter-number-font',
                'type' => 'typography',
                'title' => esc_html__('Counter Number Font', 'onemax'),
                'subtitle' => esc_html__('Define The Counter Number Font.', 'onemax'),
                'google' => true,
                'color' => false,
                'line-height' => false,
                'all_styles' => false,
                'default' => array(

                ),

            ),

             array(
                'id' => 'counter-down-font',
                'type' => 'typography',
                'title' => esc_html__('Counter Down Font', 'onemax'),
                'subtitle' => esc_html__('Define The Counter Down Font.', 'onemax'),
                'google' => true,
                'color' => false,
                'line-height' => false,
                'all_styles' => false,
                'default' => array(

                ),

            ),

             array(
                'id' => 'section-title-font',
                'type' => 'typography',
                'title' => esc_html__('Section Title Font', 'onemax'),
                'subtitle' => esc_html__('Define The Section Title Font.', 'onemax'),
                'google' => true,
                'color' => false,
                'line-height' => false,
                'all_styles' => false,
                'default' => array(

                ),

            ),

              array(
               'id' => 'team-name-font',
               'type' => 'typography',
               'title' => esc_html__('Team Name Font', 'onemax'),
               'subtitle' => esc_html__('Define The Team Name Font.', 'onemax'),
               'google' => true,
               'color' => false,
               'line-height' => false,
               'all_styles' => false,
               'default' => array(

               ),

           ),
             array(
                'id' => 'team-title-font',
                'type' => 'typography',
                'title' => esc_html__('Team Title Font', 'onemax'),
                'subtitle' => esc_html__('Define The Team Title Font.', 'onemax'),
                'google' => true,
                'color' => false,
                'line-height' => false,
                'all_styles' => false,
                'default' => array(

                ),

            ),

             array(
                'id' => 'team-instruction-font',
                'type' => 'typography',
                'title' => esc_html__('Team Instruction Font', 'onemax'),
                'subtitle' => esc_html__('Define The Team Instruction Font.', 'onemax'),
                'google' => true,
                'color' => false,
                'line-height' => false,
                'all_styles' => false,
                'default' => array(

                ),

            ),

             array(
                'id' => 'testimonials-content-font',
                'type' => 'typography',
                'title' => esc_html__('Testimonials Content Font', 'onemax'),
                'subtitle' => esc_html__('Define The Testimonials Content Font.', 'onemax'),
                'google' => true,
                'color' => false,
                'line-height' => false,
                'all_styles' => false,
                'default' => array(

                ),

            ),



            ),

    ));
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Social', 'onemax'),
        'id' => 'Social',
        'icon' => 'el el-group',
        'fields' => array(

          array(
              'id' => 'social-style',
              'type' => 'select',
              'title' => esc_html__('Social Style', 'onemax'),
              'subtitle' => esc_html__('Please Select The Social Animation Style.', 'onemax'),
              'options' => array(
                   '1' => 'Normal',
                   '2' => 'Left To Tight',
                   '3' => 'Right To Left',
                   '4' => 'Scroll Up',
                   '5' => 'Scroll Fown',
                   '6' => 'Border',
                   '7' => 'Rotate',
              ),
          ),
            array(
                'id' => 'facebook',
                'type' => 'text',
                'title' => esc_html__('Facebook', 'onemax'),
            ),
            array(
                'id' => 'twitter',
                'type' => 'text',
                'title' => esc_html__('Twitter', 'onemax'),
            ),
            array(
                'id' => 'youtube',
                'type' => 'text',
                'title' => esc_html__('Youtube', 'onemax'),
            ),
            array(
                'id' => 'vimeo',
                'type' => 'text',
                'title' => esc_html__('Vimeo', 'onemax'),
            ),
            array(
                'id' => 'linkedin',
                'type' => 'text',
                'title' => esc_html__('LinkedIn', 'onemax'),
            ),
            array(
                'id' => 'pinterest',
                'type' => 'text',
                'title' => esc_html__('Pinterest', 'onemax'),
            ),
            array(
                'id' => 'instagram',
                'type' => 'text',
                'title' => esc_html__('Instagram', 'onemax'),
            ),
            array(
                'id' => 'flickr',
                'type' => 'text',
                'title' => esc_html__('Flickr', 'onemax'),
            ),
            array(
                'id' => 'google_plus',
                'type' => 'text',
                'title' => esc_html__('Google+', 'onemax'),
            ),

            ),

    ));

    Redux::setSection($opt_name, array(
        'title' => esc_html__('Blog', 'onemax'),
        'id' => 'blog',
        'icon' => 'el el-book',
        'fields' => array(
                array(
                'id' => 'blog-layout',
                'type' => 'image_select',
                'title' => esc_html__('Blog Layout', 'onemax'),
                'subtitle' => esc_html__('Please Choose The Blog Layout.', 'onemax'),
                'options' => array(
                                '1' => array('title' => 'List', 'img' => ONEMAX_URI.'/inc/framework/img/blog_layout/blog_layout1.png'),
                                '2' => array('title' => 'Simple', 'img' => ONEMAX_URI.'/inc/framework/img/blog_layout/blog_layout2.png'),
                                '3' => array('title' => 'Grid', 'img' => ONEMAX_URI.'/inc/framework/img/blog_layout/blog_layout3.png'),
                            ),
                'default' => '2',
            ),

            array(
                'id' => 'per-page',
                'type' => 'text',
                'title' => esc_html__('Post Number Per Page', 'onemax'),
                'validate' => 'numeric',
            ),
            array(
                'id' => 'post-padding',
                'type' => 'text',
                'title' => esc_html__('Post Padding', 'onemax'),
                'subtitle' => esc_html__('Just type the padding number here, e.g., 30, it will output 30px.', 'onemax'),
                'desc' => 'default 5px',
                'validate' => 'numeric',
            ),

            ),

    ));

    Redux::setSection($opt_name, array(
        'title' => esc_html__('404 Page', 'onemax'),
        'id' => '404 Page',
        'icon' => 'el el-remove',
        'fields' => array(
            array(
                'id' => 'title',
                'type' => 'text',
                'title' => esc_html__('Title', 'onemax'),
                'subtitle' => esc_html__('The 404 Page Title', 'onemax'),
            ),
            array(
                'id' => 'sub-title',
                'type' => 'text',
                'title' => esc_html__('Subtitle', 'onemax'),
                'subtitle' => esc_html__('The 404 Page Subtitle', 'onemax'),
            ),
            array(
                'id' => 'content-text',
                'type' => 'text',
                'title' => esc_html__('Content Text', 'onemax'),
                'subtitle' => esc_html__('The 404 Page Instruction Content', 'onemax'),
            ),

            ),
    ));
}
    /*
     * <--- END SECTIONS
     */

     // Remove the demo link and the notice of integrated demo from the redux-framework plugin
     if(!function_exists('remove_demo')){
        function remove_demo()
             {
                 // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
                 if (class_exists('ReduxFrameworkPlugin')) {
                     remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::get_instance(), 'plugin_meta_demo_mode_link'), null, 2);
                 }
                 // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                 remove_action('admin_notices', array(ReduxFrameworkPlugin::get_instance(), 'admin_notices'));
             }
     }

//Extension for Importing demo content-Setting Menus&Set HomePage
if ( !function_exists( 'onemax_wbc_extended' ) ) {
  function onemax_wbc_extended( $demo_active_import , $demo_directory_path ) {
    reset( $demo_active_import );
    $current_key = key( $demo_active_import );
    /************************************************************************
    * Setting Menus
    *************************************************************************/
    // demo name
    $wbc_menu_array = array( 'Architecture', 'Bussniess Classic', 'Coming Soon', 'Design Classic', 'Interiors', 'Life','Nature','Portfolio Classic','Portfolio Creative' );
    if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && in_array( $demo_active_import[$current_key]['directory'], $wbc_menu_array ) ) {
      $top_menu = get_term_by( 'name', 'Home', 'nav_menu' );
      if ( isset( $top_menu->term_id ) ) {
        set_theme_mod( 'nav_menu_locations', array(
            //'theme-primary' => $top_menu->term_id,
            //'theme-footer'  => $top_menu->term_id,
            'primary_head_menu'=>$top_menu->term_id
          )
        );
      }
    }
    /************************************************************************
    * Set HomePage
    *************************************************************************/
    // array of demos/homepages to check/select from
    $wbc_home_pages = array(
      'Architecture' => 'Home - Architecture',
      'Bussniess Classic' => 'business - home',
      'Coming Soon' => 'Coming Soon',
      'Design Classic' => 'One Page',
      'Interiors' => 'interior-home',
      'Life' => 'Life - Home',
      'Nature' => 'Nature Home',
      'Portfolio Creative' => 'Home',
      'Portfolio Classic' => 'Home-portfolio-grid',
    );
    if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_home_pages ) ) {
      $page = get_page_by_title( $wbc_home_pages[$demo_active_import[$current_key]['directory']] );
      if ( isset( $page->ID ) ) {
        update_option( 'page_on_front', $page->ID );
        update_option( 'show_on_front', 'page' );
      }
    }
  }
  // Uncomment the below
   add_action( 'wbc_importer_after_content_import', 'onemax_wbc_extended', 10, 2 );
}

<?php

/*
  * OneMaxTheme Functions
  * Author：OneMax creative design
  * Official Site: www.onemax.site
*/


$redux_opt_name = 'OneMax';

if (!function_exists('onemax_add_metaboxes_slider')):
    function onemax_add_metaboxes_slider($metaboxes)
    {
        /*slider meta options*/
    $home_slider_sections[] = array(
        'title' => esc_html__('Slide General', 'onemax'),
        'icon' => 'el-icon-cog',
        'fields' => array(
          array(
              'id' => 'om-slider-transitions',
              'type' => 'select',
              'title' => esc_html__('Slide Transitions', 'onemax'),
              'subtitle' => esc_html__('Please select the slide transitions.', 'onemax'),
              'options' => array(
                   'fade' => esc_html__('Fade','onemax'),
                   'crossfade' => esc_html__('Fade Cross','onemax'),
                   'fadethroughdark' => esc_html__('Fade Through Black','onemax'),
                   'fadethroughlight' => esc_html__('Fade Through Light','onemax'),
                   'fadethroughtransparent' => esc_html__('Fade Through Transparent','onemax'),
                   'slideup' => esc_html__('Slide To Top','onemax'),
                   'slidedown' => esc_html__('Slide To Bottom','onemax'),
                   'slideright' => esc_html__('Slide To Right','onemax'),
                   'slideleft' => esc_html__('Slide To Left','onemax'),
                   'slidehorizontal' => esc_html__('Slide Horizontal (Next/Previous)','onemax'),
                   'slidevertical' => esc_html__('Slide Vertical (Next/Previous)','onemax'),
                   'slideoverup' => esc_html__('Slide Over To Top','onemax'),
                   'slideoverdown' => esc_html__('Slide Over To Bottom','onemax'),
                   'slideoverright' => esc_html__('Slide Over To Riight','onemax'),
                   'slideoverleft' => esc_html__('Slide Over To Left','onemax'),
                   'slideoverhorizontal' => esc_html__('Slide Over Horizontal (Next/Previous)','onemax'),
                   'slideoververtical' => esc_html__('Slide Over Vertical (Next/Previous)','onemax'),
                   'slideremoveup' => esc_html__('Slide Remove To Top','onemax'),
                   'slideremovedown' => esc_html__('Slide Remove To Bottom','onemax'),
                   'slideremoveright' => esc_html__('Slide Remove To Right','onemax'),
                   'slideremoveleft' => esc_html__('Slide Remove To Left','onemax'),
                   'slideremovehorizontal' => esc_html__('Slide Remove Horizontal (Next/Previous)','onemax'),
                   'slideremovevertical' => esc_html__('Slide Remove Horizontal (Next/Previous)','onemax'),
                   'slidingoverlayup' => esc_html__('Slide Overlays To Top','onemax'),
                   'slidingoverlaydown' => esc_html__('Slide Overlays To Bottom','onemax'),
                   'slidingoverlayright' => esc_html__('Slide Overlays To Right','onemax'),
                   'slidingoverlayleft' => esc_html__('Slide Overlays To Left','onemax'),
                   'slidingoverlayhorizontal' => esc_html__('Sliding Overlays Horizontal (Next/Previous)','onemax'),
                   'slidingoverlayvertical' => esc_html__('Sliding Overlays Vertical (Next/Previous)','onemax'),
                   'boxslide' => esc_html__('Slide Boxes','onemax'),
                   'slotslide-horizontal' => esc_html__('Slide Slots Horizontal','onemax'),
                   'slotslide-vertical' => esc_html__('Slide Slots Vertical','onemax'),
                   'boxfade' => esc_html__('Fade Boxes','onemax'),
                   'slotfade-horizontal' => esc_html__('Fade Slots Horizontal','onemax'),
                   'slotfade-vertical' => esc_html__('Fade Slots Veritcal','onemax'),
                   'fadefromright' => esc_html__('Fade and Slide from Right','onemax'),
                   'fadefromleft' => esc_html__('Fade and Slide from Left','onemax'),
                   'fadefromtop' => esc_html__('Fade and Slide from Top','onemax'),
                   'fadefrombottom' => esc_html__('Fade and Slide from Bottom','onemax'),
                   'fadetoleftfadefromright' => esc_html__('To Left From Right','onemax'),
                   'fadetorightfadefromleft' => esc_html__('To Right From Left','onemax'),
                   'fadetotopfadefrombottom' => esc_html__('To Top From Bottom','onemax'),
                   'fadetobottomfadefromtop' => esc_html__('To Bottom From Top','onemax'),
                   'parallaxtoright' => esc_html__('Parallax to Right','onemax'),
                   'parallaxtoleft' => esc_html__('Parallax to Left','onemax'),
                   'parallaxtotop' => esc_html__('Parallax to Top','onemax'),
                   'parallaxtobottom' => esc_html__('Parallax to Bottom','onemax'),
                   'parallaxhorizontal' => esc_html__('Parallax Horizontal','onemax'),
                   'parallaxvertical' => esc_html__('Parallax Vertical','onemax'),
                   'scaledownfromright' => esc_html__('Zoom Out and Fade from Right','onemax'),
                   'scaledownfromleft' => esc_html__('Zoom Out and Fade From Left','onemax'),
                   'scaledownfromtop' => esc_html__('Zoom Out and Fade From Top','onemax'),
                   'scaledownfrombottom' => esc_html__('Zoom Out and Fade From Bottom','onemax'),
                   'zoomout' => esc_html__('Zoom Out','onemax'),
                   'zoomin' => esc_html__('Zoom In','onemax'),
                   'slotzoom-horizontal' => esc_html__('Zoom Slots Horizontal','onemax'),
                   'slotzoom-vertical' => esc_html__('Zoom Slots Vertical','onemax'),
                   'curtain-1' => esc_html__('Curtain from Left','onemax'),
                   'curtain-2' => esc_html__('Curtain from Right','onemax'),
                   'curtain-3' => esc_html__('Curtain from Middle','onemax'),
                   '3dcurtain-horizontal' => esc_html__('3D Curtain Horizontal','onemax'),
                   '3dcurtain-vertical' => esc_html__('3D Curtain Vertical','onemax'),
                   'cube' => esc_html__('Cube Vertical','onemax'),
                   'cube-horizontal' => esc_html__('Cube Horizontal','onemax'),
                   'incube' => esc_html__('In Cube Vertical','onemax'),
                   'incube-horizontal' => esc_html__('In Cube Horizontal','onemax'),
                   'turnoff' => esc_html__('TurnOff Horizontal','onemax'),
                   'turnoff-vertical' => esc_html__('TurnOff Vertical','onemax'),
                   'papercut' => esc_html__('Paper Cut','onemax'),
                   'flyin' => esc_html__('Fly In','onemax'),
                   'random-static' => esc_html__('Random Flat','onemax'),
                   'random-premium' => esc_html__('Random Premium','onemax'),
                   'random' => esc_html__('Random Flat and Premium','onemax'),
                  ),

              ),

              array(
                  'id' => 'om-slider-delay',
                  'type' => 'text',
                  'title' => esc_html__('Slide Delay', 'onemax'),
                  'subtitle' => esc_html__('It will overwrite the global delay time.', 'onemax'),
                    ),
              array(
                  'id' => 'om-slider-link',
                  'type' => 'text',
                  'title' => esc_html__('Slide Link', 'onemax'),
                  'subtitle' => esc_html__('Add a Link to an entire Slide.', 'onemax'),
                    ),
          array(
              'id' => 'slider-pic-video-switch',
              'type' => 'switch',
              'title' => esc_html__('Slide Type', 'onemax'),
              'subtitle' => esc_html__('Please select the slide type.', 'onemax'),
              'on' => 'Image background',
              'off' => 'Video background',
              'default' => '1',
              ),


          array(
                'id' => 'om-slider-bg-image',
                'type' => 'media',
                'title' => esc_html__('Slide Background Image', 'onemax'),
                'compiler' => 'true',
                'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'subtitle' => esc_html__('Please upload or select the slide background image.', 'onemax'),
                'required' => array('slider-pic-video-switch', '=', '1'),

                ),
          array(
                'id' => 'om-slider-bg-filter',
                'type' => 'select',
                'title' => esc_html__('Filters', 'onemax'),
                'options'=>array(
                    '_1977'=>esc_html__('1977','onemax'),
                    'aden'=>esc_html__('Aden','onemax'),
                    'brooklyn'=>esc_html__('Brooklyn','onemax'),
                    'clarendon'=>esc_html__('Clarendon','onemax'),
                    'earlybird'=>esc_html__('Earlybird','onemax'),
                    'gingham'=>esc_html__('Gingham','onemax'),
                    'hudson'=>esc_html__('Hudson','onemax'),
                    'inkwell'=>esc_html__('Inkwell','onemax'),
                    'lark'=>esc_html__('Lark','onemax'),
                    'lofi'=>esc_html__('Lofi','onemax'),
                    'mayfair'=>esc_html__('Mayfair','onemax'),
                    'moon'=>esc_html__('Moon','onemax'),
                    'nashville'=>esc_html__('Nashville','onemax'),
                    'perpetua'=>esc_html__('Perpetua','onemax'),
                    'reyes'=>esc_html__('Reyes','onemax'),
                    'rise'=>esc_html__('Rise','onemax'),
                    'slumber'=>esc_html__('Slumber','onemax'),
                    'toaster'=>esc_html__('Toaster','onemax'),
                    'walden'=>esc_html__('Walden','onemax'),
                    'willow'=>esc_html__('Willow','onemax'),
                    'xpro2'=>esc_html__('Xpro2','onemax'),
                  ),
                'default'=>'',
                'required' => array('slider-pic-video-switch', '=', '1'),

                ),
          array(
                'id' => 'om-slider-bg-size',
                'type' => 'select',
                'title' => esc_html__('Slide Background Size', 'onemax'),
                'options'=>array(
                    'cover'=>esc_html__('Cover','onemax'),
                    'contain'=>esc_html__('Contain','onemax'),
                  ),
                'default'=>'cover',
                'required' => array('slider-pic-video-switch', '=', '1'),

                ),
          array(
                'id' => 'om-slider-bg-repeat',
                'type' => 'select',
                'title' => esc_html__('Slide Background Repeat', 'onemax'),
                'options'=>array(
                    'repeat'=>esc_html__('Repeat','onemax'),
                    'no-repeat'=>esc_html__('No Repeat','onemax'),
                  ),
                'default'=>'no-repeat',
                'subtitle' => esc_html__('Please upload or select the slide background repeat.', 'onemax'),
                'required' => array('slider-pic-video-switch', '=', '1'),

                ),
           array(
                'id' => 'om-slider-bg-color',
                'type' => 'color',
                'title' => esc_html__('Slide Background Color', 'onemax'),
                'subtitle' => esc_html__('Please select the slide background color.', 'onemax'),
                'required' => array('slider-pic-video-switch', '=', '1'),

                ),

                array(
                'id' => 'om-slider-video-cover',
                'type' => 'media',
                'title' => esc_html__('Video Cover Image', 'onemax'),
                'required' => array('slider-pic-video-switch', '=', '0'),
                'compiler' => 'true',
                'subtitle' => esc_html__('Please insert the Video Cover Image.', 'onemax'),
                    ),

                array(
                'id' => 'om-slider-external-video',
                'type' => 'textarea',
                'title' => esc_html__('External Slider Video', 'onemax'),
                'required' => array('slider-pic-video-switch', '=', '0'),
                'compiler' => 'true',
                'subtitle' => esc_html__('Please insert external video, such as Youtube or Vimeo.', 'onemax'),
                    ),
              array(
                    'id' => 'local-mp4-video',
                    'type' => 'media',
                    'title' => esc_html__('Local MP4 Video', 'onemax'),
                    'required' => array('slider-pic-video-switch', '=', '0'),
                    'compiler' => 'true',
                    'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                    'subtitle' => esc_html__('MP4 is the most compatible format for morden browsers, it supports Internet Explorer, Chrome, Firefox, Safari and Opera.', 'onemax'),
                    ),

              array(
                    'id' => 'data-forcerewind',
                    'type' => 'select',
                    'title' => esc_html__('Forcerewind', 'onemax'),
                    'required' => array('slider-pic-video-switch', '=', '0'),
                    'options'=>array(
                      'on'=>esc_html__('On','onemax'),
                      'off'=>esc_html__('Off','onemax'),
                    ),
                    'default'=>'on',
                    'subtitle' => esc_html__('Choose if the video should always replay from the beginning each time the slide is shown.', 'onemax'),
                    ),
              array(
                    'id' => 'data-nextslideatend',
                    'type' => 'select',
                    'title' => esc_html__('Nextslideatend', 'onemax'),
                    'required' => array('slider-pic-video-switch', '=', '0'),
                    'options'=>array(
                      'true'=>esc_html__('True','onemax'),
                      'false'=>esc_html__('False','onemax'),
                    ),
                    'default'=>'true',
                    'subtitle' => esc_html__('Choose to automatically change to the next slide when the video ends.', 'onemax'),
                    ),
              array(
                    'id' => 'data-videoloop',
                    'type' => 'select',
                    'title' => esc_html__('Videoloop', 'onemax'),
                    'required' => array('slider-pic-video-switch', '=', '0'),
                    'options'=>array(
                      'none'=>esc_html__('None','onemax'),
                      'loop'=>esc_html__('Loop','onemax'),
                      'loopandnoslidestop'=>esc_html__('Loop and no slide stop','onemax'),
                    ),
                    'default'=>'loop',
                    'subtitle' => esc_html__('Option to automatically replay the video when it ends.', 'onemax'),
                    ),


        ),
    );
        $home_slider_sections[] = array(
        'title' => esc_html__('Slide Title', 'onemax'),
        'icon' => 'el-icon-font',
        'fields' => array(
          array(
              'id' => 'om-slider-title',
              'type' => 'text',
              'title' => esc_html__('Title', 'onemax'),
              'subtitle' => esc_html__('Please enter your slider title.', 'onemax'),
                ),
          array(
              'id' => 'om-slider-ele-position-title',
              'type' => 'select',
              'title' => esc_html__('Title Position', 'onemax'),
              'subtitle' => esc_html__('The Layer alignment.', 'onemax'),
              'options' => array(
                   'left-top' => esc_html__('Left Top','onemax'),
                   'left-center' => esc_html__('Left Center','onemax'),
                   'left-bottom' => esc_html__('Left Bottom','onemax'),
                   'center-top' => esc_html__('Center Top','onemax'),
                   'center-center' => esc_html__('Center Center','onemax'),
                   'center-bottom' => esc_html__('Center Bottom','onemax'),
                   'right-top' => esc_html__('Right Top','onemax'),
                   'right-center' => esc_html__('Right Center','onemax'),
                   'right-bottom' => esc_html__('Right Bottom','onemax'),
                  ),
              ),
          array(
              'id' => 'om-slider-title-style',
              'type' => 'select',
              'title' => esc_html__('Title Style', 'onemax'),
              'subtitle' => esc_html__('Select The Title Style.', 'onemax'),
              'options' => array(
                   '0' => esc_html__('None','onemax'),
                   '1' => esc_html__('Border','onemax'),
                  ),
              'default' => '0',
              ),

              array(
                'id' => 'om-slider-title-delay',
                'type' => 'slider',
                'title' => esc_html__('Title Delay', 'onemax'),
                'default' => 0,
                'min' => 0,
                'step' => 1000,
                'max' => 20000,
                'display_value' => 'label',
            ),

            array(
                'id' => 'om-slider-title-link',
                'type' => 'text',
                'title' => esc_html__('Title Link', 'onemax'),
                  ),

              array(
                  'id' => 'om-slider-ele-position-hoffset-title',
                  'type' => 'text',
                  'title' => esc_html__('Title Hoffset', 'onemax'),
                  'subtitle' => esc_html__('Horizontal alignment offset in pixels. Both negative and positive numbers can be used.', 'onemax'),
                  ),
                  array(
                      'id' => 'om-slider-ele-position-voffset-title',
                      'type' => 'text',
                      'title' => esc_html__('Title Voffset', 'onemax'),
                      'subtitle' => esc_html__('Vertical alignment offset in pixels. Both negative and positive numbers can be used.', 'onemax'),
                      ),

          array(
              'id' => 'om-slider-ele-animation-title',
              'type' => 'select',
              'title' => esc_html__('Title Animation', 'onemax'),
              'subtitle' => esc_html__('Please select elements animation.', 'onemax'),
              'options' => array(
                   '1' => esc_html__('Fade In','onemax'),
                   '2' => esc_html__('Short from Top','onemax'),
                   '3' => esc_html__('Short from Bottom','onemax'),
                   '4' => esc_html__('Short from Left','onemax'),
                   '5' => esc_html__('Short from Right','onemax'),
                   '6' => esc_html__('Long from Right','onemax'),
                   '7' => esc_html__('Long from Left','onemax'),
                   '8' => esc_html__('Long from Top','onemax'),
                   '9' => esc_html__('Long from Bottom','onemax'),
                   '10' => esc_html__('Skew From Long Left','onemax'),
                   '11' => esc_html__('Skew From Long Right','onemax'),
                   '12' => esc_html__('Skew From Short Left','onemax'),
                   '13' => esc_html__('Skew From Short Right','onemax'),
                   '14' => esc_html__('Random Rotate & Scale','onemax'),
                   '15' => esc_html__('Letters Fly In From Bottom','onemax'),
                   '16' => esc_html__('Letters Fly In From Left','onemax'),
                   '17' => esc_html__('Letters Fly In From Right','onemax'),
                   '18' => esc_html__('Letters Fly In From Top','onemax'),
                   '19' => esc_html__('Masked Zoom Out','onemax'),
                   '20' => esc_html__('Popup Smooth','onemax'),
                   '21' => esc_html__('Rotate In From Bottom','onemax'),
                   '22' => esc_html__('Rotate In From Zero','onemax'),
                   '23' => esc_html__('Slide Mask From Bottom','onemax'),
                   '24' => esc_html__('Slide Mask From Left','onemax'),
                   '25' => esc_html__('Slide Mask From Right','onemax'),
                   '26' => esc_html__('Slide Mask From Top','onemax'),
                   '27' => esc_html__('Smooth Popup One','onemax'),
                   '28' => esc_html__('Smooth Popup Two','onemax'),
                   '29' => esc_html__('Smooth Mask From Right','onemax'),
                   '30' => esc_html__('Smooth Mask From Left','onemax'),
                   '31' => esc_html__('Smooth Mask From Bottom','onemax'),
                  ),

              ),


        ),
    );

    $home_slider_sections[] = array(
    'title' => esc_html__('Slide Subtitle', 'onemax'),
    'icon' => 'el-icon-font',
    'fields' => array(
      array(
      		'id' => 'om-slider-sub-title',
      			'type' => 'text',
      		'title' => esc_html__('Subtitle', 'onemax'),
      		'subtitle' => esc_html__('Please enter your slider Subtitle.', 'onemax'),
      			),
      array(
          'id' => 'om-slider-ele-position-subtitle',
          'type' => 'select',
          'title' => esc_html__('Subtitle Position', 'onemax'),
          'subtitle' => esc_html__('The Layer alignment.', 'onemax'),
          'options' => array(
               'left-top' => esc_html__('Left Top','onemax'),
               'left-center' => esc_html__('Left Center','onemax'),
               'left-bottom' => esc_html__('Left Bottom','onemax'),
               'center-top' => esc_html__('Center Top','onemax'),
               'center-center' => esc_html__('Center Center','onemax'),
               'center-bottom' => esc_html__('Center Bottom','onemax'),
               'right-top' => esc_html__('Right Top','onemax'),
               'right-center' => esc_html__('Right Center','onemax'),
               'right-bottom' => esc_html__('Right Bottom','onemax'),
              ),
          ),
          array(
            'id' => 'om-slider-subtitle-delay',
            'type' => 'slider',
            'title' => esc_html__('Subtitle Delay', 'onemax'),
            'default' => 00,
            'min' => 0,
            'step' => 1000,
            'max' => 20000,
            'display_value' => 'label',
        ),

        array(
            'id' => 'om-slider-subtitle-link',
            'type' => 'text',
            'title' => esc_html__('Subtitle Link', 'onemax'),
              ),

          array(
              'id' => 'om-slider-ele-position-hoffset-subtitle',
              'type' => 'text',
              'title' => esc_html__('Subtitle Hoffset', 'onemax'),
              'subtitle' => esc_html__('Horizontal alignment offset in pixels. Both negative and positive numbers can be used.', 'onemax'),
              ),
              array(
                  'id' => 'om-slider-ele-position-voffset-subtitle',
                  'type' => 'text',
                  'title' => esc_html__('Subtitle Voffset', 'onemax'),
                  'subtitle' => esc_html__('Vertical alignment offset in pixels. Both negative and positive numbers can be used.', 'onemax'),
                  ),

      array(
          'id' => 'om-slider-ele-animation-subtitle',
          'type' => 'select',
          'title' => esc_html__('Subtitle Animation', 'onemax'),
          'subtitle' => esc_html__('Please select elements animation.', 'onemax'),
          'options' => array(
               '1' => esc_html__('Fade In','onemax'),
               '2' => esc_html__('Short from Top','onemax'),
               '3' => esc_html__('Short from Bottom','onemax'),
               '4' => esc_html__('Short from Left','onemax'),
               '5' => esc_html__('Short from Right','onemax'),
               '6' => esc_html__('Long from Right','onemax'),
               '7' => esc_html__('Long from Left','onemax'),
               '8' => esc_html__('Long from Top','onemax'),
               '9' => esc_html__('Long from Bottom','onemax'),
               '10' => esc_html__('Skew From Long Left','onemax'),
               '11' => esc_html__('Skew From Long Right','onemax'),
               '12' => esc_html__('Skew From Short Left','onemax'),
               '13' => esc_html__('Skew From Short Right','onemax'),
               '14' => esc_html__('Random Rotate & Scale','onemax'),
               '15' => esc_html__('Letters Fly In From Bottom','onemax'),
               '16' => esc_html__('Letters Fly In From Left','onemax'),
               '17' => esc_html__('Letters Fly In From Right','onemax'),
               '18' => esc_html__('Letters Fly In From Top','onemax'),
               '19' => esc_html__('Masked Zoom Out','onemax'),
               '20' => esc_html__('Popup Smooth','onemax'),
               '21' => esc_html__('Rotate In From Bottom','onemax'),
               '22' => esc_html__('Rotate In From Zero','onemax'),
               '23' => esc_html__('Slide Mask From Bottom','onemax'),
               '24' => esc_html__('Slide Mask From Left','onemax'),
               '25' => esc_html__('Slide Mask From Right','onemax'),
               '26' => esc_html__('Slide Mask From Top','onemax'),
               '27' => esc_html__('Smooth Popup One','onemax'),
               '28' => esc_html__('Smooth Popup Two','onemax'),
               '29' => esc_html__('Smooth Mask From Right','onemax'),
               '30' => esc_html__('Smooth Mask From Left','onemax'),
               '31' => esc_html__('Smooth Mask From Bottom','onemax'),
              ),

          ),




    ),
);



    $home_slider_sections[] = array(
    'title' => esc_html__('Slide Description', 'onemax'),
    'icon' => 'el-icon-font',
    'fields' => array(
      array(
      		'id' => 'om-slider-description',
      		'type' => 'text',
      		'title' => esc_html__('Description', 'onemax'),
      		'subtitle' => esc_html__('Please enter your slider description.', 'onemax'),
      		),
      array(
          'id' => 'om-slider-ele-position-description',
          'type' => 'select',
          'title' => esc_html__('Description Position', 'onemax'),
          'subtitle' => esc_html__('The Layer alignment.', 'onemax'),
          'options' => array(
               'left-top' => esc_html__('Left Top','onemax'),
               'left-center' => esc_html__('Left Center','onemax'),
               'left-bottom' => esc_html__('Left Bottom','onemax'),
               'center-top' => esc_html__('Center Top','onemax'),
               'center-center' => esc_html__('Center Center','onemax'),
               'center-bottom' => esc_html__('Center Bottom','onemax'),
               'right-top' => esc_html__('Right Top','onemax'),
               'right-center' => esc_html__('Right Center','onemax'),
               'right-bottom' => esc_html__('Right Bottom','onemax'),
              ),
          ),

          array(
            'id' => 'om-slider-description-delay',
            'type' => 'slider',
            'title' => esc_html__('Description Delay', 'onemax'),
            'default' => 0,
            'min' => 0,
            'step' => 1000,
            'max' => 20000,
            'display_value' => 'label',
        ),

        array(
            'id' => 'om-slider-description-link',
            'type' => 'text',
            'title' => esc_html__('Description Link', 'onemax'),
              ),

          array(
              'id' => 'om-slider-ele-position-hoffset-description',
              'type' => 'text',
              'title' => esc_html__('Description Hoffset', 'onemax'),
              'subtitle' => esc_html__('Horizontal alignment offset in pixels. Both negative and positive numbers can be used.', 'onemax'),
              ),
              array(
                  'id' => 'om-slider-ele-position-voffset-description',
                  'type' => 'text',
                  'title' => esc_html__('Description Voffset', 'onemax'),
                  'subtitle' => esc_html__('Vertical alignment offset in pixels. Both negative and positive numbers can be used.', 'onemax'),
                  ),

      array(
          'id' => 'om-slider-ele-animation-description',
          'type' => 'select',
          'title' => esc_html__('Description Animation', 'onemax'),
          'subtitle' => esc_html__('Please select elements animation.', 'onemax'),
          'options' => array(
               '1' => esc_html__('Fade In','onemax'),
               '2' => esc_html__('Short from Top','onemax'),
               '3' => esc_html__('Short from Bottom','onemax'),
               '4' => esc_html__('Short from Left','onemax'),
               '5' => esc_html__('Short from Right','onemax'),
               '6' => esc_html__('Long from Right','onemax'),
               '7' => esc_html__('Long from Left','onemax'),
               '8' => esc_html__('Long from Top','onemax'),
               '9' => esc_html__('Long from Bottom','onemax'),
               '10' => esc_html__('Skew From Long Left','onemax'),
               '11' => esc_html__('Skew From Long Right','onemax'),
               '12' => esc_html__('Skew From Short Left','onemax'),
               '13' => esc_html__('Skew From Short Right','onemax'),
               '14' => esc_html__('Random Rotate & Scale','onemax'),
               '15' => esc_html__('Letters Fly In From Bottom','onemax'),
               '16' => esc_html__('Letters Fly In From Left','onemax'),
               '17' => esc_html__('Letters Fly In From Right','onemax'),
               '18' => esc_html__('Letters Fly In From Top','onemax'),
               '19' => esc_html__('Masked Zoom Out','onemax'),
               '20' => esc_html__('Popup Smooth','onemax'),
               '21' => esc_html__('Rotate In From Bottom','onemax'),
               '22' => esc_html__('Rotate In From Zero','onemax'),
               '23' => esc_html__('Slide Mask From Bottom','onemax'),
               '24' => esc_html__('Slide Mask From Left','onemax'),
               '25' => esc_html__('Slide Mask From Right','onemax'),
               '26' => esc_html__('Slide Mask From Top','onemax'),
               '27' => esc_html__('Smooth Popup One','onemax'),
               '28' => esc_html__('Smooth Popup Two','onemax'),
               '29' => esc_html__('Smooth Mask From Right','onemax'),
               '30' => esc_html__('Smooth Mask From Left','onemax'),
               '31' => esc_html__('Smooth Mask From Bottom','onemax'),
          ),

          ),


    ),
);

        $home_slider_sections[] = array(
        'title' => esc_html__('Slide Button', 'onemax'),
        'icon' => 'el-icon-hand-up',
        'fields' => array(

          array(
              'id' => 'slider-button-switch',
              'type' => 'switch',
              'title' => esc_html__('Slider Button', 'onemax'),
              'subtitle' => esc_html__('Please turn it on if you need a button on this slider', 'onemax'),
              'default' => '1',
              ),

          array(
                'id' => 'om-slider-button1-text',
                'type' => 'text',
                'title' => esc_html__('Button1 Text', 'onemax'),
                'subtitle' => esc_html__('Please enter your button text.', 'onemax'),
                'required' => array('slider-button-switch', '=', '1'),

              ),
          array(
                'id' => 'om-slider-button1-link',
                'type' => 'text',
                'title' => esc_html__('Button1 Link', 'onemax'),
                'subtitle' => esc_html__('Please enter your button link.', 'onemax'),
                'required' => array('slider-button-switch', '=', '1'),

              ),
          array(
              'id' => 'om-slider-hoffset-btn1',
              'type' => 'text',
              'title' => esc_html__('Button1 Hoffset', 'onemax'),
              'subtitle' => esc_html__('Horizontal alignment offset in pixels. Both negative and positive numbers can be used.', 'onemax'),
              'required' => array('slider-button-switch', '=', '1'),
              ),
          array(
              'id' => 'om-slider-voffset-btn1',
              'type' => 'text',
              'title' => esc_html__('Button1 Voffset', 'onemax'),
              'subtitle' => esc_html__('Vertical alignment offset in pixels. Both negative and positive numbers can be used.', 'onemax'),
              'required' => array('slider-button-switch', '=', '1'),
              ),

          array(
                'id' => 'om-slider-button2-text',
                'type' => 'text',
                'title' => esc_html__('Button2 Text', 'onemax'),
                'subtitle' => esc_html__('Please enter your button text.', 'onemax'),
                'required' => array('slider-button-switch', '=', '1'),

              ),
          array(
                'id' => 'om-slider-button2-link',
                'type' => 'text',
                'title' => esc_html__('Button2 Link', 'onemax'),
                'subtitle' => esc_html__('Please enter your button link.', 'onemax'),
                'required' => array('slider-button-switch', '=', '1'),

              ),
          array(
              'id' => 'om-slider-hoffset-btn2',
              'type' => 'text',
              'title' => esc_html__('Button2 Hoffset', 'onemax'),
              'subtitle' => esc_html__('Horizontal alignment offset in pixels. Both negative and positive numbers can be used.', 'onemax'),
              'required' => array('slider-button-switch', '=', '1'),
              ),
          array(
              'id' => 'om-slider-voffset-btn2',
              'type' => 'text',
              'title' => esc_html__('Button2 Voffset', 'onemax'),
              'subtitle' => esc_html__('Vertical alignment offset in pixels. Both negative and positive numbers can be used.', 'onemax'),
              'required' => array('slider-button-switch', '=', '1'),
              ),

        ),
    );

        $metaboxes = array();
        $metaboxes[] = array(
        'id' => 'om-slider-options',
        'title' => esc_html__('Slider Options', 'onemax'),
        'post_types' => array('onemax_slider'),
        //'page_template' => array('page-test.php'),
        //'post_format' => array('image'),
        'position' => 'normal', // normal, advanced, side
        'priority' => 'high', // high, core, default, low
        //'sidebar' => false, // enable/disable the sidebar in the normal/advanced positions
        'sections' => $home_slider_sections,
    );

    /*page meta options*/
    $page_sections = array();
        $page_sections[] = array(
        'title' => esc_html__('General', 'onemax'),
        'icon' => 'el-icon-cog',
        'fields' => array(

        array(
            'id' => 'om-slider-code',
            'type' => 'text',
            'title' => esc_html__('OneMax Slider Location', 'onemax'),
            'subtitle' => esc_html__('Please enter your OneMax Slider location name here.', 'onemax'),
        ),

        array(
            'id' => 'ls-slider-code',
            'type' => 'text',
            'title' => esc_html__('Layer Slider Code', 'onemax'),
            'subtitle' => esc_html__('Please insert your Layer Slider code here.', 'onemax'),
        ),

        array(
            'id' => 'sr-slider-code',
            'type' => 'text',
            'title' => esc_html__('Slider Revolution Code', 'onemax'),
            'subtitle' => esc_html__('Please insert your Slider Revolution code here.', 'onemax'),
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
                  'left top' => esc_html__('Left Top','onemax'),
                   'left center' => esc_html__('Left Center','onemax'),
                   'left bottom' => esc_html__('Left Bottom','onemax'),
                   'right top' => esc_html__('Right Top','onemax'),
                   'right center' => esc_html__('Right Center','onemax'),
                   'right bottom' => esc_html__('Right Bottom','onemax'),
                   'center top' => esc_html__('Center Top','onemax'),
                   'center center' => esc_html__('Center Center','onemax'),
                   'center bottom' => esc_html__('Center Bottom','onemax'),
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


        ),
    );


        $metaboxes[] = array(
        'id' => 'om-page-options',
        'title' => esc_html__('Page Options', 'onemax'),
        'post_types' => array('page'),
        //'page_template' => array('page-test.php'),
        //'post_format' => array('image'),
        'position' => 'normal', // normal, advanced, side
        'priority' => 'high', // high, core, default, low
        //'sidebar' => false, // enable/disable the sidebar in the normal/advanced positions
        'sections' => $page_sections,
        );

/*portfolio meta options*/
          $portfolio_sections = array();
          $portfolio_sections[] = array(
              'title' => esc_html__('General', 'onemax'),
              'icon' => 'el-icon-cog',
              'fields' => array(
                array(
                    'id' => 'om-portfolio-link',
                    'type' => 'text',
                    'title' => esc_html__('External Portfolio Link', 'onemax'),
                    'subtitle' => esc_html__('Enter the external portfolio link,it will link to this portfolio if empty.', 'onemax'),
                ),
                array(
                    'id' => 'om-portfolio-youtube-link',
                    'type' => 'text',
                    'title' => esc_html__('Youtube Link', 'onemax'),
                    'subtitle' => esc_html__('For example:https://www.youtube.com/watch?v=lMJXxhRFO1k.', 'onemax'),
                ),
                array(
                    'id' => 'om-portfolio-vimeo-link',
                    'type' => 'text',
                    'title' => esc_html__('Vimeo Link', 'onemax'),
                    'subtitle' => esc_html__('For example:https://vimeo.com/51589652.', 'onemax'),
                ),
                array(
                    'id' => 'om-portfolio-mp4-link',
                    'type' => 'media',
                    'compiler' => 'true',
                    'mode' => false,
                    'title' => esc_html__('Local MP4 Video', 'onemax'),
                ),
            ),
        );
        $metaboxes[] = array(
        'id' => 'om-portfolio-options',
        'title' => esc_html__('Portfolio Options', 'onemax'),
        'post_types' => array('portfolio'),
        //'page_template' => array('page-test.php'),
        //'post_format' => array('image'),
        'position' => 'normal', // normal, advanced, side
        'priority' => 'high', // high, core, default, low
        //'sidebar' => false, // enable/disable the sidebar in the normal/advanced positions
        'sections' => $portfolio_sections,
    );
/*clients meta options*/
          $clients_sections = array();
          $clients_sections[] = array(
              'title' => esc_html__('General', 'onemax'),
              'icon' => 'el-icon-cog',
              'fields' => array(
                array(
                    'id' => 'om-client-link',
                    'type' => 'text',
                    'title' => esc_html__('Client Link', 'onemax'),
                ),
            ),
        );
        $metaboxes[] = array(
        'id' => 'om-client-options',
        'title' => esc_html__('Client Options', 'onemax'),
        'post_types' => array('clients'),
        //'page_template' => array('page-test.php'),
        //'post_format' => array('image'),
        'position' => 'normal', // normal, advanced, side
        'priority' => 'high', // high, core, default, low
        //'sidebar' => false, // enable/disable the sidebar in the normal/advanced positions
        'sections' => $clients_sections,
    );

        return $metaboxes;
    }
  add_action('redux/metaboxes/'.$redux_opt_name.'/boxes', 'onemax_add_metaboxes_slider');
endif;

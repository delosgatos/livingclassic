<?php global $onemax_options;?>
<div id="header-outer" data-using-logo="1" data-logo-height="30" data-m-logo-height="24" data-padding="28" data-header-resize="1">
        <div id="search-outer">
                <div id="search">
                        <div class="container">
                                <div id="search-box">
                                        <div class="col span_12">
                                                <form method="GET">
                                                        <input type="text" name="s" id="s" placeholder="Start Typing..." /></form>
                                        </div>
                                        <!--/span_12--></div>
                                <!--/search-box-->
                                <div id="close">
                                        <a href="#">
                                                <span class="fa fa-close" aria-hidden="true"></span>
                                        </a>
                                </div>
                        </div>
                        <!--/container--></div>
                <!--/search--></div>
        <!--/search-outer-->
        <header id="top">
                <div class="menu-width">
                        <div class="row">
                        <div class="col span_3">
                                        <a id="logo" href="<?php echo home_url();?>">
                                                <?php onemax_get_logo_image();?></a>
                                </div>
                                                <!--/span_3-->
                                <div class="col span_9 col_last">
                                        <div class="slide-out-widget-area-toggle mobile-icon std-menu slide-out-from-right" data-icon-animation="simple-transform">
                                                <div>
                                                        <a id="toggle-nav" href="#sidewidgetarea" class="closed">
                                                                <span>
                                                                        <i class="lines-button x2">
                                                                                <i class="lines"></i>
                                                                        </i>
                                                                </span>
                                                        </a>
                                                </div>
                                        </div>
                                        <!--mobile cart link-->
                                        <a id="mobile-cart-link" href="">
                                                <i class="icon-salient-cart"></i>
                                        </a>
                                        <nav>
                                            <?php if($onemax_options['search-icon']=='1') { ?>
                                                <ul class="buttons" data-user-set-ocm="off">
                                                        <li id="search-btn">
                                                                <div>
                                                                        <a href="#searchbox">
                                                                                <span class="fa fa-search" aria-hidden="true"></span>
                                                                        </a>
                                                                </div>
                                                        </li>
                                                </ul>
                                            <?php } ?>
                                                <?php echo str_replace('img_logo_position', onemax_get_logo_image(false), onemax_get_menu_info('center')); ?>
                                        </nav>
                                </div>
                                <!--/span_9--></div>
                        <!--/row--></div>
                <!--/container--></header>

</div>
<!--/header-outer-->
<div id="mobile-menu" data-mobile-fixed="false" >
        <div class="container">
                <?php echo onemax_get_menu_info('nomal',false); ?>
            <?php if($onemax_options['search-icon']=='1') { ?>
            <div>
              <ul>
                        <li id="mobile-search">
                                <form method="GET">
                                        <input type="text" name="s" value="" placeholder="Search.." /></form>
                        </li>
              </ul>
                </div>
            <?php } ?>
        </div>
</div>

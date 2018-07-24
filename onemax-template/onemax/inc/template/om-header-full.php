<?php global $onemax_options;?>
<div id="header-outer" data-using-logo="1" data-logo-height="30" data-m-logo-height="24" data-padding="28" data-header-resize="1">
    <div id="search-outer" class="">
        <div id="search">
            <div class="menu-search">
                <div id="search-box">
                    <div class="col span_12">
                        <form action="" method="GET">
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
                    <a id="logo" href="<?php echo home_url();?>"><?php onemax_get_logo_image();?></a>
                </div>
                <!--/span_3-->
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
                <div class='navbar-toggle-fix' title='Menu' display="none">
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
                </div>
                <div class="nav nav-hide">
                    <div class="om-nav-item">
                        <!-- This is simpleFull list -->
                        <?php echo onemax_get_menu_info('simple'); ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
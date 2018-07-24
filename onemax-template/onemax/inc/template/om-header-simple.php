<?php
global $onemax_options;
?>
<div id="header-outer" data-using-logo="1" data-logo-height="30" data-m-logo-height="24" data-padding="28" data-header-resize="1">
        <header id="top">
            <div class="menu-width">
                <div class="row">
                    <?php if($onemax_options['head-menu-layout-img'] != 'Left' && $onemax_options['head-menu-layout-img'] != 'Right' && $onemax_options['head-menu-layout-img']!='simple-right-menu' && $onemax_options['head-menu-layout-img']!='simple-left-menu'){ ?>
                    <div class="col span_3">
                        <a id="logo" href="<?php echo home_url();?>">
                            <?php onemax_get_logo_image();?>
                        </a>
                    </div>
                    <!--/span_3-->
                    <?php } ?>
                    <div class="col span_9 col_last ">
                        <div id="sidebar">
     <div class="inner">
         <?php if($onemax_options['head-menu-layout-img'] == 'Left' || $onemax_options['head-menu-layout-img'] == 'Right' || $onemax_options['head-menu-layout-img'] == 'simple-right-menu'|| $onemax_options['head-menu-layout-img'] == 'simple-left-menu'){ ?>
         <div id="simpleLogo"><a href="<?php echo home_url();?>"><?php onemax_get_logo_image(); ?></a></div>
         <?php } ?>
            <?php echo onemax_get_menu_info('simple'); ?>
         <?php if($onemax_options['search-icon']=='1') { ?>   
         <section id="sectionSearch" class="alt">
                <form method="post" action="#">
                    <div>
                        <input type="text" name="s" id="s" placeholder="Search">
                        <div class="iconSearch">
                            <span class="fa fa-search" aria-hidden="true"></span>
                        </div>
                    </div>
                </form>
            </section>
         <?php } ?>
        </div>
    </div>
                    </div>
                    <!--/span_9--></div>
                <!--/row--></div>
            <!--/container--></header>
    </div>
    <!--/header-outer-->
<?php
/**
 * The template for displaying the footer.
 *
 * @package OneMax
 * @author OneMax Creative Design Team
 * @link http://onemaxwpdemo.onemax.site
 */
global $onemax_options;?>
<footer id="footer" class="container-fluid">
    <?php
        if(!is_active_sidebar('footer-area-1') && !is_active_sidebar('footer-area-2') && !is_active_sidebar('footer-area-3') && !is_active_sidebar('footer-area-4')) {} else{
    ?>
    <div class="container foot-content" data-rjs="2">
        <div class="row mg9 text-left">
            <aside>
            <?php
                if($onemax_options['footer-layout']=='1'){
                    $foot_class1='om-col-12';
                }elseif($onemax_options['footer-layout']=='2'){
                    $foot_class1=$foot_class2='om-col-6';
                }elseif ($onemax_options['footer-layout']=='3') {
                     $foot_class1='om-col-8';
                     $foot_class2='om-col-4';
                }elseif ($onemax_options['footer-layout']=='4') {
                     $foot_class1='om-col-4';
                     $foot_class2='om-col-8';
                }elseif ($onemax_options['footer-layout']=='5') {
                     $foot_class1=$foot_class2=$foot_class3='om-col-4';
                }elseif ($onemax_options['footer-layout']=='6') {
                     $foot_class1='om-col-6';
                     $foot_class2=$foot_class3='om-col-3';
                }elseif ($onemax_options['footer-layout']=='7') {
                     $foot_class2='om-col-6';
                     $foot_class1=$foot_class3='om-col-3';
                }elseif ($onemax_options['footer-layout']=='8') {
                     $foot_class3='om-col-6';
                     $foot_class1=$foot_class2='om-col-3';
                }  else {
                     $foot_class1=$foot_class2=$foot_class3=$foot_class4='om-col-3';
                }
                if(in_array($onemax_options['footer-layout'], array('1','2','3','4','5','6','7','8','9'))) { ?>
                        <div class="om-col <?php echo esc_html($foot_class1); ?>">
                            <?php dynamic_sidebar( 'footer-area-1' ); ?>
                        </div><!-- .first .widget-area -->
                <?php } if (in_array($onemax_options['footer-layout'], array('2','3','4','5','6','7','8','9'))) { ?>
                        <div class="om-col <?php echo esc_html($foot_class2); ?>">
                            <?php dynamic_sidebar( 'footer-area-2' ); ?>
                        </div><!-- .second .widget-area -->
                <?php } if (in_array($onemax_options['footer-layout'], array('5','6','7','8','9'))) { ?>
                        <div class="om-col <?php echo esc_html($foot_class3); ?>">
                            <?php dynamic_sidebar( 'footer-area-3' ); ?>
                        </div><!-- .third .widget-area -->
                <?php } if ($onemax_options['footer-layout']=='9') { ?>
                        <div class="om-col <?php echo esc_html($foot_class4); ?>">
                            <?php dynamic_sidebar( 'footer-area-4' ); ?>
                        </div><!-- .fourth .widget-area -->
                <?php } ?>
           </aside><!-- #fatfooter -->
        </div><!-- row -->
    </div><!-- container -->
    <?php } ?>

    <?php if(!empty($onemax_options['copyright'])) { ?>
    <div class="foot_nav row mg9">
        <div class="container text-center" style="text-align:<?php echo esc_html($onemax_options['copyright-align']);?>; padding:0 15px">
            <span class="copyright"><?php echo esc_html($onemax_options['copyright']); ?></span>
        </div>
    </div><!-- row -->
    <?php } ?>

</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>

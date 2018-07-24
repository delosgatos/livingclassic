<?php
/**
 * The Template for displaying all single posts.
 *
 * @package OneMax
 * @author OneMax Creative Design Team
 * @link http://onemaxwpdemo.onemax.site
 */
get_header(); ?>
<div id="om-single" class="content-area">
<?php while (have_posts()) : the_post(); ?>

    <div id="single">
        <?php if(has_post_thumbnail()&&$fe_img=wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')) { ?>
        <div class="single-img">
                    <img alt="blog featured image" src="<?php echo esc_url($fe_img[0]);?>" />
        </div>
        <?php } ?>
        <div class="om-single-center">
            <div class="single-title"><h1><?php the_title();?></h1></div>
            <p class="single-time-author"><?php the_time('F j, Y');?><span>|</span><?php esc_html_e('by','onemax');?>&nbsp;&nbsp;<?php the_author();?><span>|</span><?php comments_number( 'no comments', '1 comment', '% comments' );?></p>

            <div class="om-si-box">
                <div class="om-c-cont"><?php the_content();?></div>
            </div>
            <?php
            wp_link_pages( array(
                'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'onemax' ),
                'after'       => '</div>',
                'link_before' => '<span class="page-number">',
                'link_after'  => '</span>',
            ) );
            ?>
            <div class="relate-tags"><?php the_category( ' ' ); ?><?php the_tags('', '', ''); ?></div>
        </div>
        <?php if(!empty($onemax_options['facebook']) || !empty($onemax_options['twitter']) || !empty($onemax_options['youtube']) || !empty($onemax_options['vimeo']) || !empty($onemax_options['linkedin'])
        || !empty($onemax_options['pinterest']) || !empty($onemax_options['instagram']) || !empty($onemax_options['flickr']) || !empty($onemax_options['google_plus'])){ ?>
        <div class="om-head-portrait">
            <div class="single-date">
                <div class="sigle-p">
                    <div class="om-social">
                       <?php
                            if(empty($onemax_options['social-style']))
                                $social_style_class='1';
                            else
                                $social_style_class=$onemax_options['social-style'];
                        ?>
                        <div class="one-social-share one-theme-<?php echo esc_html($social_style_class);?> clearfix">

                            <?php if(!empty($onemax_options['facebook'])) { ?>
                               <div class="one-facebook one-single-icon">
                                   <a rel="nofollow" title="Share on Facebook" target="_blank" href="<?php echo esc_url($onemax_options['facebook']);?>">
                                        <div class="one-icon-block clearfix">
                                                <i class="fa fa-facebook"></i>
                                        </div>
                                    </a>
                            </div>
                            <?php } ?>
                            <?php if(!empty($onemax_options['twitter'])) { ?>
                               <div class="one-twitter one-single-icon">
                                   <a rel="nofollow" title="Share on Twitter" target="_blank" href="<?php echo esc_url($onemax_options['twitter']);?>">
                                        <div class="one-icon-block clearfix">
                                                <i class="fa fa-twitter"></i>
                                        </div>
                                    </a>
                            </div>
                            <?php } ?>
                            <?php if(!empty($onemax_options['youtube'])) { ?>
                               <div class="one-youtube one-single-icon">
                                   <a rel="nofollow" title="Share on Youtube" target="_blank" href="<?php echo esc_url($onemax_options['youtube']);?>">
                                        <div class="one-icon-block clearfix">
                                                <i class="fa fa-youtube"></i>
                                        </div>
                                    </a>
                            </div>
                            <?php } ?>
                            <?php if(!empty($onemax_options['vimeo'])) { ?>
                               <div class="one-vimeo one-single-icon">
                                   <a rel="nofollow" title="Share on Vimeo" target="_blank" href="<?php echo esc_url($onemax_options['vimeo']);?>">
                                        <div class="one-icon-block clearfix">
                                                <i class="fa fa-vimeo"></i>
                                        </div>
                                    </a>
                            </div>
                            <?php } ?>
                            <?php if(!empty($onemax_options['linkedin'])) { ?>
                               <div class="one-linkedin one-single-icon">
                                   <a rel="nofollow" title="Share on Linkedin" target="_blank" href="<?php echo esc_url($onemax_options['linkedin']);?>">
                                        <div class="one-icon-block clearfix">
                                                <i class="fa fa-linkedin"></i>
                                        </div>
                                    </a>
                            </div>
                            <?php } ?>
                            <?php if(!empty($onemax_options['pinterest'])) { ?>
                               <div class="one-pinterest one-single-icon">
                                   <a rel="nofollow" title="Share on Pinterest" target="_blank" href="<?php echo esc_url($onemax_options['pinterest']);?>">
                                        <div class="one-icon-block clearfix">
                                                <i class="fa fa-pinterest"></i>
                                        </div>
                                    </a>
                            </div>
                            <?php } ?>
                            <?php if(!empty($onemax_options['instagram'])) { ?>
                               <div class="one-instagram one-single-icon">
                                   <a rel="nofollow" title="Share on Instagram" target="_blank" href="<?php echo esc_url($onemax_options['instagram']);?>">
                                        <div class="one-icon-block clearfix">
                                                <i class="fa fa-instagram"></i>
                                        </div>
                                    </a>
                            </div>
                            <?php } ?>
                            <?php if(!empty($onemax_options['flickr'])) { ?>
                               <div class="one-flickr one-single-icon">
                                   <a rel="nofollow" title="Share on Flickr" target="_blank" href="<?php echo esc_url($onemax_options['flickr']);?>">
                                        <div class="one-icon-block clearfix">
                                                <i class="fa fa-flickr"></i>
                                        </div>
                                    </a>
                            </div>
                            <?php } ?>
                            <?php if(!empty($onemax_options['google_plus'])) { ?>
                               <div class="one-google one-single-icon">
                                   <a rel="nofollow" title="Share on Google" target="_blank" href="<?php echo esc_url($onemax_options['google_plus']);?>">
                                        <div class="one-icon-block clearfix">
                                                <i class="fa fa-google"></i>
                                        </div>
                                    </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
           </div>
        </div>
        <?php } ?>
            <!--comments start-->
            <?php comments_template();?>
            <!--comments end-->
    </div>

<?php endwhile;?>
</div>
<?php get_footer(); ?>

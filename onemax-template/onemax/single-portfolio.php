<?php
/**
 * The Template for displaying all single posts.
 *
 * @package OneMax
 * @author OneMax Creative Design Team
 * @link http://onemaxwpdemo.onemax.site
 */
get_header(); ?>

<div id="om-single-portfolio" class="content-area">
    <?php while (have_posts()) : the_post(); ?>

    <div id="single">
            <?php if(has_post_thumbnail()&&$fe_img=wp_get_attachment_image_src(get_post_thumbnail_id(), array(1201, 676))) { ?>
            <div class="single-img">
                <img width="1201" height="676" alt="blog featured image" src="<?php echo esc_url($fe_img[0]);?>" />
            </div>
            <?php } ?>
            <div class="single-center">
                <p class="portfplio-title"><?php the_title();?></p>
                <em></em>
                <p>
                    <span><?php the_content();?></span></p>
                	<p>
                		<a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
                	    <a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                		<a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                		<a href=""><i class="fa fa-tumblr" aria-hidden="true"></i></a>
                		<a href=""><i class="fa fa-behance" aria-hidden="true"></i></a>
                	</p></div>
            <!--comments start-->
            <?php comments_template();?>
            <!--comments end-->
            <?php
                $current_post_cat=wp_get_post_categories( get_the_ID() );
                $related_args=array(
                    'category__in' => $current_post_cat,
                    'ignore_sticky_posts' => true,
                    'post__not_in'	 => array( get_the_ID() ),
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                );
                $related_posts=new WP_Query( $related_args );
                if($related_posts ->have_posts()):
            ?>
            <div class="related-item">
                <p>
                    <span><?php esc_html_e('Related items','onemax');?></span>
                </p>
                <?php while($related_posts -> have_posts()) : $related_posts ->the_post();?>
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a>
                 <?php endwhile;?>
            </div>
            <?php endif; wp_reset_postdata();?>
        </div>

<?php endwhile;?>
</div>
<?php get_footer(); ?>

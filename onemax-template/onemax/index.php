<?php
/**
 * The main template file
 *
 * @package OneMax
 * @author OneMax Creative Design Team
 * @link http://onemaxwpdemo.onemax.site
 */

get_header(); ?>

<!--index start-->
<div id="om-index" class="content-area">
    <ul class="blog">
        <!--blog layout start-->
      <!--blog 2-->
      <?php
            if(have_posts()) {
                while(have_posts()) {
                    the_post();
        ?>
      <li <?php post_class('post_width');?>>
        <div class="block-side blog2img">
          <a href="<?php the_permalink(); ?>">
            <?php if(has_post_thumbnail()&&$fe_img=wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')) { ?>
                <img  alt="blog thumbnail" src="<?php echo esc_url($fe_img[0]);?>" />
            <?php } ?>
          </a>
        </div>
        <div class="block_width blog2cont">
              <div class="heading-section">
                  <h1><a href="<?php the_permalink(); ?>"><strong><?php the_title();?></strong></a></h1>
              </div>
            <div class="vc-blog2-content"><?php the_content(esc_html__('Continue reading','onemax')); ?></div>
            <div class="om-author-time2">
              <span><?php echo get_avatar( get_the_author_meta( 'ID' ), 18, '', 'Authors gravatar' );?>&nbsp;&nbsp;<?php the_author();?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php the_time('F j, Y');?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php comments_number( 'no comments', '1 comment', '% comments' );?></span>
            </div>
        </div>
      </li>
      <?php } ?>
        <?php } else {?>
      <li class="no-post"><?php esc_html_e('Sorry, there are no posts!','onemax');?></li>
        <?php } ?>

      <!--blog layout end-->
    </ul>
    <!--previous page and next page-->
    <div class="posts_nav_link">
    <?php  the_posts_pagination(); ?>
    </div>
</div>
<!--index end-->

<?php get_footer(); ?>

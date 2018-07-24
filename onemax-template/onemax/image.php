<?php
/**
 * The image page.
 *
 * @package OneMax
 * @author OneMax Creative Design Team
 * @link http://onemaxwpdemo.onemax.site
 */
get_header(); ?>
<div id="om-single" class="content-area">
<?php while (have_posts()) : the_post(); ?>
	<div class="om-img">
		<p class="attachment">
			<a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'full' ); ?></a>
		</p>
		<div class="caption">
		<?php if ( !empty($post->post_excerpt) ) the_excerpt(); ?>
		</div>
	</div>
<?php endwhile;?>
</div>
<?php get_footer(); ?>
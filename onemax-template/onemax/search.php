<?php
/**
 * The search template file.
 *
 * @package OneMax
 * @author OneMax Creative Design Team
 * @link http://onemaxwpdemo.onemax.site
 */

get_header(); ?>

	<div id="om-search" class="content-area">
		<div class="search-content">
    <header class="page-header">
      <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'onemax' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
    </header>
		<?php if ( have_posts() ) : ?>
    <ul class="blog search-box">
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();
        ?>
        <li class="post">
            <div class="blocklf">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
		            <div class="search-time-author"><?php the_time('F j, Y');?><span>|</span><?php esc_html_e('by','onemax');?>&nbsp;&nbsp;<?php the_author();?><span>|</span><?php comments_number( 'no comments', '1 comment', '% comments' );?></div>
                <div class="search-post-content"><?php the_excerpt(); ?></div>
            </div>
        </li>

			<?php endwhile;
			 ?>
      </ul>
      <div class="posts_nav_link">
          <?php
					the_posts_pagination( array(
						'prev_text'          => esc_html__( 'Previous', 'onemax' ),
						'next_text'          => esc_html__( 'Next', 'onemax' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'onemax' ) . ' </span>',
					) );

					?>
      </div>
		<?php else : ?>
     <div class="no-search-result"><?php esc_html_e('Nothing Found!','onemax');?></div>
    <?php
		endif;
		?>
	</div><!-- .search-content-->
</div>	<!-- om-search -->


<?php get_footer(); ?>

<?php
/**
 * The template for displaying Comments.
 */
?>
<div class="om-show-comments">
    <ol class="comment-list">
    <?php if(post_password_required()): ?>
        <p class="need-pwd"><?php esc_html_e('This post is password protected. Please enter the password to view this post.','onemax');?></p>
    <?php else: ?>
        <?php if(have_comments()): wp_list_comments(array(
                'style'       => 'ol',
                'avatar_size'       => 64,
                'short_ping'  => true,
                'walker' => new onemax_comment_walker
            ));?>
            <div class="comment-links"><?php paginate_comments_links();?></div>
        <?php endif; ?>
    <?php endif; ?>
    </ol>
</div>


    <?php
    	$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
        if(comments_open()){ ?>
        <div class="om-add-comments">
        <?php
            comment_form(array(
                        'fields' => apply_filters(
                        'comment_form_default_fields', array(
                              'author' =>
                              '<p class="comment-form-author"><label for="author">' . esc_html__( 'Name', 'onemax' ) . '</label> ' .
                              ( $req ? '<span class="required">*</span></p>' : '' ) .
                              '<p><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                              '" size="60"' . esc_html($aria_req) . ' /></p>',

                              'email' =>
                              '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'onemax' ) . '</label> ' .
                              ( $req ? '<span class="required">*</span></p>' : '' ) .
                              '<p><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                              '" size="60"' . esc_html($aria_req) . ' /></p>',


                              'url' =>
                              '<p class="comment-form-url"><label for="url">' . esc_html__( 'Website', 'onemax' ) . '</label></p>' .
                              '<p><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
                              '" size="60" /></p>',
                              )),
                        'class_submit' 				=> 'post-button',
                        'title_reply'	=>	esc_html__('ADD COMMENT','onemax'),
                        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . esc_html__( '','onemax' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
                        'comment_notes_before' => '',
                        'comment_notes_after' => '',
                        ) );

        ?>
        </div>
       <?php } ?>

<?php
	class onemax_comment_walker extends Walker_Comment {
		var $tree_type = 'comment';
		var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

		// constructor – wrapper for the comments list
		function __construct() { ?>

			<section class="comments-list">

		<?php }

		// start_lvl – wrapper for child comments list
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$GLOBALS['comment_depth'] = $depth + 2; ?>

			<section class="child-comments comments-list">

		<?php }

		// end_lvl – closing wrapper for child comments list
		function end_lvl( &$output, $depth = 0, $args = array() ) {
			$GLOBALS['comment_depth'] = $depth + 2; ?>

			</section>

		<?php }

		// start_el – HTML for comment template
		function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
			$depth++;
			$GLOBALS['comment_depth'] = $depth;
			$GLOBALS['comment'] = $comment;
			$parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' );

			if ( 'article' == $args['style'] ) {
				$tag = 'article';
				$add_below = 'comment';
			} else {
				$tag = 'article';
				$add_below = 'comment';
			} ?>

			<article <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemprop="comment" itemscope itemtype="http://schema.org/Comment">
				<figure class="gravatar"><?php echo get_avatar( $comment, 64, '', 'Authors gravatar' ); ?></figure>
				<div class="comment-meta post-meta" role="complementary">
					<div class="comment-author">
						<a class="comment-author-link" href="<?php comment_author_url(); ?>" itemprop="author"><?php comment_author(); ?></a>
					</div>
					<time class="comment-time" datetime="<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>" itemprop="datePublished"><?php comment_date('jS F Y') ?>, <a href="#comment-<?php comment_ID() ?>" itemprop="url"><?php comment_time() ?></a></time>
					<?php edit_comment_link('<p class="comment-meta-item">Edit this comment</p>','',''); ?>
					<?php if ($comment->comment_approved == '0') : ?>
					<p class="comment-meta-item">Your comment is awaiting moderation.</p>
					<?php endif; ?>
  				<div class="comment-content post-content" itemprop="text">
  					<?php comment_text() ?>
  					<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
  				</div>
      </div>
		<?php }

		// end_el – closing HTML for comment template
		function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>

			</article>

		<?php }

		// destructor – closing wrapper for the comments list
		function __destruct() { ?>

			</section>

		<?php }

	}
?>

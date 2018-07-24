<?php

/*
  * OneMaxTheme Functions
  * Author：OneMax creative design
  * Official Site: www.onemax.site
*/

//int featured image
add_theme_support('post-thumbnails');
add_image_size('featured_preview', 112, 63);


// get featured image
function onemax_get_featured_image($post_ID) {
    $post_thumbnail_id = get_post_thumbnail_id($post_ID);
    if ($post_thumbnail_id) {
        $post_thumbnail_img = the_post_thumbnail('featured_preview');
        return $post_thumbnail_img[0];
    }
}
// add new column
function onemax_columns_tilte($defaults) {
    $defaults['featured_image'] = 'Featured Image';
    return $defaults;
}

// show featured image for post
function onemax_columns_content($column_name, $post_ID) {
    if ($column_name == 'featured_image') {
        $post_featured_image = onemax_get_featured_image($post_ID);
        if ($post_featured_image) {
            echo '<img alt="featured image" src="' . esc_url($post_featured_image) . '" />';
        }
    }
}
add_filter('manage_posts_columns', 'onemax_columns_tilte');
add_action('manage_posts_custom_column', 'onemax_columns_content', 10, 2);

// add onemax slider column title
function onemax_onemax_slider_columns_title( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => esc_html__( 'Title' ,'onemax'),
		'location' => esc_html__( 'Location' ,'onemax'),
        'tags' => esc_html__( 'Tags' ,'onemax'),
		'date' => esc_html__( 'Date' ,'onemax')
	);
	return $columns;
}
add_filter( 'manage_edit-onemax_slider_columns', 'onemax_onemax_slider_columns_title' ) ;

// add onemax slider column content
function onemax_onemax_slider_columns_content( $column, $post_id ) {
	global $post;
	switch( $column ) {
		case 'location' :
			$terms = get_the_terms( $post_id, 'location' );
			if ( !empty( $terms ) ) {
				$out = array();
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'location', 'display' ) )
					);
				}
				echo join( ', ', $out );
			}
			else {
				esc_html_e( 'No location','onemax' );
			}
			break;
   		default :
			break;
	}
}
add_action( 'manage_onemax_slider_posts_custom_column', 'onemax_onemax_slider_columns_content', 10, 2 );

// active menu
function onemax_menu_int() {
	add_theme_support('menus');
	register_nav_menu('primary_head_menu', 'Primary Header Navigation');
	register_nav_menu('footer_menu', 'Footer Navigation');
	}

add_action('init', 'onemax_menu_int');


// widgets  function
function onemax_widgets_init() {

    // First footer widget area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => esc_html__( 'Footer Area 1', 'onemax' ),
        'id' => 'footer-area-1',
        'description' => esc_html__( 'Footer Area 1', 'onemax' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );

    // Second Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => esc_html__( 'Footer Area 2', 'onemax' ),
        'id' => 'footer-area-2',
        'description' => esc_html__( 'Footer Area 2', 'onemax' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );

    // Third Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => esc_html__( 'Footer Area 3', 'onemax' ),
        'id' => 'footer-area-3',
        'description' => esc_html__( 'Footer Area 3', 'onemax' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );

    // Fourth Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => esc_html__( 'Footer Area 4', 'onemax' ),
        'id' => 'footer-area-4',
        'description' => esc_html__( 'Footer Area 4', 'onemax' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );

}

add_action( 'widgets_init', 'onemax_widgets_init' );

require_once ONEMAX_DIR . '/inc/functions/om_admin_metabox.php';

//remove 'view' action
add_filter( 'post_row_actions', 'onemax_remove_row_actions', 10, 1 );

function onemax_remove_row_actions( $actions )
{
    if( get_post_type() === 'clients' || get_post_type() === 'testimonials' || get_post_type() === 'onemax_slider')
        unset( $actions['view'] );
    return $actions;
}

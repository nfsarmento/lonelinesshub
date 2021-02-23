<?php
/**
 * Backend functions
 *
 * @package lonelinesshub
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*
 * Register resources sidebar
 * 
 */
if ( ! function_exists( 'lonelinesshub_widgets_init' ) ) {
function lonelinesshub_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Resources Sidebar', 'lonelinesshub' ),
        'id' => 'sidebar-resources',
        'description' => __( 'This main sidebar appears on the left on posts resources landing page', 'lonelinesshub' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => __( 'Resources Single Sidebar', 'lonelinesshub' ),
        'id' => 'sidebar-single-resources',
        'description' => __( 'This main sidebar appears on the left on posts resources single page', 'lonelinesshub' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => __( 'Login Sidebar', 'lonelinesshub' ),
        'id' => 'login-widget',
        'description' => __( 'This main sidebar appears on the home page for the login widget', 'lonelinesshub' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );	
	
	register_sidebar( array(
        'name' => __( 'Home Sidebar', 'lonelinesshub' ),
        'id' => 'home-cta',
        'description' => __( 'This main sidebar appears on the home for the call to action', 'lonelinesshub' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );	
} 
}
add_action( 'widgets_init', 'lonelinesshub_widgets_init' );


 /**
  * Post view count
  *
  * ref: DIY Popular Posts @ https://digwp.com/2016/03/diy-popular-posts/
  * ref: https://www.wpbeginner.com/wp-tutorials/how-to-track-popular-posts-by-views-in-wordpress-without-a-plugin/
  */
function lonelinesshub_popular_posts( $post_id ) {
 	$count_key = 'popular_posts';
 	$count = get_post_meta( $post_id, $count_key, true );
 	if ( $count == '' ) {
 		$count = 0;
 		delete_post_meta( $post_id, $count_key );
 		add_post_meta( $post_id, $count_key, '0' );
 	} else {
 		$count++;
 		update_post_meta( $post_id, $count_key, $count );
 	}
}
function lonelinesshub_track_posts( $post_id ) {
 	if ( ! is_single() ) return;
 	if ( empty( $post_id ) ) {
 		global $post;
 		$post_id = $post->ID;
 	}
 	lonelinesshub_popular_posts( $post_id );
}
add_action( 'wp_head', 'lonelinesshub_track_posts' );


function lonelinesshub_get_post_views($postID){
    $count_key = 'popular_posts';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}


add_filter('manage_posts_columns', 'lonelinesshub_posts_column_views');
add_action('manage_posts_custom_column', 'lonelinesshub_posts_custom_column_views',5,2);
function lonelinesshub_posts_column_views($defaults){
     $defaults['popular_posts'] = 'Views';
     return $defaults;
}
function lonelinesshub_posts_custom_column_views( $column_name, $id ){
  if( $column_name === 'popular_posts' ){
 	 	echo (int) get_post_meta(get_the_ID(), 'popular_posts', true) . ' View(s)';
   }
}


/*
 * Rename plugin menu admin name
 * 
 */
if ( ! function_exists( 'lonelinesshub_renamed_admin_menu_items' ) ) {
function lonelinesshub_renamed_admin_menu_items() {
    global $menu;

    // Define your changes here
    $updates = array(
        "BuddyBoss" => array(
            'name' => 'Hub'
        )
    );

    foreach ($menu as $k => $props) {

        // Check for new values
        $new_values = (isset($updates[$props[0]])) ? $updates[$props[0]] : false;
        if (!$new_values) continue;

        // Change menu name
        $menu[$k][0] = $new_values['name'];
    }
}
}
add_action('admin_init', 'lonelinesshub_renamed_admin_menu_items');




/**
 * Function to remove dashboard widgets
 */
if ( ! function_exists( 'lonelinesshub_remove_dashboard_widgets' ) ) {
function lonelinesshub_remove_dashboard_widgets() {
    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
	remove_meta_box( 'wordfence_activity_report_widget', 'dashboard', 'normal');
  	remove_meta_box( 'wpe_dify_news_feed', 'dashboard', 'normal');
	remove_meta_box( 'e-dashboard-overview', 'dashboard', 'normal');
	remove_meta_box( 'tribe_dashboard_widget', 'dashboard', 'normal');
 }
}
add_action('wp_dashboard_setup', 'lonelinesshub_remove_dashboard_widgets' );
add_action('wp_user_dashboard_setup', 'remove_dashboard_widgets', 20);

remove_action('welcome_panel', 'wp_welcome_panel');

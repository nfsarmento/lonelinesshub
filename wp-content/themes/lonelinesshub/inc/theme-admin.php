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
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ) );
    register_sidebar( array(
        'name' => __( 'Resources Single Sidebar', 'lonelinesshub' ),
        'id' => 'sidebar-single-resources',
        'description' => __( 'This main sidebar appears on the left on posts resources single page', 'lonelinesshub' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ) );
    register_sidebar( array(
        'name' => __( 'Login Sidebar', 'lonelinesshub' ),
        'id' => 'login-widget',
        'description' => __( 'This main sidebar appears on the home page for the login widget', 'lonelinesshub' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ) );	
	
	register_sidebar( array(
        'name' => __( 'Home Sidebar', 'lonelinesshub' ),
        'id' => 'home-cta',
        'description' => __( 'This main sidebar appears on the home for the call to action', 'lonelinesshub' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
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

/**
 * Function to disable Gutenberg editor
 */
add_filter('use_block_editor_for_post', '__return_false', 10);


/**
 * Function to add Tag Selection to Custom Post Type
 */
function lonelinesshub_reg_tag() {
     register_taxonomy_for_object_type('post_tag', 'resources');
}
add_action('init', 'lonelinesshub_reg_tag');


/**
 * Admin E-mail notification if new WordPress user account is pending
 */
function lonelinesshub_email_notification_function( $user_id, $user_login, $user_password, $user_email, $usermeta ) {
    // Send the email notification.

	$to = 'nuno@nuno-sarmento.com';

	$body = 'Tackling Lonelines - new user on pending signups list';

	$headers = array(
		 'Content-type: text/html',
		 'Cc:Community Manager<community.manager@campaigntoendloneliness.org.uk>',
	);
	
	wp_mail( $to, $user_login . ' has just registered', $body, $headers ); 
	
}
add_action( 'bp_core_signup_user', 'lonelinesshub_email_notification_function', 10, 5 );


/**
 * User E-mail notification if new WordPress user account is pending
 */
function lonelinesshub_user_email_notification_function( $user_id, $user_login, $user_password, $user_email, $usermeta ) {
    // Send the email notification.

	$to = 'nuno@nuno-sarmento.com';

	$body = 'Your user has been approved';

	$headers = array(
		 'Content-type: text/html',
		 'Cc: Adele Hunt<adele@campaigntoendloneliness.org.uk>',
	);
	
	wp_mail( $to, $user_login . ' has just registered', $body, $headers ); 
	
}
//add_action( 'bp_core_activated_user', 'lonelinesshub_user_email_notification_function', 10, 5 );



/**
 * Login counter
 */
class Login_Counter {

	public function init() {
		add_action( 'wp_login', array( $this, 'count_user_login' ), 10, 2 );
		add_filter( 'manage_users_columns', array( $this, 'add_stats_columns' ) );
		add_filter( 'manage_users_custom_column', array( $this, 'fill_stats_columns' ), 10, 3 );
	}


	/**
	 * Save user login count to Database.
	 *
	 * @param string $user_login username
	 * @param object $user WP_User object
	 */
	public function count_user_login( $user_login, $user ) {

		$count = get_user_meta( $user->ID, 'sp_login_count', true );
		if ( ! empty( $count ) ) {
			$login_count = get_user_meta( $user->ID, 'sp_login_count', true );
			update_user_meta( $user->ID, 'sp_login_count', ( (int) $login_count + 1 ) );
		}
		else {
			update_user_meta( $user->ID, 'sp_login_count', 1 );
		}
	}


	/**
	 * Add the login stat column to WordPress user listing
	 *
	 * @param string $columns
	 *
	 * @return mixed
	 */
	public function add_stats_columns( $columns ) {
		$columns['login_stat'] = __( 'Login Count' );

		return $columns;
	}


	/**
	 * Fill the stat column with values.
	 *
	 * @param string $empty
	 * @param string $column_name
	 * @param int $user_id
	 *
	 * @return string|void
	 */
	public function fill_stats_columns( $empty, $column_name, $user_id ) {

		if ( 'login_stat' == $column_name ) {
			if ( get_user_meta( $user_id, 'sp_login_count', true ) !== '' ) {
				$login_count = get_user_meta( $user_id, 'sp_login_count', true );

				return "<strong>$login_count</strong>";
			}
			else {
				return __( 'No record found.' );
			}
		}

		return $empty;
	}


	/**
	 * Singleton class instance
	 * @return Login_Counter
	 */
	public static function get_instance() {
		static $instance;
		if ( ! isset( $instance ) ) {
			$instance = new self();
			$instance->init();
		}

		return $instance;
	}
}
Login_Counter::get_instance();
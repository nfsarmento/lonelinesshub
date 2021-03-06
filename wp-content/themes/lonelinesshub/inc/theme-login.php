<?php
/**
 * Functions for login page
 *
 * @package lonelinesshub
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 *
 * Custom login logo.
 */
if ( ! function_exists( 'lonelinesshub_login_custom_style' ) ) {
add_action( 'login_enqueue_scripts', 'lonelinesshub_login_custom_style' );
function lonelinesshub_login_custom_style() {
    wp_enqueue_style( 'login-custom-style', get_stylesheet_directory_uri(). '/assets/css/login-style.css', array('login') );
	wp_enqueue_script( 'login-custom-script', get_stylesheet_directory_uri().'/assets/js/login-script.js');
}
}

/**
 *
 * Custom login URL.
 */
if ( ! function_exists( 'lonelinesshub_login_logo_url' ) ) {
function lonelinesshub_login_logo_url() {
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'lonelinesshub_login_logo_url' );
}

/**
 *
 * Custom login title.
 */
if ( ! function_exists( 'lonelinesshub_login_logo_url_title' ) ) {
function lonelinesshub_login_logo_url_title() {
	return 'Loneliness Hub';
}
add_filter( 'login_headertext', 'lonelinesshub_login_logo_url_title' );
}

/**
 * Redirect recover password and reset
 */
if ( ! function_exists( 'lonelinesshub_redirect_after_lost_password' ) ) :
function lonelinesshub_redirect_after_lost_password() {
    if( isset($_GET['checkemail']) && $_GET['checkemail'] === 'confirm') {
        wp_redirect( home_url( '/sign-in/' ) );
        exit;
    }
}
//add_action( 'login_head', 'lonelinesshub_redirect_after_lost_password' );
endif;

if ( ! function_exists( 'lonelinesshub_lostpassword_redirect' ) ) :
function lonelinesshub_lostpassword_redirect( $url ) {
    return home_url( '/sign-in' );
}
//add_filter( 'lostpassword_redirect', 'lonelinesshub_lostpassword_redirect', 99 );
endif;


/**
 * Redirect users after logout
 */
if ( ! function_exists( 'lonelinesshub_logout_redirect' ) ) :
function lonelinesshub_logout_redirect( $url ) {
    return home_url( '/' );
}
add_filter( 'logout_redirect', 'lonelinesshub_logout_redirect' );
endif;


/**
 * Redirect after successful login
 */
if ( ! function_exists( 'lonelinesshub_login_redirect' ) ) :
function lonelinesshub_login_redirect( $redirect_to, $request, $user ) {
    //is there a user to check?
    global $user;
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {

        if ( in_array( 'administrator', $user->roles ) ) {
            // redirect them to the default place
            return home_url('/wp-admin');
        } else {
            return home_url('/news-feed');
        }
    } else {
        return $redirect_to;
    }
}
add_filter( 'login_redirect', 'lonelinesshub_login_redirect', 99, 99 );
endif;

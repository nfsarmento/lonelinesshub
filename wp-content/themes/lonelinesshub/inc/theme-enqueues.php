<?php
/**
 * lonelinesshub enqueues
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lonelinesshub
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Enqueue scripts and styles.
 */
function lonelinesshub_theme_child_languages()
{
  /**
   * Makes child theme available for translation.
   * Translations can be added into the /languages/ directory.
   */

  // Translate text from the PARENT theme.
  load_theme_textdomain( 'buddyboss-theme', get_stylesheet_directory() . '/languages' );

  // Translate text from the CHILD theme only.
  // Change 'buddyboss-theme' instances in all child theme files to 'buddyboss-theme-child'.
  // load_theme_textdomain( 'buddyboss-theme-child', get_stylesheet_directory() . '/languages' );

}
add_action( 'after_setup_theme', 'lonelinesshub_theme_child_languages' );

/**
 * Enqueues scripts and styles for child theme front-end.
 *
 * @since Boss Child Theme  1.0.0
 */
function lonelinesshub_theme_child_scripts_styles()
{
  /**
   * Scripts and Styles loaded by the parent theme can be unloaded if needed
   * using wp_deregister_script or wp_deregister_style.
   *
   * See the WordPress Codex for more information about those functions:
   * http://codex.wordpress.org/Function_Reference/wp_deregister_script
   * http://codex.wordpress.org/Function_Reference/wp_deregister_style
   **/

  // Styles
  wp_enqueue_style( 'lonelinesshub-css', get_stylesheet_directory_uri().'/assets/css/custom.css', '', '1.0.3' );

  // Javascript
  wp_enqueue_script( 'lonelinesshub-js', get_stylesheet_directory_uri().'/assets/js/custom.js', '', '1.1.0', true );
}
add_action( 'wp_enqueue_scripts', 'lonelinesshub_theme_child_scripts_styles', 9999 );


/**
 * Enqueue admin scripts and styles.
 */
function lonelinesshub_admin_theme_style() {
    wp_enqueue_style('my-admin-style', get_stylesheet_directory_uri() . '/assets/css/admin-style.css');
}
add_action('admin_enqueue_scripts', 'lonelinesshub_admin_theme_style');

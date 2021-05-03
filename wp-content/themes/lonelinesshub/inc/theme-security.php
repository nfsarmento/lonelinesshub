<?php
/**
* Admin users & groups permissions
*
* @package tacklinglonelinesshub
*/
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


/**
 *
 * Remove Admin Backend Menus for all users except admin
 *
 */
if ( ! function_exists( 'tacklinglonelinesshub_remove_menus' ) ) :
function tacklinglonelinesshub_remove_menus () {
global $menu;
$user = wp_get_current_user();
    if (!current_user_can('administrator') )  { // Is not administrator,
        $restricted = array(
          __('Links'),
          __('Appearance'),
          __('Tools'),
          __('Settings'),
          __('Comments'),
          __('Plugins'),
          __('Themes')
         );
        end ($menu);
        while (prev($menu)){
            $value = explode(' ',$menu[key($menu)][0]);
            if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
        }
    }

    if (!current_user_can('administrator'))  { // Is not administrator,
        $restricted = array(
          __('Analytics'),
         );
        end ($menu);
        while (prev($menu)){
            $value = explode(' ',$menu[key($menu)][0]);
            if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
        }
    }

}
//add_action('admin_menu', 'tacklinglonelinesshub_remove_menus');
endif;



/**
*  Remove menu items
*/
if ( ! function_exists( 'tacklinglonelinesshub_and_remove_menus' ) ) :
function tacklinglonelinesshub_and_remove_menus(){
  $super_admins = array( 1 );
  if( ! in_array( get_current_user_id(), $super_admins ) ){
    remove_menu_page( 'groups-admin' );
    remove_menu_page( 'custom-twitter-feeds' );
    remove_menu_page( 'vc-general' );
    remove_menu_page( 'tools.php' );
    remove_menu_page( 'wp-mail-smtp' );

    remove_menu_page( 'edit.php?post_type=acf-field-group' );
    remove_menu_page( 'vc-welcome' );
	remove_menu_page( 'elementor' );
	remove_menu_page( 'postman' );
    remove_menu_page( 'admin.php?page=Wordfence' );
    remove_menu_page( 'plugins.php' );
  }
}
//add_action( 'admin_menu', 'tacklinglonelinesshub_and_remove_menus', 9999 );
endif;
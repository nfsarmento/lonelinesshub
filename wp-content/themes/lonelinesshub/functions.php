<?php
/**
 * lonelinesshub functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lonelinesshub
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 *  Theme includes
 */
$roots_includes = array(
	'inc/theme-enqueues.php',       // Theme enqueues
	'inc/theme-cpts.php',       	// Theme CPTS.
	'inc/theme-admin.php',          // Backend functions.
	'inc/theme-frontend.php',       // Frontend functions.
	'inc/theme-shortcodes.php', 	// Frontend shortcodes.
	'inc/theme-security.php', 	    // Theme security.
	'inc/theme-login.php', 		    // Theme security.	
);

foreach ( $roots_includes as $file ) {
	if ( ! $filepath = locate_template( $file ) ) {
		// @codingStandardsIgnoreStart
		trigger_error( sprintf( __( 'Error locating %s for inclusion', 'futureofrussia' ), $file ), E_USER_ERROR );
		// @codingStandardsIgnoreEnd
	}
	require_once $filepath;
}
unset( $file, $filepath );


?>

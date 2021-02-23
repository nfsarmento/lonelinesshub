<?php
/**
 * Frontend functions
 *
 * @package lonelinesshub
 */

defined( 'ABSPATH' ) || exit;


/*
 * Custom excerpt funtion for posts shortcodes.
 * 
 */
function get_excerpt_trim($num_words='8', $more=' ...'){
    $excerpt = get_the_excerpt();
    $excerpt = wp_trim_words( $excerpt, $num_words , $more );
    return $excerpt;
}

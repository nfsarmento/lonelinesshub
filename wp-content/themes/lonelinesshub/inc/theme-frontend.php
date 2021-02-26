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

/*
 *
 * Add script on footer for website rgistration form
 *
*/
add_action('wp_footer', 'lonelinesshub_function_name', 9999);
function lonelinesshub_function_name(){
?>
<script>
jQuery( document ).ready( function($){
	$( ".register-section-logo.private-on-div" ).empty();
});
</script>
<style>
.register-section-logo.private-on-div {
	background-image: url(/wp-content/themes/lonelinesshub/assets/img/hub-logo.png) !important;
	width: 320px !important;
	background-size: 310px !important;
	height: 150px;
	background-repeat: no-repeat;
}
.register .site-content {
	background: #ffffff;
}
#privacy-modal header,
#terms-modal header{
    display: none !important;
}
</style>
<?php
};


/**
 * Fallback post image.
 *
 * @param  string $html The Output HTML of the post thumbnail
 * @param  int $post_id The post ID
 * @param  int $post_thumbnail_id The attachment id of the image
 * @param  string $size The size requested or default
 * @param  mixed string/array $attr Query string or array of attributes
 * @return string $html the Output HTML of the post thumbnail
 */
function lonelinesshub_post_thumbnail_fb( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
  if ( empty( $html ) ) {
    return '<img src="' . get_stylesheet_directory_uri() . '/assets/img/post-fallback-image.png" width="1000px" height="1000px" class="post-fallback-image" />';
  }
  return $html;
}
add_filter( 'post_thumbnail_html', 'lonelinesshub_post_thumbnail_fb', 20, 5 );

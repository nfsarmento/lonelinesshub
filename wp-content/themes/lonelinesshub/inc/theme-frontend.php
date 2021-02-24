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
	background-image: url(/wp-content/uploads/2021/02/hub-logo.png) !important;
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
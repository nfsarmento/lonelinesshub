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
add_action('wp_footer', 'lonelinesshub_function_name', 999999999999);
function lonelinesshub_function_name(){
?>
<script>
jQuery( document ).ready( function($){
	$( ".register-section-logo.private-on-div" ).empty();
	window.addEventListener('load', function () {
		$(".mce-container-body").contents().find("[teabindex='-1']").each(function() {
			$(this).removeAttr("tabindex");
		});	
		$('.bp-suggestions').attr('aria-label', 'Comment');
		$('.button.like-count').attr('aria-label', 'Comment');
		$(".widget-content .item-avatar a .online").append('<div class="userisonline"><span>Online</span></div>');
		$(".emojionearea-search").prepend('<label class="emolisearch">Search</label>');
		$("#bp-activity-privacy option:nth-child(1)").attr('aria-label', 'All Hub members');
		$("#bp-activity-privacy option:nth-child(2)").attr('aria-label', 'All Members');
		$("#bp-activity-privacy option:nth-child(3)").attr('aria-label', 'My Connections');
		$("#bp-activity-privacy option:nth-child(4)").attr('aria-label', 'Only Me');	
		$("#whats-new-post-in-box option:nth-child(1)").attr('aria-label', 'Post in: Profile');
		$("#whats-new-post-in-box option:nth-child(2)").attr('aria-label', 'Post in: Group');
		$('.bb-model-header a').attr('aria-label', 'Close dialog');	
	    $('.activity-content img:not([alt])').attr('alt', 'Activity image');			
		$('a').each(function(){
			$(this).attr('title',$(this).text());
		});	
		$(".load-more").click(function() {
			$('a').each(function(){
				$(this).attr('title',$(this).text());
			});	
		});		
			
		// Prepend label on "EVENT COST" - add event page
		$(".registration .entry-content #register-page").prepend('<h2 class="event-date-label" style="margin-top:30px;font-size:26px;color: #000000;font-style: italic;text-transform:none;">These fields are case sensitive</h2>');		
		
	   $(".registration .signup_password").prepend('<div class="password-policy"><br><h4 style="margin-bottom:15px;font-size:22px;">Password policy:</h4><span style="font-size: 16px;">- Be at least 8 eight characters long</span><br><span style="font-size: 16px;">- Contain special characters e.g. !£$/</span><br><span style="font-size: 16px;">- Contain upper and lower case characters</span><br><span style="font-size: 16px;">- Contain a number</span><br><br></div>');
		
	})		
});
</script>
<style>
.register-section-logo.private-on-div {
	background-image: url(/wp-content/uploads/2021/03/tackling_lonliness_logo.svg) !important;
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
    return '<img src="' . get_stylesheet_directory_uri() . '/assets/img/postfallback-image.png" width="1000px" height="1000px" class="post-fallback-image" />';
  }
  return $html;
}
add_filter( 'post_thumbnail_html', 'lonelinesshub_post_thumbnail_fb', 20, 5 );



/**
 * Change text strings
 *
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/gettext
 */
function lonelinesshub_text_strings( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
			
		case 'Invite non-members to create an account. They will receive an email with a link to register.' :
			$translated_text = __( 'Invite non-members by using the ‘+’ cirlce button to join the Hub community. They will receive an email with a link to register. PLEASE NOTE: while we are in pilot phase of the Hub, invites will be held by our moderator, and sending will be delayed. You will be notified when invites to non-members are sent. ', 'lonelinesshub' );
			break;	
			
		case 'Public' :
			$translated_text = __( 'All Hub members' );
			break;				
			
	}
	return $translated_text;
}
add_filter( 'gettext', 'lonelinesshub_text_strings', 20, 9999 );

/**
 * Add extra profile fields to members landing page
 *
 */
function lonelinesshub_extra_fields_members_directory() {

	$organisation = bp_get_member_profile_data('field=Organisation');
	$role = bp_get_member_profile_data('field=Role');
	
	if ( ! empty($organisation) ){
		echo '<div class="extra-profile-fields">'. '<p class="extra-profile-fields-header">Organisation :</p><p>' . $organisation . '</p></div>';
	}
	
	if ( ! empty($role) ){
		echo '<div class="extra-profile-fields">'. '<p class="extra-profile-fields-header">Role :</p><p>' . $role . '</p></div>';
	}	

}
add_action( 'bp_directory_members_item', 'lonelinesshub_extra_fields_members_directory', 99 );

/**
 * Check blog landing page
 *
 */
function is_blog () {
        global  $post;
        $posttype = get_post_type($post );
        return ( ((is_archive()) || (is_home()) ) && ( $posttype == 'post')  ) ? true : false ;
}
/* This is your custom Javascript */
jQuery( document ).ready( function($){
  $('a.header-search-link').append('<span class="search-icon">Search<span>');
	$('#header-messages-dropdown-elem .notification-link').append('<span class="msg-icon">Messages<span>');
	$('#header-notifications-dropdown-elem .notification-link').append('<span class="notification-icon">Notifications<span>');
	$(".logged-in .bbp_widget_login h3").html('You are logged in');

	(function($) {
		$(".tribe-events-c-events-bar__search-form").append('<div class="add-event-btn"><a href="/add-event/"> Add Event</a></div>');
	})( jQuery );

  $('.post-type-archive-resources').removeClass('bb-grid');

	/****** Accessibility fixes ********/

  // Add text to search close button
  $(".close-search").append('<span style="font-size:16px">Search close button</span>');

	// Remove href on date activity
	$(".activity-date a").removeAttr('href');

	// Add text to nav menu more buttton
	$(".more-button").append('<span style="font-size:16px">Menu</span>');

	// Replace heading on group page
	$(".bp-group-title-wrap").find('h2').replaceWith(function() {
          return '<h1>' + $(this).text() + '</h1>';
    });

	// Replace heading on forum page
    $(".post-type-archive-forum	.bs-sec-header").find('h3').replaceWith(function() {
          return '<h2>' + $(this).text() + '</h2>';
    });

	// Prepend label on invitation forms
    $(".send-invites .field-name").prepend('<label id="invitelabelid" class="invitelabelclass">Name</label>');
	$(".send-invites .field-email").prepend('<label id="invitelabelid" class="invitelabelclass">Email</label>');

	// Prepend label on emoji search
	$(".emojionearea-search").prepend('<label class="emolisearch">Search</label>');

	// Prepend label on invitation forms
	$("#bp-group-invite-content").prepend('<label id="invitetextlabelid" class="invitetextlabelclass" style="font-size:14px;    margin-left:24px;">Customize the message of your invite.</label>');

	// Add alt text to avatar images
	$('.item-avatar img[alt=""]').attr('alt', 'User image');

	// Add alt text to avatar images
	$('.user-link img').attr('alt', 'User photo');

	// Add arial label comment
	$('.ac-textarea .bp-suggestions').attr('aria-label', 'Comment');

	// Add arial label Harassment
	$('#report-category-27').attr('aria-label', 'Harassment');

	// Add arial label Inappropriate
	$('#report-category-24').attr('aria-label', 'Inappropriate');

	// Add arial label Offensive
	$('#report-category-23').attr('aria-label', 'Offensive');

	// Add arial label Suspicious
	$('#report-category-26').attr('aria-label', 'Suspicious');

    // Add arial label Other
	$('#report-category-other').attr('aria-label', 'Other');

	// Add alt attribute to images
	$('.activity-content img:not([alt])').attr('alt', 'Activity image');

	// Add title attribute to all URL
  $('a').each(function(){
		$(this).attr('title',$(this).text());
  });

	// Prepend label on "EVENT TIME & DATE" - add event page
	$(".tribe-section-datetime .tribe-section-header h3").append('<span class="event-date-label" style="font-size:14px;color: #000000;font-style: italic;text-transform:none;">: (optional)</span>');

	// Prepend label on "EVENT IMAGE" - add event page
	$(".tribe-section-image-uploader .tribe-section-header h3").append('<span class="event-date-label" style="font-size:14px;color: #000000;font-style: italic;text-transform:none;">: (optional)</span>');

	// Prepend label on "VENUE DETAILS" - add event page
	$(".tribe-section-venue .tribe-section-header h3").append('<span class="event-date-label" style="font-size:14px;color: #000000;font-style: italic;text-transform:none;">: (optional)</span>');

	// Prepend label on "ORGANISER DETAILS" - add event page
	$(".tribe-section-organizer .tribe-section-header h3").append('<span class="event-date-label" style="font-size:14px;color: #000000;font-style: italic;text-transform:none;">: (optional)</span>');

	// Prepend label on "EVENT WEBSITE" - add event page
	$(".tribe-section-website .tribe-section-header h3").append('<span class="event-date-label" style="font-size:14px;color: #000000;font-style: italic;text-transform:none;">: (optional)</span>');

	// Prepend label on "EVENT COST" - add event page
	$(".tribe-section-cost .tribe-section-header h3").append('<span class="event-date-label" style="font-size:14px;color: #000000;font-style: italic;text-transform:none;">: (optional)</span>');

});

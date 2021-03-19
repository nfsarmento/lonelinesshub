/* This is your custom Javascript */

jQuery( document ).ready( function($){
    $('a.header-search-link').append('<span class="search-icon">Search<span>');
	$('#header-messages-dropdown-elem .notification-link').append('<span class="msg-icon">Messages<span>');
	$('#header-notifications-dropdown-elem .notification-link').append('<span class="notification-icon">Notifications<span>');
	$(".logged-in .bbp_widget_login h3").html('You are logged in');
	
	(function($) {
		$(".tribe-events-c-events-bar__search-form").append('<div class="add-event-btn"><a href="/add-event/"> Add Event</a></div>');
	})( jQuery );

	
});



<?php
/**
 * Shortcode functions
 *
 * @package lonelinesshub
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
/**
 *
 * Add a new custom resource cpt shortcode.
 * Usage [resources posts_per_page="1"] .
 * You can also go to Visual Composer > Shortcode Mapper to add your custom module.
 */
// @codingStandardsIgnoreStart
function lonelinesshub_cpt_rsource_shortcode( $atts ) {

	// Parse your shortcode settings with it's defaults
	$atts = shortcode_atts( array(
		'posts_per_page' => '-1'
	), $atts, 'resources' );

	// Extract shortcode atributes
	extract( $atts );

	// Define output var
	$output = '';

	// Define query
	$query_args = array(
		'post_type'      => 'resources', // Change this to the type of post you want to show
		'posts_per_page' => $posts_per_page,
	);

	// Query posts
	$custom_query = new WP_Query( $query_args );

	// Add content if we found posts via our query
	if ( $custom_query->have_posts() ) {

		// Open div wrapper around loop
		$output .= '<div class="row row-shortcode-cpt">';

		// Loop through posts
		while ( $custom_query->have_posts() ) {

	   // Sets up post data so you can use functions like get_the_title(), get_permalink(), etc
	   $custom_query->the_post();

	  // This is the output for your entry so what you want to do for each post.
	  $output .= '<div class="col-12">';
      //$output .= '<div class="grid__item_image">' . get_the_post_thumbnail() . '</div>';
      $output .= '<div class="rs-post-image">';
      $output .= '<a href="'. get_permalink() .'">' . get_the_post_thumbnail() . '</a>';
      $output .= '</div>';
      $output .= '<div class="rs-post-content">';
	  $output .= '<p class="rs-post-date">'. get_the_date( 'Y-m-d' ) .'</p>';
      $output .= '<a class="rs-post-title-url" href="'. get_permalink() .'"><p class="rs-post-title">'. get_the_title() .'</p></a>';
      $output .= '<a class="rs-post-excerpt-url" href="'. get_permalink() .'"><p class="rs-post-excerpt">'. get_excerpt_trim() .'</p></a>';
      $output .= '</div>';
      $output .= '</div>';

		}

		// Close div wrapper around loop
		$output .= '</div>';

		// Restore data
		wp_reset_postdata();

	}

	// Return your shortcode output
	return $output;

}
add_shortcode( 'resources', 'lonelinesshub_cpt_rsource_shortcode' );
// @codingStandardsIgnoreEnd


/**
 *
 * Add a new custom resource cpt most viewd shortcode.
 * Usage [resourcesmv posts_per_page="1"] .
 * You can also go to Visual Composer > Shortcode Mapper to add your custom module.
 */
// @codingStandardsIgnoreStart
function lonelinesshub_cpt_rsmv_shortcode( $atts ) {

	// Parse your shortcode settings with it's defaults
	$atts = shortcode_atts( array(
		'posts_per_page' => -1
	), $atts, 'resourcesmv' );

	// Extract shortcode atributes
	extract( $atts );

	// Define output var
	$output = '';

	// Define query
	$query_args = array(
		'post_type'      => 'resources', // Change this to the type of post you want to show
		'posts_per_page' => $posts_per_page,
	    'meta_key' => 'popular_posts',
		'orderby' => 'meta_value_num'
	);

	// Query posts
	$custom_query = new WP_Query( $query_args );

	// Add content if we found posts via our query
	if ( $custom_query->have_posts() ) {

		// Open div wrapper around loop
		$output .= '<div class="row row-shortcode-cpt">';

		// Loop through posts
		while ( $custom_query->have_posts() ) {

	   // Sets up post data so you can use functions like get_the_title(), get_permalink(), etc
	   $custom_query->the_post();

	  // This is the output for your entry so what you want to do for each post.
	  $output .= '<div class="col-12">';
      //$output .= '<div class="grid__item_image">' . get_the_post_thumbnail() . '</div>';
      $output .= '<div class="rs-post-image">';
      $output .= '<a href="'. get_permalink() .'">' . get_the_post_thumbnail() . '</a>';
      $output .= '</div>';
      $output .= '<div class="rs-post-content">';
	  $output .= '<p class="rs-post-date">'. get_the_date( 'Y-m-d' ) .'</p>';
      $output .= '<a class="rs-post-title-url" href="'. get_permalink() .'"><p class="rs-post-title">'. get_the_title() .'</p></a>';
      $output .= '<a class="rs-post-excerpt-url" href="'. get_permalink() .'"><p class="rs-post-excerpt">'. get_excerpt_trim() .'</p></a>';
      $output .= '</div>';
      $output .= '</div>';

		}

		// Close div wrapper around loop
		$output .= '</div>';

		// Restore data
		wp_reset_postdata();

	}

	// Return your shortcode output
	return $output;

}
add_shortcode( 'resourcesmv', 'lonelinesshub_cpt_rsmv_shortcode' );
// @codingStandardsIgnoreEnd


/**
 *
 * Add a new custom resource cpt most viewd shortcode.
 * Usage [latestblog posts_per_page="1"] .
 * You can also go to Visual Composer > Shortcode Mapper to add your custom module.
 */
// @codingStandardsIgnoreStart
function lonelinesshub_cpt_latestblog_shortcode( $atts ) {

	// Parse your shortcode settings with it's defaults
	$atts = shortcode_atts( array(
		'posts_per_page' => -1
	), $atts, 'latestblog' );

	// Extract shortcode atributes
	extract( $atts );

	// Define output var
	$output = '';

	// Define query
	$query_args = array(
		'post_type'      => 'post', // Change this to the type of post you want to show
		'posts_per_page' => $posts_per_page,
	);

	// Query posts
	$custom_query = new WP_Query( $query_args );

	// Add content if we found posts via our query
	if ( $custom_query->have_posts() ) {

		// Open div wrapper around loop
		$output .= '<div class="row row-shortcode-cpt">';

		// Loop through posts
		while ( $custom_query->have_posts() ) {

	   // Sets up post data so you can use functions like get_the_title(), get_permalink(), etc
	   $custom_query->the_post();

	  // This is the output for your entry so what you want to do for each post.
	  $output .= '<div class="col-12">';
      //$output .= '<div class="grid__item_image">' . get_the_post_thumbnail() . '</div>';
      $output .= '<div class="rs-post-image">';
      $output .= '<a href="'. get_permalink() .'">' . get_the_post_thumbnail() . '</a>';
      $output .= '</div>';
      $output .= '<div class="rs-post-content">';
	  $output .= '<p class="rs-post-date">'. get_the_date( 'Y-m-d' ) .'</p>';
      $output .= '<a class="rs-post-title-url" href="'. get_permalink() .'"><p class="rs-post-title">'. get_the_title() .'</p></a>';
      $output .= '<a class="rs-post-excerpt-url" href="'. get_permalink() .'"><p class="rs-post-excerpt">'. get_excerpt_trim() .'</p></a>';
      $output .= '</div>';
      $output .= '</div>';

		}

		// Close div wrapper around loop
		$output .= '</div>';

		// Restore data
		wp_reset_postdata();

	}

	// Return your shortcode output
	return $output;

}
add_shortcode( 'latestblog', 'lonelinesshub_cpt_latestblog_shortcode' );
// @codingStandardsIgnoreEnd


/**
 *
 * Add a new custom resource cpt most viewd shortcode.
 * Usage [latestevents posts_per_page="1"] .
 * You can also go to Visual Composer > Shortcode Mapper to add your custom module.
 */
// @codingStandardsIgnoreStart
function lonelinesshub_cpt_latestevents_shortcode( $atts ) {

	// Parse your shortcode settings with it's defaults
	$atts = shortcode_atts( array(
		'posts_per_page' => -1
	), $atts, 'latestevents' );

	// Extract shortcode atributes
	extract( $atts );

	// Define output var
	$output = '';

	// Define query
	$query_args = array(
		'post_type'      => 'tribe_events', // Change this to the type of post you want to show
		'posts_per_page' => $posts_per_page,
	);

	// Query posts
	$custom_query = new WP_Query( $query_args );

	// Add content if we found posts via our query
	if ( $custom_query->have_posts() ) {

		// Open div wrapper around loop
		$output .= '<div class="row row-shortcode-cpt">';

		// Loop through posts
		while ( $custom_query->have_posts() ) {

	   // Sets up post data so you can use functions like get_the_title(), get_permalink(), etc
	   $custom_query->the_post();

	  // This is the output for your entry so what you want to do for each post.
	  $output .= '<div class="col-12">';
      //$output .= '<div class="grid__item_image">' . get_the_post_thumbnail() . '</div>';
      $output .= '<div class="rs-post-image">';
      $output .= '<a href="'. get_permalink() .'">' . get_the_post_thumbnail() . '</a>';
      $output .= '</div>';
      $output .= '<div class="rs-post-content">';
	  $output .= '<p class="rs-post-date">'. get_the_date( 'Y-m-d' ) .'</p>';
      $output .= '<a class="rs-post-title-url" href="'. get_permalink() .'"><p class="rs-post-title">'. get_the_title() .'</p></a>';
      $output .= '<a class="rs-post-excerpt-url" href="'. get_permalink() .'"><p class="rs-post-excerpt">'. get_excerpt_trim() .'</p></a>';
      $output .= '</div>';
      $output .= '</div>';

		}

		// Close div wrapper around loop
		$output .= '</div>';

		// Restore data
		wp_reset_postdata();

	}

	// Return your shortcode output
	return $output;

}
add_shortcode( 'latestevents', 'lonelinesshub_cpt_latestevents_shortcode' );
// @codingStandardsIgnoreEnd





/**
 *
 * Add a new custom resource cpt most viewd shortcode.
 * Usage [mostviewdwidget posts_per_page="1"] .
 * You can also go to Visual Composer > Shortcode Mapper to add your custom module.
 */
// @codingStandardsIgnoreStart
function lonelinesshub_mostviewd_widget_shortcode( $atts ) {

	// Parse your shortcode settings with it's defaults
	$atts = shortcode_atts( array(
		'posts_per_page' => -1
	), $atts, 'mostviewdwidget' );

	// Extract shortcode atributes
	extract( $atts );

	// Define output var
	$output = '';

	// Define query
	$query_args = array(
		'post_type'      => 'resources', // Change this to the type of post you want to show
		'posts_per_page' => $posts_per_page,
	  'meta_key' => 'popular_posts',
		'orderby' => 'meta_value_num'
	);

	// Query posts
	$custom_query = new WP_Query( $query_args );

	// Add content if we found posts via our query
	if ( $custom_query->have_posts() ) {

		// Open div wrapper around loop
		$output .= '<div class="row row-mostviewed-widget">';

		// Loop through posts
		while ( $custom_query->have_posts() ) {

	   // Sets up post data so you can use functions like get_the_title(), get_permalink(), etc
	   $custom_query->the_post();

	  // This is the output for your entry so what you want to do for each post.
	  $output .= '<div class="col-12 mostviewed-widget">';
      //$output .= '<div class="grid__item_image">' . get_the_post_thumbnail() . '</div>';
      $output .= '<div class="rs-post-image-widget">';
      $output .= '<a href="'. get_permalink() .'">' . get_the_post_thumbnail() . '</a>';
      $output .= '</div>';
      $output .= '<div class="rs-post-content-widget">';
      $output .= '<a class="rs-post-title-url-widget" href="'. get_permalink() .'"><p class="rs-post-title">'. get_the_title() .'</p></a>';
	  $output .= '<p class="rs-post-counter-widget">' .lonelinesshub_get_post_views( get_the_ID() ) .'</p>';
	  //$output .= '<p class="rs-post-date-widget">'. get_the_date( 'Y-m-d' ) .'</p>';
      $output .= '</div>';
      $output .= '</div>';

		}

		// Close div wrapper around loop
		$output .= '</div>';

		// Restore data
		wp_reset_postdata();

	}

	// Return your shortcode output
	return $output;

}
add_shortcode( 'mostviewdwidget', 'lonelinesshub_mostviewd_widget_shortcode' );
// @codingStandardsIgnoreEnd

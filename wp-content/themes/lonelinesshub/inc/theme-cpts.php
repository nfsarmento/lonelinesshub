<?php
/**
 * Website CPT
 *
 * @package lonelinesshub
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


/*
 * Register CPT resources 
 * 
 */
function lonelinesshub_register_my_cpts() {

	/**
	 * Post Type: Resources.
	 */

	$labels = [
		"name" => __( "Resources", "custom-post-type-ui" ),
		"singular_name" => __( "Resource", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Resources", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "resources", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
	];

	register_post_type( "resources", $args );
}

add_action( 'init', 'lonelinesshub_register_my_cpts' );

/*
 * Register CPT resources tax
 * 
 */
function lonelinesshub_taxes_resources_categories() {

	/**
	 * Taxonomy: Resources categories.
	 */

	$labels = [
		"name" => __( "Resources categories", "custom-post-type-ui" ),
		"singular_name" => __( "Resource category", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Resources categories", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'resources_categories', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "resources_categories",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
			];
	register_taxonomy( "resources_categories", [ "resources" ], $args );
}
add_action( 'init', 'lonelinesshub_taxes_resources_categories' );

<?php
function cptui_register_my_cpts() {

	/**
	 * Post Type: Projects.
	 */

	$labels = [
		"name" => __( "Projects", "jaakkoheikkila" ),
		"singular_name" => __( "Project", "jaakkoheikkila" ),
	];

	$args = [
		"label" => __( "Projects", "jaakkoheikkila" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => "projects",
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "project", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "thumbnail", "revisions" ],
	];

	register_post_type( "project", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

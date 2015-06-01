<?php

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'init', 'wpm_create_issue' );
if ( ! function_exists( 'wpm_create_issue' ) ) {
	/**
	 * Magazine Issue taxonomy.
	 *
	 * @since 0.1
	 */
	function wpm_create_issue() {

		$labels = array(
			'name'                       => _x( 'Issues', 'Taxonomy General Name', 'wp-magazine' ),
			'singular_name'              => _x( 'Issue', 'Taxonomy Singular Name', 'wp-magazine' ),
			'menu_name'                  => __( 'Issues', 'wp-magazine' ),
			'all_items'                  => __( 'All Issues', 'wp-magazine' ),
			'parent_item'                => __( 'Parent Issue', 'wp-magazine' ),
			'parent_item_colon'          => __( 'Parent Issue:', 'wp-magazine' ),
			'new_item_name'              => __( 'Add new Issue', 'wp-magazine' ),
			'add_new_item'               => __( 'Add new Issue', 'wp-magazine' ),
			'edit_item'                  => __( 'Edit Issue', 'wp-magazine' ),
			'update_item'                => __( 'Update Issue', 'wp-magazine' ),
			'view_item'                  => __( 'Show Issue', 'wp-magazine' ),
			'separate_items_with_commas' => __( 'Separate Issues with commas', 'wp-magazine' ),
			'add_or_remove_items'        => __( 'Add or remove Issues', 'wp-magazine' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'wp-magazine' ),
			'popular_items'              => __( 'Popular Issues', 'wp-magazine' ),
			'search_items'               => __( 'Search Issues', 'wp-magazine' ),
			'not_found'                  => __( 'Not Found', 'wp-magazine' ),
		);

		$args = array(
			'labels'                     => apply_filters( 'wpm_issue_labels', $labels ),
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => array( 'slug' => _x( 'issue', 'issue taxonomy slug', 'wp-magazine' ) ),
		);

		register_taxonomy( 'wpm_issue', apply_filters( 'wpm_issue_post_types', array( 'wpm_article' ) ), apply_filters( 'wpm_issue_args', $issue_args ) );

	}
}

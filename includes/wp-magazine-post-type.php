<?php

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'init', 'wpm_create_article' );
if ( ! function_exists( 'wpm_create_article' ) ) {
	/**
	 * Magazine Article post type.
	 *
	 * @since 0.1
	 */
	function wpm_create_article() {

		$labels = array(
			'name'                => _x( 'Magazine Articles', 'Post Type General Name', 'wp-magazine' ),
			'singular_name'       => _x( 'Magazine Article', 'Post Type Singular Name', 'wp-magazine' ),
			'menu_name'           => __( 'Magazine', 'wp-magazine' ),
			'name_admin_bar'      => __( 'Magazine Article', 'wp-magazine' ),
			'parent_item_colon'   => __( 'Parent Magazine Article', 'wp-magazine' ),
			'all_items'           => __( 'All Magazine Articles', 'wp-magazine' ),
			'add_new_item'        => __( 'Add New Magazine Article', 'wp-magazine' ),
			'add_new'             => __( 'Add New', 'wp-magazine' ),
			'new_item'            => __( 'New Magazine Article', 'wp-magazine' ),
			'edit_item'           => __( 'Edit Magazine Article', 'wp-magazine' ),
			'update_item'         => __( 'Update Magazine Article', 'wp-magazine' ),
			'view_item'           => __( 'View Magazine Article', 'wp-magazine' ),
			'search_items'        => __( 'Search Magazine Article', 'wp-magazine' ),
			'not_found'           => __( 'Not found', 'wp-magazine' ),
			'not_found_in_trash'  => __( 'Not found in trash', 'wp-magazine' ),
		);

		$args = array(
			'label'               => null,
			'description'         => null,
			'labels'              => apply_filters( 'wpm_article_labels', $labels ),
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'page-attributes'),
			'taxonomies'          => array(),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 20,
			'menu_icon'           => 'dashicons-admin-page',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'rewrite'             => array( 'slug' => _x( 'article', 'post type slug', 'wp-magazine' ) ),
			'show_in_rest'        => true,
		);

		register_post_type( 'wpm_article', apply_filters( 'wpm_article_args', $args ) );

	}
}

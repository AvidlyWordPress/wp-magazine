<?php

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'create_wpm_issue', 'wpm_modify_issue_slug' );
if ( ! function_exists( 'wpm_modify_issue_slug' ) ) {
	/**
	 * Format magazine issue slug.
	 *
	 * Consistent formatting for magazine issue slug that
	 * is based on the parent slug if it exists.
	 *
	 * @since 0.1
	 *
	 * @param int $term_id Issue term id.
	 */
	function wpm_modify_issue_slug( $term_id ) {

		$term = get_term_by( 'id', $term_id, 'wpm_issue' );

		if ( 0 != $term->parent ) {
			$parent_term = get_term_by( 'id', $term->parent, 'wpm_issue' );

			if ( is_numeric( $term->name ) && is_numeric( $parent_term->name ) ) {
				$new_slug = $term->name . '-' . $parent_term->name;

				wp_update_term( $term->term_id, 'wpm_issue', array( 'slug' => $new_slug ) );
			}
		}
	}
}

add_action( 'restrict_manage_posts', 'wpm_restrict_articles_with_issues' );
if ( ! function_exists( 'wpm_restrict_articles_with_issues' ) ) {
	/**
	 * Dropdown issues.
	 *
	 * Adds issues dropdown for magazine articles on wp-admin.
	 *
	 * @since 0.1
	 */
	function wpm_restrict_articles_with_issues() {

		global $typenow;
		global $wp_query;

		$taxonomies = array( 'wpm_issue' );

		if ( 'wpm_article' == $typenow ) {
			foreach ( $taxonomies as $taxonomy_slug ) {

				$taxonomy      = get_taxonomy( $taxonomy_slug );
				$selected_term = isset( $wp_query->query[ $taxonomy_slug ] ) ? $wp_query->query[ $taxonomy_slug ] : '';

				wp_dropdown_categories( array(
					'show_option_all' => __( "All", 'wp-magazine' ) . ' ' . strtolower( $taxonomy->label ),
					'taxonomy'        => $taxonomy_slug,
					'name'            => $taxonomy_slug,
					'selected'        => $selected_term,
					'hierarchical'    => true,
					'depth'           => 2,
					'show_count'      => true,
					'hide_empty'      => false,
				) );
			}
		}
	}
}

add_filter( 'pre_get_posts', 'wpm_show_articles_by_issue' );
if ( ! function_exists( 'wpm_show_articles_by_issue' ) ) {
	/**
	 * Magazine article filtering.
	 *
	 * Filters the wp_query on wp-admin to show magazine articles
	 * based of the selected issue.
	 *
	 * @since 0.1
	 */
	function wpm_show_articles_by_issue( $query ) {

		$taxonomy = 'wpm_issue';

		if ( is_admin() && 'wpm_article' == $query->query_vars[ 'post_type' ] && isset( $query->query_vars[ $taxonomy ] ) && 0 != $query->query_vars[ $taxonomy ] ) {

			$term = get_term_by( 'id', $query->query_vars[ $taxonomy ], $taxonomy );

			if ( false != $term ) {
				$query->set( $taxonomy, $term->slug );
			}
		}

		return $query;
	}
}
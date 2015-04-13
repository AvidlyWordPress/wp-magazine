<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! function_exists( 'wpm_get_the_issue_navigation' ) ) {
	/**
	 * Return navigation to next/previous issue article when applicable.
	 *
	 * @since 0.1
	 *
	 * @param array $args {
	 * 		Optional. Default issue article navigation arguments. Default empty array.
	 *
	 * 		@type string $prev_text				Anchor text to display in the previous issue article link. Defaults to get_the_title().
	 * 		@type string $next_text				Anchor text to display in the next issue article link. Defaults to get_the_title().
	 * 		@type strint $screen_reader_text	Screen reader text for nav element. Default "Issue article navigation".
	 * }
	 * @return string Markup for issue article links.
	 */
	function wpm_get_the_issue_navigation( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'prev_text'          => '',
			'next_text'          => '',
			'screen_reader_text' => __( 'Issue navigation', 'wp-magazine' ),
		) );

		$navigation    = '';
		$previous      = '';
		$next          = '';
		$previous_post = get_adjacent_post( true, '', true, 'wpm_issue' );
		$next_post     = get_adjacent_post( true, '', false, 'wpm_issue' );

		if ( is_a( $previous_post, 'WP_Post' ) ) {
			$previous = "<div class='nav-previous'><a href='" . get_permalink( $previous_post->ID ) . "' rel='prev'>" . ( ! empty( $args['prev_text'] ) ? $args['prev_text'] : get_the_title( $previous_post->ID ) ) . '</a></div>';
		}

		if ( is_a( $next_post, 'WP_Post' ) ) {
			$next = "<div class='nav-next'><a href='" . get_permalink( $next_post->ID ) . "' rel='next'>" . ( ! empty( $args['next_text'] ) ? $args['next_text'] : get_the_title( $next_post->ID ) ) . '</a></div>';
		}

		// Only add markup if there's somewhere to navigate to.
		if ( $previous || $next ) {
			$navigation = _navigation_markup( $previous . $next, 'post-navigation', $args['screen_reader_text'] );
		}

		return $navigation;
	}
}

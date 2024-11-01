<?php
/**
 * Template tags.
 *
 * Various functions for use in themes, etc.
 *
 * @package WP_Storemapper
 */

/**
 * Output or return Storemapper plugin content.
 *
 * @param string $title     Optional title above content.
 * @param string $title_tag The HTML title tag used to surround the title.
 *
 */
function wp_storemapper_content( $title = '', $title_tag = 'h2' ) {
	// Restrict output to allowed post tags plus script items needed for the Storemapper content display.
	$allowed_html           = wp_kses_allowed_html( 'post' );
	$allowed_html['script'] = [
		'data-storemapper-start' => true,
		'data-storemapper-id'    => true,

	];
	echo wp_kses( WP_Storemapper\Helpers::get_storemapper_content( $title, $title_tag ), $allowed_html );
}

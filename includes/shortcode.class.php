<?php

namespace WP_Storemapper;

/**
 * Class Shortcode.
 *
 * Create a shortcode to output a Storemapper widget.
 *
 * @package WP_Storemapper
 */
class Shortcode {

	/**
	 * @var string Shortcode name.
	 */
	public $shortcode_name = 'wp-storemapper';

	/**
	 * Initialize shortcode creation.
	 */
	public function init() {
		add_shortcode( $this->shortcode_name, [ $this, 'setup_shortcode' ] );
	}

	/**
	 * Output the contents of the shortcode.
	 *
	 * @todo Document filters.
	 *
	 * @param array $atts The shortcode attributes.
	 *
	 * @return string Shortcode HTML.
	 */
	public function setup_shortcode( $atts ) {
		$attributes = shortcode_atts( [
			'title' => '',
			'title_tag' => 'h2',
		], $atts );

		return Helpers::get_storemapper_content( $attributes['title'], $attributes['title_tag'] );
	}
}

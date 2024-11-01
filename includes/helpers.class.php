<?php

namespace WP_Storemapper;

/**
 * Class Helpers.
 *
 * Set of helper functions.
 *
 * @package WP_Storemapper
 */
class Helpers {

	/**
	 * Titleize item slug.
	 *
	 * @param string $slug             The title slug.
	 * @param bool   $capitalize_words Captialize words in output.
	 *
	 * @return string The title.
	 */
	public static function titleize_slug( $slug, $capitalize_words = true ) {
		$title = str_replace( [ '_', '-' ], ' ', $slug );
		if ( $capitalize_words ) {
			$title = ucfirst( $title );
		}

		return $title;
	}

	/**
	 * Sanitize a string.
	 *
	 * @param string $setting The setting string.
	 *
	 * @return string The sanitized string.
	 */
	public static function sanitize_setting( $setting ) {
		return sanitize_text_field( $setting );
	}

	public static function get_storemapper_content( $title = '', $title_tag = 'h2' ) {
		$output              = '';
		$account_data = explode("_", get_option( 'wp_storemapper_acct_id' ));
		$storemapper_acct_id = $account_data[0];
		if ( empty( $storemapper_acct_id ) ) {
			if ( current_user_can( 'manage_options' ) ) {
				static::output_acct_id_warning_msg();
			}

			return $output;
		}
		ob_start();
		if ( ! empty( $title ) ) {
			/**
			 * Storemapper title surrounding HTML tag.
			 *
			 * Filter the HTML tag that surrounds the title placed before the
			 * Storemapper content output.
			 *
			 * @since 1.0.0
			 *
			 * @param string $var The HTML ta.
			 */
			$title_tag = apply_filters( 'wp_storemapper_content_title_tag', $title_tag );
			$output    .= "<{$title_tag} class='wp-storemapper-title'>" . strip_tags( $title ) . "</{$title_tag}>";
		}
		$output .= static::get_template_part( 'public', 'embed-code', [ $storemapper_acct_id ] );
		$output .= ob_get_contents();
		ob_end_clean();

		return $output;
	}

	/**
	 * Output account warning HTML.
	 */
	public static function output_acct_id_warning_msg() {
		?>
		<p>Storemapper content cannot be output until
			<a style="text-decoration: underline;" href="<?php echo esc_url( get_admin_url( 1, 'options-general.php?page=wp_storemapper_settings' ) ); ?>" target="_new">a (valid) account ID is entered in Storemapper settings</a>
			.
		</p>
		<?php
	}

	/**
	 * Get template part.
	 *
	 * @param string $dir      The file's directory relative to /templates.
	 * @param string $filename The filename.
	 * @param array  $args     Arguments to pass to capture_template_part.
	 * @param bool   $echo     Echo or return output.
	 *
	 * @return string The template HTML.
	 */
	public static function get_template_part( $dir, $filename, $args = [], $echo = true ) {
		$template = self::capture_template_part( WP_STOREMAPPER_TEMPLATE_DIR . "{$dir}/{$filename}.php", $args );
		if ( true === $echo ) {
			echo $template;
		} else {
			return $template;
		}
	}

	/**
	 * Capture the template part and process/insert any arguments.
	 *
	 * @param string $file The full file path.
	 * @param array  $args Any arguments for the template.
	 *
	 * @return string The template part HTML.
	 */
	private static function capture_template_part( $file, $args = [] ) {
		ob_start();
		$template = require_once( $file );
		$template = ob_get_contents();
		if ( ! empty( $args ) ) {
			$pieces   = implode( ',', $args );
			$template = sprintf( $template, $pieces );
		}
		ob_end_clean();

		return $template;
	}

}

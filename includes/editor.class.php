<?php

namespace WP_Storemapper;

/**
 * Class Editor.
 *
 * Set up the TinyMCE plugin button and Javascript.
 *
 * @package WP_Storemapper
 */
class Editor {

	/**
	 * Initialize/add filters for button addition to editor.
	 */
	public function init() {
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
			return;
		}

		if ( 'true' !== get_user_option( 'rich_editing' ) ) {
			return;
		}

		add_filter( 'mce_external_plugins', [ $this, 'add_editor_buttons' ] );
		add_filter( 'mce_buttons', [ $this, 'register_editor_buttons' ] );
		add_action( 'admin_head', [ $this, 'tinymce_js_variables' ] );
	}

	/**
	 * Callback for adding editor buttons.
	 *
	 * @param array $plugins The plugins array.
	 *
	 * @return array The plugins array.
	 */
	public function add_editor_buttons( $plugins ) {
		$plugins['wpStoremapper'] = WP_STOREMAPPER_DIR_URL . 'assets/js/editor.min.js';

		return $plugins;
	}

	/**
	 * Register the editor button(s)
	 *
	 * @param array $buttons The editor buttons.
	 *
	 * @return array The editor buttons.
	 */
	public function register_editor_buttons( $buttons ) {
		array_push( $buttons, 'wpStoremapper' );

		return $buttons;
	}

	public function tinymce_js_variables() {
		?>
		<script>
			var wpStoremapperBaseUrl = "<?php echo WP_STOREMAPPER_DIR_URL; ?>";
		</script>
		<?php
	}
}

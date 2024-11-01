<?php

namespace WP_Storemapper;

/**
 * Class Settings.
 *
 * Create settings page and controls.
 *
 * @package WP_Storemapper
 */
class Settings {

	/**
	 * Initialize settings registrations.
	 */
	public function init() {
		add_action( 'admin_init', [ $this, 'register_wp_storemapper_plugin_settings' ] );
	}

	/**
	 * Add options page.
	 */
	public function initialize_settings_pages() {
		add_menu_page(
			__( 'Storemapper', 'wp-storemapper' ),
			__( 'Storemapper', 'wp-storemapper' ),
			'manage_options',
			'wp_storemapper_settings',
			[ $this, 'create_settings_menu_page' ],
			WP_STOREMAPPER_DIR_URL . 'assets/img/storemapper_icon.png',
			100
		);
	}

	/**
	 * Callback for creating adding and registering page/settings.
	 */
	public function create_settings_menu_page() {
		Helpers::get_template_part( 'admin', 'settings' );
	}

	/**
	 * Register plugin settings.
	 */
	public function register_wp_storemapper_plugin_settings() {
		// Settings section.
		add_settings_section(
			'storemapper',
			'',
			null,
			'wp_storemapper_settings'
		);

		// Settings field args.
		$args = [
			'id'          => 'wp_storemapper_acct_id',
			'type'        => 'text',
			'label'       => __( 'Account ID', 'wp-storemapper' ),
			'placeholder' => __( 'Enter your Storemapper account ID', 'wp-storemapper' ),
			'value'       => get_option( 'wp_storemapper_acct_id' ),
		];

		// Settings field.
		add_settings_field(
			'wp_storemapper_acct_id',
			__( 'Account ID', 'wp-storemapper' ),
			[ $this, 'control_text_field' ],
			'wp_storemapper_settings',
			'storemapper',
			$args

		);

		// Register setting.
		register_setting(
			'storemapper',
			'wp_storemapper_acct_id',
			'sanitize_text_field'
		);
	}

	/**
	 * Add a text field control.
	 *
	 * @param array $args Settings arguments.
	 */
	public function control_text_field( $args ) {
		?>
		<input id="<?php echo esc_attr( $args['id'] ); ?>" class="widefat" type="<?php echo esc_attr( $args['type'] ); ?>" name="<?php echo esc_attr( $args['id'] ); ?>" value="<?php echo esc_attr( $args['value'] ); ?>" placeholder="<?php echo esc_attr( $args['placeholder'] ); ?>">
		<?php
		if ( ! empty( $args['description'] ) ) :
			?>
			<p>
				<i><?php echo wp_kses_post( $args['description'] ); ?></i>
			</p>
			<?php
		endif;
	}
}

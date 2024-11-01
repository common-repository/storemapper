<?php

namespace WP_Storemapper;

/**
 * Class Init.
 *
 * Initialize the plugin, load files and assets, & initialize
 * classes.
 *
 * @package WP_Storemapper
 */
class Init {

	/**
	 * Init constructor.
	 *
	 * Start the plugin initialization.
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'load_files' ] );
		add_action( 'init', [ $this, 'storemapper_block_init' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_enqueue_scripts' ] );
		add_action( 'admin_menu', [ $this, 'create_settings_pages' ] );
		add_filter( 'plugin_action_links_' . WP_STOREMAPPER_NAME, [ $this, 'plugin_action_links' ] );
		add_action( 'widgets_init', [ $this, 'register_widget' ] );
	}

	/**
	 * Load necessary files, classes, etc.
	 */
	public function load_files() {
		require_once( WP_STOREMAPPER_INC_DIR . 'helpers.class.php' );
		require_once( WP_STOREMAPPER_INC_DIR . 'settings.class.php' );
		( new Settings() )->init();
		require_once( WP_STOREMAPPER_INC_DIR . 'shortcode.class.php' );
		( new Shortcode() )->init();
		require_once( WP_STOREMAPPER_INC_DIR . 'editor.class.php' );
		( new Editor() )->init();
		require_once( WP_STOREMAPPER_INC_DIR . 'template-tags.php' );
	}

	/**
	 * Register widgets.
	 */
	public function register_widget() {
		require_once( WP_STOREMAPPER_INC_DIR . 'widget.class.php' );
		register_widget( 'WP_STOREMAPPER\Widget' );
	}

	/**
	 * Register the Storemapper block.
	 */
	public function storemapper_block_init() {
		register_block_type( __DIR__ . '/build', [
			'render_callback' => [ $this, 'storemapper_block_render_callback' ],
		] );
	}

	public function storemapper_block_render_callback( $attributes ) {
		$account_data = explode("_", get_option( 'wp_storemapper_acct_id' ));
		$storemapper_acct_id = $account_data[0];
		$storemapper_registration_date = $account_data[1];
		$storemapper_widget_file = $account_data[2];
		
		// // Extract whatever block attribute data we need.
		// $word = $attributes['word'] ?? '';
		// $definition = $attributes['definition'] ?? '';

		// Create and return the front-end markup. I find it easier
		// to use a heredoc for readability purposes.
		return <<<HTML
			<script data-storemapper-start=$storemapper_registration_date 
			  data-storemapper-id=$storemapper_acct_id
				>
				(function() {
					var script = document.createElement('script');
					script.type  = 'text/javascript';script.async = true;
					script.src = `https://storemapper.co/js/$storemapper_widget_file.min.js`;
					var entry = document.getElementsByTagName('script')[0];
					entry.parentNode.insertBefore(script, entry);}());
			</script>
			<div id='storemapper'>
				<p>Store Locator is loading...</p>
			</div>
		HTML;
	}

	/**
	 * Callback to add Storemapp settings link.
	 *
	 * @param string $links The plugin links.
	 *
	 * @return array The filtered links.
	 */
	public function plugin_action_links( $links ) {
		$settings_link = '<a href="' . esc_url( get_admin_url( get_current_blog_id(), 'admin.php?page=wp_storemapper_settings' ) ) . '">Settings</a>';
		$links[]       = $settings_link;

		return $links;
	}

	/**
	 * Create settings page(s).
	 */
	public function create_settings_pages() {
		( new Settings() )->initialize_settings_pages();
	}

	/**
	 * Enqueue admin scripts.
	 */
	public function admin_enqueue_scripts() {
		wp_enqueue_style( 'wp-storemapper-admin', WP_STOREMAPPER_DIR_URL . 'assets/css/admin.min.css' );
	}

}

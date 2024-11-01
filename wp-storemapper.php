<?php
/**
 * Plugin Name:     Storemapper for WordPress
 * Plugin URI:      http://storemapper.co/platforms/wordpress-store-locator
 * Description:     Easily place our Store Locator plugin on your site via shortcode, widget, block or code snippet.
 * Author:          Storemapper
 * Author URI:      http://storemapper.co
 * Text Domain:     wp-storemapper
 * Domain Path:     /languages
 * Version:         2.0.1
 *
 * @package         WP_Storemapper
 */

use WP_Storemapper\Deactivate;
use WP_Storemapper\Init;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Setup constants
 */
if ( ! defined( 'WP_STOREMAPPER_FILE' ) ) {
	define( 'WP_STOREMAPPER_FILE', __FILE__ );
}

if ( ! defined( 'WP_STOREMAPPER_NAME' ) ) {
	define( 'WP_STOREMAPPER_NAME', plugin_basename( WP_STOREMAPPER_FILE ) );
}

if ( ! defined( 'WP_STOREMAPPER_DIR' ) ) {
	define( 'WP_STOREMAPPER_DIR', trailingslashit( plugin_dir_path( WP_STOREMAPPER_FILE ) ) );
}

if ( ! defined( 'WP_STOREMAPPER_DIR_URL' ) ) {
	define( 'WP_STOREMAPPER_DIR_URL', trailingslashit( plugin_dir_url( WP_STOREMAPPER_FILE ) ) );
}

if ( ! defined( 'WP_STOREMAPPER_INC_DIR' ) ) {
	define( 'WP_STOREMAPPER_INC_DIR', trailingslashit( WP_STOREMAPPER_DIR . 'includes' ) );
}

if ( ! defined( 'WP_STOREMAPPER_TEMPLATE_DIR' ) ) {
	define( 'WP_STOREMAPPER_TEMPLATE_DIR', trailingslashit( WP_STOREMAPPER_INC_DIR . 'templates' ) );
}

/**
 * Initialize the plugin.
 */
function wp_storemapper_init() {
	// Initialize.
	require_once( WP_STOREMAPPER_INC_DIR . 'init.class.php' );
	new Init();
}

add_action( 'after_setup_theme', 'wp_storemapper_init' );
add_action( 'admin_notices', 'wp_storemapper_activation_settings_notice' );


/**
 * Items to perform on plugin activation.
 *
 * Most importantly, make sure that the PHP
 * version on the server is 5.4+.
 */
function wp_storemapper_handle_activation() {
	$php_too_old = (
		defined( 'PHP_VERSION' )
		&& version_compare( PHP_VERSION, '5.4', '<=' )
	);
	if ( $php_too_old ) {
		$notice = '<strong style="font-size: 28px;">%s</strong><hr>';
		$notice .= __( 'The WP Storemapper plugin must be running on a server with <strong>PHP version 5.4 or higher</strong> installed to work correctly. Your server is currently running <strong>%s</strong>. Please discuss upgrade options with your hosting provider.', 'wp_storemapper', 'wp-storemapper' );
		$notice .= '<p><a href="/wp-admin/plugins.php">&larr; Back to plugins</a></p>';
		$notice = sprintf( $notice, __( 'PHP Version Notice', 'wp-storemapper' ), PHP_VERSION );
		wp_die( $notice );
	}
}

register_activation_hook( __FILE__, 'wp_storemapper_handle_activation' );

/**
 * Items to perform on plugin deactivation.
 */
function wp_storemapper_handle_deactivation() {
	require_once( WP_STOREMAPPER_INC_DIR . 'deactivate.class.php' );
	new Deactivate();
}

register_deactivation_hook( __FILE__, 'wp_storemapper_handle_deactivation' );

function wp_storemapper_activation_settings_notice() {
	$account_id = get_option( 'wp_storemapper_acct_id' );
	if ( empty( $account_id ) ) {
		?>
		<div class="notice notice-info is-dismissible">
			<p>The Storemapper for WordPress plugin requires an account id in order to output content. Please enter your account id on
				<a href="<?php echo admin_url( 'admin.php?page=wp_storemapper_settings' ) ?>">this page</a>.
			</p>
		</div>
		<?php
	}
}

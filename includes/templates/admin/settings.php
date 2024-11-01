<?php

/**
 * Template for the settings page.
 */

namespace WP_Storemapper;

?>
<div class="wp-storemapper-wrap wrap">
	<h1><?php esc_html_e( 'WP Storemapper', 'wp-storemapper' ); ?></h1>
	<div id="icon-themes" class="icon32"></div>
	<h3><?php esc_html_e( 'Settings', 'wp-storemapper' ); ?>:</h3>
	<p><?php echo wp_kses_post( __( 'To get your user account data, <a href="https://www.storemapper.co/welcome/instruction" target="_new">log in to your Storemapper account</a>', 'wp-storemapper' ) ); ?></p>
	<form method="post" action="options.php">
		<section class="wp-storemapper-settings-wrapper">
			<?php settings_fields( 'storemapper' ); ?>
			<?php do_settings_sections( 'wp_storemapper_settings' ); ?>
			<?php submit_button( __( 'Save Settings', 'wp-storemapper' ) ); ?>
		</section>
	</form>
	<h3><?php esc_html_e( 'How to output your Storemapper account content', 'wp-storemapper' ); ?>:</h3>
	<p><?php esc_html_e( "Once your account data is entered above you can utilize one of the following methods to insert your Storemapper widget into your website's content...", 'wp-storemapper' ); ?></p>
	<ol class="storemapper-plugin-placement-methods">
		<li><?php echo wp_kses_post( sprintf( __( 'To insert into a post or page use the Storemapper button (%s) in the visual editor toolbar. You will be prompted to enter an optional title and title tag.', 'wp-storemapper' ), '<img style="vertical-align: middle" src="' . WP_STOREMAPPER_DIR_URL . 'assets/img/storemapper_icon.png" alt="Storemapper S Icon">' ) ); ?>
		</li>
		<li><?php esc_html_e( 'To insert into a widget area on your site use the Storemapper widget under Appearance > Widgets on the left side of this page. You can enter an optional title.', 'wp-storemapper' ); ?></li>
		<li>
			<p><?php echo wp_kses_post( sprintf( __( 'To insert into a template directly, utilize the %s function inside PHP tags as follows', 'wp-storemapper' ), '<code>wp_storemapper_content()</code>' ) ); ?>:</p>
			<?php highlight_string( "<?php wp_storemapper_content( 'My Title', 'h3' ); ?>" ); ?>
			<p><?php esc_html_e( "The first parameter is an optional title which will display above the Storemapper content. The second parameter is a HTML tag to place the title within, which defaults to 'h2'", 'wp-storemapper' ); ?>.</p>
		</li>
	</ol>
	<p>
		<strong>
			<?php esc_html_e( 'NOTE: Storemapper can only be output once per page. If you attempt to output from both the editor content and a widget, for example, you may see unexpected results.', 'wp-storemapper' ); ?>
		</strong>
	</p>
</div>

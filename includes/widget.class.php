<?php

namespace WP_Storemapper;

use WP_Widget;

/**
 * Create a widget to output a Storemapper widget.
 *
 * @package WP_Storemapper
 */
class Widget extends WP_Widget {

	/**
	 * The user's Storemapper account id.
	 *
	 * @var string Storemapper account id.
	 */
	public $wp_storemapper_acct_id;

	/**
	 * Sets up the widgets name etc.
	 */
	public function __construct() {
		parent::__construct( 'wp_storemapper_widget', __( 'Storemapper', 'wp-storemapper' ), [] );
		$this->wp_storemapper_acct_id = get_option( 'wp_storemapper_acct_id' );
	}

	/**
	 * Outputs the content of the widget.
	 *
	 * @param array $args     The widget arguments.
	 * @param array $instance The widget instance.
	 */
	public function widget( $args, $instance ) {
		echo wp_kses_post( $args['before_widget'] );
		if ( ! empty( $instance['storemapper-widget-title'] ) ) {
			echo wp_kses_post( $args['before_title'] . $instance['storemapper-widget-title'] . $args['after_title'] );
		}
		if ( empty( $this->wp_storemapper_acct_id ) ) {
			Helpers::output_acct_id_warning_msg();
		}
		Helpers::get_template_part( 'public', 'embed-code', [ $this->wp_storemapper_acct_id ] );
		echo wp_kses_post( $args['after_widget'] );
	}

	/**
	 * Outputs the widget form in the admin admin.
	 *
	 * @param array $instance The widget options.
	 *
	 * @return void.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['storemapper-widget-title'] ) ? $instance['storemapper-widget-title'] : '';
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'storemapper-widget-title' ) ); ?>">
				<?php esc_attr_e( 'Title:', 'wp-storemapper' ); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'storemapper-widget-title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'storemapper-widget-title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			<?php
			if ( empty( $this->wp_storemapper_acct_id ) ) {
				Helpers::output_acct_id_warning_msg();
			}
			?>
		</p>
		<?php
	}

	/**
	 * Processing widget options on save.
	 *
	 * @param array $new_instance The new options.
	 * @param array $old_instance The previous options.
	 *
	 * @return array The new options.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance['storemapper-widget-title'] = ! empty( $new_instance['storemapper-widget-title'] ) ? sanitize_text_field( $new_instance['storemapper-widget-title'] ) : '';

		return $instance;
	}
}

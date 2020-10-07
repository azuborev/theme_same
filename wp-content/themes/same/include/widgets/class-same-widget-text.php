<?php
/**
 * Shortcode file.
 *
 * @package files.
 */

/**
 * Class Same_Widget_Text
 */
class Same_Widget_Text extends WP_Widget {
	/**
	 * Same_Widget_Text constructor.
	 */
	public function __construct() {
		$args = array(
			'name'        => __( 'Same - Clean Text', 'same' ),
			'description' => __( 'Displays text without typesetting', 'same' ),
		);
		parent::__construct( 'same_widget_text', __( 'Same - Clean Text', 'same' ), $args );
	}

	/**
	 * Form backend for widget
	 *
	 * @param array $instance title and text.
	 * @return string|void
	 */
	public function form( $instance = array() ) {
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$text  = ( ! empty( $instance['text'] ) ) ? $instance['text'] : '';
		?>
		<p><label for = "<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'same' ); ?></label>
			<input
				class = "widefat"
				id = "<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
				type = "text" name = "<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
				value = "<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for = "<?php echo esc_attr( $this->get_field_id( 'id-text' ) ); ?>"><?php esc_html_e( 'Input text', 'same' ); ?></label>
			<textarea
				id = "<?php echo esc_attr( $this->get_field_id( 'id-text' ) ); ?>"
				type = "text"
				name = "<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>"
				value = "<?php echo wp_kses( $text, 'post' ); ?>"
				class = "widefat"
			><?php echo esc_html( $text ); ?></textarea>
		</p>
		<?php
	}

	/**
	 * Widget front-end part.
	 *
	 * @param array $args tags data.
	 * @param array $instance entered data.
	 */
	public function widget( $args = array(), $instance = array() ) {

		$title = apply_filters( 'title', $instance['title'] );
		if ( ! empty( $title ) ) {
			$html = $args['before_title'] . esc_html( $title ) . $args['after_title'];
			echo wp_kses( $html, 'post' );
		}
		$text = apply_filters( 'same_widget_text', $instance['text'] );
		echo wp_kses( $text, 'post' );
	}
	/**
	 * Update, save data widget.
	 *
	 * @param array $new_instance new data.
	 * @param array $old_instance old data.
	 * @return array $instance
	 */
	public function update( $new_instance = array(), $old_instance = array() ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		$instance['text']  = ( ! empty( $new_instance['text'] ) ) ? wp_strip_all_tags( $new_instance['text'] ) : '';
		return $instance;
	}
}

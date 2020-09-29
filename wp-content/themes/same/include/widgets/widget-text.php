<?php

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
	public function form( $instance ) {
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$text = ( ! empty( $instance['text'] ) ) ? $instance['text'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title', 'same' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" type="text"
				   name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for = "<?php echo $this->get_field_id('id-text'); ?>"><?php _e( 'Input text', 'same' ); ?></label>
			<textarea
				id="<?php echo $this->get_field_id('id-text'); ?>"
				type="text"
				name="<?php echo $this->get_field_name('text'); ?>"
				value="<?php echo $text; ?>"
				class="widefat"
			><?php echo esc_html($text); ?></textarea>
		</p>
		<?php
	}

	public function widget($args, $instance) {

		$title = apply_filters( 'title', $instance['title'] );
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		echo apply_filters('same_widget_text', $instance['text']);
	}
	/**
	 * Updata, save data widget.
	 *
	 * @param array $new_instance new data.
	 * @param array $old_instance old data.
	 * @return array $instance
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		$instance['text'] = ( ! empty( $new_instance['text'] ) ) ? wp_strip_all_tags( $new_instance['text'] ) : '';
		return $instance;
	}
}

<?php
/**
 * Shortcode file.
 *
 * @package files.
 */

/**
 *
 * Class Same_Widget_Contacts
 */
class Same_Widget_Contacts extends WP_Widget {
	/**
	 * Same_Widget_Contact constructor.
	 */
	public function __construct() {
		$args = array(
			'name'        => __( 'Same - Contacts', 'same' ),
			'description' => __( 'Add your contacts', 'same' ),
		);
		parent::__construct( 'same_widget_contacts', __( 'Same - Contacts', 'same' ), $args );
	}

	/**
	 * Form backend for widget
	 *
	 * @param array $instance data about contacts.
	 * @return string|void
	 */
	public function form( $instance = array() ) {
		$info = ( ! empty( $instance['info'] ) ) ? $instance['info'] : '';
		$item = ( ! empty( $instance['var'] ) ) ? $instance['var'] : '';
		$vars = array(
			'address' => __( 'Address', 'same' ),
			'phone'   => __( 'Phone', 'same' ),
			'mail'    => __( 'Email', 'same' ),
		);
		?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'id-info' ) ); ?>"><?php esc_html_e( 'Data info', 'same' ); ?></label>
			<textarea
				id="<?php echo esc_attr( $this->get_field_id( 'id-info' ) ); ?>"
				type="text"
				name="<?php echo esc_attr( $this->get_field_name( 'info' ) ); ?>"
				value="<?php echo wp_kses( $info, 'post' ); ?>"
				class="widefat"
			><?php echo wp_kses( $info, 'post' ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'id-var' ) ); ?>"><?php esc_html_e( 'Choice view', 'same' ); ?></label>
			<select class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'var' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'id-var' ) ); ?>">
				<?php
				foreach ( $vars as $var => $desc ) :
					?>
					<option value="<?php echo esc_attr( $var ); ?>" <?php selected( $item, $var, true ); ?>
					><?php echo esc_attr( $desc ); ?></option>
				<?php endforeach; ?>
			</select>
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
		switch ( $instance['var'] ) {
			case 'address':
				$address = preg_replace( '/\n/', '<br>', $instance['info'] );
				?>
				<li class="address"><?php echo wp_kses( $address, 'post' ); ?></li>
				<?php
				break;
			case 'phone':
				$tel = preg_replace( '/\n/', '<br>', $instance['info'] );
				?>
				<li class="phone"><?php echo wp_kses( $tel, 'post' ); ?></li>
				<?php
				break;
			case 'mail':
				$mail = preg_replace( '/\n/', '<br>', $instance['info'] );
				?>
				<li class="email"><a href="mailto:<?php echo esc_attr( $mail ); ?>"><?php echo wp_kses( $mail, 'post' ); ?></a></li>
				<?php
				break;
		}
	}
	/**
	 * Update, save data widget.
	 *
	 * @param array $new_instance new data.
	 * @param array $old_instance old data.
	 * @return array $instance
	 */
	public function update( $new_instance = array(), $old_instance = array() ) {
		$instance         = array();
		$instance['info'] = ( ! empty( $new_instance['info'] ) ) ? $new_instance['info'] : '';
		$instance['var']  = ( ! empty( $new_instance['var'] ) ) ? wp_strip_all_tags( $new_instance['var'] ) : '';
		return $instance;
	}
}

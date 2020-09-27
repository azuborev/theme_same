<?php

/**
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
	public function form( $instance ) {
		$info  = ( ! empty( $instance['info'] ) ) ? $instance['info'] : '';
		$item  = ( ! empty( $instance['var'] ) ) ? $instance['var'] : '';
		$vars  = array(
			'address' => __( 'Address', 'same' ),
			'phone'   => __( 'Phone', 'same' ),
			'mail'    => __( 'Email', 'same' ),
		);
		?>
		<p>
			<textarea
				id="<?php echo $this->get_field_id('id-info'); ?>"
				type="text"
				name="<?php echo $this->get_field_name('info'); ?>"
				value="<?php echo $info; ?>"
				class="widefat"
			><?php echo $info; ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('id-var'); ?>"><?php _e( 'Choice view', 'same' ) ?></label>
			<select class="widefat" name="<?php echo $this->get_field_name( 'var' ); ?>" id="<?php echo $this->get_field_id('id-var'); ?>">
				<?php
				foreach ($vars as $var => $desc):
					?>
					<option value="<?php echo $var; ?>" <?php selected( $item, $var, true ); ?>
					><?php echo $desc; ?></option>
				<?php endforeach;
				?>
			</select>
		</p>
		<?php
	}

	public function widget($args, $instance) {

		switch ($instance['var']) {
			case 'address':
				$address = preg_replace( '/\n/', '<br>', $instance['info']);
				?>
				<li class="address"><?php echo $address; ?></li>

				<?php
				break;
			case 'phone':
				$tel = preg_replace( '/\n/', '<br>', $instance['info']);
				?>
				<li class="phone"><?php echo $tel; ?></li>
				<?php
				break;
			case 'mail':
				$mail = preg_replace( '/\n/', '<br>', $instance['info']);
				?>
				<li class="email"><a href="mailto:<?php echo $mail; ?>"><?php echo $mail; ?></a></li>
				<?php
				break;
		}
	}
	/**
	 * Updata, save data widget.
	 *
	 * @param array $new_instance new data.
	 * @param array $old_instance old data.
	 * @return array $instance
	 */
	public function update( $new_instance, $old_instance ) {
		$instance         = array();
		$instance['info'] = ( ! empty( $new_instance['info'] ) ) ? $new_instance['info'] : '';
		$instance['var']  = ( ! empty( $new_instance['var'] ) ) ? wp_strip_all_tags( $new_instance['var'] ) : '';
		return $instance;
	}
}

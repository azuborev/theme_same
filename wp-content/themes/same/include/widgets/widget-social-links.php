<?php

/**
 * Class Same_Widget_Social_Links
 */
class Same_Widget_Social_Links extends WP_Widget {
	/**
	 * Same_Widget_Social_Links constructor.
	 */
	public function __construct() {
		$args = array(
			'name'        => __( 'Same - Social Links', 'same' ),
			'description' => __( 'Render social links', 'same' ),
		);
		parent::__construct( 'same_widget_social_links', __( 'Same - Social Links', 'same' ), $args );
	}

	/**
	 * Array with social links.
	 *
	 * @var string[][]
	 */
	private $socials = array(
		'fb'  => array(
			'facebook',
		),
		'ln'  => array(
			'linkedin',
		),
		'tw'  => array(
			'twitter',
		),
		'rss' => array(
			'rss',
		),
	);

	/**
	 * Form backend for widget
	 *
	 * @param array $instance data about social network.
	 * @return string|void
	 */
	public function form( $instance ) {
		$link = ( ! empty( $instance['link'] ) ) ? $instance['link'] : '';
		$name = ( ! empty( $instance['slug'] ) ) ? $instance['slug'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Link', 'same' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" type="text"
				   name="<?php echo $this->get_field_name('link'); ?>" value="<?php echo esc_attr( $link ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('slug'); ?>"><?php _e( 'Social network', 'same' ) ?></label>
			<select class="widefat" name="<?php echo $this->get_field_name( 'slug' ); ?>" id="<?php echo $this->get_field_id('slug'); ?>">
				<?php
				foreach ($this->socials as $slug => $desc):
					?>
					<option value="<?php echo $slug; ?>" <?php selected( $name, $slug, true ); ?>>
						<?php echo $desc[0]; ?>
					</option>
				<?php endforeach;
				?>
			</select>
		</p>
		<?php
	}

	public function widget($args, $instance) {
		$slug = $instance['slug'];
		$link = $instance['link'];
		$title = $this->socials[$slug][0];
		?>
		<li><a href="<?php echo $link ?>" class="<?php echo $title ?>" target="_blank"></a></li>
		<?php

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
		$instance['link'] = ( ! empty( $new_instance['link'] ) ) ? wp_strip_all_tags( $new_instance['link'] ) : '#';
		$instance['slug'] = wp_strip_all_tags( $new_instance['slug'] );
		return $instance;
	}
}
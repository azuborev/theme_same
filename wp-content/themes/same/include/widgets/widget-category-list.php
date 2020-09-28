<?php

/**
 * Class Same_Widget_Category_List
 */
class Same_Widget_Category_List extends WP_Widget {
	/**
	 * Same_Widget_Category_List constructor.
	 */
	public function __construct() {
		$args = array(
			'name'        => __( 'Same - Category List', 'same' ),
			'description' => __( 'Rendering category list', 'same' ),
		);
		parent::__construct( 'same_widget_category_list', __( 'Same - Category List', 'same' ), $args );
	}

	/**
	 * Form backend for widget
	 *
	 * @param array $instance title and text.
	 * @return string|void
	 */
	public function form( $instance ) {
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$taxonomy = ( ! empty( $instance['taxonomy'] ) ) ? $instance['taxonomy'] : '';
		$args = array(
			'public'   => true,
		);
		$output = 'objects';
		$taxonomies = get_taxonomies( $args, $output );
		?>
		<p>
			<label for="<?php echo $this->get_field_id('id-title'); ?>"><?php _e( 'Title', 'same' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('id-title'); ?>" type="text"
			       name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $title ); ?>">
		</p>
        <p>
		<select class="widefat" name="<?php echo $this->get_field_name( 'taxonomy' ); ?>" id="<?php echo $this->get_field_id('id-taxonomy'); ?>">
			<?php
			foreach ($taxonomies as $tax):
				?>
				<option value="<?php echo $tax->name; ?>" <?php selected( $taxonomy, $tax->name ); ?>
				><?php echo $tax->label; ?></option>
			<?php endforeach;
			?>
		</select>
		</p>
		<?php
	}

	public function widget($args, $instance) {

		$query_args = array(
			'show_option_all'    => '',
			'show_option_none'   => __('No categories'),
			'orderby'            => 'name',
			'order'              => 'ASC',
			'style'              => 'list',
			'show_count'         => 1,
			'hide_empty'         => 0,
			'use_desc_for_title' => 1,
			'child_of'           => 0,
			'feed'               => '',
			'feed_type'          => '',
			'feed_image'         => '',
			'exclude'            => '',
			'exclude_tree'       => '',
			'include'            => '',
			'hierarchical'       => true,
			'title_li'           => false,
			'number'             => NULL,
			'echo'               => 1,
			'depth'              => 0,
			'current_category'   => 0,
			'pad_counts'         => 0,
			'taxonomy'           => $instance['taxonomy'],
			'hide_title_if_empty' => false,
			'walker' => new Walker_Category_Custom,
			'separator'          => '<br />',
		);

		$title = apply_filters( 'title', $instance['title'] );
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		echo $args['before_widget'];
		echo wp_list_categories($query_args );
		echo $args['after_widget'];
	}
	/**
	 * Update, save data widget.
	 *
	 * @param array $new_instance new data.
	 * @param array $old_instance old data.
	 * @return array $instance
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		$instance['taxonomy'] = ( ! empty( $new_instance['taxonomy'] ) ) ? wp_strip_all_tags( $new_instance['taxonomy'] ) : '';
		return $instance;
	}
}

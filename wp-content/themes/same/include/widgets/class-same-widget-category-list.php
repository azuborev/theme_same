<?php
/**
 * Shortcode file.
 *
 * @package files.
 */

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
	 * Backend Form for widget
	 *
	 * @param array $instance title and text.
	 * @return string|void
	 */
	public function form( $instance = array() ) {
		$title      = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$taxonomy   = ( ! empty( $instance['taxonomy'] ) ) ? $instance['taxonomy'] : '';
		$args       = array(
			'public' => true,
		);
		$output     = 'objects';
		$taxonomies = get_taxonomies( $args, $output );
		?>
		<p>
			<label for = "<?php echo esc_attr( $this->get_field_id( 'id-title' ) ); ?>"><?php esc_html_e( 'Title', 'same' ); ?></label>
			<input class = "widefat" id = "<?php echo esc_attr( $this->get_field_id( 'id-title' ) ); ?>" type = "text" name = "<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value = "<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for = "<?php echo esc_attr( $this->get_field_id( 'id-taxonomy' ) ); ?>"><?php esc_html_e( 'Taxonomy', 'same' ); ?></label>
		<select class = "widefat" name = "<?php echo esc_attr( $this->get_field_name( 'taxonomy' ) ); ?>" id = "<?php echo esc_attr( $this->get_field_id( 'id-taxonomy' ) ); ?>">
			<?php
			foreach ( $taxonomies as $tax ) :
				?>
				<option value = "<?php echo esc_attr( $tax->name ); ?>" <?php selected( $taxonomy, $tax->name ); ?>
				><?php echo esc_attr( $tax->label ); ?></option>
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

		$query_args = array(
			'show_option_all'     => '',
			'show_option_none'    => __( 'No categories' ),
			'orderby'             => 'name',
			'order'               => 'ASC',
			'style'               => 'list',
			'show_count'          => 1,
			'hide_empty'          => 0,
			'use_desc_for_title'  => 1,
			'child_of'            => 0,
			'hierarchical'        => true,
			'title_li'            => false,
			'number'              => null,
			'echo'                => 1,
			'depth'               => 0,
			'current_category'    => 0,
			'pad_counts'          => 0,
			'taxonomy'            => $instance['taxonomy'],
			'hide_title_if_empty' => false,
			'walker'              => new Walker_Category_Custom(),
			'separator'           => '<br />',
		);

		$title = apply_filters( 'title', $instance['title'] );
		if ( ! empty( $title ) ) {
			$html = $args['before_title'] . esc_html( $title ) . $args['after_title'];
			echo wp_kses( $html, 'post' );
		}
		echo '<ul class="menu categories page_text">';
		echo wp_list_categories( $query_args );
		echo '</ul>';
	}

	/**
	 *
	 * Update, save data widget.
	 *
	 * @param array $new_instance new data from input fields.
	 *
	 * @param array $old_instance old data from input fields.
	 *
	 * @return array $instance
	 */
	public function update( $new_instance = array(), $old_instance = array() ) {
		$instance             = array();
		$instance['title']    = ( ! empty( $new_instance['title'] ) ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		$instance['taxonomy'] = ( ! empty( $new_instance['taxonomy'] ) ) ? wp_strip_all_tags( $new_instance['taxonomy'] ) : '';
		return $instance;
	}
}

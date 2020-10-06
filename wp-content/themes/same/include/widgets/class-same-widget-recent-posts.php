<?php
/**
 * Shortcode file.
 *
 * @package files.
 */

/**
 * Class Same_Widget_Recent_Posts
 */
class Same_Widget_Recent_Posts extends WP_Widget {
	/**
	 * Same_Widget_Recent_Posts constructor.
	 */
	public function __construct() {
		$args = array(
			'name'        => __( 'Same - Recent Posts', 'same' ),
			'description' => __( 'Get recent post\'s lost', 'same' ),
		);
		parent::__construct( 'same_widget_recent_posts', __( 'Same - Recent Posts', 'same' ), $args );
	}

	/**
	 * Form backend for widget
	 *
	 * @param array $instance title and text.
	 * @return string|void
	 */
	public function form( $instance = array() ) {
		$title      = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$post_type  = ( ! empty( $instance['post-type'] ) ) ? $instance['post-type'] : '';
		$number     = ( ! empty( $instance['number'] ) ) ? $instance['number'] : '3';
		$args       = array(
			'public' => true,
		);
		$output     = 'objects';
		$post_types = get_post_types( $args, $output );
		unset( $post_types['attachment'] );
		unset( $post_types['page'] );
		?>
		<p>
			<label for = "<?php echo esc_attr( $this->get_field_id( 'id-title' ) ); ?>"><?php esc_html_e( 'Title', 'same' ); ?></label>
			<input class = "widefat" id = "<?php echo esc_attr( $this->get_field_id( 'id-title' ) ); ?>" type = "text"
				name = "<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value = "<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for = "<?php echo esc_attr( $this->get_field_id( 'id-number' ) ); ?>"><?php esc_html_e( 'Number', 'same' ); ?></label>
			<input class = "widefat" id = "<?php echo esc_attr( $this->get_field_id( 'id-number' ) ); ?>" type = "text"
				name = "<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" value = "<?php echo esc_attr( $number ); ?>">
		</p>
		<p>
			<label for = "<?php echo esc_attr( $this->get_field_id( 'id-post-type' ) ); ?>"><?php esc_html_e( 'Taxonomy', 'same' ); ?></label>
			<select class = "widefat" name = "<?php echo esc_attr( $this->get_field_name( 'post-type' ) ); ?>"
					id = "<?php echo esc_attr( $this->get_field_id( 'id-post-type' ) ); ?>">
			<?php foreach ( $post_types as $type ) : ?>
				<option value = "<?php echo esc_attr( $type->name ); ?>" <?php selected( $post_type, $type->name ); ?>
				><?php echo esc_html( $type->label ); ?></option>
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
			'numberposts'      => $instance['number'],
			'offset'           => 0,
			'category'         => 0,
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'include'          => '',
			'exclude'          => '',
			'post_type'        => $instance['post-type'],
			'post_status'      => 'publish',
			'suppress_filters' => true,
		);

		$posts = wp_get_recent_posts( $query_args, OBJECT );

		$title = apply_filters( 'title', $instance['title'] );
		if ( ! empty( $title ) ) {
			$html = $args['before_title'] . esc_html( $title ) . $args['after_title'];
			echo wp_kses( $html, 'post' );
		}
		?>
		<ul class="recent_posts">
			<?php foreach ( $posts as $post ) : ?>
				<li class = "item">
					<a class = "thumbnail" href="<?php the_permalink( $post->ID ); ?>"><?php echo get_the_post_thumbnail( $post->ID ); ?></a>
					<div class = "text">
						<h4 class = "title"><a href="<?php the_permalink( $post->ID ); ?>"><?php echo esc_html( $post->post_title ); ?></a></h4>
						<p class="data">
							<span class = "date"><?php echo esc_html( gmdate( 'j/n/Y', strtotime( $post->post_date ) ) ); ?></span>
						</p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php
	}
	/**
	 * Update, save data widget.
	 *
	 * @param array $new_instance new data.
	 * @param array $old_instance old data.
	 * @return array $instance
	 */
	public function update( $new_instance = array(), $old_instance = array() ) {
		$instance              = array();
		$instance['title']     = ( ! empty( $new_instance['title'] ) ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		$instance['post-type'] = wp_strip_all_tags( $new_instance['post-type'] );
		$instance['number']    = ( is_numeric( $new_instance['number'] ) ) ? wp_strip_all_tags( $new_instance['number'] ) : '3';
		return $instance;
	}
}

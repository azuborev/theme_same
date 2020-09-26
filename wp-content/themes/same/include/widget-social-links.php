<?php

/**
 * Class Same_Widget_Social_Links
 */
class Same_Widget_Social_Links extends WP_Widget {
	const IMG_URL = './assets/img/gfx/';
	/**
	 * Same_Widget_Social_Links constructor.
	 */
	public function __construct() {
		parent::__construct(
			__( 'same_widget_social_links', 'same' ),
			__( 'Same - social links', 'same' ),
			array(
				'name'        => __( 'Same - social links', 'same' ),
				'description' => __( 'render social links', 'same' ),
			)
		);
	}

	private $socials = array(
		'fb' => array(
			'Facebook',
		),
		'ln' => array(
			'LinkedIn',
		),
		'tw' => array(
			'Twitter',
		),
		'rss' => array(
			'RSS',
		),
	);

	public function form($instance) //то что в админке, инстенс - данные, которые записаны в форме
	{
		?>
		<p>
			<label for = "<?php echo $this->get_field_id('id-link') ?>">Ссылка на социальную сеть:</label>
			<input
				id="<?php echo $this->get_field_id('id-link') ?>"
				type="text"
				name="<?php echo $this->get_field_name('link')?>"
				value="<?php echo $instance['link'] ?>"
				class="widefat"
			>
		</p>
		<p>
			<label for = "<?php echo $this->get_field_id('id-slug') ?>">Выберите социальную сеть:</label>
			<select
				id="<?php echo $this->get_field_id('id-slug') ?>"
				name="<?php echo $this->get_field_name('slug')?>"
				class="widefat"
			>
				<?php
				foreach ($this->socials as $slug => $desc):
					?>
					<option value="<?php echo $slug; ?>" <?php selected( $instance['slug'], $slug, true ) ?>>
						<?php echo $desc[0]; ?>
					</option>
				<?php endforeach; ?>
			</select>
		</p>
		<?php
	}

	public function widget($args, $instance)  // то что на фронте
	{
		$slug = $instance['slug'];
		$link = $instance['link'];
		$text = $this->socials[$slug][0];
		$svg = $this->socials[$slug][1];
		?>
		<a
			target="_blank"
			href="<?php echo $link ?>"
			class="widget-social-links <?php echo $slug ?>"
		>
			<span class="sr-only"> Мы в <?php echo $text ?>! </span>
			<?php echo $svg; ?>
		</a>
		<?php

	}

	public  function update($new_instance, $old_instance) // при изменении данных
	{
		return $new_instance;
	}
}

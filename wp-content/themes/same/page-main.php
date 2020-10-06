<?php
/**
 *
 * Template Name: Template for main page
 *
 * @package same
 */

get_header();
?>
	<section id="top">
		<div class="wrapper">
			<div id="top_slide" class="flexslider">
				<?php
				$sliders = get_posts(
					array(
						'numberposts'      => 5,
						'meta_key'         => 'slider_number',
						'orderby'          => 'meta_value_num',
						'order'            => 'ASC',
						'post_type'        => 'sliders',
						'location'         => 'main_header',
						'post_status'      => 'publish',
						'suppress_filters' => true,
					)
				);
				?>
				<ul class="slides">
					<?php
					foreach ( $sliders as $post ) {
						setup_postdata( $post );
						?>
						<li>
							<img src="<?php the_field( 'slider_image' ); ?>" alt="" />
							<p class="flex-caption">
								<strong><?php the_title(); ?></strong>
								<span><?php the_field( 'slider_text' ); ?></span>
							</p>
						</li>
						<?php
					}
					wp_reset_postdata();
					?>
				</ul>
			</div>
		</div>
	</section>
	<section id="content">
		<div class="wrapper page_text page_home">
			<?php
			$introduces = get_posts(
				array(
					'numberposts'   => -1,
					'post_type'     => 'post',
					'post_status'   => 'publish',
					'category_name' => 'company',
				)
			);
			if ( $introduces ) :
				foreach ( $introduces as $post ) {
					setup_postdata( $post );
					?>
					<div class="introduction">
						<div>
							<h1><?php echo wp_kses( get_the_excerpt(), 'post' ); ?></h1>
							<p><?php the_content( '' ); ?></p>
							<a class="button button_big button_orange float_left" href="<?php the_permalink(); ?>">
								<span class="inside"><?php esc_html_e( 'read more', 'same' ); ?></span></a>
						</div>
					</div>
					<?php
				}
				wp_reset_postdata();
			endif;
			?>
			<?php
			$services = get_posts(
				array(
					'numberposts'      => 3,
					'meta_key'         => 'service_number',
					'orderby'          => 'meta_value_num',
					'order'            => 'ASC',
					'post_type'        => 'service',
					'post_status'      => 'publish',
					'suppress_filters' => true,
				)
			);
			?>
			<ul class="columns dropcap">
				<?php
				if ( $services ) :
					foreach ( $services as $post ) {
						setup_postdata( $post );
						?>
						<li class="column column33 <?php the_field( 'service_number' ); ?>">
							<div class="inside">
								<h1><?php the_title(); ?></h1>
								<p><?php the_excerpt(); ?></p>
								<p class="read_more"><a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more', 'same' ); ?></a></p>
							</div>
						</li>
						<?php
					}
					wp_reset_postdata();
				endif;
				?>
			</ul>
			<?php
			$services = get_posts(
				array(
					'numberposts'      => 3,
					'meta_key'         => 'service_icone',
					'orderby'          => 'date',
					'order'            => 'DESC',
					'post_type'        => 'service',
					'post_status'      => 'publish',
					'suppress_filters' => true,
				)
			);
			?>
			<ul class="columns iconcap">
				<?php
				if ( $services ) :
					foreach ( $services as $post ) {
						setup_postdata( $post );
						?>
						<li class="column column33 <?php the_field( 'service_icone' ); ?>">
							<div class="inside">
								<h1><?php the_title(); ?></h1>
								<p><?php the_excerpt(); ?></p>
								<p class="read_more"><a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more', 'same' ); ?></a></p>
							</div>
						</li>
						<?php
					}
					wp_reset_postdata();
				endif;
				?>
			</ul>
			<div class="underline"></div>
			<div class="portfolio">
				<p class="all_projects">
					<?php echo do_shortcode( '[same-link link="cases" anchor="View all projects"]' ); ?>
				</p>
				<h1>Portfolio</h1>
				<div class="columns">
					<?php
					$rand_photo_list = get_posts(
						array(
							'numberposts'      => 4,
							'orderby'          => 'rand',
							'post_type'        => 'cases',
							'post_status'      => 'publish',
							'meta_query'       => array(
								array(
									'key'     => 'case_portfolio_main',
									'compare' => '==',
									'value'   => '1',
								),
							),
							'suppress_filters' => true,
						)
					);
					if ( $rand_photo_list ) :
						foreach ( $rand_photo_list as $post ) {
							setup_postdata( $post );
							?>
							<div class="column column25">
								<a href="<?php echo esc_attr( get_field( 'case_main_photo' )['url'] ); ?>"
								class="image lightbox" data-rel="prettyPhoto[gallery]">
									<span class="inside">
										<img src="<?php echo esc_attr( get_field( 'case_portfolio_main_photo' )['url'] ); ?>"
										alt="<?php echo esc_attr( get_field( 'case_portfolio_main_photo' )['alt'] ); ?>" />
										<span class="caption"><?php the_field( 'case_photo_caption' ); ?></span>
									</span>
									<span class="image_shadow"></span>
								</a>
							</div>
							<?php
						}
						wp_reset_postdata();
					endif;
					?>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</section>
<?php
get_footer();

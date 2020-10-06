<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package same
 */

get_header();
?>
<?php
if ( is_page( 'gallery' ) ) :
	?>
	<section id="content">
		<div class="wrapper page_text">
			<h1 class="page_title"><?php esc_html_e( 'Gallery', 'same' ); ?></h1>
			<?php get_template_part( 'breadcrumbs' ); ?>
			<?php
				$wp_query = new WP_Query(
					array(
						'posts_per_page'   => 2,
						'paged'            => ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1,
						'orderby'          => 'name',
						'order'            => 'ASC',
						'post_type'        => 'cases',
						'post_status'      => 'publish',
						'meta_query'       => array(
							array(
								'key'     => 'case_gallery_page',
								'compare' => '==',
								'value'   => '1',
							),
						),
						'suppress_filters' => true,
					)
				);

				$post_number = count( $wp_query->posts );
			?>
			<div class="page_gallery">
				<div class="columns">
					<?php
					$post_counter = 0;
					while ( $wp_query->have_posts() ) {
						$wp_query->the_post();
						$post_counter++;
						?>
						<div class="column column50">
							<div class="image">
								<img src="<?php echo esc_attr( get_field( 'case_gallery_preview_photo' )['url'] ); ?>"
								alt="<?php echo esc_attr( get_field( 'case_gallery_preview_photo' )['alt'] ); ?>" />
								<p class="caption">
									<strong><?php the_field( 'case_photo_title' ); ?></strong>
									<span><?php the_field( 'case_photo_caption_gallery' ); ?></span>
									<a href="<?php echo esc_attr( get_field( 'case_main_photo' )['url'] ); ?>" data-rel="prettyPhoto[gallery]"
									class="button button_small button_orange float_right lightbox"><span class="inside">zoom</span></a>
								</p>
							</div>
						</div>
						<?php
						if ( ( 0 === $post_counter % 2 ) && ( $post_counter !== $post_number ) ) {
							?>
							</div>
							<div class="columns">
								<?php
						}
					}
					wp_reset_postdata();
					?>
				</div>
			</div>
			<ul class="pagenav">
				<?php
				if ( function_exists( 'wp_pagenavi' ) ) {
					wp_pagenavi();
				}
				?>
			</ul>
		</div>
	</section>
	<?php
else :
	?>
	<section id="content">
		<div class="wrapper page_text">
			<?php get_template_part( 'breadcrumbs' ); ?>
			<div class="columns">
				<div class="column column75">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							?>
							<div class="article">
								<h1 class="page_title"><?php the_title(); ?></h1>
								<p><?php the_content(); ?></p>
							</div>
							<?php
						endwhile;
					endif
					?>
				</div>
				<?php
				get_sidebar();
				?>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php
get_footer();

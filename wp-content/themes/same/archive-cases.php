<?php
/**
 * The template file for custom post type - cases
 *
 * @package same
 */

get_header();
?>
	<section id="content">
		<div class="wrapper page_text">
			<?php get_template_part( 'breadcrumbs' ); ?>
			<h1 class="page_title"><?php esc_html_e( 'Portfolio', 'same' ); ?></h1>
			<?php
			$portfolio_categories = get_terms(
				array(
					'taxonomy'     => array( 'case_category' ),
					'orderby'      => 'name',
					'order'        => 'ASC',
					'hide_empty'   => 1,
					'hierarchical' => false,
				)
			);
			?>
			<?php if ( $portfolio_categories ) : ?>
				<ul id="portfolio_categories" class="portfolio_categories">
					<li class="active segment-0"><a href="#" class="all"><?php esc_html_e( 'All Categories', 'same' ); ?></a></li>
					<?php
					foreach ( $portfolio_categories as $category ) {
						?>
						<li class="segment-1"><a href="<?php echo esc_attr( get_term_link( $category->term_id ) ); ?>"
							class="<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_html( $category->name ); ?></a></li>
						<?php
					}
					?>
				</ul>
			<?php endif; ?>
			<div class="portfolio_items_container">
				<?php
				$portfolio_list = get_posts(
					array(
						'numberposts'      => -1,
						'orderby'          => 'name',
						'order'            => 'ASC',
						'post_type'        => 'cases',
						'post_status'      => 'publish',
						'meta_query'       => array(
							array(
								'key'   => 'case_portfolio_page',
								'value' => '1',
							),
						),
						'suppress_filters' => true,
					)
				);
				if ( $portfolio_list ) :
					?>
					<ul class="portfolio_items columns">
						<?php
						foreach ( $portfolio_list as $post ) {
							setup_postdata( $post );
							$current_term = get_the_terms( $post->ID, 'case_category' );
							$count_terms  = count( $current_term );
							for ( $i = 0; $i < $count_terms; $i++ ) {
								?>
								<li data-type="<?php echo esc_attr( $current_term[ $i ]->slug ); ?>" data-id="id-<?php echo esc_attr( $post->ID ); ?>" class = "column column33">
									<a href = "<?php echo esc_attr( get_field( 'case_main_photo' )['url'] ); ?>" data-rel = "prettyPhoto[gallery]" class = "portfolio_image lightbox">
									<div class = "inside">
										<img alt = "<?php echo esc_attr( get_field( 'case_portfolio_preview_photo' )['alt'] ); ?>"
											src = "<?php echo esc_attr( get_field( 'case_portfolio_preview_photo' )['url'] ); ?>">
										<div class = "mask"></div>
									</div>
									</a>
									<h1><?php the_title(); ?></h1>
									<p><?php the_excerpt(); ?></p>
									<a class = "button button_small button_orange" href="<?php echo esc_attr( $post->guid ); ?>">
										<span class="inside"><?php esc_html_e( 'Read more', 'same' ); ?></span></a>
								</li>
								<?php
							}
						}
						wp_reset_postdata();
						?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php
get_footer();

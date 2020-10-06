<?php
/**
 * The template for displaying all single posts
 *
 * @package same
 */

get_header();
?>
	<section id="content">
		<div class="wrapper page_text">
			<?php get_template_part( 'breadcrumbs' ); ?>
			<?php if ( is_singular( 'cases' ) ) : ?>
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						?>
						<h1 class="page_title"><?php the_title(); ?></h1>
						<div class="columns">
							<div class="column column33">
								<h1><?php the_field( 'case_photo_title' ); ?></h1>
								<p><?php the_field( 'case_photo_description' ); ?></p>
								<h1><?php esc_html_e( 'Client:', 'same' ); ?></h1>
								<p><?php the_field( 'case_client' ); ?></p>
								<h1><?php esc_html_e( 'Model:', 'same' ); ?></h1>
							<?php
							$current_terms = get_the_terms( $post->ID, 'model' );
							foreach ( $current_terms as $term ) {
								?>
								<p><a href="<?php echo esc_attr( get_term_link( $term ) ); ?>"><?php echo esc_html( $term->name ); ?></a></p>
								<?php
							}
							?>
								<h1><?php esc_html_e( 'Photographer:', 'same' ); ?></h1>
								<p><?php the_field( 'case_photographer' ); ?></p>
							</div>
							<div class="column column66">
								<div id="content_slide">
									<div class="flexslider">
										<ul class="slides">
											<li>
												<a href="<?php echo esc_attr( get_field( 'case_main_photo' )['url'] ); ?>" class="lightbox" data-rel="prettyPhoto[gallery]">
													<?php
													if ( ! empty( get_field( 'case_single_page_photo' )['url'] ) ) :
														?>
														<img src="<?php echo esc_attr( get_field( 'case_single_page_photo' )['url'] ); ?>"
															alt="<?php echo esc_attr( get_field( 'case_single_page_photo' )['alt'] ); ?>">
														<?php
													else :
														?>
														<img src="http://dummyimage.com/606x480/c0c0c0&Text=Click here"
															alt="<?php echo esc_attr( get_field( 'case_single_page_photo' )['alt'] ); ?>">
														<?php
													endif;
													?>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
				<?php endwhile; ?>
				<?php else : ?>
					<p><?php esc_html_e( 'Nothing  found', 'same' ); ?></p>
				<?php endif; ?>
			<?php else : ?>
			<div class="columns">
				<div class="column column75">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							?>
							<div class="article">
								<h2><?php the_title(); ?></h2>
								<div class="clr"></div>
								<?php the_post_thumbnail(); ?>
								<?php the_content(); ?>
								<?php
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
								?>
							</div>
						<?php endwhile; ?>
						<?php
					else :
						?>
						<p><?php esc_html_e( 'Nothing  found', 'same' ); ?></p>
						<?php endif; ?>
				</div>
				<?php
				get_sidebar();
				?>
			<?php endif; ?>
	</section>
<?php
get_footer();

<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package same
 */

get_header();
?>
	<section id="content">
		<div class="wrapper page_text">
			<?php
			if ( is_home() ) :
				?>
				<?php get_template_part( 'breadcrumbs' ); ?>
				<h1 class="page_title"><?php esc_html_e( 'Blog', 'same' ); ?></h1>
				<div class="columns">
					<div class="column column75">
						<?php
						if ( have_posts() ) :
							while ( have_posts() ) :
								the_post();
								?>
								<?php
								if ( ! in_category( 'company' ) ) :
									?>
									<article class="article">
										<div class="article_image nomargin">
											<div class="inside">
												<?php the_post_thumbnail(); ?>
											</div>
										</div>
										<div class="article_details">
											<ul class="article_author_date">
												<li><em><?php esc_html_e( 'Add:', 'same' ); ?></em> <?php the_time( 'd.m.Y' ); ?></li>
												<li><em><?php esc_html_e( 'Author:', 'same' ); ?></em>
													<a href="<?php echo esc_attr( get_author_posts_url( $post->post_author ) ); ?>" ><?php the_author(); ?></a></li>
											</ul>
											<p class="article_comments"><em><?php esc_html_e( 'Comment: ', 'same' ); ?>
												</em><?php comments_number( '0', '1', '%' ); ?></p>
										</div>
										<h1><?php the_title(); ?></h1>
										<?php the_content( '' ); ?>
										<a class="button button_small button_orange float_left" href="<?php the_permalink(); ?>">
											<span class="inside"><?php esc_html_e( 'read more', 'same' ); ?></span></a>
									</article>
									<?php endif; ?>
								<?php endwhile; ?>
							<?php else : ?>
							<article class="article">
								<p><?php esc_html_e( 'Nothing yet', 'same' ); ?></p>
							</article>
						<?php endif; ?>
					</div>
					<?php else : ?>
						<?php get_template_part( 'breadcrumbs' ); ?>
					<div class="columns">
						<div class="column column75">
							<?php
							if ( have_posts() ) :
								while ( have_posts() ) :
									the_post();
									?>
									<article class="article">
										<h1><?php the_title(); ?></h1>
										<?php
										if ( has_post_thumbnail() ) :
											?>
											<div class="article_image nomargin">
												<div class="inside">
													<?php the_post_thumbnail(); ?>
												</div>
											</div>
											<?php
										elseif ( get_field( 'case_main_photo' ) ) :
											?>
											<div class="inside">
												<?php
												echo wp_get_attachment_image( get_field( 'case_main_photo' )['ID'], 'medium' );
												?>
											</div>
										<?php endif; ?>
										<div class="article_details">
											<ul class="article_author_date">
												<li><em><?php esc_html_e( 'Add:', 'same' ); ?></em> <?php the_time( 'd.m.Y' ); ?></li>
												<li><em><?php esc_html_e( 'Author:', 'same' ); ?></em>
													<a href="<?php echo esc_attr( get_author_posts_url( $post->post_author ) ); ?>"><?php the_author(); ?></a></li>
											</ul>
										</div>
										<?php
										if ( has_excerpt() ) :
											the_excerpt();
										else :
											the_content( '' );
										endif;
										?>
										<a class="button button_small button_orange float_left" href="<?php the_permalink(); ?>">
											<span class="inside"><?php esc_html_e( 'read more', 'same' ); ?></span></a>
									</article>
								<?php endwhile; ?>
							<?php else : ?>
								<article class="article">
									<p><?php esc_html_e( 'Nothing yet', 'same' ); ?></p>
								</article>
							<?php endif; ?>
						</div>
						<?php
						endif;
						get_sidebar();
					?>
					</div>
				</div>
	</section>
<?php
get_footer();

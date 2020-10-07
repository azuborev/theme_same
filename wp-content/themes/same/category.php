<?php
/**
 * The template file Category
 *
 * This is the template file for category page.
 *
 * @package same
 */

get_header();
?>
	<section id="content">
		<div class="wrapper page_text">
			<?php get_template_part( 'breadcrumbs' ); ?>
			<h1 class="page_title"><?php single_cat_title(); ?></h1>
			<div class="columns">
				<div class="column column75">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							?>
							<article class="article">
								<?php
								if ( has_post_thumbnail() ) :
									?>
									<div class="article_image nomargin">
										<div class="inside">
										<?php the_post_thumbnail(); ?>
										</div>
									</div>
							<?php endif; ?>
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
					<?php endwhile; ?>
					<?php else : ?>
						<article class="article">
							<p><?php esc_html_e( 'Nothing yet', 'same' ); ?></p>
						</article>
					<?php endif; ?>
				</div>
				<?php
					get_sidebar();
				?>
				</div>
			</div>
	</section>
<?php
get_footer();


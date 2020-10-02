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
	<!-- BEGIN CONTENT -->
	<section id="content">
		<div class="wrapper page_text">
			<?php
			?>
			<h1 class="page_title"><?php  single_cat_title() ?></h1>
			<?php get_template_part('breadcrumbs'); ?>
			<div class="columns">
				<div class="column column75">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php if (! in_category('company')) : ?>
							<article class="article">
								<div class="article_image nomargin">
									<div class="inside">
										<?php the_post_thumbnail(); ?>
									</div>
								</div>
								<div class="article_details">
									<ul class="article_author_date">
										<li><em><?php _e('Add:', 'same'); ?></em> <?php the_time('d.m.Y') ?></li>
										<li><em><?php _e('Author:', 'same'); ?></em> <a href="<?php echo get_author_posts_url($post->post_author); ?>" ><?php the_author() ?></a></li>
									</ul>
									<p class="article_comments"><em><?php _e('Comment: ', 'same'); ?></em><?php comments_number('0', '1', '%'); ?></p>
								</div>
								<h1><?php the_title() ?></h1>
								<?php the_content('') ?>
								<!--			                 --><?php //echo preg_replace('/<blockquote(.*)blockquote>/', '<q>'.get_the_excerpt().'</q>', get_the_content('') ) ?>
								<a class="button button_small button_orange float_left" href="<?php the_permalink(); ?>"><span class="inside"><?php _e('read more', 'same'); ?></span></a>
							</article>
						<?php endif;?>
					<?php endwhile; ?>
					<?php else: ?>
						<article class="article">
							<p><?php _e('Nothing yet', 'same'); ?></p>
						</article>
					<?php endif; ?>
				</div>
				<?php
					get_sidebar();
					?>
				</div>
			</div>
	</section>
	</div>
	</div>
<?php
get_footer();


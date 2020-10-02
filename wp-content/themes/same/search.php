<?php
/**
 * The template for displaying search results pages
 *
 * @package same
 */
get_header();
?>
<section id="content">
    <div class="wrapper page_text">
	    <?php get_template_part('breadcrumbs'); ?>
        <div class="columns">
            <div class="column column75">
                <div class="wrapper page_text">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							?>
                            <div class="article">
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <div class="clr"></div>
                                <?php the_post_thumbnail(); ?>
                                <?php the_excerpt(); ?>
                                <p><a href="<?php the_permalink(); ?>"><?php _e('Read more', 'same'); ?></a></p>
                            </div>
						<?php
						endwhile;
					else: ?>
                    <p><?php _e('Nothing found', 'same'); ?></p>
					<?php endif; ?>
                </div>
            </div>
			<?php
			get_sidebar();
			?>
            <div class="clr"></div>
        </div>
    </div>
</section>
    </div>
    </div>
<?php
get_footer();

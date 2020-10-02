<?php
/**
 * The template for displaying all single posts
 *
 *
 * @package same
 */

get_header();
?>
    <section id="content">
        <div class="wrapper page_text">
	        <?php get_template_part('breadcrumbs'); ?>
            <?php if (is_singular('cases')) :?>
	            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h1 class="page_title"><?php the_title(); ?></h1>
            <div class="columns">
                <div class="column column33">
                    <h1><?php the_field('case_photo_title'); ?></h1>
                    <p><?php the_field('case_photo_description'); ?></p>
                    <h1>Client:</h1>
                    <p><?php echo get_field('case_client'); ?></p>
                    <h1>Model:</h1>
                    <?php
	                    $current_terms = get_the_terms($post->ID, 'model');
                            foreach ( $current_terms as $term ) {
                                ?>
                                <p><a href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a></p>
                                <?php
	                        }
                    ?>
                    <h1>Photographer:</h1>
                    <p><?php the_field('case_photographer'); ?></p>
                </div>
                <div class="column column66">
                    <div id="content_slide">
                        <div class="flexslider">
                            <ul class="slides">
                                <li><a href="./gfx/examples/img_big3.jpg" class="lightbox" data-rel="prettyPhoto[gallery]"><img src="./gfx/examples/content_slide606x480.jpg" alt="1" /></a></li>
                                <li><a href="./gfx/examples/img_big2.jpg" class="lightbox" data-rel="prettyPhoto[gallery]"><img src="./gfx/examples/content_slide606x480_2.jpg" alt="2" /></a></li>
                                <li><a href="./gfx/examples/img_big5.jpg" class="lightbox" data-rel="prettyPhoto[gallery]"><img src="./gfx/examples/content_slide606x480_3.jpg" alt="3" /></a></li>
                                <li><a href="./gfx/examples/img_big6.jpg" class="lightbox" data-rel="prettyPhoto[gallery]"><img src="./gfx/examples/content_slide606x480_4.jpg" alt="4" /></a></li>
                                <li><a href="./gfx/examples/img_big8.jpg" class="lightbox" data-rel="prettyPhoto[gallery]"><img src="./gfx/examples/content_slide606x480_5.jpg" alt="5" /></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
	        <?php endwhile; ?>
	        <?php else: ?>
	        <?php endif; ?>
            <?php else: ?>
	            <?php echo get_adjacent_post_link( '← %link', '%title' ); ?>
	            <?php echo '|||'.get_adjacent_post_link( '%link →', '%title', 0, '', false );
	            ?>
	            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <h1 class="page_title"><?php the_title(); ?></h1>
                    <div class="columns">
                        <div class="column column33">
                            <h1><?php the_field('case_photo_title'); ?></h1>
                            <p><?php the_field('case_photo_description'); ?></p>
                            <h1>Client:</h1>
                            <p><?php echo get_field('case_client'); ?></p>
                            <h1>Model:</h1>
				            <?php
				            $current_terms = get_the_terms($post->ID, 'model');
				            foreach ( $current_terms as $term ) {
					            ?>
                                <p><a href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a></p>
					            <?php
				            }
				            ?>
                            <h1>Photographer:</h1>
                            <p><?php the_field('case_photographer'); ?></p>
                        </div>
                        <div class="column column66">
                            <div id="content_slide">
                                <div class="flexslider">
                                    <ul class="slides">
                                        <li><a href="./gfx/examples/img_big3.jpg" class="lightbox" data-rel="prettyPhoto[gallery]"><img src="./gfx/examples/content_slide606x480.jpg" alt="1" /></a></li>
                                        <li><a href="./gfx/examples/img_big2.jpg" class="lightbox" data-rel="prettyPhoto[gallery]"><img src="./gfx/examples/content_slide606x480_2.jpg" alt="2" /></a></li>
                                        <li><a href="./gfx/examples/img_big5.jpg" class="lightbox" data-rel="prettyPhoto[gallery]"><img src="./gfx/examples/content_slide606x480_3.jpg" alt="3" /></a></li>
                                        <li><a href="./gfx/examples/img_big6.jpg" class="lightbox" data-rel="prettyPhoto[gallery]"><img src="./gfx/examples/content_slide606x480_4.jpg" alt="4" /></a></li>
                                        <li><a href="./gfx/examples/img_big8.jpg" class="lightbox" data-rel="prettyPhoto[gallery]"><img src="./gfx/examples/content_slide606x480_5.jpg" alt="5" /></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
	            <?php endwhile; ?>
	            <?php else: ?>
	            <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>
    <!-- END CONTENT -->
    </div>
    </div>

<?php
get_footer();

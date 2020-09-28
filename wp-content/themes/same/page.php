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
    <!-- BEGIN CONTENT -->
    <section id="content">
        <div class="wrapper page_text">
            <div class="breadcrumbs">
                <div class="inside">
                    <a href="#" class="first"><span>The Same</span></a>
                    <a href="#" class="last"><span>Blog</span></a>
                </div>
            </div>

            <div class="columns">
                <div class="column column75">
                        <div class="wrapper page_text">
							<?php
							if ( have_posts() ) :
								while ( have_posts() ) :
									the_post();
									?>
                                    <div class="article">
                                        <h1><?php the_title(); ?></h1>
                                        <p><?php the_content(); ?></p>
                                    </div>
								<?php
								endwhile;
							endif
							?>
                        </div>
                </div>
				<?php
				get_sidebar();
				?>
            </div>
        </div>
    </section>
    <!-- END CONTENT -->
    </div>
    </div>
<?php
get_footer();

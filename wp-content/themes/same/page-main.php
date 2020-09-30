<?php
/**
 *
 *Template Name: Template for main page
 *
 *@package same
 *
 */

get_header();
?>
    <!-- BEGIN TOP -->
    <section id="top">
        <div class="wrapper">
            <div id="top_slide" class="flexslider">
                <?php
                $sliders = get_posts( array(
	                'numberposts'      => 5,
	                'meta_key'         => 'show_number',
	                'orderby'          => 'meta_value_num',
	                'order'            => 'ASC',
	                'post_type'        => 'sliders',
	                'location'         => 'header-of-main-page',
	                'post_status'      => 'publish',
	                'suppress_filters' => true,
                 ));
                ?>
                <ul class="slides">
                    <?php
                    foreach( $sliders as $post ){
	                    setup_postdata($post);
                       ?>
	                    <li>
                        <img src="<?php echo get_field('slider_image'); ?>" alt="" />
                        <p class="flex-caption">
                            <strong><?php echo $post->post_title; ?></strong>
                            <span><?php echo get_field( 'des_text' ); ?></span>
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
    <!-- END TOP -->

    <!-- BEGIN CONTENT -->
    <section id="content">
        <div class="wrapper page_text page_home">
	            <?php
	            $introduces = get_posts( array(
		            'numberposts'      => -1,
		            'post_type'        => 'post',
		            'post_status'      => 'publish',
                    'category_name'         => 'company',
	            ));
	            if( $introduces ):
                    foreach( $introduces as $post ){
	                    setup_postdata($post);
                       ?>
            <div class="introduction">
                        <div>
                            <h1><?php the_title() ?></h1>
                            <p><?php the_excerpt(); ?></p>
                            <a class="button button_big button_orange float_left" href="<?php the_permalink(); ?>"><span class="inside"><?php _e('read more', 'same'); ?></span></a>
                        </div>
            </div>
	            <?php
	            }
	            wp_reset_postdata();
	            endif;
	            ?>

            <ul class="columns dropcap">
                <li class="column column33 first">
                    <div class="inside">
                        <h1>Dropcap</h1>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Primis in faucibus lorem. Curabitur ultrices interdum. Integer adipiscing dictum enim.</p>
                        <p class="read_more"><a href="#">Read more</a></p>
                    </div>
                </li>
                <li class="column column33 second">
                    <div class="inside">
                        <h1>Lorem ipsum</h1>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Primis in faucibus lorem. Curabitur ultrices interdum. Integer adipiscing dictum enim.</p>
                        <p class="read_more"><a href="#">Read more</a></p>
                    </div>
                </li>
                <li class="column column33 third">
                    <div class="inside">
                        <h1>Dolor sit!</h1>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Primis in faucibus lorem. Curabitur ultrices interdum. Integer adipiscing dictum enim.</p>
                        <p class="read_more"><a href="#">Read more</a></p>
                    </div>
                </li>
            </ul>

            <ul class="columns iconcap">
                <li class="column column33 inews">
                    <div class="inside">
                        <h1>iCon</h1>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Primis in faucibus lorem. Curabitur ultrices interdum. Integer adipiscing dictum enim.</p>
                        <p class="read_more"><a href="#">Read more</a></p>
                    </div>
                </li>
                <li class="column column33 italk">
                    <div class="inside">
                        <h1>iTalk</h1>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Primis in faucibus lorem. Curabitur ultrices interdum. Integer adipiscing dictum enim.</p>
                        <p class="read_more"><a href="#">Read more</a></p>
                    </div>
                </li>
                <li class="column column33 icon">
                    <div class="inside">
                        <h1>iNews</h1>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Primis in faucibus lorem. Curabitur ultrices interdum. Integer adipiscing dictum enim.</p>
                        <p class="read_more"><a href="#">Read more</a></p>
                    </div>
                </li>
            </ul>

            <div class="underline"></div>

            <div class="portfolio">
                <p class="all_projects"><a href="#">View all projects</a></p>
                <h1>Portfolio</h1>
                <div class="columns">
                    <div class="column column25">
                        <a href="./wp-content/themes/same/assets/img/gfx/examples/img_big8.jpg" class="image lightbox" data-rel="prettyPhoto[gallery]">
								<span class="inside">
									<img src="./wp-content/themes/same/assets/img/gfx/examples/content_image197x140.jpg" alt="" />
									<span class="caption">Rhoncus, dolor id rutrum ut.</span>
								</span>
                            <span class="image_shadow"></span>
                        </a>
                    </div>
                    <div class="column column25">
                        <a href="./wp-content/themes/same/assets/img/gfx/examples/img_big2.jpg" class="image lightbox" data-rel="prettyPhoto[gallery]">
								<span class="inside">
									<img src="./wp-content/themes/same/assets/img/gfx/examples/content_image197x140_2.jpg" alt="" />
									<span class="caption">Rhoncus, dolor id rutrum ut.</span>
								</span>
                            <span class="image_shadow"></span>
                        </a>
                    </div>
                    <div class="column column25">
                        <a href="./wp-content/themes/same/assets/img/gfx/examples/img_big7.jpg" class="image lightbox" data-rel="prettyPhoto[gallery]">
								<span class="inside">
									<img src="./wp-content/themes/same/assets/img/gfx/examples/content_image197x140_3.jpg" alt="" />
									<span class="caption">Rhoncus, dolor id rutrum ut.</span>
								</span>
                            <span class="image_shadow"></span>
                        </a>
                    </div>
                    <div class="column column25">
                        <a href="./wp-content/themes/same/assets/img/gfx/examples/img_big4.jpg" class="image lightbox" data-rel="prettyPhoto[gallery]">
								<span class="inside">
									<img src="./wp-content/themes/same/assets/img/gfx/examples/content_image197x140_4.jpg" alt="" />
									<span class="caption">Rhoncus, dolor id rutrum ut.</span>
								</span>
                            <span class="image_shadow"></span>
                        </a>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- END CONTENT -->
    </div>
    </div>

<?php
get_footer();


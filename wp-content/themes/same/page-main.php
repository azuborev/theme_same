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
	            <?php
	            $services = get_posts( array(
		            'numberposts'      => 3,
		            'meta_key'         => 'number',
		            'orderby'          => 'meta_value_num',
		            'order'            => 'ASC',
		            'post_type'        => 'service',
		            'post_status'      => 'publish',
		            'suppress_filters' => true,
	            ));
	            ?>
                <ul class="columns dropcap">
		            <?php
                    if( $services ):
		            foreach( $services as $post ){
			            setup_postdata($post);
			            ?>
                        <li class="column column33 <?php echo get_field('number'); ?>">
                            <div class="inside">
                                <h1><?php the_title() ?></h1>
                                <p><?php the_excerpt(); ?></p>
                                <p class="read_more"><a href="#"><?php _e('Read more', 'same'); ?></a></p>
                            </div>
                        </li>
			            <?php
		            }
		            wp_reset_postdata();
                    endif;
		            ?>
                </ul>
	        <?php
	        $services = get_posts( array(
		        'numberposts'      => 3,
		        'meta_key'         => 'icons',
		        'orderby'          => 'date',
		        'order'            => 'DESC',
		        'post_type'        => 'service',
		        'post_status'      => 'publish',
		        'suppress_filters' => true,
	        ));
	        ?>
            <ul class="columns iconcap">
		        <?php
		        if( $services ):
		        foreach( $services as $post ){
			        setup_postdata($post);
			        ?>
                    <li class="column column33 <?php echo get_field('icons'); ?>">
                        <div class="inside">
                            <h1><?php the_title() ?></h1>
                            <p><?php the_excerpt(); ?></p>
                            <p class="read_more"><a href="#"><?php _e('Read more', 'same'); ?></a></p>
                        </div>
                    </li>
			        <?php
		        }
		        wp_reset_postdata();
		        endif;
		        ?>
            </ul>










            <div class="underline"></div>
            <div class="portfolio">
                <p class="all_projects"><a href="#">View all projects</a></p>
                <h1>Portfolio</h1>
                <div class="columns">
	                <?php
	                $rand_photo_list = get_posts( array(
                                                    'numberposts'      => 4,
//                                                    'orderby'          => 'rand',
                                                    'post_type'        => 'cases',
                                                    'post_status'      => 'publish',
                                                    'suppress_filters' => true,
                                                    'post_a_photo_on_the_main_page' => true,
	                                            ));
	                ?>
                    <div class="column column25">
		                <?php
		                if( $rand_photo_list ):
                            var_dump($rand_photo_list);
			                foreach( $rand_photo_list as $post ){
				                setup_postdata($post);
				                ?>
                                <a href="<?php echo get_field('main_photo'); ?>" class="image lightbox" data-rel="prettyPhoto[gallery]">
								<span class="inside">
									<img src="<?php echo get_field('portfolio_main_page_img'); ?>" alt="" />
									<span class="caption"><?php echo get_field('photo_caption'); ?></span>
								</span>
                                    <span class="image_shadow"></span>
                                </a>
				                <?php
			                }
			                wp_reset_postdata();
		                endif;
		                ?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </section>
<?php
get_footer();


<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package same
 */

get_header();
?>
    <!-- BEGIN CONTENT -->
    <section id="content">
        <div class="wrapper page_text">
            <h1 class="page_title">Blog</h1>
            <div class="breadcrumbs">
                <div class="inside">
                    <a href="#" class="first"><span>The Same</span></a>
                    <a href="#" class="last"><span>Blog</span></a>
                </div>
            </div>

            <div class="columns">
                <div class="column column75">
                    <article class="article">
                        <div class="article_image nomargin">
                            <div class="inside">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gfx/examples/content_image689x214.jpg" alt="" />
                            </div>
                        </div>
                        <div class="article_details">
                            <ul class="article_author_date">
                                <li><em>Add:</em> 23.02.2012</li>
                                <li><em>Author: </em> <a href="#">Admin</a></li>
                            </ul>
                            <p class="article_comments"><em>Comment:</em> 142</p>
                        </div>

                        <h1>Example blog post</h1>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Elit. Sed malesuada tristique, urna sem rutrum ut, nonummy nunc vel wisi. Phasellus lorem nec leo sodales in, odio. Mauris aliquet lorem. Integer vestibulum ligula. Nunc elementum. Mauris ullamcorper nec, scelerisque rhoncus wisi. Curabitur vel nonummy enim enim arcu sed tortor.Morbi imperdiet augue quis tellus. Lorem ipsum dolor sit amet. Quisque aliquam. Donec faucibus. Suspendisse quam sem, consequat at, commodo vitae, feugiat in, nunc. Morbi imperdiet augue quis tellus.</p>
                        <q>Donec lectus blandit justo, eget elit porttitor egestas. Cras enim vulputate vehicula. Etiam ornare a, aliquet congue sem.</q>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque,
                            id pulvinar odio lorem non turpis. Nullam sit amet enim. Donec sed tellus eget sapien fringilla nonummy. Mauris a ante.
                            Suspendisse quam sem, consequat at, commodo vitae, feugiat in, nunc. Morbi imperdiet augue quis tellus. Lorem ipsum dolor sit amet.</p>

                        <a class="button button_small button_orange float_left"><span class="inside">read more</span></a>
                    </article>

                    <article class="article">
                        <div class="article_image nomargin">
                            <div class="inside">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gfx/examples/content_image689x214_2.jpg" alt="" />
                            </div>
                        </div>
                        <div class="article_details">
                            <ul class="article_author_date">
                                <li><em>Add:</em> 23.02.2012</li>
                                <li><em>Author: </em> <a href="#">Admin</a></li>
                            </ul>
                            <p class="article_comments"><em>Comment:</em> 142</p>
                        </div>

                        <h1>Example blog post</h1>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Elit. Sed malesuada tristique, urna sem rutrum ut, nonummy nunc vel wisi. Phasellus lorem nec leo sodales in, odio. Mauris aliquet lorem. Integer vestibulum ligula. Nunc elementum. Mauris ullamcorper nec, scelerisque rhoncus wisi. Curabitur vel nonummy enim enim arcu sed tortor.Morbi imperdiet augue quis tellus. Lorem ipsum dolor sit amet. Quisque aliquam. Donec faucibus. Suspendisse quam sem, consequat at, commodo vitae, feugiat in, nunc. Morbi imperdiet augue quis tellus.</p>
                        <q>Donec lectus blandit justo, eget elit porttitor egestas. Cras enim vulputate vehicula. Etiam ornare a, aliquet congue sem.</q>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque,
                            id pulvinar odio lorem non turpis. Nullam sit amet enim. Donec sed tellus eget sapien fringilla nonummy. Mauris a ante.
                            Suspendisse quam sem, consequat at, commodo vitae, feugiat in, nunc. Morbi imperdiet augue quis tellus. Lorem ipsum dolor sit amet.</p>

                        <a class="button button_small button_orange float_left"><span class="inside">read more</span></a>
                    </article>
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

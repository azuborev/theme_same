<?php
/**
 * The template for displaying the footer
 *
 * @package same
 */

?>

<div id="page_bottom">
    <!-- BEGIN ABOVE_FOOTER -->
    <section id="above_footer">
        <div class="wrapper above_footer_boxes page_text">
            <div class="box first">
				<?php
				if(is_active_sidebar('same-footer-col-1')) {
					dynamic_sidebar('same-footer-col-1');
				}
				?>
            </div>

            <div class="box second">
                <h3>Recent Posts</h3>
                <ul class="recent_posts">
                    <li class="item">
                        <a class="thumbnail" href="#"><img alt="" src="<?php echo get_template_directory_uri(); ?>/assets/img/gfx/examples/above_footer_recent_posts1.jpg"></a>
                        <div class="text">
                            <h4 class="title"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</a></h4>
                            <p class="data">
                                <span class="date">21/10/2011</span>
                            </p>
                        </div>
                    </li>
                    <li class="item">
                        <a class="thumbnail" href="#"><img alt="" src="<?php echo get_template_directory_uri(); ?>/assets/img/gfx/examples/above_footer_recent_posts2.jpg"></a>
                        <div class="text">
                            <h4 class="title"><a href="#">Cras vitae est lacus vehicula enim ac turpis at tellus.</a></h4>
                            <p class="data">
                                <span class="date">21/10/2011</span>
                            </p>
                        </div>
                    </li>
                    <li class="item">
                        <a class="thumbnail" href="#"><img alt="" src="<?php echo get_template_directory_uri(); ?>/assets/img/gfx/examples/above_footer_recent_posts3.jpg"></a>
                        <div class="text">
                            <h4 class="title"><a href="#">Quisque quis nibh.</a></h4>
                            <p class="data">
                                <span class="date">21/10/2011</span>
                            </p>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="box third">
                <h3>Categories</h3>
                <ul class="menu categories page_text">
                    <li><a href="#">Webdesign (8)</a></li>
                    <li>
                        <a href="#">Branding (12)</a>
                        <ul>
                            <li><a href="#">Photography (45)</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Photomanipulation (5)</a></li>
                    <li><a href="#">3D (1)</a></li>
                    <li><a href="#">Others (7)</a></li>
                </ul>
            </div>

            <div class="box fourth">
                <h3>Contact Us</h3>
                <ul class="list_contact page_text">
					<?php
					if(is_active_sidebar('same-footer-col-4')) {
						dynamic_sidebar('same-footer-col-4');
					}
					?>
                </ul>
            </div>
        </div>
    </section>
    <!-- END ABOVE_FOOTER -->

    <!-- BEGIN FOOTER -->
    <footer id="footer">
        <div class="wrapper">
				<?php
				if(is_active_sidebar('same-footer-after-col')) {
					dynamic_sidebar('same-footer-after-col');
				}
				?>
            <a href="#page" class="up">
                <span class="arrow"></span>
                <span class="text">top</span>
            </a>
        </div>
    </footer>
    <!-- END FOOTER -->
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>

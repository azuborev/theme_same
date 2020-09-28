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
	            <?php
	            if(is_active_sidebar('same-footer-col-2')) {
		            dynamic_sidebar('same-footer-col-2');
	            }
	            ?>
            </div>

            <div class="box third">
	                <?php
	                if(is_active_sidebar('same-footer-col-3')) {
		                dynamic_sidebar('same-footer-col-3');
	                }
	                ?>
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

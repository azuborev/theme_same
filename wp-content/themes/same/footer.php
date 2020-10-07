<?php
/**
 * The template for displaying the footer
 *
 * @package same
 */

?>
</div>
</div>
<div id="page_bottom">
	<section id="above_footer">
		<div class="wrapper above_footer_boxes page_text">
			<div class="box first">
				<?php
				if ( is_active_sidebar( 'same-footer-col-1' ) ) {
					dynamic_sidebar( 'same-footer-col-1' );
				}
				?>
			</div>
			<div class="box second">
				<?php
				if ( is_active_sidebar( 'same-footer-col-2' ) ) {
					dynamic_sidebar( 'same-footer-col-2' );
				}
				?>
			</div>
			<div class="box third">
				<?php
				if ( is_active_sidebar( 'same-footer-col-3' ) ) {
					dynamic_sidebar( 'same-footer-col-3' );
				}
				?>
			</div>
			<div class="box fourth">
				<h3>Contact Us</h3>
				<ul class="list_contact page_text">
					<?php
					if ( is_active_sidebar( 'same-footer-col-4' ) ) {
						dynamic_sidebar( 'same-footer-col-4' );
					}
					?>
				</ul>
			</div>
		</div>
	</section>
	<footer id="footer">
		<div class="wrapper">
			<p class="copyrights">
				<?php
				if ( is_active_sidebar( 'same-footer-after-col' ) ) {
					dynamic_sidebar( 'same-footer-after-col' );
				}
				?>
			</p>
			<a href="#page" class="up">
				<span class="arrow"></span>
				<span class="text">top</span>
			</a>
		</div>
	</footer>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>

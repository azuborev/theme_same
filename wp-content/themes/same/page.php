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
	<section id="content">
		<div class="wrapper page_text">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>
			<div class="article">
				<h2><?php the_title(); ?></h2>
				<p><?php the_content(); ?></p>
			</div>
					<?php
				endwhile;
			endif
			?>
		</div>
	</section>
<?php
get_footer();

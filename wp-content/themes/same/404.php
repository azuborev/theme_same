<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package same
 */

get_header();
?>
	<body id="primary" class="site-main">
		<section id="content">
			<header class="page-header">
				<div class="wrapper page_text">
					<h1 class="page_title"><?php esc_html_e( '404 Oops! That page can&rsquo;t be found.', 'same' ); ?></h1>
					<?php get_template_part( 'breadcrumbs' ); ?>
				</div>
			</header>
		</section>
	</body>
<?php
get_footer();

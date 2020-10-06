<?php
/**
 * The header for our theme
 *
 * @package same
 */

?>
<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php wp_head(); ?>
</head>
<body>

<div id="stylesheet_switcher">
	<a href="#" id="switcher"></a>
	<ul id="stylesheets">
		<li>
			<a href="#" class="sheet" id="light">
				<span class="image"><img src="<?php echo esc_attr( get_template_directory_uri() ) . '/assets/img/gfx/stylesheet_light.jpg'; ?>" alt="" /></span>
				<span class="mask"></span>
				<span class="name">Light version</span>
			</a>
		</li>
		<li>
			<a href="#" class="sheet" id="dark">
				<span class="image"><img src="<?php echo esc_attr( get_template_directory_uri() ) . '/assets/img/gfx/stylesheet_dark.jpg'; ?>" alt="" /></span>
				<span class="mask"></span>
				<span class="name">Dark version</span>
			</a>
		</li>
	</ul>
</div>
<div id="page">
	<div id="page_top">
		<div id="page_top_in">
			<header id="titlebar">
				<div class="wrapper">
					<?php the_custom_logo(); ?>
					<div id="titlebar_right">
						<ul id="social_icons">
							<?php
							if ( is_active_sidebar( 'same-header-icons' ) ) {
								dynamic_sidebar( 'same-header-icons' );
							}
							?>
						</ul>
						<div class="clear"></div>
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-header',
									'container'      => 'nav',
									'menu_id'        => 'top_menu',
									'item_wrap'      => '<ul id="%1$s"><span>%3$s<span></ul>',
									'walker'         => new Header_Menu_Walker(),
								)
							);
							?>
					</div>
					<div class="clear"></div>
				</div>
			</header>

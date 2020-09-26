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
    <meta charset="<?php echo bloginfo('charset') ?>">
    <?php wp_head(); ?>
</head>
<body>

<!-- BEGIN STYLESHEET SWITCHER -->
<div id="stylesheet_switcher">
    <a href="#" id="switcher"></a>
    <ul id="stylesheets">
        <li>
            <a href="#" class="sheet" id="light">
                <span class="image"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/gfx/stylesheet_light.jpg" alt="" /></span>
                <span class="mask"></span>
                <span class="name">Light version</span>
            </a>
        </li>
        <li>
            <a href="#" class="sheet" id="dark">
                <span class="image"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/gfx/stylesheet_dark.jpg" alt="" /></span>
                <span class="mask"></span>
                <span class="name">Dark version</span>
            </a>
        </li>
    </ul>
</div>
<!-- END STYLESHEET SWITCHER -->

<!-- BEGIN PAGE -->
<div id="page">
    <div id="page_top">
        <div id="page_top_in">
            <!-- BEGIN TITLEBAR -->
            <header id="titlebar">
                <div class="wrapper">
<!--                    <a id="logo" href="#"><span></span></a>-->
                    <?php the_custom_logo(); ?>
                    <div id="titlebar_right">
                        <ul id="social_icons">
                            <li><a href="#" class="linkedin"></a></li>
                            <li><a href="#" class="facebook"></a></li>
                            <li><a href="#" class="twitter"></a></li>
                            <li><a href="#" class="rss"></a></li>
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

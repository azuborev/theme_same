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
    <title><?php echo wp_get_document_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body>

<!-- BEGIN STYLESHEET SWITCHER -->
<div id="stylesheet_switcher">
    <a href="#" id="switcher"></a>
    <ul id="stylesheets">
        <li>
            <a href="#" class="sheet" id="light">
                <span class="image"><img src="./wp-content/themes/same/assets/img/gfx/stylesheet_light.jpg" alt="" /></span>
                <span class="mask"></span>
                <span class="name">Light version</span>
            </a>
        </li>
        <li>
            <a href="#" class="sheet" id="dark">
                <span class="image"><img src="./wp-content/themes/same/assets/img/gfx/stylesheet_dark.jpg" alt="" /></span>
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
                    <a id="logo" href="#"><span></span></a>
                    <div id="titlebar_right">
                        <ul id="social_icons">
                            <li><a href="#" class="linkedin"></a></li>
                            <li><a href="#" class="facebook"></a></li>
                            <li><a href="#" class="twitter"></a></li>
                            <li><a href="#" class="rss"></a></li>
                        </ul>
                        <div class="clear"></div>

                        <nav>
                            <ul id="top_menu">
                                <li class="current"><a href="./index.htm.html">Home</a></li>
                                <li><a href="./aboutus.htm.html">About Us</a></li>
                                <li><a href="./blog.htm.html">Blog</a></li>
                                <li>
                                    <a href="#">Other</a>
                                    <div class="submenu">
                                        <ul>
                                            <li><a href="./blog-article.htm.html"><span>Single Blog</span></a></li>
                                            <li><a href="./shortcodes-columns.htm.html"><span>Columns</span></a></li>
                                            <li><a href="./shortcodes-elements.htm.html"><span>Elemantary</span></a></li>
                                            <li><a href="./shortcodes-boxes.htm.html"><span>Boxes</span></a></li>
                                            <li><a href="./shortcodes-typography.htm.html"><span>Typography</span></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="./portfolio-single.htm.html">Portfolio</a>
                                    <div class="submenu">
                                        <ul>
                                            <li><a href="./portfolio.htm.html#all"><span>All categories</span></a></li>
                                            <li><a href="./portfolio.htm.html#photography"><span>Photography</span></a></li>
                                            <li><a href="./portfolio.htm.html#webdesign"><span>Webdesign</span></a></li>
                                            <li><a href="./portfolio.htm.html#branding"><span>Branding</span></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="./gallery.htm.html">Gallery</a></li>
                                <li><a href="./contact.htm.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="clear"></div>
                </div>
            </header>
            <!-- END TITLEBAR -->




<!DOCTYPE HTML>
<html>
<head>

    <title>The Same</title>

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/reset.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/style.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/light.css" title="light" type="text/css" />
    <link rel="alternate stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/dark.css" title="dark" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/flexslider.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/prettyPhoto.css" type="text/css" />

    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/jquery.ui.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/jquery.flexslider.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/jquery.prettyphoto.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/jquery.stylesheettoggle.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/onload.js"></script>

    <!--[if IE]>
    <script type="text/javascript" src="js/html5.js"></script>
    <![endif]-->
    <!--[if lte IE 7]>
    <link rel="stylesheet" type="text/css" href="css/ie7.css" />
    <![endif]-->
    <meta charset="UTF-8"></head>
<body>

<!-- BEGIN STYLESHEET SWITCHER -->
<div id="stylesheet_switcher">
    <a href="#" id="switcher"></a>
    <ul id="stylesheets">
        <li>
            <a href="#" class="sheet" id="light">
                <span class="image"><img src="<?php bloginfo('stylesheet_directory');?>/gfx/stylesheet_light.jpg" alt="" /></span>
                <span class="mask"></span>
                <span class="name">Light version</span>
            </a>
        </li>
        <li>
            <a href="#" class="sheet" id="dark">
                <span class="image"><img src="<?php bloginfo('stylesheet_directory');?>/gfx/stylesheet_dark.jpg" alt="" /></span>
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

            <!-- BEGIN TOP -->
            <section id="top">
                <div class="wrapper">
                    <div id="top_slide" class="flexslider">
                        <ul class="slides">
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory');?>/gfx/examples/top_slide1.jpg" alt="" />
                                <p class="flex-caption">
                                    <strong>Lorem ipsum dolor sit amet</strong>
                                    <span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Velit. Pellentesque molestie quis, venenatis consequat. Morbi egestas, justo neque, fringilla fringilla orci. Suspendisse placerat scelerisque...</span>
                                </p>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory');?>/gfx/examples/top_slide2.jpg" alt="" />
                                <p class="flex-caption">
                                    <strong>Sit amet</strong>
                                    <span>Pellentesque molestie quis, venenatis consequat. Morbi egestas, justo neque.</span>
                                </p>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory');?>/gfx/examples/top_slide3.jpg" alt="" />
                                <p class="flex-caption">
                                    <strong>Dolor amet sit</strong>
                                    <span>Velit, pellentesque molestie quis, venenatis consequat.</span>
                                </p>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory');?>/gfx/examples/top_slide4.jpg" alt="" />
                                <p class="flex-caption">
                                    <strong>Sit amet</strong>
                                    <span>Pellentesque molestie quis, venenatis consequat. Morbi egestas, justo neque.</span>
                                </p>
                            </li>
                            <li>
                                <img src="<?php bloginfo('stylesheet_directory');?>/gfx/examples/top_slide5.jpg" alt="" />
                                <p class="flex-caption">
                                    <strong>Lorem ipsum dolor sit amet</strong>
                                    <span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Velit. Pellentesque molestie quis, venenatis consequat. Morbi egestas, justo neque, fringilla fringilla orci. Suspendisse placerat scelerisque...</span>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- END TOP -->

            <!-- BEGIN CONTENT -->
            <section id="content">
                <div class="wrapper page_text page_home">
                    <div class="introduction">
                        <h1>Lorem ipsum amet <a href="#">libero et</a> est fermentum suscipit sed id nulla. Donec elementum placerat tortort.</h1>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Vehicula. Vivamus urna vitae arcu elit, consequat lorem velit sit amet metus. Phasellus purus. Aenean quis ante. Vestibulum aliquam iaculis leo, pretium wisi. Vivamus posuere vehicula dolor nonummy porttitor auctor, sapien vitae wisi vel odio.</p>
                        <a class="button button_big button_orange float_left"><span class="inside">read more</span></a>
                    </div>

                    <ul class="columns dropcap">
                        <li class="column column33 first">
                            <div class="inside">
                                <h1>Dropcap</h1>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Primis in faucibus lorem. Curabitur ultrices interdum. Integer adipiscing dictum enim.</p>
                                <p class="read_more"><a href="#">Read more</a></p>
                            </div>
                        </li>
                        <li class="column column33 second">
                            <div class="inside">
                                <h1>Lorem ipsum</h1>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Primis in faucibus lorem. Curabitur ultrices interdum. Integer adipiscing dictum enim.</p>
                                <p class="read_more"><a href="#">Read more</a></p>
                            </div>
                        </li>
                        <li class="column column33 third">
                            <div class="inside">
                                <h1>Dolor sit!</h1>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Primis in faucibus lorem. Curabitur ultrices interdum. Integer adipiscing dictum enim.</p>
                                <p class="read_more"><a href="#">Read more</a></p>
                            </div>
                        </li>
                    </ul>

                    <ul class="columns iconcap">
                        <li class="column column33 inews">
                            <div class="inside">
                                <h1>iCon</h1>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Primis in faucibus lorem. Curabitur ultrices interdum. Integer adipiscing dictum enim.</p>
                                <p class="read_more"><a href="#">Read more</a></p>
                            </div>
                        </li>
                        <li class="column column33 italk">
                            <div class="inside">
                                <h1>iTalk</h1>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Primis in faucibus lorem. Curabitur ultrices interdum. Integer adipiscing dictum enim.</p>
                                <p class="read_more"><a href="#">Read more</a></p>
                            </div>
                        </li>
                        <li class="column column33 icon">
                            <div class="inside">
                                <h1>iNews</h1>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Primis in faucibus lorem. Curabitur ultrices interdum. Integer adipiscing dictum enim.</p>
                                <p class="read_more"><a href="#">Read more</a></p>
                            </div>
                        </li>
                    </ul>

                    <div class="underline"></div>

                    <div class="portfolio">
                        <p class="all_projects"><a href="#">View all projects</a></p>
                        <h1>Portfolio</h1>
                        <div class="columns">
                            <div class="column column25">
                                <a href="<?php bloginfo('stylesheet_directory');?>/gfx/examples/img_big8.jpg" class="image lightbox" data-rel="prettyPhoto[gallery]">
								<span class="inside">
									<img src="<?php bloginfo('stylesheet_directory');?>/gfx/examples/content_image197x140.jpg" alt="" />
									<span class="caption">Rhoncus, dolor id rutrum ut.</span>
								</span>
                                    <span class="image_shadow"></span>
                                </a>
                            </div>
                            <div class="column column25">
                                <a href="<?php bloginfo('stylesheet_directory');?>/gfx/examples/img_big2.jpg" class="image lightbox" data-rel="prettyPhoto[gallery]">
								<span class="inside">
									<img src="<?php bloginfo('stylesheet_directory');?>/gfx/examples/content_image197x140_2.jpg" alt="" />
									<span class="caption">Rhoncus, dolor id rutrum ut.</span>
								</span>
                                    <span class="image_shadow"></span>
                                </a>
                            </div>
                            <div class="column column25">
                                <a href="<?php bloginfo('stylesheet_directory');?>/gfx/examples/img_big7.jpg" class="image lightbox" data-rel="prettyPhoto[gallery]">
								<span class="inside">
									<img src="<?php bloginfo('stylesheet_directory');?>/gfx/examples/content_image197x140_3.jpg" alt="" />
									<span class="caption">Rhoncus, dolor id rutrum ut.</span>
								</span>
                                    <span class="image_shadow"></span>
                                </a>
                            </div>
                            <div class="column column25">
                                <a href="<?php bloginfo('stylesheet_directory');?>/gfx/examples/img_big4.jpg" class="image lightbox" data-rel="prettyPhoto[gallery]">
								<span class="inside">
									<img src="<?php bloginfo('stylesheet_directory');?>/gfx/examples/content_image197x140_4.jpg" alt="" />
									<span class="caption">Rhoncus, dolor id rutrum ut.</span>
								</span>
                                    <span class="image_shadow"></span>
                                </a>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END CONTENT -->
        </div>
    </div>

<?php get_footer();
?>
</div>

</body>
</html>
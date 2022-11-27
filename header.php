<?php
	/**
	 * The template for displaying the header.
	 **/

?>
<!DOCTYPE HTML>
<html>
<head>

    <title>The Same</title>

    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/reset.css" type="text/css"/>
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/style.css" type="text/css"/>
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/light.css" title="light"
          type="text/css"/>
    <link rel="alternate stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/dark.css" title="dark"
          type="text/css"/>
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/flexslider.css" type="text/css"/>
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/prettyPhoto.css" type="text/css"/>

    <script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery.ui.min.js"></script>
    <script type="text/javascript"
            src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery.flexslider.min.js"></script>
    <script type="text/javascript"
            src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery.prettyphoto.min.js"></script>
    <script type="text/javascript"
            src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery.stylesheettoggle.js"></script>
    <script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery.quicksand.js"></script>
    <script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/onload.js"></script>
    <!--[if IE]>
    <script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/html5.js"></script>
    <![endif]-->
    <!--[if lte IE 7]>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/ie7.css"/>
    <![endif]-->
    <meta charset="UTF-8">

	<?php wp_head(); ?>

</head>

<body>

<?php wp_body_open(); ?>

<!-- BEGIN STYLESHEET SWITCHER -->
<div id="stylesheet_switcher">
    <a href="#" id="switcher"></a>
    <ul id="stylesheets">
        <li>
            <a href="#" class="sheet" id="light">
                <span class="image"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/gfx/stylesheet_light.jpg"
                                         alt=""/></span>
                <span class="mask"></span>
                <span class="name"><?php esc_html_e( 'Light version' ); ?></span>
            </a>
        </li>
        <li>
            <a href="#" class="sheet" id="dark">
                <span class="image"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/gfx/stylesheet_dark.jpg"
                                         alt=""/></span>
                <span class="mask"></span>
                <span class="name"><?php esc_html_e( 'Dark version' ); ?></span>
            </a>
        </li>
    </ul>
</div>

<!-- END STYLESHEET SWITCHER -->

<!-- BEGIN PAGE -->
<div id="page">
    <div id="page_top">
        <div id="page_top_in">
            <header id="titlebar">
                <div class="wrapper">
                    <a id="logo" href="<?php bloginfo( 'url' ); ?>"><span></span></a>
                    <div id="titlebar_right">
                        <ul id="social_icons">
                            <li><a href="#" class="linkedin"></a></li>
                            <li><a href="#" class="facebook"></a></li>
                            <li><a href="#" class="twitter"></a></li>
                            <li><a href="#" class="rss"></a></li>
                        </ul>
                        <div class="clear"></div>
                        <nav>
							<?php
								$menu_args = array(
									'theme_location' => 'header-menu',
									'menu'           => 'mainmenu',
									'menu_id'        => 'top_menu',
									'items_wrap'     => '<ul id="%1$s">%3$s</ul>',
									'item_spacing'   => 'preserve',
									'walker'         => new MenuWalker(),
								);
								wp_nav_menu( $menu_args );
							?>
                        </nav>
                    </div>
                    <div class="clear"></div>
                </div>
            </header>

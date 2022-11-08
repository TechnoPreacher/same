<?php
/**
 * The template for displaying the header.
 **/
?>
<!DOCTYPE HTML>
<html>
<head>

    <title>++The Same</title>

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
    <script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/onload.js"></script>

    <!--[if IE]>
    <script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/html5.js"></script>
    <![endif]-->
    <!--[if lte IE 7]>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/ie7.css"/>
    <![endif]-->
    <meta charset="UTF-8">

	<?php wp_head() ?>

</head>

<body>

<?php wp_body_open(); ?>

<!-- BEGIN STYLESHEET SWITCHER -->
<div id="stylesheet_switcher">
    <a href="#" id="switcher"></a>
    <ul id="stylesheets">
        <li>
            <a href="#" class="sheet" id="light">
                <span class="image"><img src="./gfx/stylesheet_light.jpg" alt=""/></span>
                <span class="mask"></span>
                <span class="name">Light version</span>
            </a>
        </li>
        <li>
            <a href="#" class="sheet" id="dark">
                <span class="image"><img src="./gfx/stylesheet_dark.jpg" alt=""/></span>
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


								<?php
								$menu_data = wp_get_nav_menu_items( 'mainmenu' );//bloginfo('url'); echo

								$home   = array_shift( $menu_data );//убил первый элемент - в нём домащняя страница была
								$childs = $menu_data;
								?>

                                <li class="current"><a href="<?= $home->url ?>"><?= $home->title ?>  </a></li>

								<?php foreach ( $menu_data as $menu_item ) {

									if ( $menu_item->menu_item_parent == 0 && $menu_item->post_parent == 0 )//отбор только не имющих детей и не являющихся детьми - а значит корневых пунктов меню
									{
										?>

                                        <li>
                                        <a href="<?= $menu_item->url ?>">##<?= $menu_item->menu_item_parent ?><?= $menu_item->title ?></a>

										<?php
									}

									//дети

									$menu_сhildren = [];
									foreach ( $childs as $v ) {
										if ( $v->menu_item_parent == $menu_item->ID ) {
											array_push( $menu_сhildren, $v );
										}

									}

									//если дети есть - тащу на фронт

									if ( count( $menu_сhildren ) > 0 ) { ?>

                                        <div class="submenu">
                                            <ul>
												<?php

												foreach ( $menu_сhildren as $menu_child_item ) {

													?>

                                                    <li>
                                                        <a href="<?=$menu_child_item->url ?>"><span>**<?= $menu_child_item->title ?></span></a>
                                                    </li>


													<?php
												}


												?>


                                            </ul>
                                        </div>
										<?php

									}
									//закрыл пункт меню в любом случае!
									?>

                                    </li>

									<?php


								} ?>


                            </ul>
                        </nav>


                    </div>
                    <div class="clear"></div>
                </div>
            </header>



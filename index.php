<!-- BEGIN TITLEBAR -->
<?php get_header(); ?>
<!-- END TITLEBAR -->

<!-- BEGIN TOP -->
<section id="top">
    <div class="wrapper">
        <div id="top_slide" class="flexslider">
            <ul class="slides">


	            <?php do_action( 'slider'); ?>


                <li>
                    <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/gfx/examples/top_slide2.jpg"
                         alt=""/>
                    <p class="flex-caption">
                        <strong>Sit amet</strong>
                        <span>Pellentesque molestie quis, venenatis consequat. Morbi egestas, justo neque.</span>
                    </p>
                </li>
                <li>
                    <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/gfx/examples/top_slide3.jpg"
                         alt=""/>
                    <p class="flex-caption">
                        <strong>Dolor amet sit</strong>
                        <span>Velit, pellentesque molestie quis, venenatis consequat.</span>
                    </p>
                </li>
                <li>
                    <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/gfx/examples/top_slide4.jpg"
                         alt=""/>
                    <p class="flex-caption">
                        <strong>Sit amet</strong>
                        <span>Pellentesque molestie quis, venenatis consequat. Morbi egestas, justo neque.</span>
                    </p>
                </li>
                <li>
                    <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/gfx/examples/top_slide5.jpg"
                         alt=""/>
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

	        <?php do_action( 'mainlabel'); ?>

	        <?php do_action( 'maintext'); ?>

            <a class="button button_big button_orange float_left"><span class="inside">read more</span></a>
        </div>

        <ul class="columns dropcap">

            <li class="column column33 first">
                <div class="inside">

                    <h1>
						<?php do_action( 'featurelabel', [ 1 ] ); ?>
                    </h1>

                    <p>
						<?php do_action( 'featuretext', [ 1 ] ); ?>
                    </p>

                    <p class="read_more"><a href="#">Read more</a></p>

                </div>
            </li>

            <li class="column column33 second">
                <div class="inside">
                    <h1>
		                <?php do_action( 'featurelabel', [ 2 ] ); ?>
                    </h1>

                    <p>
		                <?php do_action( 'featuretext', [ 2 ] ); ?>
                    </p>

                    <p class="read_more"><a href="#">Read more</a></p>
                </div>
            </li>
            <li class="column column33 third">
                <div class="inside">
                    <h1>
		                <?php do_action( 'featurelabel', [ 3 ] ); ?>
                    </h1>

                    <p>
		                <?php do_action( 'featuretext', [ 3 ] ); ?>
                    </p>
                    <p class="read_more"><a href="#">Read more</a></p>
                </div>
            </li>
        </ul>

        <ul class="columns iconcap">
            <li class="column column33 inews">
                <div class="inside">
                    <!--тут наверное косяк с классом! класс - inews а название - iCon -->

                    <h1>
		                <?php do_action( 'iconlabel', [ 1 ] ); ?>
                    </h1>

                    <p>
		                <?php do_action( 'icontext', [ 1 ] ); ?>
                    </p>

                    <p class="read_more"><a href="#">Read more</a></p>
                </div>
            </li>
            <li class="column column33 italk">
                <div class="inside">

                    <h1>
		                <?php do_action( 'iconlabel', [ 2 ] ); ?>
                    </h1>

                    <p>
		                <?php do_action( 'icontext', [ 2 ] ); ?>
                    </p>

                    <p class="read_more"><a href="#">Read more</a></p>
                </div>
            </li>
            <li class="column column33 icon">
                <div class="inside">
                    <!--тут наверное косяк с классом! класс - icon а название - iNews -->
                    <h1>
		                <?php do_action( 'iconlabel', [ 3 ] ); ?>
                    </h1>

                    <p>
		                <?php do_action( 'icontext', [ 3 ] ); ?>
                    </p>

                    <p class="read_more"><a href="#">Read more</a></p>
                </div>
            </li>
        </ul>

        <div class="underline"></div>

        <div class="portfolio">
            <p class="all_projects"><a href="   <?php do_action( 'pagelink', PORTFOLIO_PAGE_ID); ?>">View all projects</a></p>
            <h1>Portfolio</h1>

            <div class="columns">

	            <?php
                do_action( 'last_projects_on_page', [ 4 ] );
                ?>

                <div class="clear"></div>
            </div>

        </div>
    </div>
</section>
<!-- END CONTENT -->
</div>
</div>

<?php get_footer(); ?>

<!-- BEGIN ABOVE_FOOTER -->
<!-- END ABOVE_FOOTER -->
<!-- BEGIN FOOTER -->
<!-- END FOOTER -->

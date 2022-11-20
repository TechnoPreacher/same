<?php get_header(); ?>

<section id="top">
    <div class="wrapper">
        <div id="top_slide" class="flexslider">
            <ul class="slides">
	            <?php do_action( 'slider'); ?>
            </ul>
        </div>
    </div>
</section>

<section id="content">
    <div class="wrapper page_text page_home">
        <div class="introduction">

	        <?php 	the_field( 'main_label',  get_theme_mod( 'main_page_id' ) ); ?>

	        <?php 	the_field( 'main_text',  get_theme_mod( 'main_page_id' ) ); ?>

            <a class="button button_big button_orange float_left"><span class="inside"><?php _e("read more"); ?></span></a>
        </div>

        <ul class="columns dropcap">

            <li class="column column33 first">
                <div class="inside">

                    <h1>
						<?php the_field( "feature_label_1",  get_theme_mod( 'main_page_id' ) ); ?>
                    </h1>

                    <p>
						<?php the_field( "feature_text_1",  get_theme_mod( 'main_page_id' ) ); ?>
                    </p>

                    <p class="read_more"><a href="#"><?php _e("Read more"); ?></a></p>

                </div>
            </li>

            <li class="column column33 second">
                <div class="inside">
                    <h1>
		                <?php the_field( "feature_label_2",  get_theme_mod( 'main_page_id' ) ); ?>
                    </h1>

                    <p>
		                <?php the_field( "feature_text_2",  get_theme_mod( 'main_page_id' ) ); ?>
                    </p>

                    <p class="read_more"><a href="#"><?php _e("Read more"); ?></a></p>
                </div>
            </li>

            <li class="column column33 third">
                <div class="inside">
                    <h1>
		                <?php the_field( "feature_label_3",  get_theme_mod( 'main_page_id' ) ); ?>
                    </h1>

                    <p>
		                <?php the_field( "feature_text_3",  get_theme_mod( 'main_page_id' ) ); ?>
                    </p>
                    <p class="read_more"><a href="#"><?php _e("Read more"); ?></a></p>
                </div>
            </li>
        </ul>

        <ul class="columns iconcap">
            <li class="column column33 inews">
                <div class="inside">
                    <h1>
		                <?php the_field( "icon_label_1",  get_theme_mod( 'main_page_id' ) ) ?>
                    </h1>

                    <p>
		                <?php the_field( "icon_text_1",  get_theme_mod( 'main_page_id' ) ); ?>
                    </p>

                    <p class="read_more"><a href="#"><?php _e("Read more"); ?></a></p>
                </div>
            </li>

            <li class="column column33 italk">
                <div class="inside">

                    <h1>
		                <?php the_field( "icon_label_2",  get_theme_mod( 'main_page_id' ) ) ?>
                    </h1>

                    <p>
		                <?php the_field( "icon_text_2",  get_theme_mod( 'main_page_id' ) )  ?>
                    </p>

                    <p class="read_more"><a href="#"><?php _e("Read more"); ?></a></p>
                </div>
            </li>

            <li class="column column33 icon">
                <div class="inside">

                    <h1>
		                <?php the_field( "icon_label_3",  get_theme_mod( 'main_page_id' ) ) ?>
                    </h1>

                    <p>
		                <?php the_field( "icon_text_3",  get_theme_mod( 'main_page_id' ) );  ?>
                    </p>

                    <p class="read_more"><a href="#"><?php _e("Read more"); ?></a></p>
                </div>
            </li>
        </ul>

        <div class="underline"></div>

        <div class="portfolio">
            <p class="all_projects"><a href="   <?php the_permalink( get_theme_mod( 'portfolio_page_id') ) ?>"><?php _e("View all projects"); ?></a></p>
            <h1><?php _e("Portfolio"); ?></h1>

            <div class="columns">

	            <?php
                do_action( 'last_projects_on_page', [ 4 ] );
                ?>

                <div class="clear"></div>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>


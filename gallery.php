<?php
/*
Template Name: same_gallery
*/
?>

<!-- BEGIN TITLEBAR -->
			<?php get_header(); ?>
            <!-- END TITLEBAR -->

            <!-- BEGIN CONTENT -->
            <section id="content">
                <div class="wrapper page_text">

                    <h1 class="page_title">Gallery</h1>
                    <div class="breadcrumbs">
                        <div class="inside">
                            <a href="<?=home_url()?>" class="first"><span>+The Same</span></a>
                            <a href="<?=get_permalink( get_the_ID() )?>" class="last"><span>+Gallery</span></a>
                        </div>
                    </div>

                    <div class="page_gallery">
                        <div class="columns">
                            <div class="column column50">
                                <div class="image">
                                    <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/gfx/examples/content_image446x294.jpg" alt=""/>
                                    <p class="caption">
                                        <strong>Photo Title</strong>
                                        <span>Fusce convallis accumsan, urna eget orci lorem eget augue sed erat. Aenean ut venenatis augue nec pede.</span>
                                        <a href="<?php bloginfo( 'stylesheet_directory' ); ?>/fx/examples/img_big2.jpg" data-rel="prettyPhoto[gallery]"
                                           class="button button_small button_orange float_right lightbox"><span
                                                    class="inside">zoom</span></a>
                                    </p>
                                </div>
                            </div>
                            <div class="column column50">
                                <div class="image">
                                    <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/gfx/examples/content_image446x294_2.jpg" alt=""/>
                                    <p class="caption">
                                        <strong>Photo Title</strong>
                                        <span>Fusce convallis accumsan, urna eget orci lorem eget augue sed erat. Aenean ut venenatis augue nec pede.</span>
                                        <a href="<?php bloginfo( 'stylesheet_directory' ); ?>/gfx/examples/img_big1.jpg" data-rel="prettyPhoto[gallery]"
                                           class="button button_small button_orange float_right lightbox"><span
                                                    class="inside">zoom</span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column column50">
                                <div class="image">
                                    <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/gfx/examples/content_image446x294_3.jpg" alt=""/>
                                    <p class="caption">
                                        <strong>Photo Title</strong>
                                        <span>Fusce convallis accumsan, urna eget orci lorem eget augue sed erat. Aenean ut venenatis augue nec pede.</span>
                                        <a href="<?php bloginfo( 'stylesheet_directory' ); ?>/gfx/examples/img_big8.jpg" data-rel="prettyPhoto[gallery]"
                                           class="button button_small button_orange float_right lightbox"><span
                                                    class="inside">zoom</span></a>
                                    </p>
                                </div>
                            </div>
                            <div class="column column50">
                                <div class="image">
                                    <img src="./gfx/examples/content_image446x294_4.jpg" alt=""/>
                                    <p class="caption">
                                        <strong>Photo Title</strong>
                                        <span>Fusce convallis accumsan, urna eget orci lorem eget augue sed erat. Aenean ut venenatis augue nec pede.</span>
                                        <a href="./gfx/examples/img_big9.jpg" data-rel="prettyPhoto[gallery]"
                                           class="button button_small button_orange float_right lightbox"><span
                                                    class="inside">zoom</span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="pagenav">
                        <li class="arrow arrow_left"><a href="#"><span></span></a></li>
                        <li class="active"><a href="#"><span>1</span></a></li>
                        <li><a href="#"><span>2</span></a></li>
                        <li><a href="#"><span>3</span></a></li>
                        <li><a href="#"><span>4</span></a></li>
                        <li class="arrow arrow_right"><a href="#"><span></span></a></li>
                    </ul>
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

</div>

</body>
</html>
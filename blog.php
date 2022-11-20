<?php
/*
Template Name: same_blog
*/

?>

<?php get_header(); ?>
    <!-- BEGIN TITLEBAR -->

    <!-- END TITLEBAR -->

    <!-- BEGIN CONTENT -->
    <section id="content">

        <div class="wrapper page_text">
            <h1 class="page_title"><?php _e("Blog"); ?></h1>
            <div class="breadcrumbs">
                <div class="inside">
                    <a href="<?= home_url() ?>
								 " class="first"><span>The Same</span></a>
                    <a href="<?= get_permalink( get_the_ID() ) ?>
								 " class="last"><span><?php _e("Blog"); ?></span></a>
                </div>
            </div>

            <div class="columns">

                <div class="column column75">
					<?php //two last posts with styling
					do_action( 'postforpage', [ 2 ] );
					?>
                </div>

                <div class="column column25">
                    <div class="padd16bot">
                        <h1><?php _e("Search"); ?></h1>
                        <form class="searchbar">
                            <fieldset>
                                <div>
                                    <span class="input_text"><input type="text" class="clearinput"
                                                                    value="<?php _e("Search..."); ?>"/></span>
                                    <button type="button" class="input_submit"><span><?php _e("Search"); ?></span></button>
                                </div>
                            </fieldset>
                        </form>
                    </div>

                    <div class="padd16bot">
                        <h1><?php _e("Recent Posts"); ?></h1>
						<?php
						do_action( 'posts', [ 3 ] );
						?>
                    </div>

                    <div class="padd16bot">
                        <h1><?php _e("About Us"); ?></h1>
						<?php the_field( 'aboutus', get_theme_mod( 'main_page_id') ); ?>
                    </div>

                    <div class="padd16bot">
                        <h1><?php _e("Categories"); ?></h1>
                        <ul class="menu categories page_text">
							<?php
							do_action( 'projects_in_footer_all_in_li_tag' );
							?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END CONTENT -->
    </div>
    </div>

<?php get_footer(); ?>
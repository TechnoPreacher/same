<?php
/*
Template Name: same_project
*/
?>

<?php get_header(); ?>


    <!-- BEGIN CONTENT -->
    <section id="content">
        <div class="wrapper page_text">
            <h1 class="page_title"><?= get_the_title() ?></h1>
            <div class="breadcrumbs">
                <div class="inside">
                    <a href="#" class="first"><span>The Same</span></a>
                    <a href="<?php $link = get_permalink( PORTFOLIO_PAGE_ID );
					echo $link; ?>"><span>Portfolio</span></a>
                    <a href="<?= get_permalink() ?>" class="last"><span><?= get_the_title() ?></span></a>
                </div>
            </div>


            <div class="columns">
                <div class="column column33">
                    <h1><?= the_field( 'same_project_title') ?> </h1>
                    <p><?= the_field( 'project_about_text' ) ?></p>
                    <h1>Client:</h1>
                    <p><?= the_field( 'project_company') ?></p>
                    <h1>Model & Photographer:</h1>
                    <p><a href="#"><?= the_field( 'project_model') ?></a> // Jo-Who Shan</p>
                </div>

                <div class="column column66">
                    <div id="content_slide">
                        <div class="flexslider">
                            <ul class="slides">
                                <li><a href="<?= get_field( 'same_project_image' ) ?>" class="lightbox"
                                       data-rel="prettyPhoto[gallery]"><img
                                                src="<?= get_field( 'same_project_image') ?>"
                                                alt="1"/></a></li>

                                <!-- there is a loop for custom field 'Gallery', but it enable only in PRO version of ACF-->

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END CONTENT -->
<?php get_footer(); ?>
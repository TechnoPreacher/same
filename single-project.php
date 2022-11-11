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
                    <a href="<?php $link = do_action( 'getportfoliolink' );
					echo $link; ?>"><span>Portfolio</span></a>
                    <a href="<?= get_permalink() ?>" class="last"><span><?= get_the_title() ?></span></a>
                </div>
            </div>


            <div class="columns">
                <div class="column column33">
                    <h1><?= the_field( 'same_project_title', get_the_ID() ) ?> </h1>
                    <p><?= the_field( 'project_about_text', get_the_ID() ) ?></p>
                    <h1>Client:</h1>
                    <p><?= the_field( 'project_company', get_the_ID() ) ?></p>
                    <h1>Model & Photographer:</h1>
                    <p><a href="#"><?= the_field( 'project_model', get_the_ID() ) ?></a> // Jo-Who Shan</p>
                </div>

                <div class="column column66">
                    <div id="content_slide">
                        <div class="flexslider">
                            <ul class="slides">
                                <li><a href="<?= get_field( 'same_project_image', get_the_ID() ) ?>" class="lightbox"
                                       data-rel="prettyPhoto[gallery]"><img
                                                src="<?= get_field( 'same_project_image', get_the_ID() ) ?>"
                                                alt="1"/></a></li>

                                <!-- тут нужен цикл по кастомному полю - галерея,но оно доступно только в про-версии форм-->

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END CONTENT -->
<?php get_footer(); ?>
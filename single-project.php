<?php
/*
Template Name: same_project
*/
?>

<?php get_header(); ?>

    <h1>SINGLE-PROJECT <?= get_the_ID() ?>    </h1>



    <!-- BEGIN CONTENT -->
    <section id="content">
        <div class="wrapper page_text">
            <h1 class="page_title"><?=get_the_title()?></h1>
            <div class="breadcrumbs">
                <div class="inside">
                    <a href="#" class="first"><span>The Same</span></a>
                    <a href="<?php $link = do_action('getportfoliolink'); echo $link; ?>"><span>Portfolio</span></a>
                    <a href="<?=get_permalink()?>" class="last"><span><?=get_the_title()?></span></a>
                </div>
            </div>

            <div class="columns">
                <div class="column column33">
                    <h1>	<?=the_field( 'project_title', get_the_ID());?></h1>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Egestas, justo nec scelerisque urna
                        quis turpis et netus et odio. In mollis, orci id leo lobortis cursus ante. Vivamus vel eros quis
                        enim. Phasellus fermentum eget, pede. Etiam at eros. Sed ornare laoreet. Morbi et turpis. Duis
                        vulputate tortor eget luctus et dui. Morbi id eros.</p>
                    <h1>Client:</h1>
                    <p>BigCompany S.A.</p>
                    <h1>Model & Photographer:</h1>
                    <p><a href="#">Jessica Parker</a> // Jo-Who Shan</p>
                </div>

                <div class="column column66">
                    <div id="content_slide">
                        <div class="flexslider">
                            <ul class="slides">
                                <li><a href="./gfx/examples/img_big3.jpg" class="lightbox"
                                       data-rel="prettyPhoto[gallery]"><img
                                                src="./gfx/examples/content_slide606x480.jpg" alt="1"/></a></li>
                                <li><a href="./gfx/examples/img_big2.jpg" class="lightbox"
                                       data-rel="prettyPhoto[gallery]"><img
                                                src="./gfx/examples/content_slide606x480_2.jpg" alt="2"/></a></li>
                                <li><a href="./gfx/examples/img_big5.jpg" class="lightbox"
                                       data-rel="prettyPhoto[gallery]"><img
                                                src="./gfx/examples/content_slide606x480_3.jpg" alt="3"/></a></li>
                                <li><a href="./gfx/examples/img_big6.jpg" class="lightbox"
                                       data-rel="prettyPhoto[gallery]"><img
                                                src="./gfx/examples/content_slide606x480_4.jpg" alt="4"/></a></li>
                                <li><a href="./gfx/examples/img_big8.jpg" class="lightbox"
                                       data-rel="prettyPhoto[gallery]"><img
                                                src="./gfx/examples/content_slide606x480_5.jpg" alt="5"/></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END CONTENT -->
<?php get_footer(); ?>
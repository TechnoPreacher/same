<?php
/*
Template Name: same_blog_post
*/

?>


<?php get_header(); ?>


    <section id="content">

        <div class="wrapper page_text">
            <div class="breadcrumbs">
                <div class="inside">
                    <a href="<?= home_url() ?>" class="first"><span>The Same</span></a>
                    <a href="<?= do_action( 'getbloglink' ); ?>" class="last"><span>Blog</span></a>
                    <a href="<?= get_permalink( get_the_ID() ) ?>" class="last"><span><?= the_title() ?></span></a>

                </div>
            </div>

            <div class="introduction">
                <h1 class="page_title"><?= the_title() ?></h1>
				<?php //тут надо вытащить текущий пост
				do_action( 'singlepost', get_the_ID() );
				?>
            </div>
        </div>
    </section>
    <!-- END CONTENT -->
    </div>
    </div>

<?php get_footer(); ?>
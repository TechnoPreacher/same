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
                    <a href="<?php the_permalink(    get_theme_mod( 'blog_page_id') ) ?>" class="last"><span><?php _e("Blog"); ?></span></a>
                    <a href="<?php the_permalink( get_the_ID() ) ?>" class="last"><span><?php the_title() ?></span></a>

                </div>
            </div>

            <div class="introduction">
                <h1 class="page_title"><?= the_title() ?></h1>
                <article class="article">
                    <div class="article_image nomargin">
                        <div class="inside">
                            <img src="<?= get_image_url() ?>" alt=""/>
                        </div>
                    </div>

                    <div class="article_details">
                        <ul class="article_author_date">
                            <li><em><?php _e("Add"); ?>: </em> <?= get_the_date() ?> </li>
                            <li><em><?php _e("Author"); ?>: </em>
                                <a href="<?php the_author_meta( 'url', get_current_user_id() ) ?>">
									<?php the_author_meta( 'nickname', get_current_user_id() ) ?>
                                </a>
                            </li>
                        </ul>
                        <p class="article_comments"><em><?php _e("Comment"); ?>: </em><?= get_comments_number() ?>
                        </p>
                    </div>

                    <p> <?= get_paragraph( 1 ); ?> </p>

					<?= get_citate(); ?>

                    <p> <?= get_paragraph( 2 ); ?> </p>

                </article>

            </div>
        </div>
    </section>
    <!-- END CONTENT -->
    </div>
    </div>

<?php get_footer(); ?>
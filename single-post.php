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
                    <a href="<?php echo( esc_url( home_url() ) ); ?>" class="first"><span>The Same</span></a>
                    <a href="<?php the_permalink( get_theme_mod( 'blog_page_id' ) ); ?>"
                        class="last"><span><?php esc_html_e( 'Blog' ); ?></span></a>
                    <a href="<?php the_permalink( get_the_ID() ); ?>" class="last"><span><?php the_title(); ?></span></a>

                </div>
            </div>

            <div class="introduction">
                <h1 class="page_title"><?php echo( esc_textarea( the_title() ) ); ?></h1>

              <?php
                  get_template_part( 'post', 'blog' );
              ?>

            </div>
        </div>
    </section>

<?php get_footer(); ?>

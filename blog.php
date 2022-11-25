<?php
	/*
	Template Name: same_blog
	*/
?>

<?php get_header(); ?>

<section id="content">

    <div class="wrapper page_text">
        <h1 class="page_title"><?php esc_html_e( 'Blog' ); ?></h1>
        <div class="breadcrumbs">
            <div class="inside">
                <a href="<?php echo esc_url( home_url() ); ?>" class="first"><span>The Same</span></a>
                <a href="
				<?php
					echo esc_url( get_permalink( get_the_ID() ) );
				?>
				" class="last"><span><?php esc_html_e( 'Blog' ); ?></span></a>
            </div>
        </div>

        <div class="columns">

            <div class="column column75">
				<?php

					$args = array(
						'post_type'      => 'post',
						'posts_per_page' => 2, // two last posts with styling.
					);

					$loop = new WP_Query( $args );

					while ( $loop->have_posts() ) {
						$loop->the_post();

						$args = array(
							'button' => 1,
						);

						get_template_part( 'post', 'blog', $args );// put it to front.
					}

					wp_reset_postdata();

				?>

            </div>

            <div class="column column25">
                <div class="padd16bot">
                    <h1><?php esc_html_e( 'Search' ); ?></h1>
                    <form class="searchbar">
                        <fieldset>
                            <div>
									<span class="input_text"><input type="text" class="clearinput"
                                                                    value="<?php esc_attr_e( 'Search...' ); ?>"/></span>
                                <button type="button" class="input_submit"><span><?php esc_html_e( 'Search' ); ?></span>
                                </button>
                            </div>
                        </fieldset>
                    </form>
                </div>

                <div class="padd16bot">
                    <h1><?php esc_html_e( 'Recent Posts blog.php' ); ?></h1>
					<?php get_template_part( 'posts', 'footer' ); ?>
                </div>

                <div class="padd16bot">
                    <h1><?php esc_html_e( 'About Us' ); ?></h1>
					<?php the_field( 'aboutus', get_theme_mod( 'main_page_id' ) ); ?>
                </div>

                <div class="padd16bot">
                    <h1><?php esc_html_e( 'Categories' ); ?></h1>
                    <ul class="menu categories page_text">
						<?php do_action( 'projects_in_footer_all_in_li_tag' ); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</section>

<?php get_footer(); ?>


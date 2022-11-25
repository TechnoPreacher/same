<?php
	/*
	Template Name: same_project
	*/
?>

<?php get_header(); ?>

<section id="content">
    <div class="wrapper page_text">
        <h1 class="page_title"><?php echo( esc_textarea( get_the_title() ) ); ?></h1>
        <div class="breadcrumbs">
            <div class="inside">
                <a href="#" class="first"><span>The Same</span></a>
                <a href="
                <?php
                    $link_ = get_permalink( get_theme_mod( 'portfolio_page_id' ) );
					echo esc_url( $link_ );
                ?>
                "><span><?php esc_html_e( 'Portfolio' ); ?></span></a>
                <a href="<?php echo( esc_url( get_permalink() ) ); ?>" class="last"><span><?php echo( esc_textarea( get_the_title() ) ); ?></span></a>
            </div>
        </div>

        <div class="columns">
            <div class="column column33">
                <h1><?php the_field( 'same_project_title' ); ?> </h1>
                <p><?php the_field( 'project_about_text' ); ?></p>
                <h1><?php esc_html_e( 'Client' ); ?>:</h1>
                <p><?php the_field( 'project_company' ); ?></p>
                <h1><?php esc_html_e( 'Model & Photographer' ); ?>:</h1>
                <p><a href="#"><?php the_field( 'project_model' ); ?></a> // Jo-Who Shan</p>
            </div>

            <div class="column column66">
                <div id="content_slide">
                    <div class="flexslider">
                        <ul class="slides">
                            <li><a href="<?php echo( esc_textarea( get_field( 'same_project_image' ) ) ); ?>" class="lightbox"
                                   data-rel="prettyPhoto[gallery]"><img
                                            src="<?php echo( esc_textarea( get_field( 'same_project_image' ) ) ); ?>"
                                            alt="1"/></a></li>

                            <!-- there is a loop for custom field 'Gallery', but it enable only in PRO version of ACF-->

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

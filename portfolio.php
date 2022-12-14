<?php
/*
Template Name: same_portfolio
*/
?>

<?php
get_header();
global $tax_from_tax;
?>

<!-- BEGIN CONTENT -->
<section id="content">
    <div class="wrapper page_text">
        <h1 class="page_title">Portfolio</h1>
        <div class="breadcrumbs">
            <div class="inside">
                <a href="<?php echo esc_url( home_url() ); ?>" class="first"><span>The Same</span></a>
                <a href="<?php echo esc_url( get_the_permalink( get_theme_mod( 'portfolio_page_id' ) ) ); ?>"
                   class="last"><span>Portfolio</span></a>
				<?php
				if ( ! empty( $tax_from_tax ) ) {
					?>
                    <a class="last"><span><?php echo esc_textarea( $tax_from_tax ); ?></span></a>

					<?php
				}
				?>
            </div>
        </div>

		<?php if ( empty( $tax_from_tax ) ) { ?>
            <ul id="portfolio_categories" class="portfolio_categories">
                <li class="active segment-0"><a href="#" class="all">All Categories</a></li>

				<?php
				$terms = get_terms(
					array(
						'taxonomy'   => 'project_cat',
						'hide_empty' => false,
					)
				);

				$list_of_project_cat = '<ul class="menu categories page_text">';
				$num                 = 0;

				foreach ( $terms as $v ) { // loop parent's tax.
					$num ++;
					?>
                    <li class="
                    <?php
                    if ( $tax_from_tax == $v->slug ) {
						echo 'active';
					}
                    ?>
                    segment-<?php echo esc_attr( $num ); ?>"><a href="#" class="<?php echo esc_attr( $v->slug ); ?>">
                            <?php echo esc_attr( $v->name ); ?></a></li>
					<?php
				}

				?>

            </ul>

		<?php } ?>

        <div class="portfolio_items_container">

            <ul class="portfolio_items columns">

                <!--projects content-->

				<?php

				$args2 = array(
					'post_type' => 'project',
					'nopaging'  => true, // !!! post_per_page not work properly.
				);

				$loop = new WP_Query( $args2 );
				$num  = 0;
				while ( $loop->have_posts() ) {
					$loop->the_post();
					$num ++;
					$tax_ = get_the_terms( get_the_ID(), 'project_cat' );
					$tax_ = $tax_[0]->slug;
					if ( ! empty( $tax_from_tax ) && $tax_ != $tax_from_tax ) {
						continue;
					}
					?>

                    <li data-type="<?php echo esc_attr( $tax_ ); ?>" data-id="id-<?php echo esc_attr( $num ); ?>" class="column column33">
                        <a href="
                            <?php
						    the_field( 'same_project_image', get_the_ID() );
    						?>
                                "
                           data-rel="prettyPhoto[gallery]" class="portfolio_image lightbox">
                            <div class="inside">
                                <img alt="" src="
                                    <?php
								    the_field( 'same_project_image', get_the_ID() );
    								?>
                                    ">
                                <div class="mask"></div>
                            </div>
                        </a>

                        <h1><?php the_title(); ?></h1>
                        <p><?php esc_attr_e( $tax_ ); ?></p>
                        <a class="button button_small button_orange" href="<?php the_permalink(); ?>"><span
                                    class="inside">read more</span></a>
                    </li>

					<?php

				}

				wp_reset_postdata();

				?>

            </ul>
        </div>
    </div>
</section>
<!-- END CONTENT -->

<?php get_footer(); ?>

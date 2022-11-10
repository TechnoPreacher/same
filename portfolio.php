<?php
/*
Template Name: same_portfolio
*/
?>

<?php get_header(); ?>

    <h1>same_portfolio</h1>

    <!-- BEGIN CONTENT -->
    <section id="content">
        <div class="wrapper page_text">
            <h1 class="page_title">Portfolio</h1>

            <div class="breadcrumbs">
                <div class="inside">
                    <a href="<?= home_url() ?>" class="first"><span>+The Same</span></a>
                    <a href="<?= get_permalink( get_the_ID() ) ?>" class="last"><span>Portfolio</span></a>
                </div>
            </div>

            <ul id="portfolio_categories" class="portfolio_categories">

                <li class="active segment-0"><a href="#" class="all">All Categories</a></li>

				<?php

				$terms = get_terms(
					array(
						'taxonomy'   => 'project_cat',
						'hide_empty' => false,
						//'parent'     => 0, - пуcть выводятся все категории
					)
				);

				$list_of_project_cat = '<ul class="menu categories page_text">';
				$num                 = 0;

				foreach ( $terms as $v ) {//цикл по родительским таксономиям
					$num ++;
					?>

                    <li class="segment-<?= $num ?>"><a href="#" class="<?= $v->slug ?>"><?= $v->name ?></a></li>
					<?php

				}

				?>

            </ul>

            <div class="portfolio_items_container">

                <ul class="portfolio_items columns">

                    <!--проекты-->

					<?php

					$args2 = [
						'post_type'     => 'project',
                        'nopaging' => true,//!!! post_per_page не отрабатывает как положено

					];

					$loop = new WP_Query( $args2 );
					$num  = 0;
					while ( $loop->have_posts() ) {
						$loop->the_post();
						$num ++;
						$tax = get_the_terms( get_the_ID(), 'project_cat' );
						$tax = $tax[0]->slug;
						?>

                        <li data-type="<?= $tax ?>" data-id="id-<?= $num ?>" class="column column33">
                            <a href="<?= get_image_url() ?>"
                               data-rel="prettyPhoto[gallery]"
                               class="portfolio_image lightbox">
                                <div class="inside">
                                    <img alt=""
                                         src="<?= get_image_url() ?>">
                                    <div class="mask"></div>
                                </div>
                            </a>

                            <h1><?= the_title() ?></h1>
                            <p><?= $tax ?></p>
                            <a class="button button_small button_orange" href="<?= get_permalink() ?>"><span
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
    </div>
    </div>

<?php get_footer(); ?>
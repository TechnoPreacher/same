<?php
/*
Template Name: same_gallery
*/
?>


<?php get_header(); ?>

<section id="content">
    <div class="wrapper page_text">

        <div class="breadcrumbs">
            <div class="inside">
                <a href="<?= home_url() ?>" class="first"><span>The Same</span></a>
                <a href="<?= get_permalink( get_the_ID() ) ?>" class="last"><span>Gallery</span></a>
            </div>
        </div>

        <div class="page_gallery">

			<?php

			$current        = absint(
				max(
					1,
					get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' )
				)
			);
			$posts_per_page = 4;
			$query          = new WP_Query(
				[
					'post_type'      => 'slider',
					'posts_per_page' => $posts_per_page,
					'paged'          => $current,
				]
			);

			if ( $query->have_posts() ) {
				?>
				<?php absint( $current ); ?>

				<?php
				$forColumnCounter = 0;
				while ( $query->have_posts() ) {
					$forColumnCounter ++;

					$query->the_post();

					if ( $forColumnCounter == 1 ) {
						?>

                        <div class="columns">

						<?php
					}


					?>

                    <div class="column column50">

                        <div class="image">

                            <img src="<?php
							the_field( 'same_slider_image', get_the_ID() );
							?>"
                                 alt=""/>
                            <p class="caption">
                                <strong><?php the_field( 'same_slider_title', get_the_ID() ); ?></strong>

                                <span>
                                    <?php
                                    the_field( 'same_slider_info', get_the_ID() );

                                    ?>

                                </span>

                                <a href=" <?php
								the_field( 'same_slider_image', get_the_ID() );

								?>"
                                   data-rel="prettyPhoto[gallery]"
                                   class="button button_small button_orange float_right lightbox"><span
                                            class="inside">zoom</span></a>
                            </p>
                        </div>
                    </div>

					<?php

					if ( $forColumnCounter == 2 ) {
						?>

                        </div>

						<?php
						$forColumnCounter = 0;
					}

				}
				wp_reset_postdata();

                $links =// wp_kses_post
					(
					paginate_links(
						[
							'total'     => $query->max_num_pages,
							'current'   => $current,
							'prev_next' => true,

							'show_all' => true,
							'type'     => 'array',
						]
					)
					);


				$links2 = wp_kses_post
					(
					paginate_links(
						[
							'total'     => $query->max_num_pages,
							'current'   => $current,
							'prev_next' => true,

							'show_all' => true,

						]
					)
					);

			?> <h1>	<?php echo ($links2

                    ); ?> </h1> <?php


				//придётся достать ссылки для начала и конца до формирования списка,
                // т.к. они не сразу видны в линках

				$firstLink = "";
				$lastLink  = "";

				foreach ( $links as $v ) {

					$rep         = array( '&quot;', '"' );
					$v           = str_replace( $rep, '', $v );
                    $v =  $v;
					$needleFirst = "a class=prev page-numbers href=";
					$needleNext  = "a class=next page-numbers href=";

					if ( strpos( $v, $needleFirst ) > 0 )//если нашли простые страницы пагинации

					{
						$fullcontent = $v;

						$srcpart   = substr( $fullcontent,
							strpos( $fullcontent, $needleFirst ) + mb_strlen( $needleFirst ) );
						$src       = substr( $srcpart, 0, strpos( $srcpart, '>' ) );
						$firstLink = $src;

					}

					if ( strpos( $v, $needleNext ) > 0 )//если нашли простые страницы пагинации

					{
						$fullcontent = $v;

						$srcpart  = substr( $fullcontent,
							strpos( $fullcontent, $needleNext ) + mb_strlen( $needleNext ) );
						$src      = substr( $srcpart, 0, strpos( $srcpart, '>' ) );
						$lastLink = $src;

					}

				}

				?>
                <ul class="pagenav">

                    <li class="arrow arrow_left"><a href="<?= $firstLink ?>"><span></span></a></li>

					<?php

					foreach ( $links as $v ) {
						$rep    = array( '&quot;', '"' , '%3E','#038;');
						$v      = str_replace( $rep, '', $v );
						$v = ( $v);
						$needle = "a class=page-numbers href=";

						if ( strpos( $v, $needle ) > 0 )//если нашли простые страницы пагинации


						{
							$fullcontent = $v;

							$srcpart = substr( $fullcontent, strpos( $fullcontent, $needle ) + mb_strlen( $needle ) );
							$src     = substr( $srcpart, 0, strpos( $srcpart, '>' ) );
							$title   = substr( $srcpart, strpos( $srcpart, '>' ) + 1,
								strpos( $srcpart, '>' ) - ( strpos( $srcpart, '</a>' ) - 3 ) );




							?>
                            <li><a href="<?= $src ?>"><span><?= $title ?></span></a></li>
							<?php
						}

						$needle2 = "class=page-numbers current";
						if ( strpos( $v, $needle2 ) > 0 )//если нашли текущую страницу пагинации
						{
							$fullcontent2 = $v;
							$srcpart      = substr( $fullcontent2,
								strpos( $fullcontent2, $needle2 ) + mb_strlen( $needle2 ) + 1 );
							$info         = substr( $srcpart, 0, strpos( $srcpart, '</span>' ) );
							?>
                            <li class="active"><a><span><?= $info ?></span></a></li> <?php

						}

					}


					?>


                    <li class="arrow arrow_right"><a href="<?= $lastLink ?>"><span></span></a></li>
                </ul>

				<?php

			} else {
				global $wp_query;
				$wp_query->set_404();
				status_header( 404 );
				nocache_headers();
				require get_404_template();
			}

			?>

        </div>


    </div>
</section>

<?php get_footer(); ?>


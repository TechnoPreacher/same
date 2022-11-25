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
                <a href="<?php echo esc_url( home_url() ); ?>" class="first"><span>The Same</span></a>
                <a href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>"
                class="last"><span><?php esc_html_e( 'Gallery' ); ?></span></a>
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
				array(
					'post_type'      => 'slider',
					'posts_per_page' => $posts_per_page,
					'paged'          => $current,
				)
			);

			if ( $query->have_posts() ) {

				$for_column_counter = 0;
				while ( $query->have_posts() ) {
					$for_column_counter ++;

					$query->the_post();

					if ( 1 === $for_column_counter ) {
						?>
                        <div class="columns">
						<?php
					}
					?>

                    <div class="column column50">

                        <div class="image">

                            <img src="
							<?php
							the_field( 'same_slider_image', get_the_ID() );
							?>
							"
                            alt=""/>
                            <p class="caption">
                                <strong><?php the_field( 'same_slider_title', get_the_ID() ); ?></strong>

                                <span>
									<?php
									the_field( 'same_slider_info', get_the_ID() );

									?>

								</span>

                                <a href="
								<?php
								the_field( 'same_slider_image', get_the_ID() );

								?>
								"
                                    data-rel="prettyPhoto[gallery]"
                                    class="button button_small button_orange float_right lightbox"><span
                                            class="inside"><?php esc_html_e( 'zoom' ); ?></span></a>
                            </p>
                        </div>
                    </div>

					<?php

					if ( 2 === $for_column_counter ) {
						?>

                        </div>

						<?php
						$for_column_counter = 0;
					}
				}
				wp_reset_postdata();

				$links = // wp_kses_post.
					(
					paginate_links(
						array(
							'total'     => $query->max_num_pages,
							'current'   => $current,
							'prev_next' => true,
							'show_all'  => true,
							'type'      => 'array',
						)
					)
					);

				// links for begin-end.

				$first_link = '';
				$last_link  = '';

				foreach ( $links as $v ) {

					$rep          = array( '&quot;', '"' );
					$v            = str_replace( $rep, '', $v );
					$needle_first = 'a class=prev page-numbers href=';
					$needle_next  = 'a class=next page-numbers href=';

					if ( strpos( $v, $needle_first ) > 0 ) {
						$full_content = $v;
						$src_part     = substr(
							$full_content,
							strpos( $full_content, $needle_first ) + mb_strlen( $needle_first )
						);
						$src          = substr( $src_part, 0, strpos( $src_part, '>' ) );
						$first_link   = $src;
					}

					if ( strpos( $v, $needle_next ) > 0 ) {
						$full_content = $v;
						$src_part     = substr(
							$full_content,
							strpos( $full_content, $needle_next ) + mb_strlen( $needle_next )
						);
						$src          = substr( $src_part, 0, strpos( $src_part, '>' ) );
						$last_link    = $src;
					}
				}

				?>
                <ul class="pagenav">
                    <li class="arrow arrow_left"><a href="<?php echo esc_url( $first_link ); ?>"><span></span></a></li>

					<?php

					foreach ( $links as $v ) {
						$rep    = array( '&quot;', '"', '%3E', '#038;' );
						$v      = str_replace( $rep, '', $v );
						$needle = 'a class=page-numbers href=';
						if ( strpos( $v, $needle ) > 0 ) {
							$full_content = $v;
							$src_part     = substr( $full_content, strpos( $full_content, $needle ) + mb_strlen( $needle ) );
							$src          = substr( $src_part, 0, strpos( $src_part, '>' ) );
							$title_       = substr(
								$src_part,
								strpos( $src_part, '>' ) + 1,
								strpos( $src_part, '>' ) - ( strpos( $src_part, '</a>' ) - 3 )
							);

							?>
                            <li>
                                <a href="<?php echo esc_url( $src ); ?>"><span><?php echo esc_textarea( $title_ ); ?></span></a>
                            </li>
							<?php
						}

						$needle2 = 'class=page-numbers current';
						if ( strpos( $v, $needle2 ) > 0 ) {
							$full_content2 = $v;
							$src_part      = substr(
								$full_content2,
								strpos( $full_content2, $needle2 ) + mb_strlen( $needle2 ) + 1
							);
							$info          = substr( $src_part, 0, strpos( $src_part, '</span>' ) );
							?>
                            <li class="active"><a><span><?php echo esc_textarea( $info ); ?></span></a></li>
							<?php
						}
					}

					?>

                    <li class="arrow arrow_right"><a href="<?php echo esc_url( $last_link ); ?>"><span></span></a></li>
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

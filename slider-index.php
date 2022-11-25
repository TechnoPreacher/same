<section id="top">
    <div class="wrapper">
        <div id="top_slide" class="flexslider">
            <ul class="slides">

				<?php


					$num = absint( get_field( 'number_of_slides', get_theme_mod( 'main_page_id' ) ) );
					$num = ( $num > 0 ) ? $num : 5;

					$args = array(
						'post_type'      => 'slider',
						'posts_per_page' => $num,
					);

					$loop = new WP_Query( $args );

					while ( $loop->have_posts() ) {
						$loop->the_post();
						?>
                        <li><img src="<?php the_field( 'same_slider_image', get_the_ID() ); ?>" alt=""/>
                            <p class="flex-caption"><strong>
									<?php
										the_field(
											'same_slider_title',
											get_the_ID()
										);
									?>
                                </strong><span>
						<?php the_field( 'same_slider_info', get_the_ID() ); ?>
				</span></p></li>

						<?php
					}
					wp_reset_postdata();
				?>
            </ul>
        </div>
    </div>
</section>

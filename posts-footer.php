<?php
    /**
    front content for recent posts on footer and right sidebar
     */
	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => 3,
	);
?>

    <ul class="recent_posts">

		<?php
			$loop = new WP_Query( $args );

			while ( $loop->have_posts() ) {
				$loop->the_post();
				?>

                <li class="item">
                    <a class="thumbnail" href="<?php echo esc_url( get_permalink() ); ?>">
                        <img alt="" src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>">
                    </a>
                    <div class="text">
                        <h4 class="title">
                            <a href="<?php echo esc_url( get_permalink() ); ?>">
								<?php echo esc_textarea( wp_trim_words( get_the_content(), 10 ) ); ?>
                            </a>
                        </h4>
                        <p class="data">
                            <span class="date"><?php echo get_the_date(); ?></span>
                        </p>
                    </div>
                </li>

				<?php
			}

			wp_reset_postdata();

		?>

    </ul>

<?php

<?php
	/*
	Single article content part
	*/
?>

<article class="article">
	<?php
		$url = '';
		$p1  = '';
		$p2  = '';
		$q   = '';

		if ( has_blocks() ) {
			$blocks = parse_blocks( get_the_content() );
			foreach ( $blocks as $v ) {
				if ( 'core/image' === $v['blockName'] ) {
					if ( '' == $url ) {
						$url = get_image_url( $v['innerHTML'] );
					}
				}
				if ( 'core/quote' === $v['blockName'] ) {
					if ( '' == $q ) {
						$q = $v['innerHTML'];
					}
				}
				if ( 'core/paragraph' === $v['blockName'] ) {
					if ( '' == $p1 ) {
						$p1 = $v['innerHTML'];
						continue;
					}
					if ( '' == $p2 ) {
						$p2 = $v['innerHTML'];
					}
				}
			}
		}

		$args_ = array(
			'p1'  => $p1,
			'p2'  => $p2,
			'q'   => $q,
			'url' => $url,
		);

	?>

    <div class="article_image nomargin">
        <div class="inside">
            <img src="<?php echo esc_url( $args_['url']); ?>" alt=""/>
        </div>
    </div>

    <div class="article_details">
        <ul class="article_author_date">
            <li><em><?php esc_html_e( 'Add:' ) ?> </em>
				<?php
					echo get_the_date()
				?>
            </li>
            <li><em><?php esc_html_e( 'Author:' ) ?> </em>
                <a href="<?php the_author_meta( 'url' ); ?>">
					<?php the_author_meta( 'nickname' ); ?>
                </a>
            </li>
        </ul>
        <p class="article_comments">
            <em>Comment: </em>
			<?php
				echo esc_textarea( get_comments_number() )
			?>
        </p>
    </div>

    <h1><?php echo esc_textarea( get_the_title() ); ?></h1>
    <p><?php echo $args_['p1']; ?></p>
	<?php echo( get_citate( $args_['q'] ) ); ?>
    <p><?php echo $args_['p2']; ?></p>

	<?php
        // $args is from context.
        if ( count($args)>0 ) { ?>
        <a class="button button_small button_orange float_left"
           href="<?php echo esc_url( get_permalink() ); ?>">
            <span class="inside"><?php esc_html_e( 'read more' ); ?></span>
        </a>
	<?php } ?>
</article>

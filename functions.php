<?php

/*
статические данные для футера на всех страницах берутся из кастомных полей;
для удобства заполнять кастомные поля футера нужно только на главной странице
настроить ACF нужно так, чтоб кастомные поля выводились только на главной
выводить значения следует стандартными методами ACF (обращаться через внутри do_action('aboutus'); )
для того, чтоб всё работало корректно нужно через get_the_ID() получать ID для
главной страницы и вписать его тут внутри функции get_aboutus
*/

add_theme_support( 'post-thumbnails' );

define( 'MAIN_PAGE_ID', 38 );//147 id for main page (get_the_ID())
define( 'PORTFOLIO_PAGE_ID', 101 );//156 id for portfolio page
define( 'BLOG_PAGE_ID', 118 );//id for blog page (need for breadcrumbs)

add_action( 'projects_in_footer_all_in_li_tag', 'footer_tax' );//project's taxonomies for footer
add_action( 'last_projects_on_page', 'last_projects' );//projects for "last roject" blocks
add_action( 'posts', 'footer_recent_posts' );//recent posts for footer
add_action( 'postforpage', 'posts_on_page' );//posts for post's page
add_action( 'singlepost', 'single_post' );//get the single post content
add_action( 'imurl', 'get_image_url' );//get image src url for from content

add_action( 'featurelabel', 'get_feature_label' );//feature's labels from ACF (fill on mainpage)
add_action( 'featuretext', 'get_feature_text' );//feature's info from ACF (fill on mainpage)
add_action( 'slider', 'get_slider' );//slider set/fill in custom content type

function single_post( $id ) {

	$content_post = get_post( $id );
	apply_filters( 'the_content', $content_post->post_content );//make filter and get content for post by id
	?>

    <article class="article">
        <div class="article_image nomargin">
            <div class="inside">
                <img src="<?= get_image_url() ?>" alt=""/>
            </div>
        </div>

        <div class="article_details">
            <ul class="article_author_date">
                <li><em>Add:</em> <?= get_the_date() ?> </li>
                <li><em>Author: </em>
                    <a href="<?= the_author_meta( 'url', get_current_user_id() ) ?>">
						<?= the_author_meta( 'nickname', get_current_user_id() ) ?>
                    </a>
                </li>
            </ul>
            <p class="article_comments"><em>Comment: </em><?= get_comments_number() ?>
            </p>
        </div>

        <p> <?= get_paragraph( 1 ); ?> </p>

		<?= get_citate(); ?>

        <p> <?= get_paragraph( 2 ); ?> </p>

    </article>

	<?php
}

register_nav_menus(//for "menu" editor access on admin page
	array(
		'primary' => esc_html__( 'Primary', 'same' ),
	)
);

function get_slider() {

$num = 	absint(get_field( 'number_of_slides', MAIN_PAGE_ID ));
$num = ($num>0) ? $num : 10;

	$args = array(
		'post_type'      => 'slider',
		'posts_per_page' => $num,
	);

	$loop = new WP_Query( $args );

	while ( $loop->have_posts() ) {
		$loop->the_post();
		?>

        <li>
            <img src="<?php the_field( 'same_slider_image', get_the_ID() ); ?>"
                 alt=""/>
            <p class="flex-caption">
                <strong>
					<?php the_field( 'same_slider_title', get_the_ID() ); ?>
                </strong>
                <span>
                  <?php the_field( 'same_slider_info', get_the_ID() ); ?>
                </span>
            </p>
        </li>

		<?php

	}

	wp_reset_postdata();

	return 0;
}


function last_projects( $atts ) {

	if ( $atts != '' ) {
		$num = $atts[0];
	} else {
		$num = 4;
	}

	$args = array(
		'post_type'      => 'project',
		'posts_per_page' => $num,
	);

	$loop = new WP_Query( $args );

	while ( $loop->have_posts() ) {
		$loop->the_post();
		?>

        <div class="column column25">
            <a href="<?php the_field( 'same_project_image', get_the_ID() ); ?>"

               class="image lightbox" data-rel="prettyPhoto[gallery]">
								<span class="inside">
									<img src="<?php the_field( 'same_project_image', get_the_ID() ); ?>"
                                         alt=""/>
									<span class="caption"><?php echo wp_trim_words( get_the_content(), 2 ); ?></span>
								</span>
                <span class="image_shadow"></span>
            </a>
        </div>

		<?php

	}

	wp_reset_postdata();

	return 0;
}


function footer_tax() {

	$terms = get_terms(
		array(
			'taxonomy'   => 'project_cat',
			'hide_empty' => false,
			'parent'     => 0,
		)
	);

	$list_of_project_cat = '<ul class="menu categories page_text">';

	foreach ( $terms as $v ) {//parent's taxonomies loop
		$link                = " <a href=" . "\"" . get_term_link( $v->term_id ) . "\">$v->name ($v->count) </a>";
		$list_of_project_cat .=  '<li >' . $link;

		$terms_child = get_terms(
			array(
				'taxonomy'   => 'project_cat',
				'hide_empty' => false,
				'parent'     => $v->term_id,
			)
		);

		$child = '';
		foreach ( $terms_child as $vv ) {//children loop
			$link  = " <a href=" . "\"" . get_term_link( $vv->term_id ) . "\">$vv->name ($vv->count) </a>";
			$child .=  '<li>' . $link . '</li>';
		}

		if ( ! empty( $child ) ) {
			$child               = '<ul>' . $child . '</ul>';
			$list_of_project_cat .= $child;//inline list (children)
		}

		$list_of_project_cat .=  ' </li>';//closing tag for list's row
	}

	echo $list_of_project_cat . '</ul>';//closing tag for list
}


function footer_recent_posts( $atts ) {//нужно понимать число слов для ограничения! пока 10

	if ( $atts != '' ) {
		$num = $atts[0];
	} else {
		$num = 2;
	}

	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => $num,
	);
	?>

    <ul class="recent_posts">

		<?php
		$loop = new WP_Query( $args );

		while ( $loop->have_posts() ) {
			$loop->the_post();
			?>

            <li class="item">
                <a class="thumbnail" href="<?= get_permalink() ?>">
                    <img alt="" src="<?= get_the_post_thumbnail_url() ?>">
                </a>
                <div class="text">
                    <h4 class="title">
                        <a href="<?= get_permalink() ?>">
							<?php echo wp_trim_words( get_the_content(), 10 ); ?>
                        </a>
                    </h4>
                    <p class="data">
                        <span class="date"><?= get_the_date() ?></span>
                    </p>
                </div>
            </li>

			<?php

		}

		wp_reset_postdata();

		?>

    </ul>

	<?php

	return 0;
}


function posts_on_page( $atts ) {

	if ( $atts != '' ) {
		$num = $atts[0];
	} else {
		$num = 2;
	}

	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => $num,
	);
	?>

    <ul class="recent_posts">

		<?php
		$loop = new WP_Query( $args );

		while ( $loop->have_posts() ) {
			$loop->the_post();
			?>

            <article class="article">
                <div class="article_image nomargin">
                    <div class="inside">
                        <img src="<?= get_image_url()
						?>" alt=""/>
                    </div>
                </div>

                <div class="article_details">
                    <ul class="article_author_date">
                        <li><em>+Add:</em> <?= get_the_date()
							?> </li>
                        <li><em>+Author: </em>
                            <a href="<?= the_author_meta( 'url' )
							?>">
								<?=
								the_author_meta( 'nickname' )
								?>
                            </a>
                        </li>
                    </ul>
                    <p class="article_comments">
                        <em>Comment: </em>
						<?=
						get_comments_number()
						?>
                    </p>
                </div>

                <!-- Название -->
                <!-- параграф 1 -->
                <!-- цитата -->
                <!-- параграф 2 -->

                <h1><?= get_the_title()
					?></h1>
                <p><?= get_paragraph( 1 )
					?> </p>
				<?= get_citate()
				?>
                <p> <?= get_paragraph( 2 )
					?> </p>

                <a class="button button_small button_orange float_left" href="<?= get_permalink() ?>">
                    <span class="inside">read more</span>
                </a>

            </article>

			<?php
		}

		wp_reset_postdata();
		?>
    </ul>
	<?php
	return 0;
}

function get_paragraph( $num, $content_only = false ) {
	$dom = new DOMDocument( '1.0', 'utf-8' );
	libxml_use_internal_errors( true );
	$html = mb_convert_encoding( get_the_content(), 'HTML-ENTITIES', 'UTF-8' );
	$dom->loadHTML( $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
	$data   = $dom->getElementsByTagName( 'p' )->item( $num - 1 );
	$output = "";
	if ( $data != null ) {
		$text   = $data->nodeValue;
		$output = $text;
	}
	unset( $dom );
	libxml_clear_errors();

	return $output;
}

function get_citate() {
	$dom = new DOMDocument( '1.0', 'utf-8' );
	libxml_use_internal_errors( true );
	$html = mb_convert_encoding( get_the_content(), 'HTML-ENTITIES', 'UTF-8' );
	$dom->loadHTML( $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
	$data   = $dom->getElementsByTagName( 'blockquote' )->item( 0 );
	$output = "";
	if ( $data != null ) {
		$author = $data->firstChild->nodeValue;
		$text   = $data->lastChild->nodeValue;
		//$output = "<q>" . $author . "<br>" . $text . "</q>";
		$output = "<q>" . $text . "</q>";
	}
	unset( $dom );
	libxml_clear_errors();

	return $output;
}

function get_image_url( $content = '' ) {

	$dom = new DOMDocument( '1.0', 'utf-8' );
	libxml_use_internal_errors( true );

	if ( $content == '' ) {
		$content = get_the_content();
	}
	$html = mb_convert_encoding( $content, 'HTML-ENTITIES', 'UTF-8' );


	$dom->loadHTML( $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );


	$images = $dom->getElementsByTagName( 'img' );
	$link   = "";
	if ( $images->length != 0 ) {


		foreach ( $images as $image ) {
			$link = ( $image->getAttribute( 'src' ) );
			break;//only first image source
		}
	}

	unset( $dom );
	libxml_clear_errors();

	return $link;
}


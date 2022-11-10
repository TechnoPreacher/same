<?php

/*
статические данные для футера на всех страницах берутся из кастомных полей;
для удобства заполнять кастомные поля футера нужно только на главной странице
настроить ACF нужно так, чтоб кастомные поля выводились только на главной
выводить значения следует стандартными методами ACF (обращаться через внутри do_action('aboutus'); )
для того, чтоб всё работало корректно нужно через get_the_ID() получать ID для
главной страницы и вписать его тут внутри функции get_aboutus
*/

//==ЭТО ДЕБИЛЬНОЕ РЕШЕНИЕ, НО ЗАТО В ОДНОМ МЕСТЕ==
define( 'MAIN_PAGE_ID', 38 );//147 важно вписать сюда айдишник главной страницы, на ней вызвав echo(get_the_ID()); !!!
define( 'PORTFOLIO_PAGE_ID', 101 );//156 важно вписать сюда айдишник главной страницы, на ней вызвав echo(get_the_ID()); !!!
define( 'BLOG_PAGE_ID', 118 );//важно вписать сюда айдишник страницы блога (где два поста) для хлебных крошек(корень)
//================================================

add_action( 'projects_in_footer_all_in_li_tag', 'footer_tax' );//категории для проектов (в футер)
add_action( 'last_projects_on_page', 'last_projects' );//проекты для раздела портфолио на главной
add_action( 'posts', 'footer_recent_posts' );//так удобно получать нужное число постов для футера
add_action( 'postforpage', 'posts_on_page' );//так удобно получать нужные посты для контента страницы
add_action( 'pagelink', 'page_link' );//ссылка на страницу (например берёт "all projects" для портфолио)
add_action( 'getbloglink', 'blog_page_link' );//взять линк на корень блога для хлебных крошек
add_action( 'singlepost', 'single_post' );//так удобно получать нужные посты для контента страницы

function single_post( $id ) {

	$content_post = get_post( $id );
	apply_filters( 'the_content', $content_post->post_content );//фильтрует контент делая текущим нужный пост!
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

        <p>    <?= get_paragraph( 1 ); ?> </p>

		<?= get_citate(); ?>

        <p> <?= get_paragraph( 2 ); ?> </p>

    </article>

	<?php

}


function blog_page_link() {
	return page_link( BLOG_PAGE_ID );
}

add_theme_support( 'post-thumbnails' );

add_action( 'aboutus', 'get_aboutus' );//сложный текст для "о нас" - заполняется на главной в кастомных полях
add_action( 'contactus', 'get_contactus' );//сложный текст для "контактов" - заполняется на главной в кастомных полях

add_action( 'featurelabel', 'get_feature_label' );//название фичи из кастомного поля (заполняются на главной)!
add_action( 'featuretext', 'get_feature_text' );//описание фичи из кастомного поля (заполняются на главной)!

add_action( 'iconlabel', 'get_icon_label' );//название иконы из кастомного поля (заполняются на главной)!
add_action( 'icontext', 'get_icon_text' );//описание иконы из кастомного поля (заполняются на главной)!

add_action( 'mainlabel', 'get_main_label' );//название статьи на главной из кастомного поля (заполняются на главной)!
add_action( 'maintext', 'get_main_text' );//описание статьи на главной  из кастомного поля (заполняются на главной)!

add_action( 'slider', 'get_slider' );//получить данные из кастомного контент тайпа и построить слайдер

register_nav_menus(
	array(// нужно для меню в админке
		'primary' => esc_html__( 'Primary', 'same' ),
	)
);

function get_slider( $atts ) {

	if ( $atts != '' ) {
		$num = $atts[0];
	} else {
		$num = - 1;
	}

	$args2 = array(
		'post_type'      => 'slider',
		'posts_per_page' => $num,
	);

	$loop = new WP_Query( $args2 );

	while ( $loop->have_posts() ) {
		$loop->the_post();
		?>

        <li>
            <img src="<?= get_image_url() ?>"
                 alt=""/>
            <p class="flex-caption">
                <strong><?= get_the_title() ?></strong>
                <span><?= get_paragraph( 1 ); ?></span>
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

	$args2 = array(
		'post_type'      => 'project',
		'posts_per_page' => $num,
	);

	$loop = new WP_Query( $args2 );

	while ( $loop->have_posts() ) {
		$loop->the_post();

		?>

        <div class="column column25">
            <a href="<?= get_image_url() ?>"
               class="image lightbox" data-rel="prettyPhoto[gallery]">
								<span class="inside">
									<img src="<?= get_image_url() ?>"
                                         alt=""/>
									<span class="caption"><?php echo wp_trim_words( get_the_content(),
											2 ); ?></span>
								</span>
                <span class="image_shadow"></span>
            </a>
        </div>

		<?php

	}

	wp_reset_postdata();

	return 0;
}

function get_main_label() {
	the_field( 'main_label', MAIN_PAGE_ID );
}

function get_main_text() {
	the_field( 'main_text', MAIN_PAGE_ID );
}

function get_aboutus() {
	the_field( 'aboutus', MAIN_PAGE_ID );
}

function get_contactus() {
	the_field( 'contactus', MAIN_PAGE_ID );
}

function get_feature_label( $num ) {
	$num = $num[0];
	the_field( "feature_label_$num", MAIN_PAGE_ID );
}

function get_feature_text( $num ) {
	$num = $num[0];
	the_field( "feature_text_$num", MAIN_PAGE_ID );
}

function get_icon_label( $num ) {
	$num = $num[0];
	the_field( "icon_label_$num", MAIN_PAGE_ID );
}

function get_icon_text( $num ) {
	$num = $num[0];
	the_field( "icon_text_$num", MAIN_PAGE_ID );
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

	foreach ( $terms as $v ) {//цикл по родительским таксономиям
		$link = " <a href=" . "\"" . get_term_link( $v->term_id ) . "\">$v->name ($v->count) </a>";
		$list_of_project_cat = $list_of_project_cat . '<li >' . $link;

		$terms_child = get_terms(
			array(
				'taxonomy'   => 'project_cat',
				'hide_empty' => false,
				'parent'     => $v->term_id,
			)
		);

		$child = '';
		foreach ( $terms_child as $vv ) {//цикл по детям
			$link  = " <a href=" . "\"" . get_term_link( $vv->term_id ) . "\">$vv->name ($vv->count) </a>";
			$child = $child . '<li>' . $link . '</li>';
		}

		if ( ! empty( $child ) ) {
			$child = '<ul>' . $child . '</ul>';
			$list_of_project_cat = $list_of_project_cat . $child;//вложенный в строку список строк
		}

		$list_of_project_cat = $list_of_project_cat . ' </li>';//всегда закрываю строку списка
	}

	echo $list_of_project_cat . '</ul>';//и закрываю весь список
}


function footer_recent_posts( $atts ) {//нужно понимать число слов для ограничения! пока 10

	if ( $atts != '' ) {
		$num = $atts[0];
	} else {
		$num = 2;
	}

	$args2 = array(
		'post_type'      => 'post',
		'posts_per_page' => $num,
	);
	?>

    <ul class="recent_posts">

		<?php
		$loop  = new WP_Query( $args2 );

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
                            <?php echo wp_trim_words( get_the_content(),10 ); ?>
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

	$args2 = array(
		'post_type'      => 'post',
		'posts_per_page' => $num,
	);
	?>

    <ul class="recent_posts">

		<?php
		$loop = new WP_Query( $args2 );

		while ( $loop->have_posts() ) {
			$loop->the_post();
			?>

            <article class="article">
                <div class="article_image nomargin">
                    <div class="inside">
                        <img src="<?= get_image_url() ?>" alt=""/>
                    </div>
                </div>

                <div class="article_details">
                    <ul class="article_author_date">
                        <li><em>+Add:</em> <?= get_the_date() ?> </li>
                        <li><em>+Author: </em>
                            <a href="<?= the_author_meta( 'url' ) ?>">
                                <?= the_author_meta( 'nickname' ) ?>
                            </a>
                        </li>
                    </ul>
                    <p class="article_comments">
                        <em>Comment: </em>
                        <?= get_comments_number() ?>
                    </p>
                </div>

                <!-- Название -->
                <!-- параграф 1 -->
                <!-- цитата -->
                <!-- параграф 2 -->

                <h1><?= get_the_title() ?></h1>
                <p><?= get_paragraph( 1 ) ?> </p>
				<?= get_citate() ?>
                <p> <?= get_paragraph( 2 ) ?> </p>

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
	$dom = new DOMDocument;
	libxml_use_internal_errors( true );
	if ( $content == '' ) {
		$dom->loadHTML( get_the_content() );
	} else {
		$dom->loadHTML( $content );
	}
	$images = $dom->getElementsByTagName( 'img' );
	$link = "";
	foreach ( $images as $image ) {
		$link = ( $image->getAttribute( 'src' ) );
		break;//беру только первое изображение
	}
	unset( $dom );
	libxml_clear_errors();
	return $link;
}

function page_link( $id = '' ) {
	if ( $id == '' ) {
		echo( get_permalink() );
	} else {
		echo( get_permalink( $id ) );
	}
}
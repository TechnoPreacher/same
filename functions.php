<?php

/*
статические данные для футера на всех страницах берутся из кастомных полей;
для удобства заполнять кастомные поля футера нужно только на главной странице
настроить ACF нужно так, чтоб кастомные поля выводились только на главной
выводить значения следует стандартными методами ACF (обращаться через внутри do_action('aboutus'); )
для того, чтоб всё работало корректно нужно через get_the_ID() получать ID для
главной страницы и вписать его тут внутри функции get_aboutus
*/

define( 'MAIN_PAGE_ID', 38 );//важно вписать сюда айдишник главной страницы, на ней вызвав echo(get_the_ID()); !!!

//add_shortcode( 'posts', 'footer_post_shortcode' );//последние записи в футере
add_shortcode( 'features', 'feature_box_shortcode' );//feature box
add_shortcode( 'portfolio', 'project_portfolio_shortcode' );//project's portfolio
add_shortcode( 'extended', 'extended_text_shortcode' );//some text with read more button

add_action( 'projects_in_footer_all_in_li_tag', 'footer_tax' );

add_action( 'posts', 'footer_recent_posts' );//так удобно получать нужное число постов для футера

add_action( 'postforpage', 'posts_on_page' );//так удобно получать нужные посты для контента страницы

add_theme_support( 'post-thumbnails' );

add_action( 'admin_head',
	'remove_aboutus_editor' );//вырезать редактор кастомного поля "о нас" со всех страниц кроме главной

function remove_aboutus_editor() {
	//  global $post_type;
	//global $post;

//	add_filter('use_block_editor_for_post', '__return_false', 10);

	//   if($post->ID != MAIN_PAGE_ID){
	//	remove_meta_box( 'acf-imm', $post_type,'normal');
//	}
}


add_action( 'aboutus', 'get_aboutus' );//сложный текст для "о нас" - заполняется на главной в кастомных полях
add_action( 'contactus', 'get_contactus' );//сложный текст для "контактов" - заполняется на главной в кастомных полях
add_action( 'featuresforpage', 'features_on_page' );//кастомные контенттайпы с фичами!

function get_aboutus() {
	the_field( 'aboutus', MAIN_PAGE_ID );
}

function get_contactus() {
	the_field( 'contactus', MAIN_PAGE_ID );
}




function project_portfolio_shortcode( $atts ) {
	return " 
 <div style=\"width:100%;height:100%;border:2px solid fuchsia; margin-bottom: 3rem \"> 
   <p style='font-weight: bold'>Portfolio</p>

 </div>
 ";
}

function feature_box_shortcode( $atts ) {
	return " 
 <div style=\"width:100%;height:100%;border:2px solid blue; margin-bottom: 3rem \"> 
   <p style='font-weight: bold'>Future box</p>

 </div>
 ";
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
		$link                = " <a href=" . "\"" . get_term_link( $v->term_id ) . "\">$v->name ($v->count) </a>";
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
			$child               = '<ul>' . $child . '</ul>';
			$list_of_project_cat = $list_of_project_cat . $child;//вложенный в строку список строк
		};

		$list_of_project_cat = $list_of_project_cat . ' </li>';//всегда закрываю строку списка
	}

	echo $list_of_project_cat . '</ul>';//и закрываю весь список
}


/**
 * @param $atts
 *
 * @return string
 */
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
		$posts = '';
		while ( $loop->have_posts() ) {
			$loop->the_post();

			?>


            <li class="item">
                <a class="thumbnail" href="<?= get_permalink() ?>"><img alt=""
                                                                        src="<?= get_the_post_thumbnail_url() ?>"></a>
                <div class="text">
                    <h4 class="title"><a href="<?= get_permalink() ?>"><?php echo wp_trim_words( get_the_content(),
								10 ); ?></a>
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
		$loop  = new WP_Query( $args2 );

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
                        <li><em>+Author: </em> <a
                                    href="<?= the_author_meta( 'url' ) ?>"><?= the_author_meta( 'nickname' ) ?></a>
                        </li>
                    </ul>
                    <p class="article_comments"><em>Comment: </em><?= get_comments_number() ?>
                    </p>
                </div>

                <!-- Название -->
                <!-- параграф 1 -->
                <!-- цитата -->
                <!-- параграф 2 -->

                <h1> <?= get_the_title() ?></h1>


	            <?= get_paragraph( 1 ); ?>

				<?= get_citate(); ?>

				<?= get_paragraph( 2 ); ?>

                <a class="button button_small button_orange float_left"  href="<?= get_permalink() ?>"><span class="inside">read more</span></a>
            </article>

			<?php

		}

		wp_reset_postdata();

		?>

    </ul>


	<?php


	return 0;
}

function get_paragraph( $num ) {

	$dom = new DOMDocument( '1.0', 'utf-8' );
	libxml_use_internal_errors( true );
	$html = mb_convert_encoding( get_the_content(), 'HTML-ENTITIES', 'UTF-8' );
	$dom->loadHTML( $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
	$data   = $dom->getElementsByTagName( 'p' )->item( $num - 1 );
	$output = "";
	if ( $data != null ) {
		$text   = $data->nodeValue;
		$output = "<p>" . $text . "</p>";
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
		$output = "<q>" . $author . "<br>" . $text . "</q>";
	}

	unset( $dom );
	libxml_clear_errors();

	return $output;

}

function get_image_url() {

	$dom = new DOMDocument;

	libxml_use_internal_errors( true );

	$dom->loadHTML( get_the_content() );
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



function  features_on_page( $atts ) {

	if ( $atts != '' ) {
		$num = $atts[0];
	} else {
		$num = 2;
	}

	$args2 = array(
		'post_type'      => 'features',
		'posts_per_page' => $num,
	);
	?>


    <ul class="recent_posts">

		<?php
		$loop  = new WP_Query( $args2 );

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
                        <li><em>+Author: </em> <a
                                    href="<?= the_author_meta( 'url' ) ?>"><?= the_author_meta( 'nickname' ) ?></a>
                        </li>
                    </ul>
                    <p class="article_comments"><em>Comment: </em><?= get_comments_number() ?>
                    </p>
                </div>

                <!-- Название -->
                <!-- параграф 1 -->
                <!-- цитата -->
                <!-- параграф 2 -->

                <h1> <?= get_the_title() ?></h1>


				<?= get_paragraph( 1 ); ?>

				<?= get_citate(); ?>

				<?= get_paragraph( 2 ); ?>

                <a class="button button_small button_orange float_left"  href="<?= get_permalink() ?>"><span class="inside">read more</span></a>
            </article>

			<?php

		}

		wp_reset_postdata();

		?>

    </ul>


	<?php


	return 0;
}
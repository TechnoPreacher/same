<?php



//add_shortcode( 'posts', 'footer_post_shortcode' );//последние записи в футере
add_shortcode( 'features', 'feature_box_shortcode' );//feature box
add_shortcode( 'portfolio', 'project_portfolio_shortcode' );//project's portfolio
add_shortcode( 'extended', 'extended_text_shortcode' );//some text with read more button

add_action('projects_in_footer_all_in_li_tag', 'footer_tax');

add_action('posts', 'footer_post_shortcode');

add_theme_support( 'post-thumbnails' );


function extended_text_shortcode( $atts ) {
	return " 
 <div style=\"width:100%;height:100%;border:2px solid lime;margin-bottom: 3rem; margin-top: 3rem\"> 
   <p style='font-weight: bold'>Extended text</p>

 </div>
 ";
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

	$list_of_project_cat = '';

	foreach ( $terms as $v ) {//цикл по родительским таксономиям
		$link  = " <a href=" . "\"" . get_term_link( $v->term_id ) . "\">$v->name ($v->count) </a>";
		$list_of_project_cat = $list_of_project_cat . '<li >' . $link ;

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
		} ;

			$list_of_project_cat = $list_of_project_cat.  ' </li>';//всегда закрываю строку списка
	}

	echo $list_of_project_cat;
}


/**
 * @param $atts
 *
 * @return string
 */
function footer_post_shortcode( $atts ) {

	if ( $atts != '' ) {
		$num = $atts[0];
	} else {
		$num = 2;
	}

	$args2 = array(
		'post_type'      => 'post',
		'posts_per_page' => $num,
	);

	$loop  = new WP_Query( $args2 );
	$posts = '';
	while ( $loop->have_posts() ) {
		$loop->the_post();

?>


		<li class="item">
			<a class="thumbnail" href="<?=get_permalink() ?>"><img alt=""
			                                                       src="<?=get_the_post_thumbnail_url( ) ?>"></a>
                        <div class="text">
				<h4 class="title"><a href="<?=get_permalink()?>"><?php echo wp_trim_words(get_the_content(), 2); ?></a>
				</h4>
				<p class="data">
					<span class="date"><?=get_the_date()?></span>
				</p>
				</div>

		</li>

		<?php


	}

	wp_reset_postdata();

return 0;
}



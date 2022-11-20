<?php

add_theme_support( 'post-thumbnails' );

// fill in PAGE ID's section on Customizer.
// id for main page (get_the_ID()): 38 - pp.local, 147 - web4pro.pp.ua.
// id for portfolio page 101 - pp.local, 156 - web4pro.pp.ua.
// id for blog page (need for breadcrumbs) 118 -  pp.local, 153 - web4pro.pp.ua.


add_action( 'projects_in_footer_all_in_li_tag', 'footer_tax' );// project's taxonomies for footer.
add_action( 'last_projects_on_page', 'last_projects' );// projects for "last roject" blocks.
add_action( 'posts', 'footer_recent_posts' );// recent posts for footer.
add_action( 'postforpage', 'posts_on_page' );// posts for post's page.
add_action( 'imurl', 'get_image_url' );// get image src url for from content.

add_action( 'featurelabel', 'get_feature_label' );// feature's labels from ACF (fill on mainpage).
add_action( 'featuretext', 'get_feature_text' );// feature's info from ACF (fill on mainpage).
add_action( 'slider', 'get_slider' );// slider set/fill in custom content type.

add_action( 'customize_register', 'customizer_init' );// custom section on Customizer page!.

/** For customizator
 *
 * @param WP_Customize_Manager $wp_customize object.
 */
function customizer_init( WP_Customize_Manager $wp_customize ) {

	$section = 'copyright';
	$wp_customize->add_section(
		$section,
		array(
			'title'       => 'Copyright',
			'priority'    => 300,
			'description' => 'copyright string for footer',
		)
	);

	$setting = 'copy_right';
	$wp_customize->add_setting(
		$setting,
		array(
			'default'           => '0',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		$setting,
		array(
			'section' => 'copyright', // section id.
			'label'   => 'CR:',
			'type'    => 'text', // type of field value.
		)
	);

	// Sections for customize pages.
	$section = 'id_options';
	$wp_customize->add_section(
		$section,
		array(
			'title'       => 'Pages ID\'S',
			'priority'    => 200,
			'description' => 'ID for main pages for right menu\'s look',
		)
	);

	// main page ID.
	$setting = 'main_page_id';
	$wp_customize->add_setting(
		$setting,
		array(
			'default'           => '0',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		$setting,
		array(
			'section' => 'id_options', // section id.
			'label'   => 'Main page ID:',
			'type'    => 'text', // type of field value.
		)
	);

	// portfolio page ID.
	$setting = 'portfolio_page_id';
	$wp_customize->add_setting(
		$setting,
		array(
			'default'           => '0',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		$setting,
		array(
			'section' => 'id_options',
			'label'   => 'Portfolio page ID:',
			'type'    => 'text',
		)
	);

	// blog page ID.
	$setting = 'blog_page_id';
	$wp_customize->add_setting(
		$setting,
		array(
			'default'           => '0',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		$setting,
		array(
			'section' => 'id_options',
			'label'   => 'Blog page ID:',
			'type'    => 'text',
		)
	);

}


register_nav_menus( // for "menu" editor access on admin page.
	array(
		'primary' => esc_html__( 'Primary', 'same' ),
	)
);


function get_slider() {

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

}


function last_projects( $atts ) {

	if ( '' !== $atts ) {
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
			<a href="
			<?php
			the_field(
				'same_project_image',
				get_the_ID()
			);
			?>
				" class="image lightbox" data-rel="prettyPhoto[gallery]">
								<span class="inside">
									<img src="<?php the_field( 'same_project_image', get_the_ID() ); ?>" alt=""/>
									<span class="caption"><?php echo esc_attr( wp_trim_words( get_the_content(), 2 ) ); ?></span>
								</span>
				<span class="image_shadow"></span>
			</a>
		</div>

		<?php

	}

	wp_reset_postdata();

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

	foreach ( $terms as $v ) {// parent's taxonomies loop.
		$link                 = ' <a href= "' . get_term_link( $v->term_id ) . "\">$v->name ($v->count) </a>";
		$list_of_project_cat .= '<li >' . $link;

		$terms_child = get_terms(
			array(
				'taxonomy'   => 'project_cat',
				'hide_empty' => false,
				'parent'     => $v->term_id,
			)
		);

		$child = '';
		foreach ( $terms_child as $vv ) {// children loop.
			$link   = ' <a href="' . get_term_link( $vv->term_id ) . "\">$vv->name ($vv->count) </a>";
			$child .= '<li>' . $link . '</li>';
		}

		if ( ! empty( $child ) ) {
			$child                = '<ul>' . $child . '</ul>';
			$list_of_project_cat .= $child;// inline list (children).
		}

		$list_of_project_cat .= ' </li>';// closing tag for list's row.
	}

	echo ( $list_of_project_cat ) . '</ul>';// closing tag for list.
}


function footer_recent_posts( $atts ) {

	if ( '' !== $atts ) {
		$num = $atts[0];// nums of posts in footer.
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

}


function posts_on_page( $atts ) {

	if ( '' !== $atts ) {
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
						<img src="
						<?php echo esc_url( get_image_url() ); ?>
						" alt=""/>
					</div>
				</div>

				<div class="article_details">
					<ul class="article_author_date">
						<li><em>+Add:</em>
							<?php
							echo get_the_date()
							?>
						</li>
						<li><em>+Author: </em>
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
				<h1><?php echo get_the_title(); ?></h1>
				<p><?php echo get_paragraph( 1 ); ?></p>
				<?php echo get_citate(); ?>
				<p><?php echo get_paragraph( 2 ); ?></p>

				<a class="button button_small button_orange float_left" href="<?php echo get_permalink(); ?>">
					<span class="inside"><?php _e( 'read more' ); ?></span>
				</a>

			</article>

			<?php
		}

		wp_reset_postdata();
		?>
	</ul>
	<?php

}

function get_paragraph( $num ): string {
	$dom = new DOMDocument( '1.0', 'utf-8' );
	libxml_use_internal_errors( true );
	$html = mb_convert_encoding( get_the_content(), 'HTML-ENTITIES', 'UTF-8' );
	$dom->loadHTML( $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
	$data   = $dom->getElementsByTagName( 'p' )->item( $num - 1 );
	$output = '';
	if ( null !== $data ) {
		$text   = $data->nodeValue;
		$output = $text;
	}
	unset( $dom );
	libxml_clear_errors();

	return $output;
}

function get_citate() : string {
	$dom = new DOMDocument( '1.0', 'utf-8' );
	libxml_use_internal_errors( true );
	$html = mb_convert_encoding( get_the_content(), 'HTML-ENTITIES', 'UTF-8' );
	$dom->loadHTML( $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
	$data   = $dom->getElementsByTagName( 'blockquote' )->item( 0 );
	$output = '';
	if ( null !== $data ) {
		// $author = $data->firstChild->nodeValue;
		$text = $data->lastChild->nodeValue;
		// $output = "<q>" . $author . "<br>" . $text . "</q>";
		$output = '<q>' . $text . '</q>';
	}
	unset( $dom );
	libxml_clear_errors();

	return $output;
}

function get_image_url( $content = '' ): string {

	$dom = new DOMDocument( '1.0', 'utf-8' );
	libxml_use_internal_errors( true );

	if ( '' === $content ) {
		$content = get_the_content();
	}

	$html = mb_convert_encoding( $content, 'HTML-ENTITIES', 'UTF-8' );

	$dom->loadHTML( $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );

	$images = $dom->getElementsByTagName( 'img' );
	$link   = '';

	if ( 0 !== $images->length ) {
		foreach ( $images as $image ) {
			$link = ( $image->getAttribute( 'src' ) );
			break;// only first image source.
		}
	}

	unset( $dom );
	libxml_clear_errors();

	return $link;
}

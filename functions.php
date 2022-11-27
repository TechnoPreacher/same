<?php

// fill in PAGE ID's section on Customizer.
// id for main page (get_the_ID()): 38 - pp.local, 147 - web4pro.pp.ua.
// id for portfolio page 101 - pp.local, 156 - web4pro.pp.ua.
// id for blog page (need for breadcrumbs) 118 -  pp.local, 153 - web4pro.pp.ua.

	require_once 'class-menuwalker.php';// walker for menu customization.

	require_once 'parser_functions.php';// some helper functions for content's parts extraction.

	add_action( 'projects_in_footer_all_in_li_tag', 'footer_tax' );// project's taxonomies for footer.
	add_action( 'last_projects_on_page', 'last_projects' );// projects for "last roject" blocks.
	add_action( 'imurl', 'get_image_url' );// get image src url from content.
	add_action( 'featurelabel', 'get_feature_label' );// feature's labels from ACF (fill on mainpage).
	add_action( 'featuretext', 'get_feature_text' );// feature's info from ACF (fill on mainpage).
	add_action( 'customize_register', 'customizer_init' );// custom section on Customizer page!.
	add_action( 'after_setup_theme', 'after_setup_theme_action' );// some must-have setup.
	add_action( 'init', 'register_my_menus' );

	function after_setup_theme_action() {
		add_theme_support( 'post-thumbnails' );
	}


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

	function register_my_menus() {
		register_nav_menus( // for "menu" editor access on admin page.
			array(
				'primary' => esc_html__( 'Primary', 'same' ),
			)
		);
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
			$link                = ' <a href= "' . get_term_link( $v->term_id ) . "\">$v->name ($v->count) </a>";
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
				$link  = ' <a href="' . get_term_link( $vv->term_id ) . "\">$vv->name ($vv->count) </a>";
				$child .= '<li>' . $link . '</li>';
			}

			if ( ! empty( $child ) ) {
				$child               = '<ul>' . $child . '</ul>';
				$list_of_project_cat .= $child;// inline list (children).
			}

			$list_of_project_cat .= ' </li>';// closing tag for list's row.
		}

		echo ( $list_of_project_cat ) . '</ul>';// closing tag for list.
	}

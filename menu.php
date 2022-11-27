<nav>
	<?php
		$menu_object = wp_get_nav_menu_object( 'mainmenu' );
		$menu_id     = $menu_object->term_id;
		$args        = array(
			'menu'   => $menu_id,
			'walker' => new menuwalker(),
		);
		wp_nav_menu( $args );
		?>
</nav>

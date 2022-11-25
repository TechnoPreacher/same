<?php

	class MenuWalker extends Walker_Nav_Menu {

		function start_lvl( &$output, $depth = 0, $args = null ) { // sub-menu items override.
			$output .= "\n" . ' <div class="submenu" style="display: none;"><ul>' . "\n";
		}

		function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {

			$item = $data_object;

			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
			$output .= $indent . '<li>';
			$attributes = ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
			$item_output = '<a' . $attributes . '>';
			$item_output .= $args->link_before;

			if ( $depth == 1 ) {
				$item_output .= '<span>' . apply_filters( 'the_title', $item->title, $item->ID ) . '</span>' . $args->link_after;
			} else {
				$item_output .= apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			}

			$item_output .= '</a>';

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
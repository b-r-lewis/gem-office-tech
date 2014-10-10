<?php

class custom_main_nav_walker extends Walker_Nav_Menu {

	private $current_parent = "";
	private $current_parent_is_active = false;

	private $wis_parent = false;
	private $is_child = false;
	private $right_after_parent = false;
	private $right_after_end_lvl = false;

	function start_lvl ( &$output, $depth = 0, $args = array() ) {
		$output .= '</span></a>';
	}

	function end_lvl ( &$output, $depth = 0, $args = array() ) {
		$this->is_child = false;
		$this->right_after_end_lvl = true;
		$output .= '</div>';
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		if ( $this->right_after_parent ) {
			$output .= '<div class="main-nav__sub-list ';
			$output .= 'nav-' . $this->current_parent . '__sub ';

			if ( $this->current_parent_is_active ) { $this->current_parent_is_active = false; } $output .= 'is-hidden';

			$output .= '">';	
			$this->right_after_parent = false;
			$this->is_child = true;
		}

		$class_names = '';
		$all_classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes = array( '' );

		$this->is_parent = false;

		if ( !$this->is_child ) {
			$this->is_parent = in_array( 'menu-item-has-children', $all_classes );
			$is_current = false;
			 if ( in_array( 'current-menu-item', $all_classes ) ||  
			 			in_array( 'current-menu-parent', $all_classes ) ) {
			 				$is_current = true;
			 			}

			$classes[0] = $this->is_parent ? 'main-nav__link--has-sub' : 'main-nav__link';
			$classes[1] = 'nav-' . $all_classes[0];
			$classes[2] = $is_current ? 'current' : '';
			if ( $this->is_parent && $is_current ) {
				// $classes[3] = 'main-nav__link--has-active-sub';
				$this->current_parent_is_active = true;
			}
		}

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = strlen( trim( $class_names ) ) > 0 ? ' class="' . esc_attr( $class_names ) . '"' : '';
		$attributes = ! empty( $item->url )    ? ' href="'   . esc_attr( $item->url )    . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';

		$js_toggle = $this->is_parent ? 'js-nav-toggle' : '';

		$output .= $this->is_child ? '' : '<div class="main-nav-link-wrap ' . $js_toggle . '">';
		$output .= '<a ' . $class_names . ' ';
		$output .= $attributes;
		$output .= "><span>$item->title";

		$all_classes = empty( $item->classes ) ? array() : (array) $item->classes;
		if ( in_array( 'menu-item-has-children', $all_classes ) ) {
			$this->right_after_parent = true;
			$this->current_parent = $all_classes[0];
		}
	}

	function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		if ( $this->right_after_end_lvl ) {
			$this->right_after_end_lvl = false;
		} else {
			$output .= '</span></a>';
		}

		if ( !$this->is_child ) {
			$output .= '</div>';
		}
	}

}
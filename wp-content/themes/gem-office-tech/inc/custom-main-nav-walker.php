<?php

class custom_main_nav_walker extends Walker_Nav_Menu {

	private $current_parent = "";
	private $current_parent_is_active = false;

	private $is_child = false;
	private $right_after_parent = false;

	function start_lvl ( &$output, $depth = 0, $args = array() ) {
		$output .= "</span></a>";
	}

	function end_lvl ( &$output, $depth = 0, $args = array() ) {
		$this->is_child = false;
		$output .= "</div>";
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		if ( $this->right_after_parent ) {
			$output .= "<div class=\"main-nav__sub-list ";
			$output .= $this->current_parent . "__sub ";

			( $this->current_parent_is_active ) ? $this->current_parent_is_active = false : $output .= "is-hidden";

			$output .= "\">";	
			$this->right_after_parent = false;
			$this->is_child = true;
		}

		$class_names = "";
		$all_classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes = array( '' );

		if ( !$this->is_child ) {
			$is_parent = in_array( 'menu-item-has-children', $all_classes );
			$is_current = in_array( 'current-menu-item', $all_classes );

			$classes[0] = $is_parent ? 'main-nav__link--has-sub' : 'main-nav__link';
			$classes[1] = $all_classes[0];
			$classes[2] = $is_current ? 'current' : '';
			if ( $is_parent && $is_current ) {
				$classes[3] = 'main-nav__link--has-active-sub';
				$this->current_parent_is_active = true;
			}
		}

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = strlen( trim( $class_names ) ) > 0 ? ' class="' . esc_attr( $class_names ) . '"' : '';
		$attributes = ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

		$output .= "<a " . $class_names . " ";
		$output .= $attributes;
		$output .= "><span>$item->title";

		$all_classes = empty( $item->classes ) ? array() : (array) $item->classes;
		if ( in_array( 'menu-item-has-children', $all_classes ) ) {
			$this->right_after_parent = true;
			$this->current_parent = $all_classes[0];
		}
	}

	function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$output .= "</span></a>";
		// $this->right_after_parent = false;
	}

}

// Almost works
// class custom_main_nav_walker extends Walker_Nav_Menu {

// 	private $current_parent = "";
// 	private $first_of_new_lvl = false;
// 	private $is_child = false;

// 	function start_lvl ( &$output, $depth = 0, $args = array() ) {
// 		$output .= "<div class=\"main-nav__sub-list ";
// 		$output .= $this->current_parent . "__sub";
// 		$output .= " is-hidden\">";	

// 		$this->first_of_new_lvl = true;
// 		$this->is_child = true;
// 	}

// 	function end_lvl ( &$output, $depth = 0, $args = array() ) {
// 		$output .= "</div>";

// 		$this->is_child = false;
// 	}

// 	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
// 		if ( !$this->first_of_new_lvl ) {
// 			$class_names = $value = '';
// 			$all_classes = empty( $item->classes ) ? array() : (array) $item->classes;
			
// 			if ( !$this->is_child ) {
// 				if ( in_array( 'menu-item-has-children', $all_classes ) ) {
// 					$classes = array( 'main-nav__link--has-sub' );
// 					$this->current_parent = $all_classes[0];
// 				} else {
// 					$classes = array( 'main-nav__link' );
// 				}
// 			} else {
// 				$classes = array( 'main-nav__sub-list__link' );
// 			}
			
// 			$classes[1] = $all_classes[0];
// 			$classes[2] = in_array( 'current-menu-item', $all_classes ) ? 'current' : '';
// 	    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
// 	    $class_names = strlen( trim( $class_names ) ) > 0 ? ' class="' . esc_attr( $class_names ) . '"' : '';

// 	    $attributes = ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

// 			// $output .= "<a class=\"main-nav__link\" ";
// 			$output .= "<a " . $class_names . " ";
// 			$output .= $attributes;
// 			$output .= "><span>$item->title";
// 		} else {
// 			$this->first_of_new_lvl = false;
// 		}
// 	}

// 	function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
// 		$output .= "</span></a>";
// 	}

// }
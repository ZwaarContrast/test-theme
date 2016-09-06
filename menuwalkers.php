<?php
/**
 * Menu Walker definitions. Here you can define custom walkers for your menu's.
 *
 * @package   WordPress
 * @subpackage  Zwaar Contrast Boilerplate
 * @since     Zwaar Contrast Boilerplate 1.0
 */

// class headermenu_walker extends Walker_Nav_Menu
// {
//       function start_el(&$output, $item, $depth, $args)
//       {
//           global $wp_query;

//           $class_names = $value = '';

//           //Classes already on the items
//           $classes = empty( $item->classes ) ? array() : (array) $item->classes;
//           $classes[] = 'header-navigation-item';

//           //Join classnames
//           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
//           //Format them into a class attribute
//           $class_names = ' class="'. esc_attr( $class_names ) . '"';

//           //Build the li element
//           $output .= '<li '. $value . $class_names .'>';

//           //Check for attributes
//           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
//           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
//           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
//           $attributes .= ' class="header-navigation-link"';

//           //Output anchor item
//           $item_output = $args->before;
//           $item_output .= '<a'. $attributes .'>';
//           $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID );
//           $item_output .= $args->link_after;
//           $item_output .= '</a>';
//           $item_output .= $args->after;

//           //Apply filters on output
//           $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
//       }
// }
?>
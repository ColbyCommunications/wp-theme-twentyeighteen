<?php
/**
 * Navbar.php
 *
 * @package colbycomms/colby-wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen;

use ColbyComms\SVG\SVG;

/**
 * Handles the main site navigation bar.
 */
class Navbar {
	/**
	 * Adds hooks.
	 *
	 * @param string $class A CSS class (serves as a BEM namespace).
	 * @param array  $args Args to pass to the WP nav menu function.
	 */
	public function __construct( $class = '', $args = [] ) {
		$this->class = $class;
		$this->args = $args;

		add_filter( 'nav_menu_item_id', [ __CLASS__, 'remove_menu_item_id' ] );
		add_filter( 'nav_menu_submenu_css_class', [ $this, 'modify_submenu_classes' ] );
		add_filter( 'nav_menu_css_class', [ $this, 'modify_menu_classes' ] );
		add_filter( 'nav_menu_link_attributes', [ $this, 'modify_link_attributes' ], 10, 2 );
		add_filter( 'walker_nav_menu_start_el', [ $this, 'modify_start_el' ], 10, 3 );
	}

	/**
	 * Removes unnecessary menu item ID.
	 */
	public static function remove_menu_item_id() {
		return '';
	}

	/**
	 * Modifies the classes on a submenu.
	 *
	 * @param array $classes The submenu CSS classes.
	 * @return array The modified classes.
	 */
	public function modify_submenu_classes( $classes ) {
		return array_map(
			function( $cl ) {
				return 'sub-menu' === $cl
					? "{$this->class}__submenu"
					: $cl;
			},
			$classes
		);
	}

	/**
	 * Modifies the classes on a menu.
	 *
	 * @param array $classes The menu CSS classes.
	 * @return array The modified classes.
	 */
	public function modify_menu_classes( $classes ) {
		$classes = array_map(
			function( $cl ) {

				if ( 'menu-item-has-children' === $cl ) {
					return "{$this->class}__has-submenu";
				}

				if ( 'menu-item' === $cl ) {
					return "{$this->class}__item";
				}

				return '';
			},
			$classes
		);

		return array_filter( $classes );
	}

	/**
	 * Modifies the CSS classes on a menu item link.
	 *
	 * @param array  $attr The attributes.
	 * @param object $item Item data.
	 * @return array The modified attributes.
	 */
	public function modify_link_attributes( $attr, $item ) {
		$attr['class'] = "{$this->class}__btn"
			. ( isset( $this->args['link-class'] ) ? " {$this->args['link-class']}" : '' );

		if ( $item->classes[0] ) {
			$attr['class'] .= ' ' . $item->classes[0];
		}

		return $attr;
	}

	/**
	 * Modifies the content at the start of an element.
	 *
	 * @param string $output HTML output.
	 * @param object $item Item details.
	 * @param int    $depth The current menu depth.
	 * @return string Modified HTML output.
	 */
	public function modify_start_el( $output, $item, $depth ) {
		if ( $depth > 0 || ! in_array( 'menu-item-has-children', $item->classes, true ) ) {
			return $output;
		}

		$arrow = SVG::get( 'down-arrow' );

		return "$output
        <button class=\"{$this->class}__btn {$this->class}__submenu-toggler\">
            $arrow
        </button>";
	}

	/**
	 * Renders the menu.
	 *
	 * @return string HTML output.
	 */
	public function render() {
		$menu = wp_nav_menu(
			array_merge(
				[
					'menu' => 'Site Menu',
					'container' => 'nav',
					'echo' => false,
					'menu_class' => "{$this->class}__menu",
					'container_class' => "$this->class small-4",
				],
				$this->args
			)
		);

		return is_string( $menu ) ? $menu : '';
	}
}

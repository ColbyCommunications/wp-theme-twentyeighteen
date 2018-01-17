<?php
/**
 * ThemeEighteen.php
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen;

use Carbon_Fields\Helper\Helper;
use ColbyComms\SVG\SVG;

/**
 * Namespaced utility functions.
 */
class TwentyEighteen {
	/**
	 * Get HTML for the top of an archive page.
	 *
	 * @param array $options Display options.
	 * @return string Rendered HTML.
	 */
	public static function get_archive_header( array $options = [] ) : string {
		ob_start();
		?>

		<header class="container-fluid largest primary pt-7 pb-2 mb-4">
			<div class="container text-center">
				<div>
					<?php if ( isset( $options['content'] ) ) : ?>
						<?php echo $options['content']; ?>
					<?php else : ?>
						<h1><?php the_archive_title(); ?></h1>
					<?php endif; ?>
				</div>
			</div>
		</header>

		<?php
		return ob_get_clean();
	}

	/**
	 * Outputs the main class handler.
	 *
	 * @param array|string $classes CSS classes to apply to the main tag.
	 * @return void
	 */
	public static function main_class( $classes = '' ) : void {
		$classes = is_array( $classes ) ? $classes : explode( ' ', $classes );
		$classes = apply_filters( 'main_class', $classes );

		echo 'class="' . esc_attr( implode( ' ', $classes ) ) . '"';
	}

	/**
	 * Adds defaults to passed-in array.
	 *
	 * @param array $options The passed in array.
	 * @return array The complete set of options.
	 */
	public static function do_option_defaults( $options = [] ) {
		return array_merge(
			[
				'do_background_image' => true,
				'title_size' => 'large-1 large-md-3',
				'width' => '',
				'header_content' => do_shortcode( get_post_meta( get_the_id(), 'header_content', true ) ),
			],
			$options
		);
	}

	/**
	 * Builds inline CSS for the featured image.
	 *
	 * @param array $options The passed-in options for the page header.
	 * @return string The style attribute or an empty string.
	 */
	public static function get_featured_image_style( $options ) {
		$featured_image_style = '';

		if ( $options['do_background_image'] && has_post_thumbnail() ) {
			$url = get_the_post_thumbnail_url( get_the_id(), 'large' );
			$featured_image_style = " style=\"background-image: url($url)\"";
		}

		return $featured_image_style;
	}

	/**
	 * Echoes extra classes to the buffer.
	 *
	 * @param bool $featured_image_exists Whether there's a featured image.
	 */
	public static function extra_classes( $featured_image_exists ) {
		$padding_classes = $featured_image_exists
			? 'pb-8 pt-9'
			: 'pb-3 pt-8';

		echo $padding_classes;
		echo $featured_image_exists
			? ' has-featured-image'
			: '';
	}

	/**
	 * Builds a header for the current page.
	 *
	 * @param array $options Passed-in options.
	 * @return string HTML.
	 */
	public static function get_page_header( $options = [] ) {
		$options = self::do_option_defaults( $options );
		$featured_image_style = self::get_featured_image_style( $options );

		ob_start();

		?>
		<header
			class="container-fluid largest primary <?php self::extra_classes( ! ! $featured_image_style ); ?>"
			<?php echo $featured_image_style; ?>>
			<?php if ( empty( $options['header_content'] ) ) : ?>
				<?php self::default_page_header_content( $options ); ?>
			<?php else : ?>
				<?php echo $options['header_content']; ?>
			<?php endif; ?>
		</header>
		<?php

		return ob_get_clean();
	}

	/**
	 * Provides fallback content for a header where nothing is provided.
	 *
	 * @param array $options Options passed in to the page header function.
	 */
	public static function default_page_header_content( $options = [] ) {
		$subtitle = is_singular()
			? get_post_meta( get_the_id(), 'subtitle', true )
			: '';

		?>
		<div class="container<?php echo empty( $options['width'] ) ? '' : "-{$options['width']}"; ?> text-center">
			<?php echo self::get_parent_page_link(); ?>
			<div class="<?php echo esc_attr( $options['title_size'] ); ?>">
				<h1><?php the_title(); ?></h1>
			</div>
			<?php if ( $subtitle ) : ?>
			<div class="large-2 text-uppercase">
				<h2><?php echo $subtitle; ?></h2>
			</div>
			<?php endif; ?>
		</div>
		<?php
	}

	/**
	 * Gets the HTML for the sidebar called "Main Sidebar".
	 *
	 * @return string Rendered HTML.
	 */
	public static function get_main_sidebar() {
		ob_start();
		if ( is_active_sidebar( 'main-sidebar' ) ) {
			echo '<ul class="list-unstyled">';
			dynamic_sidebar( 'main-sidebar' );
			echo '</ul>';
		}

		return ob_get_clean();
	}

	/**
	 * Builds the HTML for archive pagination.
	 *
	 * @return string HTML.
	 */
	public static function get_post_pagination() {
		$pagination = get_the_posts_pagination(
			[
				'prev_text' => 'Newer',
				'next_text' => 'Older',
			]
		);

		return "
		<div class=\"row\">
			<div class=\"col-12 px-3 mt-5\">
				$pagination
			</div>
		</div>";
	}

	/**
	 * Outputs the main header for a schedule_category taxonomy archive page.
	 *
	 * @param \WP_Term $queried_object The term for the current page.
	 * @return void
	 */
	public static function schedule_archive_header( \WP_Term $queried_object ) {
		ob_start();
		echo '<div>Schedule</div><h1>';
		echo $queried_object->name;
		echo '</h1>';

		echo get_archive_header(
			[
				'content' => ob_get_clean(),
			]
		);
	}

	/**
	 * Prints the sub footer if it is set via theme options.
	 */
	public static function super_footer() {
		$super_footer = apply_filters( 'super_footer_content', Helper::get_theme_option( 'super_footer_content' ) );
		if ( ! empty( $super_footer ) ) {
			echo do_shortcode( $super_footer );
		}
	}

	/**
	 * Get a string represeting the organization address.
	 *
	 * To-do: Provide hooks to modify.
	 *
	 * @return string The rendered HTML.
	 */
	public static function get_address_block() {
		return '
    <address>
        <div class="mb-1">
            <span class="h3 strong text-sans">
                <a href="//colby.edu">Colby College</a>
            </span>
        </div>
        <div>
            4000 Mayflower Hill Drive <br>Waterville, Maine 04901
        </div>
        <div>
            207-859-4000
        </div>
        <div>
            <a href="//colby.edu/contact">Contact Us</a>
        </div>
    </address>';
	}

	/**
	 * Provides details for social icons to display on the site.
	 * TO-DO: Move some of this into theme settings.
	 *
	 * @return array The settings.
	 */
	public static function get_social_icon_settings() {
		return [
			[
				'name' => 'Facebook',
				'url' => apply_filters( 'facebook_url', 'https://www.facebook.com/colbycollege/' ),
				'icon' => SVG::get( 'facebook' ),
			],
			[
				'name' => 'Twitter',
				'url' => apply_filters( 'twitter_url', 'https://twitter.com/ColbyCollege' ),
				'icon' => SVG::get( 'twitter' ),
			],
			[
				'name' => 'Instagram',
				'url' => apply_filters( 'instagram_url', 'https://www.instagram.com/colbycollege/' ),
				'icon' => SVG::get( 'instagram' ),
			],
			[
				'name' => 'Vimeo',
				'url' => apply_filters( 'vimeo_url', 'https://vimeo.com/colbycollege' ),
				'icon' => SVG::get( 'vimeo' ),
			],
		];
	}

	/**
	 * Retreives a set of social icons with Colby accounts.
	 *
	 * @return string The nav type.
	 */
	public static function get_social_icons() {
		ob_start();
		?>
		<div class="mb-3 mt-3">
			<?php foreach ( self::get_social_icon_settings() as $social_link ) : ?>
			<a class="pr-3 text-white" href=<?php echo esc_url( $social_link['url'] ); ?>>
				<?php echo $social_link['icon'] ?: $social_link['name']; ?>
			</a>
			<?php endforeach; ?>
		</div>
		<?php
		return ob_get_clean();
	}

	/**
	 * Render the menu titled 'Global Menu' set on the main site in the installation.
	 *
	 * @return string Rendered HTML.
	 */
	public static function get_global_menu() {
		if ( is_multisite() ) {
			switch_to_blog( 1 );
		}

		$items = is_nav_menu( 'Global Menu' ) ? wp_get_nav_menu_items( 'Global Menu' ) : [];

		if ( is_multisite() ) {
			restore_current_blog();
		}

		return '<ul class="columned-list text-uppercase small-2">' . implode(
			'', array_map(
				function ( $item ) {
					return "<li><a href=\"$item->url\">{$item->title}</a></li>";
				},
				$items
			)
		) . '</ul>';
	}

	/**
	 * Retreives the type of menu set through the theme options.
	 *
	 * @return string The nav type.
	 */
	public static function get_nav_type() {
		static $nav_type;

		if ( empty( $nav_type ) ) {
			$nav_type = Helper::get_theme_option( 'menu_type' );
		}

		return $nav_type;
	}

	/**
	 * Renders a nav intended to stick to the bottom with CSS.
	 *
	 * @param string $class A CSS BEM namespace.
	 * @return string Rendered HTML.
	 */
	public static function render_navbar( $class = 'shrinkable', $args = [] ) {
		// No need for nav menu item ids.
		add_filter( 'nav_menu_item_id', function() {
			return '';
		} );

		// Modify the CSS class for submenus.
		add_filter(
			'nav_menu_submenu_css_class',
			function( $classes, $args ) use ( $class ) {
				return array_map(
					function( $cl ) use ( $class ) {
						return 'sub-menu' === $cl
							? "{$class}__submenu"
							: $cl;
					},
					$classes
				);
			},
			10,
			2
		);

		// Modify the ul's CSS class.
		add_filter(
			'nav_menu_css_class',
			function( $classes ) use ( $class ) {
				$classes = array_map(
					function( $cl ) use ( $class ) {
						if ( 'menu-item-has-children' === $cl ) {
							return "{$class}__has-submenu";
						}

						if ( 'menu-item' === $cl ) {
							return "{$class}__item";
						}

						return '';
					},
					$classes
				);

				return array_filter( $classes );
			},
			10,
			2
		);

		// Add a css class to the nav menu link.
		add_filter(
			'nav_menu_link_attributes',
			function( $attr ) use ( $class, $args ) {
				$attr['class'] = "{$class}__btn"
					. ( isset( $args['link-class'] ) ? " {$args['link-class']}" : '' );

				return $attr;
			}
		);

		// Add a submenu toggle button.
		add_filter(
			'walker_nav_menu_start_el',
			function( $output, $item, $depth ) use ( $class ) {
				if ( $depth > 0 || ! in_array( 'menu-item-has-children', $item->classes, true ) ) {
					return $output;
				}

				$arrow = SVG::get( 'down-arrow' );

				return "$output
				<button class=\"{$class}__btn {$class}__submenu-toggler\">
					$arrow
				</button>";
			},
			10,
			3
		);

		return wp_nav_menu(
			array_merge(
				[
					'menu' => 'Site Menu',
					'container' => 'nav',
					'echo' => false,
					'menu_class' => "{$class}__menu",
					'container_class' => "$class small-4",
				],
				$args
			)
		);
	}

	/**
	 * Prints the sticky nav if it is the chosen navigation type.
	 */
	public static function sticky_nav() {
		if ( 'fixed-bottom' === self::get_nav_type() ) {
			echo self::render_navbar( 'sticky-nav', [ 'link-class' => 'primary btn' ] );
		}
	}

	/**
	 * Prints the sub footer if it is set via theme options.
	 */
	public static function sub_footer() {
		$sub_footer = apply_filters( 'sub_footer_content', Helper::get_theme_option( 'sub_footer_content' ) );
		if ( ! empty( $sub_footer ) ) {
			echo do_shortcode( $sub_footer );
		}
	}

	/**
	 * Builds the text to go in the HTML <title> tag.
	 *
	 * @return string The title.
	 */
	public static function get_head_title() {
		$wp_title = wp_title( '', false );
		$wp_title = $wp_title ? "$wp_title - " : '';
		return $wp_title . get_bloginfo() . ' - Colby College';
	}

	/**
	 * Get the image sizes set for this theme.
	 *
	 * @return array Associative array -- keys are names and values are options to pass to
	 *                           the add image size option.
	 */
	public static function get_image_sizes() {
		return [
			'Big Thumbnail' => [
				'big-thumbnail',
				400,
				400,
				true,
			],
		];
	}

	/**
	 * Provides settings for post types to be registered by the theme.
	 *
	 * @return array An array of post type settings.
	 */
	public static function get_post_types() {
		$post_types = [];

		if ( Helper::get_theme_option( 'do_service_catalog' ) === true ) {
			$post_types['catalog-item'] = [
				'label' => 'Catalog',
				'labels' => [
					'name' => 'Catalog',
					'singular_name' => 'Catalog Item',
				],
				'public' => true,
				'supports' => [
					'title',
					'editor',
					'thumbnail',
					'excerpt',
					'custom-fields',
				],
				'show_in_rest' => true,
			];
		}

		return $post_types;
	}

	/**
	 * Builds a div with a link to the current page's parent.
	 *
	 * @return string HTML.
	 */
	public static function get_parent_page_link() {
		$parent = wp_get_post_parent_id( get_the_id() );

		if ( ! $parent ) {
			return '';
		}

		ob_start();
		?>
	<div class="parent-page-link">
		<a href="<?php echo get_the_permalink( $parent ); ?>">
			<?php echo get_the_title( $parent ); ?>
		</a>
	</div>

		<?php
		return ob_get_clean();
	}

	/**
	 * Retrieves an array of menu items in 'Site Menu'.
	 *
	 * @return array The items.
	 */
	public static function get_site_menu_items() {
		return wp_get_nav_menu_items( 'Site Menu' ) ?: [];
	}

	/**
	 * Adds content after the page header.
	 *
	 * @return void
	 */
	public static function after_page_header() : void {
		echo apply_filters( 'colbycomms_twentyeighteen__after_page_header', '' );
	}
}

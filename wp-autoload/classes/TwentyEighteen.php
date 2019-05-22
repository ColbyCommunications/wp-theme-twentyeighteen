<?php
/**
 * ThemeEighteen.php
 *
 * @package colbycomms/colby-wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen;

use ColbyComms\SVG\SVG;
use ColbyComms\TwentyEighteen\PageHeader;

/**
 * Namespaced utility functions.
 */
class TwentyEighteen {
	/**
	 * Whether to load production assets.
	 *
	 * @var bool
	 */
	const PROD = false;
	/**
	 * Plugin text domain.
	 *
	 * @var string
	 */
	const TEXT_DOMAIN = 'colby-wp-theme-twentyeighteen';
	/**
	 * Vendor name.
	 *
	 * @var string
	 */
	const VENDOR = 'colbycomms';

	/**
	 * Version.
	 *
	 * @var string
	 */
	const VERSION = '1.0.0';

	/**
	 * String preceding this plugin's filter.
	 *
	 * @var string
	 */
	const FILTER_NAMESPACE = self::VENDOR . '__twentyeighteen__';

	const IS_HEADER_TRANSPARENT_FILTER = self::FILTER_NAMESPACE . 'is_header_transperent';
	const MAIN_CLASS_FILTER = self::FILTER_NAMESPACE . 'main_class';
	const AFTER_PAGE_HEADER_FILTER = self::FILTER_NAMESPACE . 'after_page_header';
	const TRANSPARENT_HEADER_CLASS_FILTER = self::FILTER_NAMESPACE . 'transparent_header_class';
	const HEAD_TITLE_FILTER = self::FILTER_NAMESPACE . 'head_title';
	const SUPER_FOOTER_CONTENT_FILTER = self::FILTER_NAMESPACE . 'super_footer_content';
	const SUB_FOOTER_CONTENT_FILTER = self::FILTER_NAMESPACE . 'sub_footer_content';
	const SOCIAL_ICON_SETTINGS_FILTER = self::FILTER_NAMESPACE . 'social_icon_settings';

	/**
	 * Outputs the main class handler.
	 *
	 * @param array|string $classes CSS classes to apply to the main tag.
	 * @return void
	 */
	public static function main_class( $classes = '' ) : void {
		$classes = is_array( $classes ) ? $classes : explode( ' ', $classes );

		/**
		 * Filters the classes applied to the <main> element.
		 *
		 * @param array $classes
		 */
		$classes = apply_filters( self::MAIN_CLASS_FILTER, $classes );

		echo 'class="' . esc_attr( implode( ' ', $classes ) ) . '"';
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

		PageHeader::show(
			[
				'type' => 'archive',
				'content' => ob_get_clean(),
			]
		);
	}

	/**
	 * Prints the sub footer if it is set via theme options.
	 */
	public static function super_footer() {
		/**
		 * Filters the HTML content displayed above the main site footer.
		 *
		 * @param string
		 */
		$super_footer = apply_filters(
			self::SUPER_FOOTER_CONTENT_FILTER,
			ThemeOptions::get( ThemeOptions::SUPER_FOOTER_CONTENT_KEY )
		);

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
		ob_start();

		get_template_part( 'parts/address' );

		return ob_get_clean();
	}

	/**
	 * Provides details for social icons to display on the site.
	 * TO-DO: Move some of this into theme settings.
	 *
	 * @return array The settings.
	 */
	public static function get_social_icon_settings() {
		$settings = [
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

		/**
		 * Filters the social icon settings.
		 *
		 * @param array
		 */
		return apply_filters( self::SOCIAL_ICON_SETTINGS_FILTER, $settings );
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
			$nav_type = ThemeOptions::get( 'menu_type' );
		}

		return $nav_type;
	}

	/**
	 * Renders a nav intended to stick to the bottom with CSS.
	 *
	 * @param string $class A CSS BEM namespace.
	 * @param array  $args Arguments for this function and wp_nav_menu.
	 * @return string Rendered HTML.
	 */
	public static function render_navbar( $class = 'shrinkable', $args = [] ) {
		$navbar = new Navbar( $class, $args );

		$output = $navbar->render();

		$navbar->shut_down();

		return $output;
	}

	/**
	 * Prints the sticky nav if it is the chosen navigation type.
	 */
	public static function sticky_nav() {
		if ( 'fixed-bottom' === self::get_nav_type() ) {
			echo self::render_navbar(
				'sticky-nav',
				[
					'link-class' => 'primary btn',
					'depth' => 1,
				]
			);
		}
	}

	/**
	 * Prints the sub footer if it is set via theme options.
	 */
	public static function sub_footer() {
		/**
		 * Filters the subfooter content.
		 *
		 * @param string HTML output.
		 */
		$sub_footer = apply_filters(
			self::SUB_FOOTER_CONTENT_FILTER,
			ThemeOptions::get( ThemeOptions::SUB_FOOTER_CONTENT_KEY ) ?: ''
		);

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

		/**
		 * Filters the title in the document head.
		 *
		 * @param string
		 */
		return apply_filters( self::HEAD_TITLE_FILTER, $wp_title . get_bloginfo() . ' - Colby College' );
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
			'Hero' => [
				'hero',
				1600,
				500,
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

		if ( ThemeOptions::get( ThemeOptions::DO_SERVICE_CATALOG_KEY ) === true ) {
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
				'taxonomies' => [ 'service-category' ],
			];
		}

		return $post_types;
	}

	/**
	 * Provides settings for taxonomies created by this theme.
	 *
	 * @return array A list of taxonomies and their settings.
	 */
	public static function get_taxonomies() : array {
		return [
			'service-category' => [
				'post_type' => 'catalog-item',
				'args' => [
					'label' => 'Service Categories',
					'labels' => [
						'name' => 'Service Category',
						'singular_name' => 'Service Category',
					],
					'hierarchical' => true,
					'show_admin_column' => true,
				],
			],
		];
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
		echo apply_filters( self::AFTER_PAGE_HEADER_FILTER, '' );
	}

	/**
	 * Returns whether the header bar is transparent.
	 *
	 * @return bool Yes or no.
	 */
	public static function is_header_transparent() : bool {
		/**
		 * Filters whether the header bar is transparent.
		 *
		 * @return bool
		 */
		return apply_filters( self::IS_HEADER_TRANSPARENT_FILTER, false ) === true;
	}

	/**
	 * Returns the CSS class to apply to a transparent header bar.
	 *
	 * @return string
	 */
	public static function get_transparent_header_class() : string {
		/**
		 * Filters the CSS class applied to make the header bar transparent.
		 *
		 * @var string The CSS class.
		 */
		return apply_filters( self::TRANSPARENT_HEADER_CLASS_FILTER, 'dark-transparent' );
	}
}

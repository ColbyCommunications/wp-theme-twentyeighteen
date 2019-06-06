<?php
/**
 * ThemeOptions.php
 *
 * @package colbycomms/colby-wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen;

use Carbon_Fields\Helper\Helper;
use Carbon_Fields\{Container, Field};

/**
 * Sets up an options page using Carbon Fields.
 */
class ThemeOptions {
	const ANALYTICS_KEY = 'analytics_code';
	const MENU_TYPE_KEY = 'menu_type';
	const SUPER_FOOTER_CONTENT_KEY = 'super_footer_content';
	const SUB_FOOTER_CONTENT_KEY = 'sub_footer_content';
	const DO_EVENT_LISTINGS_KEY = 'do_event_listings';
	const DO_SERVICE_CATALOG_KEY = 'do_service_catalog';

	/**
	 * Adds hooks.
	 */
	public function __construct() {
		add_action( 'carbon_fields_register_fields', [ $this, 'create_container' ] );
		add_action( 'carbon_fields_register_fields', [ $this, 'add_plugin_options' ] );
	}

	/**
	 * Creates the options page.
	 */
	public function create_container() {
		$this->container = Container::make( '__theme_options', TwentyEighteen::TEXT_DOMAIN . '__options', 'Theme Options' );
	}

	/**
	 * Adds the plugin options.
	 */
	public function add_plugin_options() {
		$this->container->add_fields(
			[
				Field::make( 'radio', self::MENU_TYPE_KEY, 'Navigation Display' )
					->add_options(
						[
							'none' => 'No site navigation.',
							'across-top' => 'Across the top of the main content area.',
							'fixed-bottom' => 'In a bar across the bottom of the page (limited to six items with no subnavigation).',
							'hamburger' => 'In a full-screen modal revealed by a menu button (ideal for sites with complex navigation).',
						]
					)
					->set_default_value( 'none' )
					->set_help_text( 'Choose the type of navigation to display on this site for the main site menu ("Site Menu" under Appearance -> Menus).' ),

				Field::make( 'textarea', self::SUPER_FOOTER_CONTENT_KEY, 'Content above the footer.' )
					->set_help_text( 'Add content above the footer.' ),

				Field::make( 'textarea', self::SUB_FOOTER_CONTENT_KEY, 'Content below the footer.' )
					->set_help_text( 'Add content at the very bottom of the page. Useful for fixed items. Shortcodes are allowed.' ),

				Field::make( 'separator', 'features_separator', 'Features' ),

				Field::make( 'checkbox', self::DO_EVENT_LISTINGS_KEY, 'Event Listings' )
					->set_default_value( false )
					->set_help_text( 'Features enabling the creation of grouped schedules of events.' ),

				Field::make( 'checkbox', self::DO_SERVICE_CATALOG_KEY, 'Service Catalog' )
					->set_default_value( false )
					->set_help_text( 'Listings of services offered by a department.' ),

				Field::make( 'textarea', self::ANALYTICS_KEY, 'Google Analytics code' )
					->set_help_text( 'Place this site\'s Analytics embed code in this box.' ),
			]
		);
	}

	/**
	 * Get theme option.
	 *
	 * @param string $key The option key.
	 * @return mixed The value.
	 */
	public static function get( string $key ) {
		return Helper::get_theme_option( $key );
	}
}

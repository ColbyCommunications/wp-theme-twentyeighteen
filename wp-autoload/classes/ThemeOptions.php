<?php
/**
 * ThemeOptions.php
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen;

use Carbon_Fields\{Container, Field};

/**
 * Sets up an options page using Carbon Fields.
 */
class ThemeOptions {
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
		$this->container = Container::make( 'theme_options', 'Theme Options' );
	}

	/**
	 * Adds the plugin options.
	 */
	public function add_plugin_options() {
		$this->container->add_fields(
			[
				Field::make( 'radio', 'menu_type', 'Navigation Display' )
					->add_options(
						[
							'none' => 'No site navigation.',
							'fixed-bottom' => 'In a bar across the bottom of the page (limited to six items with no subnavigation).',
							'hamburger' => 'In a full-screen modal revealed by a menu button (ideal for sites with complex navigation).',
						]
					)
					->set_default_value( 'none' )
					->set_help_text( 'Choose the type of navigation to display on this site for the main site menu ("Site Menu" under Appearance -> Menus).' ),
				Field::make( 'textarea', 'super_footer_content', 'Content above the footer.' )
					->set_help_text( 'Add content above the footer.' ),
				Field::make( 'textarea', 'sub_footer_content', 'Content below the footer.' )
					->set_help_text( 'Add content at the very bottom of the page. Useful for fixed items. Shortcodes are allowed.' ),
				Field::make( 'separator', 'crb_style_options', 'Features' ),
				Field::make( 'checkbox', 'do_event_listings', 'Event Listings' )
					->set_default_value( false )
					->set_help_text( 'Features enabling the creation of grouped schedules of events.' ),
				Field::make( 'checkbox', 'do_service_catalog', 'Service Catalog' )
					->set_default_value( false )
					->set_help_text( 'Listings of services offered by a department.' ),
			]
		);
	}
}

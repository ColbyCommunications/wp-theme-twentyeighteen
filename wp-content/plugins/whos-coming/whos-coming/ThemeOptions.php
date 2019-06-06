<?php
/**
 * Creates the plugin admin page.
 *
 * @package colbycomms/whos-coming
 */

namespace ColbyComms\WhosComing;

use Carbon_Fields\Helper\Helper;
use Carbon_Fields\{Container, Field};
use ColbyComms\WhosComing\WpFunctions as WP;

/**
 * Sets up an options page using Carbon Fields.
 */
class ThemeOptions {
	const DISPLAY_FIELDS_KEY = 'whos_coming__display_fields';
	const SEARCH_FIELD_KEY = 'whos_coming__search_field';
	const SELECT_FIELD_KEY = 'whos_coming__select_field';
	const DATA_SOURCE_KEY = 'whos_coming__data_source';
	const DATA_FORMAT_KEY = 'whos_coming__data_format';
	const DATA_KEY = 'whos_coming__data';
	const DATA_URL_KEY = 'whos_coming__data_url';

	/**
	 * Adds hooks.
	 */
	public function __construct() {
		WP::add_action( 'carbon_fields_register_fields', [ $this, 'create_container' ] );
		WP::add_action( 'carbon_fields_register_fields', [ $this, 'add_plugin_options' ] );
	}

	/**
	 * Creates the options page.
	 */
	public function create_container() {
		$this->container = Container::make( 'theme_options', 'Who\'s Coming Options' )
			->set_page_parent( 'plugins.php' );
	}

	/**
	 * Provides an array of fields to add to the container.
	 *
	 * @return array An array of fields.
	 */
	public static function get_fields() : array {
		return [
			Field::make( 'complex', self::DISPLAY_FIELDS_KEY, 'Who\'s Coming fields to display' )
				->set_layout( 'grid' )
				->add_fields(
					[
						Field::make( 'text', 'whos_coming__field_key', 'Field key' )
							->set_help_text( 'The field key must correspond to a key in the data provided below. Otherwise the field will be ignored.' ),

						Field::make( 'text', 'whos_coming__field_display_name', 'Display text' )
							->set_help_text( 'E.g., "Visitor Name" for "name" field; "Class Year" for "class_year" field.' ),
					]
				),

			Field::make( 'text', self::SEARCH_FIELD_KEY, 'Search Field' )
				->set_help_text( 'Enter the field key (from above) to search with a search box. If this field is empty, no search will be included.' ),

			Field::make( 'text', self::SELECT_FIELD_KEY, 'Select Field' )
				->set_help_text( 'Enter a field key (from above) to provide a select input for.' ),

			Field::make( 'radio', self::DATA_FORMAT_KEY, 'Data format' )
					->add_options(
						[
							'json' => 'JSON',
							'csv' => 'CSV',
						]
					)
					->set_default_value( 'json' ),

			Field::make( 'radio', self::DATA_SOURCE_KEY, 'Data source' )
					->add_options(
						[
							'text' => 'Text field',
							'url' => 'URL',
						]
					)
					->set_default_value( 'text' ),

			Field::make( 'text', self::DATA_URL_KEY, 'Data URL' )
				->set_help_text( 'This must be a public URL. The data will be cached periodically.' )
				->set_conditional_logic(
					[
						[
							'field' => self::DATA_SOURCE_KEY,
							'compare' => '=',
							'value' => 'url',

						],
					]
				),

			Field::make( 'textarea', self::DATA_KEY, 'Data' )
				->set_help_text( 'Paste the data into the box.' )
				->set_conditional_logic(
					[
						[
							'field' => self::DATA_SOURCE_KEY,
							'compare' => '=',
							'value' => 'text',

						],
					]
				),
		];
	}

	/**
	 * Adds the plugin options.
	 */
	public function add_plugin_options() {
		$this->container->add_fields( self::get_fields() );
	}

	/**
	 * Get a theme option.
	 *
	 * @param string $key The option key.
	 * @return mixed The value.
	 */
	public static function get( string $key ) {
		static $cache;
		$cache = $cache ?: [];
		if ( isset( $cache[ $key ] ) ) {
			return $cache[ $key ];
		}
		$value = Helper::get_theme_option( $key ) ?: '';
		$cache[ $key ] = $value;
		return $value;
	}
}

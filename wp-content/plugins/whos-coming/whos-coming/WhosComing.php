<?php
/**
 * WhosComing.php
 *
 * @package colbycomms/whos-coming
 */

namespace ColbyComms\WhosComing;

use ColbyComms\WhosComing\{DataFetcher, WpFunctions as WP};

/**
 * Handles the [whos-coming] shortcode.
 */
class WhosComing {
	/**
	 * Whether to load minified scripts and styles.
	 *
	 * @var bool
	 */
	const PROD = true;

	/**
	 * The vendor name for this package.
	 *
	 * @var string
	 */
	const VENDOR = 'colbycomms';

	/**
	 * The plugin version number.
	 *
	 * @var string
	 */
	const VERSION = '1.0.0';

	/**
	 * The plugin text domain.
	 *
	 * @var string
	 */
	const TEXT_DOMAIN = 'whos-coming';

	/**
	 * String to prepend to all filters.
	 *
	 * @var string
	 */
	const FILTER_PREFIX = self::VENDOR . '__whos_coming__';

	/**
	 * The  filter to override the dist directory.
	 *
	 * @var string
	 */
	const DIST_FILTER = self::FILTER_PREFIX . 'dist';

	/**
	 * The filter to override whether to enqueue this plugin's style.
	 *
	 * @var string
	 */
	const ENQUEUE_STYLE_FILTER = self::FILTER_PREFIX . 'enqueue_style';

	/**
	 * The filter to override whether to enqueue this plugin's script.
	 *
	 * @var string
	 */
	const ENQUEUE_SCRIPT_FILTER = self::FILTER_PREFIX . 'enqueue_script';

	/**
	 * The shortcode tag.
	 *
	 * @var string
	 */
	const SHORTCODE_TAG = 'whos-coming';

	/**
	 * Add hook callbacks.
	 */
	public function __construct() {
		WP::add_action( 'template_redirect', [ $this, 'set_up' ] );

		if ( ! WP::shortcode_exists( self::SHORTCODE_TAG ) ) {
			WP::add_shortcode(
				self::SHORTCODE_TAG,
				[ $this, 'whos_coming_shortcode' ]
			);
		}
	}

	/**
	 * Should the setup work be done.
	 *
	 * @return boolean Yes or no.
	 */
	public static function should_set_up() : bool {
		global $post;

		return WP::is_singular()
			&& ! empty( $post )
			&& is_object( $post )
			&& ! empty( $post->post_content )
			&& WP::has_shortcode( $post->post_content, self::SHORTCODE_TAG );
	}

	/**
	 * Gets the data ready for the shortcode.
	 *
	 * @return void
	 */
	public function set_up() {
		if ( ! self::should_set_up() ) {
			return;
		}

		WP::add_action( 'wp_enqueue_scripts', [ __CLASS__, 'enqueue_scripts_and_styles' ] );
		$this->data = self::get_data();
		$this->fields = ThemeOptions::get( ThemeOptions::DISPLAY_FIELDS_KEY );
		$this->search_field = ThemeOptions::get( ThemeOptions::SEARCH_FIELD_KEY );
		$this->select_field = ThemeOptions::get( ThemeOptions::SELECT_FIELD_KEY );
	}

	/**
	 * Gets data from the DataFetcher class.
	 *
	 * @return array The data array.
	 */
	public static function get_data() : array {
		return DataFetcher::fetch();
	}

	/**
	 * The shortcode callback.
	 *
	 * @return string HTML output.
	 */
	public function whos_coming_shortcode() : string {
		ob_start();

		self::render( $this->data, $this->fields, $this->search_field, $this->select_field );

		return ob_get_clean();
	}

	/**
	 * Renders a search input if a search field has been provided.
	 *
	 * @param string $field The provided search field.
	 * @return void
	 */
	public static function render_search_field( string $field ) : void {
		if ( ! $field ) {
			return;
		}

		$field_text = str_replace( '_', ' ', $field );
		?>
<label class="whos-coming__search">
	<span>Search</span>
	<input type="search" placeholder="Search by <?php echo $field_text; ?>" data-whos-coming-search="<?php echo WP::esc_attr( $field ); ?>" />
</label>
		<?php
	}

	/**
	 * Renders the first row.
	 *
	 * @param array $fields The fields.
	 * @return void
	 */
	public static function render_key_bar( array $fields = [] ) : void {
		?>
		<div class="whos-coming__row whos-coming__row--key">
		<?php foreach ( $fields as $field ) : ?>
			<span data-whos-coming-column="<?php echo WP::esc_attr( $field['whos_coming__field_key'] ); ?>"
				class="whos-coming__cell whos-coming__<?php echo WP::esc_attr( $field['whos_coming__field_key'] ); ?>">
				<?php echo WP::wp_kses_post( $field['whos_coming__field_display_name'] ); ?>
			</span>
		<?php endforeach; ?>
		</div>
		<?php
	}

	/**
	 * Outputs the HTML.
	 *
	 * @param array  $data Items to iterate through.
	 * @param array  $fields Fields to include.
	 * @param string $search_field The field to provide a search box for.
	 * @param string $select_field The field to provide a select input for.
	 * @return void
	 */
	public static function render( array $data = [], array $fields = [], string $search_field = '', string $select_field = '' ) : void {
		?>
<?php if ( $search_field || $select_field ) : ?>
<div class="whos-coming__search-select">
	<?php if ( $search_field ) : ?>
	<div class="whos-coming__search-container">
		<?php self::render_search_field( $search_field ); ?>
	</div>
	<?php endif; ?>
	<?php if ( $select_field ) : ?>
	<div class="whos-coming__select-container">
		<select name="whos-coming__select" data-whos-coming-select="<?php echo $select_field; ?>">
			<option>-- Select <?php echo str_replace( '_', ' ', $select_field ); ?> --</option>
		</select>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>
<div data-whos-coming class="whos-coming">
	<?php self::render_key_bar( $fields ); ?>
	<?php foreach ( array_filter( $data ) as $person ) : ?>
		<div class="whos-coming__row">
		<?php foreach ( $fields as $field ) : ?>
			<span data-whos-coming-data="<?php echo WP::esc_attr( $field['whos_coming__field_key'] ); ?>"
				class="whos-coming__cell whos-coming__<?php echo WP::esc_attr( $field['whos_coming__field_key'] ); ?>">
				<?php echo WP::wp_kses_post( $person[ $field['whos_coming__field_key'] ] ); ?>
			</span>
		<?php endforeach; ?>
		</div>
	<?php endforeach; ?>
</div>
		<?php
	}

	/**
	 * Enqueues plugin assets.
	 *
	 * @return void
	 */
	public static function enqueue_scripts_and_styles() : void {
		$dist = self::get_dist_directory();
		$min = self::PROD ? '.min' : '';
		/**
		 * Filters whether to enqueue this plugin's script.
		 *
		 * @param bool Yes or no.
		 */
		if ( apply_filters( self::ENQUEUE_SCRIPT_FILTER, true ) === true ) {
			wp_enqueue_script(
				self::TEXT_DOMAIN,
				$dist . self::TEXT_DOMAIN . "$min.js",
				[],
				self::VERSION,
				true
			);
		}

		/**
		 * Filters whether to enqueue this plugin's stylesheet.
		 *
		 * @param bool Yes or no.
		 */
		if ( apply_filters( self::ENQUEUE_STYLE_FILTER, true ) === true ) {
			wp_enqueue_style(
				self::TEXT_DOMAIN,
				$dist . self::TEXT_DOMAIN . "$min.css",
				[],
				self::VERSION
			);
		}
	}

	/**
	 * Gets the plugin's dist/ directory URL, whether this package is installed as a plugin
	 * or in a theme via composer. If the package is in neither of those places and the filter
	 * is not used, this whole thing will fail.
	 *
	 * @return string The URL.
	 */
	public static function get_dist_directory() : string {
		/**
		 * Filters the URL location of the /dist directory.
		 *
		 * @param string The URL.
		 */
		$dist = apply_filters( self::DIST_FILTER, '' );

		if ( ! empty( $dist ) ) {
			return $dist;
		}

		if ( file_exists( dirname( __DIR__, 3 ) . '/plugins' ) ) {
			return plugin_dir_url( dirname( __DIR__ ) . '/index.php' ) . '/dist/';
		}

		return get_template_directory_uri() . '/vendor/' . self::VENDOR . '/' . self::TEXT_DOMAIN . '/dist/';
	}
}

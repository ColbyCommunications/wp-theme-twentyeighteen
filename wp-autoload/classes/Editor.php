<?php
/**
 * Editor.php
 * 
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen;

class Editor {
	/**
	 * Names of blocks to register.
	 * 
	 * @var array
	 */
	const BLOCKS = [
		'divider',
		'themed-block'
	];

	/**
	 * Add hooks.
	 */
	public function __construct() {
		add_action( 'init', [ __CLASS__, 'register_editor_assets' ] );
		add_action( 'init', [ __CLASS__, 'register_blocks' ] );
	}

	/**
	 * Registers editor-related assets.
	 *
	 * @return void
	 */
	public static function register_editor_assets() {
		$min  = TwentyEighteen::PROD === true ? '.min' : '';
		$dist = get_template_directory_uri() . '/dist';

		wp_register_style(
			TwentyEighteen::TEXT_DOMAIN . '-editor',
			"$dist/" . TwentyEighteen::TEXT_DOMAIN . "-editor$min.css",
			['wp-edit-blocks']
		);

		wp_register_script(
			TwentyEighteen::TEXT_DOMAIN . '-editor',
			"$dist/" . TwentyEighteen::TEXT_DOMAIN . "-editor$min.js",
			[ 'wp-blocks', 'wp-element' ]
		);
	}

	/**
	 * Registers editor blocks.
	 *
	 * @return void
	 */
	public static function register_blocks() {
		if ( ! function_exists( 'register_block_type' ) ) {
			return;
		}

		foreach ( self::BLOCKS as $block_tag ) {
			register_block_type(
				TwentyEighteen::VENDOR . "/$block_tag",
				[
					'editor_script' => TwentyEighteen::TEXT_DOMAIN . '-editor',
					'editor_style' => TwentyEighteen::TEXT_DOMAIN . '-editor',
					'style' => TwentyEighteen::TEXT_DOMAIN . '-blocks',
				]
			);
		}
	}
}
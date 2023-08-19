<?php
namespace Wpbean\WpbeanBlocksStarter\Blocks;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Blocks class
 */
class Blocks {

	/**
	 * Class Constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'blocks_init' ) );
		if ( version_compare( $GLOBALS['wp_version'], '5.7', '<' ) ) {
			add_filter( 'block_categories', array( $this, 'register_block_category' ), 10, 2 );
		} else {
			add_filter( 'block_categories_all', array( $this, 'register_block_category' ), 10, 2 );
		}
	}

	/**
	 * Register custom category for blocks
	 *
	 * @param array $categories Array of categories for block types.
	 * @param array $post The current block editor context.
	 * @return array
	 */
	public function register_block_category( $categories, $post ) {
		return array_merge(
			array(
				array(
					'slug'  => 'wpbean-blocks-starter',
					'title' => esc_html__( 'WpBean Blocks Starter', 'wpbean-blocks-starter' ),
				),
			),
			$categories,
		);
	}

	/**
	 * Register custom blocks
	 *
	 * @return void
	 */
	public function blocks_init() {
		// Generates an array of directory paths based on the build folder.
		$block_directories = glob( WPBEAN_BLOCKS_STARTER_PATH . '/build/blocks/*', GLOB_ONLYDIR );
		if ( $block_directories && ! empty( $block_directories ) ) {
			foreach ( $block_directories as $block ) {
				register_block_type( $block );
			}
		}
	}
}

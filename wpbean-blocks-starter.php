<?php
/**
 * Plugin Name:       WpBean Blocks Starter
 * Plugin URI:        https://wpbean.com/
 * Description:       WpBean Blocks Starter boilerplate plugin for multiple blocks.
 * Version:           1.0
 * Author:            wpbean
 * Author URI:        https://wpbean.com
 * Text Domain:       wpbean-blocks-starter
 * Domain Path:       /languages
 *
 * @package WpBean Blocks Starter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Plugin Main class
 */
final class WpBean_Blocks_Starter {

	/**
	 * Class Constructor.
	 */
	private function __construct() {
		$this->define_constants();
		add_action( 'plugins_loaded', array( $this, 'plugin_init' ) );
	}

	/**
	 * Initializes instance.
	 */
	public static function init() {
		static $instance = false;

		if ( ! $instance ) {
			$instance = new self();
		}

		return $instance;
	}

	/**
	 * Define plugin Constants.
	 */
	public function define_constants() {
		define( 'WPBEAN_BLOCKS_STARTER_PATH', __DIR__ );
	}

	/**
	 * Initialize the plugin.
	 *
	 * @return void
	 */
	public function plugin_init() {
		$this->init_classes();
	}

	/**
	 * Do stuff upon plugin activation.
	 *
	 * @return void
	 */
	public function activate() {
	}

	/**
	 * Initialize the classes.
	 *
	 * @return void
	 */
	public function init_classes() {
		new Wpbean\WpbeanBlocksStarter\Blocks\Blocks();
		if ( is_admin() ) {
			new Wpbean\WpbeanBlocksStarter\Admin\Admin();
		}
	}

	/**
	 * Initialize plugin for localization.
	 *
	 * @return void
	 */
	public function localization_setup() {
		load_plugin_textdomain( 'wpbean-blocks-starter', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}
}

/**
 * Initialize the main plugin.
 *
 * @return \WpBean_Blocks_Starter
 */
function wpbean_blocks_starter_plugin_init() {
	return WpBean_Blocks_Starter::init();
}

/**
 * Kick-off the plugin.
 */
wpbean_blocks_starter_plugin_init();

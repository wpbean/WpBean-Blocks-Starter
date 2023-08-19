<?php
namespace Wpbean\WpbeanBlocksStarter\Admin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Admin class
 */
class Admin {

	/**
	 * Class Constructor.
	 */
	public function __construct() {
		// add_action( 'admin_notices', array( $this, 'test_plugin' ) );
	}

	public function test_plugin() {
		echo 'Imran Khan';
	}
}

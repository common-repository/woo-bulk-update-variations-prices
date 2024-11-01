<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://itpathsolutions.com
 * @since             1.0.0
 * @package           itpathbvm
 *
 * @wordpress-plugin
 * Plugin Name:       Woocommerce Bulk update variations Prices 
 * Plugin URI:        http://itpathsolutions.com/itpathbvm-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Itpathsolutions
 * Author URI:        http://itpathsolutions.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       itpathbvm
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'itpathbvm_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-itpathbvm-activator.php
 */
function activate_itpathbvm() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-itpathbvm-activator.php';
	return itpathbvm_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-itpathbvm-deactivator.php
 */
function deactivate_itpathbvm() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-itpathbvm-deactivator.php';
	return itpathbvm_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_itpathbvm' );
register_deactivation_hook( __FILE__, 'deactivate_itpathbvm' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-itpathbvm.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_itpathbvm() {

	$plugin = new itpathbvm();
	$plugin->run();

}
run_itpathbvm();

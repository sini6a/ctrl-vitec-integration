<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://ctrl.mk
 * @since             1.0.0
 * @package           Ctrl_Vitec_Integration
 *
 * @wordpress-plugin
 * Plugin Name:       CTRL Vitec Integration
 * Plugin URI:        https://ctrl.mk
 * Description:       CTRL Integration Plugin for Vitec Real Estate
 * Version:           1.0.0
 * Author:            CTRL
 * Author URI:        https://ctrl.mk
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ctrl-vitec-integration
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
define( 'CTRL_VITEC_INTEGRATION_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ctrl-vitec-integration-activator.php
 */
function activate_ctrl_vitec_integration() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ctrl-vitec-integration-activator.php';
	Ctrl_Vitec_Integration_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ctrl-vitec-integration-deactivator.php
 */
function deactivate_ctrl_vitec_integration() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ctrl-vitec-integration-deactivator.php';
	Ctrl_Vitec_Integration_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ctrl_vitec_integration' );
register_deactivation_hook( __FILE__, 'deactivate_ctrl_vitec_integration' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ctrl-vitec-integration.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ctrl_vitec_integration() {

	$plugin = new Ctrl_Vitec_Integration();
	$plugin->run();

}
run_ctrl_vitec_integration();

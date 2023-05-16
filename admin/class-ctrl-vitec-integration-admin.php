<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://ctrl.mk
 * @since      1.0.0
 *
 * @package    Ctrl_Vitec_Integration
 * @subpackage Ctrl_Vitec_Integration/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ctrl_Vitec_Integration
 * @subpackage Ctrl_Vitec_Integration/admin
 * @author     CTRL <info@ctrl.mk>
 */
class Ctrl_Vitec_Integration_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_action( 'admin_init', array($this, 'ctrl_settings_init') );
		add_action( 'admin_menu', array($this, 'ctrl_options_page') );

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ctrl_Vitec_Integration_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ctrl_Vitec_Integration_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/ctrl-vitec-integration-admin.css', array(), $this->version, 'all');

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ctrl_Vitec_Integration_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ctrl_Vitec_Integration_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/ctrl-vitec-integration-admin.js', array('jquery'), $this->version, false);

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */

	public function create_custom_post_type()
	{

		/**
		 * This function shows the options menu in the admin area.
		 */

		$args = array(
			'public' => true,
			'has_archive' => false,
			'supports' => array('title'),
			'exclude_from_search' => true,
			'publicly_queryable' => false,
			'capability' => 'manage_options',
			'labels' => array(
				'name' => 'Testing',
				'singular_name' => 'Test',
			),
			'menu_icon' => 'dashicons-admin-settings',
		);

		register_post_type('ctrl_vitec', $args);

	}


	/**
	 * @internal never define functions inside callbacks.
	 * these functions could be run multiple times; this would result in a fatal error.
	 */

	/**
	 * custom option and settings
	 */
	function ctrl_settings_init()
	{
		// Register a new setting for "ctrl" page.
		register_setting('ctrl', 'ctrl_options');

		// Register a new section in the "ctrl" page.
		add_settings_section(
			'ctrl_section_developers',
			__('Vitec Integration Options', 'ctrl'),
			array($this, 'ctrl_section_developers_callback'),
			'ctrl'
		);

		// Register a new field in the "ctrl_section_developers" section, inside the "ctrl" page.
		add_settings_field(
			'username_field',
			// As of WP 4.6 this value is used only internally.
			// Use $args' label_for to populate the id inside the callback.
			__('Vitec Username', 'ctrl'),
			array($this, 'ctrl_field_username_cb'),
			'ctrl',
			'ctrl_section_developers',
			array(
				'label_for' => 'ctrl_field_username',
				'class' => 'ctrl_row',
				'ctrl_custom_data' => 'custom',
			)
		);
		add_settings_field(
			'password_field',
			// As of WP 4.6 this value is used only internally.
			// Use $args' label_for to populate the id inside the callback.
			__('Vitec Password', 'ctrl'),
			array($this, 'ctrl_field_password_cb'),
			'ctrl',
			'ctrl_section_developers',
			array(
				'label_for' => 'ctrl_field_password',
				'class' => 'ctrl_row',
				'ctrl_custom_data' => 'custom',
			)
		);
	}


	/**
	 * Developers section callback function.
	 *
	 * @param array $args  The settings array, defining title, id, callback.
	 */
	function ctrl_section_developers_callback($args)
	{
		?>
		<p id="<?php echo esc_attr($args['id']); ?>"><?php esc_html_e('Follow the white rabbit.', 'ctrl'); ?></p>
		<?php
	}

	/**
	 * Pill field callback function.
	 *
	 * WordPress has magic interaction with the following keys: label_for, class.
	 * - the "label_for" key value is used for the "for" attribute of the <label>.
	 * - the "class" key value is used for the "class" attribute of the <tr> containing the field.
	 * Note: you can add custom key value pairs to be used inside your callbacks.
	 *
	 * @param array $args
	 */
	function ctrl_field_username_cb($args)
	{
		// Get the value of the setting we've registered with register_setting()
		$options = get_option('ctrl_options');
		?>
		<input
			name="ctrl_options[<?php echo esc_attr( $args['label_for'] ); ?>]" placeholder="Your Vitec Username" type="text" value="<?php echo isset($options[$args['label_for']]) ? ($options[$args['label_for']]) : ''; ?>" />
		<?php
	}
	function ctrl_field_password_cb($args)
	{
		// Get the value of the setting we've registered with register_setting()
		$options = get_option('ctrl_options');
		?>
		<input
			name="ctrl_options[<?php echo esc_attr( $args['label_for'] ); ?>]" placeholder="Your Vitec Password" type="password" value="<?php echo isset($options[$args['label_for']]) ? ($options[$args['label_for']]) : ''; ?>" />
		<?php
	}

	/**
	 * Top level menu callback function
	 */
	function ctrl_options_page_html()
	{
		// check user capabilities
		if (!current_user_can('manage_options')) {
			return;
		}

		// add error/update messages

		// check if the user have submitted the settings
		// WordPress will add the "settings-updated" $_GET parameter to the url
		if (isset($_GET['settings-updated'])) {
			// add settings saved message with the class of "updated"
			add_settings_error('ctrl_messages', 'ctrl_message', __('Settings Saved', 'ctrl'), 'updated');
		}

		// show error/update messages
		settings_errors('ctrl_messages');
		?>
		<div class="wrap">
			<h1>
				<?php echo esc_html(get_admin_page_title()); ?>
			</h1>
			<form action="options.php" method="post">
				<?php
				// output security fields for the registered setting "ctrl"
				settings_fields('ctrl');
				// output setting sections and their fields
				// (sections are registered for "ctrl", each field is registered to a specific section)
				do_settings_sections('ctrl');
				// output save settings button
				submit_button('Save Settings');
				?>
			</form>
		</div>
		<?php
	}

	/**
	 * Add the top level menu page.
	 */
	public function ctrl_options_page()
	{
		add_submenu_page( 'options-general.php', 'CTRL', 'Vitec Integration Options', 'manage_options', 'ctrl', array($this, 'ctrl_options_page_html') );
	}



	/**
	 * Register our ctrl_options_page to the admin_menu action hook.
	 */



}
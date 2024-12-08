<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://ctrl.mk
 * @since      1.0.0
 *
 * @package    Ctrl_Vitec_Integration
 * @subpackage Ctrl_Vitec_Integration/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ctrl_Vitec_Integration
 * @subpackage Ctrl_Vitec_Integration/public
 * @author     CTRL <info@ctrl.mk>
 */

require_once 'includes/Property.php';

class Ctrl_Vitec_Integration_Public
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
	 * Variables needed for fetching options.
	 */
	private $username, $password, $customer_id;

	private $errors;

	private $properties;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		// Safely get the options
		$ctrl_options = get_option('ctrl_options');
		if (is_array($ctrl_options)) {
			$this->username = $ctrl_options['ctrl_field_username'] ?? null;
			$this->password = $ctrl_options['ctrl_field_password'] ?? null;
			$this->customer_id = $ctrl_options['ctrl_field_customer_id'] ?? null;
		} else {
			$this->username = null;
			$this->password = null;
			$this->customer_id = null;
		}


		$this->errors = [];
		// Create new object of class Property
		$this->properties = new Property();
		// Update available properties and store them in corresponding property type
		$this->properties->updateProperties();

		add_action('init', array($this, 'custom_rewrite_rule'));
		add_filter('query_vars', array($this, 'custom_query_vars'));
		add_action('template_redirect', array($this, 'process_object_number'));
		add_shortcode('vitec-integration-shortcode', array($this, 'ctrl_vitec_integration_shortcode'));
		add_action('wp_enqueue_styles', array($this, 'enqueue_styles'));
		add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
		add_action('wp_ajax_load_api_image', array($this, 'my_ajax_handler'));
		add_action('wp_ajax_nopriv_load_api_image', array($this, 'my_ajax_handler'));
		add_action('wp_ajax_load_documents', array($this, 'download_documents'));
		add_action('wp_ajax_nopriv_load_documents', array($this, 'download_documents'));
		add_action('wp', array($this, 'schedule_remove_temporary_files_cron'));
		add_action('remove_temporary_files_event', array($this, 'remove_temporary_files'));
	}

	// Function to process the object number
	function process_object_number()
	{
		$object_number = get_query_var('object_search');
		// Get the object number from the query variable

		// Check if the object number is not empty
		if (!empty($object_number)) {
			// $premises;
			// Iterate through $this->houses
			foreach ($this->properties->houses as $house) {
				if ($house["id"] === $object_number) {
					$redirect_url = '/index.php?page_id=224&object_id=' . $object_number . '&object_type=house';
					wp_redirect($redirect_url);
					exit;
				}
			}
			foreach ($this->properties->cottages as $cottage) {
				if ($cottage["id"] === $object_number) {
					$redirect_url = '/index.php?page_id=224&object_id=' . $object_number . '&object_type=cottage';
					wp_redirect($redirect_url);
					exit;
				}
			}
			foreach ($this->properties->housingCooperativeses as $housingCooperative) {
				if ($housingCooperative["id"] === $object_number) {
					$redirect_url = '/index.php?page_id=224&object_id=' . $object_number . '&object_type=housingCooperative';
					wp_redirect($redirect_url);
					exit;
				}
			}
			foreach ($this->properties->plots as $plot) {
				if ($plot["id"] === $object_number) {
					$redirect_url = '/index.php?page_id=224&object_id=' . $object_number . '&object_type=plot';
					wp_redirect($redirect_url);
					exit;
				}
			}
			foreach ($this->properties->projects as $project) {
				if ($project["id"] === $object_number) {
					$redirect_url = '/index.php?page_id=224&object_id=' . $object_number . '&object_type=project';
					wp_redirect($redirect_url);
					exit;
				}
			}
			foreach ($this->properties->farms as $farm) {
				if ($farm["id"] === $object_number) {
					$redirect_url = '/index.php?page_id=224&object_id=' . $object_number . '&object_type=farm';
					wp_redirect($redirect_url);
					exit;
				}
			}
			foreach ($this->properties->condominiums as $condominium) {
				if ($condominium["id"] === $object_number) {
					$redirect_url = '/index.php?page_id=224&object_id=' . $object_number . '&object_type=condominium';
					wp_redirect($redirect_url);
					exit;
				}
			}
			foreach ($this->properties->foreignProperties as $property) {
				if ($property["id"] === $object_number) {
					$redirect_url = '/index.php?page_id=224&object_id=' . $object_number . '&object_type=foreignProperty';
					wp_redirect($redirect_url);
					exit;
				}
			}
			foreach ($this->properties->premises as $premise) {
				if ($premise["id"] === $object_number) {
					$redirect_url = '/index.php?page_id=224&object_id=' . $object_number . '&object_type=premise';
					wp_redirect($redirect_url);
					exit;
				}
			}
		}
	}


	// Add a custom rewrite rule
	function custom_rewrite_rule()
	{
		add_rewrite_rule('^object/([^/]*)(?:/.*)?/?$', 'index.php?page_id=224&object_search=$matches[1]', 'top');
	}

	// Register the custom query variable
	function custom_query_vars($query_vars)
	{
		$query_vars[] = 'object_search';
		return $query_vars;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/ctrl-vitec-integration-public.css', array(), $this->version, 'all');

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/ctrl-vitec-integration-public.js', array('jquery'), $this->version, false);
		wp_localize_script(
			$this->plugin_name,
			'my_ajax_obj',
			array('ajax_url' => admin_url('admin-ajax.php')),
		);
	}

	function remove_temporary_files()
	{
		// Specify the directory path
		$directory = plugin_dir_path(__FILE__) . 'public/documents/';

		// Check if the directory exists
		if (!is_dir($directory)) {
			error_log('Temporary files directory does not exist: ' . $directory);
			return;
		}

		// Get a list of files in the directory
		$files = scandir($directory);

		// Loop through each file
		foreach ($files as $file) {
			// Check if the file is not a directory and starts with a dot (hidden file)
			if (is_file($directory . $file) && substr($file, 0, 1) !== '.') {
				// Remove the file
				unlink($directory . $file);
			}
		}
	}


	// Hook the custom function into the WordPress cron system
// You can adjust the frequency of the cron job as needed
// In this example, the cron job will run daily at midnight
	function schedule_remove_temporary_files_cron()
	{
		if (!wp_next_scheduled('remove_temporary_files_event')) {
			wp_schedule_event(strtotime('midnight'), 'daily', 'remove_temporary_files_event');
		}
	}

	/**
	 * Handles my AJAX request.
	 */
	function my_ajax_handler()
	{
		// Handle the ajax request here
		$image_id = wp_unslash($_POST['image_id']);
		$id = wp_unslash($_POST['id']);
		echo json_encode(array("id" => $id, "image" => $this->properties->getImage($image_id)));
		wp_die(); // All ajax handlers die when finished
	}

	function download_documents()
	{
		$document_id = wp_unslash($_POST['document_id']);
		$id = wp_unslash($_POST['id']);
		echo json_encode(array("id" => $id, "path" => $this->properties->getFile($document_id)));
		wp_die();
	}

	function ctrl_vitec_integration_shortcode($atts = [], $content = null)
	{
		// Check if variables are not set do not execute the function and report to user
		if ($this->username == null || $this->password == null || $this->customer_id == null) {
			array_push($this->errors, '<h5 class="center"><strong>Please fill in your API credentials in administration settings!</strong></h5>');
			ob_start();
			include_once('partials/error.php');
			return ob_get_clean();
		}

		if (isset($_GET['object_id'])) {
			if (isset($_GET['object_type']) && $_GET['object_type'] == 'housingCooperative') {
				$object = $this->properties->getHousingCooperative($_GET['object_id']);
			} else if (isset($_GET['object_type']) && $_GET['object_type'] == 'house') {
				$object = $this->properties->getHouse($_GET['object_id']);
			} else if (isset($_GET['object_type']) && $_GET['object_type'] == 'cottage') {
				$object = $this->properties->getCottage($_GET['object_id']);
			} else if (isset($_GET['object_type']) && $_GET['object_type'] == 'condominium') {
				$object = $this->properties->getCondominium($_GET['object_id']);
			} else if (isset($_GET['object_type']) && $_GET['object_type'] == 'farm') {
				$object = $this->properties->getFarm($_GET['object_id']);
			} else if (isset($_GET['object_type']) && $_GET['object_type'] == 'foreignProperty') {
				$object = $this->properties->getForeignProperty($_GET['object_id']);
			} else if (isset($_GET['object_type']) && $_GET['object_type'] == 'plot') {
				$object = $this->properties->getPlot($_GET['object_id']);
			} else if (isset($_GET['object_type']) && $_GET['object_type'] == 'premise') {
				$object = $this->properties->getPremise($_GET['object_id']);
			} else if (isset($_GET['object_type']) && $_GET['object_type'] == 'project') {
				$object = $this->properties->getProject($_GET['object_id']);
			}

			$agent = $this->properties->getAgent($object['assignment']['responsibleBroker']);

			ob_start();
			include_once('partials/object-view.php');
			return ob_get_clean();
		} else {
			ob_start();
			include_once('partials/object-listing.php');
			return ob_get_clean();
		}
	}
}
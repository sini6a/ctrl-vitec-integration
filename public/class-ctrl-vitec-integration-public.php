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

class Property
{
	private $houses, $cottages, $housingCooperativeses, $plots, $projects, $farms, $condominiums, $foreignProperties, $premises;

	private $placeholder;

	private $username, $password, $customer_id;

	private $errors;

	function __construct()
	{
		// fetch data from the api
		$this->username = get_option('ctrl_options')['ctrl_field_username'];
		$this->password = get_option('ctrl_options')['ctrl_field_password'];
		$this->customer_id = get_option('ctrl_options')['ctrl_field_customer_id'];

		$this->placeholder = plugin_dir_url(__FILE__) . 'images/ctrl-vitec-integration-placeholder.png';
	}

	function fetch($URL = "https://connect.maklare.vitec.net/Estate/GetEstateList", $request = null, $post = false, $binary = false)
	{
		// Check if variables are not set do not execute the function and report to user
		if ($this->username == null || $this->password == null || $this->customer_id == null) {
			array_push($this->errors, '<h5 class="center"><strong>Please fill in your API credentials in administration settings!</strong></h5>');
			ob_start();
			include_once('partials/error.php');
			return ob_get_clean();
		}

		$ch = curl_init();

		if ($post == true) {
			curl_setopt($ch, CURLOPT_POST, true);
		}
		if ($binary == true) {
			set_time_limit(0);
			$fp = fopen(dirname(__FILE__) . '/localfile.tmp', 'w+');
			curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
			curl_setopt($ch, CURLOPT_TIMEOUT, 600);
			curl_setopt($ch, CURLOPT_FILE, $fp);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		}
		curl_setopt($ch, CURLOPT_USERNAME, $this->username);
		curl_setopt($ch, CURLOPT_PASSWORD, $this->password);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $URL);

		if ($request) {
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
			curl_setopt(
				$ch,
				CURLOPT_HTTPHEADER,
				array(
					'Content-Type: application/json',
					'Content-Length: ' . strlen($request)
				)
			);
		}

		$result = curl_exec($ch);

		if (curl_errno($ch)) {
			die(curl_getinfo($ch));
		}

		$info = curl_getinfo($ch);
		curl_close($ch);
		if ($binary == true) {
			fclose($fp);
		}

		$http_code = $info["http_code"];
		if ($http_code == 401) {
			// Användarnamnet eller lösenordet är felaktigt

		}
		if ($http_code == 403) {
			// Begärt data som det saknas åtkomst till

		}
		if ($http_code == 500) {
			// Oväntat fel, kontakta Vitec

		}
		if ($http_code == 400) {
			$json = json_decode($result, true);
			// Hantera valideringsfel, presenteras i $json
		}

		if ($binary == true) {
			return '/public/localfile.tmp';
		} else {
			return json_decode($result, true);
		}
	}

	function updateProperties($URL = "https://connect.maklare.vitec.net/Estate/GetEstateList")
	{
		// Check if variables are not set do not execute the function and report to user
		if ($this->username == null || $this->password == null || $this->customer_id == null) {
			array_push($this->errors, '<h5 class="center"><strong>Please fill in your API credentials in administration settings!</strong></h5>');
			ob_start();
			include_once('partials/error.php');
			return ob_get_clean();
		}
		$status = '
			[{
			  "name": "Till Salu", "name": "Kommande",
			}]
		';
		$request = '{
			"customerId":"' . $this->customer_id . '",
			"statuses":' . $status . ',
			"typeOfDate":0
		}';

		$data = $this->fetch($URL, $request);

		if (count($data) > 0) {
			$data = $data[0];
			// Available variables: $houses, $cottages, $housingCooperativeses, $plots, $projects, $farms, $condominiums, $foreignProperties, $premises
			$this->houses = $data["houses"];
			$this->cottages = $data["cottages"];
			$this->housingCooperativeses = $data["housingCooperativeses"];
			$this->plots = $data["plots"];
			$this->farms = $data["farms"];
			$this->condominiums = $data["condominiums"];
			$this->foreignProperties = $data["foreignProperties"];
			$this->premises = $data["premises"];
		}


	}

	function getStatuses($URL = "https://connect.maklare.vitec.net/Estate/GetStatuses")
	{
		// Check if variables are not set do not execute the function and report to user
		if ($this->username == null || $this->password == null || $this->customer_id == null) {
			array_push($this->errors, '<h5 class="center"><strong>Please fill in your API credentials in administration settings!</strong></h5>');
			ob_start();
			include_once('partials/error.php');
			return ob_get_clean();
		}

		$data = $this->fetch($URL);

		var_dump($data);
	}

	function getAgent($id)
	{

		$URL = "https://connect.maklare.vitec.net/User/GetUser?UserId=$id&CustomerId=$this->customer_id";

		return $this->fetch($URL);
	}

	function getFile($id, $extension = "pdf")
	{

		// Check if variables are not set do not execute the function and report to user
		if ($this->username == null || $this->password == null || $this->customer_id == null) {
			array_push($this->errors, '<h5 class="center"><strong>Please fill in your API credentials in administration settings!</strong></h5>');
			ob_start();
			include_once('partials/error.php');
			return ob_get_clean();
		}

		$URL = "https://connect.maklare.vitec.net/File/GetFile?customerId=$this->customer_id&fileId=$id";

		$filename = "doc-" . $id . "-" . rand(100000, 999999) . '.' . $extension;
		$destination_path = dirname(__FILE__) . '/documents/' . $filename;
		$fp = fopen($destination_path, "w+");

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_USERNAME, "$this->username");
		curl_setopt($ch, CURLOPT_PASSWORD, "$this->password");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $URL);
		curl_setopt($ch, CURLOPT_FILE, $fp);

		$result = curl_exec($ch);

		if (curl_errno($ch)) {
			die(curl_getinfo($ch));
		}

		$info = curl_getinfo($ch);
		curl_close($ch);

		$http_code = $info["http_code"];
		if ($http_code == 401) {
			// Användarnamnet eller lösenordet är felaktigt
		}
		if ($http_code == 403) {
			// Begärt data som det saknas åtkomst till
		}
		if ($http_code == 500) {
			// Oväntat fel, kontakta Vitec
		}
		if ($http_code == 400) {
			$json = json_decode($result, true);
			// Hantera valideringsfel, presenteras i $json
		}

		fclose($fp);

		ob_start();
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="' . $filename . '"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($destination_path));

		ob_clean();
		ob_end_flush();

		return '/wp-content/plugins/ctrl-vitec-integration/public/documents/' . $filename;
	}

	function getImage($id = null)
	{
		// Check if variables are not set do not execute the function and report to user
		if ($id == null || $this->username == null || $this->password == null || $this->customer_id == null) {
			array_push($this->errors, '<h5 class="center"><strong>Please fill in your API credentials in administration settings!</strong></h5>');
			ob_start();
			include_once('partials/error.php');
			return ob_get_clean();
		}
		$URL = "https://connect.maklare.vitec.net/Image/GetImage?customerId=$this->customer_id&imageId=$id";

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_USERNAME, $this->username);
		curl_setopt($ch, CURLOPT_PASSWORD, $this->password);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $URL);

		$result = curl_exec($ch);

		if (curl_errno($ch)) {
			die(curl_getinfo($ch));
		}

		$info = curl_getinfo($ch);
		curl_close($ch);

		$http_code = $info["http_code"];
		if ($http_code == 401) {
			// Användarnamnet eller lösenordet är felaktigt
		}
		if ($http_code == 403) {
			// Begärt data som det saknas åtkomst till
		}
		if ($http_code == 500) {
			// Oväntat fel, kontakta Vitec
		}
		if ($http_code == 400) {
			$json = json_decode($result, true);
			// Hantera valideringsfel, presenteras i $json
			var_dump($json);
			return $this->placeholder;
		}


		// TODO: Gör något med resultatet

		$im = imagecreatefromstring($result);

		// imagedestroy($im);


		ob_start();

		imagejpeg($im);
		$image_data = ob_get_contents();

		ob_end_clean();

		return "data:image/jpeg;base64," . base64_encode($image_data);

	}

	function getHouse($id = null)
	{
		if ($id) {

			$URL = "https://connect.maklare.vitec.net/Estate/GetHouse?estateId=$id&customerId=$this->customer_id&onlyFutureViewings=False";

			return $this->fetch($URL);
		} else {
			return $this->houses;
		}
	}
	function getCottage($id = null)
	{
		if ($id) {

			$URL = "https://connect.maklare.vitec.net/Estate/GetCottage?estateId=$id&customerId=$this->customer_id&onlyFutureViewings=False";

			return $this->fetch($URL);
		} else {
			return $this->cottages;
		}
	}
	function getHousingCooperative($id = null)
	{
		if ($id) {

			$URL = "https://connect.maklare.vitec.net/Estate/GetHousingCooperative?estateId=$id&customerId=$this->customer_id&onlyFutureViewings=False";

			return $this->fetch($URL);
		} else {
			return $this->housingCooperativeses;
		}
	}

	function getPlot($id = null)
	{
		if ($id) {

			$URL = "https://connect.maklare.vitec.net/Estate/GetPlot?estateId=$id&customerId=$this->customer_id&onlyFutureViewings=False";

			return $this->fetch($URL);
		} else {
			return $this->plots;
		}
	}
	function getProject($id = null)
	{
		if ($id) {

			$URL = "https://connect.maklare.vitec.net/Estate/GetProject?estateId=$id&customerId=$this->customer_id&onlyFutureViewings=False";

			return $this->fetch($URL);
		} else {
			return $this->projects;
		}
	}
	function getFarm($id = null)
	{
		if ($id) {

			$URL = "https://connect.maklare.vitec.net/Estate/GetFarm?estateId=$id&customerId=$this->customer_id&onlyFutureViewings=False";

			return $this->fetch($URL);
		} else {
			return $this->farms;
		}
	}
	function getCondominium($id = null)
	{
		if ($id) {

			$URL = "https://connect.maklare.vitec.net/Estate/GetCondominium?estateId=$id&customerId=$this->customer_id&onlyFutureViewings=False";

			return $this->fetch($URL);
		} else {
			return $this->condominiums;
		}

	}
	function getForeignProperty($id = null)
	{
		if ($id) {

			$URL = "https://connect.maklare.vitec.net/Estate/GetForeignProperty?estateId=$id&customerId=$this->customer_id&onlyFutureViewings=False";

			return $this->fetch($URL);
		} else {
			return $this->foreignProperties;
		}

	}

	function getPremise($id = null)
	{
		if ($id) {

			$URL = "https://connect.maklare.vitec.net/Estate/GetPremises?estateId=$id&customerId=$this->customer_id&onlyFutureViewings=False";

			return $this->fetch($URL);
		} else {
			return $this->premises;
		}

	}
}

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

		$this->username = get_option('ctrl_options')['ctrl_field_username'];
		$this->password = get_option('ctrl_options')['ctrl_field_password'];
		$this->customer_id = get_option('ctrl_options')['ctrl_field_customer_id'];

		add_action('init', function () {
			add_rewrite_rule('([^/]*)/', 'index.php?page_id=224', 'top');
		});
		add_shortcode('vitec-integration-shortcode', array($this, 'ctrl_vitec_integration_shortcode'));
		add_action('wp_enqueue_styles', array($this, 'enqueue_styles'));
		add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
		add_action('wp_ajax_load_api_image', array($this, 'my_ajax_handler'));
		add_action('wp_ajax_nopriv_load_api_image', array($this, 'my_ajax_handler'));
		add_action('wp_ajax_load_documents', array($this, 'download_documents'));
		add_action('wp_ajax_nopriv_load_documents', array($this, 'download_documents'));

		$this->errors = [];
		// Create new object of class Property
		$this->properties = new Property();
		// Update available properties and store them in corresponding property type
		$this->properties->updateProperties();

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

		// Check if object id is available in GET request.
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
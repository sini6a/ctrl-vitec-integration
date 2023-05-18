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
class Cat {
	public $fact;

	public function __construct() {

		$request = "https://catfact.ninja/fact";
		$response = file_get_contents($request);
		$data = json_decode($response, true);
		$this->fact = $data["fact"];

	}

	public function getFact() {
		return $this->fact;
	}

}

class Property {
	private $houses, $cottages, $housingCooperativeses, $plots, $projects, $farms, $condominiums, $foreignProperties, $premises;

	function __construct() {
		// fetch data from the api

		// parse the fetched data

		// save data to $this
	}

	function getHouses() {
		return $this->houses;
	}
	function getCottages() {
		return $this->cottages;
	}
	function getHousing() {
		return $this->housingCooperativeses;
	}
	function getPlots() {
		return $this->plots;
	}
	function getProjects() {
		return $this->projects;
	}
	function getFarms() {
		return $this->farms;
	}
	function getCondominiums() {
		return $this->condominiums;
	}
	function getForeignProperties() {
		return $this->foreignProperties;
	}

	function getPremises() {
		return $this->premises;
	}
}

class Ctrl_Vitec_Integration_Public {

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
	private $username, $password;

	private $objects;

	private $placeholder;
	private $object_1;
	private $object_2;
	private $object_3;

	private $cat;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		
		$this->username = get_option('ctrl_options')['ctrl_field_username'];
		$this->password = get_option('ctrl_options')['ctrl_field_password'];

		$this->placeholder = plugin_dir_url( __FILE__ ) . 'images/ctrl-vitec-integration-placeholder.png';

		$this->object_1 = array(
			"id" => 1,
			"title" => "Vila i Göteborg",
			"price" => "2,000,000.00",
			"location" => "Göteborg",
			"description" => "Vackert vila mitt i centrum!",
		);

		$this->object_2 = array(
			"id" => 2,
			"title" => "Lägenhet i Stenpiren",
			"price" => "3,500,00.00",
			"location" => "Göteborg",
			"description" => "Vackert lägenhet mitt i stan!",
		);

		$this->object_3 = array(
			"id" => 3,
			"title" => "Tömt utanför Umeå",
			"price" => "1,500,00.00",
			"location" => "Umeå",
			"description" => "Stör tömt säljs utanför Umeå!",
		);

		$this->objects = [$this->object_1, $this->object_2, $this->object_3];

		add_shortcode('testing_shortcode', array($this, 'tbare_wordpress_plugin_demo'));
		add_action('wp_enqueue_styles', array($this, 'enqueue_styles') );

		$this->cat = new Cat();
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ctrl-vitec-integration-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ctrl-vitec-integration-public.js', array( 'jquery' ), $this->version, false );

	}

	function tbare_wordpress_plugin_demo($atts = [], $content = null) {
		if(isset($_GET['object_id'])){
			$object = $this->objects[$_GET['object_id'] - 1];
			

			ob_start();
			include_once( 'partials/object-view.php' );
			return ob_get_clean();
		} else {
			ob_start();
			include_once( 'partials/object-listing.php' );
			return ob_get_clean();
		}
	}
}

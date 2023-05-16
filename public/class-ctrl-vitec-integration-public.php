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
	 * Variables needed for fetching data.
	 */
	private $username;
	private $password;

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
		add_shortcode('testing_shortcode', array($this, 'tbare_wordpress_plugin_demo'));

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
		$Content = "<style>\r\n";
		$Content .= "h3.demoClass {\r\n";
		$Content .= "color: #26b158;\r\n";
		$Content .= "}\r\n";
		$Content .= "</style>\r\n";
		$Content .= '<h3 class="demoClass">Check it out!</h3>';


		$object_listing_title = $this->username;
		$object_listing_main_image = "http://localhost/wp-content/uploads/2023/05/frakt.png";

		
		// Begin output buffering here. Any output below will be stored in a buffer.
		ob_start();

			// Return, as previously used, doesn't help in this context.
			include_once( 'partials/ctrl-vitec-integration-public-display.php' );
	
		// Return (and delete unlike ob_get_contents()) the content of the buffer.
		return ob_get_clean();
		# return "<p>Testiranjeeeeee</p>";
	}

	function fetch_all_objects() {

	}

}

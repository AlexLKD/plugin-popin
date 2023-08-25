<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://acf.fr
 * @since      1.0.0
 *
 * @package    Plugin_Popin
 * @subpackage Plugin_Popin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_Popin
 * @subpackage Plugin_Popin/admin
 * @author     acf <acf@acf.fr>
 */
class Plugin_Popin_Admin
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
	}

	// admin's page creation

	public function wp_popup_display_settings_pages()
	{
		add_menu_page('Réglages plugin popin', 'Réglages plugin popin', 'manage_options', $this->plugin_name, array($this, 'wp_popup_display_settings_pages_include'), 'https://media.discordapp.net/attachments/838359232985694238/1143802407566975067/duck_1.png?width=25&height=25');
	}

	public function wp_popup_display_settings_pages_include()
	{
		include_once('partials/ad_wp_popup_display_settings_pages.php');
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
		 * defined in Plugin_Popin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Popin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/plugin-popin-admin.css', array(), $this->version, 'all');
	}

	function enqueue_plugin_styles()
	{
		wp_enqueue_style('wp-core-styles', false); // Inclut les styles de base de WordPress
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
		 * defined in Plugin_Popin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Popin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/plugin-popin-admin.js', array('jquery'), $this->version, false);
	}

	// register the datas passed in form
	public function wp_popup_register_option_in_database()
	{
		if (empty($_POST)) return;
		
		// var_dump($_POST["form-action"]); 
		if ($_POST["form-action"] == "register-in-database") {
			$idPopin = $_POST["popin-id-name"];
			$template_option = "plugin_popin_" . $idPopin . "_";
			add_option($template_option . "description", $_POST["description"]);
			add_option($template_option . "image", $_POST["image"]);
			add_option($template_option . "button", $_POST["btn"]);
			add_option($template_option . "color-bg", $_POST["color-bg"]);
			add_option($template_option . "color-btn", $_POST["color-btn"]);
			add_option($template_option . "color-txt", $_POST["color-txt"]);
			add_option($template_option . "activated", $_POST["activated"]);
		}
		
	}


	public function wp_popup_update_popin_activation_option() {
		if (empty($_POST)) return;

		if ($_POST["form-action"] == "update-activate") {
			// var_dump($_POST);
			$idPopin = $_POST["id-popin"];
			$template_option = "plugin_popin_";
			$template_option_with_id = "plugin_popin_" . $idPopin . "_";
			update_option($template_option_with_id . "activated", 1);




			$alloptions = wp_load_alloptions();

			$model = 'plugin_popin_';
			$filteredOptions = array();

			foreach ($alloptions as $key => $value) {
				if (strpos($key, $model) === 0) {
					$filteredOptions[$key] = $value;
				}
			}
			// var_dump($filteredOptions);


			$groupedOptions = array();

			foreach ($filteredOptions as $key => $value) {

				$parts = explode('_', $key);
				$groupName = $parts[2];
				if((!(in_array($groupName, $groupedOptions))) && (!(empty($groupName)))) {
					$groupedOptions[] = $groupName;
				} 				

				// if (!isset($groupedOptions[$groupName])) {
				// 	$groupedOptions[$groupName] = array();
				// }

				// $groupedOptions[$groupName][$key] = $value;
			}
			// var_dump($groupedOptions);

			foreach($groupedOptions as $value) {
				if($value != $idPopin) {
					update_option("" . $template_option . $value . "_activated", 0);
					// var_dump("" . $template_option . $value . "_activated", get_option("" . $template_option . $value . "_activated"));
				}
			}

		}

	}

	
	public function wp_popup_delete_option_in_database()
	{
		if (empty($_POST)) return;
	
		if ($_POST["form-action"] == "delete") {
			$idPopin = $_POST["id-popin"];
			$template_option = "plugin_popin_" . $idPopin . "_";
	
			// Assurez-vous que l'utilisateur est autorisé à effectuer cette action
			if (current_user_can('manage_options')) {
				// Supprimez chaque option individuellement
				delete_option($template_option . "description");
				delete_option($template_option . "image");
				delete_option($template_option . "button");
				delete_option($template_option . "color-bg");
				delete_option($template_option . "color-btn");
				delete_option($template_option . "color-txt");
				delete_option($template_option . "activated");
			} else {
				// Gérez le cas où l'utilisateur n'est pas autorisé
				echo "Vous n'avez pas les autorisations nécessaires pour effectuer cette action.";
			}
		}
	}

}
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
		$idPopin = $_POST["popin-id-name"];
		$template_option = "plugin_popin_" . $idPopin . "_";
		add_option($template_option . "description", $_POST["description"]);
		add_option($template_option . "image", $_POST["image"]);
		add_option($template_option . "button", $_POST["btn"]);
		add_option($template_option . "color-bg", $_POST["color-bg"]);
		add_option($template_option . "color-btn", $_POST["color-btn"]);
	}
}

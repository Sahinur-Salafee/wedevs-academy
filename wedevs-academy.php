<?php
/**
 * Plugin Name:       Wedevs Acadeny Plugin
 * Plugin URI:        https://wedevs-academy.com
 * Description:       Handle the academy with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Sahinur Salafee
 * Author URI:        https://sahinur-salafee.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       wedevs-academy-plugin
 * Domain Path:       /languages
 */

 if( ! defined('ABSPATH')) {
    exit;
 }

 
/**
 * The main plugin class
 *
 */


 final class WeDevs_Academy {

   /**
    * Plugin Version
    * 
    * @var string
    */
   const VERSION = '1.0';

   /**
    * class constructor
    */
    
   private function __construct()
   {
      $this-> define_constents();

      /**
       * Activation Hook
       */
      register_activation_hook(__FILE__, [$this, 'activate']);
   }
   

   /**
    * Initialize a Singleton instance
    *
    * @return Wedevs_Academy
    */

   public static function init () {
      static $instance = false;

      if(! $instance) {
         $instance = new self();
      }

      return $instance;
   }

   /**
    * Define the plugin constents
    *
    * @return void
    */

   public function define_constents() {
      define('WD_ACADEMY_VERSION', self::VERSION);
      define('WD_ACADEMY_FILE', __FILE__);
      define('WD_ACADEMY_PATH', __DIR__);
      define('WD_ACADEMY_URL', plugins_url('', WD_ACADEMY_FILE) );
      define('WD_ACADEMY_ASSETS', WD_ACADEMY_URL . '/assets');
   }

   /**
    * Plugin activation
    *
    * @return void
    */

   public function activate() {
      $installed = get_option('wp_academy_installed');
      if( ! $installed) {
         update_option('wp_academy_installed', time());
      }
      
      update_option('wp_academy_version', WD_ACADEMY_VERSION);
   }
 }

/**
 * Initialize the main plugin
 *
 * @return /Wedevs_Academy
 */
 function wedevs_academy () {
   return WeDevs_Academy::init();
 }

 // kick of the plugin
 wedevs_academy();
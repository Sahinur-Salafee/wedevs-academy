<?php 

namespace Wedevs\Academy;

class Installer {

    /**
     * Run the Installer
     *
     * @return void
     */

     
    public function run()
    {
        $this-> add_version();
        $this-> create_tables();
    }


    public function add_version()
    {
        $installed       = get_option('wp_academy_installed');

        if( ! $installed) {
            update_option('wp_academy_installed', time());
        }
      
        update_option('wp_academy_version', WD_ACADEMY_VERSION);
    }

    /**
     * Create the database tables.
     */

    public function create_tables()
    {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();

        $schema          = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ac_addresses` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(100) NOT NULL,
            `address` varchar(255) DEFAULT NULL,
            `phone` varchar(30) DEFAULT NULL,
            `created_by` bigint(20) NOT NULL,
            `created_at` datetime NOT NULL,
            PRIMARY KEY (`id`)
        ) $charset_collate";

        if( ! function_exists('dbDelta')) {
            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        }

        dbDelta($schema);
    }
}
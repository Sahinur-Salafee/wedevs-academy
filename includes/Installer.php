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
        $installed = get_option('wp_academy_installed');

        if( ! $installed) {
            update_option('wp_academy_installed', time());
        }
      
        update_option('wp_academy_version', WD_ACADEMY_VERSION);
    }

    public function create_tables()
    {
        
    }
}
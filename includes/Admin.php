<?php 

namespace Wedevs\Academy;

/** 
 * The admin class
 */

 class Admin {

    function __construct()
    {

        /**
        * Initialize Menu Class
        */
        new Admin\Menu();
        $this -> action_handler();
    }

    public function action_handler()
    {
        $addressbook = new Admin\Addressbook();

        add_action('admin_init',[$addressbook , 'form_handler']);
    }
 }
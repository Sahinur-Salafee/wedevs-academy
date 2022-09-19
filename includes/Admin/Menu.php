<?php

namespace Wedevs\Academy\Admin;

/**
 * The Menu Handle Class
 */

class Menu {

    function __construct()
    {
        add_action('admin_menu', [ $this,'admin_menu'] );
    }

    public function admin_menu () {

        $parent_slug = 'wedevs-academy';
        $capability = 'manage_options';
        add_menu_page(__('weDevs Academy', 'wedevs-academy'), __('Academy', 'wedevs-academy'), 'manage_options', 'wedevs-academy', [$this, 'address_book_page'], 'dashicons-welcome-learn-more');
        add_submenu_page($parent_slug, __('Address Book', 'wedevs-academy'), __('Address Book', 'wedevs-academy'), $capability, $parent_slug, [$this, 'address_book_page']);
        add_submenu_page($parent_slug,__('Settings','wedevs-academy'), __('Settings', 'wedevs-academy'), $capability, 'wedevs-academy-setting', [$this, 'settings_page']);
    }
    
    public function address_book_page() {
        $addressbook = new Addressbook();
        $addressbook -> Addressbook();
    }
    
    public function settings_page() {
        echo 'Address Book Settings';
    }
}
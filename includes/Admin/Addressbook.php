<?php

namespace Wedevs\Academy\Admin;

/**
 * Addressbook handler class
 */

class Addressbook {

    public function Addressbook()
    {
        $action = isset($_GET['action']) ? $_GET['action'] : 'list';
        switch($action) {
            case 'new': 
                $template = __DIR__ . '/views/address-new.php';
                break;

            case 'edit': 
                $template = __DIR__ . '/views/address-edit.php';
                break;

            case 'view':
                $template = __DIR__ . '/views/address-views.php';
                break;

            default:
                $template = __DIR__ . '/views/address-list.php';
        }

        if( file_exists($template)) {
            include $template;
        }

    }

    /**
     * Form Handler Function
     *
     * @return void
     */
    public function form_handler()
    {
        if(! isset($_POST['submit_address'])) {
            return;
        }

        // Validate the nonce
        if( ! wp_verify_nonce( $_POST['_wpnonce'], 'add_address')) {
            wp_die('Are you cheating?');
        }

        // Check the validate current user
        if( ! current_user_can('manage_options')) {
            wp_die('Are you cheating?');
        }

        var_dump($_POST);
        exit;
    }

}
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

}
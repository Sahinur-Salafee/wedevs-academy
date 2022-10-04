<?php

namespace Wedevs\Academy\Admin;

/**
 * Addressbook handler class
 */

class Addressbook {

    public $errors = [];

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

        $name    = isset($_POST['name']) ? sanitize_text_field($_POST['name'])          : '';
        $address = isset($_POST['address']) ? sanitize_textarea_field($_POST['address']): '';
        $phone   = isset($_POST['phone']) ? sanitize_text_field($_POST['phone'])        : '';

        $insert_id = wd_ac_insert_address([
            'name'    => $name,
            'address' => $address,
            'phone'   => $phone
        ]);

        if( empty($name)) {
            $this->errors['name'] = __('Please Provide a name', 'wedevs-academy');
        }

        if( empty($phone)) {
            $this->errors['phone'] = __('Please Provide a phone number', 'wedevs-academy');
        }

        if(!empty($this-> errors)) {
            return;
        }

        // If data not inserted
        if(is_wp_error($insert_id)) {
            wp_die($insert_id-> get_error_message());
        }

        // Redirect into admin page
        $redirect_into = admin_url('admin.php?page=wedevs-academy&inserted=true');
        wp_redirect($redirect_into);

        var_dump($_POST);
        exit;
    }

}
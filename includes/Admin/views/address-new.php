<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e('New Address', 'wedevs-academy'); ?></h1>


    <form action="" method="POST">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="name"><?php _e('Name', 'wedevs-academy') ?></label>
                    </th>
                    <td>
                        <input type="text" name="name" class="regular-text" value="">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="address"><?php _e('Address', 'wedevs-academy') ?></label>
                    </th>
                    <td>
                        <textarea name="address" id="address" class="regular-text"></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="phone"><?php _e('Phone', 'wedevs-academy') ?></label>
                    </th>
                    <td>
                        <input type="text" name="phone" class="regular-text" value="">
                    </td>
                </tr>
            </tbody>
        </table>
        
        <?php 
            /**
             * Insure that the request goes to this site and this page.
             * It also refere this form.
             */
            wp_nonce_field('add_address'); 
        ?>
        <?php submit_button(__('Add Address', 'wedevs-academy'), 'primary', 'submit_address') ?>
    </form>


</div>
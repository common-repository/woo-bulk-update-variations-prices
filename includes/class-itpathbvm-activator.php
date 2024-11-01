<?php

/**
 * Fired during plugin activation
 *
 * @link       http://itpathsolutions.com
 * @since      1.0.0
 *
 * @package    itpathbvm
 * @subpackage itpathbvm/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    itpathbvm
 * @subpackage itpathbvm/includes
 * @author     info <info@itpathsolutions.com>
 */
class itpathbvm_Activator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function activate()
    {
        self::createtable();
        return self::checkWoocommerceIsActive();
    }

    private function checkWoocommerceIsActive()
    {
        if (!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

            return wp_die(__('Please install and Activate WooCommerce.', 'woocommerce-addon-slug'), 'Plugin dependency check', array('back_link' => true));

        }
    }
    private static function createtable()
    {
        global $wpdb;

        $wp_track_table = "itpathbvm";

        #Check to see if the table exists already, if not, then create it

        if ($wpdb->get_var("show tables like '$wp_track_table'") != $wp_track_table) {

            $sql = "CREATE TABLE $wp_track_table (
			  `id` int(11) UNSIGNED NOT NULL,
			  `name` varchar(255) NOT NULL PRIMARY KEY,
			  `price` varchar(255) NOT NULL,
			  `checked` tinyint(1) NOT NULL,
			  `dtime` datetime NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
			";
            /*$sql .= "ALTER TABLE $wp_track_table
			  ADD PRIMARY KEY (`name`),
			  ADD UNIQUE KEY `name` (`name`),
			  ADD UNIQUE KEY `id` (`id`);";*/

            $sql .= "ALTER TABLE $wp_track_table MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;";
	            require_once ABSPATH . '/wp-admin/includes/upgrade.php';
    	    dbDelta($sql);
        }
    }

}

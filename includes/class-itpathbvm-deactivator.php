<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://itpathsolutions.com
 * @since      1.0.0
 *
 * @package    itpathbvm
 * @subpackage itpathbvm/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    itpathbvm
 * @subpackage itpathbvm/includes
 * @author     info <info@itpathsolutions.com>
 */
class itpathbvm_Deactivator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function deactivate()
    {
        self::droptable();
    }

    public static function droptable()
    {
        global $wpdb;
        $table_name = 'itpathbvm';
        $sql        = "DROP TABLE IF EXISTS $table_name";
        $wpdb->query($sql);
    }
}

<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://itpathsolutions.com
 * @since      1.0.0
 *
 * @package    itpathbvm
 * @subpackage itpathbvm/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    itpathbvm
 * @subpackage itpathbvm/admin
 * @author     info <info@itpathsolutions.com>
 */
class itpathbvm_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $itpathbvm    The ID of this plugin.
	 */
	private $itpathbvm;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $itpathbvm       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $itpathbvm, $version ) {

		$this->itpathbvm = $itpathbvm;
		$this->version = $version;

        $this->load_partials();
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in itpathbvm_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The itpathbvm_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->itpathbvm, plugin_dir_url( __FILE__ ) . 'css/itpathbvm-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in itpathbvm_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The itpathbvm_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->itpathbvm, plugin_dir_url( __FILE__ ) . 'js/itpathbvm-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Check every time Woocommerce is installed and active.
	 * @since    1.0.0
	 */
	public function is_woocommerce_active(){

		if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			deactivate_plugins( $this->itpathbvm );
			$this->notice_to_install_woocommerce();

		}

	}

	private function notice_to_install_woocommerce(){
		?>
		<div class="notice error is-dismissible" >
        	<p><?php _e( 'WooCommerce is necessary for Itpath Woo Bulk Variations Manager plugin, Please install it now!', $this->itpathbvm ); ?></p>
    	</div>
    	<?php
	}

	public function itpathbvm_submenu(){
		add_submenu_page('edit.php?post_type=product', 'Bulk Variations Manager', 'Bulk Variations', 'manage_product_terms', 'product_bulk_variations_manager', array($this, 'bulk_variations_manager_page'));
	}

	public function bulk_variations_manager_page(){
        bulk_variations_manager::output();
	}

    /**
     * load partials as View files for admin
     * @since   1.0.0
     */
	private function load_partials(){
        require_once  dirname( __FILE__ ) . '/partials/itpathbvm-admin-bulk_variations_manager.php';
    }

}

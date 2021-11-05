<?php
/**
 * Plugin Name: TPM - Multi Comments System
 * Description: Adds the ability to enable native WordPress, Facebook, and Disqus comment systems.
 * Version: 1.0.0
 * Plugin URI: https://www.thepurem.com/
 * Author: Muhammad Mahmudin
 * Author URI: https://www.thepurem.com/
 * Text Domain: tpm-comments-system
 * */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

define( 'TPM_COMMENTS_SYSTEM_VERSION', '1.0.0' );

define( 'TPM_COMMENTS_SYSTEM_FILE', __FILE__ );
define( 'TPM_COMMENTS_SYSTEM_PATH', plugin_dir_path( TPM_COMMENTS_SYSTEM_FILE ) );
define( 'TPM_COMMENTS_SYSTEM_URL', plugins_url( '/', TPM_COMMENTS_SYSTEM_FILE ) );

define( 'TPM_COMMENTS_SYSTEM_LIB', TPM_COMMENTS_SYSTEM_PATH . 'includes/lib/' );
define( 'TPM_COMMENTS_SYSTEM_FRONTEND', TPM_COMMENTS_SYSTEM_PATH . 'includes/frontend/' );

define( 'TPM_COMMENTS_SYSTEM_CSS', TPM_COMMENTS_SYSTEM_URL . 'assets/css/' );
define( 'TPM_COMMENTS_SYSTEM_IMAGES', TPM_COMMENTS_SYSTEM_URL . 'assets/images/' );
define( 'TPM_COMMENTS_SYSTEM_JS', TPM_COMMENTS_SYSTEM_URL . 'assets/js/' );

define( 'TPM_COMMENTS_SYSTEM_DEFAULT_TAB_ORDER', 'wordpress,disqus' );
define( 'TPM_COMMENTS_SYSTEM_DEFAULT_AMP_ORDER', 'wordpress,facebook' );

require TPM_COMMENTS_SYSTEM_LIB . '/plugin.php';

if ( is_admin() && ( !defined( 'DOING_AJAX' ) || !DOING_AJAX ) ) {
	function tpm_comments_system_admin() {
		echo tpm_comments_system_settings_saved_notification();
		require TPM_COMMENTS_SYSTEM_LIB . '/admin.php';
	}
} else {
	require TPM_COMMENTS_SYSTEM_LIB . '/frontend.php';
}

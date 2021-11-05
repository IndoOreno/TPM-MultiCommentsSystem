<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_action( 'admin_init', function() {
	register_setting( 'tpm-comments-system-options', 'tpm-comments-system' );
} );

add_action( 'init', function() {
	wp_register_style( 'tpm_comments_system_tabs_css', TPM_COMMENTS_SYSTEM_CSS . '/frontend.css', null, TPM_COMMENTS_SYSTEM_VERSION, "all" );
	wp_register_style( 'tpm_comments_system_amp_css', TPM_COMMENTS_SYSTEM_CSS . '/frontend-amp.css', null, TPM_COMMENTS_SYSTEM_VERSION, "all" );
} );

function tpm_comments_system_default_options() {
	add_option( 'tpm-comments-system', array(
		'tab_order' => 'wordpress,disqus',
		'amp_order' => 'wordpress,facebook'
	) );
}

function tpm_comments_system_activation( $network_wide ) {
	global $wpdb;

	if( function_exists( 'is_multisite' ) && is_multisite() ) {
		if( $network_wide ) {
			$old_blog =  $wpdb->blogid;
			$blog_ids =  $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );

			foreach( $blog_ids as $blog_id ) {
				switch_to_blog( $blog_id );
				tpm_comments_system_default_options();
			}
			switch_to_blog( $old_blog );

			return;
		}
	}

	tpm_comments_system_default_options();
}
register_activation_hook( TPM_COMMENTS_SYSTEM_FILE, 'tpm_comments_system_activation' );

function tpm_comments_system_subsite_default_options( $blog_id, $user_id, $domain, $path, $site_id, $meta ) {
	if( is_plugin_active_for_network( 'multi-comments-system/multi-comments-system.php' ) ) { 
		switch_to_blog( $blog_id );
		tpm_comments_system_default_options();
		restore_current_blog();
	}
}
add_action( 'wpmu_new_blog', 'tpm_comments_system_subsite_default_options', 10, 6 );


function tpm_comments_system_admin_menu() {
	add_submenu_page( 'edit-comments.php', 'Multi Comments', 'Multi Comments', 'manage_options', 'tpm_comments_system', 'tpm_comments_system_admin' );
}
add_action( 'admin_menu', 'tpm_comments_system_admin_menu' );

function tpm_comments_system_settings_saved_notification() {
	if( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == 'true' ) {
		return '<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible"> 
				<p><strong>Settings saved</strong></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice</span></button></div>';
	}
}

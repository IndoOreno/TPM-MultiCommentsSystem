<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function tpm_comments_system_enqueue_styles() {
	if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
		wp_enqueue_style( 'tpm_comments_system_amp_css' );
		return;
	}

	if ( ( is_single() || is_page() || is_singular() ) && comments_open() ) {
		wp_enqueue_style( 'tpm_comments_system_tabs_css' );
	}
}
add_action( 'wp_head', 'tpm_comments_system_enqueue_styles', 4269 );

function tpm_comments_system_enqueue_required_scripts() {
	if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
		return;
	}

	if ( ( is_single() || is_page() || is_singular() ) && comments_open() ) {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-tabs' );
	}
}
add_action( 'wp_enqueue_scripts', 'tpm_comments_system_enqueue_required_scripts' );

function tpm_comments_system_enqueue_scripts() {
	if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
		return;
	}

	if ( ( is_single() || is_page() || is_singular() ) && comments_open() ) {
		echo '<script>jQuery("#tpm-comments-system-tabs").tabs();</script>' . PHP_EOL;
	}
}
add_action( 'wp_footer', 'tpm_comments_system_enqueue_scripts', 4269 );

function tpm_comments_system_frontend( $file ) {
	if ( ( is_single() || is_page() || is_singular() ) && comments_open() ) {
		if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
			return TPM_COMMENTS_SYSTEM_FRONTEND . '/container-amp.php';
		}

		return TPM_COMMENTS_SYSTEM_FRONTEND . '/container.php';
	}
	return $file;
}
add_filter( 'comments_template', 'tpm_comments_system_frontend' );

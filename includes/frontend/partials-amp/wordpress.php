<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if ( file_exists( TEMPLATEPATH . '/comments.php' ) ) {
	include_once TEMPLATEPATH . '/comments.php';
} else if ( file_exists( TEMPLATEPATH . '/includes/comments.php' ) ) {
	include_once TEMPLATEPATH . '/includes/comments.php';
}

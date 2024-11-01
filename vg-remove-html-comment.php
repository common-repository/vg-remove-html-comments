<?php

/**
* Plugin Name: VG Remove html comments
* Plugin URI: http://guptavishal.in/works/vg-remove-html-comments/
* Description: Remove html comments from the source of your wordpress page only activate the plugin
* Version: 1.0.0
* Author: Vishal Gupta
* Author URI: http://guptavishal.in
* License: GPLv2
* License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

//Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
	exit;

function vgrhc_init_remove_html_comments() {
	ob_start('vgrhc_remove_html_comments');
}

	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'vg-remove-html-comments/vg-remove-html-comment.php' ) ) {
	add_action( 'init', 'vgrhc_init_remove_html_comments', 1 );
}


	function vgrhc_remove_html_comments($html) {
		$expr = '/<!--(.|\s)*?-->/';
		$html = preg_replace($expr, '', $html);
		return $html;
	}

?>
<?php
/*
Plugin Name:    Dynamic Login Link
Description:    This plugin allows you to create a dynamic login link that logins the user back to the current page after login.
Author:         Jakob Trost
Author URI:     https://jakobtrost.de/
Version:        0.0.1
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'DLL_LOGIN_URL' ) ) {
	/**
	 * Fallback for the URL of the login page where the user should be redirected to.
	 */
	define( 'DLL_LOGIN_URL', 'https://example.com/login' );
}

if ( ! defined( 'DLL_URL_PARAMETER' ) ) {
	/**
	 * Fallback for the URL parameter that should be used to pass the current
	 * URL to the login page.
	 */
	define( 'DLL_URL_PARAMETER', 'redirect_to' );
}


require_once plugin_dir_path( __FILE__ ) . 'functions.php';
require_once plugin_dir_path( __FILE__ ) . 'shortcode.php';
require_once plugin_dir_path( __FILE__ ) . 'options.php';
<?php

/**
 * Get the login URL.
 *
 * @return string The login URL.
 */
function dll_get_login_url() {
	// Get the options.
	$options = get_option( 'dll_options', array() );

	// Set the default options.
	$options = wp_parse_args(
		$options,
		array(
			'url' => DLL_LOGIN_URL,
			'parameter' => DLL_URL_PARAMETER,
		)
	);

	// Get the login URL.
	$login_url = esc_url( $options['url'] );

	// Get the current URL.
	$current_url = esc_url( add_query_arg( null, null ) );
	$current_url = esc_url( home_url( $current_url ) );

	// Add the current URL as a parameter to the login URL.
	$login_url = add_query_arg( $options['parameter'], $current_url, $login_url );

	return $login_url;
}
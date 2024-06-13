<?php
/**
 * This file registers the shortcode that can be used to create the
 * dynamic login URL.
 * 
 * You can insert a button or link with the following shortcode:
 * 
 * [dll_login_button]
 * 
 * It supports the following attributes:
 * - text: The text that should be displayed on the button or link.
 * - class: The CSS class that should be added to the button or link.
 * - id: The ID that should be added to the button or link.
 * - target: The target attribute that should be added to the link.
 * - rel: The rel attribute that should be added to the link.
 * - title: The title attribute that should be added to the link.
 * - aria_label: The aria-label attribute that should be added to the link.
 *
 * 
 * Examples:
 * 
 * - Shortcode:
 *   [dll_login_button]
 *   Output:
 *   <a href="https://example.com/login?redirect_to=https%3A%2F%2Fexample.com%2Fcurrent-page">Login</a>
 * 
 * - Shortcode:
 *   [dll_login_button text="Login here"]
 *   Output:
 *   <a href="https://example.com/login?redirect_to=https%3A%2F%2Fexample.com%2Fcurrent-page">Login here</a>
 * 
 * - Shortcode:
 *   [dll_login_button text="Login now!" class="wp-element-button" id="login-button"]
 *   Output:
 *   <a href="https://example.com/login?redirect_to=https%3A%2F%2Fexample.com%2Fcurrent-page" class="wp-element-button" id="login-button">Login now!</a>
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_shortcode( 'dll_login_button', 'dll_login_button_shortcode' );

/**
 * The callback function for the dll_login_button shortcode.
 * 
 * @param array $atts The attributes that are passed to the shortcode.
 * @return string The HTML output for the shortcode.
 */
function dll_login_button_shortcode( $atts ) {
	
	$login_url = dll_get_login_url();

	// Get the attributes for the shortcode.
	$atts = shortcode_atts(
		array(
			'text'      => 'Login',
			'class'     => 'button',
			'id'        => '',
			'target'    => '',
			'rel'       => '',
			'title'     => '',
			'aria_label' => '',
		),
		$atts
	);

	// Build the HTML output for the button or link.
	$output = '<div class="dynamic-login-link"><a href="' . $login_url . '"';

	if ( ! empty( $atts['class'] ) ) {
		$output .= ' class="' . esc_attr( $atts['class'] ) . '"';
	}

	if ( ! empty( $atts['id'] ) ) {
		$output .= ' id="' . esc_attr( $atts['id'] ) . '"';
	}

	if ( ! empty( $atts['target'] ) ) {
		$output .= ' target="' . esc_attr( $atts['target'] ) . '"';
	}

	if ( ! empty( $atts['rel'] ) ) {
		$output .= ' rel="' . esc_attr( $atts['rel'] ) . '"';
	}

	if ( ! empty( $atts['title'] ) ) {
		$output .= ' title="' . esc_attr( $atts['title'] ) . '"';
	}

	if ( ! empty( $atts['aria_label'] ) ) {
		$output .= ' aria-label="' . esc_attr( $atts['aria_label'] ) . '"';
	}

	$output .= '>' . esc_html( $atts['text'] ) . '</a></div>';

	return $output;
}
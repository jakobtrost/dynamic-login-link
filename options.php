<?php
/**
 * Create an options page to set the login url and the query parameter name.
 */
function dll_options_page() {
	// Add the options page.
	add_options_page(
		__( 'Dynamic Login Link Options', 'dynamic-login-link' ),
		__( 'Dynamic Login Link', 'dynamic-login-link' ),
		'manage_options',
		'dynamic-login-link',
		'dll_options_page_html'
	);
}
add_action( 'admin_menu', 'dll_options_page' );

/**
 * Create the HTML for the options page.
 */
function dll_options_page_html() {
	// Check if the user has the required permissions.
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	// Get the current options.
	$options = get_option( 'dll_options' );

	// Set the default options.
	$options = wp_parse_args(
		$options,
		array(
			'url' => '',
			'parameter' => 'redirect_to',
		)
	);

	// Check if the form has been submitted.
	if ( isset( $_POST['dll_options'] ) ) {
		// Verify the nonce.
		check_admin_referer( 'dll_options', 'dll_options_nonce' );

		// Update the options.
		$options['url'] = sanitize_text_field( $_POST['dll_options']['url'] );
		$options['parameter'] = sanitize_text_field( $_POST['dll_options']['parameter'] );

		// Save the options.
		update_option( 'dll_options', $options );

		// Show a success message.
		$success_message = __( 'Options saved.', 'dynamic-login-link' );
	} else {
		$success_message = '';
	}
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Dynamic Login Link Options', 'dynamic-login-link' ); ?></h1>

		<?php if ( ! empty( $success_message ) ) : ?>
			<div id="message" class="updated notice">
				<p><?php echo esc_html( $success_message ); ?></p>
			</div>
		<?php endif; ?>

		<form method="post">
			<?php wp_nonce_field( 'dll_options', 'dll_options_nonce' ); ?>

			<table class="form-table">
				<tr>
					<th scope="row">
						<label for="dll_options_url"><?php esc_html_e( 'Login URL', 'dynamic-login-link' ); ?></label>
					</th>
					<td>
						<input type="url" id="dll_options_url" name="dll_options[url]" value="<?php echo esc_url( $options['url'] ); ?>" class="regular-text">
						<p class="description"><?php esc_html_e( 'The URL to the login page.', 'dynamic-login-link' ); ?></p>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="dll_options_parameter"><?php esc_html_e( 'Query Parameter Name', 'dynamic-login-link' ); ?></label>
					</th>
					<td>
						<input type="text" id="dll_options_parameter" name="dll_options[parameter]" value="<?php echo esc_attr( $options['parameter'] ); ?>" class="regular-text">
						<p class="description"><?php esc_html_e( 'The name of the query parameter to add to the login URL.', 'dynamic-login-link' ); ?></p>
					</td>
				</tr>
			</table>

			<?php submit_button( __( 'Save Changes', 'dynamic-login-link' ) ); ?>
		</form>
	</div>
	<?php
}
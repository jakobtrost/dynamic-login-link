# Simple login URL plugin

This plugin adds the shortcode that can be used to create the
dynamic login URL.

You can insert a button or link with the following shortcode:

`[dll_login_button]`

## Attributes

The shortcode supports the following attributes:

- *text*: The text that should be displayed on the button or link.
- *class*: The CSS class that should be added to the button or link.
- *id*: The ID that should be added to the button or link.
- *target*: The target attribute that should be added to the link.
- *rel*: The rel attribute that should be added to the link.
- *title*: The title attribute that should be added to the link.
- *aria_label*: The aria-label attribute that should be added to the link.

## Examples

- Shortcode:
  `[dll_login_button]`
  Output:
  `<a href="https://example.com/login?redirect_to=https%3A%2F%2Fexample.com%2Fcurrent-page">Login</a>`

- Shortcode:
  `[dll_login_button text="Login here"]`
  Output:
  `<a href="https://example.com/login?redirect_to=https%3A%2F%2Fexample.com%2Fcurrent-page">Login here</a>`

- Shortcode:
  `[dll_login_button text="Login now!" class="button" id="login-button"]`
  Output:
  `<a href="https://example.com/login?redirect_to=https%3A%2F%2Fexample.com%2Fcurrent-page" class="button" id="login-button">Login now!</a>`

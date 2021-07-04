<?php
/**
 * rcchoa_theme back compat functionality
 *
 * Prevents rcchoa_theme from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package WordPress
 * @subpackage rcchoa_theme
 * @since rcchoa_theme 1.0
 */

/**
 * Prevent switching to rcchoa_theme on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since rcchoa_theme 1.0
 */
function rcchoa_theme_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'rcchoa_theme_upgrade_notice' );
}
add_action( 'after_switch_theme', 'rcchoa_theme_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * rcchoa_theme on WordPress versions prior to 4.7.
 *
 * @since rcchoa_theme 1.0
 *
 * @global string $wp_version WordPress version.
 */
function rcchoa_theme_upgrade_notice() {
	$message = sprintf( __( 'rcchoa_theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'rcchoa_theme' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since rcchoa_theme 1.0
 *
 * @global string $wp_version WordPress version.
 */
function rcchoa_theme_customize() {
	wp_die( sprintf( __( 'rcchoa_theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'rcchoa_theme' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'rcchoa_theme_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since rcchoa_theme 1.0
 *
 * @global string $wp_version WordPress version.
 */
function rcchoa_theme_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'rcchoa_theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'rcchoa_theme' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'rcchoa_theme_preview' );

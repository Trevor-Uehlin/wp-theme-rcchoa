<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage rcchoa_theme
 * @since 1.0
 * @version 1.0
 */

?>
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php _e( 'Top Menu', 'rcchoa_theme' ); ?>">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
		<?php
		echo rcchoa_theme_get_svg( array( 'icon' => 'bars' ) );
		echo rcchoa_theme_get_svg( array( 'icon' => 'close' ) );
		_e( 'Menu', 'rcchoa_theme' );
		?>
	</button>

	<?php wp_nav_menu( array(
		'theme_location' => 'top',
		'menu_id'        => 'top-menu',
	) ); ?>

	<?php if ( ( rcchoa_theme_is_frontpage() || ( is_home() && is_front_page() ) ) && has_custom_header() ) : ?>
		<a href="#content" class="menu-scroll-down"><?php echo rcchoa_theme_get_svg( array( 'icon' => 'arrow-right' ) ); ?><span class="screen-reader-text"><?php _e( 'Scroll down to content', 'rcchoa_theme' ); ?></span></a>
	<?php endif; ?>
</nav><!-- #site-navigation -->

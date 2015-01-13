<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Red Cross Publications
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function rc_publication_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'rc_publication_jetpack_setup' );

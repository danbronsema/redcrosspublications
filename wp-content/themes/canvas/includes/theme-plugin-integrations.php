<?php
/**
 * Contains checks to see if plugins are active and then loads logic accordingly
 */
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Checks if plugins are activated and loads logic accordingly
 * @uses  class_exists() detect if a class exists
 * @uses  function_exists() detect if a function exists
 * @uses  defined() detect if a constant is defined
 */

/**
 * Testimonials by WooThemes
 * http://wordpress.org/plugins/testimonials-by-woothemes/
 */
if ( class_exists( 'Woothemes_Testimonials' ) ) {
	require_once( get_template_directory() . '/includes/integrations/testimonials/testimonials.php' );
}

/**
 * Our Team by WooThemes
 * http://wordpress.org/plugins/our-team-by-woothemes/
 */
if ( class_exists( 'Woothemes_Our_Team' ) ) {
	require_once( get_template_directory() . '/includes/integrations/our-team/our-team.php' );
}

/**
 * Projects
 * @link http://wordpress.org/plugins/projects-by-woothemes/
 */
if ( class_exists( 'Projects' ) ) {
	require_once( get_template_directory() . '/includes/integrations/projects/setup.php' );
	require_once( get_template_directory() . '/includes/integrations/projects/template.php' );
	require_once( get_template_directory() . '/includes/integrations/projects/functions.php' );
}

/**
 * WooSlider by WooThemes
 * http://www.woothemes.com/products/wooslider/
 */
if ( class_exists( 'WooSlider' ) ) {
	if ( version_compare( get_option( 'wooslider-version' ), '2.0.2' ) >= 0 ) {
		require_once( get_template_directory() . '/includes/integrations/wooslider/wooslider.php' );
	}
}
<?php
/**
 * Red Cross Publications functions and definitions
 *
 * @package Red Cross Publications
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'rc_publication_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rc_publication_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Red Cross Publications, use a find and replace
	 * to change 'rc-publication' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'rc-publication', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'rc-publication' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'rc_publication_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // rc_publication_setup
add_action( 'after_setup_theme', 'rc_publication_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function rc_publication_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'rc-publication' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'rc_publication_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rc_publication_scripts() {
	wp_enqueue_style( 'rc-publication-style', get_stylesheet_uri() );

	wp_enqueue_script( 'rc-publication-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'rc-publication-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rc_publication_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Make slugs plz
 */

function create_slug($string){
   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   return strtolower($slug);
}

add_theme_support( 'post-thumbnails' ); 

/*-----------------------------------------------------------------------------------*/
/* Remove Unwanted Admin Menu Items */
/*-----------------------------------------------------------------------------------*/

// function remove_admin_menu_items() {
// 	$remove_menu_items = array(__('Tools'));
// 	global $menu;
// 	end ($menu);
// 	while (prev($menu)){
// 		$item = explode(' ',$menu[key($menu)][0]);
// 		if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
// 		unset($menu[key($menu)]);}
// 	}
// }

// add_action('admin_menu', 'remove_admin_menu_items');

/*-----------------------------------------------------------------------------------*/
/* Half images  */
/*-----------------------------------------------------------------------------------*/

function half_image($imageObject){
	$image = array(
		'url' => $imageObject['url'],
		'width' => $imageObject['width']/2,
		'height' => $imageObject['height']/2,
		);
	return "<img src='{$image["url"]}' width='{$image["width"]}' height='{$image["height"]}' />";
}

/**
 * Remove WordPress's default padding on images with captions
 *
 * @param int $width Default WP .wp-caption width (image width + 10px)
 * @return int Updated width to remove 10px padding
 */
function remove_caption_padding( $width ) {
	return $width - 10;
}
add_filter( 'img_caption_shortcode_width', 'remove_caption_padding' );

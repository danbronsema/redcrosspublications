<?php
/*-----------------------------------------------------------------------------------*/
/* Theme Frontend JavaScript */
/*-----------------------------------------------------------------------------------*/

if ( ! is_admin() ) { add_action( 'wp_print_scripts', 'woothemes_add_javascript' ); }

if ( ! function_exists( 'woothemes_add_javascript' ) ) {
	function woothemes_add_javascript() {
		wp_enqueue_script( 'third-party', get_template_directory_uri() . '/includes/js/third-party.js', array( 'jquery' ) );
		wp_register_script( 'flexslider', get_template_directory_uri() . '/includes/js/jquery.flexslider.min.js', array( 'jquery' ) );
		wp_register_script( 'prettyPhoto', get_template_directory_uri() . '/includes/js/jquery.prettyPhoto.js', array( 'jquery' ) );
		wp_register_script( 'portfolio', get_template_directory_uri() . '/includes/js/portfolio.js', array( 'jquery', 'prettyPhoto' ) );
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/includes/js/modernizr.js', array( 'jquery' ), '2.6.2' );

		// Conditionally load the Slider and Portfolio JavaScript, where needed.
		$load_slider_js = false;
		$load_portfolio_js = false;

		if ( ( get_option( 'woo_slider_magazine' ) == 'true' || get_option( 'woo_slider_biz' ) == 'true' ) || is_page_template( 'template-widgets.php' ) || is_active_sidebar( 'homepage' ) ) {
			$load_slider_js = true;
		}

		if (
			is_page_template( 'template-portfolio.php' ) ||
			( is_singular() && ( get_post_type() == 'portfolio' ) ) ||
			is_post_type_archive( 'portfolio' ) ||
			is_tax( 'portfolio-gallery' )
		   ) {
			$load_portfolio_js = true;
		}

		// Allow child themes/plugins to load the slider and portfolio JavaScript when they need it.
		$load_slider_js = apply_filters( 'woo_load_slider_js', $load_slider_js );
		$load_portfolio_js = apply_filters( 'woo_load_portfolio_js', $load_portfolio_js );

		if ( $load_slider_js ) { wp_enqueue_script( 'flexslider' ); }
		if ( $load_portfolio_js ) { wp_enqueue_script( 'portfolio' ); }

		do_action( 'woothemes_add_javascript' );

		wp_enqueue_script( 'general', get_template_directory_uri() . '/includes/js/general.js', array( 'jquery', 'third-party' ) );

	} // End woothemes_add_javascript()
}

/*-----------------------------------------------------------------------------------*/
/* Theme Frontend CSS */
/*-----------------------------------------------------------------------------------*/

if ( ! is_admin() ) { add_action( 'wp_print_styles', 'woothemes_add_css' ); }

if ( ! function_exists( 'woothemes_add_css' ) ) {
	function woothemes_add_css() {
		global $woo_options;
		wp_register_style( 'prettyPhoto', get_template_directory_uri() . '/includes/css/prettyPhoto.css' );
		wp_register_style( 'non-responsive', get_template_directory_uri() . '/css/non-responsive.css' );

		// Disable prettyPhoto css if WooCommerce is activated and user is on the product page
		$woocommerce_activated 	= is_woocommerce_activated();
		$woocommerce_lightbox	= get_option( 'woocommerce_enable_lightbox' ) == 'yes' ? true : false;
		$woocommerce_product 	= false;
		if ( $woocommerce_activated ) {
			$woocommerce_product = is_product();
		}

		if ( $woocommerce_activated && $woocommerce_product && $woocommerce_lightbox ) {
			wp_deregister_style( 'prettyPhoto' );
		}

		// Conditionally load the Portfolio CSS, where needed.
		$load_portfolio_css = false;

		if (
			is_page_template( 'template-portfolio.php' ) ||
			( is_singular() && ( get_post_type() == 'portfolio' ) ) ||
			is_post_type_archive( 'portfolio' ) ||
			is_tax( 'portfolio-gallery' )
		   ) {
			$load_portfolio_css = true;
		}

		// Allow child themes/plugins to load the portfolio CSS when they need it.
		$load_portfolio_css = apply_filters( 'woo_load_portfolio_css', $load_portfolio_css );

		if ( $load_portfolio_css ) { wp_enqueue_style( 'prettyPhoto' ); }

		do_action( 'woothemes_add_css' );
	} // End woothemes_add_css()
}

/*-----------------------------------------------------------------------------------*/
/* Theme Admin JavaScript */
/*-----------------------------------------------------------------------------------*/

if ( is_admin() ) { add_action( 'admin_print_scripts', 'woothemes_add_admin_javascript' ); }

if ( ! function_exists( 'woothemes_add_admin_javascript' ) ) {
	function woothemes_add_admin_javascript() {
		global $pagenow;

		if ( ( $pagenow == 'post.php' || $pagenow == 'post-new.php' ) && ( get_post_type() == 'page' ) ) {
			wp_enqueue_script( 'woo-postmeta-options-custom-toggle', get_template_directory_uri() . '/includes/js/meta-options-custom-toggle.js', array( 'jquery' ), '1.0.0' );
		}

	} // End woothemes_add_admin_javascript()
}
?>
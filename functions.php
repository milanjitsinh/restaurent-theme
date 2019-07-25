<?php
/**
 * restaurant functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package restaurant
 */

if ( ! function_exists( 'restaurant_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function restaurant_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on restaurant, use a find and replace
		 * to change 'restaurant' to the name of your theme in all the template files.
		 */
//		load_theme_textdomain( 'restaurant', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
//		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'restaurant' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'restaurant_custom_background_args', array(
			'default-color' => 'ddd',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'restaurant_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function restaurant_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'restaurant_content_width', 640 );
}
add_action( 'after_setup_theme', 'restaurant_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function restaurant_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'restaurant' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'restaurant' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'restaurant_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function restaurant_scripts() {
    
	wp_enqueue_style( 'restaurant-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri()."/css/bootstrap.css" , array(), '20151215', false );
	wp_enqueue_style( 'responsive', get_template_directory_uri()."/css/bootstrap-responsive.css" , array(), '20151215', false );
	wp_enqueue_style( 'fancybox', get_template_directory_uri()."/css/fancybox/jquery.fancybox.css" , array(), '20151215', false );
	wp_enqueue_style( 'jcarousel.css', get_template_directory_uri()."/css/jcarousel.css" , array(), '20151215', false );
	wp_enqueue_style( 'flexslider.css', get_template_directory_uri()."/css/flexslider.css" , array(), '20151215', false );
	
	/* Theme skin */
	wp_enqueue_style( 'green.css', get_template_directory_uri()."/skins/green.css" , array(), '20151215', false );
	
	
	wp_enqueue_style( 'style.css', get_template_directory_uri()."/css/style.css" , array(), '20151215', false );




	/* Js*/
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.js', array(), '20151215',true );
	wp_enqueue_script( 'jquery.easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array(), '20151215', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '20151215', true );
	wp_enqueue_script( 'jcarousel', get_template_directory_uri() . '/js/jcarousel/jquery.jcarousel.min.js', array(), '20151215', true );
	wp_enqueue_script( 'jquery.fancybox.pack.js', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array(), '20151215', true );
	wp_enqueue_script( 'jquery.fancybox-media.js', get_template_directory_uri() . '/js/jquery.fancybox-media.js', array(), '20151215', true );
//	wp_enqueue_script( 'google-code-prettify/prettify.js', get_template_directory_uri() . '/js/google-code-prettify/prettify.js', array(), '20151215', true );

//	wp_enqueue_script( 'jquery.quicksand.js', get_template_directory_uri() . '/js/portfolio/jquery.quicksand.js', array(), '20151215', true );

	wp_enqueue_script( 'setting.js', get_template_directory_uri() . '/js/portfolio/setting.js', array(), '20151215', true );
	wp_enqueue_script( 'jquery.flexslider.js', get_template_directory_uri() . '/js/jquery.flexslider.js', array(), '20151215', true );
	wp_enqueue_script( 'jquery.nivo.slider.js', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array(), '20151215', true );
	wp_enqueue_script( 'modernizr.custom.js', get_template_directory_uri() . '/js/modernizr.custom.js', array(), '20151215', true );
	wp_enqueue_script( 'jquery.ba-cond.min.js', get_template_directory_uri() . '/js/jquery.ba-cond.min.js', array(), '20151215', true );
	wp_enqueue_script( 'jquery.slitslider.js', get_template_directory_uri() . '/js/jquery.slitslider.js', array(), '20151215', true );
	wp_enqueue_script( 'animate.js', get_template_directory_uri() . '/js/animate.js', array(), '20151215', true );
	wp_enqueue_script( 'custom.js', get_template_directory_uri() . '/js/custom.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'restaurant_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
//require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
//require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
//require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

	
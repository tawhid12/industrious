<?php
/**
 * industrious functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package industrious
 */
require(get_template_directory().'/inc/theme-options.php');
require(get_template_directory().'/inc/theme-elements.php');
// load the theme's framework
if ( !class_exists( 'redux-framework' ) && file_exists( dirname(__FILE__) . '/redux-framework/ReduxCore/framework.php' ) ) {
	require_once( dirname(__FILE__) . '/redux-framework/ReduxCore/framework.php' );
	}
	
	// load the theme's options 
	if ( !isset( $redux_owd ) && file_exists( dirname(__FILE__) . '/redux-framework/sample/function-config.php' ) ) {
	require_once( dirname(__FILE__) . '/redux-framework/sample/function-config.php' );
	}
if ( ! function_exists( 'industrious_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function industrious_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on industrious, use a find and replace
		 * to change 'industrious' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'industrious', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

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
			'menu-1' => esc_html__( 'Primary', 'industrious' ),
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
		));

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'industrious_custom_background_args', array(
			'default-color' => 'ffffff',
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
add_action( 'after_setup_theme', 'industrious_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function industrious_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'industrious_content_width', 640 );
}
add_action( 'after_setup_theme', 'industrious_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function industrious_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'industrious' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'industrious' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'industrious_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function industrious_scripts() {
	wp_enqueue_style( 'industrious-style', get_stylesheet_uri());
	wp_enqueue_style( 'industrious-style-main',get_template_directory_uri().'/assets/css/main.css', array(), '0.0.1');
			
	wp_enqueue_script('industrious-browser',get_template_directory_uri().'/assets/js/browser.min.js',array(),'1.0',true);
	wp_enqueue_script('industrious-breakpoints',get_template_directory_uri().'/assets/js/breakpoints.min.js',array(),'1.0',true);
	wp_enqueue_script('industrious-util',get_template_directory_uri().'/assets/js/util.js',array(),'1.0',true);
	wp_enqueue_script('industrious-main',get_template_directory_uri().'/assets/js/main.js',array(),'1.0',true);
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'industrious_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
function head_section(){
	vc_map(array(
		'name' => __('video Section','industrious'),
		'description' => 'video section',
		'base' => 'map',
		'icon' => 'fa fa-video'
	));
}
add_action('vc_before_init','head_section');

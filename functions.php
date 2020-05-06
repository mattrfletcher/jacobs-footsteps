<?php
/**
 * Jacobs Footsteps functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Jacobs_Footsteps
 */

if ( ! function_exists( 'jacobs_footsteps_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jacobs_footsteps_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Jacobs Footsteps, use a find and replace
	 * to change 'jacobs-footsteps' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'jacobs-footsteps', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'jacobs-footsteps' ),
		
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
	add_theme_support( 'custom-background', apply_filters( 'jacobs_footsteps_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'jacobs_footsteps_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jacobs_footsteps_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jacobs_footsteps_content_width', 640 );
}
add_action( 'after_setup_theme', 'jacobs_footsteps_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jacobs_footsteps_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'jacobs-footsteps' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'jacobs-footsteps' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'jacobs_footsteps_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function jacobs_footsteps_scripts() {
	
	
	wp_register_script('jquery.bootstrap.min', get_template_directory_uri() . '/assests/js/bootstrap.min.js', array ('jquery'));
    wp_enqueue_script('jquery.bootstrap.min');

    wp_register_style( 'bootstrap.min', get_template_directory_uri() . '/assests/css/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap.min' );
	wp_enqueue_style( 'jacobs-footsteps-style',  get_stylesheet_directory_uri()."/style.css");

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jacobs_footsteps_scripts' );

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


add_image_size('jfcustom', 200, 200, true);

// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
       global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Read more...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function set_container_class ($args) {
$args['container_class'] = str_replace(' ','-',$args['theme_location']).'-nav'; return $args;
}

// Register custom navigation walker //
    require_once('wp_bootstrap_navwalker.php');
	

?>

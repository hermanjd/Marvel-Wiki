<?php
/**
 * Marvel functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Marvel
 */

if ( ! function_exists( 'marvel_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function marvel_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Marvel, use a find and replace
		 * to change 'marvel' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'marvel', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'marvel' ),
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
		add_theme_support( 'custom-background', apply_filters( 'marvel_custom_background_args', array(
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
add_action( 'after_setup_theme', 'marvel_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function marvel_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'marvel_content_width', 640 );
}
add_action( 'after_setup_theme', 'marvel_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function marvel_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'marvel' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'marvel' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'marvel_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function marvel_scripts() {
	wp_enqueue_style( 'marvel-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css' );

	wp_enqueue_script( 'marvel-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'marvel-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'marvel_scripts' );

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
/**
 * Custom Post Type
 */
function superhero_custom_post_type(){
	$labels = array(
		'name' => 'Superheroes',
		'singular_name' => 'superhero',
		'add_new' => 'Add Superhero',
		'All_items' => 'All Items',
		'add_new_item' => 'Add items',
		'edit_item' => 'Edit Item',
		'new_item' => 'New Item',
		'view_item' => 'View Item',
		'search_item' => 'Search Superheroes',
		'not_found' => 'No items found',
		'not_found:in_trash' => 'No items found in trash',
		'parent_item_colon' => 'Parent Item'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'revisions',
		),
		//'taxonomies' => array('Equipments'),
		'menu_position' => 5,
		'exclude_from_search' => false
		);
		register_post_type('superhero',$args);
}

function my_custom_taxonomies(){
	//add new taxonomy hierarchical
	$labels = array(
		'name' => 'Equipments',
		'singular_name' => 'Equipment',
		'search_items' => 'Search Equipments',
		'all_items' => 'All Equipment',
		'parent_item' => 'Parent Equipment',
		'parent_item_colon' => 'Parent Equipment:',
		'edit_item' => 'Edit Equipment',
		'update_item' => 'Edit Equipment',
		'add_new_item' => 'Add New Equipment',
		'new_item_name' => 'New Equipment Name',
		'menu_name' => 'Equipment'
	);
	$args = array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'equipment')
	);
	register_taxonomy('equipment', 'superhero', $args);
	
	$labels = array(
		'name' => 'Groups',
		'singular_name' => 'Group',
		'search_items' => 'Search Groups',
		'all_items' => 'All Group',
		'parent_item' => 'Parent Group',
		'parent_item_colon' => 'Parent Group:',
		'edit_item' => 'Edit Group',
		'update_item' => 'Edit Group',
		'add_new_item' => 'Add New Group',
		'new_item_name' => 'New Group Name',
		'menu_name' => 'Group'
	);
	$args = array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => true
	);
	register_taxonomy('group', 'superhero', $args);
	
	$labels = array(
		'name' => 'Abilities',
		'singular_name' => 'Ability',
		'search_items' => 'Search Abilities',
		'all_items' => 'All Ability',
		'parent_item' => 'Parent Ability',
		'parent_item_colon' => 'Parent Ability:',
		'edit_item' => 'Edit Ability',
		'update_item' => 'Edit Ability',
		'add_new_item' => 'Add New Ability',
		'new_item_name' => 'New Ability Name',
		'menu_name' => 'Ability'
	);
	$args = array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => true
	);
	register_taxonomy('ability', 'superhero', $args);
	
	$labels = array(
		'name' => 'Hero Types',
		'singular_name' => 'Hero Type',
		'search_items' => 'Search Hero Types',
		'all_items' => 'All Hero Type',
		'parent_item' => 'Parent Hero Type',
		'parent_item_colon' => 'Parent Hero Type:',
		'edit_item' => 'Edit Hero Type',
		'update_item' => 'Edit Hero Type',
		'add_new_item' => 'Add New Hero Type',
		'new_item_name' => 'New Hero Type Name',
		'menu_name' => 'Hero Type'
	);
	$args = array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => true
	);
	register_taxonomy('herotype', 'superhero', $args);
	
	
	//add new taxonomy NOT hierarchical
}
add_action('init','superhero_custom_post_type');
add_action('init','my_custom_taxonomies');

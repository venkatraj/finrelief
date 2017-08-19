<?php
/**
 * finrelief functions and definitions
 *
 * @package FinRelief
 */


if ( ! function_exists( 'fin_relief_setup' ) ) :  
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fin_relief_setup() { 

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on finrelief, use a find and replace
	 * to change 'finrelief' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'finrelief', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'finrelief' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-list', 'gallery', 'caption',
	) );


	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'fin_relief_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 */
	$GLOBALS['content_width'] = apply_filters( 'fin_relief_content_width', 640 );

    /* 
    * Custom Logo 
    */
    add_theme_support( 'custom-logo' );

    
	/* Woocommerce support */

	add_theme_support('woocommerce');
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' ); 

	/*
	 * Add Additional image sizes
	 *
	 */  
	add_image_size( 'finrelief-small-featured-image-width', 450,300, true );
	add_image_size( 'finrelief-blog-large-width', 800,300, true );

	add_image_size( 'finrelief-service-img', 150,100, true );
	add_image_size( 'finrelief-recent-posts-img', 570,300, true );

    // Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
     
	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(

			// Put two core-defined widgets in the footer 2 area.
			'header-top-right' => array(
				// Widget ID
			    'my_text' => array(
					// Widget $id -> set when creating a Widget Class
		        	'text' , 
		        	// Widget $instance -> settings 
					array(
					  'text'  => '<ul><li><a href="http://www.facebook.com/"><i class="fa fa-facebook"></i></a></li><li><a href="http://www.twitter.com/"><i class="fa fa-twitter"></i></a></li><li><a href="http://www.pinterest.com/"><i class="fa fa-pinterest"></i></a></li><li><a href="http://www.tumblr.com/"><i class="fa fa-tumblr"></i></a></li></ul>'
					)
				),
				'search',
			),

			'footer' => array(
				// Widget ID
			    'my_text' => array(
					// Widget $id -> set when creating a Widget Class
		        	'text' , 
		        	// Widget $instance -> settings 
					array(
					  'title' => __('About Theme','finrelief'),
					  'text'  => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ','finrelief'),
					)
				)
			),
			'footer-2' => array(
				// Widget ID
			    'archives'
			),
			'footer-3' => array(
				// Widget ID
			    'categories'
			),

			'footer-4' => array(
				// Widget ID
			    'my_text' => array(
					// Widget $id -> set when creating a Widget Class
		        	'text' , 
		        	// Widget $instance -> settings 
					array(
					  'title' => __('Head Office','finrelief'),
					  'text'  => __( 'Honest Bank, 457 Grand Ave,Los Angels, BA 007<br><strong>Email:</strong> <a href="mailto:xxx@mail.com">xxx@mail.com</a><br><strong>phone:</strong> 1234 5624 2586<br><strong>Fax:</strong> 158 425 252','finrelief'),
					)
				)
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home' => array(
				'post_type' => 'page',
			),
			'blog' => array(
				'post_type' => 'page',
			),
			'slider-one' => array(
	            'post_type' => 'post',
	            'post_title' => __( 'Post One', 'finrelief'),
	            'post_content' => __( '<h2>Dedicated of Excellence</h2> Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod.<p class="portfolio-readmore"><a class="btn btn-mini more-link" href="#">Read More</a></p>', 'finrelief'),
	            'thumbnail' => '{{post-featured-image}}',
	        ),
	        'slider-two' => array(
	            'post_type' => 'post',
	            'post_title' => __( 'Post Two', 'finrelief'),
	            'post_content' => __( '<h2>We are Voice of Justice</h2> Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod.<p class="portfolio-readmore"><a class="btn btn-mini more-link" href="#">Read More</a></p>', 'finrelief'),
	            'thumbnail' => '{{post-featured-image}}',
	        ), 
			'service-one' => array(  
				'post_type' => 'page',
				'post_title' => __( 'Service 1', 'finrelief'),
	            'post_content' => __( 'Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Aenean lacinia bibendum nulla sed consectetur', 'finrelief'),
				'thumbnail' => '{{page-images}}',
			),
			'service-two' => array(
				'post_type' => 'page',
				'post_title' => __( 'Service 2', 'finrelief'),
	            'post_content' => __( 'Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Aenean lacinia bibendum nulla sed consectetur', 'finrelief'),
				'thumbnail' => '{{page-images}}',
			),
			'service-three' => array(
				'post_type' => 'page',
				'post_title' => __( 'Service 3', 'finrelief'),
	            'post_content' => __( 'Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Aenean lacinia bibendum nulla sed consectetur', 'finrelief'),
				'thumbnail' => '{{page-images}}',
			),
			
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'post-featured-image' => array( 
				'post_title' => __( 'slider one', 'finrelief' ),
				'file' => 'images/slider.png', // URL relative to the template directory.
			),
			'page-images' => array(
				'post_title' => __( 'Page Images', 'finrelief' ),
				'file' => 'images/page.png', // URL relative to the template directory.
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),  

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array( 
			'slider_cat' => '1',
			'service_1' => '{{service-one}}',
			'service_2' => '{{service-two}}',
			'service_3' => '{{service-three}}',
			'service_section_icon_1' => 'fa-user',
			'service_section_icon_2' => 'fa-heart',
			'service_section_icon_3' => 'fa-apple',
		),

	);

	$starter_content = apply_filters( 'fin_relief_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );

	     
}
endif; // fin_relief_setup
add_action( 'after_setup_theme', 'fin_relief_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function fin_relief_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'finrelief' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );   
	
	register_sidebar( array(
		'name'          => __( 'Header Top Right', 'finrelief' ),
		'id'            => 'header-top-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebars( 4, array(
		'name'          => __( 'Footer %d', 'finrelief' ),
		'id'            => 'footer',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'fin_relief_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/includes/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';
/**
 * Implement the Custom Header feature.
 */
require  get_template_directory()  . '/includes/custom-header.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

/**
 * Load Theme Options Panel
 */
require get_template_directory() . '/includes/theme-options.php';

/* Woocommerce support */

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');
add_action('woocommerce_before_main_content', 'fin_relief_output_content_wrapper');

function fin_relief_output_content_wrapper() {
	echo '<div class="container"><div class="row"><div id="primary" class="content-area eleven columns">';
}

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end' );
add_action( 'woocommerce_after_main_content', 'fin_relief_output_content_wrapper_end' );

function fin_relief_output_content_wrapper_end () {
	echo "</div>";
}

add_action( 'wp_head', 'fin_relief_remove_wc_breadcrumbs' );
function fin_relief_remove_wc_breadcrumbs() {
   	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}  



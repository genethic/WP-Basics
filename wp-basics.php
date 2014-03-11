<?php 
/* 
Plugin Name: WP-Basics 
Description: Add more content after post content: related content, author info, post pagination, social sharing buttons, post meta, image, text
Version:2.0
Author: Genethick 
Author URI: http://www.codetocode-developments.com 
Plugin URI: http://www.codetocode-developments.com/wp-plugins/after-content-plugin-documentation/ 
License: GPLv2 
License URI: http://www.gnu.org/licenses/gpl-2.0.html 
*/
	 
// Script version, used to add version for scripts and styles 
define( 'WPB_VER', '2.0' ); 
// Define plugin URLs, for fast enqueuing scripts and styles 
if ( ! defined( 'WPB_URL' ) ) 
	define( 'WPB_URL', plugin_dir_url( __FILE__ ) ); 
// Plugin paths, for including files 
if ( ! defined( 'WPB_DIR' ) ) 
	define( 'WPB_DIR', plugin_dir_path( __FILE__ ) ); 
	
// Initialize Redux Framework 
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' ) ) { 
	require_once( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' ); 
} 
if ( !isset( $wpb_opt ) && file_exists( dirname( __FILE__ ) . '/inc/plugin-options.php' ) ) { 
	require_once( dirname( __FILE__ ) . '/inc/plugin-options.php' ); 
	
}	
if ( file_exists( WPB_DIR . '/inc/breadcrumbs.php' ) ) { 
	require_once WPB_DIR . 'inc/breadcrumbs.php'; 
} 
if ( file_exists( WPB_DIR . '/inc/pagination.php' ) ) { 
	require_once WPB_DIR . 'inc/pagination.php'; 
} 
if ( file_exists( WPB_DIR . '/inc/post-pagination.php' ) ) { 
	require_once WPB_DIR . 'inc/post-pagination.php'; 
} 
if ( file_exists( WPB_DIR . '/inc/related.php' ) ) { 
	include WPB_DIR . 'inc/related.php'; 
} 
if ( file_exists( WPB_DIR . '/inc/author.php' ) ) { 
	require_once WPB_DIR . 'inc/author.php'; 
} 
if ( file_exists( WPB_DIR . '/inc/social-profiles.php' ) ) { 
	require_once WPB_DIR . 'inc/social-profiles.php'; 
} 
if ( file_exists( WPB_DIR . '/inc/social-sharing.php' ) ) { 
	require_once WPB_DIR . 'inc/social-sharing.php'; 
}  


//add activated features after post content 
add_filter( 'the_content',  'wpb_add_after_post', 2 );  
function wpb_add_after_post ($content) { 
	 
	global $wpb_opt; 
	 
	if ( $wpb_opt['activate_post_pagination'] == '1' ) { 
		$content .= wpb_post_pagination(); 
	}	 
	if ( $wpb_opt['activate_related'] == '1' ) { 
		$content .= wpb_related_content();	 
	} 
	if ( $wpb_opt['activate_author'] == '1' ) { 
		$content .= wpb_author_info(); 
	} 
	if ( $wpb_opt['activate_social_buttons'] == '1' ) { 
		$content .= wpb_social_sharing(); 
	} 
	return $content; 
} 
/* facebook */ 
function wpb_facebook() { 
	wp_register_script( 'facebook',  WPB_URL . 'js/facebook.js' ); 
	wp_enqueue_script( 'facebook' ); 
} 
add_action( 'wp_enqueue_scripts', 'wpb_facebook' );
 
/* twitter */ 
function wpb_twitter() { 
	wp_register_script( 'twitter',  WPB_URL . 'js/twitter.js' ); 
	wp_enqueue_script( 'twitter' ); 
} 
add_action( 'wp_enqueue_scripts', 'wpb_twitter' ); 

/* google plus */ 
function wpb_google_plus() { 
	wp_register_script( 'google_plus',  WPB_URL . 'js/google-plus.js' ); 
	wp_enqueue_script( 'google_plus' ); 
} 
add_action( 'wp_enqueue_scripts', 'wpb_google_plus' ); 

/* FONT AWESOME ICONS*/ 
function wpb_font_awesome () { 
	wp_register_style( 'wpb_font_awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css'); 
	wp_enqueue_style( 'wpb_font_awesome' ); 
} 
add_action('wp_enqueue_scripts', 'wpb_font_awesome'); 

/* THUMBNAILS SUPPORT AND SIZES */ 
if (!current_theme_supports('post-thumbnail')) { 
	add_theme_support( 'post-thumbnails' ); 
} 
add_image_size ('wpb-200','200','150',true);
 
//add jquery 
add_action( 'wp_enqueue_scripts', 'wpb_add_jquery' ); 
function wpb_add_jquery() { 
	wp_enqueue_script( 'jquery' ); 
} 

//add styles 
add_action( 'wp_enqueue_scripts', 'wpb_add_style' ); 
function wpb_add_style() { 
	wp_register_style( 'wp-basics-css', WPB_URL . 'wp-basics.css' ); 
	wp_enqueue_style( 'wp-basics-css' ); 
} 

//add custom css 
add_action('wp_enqueue_scripts',  'add_wpb_css' ); 
function add_wpb_css () { 
	global $wpb_opt; 
	if( !empty( $wpb_opt['custom_css'] ) ) { 
		echo '<style type="text/css">' . $wpb_opt['custom_css'] . '</style>'; 
	} 
}	  
?>
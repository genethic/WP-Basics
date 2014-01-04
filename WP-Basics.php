<?php
/*
Plugin Name: WP-Basics
Description: Add basic funtionalities to your wordpress: breadcrumbs, pagination, related content, author info after posts content and social sharing after posts content
Version:1.0
Author: Genethick
Author URI: http://www.codetocode-developments.com
Plugin URI: http://www.codetocode-developments.com/wp-plugins/wp-basics-documentation/
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/	

global $smof_data;

include ('breadcrumbs.php');
include ('pagination.php');
include ('related.php');
include ('author.php');
include ('social-profiles.php');
include ('social-sharing.php');
include ('admin/index.php');
	
/*------------------------------------------------------------------------------------------------------------------------------
	ADD HOOKS
---------------------------------------------------------------------------------------------------------------------------------*/

//display pagination if is active and is single page
if ( $smof_data['pagination_active'] == 1 ) {
	
	function add_wb_pagination ($content) {
		
		$content .= wb_pagination();
		return $content;
		
	}
	
	add_filter('the_content',  'add_wb_pagination' ); 
	
}


//display related content if is active and is single page
if ( $smof_data['related_active'] == 1 ) {
	
	function add_wb_related_content_cat ($content) {
		
		$content .= wb_related_content();	
		return $content;
		
	}
	
	add_filter('the_content',  'add_wb_related_content_cat', 2 ); 
	
}


//display author info if is active and is single page
if ( $smof_data['author_active'] == 1 ) {
	
	add_filter('user_contactmethods','wb_new_contact_methods');
	
	function add_wb_author ($content) {
		
		$content .= wb_author_info();
		return $content;
		
	}
	
	add_filter('the_content',  'add_wb_author', 12 ); 
	
}


//display social sharing buttons if is active and is single page
if ( $smof_data['social_sharing_active'] == 1 ) {
	
	function add_wb_social_sharing ($content) {
		
		$content .= wb_social_sharing();
		return $content;
		
	}
	
	add_filter('the_content',  'add_wb_social_sharing', 1 ); 
	
}


//add stylesheet
function wb_add_style() {
	
	wp_register_style('wb-basics-style',  plugin_dir_url( __FILE__ ) . 'wb-basics-style.php');
	wp_enqueue_style('wb-basics-style');
	
}

add_action('wp_print_styles', 'wb_add_style');

?>
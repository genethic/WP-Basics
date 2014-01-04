<?php

add_action( 'init','of_options' );

if ( !function_exists('of_options') ) {
	function of_options() {	
		//array of options for select, multichek and radio options
		$of_options_related_type = array ( 
			'tag' => "By tags", 
			'cat' => "By category",
		);
		
		$of_options_share_buttons = array (
			"facebook"	=> "Facebook like",
			"twitter"	=> "Twitter follow",
			"google-plus"	=> "Google +1",
		);
						
		$of_options_author_info = array (
			"title"	=> "Title",
			"avatar"	=> "Avatar",
			"bio"	=> "Biography",
			"social"	=> "Social profile links",
			"posts_link" => "Link to posts"
		);
									
		$of_options_facebook_button_layout = array(
			"standard" => "Standard",
			"box_count" => "Box count",
			"button_count" => "Button count",
			"button" => "Button",
		);
		
		$of_options_twitter_show_count = array(
			"none" => "None",
			"horizontal" => "Horizontal",
			"vertical" => "Vertical",
		);
		
		$of_options_google_plus_size = array(
			"small" => "Small",
			"medium" => "Medium",
			"standard" => "Standard",
			"tall" => "Tall",
		);
		
		$breadcrumbs_css = '/*Breadcrumbs*/
.breadcrumbs {
float:left;
width:100%;
margin-bottom:30px;
}

.breadcrumbs a{
color:#1abc9c;
font-size:16px:
}

.breadcrumbs a:hover{
text-decoration:underline;
}';
		
		$pagination_css = '/*Pagination*/
.post-links {
float:left;
width:100%;
margin-top:20px;
padding:20px 0;
border-bottom:1px solid #eee;
border-top:1px solid #eee;
box-sizing:border-box;
}

.post-links a{
color:#1abc9c;
font-size: 18px;
font-weight: 600;
}

.post-links a:hover{
text-decoration:underline;
}

.post-links .previous{
float:left;
width:50%;
}

.post-links .next{
float:right;
width:50%;
text-align:right;
}';
							
		$related_content_css = '/*related content*/
.related-post-wrapper {
float:left;
margin:3% 0;
width:100%;
box-sizing:border-box;
}
.related-post-wrapper > h3 {
border-bottom:1px solid #111;
float:left;
margin-bottom:1%;
width:100%;
}
.related-post {
float:left;
margin-left:4%;
width:22%;
position:relative;
}
.related-post:nth-of-type(4n+1) {
clear:left;
margin-left:0;
}
.related-post h3 {
width:100%;
float:left;
margin-top:5px;
}
.related-post h3 a {
color:#222;
font-size:14px;
line-height:20px;
overflow:hidden;
float:left;
width:100%;
margin-top:5px;
}
.related-post h3 a:hover {

}

.related-post-thumbnail {
float:left;
position:relative;
width:100%;
}

.related-post-thumbnail img {
width:100% !important;
}';
							
		$author_info_css = '/*author*/
.author-info {
margin:3% 0;
float:left;
width:100%;
}
.author-info h2 {
line-height:18px;
margin:0 0 2% 0;
}
.author-info-avatar {
float:left;
width:20%;
}
.author-info-avatar img {
height:80%;
width:100% !important;
}
.author-info-desc {
float:right;
padding-left:3%;
width:80%;
box-sizing:border-box;
}
.author-info-links {
float:right;
margin-top:10px;
width:auto;
}

.author-info-links a{
font-size:14px;
}

.author-info-links:hover {
text-decoration:underline;
}
.author-info .social-profile-buttons {
float:left;
margin-right:0;
margin-top:10px;
margin-bottom: 0;
width:auto;
}
.author-info .social-profile-buttons a {
margin-left:0;
margin-right:10px;
font-size:15px;
color: #444;
}';
		
		$social_sharing_css = '/*Social sharing*/
.social-sharing {
float:left;
width:100%;
}

.social-sharing p{
display:inline;
}

.social-sharing .fb-like{
margin-bottom:0 !important;
margin-right: 20px !important;
}

.social-sharing #twitter-widget-0{
margin-bottom:0 !important;
margin-right: 20px !important;
}

#___plusone_0 {
width:auto  !important;
}';


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		            	natsort($bg_images); //Sorts the array into a natural order
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

$of_options[] = array( 	"name" 		=> "Breadcrumbs",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-add.png"
				);
				
$of_options[] = array(	"id"        => "breadcrumbs_info",
                        "std"       => "You can add breadcrumbs anywhere on your blog by calling function directly. Put the next code in the template you want: </br> if ( function_exists( wb_breadcrmbs() ) ) { wb_breadcrumbs(); } ",
                        "icon"      => true,
                        "type"      => "info"
                );
				
$of_options[] = array( 	"name" 		=> "Home page text",
						"desc" 		=> "Text for home page link.",
						"id" 		=> "home_page_text",
						"std" 		=> "Home",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Category page text",
						"desc" 		=> "Text for category page link. Use %s to display category name.",
						"id" 		=> "cat_page_text",
						"std" 		=> "%s",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Search page text",
						"desc" 		=> "Text for home page link. Use %s to display search term.",
						"id" 		=> "search_page_text",
						"std" 		=> "Search results for %s",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Tags page text",
						"desc" 		=> "Text for tags page link. Use %s to display tag name.",
						"id" 		=> "tags_page_text",
						"std" 		=> "Tag: %s",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Author page text",
						"desc" 		=> "Text for home page link. Use %s to display author name.",
						"id" 		=> "author_page_text",
						"std" 		=> "%s\'s articles",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Error page text",
						"desc" 		=> "Text for error page link.",
						"id" 		=> "error_page_text",
						"std" 		=> "Error 404",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Show current",
						"desc" 		=> "Display current post/page/category title in breadcrumbs",
						"id" 		=> "show_current",
						"std" 		=> 1,
						"type" 		=> "checkbox"
				);
				
$of_options[] = array( 	"name" 		=> "Show on home",
						"desc" 		=> "Show breadcrumbs on the homepage",
						"id" 		=> "show_on_home",
						"std" 		=> 1,
						"type" 		=> "checkbox"
				);

$of_options[] = array( 	"name" 		=> "Show home link",
						"desc" 		=> "Show the link to the home page.",
						"id" 		=> "show_home_link",
						"std" 		=> 1,
						"type" 		=> "checkbox"
				);
				
$of_options[] = array( 	"name" 		=> "Show title",
						"desc" 		=> "Show the title attribute for links",
						"id" 		=> "show_title",
						"std" 		=> 1,
						"type" 		=> "checkbox"
				);
				
$of_options[] = array( 	"name" 		=> "Delimiter",
						"desc" 		=> "Delimiter between crumbs",
						"id" 		=> "delimiter",
						"std" 		=> " &raquo; ",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Custom CSS",
						"id" 		=> "breadcrumbs_css",
						"std" 		=> $breadcrumbs_css,
						"type" 		=> "textarea"
				);
				
$of_options[] = array( 	"name" 		=> "Pagination",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-docs.png"
				);
				
$of_options[] = array( 	"name" 		=> "Activate pagination",
						"id" 		=> "pagination_active",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Previous link format",
						"desc" 		=> "You must use %link to locate the link in the sentence.",
						"id" 		=> "prev_format",
						"std" 		=> "&laquo; %link",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Previous link text",
						"desc" 		=> "You can use %title to show the previous posts title in the link.",
						"id" 		=> "prev_link",
						"std" 		=> "%title",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Next link format",
						"desc" 		=> "You must use %link to locate the link in the sentence.",
						"id" 		=> "next_format",
						"std" 		=> "%link &raquo;",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Next link text",
						"desc" 		=> "You can use %title to show the previous posts title in the link.",
						"id" 		=> "next_link",
						"std" 		=> "%title",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "In cat",
						"desc" 		=> "Previous / next post must be within the same category as the current post.",
						"id" 		=> "links_cat",
						"std" 		=> 1,
						"type" 		=> "checkbox"
				);
				
$of_options[] = array( 	"name" 		=> "Custom CSS",
						"id" 		=> "pagination_css",
						"std" 		=> $pagination_css,
						"type" 		=> "textarea"
				);
				
$of_options[] = array(	"id"        => "pagination_info",
                        "std"       => "You can add pagination anywhere on your post by calling function directly. Put the next code in the template you want: </br> if ( function_exists( wb_pagination() ) ) { wb_pagination(); } ",
                        "icon"      => true,
                        "type"      => "info"
                );

$of_options[] = array( 	"name" 		=> "Related content",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-add.png",
				);
				
$of_options[] = array( 	"name" 		=> "Activate related content",
						"id" 		=> "related_active",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "Related by tags or by category?",
						"id" 		=> "related_type",
						"std" 		=> "cat",
						"type" 		=> "radio",
						"options" 	=> $of_options_related_type
				);
				
$of_options[] = array( 	"name" 		=> "Title",
						"desc" 		=> "Title to show before related content posts",
						"id" 		=> "related_title",
						"std" 		=> "RELATED CONTENT",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Number",
						"desc" 		=> "Number of posts you want to show",
						"id" 		=> "number_posts",
						"std" 		=> "4",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Display image",
						"desc" 		=> "Show the post thumbnail of related posts",
						"id" 		=> "display_img",
						"std" 		=> 1,
						"type" 		=> "checkbox"
				);
				
$of_options[] = array( 	"name" 		=> "Custom CSS",
						"id" 		=> "related_content_css",
						"std" 		=> $related_content_css,
						"type" 		=> "textarea"
				);
				
$of_options[] = array(	"id"        => "related_content_info",
                        "std"       => "You can add related content anywhere on your post by calling function directly. Put the next code in the template you want: </br> if ( function_exists( wb_related_content() ) ) { wb_related_content(); } ",
                        "icon"      => true,
                        "type"      => "info"
                );
				
$of_options[] = array( 	"name" 		=> "Author info",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-docs.png"
				);
				
$of_options[] = array( 	"name" 		=> "Activate author info",
						"id" 		=> "author_active",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "What info do you want to show?",
						"id" 		=> "author_info",
						"std" 		=> array("title", "avatar", "bio", "posts_link"),
						"type" 		=> "multicheck",
						"options"	=> $of_options_author_info,
				);
				
$of_options[] = array( 	"name" 		=> "Title",
						"desc" 		=> "Title to show before biography",
						"id" 		=> "author_title",
						"std" 		=> "About %s",
						"type" 		=> "text"
				);
				
$of_options[] = array( 	"name" 		=> "Custom CSS",
						"id" 		=> "author_info_css",
						"std" 		=> $author_info_css,
						"type" 		=> "textarea"
				);
				
$of_options[] = array(	"id"        => "author_info",
                        "std"       => "You can add author info anywhere on your post by calling function directly. Put the next code in the template you want: </br> if ( function_exists( wb_author_info() ) ) { wb_author_info(); } ",
                        "icon"      => true,
                        "type"      => "info"
                );
				
$of_options[] = array( 	"name" 		=> "Social sharing",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-docs.png"
				);
				
$of_options[] = array( 	"name" 		=> "Activate social sharing",
						"id" 		=> "social_sharing_active",
						"std" 		=> 1,
						"type" 		=> "switch"
				);
				
$of_options[] = array( 	"name" 		=> "What buttons do you want to show?",
						"id" 		=> "share_buttons",
						"std" 		=> array("facebook", "twitter", "google-plus"),
						"type" 		=> "multicheck",
						"options"	=> $of_options_share_buttons,
				);
				
$of_options[] = array( 	"name" 		=> "Facebook",
						"desc" 		=> "Facebook button layout",
						"id" 		=> "fb_button_layout",
						"std" 		=> "button_count",
						"type" 		=> "select",
						"options"	=> $of_options_facebook_button_layout,
				);

$of_options[] = array( 	"name" 		=> "Include share button",
						"id" 		=> "facebook_share_button",
						"std" 		=> 1,
						"type" 		=> "checkbox"
				);
				
$of_options[] = array( 	"name" 		=> "Twitter",
						"desc" 		=> "Show count",
						"id" 		=> "twitter_show_count",
						"std" 		=> "none",
						"type" 		=> "select",
						"options"	=> $of_options_twitter_show_count,
				);
				
$of_options[] = array( 	"name"		=>"Google plus",
						"desc" 		=> "Google plus size",
						"id" 		=> "google_plus_size",
						"std" 		=> "standard",
						"type" 		=> "select",
						"options"	=> $of_options_google_plus_size,
				);
				
$of_options[] = array( 	"name" 		=> "Custom CSS",
						"id" 		=> "social_sharing_css",
						"std" 		=> $social_sharing_css,
						"type" 		=> "textarea"
				);
				
$of_options[] = array(	"id"        => "social_sharing_info",
                        "std"       => "You can add social sharing buttons anywhere on your blog by calling function directly. Put the next code in the template you want: </br> if ( function_exists( wb_social_sharing() ) ) { wb_social_sharing(); } ",
                        "icon"      => true,
                        "type"      => "info"
                );
				
// Backup Options
$of_options[] = array( 	"name" 		=> "Backup Options",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-slider.png"
				);
				
$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				);
				
$of_options[] = array( 	"name" 		=> "Transfer Theme Options Data",
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				);
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>

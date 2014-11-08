<?php 
/** 
  ReduxFramework Sample Config File 
  For full documentation, please visit: https://github.com/ReduxFramework/ReduxFramework/wiki 
 * */ 
if (!class_exists("wp_basics_options")) { 
    class wp_basics_options { 
        public $args = array(); 
        public $sections = array(); 
        public $theme; 
        public $ReduxFramework; 
        public function __construct() { 
            if ( !class_exists("ReduxFramework" ) ) { 
                return; 
            } 
            // This is needed. Bah WordPress bugs.  ;) 
            if ( defined('TEMPLATEPATH') && strpos( Redux_Helpers::cleanFilePath( __FILE__ ), Redux_Helpers::cleanFilePath( TEMPLATEPATH ) ) !== false) { 
                $this->initSettings(); 
            } else { 
                add_action('plugins_loaded', array($this, 'initSettings'), 10); 
            } 
        } 
        public function initSettings() { 
            // Set the default arguments 
            $this->setArguments(); 
            // Set a few help tabs so you can see how it's done 
            $this->setHelpTabs(); 
            // Create the sections and fields 
            $this->setSections(); 
            if (!isset($this->args['opt_name'])) { // No errors please 
                return; 
            } 
            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args); 
        } 
        public function setSections() {    
            
			
			// ACTUAL DECLARATION OF SECTIONS 
			
			$this->sections[] = array( 
				'icon' => ' el-icon-link', 
				'title' => __('Breadcrumbs', 'redux-framework-demo'), 
				'fields' => array( 
					array(
                        'id' => 'breadcrumbs_info',
                        'type' => 'info',
                        'notice' => true,
                        'title' => __('Info', 'redux-framework-demo'),
                        'desc' => __("You can add breadcrumbs anywhere on your blog by calling function directly. Put the next code in the template you want: </br> <code>if ( function_exists( 'wpb_breadcrumbs' ) ) { echo wpb_breadcrumbs(); }</code>.", 'redux-framework-demo')
                    ),
					 array( 
                        'id' => 'show_current', 
                        'type' => 'checkbox', 
                        'title' => __('Show current', 'redux-framework-demo'), 
                        'subtitle' => __('Display current post/page/category title in breadcrumbs.', 'redux-framework-demo'), 
                        'default' => 1, 
                    	),
					array( 
                        'id' => 'show_home_link', 
                        'type' => 'checkbox', 
                        'title' => __('Show home link', 'redux-framework-demo'), 
                        'subtitle' => __('Show the link to the home page.', 'redux-framework-demo'), 
                        'default' => 1, 
                    	),
					array( 
                        'id' => 'show_title', 
                        'type' => 'checkbox', 
                        'title' => __('Show title', 'redux-framework-demo'), 
                        'subtitle' => __('Show the title attribute for links.', 'redux-framework-demo'), 
                        'default' => 1, 
                    	),	
					array( 
						'id'=>'delimiter', 
						'type' => 'text', 
						'title' => __('Delimiter', 'redux-framework-demo'), 
						'subtitle' => __('Delimiter between crumbs.', 'redux-framework-demo'), 
						'default' => ' &raquo; ', 
						'validate' => 'html', 
						), 
					array( 
						'id'=>'home_page_text', 
						'type' => 'text', 
						'title' => __('Home page text', 'redux-framework-demo'), 
						'subtitle' => __('Text for home page link.', 'redux-framework-demo'), 
						'default' => 'Home', 
						'validate' => 'html', 
						), 
					array( 
						'id'=>'cat_page_text', 
						'type' => 'text', 
						'title' => __('Category page text', 'redux-framework-demo'), 
						'subtitle' => __('Text for category page link. Use %s to display category name.', 'redux-framework-demo'), 
						'default' => '%s', 
						'validate' => 'html', 
						),
					array( 
						'id'=>'search_page_text', 
						'type' => 'text', 
						'title' => __('Search page text', 'redux-framework-demo'), 
						'subtitle' => __('Text for home page link. Use %s to display search term.', 'redux-framework-demo'), 
						'default' => 'Search results for %s', 
						'validate' => 'html', 
						), 
					array( 
						'id'=>'tags_page_text', 
						'type' => 'text', 
						'title' => __('Tags page text', 'redux-framework-demo'), 
						'subtitle' => __('Text for tags page link. Use %s to display tag name.', 'redux-framework-demo'), 
						'default' => 'Tags: %s', 
						'validate' => 'html', 
						),
					array( 
						'id'=>'author_page_text', 
						'type' => 'text', 
						'title' => __('Author page text', 'redux-framework-demo'), 
						'subtitle' => __('Text for author page link. Use %s to display author name.', 'redux-framework-demo'), 
						'default' => '%s\'s articles', 
						'validate' => 'html', 
						),
					array( 
						'id'=>'error_page_text', 
						'type' => 'text', 
						'title' => __('Error page text', 'redux-framework-demo'), 
						'subtitle' => __('Text for error page link.', 'redux-framework-demo'), 
						'default' => 'Error 404', 
						'validate' => 'html', 
						), 				
				));


			$this->sections[] = array( 
				'icon' => 'el-icon-arrow-right', 
				'title' => __('Pagination', 'redux-framework-demo'), 
				'fields' => array( 
					array(
                        'id' => 'pagination_info',
                        'type' => 'info',
                        'notice' => true,
                        'title' => __('Info', 'redux-framework-demo'),
                        'desc' => __("You can add pagination anywhere on your post by calling function directly. Put the next code in the template you want: </br> <code>if ( function_exists( 'wpb_pagination' ) ) { echo wpb_pagination(); }</code>.", 'redux-framework-demo')
                    ),
					array( 
						'id'=>'pag_prev_link', 
						'type' => 'text', 
						'title' => __('Previous link text', 'redux-framework-demo'),  
						'default' => 'Previous', 
						'validate' => 'html', 
						),  
					array( 
						'id'=>'pag_next_link', 
						'type' => 'text', 
						'title' => __('Next link text', 'redux-framework-demo'), 
						'default' => 'Next', 
						'validate' => 'html', 
						),
					
				));
			
			$this->sections[] = array( 
				'icon' => 'el-icon-arrow-right', 
				'title' => __('Post Pagination', 'redux-framework-demo'), 
				'fields' => array( 
					array( 
						'id'=>'activate_post_pagination', 
						'type' => 'switch',  
						'title' => __('Activate Post Pagination', 'redux-framework-demo'), 
						"default" => 0, 
						'on' => 'Enabled', 
						'off' => 'Disabled', 
						), 
					array( 
						'id'=>'prev_format', 
						'type' => 'text', 
						'title' => __('Previous link format', 'redux-framework-demo'), 
						'subtitle' => __('You must use %link to locate the link in the sentence.', 'redux-framework-demo'), 
						'default' => '&laquo; %link', 
						'validate' => 'html', 
						), 
					array( 
						'id'=>'prev_link', 
						'type' => 'text', 
						'title' => __('Previous link text', 'redux-framework-demo'), 
						'subtitle' => __('You can use %title to show the previous posts title in the link.', 'redux-framework-demo'), 
						'default' => '%title', 
						'validate' => 'html', 
						), 
					array( 
						'id'=>'next_format', 
						'type' => 'text', 
						'title' => __('Next link format', 'redux-framework-demo'), 
						'subtitle' => __('You must use %link to locate the link in the sentence.', 'redux-framework-demo'), 
						'default' => '%link &raquo;', 
						'validate' => 'html', 
						), 
					array( 
						'id'=>'next_link', 
						'type' => 'text', 
						'title' => __('Next link text', 'redux-framework-demo'), 
						'subtitle' => __('You can use %title to show the previous posts title in the link.', 'redux-framework-demo'), 
						'default' => '%title', 
						'validate' => 'html', 
						),					 
					 array( 
                        'id' => 'link_cat', 
                        'type' => 'checkbox', 
                        'title' => __('In same category', 'redux-framework-demo'), 
                        'subtitle' => __('Previous / next post must be within the same category as the current post.', 'redux-framework-demo'), 
                        'default' => 1, 
                    	),
					array(
                        'id' => 'post_pagination_info',
                        'type' => 'info',
                        'notice' => true,
                        'title' => __('Info', 'redux-framework-demo'),
                        'desc' => __("You can add post pagination anywhere on your post by calling function directly. Put the next code in the template you want: </br> <code>if ( function_exists( 'wpb_post_pagination' ) ) { echo wpb_post_pagination(); }</code>.", 'redux-framework-demo')
                    ), 
					)); 
				 
				$this->sections[] = array( 
				'icon' => 'el-icon-paper-clip', 
				'title' => __('Related Content', 'redux-framework-demo'), 
				'fields' => array( 
					array( 
						'id'=>'activate_related', 
						'type' => 'switch',  
						'title' => __('Activate related content', 'redux-framework-demo'), 
						"default" => 0, 
						'on' => 'Enabled', 
						'off' => 'Disabled', 
						), 
					array( 
                        'id' => 'related_type', 
                        'type' => 'radio', 
                        'title' => __('Related by tags or by category?', 'redux-framework-demo'), 
                        'options' => array('tag' => 'By tags', 'cat' => 'By category'), 
                        'default' => 'tag' 
                    ),	 
					array( 
						'id'=>'related_title', 
						'type' => 'text', 
						'title' => __('Title', 'redux-framework-demo'), 
						'subtitle' => __('Title to show before related posts.', 'redux-framework-demo'), 
						'validate' => 'html', 
						'default' => 'Related Content', 
						), 
					array( 
						'id'=>'related_posts_number', 
						'type' => 'text', 
						'title' => __('Number of posts', 'redux-framework-demo'), 
						'subtitle' => __('Number of posts you want to display.', 'redux-framework-demo'), 
						'validate' => 'numeric', 
						'default' => '4', 
						'class' => 'small-text' 
						),					 
					 array( 
                        'id' => 'display_img', 
                        'type' => 'checkbox', 
                        'title' => __('Display image', 'redux-framework-demo'), 
                        'subtitle' => __('Show the post thumbnail of related posts.', 'redux-framework-demo'), 
                        'default' => 1, 
                    	),
					array(
                        'id' => 'related_info',
                        'type' => 'info',
                        'notice' => true,
                        'title' => __('Info', 'redux-framework-demo'),
                        'desc' => __("You can add related posts anywhere on your post by calling function directly. Put the next code in the template you want: </br> <code>if ( function_exists( 'wpb_related_content' ) ) { echo wpb_related_content(); }</code>.", 'redux-framework-demo')
                    ),			 
					)); 
				 
				$this->sections[] = array( 
				'icon' => 'el-icon-user', 
				'title' => __('Author info', 'redux-framework-demo'), 
				'fields' => array( 
					array( 
						'id'=>'activate_author', 
						'type' => 'switch',  
						'title' => __('Activate author info', 'redux-framework-demo'), 
						"default" => 0, 
						'on' => 'Enabled', 
						'off' => 'Disabled', 
						), 
					array( 
                        'id' => 'author_info', 
                        'type' => 'checkbox', 
                        'title' => __('What info do you want to show?', 'redux-framework-demo'), 
                        'options' => array('title' => 'Title', 'avatar' => 'Avatar', 'bio' => 'Biography', 'posts_link' => 'Link to all posts', 'share_buttons' => 'Share Buttons'), 
                        'default' => array('title' => '1', 'avatar' => '1', 'bio' => '1', 'posts_link' => '1', 'share_buttons' => '0') 
                    ),	 
					array( 
						'id'=>'author_title', 
						'type' => 'text', 
						'title' => __('Title', 'redux-framework-demo'), 
						'subtitle' => __('Title to show before biography. Use %s to locate the author name.', 'redux-framework-demo'), 
						'validate' => 'html', 
						'default' => 'About %s', 
						'class' => 'small-text' 
						), 
					array(
                        'id' => 'author_info',
                        'type' => 'info',
                        'notice' => true,
                        'title' => __('Info', 'redux-framework-demo'),
                        'desc' => __("You can add author info box anywhere on your post by calling function directly. Put the next code in the template you want: </br> <code>if ( function_exists( 'wpb_author_info' ) ) { echo wpb_author_info(); }</code>.", 'redux-framework-demo')
                    ),	
					)); 
				 
			$this->sections[] = array( 
				'icon' => 'el-icon-group-alt', 
				'title' => __('Social Buttons', 'redux-framework-demo'), 
				'fields' => array(	 
					array( 
						'id'=>'activate_social_buttons', 
						'type' => 'switch',  
						'title' => __('Activate social buttons', 'redux-framework-demo'), 
						"default" => 0, 
						'on' => 'Enabled', 
						'off' => 'Disabled', 
						), 
					array( 
                        'id' => 'social_buttons', 
                        'type' => 'checkbox', 
                        'title' => __('What buttons do you want to show?', 'redux-framework-demo'), 
                        'options' => array('fb' => 'Facebook', 'tw' => 'Twitter', 'g1' => 'Google+'), 
                        'default' => array('fb' => '1', 'tw' => '1', 'g1' => '1') 
                    ), 
					array( 
                        'id' => 'fb_button', 
                        'type' => 'select', 
                        'title' => __('Facebook button', 'redux-framework-demo'), 
                        'options' => array("standard" => "Standard", "box_count" => "Box count", "button_count" => "Button count", "button" => "Button"), 
                        'default' => 'button_count' 
                    ), 
					array( 
                        'id' => 'fb_share_button', 
                        'type' => 'checkbox', 
                        'title' => __('Display Facebook share button', 'redux-framework-demo'), 
                        'default' => '1' 
                    ),	 
					array( 
                        'id' => 'tw_button', 
                        'type' => 'select', 
                        'title' => __('Twitter button', 'redux-framework-demo'), 
                        'options' => array("none" => "None", "horizontal" => "Horizontal", "vertical" => "Vertical"), 
                        'default' => 'button_count' 
                    ), 
					array( 
                        'id' => 'g1_button', 
                        'type' => 'select', 
                        'title' => __('Google+ button', 'redux-framework-demo'), 
                        'options' => array("small" => "Small", "medium" => "Medium", "standard" => "Standard", "tall" => "Tall"), 
                        'default' => 'button_count' 
                    ), 
					
				array(
                        'id' => 'social_buttons_info',
                        'type' => 'info',
                        'notice' => true,
                        'title' => __('Info', 'redux-framework-demo'),
                        'desc' => __("You can add social sharing buttons anywhere on your post by calling function directly. Put the next code in the template you want: </br> <code>if ( function_exists( 'wpb_social_sharing' ) ) { echo wpb_social_sharing(); }</code>.", 'redux-framework-demo')
                    ),	
					 
				)); 
				 
			$this->sections[] = array( 
				'icon' => 'el-icon-w3c', 
				'title' => __('Custom CSS', 'redux-framework-demo'), 
				'fields' => array( 
					array( 
                        'id' => 'custom-css', 
                        'type' => 'ace_editor', 
                        'title' => __('CSS Code', 'redux-framework-demo'), 
                        'mode' => 'css', 
                        'theme' => 'chrome', 
                    ), 
					 
				 
			)); 
        } 
        public function setHelpTabs() { 
           
        } 
        /** 
          All the possible arguments for Redux. 
          For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments 
         * */ 
        public function setArguments() { 
            $this->args = array( 
                // TYPICAL -> Change these values as you need/desire 
                'opt_name' => 'wpb_opt', // This is where your data is stored in the database and also becomes your global variable name. 
                'display_name' => 'WP-Basics', // Name that appears at the top of your panel 
                'display_version' => '2.0', // Version that appears at the top of your panel 
                'menu_type' => 'menu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only) 
                'allow_sub_menu' => true, // Show the sections below the admin menu item or not 
                'menu_title' => __('WP-Basics', 'redux-framework-demo'), 
                'page_title' => __('WP-Basics', 'redux-framework-demo'), 
                // You will need to generate a Google API key to use this feature. 
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth 
                'google_api_key' => '', // Must be defined to add google fonts to the typography module 
                //'async_typography' => false, // Use a asynchronous font on the front end or font string 
                //'admin_bar' => false, // Show the panel pages on the admin bar 
                'global_variable' => 'wpb_opt', // Set a different name for your global variable other than the opt_name 
                'dev_mode' => false, // Show the time the page took to load, etc 
                'customizer' => false, // Enable basic customizer support 
                // OPTIONAL -> Give you extra features 
                'page_priority' => '120.3', // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning. 
                'page_parent' => 'plugins.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters 
                'page_permissions' => 'manage_options', // Permissions needed to access the options panel. 
                'menu_icon' => '', // Specify a custom URL to an icon 
                'last_tab' => '', // Force your panel to always open to a specific tab (by id) 
                'page_icon' => 'icon-themes', // Icon displayed in the admin panel next to your menu_title 
                'page_slug' => 'wp_basics', // Page slug used to denote the panel 
                'save_defaults' => true, // On load save the defaults to DB before user clicks save or not 
                'default_show' => false, // If true, shows the default value next to each field that is not the default value. 
                'default_mark' => '', // What to print by the field's title if the value shown is default. Suggested: * 
                // CAREFUL -> These options are for advanced use only 
                'transient_time' => 60 * MINUTE_IN_SECONDS, 
                'output' => true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output 
                'output_tag' => true, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head 
                //'domain'             	=> 'redux-framework', // Translation domain key. Don't change this unless you want to retranslate all of Redux. 
                //'footer_credit'      	=> '', // Disable the footer credit of Redux. Please leave if you can help it. 
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk. 
                'database' => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning! 
                'show_import_export' => true, // REMOVE 
                'system_info' => false, // REMOVE 
                'help_tabs' => array(), 
                'help_sidebar' => '', // __( '', $this->args['domain'] ); 
                'hints' => array( 
                    'icon'              => 'icon-question-sign', 
                    'icon_position'     => 'right', 
                    'icon_color'        => 'lightgray', 
                    'icon_size'         => 'normal', 
                    'tip_style'         => array( 
                        'color'     => 'light', 
                        'shadow'    => true, 
                        'rounded'   => false, 
                        'style'     => '', 
                    ), 
                    'tip_position'      => array( 
                        'my' => 'top left', 
                        'at' => 'bottom right', 
                    ), 
                    'tip_effect' => array( 
                        'show' => array( 
                            'effect'    => 'slide', 
                            'duration'  => '500', 
                            'event'     => 'mouseover', 
                        ), 
                        'hide' => array( 
                            'effect'    => 'slide', 
                            'duration'  => '500', 
                            'event'     => 'click mouseleave', 
                        ), 
                    ), 
                ) 
            ); 
            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons. 
            $this->args['share_icons'][] = array( 
                'url' => 'https://github.com/ReduxFramework/ReduxFramework', 
                'title' => 'Visit us on GitHub', 
                'icon' => 'el-icon-github' 
                    // 'img' => '', // You can use icon OR img. IMG needs to be a full URL. 
            ); 
            $this->args['share_icons'][] = array( 
                'url' => 'https://www.facebook.com/pages/Redux-Framework/243141545850368', 
                'title' => 'Like us on Facebook', 
                'icon' => 'el-icon-facebook' 
            ); 
            $this->args['share_icons'][] = array( 
                'url' => 'http://twitter.com/reduxframework', 
                'title' => 'Follow us on Twitter', 
                'icon' => 'el-icon-twitter' 
            ); 
            $this->args['share_icons'][] = array( 
                'url' => 'http://www.linkedin.com/company/redux-framework', 
                'title' => 'Find us on LinkedIn', 
                'icon' => 'el-icon-linkedin' 
            ); 
        } 
    } 
    new wp_basics_options(); 
}
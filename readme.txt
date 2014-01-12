=== WP-Basics ===
Contributors: laura20
Donate link: http://www.codetocode-developments.com/wp-plugins/wp-basics-documentation/
Tags: breadcrumbs, pagination, related content, author info, author biography, social sharing, social networks, like button
Requires at least: 3.0
Tested up to: 3.8
Stable tag: 1.7
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html


Adds breadcrumbs, pagination, post pagination, related content, author info and social sharing buttons to your blog.


== Description ==

This plugin adds six functionalities that all blogs should have:

*   Breadcrumbs
*   Pagination
*   Post pagination
*   Related content after posts
*   Author info after posts
*   Social sharing buttons after posts

You can turn on / off each functionality in one click or add it manually.
You will find an advanced setting page for easy customization on the wordpress menu.

== Installation ==
1. Upload `WP-Basics` directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to WP-Basics menu to activate and configure the plugin

== Frequently Asked Questions ==
= How can i use this functionalities to other site of my blog? =
You can add each functionality anywhere on your blog by calling functions directly.
You will need some wordpress
knowledge to do this.

*	Breadcrumb: if ( function_exists( 'wb_breadcrumbs' ) ) { echo wb_breadcrumbs(); }
*	Pagination: if ( function_exists( 'wb_pagination' ) ) { echo wb_pagination(); }
*	Post pagination: if ( function_exists( 'wb_post_pagination' ) ) { echo wb_post_pagination(); }
*	Related content: if ( function_exists( 'wb_related_content' ) ) { echo wb_related_content(); }
*	Author info: if ( function_exists( 'wb_author_info' ) ) { echo wb_author_info(); }
*	Social sharing: if ( function_exists( 'wb_social_sharing' ) ) { echo wb_social_sharing(); }

If you do it, deactivate the function in the option panel. The other options will still work,
you can continue setting it through the options panel.

== Screenshots ==
1. Breadcrumbs options.
2. Pagination options.
3. Post pagination options.
4. Related content options.
5. Author info options.
6. Social sharing options.

== Changelog ==
= 1.7 =
*Improved options

= 1.5 =
*Added new images to option menu
*Added global pagination function

= 1.0 =
First release

== Upgrade Notice ==
= 1.7 =
Upgrade to enjoy new features.
= 1.5 =
Upgrade to enjoy new features.
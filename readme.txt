=== WP-Basics ===
Contributors: laura20
Donate link: http://www.codetocode-developments.com/wp-plugins/wp-basics-documentation/
Tags: breadcrumbs, pagination, related content, author info, author biography, social sharing, social networks, like button
Requires at least: 3.0
Tested up to: 3.8
Stable tag: 3.8
License: GPLv2

License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds basic functionalities to your blog.


== Description ==

This plugin adds five functionalities that all blogs should have:

*   Breadcrumbs
*   Pagination
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

You can add each functionality anywhere on your blog by calling functions directly. You will need some wordpress
knowledge to do this.

*breadcrumb: if ( function_exists( wb_breadcrmbs() ) ) { wb_breadcrumbs(); }

*pagination: if ( function_exists( wb_pagination() ) ) { wb_pagination(); }

*related content: if ( function_exists( wb_related_content() ) ) { wb_related_content(); }

*author info: if ( function_exists( wb_author_info() ) ) { wb_author_info(); }

*social sharing: if ( function_exists( wb_social_sharing() ) ) { wb_social_sharing(); }

If you do it, deactivate the function in the option panel. The other options will still work,
you can continue setting it through the options panel.


== Screenshots ==

1. Options panel.


== Changelog ==

= 1.0 =


* First release (January 3, 2014)

== Upgrade Notice ==

= 1.0 =
Upgrade WP-Basics for good maintenance.


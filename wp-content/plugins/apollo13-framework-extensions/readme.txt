=== Apollo13 Framework Extensions ===
Contributors: apollo13themes, air-1
Tags: custom post types, shortcodes, elementor widgets, wpbakery page builder support
Requires at least: 4.7
Tested up to: 5.0
Requires PHP: 5.4.0
Stable tag: trunk
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Adds custom post types, shortcodes and some non theme features that we use in themes build on our Apollo13 Framework

== Description ==

**Apollo13 Framework Extensions** adds few features to themes build on Apollo13 Framework. These are:

* Designs Importer,
* shortcodes based on Apollo13 Framework features: writtng effect, count down, socials, scroller, slider, galleries, post grid,
* support for WPBakery Page Builder elements added by Apollo13 Framework,
* custom post types: albums, works & people,
* Export/Import of theme options,
* Custom Sidebar,
* Custom CSS,
* Meta options that are creating content for posts, pages, albums and works,
* Responsive Image resizing ,
* Maintenance mode.

This plugin requires one of themes build on **Apollo13 Framework** theme to be installed.

It is mostly used for:

* [Rife Free](https://apollo13themes.com/rife/free/)
* [Rife Pro](https://apollo13themes.com/rife/)


== Installation ==

1. Upload **Apollo13 Framework Extensions** to the `/wp-content/plugins/` directory
2. Activate the plugin through the **Plugins** menu in WordPress
3. Done!

== Frequently Asked Questions ==

= I installed the plugin but it does not work =

This plugin will only work with themes build on **Apollo13 Framework**.
All themes compatible are listed above in description.



== Changelog ==

= 1.5.8(04.02.2019) =

Fixed:
-404 error on albums,works and shop, after design import on fresh installation

----------------

= 1.5.7(01.02.2019) =

Fixed:
-fix for more strict servers with blocked filesystem
-bricks gallery takes max width option from chosen album/work
-Warning notice when plugin was active without compatible theme

Improved:
-After Design import there is visit "website button", instead of import button

----------------
= 1.5.6(21.12.2018) =

Moved from theme framework to "Apollo13 Framework Extensions" plugin, in prepare for theme version 2.3:
-album slider script

----------------
= 1.5.5(10.12.2018) =

Moved from theme framework to "Apollo13 Framework Extensions" plugin, in prepare for theme version 2.3:
-meta options for background image
-meta options for video as featured media
-menu enhancement options

----------------
= 1.5.4(27.11.2018) =

Checked for:
-Gutenberg & WordPress 5.0 compatibility

Fixed:
-wrong e-mail format in "Contact information" widget(thanks UdoS)
-Elementor widget for theme post list "order by" option have now option "Not set"

----------------
= 1.5.3(13.11.2018) =

Checked for:
-Gutenberg & WordPress 5.0 compatibility

Fixed:
-returning http link for user.css file on https sites in some cases([see topic](https://support.apollo13.eu/discussion/comment/23121/#Comment_23121))

----------------
= 1.5.2(08.11.2018) =

Moved from theme framework to "Apollo13 Framework Extensions" plugin:
-some content creating features

Fixed:
-design importer fail message

----------------
= 1.5.1(05.11.2018) =

Fixed:
-Fatal error when activated with no "Apollo13 Framework" theme + Elementor(thanks Teemu K.)

----------------
= 1.5.0(31.10.2018) =

Added:
-Apollo13 Framework shortcodes as Elementor widgets
-support for max_width & margin in a13fe-post-list shortcode
-filter to set number of custom fields in albums & works - apollo13framework_custom_fields_number
-filtering by taxonomies in admin for albums, works & people

Fixed:
-broken import process on servers that hides available PHP memory


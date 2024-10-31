=== Save As Text And Html ===
Contributors: Rajulu Ponnada
Donate link: http://www.openasthra.com/
Tags: post, posts, wordpress
Requires at least: 2.0.2
Tested up to: 2.5.1
Stable tag: 1.0

Save post as text or save post as html. Only post content is saved all other stuff get discarded.

== Description ==

Save post as text or save post as html. Only post content is saved all other stuff get discarded.

== Installation ==

1. Download and unzip the file.
2. Place them in your blog's plugin subdirectory (e.g. `/wp-content/plugins/`).
3. Create a new folder to hold your files to be post.
4. Put some text files in this folder.
5. Activate the plugin from the Plugins tab of your blog's administrative panel.
6. Usage: if you want button use <?php if(function_exists('oa_save_as_text')) oa_save_as_text(); ?>
   if you want text with small button use <?php if(function_exists('oa_save_as_text')) oa_save_as_text("Save As Text"); ?>
   if you want button use <?php if(function_exists('oa_save_as_html')) oa_save_as_html(); ?>
   if you want text with small button use <?php if(function_exists('oa_save_as_html')) oa_save_as_html("Save As Html"); ?>
   Please use these in your theme file after displaying post.

== Frequently Asked Questions ==

= I installed the plugin but can not see any thing on post, how do I save? =

* You'll have to call oa_save_as_text or oa_save_as_html() from your theme file, and then everything starts to work.

== Screenshots ==

1. Save as text page
2. Save as html page

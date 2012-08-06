=== Custom More Link ===
Contributors: Michael Weingaertner
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=454273
Tags: more, link, more-link,nofollow,template,customize
Requires at least: 2.3
Tested up to: 2.7
Stable tag: 0.2

Customize your `&lt;!-- more -->` read more link, remove anchor, customize CSS class, add markup or nofollow...
 
== Description ==

Customize the more link (`<!-- more -->`) provided by WordPress 'insert more link' feature
without changing template files. Just activate the plugin, change the link structure
in the options panel, save. With this plugin you can

1. remove the #more-number anchor tag from the link
1. remove or modify the CSS class 
1. add a nofollow attribute
1. customize the markup adding additional tags
1. everything you want to do

In the custom link structure you an use the following tags:

1. %permalink% - the permalink provided by WordPress
1. %anchor% - the anchortext provided by WordPress (default '#more-number')
1. %class% - the CSS class provided by WordPress (default 'more-link')
1. %linktext% - the linktext as delivered by WordPress

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload directory `cy-custom-morelink` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Edit more-link structure according to your needs 

== Changelog ==

0.2
Bugfix: preg_match() initiated error message with some PHP versions

0.1
Initial release

Complete CHANGELOG file included in plugin package.

== Screenshots ==

1. Custom More Link options page


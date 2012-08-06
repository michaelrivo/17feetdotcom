=== WDP AJAX Comments ===
Contributors: satbirsingh
Tags: ajax, comments, javascript, jquery
Requires at least: 2.0
Tested up to: 2.8.4
Stable Tag: 1.0.8

This plugin will enable AJAX comment posting on your WordPress blog.

== Description ==

This plugin will integrate AJAX commenting feature into your WordPress Blog. It uses the powerful JavaScript Framework jQuery to handle AJAX requests and jQuery Validation plugin by bassitance.de to validate comment form on the client side.

= Feature Summary =
* Enable AJAX Commenting
* Client Side Form Validation
* Easily rolls back if JS disabled
* Easily configure custom styles for messages

**[See plugin page for more details](http://webdeveloperplus.com/wordpress/new-wordpress-plugin-wdp-ajax-comments/)**

== Screenshots ==
**[See live demo](http://demo.webdeveloperplus.com/wordpress/)**

== Installation ==
1. Extract the plugin into wp-content/plugins directory of your WordPress blog
2. Activate the plugin
3. If you wish to enable client side validation, refer to FAQ.

**[Visit Plugin Page for more details](http://webdeveloperplus.com/wordpress/new-wordpress-plugin-wdp-ajax-comments/)**

== Frequently Asked Questions ==
= How do i enable client side JavaScript validation? =
Since this plugin uses jQuery Validation plugin, you need to add some CSS classes to your comment form in your WordPress Theme. Open comments.php file of your theme file and find out the comment form in it.
Now add following CSS classes to various input boxes:
	
1. To the Author textbox, add attribute class="required"
e.g. if your Author textbox looks like
<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="35" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
then make it
<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" class="required" size="35" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
or if you already have some class associated, like class="foo" in it, then make it class="foo required"
2. Similarly, To the Email textbox, add attribute class="email required"
3. To the URL textbox, add attribute class="url"
4. To the comment textarea, add class="required"
5. If you need to change styles for error messages, refer to Q 2 below.
6. That's it, you are done adding JS validation to your comment form.

= How do i change CSS styles of the notifications? =
To change styles, you need to create a file named wdp-ajax-styles.css within your theme directory and define styled for .wdpajax-error, .wdpajax-success, label.error classes.

.wdpajax-error is used to display message when there is some problem submitting the comment
.wdpajax-success is used to display success message on successfull comment posting
label.error is used for error message that pop up as a result of invalid form data

For more details, visit **[plugin page](http://webdeveloperplus.com/wordpress/new-wordpress-plugin-wdp-ajax-comments/)**

== Changelog ==
= Version 1.0.8 =
Improved error notification
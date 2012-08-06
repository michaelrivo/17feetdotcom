=== Plugin Name ===
Contributors: pjgalbraith
Donate link: http://www.pjgalbraith.com/
Tags: posts, recent, recent posts, widget, post-plugins
Requires at least: 2.9.0
Tested up to: 3.2.1
Stable tag: trunk

An advanced version of the WordPress Recent Posts widget, allows display of thumbnails, post excerpt, author, 

comment count, and more.

== Description ==

An advanced version of the WordPress Recent Posts widget allowing increased customization.

Features Include:

* Display post thumbnails, with customizable size.
* Display post excerpt, author, comment count, and more. 
* Provides options to trim the number of characters in the title and excerpt.
* Override the post order to order by; date modified, title, post ID, random, comment count etc.
* Exclude or include specific posts, authors, tags, or categories.
* Also includes a simple template parser so you can override the default output making custom styling easy.

== Installation ==

1. Upload `recent-posts-plus.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add the widget to your sidebar in 'Appearance/Widgets' in WordPress

== Frequently Asked Questions ==

See documentation at http://www.pjgalbraith.com/2011/08/recent-posts-plus/

== Screenshots ==

1. Widget options screen

== Changelog ==

= 1.0.4 =
* Added ability to override the date format inline, so you can have multiple date formats
* Changed the default date format to "M j"

= 1.0.3 =
* Fixed issue with limiting excerpt chars

= 1.0.2 =
* Fixed issue with thumbnail size input field width in Google Chrome
* Fixed issue when adding a new widget instance, expert options wouldn't toggle on
* Added licence
* Added readme
* Added screenshot

= 1.0.1 =
* Prevented htmlspecialchars from being encoded twice

= 1.0.0 =
* Initial release

== Upgrade Notice ==

= 1.0.4 =
Added new inline date formatting. See documentation for more info.

= 1.0.3 =
Fixed issue with limiting excerpt chars

= 1.0.2 =
Fixes issues with widget options panel

= 1.0.1 =
Fixes rendering issue.

= 1.0.0 =
Initial release

== Documentation ==

= 1: Title =

*Default: Recent Posts*

This field sets the title of the widget. It works the same as every other widget.

= 2: Number of posts =

*Default: 5*

Changes how many posts are displayed in the widget.

= 3: Include post thumbnail =

*Default: no*

Displays the post thumbnails of each post.

= 4: Include post excerpt =

*Default: no*

Displays the post excerpt of each post.

= 5: Show expert options =

*Default: no*

Show/hide the expert options panel. These options should be used with more care.

= 6: Limit post title chars =

*Default: (no limit)*

Limits the numbers of characters to display of each posts title.
Example: For the post title "Look at this title" setting this option to 7 would result in "Look at..."

= 7: Limit post excerpt chars =

*Default: (no limit)*

Limits the numbers of characters to display of each posts excerpt.

= 8: Limit ellipsis =

Default: ...

Sets the string to append to post titles or excerpts that have been shortened.

= 9: Post date format =

*Default: M j*

Sets the PHP default date format to use when displaying the post date. 
See http://php.net/manual/en/function.date.php for overview of the options available.

Note: the date format can be overriden in the output template, which allows for multiple date formats, see section "12: Widget output template".

= 10: Thumbnail size =

*Default: 50 x 50*

Sets the size of the post thumbnail in pixels.

= 11: WP_Query options =

*Default: (see below)*

This is an advanced option that modifies what posts are shown in the widget. This option specifies extra arguments to use in the WP_Query request and as such is very flexible even allowing this widget to show pages rather than posts, show oldest posts first, or filter posts by tag or category. The WP_Query options must be specified in valid JSON format (validate here http://jsonlint.com/).

These are the default args that are sent to WP_Query:

`{
"post_type": "post",
"posts_per_page": <same as Number of posts setting>,
"orderby": "date",
"order": "DESC"
}`


List of options:

`{
"post_type": "post", //post, page, revision, attachment, any
"post_status": "publish", //publish, pending, draft, auto-draft, future, private, inherit, trash, any.
"posts_per_page": "5", //overrides number of posts setting
"offset": "3", //number of posts to skip over
"post__not_in": [2, 3, 4], //exclude posts 2, 3 and 4
"ignore_sticky_posts": "1", //ignore sticky posts or not. Default value is 0, don't ignore.
"author": "1", //author ID
"author_name": "john", //author ID
"orderby": "date", //none, ID, author, title, date, modified, parent, rand, comment_count, ...
"order": "DESC", //ASC or DESC
"tag": "cooking,baking", //display posts that have "either" of these tags
"tag": "bread+baking+recipe", //display posts that have "all" of these tags
"tag_id": "13",
"cat": "1, 2, -3", //category ID 1, 2 but not 3
"category_name": "articles,news"
}`


For a full listing see http://codex.wordpress.org/Class_Reference/WP_Query

= 12: Widget output template =

This is an advanced option that modifies the output of the widget. You can modify the output with template tags and add custom classes or tags for styling.

By default the widget outputs posts in this format:

`<li>
{THUMBNAIL}
<a title="{TITLE_RAW}" href="{PERMALINK}">{TITLE}</a>
{EXCERPT}
</li>`


You can modify the output by including the following template tags:

`{ID} The post ID
{THUMBNAIL} The post thumbnail IMG tag if it exists, otherwise nothing
{TITLE_RAW} The post title
{TITLE} The post title, will be trimmed if it exceeds "Option 6: Limit post title chars"
{EXCERPT_RAW} The post excerpt
{EXCERPT} The post excerpt, will be trimmed if it exceeds "Option 7: Limit post excerpt chars"
{PERMALINK} The post permalink url
{DATE} The post date, the format is defined by the "Option 9: Post date format" setting
{DATE[php_date_format]} Customized date format which overrides the default date format setting.  E.g. {DATE[l jS F Y]} would display like "Monday 1st January 2011"
{AUTHOR} The post author name
{AUTHOR_LINK} The post author website url
{COMMENT_COUNT} The total number of comments, Trackbacks, and Pingbacks for the post`
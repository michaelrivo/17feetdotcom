<?php
/**
 * Toolbox functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Toolbox
 * @since Toolbox 0.1
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'toolbox_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override toolbox_setup() in a child theme, add your own toolbox_setup to your child theme's
 * functions.php file.
 */
function toolbox_setup() {
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on toolbox, use a find and replace
	 * to change 'toolbox' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'toolbox', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'toolbox' ),
	) );

	/**
	 * Add support for the Aside and Gallery Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'gallery' ) );
}
endif; // toolbox_setup

/**
 * Tell WordPress to run toolbox_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'toolbox_setup' );

/**
 * Set a default theme color array for WP.com.
 */
$themecolors = array(
	'bg' => 'ffffff',
	'border' => 'eeeeee',
	'text' => '444444',
);

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function toolbox_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'toolbox_page_menu_args' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function toolbox_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar 1', 'toolbox' ),
		'id' => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
}
add_action( 'init', 'toolbox_widgets_init' );

if ( ! function_exists( 'toolbox_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since Toolbox 1.2
 */
function toolbox_content_nav( $nav_id ) {
	global $wp_query;

	?>
	<div class="nav" id="<?php echo $nav_id; ?>">
		<!-- <h1 class="assistive-text"><?php _e( 'Post navigation', 'toolbox' ); ?></h1> -->

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php //previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'toolbox' ) . '</span> %title' ); ?>
		<?php //next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'toolbox' ) . '</span>' ); ?>
		
		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'toolbox' ) . '</span> Previous Post' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', 'Next Post <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'toolbox' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'toolbox' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'toolbox' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</div><!-- #<?php echo $nav_id; ?> .nav -->
	<?php
}
endif; // toolbox_content_nav


if ( ! function_exists( 'toolbox_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own toolbox_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Toolbox 0.4
 */
function toolbox_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="footer">
				<div class="comment-author vcard">
					<?php //echo get_avatar( $comment, 40 ); ?>
					<?php printf( __( '%s <span class="says">responded:</span>', 'toolbox' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'toolbox' ); ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><abbr class="time" title="<?php comment_time( 'g:ia l, F j, Y' ); ?> | <?php echo get_the_time('U'); ?> | <?php echo time(); ?> | <?php comment_time("U"); echo 'ct'; ?>">
					<?php
						echo how_long_ago(get_comment_time('U'));
					 ?>
					</abbr></a>
					
				</div><!-- .comment-meta .commentmetadata -->
			</div> <!-- .footer -->

			<div class="comment-content"><?php comment_text(); ?></div>
			<?php echo '<span class="reply">' .comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ).'</span>' ?>
			<?php edit_comment_link( __( '(Edit)', 'toolbox' ), ' ' ); ?>
		</div><!-- #comment-## -->

	<?php
			break;
	/*	case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'toolbox' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'toolbox' ), ' ' ); ?></p>
	<?php
			break;*/
	endswitch;
}
endif; // ends check for toolbox_comment()

if ( ! function_exists( 'toolbox_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own toolbox_posted_on to override in a child theme
 *
 * @since Toolbox 1.2
 */
function toolbox_posted_on() {
	/*
	<img src="<?php bloginfo('wpurl'); ?>/wp-content/images/authors/<?php the_author_firstname(); ?>.png" alt="" class="avatar"/>
	*/
	printf( __( '<img src=" %8$s/wp-content/images/authors/%9$s.png" alt="" class="avatar"/><p><span class="byline"> <span class="sep"></span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a>&nbsp;/&nbsp;%10$s</span></span><br class="hold"/><time class="entry-date">Posted %4$s</time></p>', 'toolbox' ),
		esc_url( get_permalink() ), // 1 
		esc_attr( get_the_time() ), // 2
		esc_attr( get_the_date( 'c' ) ), // 3
		esc_html( get_the_date() ), // 4
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), // 5
		sprintf( esc_attr__( 'View all posts by %s', 'toolbox' ), get_the_author() ), // 6
		esc_html( get_the_author()), // 7
		esc_html( get_bloginfo('wpurl') ), // 8
		esc_html( get_the_author_meta( 'user_firstname' ) ), // 9
		esc_html( get_the_author_meta( 'description' ) )  // 10
	);
}
endif;

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Toolbox 1.2
 */
function toolbox_body_classes( $classes ) {
	// Adds a class of single-author to blogs with only 1 published author
	if ( ! is_multi_author() ) {
		$classes[] = 'single-author';
	}

	return $classes;
}
add_filter( 'body_class', 'toolbox_body_classes' );

/**
 * Returns true if a blog has more than 1 category
 *
 * @since Toolbox 1.2
 */
function toolbox_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so toolbox_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so toolbox_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in toolbox_categorized_blog
 *
 * @since Toolbox 1.2
 */
function toolbox_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'toolbox_category_transient_flusher' );
add_action( 'save_post', 'toolbox_category_transient_flusher' );

/**
 * This theme was built with PHP, Semantic HTML, CSS, love, and a Toolbox.
 */


function my_search_form( $form ) {

    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
    <span class="blueBtn"><input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" /></span>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'my_search_form' );
add_action('wp_footer', 'add_social_js');


//add_filter( 'the_content_more_link', 'my_more_link', 10, 2 );

function my_more_link( $more_link, $more_link_text ) {
	
	$commentsLink = $more_link;
	$thisPost = $GLOBALS['post'];
	
	if ( $thisPost->comment_status == 'open' /*|| ( '0' != get_comments_number() && ! comments_open() )*/ ){
		//ob_start();
		//var_dump($GLOBALS['post']);
		// echo '<span class="comments-link">';
		// comments_popup_link( __( 'Comments (0)', 'toolbox' ), __( 'Comments (1)', 'toolbox' ), __( 'Comments (%)', 'toolbox' ) ); 
		$commentsLink .= '&nbsp;|&nbsp;<a class=\"comments-link\" href=\"'.$thisPost->guid.'\">Comments</a>&nbsp;('.$thisPost->comment_count.')';
		// echo '</span>';
		//$commentsLink = ob_get_contents();
		//ob_end_clean();
	} 
	var_dump($commentsLink);
	return $commentsLink;
	
	//return 'WTF';
}

// if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) : 
// <span class="comments-link"><?php comments_popup_link( __( 'Comments (0)', 'toolbox' ), __( 'Comments (1)', 'toolbox' ), __( 'Comments (%)', 'toolbox' ) ); </span>
// 
//  endif;


function add_social_js(){
	
	echo '<script src="http://connect.facebook.net/en_US/all.js"></script>
	<script>
	  FB.init({
	    status : true, // check login status
	    cookie : true, // enable cookies to allow the server to access the session
	    xfbml  : true  // parse XFBML
	  });
	</script>';
	
	echo '<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>';
}

if(!function_exists('how_long_ago')){
        function how_long_ago($timestamp){
            $difference = time() - intval($timestamp);

            if($difference >= 60*60*24*365){        // if more than a year ago
                $int = intval($difference / (60*60*24*365));
                $s = ($int > 1) ? 's' : '';
                $r = $int . ' year' . $s . ' ago';
            } elseif($difference >= 60*60*24*7*5){  // if more than five weeks ago
                $int = intval($difference / (60*60*24*30));
                $s = ($int > 1) ? 's' : '';
                $r = $int . ' month' . $s . ' ago';
            } elseif($difference >= 60*60*24*7){        // if more than a week ago
                $int = intval($difference / (60*60*24*7));
                $s = ($int > 1) ? 's' : '';
                $r = $int . ' week' . $s . ' ago';
            } elseif($difference >= 60*60*24){      // if more than a day ago
                $int = intval($difference / (60*60*24));
                $s = ($int > 1) ? 's' : '';
                $r = $int . ' day' . $s . ' ago';
            } elseif($difference >= 60*60){         // if more than an hour ago
                $int = intval($difference / (60*60));
                $s = ($int > 1) ? 's' : '';
                $r = $int . ' hour' . $s . ' ago';
            } elseif($difference >= 60){            // if more than a minute ago
                $int = intval($difference / (60));
                $s = ($int > 1) ? 's' : '';
                $r = $int . ' minute' . $s . ' ago';
            } else {                                // if less than a minute ago
                $r = 'moments ago';
            }
			//get_comment_time('U').'t '.$timestamp.'ts '.$difference.' diff '.
            return $r;
        }
    }
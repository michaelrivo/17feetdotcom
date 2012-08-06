<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to toolbox_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Toolbox
 * @since Toolbox 0.1
 */
?>
	<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'toolbox' ); ?></p>
	</div><!-- #comments -->
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h4 id="comments-title" class="shadow-heading">
			<span>
			<?php
				printf( _n( '1 Comment', '%1$s Comments', get_comments_number(), 'toolbox' ),
					number_format_i18n( get_comments_number() ));
			?>
			</span>
		</h4>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above">
			<!-- <h1 class="assistive-text"><?php _e( 'Comment navigation', 'toolbox' ); ?></h1> -->
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'toolbox' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'toolbox' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<ul class="commentlist">
			<?php
				/* Loop through and   the comments. Tell wp_list_comments()
				 * to use toolbox_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define toolbox_comment() and that will be used instead.
				 * See toolbox_comment() in toolbox/functions.php for more.
				 */
				wp_list_comments( array( 'callback' => 'toolbox_comment' ) );
			?>
		</ul>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<!-- <h1 class="assistive-text"><?php _e( 'Comment navigation', 'toolbox' ); ?></h1> -->
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'toolbox' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'toolbox' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'toolbox' ); ?></p>
	<?php endif; ?>

	
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="respond">
			<fieldset>
				
				<h4 class="leave-comment">Leave a Comment</h4>
				
			<?php if ( is_user_logged_in() ) : ?>

				<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account', 'cp'); ?>"><?php _e('Log out &raquo;', 'cp'); ?></a></p>

			<?php else : ?>
				<!-- <div class="error hide"></div> -->
				<div><input type="text" tabindex="1" size="25" name="author" id="author" value="Name" title="Name" class="required" /></div>
				<div><input type="text" tabindex="2" size="25" name="email" id="email" value="Email" title="Email" class="required email" /></div>
				<!-- <div><input type="text" tabindex="3" size="25" name="url" id="url" value="Website (optional)" title="Website (optional)" /></div> -->

			<?php endif; ?>

			<div><textarea name="comment" id="comment" cols="" rows="" tabindex="4" title="Comment" class="required">Comment</textarea></div>
			
			<div class="blueBtn"><input name="submit" type="submit" id="submit" tabindex="5" value="Post Comment" title="Post Comment" /><?php cancel_comment_reply_link('Cancel Reply');?>
				<?php comment_id_fields(); ?></div>
			<?php do_action('comment_form', $post->ID); ?>
			
			</fieldset>
	</form>

</div><!-- #comments -->

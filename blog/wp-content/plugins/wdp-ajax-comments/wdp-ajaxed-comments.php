<?php
/*
Plugin Name: WDP Ajax Comments
Plugin URI: http://webdeveloperplus.com/wordpress/new-wordpress-plugin-wdp-ajax-comments/
Description: Add AJAX commenting to your wordpress blog, easily rolls back if JavaScript is disabled.
Version: 1.0.8
Author: Satbir Singh
Author URI: http://satbirsingh.com
*/
add_action('init', 'wdp_ajaxcomments_load_js', 10);
function wdp_ajaxcomments_load_js(){
	if(!is_admin()){
		wp_enqueue_script('ajaxValidate', WP_PLUGIN_URL.'/wdp-ajax-comments/jquery.validate.min.js', array('jquery'), '1.5.5');
		//wp_enqueue_script('ajaxcomments', WP_PLUGIN_URL.'/wdp-ajax-comments/ajax-comments.js',	array('jquery', 'ajaxValidate'), '1.2');
	}
}
// add_action('wp_head', 'wdp_ajaxcomments_load_styles');
// function wdp_ajaxcomments_load_styles(){
// 	$stylesheet=WP_PLUGIN_URL.'/wdp-ajax-comments/wdp-ajax-styles.css';
// 	if(@file_exists(TEMPLATEPATH.'/wdp-ajax-styles.css'))
// 		$stylesheet=get_stylesheet_directory_uri().'/wdp-ajax-styles.css';
// 	echo '<link rel="stylesheet" href="'.$stylesheet.'" type="text/css" media="screen" />';
// }
add_action('comment_post', 'wdp_ajaxcomments_stop_for_ajax',20, 2);
function wdp_ajaxcomments_stop_for_ajax($comment_ID, $comment_status){
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	//If AJAX Request Then
		switch($comment_status){
			case '0':
				//notify moderator of unapproved comment
				wp_notify_moderator($comment_ID);
			case '1':
				$comment=&get_comment($comment_ID, ARRAY_A);
	
				?>
				<li <?php comment_class("hide ajax"); ?> style="clear:both;">
					<div class="comment">
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
								<a href="#"><abbr class="time" title="<?php comment_time( 'g:ia l, F j, Y' ); ?>">just now
								</abbr></a>

							</div><!-- .comment-meta .commentmetadata -->
						</div> <!-- .footer -->

						<div class="comment-content"><?php echo $comment['comment_content'] ?></div>
				</div><!-- #comment-##  <?php  var_dump($comment); echo gettype($comment['comment_content']); ?>-->

				<?php
				break;
				
				//echo "success";
				//print_r($commentdata);
				$post=&get_post($comment['comment_post_ID']); //Notify post author of comment
				if ( get_option('comments_notify') && $comment['comment_approved'] && $post->post_author != $commentdata['user_ID'] )
					wp_notify_postauthor($comment_ID, $comment['comment_type']);
				break;
			default:
				echo "error";
		}	
		exit;
	}
}
?>
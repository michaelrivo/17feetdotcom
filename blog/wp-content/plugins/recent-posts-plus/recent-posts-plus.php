<?php
/*
Plugin Name: Recent Posts Plus
Plugin URI: http://www.pjgalbraith.com/2011/08/recent-posts-plus/
Description: Provides a replacement for the recent posts widget with advanced settings
Version: 1.0.4
Author: Patrick Galbraith
Author URI: http://www.pjgalbraith.com
License: GPL2 
*/

/*  Copyright 2011  Patrick Galbraith  (email : patrick.j.galbraith@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation. 

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/**
 * Recent Posts Widget Class
 */
class RecentPostsPlus extends WP_Widget {
	
	private $default_config = array(
		'title' => '',
		'count' => 5,
		'include_post_thumbnail' => 'false',
		'include_post_excerpt' => 'false',
		'truncate_post_title' => '',
		'truncate_post_excerpt' => '',
		'truncate_elipsis' => '...',
		'post_thumbnail_width' => '50',
		'post_thumbnail_height' => '50',
		'post_date_format' => 'M j',
		'wp_query_options' => '',
		'widget_output_template' => '<li>{THUMBNAIL}<a title="{TITLE_RAW}" href="{PERMALINK}">{TITLE}</a>{EXCERPT}</li>', //default format
		'show_expert_options' => 'false'
	);
	
	/** constructor */	
	function __construct() {
    	$widget_ops = array(
			'classname'   => 'widget_recent_entries', 
			'description' => __('The most recent posts on your site. Includes advanced options.')
		);
    	parent::__construct('recent-posts-plus', __('Recent Posts Plus'), $widget_ops);
	}

	/** @see WP_Widget::widget */
	function widget( $args, $instance ) {
		extract( $args );
		echo $before_widget;
		
		$title = apply_filters( 'widget_title', empty($instance['title']) ? 'Recent Posts' : $instance['title'], $instance, $this->id_base);		
		
		echo $before_title . $title . $after_title;
		
		echo '<ul>';
		echo $this->parse_output($instance);
		echo '</ul>';
		
		echo $after_widget;
	}
	
	function parse_output($instance) {
		
		$output = '';
		
		foreach($this->default_config as $key => $val) {
			$$key = (empty($instance[$key])) ? $val : $instance[$key];
		}
		
		$default_query_args = array(
			'post_type' => 'post', 
			'posts_per_page' => $count, 
			'orderby' => 'date', 
			'order' => 'DESC'
		);
		$query_args = json_decode($wp_query_options, true);
		if($query_args == NULL) $query_args = array();
		
		$the_query = new WP_Query( array_merge($default_query_args, $query_args) );
		
		if( $the_query->have_posts() ) {
			
			//Deal with custom date formats, get a list of the custom tags ie {DATE[D \of j]}, {DATE[M j]}, etc...
			$date_matches = array();
			preg_match_all('/\{DATE\[(.*?)\]\}/', $widget_output_template, $date_matches);
			
			while ( $the_query->have_posts() ) { $the_query->the_post();
				
				$ID = get_the_ID();
				
				if($include_post_thumbnail == "false") {
					$POST_THUMBNAIL = '';
				} else {
					$POST_THUMBNAIL = get_the_post_thumbnail($ID, array($post_thumbnail_width, $post_thumbnail_height));
				}
				
				$POST_TITLE_RAW = strip_tags(get_the_title($ID));
				if(empty($truncate_post_title))
					$POST_TITLE = $POST_TITLE_RAW;
				else 
					$POST_TITLE = ($truncate_post_title >= strlen($POST_TITLE_RAW)) ? $POST_TITLE_RAW : trim(substr($POST_TITLE_RAW, 0, $truncate_post_title)).$truncate_elipsis;
				
				if($include_post_excerpt == "false") {
					$POST_EXCERPT_RAW = $POST_EXCERPT = '';
				} else {
					$POST_EXCERPT_RAW = str_replace('[...]', '', get_the_excerpt());
					if(empty($truncate_post_excerpt))
						$POST_EXCERPT = $POST_EXCERPT_RAW;
					else
						$POST_EXCERPT = ($truncate_post_excerpt >= strlen($POST_EXCERPT_RAW)) ? $POST_EXCERPT_RAW : trim(substr($POST_EXCERPT_RAW, 0, $truncate_post_excerpt)).$truncate_elipsis;
				}
				
				$widget_ouput_template_params = array(
					'{ID}' => $ID,
					'{THUMBNAIL}' => $POST_THUMBNAIL,
					'{TITLE_RAW}' => $POST_TITLE_RAW,
					'{TITLE}' => $POST_TITLE,
					'{EXCERPT_RAW}' => $POST_EXCERPT_RAW,
					'{EXCERPT}' => $POST_EXCERPT,
					'{PERMALINK}' => get_permalink($ID),
					'{DATE}' => get_the_date($post_date_format),
					'{AUTHOR}' => get_the_author(),
					'{AUTHOR_LINK}' => get_the_author_link(),
					'{COMMENT_COUNT}' => get_comments_number()
				);
				
				//Deal with custom date formats, parse the custom tags and add the date value
				foreach($date_matches[0] as $key => $date_match) {
					$widget_ouput_template_params[$date_match] = get_the_date($date_matches[1][$key]);
				}
				
				$output .= str_replace(array_keys($widget_ouput_template_params), array_values($widget_ouput_template_params), $widget_output_template);
				
			} //end while
		}
		
		wp_reset_postdata();
		
		return $output;
	}
	
	/** @see WP_Widget::update */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['count'] = strip_tags($new_instance['count']);
		
		$instance['include_post_thumbnail'] = strip_tags( $new_instance[ 'include_post_thumbnail' ] );
		if( empty($instance['include_post_thumbnail']) ) $instance['include_post_thumbnail'] = 'false';
		 
		$instance['include_post_excerpt'] = strip_tags( $new_instance[ 'include_post_excerpt' ] );
		if( empty($instance['include_post_excerpt']) ) $instance['include_post_excerpt'] = 'false';
		
		$instance['truncate_post_title'] = strip_tags( $new_instance[ 'truncate_post_title' ] );
		$instance['truncate_post_excerpt'] = strip_tags( $new_instance[ 'truncate_post_excerpt' ] );
		$instance['truncate_elipsis'] = strip_tags( $new_instance[ 'truncate_elipsis' ] );
		$instance['post_thumbnail_width'] = strip_tags( $new_instance[ 'post_thumbnail_width' ] );
		$instance['post_thumbnail_height'] = strip_tags( $new_instance[ 'post_thumbnail_height' ] );
		$instance['wp_query_options'] = $new_instance[ 'wp_query_options' ];
		$instance['widget_output_template'] = $new_instance[ 'widget_output_template' ];
		$instance['show_expert_options'] = strip_tags( $new_instance[ 'show_expert_options' ] );
		$instance['post_date_format'] = strip_tags( $new_instance[ 'post_date_format' ] );
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form( $instance ) {
		if ( $instance ) {
			foreach($this->default_config as $key => $val) {
				$$key = esc_attr($instance[$key]);
			}			
		} else {
			/* DEFAULT OPTIONS */
			foreach($this->default_config as $key => $val) {
				$$key = $val;
			}
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Number of posts to show:'); ?></label> 
			<input id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" size="3" value="<?php echo $count; ?>" />
		</p>
        
        <p>
        	<?php if( current_theme_supports('post-thumbnails') ): ?>
                <input id="<?php echo $this->get_field_id('include_post_thumbnail'); ?>" name="<?php echo $this->get_field_name('include_post_thumbnail'); ?>" type="checkbox" value="true"  class="checkbox" <?php echo ($include_post_thumbnail == 'true') ? 'checked="checked"' : '' ?> />
                <label for="<?php echo $this->get_field_id('include_post_thumbnail'); ?>">Include post thumbnail</label><br>
        	<?php endif; ?>
            
			<input id="<?php echo $this->get_field_id('include_post_excerpt'); ?>" name="<?php echo $this->get_field_name('include_post_excerpt'); ?>" type="checkbox" value="true" class="checkbox" <?php echo ($include_post_excerpt == 'true') ? 'checked="checked"' : '' ?> />
            <label for="<?php echo $this->get_field_id('include_post_excerpt'); ?>">Include post excerpt</label><br>
            
            <br>
            
            <input class="rpp_show-expert-options checkbox" id="<?php echo $this->get_field_name('show_expert_options'); ?>" name="<?php echo $this->get_field_name('show_expert_options'); ?>" type="checkbox" value="true" <?php echo ($show_expert_options == 'true') ? 'checked="checked"' : '' ?> /> 
        	<label for="<?php echo $this->get_field_id('show_expert_options'); ?>">Show expert options</label>
        </p>
        
        <script type="text/javascript">
			jQuery(document).ready(function($) {	
				
				$('.rpp_show-expert-options').each(function(){
					if( $(this).is(':checked') ) {
						$(this).parent().parent().find('.rpp_expert-panel').show();
					}
				});
										
				$('.rpp_show-expert-options').live('change', function(){
					if( $(this).is(':checked') ) {
						$(this).parent().parent().find('.rpp_expert-panel').show();
					} else {
						$(this).parent().parent().find('.rpp_expert-panel').hide();
					}
				});
			});
		</script>
        
        <div class="rpp_expert-panel" style="display:none; margin-top: 10px">
        
        
        <p>
			<label for="<?php echo $this->get_field_id('truncate_post_title'); ?>"><?php _e('Limit post title chars:'); ?></label> 
			<input id="<?php echo $this->get_field_id('truncate_post_title'); ?>" name="<?php echo $this->get_field_name('truncate_post_title'); ?>" type="text" size="3" value="<?php echo $truncate_post_title; ?>" /><br>
            
            <label for="<?php echo $this->get_field_id('truncate_post_excerpt'); ?>"><?php _e('Limit post excerpt chars:'); ?></label> 
			<input id="<?php echo $this->get_field_id('truncate_post_excerpt'); ?>" name="<?php echo $this->get_field_name('truncate_post_excerpt'); ?>" type="text" size="3" value="<?php echo $truncate_post_excerpt; ?>" /><br>
            
            <label for="<?php echo $this->get_field_id('truncate_elipsis'); ?>"><?php _e('Limit ellipsis:'); ?></label> 
			<input id="<?php echo $this->get_field_id('truncate_elipsis'); ?>" name="<?php echo $this->get_field_name('truncate_elipsis'); ?>" type="text" size="3" value="<?php echo $truncate_elipsis; ?>" /><br>
            
            <br>
            
            <label for="<?php echo $this->get_field_id('post_date_format'); ?>"><?php _e('Post date format:'); ?></label> <a title="View Documentation" target="_blank" href="http://www.pjgalbraith.com/2011/08/recent-posts-plus/">(?)</a>
			<input id="<?php echo $this->get_field_id('post_date_format'); ?>" name="<?php echo $this->get_field_name('post_date_format'); ?>" type="text" size="3" value="<?php echo $post_date_format; ?>" />
		</p>
        
        <?php if( current_theme_supports('post-thumbnails') ): ?>
            <p>
                <label for="<?php echo $this->get_field_id('post_thumbnail_width'); ?>"><?php _e('Thumbnail size (WxH):'); ?></label> 
                <input id="<?php echo $this->get_field_id('post_thumbnail_width'); ?>" name="<?php echo $this->get_field_name('post_thumbnail_width'); ?>" type="text" size="3" value="<?php echo $post_thumbnail_width; ?>" style="width: 40px" />
                <input id="<?php echo $this->get_field_id('post_thumbnail_height'); ?>" name="<?php echo $this->get_field_name('post_thumbnail_height'); ?>" type="text" size="3" value="<?php echo $post_thumbnail_height; ?>" style="width: 40px" />
            </p>
        <?php endif; ?>
        
        
        
            <p>
                <label for="<?php echo $this->get_field_id('wp_query_options'); ?>"><?php _e('WP_Query Options'); ?></label> <a title="View Documentation" target="_blank" href="http://www.pjgalbraith.com/2011/08/recent-posts-plus/">(?)</a><br />
                <textarea id="<?php echo $this->get_field_id('wp_query_options'); ?>" name="<?php echo $this->get_field_name('wp_query_options'); ?>" style="width:222px; height: 100px; font-size: 80%"><?php echo $wp_query_options; ?></textarea>
            </p>
            
            <p>
                <label for="<?php echo $this->get_field_id('widget_output_template'); ?>"><?php _e('Widget Output Template'); ?></label> <a title="View Documentation" target="_blank" href="http://www.pjgalbraith.com/2011/08/recent-posts-plus/">(?)</a><br />
                <textarea id="<?php echo $this->get_field_id('widget_output_template'); ?>" name="<?php echo $this->get_field_name('widget_output_template'); ?>" style="width:222px; height: 100px; font-size: 80%"><?php echo $widget_output_template; ?></textarea>
            </p>
        
        </div>
        
		<?php 
	}

} // class FooWidget

// register FooWidget widget
add_action( 'widgets_init', create_function( '', 'return register_widget("RecentPostsPlus");' ) );
<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<div class="one-line clearfix">
				<?php toolbox_posted_on(); ?>
				
				<div class="social_btns">
					<a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php //default text? ?>" >Tweet</a>			
					<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php the_permalink(); ?>" send="false" layout="button_count" width="70" show_faces="false" font="arial"></fb:like>
				</div>
			</div>
		</div><!-- .entry-meta -->
	</div><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'toolbox' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<div class="entry-meta clearfix">
		<?php
			/* translators: used between list items, there is a space after the comma */
			//$tag_list = get_the_tag_list( '<ul class="tags"><li><span class="end"></span><span>','</span></li><li><span class="end"></span><span>', '</span></li></ul>' );
			$category_list = '';
			
			$tag_list = '';
			
			if(get_the_tags()){			
				foreach (get_the_tags() as $tag)
				    {
				        $tag_list .= "<li><a href=\"".get_tag_link($tag->term_id)."\">";
						$tag_list .= "<span class='end'></span><span>".$tag->name."</span>";
				        $tag_list .= "</a></li>";
				    }
			}
			
			// But this blog has loads of categories so we should probably display them here
			if ( '' != $tag_list ) {
				$tag_list =  "<ul class='tags'>".$tag_list."</ul>";
				$meta_text = __( '%2$s', 'toolbox' );
			} else {
				$meta_text = '';
			}
			
			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		?>

	</div><!-- .entry-meta -->
</div><!-- #post-<?php the_ID(); ?> -->

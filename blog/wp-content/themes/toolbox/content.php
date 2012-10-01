<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */
?>
	<div id="post-<?php the_ID(); ?>" <?php post_class('bg-contain'); ?>>
		<div class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'toolbox' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<div class="one-line">
					<?php toolbox_posted_on(); ?>

					<div class="social_btns">
						<a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php //default text? ?>" >Tweet</a>			
						<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php the_permalink(); ?>" send="false" layout="button_count" width="70" show_faces="false" font="arial"></fb:like>
					</div>
				</div>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</div><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading', 'toolbox' ) ); ?>
			
		
			<?php if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Comments (0)', 'toolbox' ), __( 'Comments (1)', 'toolbox' ), __( 'Comments (%)', 'toolbox' ) ); ?></span>
		
		
			<?php endif; ?>
			
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'toolbox' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<div class="entry-meta">
			<span class="tag-links">
				<?php //printf( __( 'Tagged %1$s', 'toolbox' ), $tags_list ); ?>
			</span>
		</div><!-- #entry-meta -->
	</div><!-- #post-<?php the_ID(); ?> -->
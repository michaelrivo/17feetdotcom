<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage Toolbox
 * @since Toolbox 0.1
 */

get_header(); ?>

		<div class="container">
			
			<div id="blog-content" role="main" class="span8 append-1">

			
			<?php if ( have_posts() ) : ?>

				<?php
					/* Queue the first post, that way we know
					 * what author we're dealing with (if that is the case).
					 *
					 * We reset this later so we can run the loop
					 * properly with a call to rewind_posts().
					 */
					the_post();
				?>

				<div class="author-page-header">
					
					<!-- <img src="<?php bloginfo('wpurl'); ?>/wp-content/images/authors/<?php the_author_firstname(); ?>.png" alt="" class="avatar"/> -->
					<h3 class="page-title author">Posts by<!-- <a class="url fn n" href="<?php  get_author_posts_url( get_the_author_meta( "ID" ) ) ?>" title="<?php esc_attr( get_the_author() ); ?>" rel="me"> --> <?php echo get_the_author(); ?><!-- </a> --><span>&nbsp;/&nbsp;<?php the_author_description() ?></span></h3>
				</div>

				<?php
					/* Since we called the_post() above, we need to
					 * rewind the loop back to the beginning that way
					 * we can run the loop properly, in full.
					 */
					rewind_posts();
				?>

				<?php //toolbox_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<div class="all-posts">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>
				
				<?php endwhile; ?>
				</div> <!-- .all-posts -->

				<?php toolbox_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<div id="post-0" class="post no-results not-found">
					<div class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'toolbox' ); ?></h1>
					</div><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'toolbox' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- .blog-content -->
			
			<?php get_sidebar(); ?>
			
		</div><!-- .container -->

<?php get_footer(); ?>
<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Toolbox
 * @since Toolbox 0.1
 */

get_header(); ?>

		<div class="container">
			
			<div id="blog-content" role="main" class="span8 append-1">
												
			<?php if ( have_posts() ) : ?>

				<div class="page-header">
					<h3 class="page-title"><?php printf( __( 'Search Results for: %s', 'toolbox' ), '<span>&ldquo;' . get_search_query() . '&rdquo;</span>' ); ?></h3>
				</div>

				<?php //toolbox_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'search' ); ?>

				<?php endwhile; ?>

				<?php toolbox_content_nav( 'nav-below' ); ?>

			<?php else : ?>
				
				<div id="post-0" class="post no-results not-found">
					<div class="entry-header">
						<h3 class="entry-title">Nothing found with &ldquo;<?php echo get_search_query(); ?>&rdquo; in it.</h3>
					</div><!-- .entry-header -->

					<div class="entry-content">
						<p>Sorry, but try something else perhaps?</p>
					</div><!-- .entry-content -->
				</div><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #blog-content -->
			
			<?php get_sidebar(); ?>
			
		</div><!-- .container -->
//
<?php get_footer(); ?>
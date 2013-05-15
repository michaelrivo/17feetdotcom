<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Toolbox
 * @since Toolbox 0.1
 */
$parentPage = 'back';
include("header.php"); ?>
	
		<div class="container">
			<div class="row-fluid">
				<div id="blog-content" role="main" class="span8 append-1">

				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


					<?php get_template_part( 'content', 'single' ); ?>

					<?php toolbox_content_nav( 'nav-below' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

				</div><!-- .blog-content -->
			
				<?php get_sidebar(); ?>
			</div> <!-- .row-fluid -->
		</div><!-- .container -->


<?php get_footer(); ?>
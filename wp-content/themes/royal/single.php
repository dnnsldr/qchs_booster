<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
	
	<div class="container">
		
		<div id="primary" class="site-content row">
			
			<div id="content" role="main" class="col-lg-9 col-md-9 col-xs-12">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

					<nav class="nav-single">
						<h4 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h4>
						<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
					</nav><!-- .nav-single -->

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		
			<?php get_sidebar(); ?>

		</div><!-- #primary -->


	</div><!-- end of container -->
<?php get_footer(); ?>
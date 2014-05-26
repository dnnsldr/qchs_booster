<?php
/**
 * The main template file for single articles
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
	
		<div class="container">
		
		<div id="primary" class="site-content row">
			
			<div id="content" role="main" class="col-lg-9 col-md-9 col-xs-12">
				
				<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="entry-content">
							<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
						</div><!-- .entry-content -->
					</article>
				<?php endwhile; ?>


			<?php else : ?>

				<article id="post-0" class="post no-results not-found">

				<?php if ( current_user_can( 'edit_posts' ) ) : ?>
					<div class="entry-header">
						<h1 class="entry-title"><?php _e( 'No posts to display', 'twentytwelve' ); ?></h1>
					</div>

					<div class="entry-content">
						<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'twentytwelve' ), admin_url( 'post-new.php' ) ); ?></p>
					</div><!-- .entry-content -->

				<?php else : ?>
					<div class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>
					</div>

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'twentytwelve' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				
				<?php endif; // end current_user_can() check ?>

				</article><!-- #post-0 -->

			<?php endif; // end have_posts() check ?>

		</div><!-- #content -->
		
			<?php get_sidebar(); ?>

		</div><!-- #primary -->


	</div><!-- end of container -->
<?php get_footer(); ?>
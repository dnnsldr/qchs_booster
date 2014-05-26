<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'twentytwelve' ); ?>
		</div>
		<?php endif; ?>
		<div class="entry-header">
			<?php the_post_thumbnail(); ?>
			<?php if ( is_single() ) : ?>
			<?php edit_post_link( __( ' Edit This Post', 'twentytwelve' ), '<span class="edit-link"><i class="fa icon-left fa-pencil"></i>', '</span>' ); ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
			<?php edit_post_link( __( ' Edit This Post', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			<?php endif; // is_single() ?>
			
			
			<div class="entry-meta clearfix">
				
				<div class="col-lg-9 col-md-9 col-xs-12">
					<?php dte_entry_meta(); ?>
				</div>
				<?php if ( comments_open() ) : ?>
				<div class="comments-link col-lg-3 col-md-3 col-xs-12">
					<?php comments_popup_link( '<i class="icon-left fa fa-comments"></i><span class="leave-reply">' . __( 'Leave a reply', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?>
				</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>
			
			</div><!-- .entry-meta -->
			
			
		</div><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		
	</article><!-- #post -->

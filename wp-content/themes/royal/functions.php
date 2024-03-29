<?php
/**
 * @package Royal Theme
 * @subpackage royal
 * @author dnnsldr.com
 *
 * Layout Hooks:
 *
 */
 

add_action( 'after_setup_theme', 'royal_setup' );
function royal_setup() {
	add_editor_style();

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );

  set_post_thumbnail_size( 150, 150 );
	// 150px square
	add_image_size( $name = 'squared150', $width = 150, $height = 150, $crop = true );
	// 250px square
	add_image_size( $name = 'squared250', $width = 250, $height = 250, $crop = true );
	// 4:3 Video
	add_image_size( $name = 'video43', $width = 320, $height = 240, $crop = true );
	// 16:9 Video
	add_image_size( $name = 'video169', $width = 320, $height = 180, $crop = true );

	register_nav_menus( array(
		'primary' => __( 'Primary Navigation' ),
		'footer'	=> __( 'Footer Navigation' )
	));

}

// custom menu example @ http://digwp.com/2011/11/html-formatting-custom-menus/
function clean_custom_menus() {
	$menu_name = 'primary'; // specify custom menu slug
	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
		$menu = wp_get_nav_menu_object($locations[$menu_name]);
		$menu_items = wp_get_nav_menu_items($menu->term_id);

		//$menu_list = '<nav>' ."\n";
		$menu_list .= "\t\t\t\t". '<ul class="sidebar-nav">' ."\n";
		$menu_list .= "\t\t\t\t". '<a id="menu-close" href="#" class="btn btn-default btn-lg pull-right toggle"><i class="fa fa-times"></i></a>' ."\n";
		$menu_list .= "\t\t\t\t". '<li class="sidebar-brand"><a href="'.home_url().'">Bulldog Football</a></li>' ."\n";
		foreach ((array) $menu_items as $key => $menu_item) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			$relationship = $menu_item->attr_title;
			$menu_list .= "\t\t\t\t\t". '<li><a rel="'.$relationship.'" href="'. $url .'">'. $title .'</a></li>' ."\n";
		}
		$menu_list .= "\t\t\t\t". '</ul>' ."\n";
		//$menu_list .= "\t\t\t". '</nav>' ."\n";
	} else {
		// $menu_list = '<!-- no list defined -->';
	}
	echo $menu_list;
}

/*-----------------------------------------------------------------------------------*/
// Sets the post excerpt length to 40 characters.
// To override this length in a child theme, remove the filter and add your own
// function tied to the excerpt_length filter hook.
/*-----------------------------------------------------------------------------------*/


if ( !function_exists( 'skeleton_excerpt_length' ) ) {
	function skeleton_excerpt_length( $length ) {
		return 40;
	}
	add_filter( 'excerpt_length', 'skeleton_excerpt_length' );
}

/*-----------------------------------------------------------------------------------*/
// Returns a "Continue Reading" link for excerpts
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'skeleton_continue_reading_link' ) ) {
	function skeleton_continue_reading_link() {
		return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'smpl' ) . '</a>';
	}
}


/*-----------------------------------------------------------------------------------*/
// Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis
// and skeleton_continue_reading_link().
//
// To override this in a child theme, remove the filter and add your own
// function tied to the excerpt_more filter hook.
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'skeleton_auto_excerpt_more' ) ) {
	function skeleton_auto_excerpt_more( $more ) {
		return ' &hellip;' . skeleton_continue_reading_link();
	}
	add_filter( 'excerpt_more', 'skeleton_auto_excerpt_more' );
}

/*-----------------------------------------------------------------------------------*/
// Adds a pretty "Continue Reading" link to custom post excerpts.
/*-----------------------------------------------------------------------------------*/


if ( !function_exists( 'skeleton_custom_excerpt_more' ) ) {
	function skeleton_custom_excerpt_more( $output ) {
		if ( has_excerpt() && ! is_attachment() ) {
			$output .= skeleton_continue_reading_link();
		}
		return $output;
	}
	add_filter( 'get_the_excerpt', 'skeleton_custom_excerpt_more' );
}

/*-----------------------------------------------------------------------------------*/
// Removes the page jump when read more is clicked through
/*-----------------------------------------------------------------------------------*/


if ( !function_exists( 'remove_more_jump_link' ) ) {
	function remove_more_jump_link($link) {
		$offset = strpos($link, '#more-');
		if ($offset) {
		$end = strpos($link, '"',$offset);
		}
		if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
		}
		return $link;
	}
	add_filter('the_content_more_link', 'remove_more_jump_link');
}


/*-----------------------------------------------------------------------------------*/
// Add Scripts
/*-----------------------------------------------------------------------------------*/
add_action('wp_enqueue_scripts', 'dte_load_javascript_files'); 
function dte_load_javascript_files() {
	wp_register_script('lessScript', get_template_directory_uri().'/library/js/less.js', false, '1.0', false);
	wp_deregister_script('jquery'); // removed packed version 
	wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, '1.10.2', false);
	wp_register_script('bootstrapScript', 'http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js', array('jquery'),'3.0.3', true);
	wp_register_script('easingScript', 'http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js', array('jquery'),'1.3', true);
	//wp_register_script('mapsScript', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false', array('jquery'),'1.0', true);
	//wp_register_script('hashScript', get_template_directory_uri().'/library/js/hashchange.1.3.js', array('jquery'), '1.3', true);
	//wp_register_script('ajaxScript', get_template_directory_uri().'/library/js/ajax.js', array('jquery'), '1.0', true);
	wp_register_script('MagnificScript', get_template_directory_uri().'/library/js/jquery.magnific-popup.min.js', array('jquery'), '0.9.9', true);
	wp_register_script('customScript', get_template_directory_uri().'/library/js/custom.js', array('jquery'), '1.0', true);
	
	wp_enqueue_script('lessScript');
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrapScript');
	wp_enqueue_script('easingScript');
	//wp_enqueue_script('mapsScript');
	//wp_enqueue_script('hashScript');
	//wp_enqueue_script('ajaxScript');
	wp_enqueue_script('MagnificScript');
	wp_enqueue_script('customScript');
}


if ( ! function_exists( 'twentytwelve_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentytwelve_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Twelve 1.0
 *
 * @return void
 */
function twentytwelve_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'twentytwelve' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'twentytwelve' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'twentytwelve' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentytwelve' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'twentytwelve' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'twentytwelve' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'dte_entry_meta' ) ) :
/**
 * Set up post entry meta.
 *
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentytwelve_entry_meta() to override in a child theme.
 *
 * @since Twenty Twelve 1.0
 *
 * @return void
 */
function dte_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentytwelve' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	//$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
	//	esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
	//	esc_attr( sprintf( __( 'View all posts by %s', 'twentytwelve' ), get_the_author() ) ),
	//	get_the_author()
	//);
	/*$commentsLink = sprintf( '<div class="comments-link"><?php comments_popup_link( "<span class="leave-reply">' . __( 'Leave a reply', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?></div><!-- .comments-link --><?php endif; // comments_open() ?>' );*/
	

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s.', 'twentytwelve' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s.', 'twentytwelve' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s.', 'twentytwelve' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date
		//$author
	);
}
endif;



/************* Custom Login Screen *****************/
function custom_login() {
	$files = '<link rel="stylesheet" href="'.get_bloginfo('stylesheet_directory').'/library/css/login.css" />
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	          <script src="'.get_bloginfo('stylesheet_directory').'/library/js/login.js"></script>';
	echo $files;
}
add_action('login_head', 'custom_login');

function custom_login_url() {
	return get_option('siteurl');
}
add_filter('login_headerurl', 'custom_login_url');

function custom_login_title() {
	return get_option('blogname');
}
add_filter('login_headertitle', 'custom_login_title');

/************ Custom Logo Dashboard ***************/
//hook the administrative header output
add_action('admin_head', 'my_custom_logo');

function my_custom_logo() {
echo '
<style type="text/css">
#wp-admin-bar-wp-logo > .ab-item .ab-icon, 
#wpadminbar > #wp-toolbar > #wp-admin-bar-root-default #wp-admin-bar-wp-logo .ab-icon, 
#wpadminbar #wp-admin-bar-wp-logo .ab-icon, 
#wpadminbar #wp-admin-bar-wp-logo .ab-item:before { 
	background-image: url('.get_bloginfo('stylesheet_directory').'/library/images/bulldog-logo-dashboard.png) !important;
	background-position: 0 0;
	background-repeat: no-repeat;
	width: 64px;height: 53px;
}

#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {content: "";}

#wpadminbar .nojs li:hover > .ab-sub-wrapper,
#wpadminbar li#wp-admin-bar-wp-logo.hover > .ab-sub-wrapper {display: none !important;}

#wpadminbar #wp-admin-bar-wp-logo.menupop .ab-sub-wrapper {background: transparent;box-shadow: none;}

#wpadminbar li#wp-admin-bar-wp-logo.hover {background:transparent;box-shadow:none;}

#wpadminbar .ab-top-menu > li#wp-admin-bar-wp-logo > .ab-item:focus,
#wpadminbar.nojq .quicklinks .ab-top-menu > li#wp-admin-bar-wp-logo > .ab-item:focus,
#wpadminbar .ab-top-menu li#wp-admin-bar-wp-logo:hover > .ab-item,
#wpadminbar .ab-top-menu > li#wp-admin-bar-wp-logo:hover > .ab-item {background: transparent;}

a, 
#the-comment-list p.comment-author strong a, 
#media-upload a.del-link, 
#media-items a.delete, 
#media-items a.delete-permanently, 
.plugins a.delete, 
.ui-tabs-nav a, 
.plugins .inactive a {color: #af7d03;}

#wpadminbar #wp-admin-bar-site-name > .ab-item:before,
#wpadminbar #wp-admin-bar-new-content .ab-icon:before {color: #dadada}

#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, 
#adminmenu li.current a.menu-top, 
.folded #adminmenu li.wp-has-current-submenu, 
.folded #adminmenu li.current.menu-top, 
#adminmenu .wp-menu-arrow, 
#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, 
#adminmenu .wp-menu-arrow div {background: #4a1b4f;}

#adminmenu li.menu-top:hover,
#adminmenu li.opensub > a.menu-top,
#adminmenu li > a.menu-top:focus,
#adminmenu a:hover,
#adminmenu li:hover div.wp-menu-image:before {color: #af7d03 !important;}

a:hover, a:focus {color: #4a1b4f}

.wrap .add-new-h2, .wrap .add-new-h2:active {background: #af7d03;color: #fff}
.wrap .add-new-h2:hover {color: #fff;background: #4a1b4f;}

#wpadminbar > #wp-toolbar li:hover span.ab-label,
#wpadminbar > #wp-toolbar li.hover span.ab-label,
#wpadminbar > #wp-toolbar a:focus span.ab-label,
#wpadminbar .quicklinks .menupop ul li a:hover,
#wpadminbar .quicklinks .menupop ul li a:focus,
#wpadminbar .quicklinks .menupop ul li a:hover strong,
#wpadminbar .quicklinks .menupop ul li a:focus strong,
#wpadminbar .quicklinks .menupop.hover ul li a:hover,
#wpadminbar .quicklinks .menupop.hover ul li a:focus,
#wpadminbar.nojs .quicklinks .menupop:hover ul li a:hover,
#wpadminbar.nojs .quicklinks .menupop:hover ul li a:focus,
#wpadminbar li:hover .ab-icon:before,
#wpadminbar li:hover .ab-item:before,
#wpadminbar li a:focus .ab-icon:before,
#wpadminbar li .ab-item:focus:before,
#wpadminbar li:hover .ab-icon:before,
#wpadminbar li:hover .ab-item:before,
#wpadminbar li:hover #adminbarsearch:before,
#wpadminbar #wp-admin-bar-site-name a.ab-item:hover,
#wpadminbar #wp-admin-bar-site-name.menupop.hover a.ab-item,
#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, 
#adminmenu li.current a.menu-top, 
#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head,
#adminmenu .wp-has-current-submenu div.wp-menu-image:before, 
#adminmenu .current div.wp-menu-image:before, 
#adminmenu a.wp-has-current-submenu:hover div.wp-menu-image:before, 
#adminmenu a.current:hover div.wp-menu-image:before,
#collapse-menu:hover,
#collapse-menu:hover #collapse-button div:after,
.view-switch a.current:before {color: #af7d03 !important}

#adminmenu a:hover,
#adminmenu li.menu-top > a:focus,
#adminmenu .wp-submenu a:hover,
#rightnow a:hover,
#media-upload a.del-link:hover,
div.dashboard-widget-submit input:hover,
.subsubsub a:hover,
.subsubsub a.current:hover,
.ui-tabs-nav a:hover {color: #4a1b4f}

.post-com-count:hover span {background-color: #af7d03;color: #fff}

.plugins .active th.check-column {border-left: 4px solid #af7d03}
.post-com-count:hover:after {border-top: 5px solid #af7d03}

.wp-core-ui .button-primary {
	background: #af7d03;
  border-color: transparent;
  border: none;
  box-shadow: none;
  color: #FFFFFF;
  text-decoration: none;
}

.wp-core-ui .button-primary:hover,
.wp-core-ui .button-primary.hover,
.wp-core-ui .button-primary:focus,
.wp-core-ui .button-primary.focus {
	background: #4a1b4f;
  border-color: transparent;
  border: none;
  box-shadow: none;
}
.current.menu-top {color: #fff !important}
</style>
';
}

//add shortcodes in widgets
add_filter( 'widget_text', 'do_shortcode' );

// Remove the WP version for extra WordPress Security
function remove_wp_version(){ 
	return ''; 
} 
add_filter('the_generator', 'remove_wp_version');

// Remove height/width attributes on images so they can be responsive
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

//removing default widgets
function remove_some_wp_widgets(){
  unregister_widget('WP_Widget_Calendar');
  unregister_widget('WP_Widget_Meta');
  unregister_widget('WP_Widget_Archives');
  unregister_widget('WP_Widget_Tag_Cloud');
}
add_action('widgets_init','remove_some_wp_widgets', 1);

//customize the footer
function modify_footer_admin () {
  echo 'Created by <a href="http://dnnsldr.com">dnnsldr</a>.';
  echo 'Powered by Coffee.';
}
add_filter('admin_footer_text', 'modify_footer_admin');

//another gettext
function youruniqueprefix_filter_gettext( $translated, $original, $domain ) {
    // This is an array of original strings
    // and what they should be replaced with
    
    //see if this is the main site 
    	$strings = array(
        	'WordPress' => 'Talon OS',
        	'Dashboard' => 'QCHS Varsity Dashboard',
        	'Posts' => 'Articles',
        	'All Posts' => 'All Articles',
        	'Add New Post' => 'Add New Article',
        	'WordPress Updates' => 'Talon OS Updates',
        	'Tea T.O.' => 'Options Panel'
        	// Add some more strings here
    	);
    // See if the current string is in the $strings array
    // If so, replace it's translation
    if ( isset( $strings[$original] ) ) {
        // This accomplishes the same thing as __()
        // but without running it through the filter again
        $translations = get_translations_for_domain( $domain );
        $translated = $translations->translate( $strings[$original] );
    }
 
    return $translated;
}
add_filter( 'gettext', 'youruniqueprefix_filter_gettext', 10, 3 );

//remove pages
function remove_menus(){
  
  //remove_menu_page( 'index.php' );                  //Dashboard
  //remove_menu_page( 'edit.php' );                   //Posts
  //remove_menu_page( 'upload.php' );                 //Media
  //remove_menu_page( 'edit.php?post_type=page' );    //Pages
  //remove_menu_page( 'edit-comments.php' );          //Comments
  //remove_menu_page( 'themes.php' );                 //Appearance
	//remove_menu_page( 'plugins.php' );                //Plugins
  //remove_menu_page( 'users.php' );                  //Users
  //remove_menu_page( 'tools.php' );                  //Tools
  //remove_menu_page( 'options-general.php' );        //Settings
  remove_menu_page( 'about.php' ); 
  
}
add_action( 'admin_menu', 'remove_menus' );

/************************** ADMIN ONLY *****************************/
//now lets add some user specific admin for Super Admin only*/
//based off of http://sixrevisions.com/wordpress/how-to-customize-the-wordpress-admin-area/

global $user_login;
get_currentuserinfo();
if ($user_login !== "bulldogGridion") {
//create custom update message in admin
	function dnnsldr_update_nag() {
		if ( !current_user_can('update_core') )
		return false;

		global $pagenow;
	

		if ( 'update-core.php' == $pagenow )
			return;

		$cur = get_preferred_from_update_core();

		if ( ! isset( $cur->response ) || $cur->response != 'upgrade' )
			return false;

		if ( current_user_can('update_core') ) {
		
		
   		if ($user_login !== "bulldogGridiron") {
	
				$msg = sprintf( __('Your Admin Theme and Site Framework is ready for an update. Please contact <a href="mailto:dnnsldr@gmail.com" target="_blank">Dennis Elder</a> to perform the required update.'), $cur->current, 'update-core.php' );
			}
		} else {
			$msg = sprintf( __('Please contact <a href="mailto:dnnsldr@gmail.com" target="_blank">Dennis Elder</a> for all your development and design needs.'), $cur->current );

		echo "<div class='update-nag'>$msg</div>";
		}
	}
	add_action('admin_init',create_function('$a','remove_action("admin_notices","update_nag",3);'));
	add_action('admin_init',create_function('$a','remove_filter("update_footer","core_update_footer");'));
	add_action( 'admin_notices', 'dnnsldr_update_nag', 3 );


	function remove_menu_items() {
  	global $menu;
  	$restricted = array(
  		__('Links'), 
  		__('Comments'), 
  		__('Media'),
  		__('Plugins'), 
  		__('Tools'), 
  		__('Users'));
  	end ($menu);
  	while (prev($menu)){
    	$value = explode(' ',$menu[key($menu)][0]);
    	if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){
      	unset($menu[key($menu)]);}
    	}
  	}
	add_action('admin_menu', 'remove_menu_items');
	//remove some submenus
	function remove_submenus() {
  	global $submenu;
  	//unset($submenu['index.php'][10]); // Removes 'Updates'.
  	unset($submenu['themes.php'][5]); // Removes 'Themes'.
  	unset($submenu['options-general.php'][15]); // Removes 'Writing'.
  	unset($submenu['options-general.php'][25]); // Removes 'Discussion'.
  	unset($submenu['edit.php'][16]); // Removes 'Tags'.  
	}
	add_action('admin_menu', 'remove_submenus');

	//remove editor
	function remove_editor_menu() {
  	remove_action('admin_menu', '_add_themes_utility_last', 101);
	}
	add_action('_admin_menu', 'remove_editor_menu', 1);

	//remove meta boxes for the post/page area
	function customize_meta_boxes() {
  	//Removes meta boxes from Posts 
  	remove_meta_box('postcustom','post','normal');
  	remove_meta_box('trackbacksdiv','post','normal');
  	remove_meta_box('commentstatusdiv','post','normal');
  	remove_meta_box('commentsdiv','post','normal');
  	remove_meta_box('tagsdiv-post_tag','post','normal');
  	remove_meta_box('postexcerpt','post','normal');
  	//Removes meta boxes from pages 
  	remove_meta_box('postcustom','page','normal');
  	remove_meta_box('trackbacksdiv','page','normal');
  	remove_meta_box('commentstatusdiv','page','normal');
  	remove_meta_box('commentsdiv','page','normal');  
	}
	add_action('admin_init','customize_meta_boxes');

	//remove items for the post/page columns in the admin page/post list
	function custom_post_columns($defaults) {
  	unset($defaults['comments']);
  	return $defaults;
	}
	add_filter('manage_posts_columns', 'custom_post_columns');

	function custom_pages_columns($defaults) {
  	unset($defaults['comments']);
  	return $defaults;
	}
	add_filter('manage_pages_columns', 'custom_pages_columns');

	//customize the favorites dropdown in admin
	function custom_favorite_actions($actions) {
  	unset($actions['edit-comments.php']);
  	return $actions;
	}
	add_filter('favorite_actions', 'custom_favorite_actions');
	
	//remove some of the tea to options panel
	add_action('admin_head', 'my_options_panel');
	function my_options_panel() {
		echo '
			<style type="text/css">
				.wrap.tea_to ul.subsubsub li:first-child,
				.wrap.tea_to ul.subsubsub li:nth-child(2),
				.wrap.tea_to ul.subsubsub li:nth-child(3),
				.wrap.tea_to ul.subsubsub li:last-child {
					display:none
				}
				#toplevel_page_tea_theme_options .wp-submenu.wp-submenu-wrap li.wp-first-item,
				#toplevel_page_tea_theme_options .wp-submenu.wp-submenu-wrap li:nth-child(3),
				#toplevel_page_tea_theme_options .wp-submenu.wp-submenu-wrap li:nth-child(4),
				#toplevel_page_tea_theme_options .wp-submenu.wp-submenu-wrap li:last-child {
					display:none;
				}
				.wrap.tea_to #poststuff #postbox-container-1 {display:none}
				#wp-admin-bar-root-default #wp-admin-bar-tea_theme_options {display:none}
				form.upgrade[name="upgrade-plugins"] {display:none}
			</style>';
	}
	//end of options panel
}

?>
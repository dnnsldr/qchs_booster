<?php
/**
 * @package Skeleton WordPress Theme Framework
 * @subpackage skeleton
 * @author Simple Themes - www.simplethemes.com
 *
 * Layout Hooks:
 *
 * skeleton_above_header // Opening header wrapper
 * skeleton_header // header tag and logo/header text
 * skeleton_header_extras // Additional content may be added to the header
 * skeleton_below_header // Closing header wrapper
 * skeleton_navbar // main menu wrapper
 * skeleton_before_content // Opening content wrapper
 * skeleton_after_content // Closing content wrapper
 * skeleton_before_sidebar // Opening sidebar wrapper
 * skeleton_after_sidebar // Closing sidebar wrapper
 * skeleton_footer // Footer
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, skeleton_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage skeleton
 * @since skeleton 2.0
 */

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
    $strings = array(
        'WordPress' => 'Talon OS',
        'Dashboard' => 'QCHS Dashboard',
        'Posts' => 'Articles',
        'All Posts' => 'All Articles',
        'Add New Post' => 'Add New Article',
        'WordPress Updates' => 'Talon OS Updates',
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
		if ( is_multisite() && !current_user_can('update_core') )
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
}

?>
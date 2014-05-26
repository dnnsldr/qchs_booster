<?php
/**
 * The Header for our theme.
 *
 * @package royal theme
 * @subpackage royal
 * @author dnnsldr.com
 */
?>
<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes();?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes();?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes();?>> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" <?php language_attributes();?>> <![endif]-->
<!--[if (gte IE 10)|!(IE)]><!--><html <?php language_attributes();?>> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <!-- Bootstrap Core CSS -->
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<!-- Fonts -->
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Metrophobic" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Alfa+Slab+One" rel="stylesheet" type="text/css">
	<!-- Magnific Popup core CSS file -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/magnific-popup.css"> 	<!-- using LESS -->
	<link rel="stylesheet/less" type="text/css" href="<?php echo get_template_directory_uri(); ?>/library/less/style.less" />
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
		
		
    <!-- Side Menu -->
    <a id="menu-toggle" href="#" class="btn btn-primary btn-lg toggle"><i class="fa fa-bars"></i></a>
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-default btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand"><a href="<?php home_url(); ?>">Bulldog Football</a>
            </li>
            <li><a href="<?php echo home_url(); ?>#season">Varsity Schedule</a>
            </li>
            <li><a href="<?php echo home_url(); ?>#roster">Varsity Roster</a>
            </li>
            <li><a href="<?php echo home_url(); ?>#services">Junior Varsity</a>
            </li>
            <li><a href="<?php echo home_url(); ?>#portfolio">Freshmen</a>
            </li>
            <li><a href="<?php echo home_url(); ?>#contact">Coaches</a>
            </li>
        </ul>
    </div>
    <!-- /Side Menu -->
   	
   	<!-- add our logo -->
    <div class="branding col-lg-4 col-md-6 col-xs-8">
				<a href="<?php echo home_url(); ?>">
					<?php if(is_page_template('page-welcome.php')) { ?>
					<img class="col-lg-6 col-md-6 col-xs-6" src="<?php echo get_template_directory_uri(); ?>/library/images/bulldog-logo.png" alt="Queen Creek High School Football"/>
					<h3 class="tagline">Queen Creek</h3>
					<h3>High School</h3>
					<?php } else { ?>
					<img class="col-lg-3 col-md-3 col-xs-3" src="<?php echo get_template_directory_uri(); ?>/library/images/bulldog-logo.png" alt="Queen Creek High School Football"/>
					<h3 class="tagline small">Queen Creek</h3>
					<h3 class="small">High School</h3>
					<?php } ?>
				</a>
			</div><!-- /.branding -->
    	<div class="clearfix"></div>
    	 
    	<?php if(!is_page_template('page-welcome.php')) { ?>
    	<div class="wrapper">
    	<?php } ?>
     
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
	<link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	<!-- Custom Theme CSS -->
	<!--<link href="<?php //echo get_template_directory_uri();?>/style.css" rel="stylesheet">-->
	<!-- using LESS -->
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
            <li class="sidebar-brand"><a href="http://startbootstrap.com">Start Bootstrap</a>
            </li>
            <li><a href="#top">Home</a>
            </li>
            <li><a href="#about">About</a>
            </li>
            <li><a href="#services">Services</a>
            </li>
            <li><a href="#portfolio">Portfolio</a>
            </li>
            <li><a href="#contact">Contact</a>
            </li>
        </ul>
    </div>
    <!-- /Side Menu -->
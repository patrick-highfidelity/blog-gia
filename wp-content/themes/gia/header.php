<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- External Plugins -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/_assets/js/bxslider-4-4.2.12/src/css/jquery.bxslider.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Cabin:400,400i,500,500i,600,600i,700,700i|Nunito+Sans:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i|Pacifico" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

	<!-- Custom CSS -->
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/_assets/css/reset.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/_assets/css/base.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/_assets/css/custom.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/_assets/css/custom-bx-slider.css">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/_assets/css/responsive.css">

	<!-- Custom Javascript -->
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/_assets/js/script.js"></script>
</head>
<body class="<?php if(is_user_logged_in()){ ?>logged-in<?php }else{ ?>logged-out<?php } ?>">
<?php wp_head(); ?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

	<head>
		<!-- Meta Tags -->
		<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
		<meta name="description" content="Medinova - Health & Medical HTML Template" />
		<meta name="keywords" content="building,business,construction,cleaning,transport,workshop" />
		<meta name="author" content="ThemeMascot" />

		<!-- Page Title -->
		<title>The Family Clinic</title>

		<!-- Favicon and Touch Icons -->
		<link href="images/header-img.png" rel="shortcut icon" type="image/png">
		<link href="images/apple-touch-icon.png" rel="apple-touch-icon">
		<link href="images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
		<link href="images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
		<link href="images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

		<!-- Stylesheet -->
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css">
		<link href="css/animate.css" rel="stylesheet" type="text/css">
		<link href="css/css-plugin-collections.css" rel="stylesheet"/>
		<!-- CSS | menuzord megamenu skins -->
		<link id="menuzord-menu-skins" href="css/menuzord-skins/menuzord-boxed.css" rel="stylesheet"/>
		<!-- CSS | Main style file -->
		<link href="css/style-main.css" rel="stylesheet" type="text/css">
		<!-- CSS | Preloader Styles -->
		<link href="css/preloader.css" rel="stylesheet" type="text/css">
		<!-- CSS | Custom Margin Padding Collection -->
		<link href="css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
		<!-- CSS | Responsive media queries -->
		<link href="css/responsive.css" rel="stylesheet" type="text/css">
		<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
		<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

		<!-- Revolution Slider 5.x CSS settings -->
		<link  href="js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
		<link  href="js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
		<link  href="js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>

		<!-- CSS | Theme Color -->
		<link href="css/colors/theme-skin-orange.css" rel="stylesheet" type="text/css">

		<!-- external javascripts -->
		<script src="js/jquery-2.2.0.min.js"></script>
		<script src="js/jquery-ui.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<!-- JS | jquery plugin collection for this theme -->
		<script src="js/jquery-plugin-collection.js"></script>

		<!-- Revolution Slider 5.x SCRIPTS -->
		<script src="js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
		<script src="js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script type="text/javascript">
        
	        function success_sweatAlert(head, detail){
	            swal({
	                title: head,
	                text: detail,
	                icon: "success",
	            });
	        }
	        function error_sweatAlert(head, detail){
	            swal({
	                title: head,
	                text: detail,
	                icon: "error",
	            });
	        }
	        function warning_sweatAlert(head, detail){
	            swal({
	                title: head,
	                text: detail,
	                icon: "warning",
	            });
	        }
	    </script>
	</head>
	<?php
		require_once 'model/dbconfig.php';
	  	$db   = new database();    
	  	$sql = "SELECT * FROM web_content WHERE id='1'";
	  	$run = $db->config()->query($sql);
	  	$data = mysqli_fetch_assoc($run);
	    
	    $facebook 		= $data['facebook'];
	    $twitter 		= $data['twitter'];
	    $google_plus 	= $data['google_plus'];
	    $linkedin 		= $data['linkedin'];
	    $contact_num 	= $data['contact_num'];
	    $email 			= $data['email'];
	    $timing 		= $data['timing'];
	    $address 		= $data['address'];
    ?>
	<body class="has-side-panel side-panel-right fullwidth-page side-push-panel">
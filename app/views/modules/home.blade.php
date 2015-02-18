<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Empty File | Melon - Flat &amp; Responsive Admin Template</title>

	<!--=== CSS ===-->

	<!-- Bootstrap -->
	<link href="melon/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	<!-- jQuery UI -->
	<!--<link href="plugins/jquery-ui/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />-->
	<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="plugins/jquery-ui/jquery.ui.1.10.2.ie.css"/>
	<![endif]-->

	<!-- Theme -->
	<link href="melon/assets/css/main.css" rel="stylesheet" type="text/css" />
	<link href="melon/assets/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="melon/assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="melon/assets/css/icons.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="melon/assets/css/fontawesome/font-awesome.min.css">
	<!--[if IE 7]>
		<link rel="stylesheet" href="assets/css/fontawesome/font-awesome-ie7.min.css">
	<![endif]-->

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

	<!--=== JavaScript ===-->

	<script type="text/javascript" src="melon/assets/js/libs/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="melon/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>

	<script type="text/javascript" src="melon/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="melon/assets/js/libs/lodash.compat.min.js"></script>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="assets/js/libs/html5shiv.js"></script>
	<![endif]-->

	<!-- Smartphone Touch Events -->
	<script type="text/javascript" src="melon/plugins/touchpunch/jquery.ui.touch-punch.min.js"></script>
	<script type="text/javascript" src="melon/plugins/event.swipe/jquery.event.move.js"></script>
	<script type="text/javascript" src="melon/plugins/event.swipe/jquery.event.swipe.js"></script>

	<!-- General -->
	<script type="text/javascript" src="melon/assets/js/libs/breakpoints.js"></script>
	<script type="text/javascript" src="melon/plugins/respond/respond.min.js"></script> <!-- Polyfill for min/max-width CSS3 Media Queries (only for IE8) -->
	<script type="text/javascript" src="melon/plugins/cookie/jquery.cookie.min.js"></script>
	<script type="text/javascript" src="melon/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="melon/plugins/slimscroll/jquery.slimscroll.horizontal.min.js"></script>

	<!-- App -->
	<script type="text/javascript" src="melon/assets/js/app.js"></script>
	<script type="text/javascript" src="melon/assets/js/plugins.js"></script>
	<script type="text/javascript" src="melon/assets/js/plugins.form-components.js"></script>


	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.3/angular.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.3/angular-route.js"></script>

	<script type="text/javascript" src="js/app.js"></script>
	<script type="text/javascript" src="js/controllers.js"></script>

	<script>
	$(document).ready(function(){
		"use strict";

		App.init(); // Init layout and core plugins
		Plugins.init(); // Init all plugins
		FormComponents.init(); // Init all form-specific plugins
	});
	</script>
</head>

<body>

	<!-- Header -->
	<header class="header navbar navbar-fixed-top" role="banner">
		<!-- Top Navigation Bar -->
		<div class="container">

			<!-- Only visible on smartphones, menu toggle -->
			<ul class="nav navbar-nav">
				<li class="nav-toggle"><a href="javascript:void(0);" title=""><i class="icon-reorder"></i></a></li>
			</ul>

			<!-- Logo -->
			<a class="navbar-brand" href="index.html">
				<img src="melon/assets/img/logo.png" alt="logo" />
				<strong>ME</strong>LON
			</a>
			<!-- /logo -->

			<!-- Sidebar Toggler -->
			<a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="Toggle navigation">
				<i class="icon-reorder"></i>
			</a>
			<!-- /Sidebar Toggler -->

			<!-- Top Left Menu -->
			<ul class="nav navbar-nav navbar-left hidden-xs hidden-sm">
				<li>
					<a href="#">
						Dashboard
					</a>
				</li>
			</ul>
			<!-- /Top Left Menu -->

			<!-- Top Right Menu -->
			<ul class="nav navbar-nav navbar-right">
				<!-- User Login Dropdown -->
				<li class="dropdown user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-male"></i>
						<span class="username">John Doe</span>
						<i class="icon-caret-down small"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
					</ul>
				</li>
				<!-- /user login dropdown -->
			</ul>
			<!-- /Top Right Menu -->
		</div>
		<!-- /top navigation bar -->
	</header> <!-- /.header -->

	<div id="container">
		<div id="sidebar" class="sidebar-fixed">
			<div id="sidebar-content">

				<!--=== Navigation ===-->
				<ul id="nav">
					<li class="current">
						<a href="index.html">
							<i class="icon-dashboard"></i>
							Entry #1
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<i class="icon-desktop"></i>
							Entry #2
							<span class="label label-info pull-right">6</span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="ui_general.html">
								<i class="icon-angle-right"></i>
								Entry #2.1
								</a>
							</li>
						</ul>
					</li>
				</ul>
				<!-- /Navigation -->
			</div>
			<div id="divider" class="resizeable"></div>
		</div>
		<!-- /Sidebar -->

<!-- AQUI VA EL CONTENT -->
 <div id="content">
            <div class="container">
                <!-- Breadcrumbs line -->

	<div class="row" ng-view></div>

            </div>
            <!-- /.container -->

        </div>
<!-- AQUI TERMINA EL CONTENT -->

	</div>
</div>
</body>
</html>
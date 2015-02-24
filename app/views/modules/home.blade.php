<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>ERP</title>

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
	<link href='melon/plugins/select2/select2-bootstrap.css' rel='stylesheet' type='text/css'>
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
	<script type="text/javascript" src="melon/plugins/select2/select2.js"></script> <!-- Styled select boxes -->

	<!-- App -->
	<script type="text/javascript" src="melon/assets/js/app.js"></script>
	<script type="text/javascript" src="melon/assets/js/plugins.js"></script>
	<script type="text/javascript" src="melon/assets/js/plugins.form-components.js"></script>


	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.3/angular.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.3/angular-route.js"></script>

	<!-- Librerias externas -->
	<script src="lib/ui-bootstrap-tpls-0.12.0.min.js"></script>
	<script type="text/javascript" src="lib/angular-locale_es-es.js"></script>

	<!--BEGIN MVC AngularJS -->
		<script type="text/javascript" src="js/app.js"></script>
		<script type="text/javascript" src="js/directives.js"></script>
		<script type="text/javascript" src="js/services.js"></script>
		<!-- Controllers -->
		<script type="text/javascript" src="js/controllers/controllers.js"></script>

		<script type="text/javascript" src="js/controllers/dashboard.js"></script>
		<script type="text/javascript" src="js/controllers/clientes.js"></script>
		<script type="text/javascript" src="js/controllers/pedidos.js"></script>
		<script type="text/javascript" src="js/controllers/inventario.js"></script>
		<script type="text/javascript" src="js/controllers/informe.js"></script>
		<script type="text/javascript" src="js/controllers/distribuidor.js"></script>
		<script type="text/javascript" src="js/controllers/categoria.js"></script>
		<script type="text/javascript" src="js/controllers/factura.js"></script>
		<script type="text/javascript" src="js/controllers/manejar_pedidos.js"></script>
		<script type="text/javascript" src="js/controllers/factura_pedidos.js"></script>


	<!-- END MVC AngularJS	 -->


		<style >
	.column-seperation > div[class*="col-"] {
		border-right: 1px solid #ddd;
		height: 20em;
	}

	.column-seperation > div[class*="col-"]:last-child {
		border-right: 0px;

	}
	.span-precio{
		top: -6px;
		right: 31px;
		position: absolute;
	}
	.span-cantidad{
		top: 54px;
		right: 36px;
		position: absolute;
	}
	.btn-circle{
		margin-top: 4px;
		width: 30px;
		height: 30px;
		padding: 6px 0;
		border-radius: 15px;
		text-align: center;
		font-size: 12px;
		line-height: 1.428571429;
	}

	.sin-margen {
		margin-top: 2px !important;
	}
	</style>

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
				<li class="nav-toggle"><a href="#/" title=""><i class="icon-reorder"></i></a></li>
			</ul>

			<!-- Logo -->
			<a class="navbar-brand" href="#/dashboard">
				<img src="melon/assets/img/logo.png" alt="logo" />
				<strong>E</strong>RP
			</a>
			<!-- /logo -->

			<!-- Sidebar Toggler -->
			<a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="Toggle navigation">
				<i class="icon-reorder"></i>
			</a>
			<!-- /Sidebar Toggler -->

			<!-- Top Left Menu -->
			<ul class="nav navbar-nav navbar-left hidden-xs hidden-sm">
				<li ng-show="tab === 1">
					<a href="#">
						Dashboard
					</a>
				</li>
				<li ng-show="tab === 2">
					<a href="#">
						Pedidos
					</a>
				</li>
				<li ng-show="tab === 3">
					<a href="#">
						Clientes
					</a>
				</li>
				<li ng-show="tab === 4">
					<a href="#">
						Inventario
					</a>
				</li>
				<li ng-show="tab === 5">
					<a href="#">
						Informe
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
						<span class="username">Amalia Linarez</span>
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
	</header>
	<!-- /.header -->

	<div id="container" ng-controller="tabsController">
		<!-- Sidebar -->
		<div id="sidebar" class="sidebar-fixed">
			<div id="sidebar-content">
				<!--=== Navigation ===-->
				<ul id="nav" ng-init="tab = 1">
					<li ng-class="{ current : tab === 1 }" >
						<a href="#/dashboard" ng-click="tab = 1">
							<i class="icon-home"></i>
							Dashboard
						</a>
					</li>
					<li ng-class="{ current : tab === 2 || tab === 3 || tab === 4 }">
						<a >
							<i class="icon-shopping-cart"></i>
							Pedidos
						</a>
						<ul class="sub-menu">
							<li ng-class="{ current : tab === 2 }">
								<a href="#/pedidos" ng-click="tab = 2">
									<i class="icon-shopping-cart"></i>
									Crear Pedido
								</a>
							</li>
							<li ng-class="{ current : tab === 3 }">
								<a href="#/factura-pedidos" ng-click="tab = 3">
									<i class="icon-shopping-cart"></i>
									Manejar Pedidos
								</a>
							</li>
					<!-- 		<li ng-class="{ current : tab === 4 }">
								<a href="#/manejar-pedidos" ng-click="tab = 4">
									<i class="icon-shopping-cart"></i>
									Manejar Pedidos
								</a>
							</li> -->
						</ul>
					</li>
					<li ng-class="{ current : tab === 5 }">
						<a href="#/clientes" ng-click="tab = 5">
							<i class="icon-group"></i>
							Clientes
						</a>
					</li>
					<li ng-class="{ current : tab === 6 || tab === 7 || tab === 8}">
						<a >
							<i class="icon-barcode"></i>
							Productos

						</a>
						<ul class="sub-menu">
							<li ng-class="{ current : tab === 6  }">
								<a href="#/inventario" ng-click="tab = 6">
									<i class="icon-barcode"></i>
									Manejar Productos
								</a>
							</li>
							<li ng-class="{ current : tab === 7 }">
								<a href="#/categoria" ng-click="tab = 7">
									<i class="icon-barcode"></i>
									Categorias
								</a>
							</li>
							<li ng-class="{ current : tab === 8 }">
								<a href="#/distribuidor" ng-click="tab = 8">
									<i class="icon-barcode"></i>
									Distribuidores
								</a>
							</li>
						</ul>
					</li>
					<li ng-class="{ current : tab === 9 }">
						<a href="#/informe" ng-click="tab = 9">
							<i class="icon-calendar"></i>
							Informe
						</a>
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
								<div class="crumbs">
									<!-- Current Container Section -->
									<ul id="breadcrumbs" class="breadcrumb">
									 <li ng-show="tab === 1"> <i class="icon-home"></i> <a href="#/home">Dashboard</a> </li>
									 <li ng-show="tab === 2"> <i class="icon-shopping-cart"></i> <a href="#/pedidos">Pedidos</a> </li>
									 <li ng-show="tab === 3"> <i class="icon-group"></i> <a href="#/clientes">Clientes</a> </li>
									 <li ng-show="tab === 4"> <i class="icon-barcode"></i> <a href="#/inventario">Inventario</a> </li>
									 <li ng-show="tab === 5"> <i class="icon-calendar"></i> <a href="#/informe">Informe</a> </li>
									</ul>
									<!-- Info Panel -->
									<ul class="crumb-buttons">
										<li class="">
											<a > <i class="icon-calendar"></i> <span>@{{fecha | date:'fullDate'}}</span> </a>
										</li>
									</ul>
								</div>
									<br>
										<!-- BEGIN VISTA DEL CONTENT -->
										<div ng-view></div>
										<!-- END VISTA DEL CONTENT -->
				            </div>
				 </div>
				<!-- AQUI TERMINA EL CONTENT -->
	</div>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="en" >
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Login | Melon - Flat &amp; Responsive Admin Template</title>

	<!--=== CSS ===-->

	<!-- Bootstrap -->
	<link href="melon/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	<!-- Theme -->
	<link href="melon/assets/css/main.css" rel="stylesheet" type="text/css" />
	<link href="melon/assets/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="melon/assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="melon/assets/css/icons.css" rel="stylesheet" type="text/css" />

	<!-- Login -->
	<link href="melon/assets/css/login.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="melon/assets/css/fontawesome/font-awesome.min.css">
	<!--[if IE 7]>
		<link rel="stylesheet" href="assets/css/fontawesome/font-awesome-ie7.min.css">
	<![endif]-->

	<!--[if IE 8]>
		<link href="assets/css/ie8.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

	<!--=== JavaScript ===-->

	<script type="text/javascript" src="melon/assets/js/libs/jquery-1.10.2.min.js"></script>

	<script type="text/javascript" src="melon/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="melon/assets/js/libs/lodash.compat.min.js"></script>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="assets/js/libs/html5shiv.js"></script>
	<![endif]-->

	<!-- Beautiful Checkboxes -->
	<script type="text/javascript" src="melon/plugins/uniform/jquery.uniform.min.js"></script>

	<!-- Form Validation -->
	<script type="text/javascript" src="melon/plugins/validation/jquery.validate.min.js"></script>

	<!-- Slim Progress Bars -->
	<script type="text/javascript" src="melon/plugins/nprogress/nprogress.js"></script>

	<!-- App -->
	<script type="text/javascript" src="melon/assets/js/login.js"></script>


	<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.3/angular.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.3/angular-route.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.3/angular-resource.js"></script>

	Librerias externas
	<script src="lib/ui-bootstrap-tpls-0.12.0.min.js"></script>
	<script type="text/javascript" src="lib/angular-locale_es-es.js"></script>

	BEGIN MVC AngularJS
		<script type="text/javascript" src="js/app.js"></script>
		<script type="text/javascript" src="js/directives.js"></script>
		<script type="text/javascript" src="js/services.js"></script>
		Controllers
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
		<script type="text/javascript" src="js/controllers/configuracion.js"></script>-->

	<!--BEGIN MVC AngularJS -->


	<!-- END MVC AngularJS	 -->
	<script>
	$(document).ready(function(){
		"use strict";

		Login.init(); // Init login JavaScript
	});
	</script>
</head>

<body class="login"  >
	<!-- Logo -->
	<div class="logo">
		<img src="melon/assets/img/logo.png" alt="logo" />
		<strong>ME</strong>LON
	</div>
	<!-- /Logo -->

	<!-- Login Box -->
	<div class="box">
		<div class="content">
			<!-- Login Formular -->
			<form class="form-vertical login-form" action="/login" novalidate >
				<!-- Title -->
				<h3 class="form-title">Sign In to your Account</h3>

				<!-- Error Message -->
				<div class="alert fade in alert-danger" id="dangerLogin" style="display: none;">
					<i class="icon-remove close" data-dismiss="alert"></i>
					Enter any username and password.
				</div>

				<!-- Input Fields -->
				<div class="form-group">
					<!--<label for="username">Username:</label>-->
					<div class="input-icon">
						<i class="icon-user"></i>
						<input type="text" name="email"  id="email" class="form-control"  placeholder="Email" autofocus="autofocus" data-rule-required="true" data-msg-required="Please enter your username." />
					</div>
				</div>
				<div class="form-group">
					<!--<label for="password">Password:</label>-->
					<div class="input-icon">
						<i class="icon-lock"></i>
						<input type="password" name="password" id="password" class="form-control"  placeholder="Password" data-rule-required="true" data-msg-required="Please enter your password." />
					</div>
				</div>
				<!-- /Input Fields -->

				<!-- Form Actions -->
				<div class="form-actions">
					<label class="checkbox pull-left"><input type="checkbox" class="uniform" name="remember"> Remember me</label>
					<button type="submit" id="loginSubmit" class="submit btn btn-primary pull-right">
						Sign In <i class="icon-angle-right"></i>
					</button>
				</div>
			</form>
			<!-- /Login Formular -->

			<!-- Register Formular (hidden by default) -->
			<form class="form-vertical register-form" ng-submit="registrar($event)" style="display: none;">
				<!-- Title -->
				<h3 class="form-title">Registrarse</h3>

				<!-- Input Fields -->
				<div class="form-group">
					<div class="input-icon">
						<i class="icon-user"></i>
						<input type="text" name="name"  class="form-control" placeholder="Nombre" autofocus="autofocus" data-rule-required="true" />
					</div>
				</div>
				<!--  -->
				<div class="form-group">
					<div class="input-icon">
						<i class="icon-user"></i>
						<input type="text" name="name"  class="form-control" placeholder="Apellido" autofocus="autofocus" data-rule-required="true" />
					</div>
				</div>
				<div class="form-group">
					<div class="input-icon">
						<i class="icon-lock"></i>
						<input type="password" name="lastname"  class="form-control" placeholder="Password" id="register_password" data-rule-required="true" />
					</div>
				</div>
				<div class="form-group">
					<div class="input-icon">
						<i class="icon-ok"></i>
						<input type="password" name="password_confirm"  class="form-control" placeholder="Confirm Password" data-rule-required="true" data-rule-equalTo="#register_password" />
					</div>
				</div>
				<div class="form-group">
					<div class="input-icon">
						<i class="icon-envelope"></i>
						<input type="text" name="Email" class="form-control"  placeholder="Email address" data-rule-required="true" data-rule-email="true" />
					</div>
				</div>
				<div class="form-group spacing-top">
					<label class="checkbox"><input type="checkbox" class="uniform" name="remember" data-rule-required="true" data-msg-required="Please accept ToS first."> I agree to the <a href="javascript:void(0);">Terms of Service</a></label>
					<label for="remember" class="has-error help-block" generated="true" style="display:none;"></label>
				</div>
				<!-- /Input Fields -->

				<!-- Form Actions -->
				<div class="form-actions">
					<button type="button" class="back btn btn-default pull-left">
						<i class="icon-angle-left"></i> Back</i>
					</button>
					<button type="submit" class="submit btn btn-primary pull-right">
						Sign Up <i class="icon-angle-right"></i>
					</button>
				</div>
			</form>
			<!-- /Register Formular -->
		</div> <!-- /.content -->

		<!-- Forgot Password Form -->
		<div class="inner-box">
			<div class="content">
				<!-- Close Button -->
				<i class="icon-remove close hide-default"></i>

				<!-- Link as Toggle Button -->
				<a href="#" class="forgot-password-link">Forgot Password?</a>

				<!-- Forgot Password Formular -->
				<form class="form-vertical forgot-password-form hide-default"  method="post">
					<!-- Input Fields -->
					<div class="form-group">
						<!--<label for="email">Email:</label>-->
						<div class="input-icon">
							<i class="icon-envelope"></i>
							<input type="text" name="email" class="form-control" placeholder="Enter email address" data-rule-required="true" data-rule-email="true" data-msg-required="Please enter your email." />
						</div>
					</div>
					<!-- /Input Fields -->

					<button type="submit" class="submit btn btn-default btn-block">
						Reset your Password
					</button>
				</form>
				<!-- /Forgot Password Formular -->

				<!-- Shows up if reset-button was clicked -->
				<div class="forgot-password-done hide-default">
					<i class="icon-ok success-icon"></i> <!-- Error-Alternative: <i class="icon-remove danger-icon"></i> -->
					<span>Great. We have sent you an email.</span>
				</div>
			</div> <!-- /.content -->
		</div>
		<!-- /Forgot Password Form -->
	</div>
	<!-- /Login Box -->

	<!-- Footer -->
	<div class="footer">
		<a href="#" class="sign-up">Don't have an account yet? <strong>Sign Up</strong></a>
	</div>
	<!-- /Footer -->
</body>
</html>
<script >
  $(document).ready(function(){


});
$('#loginSubmit').click(function(event){
  event.preventDefault();

  var email    = $("#email").val();
  var password = $("#password").val();
  console.log(email);
  console.log(password);

  $.ajax({
    type: "POST",
    url: '/login',
    data: {
    	email:email,
    	password:password
    }
  }).done(function(data) {
    if(data.success == false){
      var errores = '';
      for(datos in data.errors){
        errores += '<small >' + data.errors[datos] + '</small>';
      }
      $('#dangerLogin').fadeIn("fast").html(errores);
    }else{
      window.location.href = '/dashboard';
      console.log(data.email);
    }
  });
});
  </script>

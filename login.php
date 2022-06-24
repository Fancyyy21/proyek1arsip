<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Arsip Surat</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Open+Sans:300,400,600,700"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
				urls: ['assets/css/fonts.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/azzara.min.css">
</head>

<body class="login" style="background-image: url('assets/img/login.jpg');">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h4 class="text-center"><strong>KANG</strong></h4>
			<h4 class="text-center"><strong>IT</strong></h4><br />
			<center><img src="assets/img/logo.png" width="100" height="100"></center><br /><br />
			<form method="POST" action="cek_login.php">
				<div class="login-form">
					<div class="form-group form-floating-label">
						<input id="username" name="username" type="text" class="form-control input-border-bottom" required>
						<label for="username" class="placeholder">Username</label>
					</div>
					<div class="form-group form-floating-label">
						<input id="password" name="password" type="password" class="form-control input-border-bottom" required>
						<label for="password" class="placeholder">Password</label>
						<div class="show-password">
							<i class="flaticon-interface"></i>
						</div>
					</div>
					<div class="form-action mb-3">
						<button type="submit" class="btn btn-primary btn-rounded btn-login">Sign In</button>
					</div>
				</div>
			</form>
		</div>


	</div>
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>
	<script src="assets/js/ready.js"></script>
	<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

</body>

</html>
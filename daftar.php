<!DOCTYPE html>
<html>

<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/azzara.min.css">

<head>
	<title>Form Pendaftaran Anggota</title>
</head>

<body class="login" style="background-image: url('assets/img/login.jpg');">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h4 class="text-center"><strong>KANG</strong></h4>
			<h4 class="text-center"><strong>IT</strong></h4><br />
			<center><img src="assets/img/logo.png" width="100" height="100"></center><br /><br />

			<form action="registrasi.php" method="post">

				<div class="login-form">
					<div class="form-group form-floating-label">
						<input id="nama_lengkap" name="nama_lengkap" type="text" class="form-control input-border-bottom" required>
						<label for="nama_lengkap" class="placeholder">Nama Lengkap</label>
					</div>

					<div class="login-form">
					<div class="form-group form-floating-label">
						<input id="username" name="username" type="text" class="form-control input-border-bottom" required>
						<label for="username" class="placeholder">Username</label>
					</div>

					<div class="login-form">
					<div class="form-group form-floating-label">
						<input id="password" name="password" type="text" class="form-control input-border-bottom" required>
						<label for="password" class="placeholder">Password</label>
					</div>

					<div class="login-form">
					<div class="form-group form-floating-label">
						<!-- <input id="level" name="level" type="text" class="form-control input-border-bottom" required> -->
						<!-- <label for="level" class="placeholder">Level (Admin/Pimpinan/Anggota)</label> -->
						<!-- <label for="jenis_kelamin">Level </label> -->
        				<label><input type="radio" name="level" value="Admin"> Admin</label>
						<label><input type="radio" name="level" value="Pimpinan"> Anggota</label>	
					</div>


					</div>
					<div class="form-action mb-3">
						<button type="submit" class="btn btn-primary btn-rounded btn-login">Daftar</button>
					</div>

				</div>
			</form>
		</div>
<body>

	<!-- <h2>Form Pendaftaran</h2>
	<form action="registrasi.php" method="post">
		<table>
			<tr>
				<td><label>nama_lengkap:</label></td>
				<td><input type="text" name="nama_lengkap" placeholder="Masukan Nama Lengkap" /></td>
			</tr>
			<tr>
				<td><label>Username:</label></td>
				<td><input type="text" name="username" placeholder="Masukan Username" /></td>
			</tr>
			<tr>
				<td><label>Password:</label></td>
				<td><input type="password" name="password" placeholder="Masukan Password" /></td>
			</tr>
			<tr>
				<td><label>Level:</label></td>
				<td><input type="text" name="level" placeholder="Masukan Level" /></td>
			</tr>
		</table>
		<button type="submit" name="submit">Submit</button>
	</form>
</body> -->

</html
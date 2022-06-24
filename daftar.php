<!DOCTYPE html>
<html>

<head>
	<title>Form Pendaftaran Anggota</title>
</head>

<body>

	<h2>Form Pendaftaran</h2>
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
</body>

</html
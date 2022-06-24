<!DOCTYPE html>
<html>
<head>
	<title>Export Data Ke Excel</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Laporan Surat Keluar.xls");
	?>

	<center>
		<h1> Laporan Surat Keluar</h1>
	</center>

	<table border="1">
    <tr>
      <th>No Srt Klr</th>
      <th>No Agenda</th>
      <th>Tujuan Surat</th>
      <th>Kategori Surat</th>
      <th>Tgl Srt Klr</th>
      <th>Tgl Kirim</th>
      <th>Perihal</th>
    </tr>
		<?php
		// koneksi database
		$koneksi = mysqli_connect("localhost","root","","arsip");

    if(isset($_POST['cetakExcel'])){
        $kategori    = $_POST['kategori'];

        $q = mysqli_query($koneksi,"SELECT sk.*, k.nama_kategori from suratkeluar sk join kategori k on
                               k.id=sk.id_kategori where k.id='$kategori'");

    }
    while($d = mysqli_fetch_array($q)){

		?>
    <tr>
      <td><?php echo $d['no_surat_keluar'] ?></td>
      <td><?php echo $d['no_agenda_surat_keluar'] ?></td>
      <td><?php echo $d['tujuan_surat'] ?></td>
      <td><?php echo date('d F Y', strtotime($d['tgl_surat_keluar'])) ?></td>
      <td><?php echo date('d F Y', strtotime($d['tgl_kirim'])) ?></td>
      <td><?php echo $d['perihal'] ?></td>
    </tr>
		<?php
		}
		?>
	</table>
</body>
</html>

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
	header("Content-Disposition: attachment; filename=Laporan Surat Masuk.xls");
	?>

	<center>
		<h1> Laporan Surat Masuk</h1>
	</center>

	<table border="1">
    <tr>
      <th>No Srt Msk</th>
      <th>No Agenda</th>
      <th>Asal Srt</th>
			<th>Kategori Srt</th>
      <th>Tgl Srt Msk</th>
      <th>Tgl Terima</th>
      <th>Perihal</th>
      <th>Isi Disposisi</th>
    </tr>
		<?php
		// koneksi database
		$koneksi = mysqli_connect("localhost","root","","arsip");

    if(isset($_POST['cetakExcel'])){
        $kategori    = $_POST['kategori'];

        $q = mysqli_query($koneksi,"SELECT sm.*, k.nama_kategori, d.catatan from suratmasuk sm join kategori k
                           on k.id=sm.id_kategori left join disposisi d on sm.id=d.id_surat_masuk
                           where k.id='$kategori'");

    }
    while($d = mysqli_fetch_array($q)){

		?>
    <tr>
      <td><?php echo $d['no_surat_masuk'] ?></td>
      <td><?php echo $d['no_agenda_surat_masuk'] ?></td>
      <td><?php echo $d['asal_surat'] ?></td>
			<td><?php echo $d['nama_kategori'] ?></td>
      <td><?php echo date('d F Y', strtotime($d['tgl_surat_masuk'])) ?></td>
      <td><?php echo date('d F Y', strtotime($d['tgl_terima'])) ?></td>
      <td><?php echo $d['perihal'] ?></td>
      <td><?php echo $d['catatan'] ?></td>
    </tr>
		<?php
		}
		?>
	</table>
</body>
</html>

<?php
$carikode = mysqli_query($conn, "SELECT no_surat_masuk from suratmasuk") or die(mysql_error());
$datakode = mysqli_fetch_array($carikode);
$jumlah_data = mysqli_num_rows($carikode);
if ($datakode) {
	$nilaikode = substr($jumlah_data[0], 3);
	$kode = (int) $nilaikode;
	$kode = $jumlah_data + 1;
	$no_surat_masuk = "SM-" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
	$no_surat_masuk = "SM-001";
}
?>

<?php
$carikode = mysqli_query($conn, "SELECT no_agenda_surat_masuk from suratmasuk") or die(mysql_error());
$datakode = mysqli_fetch_array($carikode);
$jumlah_data = mysqli_num_rows($carikode);
if ($datakode) {
	$nilaikode = substr($jumlah_data[0], 3);
	$kode = (int) $nilaikode;
	$kode = $jumlah_data + 1;
	$no_agenda_surat_masuk = "NASM-" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
	$no_agenda_surat_masuk = "NASM-001";
}
?>


<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Create</h4>
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="#">
							<i class="flaticon-home"></i>
						</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Data</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Surat Masuk</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Create Data Surat Masuk</div>
						</div>
						<form method="POST" action="" enctype="multipart/form-data">
							<div class="card-body">

								<div class="form-group">
									<label>No Surat Masuk</label>
									<input type="text" value="<?php echo $no_surat_masuk ?>" readonly class="form-control" name="no_surat_masuk" required="">
								</div>

								<div class="form-group">
									<label>No Agenda Surat Masuk</label>
									<input type="text" value="<?php echo $no_agenda_surat_masuk ?>" readonly class="form-control" name="no_agenda_surat_masuk" required="">
								</div>

								<div class="form-group">
									<label>Asal Surat</label>
									<input type="text" class="form-control" name="asal_surat" placeholder="Asal Surat ..." required="">
								</div>

								<div class="form-group">
									<label>Nama Kategori</label>
									<select class="form-control" name="id_kategori" required>
										<option value="" hidden>-- Pilih Kategori Surat --</option>
										<?php
										$q = mysqli_query($conn, "SELECT * from kategori");
										while ($d = mysqli_fetch_array($q)) {
										?>
											<option value="<?php echo $d['id'] ?>"><?php echo $d['nama_kategori'] ?></option>
										<?php } ?>
									</select>
								</div>

								<div class="form-group">
									<label>Tgl Surat Masuk</label>
									<input type="date" class="form-control" name="tgl_surat_masuk" required>
								</div>

								<div class="form-group">
									<label>Tgl Terima</label>
									<input type="date" class="form-control" name="tgl_terima" required>
								</div>

							</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="card">
						<div class="card-body">

							<div class="form-group">
								<label>Perihal</label>
								<textarea class="ckeditor" rows="5" name="perihal" id="ckeditor"></textarea>
							</div>

							<div class="form-group">
								<label>File Surat</label>
								<input type="file" class="form-control" name="file_surat" required="">
							</div>

						</div>
						<div class="card-action">
							<button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Save Changes</button>
							<a href="?view=suratmasuk" class="btn btn-danger"><i class="fa fa-undo"></i> Cancel</a>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
if (isset($_POST['simpan'])) {
	$id_kategori           = $_POST['id_kategori'];
	$no_surat_masuk        = $_POST['no_surat_masuk'];
	$no_agenda_surat_masuk = $_POST['no_agenda_surat_masuk'];
	$tgl_surat_masuk       = $_POST['tgl_surat_masuk'];
	$tgl_terima            = $_POST['tgl_terima'];
	$asal_surat            = $_POST['asal_surat'];
	$perihal    	         = $_POST['perihal'];
	$file_surat 		  	   = $_FILES['file_surat']['name'];
	$file_tmp 	  	       = $_FILES['file_surat']['tmp_name'];

	move_uploaded_file($file_tmp, '../assets/img/suratmasuk/' . $file_surat);

	mysqli_query($conn, "INSERT into suratmasuk values ('','$id_kategori','$no_surat_masuk','$no_agenda_surat_masuk',
                                 '$tgl_surat_masuk','$tgl_terima','$asal_surat','$perihal','$file_surat')");
	echo "
                          <script type='text/javascript'>
                              setTimeout(function () {
                                swal({
                                       title: 'Berhasil Menyimpan Data',
                                       text:  'Berhasil Menyimpan Data',
                                       type: 'success',
                                       icon: 'success',
                                       timer: 2000,
                                       showConfirmButton: true
                                    });
                                 },10);
                                   window.setTimeout(function(){
                                   window.location.replace('?view=suratmasuk');
                                 } ,2000);
                        </script>";
}
?>
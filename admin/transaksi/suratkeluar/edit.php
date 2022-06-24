<?php
$query = mysqli_query($conn,"SELECT sk.*, k.nama_kategori from suratkeluar sk join kategori k on
                       k.id=sk.id_kategori and sk.id='$_GET[id]'");
$d = mysqli_fetch_array($query);
?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Edit</h4>
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
								<a href="#">Surat Keluar</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Edit Data Surat Keluar</div>
								</div>
								<form method="POST" action="" enctype="multipart/form-data">
								<div class="card-body">
                  <input type="hidden" value="<?php echo $d['id'] ?>" name="id" required="">

                  <div class="form-group">
										<label>No Surat Keluar</label>
										<input type="text" value="<?php echo $d['no_surat_keluar'] ?>" readonly class="form-control" name="no_surat_keluar" required="">
									</div>

                  <div class="form-group">
										<label>No Agenda Surat Keluar</label>
										<input type="text" value="<?php echo $d['no_agenda_surat_keluar'] ?>" readonly class="form-control" name="no_agenda_surat_keluar" required="">
									</div>

                  <div class="form-group">
                    <label>Tujuan Surat</label>
                    <input type="text" class="form-control" name="tujuan_surat" value="<?php echo $d['tujuan_surat'] ?>" placeholder="Tujuan Surat ..." required="">
                  </div>

                  <div class="form-group">
										<label>Nama Kategori</label>
										<select class="form-control" name="id_kategori" required>
                       <option value="<?php echo $d['id_kategori'] ?>"><?php echo $d['nama_kategori'] ?></option>
                       <?php
                          $q = mysqli_query($conn,"SELECT * from kategori");
                          while($r = mysqli_fetch_array($r)){
                       ?>
                          <option value="<?php echo $r['id'] ?>"><?php echo $r['nama_kategori'] ?></option>
                       <?php } ?>
                    </select>
									</div>

									<div class="form-group">
										<label>Tgl Surat Keluar</label>
										<input type="date" value="<?php echo $d['tgl_surat_keluar'] ?>" class="form-control" name="tgl_surat_keluar" required>
									</div>

                  <div class="form-group">
										<label>Tgl Kirim</label>
										<input type="date" value="<?php echo $d['tgl_kirim'] ?>" class="form-control" name="tgl_kirim" required>
									</div>

								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="card">
								<div class="card-body">

                  <div class="form-group">
										<label>Perihal</label>
										<textarea class="ckeditor" rows="5" name="perihal" id="ckeditor"><?php echo $d['perihal'] ?></textarea>
									</div>

                  <div class="form-group">
										<label>File Surat</label>
										<input type="file" class="form-control" name="file_surat" required="">
									</div>

								</div>
								<div class="card-action">
									<button type="submit" name="ubah" class="btn btn-success"><i class="fa fa-save"></i> Save Changes</button>
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
			if(isset($_POST['ubah']))
                {
                    $id                     = $_POST['id'];
                    $id_kategori            = $_POST['id_kategori'];
                    $no_surat_keluar        = $_POST['no_surat_keluar'];
                    $no_agenda_surat_keluar = $_POST['no_agenda_surat_keluar'];
                    $tgl_surat_keluar       = $_POST['tgl_surat_keluar'];
                    $tgl_kirim              = $_POST['tgl_kirim'];
                    $tujuan_surat           = $_POST['tujuan_surat'];
                    $perihal    	          = $_POST['perihal'];
                    $file_surat 		  	    = $_FILES['file_surat']['name'];
                    $file_tmp 	  	        = $_FILES['file_surat']['tmp_name'];

                    move_uploaded_file($file_tmp, '../assets/img/suratkeluar/' . $file_surat);

                    mysqli_query($conn,"UPDATE suratkeluar set id='$id', id_kategori='$id_kategori', no_surat_keluar='$no_surat_keluar',
                                 no_agenda_surat_keluar='$no_agenda_surat_keluar', tgl_surat_keluar='$tgl_surat_keluar', tgl_kirim='$tgl_kirim',
                                 tujuan_surat='$tujuan_surat', perihal='$perihal', file_surat='$file_surat' where id='$id'");
                    echo "
                          <script type='text/javascript'>
                              setTimeout(function () {
                                swal({
                                       title: 'Berhasil Mengubah Data',
                                       text:  'Berhasil Mengubah Data',
                                       type: 'success',
                                       icon: 'success',
                                       timer: 2000,
                                       showConfirmButton: true
                                    });
                                 },10);
                                   window.setTimeout(function(){
                                   window.location.replace('?view=suratkeluar');
                                 } ,2000);
                        </script>";
                }
		    ?>

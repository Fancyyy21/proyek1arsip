<?php
$query = mysqli_query($conn,"SELECT sm.*, k.nama_kategori from suratmasuk sm join kategori k on
                       k.id=sm.id_kategori and sm.id='$_GET[id]'");
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
								<a href="#">Surat Masuk</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Edit Data Surat Masuk</div>
								</div>
								<form method="POST" action="" enctype="multipart/form-data">
								<div class="card-body">
                  <input type="hidden" value="<?php echo $d['id'] ?>" name="id" required="">

                  <div class="form-group">
										<label>No Surat Masuk</label>
										<input type="text" value="<?php echo $d['no_surat_masuk'] ?>" readonly class="form-control" name="no_surat_masuk" required="">
									</div>

                  <div class="form-group">
										<label>No Agenda Surat Masuk</label>
										<input type="text" value="<?php echo $d['no_agenda_surat_masuk'] ?>" readonly class="form-control" name="no_agenda_surat_masuk" required="">
									</div>

                  <div class="form-group">
                    <label>Asal Surat</label>
                    <input type="text" class="form-control" name="asal_surat" value="<?php echo $d['asal_surat'] ?>" placeholder="Asal Surat ..." required="">
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
										<label>Tgl Surat Masuk</label>
										<input type="date" value="<?php echo $d['tgl_surat_masuk'] ?>" class="form-control" name="tgl_surat_masuk" required>
									</div>

                  <div class="form-group">
										<label>Tgl Terima</label>
										<input type="date" value="<?php echo $d['tgl_terima'] ?>" class="form-control" name="tgl_terima" required>
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
                    $id                    = $_POST['id'];
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

                    mysqli_query($conn,"UPDATE suratmasuk set id='$id', id_kategori='$id_kategori', no_surat_masuk='$no_surat_masuk',
                                 no_agenda_surat_masuk='$no_agenda_surat_masuk', tgl_surat_masuk='$tgl_surat_masuk', tgl_terima='$tgl_terima',
                                 asal_surat='$asal_surat', perihal='$perihal', file_surat='$file_surat' where id='$id'");
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
                                   window.location.replace('?view=suratmasuk');
                                 } ,2000);
                        </script>";
                }
		    ?>

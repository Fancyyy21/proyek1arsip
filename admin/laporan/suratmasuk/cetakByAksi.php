<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Cetak Surat</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../../assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../../../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../../../assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../../assets/css/azzara.min.css">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../../../assets/css/demo.css">
</head>
<body onload="window.print()">
	<div class="wrapper">

    <?php
    include '../../../koneksi.php';
    $query = mysqli_query($conn,"SELECT sm.*, k.nama_kategori, d.catatan from suratmasuk sm join kategori k on
                           k.id=sm.id_kategori left join disposisi d on sm.id=d.id_surat_masuk and sm.id='$_GET[id]'");
    $d = mysqli_fetch_array($query);
    ?>

              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                        <div class="row">
                          <div class="col-md-4">
                              <img src="../../../assets/img/logo.png" width="70" height="70">
                          </div>
                          <div class="col-md-4" style="padding-top:15px;">
                            <h4 class="text-center"><strong>KANG</strong></h4>
                            <h4 class="text-center"><strong>IT</strong></h4>
                          </div>
                          <div class="col-md-4"></div>
                        </div>
                        <hr/>
                        <h5 class="text-center"><strong>Surat Masuk</strong></h5>
                        <hr/>

                        <table class="table table-bordered">
                          <tr>
                              <td>No Surat Masuk</td>
                              <td><?php echo $d['no_surat_masuk'] ?></td>
                          </tr>
                          <tr>
                              <td>No Agenda Surat Masuk</td>
                              <td><?php echo $d['no_agenda_surat_masuk'] ?></td>
                          </tr>
                          <tr>
                              <td>Asal Surat</td>
                              <td><?php echo $d['asal_surat'] ?></td>
                          </tr>
                          <tr>
                              <td>Tgl Surat Masuk</td>
                              <td><?php echo date('d F Y', strtotime($d['tgl_surat_masuk'])) ?></td>
                          </tr>
                          <tr>
                              <td>Tgl Terima</td>
                              <td><?php echo date('d F Y', strtotime($d['tgl_terima'])) ?></td>
                          </tr>
                        </table>

                        <table class="table table-bordered">
                          <tr>
                            <th>Perihal</th>
                            <th>Isi Disposisi</th>
                            <th>File Surat</th>
                          </tr>

                          <tr>
                            <td><?php echo $d['perihal'] ?></td>
                            <td><?php echo $d['catatan'] ?></td>
                            <td><img src="../../../assets/img/suratmasuk/<?php echo $d['file_surat'] ?>" width="100" height="100"></td>
                          </tr>
                        </table>
                    </div>
                  </div>
                </div>
              </div>

	</div>


	<!--   Core JS Files   -->
	<script src="../../../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../../../assets/js/core/popper.min.js"></script>
	<script src="../../../assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="../../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<!-- Bootstrap Toggle -->
	<script src="../../../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
	<!-- jQuery Scrollbar -->
	<script src="../../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Datatables -->
	<script src="../../../assets/js/plugin/datatables/datatables.min.js"></script>
	<!-- Azzara JS -->
	<script src="../../../assets/js/ready.min.js"></script>
	<!-- Azzara DEMO methods, don't include it in your project! -->
	<script src="../../../assets/js/setting-demo.js"></script>

	<script src="../../../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script src="../../../assets/js/plugin/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript" src="../../../assets/ckeditor/ckeditor.js"></script>

	<script >
		$(document).ready(function() {
			$('#add-row').DataTable({
			});

		});
	</script>

</body>
</html>

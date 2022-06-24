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

              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                        <center><h4><b>Laporan Surat Masuk</b></h4></center>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
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
                                include '../../../koneksi.php';
                                if(isset($_POST['cetak'])){
                                    $kategori    = $_POST['kategori'];

                                    $q = mysqli_query($conn,"SELECT sm.*, k.nama_kategori, d.catatan from suratmasuk sm join kategori k
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
                          <?php } ?>
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

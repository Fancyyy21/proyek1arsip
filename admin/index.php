<?php
session_start();
include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Arsip Surat</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/azzara.min.css">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="purple">
			<!-- Logo Header -->
			<div class="logo-header">

				<a href="#" class="logo">
					<h2 style="color:white;padding-top:17px;">Arsip Surat</h2>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">

				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>

						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="../assets/img/default.png" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
						</li>
						<font color="white"><?php echo $_SESSION['username'] ?></font>

					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
		<!-- Sidebar -->
		<div class="sidebar" style="background-color: #293846;">

			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user" style="color: white;">
						<div class="avatar-sm float-left mr-2">
							<img src="../assets/img/logo.png" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#" aria-expanded="true">
								<span style="color: white;">
									Kang
									<span class="user-level" style="color: white;">IT</span>
								</span>
							</a>
							<div class="clearfix"></div>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item">
							<a href="?view=dashboard">
								<i style="color: white;" class="fas fa-home"></i>
								<p style="color: white;">Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section" style="color: white;">Components</h4>
						</li>


						<?php if($_SESSION['level'] == 'admin') { ?>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i style="color: white;" class="fas fa-layer-group"></i>
								<p style="color: white;">Data Master</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="?view=user">
											<span class="sub-item" style="color: white;">User</span>
										</a>
									</li>
									<li>
										<a href="?view=kategori">
											<span class="sub-item" style="color: white;">Kategori</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
					<?php } ?>



						<?php if($_SESSION['level'] == 'admin' OR $_SESSION['level'] == 'pimpinan') {?>
						<li class="nav-item">
							<a data-toggle="collapse" href="#surat">
								<i style="color: white;" class="fas fa-desktop"></i>
								<p style="color: white;">Tata Persuratan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="surat">
								<ul class="nav nav-collapse">
									<li>
										<a href="?view=suratmasuk">
											<span class="sub-item" style="color: white;">Surat Masuk</span>
										</a>
									</li>
									<li>
										<a href="?view=suratkeluar">
											<span class="sub-item" style="color: white;">Surat Keluar</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
					<?php } ?>




					<?php if($_SESSION['level'] == 'admin') { ?>
						<li class="nav-item">
							<a data-toggle="collapse" href="#laporan">
								<i style="color: white;" class="fas fa-file"></i>
								<p style="color: white;">Laporan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="laporan">
								<ul class="nav nav-collapse">
									<li>
										<a href="?view=lap_suratmasuk">
											<span class="sub-item" style="color: white;">Surat Masuk</span>
										</a>
									</li>
									<li>
										<a href="?view=lap_suratkeluar">
											<span class="sub-item" style="color: white;">Surat Keluar</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
					<?php } ?>

						<li class="nav-item">
							<a href="#modalLogout" data-toggle="modal">
								<i style="color: white;" class="fas fa-lock"></i>
								<p style="color: white;">Logout</p>
							</a>
						</li>

					</ul>
				</div>
			</div>
		</div>

							<?php
										// Dashboard
                    if($_GET['view']=='')
                        include 'dashboard.php';
                    elseif($_GET['view']=='dashboard')
                        include 'dashboard.php';

                    // Data Master
                    elseif($_GET['view']=='user')
                        include 'master/user.php';
										elseif($_GET['view']=='kategori')
		                    include 'master/kategori.php';

										// Data Transaksi (Surat Masuk)
		                elseif($_GET['view']=='suratmasuk')
		                    include 'transaksi/suratmasuk/suratmasuk.php';
									  elseif($_GET['view']=='addSuratMasuk')
				                include 'transaksi/suratmasuk/add.php';
									  elseif($_GET['view']=='editSuratMasuk')
						            include 'transaksi/suratmasuk/edit.php';
									  elseif($_GET['view']=='detailSuratMasuk')
								        include 'transaksi/suratmasuk/detail.php';
										elseif($_GET['view']=='disposisi')
								            include 'transaksi/suratmasuk/disposisi.php';

										// Data Transaksi (Surat Keluar)
				            elseif($_GET['view']=='suratkeluar')
				                include 'transaksi/suratkeluar/suratkeluar.php';
										elseif($_GET['view']=='addSuratKeluar')
						            include 'transaksi/suratkeluar/add.php';
										elseif($_GET['view']=='editSuratKeluar')
								        include 'transaksi/suratkeluar/edit.php';
									  elseif($_GET['view']=='detailSuratKeluar')
														include 'transaksi/suratkeluar/detail.php';

										// Data Laporan
								    elseif($_GET['view']=='lap_suratmasuk')
								         include 'laporan/suratmasuk/lap_suratmasuk.php';
										elseif($_GET['view']=='lap_suratkeluar')
										     include 'laporan/suratkeluar/lap_suratkeluar.php';

						?>


	</div>

	<div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header no-bd">
	        <h5 class="modal-title">
	          <span class="fw-mediumbold">
	          Logout</span>
	          <span class="fw-light">
	            Sistem
	          </span>
	        </h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form method="POST" enctype="multipart/form-data" action="../logout.php">
	      <div class="modal-body">
	         <div class="form-group">
	            <h4>Apakah Anda Ingin Keluar Dari Sistem ?</h4>
	         </div>

	      </div>
	      <div class="modal-footer no-bd">
	        <button type="submit" name="hapus" class="btn btn-danger"><i class="fa fa-lock"></i> Logout</button>
	        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
	      </div>
	      </form>
	    </div>
	  </div>
	</div>

	<!--   Core JS Files   -->
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<!-- Bootstrap Toggle -->
	<script src="../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>
	<!-- Azzara JS -->
	<script src="../assets/js/ready.min.js"></script>
	<!-- Azzara DEMO methods, don't include it in your project! -->
	<script src="../assets/js/setting-demo.js"></script>

	<script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript" src="../assets/ckeditor/ckeditor.js"></script>

	<script >
		$(document).ready(function() {
			$('#add-row').DataTable({
			});

		});
	</script>

</body>
</html>

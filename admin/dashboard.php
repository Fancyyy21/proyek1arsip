<?php
	$q = mysqli_query($conn,"SELECT count(*) as totaluser from user");
	$d = mysqli_fetch_array($q)
?>

<?php
	$r = mysqli_query($conn,"SELECT count(*) as totalsuratmasuk from suratmasuk");
	$c = mysqli_fetch_array($r)
?>

<?php
	$p = mysqli_query($conn,"SELECT count(*) as totalsuratkeluar from suratkeluar");
	$k = mysqli_fetch_array($p)
?>

<?php
	$y = mysqli_query($conn,"SELECT count(*) as totaldisposisi from disposisi");
	$m = mysqli_fetch_array($y)
?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							<h1><center><b>Selamat Datang, <?php echo $_SESSION['level'] ?></b></center></h1>
						</div>
						<br/><br/><br/><br/><br/>
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-primary card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fa fa-users"></i>
											</div>
										</div>
										<div class="col col-stats">
											<div class="numbers">
												<p class="card-category">Bagian</p>
												<h4 class="card-title"><?php echo $d['totaluser'] ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-secondary card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fa fa-book"></i>
											</div>
										</div>
										<div class="col col-stats">
											<div class="numbers">
												<p class="card-category">Surat Masuk</p>
												<h4 class="card-title"><?php echo $c['totalsuratmasuk'] ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-success card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="fas fa-paper-plane"></i>
											</div>
										</div>
										<div class="col col-stats">
											<div class="numbers">
												<p class="card-category">Surat Keluar</p>
												<h4 class="card-title"><?php echo $k['totalsuratkeluar'] ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						</div>
					</div>
				</div>
			</div>
		</div>

<?php
$query = mysqli_query($conn,"SELECT sk.*, k.nama_kategori from suratkeluar sk join kategori k on
                       k.id=sk.id_kategori and sk.id='$_GET[id]'");
$d = mysqli_fetch_array($query);
?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Detail</h4>
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
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Detail Data Surat Keluar</div>
								</div>
								<div class="card-body">
                    <div class="row">
                      <div class="col-md-4">
                          <img src="../assets/img/logo.png" width="70" height="70">
                      </div>
                      <div class="col-md-4" style="padding-top:15px;">
                        <h4 class="text-center"><strong>KANG</strong></h4>
                        <h4 class="text-center"><strong>IT</strong></h4>
                      </div>
                      <div class="col-md-4"></div>
                    </div>
                    <hr/>
                    <h5 class="text-center"><strong>Surat Keluar</strong></h5>
                    <hr/>

                    <table class="table table-bordered">
                      <tr>
                          <td>No Surat Keluar</td>
                          <td><?php echo $d['no_surat_keluar'] ?></td>
                      </tr>
                      <tr>
                          <td>No Agenda Surat Keluar</td>
                          <td><?php echo $d['no_agenda_surat_keluar'] ?></td>
                      </tr>
                      <tr>
                          <td>Tujuan Surat</td>
                          <td><?php echo $d['tujuan_surat'] ?></td>
                      </tr>
                      <tr>
                          <td>Tgl Surat Keluar</td>
                          <td><?php echo date('d F Y', strtotime($d['tgl_surat_keluar'])) ?></td>
                      </tr>
                      <tr>
                          <td>Tgl Kirim</td>
                          <td><?php echo date('d F Y', strtotime($d['tgl_kirim'])) ?></td>
                      </tr>
                    </table>

                    <table class="table table-bordered">
                      <tr>
                        <th>Perihal</th>
                        <th>File Surat</th>
                      </tr>

                      <tr>
                        <td><?php echo $d['perihal'] ?></td>
                        <td><img src="../assets/img/suratkeluar/<?php echo $d['file_surat'] ?>" width="150" height="150"></td>
                      </tr>
                    </table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

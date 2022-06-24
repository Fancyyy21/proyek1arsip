<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Laporan Surat Keluar</h4>
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
            <a href="#">Laporan</a>
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
              <div class="d-flex align-items-center">
                <h4 class="card-title">Laporan Surat Keluar</h4>
                <button data-toggle="modal" data-target="#modalCetakAll" class="btn btn-primary btn-round ml-auto">
                  <i class="fa fa-print"></i>
                  Cetak Data
                </button>
                <button data-toggle="modal" data-target="#modalCetakExcel" class="btn btn-success btn-round">
                  <i class="fa fa-print"></i>
                  Cetak By Excel
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover" >
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No Srt Klr</th>
                      <th>No Agenda Srt Klr</th>
                      <th>Tujuan Surat</th>
                      <th>Kategori Surat</th>
                      <th>Tgl Srt Klr</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                      $no = 1;
                      $query = mysqli_query($conn,"SELECT sk.*, k.nama_kategori from suratkeluar sk join kategori k on
                                             k.id=sk.id_kategori");
                      while($row = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['no_surat_keluar'] ?></td>
                      <td><?php echo $row['no_agenda_surat_keluar'] ?></td>
                      <td><?php echo $row['tujuan_surat'] ?></td>
                      <td><?php echo $row['nama_kategori'] ?></td>
                      <td><?php echo date('d F Y', strtotime($row['tgl_surat_keluar'])) ?></td>
                      <td>
                        <a href="laporan/suratkeluar/cetakByAksi.php?id=<?php echo $row['id'] ?>" target="_blank" class="btn btn-xs btn-primary"><i class="fa fa-print"></i> Print</a>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="modal fade" id="modalCetakAll" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header no-bd">
        <h5 class="modal-title">
          <span class="fw-mediumbold">
          Cetak</span>
          <span class="fw-light">
            Surat Keluar
          </span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" target="_blank" enctype="multipart/form-data" action="laporan/suratmasuk/cetakAllKategori.php">
      <div class="modal-body">
          <div class="form-group">
            <h4>Cetak Seluruh Data Surat Keluar</h4>
            <a href="laporan/suratmasuk/cetakAll.php" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak All</a>
          </div>

          <hr/>
          <h4>Cetak By Kategori</h4><br/><br/>
          <div>
            <label>Pilih Kategori Surat</label>
            <select class="form-control" name="kategori" required>
              <option value="" hidden>-- Pilih Kategori Surat --</option>
              <?php
                $t = mysqli_query($conn,"SELECT * from kategori");
                while($d = mysqli_fetch_array($t)) {
              ?>

              <option value="<?php echo $d['id'] ?>"><?php echo $d['nama_kategori'] ?></option>

              <?php } ?>
            </select>
          </div>

      </div>
      <div class="modal-footer no-bd">
        <button type="submit" name="cetak" class="btn btn-primary"><i class="fa fa-print"></i> Cetak By Kategori</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalCetakExcel" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header no-bd">
        <h5 class="modal-title">
          <span class="fw-mediumbold">
          Cetak</span>
          <span class="fw-light">
            Surat Keluar By Excel
          </span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" target="_blank" enctype="multipart/form-data" action="laporan/suratmasuk/cetakExcelKetegori.php">
      <div class="modal-body">
        <div class="form-group">
          <h4>Cetak Seluruh Data Surat Keluar Ke Excel</h4>
          <a href="laporan/suratmasuk/cetakExcel.php" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Excek All</a>
        </div>

        <hr/>
        <h4>Cetak By Kategori</h4><br/><br/>

          <div>
            <label>Pilih Kategori Surat</label>
            <select class="form-control" name="kategori" required>
              <option value="" hidden>-- Pilih Kategori Surat --</option>
              <?php
                $t = mysqli_query($conn,"SELECT * from kategori");
                while($d = mysqli_fetch_array($t)) {
              ?>

              <option value="<?php echo $d['id'] ?>"><?php echo $d['nama_kategori'] ?></option>

              <?php } ?>
            </select>
          </div>

      </div>
      <div class="modal-footer no-bd">
        <button type="submit" name="cetakExcel" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Excel By Kategori</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

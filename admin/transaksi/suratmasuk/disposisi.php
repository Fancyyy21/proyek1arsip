<?php
$query = mysqli_query($conn,"SELECT sm.*, k.nama_kategori from suratmasuk sm join kategori k on
                       k.id=sm.id_kategori and sm.id='$_GET[id]'");
$d = mysqli_fetch_array($query);
?>

<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Data Disposisi</h4>
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
            <a href="#">Disposisi</a>
          </li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="d-flex align-items-center">
                <h4 class="card-title">Data Disposisi</h4>
                <a href="#modalNewDisposisi<?php echo $d['id'] ?>" data-toggle="modal" class="btn btn-primary btn-round ml-auto">
                  <i class="fa fa-plus"></i>
                  Add Data
                </a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover" >
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No Surat Masuk</th>
                      <th>Tgl Disposisi</th>
                      <th>Catatan</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                      $no = 1;
                      $query = mysqli_query($conn,"SELECT d.*, sm.no_surat_masuk from disposisi d join suratmasuk sm on
                                             sm.id=d.id_surat_masuk and sm.id='$_GET[id]'");
                      while($row = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['no_surat_masuk'] ?></td>
                      <td><?php echo date('d F Y', strtotime($row['tgl_disposisi'])) ?></td>
                      <td><?php echo $row['catatan'] ?></td>
                      <td>
                        <a href="#modalEditDisposisi<?php echo $row['id'] ?>" data-toggle="modal" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>
                        <a href="#modalHapusDisposisi<?php echo $row['id'] ?>" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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


<div class="modal fade" id="modalNewDisposisi<?php echo $d['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header no-bd">
        <h5 class="modal-title">
          <span class="fw-mediumbold">
          New</span>
          <span class="fw-light">
            Disposisi
          </span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" enctype="multipart/form-data" action="">
      <div class="modal-body">
         <input name="id_surat_masuk" type="hidden" class="form-control" required value="<?php echo $d['id'] ?>">

         <div class="form-group">
            <label>No Surat Masuk</label>
            <input type="text" class="form-control" readonly required value="<?php echo $d['no_surat_masuk'] ?>">
         </div>

         <div class="form-group">
            <label>Tgl Disposisi</label>
            <input type="date" name="tgl_disposisi" class="form-control" required>
         </div>

         <div class="form-group">
            <label>Catatan Disposisi</label>
            <textarea class="ckeditor" name="catatan" rows="5" required id="ckeditor"></textarea>
         </div>

      </div>
      <div class="modal-footer no-bd">
        <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>


<?php
  $query = mysqli_query($conn,"SELECT d.*, sm.no_surat_masuk from disposisi d join suratmasuk sm on
                         sm.id=d.id_surat_masuk");
  while($row = mysqli_fetch_array($query)) {
?>

<div class="modal fade" id="modalEditDisposisi<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header no-bd">
        <h5 class="modal-title">
          <span class="fw-mediumbold">
          Edit</span>
          <span class="fw-light">
            Disposisi
          </span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" enctype="multipart/form-data" action="">
      <div class="modal-body">
         <input name="id_surat_masuk" type="hidden" class="form-control" required value="<?php echo $row['id_surat_masuk'] ?>">
         <input name="id" type="hidden" class="form-control" required value="<?php echo $row['id'] ?>">

         <div class="form-group">
            <label>No Surat Masuk</label>
            <input type="text" class="form-control" readonly required value="<?php echo $row['no_surat_masuk'] ?>">
         </div>

         <div class="form-group">
            <label>Tgl Disposisi</label>
            <input type="date" name="tgl_disposisi" class="form-control" value="<?php echo $row['tgl_disposisi'] ?>" required>
         </div>

         <div class="form-group">
            <label>Catatan Disposisi</label>
            <textarea class="ckeditor" name="catatan" rows="5" required id="ckeditor"><?php echo $row['catatan'] ?></textarea>
         </div>

      </div>
      <div class="modal-footer no-bd">
        <button type="submit" name="ubah" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php } ?>


<?php
  $query = mysqli_query($conn,"SELECT d.*, sm.no_surat_masuk from disposisi d join suratmasuk sm on
                         sm.id=d.id_surat_masuk");
  while($row = mysqli_fetch_array($query)) {
?>

<div class="modal fade" id="modalHapusDisposisi<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header no-bd">
        <h5 class="modal-title">
          <span class="fw-mediumbold">
          Hapus</span>
          <span class="fw-light">
            Disposisi
          </span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" enctype="multipart/form-data" action="">
      <div class="modal-body">
         <input name="id" type="hidden" class="form-control" required value="<?php echo $row['id'] ?>">

         <div class="form-group">
            <h4>Apakah Anda Ingin Menghapus Data Ini ?</h4>
         </div>

      </div>
      <div class="modal-footer no-bd">
        <button type="submit" name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php } ?>

<?php
            if(isset($_POST['simpan']))
                {
                    $id_surat_masuk = $_POST['id_surat_masuk'];
                    $tgl_disposisi  = $_POST['tgl_disposisi'];
                    $catatan        = $_POST['catatan'];

                    mysqli_query($conn,"INSERT into disposisi values ('','$id_surat_masuk','$tgl_disposisi','$catatan')");
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
                                 window.location.replace('?view=disposisi&id=$d[id]');
                                } ,2000);
                             </script>";
                }

                elseif(isset($_POST['ubah']))
                {
                    $id             = $_POST['id'];
                    $id_surat_masuk = $_POST['id_surat_masuk'];
                    $tgl_disposisi  = $_POST['tgl_disposisi'];
                    $catatan        = $_POST['catatan'];

                    mysqli_query($conn,"UPDATE disposisi set id='$id', id_surat_masuk='$id_surat_masuk',
                                  tgl_disposisi='$tgl_disposisi', catatan='$catatan' where id='$id'");
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
                                 window.location.replace('?view=disposisi&id=$d[id]');
                                } ,2000);
                             </script>";
                }

                elseif(isset($_POST['hapus']))
                {
                    $id = $_POST['id'];
                    mysqli_query($conn,"DELETE from disposisi where id='$id'");
                    echo "
                             <script type='text/javascript'>
                                setTimeout(function () {
                                       swal({
                                        title: 'Berhasil Menghapus Data',
                                        text:  'Berhasil Menghapus Data',
                                        type: 'success',
                                        icon: 'success',
                                        timer: 2000,
                                        showConfirmButton: true
                                       });
                                      },10);
                                 window.setTimeout(function(){
                                 window.location.replace('?view=disposisi&id=$d[id]');
                               } ,2000);
                             </script>";
                }

                ?>

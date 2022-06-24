<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Data Kategori</h4>
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
            <a href="#">Kategori</a>
          </li>
        </ul>
      </div>
      <div class="row">

        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="d-flex align-items-center">
                <h4 class="card-title">Data Kategori</h4>
                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalNewKategori">
                  <i class="fa fa-plus"></i>
                  Add Data
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover" >
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Kategori</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                      $no = 1;
                      $query = mysqli_query($conn,"SELECT * FROM kategori");
                      while($row = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['nama_kategori'] ?></td>
                      <td>
                        <a href="#modalEditKategori<?php echo $row['id'] ?>" data-toggle="modal" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>
                        <a href="#modalHapusKategori<?php echo $row['id'] ?>" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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


<div class="modal fade" id="modalNewKategori" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header no-bd">
        <h5 class="modal-title">
          <span class="fw-mediumbold">
          New</span>
          <span class="fw-light">
            Kategori
          </span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" enctype="multipart/form-data" action="">
      <div class="modal-body">

         <div class="form-group">
            <label>Nama Kategori</label>
            <input name="nama_kategori" type="text" class="form-control" required placeholder="Nama Kategori ...">
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
  $r = mysqli_query($conn,"SELECT * FROM kategori");
  while($d = mysqli_fetch_array($r)) {
?>

<div class="modal fade" id="modalEditKategori<?php echo $d['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header no-bd">
        <h5 class="modal-title">
          <span class="fw-mediumbold">
          Edit</span>
          <span class="fw-light">
            Kategori
          </span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" enctype="multipart/form-data" action="">
      <div class="modal-body">
         <input name="id" type="hidden" class="form-control" required value="<?php echo $d['id'] ?>">

         <div class="form-group">
            <label>Nama Kategori</label>
            <input name="nama_kategori" type="text" value="<?php echo $d['nama_kategori'] ?>" class="form-control" required placeholder="Nama Kategori ...">
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
  $q = mysqli_query($conn,"SELECT * FROM kategori");
  while($p = mysqli_fetch_array($q)) {
?>

<div class="modal fade" id="modalHapusKategori<?php echo $p['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header no-bd">
        <h5 class="modal-title">
          <span class="fw-mediumbold">
          Hapus</span>
          <span class="fw-light">
            Kategori
          </span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" enctype="multipart/form-data" action="">
      <div class="modal-body">
         <input name="id" type="hidden" class="form-control" required value="<?php echo $p['id'] ?>">

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
                    $nama_kategori = $_POST['nama_kategori'];

                    mysqli_query($conn,"INSERT into kategori values ('','$nama_kategori')");
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
                                 window.location.replace('?view=kategori');
                                } ,2000);
                             </script>";
                }

                elseif(isset($_POST['ubah']))
                {
                    $id            = $_POST['id'];
                    $nama_kategori = $_POST['nama_kategori'];

                    mysqli_query($conn,"UPDATE kategori set id='$id', nama_kategori='$nama_kategori' where id='$id'");
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
                                 window.location.replace('?view=kategori');
                                } ,2000);
                             </script>";
                }

                elseif(isset($_POST['hapus']))
                {
                    $id = $_POST['id'];
                    mysqli_query($conn,"DELETE from kategori where id='$id'");
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
                                 window.location.replace('?view=kategori');
                               } ,2000);
                             </script>";
                }

                ?>

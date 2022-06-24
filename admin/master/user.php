<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Data User</h4>
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
            <a href="#">User</a>
          </li>
        </ul>
      </div>
      <div class="row">

        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="d-flex align-items-center">
                <h4 class="card-title">Data User</h4>
                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalNewUser">
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
                      <th>Nama Lengkap</th>
                      <th>Username</th>
                      <th>Level</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                      $no = 1;
                      $query = mysqli_query($conn,"SELECT * FROM user");
                      while($row = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['nama_lengkap'] ?></td>
                      <td><?php echo $row['username'] ?></td>
                      <td><?php echo $row['level'] ?></td>
                      <td>
                        <a href="#modalEditUser<?php echo $row['id'] ?>" data-toggle="modal" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>
                        <a href="#modalHapusUser<?php echo $row['id'] ?>" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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


<div class="modal fade" id="modalNewUser" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header no-bd">
        <h5 class="modal-title">
          <span class="fw-mediumbold">
          New</span>
          <span class="fw-light">
            User
          </span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" enctype="multipart/form-data" action="">
      <div class="modal-body">

         <div class="form-group">
            <label>Nama Lengkap</label>
            <input name="nama_lengkap" type="text" class="form-control" required placeholder="Nama Lengkap ...">
         </div>

        <div class="form-group">
            <label>Username</label>
            <input name="username" type="text" maxlength="15" class="form-control" required placeholder="Username ...">
        </div>

        <div class="form-group">
          <label>Password</label>
          <input name="password" type="password" maxlength="15" class="form-control" required placeholder="Password ...">
        </div>

        <div class="form-group">
          <label>Level</label>
          <select class="form-control" name="level" required>
             <option value="" hidden>-- Pilih Level --</option>
             <option value="admin">Admin</option>
             <option value="pimpinan">Pimpinan</option>
          </select>
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
  $r = mysqli_query($conn,"SELECT * FROM user");
  while($d = mysqli_fetch_array($r)) {
?>

<div class="modal fade" id="modalEditUser<?php echo $d['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header no-bd">
        <h5 class="modal-title">
          <span class="fw-mediumbold">
          Edit</span>
          <span class="fw-light">
            User
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
            <label>Nama Lengkap</label>
            <input name="nama_lengkap" value="<?php echo $d['nama_lengkap'] ?>" type="text" class="form-control" required placeholder="Nama Lengkap ...">
         </div>

        <div class="form-group">
            <label>Username</label>
            <input name="username" value="<?php echo $d['username'] ?>"  type="text" maxlength="15" class="form-control" required placeholder="Username ...">
        </div>

        <div class="form-group">
          <label>Password</label>
          <input name="password"  type="password" maxlength="15" class="form-control" required placeholder="Password ...">
        </div>

        <div class="form-group">
          <label>Level</label>
          <select class="form-control" name="level" required>
             <option <?php if($d['level']=="admin") echo "selected"; ?> value="admin">Admin</option>
             <option <?php if($d['level']=="pimpinan") echo "selected"; ?> value="pimpinan">Pimpinan</option>
          </select>
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
  $q = mysqli_query($conn,"SELECT * FROM user");
  while($p = mysqli_fetch_array($q)) {
?>

<div class="modal fade" id="modalHapusUser<?php echo $p['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header no-bd">
        <h5 class="modal-title">
          <span class="fw-mediumbold">
          Hapus</span>
          <span class="fw-light">
            User
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
                    $nama_lengkap  = $_POST['nama_lengkap'];
                    $username      = $_POST['username'];
                    $password      = $_POST['password'];
                    $level         = $_POST['level'];

                    mysqli_query($conn,"INSERT into user values ('','$nama_lengkap','$username','$password','$level')");
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
                                 window.location.replace('?view=user');
                                } ,2000);
                             </script>";
                }

                elseif(isset($_POST['ubah']))
                {
                    $id            = $_POST['id'];
                    $nama_lengkap  = $_POST['nama_lengkap'];
                    $username      = $_POST['username'];
                    $password      = $_POST['password'];
                    $level         = $_POST['level'];

                    mysqli_query($conn,"UPDATE user set id='$id', nama_lengkap='$nama_lengkap', username='$username',
                                        password='$password', level='$level' where id='$id'");
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
                                 window.location.replace('?view=user');
                               } ,2000);
                             </script>";
                }

                elseif(isset($_POST['hapus']))
                {
                    $id = $_POST['id'];
                    mysqli_query($conn,"DELETE from user where id='$id'");
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
                                 window.location.replace('?view=user');
                               } ,2000);
                             </script>";
                }

                ?>

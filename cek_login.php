<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/ready.js"></script>
<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<?php
session_start();
error_reporting(0);
include"koneksi.php";

mysqli_real_escape_string($username=$_POST['username']);
mysqli_real_escape_string($password=$_POST['password']);

  $filter=mysqli_query($conn,"SELECT * from user where username='$username' and password='$password' ");
  $cek = mysqli_num_rows($filter);
  $data = mysqli_fetch_array($filter);

  if($cek>0){

    if($data['level']=='admin'){

    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = 'admin';
    $_SESSION['id'] = $data['id'];

    // header("location:admin/");
    echo "
                             <script type='text/javascript'>
                                setTimeout(function () {
                                       swal({
                                        title: 'Selamat Datang',
                                        text:  'Selamat Datang',
                                        type: 'success',
                                        icon: 'success',
                                        timer: 2000,
                                        showConfirmButton: true
                                       });
                                      },10);
                                 window.setTimeout(function(){
                                 window.location.replace('admin/');
                                } ,2000);
                             </script>";

  }
  if($data['level']=='pimpinan'){

  $_SESSION['username'] = $data['username'];
  $_SESSION['level'] = 'pimpinan';
  $_SESSION['id'] = $data['id'];

  // header("location:admin/");
  echo "
                             <script type='text/javascript'>
                                setTimeout(function () {
                                       swal({
                                        title: 'Selamat Datang',
                                        text:  'Selamat Datang',
                                        type: 'success',
                                        icon: 'success',
                                        timer: 2000,
                                        showConfirmButton: true
                                       });
                                      },10);
                                 window.setTimeout(function(){
                                 window.location.replace('admin/');
                                } ,2000);
                             </script>";

}
}else{
  // header("location:index.php?alert=gagal");
  echo "
                             <script type='text/javascript'>
                                setTimeout(function () {
                                       swal({
                                        title: 'Username Atau Password Salah',
                                        text:  'Username Atau Password Salah',
                                        type: 'error',
                                        icon: 'error',
                                        timer: 2000,
                                        showConfirmButton: true
                                       });
                                      },10);
                                 window.setTimeout(function(){
                                 window.location.replace('login.php');
                                } ,2000);
                             </script>";
}
?>

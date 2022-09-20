<?php
  session_start();
  error_reporting(0);
  include 'function/connect.php';
  
  date_default_timezone_set('Asia/Jakarta');

  if($_SESSION['hak_akses']=="2"){
    header("location:pegawai/index.php");
  }else if ($_SESSION['hak_akses']=="1") {
    header("Location:admin/index.php");
  }
?> 
<!DOCTYPE html>
<html>
<head>
  <title>Login | Aplikasi Penggajian</title>
  <link href="assets/css/login.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <script src="assets/js/a81368914c.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <div class="container">
    <div class="img">
      <img src="assets/img/login.svg">
    </div>
    <div class="login-content">
      <form class="user" method="POST" action="function/login_act.php">
        <img src="assets/img/avatar.svg">
        <h2 class="title"><font size="5">Gaji Karyawan</font></h2>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                    <h5>Username <div class="text-small text-danger"> </div></h5>
                    <input type="text" class="input" name="username">
                 </div>
              </div>
              <div class="input-div pass">
                 <div class="i"> 
                    <i class="fas fa-lock"></i>
                 </div>
                 <div class="div">
                    <h5>Password <div class="text-small text-danger"> </div></h5>
                    <input type="password" class="input" name="password">
                 </div>
              </div>
              <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>

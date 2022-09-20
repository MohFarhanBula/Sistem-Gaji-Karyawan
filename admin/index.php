<?php
  session_start();
  error_reporting(0);
  include '../function/connect.php';
  date_default_timezone_set('Asia/Jakarta');

  if($_SESSION['hak_akses']=="2"){
    header("location:../pegawai/index.php");
  }else if ($_SESSION['hak_akses']=="") {
    header("Location:../index.php");
  }

  $nik =  $_SESSION['nik'];

  $query = mysqli_query($koneksi, "SELECT * FROM data_pegawai WHERE nik = '$nik' ");
  while ($data = mysqli_fetch_array($query)) {
    $nama_pegawai = $data['nama_pegawai'];
    $gambar = $data['photo'];
        $jabatan = $data['jabatan'];
    $tanggal_masuk = $data['tanggal_masuk'];
    $status = $data['status'];
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard | Gaji Karyawan</title>

  <!-- Custom fonts for this template-->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">Gaji Karyawan</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="?page=dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-fw fa-database"></i>
          <span>Master Data</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="?page=pegawai">Data Pegawai</a>
            <a class="collapse-item" href="?page=jabatan">Data Jabatan</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-money-check-alt"></i>
          <span>Transaksi</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="?page=pembagian_gaji">Pembagian Gaji</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-copy"></i>
          <span>Laporan</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="?page=laporan_gaji">Laporan Gaji</a>
            <a class="collapse-item" href="?page=slip_gaji">Slip Gaji</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="?page=ganti_password">
          <i class="fas fa-fw fa-lock"></i>
          <span>Ubah Password</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="../function/logout.php">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <h4 class="font-weight-bold">PT. Hadar</h4>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Selamat Datang <?php echo $nama_pegawai; ?></span>
                <img class="img-profile rounded-circle" src="gambar/<?php echo $gambar; ?>">
              </a>
              
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <?php

          //Pegawai
          if ($_GET['page'] == "pegawai") {
            include 'pegawai/pegawai.php';
          }else if ($_GET['page'] == "tambah_pegawai") {
            include 'pegawai/tambah_pegawai.php';
          }else if ($_GET['page'] == "tambah_pegawai_act") {
            include 'pegawai/aksi/tambah_pegawai_act.php';
          }else if ($_GET['page'] == "hapus_pegawai_act") {
            include 'pegawai/aksi/hapus_pegawai_act.php';
          }else if ($_GET['page'] == "edit_pegawai") {
            include 'pegawai/edit_pegawai.php';
          }else if ($_GET['page'] == "edit_pegawai_act") {
            include 'pegawai/aksi/edit_pegawai_act.php';
          }

          //jabatan
          else if ($_GET['page'] == "jabatan") {
            include 'jabatan/jabatan.php';
          }else if ($_GET['page'] == "hapus_jabatan_act") {
            include 'jabatan/aksi/hapus_jabatan_act.php';
          }else if ($_GET['page'] == "tambah_jabatan") {
            include 'jabatan/tambah_jabatan.php';
          }else if ($_GET['page'] == "tambah_jabatan_act") {
            include 'jabatan/aksi/tambah_jabatan_act.php';
          }else if ($_GET['page'] == "edit_jabatan") {
            include 'jabatan/edit_jabatan.php';
          }else if ($_GET['page'] == "edit_jabatan_act") {
            include 'jabatan/aksi/edit_jabatan_act.php';
          }

          //pembagian Gaji
          else if ($_GET['page'] == "pembagian_gaji") {
            include 'pembagian_gaji/pembagian_gaji.php';
          }else if ($_GET['page'] == "berikan_gaji") {
            include 'pembagian_gaji/berikan_gaji.php';
          }else if ($_GET['page'] == "berikan_gaji_act") {
            include 'pembagian_gaji/aksi/berikan_gaji_act.php';
          }

          //laporan_gaji
          else if ($_GET['page'] == "laporan_gaji") {
            include 'laporan_gaji/laporan_gaji.php';
          }else if ($_GET['page'] == "slip_gaji") {
            include 'laporan_gaji/slip_gaji.php';
          }


          //Ganti Password
          else if ($_GET['page'] == "ganti_password") {
            include 'ganti_password.php';
          }

          else{
            include 'dashboard/dashboard.php';
          }



        ?>
        </div>

        <!-- Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Gaji Karyawan | PT. HADAR 2022</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->

<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../assets/js/sb-admin-2.min.js"></script>
<script src="../assets/vendor/chart.js/Chart.min.js"></script>
<script src="../assets/js/Chart.js"></script>
<script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../assets/js/demo/datatables-demo.js"></script>
<link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</body>

</html>
<?php
  $query = mysqli_query($koneksi, "SELECT * FROM data_pegawai WHERE status = 'Karyawan Tetap' ");
  $aa = mysqli_query($koneksi, "SELECT * FROM data_pegawai WHERE status = 'Karyawan Tidak Tetap' ");
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

            <div id="date"></div>
              <script>
                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                var date = new Date();
                var day = date.getDate();
                var month = date.getMonth();
                var year = date.getFullYear()
                 
                document.getElementById("date").innerHTML =" " + day + " " + months[month] + " " + year;
              </script>
            </div>

          <!-- Content Row -->
          <div class="row">
               
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Pegawai</div>
                      <?php
                        $dp = mysqli_query($koneksi, "SELECT * FROM data_pegawai WHERE hak_akses = '2' ");
                        $hitungPegawai = mysqli_num_rows($dp);
                        
                        ?>

                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $hitungPegawai?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Admin</div>
                      <?php
                        $ha = mysqli_query($koneksi, "SELECT * FROM data_pegawai WHERE hak_akses = '1' ");
                        $hitungAdmin = mysqli_num_rows($ha);
                        
                        ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $hitungAdmin?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Jabatan</div>
                      <?php
                        $dj = mysqli_query($koneksi, "SELECT * FROM data_jabatan");
                        $hitungJabatan = mysqli_num_rows($dj);
                        
                        ?>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $hitungJabatan?></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Data Pembagian Gaji</div>
                      <?php
                        $gj = mysqli_query($koneksi, "SELECT * FROM pembagian_gaji WHERE status = '1' ");
                        $hitungTotal = mysqli_num_rows($gj);
                        
                        ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $hitungTotal?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="alert alert-success font-weight-bold mb-4" style="width: 100%">Selamat datang <?php echo $nama_pegawai; ?>, Anda login sebagai Admin</div>
          <div class="row">

            <div class="card-body">
              <div class="row">
                <div>
                  <img style="width: 250px" src="../admin/gambar/<?php echo $gambar; ?>">
                </div>
                <div>
                  <table class="table">
                    <tr>
                      <td>Nama Pegawai</td>
                      <td>:</td>
                      <td><?php echo $nama_pegawai;?></td>
                    </tr>

                    <tr>
                      <td>Jabatan</td>
                      <td>:</td>
                      <td><?php echo $jabatan?></td>
                    </tr>

                    <tr>
                      <td>Tanggal Masuk</td>
                      <td>:</td>
                      <td><?php echo $tanggal_masuk?></td>
                    </tr>

                    <tr>
                      <td>Status</td>
                      <td>:</td>
                      <td><?php echo $status?></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
        </div>
        <!-- /.container-fluid -->

      </div>

      <!-- End of Main Content -->

<?php
 

  if (isset($_POST['submit'])) {
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];


    if (!empty($bulan) && !empty($tahun)) {
      $q = mysqli_query($koneksi, "SELECT * FROM pembagian_gaji WHERE MONTH(tanggal_gajian)='$bulan' and YEAR(tanggal_gajian)='$tahun' ");
    }else{
       $b = date('Y');
        $m = date('m');
      $q = mysqli_query($koneksi, "SELECT * FROM pembagian_gaji WHERE YEAR(tanggal_gajian) = '$b' AND MONTH(tanggal_gajian) = '$m'");
    }
  }else{
   
  $b = date('Y');
  $m = date('m');
    
    $q = mysqli_query($koneksi, "SELECT * FROM pembagian_gaji WHERE YEAR(tanggal_gajian) = '$b' AND MONTH(tanggal_gajian) = '$m' ");
  }

  $s = mysqli_num_rows($q);
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pembagian Gaji</h1>
  </div>
</div>

<div class="container-fluid">
   <div class="card mb-3">
  <div class="card-header bg-primary text-white">
    Filter Gajian Per Bulan
  </div>
  <div class="card-body">
    <form class="form-inline" action="?page=pembagian_gaji" method="POST">
    <div class="form-group mb-2">
      <label for="staticEmail2">Bulan</label>
      <select class="form-control ml-3" name="bulan" required="">
        <option value=""> Pilih Bulan </option>
        <option value="01">Januari</option>
        <option value="02">Februari</option>
        <option value="03">Maret</option>
        <option value="04">April</option>
        <option value="05">Mei</option>
        <option value="06">Juni</option>
        <option value="07">Juli</option>
        <option value="08">Agustus</option>
        <option value="09">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
      </select>
    </div>
    <div class="form-group mb-2 ml-5">
      <label for="staticEmail2">Tahun</label>
      <select class="form-control ml-3" name="tahun" required="">
        <option value=""> Pilih Tahun </option>
        <?php $tahun = date('Y');
        for($i=date('Y');$i<$tahun+6;$i++) { ?>
        <option value="<?php echo $i ?>"><?php echo $i ?></option>
    <?php }?>
    </select>
      </select>
    </div>
    
    <button type="submit" name="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
  </form>
  </div>
</div>


  <div class="card shadow mb-4">
   <div class="card-body">
     <div class="table-responsive">
       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead class="thead-dark">
           <tr>
              <th class="text-center">No</th>
              <th class="text-center">Nama Karyawan</th>
              <th class="text-center">Jabatan</th>
              <th class="text-center">Tanggal Gajian</th>
              <th class="text-center">Status</th>
              <th class="text-center">Action</th>
           </tr>
         </thead>
         <?php
         	$no = 1;
         	while ($data = mysqli_fetch_array($q)) {
         		?>
		         <tbody>
		            <tr>
		              <td class="text-center"><?php echo $no++; ?></td>
		              <td class="text-center"><?php echo $data['nama_karyawan']; ?></td>
                  <td class="text-center"><?php echo $data['jabatan']; ?></td>
                  <td>
                    <?php echo $data['tanggal_gajian']; ?>
                  </td>
                  <?php
                    if ($data['status'] == "1") {
                      ?>
                        <td class="text-center">Lunas</td>
                      <?php
                    }else if ($data['status'] == "0"){
                      ?>
                        <td class="text-center" style="color: red;">Belum Lunas</td>
                      <?php
                    }
                  ?>
                  

		              <td>
                    <?php
                      if ($data['status'] == "0") {
                        ?>
                          <center>
                            <a class="btn btn-sm btn-info" href="?page=berikan_gaji&id=<?php echo $data['id']; ?>"> Bagikan Gaji <i class="fas fa-plus"></i></a>
                          </center>
                        <?php
                      }else if ($data['status'] == "1"){
                        ?>
                        <center>
                          <a class="btn btn-sm btn-danger" href="cetak_gaji.php?id=<?php echo $data['id']; ?>" target="_blank"> Cetak <i class="fas fa-print"></i></a>
                        </center>
                        <?php
                      }
                    ?>
		                
		              </td>
		            </tr>

		         </tbody>

         		<?php
         	}
         ?>
       </table>
     </div>
   </div>
  </div>
</div>
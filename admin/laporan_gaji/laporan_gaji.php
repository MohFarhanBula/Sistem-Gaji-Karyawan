<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan Gaji</h1>
  </div>
</div>

<div class="container-fluid">
   <div class="card mb-3">
  <div class="card-header bg-primary text-white">
    Filter Laporan Gaji Pegawai
  </div>
  <div class="card-body">
    <form class="form-inline" action="?page=laporan_gaji" method="POST">
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
    
    <button type="submit" name="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-search"></i> Cari Laporan Gaji</button>
  </form>
  </div>
</div>



<?php

  if (isset($_POST['submit'])) {
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];

  ?>
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
              <th class="text-center">Tanggal Dibayarkan</th>
              <th class="text-center">Gaji Pokok</th>
              <th class="text-center">Uang Transport</th>
              <th class="text-center">Uang Makan</th>
              <th class="text-center">Total</th>

           </tr>
         </thead>
         <?php
          $no = 1;

          $q = mysqli_query($koneksi, "SELECT * FROM pembagian_gaji WHERE YEAR(tanggal_gajian) = '$tahun' AND MONTH(tanggal_gajian) = '$bulan' AND status = '1' ");
          while ($data = mysqli_fetch_array($q)) {

            ?>
             <tbody>
                <tr>
                  <td class="text-center"><?php echo $no++; ?></td>
                  <td class="text-center"><?php echo $data['nama_karyawan']; ?></td>
                  <td class="text-center"><?php echo $data['jabatan']; ?></td>
                  <td class="text-center"><?php echo $data['tanggal_gajian']; ?></td>
                  <?php 
                  if ($data['status'] == "1"){
                    ?>
                      <td class="text-center">Lunas</td> 
                    <?php
                  }else if($data['status'] == "0"){
                    ?>
                      <td class="text-center">Belum Dibayarkan</td> 
                    <?php
                  }
                  ?>
                  
                  <td class="text-center"><?php echo $data['tanggal_dibayarkan']; ?></td>
                  <td class="text-center"><?php echo number_format($data['gaji_pokok'],0,',','.'); ?></td>
                  <td class="text-center"><?php echo number_format($data['uang_transport'],0,',','.'); ?></td>
                  <td class="text-center"><?php echo number_format($data['uang_makan'],0,',','.'); ?></td></td>
                  <td class="text-center"><?php echo number_format($data['total'],0,',','.'); ?></td>

      
                </tr>

             </tbody>

         
            <?php
          }
         ?>
         <a href="cetak_laporan_gaji.php?bulan=<?php echo $bulan; ?>&tahun=<?php echo $tahun; ?>" target="_blank" class="btn btn-danger" style="width: 100%">Cetak Data <i class="fas fa-print"></i></a>
         <br> 
         <br> 
       </table>
       
     </div>
   </div>
  </div>
</div>
  <?php
  }

?>

 
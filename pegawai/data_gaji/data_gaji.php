<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Gaji</h1>
  </div>
</div>

<div class="container-fluid">
   <div class="card shadow mb-4">
   <div class="card-body">
     <div class="table-responsive">
       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead class="thead-dark">
           <tr>
              <th class="text-center">No</th>
              <th class="text-center">Tanggal Gajian</th>
              <th class="text-center">Gaji Pokok</th>
              <th class="text-center">Uang Transport</th>
              <th class="text-center">Uang Makan</th>
              <th class="text-center">Total</th>
              <th class="text-center">Tanggal Di Bayarkan</th>
              <th class="text-center">Action</th>
           </tr>
         </thead>
         <?php
          $no = 1;
          $q = mysqli_query($koneksi, "SELECT * FROM pembagian_gaji WHERE nik = '$nik' AND status = '1' ");
          while ($data = mysqli_fetch_array($q)) {

            ?>
             <tbody>
                <tr>
                  <td class="text-center"><?php echo $no++; ?></td>
                  <td class="text-center"><?php echo $data['tanggal_gajian']; ?></td>
                  
                  <td class="text-center"><?php echo number_format($data['gaji_pokok'],0,',','.'); ?></td>
                  <td class="text-center"><?php echo number_format($data['uang_transport'],0,',','.'); ?></td>
                  <td class="text-center"><?php echo number_format($data['uang_makan'],0,',','.'); ?></td></td>
                  <td class="text-center"><?php echo number_format($data['total'],0,',','.'); ?></td>
                  <td class="text-center"><?php echo $data['tanggal_dibayarkan']; ?></td>
                  <td>
                    <a href="cetak_gaji.php?id=<?php echo $data['id']; ?>" target="_blank" class="btn btn-primary">Cetak <i class="fas fa-print"></i></a>
                  </td>
                </tr>

             </tbody>

         
            <?php
          }
         ?>
 
         <br> 
       </table>
       
     </div>
   </div>
  </div>
</div>
 
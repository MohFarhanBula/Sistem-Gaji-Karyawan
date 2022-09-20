
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Jabatan</h1>
  </div>
  <a class="btn btn-sm btn-success mb-3" href="?page=tambah_jabatan"><i class="fas fa-plus"></i> Tambah Jabatan</a>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
   <div class="card-body">
     <div class="table-responsive">
       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead class="thead-dark">
           <tr>
              <th class="text-center">No</th>
              <th class="text-center">Nama Jabatan</th>
              <th class="text-center">Gaji Pokok</th>
              <th class="text-center">Tunjangan Transport</th>
              <th class="text-center">Uang Makan</th>
              <th class="text-center">Total</th>
              <th class="text-center">Actions</th>
           </tr>
         </thead>
          <?php
         	$query = mysqli_query($koneksi, "SELECT * FROM data_jabatan");
         	$no = 1;
         	while ($data = mysqli_fetch_array($query)) {
         		$gaji_pokok = $data['gaji_pokok'];
         		$uang_transport = $data['tj_transport'];
         		$uang_makan = $data['uang_makan'];

         		$hasil_perhitungan = $gaji_pokok + $uang_transport + $uang_makan;
         		?>
         <tbody>
            <tr>
              <td class="text-center"><?php echo $no++; ?></td>
              <td class="text-center"><?php echo $data['nama_jabatan']; ?></td>
              <td class="text-center">Rp. <?php echo number_format($data['gaji_pokok'],0,',','.'); ?></td>
              <td class="text-center">Rp. <?php echo number_format($data['tj_transport'],0,',','.'); ?></td>
              <td class="text-center">Rp. <?php echo number_format($data['uang_makan'],0,',','.'); ?></td>
              <td class="text-center">Rp. <?php echo number_format($hasil_perhitungan ,0,',','.' ); ?></td>
              
              <td>
                <center>
                  <a class="btn btn-sm btn-info" href="?page=edit_jabatan&id=<?php echo $data['id_jabatan']; ?>"><i class="fas fa-edit"></i></a>
                  <a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" href="?page=hapus_jabatan_act&id=<?php echo $data['id_jabatan']; ?>"><i class="fas fa-trash"></i></a>
                </center>
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
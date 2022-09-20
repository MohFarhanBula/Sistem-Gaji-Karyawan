<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pegawai</h1>
  </div>
  <a class="btn btn-sm btn-success mb-3" href="?page=tambah_pegawai"><i class="fas fa-plus"></i> Tambah Pegawai</a>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
   <div class="card-body">
     <div class="table-responsive">
       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead class="thead-dark">
           <tr>
              <th class="text-center">No</th>
              <th class="text-center">NIK</th>
              <th class="text-center">Nama Pegawai</th>
              <th class="text-center">Jenis Kelamin</th>
              <th class="text-center">Jabatan</th>
              <th class="text-center">Tanggal Masuk</th>
              <th class="text-center">Status</th>
              <th class="text-center">Hak Akses</th>
              <th class="text-center">Photo</th>
              <th class="text-center">Actions</th>
           </tr>
         </thead>
         <?php
         	$query = mysqli_query($koneksi, "SELECT * FROM data_pegawai");
         	$no = 1;
         	while ($data = mysqli_fetch_array($query)) {
         		?>
		         <tbody>
		            <tr>
		              <td class="text-center"><?php echo $no++; ?></td>
		              <td class="text-center"><?php echo $data['nik']; ?></td>
		              <td class="text-center"><?php echo $data['nama_pegawai']; ?></td>
		              <td class="text-center"><?php echo $data['jenis_kelamin']; ?></td>
		              <td class="text-center"><?php echo $data['jabatan']; ?></td>
		              <td class="text-center"><?php echo $data['tanggal_masuk']; ?></td>
		              <td class="text-center"><?php echo $data['status']; ?></td>
		                <?php 
		                	if ($data['hak_akses'] == '1') {
		                		?>
		                			<td>Admin</td>
		                		<?php
		                	}else if ($data['hak_akses'] == '2'){
								?>
		                			<td>Pegawai</td>
		                		<?php
		                	}
		                ?>
		              <td><img src="gambar/<?php echo $data['photo']; ?>" width="50px"></td>
		              
		              <td>
		                <center>
		                  <a class="btn btn-sm btn-info" href="?page=edit_pegawai&id=<?php echo $data['id_pegawai']; ?>"><i class="fas fa-edit"></i></a>
		                  <a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" href="?page=hapus_pegawai_act&id=<?php echo $data['id_pegawai']; ?>"><i class="fas fa-trash"></i></a>
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
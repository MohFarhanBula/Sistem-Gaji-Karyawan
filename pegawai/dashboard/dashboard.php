<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <div class="alert alert-success font-weight-bold mb-4" style="width: 65%">Selamat datang <?php echo $nama_pegawai; ?>, Anda login sebagai pegawai</div>

  <div class="card" style="margin-bottom: 120px; width: 65%">
  	<div class="card-header font-weight-bold bg-primary text-white">
  		Data Pegawai
  	</div>

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
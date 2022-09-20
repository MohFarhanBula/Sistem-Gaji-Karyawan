<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$query = mysqli_query($koneksi, "SELECT * FROM data_pegawai WHERE id_pegawai = '$id' ");
		$data = mysqli_fetch_array($query);

		$nama_jabatan = $data['jabatan'];
		?>
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Pegawai</h1>
  </div>
</div>

        <!-- Begin Page Content -->
<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<form method="POST" action="?page=edit_pegawai_act" enctype="multipart/form-data">
				
				<div class="form-group">
					<label>NIK</label>
					<input type="hidden" name="id" value="<?php echo $id; ?>"> 
					<input type="number" name="nik" value="<?php echo $data['nik']; ?>" class="form-control">
					<div class="text-small text-danger"> </div>
				</div>

				<div class="form-group">
					<label>Nama Pegawai</label>
					<input type="text" name="nama_pegawai" value="<?php echo $data['nama_pegawai']; ?>" class="form-control">
				</div>

				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" value="<?php echo $data['username']; ?>" class="form-control">
				</div>

				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control">
					<i style=" font-size: 11px;color: red">Abaikan jika tidak ingin merubah password</i><br>
				</div>

				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select name="jenis_kelamin" class="form-control">
						<?php
							if ($data['jenis_kelamin'] == "Laki-Laki") {
								?>
									<option value="Laki-Laki" selected="">Laki - Laki</option>
									<option value="Perempuan">Perempuan</option>
								<?php
							}else{
								?>
									<option value="Laki-Laki">Laki - Laki</option>
									<option value="Perempuan" selected="">Perempuan</option>
								<?php
							}
						?>
					</select>
				</div>

				<div class="form-group">
					<label>Jabatan</label>
					<select name="jabatan" class="form-control">
						<?php
							$cc = mysqli_query($koneksi, "SELECT * FROM data_jabatan ");
							
							while ($dd = mysqli_fetch_array($cc)) {
								if ($nama_jabatan == $dd['nama_jabatan']) {
									?>
										<option selected="" value="<?php echo $dd['nama_jabatan']; ?>"><?php echo $dd['nama_jabatan']; ?></option>
									<?php
								}else{
									?>
										<option  value="<?php echo $dd['nama_jabatan']; ?>"><?php echo $dd['nama_jabatan']; ?></option>
									<?php
								}
								
							}
						?>
					</select>
				</div>

				<div class="form-group">
					<label>Tanggal Masuk</label>
					<input type="date" name="tanggal_masuk" value="<?php echo $data['tanggal_masuk']; ?>" class="form-control">
				</div>

				<div class="form-group">
					<label>Status</label>
					<select name="status" class="form-control">
						<?php
							if ($data['status'] == "Karyawan Tetap") {
								?>
									<option value="Karyawan Tetap" selected="">Karyawan Tetap</option>
									<option value="Karyawan Tidak Tetap">Karyawan Tidak Tetap</option>
								<?php
							}else{
								?>
									<option value="Karyawan Tetap">Karyawan Tetap</option>
									<option value="Karyawan Tidak Tetap" selected="">Karyawan Tidak Tetap</option>
								<?php
							}
						?>
					</select>
				</div>

				<div class="form-group">
					<label>Hak Akses</label>
					<select name="hak_akses" class="form-control">
						<?php
							if ($data['hak_akses'] == "1") {
								?>
									<option value="1" selected="">Admin</option>
									<option value="2">Pegawai</option>
								<?php
							}else{
								?>
									<option value="1">Admin</option>
									<option value="2" selected="">Pegawai</option>
								<?php
							}
						?>
					</select>
				</div>

				<div class="form-group">
					<label>Photo</label><br>
					<img src="gambar/<?php echo $data['photo']; ?>" style="width: 120px;margin-bottom: 5px;">
					<input type="file" name="photo" class="form-control">
					<i style=" font-size: 11px;color: red">Abaikan jika tidak merubah gambar</i><br>
				</div>


				<button type="submit" name="submit" class="btn btn-success" >Simpan</button>
				<button type="reset" class="btn btn-danger" >Reset</button>
				<a href="?page=pegawai" class="btn btn-warning">Kembali</a>

			</form>
		</div>
	</div>
</div>
		<?php
	}
?>
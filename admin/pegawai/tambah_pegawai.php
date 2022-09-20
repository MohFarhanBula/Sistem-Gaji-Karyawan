<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Pegawai</h1>
  </div>
</div>

        <!-- Begin Page Content -->
<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<form method="POST" action="?page=tambah_pegawai_act" enctype="multipart/form-data">
				
				<div class="form-group">
					<label>NIK</label>
					<input type="number" name="nik" class="form-control">
					<div class="text-small text-danger"> </div>
				</div>

				<div class="form-group">
					<label>Nama Pegawai</label>
					<input type="text" name="nama_pegawai" class="form-control">
				</div>

				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control">
				</div>

				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control">
				</div>

				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select name="jenis_kelamin" class="form-control">
						<option value="">--Pilih Jenis Kelamin--</option>
						<option value="Laki-Laki">Laki-Laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
				</div>

				<div class="form-group">
					<label>Jabatan</label>
					<select name="jabatan" class="form-control">
						<option value="">--Pilih Jabatan--</option>
						<?php
							$query = mysqli_query($koneksi, "SELECT * FROM data_jabatan");
							while ($data = mysqli_fetch_array($query)) {
								?>
									<option value="<?php echo $data['nama_jabatan'] ?>"><?php echo $data['nama_jabatan']; ?></option>
								<?php
							}
						?>
					</select>
				</div>

				<div class="form-group">
					<label>Tanggal Masuk</label>
					<input type="date" name="tanggal_masuk" class="form-control">
				</div>

				<div class="form-group">
					<label>Status</label>
					<select name="status" class="form-control">
						<option value="">--Pilih Status--</option>
						<option value="Karyawan Tetap">Karyawan Tetap</option>
						<option value="Karyawan Tidak Tetap">Karyawan Tidak Tetap</option>
					</select>
				</div>

				<div class="form-group">
					<label>Hak Akses</label>
					<select name="hak_akses" class="form-control">
						<option value="">--Pilih Hak Akses--</option>
						<option value="1">Admin</option>
						<option value="2">Pegawai</option>
					</select>
				</div>

				<div class="form-group">
					<label>Photo</label>
					<input type="file" name="photo" class="form-control">
				</div>


				<button type="submit" name="submit" class="btn btn-success" >Simpan</button>
				<button type="reset" class="btn btn-danger" >Reset</button>
				<a href="?page=pegawai" class="btn btn-warning">Kembali</a>

			</form>
		</div>
	</div>
</div>
<?php
	if (isset($_POST['submit'])) {
		$id = $_POST['id'];
		$nik = $_POST['nik'];
		$nama_pegawai = $_POST['nama_pegawai'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$jabatan = $_POST['jabatan'];
		$tanggal_masuk = $_POST['tanggal_masuk'];
		$status = $_POST['status'];
		$hak_akses = $_POST['hak_akses'];
		$photo = $_FILES['photo']['name'];

		$ht = date('Y-m-d',strtotime('+1 month',strtotime($_POST['tanggal_masuk'])));



		$cek_nik = mysqli_query($koneksi, "SELECT nik FROM data_pegawai WHERE nik = '$nik' ");
		$hsnik = mysqli_num_rows($cek_nik);

		$cek_username = mysqli_query($koneksi, "SELECT username FROM data_pegawai WHERE username = '$username' ");
		$hsnik = mysqli_num_rows($cek_username);

		
		$cekcek = mysqli_query($koneksi, "SELECT nik FROM data_pegawai WHERE id_pegawai = '$id' ");
		$hs = mysqli_fetch_array($cekcek);
		$niknik = $hs['nik'];


		$namename = mysqli_query($koneksi, "SELECT username FROM data_pegawai WHERE id_pegawai = '$id' ");
		$hss = mysqli_fetch_array($namename);
		$serser = $hss['username'];



		if ($hsnik == 0 OR $nik == $niknik AND $niknik == 0 OR $username == $serser) {
			

		if($photo != "") {
			$ektensi_diperbolehkan = array('png','jpg','jpeg');
			$x = explode('.', $photo);
			$ektensi = strtolower(end($x));
			$file_tmp = $_FILES['photo']['tmp_name'];
			$angka_acak = rand(1,999);
			$nama_gambar_baru = $angka_acak.'-'.$photo;
			if (in_array($ektensi, $ektensi_diperbolehkan) === true) {
				move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);	

			if ($password == "") {
				$q = mysqli_query($koneksi, "SELECT * FROM data_pegawai WHERE id_pegawai =  '$id' ");
				while ($c = mysqli_fetch_array($q)) {
					$pw = $c['password'];
				}

				 $query = mysqli_query($koneksi, "UPDATE data_pegawai SET nik = '$nik', nama_pegawai = '$nama_pegawai', username = '$username', password = '".$pw."', jenis_kelamin = '$jenis_kelamin', jabatan = '$jabatan', tanggal_masuk = '$tanggal_masuk', status = '$status', hak_akses = '$hak_akses', photo = '$nama_gambar_baru' WHERE id_pegawai = '$id' ");

				 $a = mysqli_query($koneksi, "UPDATE pembagian_gaji SET nik = '$nik', nama_karyawan = '$nama_pegawai', jabatan = '$jabatan', tanggal_gajian = '$ht' ");

			}else{
				$query = mysqli_query($koneksi, "UPDATE data_pegawai SET nik = '$nik', nama_pegawai = '$nama_pegawai', username = '$username', password = '".md5($_POST['password'])."', jenis_kelamin = '$jenis_kelamin', jabatan = '$jabatan', tanggal_masuk = '$tanggal_masuk', status = '$status', hak_akses = '$hak_akses', photo = '$nama_gambar_baru' WHERE id_pegawai = '$id' ");

				$b = mysqli_query($koneksi, "UPDATE pembagian_gaji SET nik = '$nik', nama_karyawan = '$nama_pegawai', jabatan = '$jabatan', tanggal_gajian = '$ht' ");
			}

				
				if (!$query) {
					?>
						<script type="text/javascript">
							alert("Data Gagal Di Ubah");
							window.location = "?page=pegawai";
						</script>
					<?php
				}else{
					?>
						<script type="text/javascript">
							alert("Data Berhasil Di Ubah");
							window.location = "?page=pegawai";
						</script>
					<?php
				}
			}else{
				?>
						<script type="text/javascript">
							alert("Ekstensi Gambar Yang boleh hanya jpg, jpeg, atau png");
							window.location = "?page=pegawai";
						</script>
					<?php
			}
		}else{
			if ($password == "") {
				$q = mysqli_query($koneksi, "SELECT * FROM data_pegawai WHERE id_pegawai =  '$id' ");
				while ($c = mysqli_fetch_array($q)) {
					$pw = $c['password'];
				}				
				$query = mysqli_query($koneksi, "UPDATE data_pegawai SET nik = '$nik', nama_pegawai = '$nama_pegawai', username = '$username', password = '".$pw."', jenis_kelamin = '$jenis_kelamin', jabatan = '$jabatan', tanggal_masuk = '$tanggal_masuk', status = '$status', hak_akses = '$hak_akses' WHERE id_pegawai = '$id' ");

				$c = mysqli_query($koneksi, "UPDATE pembagian_gaji SET nik = '$nik', nama_karyawan = '$nama_pegawai', jabatan = '$jabatan', tanggal_gajian = '$ht' ");

			}else{
				$q = mysqli_query($koneksi, "SELECT * FROM data_pegawai WHERE id_pegawai = '$id' ");
				while ($c = mysqli_fetch_array($q)) {
					$pw = $c['password'];
				}
				
				$query = mysqli_query($koneksi, "UPDATE data_pegawai SET nik = '$nik', nama_pegawai = '$nama_pegawai', username = '$username', password = '".md5($_POST['password'])."', jenis_kelamin = '$jenis_kelamin', jabatan = '$jabatan', tanggal_masuk = '$tanggal_masuk', status = '$status', hak_akses = '$hak_akses' WHERE id_pegawai = '$id' ");

				$d = mysqli_query($koneksi, "UPDATE pembagian_gaji SET nik = '$nik', nama_karyawan = '$nama_pegawai', jabatan = '$jabatan', tanggal_gajian = '$ht' ");

			}
		
				if (!$query) {
					?>
						<script type="text/javascript">
							alert("Data Gagal Di Ubah");
							// window.location = "?page=pegawai";
						</script>
					<?php
				}else{
					?>
						<script type="text/javascript">
							alert("Data Berhasil Di Ubah");
							window.location = "?page=pegawai";
						</script>
					<?php
				}
		}
	}else{
			?>
				<script type="text/javascript">
					alert("Nik Atau Username Sudah Di Gunakan");
					window.location = "?page=pegawai";
				</script>
			<?php
		}
		
	}

?>
<?php
	if (isset($_POST['submit'])) {

		$nik = $_POST['nik'];
		$username = $_POST['username'];

		$ht = date('Y-m-d',strtotime('+1 month',strtotime($_POST['tanggal_masuk'])));

		$cek_data = mysqli_query($koneksi, "SELECT nik FROM data_pegawai WHERE nik = '$nik' ");
		$cek = mysqli_num_rows($cek_data);

		$cari_data = mysqli_query($koneksi, "SELECT username FROM data_pegawai WHERE username = '$username' ");
		$cari = mysqli_num_rows($cari_data);

		if ($cek == 0 AND $cari == 0) {
			
		$tempdir = "gambar/";

		if (!file_exists($tempdir))
            mkdir($tempdir,0755); 

        $target_path = $tempdir . basename($_FILES['photo']['name']);




		$nama_gambar = $_FILES['photo']['name'];

		$ukuran_gambar = $_FILES['photo']['size'];

		$fileinfo = @getimagesize($_FILES["photo"]["tmp_name"]);

			if (move_uploaded_file($_FILES['photo']['tmp_name'] , $target_path)) {
				$query = mysqli_query($koneksi, "INSERT INTO data_pegawai (nik,nama_pegawai,username, password, jenis_kelamin, jabatan, tanggal_masuk, status, photo, hak_akses) VALUES ('".$_POST['nik']."' , '".$_POST['nama_pegawai']."' , '".$_POST['username']."' , '".md5($_POST['password'])."' , '".$_POST['jenis_kelamin']."' , '".$_POST['jabatan']."' , '".$_POST['tanggal_masuk']."' , '".$_POST['status']."' , '".$nama_gambar."' , '".$_POST['hak_akses']."')");

				$cc = mysqli_query($koneksi, "INSERT INTO pembagian_gaji (nik, nama_karyawan, jabatan, tanggal_gajian,status) VALUES ('".$_POST['nik']."' ,'".$_POST['nama_pegawai']."' , '".$_POST['jabatan']."' , '".$ht."', '0')  ");

					?>
						<script type="text/javascript">
							alert("Data Berhasil Di Simpan");
							window.location = "?page=pegawai";
						</script>
					<?php
			}else{
				?>
						<script type="text/javascript">
							alert("Data Gagal Di Simpan");
							window.location = "?page=tambah_pegawai";
						</script>
					<?php
			}
		}else{
			?>
				<script type="text/javascript">
					alert("Nik Atau Username Sudah Di Gunakan");
					window.location = "?page=tambah_pegawai";
				</script>
			<?php
		}
	}
?>
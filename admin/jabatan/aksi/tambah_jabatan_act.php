<?php
	if (isset($_POST['submit'])) {
		$nama_jabatan = $_POST['nama_jabatan'];
		$gaji_pokok = $_POST['gaji_pokok'];
		$tj_transport = $_POST['tj_transport'];
		$uang_makan = $_POST['uang_makan'];

		$query = mysqli_query($koneksi, "INSERT INTO data_jabatan (nama_jabatan, gaji_pokok, tj_transport, uang_makan) VALUES ('$nama_jabatan', '$gaji_pokok', '$tj_transport', '$uang_makan')");

		if ($query) {
			?>
				<script type="text/javascript">
					alert("Data Berhasil Di Simpan");
					window.location = "?page=jabatan";
				</script>
			<?php
		}else{
			?>
				<script type="text/javascript">
					alert("Data Gagal Di Simpan");
					window.location = "?page=jabatan";
				</script>
			<?php
		}
	}
?>
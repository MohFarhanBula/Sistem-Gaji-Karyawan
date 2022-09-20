<?php
	if (isset($_POST['submit'])) {
		$nama_jabatan = $_POST['nama_jabatan'];
		$gaji_pokok = $_POST['gaji_pokok'];
		$tj_transport = $_POST['tj_transport'];
		$uang_makan = $_POST['uang_makan'];
		$id = $_POST['id'];

		$query = mysqli_query($koneksi, "UPDATE data_jabatan SET nama_jabatan = '$nama_jabatan', gaji_pokok = '$gaji_pokok', tj_transport = '$tj_transport', uang_makan = '$uang_makan' WHERE id_jabatan = '$id' ");

		if ($query) {
			?>
				<script type="text/javascript">
					alert("Data Berhasil Di Ubah");
					window.location = "?page=jabatan";
				</script>
			<?php
		}else{
			?>
				<script type="text/javascript">
					alert("Data Gagal Di Ubah");
					window.location = "?page=jabatan";
				</script>
			<?php
		}
	}
?>
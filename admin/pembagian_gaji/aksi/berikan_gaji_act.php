<?php
	if (isset($_POST['submit'])) {
		$id = $_POST['id'];
		$nik = $_POST['nik'];
		$nama_karyawan = $_POST['nama_karyawan'];
		$jabatan = $_POST['jabatan'];
		$tanggal_gajian = $_POST['tanggal_gajian'];
		$status = "1";
		$st = "0";
		$tanggal_dibayarkan = $_POST['tanggal_dibayarkan'];
		$gaji_pokok = $_POST['gaji_pokok'];
		$uang_transport = $_POST['uang_transport'];
		$uang_makan = $_POST['uang_makan'];
		$total = $_POST['total'];

		$query = mysqli_query($koneksi, "UPDATE pembagian_gaji SET status = '$status', tanggal_dibayarkan = '$tanggal_dibayarkan', gaji_pokok = '$gaji_pokok', uang_transport = '$uang_transport', uang_makan = '$uang_makan', total = '$total' WHERE id = '$id' ");
		
		$query2 = mysqli_query($koneksi, "INSERT INTO pembagian_gaji (nik,nama_karyawan,jabatan,tanggal_gajian, status) VALUES ('$nik','$nama_karyawan','$jabatan','$tanggal_gajian','$st')");

		?>
			<script type="text/javascript">
				alert("Pembayaran Berhasil");
				window.location = "?page=pembagian_gaji";
			</script>
		<?php

	}
?>
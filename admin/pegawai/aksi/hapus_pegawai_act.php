
<?php

	if (isset($_GET['id'])) {
		$id_pegawai = $_GET['id'];

		

		$query1 = mysqli_query($koneksi, "SELECT * FROM data_pegawai WHERE id_pegawai = '$id_pegawai' ");

		while ($data = mysqli_fetch_array($query1)) {
			$nik = $data['nik'];

			$query = mysqli_query($koneksi, "DELETE FROM data_pegawai WHERE id_pegawai = '$id_pegawai' ");

			$query2 = mysqli_query($koneksi, "DELETE FROM pembagian_gaji WHERE nik ='$nik' ");
			
		}
		
		
		
		?>
			<script type="text/javascript">
				alert("Data Berhasil Di Hapus");
				window.location = "?page=pegawai";				
			</script>
		<?php
	}
	
?>
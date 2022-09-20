
<?php

	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$query = mysqli_query($koneksi, "DELETE FROM data_jabatan WHERE id_jabatan = '$id' ");
		?>
			<script type="text/javascript">
				alert("Data Berhasil Di Hapus");
				window.location = "?page=jabatan";				
			</script>
		<?php
	}
	
?>
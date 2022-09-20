<?php
	$koneksi = mysqli_connect("Localhost", "root", "", "gaji");

	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$query = mysqli_query($koneksi, "SELECT * FROM pembagian_gaji WHERE id = '$id' ");
		while ($data = mysqli_fetch_array($query)) {
			$nik = $data['nik'];
			$nama_karyawan = $data['nama_karyawan'];
			$jabatan = $data['jabatan'];
			$tanggal_dibayarkan = $data['tanggal_dibayarkan'];
			$tanggal_gajian = $data['tanggal_gajian'];

			$tanggal_sekarang = date('Y-m-d');

			$ht = date('Y-m-d',strtotime('+1 month',strtotime($tanggal_gajian)));

		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>Cetak Slip Gaji</title>
			<link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
			  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

			  <!-- Custom styles for this template-->
			  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
		</head>
		<body>
			<br>
			<div class="container-fluid">
			<!-- Begin Page Content -->
					<div class="container-fluid">
						<div style="text-align: center;">
							<h1 style="color: black; font-weight: 500; font-size: 55px">PT. HADAR</h1>
							<h4 style="color: black; font-weight: 500; font-size: 20px"><?php echo $tanggal_sekarang; ?></h4>
							<hr>

						</div>
						<br>

					  <!-- Page Heading -->
					  <div class="d-sm-flex align-items-center justify-content-between mb-4">
					    <h1 class="h3 mb-0 text-gray-800">Slip Gaji</h1>
					    <h1 class="h3 mb-0 text-gray-800">Lunas Pada Tanggal : <?php echo $tanggal_dibayarkan; ?></h1>
					  </div>

					  <div class="card">
				<div class="card-body">


						<div class="form-group">
							<label>Nik</label>
							<input type="hidden" name="id" value="<?php echo $id; ?>">
							<input type="number" name="nik" readonly="" value="<?php echo $nik; ?>" class="form-control">
						</div>

						<div class="form-group">
							<label>Nama Karyawan</label>
							<input type="text" readonly=""  name="nama_karyawan" value="<?php echo $nama_karyawan; ?>" class="form-control">
						</div>

						<div class="form-group">
							<label>Jabatan</label>
							<input type="text" readonly=""  name="jabatan" value="<?php echo $jabatan; ?>" class="form-control">
						</div>

						<div class="form-group">
							<input type="hidden" readonly="" name="tanggal_dibayarkan" value="<?php echo $tanggal_sekarang; ?>" class="form-control">
						</div>

						<div class="form-group">
							<input type="hidden" readonly="" name="tanggal_gajian" value="<?php echo $ht; ?>" class="form-control">
						</div>
						<?php
								$q = mysqli_query($koneksi, "SELECT * FROM data_jabatan WHERE nama_jabatan = '$jabatan' ");
								while ($c = mysqli_fetch_array($q)) {
									$gaji_pokok = $c['gaji_pokok'];
									$tj_transport = $c['tj_transport'];
									$uang_makan = $c['uang_makan'];
									$total = $gaji_pokok + $tj_transport + $uang_makan;
									?>
										
										<div class="form-group card-body">
											<table class="table table-bordered" width="100%" cellspacing="0">
												<thead class="thead-dark">
													<tr>
														<th>Gaji Pokok</th>
														<th>Biaya Transport</th>
														<th>Uang Makan</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><?php echo number_format($gaji_pokok,0,',','.'); ?></td>
														<td><?php echo number_format($tj_transport,0,',','.'); ?></td>
														<td><?php echo number_format($uang_makan,0,',','.'); ?></td>
													</tr>
												</tbody>
											</table>
										</div>

										<div class="form-group">
											<input type="hidden" name="gaji_pokok" value="<?php echo $gaji_pokok; ?>">
											<input type="hidden" name="uang_transport" value="<?php echo $tj_transport; ?>">
											<input type="hidden" name="uang_makan" value="<?php echo $uang_makan; ?>">
											<input type="hidden" name="total" value="<?php echo $total; ?>">
											<center>
												<label style="font-size: 25px">Lunas Senilai</label>
												<h1 class="text-center text-success" style=" font-weight: 1000; font-size: 80px">Rp. <?php echo number_format($total,0,',','.'); ?></h1>
											</center>
										</div>

										<div class="form-group" style="float: right;">
											&nbsp;&nbsp;&nbsp;&nbsp;Hormat Kami
											<br>
											<br>
											<br>
											<br>
											(_______________)
										</div>

									<?php
								}
								
						?>
					
		
				</div>
			</div>


					</div>
			<!-- /.container-fluid -->
			</div>


		<script type="text/javascript">
			window.print();
		</script>
		<script src="../assets/vendor/jquery/jquery.min.js"></script>
		<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
		<script src="../assets/js/sb-admin-2.min.js"></script>
		<script src="../assets/vendor/chart.js/Chart.min.js"></script>
		<script src="../assets/js/Chart.js"></script>
		<script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
		<script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
		<script src="../assets/js/demo/datatables-demo.js"></script>
		<link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
		</body>
		</html>
		<?php
	}
}

?>


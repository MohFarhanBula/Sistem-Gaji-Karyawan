<?php
	$koneksi = mysqli_connect("Localhost", "root", "", "gaji");

	if (isset($_GET['bulan']) && isset($_GET['tahun']) && isset($_GET['nama_pegawai'])) {
		$bulan = $_GET['bulan'];
		$tahun = $_GET['tahun'];
		$nama_pegawai = $_GET['nama_pegawai'];

		?>
			<!DOCTYPE html>
			<html>
			<head>
				<title>Slip Gaji Karyawan</title>
				<link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
						  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

						  <!-- Custom styles for this template-->
						  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
			</head>
			<body>
					<div class="container-fluid">
						<div style="text-align: center;">
							<h1 style="color: black; font-weight: 500; font-size: 55px">PT. HADAR</h1>
							<h4 style="color: black; font-weight: 500; font-size: 20px">Slip Gaji Karyawan</h4>
							<hr>
						</div>
				   <div class="card-body">
				     <div class="table-responsive">Bulan  :
				     	<?php
				     		if ($bulan == '01') {
								echo "Januari";
					 		}else if ($bulan == '02') {
					 			echo "Februari"; 
					 		}else if ($bulan == '03') {
					 			echo "Maret"; 
					 		}else if ($bulan == '04') {
					 			echo "April"; 
					 		}else if ($bulan == '05') {
					 			echo "Mei"; 
					 		}else if ($bulan == '06') {
					 			echo "Juni"; 
					 		}else if ($bulan == '07') {
					 			echo "Juli"; 
					 		}else if ($bulan == '08') {
					 			echo "Agustus"; 
					 		}else if ($bulan == '09') {
					 			echo "September"; 
					 		}else if ($bulan == '10') {
					 			echo "Oktober"; 
					 		}else if ($bulan == '11') {
					 			echo "November"; 
					 		}else if ($bulan == '12') {
					 			echo "Desember"; 
					 		}
				     	?>
				     	<br>
				     	Tahun : <?php echo $tahun; ?>
				       <table class="table table-bordered" style="font-size: 13px">
				         <thead class="thead-dark">
				           <tr>
				              <th class="text-center">No</th>
				              <th class="text-center">Nama Karyawan</th>
				              <th class="text-center">Jabatan</th>
				              <th class="text-center">Tanggal Gajian</th>
				              <th class="text-center">Status</th>
				              <th class="text-center">Tanggal Dibayarkan</th>
				              <th class="text-center">Gaji Pokok</th>
				              <th class="text-center">Uang Transport</th>
				              <th class="text-center">Uang Makan</th>
				              <th class="text-center">Total</th>

				           </tr>
				         </thead>
				         <?php
				          $no = 1;

				          $q = mysqli_query($koneksi, "SELECT * FROM pembagian_gaji WHERE YEAR(tanggal_gajian) = '$tahun' AND MONTH(tanggal_gajian) = '$bulan' AND status = '1' AND nama_karyawan = '$nama_pegawai' ");
				          while ($data = mysqli_fetch_array($q)) {

				            ?>
				             <tbody>
				                <tr>
				                  <td class="text-center"><?php echo $no++; ?></td>
				                  <td class="text-center"><?php echo $data['nama_karyawan']; ?></td>
				                  <td class="text-center"><?php echo $data['jabatan']; ?></td>
				                  <td class="text-center"><?php echo $data['tanggal_gajian']; ?></td>
				                  <?php 
				                  if ($data['status'] == "1"){
				                    ?>
				                      <td class="text-center">Lunas</td> 
				                    <?php
				                  }else if($data['status'] == "0"){
				                    ?>
				                      <td class="text-center">Belum Dibayarkan</td> 
				                    <?php
				                  }
				                  ?>
				                  
				                  <td class="text-center"><?php echo $data['tanggal_dibayarkan']; ?></td>
				                  <td class="text-center"><?php echo number_format($data['gaji_pokok'],0,',','.'); ?></td>
				                  <td class="text-center"><?php echo number_format($data['uang_transport'],0,',','.'); ?></td>
				                  <td class="text-center"><?php echo number_format($data['uang_makan'],0,',','.'); ?></td></td>
				                  <td class="text-center"><?php echo number_format($data['total'],0,',','.'); ?></td>

				      
				                </tr>

				             </tbody>

				            <?php
				          }
				         ?>
				       </table>
				   </div>
				   <div class="form-group" style="float: right;">
											&nbsp;&nbsp;&nbsp;&nbsp;Hormat Kami
											<br>
											<br>
											<br>
											<br>
											(_______________)
										</div>

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
			</body>
			</html>
		<?php
	}
?>

 <?php
	if (isset($_GET['id'])) {
		$id	= $_GET['id'];

		$query = mysqli_query($koneksi, "SELECT * FROM pembagian_gaji WHERE id = '$id' ");

		while ($data = mysqli_fetch_array($query)) {
			$nik = $data['nik'];
			$nama_karyawan = $data['nama_karyawan'];
			$jabatan = $data['jabatan'];

			$tanggal_gajian = $data['tanggal_gajian'];

			$tanggal_sekarang = date('Y-m-d');

			$ht = date('Y-m-d',strtotime('+1 month',strtotime($tanggal_gajian)));

			?>
				<!-- Begin Page Content -->
			<div class="container-fluid">

			  <!-- Page Heading -->
			  <div class="d-sm-flex align-items-center justify-content-between mb-4">
			    <h1 class="h3 mb-0 text-gray-800">Pembagian Gaji <?php echo $data['nama_karyawan']; ?></h1>
			    <h1 class="h3 mb-0 text-gray-800">Tanggal : <?php echo $tanggal_sekarang; ?></h1>
			  </div>

			</div>
			<!-- /.container-fluid -->

			<div class="card">
				<div class="card-body">
					<form method="POST" action="?page=berikan_gaji_act">

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
												<label style="font-size: 25px">Total Gaji Yang Harus Di Bayarkan</label>
												<h1 class="text-center" style="color: red; font-weight: 1000; font-size: 80px">Rp. <?php echo number_format($total,0,',','.'); ?></h1>
											</center>
										</div>

									<?php
								}
								
						?>
						
						<button type="submit" name="submit" class="btn btn-success" >Bayar Sekarang</button>
						<a href="?page=pembagian_gaji" class="btn btn-warning">Kembali</a>

					</form>
				</div>
			</div>

			<?php


		}
	}
?>


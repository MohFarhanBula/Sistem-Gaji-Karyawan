<?php
  if (isset($_POST['submit'])) {
    $passBaru = md5($_POST['passBaru']);
    $ulangPass = md5($_POST['ulangPass']);

    $nik =  $_SESSION['nik'];

    if ($passBaru != $ulangPass) {
      ?>
        <script type="text/javascript">
          alert('Password Tidak Cocok');
          window.location = "?page=ganti_password";
        </script>
      <?php
    }else{
      $query = mysqli_query($koneksi, "UPDATE data_pegawai SET password = '$passBaru' WHERE nik = '$nik' ");
      if ($query) {
        ?>
          <script type="text/javascript">
            alert('Password Berhasil Di Ubah');
            window.location = "?page=ganti_password";
          </script>
        <?php
      }else{
        ?>
          <script type="text/javascript">
            alert('Password Gagal Di Ubah');
            window.location = "?page=ganti_password";
          </script>
        <?php
      }
    }
  }

?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ubah Password</h1>
  </div>

  <div class="card" style="width: 40%">
  	<div class="card-body">
  		<form method="POST" action="?page=ganti_password">
  			
  			<div class="form-grup">
  				<label>Password Baru</label>
  				<input type="text" name="passBaru" class="form-control">
  			</div>
        <br>
  			<div class="form-grup">
  				<label>Ulangi Password Baru</label>
  				<input type="text" name="ulangPass" class="form-control">
  			</div>
  			<br>
  			<button type="submit"  name="submit" class="btn btn-success">Simpan</button>
  		</form>
  	</div>
  </div>

</div>
<!-- /.container-fluid -->
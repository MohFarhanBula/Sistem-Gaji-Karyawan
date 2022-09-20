<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'connect.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from data_pegawai where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['hak_akses']=="1"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['hak_akses'] = "1";
		$_SESSION['nik'] = $data['nik'];
		// alihkan ke halaman dashboard admin
		header("location:../admin/index.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['hak_akses']=="2"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['hak_akses'] = "2";
		$_SESSION['nik'] = $data['nik'];

		// alihkan ke halaman dashboard pegawai
		header("location:../pegawai/index.php");
	}else{
 
		?>
			<script type="text/javascript">
				alert("Username Dan Password Salah!");
				window.location = "../index.php";
			</script>
		<?php
	}	
}else{
	?>
			<script type="text/javascript">
				alert("Username Dan Password Salah!");
				window.location = "../index.php";
			</script>
		<?php
}
 
?>
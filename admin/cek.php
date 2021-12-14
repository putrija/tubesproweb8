<!-- cek apakah sudah login -->
	<?php 
	session_start();
	if($_SESSION['role']!="admin"){
		header("location:../admin.php?pesan=belum_login");
	}
	?>
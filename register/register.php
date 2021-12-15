<?php

require_once'../koneksi.php';

?>

<!DOCTYPE html>
<html>
<head>
<title>Welcome</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="register.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Registrasi</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form method="POST" class="my-login-validation" novalidate="" action="register.php">
					<input class="text" type="text" name="username" placeholder="username" required="">
					<input class="text email" type="email" name="email" placeholder="email" required="">
					<input class="text" type="password" name="password" placeholder="Password" required=""> 
					<input class="submit" type="submit" name="btnlogin" placeholder="Register"> 
				</form>
				<p>Already have an Account? <a href="../login/login.php"> Login Now!</a></p>
			</div>
	</div>
	<!-- //main -->

	<?php

	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	$pemeriksaan_username = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM akun WHERE username='$_POST[username]' OR email='$_POST[email]' "));
			if ($pemeriksaan_username > 0 ) {
				echo "<h2> Akun dengan username/email yang sama telah terdaftar, silahkan ubah username/email anda! </h2>";
			} else{
				$sql = "INSERT INTO akun (username,password,email) VALUES ('$username','$password','$email')";
					if($koneksi->query($sql)===TRUE){
						echo "<h2>Registrasi Akun Anda Berhasil</h2>";
						echo "selamat";
					} else {
						echo "Terjadi kesalahan:".$sql."<br/>".$koneksi->error;
					}
				}		

	$koneksi->close();
	?>

</body>
</html>
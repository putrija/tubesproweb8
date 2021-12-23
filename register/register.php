<?php

require_once'../koneksi.php';
error_reporting(0);

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
	<div class="logo">
        <img src="images/logo.png" width="150" weight="130">
    </div>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<div class="main-agileinfo">
		<h1>Registration</h1>
		<p class="pls">Silahkan isi data berikut untuk membuat akun</p>
			<div class="agileits-top">
				<form method="POST" class="my-login-validation" novalidate="" action="register.php">
					<input class="text mb-3" type="text" name="username" placeholder="Username" required="">
					<input class="text mb-3 email" type="email" name="email" placeholder="Email" required="">
					<input class="text mb-3" type="password" name="password" placeholder="Password" required=""><br/>
					<input class="text mb-3" type="password" name="confirm" placeholder="Confirm Password" required="">
					<input class="submit" type="submit" name="btnlogin" placeholder="Register"> 
				</form>
				<p>Already have an Account? <a href="../login/login.php"> Login Now!</a></p>
			</div>
	</div>
	<!-- //main -->

	<?php

	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	$email = $_POST['email'];
	$confirm = sha1($_POST['confirm']);

	if($password == $confirm) {
		$pemeriksaan_username = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM akun WHERE username='$_POST[username]' OR email='$_POST[email]' "));
			if ($pemeriksaan_username > 0 ) {
				echo "<h2> Akun dengan username/email yang sama telah terdaftar, silahkan ubah username/email anda! </h2>";
			} else{
				$sql = "INSERT INTO akun (`username`,`password`,`email`, `level`) VALUES ('$username','$password','$email', 'user')";
					if($koneksi->query($sql)===TRUE){
						echo "<h2>Registrasi Akun Anda Berhasil</h2>";
						echo "selamat";
					} else {
						echo "Terjadi kesalahan:".$sql."<br/>".$koneksi->error;
					}
				}
	}else{
		echo "Terjadi kesalahan";
	}
	?>

<!-- Validasi -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>


<script>
	$(document).ready(function () {
		$("#basic-form").validate({
			rules: {
				username: {
					required: true,
					minlength: 5
				},
				password: {
					required: true,
					minlength: 8
				},
				email: {
					required: true,
					email: true
				}
			},
			messages: {
				username: {
					minlength: "<span style='font-size:14px;'>Username must be at least 5 characters</span>"
				},
				password: {
					required: "<p style='font-size:14px;'>Please enter your password</p>",
					min: "<span style='font-size:14px;'>Password should be at least 8 character</span>"
				},
				email: {
					email: "<span style='font-size:14px;'>The email should be in the format: abc@domain.tld</span>"
				}
			}
		});
	});
</script>

</body>
</html>

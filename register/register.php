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
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Work+Sans:wght@500&display=swap">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Registrasi</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form id="basic-form" method="POST" class="my-login-validation" novalidate="" action="register.php">
					<input class="text mb-3" type="text" name="username" placeholder="Username" required="">
					<input class="text mb-3 email" type="email" name="email" placeholder="Email" required="">
					<input class="text mb-3" type="password" name="password" placeholder="Password" required=""> <br/>
					<input class="text mb-3" type="password" name="confirm" placeholder="Confirm Password" required=""> <br>
					<input class="submit" type="submit" name="btnlogin" placeholder="Register"> 
				</form>
				<p>Sudah punya akun? <a href="../login/login.php"> Masu sekarang!</a></p>
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
                        minlength: "<span style='font-size:14px; color:#ffff; font-family:Work Sans, sans-serif;'>Username setidaknya harus terdiri dari 5 karakter</span>"
                    },
                    password: {
                        required: "<span style='font-size:14px;color:#ffff; font-family:Work Sans, sans-serif;'>Mohon isi password Anda</span>",
                        minlength: "<span style='font-size:14px; color:#ffff; font-family:Work Sans, sans-serif;'>Password setidaknya harus terdiri dari 8 karakter</span>"
                    },
                    email: {
                        email: "<span style='font-size:14px; color:#ffff; font-family:Work Sans, sans-serif;'>Email harus dalam format: abc@domain.tld</span>"
                    }
                }
            });
        });
    </script>
</body>
</html>
<?php  
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
    <link href="login.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
    <div class="login-page">
        <div class="form">
            <form method="POST" class="my-login-validation" novalidate="">
            <input type="text" name="username" placeholder="username"/>
            <input type="password" name="password" placeholder="password"/>
            <div class="form-group m-0">
			    <button type="submit" class="btn btn-primary btn-block" name="btnlogin">
					Login
				</button>
			</div>
            <p class="message">Forgot Password? <a href="forgotpassword/forgot-password.php">click here</a></p>
            <p class="message">Not registered? <a href="../register/register.php">Create an account</a></p>
            <p class="message">Back to main menu? <a href="../index.php">Back</a></p>
          </form>
        </div>
    </div>

    <?php 
    if(isset($_POST['btnlogin']))
    {
        // $hash = '$2y$10$qdpMsyUvL2DX1PfWCDvWYORP0e/CdWjMJMdw/Ym5g9zcHiBYZqg2a';
        // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        // if(password_verify($_POST['password'], $hash)){
        //     echo "password is correct";
        //     echo "<br>";
        // }
        // else{
        //     echo "password is incorrect";
        //     echo "<br>";
        // }
        // echo "Hash = $hash";
        // echo "<br>";
        // echo "Hasil Hash = $password";

        require ("../koneksi.php");
        $user_login=$_POST['username'];
        $pass_login=sha1($_POST['password']);
        $sql = "SELECT * FROM akun WHERE username = '{$user_login}' OR email = '{$user_login}' and password = '{$pass_login}'";
        $query = mysqli_query($koneksi, $sql);

        while($row = mysqli_fetch_array($query)){
            $iduser = $row['id'];
            $user=$row['username'];
            $pass=$row['password'];
            $email=$row['email'];
            $level = $row['level'];
        }
        if($user_login == $user || $email && $pass_login ==$pass){
            echo "Username: $user_login dan Password: $pass_login";
            header ("Location: ../stockbarang/index.php");
            $_SESSION['iduser'] = $iduser;
            $_SESSION['username'] = $user ;
            $_SESSION['email'] = $email;
            $_SESSION['level'] = $level;
        } else{
            echo "LOGIN GAGAL";
        }
    }
    ?>

</body>
</html>
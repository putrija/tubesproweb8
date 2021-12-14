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
            <p class="message">Not registered? <a href="../register/register.html">Create an account</a></p>
          </form>
        </div>
    </div>

    <?php 
    if(isset($_POST['btnlogin']))
    {
        require ("../koneksi.php");
        $user_login=$_POST['username'];
        $pass_login=$_POST['password'];
        $sql = "SELECT * FROM akun WHERE username = '{$user_login}' OR email = '{$user_login}' and password = '{$pass_login}'";
        $query = mysqli_query($koneksi, $sql);

        while($row = mysqli_fetch_array($query)){
            $user=$row['username'];
            $pass=$row['password'];
            $email=$row['email'];
        }
        if($user_login == $user || $email && $pass_login ==$pass){
            echo "Username: $user_login dan Password: $pass_login";
            header ("Location: ../stockbarang/index.php");
            $_SESSION['username'] = $user ;
            $_SESSION['email'] = $email;
        } else{
            echo "LOGIN GAGAL";
        }
    }
    ?>

</body>
</html>
<?php include "include/header.php"; ?>

<?php 
require ("../koneksi.php");
if(empty($_SESSION['username'])){
    header("Location: error.html");
}
 ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="row mt-5">
                            <div class="col-md-5">
                            <form action="" method="POST">
                            <input class="form-control mb-3" name="oldPassword" type="password" placeholder="Masukkan Password Lama">
                            <input class="form-control mb-3" name="newPassword" type="password" placeholder="Masukkan Password Baru">
                            <input class="form-control mb-3" name="confirmPassword" type="password" placeholder="Masukkan Password Baru (Lagi)">
                            <button name="ubah" class="btn btn-primary" type="submit">Ubah</button>
                        </form>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <?php
        if(isset($_POST['ubah'])){
            $oldPassword = sha1($_POST['oldPassword']);
            $newPassword = sha1($_POST['newPassword']);
            $confirmPassword = sha1($_POST['confirmPassword']);
            $username = $_SESSION['username'];
            $query = mysqli_query($koneksi, "SELECT * FROM akun WHERE username = '$username'");
            $data = mysqli_fetch_array($query);
            if($oldPassword == $data['password']){
                if($newPassword == $confirmPassword){
                    $query = mysqli_query($koneksi, "UPDATE akun SET password = '$newPassword' WHERE username = '$username'");
                    if($query){
                        echo "<script>alert('Password Berhasil Diubah');</script>";
                        echo "<script>location='index.php';</script>";
                    }else{
                        echo "<script>alert('Password Gagal Diubah');</script>";
                        echo "<script>location='index.php';</script>";
                    }
                }else{
                    echo "<script>alert('Password Baru Tidak Sama');</script>";
                    echo "<script>location='index.php';</script>";
                }
            }else{
                echo "<script>alert('Password Lama Salah');</script>";
                echo "<script>location='index.php';</script>";
            }
        }
        ?>
<?php include "include/footer.php"; ?>
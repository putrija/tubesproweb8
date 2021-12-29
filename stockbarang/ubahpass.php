<?php 
require ("../koneksi.php");
if(empty($_SESSION['username'])){
    header("Location: error.html");
}
 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Barang Masuk</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">EightO</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo "$_SESSION[username]"; ?> </span>
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="<i class='fas fa-sign-out-alt'></i>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item"href="ubahpass.php">Ubah Password</a>
                        <a class="dropdown-item" href="../index.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <?php if($_SESSION['level'] == 'admin'){ ?>
                            <a class="nav-link" href="index.php">
                                Gudang
                            </a>
                            <?php } ?>
                            <a class="nav-link" href="masuk.php">
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="keluar.php">
                                Barang Keluar
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Tambah Barang</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <form method="POST">
                <div class="modal-body">
                    <input type="text" name="namabarang" placeholder="Nama Barang" class="form-control" required>
                    <br>
                    <input type="text" name="deskripsi" placeholder="Deskripsi Barang" class="form-control" required>
                    <br>
                    <input type="number" name="stock" placeholder="stock" class="form-control" required>
                    <br>
                    <button type="submit" class="btn btn-primary" name="tambahbarangbaru">Submit</button>
                </div>
                </form>
                
            </div>
            </div>
        </div>


</html>
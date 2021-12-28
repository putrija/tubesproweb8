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
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap');
        .roboto {
            font-family: 'Roboto Slab', serif;
        }
        .nav-link {
            text-decoration: none;
        }
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

        
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <button class="btn btn-link btn-sm order-1 order-lg-0 ml-3" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <a class="navbar-brand ml-3" href="index.php"><img src="../images/logo.png" width="75px"></a>
            
            
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo "$_SESSION[username]"; ?><i class="fas fa-user fa-fw ml-3"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item"href="ubahpass.php">Ubah Password</a>
                        <a class="dropdown-item" href="../logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading roboto"style="font-size:25px;"><center>Menu</center><hr style="background-color:white;"></div>
                            <?php if($_SESSION['level'] == 'admin'){ ?>
                            <a class="nav-link roboto " href="index.php"><i class='fas fa-box-open mr-3' style='font-size:24px'></i>
                                Gudang
                            </a>
                            <?php } ?>
                            <a class="nav-link roboto" href="masuk.php"><i class='fas fa-truck-loading mr-3' style='font-size:24px'></i>
                                Barang Masuk
                            </a>
                            <a class="nav-link roboto" href="keluar.php"><i class='fas fa-truck-moving mr-3' style='font-size:24px'></i>
                                Barang Keluar
                            </a>
                            <?php if($_SESSION['level'] == 'admin'){ ?>
                            <a class="nav-link roboto" href="saran.php"><i class='far fa-edit mr-3' style="font-size:25px;"></i>
                                Saran
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
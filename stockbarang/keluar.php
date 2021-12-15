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
        <title>Barang Keluar</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">EightO</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo "$_SESSION[username]"; ?> </span>
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
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
                            <div class="sb-sidenav-menu-heading">Welcome</div>
                            <a class="nav-link" href="index.php">
                                Gudang
                            </a>
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
                        <h1 class="mt-4">Barang Keluar</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    Ambil barang
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah</th>
                                                <th>Penerima</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php 
                                                $ambilsemuadatastock = mysqli_query($koneksi,"select * from keluar k, stok s where s.idbarang = k.idbarang");
                                                while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                                    $tanggal= $data['tanggal'];
                                                    $namabarang = $data['namabarang'];
                                                    $kuantitas = $data['kuantitas'];
                                                    $penerima = $data['penerima'];
                                                
                                                ?>

                                                <tr>
                                                    <td><?=$tanggal?></td>
                                                    <td><?=$namabarang;?></td>
                                                    <td><?=$kuantitas;?></td>
                                                    <td><?=$penerima;?></td>
                                                </tr>

                                                <?php 

                                                };
                                                
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
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

    <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Barang Keluar</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method="POST">
        <div class="modal-body">
        <select name="barangnya" class="form-control" >
                <?php 
                    $ambildata =  mysqli_query($koneksi, "select * from stok");
                    while($fetcharray = mysqli_fetch_array($ambildata)) {
                        $namabarangnya = $fetcharray ['namabarang'];
                        $idbarangnya = $fetcharray ['idbarang'];
                ?>

                <option value="<?=$idbarangnya;?>"> <?=$namabarangnya;?></option>

                <?php
                    }
                ?>
            </select>
            <br>
            <input type="number" name="kuantitas" placeholder="kuantitas" class="form-control" required>
            <br>
            <input type="text" name="penerima" placeholder="penerima" class="form-control" required>
            <br>
            <button type="submit" class="btn btn-primary" name="barangkeluar">Submit</button>
        </div>
        </form>
        
      </div>
    </div>
  </div>
</html>

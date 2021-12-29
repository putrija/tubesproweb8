<?php 
include "include/header.php"; 
if($_SESSION['level'] == 'user'){
    header("Location: masuk.php");
}
?>
<h1 class="mt-4">Stock Barang</h1>

<div class="card mb-4">
    <div class="card-header">
        <!-- Button to Open Isi Barang -->
        <a href="isibarang.php" class="btn btn-info">Tambah Barang</a>
        <a href="export.php" class="btn btn-info">Export Barang</a>
    </div>
    <div class="card-body">



    <?php 
        $ambildatastock = mysqli_query($koneksi, "select * from stok where stock < 1");
        while($fetch = mysqli_fetch_array($ambildatastock)) {
            $barang = $fetch['namabarang'];
        
    ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Stok Habis!</strong> Stok <?=$barang?> telah habis...
    </div>
    <?php 
        }
    ?>


    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Stock</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?php 
                $ambilsemuadatastock = mysqli_query($koneksi,"select * from stok");
                $i=1;
                while($data=mysqli_fetch_array($ambilsemuadatastock)){
                    $namabarang = $data['namabarang'];
                    $deskripsi = $data['deskripsi'];
                    $image = $data['image'];
                    $stock = $data['stock'];
                    $idbarangg = $data['idbarang'];
                
                ?>

                <tr>
                    <td><?=$i++?></td>
                    <td><?=$namabarang;?></td>
                    <td><?=$deskripsi;?></td>
                    <td><?=$image;?></td>
                    <td><?=$stock;?></td>
                    <td> 
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idbarangg?>">
                        Edit
                        </button>
                        <input type="hidden" name="idbarangygmaudihapus" value="<?=$idbarangg;?>">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idbarangg?>">
                        Delete
                        </button>
                    </td>
                </tr>

                <!-- EDIT Modal -->
                <div class="modal fade" id="edit<?=$idbarangg;?>">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    
                        <!-- Modal Header -->
                        <div class="modal-header">
                        <h4 class="modal-title">Edit Barang</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <form method="POST">
                        <div class="modal-body">
                            <input type="text" name="namabarang" value="<?=$namabarang;?>" class="form-control" required>
                            <br>
                            <input type="text" name="deskripsi" value="<?=$deskripsi;?>" class="form-control" required>
                            <br>
                            <input type="number" name="kuantitas" value="<?=$kuantitas;?>" class="form-control" required>
                            <br>
                            <input type="hidden" name="idbarangg" value="<?=$idbarangg;?>">
                            <button type="submit" class="btn btn-primary" name="updatebarang">Submit</button>
                        </div>
                        </form>
                        
                    </div>
                    </div>
                </div>

                <!-- DELETE Modal -->
                <div class="modal fade" id="delete<?=$idbarangg;?>">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    
                        <!-- Modal Header -->
                        <div class="modal-header">
                        <h4 class="modal-title">Hapus Barang</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <form method="POST">
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus <?=$namabarang?>?
                            <input type="hidden" name="idbarangg" value="<?=$idbarangg;?>">
                            <input type="hidden" name="namabarang" value="<?=$namabarang;?>">
                            <br> <br>
                            <button type="submit" class="btn btn-danger" name="hapusbarang">Hapus</button>
                        </div>
                        </form>
                        
                    </div>
                    </div>
                </div>

                <?php 

                };
                
                ?>

            </tbody>
        </table>
    </div>
    </div>
</div>
<?php include "include/footer.php"; ?>
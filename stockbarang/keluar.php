<?php include "include/header.php"; ?>
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
                                                <?php if($_SESSION['level'] == 'admin'){ ?>
                                                <th></th>
                                                        <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php 
                                                $ambilsemuadatastock = mysqli_query($koneksi,"select * from keluar k, stok s where s.idbarang = k.idbarang");
                                                while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                                    $idbarangg= $data['idbarang'];
                                                    $idkeluar = $data['idkeluar'];
                                                    $tanggal= $data['tanggal'];
                                                    $namabarang = $data['namabarang'];
                                                    $kuantitas = $data['kuantitas'];
                                                    $penerima = $data['penerima'];
                                                
                                                ?>

                                                <tr>
                                                    <td><?=$tanggal?></td>
                                                    <td><?=$namabarang;?></td>
                                                    <td><?=$kuantitas;?></td>
                                                    <td><?php echo "$_SESSION[username]";?></td>
                                                    <?php if($_SESSION['level'] == 'admin'){ ?>
                                                    <td> 
                                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idkeluar?>">
                                                            Edit
                                                        </button>
                                                        <input type="hidden" name="idbarangygmaudihapus" value="<?=$idbarangg;?>">
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idkeluar?>">
                                                            Delete
                                                        </button>
                                                    </td>
                                                    <?php } ?>
                                            </tr>

                                            <!-- EDIT Modal -->
                                            <div class="modal fade" id="edit<?=$idkeluar;?>">
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
                                                        <input type="text" name="penerima" value="<?=$penerima;?>" class="form-control"  required>
                                                        <br>
                                                        <input type="number" name="kuantitas" value="<?=$kuantitas;?>" class="form-control"  required>
                                                        <br>
                                                        <input type="hidden" name="idbarangg" value="<?=$idbarangg;?>">
                                                        <input type="hidden" name="idkeluar" value="<?=$idkeluar;?>">
                                                        <button type="submit" class="btn btn-primary" name="updatebarangkeluar">Submit</button>
                                                    </div>
                                                    </form>
                                                    
                                                </div>
                                                </div>
                                            </div>

                                            <!-- DELETE Modal -->
                                            <div class="modal fade" id="delete<?=$idkeluar;?>">
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
                                                        <input type="hidden" name="idkeluar" value="<?=$idkeluar;?>">
                                                        <input type="hidden" name="kuantitas" value="<?=$kuantitas;?>">
                                                        <br> <br>
                                                        <button type="submit" class="btn btn-danger" name="hapusbarangkeluar">Hapus</button>
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

    <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ambil Barang</h4>
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
            <button type="submit" class="btn btn-primary" name="barangkeluar">Submit</button>
        </div>
        </form>
        
      </div>
    </div>
  </div>
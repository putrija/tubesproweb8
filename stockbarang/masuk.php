<?php include "include/header.php"; ?>
<h1 class="mt-4">Barang Masuk</h1>
<div class="card mb-4">
    <div class="card-header">
        <!-- Button to Open Isi Barang -->
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">
            Tambah barang
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Pengirim</th>
                        <?php if($_SESSION['level'] == 'admin'){ ?>
                        <th></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>

                <?php 
                    $ambilsemuadatastock = mysqli_query($koneksi,"select * from masuk m, stok s where s.idbarang = m.idbarang");
                    while($data=mysqli_fetch_array($ambilsemuadatastock)){
                        $idbarangg = $data['idbarang'];
                        $idmasuk = $data ['idmasuk'];
                        $tanggal= $data['tanggal'];
                        $namabarang = $data['namabarang'];
                        $kuantitas = $data['kuantitas'];
                        $keterangan = $data['keterangan'];
                    
                    ?>

                    <tr>
                        <td><?=$tanggal?></td>
                        <td><?=$namabarang;?></td>
                        <td><?=$kuantitas;?></td>
                        <td><?php echo "$_SESSION[username]";?></td>
                        <?php if($_SESSION['level'] == 'admin'){ ?>
                        <td> 
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idmasuk?>">
                                    Edit
                                </button>
                                <input type="hidden" name="idbarangygmaudihapus" value="<?=$idbarangg;?>">
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idmasuk?>">
                                    Delete
                                </button>
                            </td>
                            <?php } ?>
                    </tr>

                    <!-- EDIT Modal -->
                    <div class="modal fade" id="edit<?=$idmasuk;?>">
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
                                <input type="text" name="keterangan" value="<?=$keterangan;?>" class="form-control" required>
                                <br>
                                <input type="number" name="kuantitas" value="<?=$kuantitas;?>" class="form-control" required>
                                <br>
                                <input type="hidden" name="idbarangg" value="<?=$idbarangg;?>">
                                <input type="hidden" name="idmasuk" value="<?=$idmasuk;?>">
                                <button type="submit" class="btn btn-primary" name="updatebarangmasuk">Submit</button>
                            </div>
                            </form>
                            
                        </div>
                        </div>
                    </div>

                    <!-- DELETE Modal -->
                    <div class="modal fade" id="delete<?=$idmasuk;?>">
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
                                <input type="hidden" name="idmasuk" value="<?=$idmasuk;?>">
                                <input type="hidden" name="kuantitas" value="<?=$kuantitas;?>">
                                <br> <br>
                                <button type="submit" class="btn btn-danger" name="hapusbarangmasuk">Hapus</button>
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
          <h4 class="modal-title">Tambah Barang Masuk</h4>
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
            <input type="number" name="kuantitas" placeholder="Jumlah" class="form-control" required>
            <br>
            <input type="hidden" name="keterangan" placeholder="Pengirim" class="form-control" >
            <br>
            <button type="submit" class="btn btn-primary" name="barangmasuk">Submit</button>
        </div>
        </form>
        
      </div>
    </div>
  </div>
<?php include "include/header.php"; ?>

<a href="../isibarang.php">Back?</a>

<?php
    $ambil = $koneksi->query("SELECT * FROM barang WHERE id_kategori='$_GET[category]'");
?>
<div class="container">
    <div class="row mt-5">
        <?php while ($pecah = mysqli_fetch_assoc($ambil)) { ?>
            <?php if($pecah['jumlah']==0) { ?>
                <div class="col-md-3 mb-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?= $pecah['nama_barang']; ?></h5>
                        <img src="../img/<?php echo $pecah['image']; ?>" height="200px" alt="gambar">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahBarangModal" data-title="<?= $pecah['nama_barang'];?>"  data-idbarang="<?= $pecah['id']; ?>" data-deskripsi="<?= $pecah['deskripsi'];?>">Tambah</button>
                    </div>
                </div>
            </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="tambahBarangModal" tabindex="-1" aria-labelledby="tambahBarangModalLabel" aria-hidden="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahBarangModalLabel"></h5>
                </div>
                <div class="modal-body">
                    <h6 id="nama-barang"></h6>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah">
                        <input type="hidden" name="idBarang" id="idBarang">
                        <input type="hidden" name="nama_barang" id="nama_barang">
                        <input type="hidden" name="deskripsi" id="deskripsi">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>
    $('#tambahBarangModal').on('show.bs.modal', function(event) {
        const button = $(event.relatedTarget)
        const title = button.data('title')
        const idBarang = button.data('idbarang')
        const deskripsi = button.data('deskripsi')
        $('#idBarang').val(idBarang)
        const modal = $(this)
        modal.find('.modal-title').text('Tambah ' + title)
        
        $('#nama_barang').val(title)
        $('#deskripsi').val(deskripsi)
    })
</script>

<?php
if (isset($_POST['simpan'])) {
    $idBarang = $_POST['idBarang'];
    $nama_barang = $_POST['nama_barang'];
    $deskripsi = $_POST['deskripsi'];
    $jumlah = $_POST['jumlah'];


    $masukkebarang= mysqli_query($koneksi,"UPDATE barang SET jumlah = jumlah + '$_POST[jumlah]' WHERE id = '$idBarang'");
    
    $masukkestok= mysqli_query($koneksi, "INSERT INTO stok (namabarang, deskripsi, stock) values('$nama_barang', '$deskripsi', '$jumlah') ");

    echo "<script>alert('Data Berhasil Ditambahkan');</script>";
    echo "<script>location='../index.php';</script>";
}
?>


<?php include "include/footer.php"; ?>
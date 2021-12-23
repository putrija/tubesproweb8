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
                        <h5 class="card-title"><?= $pecah['deskripsi']; ?></h5>
                        <h5 class="card-title"><?= $pecah['jumlah']; ?></h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahBarangModal" data-title="<?= $pecah['nama_barang'];?> data-deskripsi="<?= $pecah['deskripsi']; ?> data-idbarang="<?= $pecah['id']; ?>">Tambah</button>
                    </div>
                </div>
            </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="tambahBarangModal" tabindex="-1" aria-labelledby="tambahBarangModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahBarangModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 id="nama-barang"></h6>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah">
                        <input type="hidden" name="idBarang" id="idBarang">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $('#tambahBarangModal').on('show.bs.modal', function(event) {
        const button = $(event.relatedTarget)
        const title = button.data('title')
        const idBarang = button.data('idbarang')
        $('#idBarang').val(idBarang)
        const modal = $(this)
        modal.find('.modal-title').text('Tambah ' + title)
    })
</script>

<?php
if (isset($_POST['simpan'])) {
    $koneksi= mysqli_query("UPDATE barang SET jumlah = jumlah + '$_POST[jumlah]' WHERE id = '$_POST[idBarang]'");
    $tambahkestok = mysqli_query("UPDATE stok SET stock = '$_POST[jumlah]' where id='$_POST[idBarang]'");
    echo "<script>alert('Data Berhasil Ditambahkan');</script>";
    echo "<script>location='index.php?page=category&category=$_POST[idCategory]';</script>";
}
?>


<?php include "include/footer.php"; ?>
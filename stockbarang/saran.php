<?php 
    include "include/header.php";
?>



<?php 
$ambil = $koneksi -> query("SELECT * FROM saran JOIN akun ON saran.iduser = akun.id");
$no = 1;
while ($pecah = $ambil -> fetch_assoc()) { ?>
<div class="row mt-5">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"><?php echo $pecah['username'] ?></h3>
                <p class="card-text"><?php echo $pecah['isi'] ?></p>
                <a href="saran.php?id=<?php echo $pecah['id'] ?>" class="btn btn-primary">Lihat</a>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php 
    include "include/footer.php";
?>
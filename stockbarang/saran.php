<?php 
    include "include/header.php";
    $time = time();
?>



<?php 
$ambil = $koneksi -> query("SELECT * FROM saran JOIN akun ON saran.iduser = akun.id ORDER BY waktu DESC");
$no = 1;
$sudahada = [];
while ($pecah = $ambil -> fetch_assoc()) { ?>
<div style="width: 100%;" class="mt-5">
    <?php if(!in_array($pecah['username'], $sudahada)&&($pecah['level']!='admin')) : ?>
    <div style="width: 100%;" class="">
        <div style="width: 95%;" class="card">
            <div class="card-body">
                <h3 class="card-title"><?php echo $pecah['username'] ?></h3>
                <p class="card-text"><?php echo $pecah['isi'] ?></p>
                <a href="saran.php?id=<?php echo $pecah['id'] ?>&balas=true" class="btn btn-primary">Lihat</a>
            </div>
            <?php if(isset($_GET['balas'])): ?>
            <?php if($_GET['id'] == $pecah['id']): ?>
            <div class="card-body">
                <?php 
                    $idpengguna = $pecah['id'];
                    $iduser = $_SESSION['iduser'];
                    $level = $_SESSION['level'];
                    $result = mysqli_query($koneksi, "SELECT * FROM saran WHERE (iduser = '$iduser' AND tujuan = '$idpengguna') OR iduser = '$idpengguna'");
                    $rows = [];
                    while($row = mysqli_fetch_assoc($result)) {
                        $rows[] = $row;
                    }
                    $komennya = $rows;
                ?>
                <h1 class="mt-4">Kolom Komentar</h1>
                <div class="card mb-4">

                <h3>Komentarnya</h3>
                <div style="width: 50%;height:300px;">
                    <?php foreach($komennya as $kmn): ?>
                        <div>
                                <?= $kmn['isi']; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="table-responsive mt-5">
                    <form action="" method="post">
                        <textarea style="height: 50px;" placeholder="Masukkan Saran" name="isi" id="isi" class="form-control" rows="10"></textarea>
                        <br/>
                        <button name="kirim" class="btn btn-secondary" type="submit">Kirim</button>
                    </form>
                </div>

        <?php 
            if(isset($_POST['kirim'])){
                $isi = $_POST['isi'];
                $iduser = $_SESSION['iduser'];
                $time = time();

                $koneksi->query("INSERT INTO saran (iduser, isi, waktu, tujuan, level) VALUES ('$iduser', '$isi', '$time', '$idpengguna', '$level')");
                echo "<meta http-equiv='refresh' content='0;url=masuk.php'>";
            }
        
        ?>
            </div>
            <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php else: ?>
    <?php endif; ?>
    <?php $sudahada[] = $pecah['username']; ?>
</div>
<?php } ?>
<?php 
    include "include/footer.php";
?>
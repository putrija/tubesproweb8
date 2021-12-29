<?php include "include/header.php"; ?>
<?php 
    $iduser = $_SESSION['iduser'];
    $level = $_SESSION['level'];
    $result = mysqli_query($koneksi, "SELECT * FROM saran WHERE iduser = '$iduser' OR (level = 'admin' AND tujuan = '$iduser')");
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
                <textarea placeholder="Masukkan Saran" name="isi" id="isi" class="form-control" rows="10"></textarea>
                <button name="kirim" class="btn btn-primary" type="submit">Kirim</button>
            </form>
        </div>

        <?php 
            if(isset($_POST['kirim'])){
                $isi = $_POST['isi'];
                $iduser = $_SESSION['iduser'];
                $time = time();

                $koneksi->query("INSERT INTO saran (iduser, isi, waktu, tujuan, level) VALUES ('$iduser', '$isi', '$time', 'umum', '$level')");
                echo "<meta http-equiv='refresh' content='0;url=masuk.php'>";
            }
        
        ?>
</div>
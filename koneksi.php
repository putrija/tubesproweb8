<?php

if(!isset($_SESSION)){
    session_start();
}

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'stokbarang';

    //membuat koneksi ke database
    $koneksi = mysqli_connect($host , $user , $pass, $database);

    //menambah barang baru
    if(isset($_POST['tambahbarangbaru'])){
        $namabarang = $_POST['namabarang'];
        $deskripsi = $_POST['deskripsi'];
        $stock = $_POST['stock'];

        $menambahkanketabelstok = mysqli_query($koneksi, "insert into stok (namabarang, deskripsi, stock) values('$namabarang', '$deskripsi', '$stock')");
        
    }

    //menambah barang masuk 
    if(isset($_POST['barangmasuk'])){
        $barangnya = $_POST['barangnya'];
        $keterangan = $_POST['keterangan'];
        $kuantitas = $_POST['kuantitas'];

        $cekstoksekarang= mysqli_query($koneksi, "select * from stok where idbarang='$barangnya'");
        $ambildata = mysqli_fetch_array($cekstoksekarang);

        $stoksekarang = $ambildata['stock'];
        $penambahanstoksekarangdengankuantitas = $stoksekarang + $kuantitas;

        $menambahkanketabelmasuk = mysqli_query($koneksi, "insert into masuk (idbarang, keterangan, kuantitas) values ('$barangnya', '$keterangan', '$kuantitas')");
        $updatestockmasuk = mysqli_query($koneksi, "update stok set stock='$penambahanstoksekarangdengankuantitas' where idbarang='$barangnya'");

    }

    //mengurangi barang keluar 
    if(isset($_POST['barangkeluar'])){
        $barangnya = $_POST['barangnya'];
        $penerima = $_POST['penerima'];
        $kuantitas = $_POST['kuantitas'];

        $cekstoksekarang= mysqli_query($koneksi, "select * from stok where idbarang='$barangnya'");
        $ambildata = mysqli_fetch_array($cekstoksekarang);

        $stoksekarang = $ambildata['stock'];
        $penguranganstoksekarangdengankuantitas = $stoksekarang - $kuantitas;

        $penguranganketabelkeluar = mysqli_query($koneksi, "insert into keluar (idbarang, penerima, kuantitas) values ('$barangnya', '$penerima', '$kuantitas')");
        $updatestockkeluar = mysqli_query($koneksi, "update stok set stock='$penguranganstoksekarangdengankuantitas' where idbarang='$barangnya'");

    }

    //update barang 
    if(isset($_POST['updatebarang'])) {
        $idbarang = $_POST['idbarangg'];
        $namabarang = $_POST['namabarang'];
        $deskripsi = $_POST['deskripsi'];
        

        $update = mysqli_query($koneksi, "update stok set namabarang='$namabarang', deskripsi='$deskripsi' where idbarang='$idbarang'");

    }

    //hapus barang
    if(isset($_POST['hapusbarang'])) {
        $idbarang = $_POST['idbarangg'];

        $hapus = mysqli_query($koneksi, "delete from stok where idbarang='$idbarang'");
    }

    //mengubah data barang masuk
    if(isset($_POST['updatebarangmasuk'])) {
        $idbarang = $_POST['idbarangg'];
        $idbarang = $_POST['idbarangg'];
        $namabarang = $_POST['namabarang'];
        $kuantitas = $_POST['kuantitas'];

        $lihatstock = mysqli_query($koneksi, "select * from stok where idbarang='$idbarangg'");
        $stocknya = mysqli_fetch_array($lihatstock);
        $stockskrg = $stocknya ['stockskrg']
    }

?>
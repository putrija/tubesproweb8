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
        if($menambahkanketabelstok){
            header('Location: stockbarang/index.php');
        }else {
            echo 'Gagal';
            header('location: stockbarang/index.php');
        }
    }

?>
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

    if($koneksi -> connect_error){
        die("Koneksi Gagal: " .$koneksi -> connect_error);
    }

    //menambah barang baru
    if(isset($_POST['tambahbarangbaru'])){
        $namabarang = $_POST['namabarang'];
        $deskripsi = $_POST['deskripsi'];
        $stock = $_POST['stock'];

        $menambahkanketabel = mysqli_query($koneksi, "insert into stok (namabarang, deskripsi, stock) values('$namabarang', '$deskripsi', '$stock')");
        if($menambahkanketabel){
            header('location:stockbarang/index.php');
        } else {
            echo 'Gagal';
            header('location:stockbarang/index.php');
        }
    }
?>
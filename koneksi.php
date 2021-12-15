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
        $penerima = $_POST['penerima'];

        $menambahkanketabelmasuk = mysqli_query($koneksi, "insert into masuk (idbarang, keterangan) values ('$barangnya', '$penerima')");
    }

?>
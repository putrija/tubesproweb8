<?php include "include/header.php"; 
include "koneksi.php";

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'barang':
            include 'isibarang.php';
            break;
        case 'category':
            include 'category.php';
            break;

        default:
            include 'isibarang.php';
            break;
    }
} else {
    include 'isibarang.php';
}


include "include/footer.php"; ?>
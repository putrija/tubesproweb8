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
        $kuantitas = $_POST['kuantitas'];
        

        $update = mysqli_query($koneksi, "update stok set namabarang='$namabarang', deskripsi='$deskripsi', stock='$kuantitas' where idbarang='$idbarang'");

    }

    //hapus barang
    if(isset($_POST['hapusbarang'])) {
        $idbarang = $_POST['idbarangg'];

        $hapus = mysqli_query($koneksi, "delete from stok where idbarang='$idbarang'");
    }

    //mengubah data barang masuk
    if(isset($_POST['updatebarangmasuk'])) {
        $idbarang = $_POST['idbarangg'];
        $idmasuk = $_POST['idmasuk'];
        $keterangan = $_POST['keterangan'];
        $kuantitas = $_POST['kuantitas'];

        $lihatstock = mysqli_query($koneksi, "select * from stok where idbarang='$idbarang'");
        $stocknya = mysqli_fetch_array($lihatstock);
        $stockskrg = $stocknya ['stock'];

        $kuantitasskrg=mysqli_query($koneksi, "select * from masuk where idmasuk='$idmasuk'");
        $kuantitasnya = mysqli_fetch_array($kuantitasskrg);
        $kuantitasskrg= $kuantitasnya ['kuantitas'];

        if($kuantitas>$kuantitasskrg){
            $selisih = $kuantitas-$kuantitasskrg;
            $kurangin = $stockskrg + $selisih; 
            $kurangistocknya = mysqli_query($koneksi, "update stok set stock ='$kurangin' where idbarang='$idbarang'");
            $update = mysqli_query($koneksi, "update masuk set kuantitas='$kuantitas', keterangan='$keterangan' where idmasuk='$idmasuk' ");
        } else {
            $selisih = $kuantitasskrg-$kuantitas;
            $kurangin = $stockskrg - $selisih; 
            $kurangistocknya = mysqli_query($koneksi, "update stok set stock ='$kurangin' where idbarang='$idbarang'");
            $update = mysqli_query($koneksi, "update masuk set kuantitas='$kuantitas', keterangan='$keterangan' where idmasuk='$idmasuk' ");
        }
    }

    //menghapus barang masuk 
    if(isset($_POST['hapusbarangmasuk'])) {
        $idbarang = $_POST['idbarangg'];
        $idmasuk = $_POST['idmasuk'];
        $kuantitas = $_POST['kuantitas'];

        $getdatastock =mysqli_query($koneksi, "select * from stok where idbarang='$idbarang'");
        $data = mysqli_fetch_array($getdatastock);
        $stok = $data ['stock'];

        $selisih = $stok-$kuantitas;

        $update = mysqli_query($koneksi, "update stok set stock='$selisih' where idbarang='$idbarang'");
        $hapusdata = mysqli_query($koneksi, "delete from masuk where idmasuk='$idmasuk'");
    }



    //mengubah data barang keluar
    if(isset($_POST['updatebarangkeluar'])) {
        $idbarang = $_POST['idbarangg'];
        $idkeluar = $_POST['idkeluar'];
        $penerima = $_POST['penerima'];
        $kuantitas = $_POST['kuantitas'];

        $lihatstock = mysqli_query($koneksi, "select * from stok where idbarang='$idbarang'");
        $stocknya = mysqli_fetch_array($lihatstock);
        $stockskrg = $stocknya ['stock'];

        $kuantitasskrg=mysqli_query($koneksi, "select * from keluar where idkeluar='$idkeluar'");
        $kuantitasnya = mysqli_fetch_array($kuantitasskrg);
        $kuantitasskrg= $kuantitasnya ['kuantitas'];

        if($kuantitas>$kuantitasskrg){
            $selisih = $kuantitas-$kuantitasskrg;
            $kurangin = $stockskrg - $selisih; 
            $kurangistocknya = mysqli_query($koneksi, "update stok set stock ='$kurangin' where idbarang='$idbarang'");
            $update = mysqli_query($koneksi, "update keluar set kuantitas='$kuantitas', penerima='$penerima' where idkeluar='$idkeluar' ");
        } else {
            $selisih = $kuantitasskrg-$kuantitas;
            $kurangin = $stockskrg + $selisih; 
            $kurangistocknya = mysqli_query($koneksi, "update stok set stock ='$kurangin' where idbarang='$idbarang'");
            $update = mysqli_query($koneksi, "update keluar set kuantitas='$kuantitas', penerima='$penerima' where idkeluar='$idkeluar' ");
        }
    }

    //menghapus barang keluar 
    if(isset($_POST['hapusbarangkeluar'])) {
        $idbarang = $_POST['idbarangg'];
        $idkeluar = $_POST['idkeluar'];
        $kuantitas = $_POST['kuantitas'];

        $getdatastock =mysqli_query($koneksi, "select * from stok where idbarang='$idbarang'");
        $data = mysqli_fetch_array($getdatastock);
        $stok = $data ['stock'];

        $selisih = $stok+$kuantitas;

        $update = mysqli_query($koneksi, "update stok set stock='$selisih' where idbarang='$idbarang'");
        $hapusdata = mysqli_query($koneksi, "delete from keluar where idkeluar='$idkeluar'");
    }

?>
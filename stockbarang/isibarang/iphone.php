<?php include "include/header.php"; ?>

<div class="card mb-3">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">iPhone A</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" name="A" >
        Tambah Barang
    </button>
  </div>
</div>

<div class="card mb-3">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">iPhone B</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" name="B" >
        Tambah Barang
    </button>
  </div>
</div>

  

<?php include "include/footer.php"; ?>

<?php 
    if(isset($_POST['tambahbarangbaru'])){

    }        
?>

<!-- The Modal -->
<div class="modal fade" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">
        
        <!-- Modal Header -->
        <div class="modal-header">
        <h4 class="modal-title">Tambah Barang</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method="POST">
        <div class="modal-body">
            <p><?php=  ?></p>
            <br>
            <input type="text" name="deskripsi" placeholder="Deskripsi Barang" class="form-control" required>
            <br>
            <input type="number" name="stock" placeholder="stock" class="form-control" required>
            <br>
            <button type="submit" class="btn btn-primary" name="tambahbarangbaru">Submit</button>
        </div>
        </form>
        <!-- 
            Bastian : Oiiiiiii
            Bastian : Puttttttt
            Bastian : Oi Puttt
            iya banggg
            ini untuk apa?
            kirain pake kesini bang
            file ini untuk apa?
            untuk ngisi nya bang, kan dibedain isi iphone ipad mac gt
            tapi dalam 1 tabel kan?
            kayaknya maksud abg beda deh
            iphone, ipad, mac, sama watch dalam 1 tabel kan?
            engga bangg, cuman linknya aja yg sama di awal, isinya beda halaman gitu maksudnya
            coba share screen lagi puttttttt
            kirim ke sini linknya
            link meet?
            ...
            iyaaaa
            https://meet.google.com/ysh-yqat-icf
         -->
            
        </div>
        </div>
    </div>
</div>


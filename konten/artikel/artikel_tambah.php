<?php
if (!isset($_SESSION["login"])){
    header("location: index.php");
    exit;
}
?>

<ul class="breadcrumb">
  <li>Home</li>
  <li class="active">Tambah Artikel</li>
</ul>

<h2>Tambah Artikel</h2>

<form action="?tampil=artikel_tambahProses" method="post" enctype="multipart/form-data" class="form-horizontal">
    <div class="form-group">
        <label for="judul" class="label-control col-md-2">Judul Artikel</label>
        <div class="col-md-4">
            <input type="text" name="judul" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label for="gambar" class="label-control col-md-2">Gambar</label>
        <div class="col-md-4">
            <input type="file" name="gambar" id="gambar" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label for="isi" class="label-control col-md-2">Isi Artikel</label>
        <div class="col-md-9">
            <textarea name="isi" cols="80" rows="20" id="isi" class="form-control tiny"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="label-control col-md-2"></label>
        <div class="col-md-4">
            <button type="submit" name="tambah" class="btn btn-primary">Tambah Artikel</button>
        </div>
    </div>
</form>
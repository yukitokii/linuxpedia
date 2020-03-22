<?php
include '../lib/functions.php';
$id = $_GET["id"];
$result = mysqli_query($conn, "SELECT * FROM galeri WHERE id_galeri='$id' ");
$row = mysqli_fetch_assoc($result);

?>


<h2 class="sub-header">Ubah Galeri</h2>

<form action="?tampil=galeri_editProses" method="post" enctype="multipart/form-data" class="form-horizontal">
    <input type="hidden" name="id" value="<?= $row["id_galeri"] ?>" >
    <div class="form-group">
        <label for="judul" class="label-control col-md-2">Judul Galeri</label>
        <div class="col-md-4">
            <input type="text" name="judul" required value="<?= $row["judul"] ?>" id="judul" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label for="gambar" class="label-control col-md-2">Gambar</label>
        <div class="col-md-4">
            <img src="../gambar/galeri/<?= $row["gambar"] ?>" width="300" class="img-responsive img-thumbnail">
            <input type="file" name="gambar" id="gambar" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="label-control col-md-2"></label>
        <div class="col-md-4">
            <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
        </div>
    </div>
</form>
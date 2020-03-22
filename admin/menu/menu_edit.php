<?php
include '../lib/functions.php';
$id = $_GET["id"];
$result = mysqli_query($conn, " SELECT * FROM menu WHERE id_menu=$id ");
$row = mysqli_fetch_assoc($result);
    $id_menu = $row["id_menu"];
    $judul = $row["judul"];
    $link = $row["link"];
    $urutan = $row["urutan"];

?>


<h2 class="sub-header">Edit Menu</h2>

<form action="?tampil=menu_editProses" method="post" class="form-horizontal">
    <input type="hidden" name="id_menu" value="<?= $id_menu ?>" >
    <div class="form-group">
        <label for="judul" class="label-control col-md-2">Judul Menu</label>
        <div class="col-md-4">
            <input type="text" name="judul" value="<?= $judul ?>" id="judul" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label for="link" class="label-control col-md-2">Link</label>
        <div class="col-md-4">
            <input type="text" name="link" value="<?= $link ?>" required id="link" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label for="urutan" class="label-control col-md-2">Urutan</label>
        <div class="col-md-4">
            <input type="text" name="urutan" value="<?= $urutan ?>" required id="urutan" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2"></label>
        <div class="col-md-4">
            <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
        </div>
    </div>
</form>
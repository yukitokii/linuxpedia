<?php
include '../lib/functions.php';
$id = $_GET["id"];
$query = " SELECT * FROM halaman WHERE id_halaman='$id' ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$judul = $row["judul"];
$isi = $row["isi"];
$id = $row["id_halaman"];

// var_dump($id);
?>

<h2 class="sub-header">Ubah Halaman</h2>

<form action="?tampil=halaman_editProses" method="post" class="form-horizontal">
    <input type="hidden" name="id" value="<?= $id; ?>">
    <div class="form-group">
        <label for="judul" class="label-control col-md-2">Judul Halaman</label>
        <div class="col-md-4">
            <input type="text" name="judul" value="<?= $judul; ?>" required id="judul" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label for="isi" class="label-control col-md-2">Isi Halaman</label>
        <div class="col-md-9">
            <textarea name="isi" cols="80" rows="20" required id="isi" class="form-control tiny"><?= $isi; ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2"></label>
        <div class="col-md-4">
            <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
        </div>
    </div>
</form>
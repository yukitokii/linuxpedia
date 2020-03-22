<?php
include 'lib/koneksi.php';

if (!isset($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

$id = $_GET["id"];
$query = " SELECT * FROM artikel WHERE id_artikel_user='$id' ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
// $id = $row["id_artikel"];
$judul = $row["judul"];
$isi = $row["isi"];
$gambar = $row["gambar"];

?>

<ul class="breadcrumb">
  <li>Home</li>
  <li class="active">Ubah Artikel</li>
</ul>

<h2>Ubah Artikel</h2>

<form action="?tampil=artikel_editProses" method="post" enctype="multipart/form-data" class="form-horizontal">
    <input type="hidden" name="id" value="<?= $id; ?>">
    <input type="hidden" name="namaGambarLama" value="<?= $gambar; ?>">
    <div class="form-group">
        <label for="judul" class="label-control col-md-2">Judul Artikel</label>
        <div class="col-md-5">
            <input type="text" name="judul" class="form-control" value="<?= $judul ?>" required>
        </div>
    </div>
    <div class="form-group">
        <label for="gambar" class="label-control col-md-2">Gambar</label>
        <div class="col-md-5">
            <img src="gambar/artikel/<?= $gambar; ?>" width="300" class="img-responsive img-thumbnail">
            <input type="file" name="gambar" id="gambar" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label for="isi" class="label-control col-md-2">Isi Artikel</label>
        <div class="col-md-10">
            <textarea name="isi" cols="80" rows="20" required id="isi" class="form-control tiny"><?= $isi ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="label-control col-md-2"></label>
        <div class="col-md-4">
            <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
        </div>
    </div>
</form>
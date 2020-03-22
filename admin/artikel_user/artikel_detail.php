<?php
include '../lib/functions.php';
$id = $_GET["id"];

$query = " SELECT * FROM artikel_user JOIN user ON artikel_user.id_user = user.id_user WHERE id_artikel_user='$id' ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$judul = $row["judul"];
$gambar = $row["gambar"];
$isi = $row["isi"];
$nama = $row["nama"];
$tanggal = $row["tanggal"];

?>

<div class="artikel sub-header col-md-8">
    <div class="col-md-12">
    <h2 class="judul text-left"> <?= $judul ?> </h2>
    <span class="text-muted text-left nama-user"><?= $nama ?> - <?= $tanggal ?> </span>
    </div>
    <div class="row">
    <div class="col-md-12 gambar">
    <?php if($gambar != "") : ?>
        <img src="../gambar/artikel/<?= $gambar ?>" class="img-responsive img-rounded center">
    <?php endif ?>
    </div>
    <div>
        <p><?= $isi ?></p>
    </div>
    </div>
</div>
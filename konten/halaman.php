<?php
include 'lib/koneksi.php';
$id = $_GET["id"];
$query = " SELECT * FROM halaman WHERE id_halaman='$id' ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$judul = $row["judul"];
$isi = $row["isi"];

?>

<ul class="breadcrumb">
  <li>Home</li>
  <li class="active"><?= $judul ?></li>
</ul>

<div class="halaman">
    <h2 class="judul"><?= $judul ?></h2>
    <p>
        <?= $isi ?>
    </p>
</div>
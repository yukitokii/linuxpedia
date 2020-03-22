<?php
if (isset($_GET["tampil"])) {
    $tampil = $_GET["tampil"];
} else {
    $tampil = "home";
}
?>

<div class="box">

    <?php
    if ($tampil == "home") {
        include 'konten/home.php';
    } elseif ($tampil == "halaman") {
        include 'konten/halaman.php';
    } elseif ($tampil == "galeri") {
        include 'konten/galeri.php';
    } elseif ($tampil == "artikel_detail") {
        include 'konten/artikel_detail.php';
    } elseif ($tampil == "kontak") {
        include 'konten/kontak.php';
    } elseif ($tampil == "kontak_proses") {
        include 'konten/kontak_proses.php';
    } elseif ($tampil == "pencarian") {
        include 'konten/pencarian.php';
    } elseif ($tampil == "komentar_proses") {
        include 'konten/komentar_proses.php';
    } elseif ($tampil == "login") {
        header("Location: login.php");
    } elseif ($tampil == "keluar") {
        include 'keluar.php';
    } elseif ($tampil == "user_edit") {
        include 'konten/user_edit.php';
    } elseif ($tampil == "user_editProses") {
        include 'konten/user_editProses.php';
    } elseif ($tampil == "artikel") {
        include 'konten/artikel/artikel_tampil.php';
    } elseif ($tampil == "artikel_tambah") {
        include 'konten/artikel/artikel_tambah.php';
    } elseif ($tampil == "artikel_tambahProses") {
        include 'konten/artikel/artikel_tambahProses.php';
    } elseif ($tampil == "artikel_edit") {
        include 'konten/artikel/artikel_edit.php';
    } elseif ($tampil == "artikel_editProses") {
        include 'konten/artikel/artikel_editProses.php';
    } elseif ($tampil == "artikel_hapus") {
        include 'konten/artikel/artikel_hapus.php';
    } elseif ($tampil == "halaman_admin") {
        include 'konten/admin.php';
    } else {
        echo "Halaman Tidak Ditemukan";
    }
    ?>

</div>
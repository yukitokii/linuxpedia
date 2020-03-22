<?php
include 'lib/koneksi.php';

if (!isset($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

$id = $_POST["id"];
$judul = htmlspecialchars($_POST["judul"]);
$isi = addslashes($_POST["isi"]);
$tanggal = date("Ymd");

$namaGambar = $_FILES["gambar"]["name"];
$tmpGambar = $_FILES["gambar"]["tmp_name"];
$error = $_FILES["gambar"]["error"];

move_uploaded_file($tmpGambar, "gambar/artikel/" . $namaGambar);

if ($error === 4) {
    $query = " UPDATE artikel SET judul='$judul', isi='$isi', tanggal='$tanggal' WHERE id_artikel_user='$id' ";
} else {
    $query = " SELECT * FROM artikel WHERE id_artikel_user='$id' ";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $gambar = $row["gambar"];

    if ($gambar != "") {
        unlink("gambar/artikel/" . $gambar);
    }
    $query = " UPDATE artikel SET judul='$judul', isi='$isi', tanggal='$tanggal',
    gambar='$namaGambar' WHERE id_artikel_user='$id' ";
}

$result = mysqli_query($conn, $query);

// update artikel user
$query = " UPDATE artikel_user SET judul='$judul' WHERE id_artikel_user = '$id' ";
$update = mysqli_query($conn, $query);

if ($result) {
    echo "
           <script>
                alert('Artikel berhasil diubah!');
           </script>
    ";
} else {
    echo "
           <script>
                alert('Artikel gagal diubah!');
           </script>
    ";
    echo mysqli_error($conn);
}


?>
<meta http-equiv="refresh" content="0; url=?tampil=artikel" />
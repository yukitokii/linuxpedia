<?php
include '../lib/functions.php';
$id = $_GET["id"];

$result = mysqli_query($conn, " SELECT gambar FROM artikel_user WHERE id_artikel_user='$id' ");
$row = mysqli_fetch_assoc($result);
$gambar = $row["gambar"];
$tanggal = date("Ymd");

if ($gambar != "") {
    unlink("../gambar/artikel/" . $gambar);
}

$result = mysqli_query($conn, " UPDATE artikel_user SET status='Ditolak', tanggal='$tanggal' WHERE id_artikel_user='$id' ");


if ($result) {
    echo "
           <script>
                alert('Artikel telah Ditolak!');
           </script>
    ";
} else {
    echo "
           <script>
                alert('Artikel gagal Ditolak!');
           </script>
    ";
    echo mysqli_error($conn);
}


?>

<meta http-equiv="refresh" content="0; url=?tampil=artikel_user" />
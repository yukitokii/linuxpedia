<?php
include 'lib/koneksi.php';

if (!isset($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

$id = $_GET["id"];

$result = mysqli_query($conn, " SELECT * FROM artikel WHERE id_artikel_user='$id' ");
$row = mysqli_fetch_assoc($result);
$gambar = $row["gambar"];
$id_artikel_user = $row["id_artikel_user"];

if ($gambar != "") {
    unlink("gambar/artikel/" . $gambar);
}

// ambil status artikel
$query = " SELECT * FROM artikel_user WHERE id_artikel_user = '$id' ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$status = $row["status"];

if ($status == "Ditolak") {
    $query = " DELETE FROM artikel_user WHERE id_artikel_user='$id' ";
} elseif ($status == "Diterima") {
    $query = " DELETE FROM artikel WHERE id_artikel_user='$id' ";
}
// hapus artikel
$result = mysqli_query($conn, $query);

// hapus artikel user
if ($status == "Diterima") {
    $query = " DELETE FROM artikel_user WHERE id_artikel_user='$id' ";
    $result = mysqli_query($conn, $query);
}




if ($result) {
    echo "
           <script>
                alert('Artikel berhasil dihapus!');
           </script>
    ";
} else {
    echo "
           <script>
                alert('Artikel gagal dihapus!');
           </script>
    ";
    echo mysqli_error($conn);
}


?>

<meta http-equiv="refresh" content="0; url=?tampil=artikel" />
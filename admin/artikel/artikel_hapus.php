<?php
include '../lib/functions.php';
$id = $_GET["id"];

$result = mysqli_query($conn, " SELECT gambar FROM artikel WHERE id_artikel='$id' ");
$row = mysqli_fetch_assoc($result);
$gambar = $row["gambar"];

if ($gambar != "") {
    unlink("../gambar/artikel/" . $gambar);
}

$query = " DELETE FROM artikel WHERE id_artikel='$id' ";
$result = mysqli_query($conn, $query);

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
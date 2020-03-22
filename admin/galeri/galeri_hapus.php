<?php
include '../lib/functions.php';
$id = $_GET["id"];

//hapus gambar
$result = mysqli_query($conn, "SELECT gambar FROM galeri WHERE id_galeri='$id' ");
$row = mysqli_fetch_assoc($result);
$gambar = $row["gambar"];

unlink("../gambar/galeri/" . $gambar);

//hapus field di database
$result = mysqli_query($conn, " DELETE FROM galeri WHERE id_galeri='$id' ");

if(mysqli_affected_rows($conn) > 0){
    echo "
           <script>
                alert('Galeri berhasil dihapus!');
           </script>
    ";
} else {
    echo "
           <script>
                alert('Galeri gagal dihapus!');
           </script>
    ";
}
?>
<meta http-equiv="refresh" content="0; url=?tampil=galeri" />
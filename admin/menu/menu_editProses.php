<?php
include '../lib/functions.php';

$id_menu = $_POST["id_menu"];
$judul = htmlspecialchars($_POST["judul"]);
$link = htmlspecialchars($_POST["link"]);
$urutan = htmlspecialchars($_POST["urutan"]);

$query = " UPDATE menu SET judul='$judul', link='$link', urutan='$urutan' WHERE id_menu='$id_menu' ";
$result = mysqli_query($conn, $query);


if ( $result ) {
    echo "
           <script>
                alert('Menu berhasil diubah!');
           </script>
    ";
} else {
    echo "
           <script>
                alert('Menu gagal diubah!');
           </script>
    ";
}
?>

<meta http-equiv="refresh" content="0; url=?tampil=menu" />
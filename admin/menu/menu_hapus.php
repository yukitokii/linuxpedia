<?php
include '../lib/functions.php';

$id_menu = $_GET["id"];

$result = mysqli_query($conn, " DELETE FROM menu WHERE id_menu='$id_menu' ");

if ($result) {
    echo "
           <script>
                alert('Menu berhasil dihapus!');
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
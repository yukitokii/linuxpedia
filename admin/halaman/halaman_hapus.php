<?php
include '../lib/functions.php';
$id = $_GET["id"];
$query = " DELETE FROM halaman WHERE id_halaman='$id' ";
$result = mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0) {
    echo "
           <script>
                alert('Halaman berhasil dihapus!');
           </script>
    ";
} else {
    echo "
           <script>
                alert('Halaman gagal dihapus!');
           </script>
    ";
}

?>
<meta http-equiv="refresh" content="0; url=?tampil=halaman" />
<?php
include '../lib/functions.php';
$id = $_GET["id"];
$query = " DELETE FROM pesan WHERE id_pesan ='$id' ";
$result = mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0) {
    echo "
           <script>
                alert('Pesan berhasil dihapus!');
           </script>
    ";
} else {
    echo "
           <script>
                alert('Pesan gagal dihapus!');
           </script>
    ";
}
?>
<meta http-equiv="refresh" content="0; url=?tampil=pesan" />
<?php
include '../lib/functions.php';

$id = $_GET["id"];

$query = "DELETE FROM komentar WHERE id_komentar = '$id' ";
$result = mysqli_query($conn, $query);

if(mysqli_affected_rows($conn) > 0){
    echo "
           <script>
                alert('Komentar berhasil dihapus!');
           </script>
    ";
} else {
    echo "
           <script>
                alert('Komentar gagal dihapus!');
           </script>
    ";
}

?>
<meta http-equiv="refresh" content="0; url=?tampil=komentar" />
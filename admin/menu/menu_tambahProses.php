<?php
include '../lib/functions.php';

$judul = htmlspecialchars($_POST["judul"]);
$link = htmlspecialchars($_POST["link"]);
$urutan = htmlspecialchars($_POST["urutan"]);

$query = "INSERT INTO menu VALUES(NULL, '$judul', '$link', '$urutan')";

mysqli_query($conn, $query);

if( mysqli_affected_rows($conn) > 0 ) {
    echo "
           <script>
                alert('Menu berhasil ditambahkan!');
           </script>
    ";
} else {
    echo "
           <script>
                alert('Menu gagal ditambahkan!');
           </script>
    ";
    echo mysqli_error($conn);
}
?>
<meta http-equiv="refresh" content="0; url=?tampil=menu" />
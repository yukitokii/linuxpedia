<?php
include '../lib/functions.php';
$id = $_GET["id"];
$judul = htmlspecialchars($_POST["judul"]);
$isi = addslashes($_POST["isi"]);

$query = " INSERT INTO halaman VALUES(NULL, '$judul', '$isi') ";
$result = mysqli_query($conn, $query);

if($result) {
    echo "
           <script>
                alert('Halaman berhasil ditambahkan!');
           </script>
    ";
} else {
    echo "
           <script>
                alert('Halaman gagal ditambahkan!');
           </script>
    ";
}

?>
<meta http-equiv="refresh" content="0; url=?tampil=halaman" />
<?php
include '../lib/functions.php';
$id = $_POST["id"];
$judul = $_POST["judul"];
$isi = addslashes($_POST["isi"]);

$query = " UPDATE halaman SET judul='$judul', isi='$isi' WHERE id_halaman='$id' ";
$result = mysqli_query($conn, $query);


if ($result) {
    echo "
           <script>
                alert('Halaman berhasil diubah!');
           </script>
    ";
} else {
    echo "
           <script>
                alert('Halaman gagal diubah!');
           </script>
    ";
}
?>
<meta http-equiv="refresh" content="0; url=?tampil=halaman" />
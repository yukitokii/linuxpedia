<?php
include '../lib/functions.php';
$judul = htmlspecialchars($_POST["judul"]);
$tanggal = date("Ymd");

$namaGambar = $_FILES["gambar"]["name"];
$tmpGambar = $_FILES["gambar"]["tmp_name"];
$error = $_FILES["gambar"]["error"];


move_uploaded_file($tmpGambar, "../gambar/galeri/" . $namaGambar);
$query = "INSERT INTO galeri(judul,tanggal,gambar) VALUES('$judul','$tanggal', '$namaGambar')";
$result = mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0) {
    echo "
           <script>
                alert('Galeri berhasil ditambahkan!');
           </script>
    ";
} else {
    echo "
           <script>
                alert('Galeri gagal ditambahkan!');
           </script>
    ";
}


?>
<meta http-equiv="refresh" content="0; url=?tampil=galeri" />
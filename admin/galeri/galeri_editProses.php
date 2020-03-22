<?php
include '../lib/functions.php';
$id = $_POST["id"];
$judul = htmlspecialchars($_POST["judul"]);
$tanggal = date("Ymd");
$namaGambar = $_FILES["gambar"]["name"];
$tmpGambar = $_FILES["gambar"]["tmp_name"];
$error = $_FILES["gambar"]["error"];

move_uploaded_file($tmpGambar, "../gambar/galeri/" . $namaGambar);

if ($error === 4) {
    $query = " UPDATE galeri SET judul='$judul', tanggal='$tanggal' WHERE id_galeri=$id ";
} else {
    $result = mysqli_query($conn, "SELECT gambar FROM galeri WHERE id_galeri='$id' ");
    $row = mysqli_fetch_assoc($result);
    if($row["gambar"] != ""){
        unlink("../gambar/galeri/" . $row["gambar"]);
    }

    $query = " UPDATE galeri SET judul='$judul', tanggal='$tanggal', gambar='$namaGambar' WHERE id_galeri=$id ";
}

$result = mysqli_query($conn, $query);

if(mysqli_affected_rows($conn) > 0) {
    echo "
           <script>
                alert('Galeri berhasil diubah!');
           </script>
    ";
} else {
    echo "
           <script>
                alert('Galeri Gagal diubah!');
           </script>
    ";
}

?>
<meta http-equiv="refresh" content="0; url=?tampil=galeri" />
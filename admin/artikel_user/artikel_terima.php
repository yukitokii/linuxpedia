<?php
include '../lib/functions.php';
$id = $_GET["id"];
$tanggal = date("Ymd");

// ambil data artikel yg dikirim user
$query = " SELECT * FROM artikel_user WHERE id_artikel_user='$id' ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$judul = $row["judul"];
$isi = addslashes($row["isi"]);
$gambar = $row["gambar"];
$id_user = $row["id_user"];
$id_artikel_user = $row["id_artikel_user"];
if ($gambar !== "") {
    $gambar = $gambar;
} else {
    $gambar = '';
}

// masukkan data user ke table artikel
$query = " INSERT INTO artikel SET judul='$judul', isi='$isi', tanggal='$tanggal', gambar='$gambar', id_user='$id_user', id_artikel_user='$id_artikel_user' ";
$result = mysqli_query($conn, $query);

// ubah status menjadi diterima
$query = " UPDATE artikel_user SET status='Diterima', tanggal='$tanggal' WHERE id_artikel_user='$id' ";
$result = mysqli_query($conn, $query);


if (mysqli_affected_rows($conn) > 0) {
    echo "
           <script>
                alert('Artikel telah Diterima!');
           </script>
    ";
} else {
    echo "
           <script>
                alert('Artikel gagal Diterima!');
           </script>
    ";
    echo mysqli_error($conn);
}


?>
<meta http-equiv="refresh" content="0; url=?tampil=artikel_user" />
?>
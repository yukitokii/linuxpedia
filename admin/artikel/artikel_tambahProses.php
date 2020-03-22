<?php
include '../lib/functions.php';

$judul = htmlspecialchars($_POST["judul"]);
$isi = addslashes($_POST["isi"]);
$namaGambar = $_FILES["gambar"]["name"];
$tmpGambar = $_FILES["gambar"]["tmp_name"];
$error = $_FILES["gambar"]["error"];
$tanggal = date('Ymd');

move_uploaded_file($tmpGambar, "../gambar/artikel/" . $namaGambar);

if($error === 4){
     $query = " INSERT INTO artikel SET judul='$judul', isi='$isi', tanggal='$tanggal', id_user=1, status='Diterima' ";
} else {
     $query = " INSERT INTO artikel SET judul='$judul', isi='$isi', tanggal='$tanggal', gambar='$namaGambar', id_user=1, status='Diterima' ";
}



$result = mysqli_query($conn, $query);

if( mysqli_affected_rows($conn) > 0 ) {
    echo "
           <script>
                alert('Artikel berhasil ditambahkan!');
           </script>
    ";
} else {
    echo "
           <script>
                alert('Artikel gagal ditambahkan!');
           </script>
    ";
    echo mysqli_error($conn);
}
?>
<meta http-equiv="refresh" content="0; url=?tampil=artikel" />

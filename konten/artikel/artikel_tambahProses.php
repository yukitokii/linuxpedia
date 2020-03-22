<?php
include 'lib/koneksi.php';

if (!isset($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

$judul = htmlspecialchars($_POST["judul"]);
$isi = addslashes($_POST["isi"]);
$namaGambar = $_FILES["gambar"]["name"];
$tmpGambar = $_FILES["gambar"]["tmp_name"];
$errorGambar = $_FILES["gambar"]["error"];
$id_user = $_SESSION["id_user"];
$tanggal = date("Ymd");

$namaGambar = $_FILES["gambar"]["name"];
$tmpGambar = $_FILES["gambar"]["tmp_name"];
$errorGambar = $_FILES["gambar"]["error"];



if ($errorGambar === 4) {

    $query = " INSERT INTO artikel_user SET judul='$judul', isi='$isi', id_user='$id_user', status='Pending', tanggal='$tanggal' ";
} else {
    //cek apakah yang diuplod adalah gambar
    $ekstensiValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaGambar);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiValid)) {
        echo "
			<script>
				alert('Gambar yang dipilih harus berformat jpg,jpeg, png!');
			</script>
		";
        $error = true;
    }

    if (!isset($error)) {
        $namaGambar = uniqid() . '.' . $ekstensiGambar;
        move_uploaded_file($tmpGambar, "gambar/artikel/" . $namaGambar);

        $query = " INSERT INTO artikel_user SET judul='$judul', isi='$isi', gambar='$namaGambar', id_user='$id_user', status='Pending', tanggal='$tanggal' ";
    }
}

$result = mysqli_query($conn, $query);

if (!isset($error)) {
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
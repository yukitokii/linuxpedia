<?php
include 'lib/koneksi.php';

$nama = $_POST["nama"];
$email = $_POST["email"];
$pesan = $_POST["pesan"];

$subjek = "Pesan Dari Pengunjung Website";
$ke = "rendy.case@gmail.com";
$tgl = date("Ymd");

mail($ke, $subjek, $pesan, "From: $email");

$query = ("INSERT INTO pesan SET nama='$nama', email='$email', subjek='$subjek', pesan='$pesan', tanggal='$tgl' ");
$result = mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0) {
    echo "
           <script>
                alert('Pesan berhasil dikirim!');
           </script>
    ";
} else {
    echo "
           <script>
                alert('Pesan gagal dikirim!');
           </script>
    ";
}


?>
<meta http-equiv="refresh" content="0; url=?tampil=kontak" />
<?php
include 'lib/koneksi.php';

if (!isset($_SESSION["login"])) {
    echo "
           <script>
                alert('Silakan login untuk komenter!');
           </script>
    ";
    $error = true;
    // header("Location: login.php");
    // exit;
}

// ambil id user
$id_user = $_SESSION["id_user"];
$id_artikel = $_POST["id"];
$komentar = htmlspecialchars(addslashes($_POST["komentar"]));
$tanggal = date('Ymd');


$query = " INSERT INTO komentar SET 
            id_artikel='$id_artikel',
            id_user = '$id_user',
            komentar = '$komentar',
            tanggal = '$tanggal' ";

$result = mysqli_query($conn, $query);


if (!isset($error)) {
    echo "
           <script>
                alert('Komentar berhasil dikirim!');
           </script>
    ";
}
// else {
//     echo "
//            <script>
//                 alert('Komentar gagal dikirim!');
//            </script>
//     ";
// }

?>
<meta http-equiv="refresh" content="0; url=?tampil=artikel_detail&id=<?= $id_artikel ?>" />
<?php
include '../lib/functions.php';

$email = $_POST["email"];
$subject = $_POST["subjek"];
$pesan = $_POST["pesan"];
$pemilik_website = "rendy.case@gmail.com";
$header = "From:" . $pemilik_website;


$balas = mail($email, $subject, $pesan, $header);

if($balas){
    echo "
           <script>
                alert('Pesan berhasil dibalas!');
           </script>
    ";
} else {
    echo "
           <script>
                alert('Pesan gagal dibalas!');
           </script>
    ";
}
?>
<meta http-equiv="refresh" content="0; url=?tampil=pesan" />
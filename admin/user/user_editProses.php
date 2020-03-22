<?php
include '../lib/functions.php';
$username = strtolower($_POST["username"]);
$password = $_POST["password"];
$password2 = $_POST["password2"];

if ($password == "") {
    $result = mysqli_query($conn, " UPDATE admin SET username='$username' ");
}

if ($password !== $password2) {
    echo "
           <script>
                alert('Password dan Konfirmasi Password tidak sesuai!');
           </script>
    ";
} else {
    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "  UPDATE admin SET username='$username', password='$password' ";
    $result = mysqli_query($conn, $query);
}

if (mysqli_affected_rows($conn) > 0) {
    echo "
    <script>
         alert('Username/Password berhasil diubah!');
    </script>
";
} else {
    echo "
    <script>
         alert('Username/Password gagal diubah!');
    </script>
";
}
?>
<meta http-equiv="refresh" content="0; url=?tampil=user_edit" />
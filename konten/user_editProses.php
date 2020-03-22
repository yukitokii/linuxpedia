<?php
include 'lib/koneksi.php';

if (!isset($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

$username =  htmlspecialchars(strtolower($_POST["username"]));
$nama = htmlspecialchars($_POST["nama"]);
$password = htmlspecialchars($_POST["password"]);
$password2 = htmlspecialchars($_POST["confirm_password"]);
$email = htmlspecialchars($_POST["email"]);
$gambarLama = $_POST["gambarLama"];
$id_user = $_SESSION["id_user"];

// ambil data gambar
$namaGambar = $_FILES["gambar"]["name"];
$tmpGambar = $_FILES["gambar"]["tmp_name"];
$errorGambar = $_FILES["gambar"]["error"];

if ($password !== $password2) {
    echo "
			<script>
				alert('Konfirmasi password tidak sama!');
			</script>
        ";
    // header("Location: register.php");
    $error = true;
}
$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
$row = mysqli_fetch_assoc($result);
$namaGambarLama = $row["profil"];
if (mysqli_fetch_assoc($result)) {
    echo "
			<script>
				alert('username sudah terdaftar!');
			</script>
        ";
    // header("Location: register.php");
    $error =  true;
}

// cek password
$result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_user'");
$row = mysqli_fetch_assoc($result);

if (!password_verify($password, $row["password"])) {
    echo "
			<script>
				alert('Password Salah!');
			</script>
        ";
    $error =  true;
}

if ($errorGambar === 4) {
    $namaGambar = $gambarLama;
} elseif (!isset($error)) {
    //cek apakah yang diuplod adalah gambar
    $ekstensiValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaGambar);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiValid)) {
        echo "
			<script>
				alert('Gambar yang dipilih harus berformat jpg,jpeg,png!');
			</script>
		";
        $error = true;
    }

    $namaGambar = uniqid() . '.' . $ekstensiGambar;
    unlink("gambar/profil/" . $namaGambarLama);
    move_uploaded_file($tmpGambar, "gambar/profil/" . $namaGambar);
}


if (!isset($error)) {
    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    // insert data ke db
    $update = mysqli_query($conn, "UPDATE user SET nama='$nama', email='$email', username='$username', password='$password', profil='$namaGambar' WHERE id_user='$id_user' ");

    echo "
			<script>
				alert('Akun berhasil Diubah!');
			</script>
        ";
    // header("Location: login.php");
}
echo "<meta http-equiv='refresh' content='0; url=?tampil=user_edit' />";

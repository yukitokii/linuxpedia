<?php
session_start();
include 'lib/functions.php';

if (isset($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

if (isset($_POST["register"])) {
    $username =  htmlspecialchars(strtolower($_POST["username"]));
    $nama = htmlspecialchars($_POST["nama"]);
    $password = htmlspecialchars($_POST["password"]);
    $password2 = htmlspecialchars($_POST["confirm_password"]);
    $email = htmlspecialchars($_POST["email"]);

    if ($password !== $password2) {
        echo "
			<script>
				alert('Konfirmasi password tidak sama!');
			</script>
        ";
        // header("Location: register.php");
        $error = true;
    }
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "
			<script>
				alert('username sudah terdaftar!');
			</script>
        ";
        // header("Location: register.php");
        $error =  true;
    }

    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");
    if (mysqli_fetch_assoc($result)) {
        echo "
			<script>
				alert('email sudah terdaftar!');
			</script>
        ";
        // header("Location: register.php");
        $error =  true;
    }

    $namaGambar = $_FILES["gambar"]["name"];
    $tmpGambar = $_FILES["gambar"]["tmp_name"];
    $errorGambar = $_FILES["gambar"]["error"];



    if ($errorGambar === 4) {
        $namaGambar = "";
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
        move_uploaded_file($tmpGambar, "gambar/profil/" . $namaGambar);
    }

    //enkripsi password 
    if (!isset($error)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $register = mysqli_query($conn, "INSERT INTO user SET nama='$nama', email='$email', username='$username', password='$password', profil='$namaGambar' ");
    }

    if ($register) {
        echo "
			<script>
				alert('Akun berhasil dibuat, Silakan Login!');
			</script>
        ";
        // header("Location: login.php");
        echo "<meta http-equiv='refresh' content='0; url=login.php' />";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register Member</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="shortcut icon" href="css/img/default.png">
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/register.css">
</head>

<body>
    <div class="signup-form">
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Register</h2>
            <p class="hint-text">Buat akun mu disini, gratis dan hanya membutuhkan beberapa menit</p>
            <div class="form-group">
                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Konfirmasi Password" required="required">
            </div>
            <div class="form-group">
                <input type="file" name="gambar" id="gambar" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg btn-block" name="register">Daftar Sekarang</button>
            </div>
        </form>
        <div class="text-center">Sudah punya account? <a href="login.php">Masuk disini</a></div>
    </div>
</body>

</html>
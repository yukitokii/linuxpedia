
<?php
session_start();
include 'lib/functions.php';

if (isset($_SESSION["login"])){
    header("location: index.php");
    exit;
}

if (isset($_POST["login"])) {
    
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, " SELECT * FROM user WHERE email='$email' ");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        
        // cek password
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"]) ){
            // jika username & pass sama dengan yg di database, buatkan tiket masuk
            $_SESSION["login"] = true;
            $_SESSION["username"] = $row["username"];
            $_SESSION["id_user"] = $row["id_user"];

            // lalu redirect ke halaman admin
            header("location: index.php");
            exit;
        }
    } 
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Member</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">


    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/login2.css">
</head>
<body>
<div class="login-form">
    <form action="" method="post">
		<div class="avatar">
			<img src="avatar.png" alt="Avatar">
		</div>
        <h2 class="text-center">Member Login</h2>  
        
        <?php if(isset($error)) : ?>
            <p style="color: red; font-style: italic;">email / password salah</p>
        <?php endif; ?>

        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>        
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block" name="login">Masuk</button>
        </div>
    </form>
    <p class="text-center small">Belum punya account? <a href="register.php">Daftar disini!</a></p>
</div>
</body>
</html>           
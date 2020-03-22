<?php
session_start();
include '../lib/functions.php';

if (isset($_SESSION["tiket"])){
    header("location: admin.php");
    exit;
}

if (isset($_POST["login"])) {
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, " SELECT * FROM admin WHERE username='$username' ");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        
        // cek password
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"]) ){
            // jika username & pass sama dengan yg di database, buatkan tiket masuk
            $_SESSION["tiket"] = true;

            // lalu redirect ke halaman admin
            header("location: admin.php");
            exit;
        }
    } 
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Administrator</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">


    <script src="../js/jquery.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../css/login2.css">
</head>
<body>
<div class="login-form">
    <form action="" method="post">
		<div class="avatar">
			<img src="avatar.png" alt="Avatar">
		</div>
        <h2 class="text-center">Admin Login</h2>
        
        <?php if(isset($error)) : ?>
            <p style="color: red; font-style: italic;">username / password salah</p>
        <?php endif; ?>        

        <div class="form-group">
        	<input type="text" class="form-control" name="username" placeholder="Username" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>        
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block" name="login">Sign in</button>
        </div>
    </form>
    
</div>
</body>
</html>                                                        		                            
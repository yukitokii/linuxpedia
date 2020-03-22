<?php
session_start();

if (!isset($_SESSION["tiket"])) {
    header("location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Administrator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../css/img/default.png">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin.css">

    <script src="../js/jquery.min.js" type="text/javascript"></script>
    <script src="../js/tinymce/tinymce.min.js" type="text/javascript"></script>

    <script>
        tinymce.init({
            selector: '.tiny'
        });
    </script>

</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <?php include 'menu.php' ?>
        </div>
    </nav>
    <div class="container-fluid jarak">
        <div class="row">
            <div class="col-md-2 col-md-3 sidebar hidden-xs">
                <?php include 'sidebar.php' ?>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <?php include 'konten.php' ?>
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
</body>

</html>
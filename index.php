<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>*About Linux</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="css/img/default.png">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">


    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/tinymce/tinymce.min.js" type="text/javascript"></script>
    
    <script>
        tinymce.init({
            selector: '.tiny'
        });
    </script>
</head>
<body>
    <header id="header">
        <div class="container">
        <div class="row">
        <div class="col-md-12">
            <img src="judul.png" width="40%">
        </div>
        </div>
        </div>
        
        <nav id="menu">
        <div class="container">
        <div class="row">
        <div class="col-md-12">
            <?php include 'menu.php'; ?>
        </div>
        </div>
        </div>
        </nav>
    </header>
        

    

    <content id="content">
        <div class="container">
        <div class="row">
        <div class="col-md-8">
            <?php include 'konten.php'; ?>
        </div>
        <div class="col-md-4">
            <?php include 'sidebar.php'; ?>
        </div>
        </div>
        </div>
    </content>

<?php include 'footer.php'; ?>
            <!-- <p>Copyright &copy; * About Linux</p> -->


</body>
</html>